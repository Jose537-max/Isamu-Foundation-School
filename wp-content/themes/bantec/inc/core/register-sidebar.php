<?php

/**
 * Register Sidebar area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bantec_widgets_init()
{
	// Default Sidebar
	register_sidebar(
		array(
			'name'          => esc_html__('Right Sidebar', 'bantec'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'bantec'),
			'before_widget' => '<div id="%1$s" class="all__sidebar-item widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	if (class_exists('CSF')) :

		// Service Sidebar
		register_sidebar(
			array(
				'name'          => esc_html__('Left Sidebar', 'bantec'),
				'id'            => 'sidebar-2',
				'description'   => esc_html__('Add widgets here.', 'bantec'),
				'before_widget' => '<div id="%1$s" class="all__sidebar-item widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);

		// Service Sidebar
		register_sidebar(
			array(
				'name'          => esc_html__('Service Sidebar', 'bantec'),
				'id'            => 'service-1',
				'description'   => esc_html__('Add widgets here.', 'bantec'),
				'before_widget' => '<div id="%1$s" class="all__sidebar-item widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);

	endif;
}
add_action('widgets_init', 'bantec_widgets_init');
