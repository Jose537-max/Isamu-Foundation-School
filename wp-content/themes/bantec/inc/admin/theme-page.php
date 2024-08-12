<?php if (!defined('ABSPATH')) {
  die;
} // Cannot access directly.

/**
 * Theme Admin Pages
 */

if (!class_exists('Bantec_Admin')) {

  class Bantec_Admin
  {
    private static $instance = null;

    public static function init()
    {
      if (is_null(self::$instance)) {
        self::$instance = new self();
      }
      return self::$instance;
    }

    public function __construct()
    {
      add_action('admin_menu', array($this, 'bantec_admin_page'), 1);
      add_action('admin_enqueue_scripts', array($this, 'bantec_theme_page_assets'));

    }

    public function bantec_admin_page()
    {

      add_menu_page(
        esc_html__('Bantec', 'bantec'),
        esc_html__('Bantec', 'bantec'),
        'manage_options',
        'bantec',
        array(
          $this,
          'bantec_theme_welcome'
        ),
        get_theme_file_uri('inc/admin/assets/img/icon-two.svg'),
        2
      );

      add_submenu_page(
        'bantec',
        esc_html__('Welcome', 'bantec'),
        esc_html__('Welcome', 'bantec'),
        'manage_options',
        'bantec',
        array($this, 'bantec_theme_welcome'),
      );
      if (class_exists('CSF')) {
        add_submenu_page(
          'bantec',
          'Template Builder',
          'Template Builder',
          'manage_options',
          'edit.php?post_type=bantec_builder',
        );
      }

    }

    public function bantec_theme_welcome()
    {
      get_template_part('inc/admin/' . 'welcome');
    }
    public function bantec_theme_page_assets()
    {
      wp_enqueue_style('bantec-admin', get_theme_file_uri('inc/admin/assets/css/admin.css'), array(), BANTEC_VERSION, 'all');
    }

  }

  Bantec_Admin::init();
}