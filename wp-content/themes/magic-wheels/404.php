<?php get_header(); ?>
<section class="mw-inner-hero">
    <div class="mw-wrap mw-inner-hero__grid">
        <div>
            <p class="mw-eyebrow">404</p>
            <h1>This page is not part of the current scooter program</h1>
            <p>The link may have changed during the local build. Use the main product, solutions, or RFQ paths below.</p>
            <div class="mw-actions">
                <?php echo mw_button('View Products', mw_products_url(), 'primary'); ?>
                <?php echo mw_button('Request a Quote', mw_rfq_url(['source' => '404']), 'accent'); ?>
            </div>
        </div>
        <div class="mw-hero-visual">
            <img src="<?php echo esc_url(mw_data_media_url('mwke082.webp')); ?>" alt="MAGIC WHEELS product">
        </div>
    </div>
</section>
<?php get_footer(); ?>
