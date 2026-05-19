<?php get_header(); ?>
<section class="mw-page-hero">
    <div class="mw-wrap">
        <p class="mw-eyebrow">Product Category</p>
        <h1><?php single_term_title(); ?></h1>
        <?php if (term_description()) : ?>
            <p><?php echo wp_kses_post(term_description()); ?></p>
        <?php endif; ?>
    </div>
</section>
<section class="mw-page-content">
    <div class="mw-wrap">
        <div class="mw-card-grid">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/product-card'); ?>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
