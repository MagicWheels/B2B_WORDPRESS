<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
</main>
<footer class="mw-site-footer">
    <div class="mw-wrap mw-footer-grid">
        <div class="mw-footer-brand">
            <strong>MAGIC WHEELS</strong>
            <p>Kids scooter manufacturer for retail, distribution, and OEM/ODM buyer programs.</p>
        </div>
        <div>
            <strong>Products</strong>
            <a href="<?php echo esc_url(mw_term_link_by_name('3-Wheel Toddler Scooters')); ?>">3-Wheel Toddler Scooters</a>
            <a href="<?php echo esc_url(mw_term_link_by_name('2-Wheel Kids Scooters')); ?>">2-Wheel Kids Scooters</a>
            <a href="<?php echo esc_url(mw_products_url()); ?>">Light-up Series</a>
            <a href="<?php echo esc_url(mw_products_url()); ?>">Electric Scooters</a>
        </div>
        <div>
            <strong>Solutions</strong>
            <a href="<?php echo esc_url(home_url('/solutions/')); ?>">For Distributors</a>
            <a href="<?php echo esc_url(home_url('/solutions/')); ?>">For Retailers</a>
            <a href="<?php echo esc_url(home_url('/oem-odm/')); ?>">OEM/ODM</a>
            <a href="<?php echo esc_url(home_url('/quality-compliance/')); ?>">Quality & Compliance</a>
        </div>
        <div>
            <strong>Contact Us</strong>
            <p><?php echo esc_html(get_option('admin_email', 'chloe@shmagicwheels.com')); ?></p>
        </div>
    </div>
    <div class="mw-wrap mw-footer-bottom">
        <span>&copy; <?php echo esc_html(date_i18n('Y')); ?> MAGIC WHEELS. All rights reserved.</span>
    </div>
</footer>
<?php
$whatsapp_number = mw_whatsapp_number();
$whatsapp_url = mw_whatsapp_url();
?>
<div class="mw-mobile-actionbar" aria-label="Quick contact actions">
    <a href="<?php echo esc_url(mw_contact_url()); ?>">Request a Quote</a>
    <a
        href="<?php echo esc_url($whatsapp_url); ?>"
        aria-label="<?php echo esc_attr($whatsapp_number === '' ? 'Contact MAGIC WHEELS for WhatsApp details' : 'Contact MAGIC WHEELS on WhatsApp'); ?>"
        <?php if ($whatsapp_number !== '') : ?>target="_blank" rel="noopener noreferrer"<?php endif; ?>
    >WhatsApp</a>
</div>
<a
    class="mw-floating-whatsapp"
    href="<?php echo esc_url($whatsapp_url); ?>"
    aria-label="<?php echo esc_attr($whatsapp_number === '' ? 'Contact MAGIC WHEELS for WhatsApp details' : 'Contact MAGIC WHEELS on WhatsApp'); ?>"
    <?php if ($whatsapp_number !== '') : ?>target="_blank" rel="noopener noreferrer"<?php endif; ?>
>WhatsApp</a>
<?php wp_footer(); ?>
</body>
</html>
