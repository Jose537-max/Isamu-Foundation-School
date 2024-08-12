<?php

CSF::createSection($bantec_theme_option, array(
    'title'  => esc_html__('Theme Colors', 'bantec'),
    'icon'   => 'fas fa-palette',
    'id'     => 'theme_color_settings',
    'fields' => array(
        array(
            'id'    => 'primary_color_1',
            'type'  => 'color',
            'title' => esc_html__('Primary Color', 'bantec'),
            'output' => ':root',
            'output_mode' => '--primary-color-1',
            'default' => '#0E59F2'
        ),
    )
));
