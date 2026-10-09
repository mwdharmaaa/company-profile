#!/usr/bin/env bash
set -euo pipefail

echo "=========================================================="
echo "  MONOCORP Automated Database & Storage Backup Routine"
echo "=========================================================="

TIMESTAMP=$(date +"%Y%m%d_%H%M%S")
BACKUP_DIR="storage/backups"
mkdir -p "${BACKUP_DIR}"

if [ -f database/database.sqlite ]; then
    echo "[*] Exporting SQLite snapshot..."
    cp database/database.sqlite "${BACKUP_DIR}/database_${TIMESTAMP}.sqlite"
    echo "[OK] Backup saved to: ${BACKUP_DIR}/database_${TIMESTAMP}.sqlite"
else
    echo "[!] database/database.sqlite not found. Skipping database backup."
fi
