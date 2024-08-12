<?php

CSF::createSection($bantec_theme_option, array(
  'title'  => esc_html__('Layout Options', 'bantec'),
  'icon'   => 'fas fa-th-large',
  'id'     => 'layout_options',
  'fields' => array(

    array(
      'type'    => 'subheading',
      'content' => esc_html__('Page Layout', 'bantec'),
    ),

    array(
      'id'       => 'page_layout',
      'type'     => 'palette',
      'title'    => esc_html__('Layout', 'bantec'),
      'options'  => array(
        'left-sidebar'   => array('#cccccc', '#eeeeee', '#eeeeee'),
        'full-width'     => array('#dddddd', '#dddddd', '#dddddd'),
        'right-sidebar'  => array('#eeeeee', '#eeeeee', '#cccccc'),
      ),
      'default'    => 'full-width',
    ),

    array(
      'id'          => 'page_sidebar',
      'type'        => 'select',
      'title'       => esc_html__('Select Sidebar', 'bantec'),
      'placeholder' => esc_html__('Select a Sidebar', 'bantec'),
      'options'     => 'sidebars',
      'dependency' => array('page_layout', 'any', 'left-sidebar,right-sidebar'),
    ),

    array(
      'type'    => 'subheading',
      'content' => esc_html__('Blog/Archive Layout', 'bantec'),
    ),

    array(
      'id'       => 'blog_layout',
      'type'     => 'palette',
      'title'    => esc_html__('Layout', 'bantec'),
      'options'  => array(
        'left-sidebar'   => array('#cccccc', '#eeeeee', '#eeeeee'),
        'full-width'     => array('#dddddd', '#dddddd', '#dddddd'),
        'right-sidebar'  => array('#eeeeee', '#eeeeee', '#cccccc'),
      ),
      'default'    => 'right-sidebar',
    ),

    array(
      'id'          => 'blog_sidebar',
      'type'        => 'select',
      'title'       => esc_html__('Select Sidebar', 'bantec'),
      'placeholder' => esc_html__('Select a Sidebar', 'bantec'),
      'options'     => 'sidebars',
      'dependency' => array('blog_layout', 'any', 'left-sidebar,right-sidebar'),
    ),
    array(
      'type'    => 'subheading',
      'content' => esc_html__('Single Post Layout', 'bantec'),
    ),
    array(
      'id'       => 'single_layout',
      'type'     => 'palette',
      'title'    => esc_html__('Layout', 'bantec'),
      'options'  => array(
        'left-sidebar'   => array('#cccccc', '#eeeeee', '#eeeeee'),
        'full-width'     => array('#dddddd', '#dddddd', '#dddddd'),
        'right-sidebar'  => array('#eeeeee', '#eeeeee', '#cccccc'),
      ),
      'default'    => 'right-sidebar',
    ),
    array(
      'id'          => 'single_sidebar',
      'type'        => 'select',
      'title'       => esc_html__('Select Sidebar', 'bantec'),
      'placeholder' => esc_html__('Select a Sidebar', 'bantec'),
      'options'     => 'sidebars',
      'dependency' => array('single_layout', 'any', 'left-sidebar,right-sidebar'),
    ),
    array(
      'type'    => 'subheading',
      'content' => esc_html__('Service Layout', 'bantec'),
    ),
    array(
      'id'       => 'service_layout',
      'type'     => 'palette',
      'title'    => esc_html__('Layout', 'bantec'),
      'options'  => array(
        'left-sidebar'   => array('#cccccc', '#eeeeee', '#eeeeee'),
        'full-width'     => array('#dddddd', '#dddddd', '#dddddd'),
        'right-sidebar'  => array('#eeeeee', '#eeeeee', '#cccccc'),
      ),
      'default'    => 'left-sidebar',
    ),

    array(
      'id'          => 'service_sidebar',
      'type'        => 'select',
      'title'       => esc_html__('Select Sidebar', 'bantec'),
      'placeholder' => esc_html__('Select a Sidebar', 'bantec'),
      'options'     => 'sidebars',
      'dependency' => array('service_layout', 'any', 'left-sidebar,right-sidebar'),
    ),

  )
));
