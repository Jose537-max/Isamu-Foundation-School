<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

add_action('init', 'bantec_custom_post_types');
function bantec_custom_post_types()
{
    register_post_type('portfolio', array(
        'labels' => array(
            'name' => esc_html__('Portfolios', 'bantec-toolkit'),
            'singular_name' => esc_html__('Portfolio', 'bantec-toolkit'),
        ),
        'show_in_rest' => true,
        'supports' => array('title', 'thumbnail', 'page-attributes', 'editor', 'excerpt'),
        'show_in_menu' => true,
        'menu_position' => 24,
        'menu_icon' => esc_attr__('dashicons-portfolio', 'bantec-toolkit'),
        'public' => true,
        'rewrite' => array(
            'slug' => 'portfolio',
            'with_front' => true
        )
    ));

    register_post_type('service', array(
        'labels' => array(
            'name' => esc_html__('Services', 'bantec-toolkit'),
            'singular_name' => esc_html__('Service', 'bantec-toolkit'),
        ),
        'show_in_rest' => true,
        'supports' => array('title', 'thumbnail', 'page-attributes', 'editor', 'excerpt'),
        'show_in_menu' => true,
        'menu_position' => 22,
        'menu_icon' => esc_attr__('dashicons-index-card', 'bantec-toolkit'),
        'public' => true,
        'rewrite' => array(
            'slug' => 'service',
            'with_front' => true
        )
    ));

    register_post_type('bantec_builder', array(
        'labels' => array(
            'name' => esc_html__('Template Builders', 'bantec-toolkit'),
            'singular_name' => esc_html__('Template Builder', 'bantec-toolkit'),
        ),
        'show_in_rest' => true,
        'supports' => array('title','editor'),
        'show_in_menu' => false,
        'menu_icon' => esc_attr__('dashicons-index-card', 'bantec-toolkit'),
        'public' => true,
        'rewrite' => array(
            'slug' => 'bantec_builder',
            'with_front' => true
        )
    ));
}


add_action('init', 'bantec_custom_taxonomies');
function bantec_custom_taxonomies()
{
     // item start
    $portfolio_labels = array(
        'name' => esc_html__('Portfolio Categories', 'bantec-toolkit'),
        'singular_name' => esc_html__('Portfolio Category', 'bantec-toolkit'),
    );
    register_taxonomy('portfolio_category', 'portfolio', array(
        'labels' => $portfolio_labels,
        'show_in_rest' => true,
        'hierarchical' => true,
        'rewrite' => array(
            'slug' => 'portfolio-category',
            'with_front' => true
        ),
    ));
     // item end  
    // item start
    $services_labels = array(
        'name' => esc_html__('Service Categories', 'bantec-toolkit'),
        'singular_name' => esc_html__('Service Category', 'bantec-toolkit'),
    );
    register_taxonomy('service_category', 'service', array(
        'labels' => $services_labels,
        'show_in_rest' => true,
        'hierarchical' => true,
        'rewrite' => array(
            'slug' => 'service-category',
            'with_front' => true
        ),
    ));
     // item end
}


