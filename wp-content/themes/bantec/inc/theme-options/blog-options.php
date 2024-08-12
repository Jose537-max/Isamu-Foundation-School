<?php

CSF::createSection($bantec_theme_option, array(
    'title'  => esc_html__('Blog Settings', 'bantec'),
    'icon'   => 'fas fa-edit',
    'id'     => 'blog_settings',
  ));


  CSF::createSection($bantec_theme_option, array(
    'title'  => esc_html__('Blog Page', 'bantec'),
    'icon'   => 'fas fa-list',
    'id'     => 'blog_page',
    'parent' => 'blog_settings',
    'fields' => array(

      array(
        'id'      => 'blog_list_date',
        'type'    => 'button_set',
        'title'   => esc_html__('Show Date', 'bantec'),
        'options' => array(
          'yes'   => esc_html__('Yes', 'bantec'),
          'no'    => esc_html__('No', 'bantec'),
        ),
        'default' => 'yes',
      ),

      array(
        'id'      => 'blog_list_author',
        'type'    => 'button_set',
        'title'   => esc_html__('Show Author', 'bantec'),
        'options' => array(
          'yes'   => esc_html__('Yes', 'bantec'),
          'no'    => esc_html__('No', 'bantec'),
        ),
        'default' => 'yes',
      ),

      array(
        'id'      => 'blog_list_comment',
        'type'    => 'button_set',
        'title'   => esc_html__('Show Comment', 'bantec'),
        'options' => array(
          'yes'   => esc_html__('Yes', 'bantec'),
          'no'    => esc_html__('No', 'bantec'),
        ),
        'default' => 'yes',
      ),

      array(
        'id'      => 'blog-cta-btn',
        'type'    => 'text',
        'title'   => esc_html__('Button Text', 'bantec'),
      ),

    )
  ));


  CSF::createSection($bantec_theme_option, array(
    'title'  => esc_html__('Single Blog', 'bantec'),
    'icon'   => 'fas fa-eye',
    'id'     => 'single_blog',
    'parent' => 'blog_settings',
    'fields' => array(

      array(
        'id'      => 'blog_single_date',
        'type'    => 'button_set',
        'title'   => esc_html__('Show Date', 'bantec'),
        'options' => array(
          'yes'   => esc_html__('Yes', 'bantec'),
          'no'    => esc_html__('No', 'bantec'),
        ),
        'default' => 'yes',
      ),

      array(
        'id'      => 'blog_single_author',
        'type'    => 'button_set',
        'title'   => esc_html__('Show Author', 'bantec'),
        'options' => array(
          'yes'   => esc_html__('Yes', 'bantec'),
          'no'    => esc_html__('No', 'bantec'),
        ),
        'default' => 'yes',
      ),

      array(
        'id'      => 'blog_single_comment',
        'type'    => 'button_set',
        'title'   => esc_html__('Show Comment', 'bantec'),
        'options' => array(
          'yes'   => esc_html__('Yes', 'bantec'),
          'no'    => esc_html__('No', 'bantec'),
        ),
        'default' => 'yes',
      ),

    )
  ));