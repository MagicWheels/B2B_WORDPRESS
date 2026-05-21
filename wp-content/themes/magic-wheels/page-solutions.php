<?php get_header(); ?>
<?php $programs = mw_solution_programs(); ?>
<section class="mw-inner-hero">
    <div class="mw-wrap mw-inner-hero__grid">
        <div>
            <p class="mw-eyebrow">Solutions</p>
            <h1>Scooter Manufacturing Solutions for Retail, Distribution, and ODM Programs</h1>
            <p>MAGIC WHEELS supports buyers from model selection to compliance review, packaging planning, production coordination, and export execution.</p>
            <div class="mw-actions">
                <?php echo mw_button('Request a Quote', mw_rfq_url(), 'accent'); ?>
                <?php echo mw_button('View Product Range', mw_products_url(), 'secondary'); ?>
            </div>
        </div>
        <div class="mw-hero-visual" aria-label="Scooter solution models">
            <img src="<?php echo esc_url(mw_asset_url('images/product-tnt-pink-tile.webp')); ?>" alt="Kids scooter solution model">
        </div>
    </div>
</section>

<section class="mw-section mw-section--tight">
    <div class="mw-wrap mw-kpi-strip">
        <div><strong>Retail</strong><span>Program planning, packaging, and launch coordination.</span></div>
        <div><strong>Distribution</strong><span>Range building, reorder clarity, and shipment planning.</span></div>
        <div><strong>ODM</strong><span>Concept, prototype, artwork, and tooling support.</span></div>
        <div><strong>RFQ</strong><span>Target market, compliance, volume, and timeline alignment.</span></div>
    </div>
</section>

<section class="mw-section mw-section--soft">
    <div class="mw-wrap">
        <div class="mw-section-head">
            <p class="mw-eyebrow">Buyer scenarios</p>
            <h2>Choose the track closest to your procurement task</h2>
            <p>Each track keeps the same goal: reduce sourcing ambiguity before sampling, tooling, packaging approval, and mass production.</p>
        </div>
        <div class="mw-solution-nav">
            <?php foreach ($programs as $program) : ?>
                <article class="mw-card">
                    <span class="mw-pill"><?php echo esc_html($program['eyebrow']); ?></span>
                    <h3><?php echo esc_html($program['title']); ?></h3>
                    <p class="mw-muted"><?php echo esc_html($program['copy']); ?></p>
                    <a class="mw-text-link" href="<?php echo esc_url(home_url('/solutions/' . $program['slug'] . '/')); ?>">View solution -></a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="mw-section">
    <div class="mw-wrap mw-split-feature">
        <div>
            <p class="mw-eyebrow">Operating model</p>
            <h2>From product question to buyer-ready plan</h2>
            <div class="mw-step-list">
                <article><div><h3>Clarify target market</h3><p>Age range, channel, compliance expectation, price tier, packaging, and seasonal timing.</p></div></article>
                <article><div><h3>Match products and options</h3><p>Recommend models, wheel/light options, packaging paths, and customization feasibility.</p></div></article>
                <article><div><h3>Prepare RFQ detail</h3><p>Align quantity, target documents, carton details, samples, and lead-time assumptions.</p></div></article>
                <article><div><h3>Move into project execution</h3><p>Prototype, pilot, mass production, inspection, documentation, and shipment coordination.</p></div></article>
            </div>
        </div>
        <div class="mw-split-feature__media">
            <img src="<?php echo esc_url(mw_asset_url('images/lifestyle-12v-card.webp')); ?>" alt="Kids scooter market planning scene">
        </div>
    </div>
</section>

<section class="mw-section mw-section--tight">
    <div class="mw-wrap mw-page-cta">
        <div>
            <h2>Not sure which track fits your project?</h2>
            <p>Share your target market, estimated volume, compliance needs, and launch timeline. We will help route the RFQ.</p>
        </div>
        <?php echo mw_button('Send RFQ Brief', mw_rfq_url(), 'accent'); ?>
    </div>
</section>
<?php get_footer(); ?>
