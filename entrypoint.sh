#!/bin/bash

# Asegurar permisos
chown -R www-data:www-data storage bootstrap/cache

# Ejecutar migraciones si la base de datos está disponible
echo "Ejecutando migraciones de Laravel..."
php artisan migrate --force --no-interaction || echo "Aviso: No se pudieron ejecutar las migraciones en este momento."

# Optimizar caché para producción
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Ejecutar el comando principal de Apache
if [ "$#" -eq 0 ]; then
    exec apache2-foreground
else
    exec "$@"
fi
