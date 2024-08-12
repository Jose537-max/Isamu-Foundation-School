<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class Bantec_Tabs extends Widget_Base
{
    public function get_name()
    {
        return 'tabs-bantec';
    }

    public function get_title()
    {
        return esc_html__('Tabs - Bantec', 'bantec-toolkit');
    }

    public function get_icon()
    {
        return 'bantec-icon eicon-tabs';
    }

    public function get_categories()
    {
        return ['bantec-toolkit'];
    }

    public function get_keywords()
    {
        return ['bantec', 'tab', 'tabs', 'nav'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__('Tabs Options', 'bantec-toolkit'),
            ]
        );

        $this->add_control(
            'tab_position',
            [
                'label' => esc_html__('Position', 'bantec-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'horizontal_style' => esc_html__('Horizontal', 'bantec-toolkit'),
                    'vertical_style' => esc_html__('Vertical', 'bantec-toolkit'),
                ],
                'default' => 'horizontal_style',
            ]
        );
        $this->add_control(
            'tab_button_width',
            [
                'label' => esc_html__('Button Width', 'bantec-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'full_width' => esc_html__('Full Width', 'bantec-toolkit'),
                    'inline_with' => esc_html__('Inline', 'bantec-toolkit'),
                ],
                'default' => 'full_width',
                'condition' => [
                    'tab_position' => ['horizontal_style'],
                ],
            ]
        );
        $this->add_responsive_control(
            'tabs_button',
            [
                'label' => esc_html__('Button Alignment', 'bantec-toolkit'),
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
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .tab_area.horizontal_style .nav.inline_with' => 'justify-content: {{VALUE}};',
                ],
                'condition' => [
                    'tab_position' => ['horizontal_style'],
                    'tab_button_width' => ['inline_with'],
                ],
            ]
        );

        $tabs_item = new Repeater();

        $tabs_item->add_control(
            'tab_icon',
            [
                'label' => esc_html__('Icon', 'bantec-toolkit'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa fa-star',
                    'library' => 'brands',
                ],
            ]
        );
        $tabs_item->add_control(
            'tab_title',
            [
                'label' => esc_html__('Title', 'bantec-toolkit'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $tabs_item->add_control(
            'content_type',
            [
                'label' => esc_html__('Content Type', 'bantec-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'content' => esc_html__('Content', 'bantec-toolkit'),
                    'template' => esc_html__('Template', 'bantec-toolkit'),
                ],
                'default' => 'content',
            ]
        );
        $tabs_item->add_control(
            'tab_content',
            [
                'label' => esc_html__('Content', 'bantec-toolkit'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => esc_html__('Default content', 'bantec-toolkit'),
                'placeholder' => esc_html__('Type your content here', 'bantec-toolkit'),
                'condition' => [
                    'content_type' => 'content',
                ],
            ]
        );
        $tabs_item->add_control(
            'select_template',
            [
                'label' => __('Select a Template', 'bantec-toolkit'),
                'type' => Controls_Manager::SELECT2,
                'options' => bantec_template_builder(),
                'label_block' => true,
                'condition' => [
                    'content_type' => 'template',
                ],

            ]
        );
        $this->add_control(
            'tab_list',
            [
                'label' => esc_html__('Tabs Item', 'bantec-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $tabs_item->get_controls(),
                'default' => [
                    [
                        'tab_title' => esc_html__('Tab One', 'bantec-toolkit'),
                    ],
                    [
                        'tab_title' => esc_html__('Tab Two', 'bantec-toolkit'),
                    ],
                ],
                'title_field' => '{{{ tab_title }}}',
            ]
        );
        $this->add_responsive_control(
            'icon_box_position',
            [
                'label' => esc_html__('Icon Position', 'bantec-toolkit'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex' => [
                        'title' => esc_html__('Left', 'bantec-toolkit'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'block' => [
                        'title' => esc_html__('Top', 'bantec-toolkit'),
                        'icon' => 'eicon-v-align-top',
                    ],
                ],
                'default' => 'block',
                'separator' => 'before',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .tab_area-btn-item' => 'display: {{VALUE}};',
                ],               
            ]
        );
        $this->add_responsive_control(
            'icon_box_vertical',
            [
                'label' => esc_html__('Vertical Alignment', 'bantec-toolkit'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => esc_html__('Top', 'bantec-toolkit'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'center' => [
                        'title' => esc_html__('Middle', 'bantec-toolkit'),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'end' => [
                        'title' => esc_html__('Bottom', 'bantec-toolkit'),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'default' => 'start',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .tab_area-btn-item' => 'align-items: {{VALUE}};',
                ],
                'condition' => [
                    'icon_box_position' => 'flex',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_content',
            [
                'label' => esc_html__('Alignment', 'bantec-toolkit'),
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
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .tab_area-btn-item' => 'text-align: {{VALUE}}; justify-content: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'tab_style',
            [
                'label' => esc_html__('Button Style', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'style_tabs'
        );
        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__('Normal', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'tabs_background',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tab_area-btn-item' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'tabs_gap',
            [
                'label' => esc_html__('Space Between', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tab_area.horizontal_style .nav' => 'gap: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tab_area.vertical_style .tab_area-btn-item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'tabs_radius',
            [
                'label' => esc_html__('Border Radius', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tab_area-btn-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'tabs_padding',
            [
                'label' => esc_html__('Padding', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tab_area-btn-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'border_type',
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
                    '{{WRAPPER}} .tab_area-btn-item' => 'border-style: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'border_width',
            [
                'label' => esc_html__('Border Width', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tab_area-btn-item' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'border_type!' => '',
                ],
            ]
        );
        $this->add_control(
            'border_color',
            [
                'label' => esc_html__('Border Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tab_area-btn-item' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'border_type!' => '',
                ],
            ]
        );
        $this->add_control(
            'tab_maker',
            [
                'label' => esc_html__('Tab Maker', 'bantec-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'bantec-toolkit'),
                'label_off' => esc_html__('No', 'bantec-toolkit'),
                'return_value' => 'maker',
                'default' => '',
            ]
        );
        $this->add_control(
            'tab_maker_background',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tab_area-btn-item.maker.active::after' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'tab_maker' => ['maker'],
                ],
            ]
        );
        $this->add_responsive_control(
            'tab_maker_width',
            [
                'label' => esc_html__('Width', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tab_area-btn-item.maker.active::after' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tab_area.vertical_style .tab_area-btn-item.maker.active::after' => 'right: -{{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'tab_maker' => ['maker'],
                ],
            ]
        );
        $this->add_responsive_control(
            'tab_maker_height',
            [
                'label' => esc_html__('Height', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tab_area-btn-item.maker.active::after' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tab_area.horizontal_style .tab_area-btn-item.maker.active::after' => 'bottom: -{{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'tab_maker' => ['maker'],
                ],
            ]
        );
        $this->add_responsive_control(
            'tab_maker_position',
            [
                'label' => esc_html__('Vertical Position', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -10,
                        'max' => 10,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tab_area-btn-item.maker.active::after' => 'transform: translateX(-50%) translateY({{SIZE}}{{UNIT}});',
                ],
                'condition' => [
                    'tab_maker' => ['maker'],
                    'tab_position' => ['horizontal_style'],
                ],
            ]
        );
        $this->add_responsive_control(
            'tab_maker_positions',
            [
                'label' => esc_html__('Horizontal Position', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -10,
                        'max' => 10,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tab_area.vertical_style .tab_area-btn-item.maker.active::after' => 'transform: translateY(50%) translateX({{SIZE}}{{UNIT}});',
                ],
                'condition' => [
                    'tab_maker' => ['maker'],
                    'tab_position' => ['vertical_style'],
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'style_active_tab',
            [
                'label' => esc_html__('Active', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'tabs_active_background',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tab_area-btn-item.active' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'tabs_active_border',
            [
                'label' => esc_html__('Border Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tab_area-btn-item.active' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'tabs_active_title',
            [
                'label' => esc_html__('Title', 'bantec-toolkit'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'active_title_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tab_area-btn-item.active.tab_area-btn-item h6' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'active_tabs_icon',
            [
                'label' => esc_html__('Icon', 'bantec-toolkit'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'active_icon_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tab_area-btn-item.active .tab_area-btn-item-icon i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'active_icon_bg',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tab_area-btn-item.active .tab_area-btn-item-icon i' => 'background: {{VALUE}}; border-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'tab_style_content',
            [
                'label' => esc_html__('Button Content', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'tabs_title',
            [
                'label' => esc_html__('Title', 'bantec-toolkit'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tabs_title_typography',
                'selector' => '{{WRAPPER}} .tab_area-btn-item h6',
            ]
        );
        $this->add_control(
            'tabs_title_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tab_area-btn-item h6' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_width',
            [
                'label' => esc_html__('Max Width', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tab_area-btn-item h6' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'tabs_icon',
            [
                'label' => esc_html__('Icon', 'bantec-toolkit'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'tabs_icon_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tab_area-btn-item-icon i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_background',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tab_area-btn-item-icon i' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'tabs_icon_size',
            [
                'label' => esc_html__('Font Size', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tab_area-btn-item-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_width',
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
                    '{{WRAPPER}} .tab_area-btn-item-icon i' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'icon_border_type',
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
                    '{{WRAPPER}} .tab_area-btn-item-icon i' => 'border-style: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'icon_border_width',
            [
                'label' => esc_html__('Border Width', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tab_area-btn-item-icon i' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'icon_border_type!' => '',
                ],
            ]
        );
        $this->add_control(
            'icon_border_color',
            [
                'label' => esc_html__('Border Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tab_area-btn-item-icon i' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'icon_border_type!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_radius',
            [
                'label' => esc_html__('Border Radius', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tab_area-btn-item-icon i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'tabs_icon_margin',
            [
                'label' => esc_html__('Margin', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tab_area-btn-item-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'tab_style_area',
            [
                'label' => esc_html__('Tab Button Area', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'tabs_area_background',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tab_area .tab_area-btn' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'tabs_area_width',
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
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 35,
                ],
                'selectors' => [
                    '{{WRAPPER}} .tab_area.vertical_style .tab_area-btn' => 'width: {{SIZE}}{{UNIT}}; max-width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'tab_position' => ['vertical_style'],
                ],
            ]
        );
        $this->add_responsive_control(
            'tabs_area_gap',
            [
                'label' => esc_html__('Gap', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tab_area.vertical_style' => 'gap: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'tab_position' => ['vertical_style'],
                ],
            ]
        );
        $this->add_responsive_control(
            'tabs_area_radius',
            [
                'label' => esc_html__('Border Radius', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tab_area .tab_area-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'tabs_area_padding',
            [
                'label' => esc_html__('Padding', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tab_area .tab_area-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'tab_border_type',
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
                    '{{WRAPPER}} .tab_area .tab_area-btn' => 'border-style: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'tab_border_width',
            [
                'label' => esc_html__('Border Width', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tab_area .tab_area-btn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'tab_border_type!' => '',
                ],
            ]
        );
        $this->add_control(
            'tab_border_color',
            [
                'label' => esc_html__('Border Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tab_area-bn-item' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'tab_border_type!' => '',
                ],
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $uniqueID = wp_rand(10, 1000);

        ?>
        <div class="tab_area <?php echo esc_attr($settings['tab_position']); ?>">
                <div class="tab_area-btn">
                    <ul class="nav <?php echo esc_attr($settings['tab_button_width']); ?>">
                        <?php foreach ($settings['tab_list'] as $keys => $item): ?>
                            <li class="nav-item" <?php echo ($keys !== 0) ? 'role="presentation"' : ''; ?>>
                                <div class="tab_area-btn-item <?php echo esc_attr($settings['tab_maker']); ?> <?php echo ($keys === 0) ? 'active' : ''; ?>"
                                    data-bs-toggle="pill"
                                    data-bs-target="#<?php echo esc_attr(str_replace(' ', '', $item['tab_title']) . $uniqueID); ?>">
                                    <?php if (!empty($item['tab_icon']['value'])): ?>
                                        <div class="tab_area-btn-item-icon">
                                            <?php \Elementor\Icons_Manager::render_icon($item['tab_icon'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                    <?php endif; ?>
                                    <h6>
                                        <?php echo esc_html($item['tab_title']); ?>
                                    </h6>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <div class="tab_area-content">
                <div class="tab-content">
                    <?php foreach ($settings['tab_list'] as $keys => $item): ?>
                        <div class="tab-pane fade<?php echo ($keys === 0) ? ' show active' : ''; ?>"
                            id="<?php echo esc_attr(str_replace(' ', '', $item['tab_title']) . $uniqueID); ?>">
                            <div class="bantec-tab-content">
                                <?php
                                if (!empty($item['select_template']) || ($item['content_type'] === 'template')) {
                                    echo Plugin::$instance->frontend->get_builder_content($item['select_template'], true);
                                } else { ?>
                                    <?php echo wp_kses_post(wpautop($item['tab_content'])); ?>
                                <?php }
                                ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Bantec_Tabs);