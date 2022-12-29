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

ARG APP_NAME
ARG APP_ENV
ARG APP_KEY
ARG APP_URL

ARG DB_CONNECTION
ARG DB_HOST
ARG DB_PORT
ARG DB_DATABASE
ARG DB_USERNAME
ARG DB_PASSWORD

ARG DATABASE_URL

EXPOSE 9000
