<?php get_header(); ?>
<section class="mw-inner-hero">
    <div class="mw-wrap">
        <p class="mw-eyebrow">Search</p>
        <h1>Search results for "<?php echo esc_html(get_search_query()); ?>"</h1>
        <p>Find product models, procurement guides, and buyer-support pages across MAGIC WHEELS.</p>
    </div>
</section>
<section class="mw-page-content">
    <div class="mw-wrap">
        <form class="mw-product-toolbar" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <label>
                <span class="screen-reader-text">Search site</span>
                <input name="s" type="search" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="Search product, compliance, OEM, packaging...">
            </label>
            <button class="mw-button mw-button--primary" type="submit">Search</button>
        </form>
        <div class="mw-card-grid">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article class="mw-card">
                        <span class="mw-pill"><?php echo esc_html(get_post_type_object(get_post_type())->labels->singular_name ?? 'Result'); ?></span>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php the_excerpt(); ?>
                        <a class="mw-text-link" href="<?php the_permalink(); ?>">Open result -></a>
                    </article>
                <?php endwhile; ?>
            <?php else : ?>
                <article class="mw-card">
                    <h2>No matching results yet</h2>
                    <p class="mw-muted">Try searching by model number, product category, compliance standard, packaging, or OEM/ODM.</p>
                    <?php echo mw_button('Request Help', mw_rfq_url(['source' => 'search-empty']), 'accent'); ?>
                </article>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
