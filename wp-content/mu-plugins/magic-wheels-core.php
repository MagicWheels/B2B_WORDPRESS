<?php
/**
 * Plugin Name: MAGIC WHEELS Core
 * Description: Content types, fields, and RFQ handling for the MAGIC WHEELS B2B site.
 * Version: 0.1.0
 */

if (!defined('ABSPATH')) {
    exit;
}

const MW_PRODUCT_POST_TYPE = 'magic_product';
const MW_CASE_POST_TYPE = 'magic_case';
const MW_TRUST_POST_TYPE = 'magic_trust';
const MW_PRODUCT_TAXONOMY = 'magic_product_category';

add_action('init', 'mw_register_content_model');
add_action('add_meta_boxes', 'mw_register_product_meta_box');
add_action('save_post_' . MW_PRODUCT_POST_TYPE, 'mw_save_product_meta');
add_shortcode('magic_wheels_rfq', 'mw_render_rfq_form');
add_action('admin_post_nopriv_magic_wheels_rfq', 'mw_handle_rfq_form');
add_action('admin_post_magic_wheels_rfq', 'mw_handle_rfq_form');
add_action('template_redirect', 'mw_redirect_common_admin_aliases');

function mw_redirect_common_admin_aliases(): void
{
    $path = trim((string) parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH), '/');

    if (in_array($path, ['admin', 'backend', 'login'], true)) {
        wp_safe_redirect(admin_url());
        exit;
    }
}

function mw_register_content_model(): void
{
    register_post_type(MW_PRODUCT_POST_TYPE, [
        'labels' => [
            'name' => 'Products',
            'singular_name' => 'Product',
            'add_new_item' => 'Add New Product',
            'edit_item' => 'Edit Product',
        ],
        'public' => true,
        'menu_icon' => 'dashicons-products',
        'has_archive' => true,
        'rewrite' => ['slug' => 'products'],
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail', 'revisions'],
        'show_in_rest' => true,
    ]);

    register_taxonomy(MW_PRODUCT_TAXONOMY, MW_PRODUCT_POST_TYPE, [
        'labels' => [
            'name' => 'Product Categories',
            'singular_name' => 'Product Category',
        ],
        'public' => true,
        'hierarchical' => true,
        'rewrite' => ['slug' => 'product-category'],
        'show_in_rest' => true,
    ]);

    foreach (array_keys(mw_product_fields()) as $key) {
        register_post_meta(MW_PRODUCT_POST_TYPE, '_mw_' . $key, [
            'type' => 'string',
            'single' => true,
            'show_in_rest' => true,
            'auth_callback' => static function (): bool {
                return current_user_can('edit_posts');
            },
        ]);
    }

    register_post_type(MW_CASE_POST_TYPE, [
        'labels' => [
            'name' => 'Case Studies',
            'singular_name' => 'Case Study',
        ],
        'public' => true,
        'menu_icon' => 'dashicons-portfolio',
        'has_archive' => true,
        'rewrite' => ['slug' => 'case-studies'],
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail', 'revisions'],
        'show_in_rest' => true,
    ]);

    register_post_type(MW_TRUST_POST_TYPE, [
        'labels' => [
            'name' => 'Trust Marks',
            'singular_name' => 'Trust Mark',
        ],
        'public' => true,
        'menu_icon' => 'dashicons-awards',
        'has_archive' => false,
        'rewrite' => ['slug' => 'trust-marks'],
        'supports' => ['title', 'editor', 'thumbnail', 'revisions'],
        'show_in_rest' => true,
    ]);
}

function mw_product_fields(): array
{
    return [
        'model_no' => 'Model No.',
        'category_label' => 'Category Label',
        'age' => 'Age',
        'max_weight' => 'Max Weight',
        'product_size' => 'Product Size',
        'wheel' => 'Wheel / Material',
        'packaging' => 'Packaging',
        'moq' => 'MOQ',
        'lead_time' => 'Lead Time',
        'compliance' => 'Compliance Notes',
        'key_features' => 'Key Features',
        'hero_badge' => 'Hero Badge',
    ];
}

function mw_register_product_meta_box(): void
{
    add_meta_box(
        'mw_product_details',
        'B2B Product Details',
        'mw_render_product_meta_box',
        MW_PRODUCT_POST_TYPE,
        'normal',
        'high'
    );
}

