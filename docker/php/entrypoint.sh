#!/usr/bin/env sh
set -e

if [ ! -f .env ]; then
    cp .env.example .env
fi

if [ ! -d vendor ]; then
    composer install
fi

php artisan key:generate --force --no-interaction >/dev/null 2>&1 || true

exec "$@"
