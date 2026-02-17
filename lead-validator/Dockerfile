FROM php:8.4-apache

RUN a2enmod rewrite headers

RUN apt-get update && apt-get install -y --no-install-recommends \
    git unzip zip libzip-dev \
    && docker-php-ext-install mysqli pdo_mysql zip \
    && rm -rf /var/lib/apt/lists/*

# Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

WORKDIR /var/www/html

# ✅ Фикс DocumentRoot (убираем /html/html если где-то появилось)
RUN sed -i 's#DocumentRoot /var/www/html/html#DocumentRoot /var/www/html#g' \
      /etc/apache2/sites-available/000-default.conf \
      /etc/apache2/sites-enabled/000-default.conf \
 && sed -i 's#DocumentRoot /var/www/html/public#DocumentRoot /var/www/html#g' \
      /etc/apache2/sites-available/000-default.conf \
      /etc/apache2/sites-enabled/000-default.conf

# ✅ Чтобы .htaccess работал
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# (опционально) убрать предупреждение про ServerName
RUN echo "ServerName localhost" > /etc/apache2/conf-available/servername.conf \
 && a2enconf servername
