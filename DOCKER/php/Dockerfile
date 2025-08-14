FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Add user and group for host UID/GID
ARG UID=1000
ARG GID=1000
RUN groupadd -g ${GID} appgroup && \
    useradd -u ${UID} -g appgroup -m appuser

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Copy Laravel app source
COPY laravel /var/www/html

WORKDIR /var/www/html

# Install PHP dependencies
RUN composer install

RUN php artisan key:generate

USER appuser:appgroup
