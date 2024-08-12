<?php

if (is_page() || is_singular(array('post', 'service', 'portfolio')) && get_post_meta($post->ID, 'bantec_meta_options', true)) {
	$bantec_meta = get_post_meta($post->ID, 'bantec_meta_options', true);
} else {
	$bantec_meta = array();
}

if (is_array($bantec_meta) && array_key_exists('breadcrumb_enable', $bantec_meta)) {
	$banner_breadcrumb = $bantec_meta['breadcrumb_enable'];
} else {
	$banner_breadcrumb = bantec_option('banner_breadcrumb', true);
}

$breadcrumb_option = bantec_option('breadcrumb_layout');

if ((is_array($bantec_meta) && array_key_exists('breadcrumb_layout', $bantec_meta) && $bantec_meta['breadcrumb_layout'] != 'default') || ($breadcrumb_option != 'default' && class_exists('CSF'))) { 
	$breadcrumb_style = 'custom';
} else {
	$breadcrumb_style = 'default';
}


?>

<?php if ($banner_breadcrumb == 'yes'): ?>

<?php get_template_part('template-parts/default-options/breadcrumb/' . $breadcrumb_style . ''); ?>

<?php endif; ?>