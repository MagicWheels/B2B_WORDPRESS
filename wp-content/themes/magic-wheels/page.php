<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
    <section class="mw-page-hero">
        <div class="mw-wrap">
            <p class="mw-eyebrow">MAGIC WHEELS</p>
            <h1><?php the_title(); ?></h1>
            <?php if (has_excerpt()) : ?>
                <p><?php echo esc_html(get_the_excerpt()); ?></p>
            <?php endif; ?>
        </div>
    </section>
    <section class="mw-page-content">
        <div class="mw-wrap">
            <?php the_content(); ?>
        </div>
    </section>
<?php endwhile; ?>
<?php get_footer(); ?>
