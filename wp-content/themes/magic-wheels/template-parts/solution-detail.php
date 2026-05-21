<?php
$slug = $args['slug'] ?? '';
$program = mw_solution_by_slug($slug);

if (!$program) {
    return;
}
?>
<section class="mw-inner-hero">
    <div class="mw-wrap mw-inner-hero__grid">
        <div>
            <p class="mw-eyebrow"><?php echo esc_html($program['eyebrow']); ?></p>
            <h1><?php echo esc_html($program['title']); ?></h1>
            <p><?php echo esc_html($program['copy']); ?></p>
            <div class="mw-actions">
                <?php echo mw_button('Send Your RFQ', mw_rfq_url(['solution' => $program['slug']]), 'accent'); ?>
                <?php echo mw_button('Back to Solutions', home_url('/solutions/'), 'secondary'); ?>
            </div>
        </div>
        <div class="mw-hero-visual<?php echo $program['slug'] === 'mass-retail-programs' ? ' mw-hero-visual--photo' : ''; ?>">
            <?php
            $solution_image = match ($program['slug']) {
                'mass-retail-programs' => mw_asset_url('images/lifestyle-12v-card.webp'),
                'brands-odm-development' => mw_asset_url('images/product-tnt-pink-tile.webp'),
                default => mw_asset_url('images/product-balance-bike-tile.webp'),
            };
            ?>
            <img src="<?php echo esc_url($solution_image); ?>" alt="<?php echo esc_attr($program['title']); ?>">
        </div>
    </div>
</section>

<section class="mw-section mw-section--tight">
    <div class="mw-wrap mw-card-grid">
        <article class="mw-card">
            <span class="mw-icon-badge">01</span>
            <h2>Buyer Pain Point</h2>
            <p class="mw-muted"><?php echo esc_html($program['pain']); ?></p>
        </article>
        <article class="mw-card">
            <span class="mw-icon-badge">02</span>
            <h2>MAGIC WHEELS Response</h2>
            <p class="mw-muted"><?php echo esc_html($program['response']); ?></p>
        </article>
        <article class="mw-card">
            <span class="mw-icon-badge">03</span>
            <h2>What We Align</h2>
            <ul class="mw-signal-list">
                <?php foreach ($program['proof'] as $item) : ?>
                    <li><?php echo esc_html($item); ?></li>
                <?php endforeach; ?>
            </ul>
        </article>
    </div>
</section>

<section class="mw-section mw-section--soft">
    <div class="mw-wrap mw-split-feature">
        <div>
            <p class="mw-eyebrow">Project flow</p>
            <h2>Built for practical procurement decisions</h2>
            <div class="mw-step-list">
                <article><div><h3>Brief and market fit</h3><p>Confirm market, buyer type, channel, volume, target launch window, and product category.</p></div></article>
                <article><div><h3>Model and document review</h3><p>Match available models, customization range, compliance discussion, packaging, and carton assumptions.</p></div></article>
                <article><div><h3>Sample and quotation</h3><p>Prepare sample plan, quotation scope, tooling or packaging notes, and first schedule estimate.</p></div></article>
                <article><div><h3>Production readiness</h3><p>Move confirmed projects into pilot, mass production, inspection, packing, and export coordination.</p></div></article>
            </div>
        </div>
        <div class="mw-mini-table">
            <div><strong>Best for</strong><span><?php echo esc_html($program['title']); ?></span></div>
            <div><strong>Inputs needed</strong><span>Target market, quantity, compliance, timeline, customization notes.</span></div>
            <div><strong>Outputs</strong><span>Model recommendation, RFQ scope, document list, and lead-time assumptions.</span></div>
            <div><strong>Next action</strong><span>Send a project brief or ask for model recommendations.</span></div>
        </div>
    </div>
</section>

<section class="mw-section mw-section--tight">
    <div class="mw-wrap mw-page-cta">
        <div>
            <h2>Start with a short project brief</h2>
            <p>Tell us what you plan to launch and which market you sell into. We will help turn it into an RFQ path.</p>
        </div>
        <?php echo mw_button('Send Brief', mw_rfq_url(['solution' => $program['slug']]), 'accent'); ?>
    </div>
</section>
