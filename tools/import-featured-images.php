<?php
if (!defined('ABSPATH')) {
    exit;
}

require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';
require_once ABSPATH . 'wp-admin/includes/image.php';

$items = [
    'mwke082-3-wheel-scooter' => 'mwke082.png',
    'mwtp001-top-tnt-scooter' => 'mwtp001.jpg',
    'mwke005-12v-bubble-scooter' => 'mwke005.png',
    'mwke06-inline-scooter' => 'mwke06.png',
];

foreach ($items as $slug => $filename) {
    $post = get_page_by_path($slug, OBJECT, MW_PRODUCT_POST_TYPE);
    if (!$post) {
        WP_CLI::warning('Product not found: ' . $slug);
        continue;
    }

    $source = ABSPATH . 'data/media/' . $filename;
    if (!file_exists($source)) {
        WP_CLI::warning('Image missing: ' . $filename);
        continue;
    }

    $source_hash = sha1_file($source);
    $existing_attachments = get_posts([
        'post_type' => 'attachment',
        'post_status' => 'inherit',
        'posts_per_page' => 1,
        'fields' => 'ids',
        'meta_query' => [
            [
                'key' => '_mw_source_image_filename',
                'value' => $filename,
            ],
            [
                'key' => '_mw_source_image_hash',
                'value' => $source_hash,
            ],
        ],
    ]);

    if ($existing_attachments) {
        set_post_thumbnail($post->ID, (int) $existing_attachments[0]);
        WP_CLI::success('Featured image already current for ' . $slug);
        continue;
    }

    $tmp = wp_tempnam($filename);
    copy($source, $tmp);

    $file = [
        'name' => $filename,
        'tmp_name' => $tmp,
    ];

    $attachment_id = media_handle_sideload($file, $post->ID);

    if (is_wp_error($attachment_id)) {
        @unlink($tmp);
        WP_CLI::warning('Image import failed for ' . $slug . ': ' . $attachment_id->get_error_message());
        continue;
    }

    set_post_thumbnail($post->ID, $attachment_id);
    update_post_meta($attachment_id, '_mw_source_image_filename', $filename);
    update_post_meta($attachment_id, '_mw_source_image_hash', $source_hash);
    WP_CLI::success('Featured image set for ' . $slug);
}
