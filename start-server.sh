#!/bin/bash

if [ ! -f ".env" ]; then
    cp .env.example .env
fi

php artisan queue:work &
echo "Redis queue started" &
php artisan serve &
php artisan serve --port=9000

