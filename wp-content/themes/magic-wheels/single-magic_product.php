<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
    <?php
    $product_id = get_the_ID();
    $model_no = mw_meta($product_id, 'model_no');
    $category = mw_meta($product_id, 'category_label', 'Product Program');
    $related = new WP_Query([
        'post_type' => defined('MW_PRODUCT_POST_TYPE') ? MW_PRODUCT_POST_TYPE : 'post',
        'posts_per_page' => 4,
        'post__not_in' => [$product_id],
    ]);
    ?>
    <section class="mw-detail-hero">
        <div class="mw-wrap">
            <nav class="mw-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span>/</span>
                <a href="<?php echo esc_url(mw_products_url()); ?>">Products</a>
                <span>/</span>
                <span><?php the_title(); ?></span>
            </nav>
            <div class="mw-detail-hero__grid">
                <div class="mw-product-gallery">
                    <div class="mw-product-gallery__main">
                        <img src="<?php echo esc_url(mw_product_media_url($product_id)); ?>" alt="<?php the_title_attribute(); ?>">
                    </div>
                    <div class="mw-product-gallery__thumbs" aria-label="Product image thumbnails">
                        <?php for ($i = 0; $i < 5; $i++) : ?>
                            <span>
                                <img src="<?php echo esc_url(mw_product_media_url($product_id)); ?>" alt="">
                            </span>
                        <?php endfor; ?>
                    </div>
                </div>
                <aside class="mw-product-summary">
                    <p class="mw-eyebrow"><?php echo esc_html($category); ?></p>
                    <h1><?php the_title(); ?><?php echo $model_no ? ' | Model ' . esc_html($model_no) : ''; ?></h1>
                    <?php if (has_excerpt()) : ?>
                        <p><?php echo esc_html(get_the_excerpt()); ?></p>
                    <?php else : ?>
                        <p>A buyer-ready kids mobility model for retail, importer, and OEM/ODM programs. Specifications, packaging, and compliance requirements can be aligned with your target market.</p>
                    <?php endif; ?>
                    <div class="mw-feature-metrics">
                        <?php
                        $metrics = [
                            'Age' => mw_meta($product_id, 'age'),
                            'Max Load' => mw_meta($product_id, 'max_weight'),
                            'MOQ' => mw_meta($product_id, 'moq'),
                            'Lead Time' => mw_meta($product_id, 'lead_time'),
                        ];
                        foreach ($metrics as $label => $value) :
                            if (!$value) {
                                continue;
                            }
                            ?>
                            <div><strong><?php echo esc_html($value); ?></strong><span><?php echo esc_html($label); ?></span></div>
                        <?php endforeach; ?>
                    </div>
                    <?php echo mw_button('Request a Quote', add_query_arg('model', rawurlencode(get_the_title()), mw_contact_url()), 'accent'); ?>
                    <?php echo mw_button('Ask About Customization', home_url('/oem-odm/'), 'secondary'); ?>
                </aside>
            </div>
        </div>
    </section>

    <section class="mw-section mw-section--tight">
        <div class="mw-wrap mw-detail-info-grid">
            <div>
                <h2>Specifications</h2>
                <table class="mw-spec-table">
                    <tbody>
                    <?php
                    $rows = [
                        'Model' => $model_no,
                        'Category' => $category,
                        'Age' => mw_meta($product_id, 'age'),
                        'Max Load' => mw_meta($product_id, 'max_weight'),
                        'Product Size' => mw_meta($product_id, 'product_size'),
                        'Wheel / Material' => mw_meta($product_id, 'wheel'),
                        'Packaging' => mw_meta($product_id, 'packaging'),
                        'MOQ' => mw_meta($product_id, 'moq'),
                        'Lead Time' => mw_meta($product_id, 'lead_time'),
                        'Compliance' => mw_meta($product_id, 'compliance'),
                    ];
                    foreach ($rows as $label => $value) :
                        if (!$value) {
                            continue;
                        }
                        ?>
                        <tr>
                            <th><?php echo esc_html($label); ?></th>
                            <td><?php echo esc_html($value); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <p class="mw-muted">Specifications are for reference only and may change without prior notice.</p>
            </div>
            <div>
                <h2>Recommended Markets & Applications</h2>
                <div class="mw-application-list">
                    <article><strong>Importers & Distributors</strong><span>Reliable model with strong demand in kids mobility markets.</span></article>
                    <article><strong>Retail Chains</strong><span>Suitable for product lines and seasonal promotions.</span></article>
                    <article><strong>ODM Brand Teams</strong><span>Customization available for color, graphics, packaging, and documentation.</span></article>
                </div>
                <div class="mw-lead-card">
                    <h3>MOQ & Lead Time</h3>
                    <p>MOQ and production timeline may vary by order quantity, packaging, and customization requirements.</p>
                </div>
            </div>
            <aside>
                <h2>Customization Options</h2>
                <div class="mw-customization-list">
                    <article><strong>Colors</strong><span>Custom color for frame and parts</span></article>
                    <article><strong>Wheels</strong><span>PU / PVC / light-up options</span></article>
                    <article><strong>Packaging</strong><span>Gift box, brown box, or custom design</span></article>
                    <article><strong>Logo & Branding</strong><span>Sticker, silk screen, label, and artwork support</span></article>
                </div>
            </aside>
        </div>
    </section>

    <section class="mw-section mw-section--soft">
        <div class="mw-wrap mw-split-panel">
            <div class="mw-compliance-card">
                <h2>Compliance & Testing</h2>
                <p><?php echo esc_html($model_no ?: 'This model'); ?> can be reviewed against international electrical and safety standards based on your target market.</p>
                <ul>
                    <li>EN / ASTM support where applicable</li>
                    <li>Available reports reviewed by model and target market</li>
                    <li>In-house reliability and performance testing</li>
                    <li>Factory audit documents available for buyer discussion</li>
                </ul>
                <a class="mw-text-link" href="<?php echo esc_url(home_url('/quality-compliance/')); ?>">Learn More About Quality Control -></a>
            </div>
            <img class="mw-rounded-image" src="<?php echo esc_url(mw_asset_url('images/qc-onsite-2-wide.webp')); ?>" alt="Product testing and quality inspection">
            <div class="mw-document-card">
                <h2>Need Certificates or Test Reports?</h2>
                <p>Tell us the documents you need and we will prepare them for your reference.</p>
                <?php echo mw_button('Request Documents', mw_contact_url(), 'secondary'); ?>
            </div>
        </div>
    </section>

    <section class="mw-section">
        <div class="mw-wrap">
            <div class="mw-section-head mw-section-head--row">
                <h2>Related Products</h2>
                <a class="mw-text-link" href="<?php echo esc_url(mw_products_url()); ?>">View more products -></a>
            </div>
            <div class="mw-product-grid mw-product-grid--related">
                <?php if ($related->have_posts()) : ?>
                    <?php while ($related->have_posts()) : $related->the_post(); ?>
                        <?php get_template_part('template-parts/product-card'); ?>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <div class="mw-sticky-quote">
        <div class="mw-wrap">
            <strong>Interested in <?php the_title(); ?>?</strong>
            <span>Contact us today to get a personalized quote and product recommendation.</span>
            <?php echo mw_button('Request a Quote', add_query_arg('model', rawurlencode(get_the_title()), mw_contact_url()), 'accent'); ?>
        </div>
    </div>
<?php endwhile; ?>
<?php get_footer(); ?>
