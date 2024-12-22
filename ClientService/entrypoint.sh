#!/usr/bin/env sh
set -e

cd /app
composer install
exec "$@"