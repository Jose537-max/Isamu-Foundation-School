<?php

/**
 * Plugin Name:       Bantec Toolkit
 * Plugin URI:        http://themeforest.net/user/themeori
 * Description:       This is a Toolkit Plugin Required to Run the Bantec WordPress Theme
 * Version:           1.0.1
 * Requires at least: 6.2
 * Requires PHP:      7.4
 * Author:            ThemeOri
 * Author URI:        http://themeforest.net/user/themeori
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       bantec-toolkit
 * Domain Path:       /languages
 */

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly

define('BANTEC_FILE', __FILE__);
define('BANTEC_URL', plugin_dir_url(BANTEC_FILE));
define('BANTEC_ASSETS', trailingslashit(BANTEC_URL));

/**
 * Load plugin textdomain.
 */

if (!function_exists('bantec_toolkit_init')) {

	function bantec_toolkit_init()
	{
		load_plugin_textdomain('bantec-toolkit', false, plugin_basename(dirname(__FILE__)) . '/languages');
	}
}
add_action('plugins_loaded', 'bantec_toolkit_init');



/**
 * Load csf plugin and custom block widgets
 */

require_once('lib/codestar-framework/codestar-framework.php');
require_once('core/block-widgets/block-manager.php');



/**
 * Load Custom functions of Plugin
 */

require_once('core/custom-post-type.php');
require_once('core/builder-hook.php');
require_once('core/functions.php');

/**
 * Check if elementor plugin has installed and actived
 */

if (!function_exists('bantec_toolkit_elementor_addons')) {

	function bantec_toolkit_elementor_addons()

	{	require_once ('core/library/setup.php');
		require_once('elementor-addons/helper/widget-assets.php');
		require_once('elementor-addons/helper/elements-manager.php');
		require_once('elementor-addons/helper/custom-icon.php');
		require_once('elementor-addons/helper/controls.php');
		require_once('elementor-addons/elementor-addons.php');
		// only for mega menu 
		require_once('core/mega-menu/mega_nav_walker.php');
		require_once('core/mega-menu/nav-options.php');
	}
}
add_action('elementor/init', 'bantec_toolkit_elementor_addons');
