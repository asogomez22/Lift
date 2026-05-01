#!/bin/sh
set -eu

cd /var/www/html

mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache database
touch database/database.sqlite
chown -R www-data:www-data storage bootstrap/cache database

if [ ! -f .env ] && [ -f .env.example ]; then
    cp .env.example .env
fi

php artisan storage:link --force || true
php artisan config:clear || true
php artisan route:clear || true
php artisan view:clear || true

if [ "${RUN_MIGRATIONS:-false}" = "true" ]; then
    php artisan migrate --force
fi

php artisan config:cache
php artisan route:cache
php artisan view:cache

exec "$@"
