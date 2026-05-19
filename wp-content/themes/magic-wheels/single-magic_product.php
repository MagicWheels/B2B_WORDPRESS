<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
    <?php $product_id = get_the_ID(); ?>
    <section class="mw-page-hero">
        <div class="mw-wrap">
            <p class="mw-eyebrow"><?php echo esc_html(mw_meta($product_id, 'category_label', 'Product Program')); ?></p>
            <h1><?php the_title(); ?><?php echo mw_meta($product_id, 'model_no') ? ' | ' . esc_html(mw_meta($product_id, 'model_no')) : ''; ?></h1>
            <?php if (has_excerpt()) : ?>
                <p><?php echo esc_html(get_the_excerpt()); ?></p>
            <?php endif; ?>
        </div>
    </section>
    <section class="mw-page-content">
        <div class="mw-wrap mw-detail-grid">
            <div>
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('mw-hero'); ?>
                <?php endif; ?>
                <?php the_content(); ?>
            </div>
            <aside>
                <table class="mw-spec-table">
                    <tbody>
                    <?php
                    $rows = [
                        'Model No.' => mw_meta($product_id, 'model_no'),
                        'Age' => mw_meta($product_id, 'age'),
                        'Max Weight' => mw_meta($product_id, 'max_weight'),
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
                <div class="mw-card" style="margin-top:20px;">
                    <h3>Request this model</h3>
                    <p>Send your target market, quantity, packaging, and compliance requirements.</p>
                    <?php echo mw_button('Request a Quote', home_url('/contact/'), 'accent'); ?>
                </div>
            </aside>
        </div>
    </section>
<?php endwhile; ?>
<?php get_footer(); ?>
