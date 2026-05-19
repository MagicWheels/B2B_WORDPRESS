FROM wordpress:php8.3-apache

RUN curl -fsSL -o /usr/local/bin/wp https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    && chmod +x /usr/local/bin/wp

COPY wp-content/themes/magic-wheels /var/www/html/wp-content/themes/magic-wheels
COPY wp-content/mu-plugins /var/www/html/wp-content/mu-plugins
COPY data /var/www/html/data
COPY tools /var/www/html/tools
COPY railway/entrypoint.sh /usr/local/bin/magic-wheels-railway-entrypoint

RUN chmod +x /usr/local/bin/magic-wheels-railway-entrypoint \
    && chown -R www-data:www-data /var/www/html/wp-content /var/www/html/data /var/www/html/tools

ENTRYPOINT ["magic-wheels-railway-entrypoint"]
CMD ["apache2-foreground"]
