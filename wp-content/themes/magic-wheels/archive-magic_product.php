<?php get_header(); ?>
<?php
$terms = defined('MW_PRODUCT_TAXONOMY')
    ? get_terms(['taxonomy' => MW_PRODUCT_TAXONOMY, 'hide_empty' => false])
    : [];
?>
<section class="mw-products-hero">
    <div class="mw-wrap mw-products-hero__inner">
        <div>
            <p class="mw-eyebrow">Products</p>
            <h1>Kids Scooter Models for Retail and OEM/ODM Programs</h1>
            <p>Explore MAGIC WHEELS scooter programs by category. Each model can be evaluated by age range, structure, lighting options, packaging, compliance requirements, and customization needs.</p>
        </div>
        <div class="mw-products-lineup" aria-hidden="true">
            <img src="<?php echo esc_url(mw_asset_url('images/product-tnt-blue-tile.webp')); ?>" alt="">
            <img src="<?php echo esc_url(mw_asset_url('images/product-360-tile.webp')); ?>" alt="">
            <img src="<?php echo esc_url(mw_asset_url('images/product-prek-tile.webp')); ?>" alt="">
            <img src="<?php echo esc_url(mw_asset_url('images/product-balance-bike-tile.webp')); ?>" alt="">
        </div>
    </div>
</section>

<section class="mw-page-content mw-products-layout" data-product-filter>
    <div class="mw-wrap mw-products-shell">
        <aside class="mw-filter-panel" aria-label="Product filters">
            <h2>Product Categories</h2>
            <a class="is-active" href="<?php echo esc_url(mw_products_url()); ?>" data-product-category="all" aria-current="true"><span>All Products</span><strong><?php echo esc_html(wp_count_posts(MW_PRODUCT_POST_TYPE)->publish ?? 0); ?></strong></a>
            <?php if (!is_wp_error($terms)) : ?>
                <?php foreach ($terms as $term) : ?>
                    <?php
                    $term_link = get_term_link($term);
                    if (is_wp_error($term_link)) {
                        continue;
                    }
                    ?>
                    <a href="<?php echo esc_url($term_link); ?>" data-product-category="<?php echo esc_attr($term->slug); ?>">
                        <span><?php echo esc_html($term->name); ?></span>
                        <strong><?php echo esc_html((string) $term->count); ?></strong>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
            <div class="mw-filter-block">
                <h3>Filters</h3>
                <?php foreach ([
                    'moq-500' => 'MOQ: 500+',
                    'age-3' => 'Age: 3+ Years',
                    'load-20-100' => 'Max Load: 20-100 kg',
                    'cert-en-astm' => 'Certification: EN / ASTM',
                ] as $filter_key => $filter) : ?>
                    <label><input type="checkbox" data-product-filter-key="<?php echo esc_attr($filter_key); ?>"> <?php echo esc_html($filter); ?></label>
                <?php endforeach; ?>
            </div>
            <?php echo mw_button('Download Catalog', home_url('/resources/'), 'secondary'); ?>
        </aside>

        <div class="mw-products-main">
            <form class="mw-product-toolbar" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="hidden" name="post_type" value="<?php echo esc_attr(MW_PRODUCT_POST_TYPE); ?>">
                <label>
                    <span class="screen-reader-text">Search products</span>
                    <input name="s" type="search" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="Search by model name or keyword..." data-product-search>
                </label>
                <div class="mw-toolbar-selects" aria-label="Visual filter controls">
                    <span>MOQ: All</span>
                    <span>Age: All</span>
                    <span>Wheel Size: All</span>
                    <span>Certification: All</span>
                </div>
            </form>
            <div class="mw-product-grid">
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
                <article class="mw-card mw-products-empty" data-products-empty hidden>
                    <h2>No matching products</h2>
                    <p>Try another category, keyword, or filter combination.</p>
                </article>
            </div>
        </div>
    </div>
</section>

<section class="mw-section mw-section--tight">
    <div class="mw-wrap mw-compare-band">
        <div class="mw-compare-images" aria-hidden="true">
            <img src="<?php echo esc_url(mw_asset_url('images/product-tnt-pink-tile.webp')); ?>" alt="">
            <img src="<?php echo esc_url(mw_asset_url('images/product-360-tile.webp')); ?>" alt="">
            <img src="<?php echo esc_url(mw_asset_url('images/product-balance-bike-tile.webp')); ?>" alt="">
        </div>
        <div>
            <h2>Compare Models Side by Side</h2>
            <p>Use our comparison flow to evaluate specifications, features, and MOQ across multiple models.</p>
        </div>
        <div>
            <h3>Need a Custom Solution?</h3>
            <p>Tell us your target market and requirements. Our team will recommend the best options for your business.</p>
            <?php echo mw_button('Request a Quote', mw_contact_url(), 'accent'); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
