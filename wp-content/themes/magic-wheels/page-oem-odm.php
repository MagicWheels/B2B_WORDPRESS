<?php get_header(); ?>
<section class="mw-inner-hero">
    <div class="mw-wrap mw-inner-hero__grid">
        <div>
            <p class="mw-eyebrow">OEM/ODM</p>
            <h1>OEM/ODM Kids Scooter Development from Brief to Mass Production</h1>
            <p>From early concept to prototype, pilot run, and mass production, MAGIC WHEELS supports OEM/ODM scooter programs with in-house R&D, tooling coordination, packaging adaptation, and project documentation.</p>
            <div class="mw-actions">
                <?php echo mw_button('Send Your Brief', mw_rfq_url(['need' => 'odm-brief']), 'accent'); ?>
                <?php echo mw_button('View Models', mw_products_url(), 'secondary'); ?>
            </div>
        </div>
        <div class="mw-hero-visual">
            <img src="<?php echo esc_url(mw_asset_url('images/product-tnt-blue-tile.webp')); ?>" alt="OEM ODM scooter development">
        </div>
    </div>
</section>

<section class="mw-section mw-section--tight">
    <div class="mw-wrap">
        <div class="mw-section-head">
            <p class="mw-eyebrow">Development process</p>
            <h2>From idea to production-ready scooter program</h2>
        </div>
        <div class="mw-step-list">
            <article><div><h3>Brief</h3><p>Target market, age range, channel, price tier, compliance requirements, artwork direction, and timeline.</p></div></article>
            <article><div><h3>Concept & Quotation</h3><p>Model path, structural feasibility, tooling notes, packaging assumptions, and first project quote.</p></div></article>
            <article><div><h3>Prototype</h3><p>Sample build, color review, graphics proof, LED or wheel options, packaging mockup, and document list.</p></div></article>
            <article><div><h3>Pilot</h3><p>Small-run validation, inspection points, assembly checks, carton/label verification, and feedback closure.</p></div></article>
            <article><div><h3>Mass Production</h3><p>Production schedule, in-line checks, final inspection, packing, loading, and export coordination.</p></div></article>
        </div>
    </div>
</section>

<section class="mw-section mw-section--tight">
    <div class="mw-wrap">
        <div class="mw-section-head mw-section-head--row">
            <div>
                <p class="mw-eyebrow">Customization examples</p>
                <h2>Model, color, lighting, and category options buyers can brief clearly</h2>
            </div>
            <a class="mw-text-link" href="<?php echo esc_url(mw_rfq_url(['need' => 'customization'])); ?>">Send customization brief -></a>
        </div>
        <div class="mw-product-showcase">
            <?php
            $showcase_items = [
                ['LED wheel scooter', 'images/product-tnt-blue-tile.webp'],
                ['Colorway variation', 'images/product-tnt-pink-tile.webp'],
                ['Preschool platform', 'images/product-prek-tile.webp'],
                ['Balance bike option', 'images/product-balance-bike-tile.webp'],
            ];
            foreach ($showcase_items as [$label, $image]) :
                ?>
                <figure>
                    <img src="<?php echo esc_url(mw_asset_url($image)); ?>" alt="<?php echo esc_attr($label); ?>">
                    <figcaption><?php echo esc_html($label); ?></figcaption>
                </figure>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="mw-section mw-section--soft">
    <div class="mw-wrap mw-bento-grid">
        <article class="mw-card">
            <h2>Customization checklist</h2>
            <p class="mw-muted">These options can be reviewed by product platform, target market, MOQ, and launch timing.</p>
            <ul class="mw-signal-list">
                <li>Logo placement</li>
                <li>Color and graphics</li>
                <li>LED wheel / deck lighting options</li>
                <li>Structure and material optimization</li>
                <li>Color box, master carton, PDQ / pallet display</li>
                <li>Manuals, labels, barcodes, and documentation</li>
            </ul>
        </article>
        <article class="mw-card"><span class="mw-icon-badge">R&D</span><h3>In-house development</h3><p class="mw-muted">Model adaptation, concept review, sample tracking, and production-side feedback.</p></article>
        <article class="mw-card"><span class="mw-icon-badge">IP</span><h3>Confidential files</h3><p class="mw-muted">Partner information, packaging artwork, project files, and market-specific documents are handled with confidentiality.</p></article>
        <article class="mw-card"><span class="mw-icon-badge">PDQ</span><h3>Retail packaging</h3><p class="mw-muted">Color boxes, master cartons, PDQ concepts, labels, barcodes, and shelf-display requirements.</p></article>
        <article class="mw-card"><span class="mw-icon-badge">QA</span><h3>Pilot validation</h3><p class="mw-muted">Pilot checks reduce risk before mass production and shipment planning.</p></article>
    </div>
</section>

<section class="mw-section">
    <div class="mw-wrap mw-split-feature">
        <div>
            <p class="mw-eyebrow">Brief inputs</p>
            <h2>What to prepare before requesting OEM/ODM development</h2>
            <div class="mw-mini-table">
                <div><strong>Market</strong><span>Country, channel, safety expectations, and buyer documentation needs.</span></div>
                <div><strong>Product</strong><span>Age range, wheel type, lighting, folding structure, deck, handlebar, and material preferences.</span></div>
                <div><strong>Branding</strong><span>Logo, color direction, artwork files, packaging style, and display needs.</span></div>
                <div><strong>Commercials</strong><span>Estimated volume, target cost range, launch date, sample deadline, and shipping plan.</span></div>
            </div>
        </div>
        <div class="mw-split-feature__media">
            <img src="<?php echo esc_url(mw_asset_url('images/qc-onsite-3-wide.webp')); ?>" alt="Prototype and quality review">
        </div>
    </div>
</section>

<section class="mw-section mw-section--tight">
    <div class="mw-wrap mw-page-cta">
        <div>
            <h2>Have a scooter concept or retail artwork brief?</h2>
            <p>Upload a brief, artwork, or sample target. We will review the development path and RFQ assumptions.</p>
        </div>
        <?php echo mw_button('Send Your Brief', mw_rfq_url(['need' => 'odm-brief']), 'accent'); ?>
    </div>
</section>
<?php get_footer(); ?>
