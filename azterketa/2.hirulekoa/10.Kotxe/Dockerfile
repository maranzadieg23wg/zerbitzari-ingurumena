# Usa la imagen base de PHP con FPM
FROM php:8-fpm

# Instala dependencias
RUN apt-get update && \
   apt-get install -y apt-utils git unzip zip libzip-dev

# Instalatu sql kontsultak egiteko
RUN docker-php-ext-install mysqli pdo pdo_mysql



CMD ["php-fpm"]