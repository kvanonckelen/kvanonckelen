# -------- 1. Base PHP + Laravel Builder --------
    FROM php:8.3-fpm-alpine AS build

    # Install system deps
    RUN apk add --no-cache \
        git curl zip unzip \
        libpng-dev libjpeg-turbo-dev libzip-dev \
        oniguruma-dev autoconf g++ make bash nodejs npm

    RUN apk add --no-cache \
        libpq-dev \
        libpng-dev \
        libjpeg-turbo-dev \
        freetype-dev \
        zlib-dev \
        libzip-dev \
        oniguruma-dev
    

    # Install PHP extensions
    RUN docker-php-ext-install \
        pdo pdo_mysql pdo_pgsql mbstring zip bcmath gd opcache
    
    # Install Composer
    COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
    
    # Set working dir
    WORKDIR /var/www
    
    # Copy Laravel app files
    COPY . .
    
    # Install PHP dependencies
    RUN composer install --no-dev --optimize-autoloader
    
    # Build frontend assets
    RUN npm ci && npm run build
    
    # Set permissions
    RUN chown -R www-data:www-data /var/www
    
    # -------- 2. Final Runtime Image --------
    FROM php:8.3-fpm-alpine
    
    # Install nginx + supervisor + system utils
    RUN apk add --no-cache nginx supervisor bash curl
    
    # Copy from build stage
    COPY --from=build /var/www /var/www
    COPY --from=build /usr/local/etc/php/conf.d /usr/local/etc/php/conf.d
    
    # Copy nginx and supervisor config
    COPY docker/nginx.conf /etc/nginx/nginx.conf
    COPY docker/supervisord.conf /etc/supervisord.conf
    
    # Set working directory
    WORKDIR /var/www
    
    # Fix permissions
    RUN chown -R www-data:www-data /var/www \
        && chmod -R 775 /var/www/storage /var/www/bootstrap/cache
    
    # Expose HTTP
    EXPOSE 80
    
    # Start Nginx + PHP-FPM
    CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
    