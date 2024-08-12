<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class Offcanvas_Bantec extends Widget_Base
{
    public function get_name()
    {
        return 'offcanvas-bantec';
    }

    public function get_title()
    {
        return esc_html__('Offcanvas - Bantec', 'bantec-toolkit');
    }

    public function get_icon()
    {
        return 'bantec-icon eicon-sidebar';
    }

    public function get_categories()
    {
        return ['bantec-builder'];
    }

    public function get_keywords()
    {
        return ['Toolkit', 'Search', 'Icon', 'header'];
    }


    protected function register_controls()
    {

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Offcanvas Content', 'bantec-toolkit'),
            ]
        );
        $this->add_responsive_control(
            'menu_align',
            [
                'label' => esc_html__('Icon Alignment', 'bantec-toolkit'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'bantec-toolkit'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'bantec-toolkit'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'bantec-toolkit'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'right',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .tOri-offcanvas-popup-icon' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'offcanvas_icon',
            [
                'label' => esc_html__('Icon', 'bantec-toolkit'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-align-justify',
                    'library' => 'brands',
                ],

            ]
        );
        $this->add_control(
            'select_template',
            [
                'label' => __('Popup Template', 'bantec-toolkit'),
                'type' => Controls_Manager::SELECT2,
                'options' => bantec_template_builder(),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'popup_show',
            [
                'label' => esc_html__('Popup Style', 'bantec-toolkit'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'top_bottom' => [
                        'title' => esc_html__('Top To Bottom', 'bantec-toolkit'),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                    'right_left' => [
                        'title' => esc_html__('Right To Left', 'bantec-toolkit'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'bottom_top' => [
                        'title' => esc_html__('Bottom To Top', 'bantec-toolkit'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'left_right' => [
                        'title' => esc_html__('Left To Right', 'bantec-toolkit'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'toggle' => false,
                'default' => 'right_left',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Icon Style', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'icon_size',
            [
                'label' => esc_html__('Icon Size', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 60,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tOri-offcanvas-popup-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tOri-offcanvas-popup-icon svg' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri-offcanvas-popup-icon i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .tOri-offcanvas-popup-icon svg' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'style_popup',
            [
                'label' => esc_html__('Popup Style', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow_normal',
                'selector' => '{{WRAPPER}} .tOri-offcanvas-popup',
            ]
        );
        $this->add_control(
            'popup_bg',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri-offcanvas-popup' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'popup_bg_over',
            [
                'label' => esc_html__('Overlay Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sidebar-overlay' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'bg_opacity',
            [
                'label' => esc_html__('Opacity', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sidebar-overlay' => 'opacity: {{SIZE}};',
                ],
            ]
        );
        $this->add_control(
            'popup_max_width',
            [
                'label' => esc_html__('Max Width', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tOri-offcanvas-popup' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'popup_height',
            [
                'label' => esc_html__('Height', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tOri-offcanvas-popup' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'popup_show' => ['top_bottom, bottom_top'],
                ],
            ]
        );
        $this->add_responsive_control(
            'popup_padding',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Padding', 'bantec-toolkit'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tOri-offcanvas-popup' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'style_popup_close',
            [
                'label' => esc_html__('Close Icon', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'close_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri-offcanvas-popup .sidebar-close-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'close_bg',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri-offcanvas-popup .sidebar-close-btn' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'close_icon_size',
            [
                'label' => esc_html__('Font Size', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tOri-offcanvas-popup .sidebar-close-btn' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'close_width',
            [
                'label' => esc_html__('Max Width', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 150,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tOri-offcanvas-popup .sidebar-close-btn' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'close_border_type',
            [
                'label' => esc_html__('Border Type', 'bantec-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__('None', 'bantec-toolkit'),
                    'solid' => esc_html__('Solid', 'bantec-toolkit'),
                    'double' => esc_html__('Double', 'bantec-toolkit'),
                    'dotted' => esc_html__('Dotted', 'bantec-toolkit'),
                    'dashed' => esc_html__('Dashed', 'bantec-toolkit'),
                    'groove' => esc_html__('Groove', 'bantec-toolkit'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .tOri-offcanvas-popup .sidebar-close-btn' => 'border-style: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'close_border_width',
            [
                'label' => esc_html__('Border Width', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tOri-offcanvas-popup .sidebar-close-btn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'close_border_type!' => '',
                ],
            ]
        );
        $this->add_control(
            'close_border_color',
            [
                'label' => esc_html__('Border Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri-offcanvas-popup .sidebar-close-btn' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'close_border_type!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'close_radius',
            [
                'label' => esc_html__('Border Radius', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tOri-offcanvas-popup .sidebar-close-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $newId = wp_rand(10, 1000);
        ?>
        <div class="offcanvas-bantec <?php echo esc_attr($settings['popup_show']); ?>">
            <div class="tOri-offcanvas-popup-icon offcanvas-icon-<?php echo esc_attr($newId);?>">
                <?php \Elementor\Icons_Manager::render_icon($settings['offcanvas_icon'], ['aria-hidden' => 'true']); ?>
            </div>
            <div class="tOri-offcanvas-popup offcanvas-popup-<?php echo esc_attr($newId);?>">
                <div class="sidebar-close-btn offcanvas-close<?php echo esc_attr($newId);?>"><i class="fal fa-times"></i></div>
                <?php
                if (!empty($settings['select_template'])) {
                    echo Plugin::$instance->frontend->get_builder_content($settings['select_template'], true);
                } else {
                    echo 'Please select a template.';
                }
                ?>
            </div>
            <div class="sidebar-overlay offcanvas-hoverly-<?php echo esc_attr($newId);?>"></div>
        </div>


        <script>
            (function ($) {
                "use strict";
                ///=============  Sidebar Popup  =============\\\
                $(".offcanvas-icon-<?php echo esc_js($newId);?> i, .offcanvas-icon-<?php echo esc_js($newId);?> svg").on("click", function () {
                    $(".offcanvas-popup-<?php echo esc_js($newId);?>").addClass("active");
                });
                $(".offcanvas-popup-<?php echo esc_js($newId);?> .offcanvas-close<?php echo esc_js($newId);?>").on("click", function () {
                    $(".offcanvas-popup-<?php echo esc_js($newId);?>").removeClass("active");
                }
                );
                $(".offcanvas-icon-<?php echo esc_js($newId);?> i, .offcanvas-icon-<?php echo esc_js($newId);?> svg").on("click", function () {
                    $(".offcanvas-hoverly-<?php echo esc_js($newId);?>").addClass("show");
                });
                $(".offcanvas-popup-<?php echo esc_js($newId);?> .offcanvas-close<?php echo esc_js($newId);?>").on("click", function () {
                    $(".offcanvas-hoverly-<?php echo esc_js($newId);?>").removeClass("show");
                }
                );
            })(jQuery);
        </script>
        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Offcanvas_Bantec);