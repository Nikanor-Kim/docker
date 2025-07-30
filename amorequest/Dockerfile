FROM php:8.2-apache

# Включаем mod_rewrite
RUN a2enmod rewrite

# Устанавливаем нужные PHP-расширения
RUN docker-php-ext-install mysqli pdo_mysql

RUN apt-get update && apt-get install -y \
    unzip \
    git \
    zip \
    libzip-dev \
    && docker-php-ext-install zip

# Устанавливаем Composer вручную (официальный способ)
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer