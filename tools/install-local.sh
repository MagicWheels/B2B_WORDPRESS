#!/usr/bin/env bash
set -euo pipefail

site_url="${WORDPRESS_SITE_URL:-http://localhost:8080}"
admin_user="${WORDPRESS_ADMIN_USER:-magicwheels_admin}"
admin_email="${WORDPRESS_ADMIN_EMAIL:-chloe@shmagicwheels.com}"
admin_password="${WORDPRESS_ADMIN_PASSWORD:-MW-$(uuidgen | tr -d '-' | cut -c 1-14)}"

compose() {
  docker compose "$@"
}

compose up -d
compose exec wordpress chmod -R 777 /var/www/html/wp-content/uploads

echo "Waiting for WordPress to become available..."
for _ in $(seq 1 60); do
  if curl -fsS "$site_url/wp-admin/install.php" >/dev/null || curl -fsS "$site_url" >/dev/null; then
    break
  fi
  sleep 2
done

if ! compose --profile tools run --rm wpcli wp core is-installed --allow-root >/dev/null 2>&1; then
  compose --profile tools run --rm wpcli wp core install \
    --url="$site_url" \
    --title="MAGIC WHEELS" \
    --admin_user="$admin_user" \
    --admin_password="$admin_password" \
    --admin_email="$admin_email" \
    --skip-email \
    --allow-root
fi

compose --profile tools run --rm wpcli wp eval-file tools/setup-site.php --allow-root
compose --profile tools run --rm wpcli wp eval-file tools/import-products.php --allow-root
compose --profile tools run --rm wpcli wp eval-file tools/import-featured-images.php --allow-root

echo "MAGIC WHEELS WordPress is ready at $site_url"
echo "Admin user: $admin_user"
echo "Admin password: $admin_password"
