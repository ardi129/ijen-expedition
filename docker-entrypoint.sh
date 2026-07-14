#!/bin/bash
set -e

echo "Starting Docker setup for Ijen Expedition..."

# Copy .env if it doesn't exist
if [ ! -f ".env" ]; then
    echo "Copying .env.example to .env..."
    cp .env.example .env
fi

# Install PHP dependencies
echo "Installing Composer dependencies..."
composer install --no-interaction --prefer-dist --optimize-autoloader

# Install NPM dependencies
echo "Installing NPM dependencies..."
npm install

# Build frontend assets (Vite)
echo "Building frontend assets..."
npm run build

# Generate app key if needed
if ! grep -q "APP_KEY=base64:" .env; then
    echo "Generating APP_KEY..."
    php artisan key:generate
fi

# Wait for MySQL to be fully ready
echo "Waiting for database to be ready..."
until mysql -h db -u "${DB_USERNAME:-root}" ${DB_PASSWORD:+-p"$DB_PASSWORD"} -e "select 1" > /dev/null 2>&1; do
  sleep 2
  echo "Still waiting for database..."
done

echo "Database is ready!"

# Run migrations and seed
echo "Running migrations and seeding..."
php artisan migrate:fresh --seed --force

echo "Setup complete! Starting Laravel Development Server..."

# Start the application
exec php artisan serve --host=0.0.0.0 --port=8000
