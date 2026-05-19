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
    'oem-odm' => ['OEM/ODM', 'Custom colors, graphics, packaging, molds, and development workflows for buyer programs.'],
    'quality-compliance' => ['Quality & Compliance', 'Compliance-first product development, QC workflow, and documentation support.'],
    'factory' => ['Factory', 'Factory capability, production planning, packaging, QC, and program coordination.'],
    'resources' => ['Resources', 'Buyer guides and sourcing knowledge for kids scooter programs.'],
    'about' => ['About', 'MAGIC WHEELS supports global kids scooter buyers from Shanghai coordination and factory capability.'],
    'contact' => ['RFQ / Contact', '[magic_wheels_rfq]'],
];

foreach ($pages as $slug => [$title, $content]) {
    $existing = get_page_by_path($slug);
    $data = [
        'post_type' => 'page',
        'post_status' => 'publish',
        'post_title' => $title,
        'post_name' => $slug,
        'post_content' => $content,
    ];

    if ($existing) {
        $data['ID'] = $existing->ID;
        wp_update_post($data);
        continue;
    }

    wp_insert_post($data);
}

WP_CLI::runcommand('theme activate magic-wheels');
flush_rewrite_rules();
WP_CLI::success('MAGIC WHEELS site setup complete.');
