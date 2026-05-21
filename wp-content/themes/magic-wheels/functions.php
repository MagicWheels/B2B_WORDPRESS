<?php
if (!defined('ABSPATH')) {
    exit;
}

add_action('after_setup_theme', 'mw_theme_setup');
add_action('wp_enqueue_scripts', 'mw_theme_assets');
add_action('pre_get_posts', 'mw_product_archive_query');
add_filter('wp_nav_menu_objects', 'mw_filter_primary_nav_items', 10, 2);

function mw_theme_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('custom-logo', [
        'height' => 80,
        'width' => 260,
        'flex-height' => true,
        'flex-width' => true,
    ]);

    register_nav_menus([
        'primary' => 'Primary Navigation',
        'footer' => 'Footer Navigation',
    ]);

    add_image_size('mw-card', 720, 540, false);
    add_image_size('mw-hero', 1680, 980, false);
}

function mw_theme_assets(): void
{
    $theme = wp_get_theme();

    wp_enqueue_style(
        'mw-theme',
        get_template_directory_uri() . '/assets/css/site.css',
        [],
        (string) @filemtime(get_template_directory() . '/assets/css/site.css') ?: $theme->get('Version')
    );

    wp_enqueue_script(
        'mw-site',
        get_template_directory_uri() . '/assets/js/site.js',
        [],
        (string) @filemtime(get_template_directory() . '/assets/js/site.js') ?: $theme->get('Version'),
        true
    );
}

function mw_product_archive_query(WP_Query $query): void
{
    if (is_admin() || !$query->is_main_query() || !defined('MW_PRODUCT_POST_TYPE')) {
        return;
    }

    if ($query->is_post_type_archive(MW_PRODUCT_POST_TYPE) || (defined('MW_PRODUCT_TAXONOMY') && $query->is_tax(MW_PRODUCT_TAXONOMY))) {
        $query->set('posts_per_page', -1);
    }
}

function mw_asset_url(string $path): string
{
    return get_template_directory_uri() . '/assets/' . ltrim($path, '/');
}

function mw_data_media_url(string $filename): string
{
    return home_url('/data/media/' . ltrim($filename, '/'));
}

function mw_product_media_url(int $post_id): string
{
    $map = [
        'MWKE082' => 'mwke082.webp',
        'MWTP001' => 'mwtp001.webp',
        'MWKE005' => 'mwke005.webp',
        'MWKE06' => 'mwke06.webp',
    ];

    $model_no = mw_meta($post_id, 'model_no');
    if ($model_no && isset($map[$model_no])) {
        return mw_data_media_url($map[$model_no]);
    }

    return mw_data_media_url('mwke082.webp');
}

function mw_product_card_media_url(int $post_id): string
{
    $map = [
        'MWKE082' => 'product-cards/mwke082-card.webp',
        'MWTP001' => 'product-cards/mwtp001-card.webp',
        'MWKE005' => 'product-cards/mwke005-card.webp',
        'MWKE06' => 'product-cards/mwke06-card.webp',
    ];

    $model_no = mw_meta($post_id, 'model_no');
    if ($model_no && isset($map[$model_no])) {
        return mw_data_media_url($map[$model_no]);
    }

    return mw_data_media_url('product-cards/mwke082-card.webp');
}

function mw_products_url(): string
{
    if (defined('MW_PRODUCT_POST_TYPE')) {
        $archive = get_post_type_archive_link(MW_PRODUCT_POST_TYPE);
        if ($archive) {
            return $archive;
        }
    }

    return home_url('/products/');
}

function mw_contact_url(): string
{
    return home_url('/contact/');
}

function mw_whatsapp_number(): string
{
    $number = defined('MW_WHATSAPP_NUMBER') ? (string) constant('MW_WHATSAPP_NUMBER') : '';

    if ($number === '') {
        $number = (string) get_option('mw_whatsapp_number', '');
    }

    if ($number === '') {
        $number = (string) getenv('MAGIC_WHEELS_WHATSAPP_NUMBER');
    }

    return preg_replace('/\D+/', '', $number) ?: '';
}

function mw_whatsapp_url(): string
{
    $number = mw_whatsapp_number();

    return $number === '' ? mw_contact_url() : 'https://wa.me/' . $number;
}

function mw_rfq_url(array $args = []): string
{
    $url = home_url('/rfq/');

    return $args ? add_query_arg($args, $url) : $url;
}

function mw_button(string $label, string $url, string $variant = 'primary'): string
{
    return sprintf(
        '<a class="mw-button mw-button--%s" href="%s">%s</a>',
        esc_attr($variant),
        esc_url($url),
        esc_html($label)
    );
}

function mw_meta(int $post_id, string $key, string $fallback = ''): string
{
    if (function_exists('mw_get_product_meta')) {
        $value = mw_get_product_meta($post_id, $key);
        return $value !== '' ? $value : $fallback;
    }

    return $fallback;
}

