<?php
if (!defined('ABSPATH')) {
  exit;
}

if (class_exists('CSF')) {
  /*
 *  Set a unique slug-like ID
 */
  $bantec_theme_option = 'bantec_theme_options';

  CSF::createOptions($bantec_theme_option, array(
    'menu_title'      => esc_html__('Theme Options', 'bantec'),
    'framework_title' => wp_kses(
      sprintf(__("Theme Options <small>By ThemeOri</small>", 'bantec')),
      array('small'   => array())
    ),
    'menu_slug'       => 'bantec-options',
    'show_search'     => false,
    'menu_type'       => 'submenu',
    'menu_parent'     => 'bantec',
    'menu_position'   => 2,    
    'footer_credit'   => wp_kses(
      __('Developed by: <a target="_blank" href="https://themeforest.net/user/themeori/portfolio">ThemeOri</a>', 'bantec'),
      array(
        'a'           => array(
          'href'      => array(),
          'target'    => array()
        ),
      )
    ),
    'footer_text'     => esc_html__('ThemeOri Core Framework', 'bantec'),
    'defaults'        => bantec_default_options(),
  ));

  /*
 * Global Options
 */
  require_once 'global-options.php';

  /*
 * Typography Options
 */
  require_once 'typography-options.php';


  /*
 * Theme Color Options
 */
  require_once 'color-options.php';

  /*
 * Headers Options
 */
  require_once 'header-options.php';

  /*
 * Breadcrumb Options
 */
  require_once 'breadcrumb-options.php';

  /*
 * Site Layout
 */
  require_once 'site-layout.php';

  /*
 * Blog Options
 */
  require_once 'blog-options.php';

  /*
 * 404 Page Options
 */
  require_once 'error-page-options.php';

  /*
 * Footer Options
 */
  require_once 'footer-options.php';


  /*
 * Backup Options
 */

  CSF::createSection($bantec_theme_option, array(
    'title'  => esc_html__('Backup', 'bantec'),
    'icon'   => 'fas fa-file-alt',
    'fields' => array(
      array(
        'type' => 'backup',
      ),
    )
  ));
}
