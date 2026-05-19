<?php
if (!defined('ABSPATH')) {
    exit;
}

$file = ABSPATH . 'data/products.json';

if (!file_exists($file)) {
    WP_CLI::error('Missing data/products.json');
}

$products = json_decode((string) file_get_contents($file), true);

if (!is_array($products)) {
    WP_CLI::error('Invalid products JSON.');
}

foreach ($products as $product) {
    $slug = sanitize_title($product['slug'] ?? $product['title']);
    $existing = get_page_by_path($slug, OBJECT, MW_PRODUCT_POST_TYPE);

    $post_data = [
        'post_type' => MW_PRODUCT_POST_TYPE,
        'post_status' => 'publish',
        'post_title' => sanitize_text_field($product['title']),
        'post_name' => $slug,
        'post_excerpt' => sanitize_text_field($product['excerpt'] ?? ''),
        'post_content' => wp_kses_post($product['content'] ?? ''),
    ];

    if ($existing) {
        $post_data['ID'] = $existing->ID;
        $post_id = wp_update_post($post_data, true);
    } else {
        $post_id = wp_insert_post($post_data, true);
    }

    if (is_wp_error($post_id)) {
        WP_CLI::warning('Failed: ' . $product['title'] . ' - ' . $post_id->get_error_message());
        continue;
    }

    if (!empty($product['category'])) {
        wp_set_object_terms($post_id, [$product['category']], MW_PRODUCT_TAXONOMY);
        update_post_meta($post_id, '_mw_category_label', sanitize_text_field($product['category']));
    }

    foreach (mw_product_fields() as $key => $label) {
        if (!array_key_exists($key, $product)) {
            continue;
        }

        update_post_meta($post_id, '_mw_' . $key, sanitize_text_field((string) $product[$key]));
    }

    WP_CLI::success('Imported product: ' . $product['title']);
}

flush_rewrite_rules();
WP_CLI::success('Product import complete.');
