#!/usr/bin/env bash
set -euo pipefail

echo "=========================================================="
echo "  MONOCORP Company Profile - Single-Enter Deploy Bundle"
echo "=========================================================="

# 1. Environment Configuration
if [ ! -f .env ]; then
    echo "[*] Initializing .env configuration..."
    cp .env.example .env
fi

# Ensure SQLite database exists
mkdir -p database
if [ ! -f database/database.sqlite ]; then
    echo "[*] Creating database/database.sqlite..."
    touch database/database.sqlite
fi

# 2. Dependency Resolution
echo "[*] Installing PHP dependencies..."
composer install --no-interaction --prefer-dist --optimize-autoloader

# 3. Application Key Generation
if ! grep -q "APP_KEY=base64:" .env; then
    echo "[*] Generating application encryption key..."
    php artisan key:generate --force
fi

# 4. Storage Link
echo "[*] Creating storage symlink..."
php artisan storage:link --force || true

# 5. Database Migration & Seed
echo "[*] Running database migrations..."
php artisan migrate --force

echo "[*] Seeding production demo dataset..."
php artisan db:seed --force

# 6. Production Cache Optimization
echo "[*] Warming up framework caches..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "=========================================================="
echo "  [OK] MONOCORP Deployment Complete"
echo "=========================================================="
echo "  Public URL:       http://localhost:8000"
echo "  Admin Console:    http://localhost:8000/admin"
echo "  Admin Email:      admin@monocorp.test"
echo "  Admin Password:   password123"
echo "=========================================================="
