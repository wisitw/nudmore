FROM php:7.0-fpm

RUN apt-get update && apt-get install -y libssl-dev \
    && docker-php-ext-install pdo pdo_mysql
