<?php get_header(); ?>
<section class="mw-inner-hero mw-inner-hero--image" style="--mw-hero-image: url('<?php echo esc_url(mw_asset_url('images/qc-onsite-2-wide.webp')); ?>');">
    <div class="mw-wrap">
        <p class="mw-eyebrow">Quality & Compliance</p>
        <h1>Quality Control and Compliance Support for Kids Scooter Programs</h1>
        <p>MAGIC WHEELS supports buyer evaluation with structured inspection workflows, target-market compliance discussion, third-party testing support, and document review by project.</p>
        <div class="mw-actions">
            <?php echo mw_button('Request Documents', mw_rfq_url(['need' => 'quality-documents']), 'accent'); ?>
            <?php echo mw_button('View Factory', home_url('/factory/'), 'secondary'); ?>
        </div>
    </div>
</section>

<section class="mw-section mw-section--tight">
    <div class="mw-wrap mw-card-grid">
        <article class="mw-card">
            <span class="mw-icon-badge">IQC</span>
            <h2>Incoming Inspection</h2>
            <p class="mw-muted">Key incoming materials and components can be checked before production according to project requirements.</p>
        </article>
        <article class="mw-card">
            <span class="mw-icon-badge">IPQC</span>
            <h2>In-line Control</h2>
            <p class="mw-muted">Production checks help control assembly consistency, visual issues, wheel fit, lighting, and packaging details.</p>
        </article>
        <article class="mw-card">
            <span class="mw-icon-badge">FQC</span>
            <h2>Final Inspection</h2>
            <p class="mw-muted">AQL inspection can be arranged upon request before shipment, with inspection records prepared for buyer review.</p>
        </article>
    </div>
</section>

<section class="mw-section mw-section--soft">
    <div class="mw-wrap mw-split-feature">
        <div>
            <p class="mw-eyebrow">Target-market review</p>
            <h2>Compliance discussions before mass production</h2>
            <p class="mw-muted">Product compliance can be reviewed based on your target market, including EN, ASTM, CE, FCC, RoHS, and related requirements where applicable.</p>
            <div class="mw-logo-wall mw-logo-wall--compact" aria-label="Compliance marks and standards">
                <?php foreach (['BSCI', 'ISO 9001', 'SCAN', 'FCCA', 'Disney FAMA', 'CE', 'EN71', 'ASTM F963', 'FCC', 'RoHS', 'FSC', 'CPSIA'] as $mark) : ?>
                    <span><?php echo esc_html($mark); ?></span>
                <?php endforeach; ?>
            </div>
            <p class="mw-muted">Specific certificates and reports can be discussed by model, market, and order requirements.</p>
        </div>
        <div class="mw-split-feature__media">
            <img src="<?php echo esc_url(mw_asset_url('images/qc-onsite-3-wide.webp')); ?>" alt="Factory quality control checks">
        </div>
    </div>
</section>

<section class="mw-section mw-section--tight">
    <div class="mw-wrap">
        <div class="mw-section-head">
            <p class="mw-eyebrow">Document preview</p>
            <h2>Compliance and inspection materials available for buyer review</h2>
            <p>Available documents can be reviewed by project scope before order confirmation.</p>
        </div>
        <div class="mw-document-preview-grid">
            <?php
            $document_previews = [
                ['BSCI audit preview', 'images/cert-bsci.webp', 'certificate'],
                ['ASTM report preview', 'images/cert-astm.webp', 'certificate'],
                ['EN71 report preview', 'images/cert-en71.webp', 'certificate'],
                ['Packing and in-line review', 'images/qc-onsite-1-card.webp', 'photo'],
            ];
            foreach ($document_previews as [$label, $image, $type]) :
                ?>
                <figure class="mw-document-preview-card mw-document-preview-card--<?php echo esc_attr($type); ?>">
                    <img src="<?php echo esc_url(mw_asset_url($image)); ?>" alt="<?php echo esc_attr($label); ?>">
                    <figcaption><?php echo esc_html($label); ?></figcaption>
                </figure>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="mw-section mw-quality-docs">
    <div class="mw-wrap mw-quality-docs__grid">
        <article class="mw-card mw-quality-docs__card">
            <h2>Testing & Compliance</h2>
            <div class="mw-mini-table">
                <div><strong>US market</strong><span>ASTM / CPSIA discussion and project-specific third-party testing support.</span></div>
                <div><strong>EU market</strong><span>EN71 / EN14619 / CE-related discussion where applicable.</span></div>
                <div><strong>Electric models</strong><span>Battery, charger, speed, labeling, and target-market requirements reviewed by project.</span></div>
                <div><strong>Reports</strong><span>Available reports can be reviewed according to model and target market.</span></div>
            </div>
        </article>
        <article class="mw-card mw-quality-docs__card mw-quality-docs__card--documents">
            <h2>Document Handling</h2>
            <p class="mw-muted">MAGIC WHEELS can help buyers review required certificates, audit materials, inspection records, and pre-shipment documentation by project.</p>
            <ul class="mw-signal-list">
                <li>Test reports where available</li>
                <li>Factory audit certificates</li>
                <li>Pre-shipment documentation coordination</li>
                <li>Project-specific document support</li>
            </ul>
        </article>
    </div>
</section>

<section class="mw-section mw-section--tight mw-quality-cta-section">
    <div class="mw-wrap mw-page-cta">
        <div>
            <h2>Need to review documents before placing an RFQ?</h2>
            <p>Tell us your target market and required standards. We will prepare the appropriate document discussion path.</p>
        </div>
        <?php echo mw_button('Request Compliance Support', mw_rfq_url(['need' => 'compliance']), 'accent'); ?>
    </div>
</section>
<?php get_footer(); ?>