function mw_render_product_meta_box(WP_Post $post): void
{
    wp_nonce_field('mw_save_product_meta', 'mw_product_meta_nonce');
    echo '<table class="form-table" role="presentation">';

    foreach (mw_product_fields() as $key => $label) {
        $value = get_post_meta($post->ID, '_mw_' . $key, true);
        echo '<tr>';
        echo '<th scope="row"><label for="mw_' . esc_attr($key) . '">' . esc_html($label) . '</label></th>';
        echo '<td>';

        if (in_array($key, ['key_features', 'compliance'], true)) {
            echo '<textarea class="large-text" rows="4" id="mw_' . esc_attr($key) . '" name="mw_' . esc_attr($key) . '">' . esc_textarea($value) . '</textarea>';
        } else {
            echo '<input class="regular-text" type="text" id="mw_' . esc_attr($key) . '" name="mw_' . esc_attr($key) . '" value="' . esc_attr($value) . '">';
        }

        echo '</td>';
        echo '</tr>';
    }

    echo '</table>';
}

function mw_save_product_meta(int $post_id): void
{
    if (!isset($_POST['mw_product_meta_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['mw_product_meta_nonce'])), 'mw_save_product_meta')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    foreach (mw_product_fields() as $key => $label) {
        $field = 'mw_' . $key;
        if (!isset($_POST[$field])) {
            continue;
        }

        $raw = wp_unslash($_POST[$field]);
        $value = in_array($key, ['key_features', 'compliance'], true)
            ? sanitize_textarea_field($raw)
            : sanitize_text_field($raw);

        update_post_meta($post_id, '_mw_' . $key, $value);
    }
}

function mw_get_product_meta(int $post_id, string $key): string
{
    return (string) get_post_meta($post_id, '_mw_' . $key, true);
}

function mw_render_rfq_form(): string
{
    $message = '';
    if (isset($_GET['rfq']) && $_GET['rfq'] === 'sent') {
        $message = '<div class="mw-form-status">Thank you. We have received your request. We will get back to you shortly.</div>';
    }

    $action = esc_url(admin_url('admin-post.php'));

    ob_start();
    ?>
    <?php echo $message; ?>
    <form class="mw-rfq-form" method="post" action="<?php echo $action; ?>">
        <input type="hidden" name="action" value="magic_wheels_rfq">
        <?php wp_nonce_field('magic_wheels_rfq', 'magic_wheels_rfq_nonce'); ?>
        <label>
            <span>Name</span>
            <input name="name" type="text" required>
        </label>
        <label>
            <span>Company</span>
            <input name="company" type="text" required>
        </label>
        <label>
            <span>Email</span>
            <input name="email" type="email" required>
        </label>
        <label>
            <span>Target Market</span>
            <input name="market" type="text">
        </label>
        <label>
            <span>Models / Project Brief</span>
            <textarea name="message" rows="5" required></textarea>
        </label>
        <button type="submit">Request a Quote</button>
    </form>
    <?php

    return (string) ob_get_clean();
}

function mw_handle_rfq_form(): void
{
    if (!isset($_POST['magic_wheels_rfq_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['magic_wheels_rfq_nonce'])), 'magic_wheels_rfq')) {
        wp_die('Invalid form submission.');
    }

    $name = sanitize_text_field(wp_unslash($_POST['name'] ?? ''));
    $company = sanitize_text_field(wp_unslash($_POST['company'] ?? ''));
    $email = sanitize_email(wp_unslash($_POST['email'] ?? ''));
    $market = sanitize_text_field(wp_unslash($_POST['market'] ?? ''));
    $message = sanitize_textarea_field(wp_unslash($_POST['message'] ?? ''));

    $recipient = get_option('admin_email', 'chloe@shmagicwheels.com');
    $subject = 'MAGIC WHEELS RFQ - ' . ($company ?: $name);
    $body = implode("\n\n", [
        'Name: ' . $name,
        'Company: ' . $company,
        'Email: ' . $email,
        'Target Market: ' . $market,
        'Message:',
        $message,
    ]);

    wp_mail($recipient, $subject, $body, ['Reply-To: ' . $email]);

    $redirect = wp_get_referer() ?: home_url('/contact/');
    wp_safe_redirect(add_query_arg('rfq', 'sent', $redirect));
    exit;
}
