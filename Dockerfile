FROM php:8.2-fpm-alpine

# Instalar dependencias de sistema y extensiones de PHP/MySQL
RUN apk add --no-cache nginx supervisor curl \
    && docker-php-ext-install pdo pdo_mysql

# Copiar el código del proyecto
WORKDIR /var/www/html
COPY . .

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# Exponer el puerto
EXPOSE 80

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]
