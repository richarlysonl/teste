FROM php:8.2-apache

# Habilita o módulo pgsql e pdo_pgsql
RUN docker-php-ext-install pgsql pdo_pgsql

# Copia os arquivos do projeto para o Apache
COPY public/ /var/www/html/

# Define a porta (padrão HTTP)
EXPOSE 80