function mw_filter_primary_nav_items(array $items, stdClass $args): array
{
    if (($args->theme_location ?? '') !== 'primary') {
        return $items;
    }

    return array_values(array_filter($items, static function ($item): bool {
        $title = strtolower(trim(wp_strip_all_tags($item->title ?? '')));
        $path = trim((string) wp_parse_url((string) ($item->url ?? ''), PHP_URL_PATH), '/');

        return $title !== 'contact' && $path !== 'contact';
    }));
}

function mw_fallback_primary_nav(): void
{
    $links = [
        'Products' => '/products/',
        'Solutions' => '/solutions/',
        'OEM/ODM' => '/oem-odm/',
        'Quality' => '/quality-compliance/',
        'Factory' => '/factory/',
        'Case Studies' => '/case-studies/',
        'Resources' => '/resources/',
        'About' => '/about/',
    ];

    foreach ($links as $label => $url) {
        echo '<a href="' . esc_url(home_url($url)) . '">' . esc_html($label) . '</a>';
    }
}

function mw_term_link_by_name(string $name): string
{
    if (!defined('MW_PRODUCT_TAXONOMY')) {
        return mw_products_url();
    }

    $term = get_term_by('name', $name, MW_PRODUCT_TAXONOMY);
    if (!$term || is_wp_error($term)) {
        return mw_products_url();
    }

    $link = get_term_link($term);
    return is_wp_error($link) ? mw_products_url() : $link;
}

function mw_solution_programs(): array
{
    return [
        [
            'title' => 'Mass Retail Programs',
            'slug' => 'mass-retail-programs',
            'eyebrow' => 'For retail chains',
            'copy' => 'Compliance review, packaging planning, milestone control, and peak-season coordination for chain retail programs.',
            'pain' => 'Seasonal launch dates, buyer documentation, carton/PDQ requirements, and repeatable inspection standards.',
            'response' => 'A project rhythm that links model selection, testing discussion, packaging approval, production milestones, and shipment checks.',
            'proof' => ['Compliance-first development', 'PDQ and carton planning', 'Launch calendar coordination'],
        ],
        [
            'title' => 'Importers & Distributors',
            'slug' => 'importers-distributors',
            'eyebrow' => 'For regional channels',
            'copy' => 'Model matching, clear specifications, stable lead-time planning, and responsive communication for distribution ranges.',
            'pain' => 'A balanced range that fits local demand, clear specs for sales teams, and reliable reorder planning.',
            'response' => 'We help match scooter models to target market, age range, channel price tier, packaging needs, and expected volume.',
            'proof' => ['SKU range planning', 'CBM and carton review', 'Reorder-ready documentation'],
        ],
        [
            'title' => 'Brands / ODM Development',
            'slug' => 'brands-odm-development',
            'eyebrow' => 'For brand teams',
            'copy' => 'Concept development, prototyping, tooling coordination, graphics, packaging adaptation, and confidentiality-aware communication.',
            'pain' => 'Differentiated product concepts, market-specific details, artwork protection, and controlled development cycles.',
            'response' => 'From brief to prototype and pilot, we align structure, color, lighting, packaging, manuals, and target-market documents.',
            'proof' => ['Prototype support', 'Packaging adaptation', 'Confidential project handling'],
        ],
    ];
}

function mw_solution_by_slug(string $slug): ?array
{
    foreach (mw_solution_programs() as $program) {
        if ($program['slug'] === $slug) {
            return $program;
        }
    }

    return null;
}

function mw_case_studies(): array
{
    return [
        [
            'title' => 'Mass Retail Program',
            'type' => 'Retail chain buyer',
            'challenge' => 'Peak-season delivery, compliance review, PDQ packaging, and carton labeling had to be aligned before launch.',
            'solution' => 'MAGIC WHEELS coordinated lead-time planning, testing support, sample confirmation, and retail packaging requirements.',
            'result' => 'Buyer-ready program execution with clearer documentation and launch planning.',
            'image' => mw_asset_url('images/case-study.webp'),
        ],
        [
            'title' => 'Importer Distribution Program',
            'type' => 'Importer / distributor',
            'challenge' => 'The buyer needed a balanced kids scooter range with clear specifications and shipment planning.',
            'solution' => 'We matched models by age, channel, packaging, carton CBM, and target-market compliance discussion.',
            'result' => 'Faster RFQ alignment and a more structured procurement evaluation.',
            'image' => mw_asset_url('images/lifestyle-12v-card.webp'),
        ],
        [
            'title' => 'ODM Brand Development',
            'type' => 'Brand / ODM buyer',
            'challenge' => 'The project needed differentiated visual details, packaging adaptation, and confidential development communication.',
            'solution' => 'Prototype support, graphics review, lighting options, and packaging files were handled as a gated development track.',
            'result' => 'A development-ready program for brand evaluation and pilot planning.',
            'image' => mw_asset_url('images/product-tnt-pink-tile.webp'),
        ],
    ];
}

