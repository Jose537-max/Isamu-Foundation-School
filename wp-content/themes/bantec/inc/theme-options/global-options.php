<?php
CSF::createSection($bantec_theme_option, array(
    'title'  => esc_html__('Global Settings', 'bantec'),
    'icon'   => 'far fa-circle',
    'id'     => 'global_settings',
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
            'desc'    => esc_html__('Enable or Disable', 'bantec'),
        ),

        array(
            'id'      => 'rtl_mode',
            'type'    => 'button_set',
            'title'   => esc_html__('RTL Mode', 'bantec'),
            'options' => array(
                'rtl-mode'    => esc_html__('Yes', 'bantec'),
                'no-rtl-mode' => esc_html__('No', 'bantec'),
            ),
            'default' => 'no-rtl-mode',
            'desc'    => esc_html__('Enable or Disable', 'bantec'),
        ),

        array(
            'id'      => 'preloader',
            'type'    => 'button_set',
            'title'   => esc_html__('Preloader', 'bantec'),
            'options' => array(
                'yes'   => esc_html__('Yes', 'bantec'),
                'no'    => esc_html__('No', 'bantec'),
            ),
            'default' => 'no',
            'desc'    => esc_html__('Enable or Disable', 'bantec'),
        ),

        array(
            'id'          => 'preloader_bg',
            'type'        => 'color',
            'title'       => esc_html__('Preloader Background', 'bantec'),
            'desc'        => esc_html__('Select a Background', 'bantec'),
            'output'      => '.theme-loader',
            'output_mode' => 'background-color',
            'dependency'  => array('preloader', '==', 'yes') // 
        ),

        array(
            'id'      => 'theme_scroll_up',
            'type'    => 'button_set',
            'title'   => esc_html__('Scroll Up', 'bantec'),
            'options' => array(
                'yes'   => esc_html__('Yes', 'bantec'),
                'no'    => esc_html__('No', 'bantec'),
            ),
            'default' => 'no',
            'desc'    => esc_html__('Enable or Disable', 'bantec'),
        ),

    )
));
