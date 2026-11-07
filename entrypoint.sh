#!/bin/bash

# Si no existe .env, crearlo a partir de .env.example
if [ ! -f /var/www/html/.env ]; then
    echo "Inicializando archivo .env..."
    cp /var/www/html/.env.example /var/www/html/.env
fi

# Generar APP_KEY si no está configurada
if [ -z "$APP_KEY" ]; then
    echo "Generando APP_KEY..."
    php artisan key:generate --force --no-interaction
fi

# Asegurar permisos en storage y bootstrap/cache
mkdir -p storage/framework/sessions storage/framework/views storage/framework/cache storage/logs
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# Ejecutar migraciones si la base de datos está disponible
echo "Ejecutando migraciones de Laravel..."
php artisan migrate --force --no-interaction || echo "Aviso: No se pudieron ejecutar las migraciones en este momento."

# Optimizar caché para producción
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Ejecutar Apache
if [ "$#" -eq 0 ]; then
    exec apache2-foreground
else
    exec "$@"
fi
