FROM php:8.2-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    build-essential \
    locales \
    zip unzip \
    git curl \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql \
    && apt-get clean

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

