<?php


CSF::createSection($bantec_theme_option, array(
    'title'  => esc_html__('Typography', 'bantec'),
    'icon'   => 'fas fa-font',
    'id'     => 'typography_settings',
    'fields' => array(


      array(
        'id'             => 'body_typography',
        'type'           => 'typography',
        'title'          => esc_html__('Body Typography', 'bantec'),
        'output'         => 'body',
        'extra_styles'   => true,
        'text_align'     => false,
        'text_transform' => false,
        'default'        => array(
          'font-family'  => 'Space Grotesk',
          'type'         => 'google',
          'font-weight'  => '400',
          'unit'         => 'px',
        ),
      ),

      array(
        'id'             => 'heading_typography',
        'type'           => 'typography',
        'title'          => esc_html__('Heading Typography', 'bantec'),
        'output'         => 'h1,h2,h3,h4,h5,h6',
        'extra_styles'   => true,
        'text_align'     => false,
        'text_transform' => false,
        'default'        => array(
          'font-family'  => 'Space Grotesk',
          'type'         => 'google',
          'font-weight'  => '700',
          'unit'         => 'px',
          'extra-styles' => array( '500', '600'),
        ),
      ),
    )
  ));