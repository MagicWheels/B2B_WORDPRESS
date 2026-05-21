<?php get_header(); ?>
<section class="mw-products-hero">
    <div class="mw-wrap mw-products-hero__inner">
        <div>
            <p class="mw-eyebrow">Product Category</p>
            <h1><?php single_term_title(); ?></h1>
            <?php if (term_description()) : ?>
                <p><?php echo wp_kses_post(term_description()); ?></p>
            <?php else : ?>
                <p>Review buyer-ready scooter models by category, age range, packaging, and target-market compliance needs.</p>
            <?php endif; ?>
        </div>
        <div class="mw-products-lineup" aria-hidden="true">
            <img src="<?php echo esc_url(mw_asset_url('images/product-tnt-blue-tile.webp')); ?>" alt="">
            <img src="<?php echo esc_url(mw_asset_url('images/product-prek-tile.webp')); ?>" alt="">
            <img src="<?php echo esc_url(mw_asset_url('images/product-balance-bike-tile.webp')); ?>" alt="">
        </div>
    </div>
</section>
<section class="mw-page-content">
    <div class="mw-wrap">
        <div class="mw-product-grid">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/product-card'); ?>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
