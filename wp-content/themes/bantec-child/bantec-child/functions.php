<?php
/**
 * Bantec Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bantec Child
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_BANTEC_CHILD_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'bantec-child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('bantec-theme-css'), CHILD_THEME_BANTEC_CHILD_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );