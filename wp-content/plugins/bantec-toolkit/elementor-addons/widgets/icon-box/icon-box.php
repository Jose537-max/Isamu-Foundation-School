<?php

namespace Elementor;

use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if (!defined('ABSPATH'))
    exit;

class Icon_Box_Bantec extends Widget_Base
{
    public function get_name()
    {
        return 'icon_box_bantec';
    }

    public function get_title()
    {
        return esc_html__('Icon Box - Bantec', 'bantec-toolkit');
    }

    public function get_icon()
    {
        return 'bantec-icon eicon-icon-box';
    }

    public function get_categories()
    {
        return ['bantec-toolkit'];
    }

    public function get_keywords()
    {
        return ['bantec', 'Toolkit', 'Icon', 'List', 'Item'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Service Content', 'bantec-toolkit'),
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
                        'title' => esc_html__('Center', 'bantec-toolkit'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'row-reverse' => [
                        'title' => esc_html__('Right', 'bantec-toolkit'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'block',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item' => 'display: {{VALUE}}; flex-direction: {{VALUE}};',
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
                    '{{WRAPPER}} .icon__box-item' => 'align-items: {{VALUE}};',
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
                    '{{WRAPPER}} .icon__box-item' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .icon__box-item-content > a' => 'justify-content: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'number_active',
            [
                'label' => esc_html__('Enable Number', 'bantec-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'bantec-toolkit'),
                'label_off' => esc_html__('No', 'bantec-toolkit'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'box_number',
            [
                'label' => esc_html__('Number', 'bantec-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('01', 'bantec-toolkit'),
                'label_block' => true,
                'condition' => [
                    'number_active' => ['yes'],
                ],
            ]
        );
        $this->add_control(
            'box_icon',
            [
                'label' => esc_html__('Icon', 'bantec-toolkit'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa fa-star',
                    'library' => 'brands',
                ],
            ]
        );
        $this->add_control(
            'box_title',
            [
                'label' => esc_html__('Title', 'bantec-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('This is the heading', 'bantec-toolkit'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'title_link',
            [
                'label' => esc_html__('Title URL', 'bantec-toolkit'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('Paste URL or Link', 'bantec-toolkit'),
                'condition' => [
                    'box_title[text]!' => '',
                ],
            ]
        );
        $this->add_control(
            'box_subtitle',
            [
                'label' => esc_html__('Description', 'bantec-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'bantec-toolkit'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'subtitle_link',
            [
                'label' => esc_html__('Description URL', 'bantec-toolkit'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('Paste URL or Link', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'box_btn_active',
            [
                'label' => esc_html__('Enable Button', 'bantec-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'bantec-toolkit'),
                'label_off' => esc_html__('No', 'bantec-toolkit'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'box_btn',
            [
                'label' => esc_html__('Button Text', 'bantec-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'bantec-toolkit'),
                'label_block' => true,
                'condition' => [
                    'box_btn_active' => ['yes'],
                ],
            ]
        );
        $this->add_control(
            'box_btn_link',
            [
                'label' => esc_html__('Button URL', 'bantec-toolkit'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => 'http://example.com',
                ],
                'condition' => [
                    'box_btn_active' => ['yes'],
                ],
            ]
        );
		$this->add_control(
            'btn_icon',
            [
                'label' => esc_html__('Button Icon', 'bantec-toolkit'),
                'type' => Controls_Manager::ICONS,
                'condition' => [
                    'box_btn_active' => ['yes'],
                    'box_btn_link[url]!' => '',
                ],
            ]
        );
		$this->add_control(
			'icon_align',
			[
				'label' => esc_html__( 'Icon Position', 'bantec-toolkit' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => esc_html__( 'Before', 'bantec-toolkit' ),
					'right' => esc_html__( 'After', 'bantec-toolkit' ),
				],
                'condition' => [
                    'btn_icon[value]!' => '',
                    'box_btn_link[url]!' => '',
                    'box_btn_active' => ['yes'],
                ],
			]
		);
        $this->end_controls_section();

        $this->start_controls_section(
            'icon_box_style',
            [
                'label' => esc_html__('Box', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'box_style_tabs'
        );
        $this->start_controls_tab(
            'box_normal_tab',
            [
                'label' => esc_html__('Normal', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'box_background',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'box_border_type',
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
                    '{{WRAPPER}} .icon__box-item' => 'border-style: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'box_border_width',
            [
                'label' => esc_html__('Border Width', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'box_border_type!' => '',
                ],
            ]
        );
        $this->add_control(
            'box_border_color',
            [
                'label' => esc_html__('Border Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'box_border_type!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_radius',
            [
                'label' => esc_html__('Border Radius', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'box_padding',
            [
                'label' => esc_html__('Padding', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'box_hover_tab',
            [
                'label' => esc_html__('Hover', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'box_hover_background',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'box_hover_border',
            [
                'label' => esc_html__('Border Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'icon_number_style',
            [
                'label' => esc_html__('Number', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'number_active' => ['yes'],
                ],
            ]
        );
        $this->add_control(
			'number_align',
			[
				'label' => esc_html__( 'Alignment', 'bantec-toolkit' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Start', 'bantec-toolkit' ),
						'icon' => 'eicon-h-align-left',
					],
					'right' => [
						'title' => esc_html__( 'End', 'bantec-toolkit' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'toggle' => false,
                'default' => 'left',
			]
		);
        $this->add_control(
            'number_border_type',
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
                    '{{WRAPPER}} .icon__box-item-icon span' => 'border-style: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'number_border_width',
            [
                'label' => esc_html__('Border Width', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-icon span' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'number_border_type!' => '',
                ],
            ]
        );
        $this->add_control(
            'number_border_color',
            [
                'label' => esc_html__('Border Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-icon span' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'number_border_type!' => '',
                ],
            ]
        );  
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'accordion_content_typography',
                'selector' => '{{WRAPPER}} .icon__box-item-icon span',
            ]
        );
        $this->add_control(
            'box_number_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-icon span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'box_number_background',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-icon span' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'number_max_width',
            [
                'label' => esc_html__('Max Width', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
					'unit' => 'px',
					'size' => 35,
				],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-icon span' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'box_number_margin',
            [
                'label' => esc_html__('Margin', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-icon span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'icon_box_icon_style',
            [
                'label' => esc_html__('Icon', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'icon_tabs'
        );
        $this->start_controls_tab(
            'icon_normal_tab',
            [
                'label' => esc_html__('Normal', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-icon i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .icon__box-item-icon svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_background',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-icon' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_icon_size',
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
                    '{{WRAPPER}} .icon__box-item-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .icon__box-item-icon svg' => 'max-width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .icon__box-item-icon' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .icon__box-item-icon' => 'border-style: {{VALUE}};',
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
                    '{{WRAPPER}} .icon__box-item-icon' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .icon__box-item-icon' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'border_type!' => '',
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
                    '{{WRAPPER}} .icon__box-item-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'icon_box_margin',
            [
                'label' => esc_html__('Margin', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_padding',
            [
                'label' => esc_html__('Padding', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'icon_hover_tab',
            [
                'label' => esc_html__('Hover', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'hover_icon_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item:hover .icon__box-item-icon i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .icon__box-item:hover .icon__box-item-icon svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_hover_background',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item:hover .icon__box-item-icon' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_hover_border',
            [
                'label' => esc_html__('Border Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item:hover .icon__box-item-icon' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'border_type!' => '',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'icon_box_content_style',
            [
                'label' => esc_html__('Content', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'box_item_content',
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
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-content' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .icon__box-item-content > a' => 'justify-content: {{VALUE}};',
                ],
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
            'icon_box_description',
            [
                'label' => esc_html__('Title', 'bantec-toolkit'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'icon_box_description_typography',
                'selector' => '{{WRAPPER}} .icon__box-item-content h4',
            ]
        );
        $this->add_control(
            'icon_box_description_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-content h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_box_title',
            [
                'label' => esc_html__('Description', 'bantec-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'icon_box_typography',
                'selector' => '{{WRAPPER}} .icon__box-item-content p',
            ]
        );
        $this->add_control(
            'icon_box_title_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-content p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_content_width',
            [
                'label' => esc_html__('Max Width', 'bantec-toolkit'),
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
                    '{{WRAPPER}} .icon__box-item-content p' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_title_margin',
            [
                'label' => esc_html__('Margin', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__('Hover', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'box_description_hover',
            [
                'label' => esc_html__('Title', 'bantec-toolkit'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'box_description_hover_color',
            [
                'label' => esc_html__('Hover Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item:hover .icon__box-item-content h4 a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_box_description_hover',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'), 
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item:hover .icon__box-item-content h4' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .icon__box-item:hover .icon__box-item-content h4 a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_box_subtitle_hover',
            [
                'label' => esc_html__('Description', 'bantec-toolkit'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'icon_box_subtitle_color_hover',
            [
                'label' => esc_html__('Hover Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item:hover .icon__box-item-content p a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_box_subtitle_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item:hover .icon__box-item-content p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .icon__box-item:hover .icon__box-item-content p a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'icon_box_btn_style',
            [
                'label' => esc_html__('Button', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'box_btn_active' => ['yes'],
                    'box_btn_link[url]!' => '',
                ],
            ]
        );
        $this->start_controls_tabs(
            'button_tap'
        );
        $this->start_controls_tab(
            'btn_normal_tab',
            [
                'label' => esc_html__('Normal', 'bantec-toolkit'),
            ]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'selector' => '{{WRAPPER}} .icon__box-item-content > a',
			]
		);
        $this->add_control(
            'icon_box_btn_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-content > a' => 'color: {{VALUE}}',
                ],
            ]
        );
		$this->add_control(
			'btn_icon_text',
			[
				'label' => esc_html__( 'Icon Style', 'bantec-toolkit' ),
				'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'btn_icon[value]!' => '',
                ],
			]
		);
        $this->add_responsive_control(
            'btn_icon_gap',
            [
                'label' => esc_html__('Gap', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 30,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-content > a' => 'gap: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'btn_icon[value]!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_icon_size',
            [
                'label' => esc_html__('Font Size', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 30,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-content > a i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'btn_icon[value]!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_icon_position',
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
                    '{{WRAPPER}} .icon__box-item-content > a i' => 'top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'btn_icon[value]!' => '',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'btn_hover_tab',
            [
                'label' => esc_html__('Hover', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'btn_hover_color',
            [
                'label' => esc_html__('Hover Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item:hover .icon__box-item-content > a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'hover_btn_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item:hover .icon__box-item-content > a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();


        if (!empty($settings['subtitle_link']['url'])) {
            $this->add_link_attributes('subtitle_link', $settings['subtitle_link']);
        }

        if (!empty($settings['title_link']['url'])) {
            $this->add_link_attributes('title_link', $settings['title_link']);
        }

        if (!empty($settings['box_btn_link']['url'])) {
            $this->add_link_attributes('box_btn_link', $settings['box_btn_link']);
        }

        $bantec_htmls = array(
            'a'      => array(
                'href'   => array(),
                'target' => array()
            ),
            'strong' => array(),
            'small'  => array(),
            'span'   => array(),
            'p'      => array(),
            'br'      => array(),
        );

        ?>

        <div class="icon__box-item">
            <?php if (!empty($settings['box_icon']['value'])):?>
                <div class="icon__box-item-icon">
                    <?php \Elementor\Icons_Manager::render_icon($settings['box_icon'], ['aria-hidden' => 'true']); ?>
                    <?php if ('yes' === $settings['number_active']) : ?>
                        <span class="<?php echo esc_attr( $settings['number_align'] ); ?>"><?php echo esc_html($settings['box_number']); ?></span>
                    <?php else : ?>
                    <?php endif; ?>
                </div>
            <?php endif;?>
            <div class="icon__box-item-content">
                    <?php if (!empty($settings['box_title'])): ?>
                        <h4>
                            <?php if (!empty($settings['title_link']['url'])) { ?>
                                <a <?php echo $this->get_render_attribute_string('title_link'); ?>>
                                    <?php echo wp_kses($settings['box_title'], $bantec_htmls); ?>
                                </a>
                            <?php } else {
                               echo wp_kses($settings['box_title'], $bantec_htmls);
                            } ?>
                        </h4>
                    <?php endif; ?>
                <?php if (!empty($settings['box_subtitle'])): ?>
                    <p>
                        <?php if (!empty($settings['subtitle_link']['url'])) { ?>
                            <a <?php echo $this->get_render_attribute_string('subtitle_link'); ?>>
                                <?php echo wp_kses($settings['box_subtitle'], $bantec_htmls); ?>
                            </a>
                        <?php } else {
                            echo wp_kses($settings['box_subtitle'], $bantec_htmls);
                        } ?>
                    </p>
                <?php endif; ?>
                <?php if (!empty($settings['box_btn_link']['url'])): ?>
                    <a class="<?php echo esc_attr( $settings['icon_align'] ); ?>" <?php echo $this->get_render_attribute_string('box_btn_link'); ?>>
                        <?php echo esc_html($settings['box_btn']); ?>
                        <?php if (!empty($settings['btn_icon']['value'])):?><i class="<?php echo esc_attr($settings['btn_icon']['value']); ?>"></i><?php endif;?>
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Icon_Box_Bantec);