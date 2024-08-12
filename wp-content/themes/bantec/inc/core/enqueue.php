<?php

/**
 * Enqueue scripts and styles.
 */
/**
 * Enqueue scripts and styles.
 */
function bantec_scripts()
{
    if (!class_exists('CSF')) {
        wp_enqueue_style('bantec-default-fonts', "//fonts.googleapis.com/css?family=Space+Grotesk:400,500,600,700", '', '1.0.0', 'screen');
    }
    wp_enqueue_style('bootstrap', get_theme_file_uri('/assets/css/bootstrap.min.css'), null, BANTEC_VERSION);
    wp_enqueue_style('fontawesome', get_theme_file_uri('/assets/css/fontawesome.css'), null, BANTEC_VERSION);
    wp_enqueue_style('meanmenu', get_theme_file_uri('/assets/css/meanmenu.min.css'), null, BANTEC_VERSION);
    wp_enqueue_style('bantec-sass', get_theme_file_uri('/assets/sass/style.css'), null, BANTEC_VERSION);
    wp_enqueue_style('bantec-style', get_stylesheet_uri(), array(), BANTEC_VERSION);

    wp_enqueue_script('bootstrap', get_theme_file_uri('/assets/js/bootstrap.min.js'), array('jquery'), BANTEC_VERSION, true);
    wp_enqueue_script('popper', get_theme_file_uri('/assets/js/popper.min.js'), array('jquery'), BANTEC_VERSION, true);
    wp_enqueue_script('meanmenu', get_theme_file_uri('/assets/js/jquery.meanmenu.min.js'), array('jquery'), BANTEC_VERSION, true);
    wp_enqueue_script('bantec-script', get_theme_file_uri('/assets/js/custom.js'), array('jquery'), BANTEC_VERSION, true);


    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'bantec_scripts');
