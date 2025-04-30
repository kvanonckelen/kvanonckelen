FROM php:8.4-fpm

# Install dependencies
RUN apt-get update -y && apt-get install -y \
    openssl zip unzip git libonig-dev curl gnupg \
    && docker-php-ext-install pdo mbstring pcntl

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Node.js (use LTS version)
RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - && \
    apt-get install -y nodejs

# Set working directory
WORKDIR /app

# Copy app source
COPY . /app

# Install PHP dependencies
RUN composer install

# Install JS dependencies
RUN npm install

# Expose ports
EXPOSE 8000 5173

# Start both servers: PHP and Vite
CMD ["sh", "-c", "composer run dev"]
