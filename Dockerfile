# Dockerfile
FROM php:7.4-fpm-alpine

# Install dependencies
RUN apk add --update --no-cache \
  git \
  unzip \
  libzip-dev \
  postgresql-dev \
  && docker-php-ext-install pdo_pgsql pgsql zip

# Import composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Create application directory
RUN mkdir -p /var/www/html
WORKDIR /var/www/html

COPY . .
RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data /var/www/html

EXPOSE 9000

CMD ["php-fpm"]
