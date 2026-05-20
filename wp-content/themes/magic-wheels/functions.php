<?php
if (!defined('ABSPATH')) {
    exit;
}

add_action('after_setup_theme', 'mw_theme_setup');
add_action('wp_enqueue_scripts', 'mw_theme_assets');

function mw_theme_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('custom-logo', [
        'height' => 80,
        'width' => 260,
        'flex-height' => true,
        'flex-width' => true,
    ]);

    register_nav_menus([
        'primary' => 'Primary Navigation',
        'footer' => 'Footer Navigation',
    ]);

    add_image_size('mw-card', 720, 540, false);
    add_image_size('mw-hero', 1680, 980, false);
}

function mw_theme_assets(): void
{
    $theme = wp_get_theme();

    wp_enqueue_style(
        'mw-theme',
        get_template_directory_uri() . '/assets/css/site.css',
        [],
        $theme->get('Version')
    );

    wp_enqueue_script(
        'mw-site',
        get_template_directory_uri() . '/assets/js/site.js',
        [],
        $theme->get('Version'),
        true
    );
}

function mw_button(string $label, string $url, string $variant = 'primary'): string
{
    return sprintf(
        '<a class="mw-button mw-button--%s" href="%s">%s</a>',
        esc_attr($variant),
        esc_url($url),
        esc_html($label)
    );
}

function mw_meta(int $post_id, string $key, string $fallback = ''): string
{
    if (function_exists('mw_get_product_meta')) {
        $value = mw_get_product_meta($post_id, $key);
        return $value !== '' ? $value : $fallback;
    }

    return $fallback;
}

function mw_fallback_primary_nav(): void
{
    $links = [
        'Products' => '/products/',
        'Solutions' => '/solutions/',
        'OEM/ODM' => '/oem-odm/',
        'Quality' => '/quality-compliance/',
        'Factory' => '/factory/',
        'Resources' => '/resources/',
        'About' => '/about/',
    ];

    foreach ($links as $label => $url) {
        echo '<a href="' . esc_url(home_url($url)) . '">' . esc_html($label) . '</a>';
    }
}
