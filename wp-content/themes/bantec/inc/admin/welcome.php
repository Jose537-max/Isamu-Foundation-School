<?php if (!defined('ABSPATH')) {
    die;
} // Cannot access directly. ?>

<div class="wrap to-wrap">

    <div class="to-admin-page-header">

        <div class="to-admin-page-header-text">
            <h1>
                <?php esc_html_e('Welcome to Bantec!', 'bantec'); ?>
            </h1>
            <p>
                <?php esc_html_e('Bantec - IT Solutions & Technology WordPress Theme', 'bantec'); ?>
            </p>
        </div>

        <div class="to-admin-page-header-logo">
            <img src="<?php echo get_theme_file_uri('inc/admin/assets/img/icon.svg'); ?>" />
        </div>
    </div>

    <div class="to-admin-boxes">

        <div class="to-admin-box">

            <div class="to-admin-box-header">
                <h2>
                    <?php esc_html_e('Documentation', 'bantec'); ?>
                </h2>
            </div>

            <div class="to-admin-box-inside">
                <p>
                    <?php esc_html_e('You can find everything about theme functionality.', 'bantec'); ?>
                </p>
                <a href="https://themeori.com/docs/bantec-theme/" target="_blank" class="button">
                    <?php esc_html_e('Go to Documentation', 'bantec'); ?>
                </a>
            </div>

        </div>

        <div class="to-admin-box">

            <div class="to-admin-box-header">
                <h2>
                    <?php esc_html_e('Bantec Support', 'bantec'); ?>
                </h2>
            </div>

            <div class="to-admin-box-inside">
                <p>
                    <?php esc_html_e('Do you need help? Feel to free ask any question.', 'bantec'); ?>
                </p>
                <a href="https://themeori.com/support/" target="_blank"
                    class="button"><?php esc_html_e('Go to Support Page', 'bantec'); ?></a>
            </div>

        </div>

    </div>

</div>