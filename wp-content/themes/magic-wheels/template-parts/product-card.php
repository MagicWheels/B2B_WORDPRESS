<?php
if (!defined('ABSPATH')) {
    exit;
}

$product_id = get_the_ID();
?>
<article class="mw-product-card">
    <a href="<?php the_permalink(); ?>">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('mw-card'); ?>
        <?php else : ?>
            <div style="aspect-ratio:4/3;background:#f1f5f9;"></div>
        <?php endif; ?>
    </a>
    <div class="mw-product-card__body">
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <div class="mw-product-meta">
            <?php if (mw_meta($product_id, 'model_no')) : ?>
                <span class="mw-pill"><?php echo esc_html(mw_meta($product_id, 'model_no')); ?></span>
            <?php endif; ?>
            <?php if (mw_meta($product_id, 'age')) : ?>
                <span class="mw-pill"><?php echo esc_html(mw_meta($product_id, 'age')); ?></span>
            <?php endif; ?>
            <?php if (mw_meta($product_id, 'max_weight')) : ?>
                <span class="mw-pill"><?php echo esc_html(mw_meta($product_id, 'max_weight')); ?></span>
            <?php endif; ?>
        </div>
        <?php if (has_excerpt()) : ?>
            <p><?php echo esc_html(get_the_excerpt()); ?></p>
        <?php endif; ?>
        <?php echo mw_button('View Details', get_permalink(), 'secondary'); ?>
    </div>
</article>
