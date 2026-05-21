<?php
if (!defined('ABSPATH')) {
    exit;
}

update_option('blogname', 'MAGIC WHEELS');
update_option('blogdescription', 'Compliance-ready kids scooters for retail and OEM/ODM programs.');
update_option('admin_email', 'chloe@shmagicwheels.com');
update_option('permalink_structure', '/%postname%/');

$pages = [
    'solutions' => ['Solutions', 'Structured support for retail programs, importers, distributors, and ODM brand development.'],
    'mass-retail-programs' => ['Mass Retail Programs', 'Retail program planning, compliance review, packaging, and launch coordination.'],
    'importers-distributors' => ['Importers & Distributors', 'Model matching, clear specifications, stable lead time, and distribution support.'],
    'brands-odm-development' => ['Brands / ODM Development', 'Concept development, prototyping, tooling, graphics, and packaging adaptation.'],
    'oem-odm' => ['OEM/ODM', 'Custom colors, graphics, packaging, molds, and development workflows for buyer programs.'],
    'quality-compliance' => ['Quality & Compliance', 'Compliance-first product development, QC workflow, and documentation support.'],
    'factory' => ['Factory', 'Factory capability, production planning, packaging, QC, and program coordination.'],
    'resources' => ['Resources', 'Buyer guides and sourcing knowledge for kids scooter programs.'],
    'about' => ['About', 'MAGIC WHEELS supports global kids scooter buyers from Shanghai coordination and factory capability.'],
    'contact' => ['RFQ / Contact', '[magic_wheels_rfq]'],
    'rfq' => ['Request a Quote', '[magic_wheels_rfq]'],
];

foreach ($pages as $slug => [$title, $content]) {
    $matches = get_posts([
        'post_type' => 'page',
        'name' => $slug,
        'post_status' => 'any',
        'numberposts' => 1,
    ]);
    $existing = $matches ? $matches[0] : null;
    $parent_id = 0;
    if (in_array($slug, ['mass-retail-programs', 'importers-distributors', 'brands-odm-development'], true)) {
        $parent = get_page_by_path('solutions');
        $parent_id = $parent ? (int) $parent->ID : 0;
    }

    $data = [
        'post_type' => 'page',
        'post_status' => 'publish',
        'post_title' => $title,
        'post_name' => $slug,
        'post_content' => $content,
        'post_parent' => $parent_id,
    ];

    if ($existing) {
        $data['ID'] = $existing->ID;
        wp_update_post($data);
        continue;
    }

    wp_insert_post($data);
}

if (function_exists('mw_resource_articles')) {
    foreach (mw_resource_articles() as $article) {
        $content = '<p>' . esc_html($article['summary']) . '</p>'
            . '<h2>What buyers should clarify first</h2>'
            . '<p>Before requesting a quotation, confirm the target market, age range, expected retail channel, required documents, and launch timeline. These inputs make model recommendation and sampling decisions much clearer.</p>'
            . '<h2>How to evaluate the supplier response</h2>'
            . '<p>A strong response should connect product specifications with compliance discussion, packaging assumptions, MOQ, lead-time planning, and practical quality control checkpoints.</p>'
            . '<h2>RFQ checklist</h2>'
            . '<ul><li>Target market and required standards</li><li>Estimated quantity or annual volume</li><li>Preferred model, age range, or category</li><li>Packaging and display needs</li><li>Timeline for sampling, pilot, and mass production</li></ul>'
            . '<h2>FAQ</h2>'
            . '<p><strong>Can this topic be reviewed before ordering?</strong> Yes. MAGIC WHEELS can discuss the sourcing question during RFQ evaluation and recommend suitable next steps.</p>'
            . '<p><strong>Can documents be shared publicly?</strong> Sensitive reports and certificate details should be shared in a masked or request-based format when available and approved.</p>'
            . '<p><a href="' . esc_url(home_url('/rfq/')) . '">Planning a scooter program? Send your RFQ brief.</a></p>';

        $existing = get_page_by_path($article['slug'], OBJECT, 'post');
        $data = [
            'post_type' => 'post',
            'post_status' => 'publish',
            'post_title' => $article['title'],
            'post_name' => $article['slug'],
            'post_excerpt' => $article['summary'],
            'post_content' => $content,
        ];

        if ($existing) {
            $data['ID'] = $existing->ID;
            wp_update_post($data);
        } else {
            wp_insert_post($data);
        }
    }
}

if (defined('MW_CASE_POST_TYPE') && function_exists('mw_case_studies')) {
    foreach (mw_case_studies() as $case) {
        $slug = sanitize_title($case['title']);
        $content = '<h2>Customer type</h2><p>' . esc_html($case['type']) . '</p>'
            . '<h2>Project background</h2><p>This case is presented in a masked format to protect client names, artwork, commercial details, and documentation.</p>'
            . '<h2>Challenge</h2><p>' . esc_html($case['challenge']) . '</p>'
            . '<h2>Solution</h2><p>' . esc_html($case['solution']) . '</p>'
            . '<h2>Result</h2><p>' . esc_html($case['result']) . '</p>'
            . '<p><a href="' . esc_url(home_url('/rfq/')) . '">Discuss a similar program with MAGIC WHEELS.</a></p>';

        $existing = get_page_by_path($slug, OBJECT, MW_CASE_POST_TYPE);
        $data = [
            'post_type' => MW_CASE_POST_TYPE,
            'post_status' => 'publish',
            'post_title' => $case['title'],
            'post_name' => $slug,
            'post_excerpt' => $case['challenge'],
            'post_content' => $content,
        ];

        if ($existing) {
            $data['ID'] = $existing->ID;
            wp_update_post($data);
        } else {
            wp_insert_post($data);
        }
    }
}

$sample_page = get_page_by_path('sample-page');
if ($sample_page) {
    wp_update_post([
        'ID' => $sample_page->ID,
        'post_status' => 'draft',
    ]);
}

$hello_world = get_page_by_path('hello-world', OBJECT, 'post');
if ($hello_world) {
    wp_update_post([
        'ID' => $hello_world->ID,
        'post_status' => 'draft',
    ]);
}

WP_CLI::runcommand('theme activate magic-wheels');
flush_rewrite_rules();
WP_CLI::success('MAGIC WHEELS site setup complete.');
