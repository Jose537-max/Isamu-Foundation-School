<?php

/**
 * Load enqueue scripts
 */
if (class_exists('CSF')) {
	require_once('blocks/recent-post.php');
	require_once('blocks/menu-list.php');
	require_once('blocks/download.php');
	require_once('blocks/sidebar-cta.php');

if (!function_exists('bantec_block_style')) {
	function bantec_block_style()
	{
		wp_enqueue_style('bantec-block-style', BANTEC_ASSETS . 'core/block-widgets/assets/css/block-style.css', '1.0.0');
	}
	add_action('wp_enqueue_scripts', 'bantec_block_style', 20);
}
}