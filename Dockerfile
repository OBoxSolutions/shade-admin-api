# Dockerfile
FROM php:7.4-cli

RUN apt-get update; apt-get install -y wget libzip-dev
RUN docker-php-ext-install zip pdo_mysql
RUN wget https://raw.githubusercontent.com/composer/getcomposer.org/master/web/installer -O - -q | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app
COPY . /app

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

RUN composer install

EXPOSE 8000
CMD php artisan serve --host=0.0.0.0 --port=8000
