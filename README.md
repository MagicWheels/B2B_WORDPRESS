# MAGIC WHEELS WordPress Build

Repository: `MagicWheels/B2B_WORDPRESS`  
Project note: B2B website build for MAGIC WHEELS.

This repository contains the deployable WordPress implementation workspace plus the full project material folders for the MAGIC WHEELS B2B site.

## Current Approach

- Local WordPress runs through Docker Compose.
- Core content types live in `wp-content/mu-plugins/magic-wheels-core.php`.
- The custom visual theme lives in `wp-content/themes/magic-wheels`.
- Railway is used only as a temporary preview/staging environment. `railway.json` points Railway to `railway/Dockerfile`; the Railway entrypoint installs WordPress on first boot, activates the theme, creates base pages, and imports the first product set.
- Cloudflare is reserved for DNS, SSL, CDN, and cache after production hosting is chosen.

## Project Materials

The WordPress build remains at the repository root so Railway can keep deploying it. The broader project materials are stored as sibling folders:

- `01-需求与PRD`
- `02-产品资料`
- `03-工厂与合规`
- `04-网站UI`
- `05-上线配置`
- `06-企业微信待下载`
- `07-表格完整导出`
- `08-项目管理`
- `设计稿`
- `资料`
- `需求整理`
- `项目管理`

Large product, design, office, and media source files are stored with Git LFS.

## Clone On A New Machine

Install Git LFS first, then enable long Windows paths before cloning because some source material paths are deeply nested.

```powershell
git lfs install
git config --global core.longpaths true
git -c core.longpaths=true clone https://github.com/MagicWheels/B2B_WORDPRESS.git
cd B2B_WORDPRESS
git lfs pull
```

For a fast code-only checkout before downloading the large assets:

```powershell
$env:GIT_LFS_SKIP_SMUDGE='1'
git -c core.longpaths=true clone https://github.com/MagicWheels/B2B_WORDPRESS.git
cd B2B_WORDPRESS
git lfs pull
```

## Railway Preview

- Site: `https://wordpress-production-fd52.up.railway.app`
- Admin: `https://wordpress-production-fd52.up.railway.app/wp-admin/`
- Admin username: `magicwheels_admin`
- Admin email: `chloe@shmagicwheels.com`

Do not commit the Railway admin password or database secrets. They are stored as Railway service variables.

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
