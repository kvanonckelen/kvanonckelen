#!/bin/bash

set -e

APP_NAME="laravelapp"
APP_DIR="/var/www/$APP_NAME"
NGINX_CONF="/etc/nginx/sites-available/$APP_NAME"

# Ensure script is run as root
if [[ $EUID -ne 0 ]]; then
   echo "❌ Please run this script as root (use sudo)"
   exit 1
fi

echo "🚀 Laravel Deployment Script Starting..."

# Prompt for Laravel app config
echo "🔧 Laravel Application Configuration"
read -p "App name (e.g. My Laravel App): " APP_TITLE
read -p "App URL (e.g. https://example.com): " APP_URL
read -p "App environment (production/staging): " APP_ENV
read -p "Enable debug? (true/false): " APP_DEBUG

# Prompt for database config
echo "🐘 Database Configuration (leave blank to use SQLite)"
read -p "DB connection (pgsql/mysql/sqlite) [sqlite]: " DB_CONNECTION
DB_CONNECTION=${DB_CONNECTION:-sqlite}

if [[ "$DB_CONNECTION" != "sqlite" ]]; then
    read -p "DB host [127.0.0.1]: " DB_HOST
    DB_HOST=${DB_HOST:-127.0.0.1}
    read -p "DB port [5432 for pgsql, 3306 for mysql]: " DB_PORT
    read -p "DB name: " DB_DATABASE
    read -p "DB username: " DB_USERNAME
    read -s -p "DB password: " DB_PASSWORD
    echo
fi

# Prompt for SMTP config
echo "✉️  SMTP Configuration (press Enter to skip)"
read -p "SMTP host (or leave blank): " MAIL_HOST
if [[ -n "$MAIL_HOST" ]]; then
    read -p "SMTP port [587]: " MAIL_PORT
    MAIL_PORT=${MAIL_PORT:-587}
    read -p "SMTP username: " MAIL_USERNAME
    read -s -p "SMTP password: " MAIL_PASSWORD
    echo
    read -p "Encryption (tls/ssl): " MAIL_ENCRYPTION
    read -p "From email: " MAIL_FROM_ADDRESS
    read -p "From name: " MAIL_FROM_NAME
fi

# Install packages
echo "📦 Installing dependencies..."
apt update && apt upgrade -y
apt install -y unzip curl git nginx supervisor cron sudo

# Install PHP extensions
echo "🔧 Installing PHP extensions..."
apt install -y php php8.3-{fpm,mbstring,xml,bcmath,curl,zip,dev,cli,common,tokenizer,gd,pgsql,mysql,sqlite3,redis} 
php -m | grep pcntl
if [ $? -ne 0 ]; then
    echo "❌ PHP pcntl extension is not installed. Please install it and rerun the script."
    exit 1
fi
/usr/sbin/php-fpm8.3

# Database engines

if [[ "$DB_CONNECTION" == "pgsql" ]]; then
    apt install -y php-pgsql postgresql postgresql-contrib
    sudo -u postgres psql <<EOF
CREATE USER laravel WITH PASSWORD 'secret';
CREATE DATABASE laravel_db OWNER laravel;
ALTER ROLE laravel SUPERUSER;
EOF
elif [[ "$DB_CONNECTION" == "mysql" ]]; then
    apt install -y php-mysql mysql-server

    echo "🛡 Creating MySQL database and user..."
    # Default fallback if user left DB_USER/PASS blank
    DB_DATABASE=${DB_DATABASE:-laravel_db}
    DB_USERNAME=${DB_USERNAME:-laravel}
    DB_PASSWORD=${DB_PASSWORD:-secret}

    # Secure MySQL root connection (non-interactive)
    mysql -u root <<MYSQL_SCRIPT
CREATE DATABASE IF NOT EXISTS \`$DB_DATABASE\` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER IF NOT EXISTS '$DB_USERNAME'@'localhost' IDENTIFIED BY '$DB_PASSWORD';
GRANT ALL PRIVILEGES ON \`$DB_DATABASE\`.* TO '$DB_USERNAME'@'localhost';
FLUSH PRIVILEGES;
MYSQL_SCRIPT
fi

# install Node.js and npm
curl -sL https://deb.nodesource.com/setup_22.x | bash -
apt install -y nodejs

# Install Composer
echo "📦 Installing Composer..."
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

# Project move
echo "📁 Moving project to $APP_DIR..."
mkdir -p "$APP_DIR"
cp -R . "$APP_DIR"
chown -R www-data:www-data "$APP_DIR"
chmod -R 775 "$APP_DIR/storage" "$APP_DIR/bootstrap/cache"

cd "$APP_DIR"

# Generate .env dynamically
echo "⚙️ Generating .env..."
cat > .env <<EOL
APP_NAME="$APP_TITLE"
APP_ENV=$APP_ENV
APP_KEY=
APP_DEBUG=$APP_DEBUG
APP_URL=$APP_URL

LOG_CHANNEL=stack
EOL

if [[ "$DB_CONNECTION" == "sqlite" ]]; then
    touch database/database.sqlite
    echo "DB_CONNECTION=sqlite" >> .env
    echo "DB_DATABASE=$(pwd)/database/database.sqlite" >> .env
else
cat >> .env <<EOL
DB_CONNECTION=$DB_CONNECTION
DB_HOST=$DB_HOST
DB_PORT=$DB_PORT
DB_DATABASE=$DB_DATABASE
DB_USERNAME=$DB_USERNAME
DB_PASSWORD=$DB_PASSWORD
EOL
fi

if [[ -n "$MAIL_HOST" ]]; then
cat >> .env <<EOL

MAIL_MAILER=smtp
MAIL_HOST=$MAIL_HOST
MAIL_PORT=$MAIL_PORT
MAIL_USERNAME=$MAIL_USERNAME
MAIL_PASSWORD=$MAIL_PASSWORD
MAIL_ENCRYPTION=$MAIL_ENCRYPTION
MAIL_FROM_ADDRESS=$MAIL_FROM_ADDRESS
MAIL_FROM_NAME="$MAIL_FROM_NAME"
EOL
fi

# Install Laravel
echo "📦 Installing Laravel..."
composer install --no-dev --optimize-autoloader
php artisan key:generate
php artisan migrate --force || true
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Frontend build
if [ -f "vite.config.js" ]; then
    echo "🎨 Building frontend (Vite)..."
    npm install
    npm run build
fi

# Nginx setup
echo "🌐 Setting up Nginx..."
cat > "$NGINX_CONF" <<EOF
server {
    listen 80;
    server_name $(echo "$APP_URL" | sed 's|https\?://||');

    root $APP_DIR/public;
    index index.php index.html;

    location / {
        try_files \$uri \$uri/ /index.php?\$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
    }

    location ~ /\.ht {
        deny all;
    }
}
EOF

ln -sf "$NGINX_CONF" /etc/nginx/sites-enabled/
nginx -t
echo "🔄 Reloading Nginx..."
nginx && nginx -s reload

# SSL
read -p "🔐 Enable SSL with Let's Encrypt? (y/n): " ENABLE_SSL
if [[ "$ENABLE_SSL" == "y" ]]; then
    apt install -y certbot python3-certbot-nginx
    certbot --nginx -d "$(echo "$APP_URL" | sed 's|https\?://||')"
fi

# Laravel cron
echo "⏰ Setting up Laravel scheduler cron job..."
(crontab -l 2>/dev/null; echo "* * * * * cd $APP_DIR && php artisan schedule:run >> /dev/null 2>&1") | crontab -

echo "✅ Laravel successfully deployed at $APP_URL"
