<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;

function register_controls_sticky( $section) {

    $section->start_controls_section(
        'section_sticky_controls',
        [
            'label' => esc_html__( 'Bantec Sticky', 'bantec-toolkit' ),
            'tab'   => Controls_Manager::TAB_ADVANCED,
        ]
    );

    $section->add_control(
        'section_sticky_on',
        [
            'label'        => esc_html__( 'Enable', 'bantec-toolkit' ),
            'type'         => Controls_Manager::SWITCHER,
            'return_value' => 'yes',
        ]
    );

    $section->add_responsive_control(
        'section_sticky_offset',
        [
            'label'     => esc_html__( 'Offset', 'bantec-toolkit' ),
            'type'      => Controls_Manager::SLIDER,
            'condition' => [
                'section_sticky_on' => 'yes',
            ],
            'selectors' => [
                '{{WRAPPER}}.header__sticky.header__sticky-sticky-menu' => 'margin-top: {{SIZE}}px;',
            ],
        ]
    );

    $section->add_control(
        'section_sticky_active_bg',
        [
            'label'     => esc_html__( 'Background', 'bantec-toolkit' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}.header__sticky.header__sticky-sticky-menu' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'section_sticky_on' => 'yes',
            ],
        ]
    );

    $section->add_responsive_control(
        'section_sticky_active_padding',
        [
            'label'      => esc_html__( 'Padding', 'bantec-toolkit' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors'  => [
                '{{WRAPPER}}.header__sticky.header__sticky-sticky-menu' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition'  => [
                'section_sticky_on' => 'yes',
            ],
        ]
    );

    $section->add_group_control(
        Group_Control_Box_Shadow::get_type(),
        [
            'label'     => esc_html__( 'Box Shadow', 'bantec-toolkit' ),
            'name'      => 'section_sticky_active_shadow',
            'selector'  => '{{WRAPPER}}.header__sticky.header__sticky-sticky-menu',
            'condition' => [
                'section_sticky_on' => 'yes',
            ],
        ]
    );

    $section->end_controls_section();
}

add_action( 'elementor/element/section/section_advanced/after_section_end', 'register_controls_sticky');
/**
 * Sticky Before Render
 *
 */
 function sticky_before_render( $section ) {
    $settings = $section->get_settings_for_display();

    if ( ! empty( $settings['section_sticky_on'] ) == 'yes' ) {
        $section->add_render_attribute( '_wrapper', 'class', 'header__sticky' );
    }
}

add_action( 'elementor/frontend/section/before_render', 'sticky_before_render');