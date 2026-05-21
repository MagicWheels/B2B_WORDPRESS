<?php
if (!defined('ABSPATH')) {
    exit;
}

$product_id = get_the_ID();
$terms = defined('MW_PRODUCT_TAXONOMY') ? get_the_terms($product_id, MW_PRODUCT_TAXONOMY) : [];
$category = (!empty($terms) && !is_wp_error($terms)) ? $terms[0]->name : mw_meta($product_id, 'category_label', 'Product Program');
$category_slugs = (!empty($terms) && !is_wp_error($terms)) ? wp_list_pluck($terms, 'slug') : [];
$model_no = mw_meta($product_id, 'model_no');
$model_class = $model_no !== '' ? ' mw-product-card--model-' . sanitize_html_class(strtolower($model_no)) : '';
$moq = mw_meta($product_id, 'moq');
$age = mw_meta($product_id, 'age');
$max_weight = mw_meta($product_id, 'max_weight');
$wheel = mw_meta($product_id, 'wheel');
$compliance = mw_meta($product_id, 'compliance');
$moq_number = preg_match('/\d+/', $moq, $moq_matches) ? (int) $moq_matches[0] : 0;
$age_min = preg_match('/\d+/', $age, $age_matches) ? (int) $age_matches[0] : 0;
$max_load = preg_match('/\d+/', $max_weight, $load_matches) ? (int) $load_matches[0] : 0;
$search_content = strtolower(wp_strip_all_tags(implode(' ', [
    get_the_title(),
    $category,
    $model_no,
    $age,
    $wheel,
    $max_weight,
    $moq,
    $compliance,
    get_the_excerpt(),
])));
?>
<article
    class="mw-product-card<?php echo esc_attr($model_class); ?>"
    data-product-card
    data-category-slugs="<?php echo esc_attr(implode(' ', $category_slugs)); ?>"
    data-search-content="<?php echo esc_attr($search_content); ?>"
    data-moq="<?php echo esc_attr((string) $moq_number); ?>"
    data-age-min="<?php echo esc_attr((string) $age_min); ?>"
    data-max-load="<?php echo esc_attr((string) $max_load); ?>"
    data-compliance="<?php echo esc_attr(strtolower($compliance)); ?>"
>
    <a class="mw-product-card__image" href="<?php the_permalink(); ?>">
        <img src="<?php echo esc_url(mw_product_card_media_url($product_id)); ?>" width="720" height="540" alt="<?php the_title_attribute(); ?>">
    </a>
    <div class="mw-product-card__body">
        <span class="mw-product-card__category"><?php echo esc_html($category); ?></span>
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <div class="mw-product-meta">
            <?php foreach (['model_no', 'age', 'max_weight'] as $meta_key) : ?>
                <?php if (mw_meta($product_id, $meta_key)) : ?>
                    <span class="mw-pill"><?php echo esc_html(mw_meta($product_id, $meta_key)); ?></span>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <?php if (has_excerpt() && !is_post_type_archive(MW_PRODUCT_POST_TYPE) && !(defined('MW_PRODUCT_TAXONOMY') && is_tax(MW_PRODUCT_TAXONOMY))) : ?>
            <p><?php echo esc_html(get_the_excerpt()); ?></p>
        <?php endif; ?>
        <div class="mw-product-card__actions">
            <?php echo mw_button('Request Quote', add_query_arg('model', rawurlencode(get_the_title()), mw_contact_url()), 'accent'); ?>
            <a href="<?php the_permalink(); ?>">View Details -></a>
        </div>
    </div>
</article>
