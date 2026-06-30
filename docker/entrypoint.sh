#!/bin/sh
set -e

if [ -n "$RENDER_EXTERNAL_URL" ]; then
    export APP_URL="${APP_URL:-$RENDER_EXTERNAL_URL}"
fi

# Render generateValue ne met pas toujours le prefixe base64: requis par Laravel
case "${APP_KEY:-}" in
    base64:*) ;;
    *)
        export APP_KEY="base64:$(openssl rand -base64 32)"
        ;;
esac

mkdir -p database storage/framework/sessions storage/framework/views storage/framework/cache/data storage/logs bootstrap/cache
touch database/database.sqlite

php artisan config:clear
php artisan migrate --force
php artisan db:seed --force || true
php artisan storage:link --force 2>/dev/null || true

echo "Demarrage sur le port ${PORT:-10000}..."
exec php artisan serve --host=0.0.0.0 --port="${PORT:-10000}"
