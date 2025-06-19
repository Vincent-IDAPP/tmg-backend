#!/bin/sh

echo "Attente que MySQL soit prêt..."

while ! nc -z mysql 3306; do
  sleep 1
done

echo "MySQL est prêt, lancement des migrations et seeders..."

php artisan migrate --force
php artisan db:seed --force

echo "Démarrage de PHP-FPM"
php-fpm
