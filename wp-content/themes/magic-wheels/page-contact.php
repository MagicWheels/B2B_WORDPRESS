<?php get_header(); ?>
<section class="mw-contact-hero">
    <div class="mw-wrap mw-contact-hero__inner">
        <div>
            <p class="mw-eyebrow">RFQ / Contact</p>
            <h1>Request a Quote</h1>
            <p>Tell us your market, product needs, and target quantity. We will review your requirements and get back to you shortly.</p>
            <div class="mw-contact-trust">
                <span>Export-ready quality</span>
                <span>OEM/ODM support</span>
                <span>Fast and reliable response</span>
            </div>
        </div>
        <div class="mw-products-lineup" aria-hidden="true">
            <img src="<?php echo esc_url(mw_asset_url('images/product-tnt-blue-tile.webp')); ?>" alt="">
            <img src="<?php echo esc_url(mw_asset_url('images/product-360-tile.webp')); ?>" alt="">
            <img src="<?php echo esc_url(mw_asset_url('images/product-prek-tile.webp')); ?>" alt="">
            <img src="<?php echo esc_url(mw_asset_url('images/product-balance-bike-tile.webp')); ?>" alt="">
        </div>
    </div>
</section>

<section class="mw-section mw-section--soft">
    <div class="mw-wrap mw-contact-grid">
        <div class="mw-contact-form-card">
            <h2>Tell Us About Your Requirements</h2>
            <?php echo do_shortcode('[magic_wheels_rfq]'); ?>
        </div>
        <aside class="mw-contact-panel">
            <h2>Get In Touch</h2>
            <p>We are here to support your business. Choose the way that works best for you.</p>
            <dl>
                <div><dt>Email</dt><dd><?php echo esc_html(get_option('admin_email', 'chloe@shmagicwheels.com')); ?></dd></div>
            </dl>
            <div class="mw-quick-response">
                <strong>Quick Response</strong>
                <p>We have received your request. We'll get back to you shortly.</p>
            </div>
        </aside>
    </div>
</section>

<section class="mw-section">
    <div class="mw-wrap">
        <h2 class="mw-center-title">What Happens Next?</h2>
        <div class="mw-process-line">
            <article><strong>1</strong><h3>Submit Your Brief</h3><p>Send us your inquiry with product needs, market, and target quantity.</p></article>
            <article><strong>2</strong><h3>Product Recommendation</h3><p>Our team analyzes your needs and recommends suitable options.</p></article>
            <article><strong>3</strong><h3>Sample Discussion</h3><p>We confirm details and provide samples for evaluation.</p></article>
            <article><strong>4</strong><h3>Receive Your Quote</h3><p>You receive a quotation and lead-time plan.</p></article>
        </div>
    </div>
</section>
<?php get_footer(); ?>
