<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class Gallery_Image_Bantec extends Widget_Base
{
    public function get_name()
    {
        return 'gallery-image-bantec';
    }

    public function get_title()
    {
        return esc_html__('Gallery Image - Bantec', 'bantec-toolkit');
    }

    public function get_icon()
    {
        return 'bantec-icon eicon-image-rollover';
    }

    public function get_categories()
    {
        return ['bantec-toolkit'];
    }

    public function get_keywords()
    {
        return ['bantec', 'Toolkit', 'Images', 'project', 'portfolio', 'work'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'gallery_design',
            [
                'label' => esc_html__('Gallery Content', 'bantec-toolkit'),
            ]
        );
        $gallery_items = new Repeater();
        $gallery_items->add_control(
            'gallery_image',
            [
                'label' => esc_html__('Image', 'bantec-toolkit'),
                'type'  => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $gallery_items->add_control(
            'gallery_subtitle',
            [
                'label' => esc_html__('Subtitle', 'bantec-toolkit'),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $gallery_items->add_control(
            'gallery_title',
            [
                'label' => esc_html__('Title', 'bantec-toolkit'),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $gallery_items->add_control(
            'gallery_url',
            [
                'label' => esc_html__('URL', 'bantec-toolkit'),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'gallery_item',
            [
                'label' => esc_html__('Gallery Item', 'bantec-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $gallery_items->get_controls(),
                'default' => [
                    [
                        'gallery_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'gallery_subtitle'     => esc_html__('Strategy', 'bantec-toolkit'),
                        'gallery_title'     => esc_html__('Business strategy', 'bantec-toolkit'),
                        'gallery_url'      => esc_attr__('#', 'bantec-toolkit'),
                    ],
                    [
                        'gallery_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'gallery_subtitle'     => esc_html__('Resource', 'bantec-toolkit'),
                        'gallery_title'     => esc_html__('Human Resource', 'bantec-toolkit'),
                        'gallery_url'      => esc_attr__('#', 'bantec-toolkit'),
                    ],
                ],
                'title_field' => '{{{ gallery_title }}}',                
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'button_design',
            [
                'label' => esc_html__('Button', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__('Text', 'bantec-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'bantec-toolkit'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'button_icon',
            [
                'label' => esc_html__('Icon', 'bantec-toolkit'),
                'type' => Controls_Manager::ICONS,
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
                    'button_icon[value]!' => '',
                ],
			]
		);
        $this->end_controls_section();

        $this->start_controls_section(
            'menu_demo_style',
            [
                'label' => esc_html__('Image Style', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'gallery_image_overlay',
            [
                'label' => esc_html__('Normal Overlay', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery_area-item::after' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gallery_image_hover_overlay',
            [
                'label' => esc_html__('Hover Overlay', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery_area-item:hover::after' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gallery_image_shape',
            [
                'label' => esc_html__('Shape Bg', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery_area-item::before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .gallery_area-item .font h4::after' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
			'gallery_image_height',
			[
				'label' => esc_html__( 'Height', 'bantec-toolkit' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'ms', 'custom' ],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1000,
                        'step' => 5,
                    ],
                ],
				'selectors' => [
					'{{WRAPPER}} .gallery_area-item' => 'height: {{SIZE}}{{UNIT}}',
				],
			]
		);
        $this->add_responsive_control(
			'gallery_image_hover_height',
			[
				'label' => esc_html__( 'Responsive Height', 'bantec-toolkit' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'ms', 'custom' ],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1000,
                        'step' => 5,
                    ],
                ],
				'selectors' => [
					'{{WRAPPER}} .gallery_area-item:hover' => 'height: {{SIZE}}{{UNIT}}',
				],
			]
		);
        $this->add_responsive_control(
			'gallery_image_gap',
			[
				'label' => esc_html__( 'Gap', 'bantec-toolkit' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'ms', 'custom' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
				'selectors' => [
					'{{WRAPPER}} .gallery_area' => 'gap: {{SIZE}}{{UNIT}}',
				],
			]
		);
        $this->add_responsive_control(
			'gallery_transition',
			[
				'label' => esc_html__( 'Transition Duration', 'bantec-toolkit' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 's', 'ms', 'custom' ],
				'default' => [
					'unit' => 's',
					'size' => 0.5,
				],
				'selectors' => [
					'{{WRAPPER}} .gallery_area-item' => 'transition: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .gallery_area-item::after' => 'transition: {{SIZE}}{{UNIT}}',
				],
			]
		);
        $this->end_controls_section();
        
        $this->start_controls_section(
            'content_style_section',
            [
                'label' => esc_html__('Content Style', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );  
		$this->add_control(
			'gallery_front',
			[
				'label' => esc_html__( 'Front Title', 'bantec-toolkit' ),
				'type' => Controls_Manager::HEADING,
			]
		);
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'gallery_front_typography',
				'selector' => '{{WRAPPER}} .gallery_area-item .font h4',
			]
		);
        $this->add_control(
            'gallery_front_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery_area-item .font h4' => 'color: {{VALUE}}',
                ],
            ]
        );
		$this->add_control(
			'gallery_subtitle',
			[
				'label' => esc_html__( 'Subtitle', 'bantec-toolkit' ),
				'type' => Controls_Manager::HEADING,
			]
		);
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'gallery_subtitle_typography',
				'selector' => '{{WRAPPER}} .gallery_area-item-content span',
			]
		);
        $this->add_control(
            'gallery_subtitle_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery_area-item-content span' => 'color: {{VALUE}}',
                ],
            ]
        );
		$this->add_control(
			'gallery_title',
			[
				'label' => esc_html__( 'Title', 'bantec-toolkit' ),
				'type' => Controls_Manager::HEADING,
			]
		);
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'gallery_title_typography',
				'selector' => '{{WRAPPER}} .gallery_area-item-content h3',
			]
		);
        $this->add_control(
            'gallery_title_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery_area-item-content h3' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'gallery_hover_title_color',
            [
                'label' => esc_html__('Hover Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery_area-item-content h3 a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
			'item_content_title_margin',
			[
				'type' => Controls_Manager::DIMENSIONS,
				'label' => esc_html__( 'Margin', 'bantec-toolkit' ),
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .gallery_area-item-content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
                'separator' => 'after',
			]
		);
        $this->add_control(
            'gallery_content_bg',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery_area-item-content' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
			'item_content_margin',
			[
				'type' => Controls_Manager::DIMENSIONS,
				'label' => esc_html__( 'Margin', 'bantec-toolkit' ),
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .gallery_area-item-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'item_content_padding',
			[
				'type' => Controls_Manager::DIMENSIONS,
				'label' => esc_html__( 'Padding', 'bantec-toolkit' ),
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .gallery_area-item-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Button Style', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
			'width',
			[
				'label'			=> esc_html__( 'Width (%)', 'bantec-toolkit' ),
				'type'			=> Controls_Manager::SLIDER,
				'selectors'		=> [
					'{{WRAPPER}} .tOri-button' => 'width: {{SIZE}}%;',
				]
			]
		);
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .tOri-button',
			]
		);
        $this->start_controls_tabs(
            'style_tabs'
        );
        $this->start_controls_tab(
            'normal_icon',
            [
                'label' => esc_html__('Normal', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'btn_color',
            [
                'label' => esc_html__('Text Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri-button' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'bg_color',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri-button' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_btn_shadow',
                'selector' => '{{WRAPPER}} .tOri-button',
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
                    '{{WRAPPER}} .tOri-button' => 'border-style: {{VALUE}};',
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
                    '{{WRAPPER}} .tOri-button' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .tOri-button' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'border_type!' => '',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'btn_box_shadow',
                'selector' => '{{WRAPPER}} .tOri-button',
            ]
        );
        $this->add_responsive_control(
            'btn_radius',
            [
                'label' => esc_html__('Border Radius', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tOri-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'btn_padding',
            [
                'label' => esc_html__('Padding', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tOri-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'hover_icon',
            [
                'label' => esc_html__('Hover', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'hover_btn_color',
            [
                'label' => esc_html__('Text Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri-button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'hover_bg_color',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri-button::before' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .tOri-button::after' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .tOri-button:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'hover_border_type',
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
                    '{{WRAPPER}} .tOri-button:hover' => 'border-style: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'hover_border_width',
            [
                'label' => esc_html__('Border Width', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tOri-button:hover' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'hover_border_type!' => '',
                ],
            ]
        );
        $this->add_control(
            'hover_border_color',
            [
                'label' => esc_html__('Border Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri-button:hover' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'hover_border_type!' => '',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'btn_hover_box_shadow',
                'selector' => '{{WRAPPER}} .tOri-button:hover',
            ]
        );
        $this->add_control(
			'btn_transition',
			[
				'label' => esc_html__( 'Transition Duration', 'bantec-toolkit' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 's', 'ms', 'custom' ],
				'default' => [
					'unit' => 's',
					'size' => 0.3,
				],
				'selectors' => [
					'{{WRAPPER}} .tOri-button' => 'transition: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .tOri-button i' => 'transition: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .tOri-button::before' => 'transition: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .tOri-button::after' => 'transition: {{SIZE}}{{UNIT}}',
				],
			]
		);
		$this->add_control(
			'hover_btn_icon_text',
			[
				'label' => esc_html__( 'Icon Style', 'bantec-toolkit' ),
				'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'button_icon[value]!' => '',
                ],
			]
		);
        $this->add_control(
            'hover_btn_icon_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri-button:hover i' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'button_icon[value]!' => '',
                ],
            ]
        );
        $this->add_control(
            'hover_bg_icon_color',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri-button:hover i' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'button_icon[value]!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'hover_btn_icon_rotate',
            [
                'label' => esc_html__('Rotate', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'deg', 'custom' ],
				'range' => [
					'deg' => [
						'min' => -180,
						'max' => 180,
						'step' => 1,
					],
				],
                'selectors' => [
                    '{{WRAPPER}} .tOri-button:hover i' => 'transform: rotate({{SIZE}}deg);',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'button_icon_style',
            [
                'label' => esc_html__('Icon Style', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'button_icon[value]!' => '',
                ],
            ]
        );
        $this->add_control(
            'btn_icon_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri-button i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'bg_icon_color',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri-button i' => 'background: {{VALUE}}',
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
                    '{{WRAPPER}} .tOri-button' => 'gap: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .tOri-button i' => 'font-size: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .tOri-button i' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_icon_rotate',
            [
                'label' => esc_html__('Rotate', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'deg', 'custom' ],
				'range' => [
					'deg' => [
						'min' => -180,
						'max' => 180,
						'step' => 1,
					],
				],
                'selectors' => [
                    '{{WRAPPER}} .tOri-button i' => 'transform: rotate({{SIZE}}deg);',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_icon_padding',
            [
                'label' => esc_html__('Padding', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tOri-button i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_icon_radius',
            [
                'label' => esc_html__('Border Radius', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tOri-button i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'button_icon[value]!' => '',
                ],
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        ?>
            <div class="gallery_area">
                <?php foreach ($settings['gallery_item'] as $item): ?>
                    <div class="gallery_area-item">
                        <div class="font">
                            <h4><?php echo esc_html($item['gallery_title']); ?></h4>
                        </div>
                        <img src="<?php echo esc_url($item['gallery_image']['url']) ?>" alt="image">
                        <div class="gallery_area-item-content">
                            <span><?php echo esc_html($item['gallery_subtitle']); ?></span>
                            <h3><a href="<?php echo esc_url($item['gallery_url']); ?>"><?php echo esc_html($item['gallery_title']); ?></a></h3>
                            <a class="tOri-button <?php echo esc_attr( $settings['icon_align'] ); ?>" href="<?php echo esc_url($item['gallery_url']); ?>">
                                <?php echo esc_html($settings['btn_text']); ?>
                                <?php if (!empty($settings['button_icon']['value'])):?>
                                    <i class="<?php echo esc_attr($settings['button_icon']['value']); ?>"></i>
                                <?php endif;?>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Gallery_Image_Bantec);