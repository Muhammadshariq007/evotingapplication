FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy existing application directory contents
COPY . /var/www/html

# Install dependencies
RUN composer install

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache






# # Set ownership of all files to www-data
# docker-compose exec evoting_app chown -R www-data:www-data /var/www/html

# # Set proper permissions for storage and bootstrap/cache
# docker-compose exec evoting_app chmod -R 775 /var/www/html/storage
# docker-compose exec evoting_app chmod -R 775 /var/www/html/bootstrap/cache

# # Create the log file and set its permissions
# docker-compose exec evoting_app touch /var/www/html/storage/logs/laravel.log
# docker-compose exec evoting_app chmod 664 /var/www/html/storage/logs/laravel.log
# docker-compose exec evoting_app chown www-data:www-data /var/www/html/storage/logs/laravel.log
# docker-compose exec evoting_app chown www-data:www-data -R /var/www/html/storage
# docker-compose exec evoting_app chmod -R 775 /var/www/html/storage




