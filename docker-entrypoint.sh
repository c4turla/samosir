#!/bin/bash
set -e

if [ -f /var/www/html/.env ]; then
    sed -i "s|database.default.hostname = .*|database.default.hostname = ${DB_HOST:-db}|" /var/www/html/.env
    sed -i "s|database.default.database = .*|database.default.database = ${DB_DATABASE:-samosir}|" /var/www/html/.env
    sed -i "s|database.default.username = .*|database.default.username = ${DB_USERNAME:-samosir}|" /var/www/html/.env
    sed -i "s|database.default.password = .*|database.default.password = ${DB_PASSWORD}|" /var/www/html/.env
    if [ -n "${APP_URL}" ]; then
        if grep -q "^[[:space:]]*app.baseURL" /var/www/html/.env; then
            sed -i "s|^[[:space:]]*app.baseURL = .*|app.baseURL = '${APP_URL}'|" /var/www/html/.env
        else
            echo "app.baseURL = '${APP_URL}'" >> /var/www/html/.env
        fi
    fi
fi

mkdir -p /var/www/html/writable/cache /var/www/html/writable/logs /var/www/html/writable/session
chown -R www-data:www-data /var/www/html/writable
chmod -R 755 /var/www/html/writable

exec "$@"
