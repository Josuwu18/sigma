@echo off
echo Instalando dependencias de Laravel...
call composer install
if not exist .env (
    copy .env.example .env
    call php artisan key:generate
)
echo Instalando dependencias de la aplicación...
cd sigma-app
call npm install
call npx cap sync
call php artisan config:clear
call php artisan migrate
call yes
echo Instalación completada.
pause