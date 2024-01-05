#!/bin/bash
chmod -R 777 .
# cp .env.example .env
php artisan config:cache
php artisan route:cache
composer update
php artisan migrate
php artisan serve --host=0.0.0.0