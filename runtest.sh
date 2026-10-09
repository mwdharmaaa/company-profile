#!/usr/bin/env bash
set -euo pipefail

echo "=========================================================="
echo "  MONOCORP Test Automation Runner"
echo "=========================================================="

php artisan test

echo "=========================================================="
echo "  [OK] All test suites completed successfully."
echo "=========================================================="
