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
        $message = '<div class="mw-form-status">Thank you. We have received your request. We\'ll get back to you shortly.</div>';
    }

    $action = esc_url(admin_url('admin-post.php'));

    ob_start();
    ?>
    <?php echo $message; ?>
    <form class="mw-rfq-form" method="post" action="<?php echo $action; ?>" enctype="multipart/form-data">
        <input type="hidden" name="action" value="magic_wheels_rfq">
        <?php wp_nonce_field('magic_wheels_rfq', 'magic_wheels_rfq_nonce'); ?>
        <label>
            <span>Name *</span>
            <input name="name" type="text" placeholder="Your full name" required>
        </label>
        <label>
            <span>Email *</span>
            <input name="email" type="email" placeholder="name@company.com" required>
        </label>
        <label>
            <span>WhatsApp / Phone *</span>
            <input name="phone" type="text" placeholder="Include country code if available" required>
        </label>
        <label>
            <span>Country (Buyer Location) *</span>
            <input name="country" type="text" placeholder="United States, Germany, UAE..." required>
        </label>
        <label>
            <span>Target Market *</span>
            <input name="target_market" type="text" placeholder="Where the products will be sold" required>
        </label>
        <label>
            <span>Company Type *</span>
            <select name="company_type" required>
                <option value="">Select company type</option>
                <option>Importer / Distributor</option>
                <option>Retail Chain</option>
                <option>Brand / ODM Buyer</option>
                <option>Wholesaler</option>
                <option>Other</option>
            </select>
        </label>
        <label>
            <span>Product Type *</span>
            <select name="product_type" required>
                <option value="">Select product category</option>
                <option>3-Wheel Toddler Scooters</option>
                <option>2-Wheel Kids Scooters</option>
                <option>Light-up Series</option>
                <option>Electric Scooters</option>
                <option>Not sure yet</option>
            </select>
        </label>
        <label>
            <span>Annual Volume</span>
            <input name="annual_volume" type="text" placeholder="e.g. 10,000 / 50,000 pcs per year">
        </label>
        <label>
            <span>Target MOQ (pcs) *</span>
            <input name="quantity" type="text" placeholder="e.g. 500, 1000, 5000+" required>
        </label>
        <label>
            <span>Target Price Range (FOB)</span>
            <select name="price_range">
                <option value="">Select target FOB price band</option>
                <option>Under $20</option>
                <option>$20 - $35</option>
                <option>$35 - $60</option>
                <option>$60 - $100</option>
                <option>Over $100</option>
                <option>Open / advise based on spec</option>
            </select>
        </label>
        <label>
            <span>Required Compliance</span>
            <input name="compliance" type="text" placeholder="EN71, ASTM, CPSIA, CE...">
        </label>
        <label>
            <span>Timeline</span>
            <input name="timeline" type="text" placeholder="Sampling date, launch season, shipment target">
        </label>
        <label>
            <span>Customization Needs</span>
            <select name="customization">
                <option value="">Select customization needs</option>
                <option>Logo / graphics</option>
                <option>Color / material</option>
                <option>Packaging / PDQ</option>
                <option>New mold / ODM development</option>
                <option>No customization yet</option>
            </select>
        </label>
        <label class="mw-field-wide">
            <span>Message / Additional Requirements</span>
            <textarea name="message" rows="5" placeholder="Please tell us more about your project, target market, special requirements, etc."></textarea>
        </label>
        <label class="mw-file-field">
            <span>File Upload (Optional)</span>
            <span class="mw-file-control">
                <input name="brief_file" type="file" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx,.xls,.xlsx" data-file-input>
                <span class="mw-file-button">Choose File</span>
                <span class="mw-file-name" data-file-name>No file selected</span>
            </span>
            <small>Supports PDF, JPG, PNG, DOC, XLS. Max size follows server settings.</small>
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
    $email = sanitize_email(wp_unslash($_POST['email'] ?? ''));
    $phone = sanitize_text_field(wp_unslash($_POST['phone'] ?? ''));
    $country = sanitize_text_field(wp_unslash($_POST['country'] ?? ''));
    $target_market = sanitize_text_field(wp_unslash($_POST['target_market'] ?? ''));
    $company_type = sanitize_text_field(wp_unslash($_POST['company_type'] ?? ''));
    $product_type = sanitize_text_field(wp_unslash($_POST['product_type'] ?? ''));
    $annual_volume = sanitize_text_field(wp_unslash($_POST['annual_volume'] ?? ''));
    $quantity = sanitize_text_field(wp_unslash($_POST['quantity'] ?? ''));
    $price_range = sanitize_text_field(wp_unslash($_POST['price_range'] ?? ''));
    $compliance = sanitize_text_field(wp_unslash($_POST['compliance'] ?? ''));
    $timeline = sanitize_text_field(wp_unslash($_POST['timeline'] ?? ''));
    $customization = sanitize_text_field(wp_unslash($_POST['customization'] ?? ''));
    $message = sanitize_textarea_field(wp_unslash($_POST['message'] ?? ''));

    $attachments = [];
    if (!empty($_FILES['brief_file']['name'])) {
        require_once ABSPATH . 'wp-admin/includes/file.php';
        $uploaded = wp_handle_upload($_FILES['brief_file'], ['test_form' => false]);
        if (isset($uploaded['file'])) {
            $attachments[] = $uploaded['file'];
        }
    }

    $recipient = get_option('admin_email', 'chloe@shmagicwheels.com');
    $subject = 'MAGIC WHEELS RFQ - ' . $name;
    $body = implode("\n\n", [
        'Name: ' . $name,
        'Email: ' . $email,
        'Phone / WhatsApp: ' . $phone,
        'Country (Buyer Location): ' . $country,
        'Target Market: ' . $target_market,
        'Buyer Type: ' . $company_type,
        'Product Category: ' . $product_type,
        'Annual Volume: ' . $annual_volume,
        'Target MOQ: ' . $quantity,
        'Target Price Range (FOB): ' . $price_range,
        'Required Compliance: ' . $compliance,
        'Timeline: ' . $timeline,
        'Customization Needs: ' . $customization,
        'Message:',
        $message,
    ]);

    wp_mail($recipient, $subject, $body, ['Reply-To: ' . $email], $attachments);

    $redirect = wp_get_referer() ?: home_url('/contact/');
    wp_safe_redirect(add_query_arg('rfq', 'sent', $redirect));
    exit;
}
