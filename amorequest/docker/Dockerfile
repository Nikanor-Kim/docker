FROM php:8.2-apache

# Включаем mod_rewrite
RUN a2enmod rewrite

# Устанавливаем нужные PHP-расширения
RUN docker-php-ext-install mysqli pdo_mysql

# Устанавливаем Composer вручную (официальный способ)
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer