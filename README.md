# MAGIC WHEELS WordPress Build

This folder contains the WordPress implementation workspace for the MAGIC WHEELS B2B site.

## Current Approach

- Local WordPress runs through Docker Compose.
- Core content types live in `wp-content/mu-plugins/magic-wheels-core.php`.
- The custom visual theme lives in `wp-content/themes/magic-wheels`.
- Railway is used only as a temporary preview/staging environment.
- Cloudflare is reserved for DNS, SSL, CDN, and cache after production hosting is chosen.

## Local Run

Start Docker Desktop first, then run:

```powershell
docker compose up -d
```

Open:

```text
http://localhost:8080
```

If WordPress asks for installation details, use:

- Site title: `MAGIC WHEELS`
- Admin email: `chloe@shmagicwheels.com`
- Username: `magicwheels_admin`
  The setup helper prints the generated local admin password after install.

Or run the setup helper:

```powershell
.\tools\install-local.ps1
```

The helper starts Docker Compose, installs WordPress if needed, activates the MAGIC WHEELS theme, creates base pages, and imports the first product set.

## WP-CLI

Run WP-CLI through Docker:

```powershell
docker compose --profile tools run --rm wpcli wp --info
```

## Import First Products

After WordPress is installed and the theme is active:

```powershell
docker compose --profile tools run --rm wpcli wp eval-file tools/import-products.php
```

To import first featured images:

```powershell
docker compose --profile tools run --rm wpcli wp eval-file tools/import-featured-images.php
```

## Base Pages

The setup script creates these pages:

- Products
- Solutions
- OEM/ODM
- Quality & Compliance
- Factory
- Case Studies
- Resources
- About
- RFQ / Contact

## Theme

Activate the theme in WordPress admin:

```text
Appearance -> Themes -> MAGIC WHEELS
```

Or via WP-CLI:

```powershell
docker compose --profile tools run --rm wpcli wp theme activate magic-wheels
```
