set -e
cd perumahan-web
mkdir -p /tmp/views
KEY="base64:$(node -e "process.stdout.write(require('crypto').randomBytes(32).toString('base64'))")"
cat > .env <<EOF
APP_NAME="Bintang Emerald Properti"
APP_ENV=production
APP_KEY=${KEY}
APP_DEBUG=false
APP_URL=https://perumahanone.vercel.app

APP_LOCALE=id
APP_FALLBACK_LOCALE=id
APP_FAKER_LOCALE=id_ID

APP_MAINTENANCE_DRIVER=file

BCRYPT_ROUNDS=12

LOG_CHANNEL=errorlog
LOG_LEVEL=debug

DB_CONNECTION=sqlite
DB_DATABASE=/tmp/database.sqlite

SESSION_DRIVER=cookie
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync

CACHE_STORE=array

MAIL_MAILER=log
MAIL_FROM_ADDRESS="info@bintang-emerald.co.id"
MAIL_FROM_NAME="${APP_NAME}"

VIEW_COMPILED_PATH=/tmp/views
VITE_APP_NAME="${APP_NAME}"
EOF
composer install --no-dev --prefer-dist --optimize-autoloader
npm ci
npm run build
