<?php

  // 404 page options

  CSF::createSection($bantec_theme_option, array(
    'title'  => esc_html__('404 Error', 'bantec'),
    'icon'   => 'fas fa-exclamation-circle',
    'id'     => '404_error',
    'fields' => array(

      array(
        'id'    => 'error_page_404',
        'type'  => 'text',
        'title' => esc_html__('404', 'bantec'),
      ),

      array(
        'id'    => 'error_page_title',
        'type'  => 'text',
        'title' => esc_html__('Title', 'bantec'),
      ),

      array(
        'id'    => 'error_page_content',
        'type'  => 'textarea',
        'title' => esc_html__('Content', 'bantec'),
      ),

      array(
        'id'      => 'error_page_btn',
        'type'    => 'button_set',
        'title'   => esc_html__('Home Button', 'bantec'),
        'options' => array(
          'yes'   => esc_html__('Yes', 'bantec'),
          'no'    => esc_html__('No', 'bantec'),
        ),
        'default' => 'yes',
        'desc'    => esc_html__('Enable or Disable', 'bantec'),
      ),

      array(
        'id'    => 'error_page_btn_text',
        'type'  => 'text',
        'title' => esc_html__('Button Text', 'bantec'),
        'dependency'  => array('error_page_btn', '==', 'yes'),
      ),

    )
  ));