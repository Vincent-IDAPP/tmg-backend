#!/bin/sh

echo "⏳ Attente de MySQL..."

# Attente que MySQL soit prêt
until nc -z mysql 3306; do
  sleep 2
  echo "⏳ En attente de la BDD..."
done

echo "✅ Base de données prête. Lancement des migrations..."

# Exécuter migrations + seed
php artisan migrate:fresh --seed --force || exit 1

# Lancer PHP-FPM pour garder le conteneur actif
php-fpm
