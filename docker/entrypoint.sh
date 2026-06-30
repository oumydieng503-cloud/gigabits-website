#!/bin/sh
set -e

if [ -n "$RENDER_EXTERNAL_URL" ] && [ -z "$APP_URL" ]; then
    export APP_URL="$RENDER_EXTERNAL_URL"
fi

if [ -z "$APP_KEY" ]; then
    echo "ERREUR: APP_KEY manquant. Ajoutez-le dans les variables Render."
    exit 1
fi

php artisan config:clear
php artisan migrate --force
php artisan db:seed --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Demarrage sur le port ${PORT}..."
php artisan serve --host=0.0.0.0 --port="${PORT}"
