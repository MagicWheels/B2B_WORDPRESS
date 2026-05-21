<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
    <section class="mw-inner-hero">
        <div class="mw-wrap">
            <nav class="mw-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span>/</span>
                <a href="<?php echo esc_url(home_url('/resources/')); ?>">Resources</a>
                <span>/</span>
                <span><?php the_title(); ?></span>
            </nav>
            <p class="mw-eyebrow">Buyer Guide</p>
            <h1><?php the_title(); ?></h1>
            <?php if (has_excerpt()) : ?>
                <p><?php echo esc_html(get_the_excerpt()); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <section class="mw-page-content">
        <div class="mw-wrap mw-article-shell">
            <article class="mw-article-body">
                <figure class="mw-article-media">
                    <img src="<?php echo esc_url(mw_asset_url('images/case-study.webp')); ?>" alt="Procurement guide visual summary">
                </figure>
                <?php the_content(); ?>
            </article>
            <aside class="mw-article-sidebar">
                <div class="mw-card">
                    <h2>Need a sourcing answer?</h2>
                    <p class="mw-muted">Share your target market, compliance requirements, estimated volume, and timeline.</p>
                    <?php echo mw_button('Request a Quote', mw_rfq_url(['source' => 'article']), 'accent'); ?>
                </div>
                <div class="mw-card">
                    <h2>Related links</h2>
                    <a class="mw-text-link" href="<?php echo esc_url(mw_products_url()); ?>">View product models -></a><br>
                    <a class="mw-text-link" href="<?php echo esc_url(home_url('/quality-compliance/')); ?>">Quality & compliance -></a><br>
                    <a class="mw-text-link" href="<?php echo esc_url(home_url('/oem-odm/')); ?>">OEM/ODM support -></a>
                </div>
            </aside>
        </div>
    </section>
<?php endwhile; ?>
<?php get_footer(); ?>
