<?php
if (!defined('ABSPATH')) exit;
if (class_exists('CSF')) {
  // Set a unique slug-like ID
  $bantec_metabox = 'bantec_meta_options';

  CSF::createMetabox($bantec_metabox, array(
    'title'     => esc_html__('Settings', 'bantec'),
    'post_type' => array('page', 'post', 'service', 'portfolio'),
  ));

  CSF::createSection($bantec_metabox, array(
    'title'  => esc_html__('Global Options', 'bantec'),
    'icon'   => 'fas fa-border-all',
    'fields' => array(

      array(
        'id'      => 'dark_mode',
        'type'    => 'button_set',
        'title'   => esc_html__('Dark Mode', 'bantec'),
        'options' => array(
          'dark-mode'   => esc_html__('Yes', 'bantec'),
          'light-mode'    => esc_html__('No', 'bantec'),
        ),
        'default' => 'light-mode',
      ),

      array(
        'id'      => 'rtl_mode',
        'type'    => 'button_set',
        'title'   => esc_html__('RTL Mode', 'bantec'),
        'options' => array(
          'rtl-mode'   => esc_html__('Yes', 'bantec'),
          'no-rtl-mode'    => esc_html__('No', 'bantec'),
        ),
        'default' => 'no-rtl-mode',
      ),
      
      array(
        'id'      => 'section_padding',
        'type'    => 'button_set',
        'title'   => esc_html__('Content Padding', 'bantec'),
        'options' => array(
          'section-padding'     => esc_html__('Yes', 'bantec'),
          'section-nopading'    => esc_html__('No', 'bantec'),
        ),
        'default' => 'section-padding',
      ),

      array(
        'id'      => 'layout_enable',
        'type'    => 'button_set',
        'title'   => esc_html__('Custom Layout', 'bantec'),
        'options' => array(
          'yes'   => esc_html__('Yes', 'bantec'),
          'no'    => esc_html__('No', 'bantec'),
        ),
        'default' => 'no',
      ),

      array(
        'id'       => 'site_layout',
        'type'     => 'palette',
        'title'    => esc_html__('Select Layout', 'bantec'),
        'options'  => array(
          'left-sidebar'   => array('#cccccc', '#eeeeee', '#eeeeee'),
          'full-width'     => array('#dddddd', '#dddddd', '#dddddd'),
          'right-sidebar'  => array('#eeeeee', '#eeeeee', '#cccccc'),
        ),
        'default'    => 'full-width',
        'dependency' => array('layout_enable', '==', 'yes'),
      ),

      array(
        'id'          => 'site_sidebars',
        'type'        => 'select',
        'title'       => esc_html__('Sidebars', 'bantec'),
        'placeholder' => esc_html__('Select a Sidebar', 'bantec'),
        'options'     => 'sidebars',
        'dependency' => array(
          array('site_layout', 'any', 'left-sidebar,right-sidebar'),
          array('layout_enable',   '==', 'yes'),
        ),
      ),

      array(
        'id'     => 'scroll_up_color',
        'type'   => 'color',
        'title'  => esc_html__('ScrollUp Color', 'bantec'),
        'output' => array('color' => '.scroll-up::after', 'stroke' => '.scroll-up svg.scroll-circle path'),
      ),

    )
  ));

  CSF::createSection($bantec_metabox, array(
    'title'     => esc_html__('Header Options', 'bantec'),
    'icon'      => 'fas fa-heading',
    'fields'    => array(

      array(
        'id'      => 'meta_header_layout',
        'type'    => 'button_set',
        'title'   => esc_html__('Custom Header', 'bantec'),
        'options' => array(
          'yes'   => esc_html__('Yes', 'bantec'),
          'no'    => esc_html__('No', 'bantec'),
        ),
        'default' => 'no',
      ),

      // Theme Builder Options
    array(
      'id'             => 'bantec_builder_id',
      'type'           => 'select',
      'title'          => esc_html__('Select a Template', 'bantec'),
      'options'        => 'posts',
      'query_args'     => array(
        'post_type'      => 'bantec_builder',
        'posts_per_page' => -1,
      ),
      'dependency'  => array(
        array('meta_header_layout', '==', 'yes'),
      ),
    ),

    array(
      'id'      => 'transparent_header',
      'type'    => 'button_set',
      'title'   => esc_html__('Transparent Header', 'bantec'),
      'options' => array(
        'bantec-transparent-header' => esc_html__('Yes', 'bantec'),
        'no-transparent-header'     => esc_html__('No', 'bantec'),
      ),
      'default' => 'no-transparent-header',
      'dependency'     => array('meta_header_layout', '==', 'yes'),
    ),

    )
  ));

  CSF::createSection($bantec_metabox, array(
    'title'     => esc_html__('Breadcrumb Settings', 'bantec'),
    'icon'      => 'fas fa-pager',
    'fields'    => array(

      array(
        'id'      => 'breadcrumb_enable',
        'type'    => 'button_set',
        'title'   => esc_html__('Enable Banner', 'bantec'),
        'options' => array(
          'yes'   => esc_html__('Yes', 'bantec'),
          'no'    => esc_html__('No', 'bantec'),
        ),
        'default' => 'yes',
      ),

      array(
        'id'      => 'breadcrumb_layout',
        'type'    => 'select',
        'title'   => esc_html__('Breadcrumb Style', 'bantec'),
        'options' => array(
          'default' => esc_html__('Default Breadcrumb', 'bantec'),
          'custom'  => esc_html__('Custom Breadcrumb', 'bantec'),
        ),
        'default' => 'default',
        'dependency' => array('breadcrumb_enable', '==', 'yes'),
      ),

      array(
        'id'                    => 'breadcrumb_bg_image',
        'type'                  => 'background',
        'title'                 => esc_html__('Background', 'bantec'),
        'output'                => '.theme_breadcrumb__area',
        'background_gradient'   => false,
        'background_origin'     => false,
        'background_clip'       => false,
        'background_blend_mode' => false,
        'background-color'      => false,
        'dependency' => array(
          array( 'breadcrumb_enable', '==', 'yes' ),
          array( 'breadcrumb_layout', '==', 'default' ),
        ),
      ),

      array(
        'id'      => 'custom_title',
        'type'    => 'button_set',
        'title'   => esc_html__('Custom Page Title', 'bantec'),
        'options' => array(
          'yes'   => esc_html__('Yes', 'bantec'),
          'no'    => esc_html__('No', 'bantec'),
        ),
        'default' => 'no',
        'dependency'  => array(
          array('breadcrumb_enable', '==', 'yes'),
          array('breadcrumb_layout', '==', 'default'),
        ),
      ),

      array(
        'id'          => 'page_title',
        'type'        => 'text',
        'title'       => esc_html__('Page Title', 'bantec'),
        'default'     => esc_html__('Custom Page Title', 'bantec'),
        'dependency'  => array(
          array('breadcrumb_enable', '==', 'yes'),
          array('custom_title', '==', 'yes'),
          array('breadcrumb_layout', '==', 'default'),
        ),
      ),


       // Theme Builder Options
     array(
      'id'             => 'breadcrumb_post_id',
      'type'           => 'select',
      'title'          => esc_html__('Select a Template', 'bantec'),
      'options'        => 'posts',
      'query_args'     => array(
        'post_type'      => 'bantec_builder',
        'posts_per_page' => -1,
      ),
      'dependency'  => array(
        array('breadcrumb_enable', '==', 'yes'),
        array('breadcrumb_layout', '==', 'custom'),
      ),
    ),


    )
  ));

  CSF::createSection($bantec_metabox, array(
    'title'  => esc_html__('Footer Options', 'bantec'),
    'icon'   => 'fas fa-stream',
    'fields' => array(

      array(
        'id'      => 'meta_footer_layout',
        'type'    => 'button_set',
        'title'   => esc_html__('Custom Footer', 'bantec'),
        'options' => array(
          'yes'   => esc_html__('Yes', 'bantec'),
          'no'    => esc_html__('No', 'bantec'),
        ),
        'default' => 'no',
      ),

    // Theme Builder Options
     array(
      'id'             => 'bantec_builder_deta',
      'type'           => 'select',
      'title'          => esc_html__('Select a Template', 'bantec'),
      'options'        => 'posts',
      'query_args'     => array(
        'post_type'      => 'bantec_builder',
        'posts_per_page' => -1,
      ),
      'dependency'  => array(
        array('meta_footer_layout', '==', 'yes'),
      ),
    ),


    )
  ));
}
