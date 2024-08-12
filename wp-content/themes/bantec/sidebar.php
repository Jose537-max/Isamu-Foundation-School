<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bantec
 */

if (is_singular(array('post', 'service')) && get_post_meta($post->ID, 'bantec_meta_options', true)) {
	$bantec_meta = get_post_meta($post->ID, 'bantec_meta_options', true);
} else {
	$bantec_meta = array();
}


if (is_array($bantec_meta) && array_key_exists('site_layout', $bantec_meta) && $bantec_meta['site_layout'] != 'full-width') {
	$selected_sidebar = $bantec_meta['site_sidebars'];
} else if (is_home() || is_archive()) {
	$selected_sidebar = bantec_option('blog_sidebar', 'sidebar-1');
} else if (is_singular('post')) {
	$selected_sidebar = bantec_option('single_sidebar', 'sidebar-1');
} else if (is_singular('service')) {
	$selected_sidebar = bantec_option('service_sidebar', 'sidebar-1');
} else {
	$selected_sidebar = 'sidebar-1';
}
?>

<div class="all__sidebar">
	<?php if (is_active_sidebar($selected_sidebar)) {
		dynamic_sidebar($selected_sidebar);
	} ?>
</div><!-- #secondary -->