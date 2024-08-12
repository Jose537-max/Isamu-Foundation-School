<?php


require get_template_directory() . '/inc/admin/theme-page.php';

/**
 * Theme Setup 
 */
require get_template_directory() . '/inc/core/theme-install.php';

/**
 * Register Widget 
 */
require get_template_directory() . '/inc/core/register-sidebar.php';

/**
 * Enqueue Assets
 */
require get_template_directory() . '/inc/core/enqueue.php';

/**
 * Default Theme Options
 */

require get_template_directory() . '/inc/theme-options/options-default.php';

/**
 * Theme Options 
 */

require get_template_directory() . '/inc/theme-options/theme-options.php';

/**
 * Metabox Options
 */

require get_template_directory() . '/inc/metabox/theme-metabox.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom Comment Form
 */
require get_template_directory() . '/inc/core/comment-form.php';


require get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/tgm/install.php';
require get_template_directory() . '/inc/demo-content/demo-import.php';


/**
 * WooCommerce Functions 
 */
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/core/woo-functions.php';
}

