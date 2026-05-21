<?php get_header(); ?>
<?php $articles = mw_resource_articles(); ?>
<section class="mw-inner-hero">
    <div class="mw-wrap mw-inner-hero__grid">
        <div>
            <p class="mw-eyebrow">Resources</p>
            <h1>Kids Scooter Procurement Guides and Compliance Resources</h1>
            <p>Practical guides for buyers evaluating kids scooter manufacturers, OEM/ODM programs, safety standards, quality control, packaging, and lead-time planning.</p>
            <div class="mw-actions">
                <?php echo mw_button('Request a Quote', mw_rfq_url(['source' => 'resources']), 'accent'); ?>
                <?php echo mw_button('View Products', mw_products_url(), 'secondary'); ?>
            </div>
        </div>
        <div class="mw-hero-visual mw-hero-visual--photo">
            <img src="<?php echo esc_url(mw_asset_url('images/case-study.webp')); ?>" alt="Kids scooter procurement discussion">
        </div>
    </div>
</section>

<section class="mw-section mw-section--tight">
    <div class="mw-wrap mw-material-strip">
        <figure class="mw-material-card">
            <img src="<?php echo esc_url(mw_asset_url('images/product-360-tile.webp')); ?>" alt="Product selection material">
            <figcaption>Model selection</figcaption>
        </figure>
        <figure class="mw-material-card">
            <img src="<?php echo esc_url(mw_asset_url('images/qc-onsite-2-wide.webp')); ?>" alt="Quality control material">
            <figcaption>Quality control</figcaption>
        </figure>
        <figure class="mw-material-card">
            <img src="<?php echo esc_url(mw_asset_url('images/factory-office-card.webp')); ?>" alt="Factory evaluation material">
            <figcaption>Factory evaluation</figcaption>
        </figure>
    </div>
</section>

<section class="mw-section mw-section--soft">
    <div class="mw-wrap">
        <div class="mw-section-head mw-section-head--row">
            <div>
                <p class="mw-eyebrow">Buyer guides</p>
                <h2>Start with the procurement question you are trying to answer</h2>
            </div>
            <a class="mw-text-link" href="<?php echo esc_url(mw_rfq_url(['need' => 'article-question'])); ?>">Ask a sourcing question -></a>
        </div>
        <div class="mw-resource-grid">
            <?php foreach ($articles as $article) : ?>
                <article class="mw-article-card">
                    <span class="mw-pill"><?php echo esc_html($article['category']); ?></span>
                    <h3><a href="<?php echo esc_url(home_url('/' . $article['slug'] . '/')); ?>"><?php echo esc_html($article['title']); ?></a></h3>
                    <p class="mw-muted"><?php echo esc_html($article['summary']); ?></p>
                    <a class="mw-text-link" href="<?php echo esc_url(home_url('/' . $article['slug'] . '/')); ?>">Read guide -></a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="mw-section">
    <div class="mw-wrap mw-card-grid mw-card-grid--2">
        <article class="mw-card">
            <h2>Procurement topics covered</h2>
            <p class="mw-muted">Use these guides to compare scooter manufacturers, prepare compliance questions, and define the information needed for quotation.</p>
            <ul class="mw-signal-list">
                <li>Manufacturer evaluation</li>
                <li>Safety standards and testing questions</li>
                <li>MOQ, lead time, packaging, and PDQ</li>
                <li>OEM/ODM customization choices</li>
            </ul>
        </article>
        <article class="mw-card">
            <h2>Planning a scooter program?</h2>
            <p class="mw-muted">Share your target market, compliance requirements, estimated volume, and timeline. MAGIC WHEELS will help you evaluate suitable models and next steps.</p>
            <?php echo mw_button('Request a Quote', mw_rfq_url(['source' => 'resources']), 'accent'); ?>
        </article>
    </div>
</section>
<?php get_footer(); ?>
