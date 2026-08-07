#!/bin/bash
set -e

if [ -f /var/www/html/.env ]; then
    sed -i "s|database.default.hostname = .*|database.default.hostname = ${DB_HOST:-db}|" /var/www/html/.env
    sed -i "s|database.default.database = .*|database.default.database = ${DB_DATABASE:-samosir}|" /var/www/html/.env
    sed -i "s|database.default.username = .*|database.default.username = ${DB_USERNAME:-samosir}|" /var/www/html/.env
    sed -i "s|database.default.password = .*|database.default.password = ${DB_PASSWORD}|" /var/www/html/.env
fi

chown -R www-data:www-data /var/www/html/writable
chmod -R 755 /var/www/html/writable

exec "$@"
