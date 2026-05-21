<?php get_header(); ?>
<?php
$category_cards = [
    [
        'title' => '3-Wheel Toddler Scooters',
        'copy' => 'Stable deck, adjustable handlebar, retail-ready packaging.',
        'image' => mw_asset_url('images/product-tnt-blue-tile.webp'),
        'url' => mw_term_link_by_name('3-Wheel Toddler Scooters'),
    ],
    [
        'title' => '2-Wheel Kids Scooters',
        'copy' => 'Lightweight folding options for growing riders.',
        'image' => mw_asset_url('images/product-prek-a-tile.webp'),
        'url' => mw_term_link_by_name('2-Wheel Kids Scooters'),
    ],
    [
        'title' => 'Light-up Series',
        'copy' => 'LED wheels and deck-light concepts for stronger shelf appeal.',
        'image' => mw_asset_url('images/product-prek-tile.webp'),
        'url' => mw_products_url(),
    ],
    [
        'title' => 'Electric Scooters',
        'copy' => 'Kids electric programs with specs and compliance reviewed by market.',
        'image' => mw_asset_url('images/product-360-tile.webp'),
        'url' => mw_term_link_by_name('Electric Scooters'),
    ],
];

$featured_products = new WP_Query([
    'post_type' => defined('MW_PRODUCT_POST_TYPE') ? MW_PRODUCT_POST_TYPE : 'post',
    'posts_per_page' => 6,
]);
?>
<section class="mw-hero mw-home-hero">
    <div class="mw-hero-media" aria-hidden="true">
        <img src="<?php echo esc_url(mw_asset_url('images/factory-office-wide.webp')); ?>" alt="">
    </div>
    <div class="mw-wrap mw-hero__grid">
        <div class="mw-hero-copy">
            <h1>Kids Scooter Manufacturing for Global Buyers</h1>
            <p>OEM/ODM ride-on products, export-ready quality, and responsive development support.</p>
            <div class="mw-actions">
                <?php echo mw_button('Request a Quote', mw_contact_url(), 'accent'); ?>
                <?php echo mw_button('View Products', mw_products_url(), 'secondary'); ?>
            </div>
        </div>
        <div class="mw-hero-product-strip" aria-label="Featured scooter categories">
            <img class="mw-hero-product mw-hero-product--tnt" src="<?php echo esc_url(mw_asset_url('images/product-tnt-blue-tile.webp')); ?>" alt="Blue three-wheel scooter with light-up wheels">
            <img class="mw-hero-product mw-hero-product--stunt" src="<?php echo esc_url(mw_asset_url('images/product-prek-a-tile.webp')); ?>" alt="Kids light-up scooter">
            <img class="mw-hero-product mw-hero-product--tri" src="<?php echo esc_url(mw_asset_url('images/product-prek-tile.webp')); ?>" alt="Preschool tri-scooter">
            <img class="mw-hero-product mw-hero-product--bike" src="<?php echo esc_url(mw_asset_url('images/product-balance-bike-hero.webp')); ?>" alt="Kids balance bike">
        </div>
    </div>
    <div class="mw-wrap mw-trust-row">
        <div><strong>Since 2009</strong><span>Manufacturing Experience</span></div>
        <div><strong>50+</strong><span>Patent References</span></div>
        <div><strong>EN / ASTM</strong><span>Compliance Support</span></div>
        <div><strong>Peak Season</strong><span>Lead-time Planning</span></div>
    </div>
</section>

<section class="mw-section mw-section--tight">
    <div class="mw-wrap mw-locations">
        <article class="mw-location-card mw-location-card--office">
            <p class="mw-location-eyebrow">Shanghai Office</p>
            <h2>Communication, coordination, documentation</h2>
            <p>Fast communication, program coordination, and documentation support for buyers across North America, EU, LATAM, and the Middle East.</p>
        </article>
        <article class="mw-location-card mw-location-card--factory">
            <p class="mw-location-eyebrow">Anhui Factory</p>
            <h2>Stable production, controlled quality</h2>
            <p>Stable production, controlled quality, and peak-season lead-time planning at our fully owned factory since 2019.</p>
        </article>
    </div>
</section>

