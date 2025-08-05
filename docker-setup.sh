#!/bin/bash

echo "🚀 Setting up Laravel LMS with Docker..."

# Copy environment file
cp .env.docker .env

# Build and start containers
docker-compose up -d --build

# Wait for database to be ready
echo "⏳ Waiting for database to be ready..."
sleep 30

# Install dependencies and setup Laravel
docker-compose exec app composer install --optimize-autoloader
docker-compose exec app php artisan key:generate --force
docker-compose exec app php artisan storage:link
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan migrate --force
docker-compose exec app php artisan db:seed --force

# Set permissions
docker-compose exec app chown -R www-data:www-data /var/www/storage
docker-compose exec app chown -R www-data:www-data /var/www/bootstrap/cache

echo "✅ Setup complete!"
echo "🌐 Application: http://localhost:8000"
echo "🗄️  phpMyAdmin: http://localhost:8082"
echo "📊 Database: localhost:3308"