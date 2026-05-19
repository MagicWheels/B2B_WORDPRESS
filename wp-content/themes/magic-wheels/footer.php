<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
</main>
<footer class="mw-site-footer">
    <div class="mw-wrap mw-footer-grid">
        <div>
            <strong>MAGIC WHEELS</strong>
            <p>Compliance-ready kids scooters for retail, importer, distributor, and OEM/ODM programs.</p>
        </div>
        <div>
            <strong>Contact</strong>
            <p>RFQ email and WhatsApp are configurable before production launch.</p>
            <p><?php echo esc_html(get_option('admin_email', 'chloe@shmagicwheels.com')); ?></p>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
