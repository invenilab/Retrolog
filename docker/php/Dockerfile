FROM php:8.4-apache

ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y \
    bash curl git unzip zip \
    libzip-dev libicu-dev libonig-dev \
    libpng-dev libjpeg-dev libwebp-dev libfreetype6-dev \
    libxml2-dev mariadb-client \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j$(nproc) pdo pdo_mysql mysqli intl mbstring zip gd opcache xml \
    && a2enmod rewrite headers expires deflate \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY docker/php/php.ini /usr/local/etc/php/conf.d/99-retrolog.ini

WORKDIR /var/www/html

EXPOSE 80

CMD ["apache2-foreground"]
