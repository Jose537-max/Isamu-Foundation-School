<?php

  // Breadcrumb Options

  CSF::createSection($bantec_theme_option, array(
    'title'  => esc_html__('Breadcrumb', 'bantec'),
    'icon'   => 'fas fa-pager',
    'id'     => 'breadcrumb_options',
    'fields' => array(

      array(
        'id'      => 'banner_breadcrumb',
        'type'    => 'button_set',
        'title'   => esc_html__('Enable Breadcrumb', 'bantec'),
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
        'desc'    => esc_html__('Select a Style', 'bantec'),
        'dependency' => array('banner_breadcrumb', '==', 'yes'),
      ),

     
      array(
        'id'    => 'home_page_title1',
        'type'  => 'text',
        'title' => esc_html__('Home Text', 'bantec'),
        'dependency' => array(
          array( 'banner_breadcrumb', '==', 'yes' ),
          array( 'breadcrumb_layout', '==', 'default' ),
        ),
      ),

      array(
        'id'    => 'blog_page_title1',
        'type'  => 'text',
        'title' => esc_html__('Blog Text', 'bantec'),
        'dependency' => array(
          array( 'banner_breadcrumb', '==', 'yes' ),
          array( 'breadcrumb_layout', '==', 'default' ),
        ),
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
          array( 'banner_breadcrumb', '==', 'yes' ),
          array( 'breadcrumb_layout', '==', 'default' ),
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
      'dependency' => array(
        array( 'banner_breadcrumb', '==', 'yes' ),
        array( 'breadcrumb_layout', '==', 'custom' ),
      ),
    ),
  
    )
  ));
