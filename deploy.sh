#!/bin/bash

echo "🔄 Déploiement Laravel..."

cd /home/lucasduv/portfolio_laravel || exit 1

echo "📦 Dépendances Composer"
composer install --no-dev --optimize-autoloader

echo "🗃️ Migrations"
php artisan migrate --force

echo "⚡ Cache & optimisation"
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan optimize

echo "✅ Déploiement terminé"
