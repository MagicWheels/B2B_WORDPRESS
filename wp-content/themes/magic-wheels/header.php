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
            <span class="mw-brand-mark" aria-hidden="true">
                <span></span>
                <span></span>
            </span>
            <span>
                MAGIC WHEELS
                <small>Ride beyond imagination</small>
            </span>
        </a>
        <button class="mw-mobile-toggle" type="button" aria-label="Open navigation" aria-expanded="false" data-nav-toggle>
            <span></span>
            <span></span>
            <span></span>
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
            <button class="mw-nav-search-toggle" type="button" aria-label="Open search" aria-expanded="false" aria-controls="mw-global-search" data-search-open>
                <svg class="mw-nav-search-toggle__icon" width="18" height="18" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                    <circle cx="9" cy="9" r="6.5" stroke="currentColor" stroke-width="1.6"/>
                    <path d="M14 14l4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                </svg>
            </button>
            <?php echo mw_button('Request a Quote', mw_contact_url(), 'accent'); ?>
        </nav>
    </div>
</header>
<div id="mw-global-search" class="mw-search-overlay" role="dialog" aria-modal="true" aria-label="Search products and resources" hidden data-search-overlay>
    <button class="mw-search-overlay__backdrop" type="button" aria-label="Close search" data-search-close></button>
    <div class="mw-search-overlay__panel">
        <button class="mw-search-overlay__close" type="button" aria-label="Close search" data-search-close>
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                <path d="M5 5l10 10M15 5L5 15" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
            </svg>
        </button>
        <form class="mw-search-overlay__form" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <label class="screen-reader-text" for="mw-global-search-input">Search</label>
            <svg class="mw-search-overlay__icon" width="22" height="22" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                <circle cx="9" cy="9" r="6.5" stroke="currentColor" stroke-width="1.6"/>
                <path d="M14 14l4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
            </svg>
            <input id="mw-global-search-input" type="search" name="s" placeholder="Search models, products, guides" value="<?php echo esc_attr(get_search_query()); ?>" autocomplete="off" data-search-input>
            <button class="mw-search-overlay__submit" type="submit">Search</button>
        </form>
    </div>
</div>
<main>
