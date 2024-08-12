<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bantec
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php if (class_exists('CSF')) {
		$elements = 'elements-design';
	} else {
		$elements = 'bantec-core';
	} ?>

	<?php
	if (is_page() || is_singular('post') || bantec_custom_post_metas() && get_post_meta($post->ID, 'bantec_meta_options', true)) {
		$bantec_meta = get_post_meta($post->ID, 'bantec_meta_options', true);
	} else {
		$bantec_meta = array();
	}

	$header_custom = bantec_option('header_layout');

	if ((is_array($bantec_meta) && array_key_exists('meta_header_layout', $bantec_meta) && $bantec_meta['meta_header_layout'] != 'no') || ($header_custom != 'header-default' && class_exists('CSF'))) {
		$header_layout_style = 'header-custom';
	} else {
		$header_layout_style = 'header-default';
	}

	$site_dark = bantec_option('dark_mode');

	if (is_array($bantec_meta) && array_key_exists('dark_mode', $bantec_meta)) {
		$dark_mode = $bantec_meta['dark_mode'];
	} else if (!empty($site_dark) && class_exists('CSF')) {
		$dark_mode = bantec_option('dark_mode');
	} else {
		$dark_mode = 'light-mode';
	}

	$site_rtl = bantec_option('rtl_mode');

	if (is_array($bantec_meta) && array_key_exists('rtl_mode', $bantec_meta)) {
		$rtl_mode = $bantec_meta['rtl_mode'];
	} else if (!empty($site_rtl) && class_exists('CSF')) {
		$rtl_mode = bantec_option('rtl_mode');
	} else {
		$rtl_mode = 'no-rtl-mode';
	}

	?>

	<div id="page"
		class="site<?php echo ($rtl_mode !== 'no-rtl-mode' ? ' ' . esc_attr($rtl_mode) : '') . ($dark_mode !== 'light-mode' ? ' ' . esc_attr($dark_mode) : '') . ($elements !== 'elements-design' ? ' ' . esc_attr($elements) : ''); ?>">
		<?php get_template_part('template-parts/default-options/' . 'preloader'); ?>
		<?php get_template_part('template-parts/header-layout/' . $header_layout_style . ''); ?>