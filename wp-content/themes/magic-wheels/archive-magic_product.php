<?php get_header(); ?>
<section class="mw-page-hero">
    <div class="mw-wrap">
        <p class="mw-eyebrow">Products</p>
        <h1>Kids Scooter Models for Retail and OEM/ODM Programs</h1>
        <p>Explore MAGIC WHEELS scooter programs by category, age range, features, packaging, and compliance needs.</p>
    </div>
</section>
<section class="mw-page-content">
    <div class="mw-wrap">
        <div class="mw-card-grid">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template-parts/product-card'); ?>
                <?php endwhile; ?>
            <?php else : ?>
                <article class="mw-card">
                    <h2>Products are being prepared</h2>
                    <p>The first SKU set will be imported from the organized MAGIC WHEELS product materials.</p>
                </article>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
