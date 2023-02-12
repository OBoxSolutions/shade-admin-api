FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
  git \
  wget \
  libpq-dev \
  libpng-dev \
  libonig-dev \
  libxml2-dev \
  zip \
  unzip \
  && apt-get clean && rm -rf /var/lib/apt/lists/* \
  && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
  && pdo pdo_pgsql pgsql mbstring exif pcntl bcmath gd \
  && wget https://raw.githubusercontent.com/composer/getcomposer.org/master/web/installer -O - -q | php -- --install-dir=/usr/local/bin --filename=composer


WORKDIR /app

COPY . /app

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN composer install \
  && echo "#!/bin/sh\n" \
  "php artisan serve --host 0.0.0.0 --port 8000" > /app/start.sh \
  && chmod +x /app/start.sh

CMD ["/app/start.sh"]