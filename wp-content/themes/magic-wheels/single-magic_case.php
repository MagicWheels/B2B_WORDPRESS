<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
    <section class="mw-inner-hero">
        <div class="mw-wrap">
            <nav class="mw-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span>/</span>
                <a href="<?php echo esc_url(home_url('/case-studies/')); ?>">Case Studies</a>
                <span>/</span>
                <span><?php the_title(); ?></span>
            </nav>
            <p class="mw-eyebrow">Case study</p>
            <h1><?php the_title(); ?></h1>
            <?php if (has_excerpt()) : ?>
                <p><?php echo esc_html(get_the_excerpt()); ?></p>
            <?php endif; ?>
        </div>
    </section>
    <section class="mw-page-content">
        <div class="mw-wrap mw-article-shell">
            <article class="mw-article-body">
                <?php the_content(); ?>
            </article>
            <aside class="mw-article-sidebar">
                <div class="mw-card">
                    <h2>Discuss a similar project</h2>
                    <p class="mw-muted">Share target market, expected volume, compliance requirements, and timeline.</p>
                    <?php echo mw_button('Request Support', mw_rfq_url(['source' => 'case-detail']), 'accent'); ?>
                </div>
            </aside>
        </div>
    </section>
<?php endwhile; ?>
<?php get_footer(); ?>
