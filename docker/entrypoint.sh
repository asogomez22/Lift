#!/bin/sh
set -eu

cd /var/www/html

mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache database
touch database/database.sqlite
chown -R www-data:www-data storage bootstrap/cache database

if [ ! -f .env ] && [ -f .env.example ]; then
    cp .env.example .env
fi

if [ ! -f .env ]; then
    printf 'APP_KEY=\n' > .env
fi

APP_KEY_IN_FILE=""
DB_CONNECTION_VALUE="${DB_CONNECTION:-}"

if [ -f .env ]; then
    APP_KEY_IN_FILE=$(sed -n 's/^APP_KEY=//p' .env | tail -n 1 | tr -d "\"'")

    if [ -z "$DB_CONNECTION_VALUE" ]; then
        DB_CONNECTION_VALUE=$(sed -n 's/^DB_CONNECTION=//p' .env | tail -n 1 | tr -d "\"'")
    fi
fi

DB_CONNECTION_VALUE="${DB_CONNECTION_VALUE:-sqlite}"

if [ -z "${APP_KEY:-}" ] && [ -z "$APP_KEY_IN_FILE" ]; then
    if ! grep -q '^APP_KEY=' .env; then
        printf '\nAPP_KEY=\n' >> .env
    fi

    php artisan key:generate --force --no-interaction
fi

php artisan storage:link --force || true
php artisan config:clear || true
php artisan route:clear || true
php artisan view:clear || true

if [ "${RUN_MIGRATIONS:-false}" = "true" ] || [ "$DB_CONNECTION_VALUE" = "sqlite" ]; then
    php artisan migrate --force
fi

php artisan config:cache
php artisan route:cache
php artisan view:cache

exec "$@"