<section class="mw-section mw-section--tight">
    <div class="mw-wrap">
        <div class="mw-section-head">
            <h2>Why Top Buyers Choose MAGIC WHEELS</h2>
            <p>Six structural advantages that make us a fit for retail programs and ODM development.</p>
        </div>
        <div class="mw-why-grid">
            <?php
            $why_points = [
                ['icon' => 'shield', 'title' => 'Compliance-first development', 'copy' => 'Documentation support aligned with your target market.'],
                ['icon' => 'clock', 'title' => 'Stable lead time', 'copy' => 'Early planning for retail launch schedules and peak-season coverage.'],
                ['icon' => 'spark', 'title' => 'In-house R&D', 'copy' => 'Fast OEM/ODM development cycles from brief to mass production.'],
                ['icon' => 'flow', 'title' => 'KA-ready workflow', 'copy' => 'Milestones, documentation, and project coordination tuned for key accounts.'],
                ['icon' => 'box', 'title' => 'Retail-ready packaging', 'copy' => 'Color box, master carton, PDQ display, and CBM optimization.'],
                ['icon' => 'check', 'title' => 'Structured QC', 'copy' => 'Incoming checks, in-line control, and final inspection on every program.'],
            ];
            foreach ($why_points as $i => $point) : ?>
                <article class="mw-why-card">
                    <span class="mw-why-num"><?php echo str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT); ?></span>
                    <h3><?php echo esc_html($point['title']); ?></h3>
                    <p><?php echo esc_html($point['copy']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="mw-section mw-section--tight">
    <div class="mw-wrap">
        <div class="mw-section-head mw-section-head--row">
            <h2>Our Product Categories</h2>
            <a class="mw-text-link" href="<?php echo esc_url(mw_products_url()); ?>">View all products -></a>
        </div>
        <div class="mw-category-grid">
            <?php foreach ($category_cards as $card) : ?>
                <article class="mw-category-card">
                    <div>
                        <h3><?php echo esc_html($card['title']); ?></h3>
                        <p><?php echo esc_html($card['copy']); ?></p>
                        <a href="<?php echo esc_url($card['url']); ?>">View Products -></a>
                    </div>
                    <img src="<?php echo esc_url($card['image']); ?>" alt="<?php echo esc_attr($card['title']); ?>">
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="mw-section mw-section--tight">
    <div class="mw-wrap">
        <div class="mw-odm-band">
            <div class="mw-odm-intro">
                <h2>OEM/ODM Capabilities</h2>
                <p>From concept to mass production, we support customized kids scooter programs that fit your market.</p>
                <?php echo mw_button('Learn More About OEM/ODM', home_url('/oem-odm/'), 'gold'); ?>
            </div>
            <div class="mw-odm-points">
                <article>
                    <span>01</span>
                    <h3>Product Development</h3>
                    <p>3D design, prototyping, and testing.</p>
                </article>
                <article>
                    <span>02</span>
                    <h3>Customization Options</h3>
                    <p>Design, colors, materials, branding, packaging.</p>
                </article>
                <article>
                    <span>03</span>
                    <h3>Flexible MOQ Review</h3>
                    <p>Order quantity can be reviewed by product and buyer program.</p>
                </article>
                <article>
                    <span>04</span>
                    <h3>Lead-time Planning</h3>
                    <p>Production schedules can be aligned to launch timing and order scope.</p>
                </article>
            </div>
        </div>
    </div>
</section>

<section class="mw-section mw-section--tight">
    <div class="mw-wrap mw-split-panel">
        <div>
            <div class="mw-section-head">
                <h2>Quality & Compliance You Can Trust</h2>
                <p>Every program can be reviewed against target-market safety standards and buyer documentation needs.</p>
            </div>
            <div class="mw-logo-wall" aria-label="Audits and certifications">
                <?php foreach (['BSCI', 'ISO 9001', 'SCAN', 'FCCA', 'Disney FAMA', 'CE', 'EN71', 'ASTM F963', 'FCC', 'RoHS', 'FSC'] as $mark) : ?>
                    <span><?php echo esc_html($mark); ?></span>
                <?php endforeach; ?>
            </div>
            <a class="mw-text-link" href="<?php echo esc_url(home_url('/quality-compliance/')); ?>">Request Quality Documents -></a>
        </div>
        <img class="mw-rounded-image" src="<?php echo esc_url(mw_asset_url('images/qc-onsite-2-wide.webp')); ?>" alt="Quality inspection in process">
    </div>
</section>

<section class="mw-section mw-section--tight mw-section--soft">
    <div class="mw-wrap">
        <div class="mw-section-head mw-section-head--row">
            <h2>Our Factory Snapshot</h2>
            <a class="mw-text-link" href="<?php echo esc_url(home_url('/factory/')); ?>">View Factory -></a>
        </div>
        <div class="mw-factory-strip">
            <?php
            $factory_items = [
                ['Factory Exterior', 'images/factory-office-card.webp'],
                ['Production Campus', 'images/factory-exterior-card.webp'],
                ['Quality Inspection', 'images/qc-onsite-2-wide.webp'],
                ['In-line Checks', 'images/factory-check-portrait.webp'],
            ];
            foreach ($factory_items as [$label, $image]) :
                ?>
                <figure>
                    <img src="<?php echo esc_url(mw_asset_url($image)); ?>" alt="<?php echo esc_attr($label); ?>">
                    <figcaption><?php echo esc_html($label); ?></figcaption>
                </figure>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="mw-section">
    <div class="mw-wrap">
        <div class="mw-section-head mw-section-head--row">
            <h2>Featured Products</h2>
            <a class="mw-text-link" href="<?php echo esc_url(mw_products_url()); ?>">View all products -></a>
        </div>
        <div class="mw-product-grid mw-product-grid--home">
            <?php if ($featured_products->have_posts()) : ?>
                <?php while ($featured_products->have_posts()) : $featured_products->the_post(); ?>
                    <?php get_template_part('template-parts/product-card'); ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="mw-section mw-section--tight mw-section--soft">
    <div class="mw-wrap">
        <div class="mw-section-head mw-section-head--row">
            <h2>Procurement Guides &amp; Compliance Resources</h2>
            <a class="mw-text-link" href="<?php echo esc_url(home_url('/resources/')); ?>">View all guides -></a>
        </div>
        <div class="mw-resources-preview">
            <?php foreach (array_slice(mw_resource_articles(), 0, 3) as $article) : ?>
                <article class="mw-resource-preview-card">
                    <span class="mw-pill"><?php echo esc_html($article['category']); ?></span>
                    <h3><a href="<?php echo esc_url(home_url('/resources/' . $article['slug'] . '/')); ?>"><?php echo esc_html($article['title']); ?></a></h3>
                    <p><?php echo esc_html($article['summary']); ?></p>
                    <a class="mw-text-link" href="<?php echo esc_url(home_url('/resources/' . $article['slug'] . '/')); ?>">Read guide -></a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="mw-section mw-section--tight">
    <div class="mw-wrap mw-story-grid">
        <article class="mw-case-card">
            <figure class="mw-case-card__media">
                <img src="<?php echo esc_url(mw_asset_url('images/lifestyle-12v-card.webp')); ?>" alt="Kids scooter distributor market scene">
            </figure>
            <div class="mw-case-card__body">
                <span class="mw-pill">Europe</span>
                <h2>Distributor Program Scenario</h2>
                <p>A distributor program can be reviewed around model range, compliance discussion, packaging, and launch timing.</p>
                <dl>
                    <div><dt>Challenge</dt><dd>Range planning</dd></div>
                    <div><dt>Support</dt><dd>Model and packaging review</dd></div>
                    <div><dt>Output</dt><dd>Clearer RFQ alignment</dd></div>
                </dl>
            </div>
        </article>
        <article class="mw-resource-card">
            <h2>Resources</h2>
            <a href="<?php echo esc_url(home_url('/resources/')); ?>">
                <strong>Sourcing Guide</strong>
                <span>The Ultimate Guide to Sourcing Kids Scooters in China</span>
            </a>
            <a href="<?php echo esc_url(home_url('/resources/')); ?>">
                <strong>Safety</strong>
                <span>Scooter Safety Standards You Should Know</span>
            </a>
            <a href="<?php echo esc_url(home_url('/resources/')); ?>">
                <strong>Packaging</strong>
                <span>Custom Packaging Solutions for Global Shipping</span>
            </a>
        </article>
    </div>
</section>

<section class="mw-final-cta">
    <div class="mw-wrap mw-final-cta__inner">
        <div>
            <h2>Tell us your target market, compliance needs, and estimated volume.</h2>
            <p>We will recommend suitable models, customization options, and a lead-time plan.</p>
        </div>
        <?php echo mw_button('Request a Quote', mw_contact_url(), 'accent'); ?>
    </div>
</section>
<?php get_footer(); ?>
