<?php

/**
 * Import demo data.
 */

// Disable regenerating images while importing media
add_filter('ocdi/regenerate_thumbnails_in_content_import', '__return_false');
add_filter('ocdi/plugin_intro_text', '__return_false');
add_filter('ocdi/disable_pt_branding', '__return_true');


function bantec_ocdi_confirmation_dialog_options($options)
{
	return array_merge($options, array(
		'width' => 400,
		'dialogClass' => 'wp-dialog',
		'resizable' => false,
		'height' => 'auto',
		'modal' => true,
	)
	);
}
add_filter('ocdi/confirmation_dialog_options', 'bantec_ocdi_confirmation_dialog_options', 10, 1);



function bantec_import_demo_files()
{
	return [

		// demo 01
		[
			'import_file_name' => esc_html__('Light Demo', 'bantec'),
			'local_import_file' => trailingslashit(get_template_directory()) . '/inc/demo-content/light/content.xml',
			'local_import_widget_file' => trailingslashit(get_template_directory()) . '/inc/demo-content/light/widget.wie',
			'local_import_customizer_file' => trailingslashit(get_template_directory()) . '/inc/demo-content/light/customizer.dat',
			'local_import_json' => array(
				array(
					'file_path' => trailingslashit(get_template_directory()) . '/inc/demo-content/light/theme-options.json',
					'option_name' => 'bantec_theme_options',
				),
			),
			'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . '/inc/demo-content/light/demo.png',
			'preview_url' => 'https://bantec.themeori.com/',
		],

		// demo 01
		[
			'import_file_name' => esc_html__('Dark Demo', 'bantec'),
			'local_import_file' => trailingslashit(get_template_directory()) . '/inc/demo-content/dark/content.xml',
			'local_import_widget_file' => trailingslashit(get_template_directory()) . '/inc/demo-content/dark/widget.wie',
			'local_import_customizer_file' => trailingslashit(get_template_directory()) . '/inc/demo-content/dark/customizer.dat',
			'local_import_json' => array(
				array(
					'file_path' => trailingslashit(get_template_directory()) . '/inc/demo-content/dark/theme-options.json',
					'option_name' => 'bantec_theme_options',
				),
			),
			'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . '/inc/demo-content/dark/demo.png',
			'preview_url' => 'https://bantec-dark.themeori.com/',
		],


		// demo 01
		[
			'import_file_name' => esc_html__('RTL Demo', 'bantec'),
			'local_import_file' => trailingslashit(get_template_directory()) . '/inc/demo-content/rtl/content.xml',
			'local_import_widget_file' => trailingslashit(get_template_directory()) . '/inc/demo-content/rtl/widget.wie',
			'local_import_customizer_file' => trailingslashit(get_template_directory()) . '/inc/demo-content/rtl/customizer.dat',
			'local_import_json' => array(
				array(
					'file_path' => trailingslashit(get_template_directory()) . '/inc/demo-content/rtl/theme-options.json',
					'option_name' => 'bantec_theme_options',
				),
			),
			'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . '/inc/demo-content/rtl/demo.png',
			'preview_url' => 'https://bantec-rtl.themeori.com/',
		],

	];
}

add_filter('ocdi/import_files', 'bantec_import_demo_files');

/**
 * Add CSF json
 */
if (!function_exists('bantec_after_content_import_execution')) {
	function bantec_after_content_import_execution($selected_import_files, $import_files, $selected_index)
	{

		$downloader = new OCDI\Downloader();

		if (!empty($import_files[$selected_index]['import_json'])) {

			foreach ($import_files[$selected_index]['import_json'] as $index => $import) {
				$file_path = $downloader->download_file($import['file_url'], 'demo-import-file-' . $index . '-' . date('Y-m-d__H-i-s') . '.json');
				$file_raw = OCDI\Helpers::data_from_file($file_path);
				update_option($import['option_name'], json_decode($file_raw, true));
			}
		} else if (!empty($import_files[$selected_index]['local_import_json'])) {

			foreach ($import_files[$selected_index]['local_import_json'] as $index => $import) {
				$file_path = $import['file_path'];
				$file_raw = OCDI\Helpers::data_from_file($file_path);
				update_option($import['option_name'], json_decode($file_raw, true));
			}
		}
	}

	add_action('ocdi/after_content_import_execution', 'bantec_after_content_import_execution', 3, 99);
}

/* After Import */

if (!function_exists('bantec_after_import')) {
	function bantec_after_import($selected_import)
	{

		//Set Menu
		$main_menu = get_term_by('name', esc_html__('Main Menu', 'bantec'), 'nav_menu');

		set_theme_mod(
			'nav_menu_locations',
			array(
				'header-menu' => $main_menu->term_id,
			)
		);

		$home_page = get_page_by_title(esc_html__('Main Demo', 'bantec'));

		//Set Front page
		if (isset($home_page->ID)) {
			update_option('page_on_front', $home_page->ID);
			update_option('show_on_front', 'page');
		}

		// Set Post Page
		$blog_page = get_page_by_title(esc_html__('Blog', 'bantec'));
		if (isset($blog_page->ID)) {
			update_option('page_for_posts', $blog_page->ID);
		}
	}
	add_action('ocdi/after_import', 'bantec_after_import');
}

/* Theme Page Demo Import */

if (!function_exists('bantec_ocdi_page')) {
	function bantec_ocdi_page($args)
	{

		$args['parent_slug'] = 'bantec';
		$args['menu_slug'] = 'bantec-demo';
		$args['menu_title'] = esc_html__('Demo Import', 'bantec');
		$args['capability'] = 'manage_options';

		return $args;

	}
	add_filter('ocdi/plugin_page_setup', 'bantec_ocdi_page');
}