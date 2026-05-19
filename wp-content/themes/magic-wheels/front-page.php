<?php get_header(); ?>
<section class="mw-hero">
    <div class="mw-wrap mw-hero__grid">
        <div>
            <p class="mw-eyebrow">Compliance-ready kids scooter manufacturer</p>
            <h1>MAGIC WHEELS | Kids Scooters for Retail and OEM/ODM Programs</h1>
            <p>Based in Shanghai with factory capability in Anhui, MAGIC WHEELS supports global buyers with product development, compliance support, packaging, QC, and lead-time planning.</p>
            <div class="mw-actions">
                <?php echo mw_button('Request a Quote', home_url('/contact/'), 'accent'); ?>
                <?php echo mw_button('View Models', get_post_type_archive_link(MW_PRODUCT_POST_TYPE) ?: home_url('/products/'), 'secondary'); ?>
            </div>
        </div>
        <aside class="mw-hero-panel" aria-label="Trust points">
            <dl>
                <div>
                    <dt>Founded</dt>
                    <dd>2009</dd>
                </div>
                <div>
                    <dt>Patents</dt>
                    <dd>50+</dd>
                </div>
                <div>
                    <dt>Programs</dt>
                    <dd>OEM/ODM</dd>
                </div>
                <div>
                    <dt>Compliance</dt>
                    <dd>EN / ASTM</dd>
                </div>
            </dl>
        </aside>
    </div>
</section>

<section class="mw-section">
    <div class="mw-wrap">
        <div class="mw-section-head">
            <h2>Built for B2B buying decisions</h2>
            <p>Clear product evaluation, manufacturing credibility, and RFQ-ready project information for importers, distributors, retail buyers, and brand teams.</p>
        </div>
        <div class="mw-card-grid">
            <article class="mw-card">
                <h3>Compliance Support</h3>
                <p>EN / ASTM documentation support, report request flow, and target-market review before project launch.</p>
            </article>
            <article class="mw-card">
                <h3>OEM/ODM Development</h3>
                <p>Custom colors, graphics, packaging, molds, and program planning for brand and retail teams.</p>
            </article>
            <article class="mw-card">
                <h3>Retail-Ready Packaging</h3>
                <p>Packaging, PDQ, loading, and shelf presentation support for high-volume buyer programs.</p>
            </article>
        </div>
    </div>
</section>

<section class="mw-section mw-section--soft">
    <div class="mw-wrap">
        <div class="mw-section-head">
            <h2>Core product programs</h2>
            <p>Start with the main scooter families and request model recommendations by target market, age range, and compliance needs.</p>
        </div>
        <div class="mw-card-grid">
            <?php
            $products = new WP_Query([
                'post_type' => defined('MW_PRODUCT_POST_TYPE') ? MW_PRODUCT_POST_TYPE : 'post',
                'posts_per_page' => 3,
            ]);
            ?>
            <?php if ($products->have_posts()) : ?>
                <?php while ($products->have_posts()) : $products->the_post(); ?>
                    <?php get_template_part('template-parts/product-card'); ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <article class="mw-card">
                    <h3>3-Wheel Toddler Scooters</h3>
                    <p>Stable beginner-friendly designs with wide decks, LED options, and retail packaging support.</p>
                </article>
                <article class="mw-card">
                    <h3>2-Wheel Kids Scooters</h3>
                    <p>Foldable and adjustable scooter concepts for growing riders and importer programs.</p>
                </article>
                <article class="mw-card">
                    <h3>Electric / Bubble Scooters</h3>
                    <p>Feature-rich kids mobility programs with battery, bubble, and packaging review by project.</p>
                </article>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="mw-section">
    <div class="mw-wrap">
        <div class="mw-section-head">
            <h2>Tell us your launch plan</h2>
            <p>Share your target market, age range, compliance needs, quantity, and packaging requirements. We will recommend suitable models and next steps.</p>
        </div>
        <?php echo do_shortcode('[magic_wheels_rfq]'); ?>
    </div>
</section>
<?php get_footer(); ?>
