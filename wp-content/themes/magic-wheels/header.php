<?php
if (!defined('ABSPATH')) {
    exit;
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="mw-site-header">
    <div class="mw-wrap mw-header-inner">
        <a class="mw-brand" href="<?php echo esc_url(home_url('/')); ?>">
            <span class="mw-brand-mark">MW</span>
            <span>
                MAGIC WHEELS
                <small>Kids Scooter Manufacturer</small>
            </span>
        </a>
        <button class="mw-mobile-toggle" type="button" aria-label="Open navigation" aria-expanded="false" data-nav-toggle>
            <span>Menu</span>
        </button>
        <nav class="mw-nav" data-nav-menu>
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'container' => false,
                'fallback_cb' => 'mw_fallback_primary_nav',
                'items_wrap' => '%3$s',
            ]);
            ?>
            <?php echo mw_button('Request a Quote', home_url('/contact/'), 'accent'); ?>
        </nav>
    </div>
</header>
<main>
