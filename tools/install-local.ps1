$ErrorActionPreference = 'Continue'
$PSNativeCommandUseErrorActionPreference = $false

docker compose up -d
docker compose exec wordpress chmod -R 777 /var/www/html/wp-content/uploads

Write-Host 'Waiting for WordPress to become available...'
Start-Sleep -Seconds 20

$siteUrl = $env:WORDPRESS_SITE_URL
if (-not $siteUrl) { $siteUrl = 'http://localhost:8080' }

$adminUser = $env:WORDPRESS_ADMIN_USER
if (-not $adminUser) { $adminUser = 'magicwheels_admin' }

$adminEmail = $env:WORDPRESS_ADMIN_EMAIL
if (-not $adminEmail) { $adminEmail = 'chloe@shmagicwheels.com' }

$adminPassword = $env:WORDPRESS_ADMIN_PASSWORD
if (-not $adminPassword) { $adminPassword = 'MW-' + ([guid]::NewGuid().ToString('N').Substring(0, 14)) }

docker compose --profile tools run --rm wpcli wp core is-installed --allow-root *> $null
$isInstalled = $LASTEXITCODE -eq 0

if (-not $isInstalled) {
  docker compose --profile tools run --rm wpcli wp core install `
    --url="$siteUrl" `
    --title="MAGIC WHEELS" `
    --admin_user="$adminUser" `
    --admin_password="$adminPassword" `
    --admin_email="$adminEmail" `
    --skip-email `
    --allow-root
  if ($LASTEXITCODE -ne 0) { throw 'WordPress core install failed.' }
}

docker compose --profile tools run --rm wpcli wp eval-file tools/setup-site.php --allow-root
if ($LASTEXITCODE -ne 0) { throw 'Site setup failed.' }
docker compose --profile tools run --rm wpcli wp eval-file tools/import-products.php --allow-root
if ($LASTEXITCODE -ne 0) { throw 'Product import failed.' }

Write-Host "MAGIC WHEELS WordPress is ready at $siteUrl"
Write-Host "Admin user: $adminUser"
Write-Host "Admin password: $adminPassword"