function mw_resource_articles(): array
{
    return [
        [
            'title' => 'How to Choose a Reliable Kids Scooter Manufacturer for Retail Programs',
            'slug' => 'choose-reliable-kids-scooter-manufacturer',
            'category' => 'Manufacturer Selection',
            'summary' => 'A practical checklist for evaluating factory capability, documentation support, quality control, and launch readiness.',
        ],
        [
            'title' => 'ASTM & CPSIA Essentials for Importing Kids Scooters into the US',
            'slug' => 'astm-cpsia-kids-scooter-import',
            'category' => 'Compliance',
            'summary' => 'Key compliance questions US buyers should clarify before sampling, testing, and shipment planning.',
        ],
        [
            'title' => '3-Wheel vs 2-Wheel Kids Scooters: Selection Guide for Buyers',
            'slug' => '3-wheel-vs-2-wheel-kids-scooters',
            'category' => 'Category Planning',
            'summary' => 'How age range, stability, wheel size, structure, and channel positioning shape product selection.',
        ],
        [
            'title' => 'Light-up Scooters: LED Wheel Options and Durability Considerations',
            'slug' => 'light-up-scooters-led-wheel-options',
            'category' => 'Product Features',
            'summary' => 'Questions to ask about LED wheels, deck lighting, shelf appeal, durability, and test planning.',
        ],
        [
            'title' => 'MOQ and Lead Time Explained for OEM Kids Scooters',
            'slug' => 'moq-lead-time-oem-kids-scooters',
            'category' => 'Procurement',
            'summary' => 'A plain-English guide to MOQ, sample timing, packaging approvals, and production scheduling.',
        ],
        [
            'title' => 'Peak Season Planning: How to Secure Lead Time for Retail Launches',
            'slug' => 'peak-season-planning-retail-launches',
            'category' => 'Planning',
            'summary' => 'How buyers can reduce schedule risk by confirming models, documents, and packaging earlier.',
        ],
        [
            'title' => 'Quality Control Checklist for Kids Scooters',
            'slug' => 'quality-control-checklist-kids-scooters',
            'category' => 'Quality',
            'summary' => 'Incoming inspection, in-line checks, final inspection, AQL discussion, and practical mass-production checkpoints.',
        ],
        [
            'title' => 'Packaging Guide: Color Box, Master Carton, and CBM Optimization',
            'slug' => 'packaging-guide-color-box-master-carton-cbm',
            'category' => 'Packaging',
            'summary' => 'How packaging decisions affect shelf presentation, container planning, documents, and RFQ clarity.',
        ],
        [
            'title' => 'PDQ Display Options for Kids Scooters',
            'slug' => 'pdq-display-options-kids-scooters',
            'category' => 'Retail Display',
            'summary' => 'When PDQ or pallet display support matters for retail programs and how to brief the supplier.',
        ],
        [
            'title' => 'Common Quality Issues in Kids Scooters and How to Prevent Them',
            'slug' => 'common-quality-issues-kids-scooters',
            'category' => 'Quality',
            'summary' => 'A buyer-friendly review of wheel, handlebar, light, deck, fastener, and packaging risks.',
        ],
        [
            'title' => 'OEM vs ODM: Which Model Fits Your Brand Program?',
            'slug' => 'oem-vs-odm-kids-scooter-brand-program',
            'category' => 'OEM/ODM',
            'summary' => 'How to choose between logo customization, packaging adaptation, and deeper development projects.',
        ],
        [
            'title' => 'EN71 / EN14619 Overview for EU Market Expansion',
            'slug' => 'en71-en14619-eu-market-overview',
            'category' => 'Compliance',
            'summary' => 'An overview of EU-oriented safety discussions for kids scooter procurement teams.',
        ],
    ];
}

if (!defined('MW_TAWK_PROPERTY_ID')) {
    define('MW_TAWK_PROPERTY_ID', get_option('mw_tawk_property_id', ''));
}

add_action('wp_footer', 'mw_render_tawk_widget', 50);
function mw_render_tawk_widget(): void
{
    $id = trim((string) MW_TAWK_PROPERTY_ID);
    if ($id === '' || strpos($id, '/') === false) {
        return;
    }
    [$prop, $widget] = array_pad(explode('/', $id, 2), 2, '');
    $prop = preg_replace('/[^a-zA-Z0-9]/', '', $prop);
    $widget = preg_replace('/[^a-zA-Z0-9]/', '', $widget);
    if ($prop === '' || $widget === '') {
        return;
    }
    ?>
    <script>
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function(){
        var s1 = document.createElement('script'), s0 = document.getElementsByTagName('script')[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/<?php echo esc_js($prop); ?>/<?php echo esc_js($widget); ?>';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
    </script>
    <?php
}

add_action('wp_head', 'mw_render_hreflang_links', 1);
function mw_render_hreflang_links(): void
{
    $current = trailingslashit(home_url(add_query_arg(null, null)));
    $base = trailingslashit(home_url('/'));
    $path = ltrim(str_replace($base, '', $current), '/');
    $en = $base . $path;
    $es = $base . 'es/' . $path;
    echo "\n";
    echo '<link rel="alternate" hreflang="en" href="' . esc_url($en) . '" />' . "\n";
    echo '<link rel="alternate" hreflang="es" href="' . esc_url($es) . '" />' . "\n";
    echo '<link rel="alternate" hreflang="x-default" href="' . esc_url($en) . '" />' . "\n";
}
