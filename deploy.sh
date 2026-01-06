#!/bin/bash

echo "🚀 Déploiement Laravel"

APP_PATH="/home/lucasduv/portfolio_laravel"
PUBLIC_PATH="/home/lucasduv/public_html"

cd "$APP_PATH" || exit 1

echo "📦 Composer"
composer install --no-dev --optimize-autoloader || exit 1

echo "🧹 Nettoyage public_html"
rm -rf "$PUBLIC_PATH"/*

echo "📁 Copie du dossier public/"
cp -R "$APP_PATH/public/"* "$PUBLIC_PATH/"

echo "🔐 Permissions Laravel"
chmod -R 775 storage bootstrap/cache

echo "🗃️ Migrations"
php artisan migrate --force || exit 1

echo "⚡ Optimisation"
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan optimize

# 🔧 Fix Apache Ni-Host (NE PAS SUPPRIMER)
cp /home/lucasduv/server_fixes/index.php /home/lucasduv/public_html/index.php
cp /home/lucasduv/server_fixes/.htaccess /home/lucasduv/public_html/.htaccess
chmod 644 /home/lucasduv/public_html/index.php
chmod 644 /home/lucasduv/public_html/.htaccess

echo "✅ Déploiement terminé avec succès"
