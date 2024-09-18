# Usa la imagen base de PHP-FPM
FROM php:8-fpm

# Instala las dependencias necesarias para GD
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Copia cualquier archivo de configuración adicional si es necesario
# COPY ./php.ini /usr/local/etc/php/
