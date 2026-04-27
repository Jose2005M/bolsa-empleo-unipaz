#!/bin/bash
set -e

echo "=== Bolsa de Empleo UNIPAZ — Iniciando deploy ==="

# Crear .env desde .env.example si no existe (Laravel requiere este archivo)
if [ ! -f /app/.env ]; then
    cp /app/.env.example /app/.env
    echo ".env creado desde .env.example"
fi

# Generar clave de aplicación si no existe
if [ -z "$APP_KEY" ]; then
    php artisan key:generate --force
fi

# Crear base de datos SQLite si no existe
mkdir -p database
touch database/database.sqlite

# Ejecutar migraciones
php artisan migrate --force

# Crear enlace de almacenamiento público
php artisan storage:link || true

# Optimizar para producción
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Ejecutar seeder solo si la tabla users está vacía
USER_COUNT=$(php artisan tinker --execute="echo App\Models\User::count();" 2>/dev/null | tail -1)
if [ "$USER_COUNT" = "0" ] || [ -z "$USER_COUNT" ]; then
    echo "Sembrando datos iniciales..."
    php artisan db:seed --force
fi

echo "=== ¡Listo! Iniciando servidor ==="

# Iniciar servidor PHP en el puerto asignado por Railway
php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
