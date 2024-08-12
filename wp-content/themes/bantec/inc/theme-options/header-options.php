<?php

CSF::createSection($bantec_theme_option, array(
  'title'  => esc_html__('Header Options', 'bantec'),
  'icon'   => 'fas fa-heading',
  'id'     => 'header_options',
  'fields' => array()
));


CSF::createSection($bantec_theme_option, array(
  'title'  => esc_html__('General Header', 'bantec'),
  'icon'   => 'fas fa-eye',
  'id'     => 'general_header',
  'parent' => 'header_options',
  'fields' => array(

    array(
      'id'      => 'header_layout',
      'type'    => 'select',
      'title'   => esc_html__('General Header Style', 'bantec'),
      'options' => array(
        'header-default' => esc_html__('Default Header', 'bantec'),
        'header-custom'  => esc_html__('Custom Header', 'bantec'),
      ),
      'default' => 'header-default',
      'desc'    => esc_html__('Select Header Style', 'bantec'),
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
      'dependency' => array('header_layout', '==', 'header-custom'),
    ),


    array(
      'id'           => 'default_logo',
      'type'         => 'media',
      'title'        => esc_html__('Default Logo', 'bantec'),
      'library'      => 'image',
      'url'          => false,
      'button_title' => esc_html__('Upload', 'bantec'),
      'dependency' => array('header_layout', '==', 'header-default'),
    ),

    array(
      'id'          => 'header_bg_color',
      'type'        => 'color',
      'title'       => esc_html__('Background Color', 'bantec'),
      'output'      => '.theme_header__area',
      'output_mode' => 'background',
      'dependency'  => array('header_layout', '==', 'header-default'),
    ),

    array(
      'id'          => 'header_border_color',
      'type'        => 'color',
      'title'       => esc_html__('Border Color', 'bantec'),
      'output'      => '.theme_header__area',
      'output_mode' => 'border-color',
      'dependency'  => array('header_layout', '==', 'header-default'),
    ),

  )
));