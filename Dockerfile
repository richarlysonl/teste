FROM php:8.1-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html/

RUN a2enmod rewrite

COPY apache-config.conf /etc/apache2/sites-available/000-default.conf