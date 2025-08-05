#!/bin/bash

echo "🔧 Fixing Docker Laravel issues..."

# Copy environment file
docker-compose exec app cp .env.docker .env

# Generate key and setup Laravel
docker-compose exec app php artisan key:generate --force
docker-compose exec app php artisan storage:link
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan route:clear
docker-compose exec app php artisan view:clear

# Set proper permissions
docker-compose exec app chown -R www-data:www-data /var/www/storage
docker-compose exec app chown -R www-data:www-data /var/www/bootstrap/cache
docker-compose exec app chown -R www-data:www-data /var/www/public

echo "✅ Laravel Docker setup fixed!"
echo "🌐 Try accessing: http://localhost:8000"