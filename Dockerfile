FROM php:8.2-fpm

# 1. Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libwebp-dev \
    libxpm-dev

# 2. Install Node.js (Wajib untuk Vite/npm build)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# 3. Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# 4. Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# 5. Install Redis extension
RUN mkdir -p /usr/src/php/ext/redis \
    && curl -L https://github.com/phpredis/phpredis/archive/6.0.2.tar.gz | tar xvz -C /usr/src/php/ext/redis --strip-components=1 \
    && docker-php-ext-install redis

# 6. Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 7. Set working directory
WORKDIR /var/www

# 8. Copy source code ke container
COPY . /var/www

# 9. Install Composer dependencies
# Kita jalankan ini agar vendor/ terisi di dalam image
RUN composer install --no-interaction --optimize-autoloader --no-dev --no-scripts

# 10. Install NPM dependencies & Build Assets (Vite)
# Ini solusi untuk error "Vite manifest not found"
RUN npm install && npm run build

# 11. Set permissions (Agar tidak Error 500 saat nulis log/cache)
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]