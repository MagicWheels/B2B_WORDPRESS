#!/usr/bin/env bash
set -euo pipefail

if [ -n "${MYSQLHOST:-}" ]; then
    export WORDPRESS_DB_HOST="${WORDPRESS_DB_HOST:-${MYSQLHOST}:${MYSQLPORT:-3306}}"
    export WORDPRESS_DB_USER="${WORDPRESS_DB_USER:-${MYSQLUSER:-root}}"
    export WORDPRESS_DB_PASSWORD="${WORDPRESS_DB_PASSWORD:-${MYSQLPASSWORD:-}}"
    export WORDPRESS_DB_NAME="${WORDPRESS_DB_NAME:-${MYSQLDATABASE:-railway}}"
fi

export WORDPRESS_ADMIN_USER="${WORDPRESS_ADMIN_USER:-magicwheels_admin}"
export WORDPRESS_ADMIN_EMAIL="${WORDPRESS_ADMIN_EMAIL:-chloe@shmagicwheels.com}"
export WORDPRESS_SITE_TITLE="${WORDPRESS_SITE_TITLE:-MAGIC WHEELS}"

if [ -z "${WORDPRESS_ADMIN_PASSWORD:-}" ]; then
    echo "WORDPRESS_ADMIN_PASSWORD must be set for the Railway preview install." >&2
    exit 1
fi

site_url="${WORDPRESS_SITE_URL:-}"
if [ -z "$site_url" ] && [ -n "${RAILWAY_PUBLIC_DOMAIN:-}" ]; then
    site_url="https://${RAILWAY_PUBLIC_DOMAIN}"
fi
if [ -z "$site_url" ]; then
    site_url="http://localhost:${PORT:-80}"
fi

a2dismod mpm_event mpm_worker >/dev/null 2>&1 || true
a2enmod mpm_prefork rewrite >/dev/null 2>&1 || true
echo "ServerName 0.0.0.0" >/etc/apache2/conf-available/magic-wheels-servername.conf
a2enconf magic-wheels-servername >/dev/null 2>&1 || true

railway_config_extra="$(cat <<'PHP'
define('FS_METHOD', 'direct');
if (getenv('RAILWAY_PUBLIC_DOMAIN')) {
    define('WP_HOME', 'https://' . getenv('RAILWAY_PUBLIC_DOMAIN'));
    define('WP_SITEURL', 'https://' . getenv('RAILWAY_PUBLIC_DOMAIN'));
    define('FORCE_SSL_ADMIN', true);
}
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
}
PHP
)"
export WORDPRESS_CONFIG_EXTRA="${WORDPRESS_CONFIG_EXTRA:-}
${railway_config_extra}"

docker-entrypoint.sh "$@" &
apache_pid="$!"

shutdown() {
    kill -TERM "$apache_pid" 2>/dev/null || true
    wait "$apache_pid" 2>/dev/null || true
}
trap shutdown INT TERM

for _ in $(seq 1 90); do
    if [ -f /var/www/html/wp-config.php ] && wp db check --allow-root --path=/var/www/html >/dev/null 2>&1; then
        break
    fi
    sleep 2
done

if ! wp db check --allow-root --path=/var/www/html >/dev/null 2>&1; then
    echo "WordPress database is not reachable after waiting." >&2
    shutdown
    exit 1
fi

if ! wp core is-installed --allow-root --path=/var/www/html >/dev/null 2>&1; then
    wp core install \
        --allow-root \
        --path=/var/www/html \
        --url="$site_url" \
        --title="$WORDPRESS_SITE_TITLE" \
        --admin_user="$WORDPRESS_ADMIN_USER" \
        --admin_password="$WORDPRESS_ADMIN_PASSWORD" \
        --admin_email="$WORDPRESS_ADMIN_EMAIL" \
        --skip-email
fi

wp eval-file /var/www/html/tools/setup-site.php --allow-root --path=/var/www/html
wp eval-file /var/www/html/tools/import-products.php --allow-root --path=/var/www/html
wp eval-file /var/www/html/tools/import-featured-images.php --allow-root --path=/var/www/html

wait "$apache_pid"
