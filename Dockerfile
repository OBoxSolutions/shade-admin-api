# Dockerfile
FROM php:7.4-fpm-alpine

# Install dependencies
RUN apk add --update --no-cache \
    git \
    unzip \
    libzip-dev \
    postgresql-dev \
 && docker-php-ext-install zip \
 && docker-php-ext-install pgsql

# Import composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Create application directory
WORKDIR /var/www/html
COPY . .

RUN composer install --no-dev --optimize-autoloader


ENV COMPOSER_ALLOW_SUPERUSER=1

EXPOSE 8000
