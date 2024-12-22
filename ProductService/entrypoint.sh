#!/usr/bin/env sh
set -e

cd /app
composer install
if [ ! -f /app/bin/rr ]; then
    ./vendor/bin/rr get-binary -l /app/bin
    chmod +x /app/bin/rr
fi
exec "$@"