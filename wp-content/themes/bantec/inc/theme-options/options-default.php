<?php
if (!defined('ABSPATH')) {
	exit;
}

function bantec_default_options()
{

	$bantec_htmls = array(
		'a'      => array(
			'href'   => array(),
			'target' => array()
		),
		'strong' => array(),
		'small'  => array(),
		'span'   => array(),
		'p'      => array(),
	);

	return array(
		'footer_copyright'    => wp_kses(__('<p>Copyright 2024 - All Rights Reserved By <a href="http://themeforest.net/user/themeori">ThemeOri</a></p>', 'bantec'), $bantec_htmls),
		'error_page_404'    => wp_kses(__('4<span>0</span>4', 'bantec'), $bantec_htmls),
		'error_page_title'    => esc_html__('Oops! Page not found.', 'bantec'),
		'error_page_content'  => esc_html__('The page you are looking for is not available or doesn’t belong to this website!', 'bantec'),
		'error_page_btn_text' => esc_html__('Back to Home', 'bantec'),
		'blog-page-title'     => esc_html__('Blog', 'bantec'),
		'blog-cta-btn'        => esc_html__('Read More', 'bantec'),
		'home_page_title1'        => esc_html__('Home', 'bantec'),
		'blog_page_title1'        => esc_html__('Blog', 'bantec'),
	);
}


// Display Data from Theme Option 

if (!function_exists('bantec_option')) {
	function bantec_option($option = '', $default = null)
	{
		$defaults = bantec_default_options();
		$options  = get_option('bantec_theme_options');
		$default  = (!isset($default) && isset($defaults[$option])) ? $defaults[$option] : $default;
		return (isset($options[$option])) ? $options[$option] : $default;
	}
}


/**
 * Enqueue Backend Styles And Scripts.
 **/

function bantec_icon_assets()
{
	wp_enqueue_style('font-awsome-pro', get_theme_file_uri('assets/css/fontawesome.css'), array(), '1.0.0', 'all');
}

add_action('admin_enqueue_scripts', 'bantec_icon_assets');


if (!function_exists('bantec_custom_icons')) {

	function bantec_custom_icons($icons)
	{

		// Adding new icons
		$icons[] = array(
			'title' => esc_html__('Font Awesome 6 Pro', 'bantec'),
			'icons' => array(
				'fa-regular fa-angle-right'      => 'fa-regular fa-angle-right',
			),
		);

		return $icons;
	}

	add_filter('csf_field_icon_add_icons', 'bantec_custom_icons');
}
