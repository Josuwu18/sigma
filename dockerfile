# 1. Usamos la imagen oficial de PHP con Apache incorporado
FROM php:8.2-apache

# 2. Instalar extensiones del sistema y de PHP necesarias para Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql gd

# 3. Habilitar el módulo de reescritura de Apache (crucial para las rutas de Laravel)
RUN a2enmod rewrite

# 4. Cambiar el directorio raíz de Apache para que apunte a la carpeta /public de Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 5. Instalar Composer de forma automática
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 6. Copiar los archivos de tu proyecto al contenedor
WORKDIR /var/www/html
COPY . .

# 7. Asignar permisos correctos a las carpetas de Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 8. Exponer el puerto 80 del contenedor
EXPOSE 80