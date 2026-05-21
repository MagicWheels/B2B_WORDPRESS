<?php get_header(); ?>
<section class="mw-inner-hero mw-inner-hero--image" style="--mw-hero-image: url('<?php echo esc_url(mw_asset_url('images/factory-office-wide.webp')); ?>');">
    <div class="mw-wrap">
        <p class="mw-eyebrow">Factory</p>
        <h1>Shanghai Office. Anhui Factory. One Standard.</h1>
        <p>MAGIC WHEELS combines Shanghai-based communication and documentation support with factory-side production, QC, packaging, and export execution.</p>
        <div class="mw-actions">
            <?php echo mw_button('Request Factory Profile', mw_rfq_url(['need' => 'factory-profile']), 'accent'); ?>
            <?php echo mw_button('Quality & Compliance', home_url('/quality-compliance/'), 'secondary'); ?>
        </div>
    </div>
</section>

<section class="mw-section mw-section--tight">
    <div class="mw-wrap mw-kpi-strip">
        <div><strong>Shanghai</strong><span>Communication, project coordination, and document support.</span></div>
        <div><strong>Anhui</strong><span>Factory-side production, QC, packing, and export execution.</span></div>
        <div><strong>2019</strong><span>Fully owned factory supporting production and quality control.</span></div>
        <div><strong>50+</strong><span>Patent references supporting product development.</span></div>
    </div>
</section>

<section class="mw-section mw-section--soft">
    <div class="mw-wrap">
        <div class="mw-section-head">
            <p class="mw-eyebrow">Factory snapshot</p>
            <h2>Production, QC, packaging, and loading in one workflow</h2>
        </div>
        <div class="mw-factory-board">
            <figure>
                <img src="<?php echo esc_url(mw_asset_url('images/factory-office-card.webp')); ?>" alt="Factory exterior">
                <figcaption>Office and factory coordination</figcaption>
            </figure>
            <figure>
                <img src="<?php echo esc_url(mw_asset_url('images/factory-exterior-card.webp')); ?>" alt="Factory campus">
                <figcaption>Production campus and export coordination</figcaption>
            </figure>
            <figure>
                <img src="<?php echo esc_url(mw_asset_url('images/qc-onsite-2-wide.webp')); ?>" alt="Factory quality inspection">
                <figcaption>Quality inspection process</figcaption>
            </figure>
            <figure>
                <img src="<?php echo esc_url(mw_asset_url('images/qc-onsite-1-card.webp')); ?>" alt="Retail packing review">
                <figcaption>Retail packing review</figcaption>
            </figure>
            <figure>
                <img src="<?php echo esc_url(mw_asset_url('images/factory-check-portrait.webp')); ?>" alt="In-line checks">
                <figcaption>In-line checks and production review</figcaption>
            </figure>
            <figure class="mw-factory-board__wide-note">
                <img src="<?php echo esc_url(mw_asset_url('images/case-study.webp')); ?>" alt="Buyer project communication">
                <figcaption>Project communication and buyer coordination</figcaption>
            </figure>
        </div>
    </div>
</section>

<section class="mw-section">
    <div class="mw-wrap mw-card-grid">
        <article class="mw-card"><span class="mw-icon-badge">01</span><h2>Factory Overview</h2><p class="mw-muted">Factory capability, production coordination, and export execution support for kids scooter buyer programs.</p></article>
        <article class="mw-card"><span class="mw-icon-badge">02</span><h2>Production Line</h2><p class="mw-muted">Assembly and related process checks can be aligned to model category, order volume, and target schedule.</p></article>
        <article class="mw-card"><span class="mw-icon-badge">03</span><h2>Quality Inspection</h2><p class="mw-muted">Incoming inspection, in-line control, and final inspection help maintain consistency during mass production.</p></article>
        <article class="mw-card"><span class="mw-icon-badge">04</span><h2>Packaging & PDQ</h2><p class="mw-muted">Color boxes, master cartons, labels, barcodes, PDQ, and pallet display needs can be planned by channel.</p></article>
        <article class="mw-card"><span class="mw-icon-badge">05</span><h2>Warehouse & Loading</h2><p class="mw-muted">Packing lists, carton checks, and container loading coordination support smooth export execution.</p></article>
        <article class="mw-card"><span class="mw-icon-badge">06</span><h2>Factory Media Pack</h2><p class="mw-muted">Factory profile, selected workshop photos, packing references, and review materials can be prepared for buyer evaluation.</p></article>
    </div>
</section>

<section class="mw-section mw-section--tight">
    <div class="mw-wrap mw-page-cta">
        <div>
            <h2>Need factory capability details for buyer evaluation?</h2>
            <p>Share the information your team or retail buyer needs. We will prepare the factory profile and document list for review.</p>
        </div>
        <?php echo mw_button('Request Factory Details', mw_rfq_url(['need' => 'factory']), 'accent'); ?>
    </div>
</section>
<?php get_footer(); ?>
