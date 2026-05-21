<?php get_header(); ?>
<section class="mw-inner-hero">
    <div class="mw-wrap mw-inner-hero__grid">
        <div>
            <p class="mw-eyebrow">Company</p>
            <h1>About MAGIC WHEELS</h1>
            <p>MAGIC WHEELS supports kids scooter programs with manufacturing experience, in-house development capability, compliance-aware project support, and factory-side production coordination.</p>
            <div class="mw-actions">
                <?php echo mw_button('Request a Quote', mw_rfq_url(), 'accent'); ?>
                <?php echo mw_button('View Factory', home_url('/factory/'), 'secondary'); ?>
            </div>
        </div>
        <div class="mw-hero-visual mw-hero-visual--photo">
            <img src="<?php echo esc_url(mw_asset_url('images/factory-office-card.webp')); ?>" alt="MAGIC WHEELS factory campus">
        </div>
    </div>
</section>

<section class="mw-section mw-section--tight">
    <div class="mw-wrap mw-kpi-strip">
        <div><strong>2009</strong><span>Brand and manufacturing experience milestone.</span></div>
        <div><strong>Shanghai</strong><span>Office communication and project coordination.</span></div>
        <div><strong>Anhui</strong><span>Factory-side production and quality support.</span></div>
        <div><strong>50+</strong><span>Patent references supporting product development.</span></div>
    </div>
</section>

<section class="mw-section mw-section--soft">
    <div class="mw-wrap mw-split-feature">
        <div>
            <p class="mw-eyebrow">Procurement-first company story</p>
            <h2>Built around what global buyers need to evaluate</h2>
            <p class="mw-muted">MAGIC WHEELS supports buyers through product range selection, factory capability review, compliance discussion, customization, packaging, lead-time planning, and quotation preparation.</p>
            <div class="mw-mini-table">
                <div><strong>Company</strong><span>SHANGHAI MAGIC WHEELS SPORTING GOODS CO., LTD.</span></div>
                <div><strong>Brand</strong><span>MAGIC WHEELS</span></div>
                <div><strong>Positioning</strong><span>Kids scooter manufacturer for retail, distribution, and OEM/ODM buyer programs.</span></div>
                <div><strong>Scope</strong><span>Product development, compliance support, production coordination, QC, packaging, and export execution.</span></div>
            </div>
        </div>
        <div class="mw-split-feature__media">
            <img src="<?php echo esc_url(mw_asset_url('images/factory-exterior-card.webp')); ?>" alt="MAGIC WHEELS factory exterior">
        </div>
    </div>
</section>

<section class="mw-section">
    <div class="mw-wrap">
        <div class="mw-section-head">
            <p class="mw-eyebrow">How we support buyers</p>
            <h2>Practical support for buyer evaluation</h2>
        </div>
        <div class="mw-card-grid">
            <article class="mw-card"><h3>Product Development</h3><p class="mw-muted">Model selection, color, lighting, packaging, and OEM/ODM feasibility can be reviewed by project.</p></article>
            <article class="mw-card"><h3>Compliance Documentation</h3><p class="mw-muted">Target-market compliance and available documents can be discussed before order confirmation.</p></article>
            <article class="mw-card"><h3>Production Coordination</h3><p class="mw-muted">Project milestones can connect sampling, packaging approval, mass production, inspection, and shipment.</p></article>
            <article class="mw-card"><h3>Quality Control</h3><p class="mw-muted">Incoming, in-line, and final inspection workflows help maintain consistent production output.</p></article>
            <article class="mw-card"><h3>Retail Packaging</h3><p class="mw-muted">Color boxes, master cartons, labels, barcodes, PDQ, and display planning are part of the sourcing conversation.</p></article>
            <article class="mw-card"><h3>Project Communication</h3><p class="mw-muted">Buyer requirements, artwork, reports, and commercial details are handled carefully throughout the project.</p></article>
        </div>
    </div>
</section>

<section class="mw-section mw-section--tight">
    <div class="mw-wrap mw-page-cta">
        <div>
            <h2>Evaluating MAGIC WHEELS as a supplier?</h2>
            <p>Share your target market, product category, estimated volume, and documentation needs.</p>
        </div>
        <?php echo mw_button('Start Supplier Evaluation', mw_rfq_url(['need' => 'supplier-evaluation']), 'accent'); ?>
    </div>
</section>
<?php get_footer(); ?>
