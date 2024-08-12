<?php
if (!defined('ABSPATH'))
    exit;
if (class_exists('CSF')) {
    //
    // Set a unique slug-like ID
    $bantec_nav = 'bantec_nav_options';

    //
    // Create profile options
    CSF::createNavMenuOptions(
        $bantec_nav,
        array(
            'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
        )
    );

    // Create a section
    CSF::createSection(
        $bantec_nav,
        array(
            'fields' => array(

                array(
                    'id' => 'mega_menu',
                    'type' => 'button_set',
                    'title' => esc_html__('Mega Menu', 'bantec-toolkit'),
                    'options' => array(
                        'yes' => esc_html__('Yes', 'bantec-toolkit'),
                        'no' => esc_html__('No', 'bantec-toolkit'),
                    ),
                    'default' => 'no',
                ),

                // Theme Builder Options
                array(
                    'id' => 'bantec_menu_id',
                    'type' => 'select',
                    'title' => esc_html__('Select a Template', 'bantec-toolkit'),
                    'options' => 'posts',
                    'query_args' => array(
                        'post_type' => 'bantec_builder',
                        'posts_per_page' => -1,
                    ),
                    'dependency' => array(
                        array('mega_menu', '==', 'yes'),
                    ),
                ),


            )
        )
    );

}

