<?php
if (!defined('ABSPATH'))
	exit; // No direct access

class Bantec_Addons
{

	private static $_instance = null;

	public static function instance()
	{
		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function init()
	{
		// Register widgets
		add_action('elementor/widgets/register', [$this, 'bantec_toolkit_register_widgets']);

		// Enqueue scripts
		add_action('wp_enqueue_scripts', [$this, 'bantec_toolkit_enqueue_scripts'], 20);
	}

	public function bantec_toolkit_enqueue_scripts()
	{
		wp_enqueue_style('bantec-toolkit-widget', BANTEC_ASSETS . 'elementor-addons/assets/sass/widget.css', array(), '1.0.0');

		wp_enqueue_script('bantec-toolkit-elements', BANTEC_ASSETS . 'elementor-addons/assets/js/widgets.js', array('jquery'), '1.0.0', true);
	}

	public function bantec_toolkit_register_widgets()
	{

		// Default Widgets
		require_once ('widgets/accordion/accordion.php');
		require_once ('widgets/logo/logo.php');
		require_once ('widgets/icon-box/icon-box.php');
		require_once ('widgets/button/button.php');
		require_once ('widgets/search/search.php');
		require_once ('widgets/blog/blog.php');
		require_once ('widgets/menu/nav-menu.php');
		require_once ('widgets/menu/mega-menu.php');
		require_once ('widgets/search/search.php');
		require_once ('widgets/skills/skills-bar.php');
		require_once ('widgets/video/video-icon.php');
		require_once ('widgets/offcanvas/offcanvas.php');
		require_once ('widgets/slide/text-slide.php');
		require_once ('widgets/team/team.php');
		require_once ('widgets/tab/tab.php');
		require_once ('widgets/portfolio/portfolio.php');
		require_once ('widgets/testimonial/testimonial.php');


		// Custom Widget
		require_once ('widgets/custom-design/image.php');
		require_once ('widgets/custom-design/banner-one.php');
		require_once ('widgets/custom-design/banner-two.php');
		require_once ('widgets/custom-design/menu-demo.php');
		require_once ('widgets/custom-design/gallery-image.php');

		// 3rd Party Widget 
		if (function_exists('wpcf7')) {
			require_once ('widgets/contact-form/contact-form7.php');
		}

		/**
		 * WooCommerce Functions 
		 */
		if (class_exists('WooCommerce')) {
			require_once ('widgets/woo/cart.php');
		}


	}
}

// Instantiate Plugin Class
Bantec_Addons::instance()->init();