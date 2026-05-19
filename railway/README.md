# Railway Preview Deployment

This directory documents the temporary preview deployment path for MAGIC WHEELS.

Railway should run:

- One WordPress service built from `railway/Dockerfile`.
- One MySQL service.
- One persistent volume mounted to `/var/www/html/wp-content/uploads`.

Required WordPress environment variables:

- `WORDPRESS_DB_HOST`
- `WORDPRESS_DB_USER`
- `WORDPRESS_DB_PASSWORD`
- `WORDPRESS_DB_NAME`

Preview admin email:

- `chloe@shmagicwheels.com`

Boundary:

- This is a staging/demo environment.
- Do not treat Railway as the long-term production host.
- Before production migration, export database and `wp-content/uploads`.
