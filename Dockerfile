FROM php:8.2-apache

# Forzar a Debian/Ubuntu a usar IPv4 primero antes de resolver dominios
RUN echo "precedence ::ffff:0:0/96  100" >> /etc/gai.conf

# Instalar dependencias para PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

COPY . /var/www/html/