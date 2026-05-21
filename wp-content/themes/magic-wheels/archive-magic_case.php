<?php get_header(); ?>
<?php $fallback_cases = mw_case_studies(); ?>
<section class="mw-inner-hero">
    <div class="mw-wrap mw-inner-hero__grid">
        <div>
            <p class="mw-eyebrow">Case Studies</p>
            <h1>Program Experience for Retail and OEM/ODM Buyers</h1>
            <p>Selected project examples show how MAGIC WHEELS supports retail, importer, distributor, and OEM/ODM buyer programs from planning to delivery.</p>
            <div class="mw-actions">
                <?php echo mw_button('Discuss Your Program', mw_rfq_url(['source' => 'case-studies']), 'accent'); ?>
                <?php echo mw_button('View Solutions', home_url('/solutions/'), 'secondary'); ?>
            </div>
        </div>
        <div class="mw-hero-visual mw-hero-visual--photo">
            <img src="<?php echo esc_url(mw_asset_url('images/lifestyle-12v-card.webp')); ?>" alt="Case study scooter program">
        </div>
    </div>
</section>

<section class="mw-section mw-section--soft">
    <div class="mw-wrap">
        <div class="mw-section-head">
            <p class="mw-eyebrow">Buyer scenarios</p>
            <h2>Project examples for common sourcing needs</h2>
        </div>
        <div class="mw-case-list">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article class="mw-case-tile">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('mw-card'); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url(mw_asset_url('images/case-study.webp')); ?>" alt="">
                        <?php endif; ?>
                        <div>
                            <span class="mw-pill">Project example</span>
                            <h3><?php the_title(); ?></h3>
                            <?php the_excerpt(); ?>
                            <a class="mw-text-link" href="<?php the_permalink(); ?>">View case details -></a>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php else : ?>
                <?php foreach ($fallback_cases as $case) : ?>
                    <article class="mw-case-tile">
                        <img src="<?php echo esc_url($case['image']); ?>" alt="<?php echo esc_attr($case['title']); ?>">
                        <div>
                            <span class="mw-pill"><?php echo esc_html($case['type']); ?></span>
                            <h3><?php echo esc_html($case['title']); ?></h3>
                            <dl>
                                <div><dt>Challenge</dt><dd><?php echo esc_html($case['challenge']); ?></dd></div>
                                <div><dt>Solution</dt><dd><?php echo esc_html($case['solution']); ?></dd></div>
                                <div><dt>Result</dt><dd><?php echo esc_html($case['result']); ?></dd></div>
                            </dl>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="mw-section mw-section--tight">
    <div class="mw-wrap mw-page-cta">
        <div>
            <h2>Have a retail or ODM program to evaluate?</h2>
            <p>Tell us your buyer type, target market, product range, and documentation needs.</p>
        </div>
        <?php echo mw_button('Request Program Support', mw_rfq_url(['source' => 'case-studies']), 'accent'); ?>
    </div>
</section>
<?php get_footer(); ?>
