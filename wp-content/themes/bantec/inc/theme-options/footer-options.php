<?php

// Footer Options

CSF::createSection($bantec_theme_option, array(
  'title'  => esc_html__('Footer Options', 'bantec'),
  'icon'   => 'fas fa-stream',
  'id'     => 'footer_options',
  'fields' => array()
));

CSF::createSection($bantec_theme_option, array(
  'title'  => esc_html__('General Footer', 'bantec'),
  'icon'   => 'fas fa-stream',
  'id'     => 'general_footer',
  'parent' => 'footer_options',
  'fields' => array(

    array(
      'id'          => 'footer_layout_style',
      'type'        => 'select',
      'title'       => esc_html__('Footer Style', 'bantec'),
      'options'     => array(
        'footer-default' => esc_html__('Default Footer', 'bantec'),
        'footer-custom'  => esc_html__('Custom Footer', 'bantec'),
      ),
      'default'     => 'footer-default',
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
      'dependency' => array('footer_layout_style', '==', 'footer-custom'),
    ),

    array(
      'type'    => 'subheading',
      'content' => esc_html__('Footer Copyright', 'bantec'),
      'dependency' => array('footer_layout_style', '==', 'footer-default'),
    ),

    array(
      'id'          => 'footer_bottom_color',
      'type'        => 'color',
      'title'       => esc_html__('Copyright Color', 'bantec'),
      'output'      => '.copyright__area p',
      'output_mode' => 'color',
      'dependency'  => array('footer_layout_style', '==', 'footer-default'),
    ),

    array(
      'id'          => 'footer_bottom_bg',
      'type'        => 'color',
      'title'       => esc_html__('Copyright Background', 'bantec'),
      'output'      => '.copyright__area',
      'output_mode' => 'background',
      'dependency'  => array('footer_layout_style', '==', 'footer-default'),
    ),

  )
));


// Footer CopyRight Options

CSF::createSection($bantec_theme_option, array(
  'title'  => esc_html__('CopyRight Content', 'bantec'),
  'icon'   => 'fas fa-eye',
  'id'     => 'footer_copyright',
  'parent' => 'footer_options',
  'fields' => array(

    array(
      'id'            => 'footer_copyright',
      'type'          => 'wp_editor',
      'title'         => esc_html__('Copyright Text', 'bantec'),
      'tinymce'       => true,
      'quicktags'     => true,
      'media_buttons' => false,
      'height'        => '50px',
    ),

  )
));
