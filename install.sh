#!/bin/zsh

echo "Copying environment variables"
cp .env.example .env

echo "Installing composer dependencies"
composer install

echo "Generating application key"
php artisan key:generate

echo "Running database migration"
php artisan migrate

echo "Symlink user upload folder"
php artisan storage:link

echo "Clear out cache"
php artisan filament:clear-cached-components

echo "Do you want to seed your database with dummy data?"
if read -q "choice?$1"; then
    echo
    echo "Seeding database with dummy data"
    php artisan db:seed
else
    echo
fi

echo "All done!"
