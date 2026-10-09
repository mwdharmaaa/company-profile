#!/usr/bin/env bash
set -euo pipefail

echo "=========================================================="
echo "  MONOCORP Redeployment & Hot-Update Routine"
echo "=========================================================="

ACTIVE_BRANCH=$(git rev-parse --abbrev-ref HEAD 2>/dev/null || echo "devv")

echo "[*] Pulling latest commits from branch: ${ACTIVE_BRANCH}..."
git pull origin "${ACTIVE_BRANCH}" || true

echo "[*] Clearing stale cache layers..."
php artisan optimize:clear

echo "[*] Executing pending migrations..."
php artisan migrate --force

echo "[*] Re-caching production configuration..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "=========================================================="
echo "  [OK] Redeployment successfully finalized."
echo "=========================================================="
