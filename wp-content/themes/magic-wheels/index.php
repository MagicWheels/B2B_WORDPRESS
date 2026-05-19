<?php get_header(); ?>
<section class="mw-page-hero">
    <div class="mw-wrap">
        <p class="mw-eyebrow"><?php bloginfo('name'); ?></p>
        <h1><?php echo esc_html(is_home() ? single_post_title('', false) : get_the_archive_title()); ?></h1>
    </div>
</section>
<section class="mw-page-content">
    <div class="mw-wrap mw-card-grid">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="mw-card">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php the_excerpt(); ?>
                    <?php echo mw_button('Read More', get_permalink(), 'secondary'); ?>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>
<?php get_footer(); ?>
