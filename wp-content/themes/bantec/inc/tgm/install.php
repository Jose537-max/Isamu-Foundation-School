<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for plugin bantec
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */
add_action('tgmpa_register', 'bantec_register_required_plugins');
function bantec_register_required_plugins()
{

	$plugins = array(

		array(
			'name' => esc_html__('Bantec Toolkit', 'bantec'),
			'slug' => 'bantec-toolkit',
			'source' => get_template_directory() . '/inc/tgm/plugins/bantec-toolkit.zip',
			'required' => true,
			'version' => '1.0.0',
			'force_activation' => false,
			'force_deactivation' => false,
			'external_url' => '',
			'is_callable' => '',
		),

		array(
			'name' => esc_html__('One Click Demo Import', 'bantec'),
			'slug' => 'one-click-demo-import',
			'required' => false,
		),

		array(
			'name' => esc_html__('Elementor Website Builder', 'bantec'),
			'slug' => 'elementor',
			'required' => true,
		),

		array(
			'name' => esc_html__('Contact Form 7', 'bantec'),
			'slug' => 'contact-form-7',
			'required' => false,
		),

		array(
            'name'               => esc_html__('WooCommerce','bantec'),
            'slug'               => 'woocommerce',
            'required'           => false, 
        ),

        array(
            'name'               => esc_html__('TI WooCommerce Wishlist','bantec'),
            'slug'               => 'ti-woocommerce-wishlist',
            'required'           => false, 
        ),   

        array(
            'name'               => esc_html__('WPC Smart Quick View for WooCommerce','bantec'),
            'slug'               => 'woo-smart-quick-view',
            'required'           => false, 
        ), 

	);


	$config = array(
		'id' => 'bantec',
		'default_path' => '',
		'menu' => 'tgmpa-install-plugins',
		'parent_slug' => 'bantec',
		'capability' => 'manage_options',
		'has_notices' => true,
		'dismissable' => true,
		'dismiss_msg' => '',
		'is_automatic' => false,
		'message' => '',

	);

	tgmpa($plugins, $config);
}