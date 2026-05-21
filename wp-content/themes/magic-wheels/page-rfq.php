<?php get_header(); ?>
<section class="mw-contact-hero">
    <div class="mw-wrap mw-contact-hero__inner">
        <div>
            <p class="mw-eyebrow">Request for Quotation</p>
            <h1>Request a Quote</h1>
            <p>For the fastest quotation, please share your target market, required compliance, estimated volume, and timeline. We will recommend suitable models, customization options, and a lead-time plan.</p>
            <div class="mw-contact-trust">
                <span>EN71 / ASTM / CPSIA discussion</span>
                <span>MOQ reviewed by model</span>
                <span>OEM/ODM brief welcome</span>
            </div>
        </div>
        <div class="mw-products-lineup" aria-hidden="true">
            <img src="<?php echo esc_url(mw_asset_url('images/product-tnt-blue-tile.webp')); ?>" alt="">
            <img src="<?php echo esc_url(mw_asset_url('images/product-tnt-pink-tile.webp')); ?>" alt="">
            <img src="<?php echo esc_url(mw_asset_url('images/product-360-tile.webp')); ?>" alt="">
            <img src="<?php echo esc_url(mw_asset_url('images/product-balance-bike-tile.webp')); ?>" alt="">
        </div>
    </div>
</section>

<section class="mw-section mw-section--soft">
    <div class="mw-wrap mw-contact-grid">
        <div class="mw-contact-form-card">
            <h2>Tell Us About Your Program</h2>
            <p class="mw-form-lead">All fields marked * are required. Larger programs and ODM briefs are reviewed by project scope.</p>
            <?php echo do_shortcode('[magic_wheels_rfq]'); ?>
        </div>
        <aside class="mw-contact-panel">
            <h2>What You Will Receive</h2>
            <ul class="mw-rfq-deliverables">
                <li><strong>Indicative quotation</strong><span>Reviewed by quantity tier, model, and project scope.</span></li>
                <li><strong>Lead-time plan</strong><span>Sampling, mass production, and shipment windows.</span></li>
                <li><strong>Compliance shortlist</strong><span>Models matching your market certifications.</span></li>
                <li><strong>OEM/ODM scope</strong><span>If branding or new mold is in scope.</span></li>
            </ul>
            <div class="mw-quick-response">
                <strong>Prefer to talk first?</strong>
                <p>Email <?php echo esc_html(get_option('admin_email', 'chloe@shmagicwheels.com')); ?> or <a href="<?php echo esc_url(mw_contact_url()); ?>">visit Contact Us</a> for available contact options.</p>
            </div>
        </aside>
    </div>
</section>

<section class="mw-section">
    <div class="mw-wrap">
        <h2 class="mw-center-title">From RFQ to Container</h2>
        <div class="mw-process-line">
            <article><strong>1</strong><h3>Submit Brief</h3><p>Share product, market, quantity, and compliance scope.</p></article>
            <article><strong>2</strong><h3>Model Match</h3><p>We review suitable models with price bands and certification needs.</p></article>
            <article><strong>3</strong><h3>Sample &amp; PI</h3><p>Confirm details, send samples, issue Proforma Invoice.</p></article>
            <article><strong>4</strong><h3>Production &amp; Shipment</h3><p>QC, booking, and shipment coordination.</p></article>
        </div>
    </div>
</section>
<?php get_footer(); ?>
