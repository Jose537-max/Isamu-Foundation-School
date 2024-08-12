<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class Portfolios_Bantec extends Widget_Base
{
    public function get_name()
    {
        return 'portfolio_bantec';
    }

    public function get_title()
    {
        return esc_html__('Portfolio - Bantec', 'bantec-toolkit');
    }

    public function get_icon()
    {
        return 'bantec-icon eicon-slider-3d';
    }

    public function get_categories()
    {
        return ['bantec-toolkit'];
    }

    public function get_keywords()
    {
        return ['bantec', 'Toolkit', 'Work', 'Portfolio', 'Gallery', 'slider'];
    }

    public function get_style_depends() {
		return [ 'bantec-swiper-style' ];
	}
    
    public function get_script_depends() {
		return [ 'bantec-swiper-script' ];
	}
    
    protected function register_controls()
    {

        $this->start_controls_section(
            'section_general',
            [
                'label' => esc_html__('Style & Design', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'select_design',
            [
                'label' => esc_html__('Select a Style', 'bantec-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'design-1' => esc_html__('Portfolio Style 01', 'bantec-toolkit'),
                ],
                'default' => 'design-1',
                'label_block' => true,
            ]
        );
        $this->add_control(
            'grid_columns_des',
            [
                'label'   => esc_html__('Columns On Desktop', 'bantec-toolkit'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'show_two' => esc_html__('Column 2', 'bantec-toolkit'),
                    'show_three' => esc_html__('Column 3', 'bantec-toolkit'),
                    'show_four' => esc_html__('Column 4', 'bantec-toolkit'),
                    'show_five' => esc_html__('Column 5', 'bantec-toolkit'),
                ],
                'default'      => 'show_three',
                'label_block'  => true,
                'condition' => [
                    'active_slider!' => ['yes'],
                ],
            ]
        );
        $this->add_control(
            'grid_columns_tab',
            [
                'label'   => esc_html__('Columns On Tablet', 'bantec-toolkit'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'md_show_one' => esc_html__('Column 1', 'bantec-toolkit'),
                    'md_show_two' => esc_html__('Column 2', 'bantec-toolkit'),
                    'md_show_three' => esc_html__('Column 3', 'bantec-toolkit'),
                ],
                'default'      => 'md_show_three',
                'label_block'  => true,
                'condition' => [
                    'active_slider!' => ['yes'],
                ],
            ]
           
        );
        $this->add_control(
            'grid_columns_mob',
            [
                'label' => esc_html__('Columns On Mobile', 'bantec-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'sm_show_one' => esc_html__('Column 1', 'bantec-toolkit'),
                    'sm_show_two' => esc_html__('Column 2', 'bantec-toolkit'),
                    'sm_show_three' => esc_html__('Column 3', 'bantec-toolkit'),
                ],
                'default' => 'sm_show_two',
                'label_block' => true,
                'condition' => [
                    'active_slider!' => ['yes'],
                ],
            ]
        );
        $this->add_control(
            'active_slider',
            [
                'label' => esc_html__('Enable Slider', 'bantec-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'bantec-toolkit'),
                'label_off' => esc_html__('No', 'bantec-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',        
            ]
        );
        $this->add_control(
            'show_arrow',
            [
                'label' => esc_html__('Show Arrow', 'bantec-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'bantec-toolkit'),
                'label_off' => esc_html__('No', 'bantec-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'active_slider' => ['yes'],
                ],
            ]
        );
        $this->add_control(
            'show_dots',
            [
                'label' => esc_html__('Show Dots', 'bantec-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'bantec-toolkit'),
                'label_off' => esc_html__('No', 'bantec-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'active_slider' => ['yes'],
                ]
            ]
        );
		$this->add_control(
			'autoplay_slide',
			[
				'label' => esc_html__( 'Autoplay', 'bantec-toolkit' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'yes',
				'options' => [
					'yes' => esc_html__( 'Yes', 'bantec-toolkit' ),
					'no' => esc_html__( 'No', 'bantec-toolkit' ),
				],
                'condition' => [
                    'active_slider' => ['yes'],
                ]
			]
		);
		$this->add_control(
			'slide_delay',
			[
				'label' => esc_html__( 'Autoplay Speed', 'bantec-toolkit' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 2000,
				'max' => 10000,
				'step' => 500,
				'default' => 4000,
                'condition' => [
                    'active_slider' => ['yes'],
                ]
			]
		);
		$this->add_control(
			'slide_speed',
			[
				'label' => esc_html__( 'Animation Speed', 'bantec-toolkit' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 100,
				'max' => 1000,
				'step' => 100,
				'default' => 500,
                'condition' => [
                    'active_slider' => ['yes'],
                ],
			]
		);
        $this->add_control(
			'slide_columns_gap',
			[
				'label' => esc_html__( 'Slide View Gap', 'bantec-toolkit' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 50,
				'step' => 1,
				'default' => 30,
                'condition' => [
                    'active_slider' => ['yes'],
                ],
			]
		);
        $this->add_control(
			'slide_columns_des',
			[
				'label' => esc_html__( 'Slide View Desktop', 'bantec-toolkit' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 6,
				'step' => 1,
				'default' => 3,
                'condition' => [
                    'active_slider' => ['yes'],
                ],
			]
		);
        $this->add_control(
			'slide_columns_lap',
			[
				'label' => esc_html__( 'Slide View Laptop', 'bantec-toolkit' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 6,
				'step' => 1,
				'default' => 3,
                'condition' => [
                    'active_slider' => ['yes'],
                ],
			]
		);
        $this->add_control(
			'slide_columns_tab',
			[
				'label' => esc_html__( 'Slide View Tablet', 'bantec-toolkit' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 3,
				'step' => 1,
				'default' => 2,
                'condition' => [
                    'active_slider' => ['yes'],
                ],
			]
		);
        $this->add_control(
			'slide_columns_mob',
			[
				'label' => esc_html__( 'Slide View Mobile', 'bantec-toolkit' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 2,
				'step' => 1,
				'default' => 1,
                'condition' => [
                    'active_slider' => ['yes'],
                ],
			]
		);
        $this->add_control(
            'portfolio_icon',
            [
                'label' => esc_html__('Icon', 'bantec-toolkit'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa fa-star',
                    'library' => 'brands',
                ],
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
                    'row-reverse' => [
                        'title' => esc_html__('Right', 'bantec-toolkit'),
                        'icon' => 'eicon-h-align-right',
                    ],
                    'column-reverse' => [
                        'title' => esc_html__('Bottom', 'bantec-toolkit'),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'default' => 'row-reverse',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .tOri_portfolio-item-content' => 'display: {{VALUE}}; flex-direction: {{VALUE}};',
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
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .tOri_portfolio-item-content' => 'align-items: {{VALUE}};',
                ],
                'condition' => [
                    'icon_box_position' => ['flex', 'row-reverse'],
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'portfolio_query',
            [
                'label' => esc_html__('Portfolio Query', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'portfolio_count',
            [
                'label' => esc_html__('Number of Portfolio', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['count'],
                'range' => [
                    'count' => [
                        'min' => 2,
                        'max' => 15,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'count',
                    'size' => 4,
                ],
            ]
        );
        $this->add_control(
            'category',
            [
                'label' => esc_html__('Categories', 'bantec-toolkit'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => true,
                'options' => bantec_portfolio_categories(),
            ]
        );
        $this->add_control(
            'portfolio_show_content',
            [
                'label' => esc_html__('Show Content', 'bantec-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'bantec-toolkit'),
                'label_off' => esc_html__('No', 'bantec-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',

            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'show_arrow_content',
            [
                'label' => esc_html__('Arrow Alignment', 'bantec-toolkit'),
                'condition' => [
                    'show_arrow' => ['yes'],
                    'active_slider' => ['yes'],
                ],
            ]
        );
        $this->add_control(
            'arrow_position',
            [
                'label'   => esc_html__('Arrow Position', 'bantec-toolkit'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'position_top' => esc_html__('Top', 'bantec-toolkit'),
                    'position_middle' => esc_html__('Middle', 'bantec-toolkit'),
                    'position_bottom' => esc_html__('Bottom', 'bantec-toolkit'),
                ],
                'default'      => 'position_middle',
                'label_block'  => true,
            ]
        );
        $this->add_responsive_control(
            'arrow_align',
            [
                'label' => esc_html__('Alignment', 'bantec-toolkit'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => esc_html__('Left', 'bantec-toolkit'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'bantec-toolkit'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'end' => [
                        'title' => esc_html__('Right', 'bantec-toolkit'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .tOri_slider .position_bottom' => 'justify-content: {{VALUE}};',
                    '{{WRAPPER}} .tOri_slider .position_top' => 'justify-content: {{VALUE}};',
                ],
                'condition' => [
                    'arrow_position' => ['position_top', 'position_bottom'],
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'show_dots_content',
            [
                'label' => esc_html__('Dots Alignment', 'bantec-toolkit'),
                'condition' => [
                    'show_dots' => ['yes'],
                    'active_slider' => ['yes'],
                ],
            ]
        );
        $this->add_responsive_control(
            'dots_align',
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
                    '{{WRAPPER}} .tOri_slider-dots' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'item_style',
            [
                'label' => esc_html__('Item', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
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
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .tOri_portfolio-item-content' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .icon__box-item-content > a' => 'justify-content: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'slide_box',
            [
                'label' => esc_html__('Slide Box', 'bantec-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'slide_box_no' => esc_html__('No', 'bantec-toolkit'),
                    'slide_box_yes' => esc_html__('Yes', 'bantec-toolkit'),
                ],
                'default' => 'no',
                'label_block' => true,
                'condition' => [
                    'active_slider' => ['yes'],
                ],
            ]
        );
        $this->add_responsive_control(
            'item_gap',
            [
                'label' => esc_html__('Gap', 'bantec-toolkit'),
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
					'size' => 25,
				],
                'selectors' => [
                    '{{WRAPPER}} .tOri_portfolio' => 'gap: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'active_slider!' => ['yes'],
                ],
            ]
        );
        $this->start_controls_tabs(
            'style_tabs'
        );
        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'bantec-toolkit' ),
                'condition' => [
                    'active_slider' => ['yes'],
                ],
            ]
        );
        $this->add_control(
            'portfolio_image',
            [
                'label' => esc_html__('Image', 'bantec-toolkit'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_responsive_control(
            'item_image_radius',
            [
                'label' => esc_html__('Border Radius', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tOri_portfolio-item img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'item_normal',
            [
                'label' => esc_html__('Image Zoom', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tOri_portfolio-item.swiper-slide' => 'transform: scale({{SIZE}});',
                ],
                'condition' => [
                    'active_slider' => ['yes'],
                ],
            ]
        ); 
        $this->add_responsive_control(
			'image_height',
			[
				'label' => esc_html__( 'Height', 'bantec-toolkit' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
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
				'selectors' => [
					'{{WRAPPER}} .tOri_portfolio-item img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'object-fit',
			[
				'label' => esc_html__( 'Object Fit', 'bantec-toolkit' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'Default'),
					'fill' => esc_html__( 'Fill'),
					'cover' => esc_html__( 'Cover'),
					'contain' => esc_html__( 'Contain'),
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tOri_portfolio-item img' => 'object-fit: {{VALUE}};',
				],
				'condition' => [
					'image_height[size]!' => '',
				],
			]
		);
        $this->end_controls_tab();
        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__( 'Active', 'bantec-toolkit' ),
                'condition' => [
                    'active_slider' => ['yes'],
                ],
            ]
        );       
        $this->add_responsive_control(
            'item_active',
            [
                'label' => esc_html__('Image Zoom', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 2,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tOri_portfolio-item.swiper-slide.swiper-slide-active' => 'transform: scale({{SIZE}});',
                ],
            ]
        );

        $this->add_responsive_control(
            'active_space',
            [
                'label' => esc_html__('Active Space', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tOri_slider-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();      
        $this->end_controls_section();

        $this->start_controls_section(
            'portfolio_content_style',
            [
                'label' => esc_html__('Content', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
			'content_width',
			[
				'label' => esc_html__( 'Layout', 'bantec-toolkit' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'inline',
				'options' => [
					'inline' => [
						'title' => esc_html__( 'Inline', 'bantec-toolkit' ),
						'icon' => 'eicon-align-start-h',
					],
					'content_full' => [
						'title' => esc_html__( 'Full Width', 'bantec-toolkit' ),
						'icon' => 'eicon-align-stretch-h',
					],
					'area_full' => [
						'title' => esc_html__( 'Area Full', 'bantec-toolkit' ),
						'icon' => 'eicon-menu-bar',
					],
				],
			]
		);
        $this->start_controls_tabs(
            'content_tabs'
        );
        $this->start_controls_tab(
            'content_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'bantec-toolkit' ),
            ]
        );
		$this->add_control(
			'portfolio_title',
			[
				'label' => esc_html__( 'Title', 'bantec-toolkit' ),
				'type' => Controls_Manager::HEADING,
			]
		);
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_title_typography',
				'selector' => '{{WRAPPER}} .tOri_portfolio-item-content h3',
			]
		);
        $this->add_control(
            'portfolio_title_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_portfolio-item-content h3' => 'color: {{VALUE}}',
                ],
            ]
        );        
		$this->add_control(
			'portfolio_subtitle',
			[
				'label' => esc_html__( 'Subtitle', 'bantec-toolkit' ),
				'type' => Controls_Manager::HEADING,
			]
		);
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_subtitle_typography',
				'selector' => '{{WRAPPER}} .tOri_portfolio-item-content span',
			]
		);
        $this->add_control(
            'portfolio_subtitle_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_portfolio-item-content span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'item_content_background',
            [
                'label' => esc_html__('Content Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_portfolio-item-content' => 'background: {{VALUE}};',
                ],
                'separator' => 'before',
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
                    '{{WRAPPER}} .tOri_portfolio-item-content' => 'border-style: {{VALUE}};',
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
                    '{{WRAPPER}} .tOri_portfolio-item-content' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .tOri_portfolio-item-content' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'border_type!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'item_content_radius',
            [
                'label' => esc_html__('Border Radius', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tOri_portfolio-item-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .tOri_portfolio-item-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .tOri_portfolio-item-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_tab();
        $this->start_controls_tab(
            'content_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'bantec-toolkit' ),
            ]
        );
		$this->add_control(
			'portfolio_title_hover',
			[
				'label' => esc_html__( 'Title', 'bantec-toolkit' ),
				'type' => Controls_Manager::HEADING,
			]
		);
        $this->add_control(
            'portfolio_hover_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_portfolio-item-content h3 a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
			'content_transition',
			[
				'label' => esc_html__( 'Title Transition', 'bantec-toolkit' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 's', 'ms', 'custom' ],
				'default' => [
					'unit' => 's',
					'size' => 0.4,
				],
				'selectors' => [
					'{{WRAPPER}} .tOri_portfolio-item-content h3 a' => 'transition: {{SIZE}}{{UNIT}}',
				],
			]
		);
        $this->add_responsive_control(
            'y_position',
            [
                'label' => esc_html__('Y Position', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -50,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tOri_portfolio-item.swiper-slide.swiper-slide-active .tOri_portfolio-item-content' => 'transform: translateY({{SIZE}}{{UNIT}});',
                    '{{WRAPPER}} .tOri_portfolio-item.normal:hover .tOri_portfolio-item-content' => 'transform: translateY({{SIZE}}{{UNIT}});',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs(); 
        $this->end_controls_section();

        $this->start_controls_section(
            'portfolio_nav',
            [
                'label' => esc_html__('Pagination', 'bantec-toolkit'),
                'condition' => [
                    'active_slider!' => ['yes'],
                ],
            ]
        );

        $this->add_control(
            'portfolio_pagination',
            [
                'label' => esc_html__('Show', 'bantec-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'bantec-toolkit'),
                'label_off' => esc_html__('No', 'bantec-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',

            ]
        );

        $this->add_control(
			'hr',
			[
				'type' => Controls_Manager::DIVIDER,
                'condition' => [
                    'portfolio_pagination' => ['yes'],
                ],
			]
		);

        $this->add_responsive_control(
            'portfolio_pagination_aligment',
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
                    '{{WRAPPER}} .theme__pagination' => 'text-align: {{VALUE}};',
                ],
                'condition' => [
                    'portfolio_pagination' => ['yes'],
                ],
            ]
        );

        $this->add_control(
			'hr1',
			[
				'type' => Controls_Manager::DIVIDER,
                'condition' => [
                    'portfolio_pagination' => ['yes'],
                ],
			]
		);

        $this->add_responsive_control(
            'portfolio_pagination_space',
            [
                'label' => esc_html__('Space', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
					'unit' => 'px',
					'size' => 50,
				],
                'selectors' => [
                    '{{WRAPPER}} .theme__pagination' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'portfolio_pagination' => ['yes'],
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
                    '{{WRAPPER}} .tOri_portfolio-item-icon i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_background',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_portfolio-item-icon' => 'background: {{VALUE}}',
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
                    '{{WRAPPER}} .tOri_portfolio-item-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .tOri_portfolio-item-icon' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'portfolio_icon_position',
            [
                'label' => esc_html__('Vertical Position', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'custom'],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tOri_portfolio-item-icon' => 'top: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .tOri_portfolio-item-icon' => 'border-style: {{VALUE}};',
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
                    '{{WRAPPER}} .tOri_portfolio-item-icon' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .tOri_portfolio-item-icon' => 'border-color: {{VALUE}};',
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
                    '{{WRAPPER}} .tOri_portfolio-item-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .tOri_portfolio-item-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .tOri_portfolio-item-icon:hover i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_hover_background',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_portfolio-item-icon:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_hover_border',
            [
                'label' => esc_html__('Border Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_portfolio-item-icon:hover' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'icon_border_type!' => '',
                ],
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
					'size' => 0.4,
				],
				'selectors' => [
					'{{WRAPPER}} .tOri_portfolio-item-icon' => 'transition: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .tOri_portfolio-item-icon i' => 'transition: {{SIZE}}{{UNIT}}',
				],
			]
		);
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'arrow_style',
            [
                'label' => esc_html__('Arrow Style', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_arrow' => ['yes'],
                    'active_slider' => ['yes'],
                ],
            ]
        );
        $this->start_controls_tabs(
            'arrow_tabs'
        );
        $this->start_controls_tab(
            'arrow_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'bantec-toolkit' ),
            ]
        );
        $this->add_control(
            'arrow_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_slider-arrow-prev i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .tOri_slider-arrow-next i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'arrow_background',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_slider-arrow-prev i' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .tOri_slider-arrow-next i' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'arrow_max_width',
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
					'size' => 40,
				],
                'selectors' => [
                    '{{WRAPPER}} .tOri_slider-arrow-prev i' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tOri_slider-arrow-next i' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tOri_slider-arrow-prev' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tOri_slider-arrow-next' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'arrow_max_size',
            [
                'label' => esc_html__('Icon Size', 'bantec-toolkit'),
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
					'size' => 18,
				],
                'selectors' => [
                    '{{WRAPPER}} .tOri_slider-arrow-prev i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tOri_slider-arrow-next i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'arrow_outside',
            [
                'label' => esc_html__('Out Side Gap', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -200,
                        'max' => 200,
                        'step' => 1,
                    ],
					'%' => [
						'min' => -100,
						'max' => 100,
					],
                ],
                'default' => [
					'unit' => 'px',
					'size' => -20,
				],
                'selectors' => [
                    '{{WRAPPER}} .tOri_slider-arrow.position_middle .tOri_slider-arrow-prev' => 'left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tOri_slider-arrow.position_middle .tOri_slider-arrow-next' => 'right: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'arrow_position' => ['position_middle'],
                ],
            ]
        );
        $this->add_responsive_control(
            'arrow_gap',
            [
                'label' => esc_html__('Gap', 'bantec-toolkit'),
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
					'size' => 10,
				],
                'selectors' => [
                    '{{WRAPPER}} .tOri_slider-arrow' => 'gap: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'arrow_position' => ['position_top', 'position_bottom'],
                ],
            ]
        );
        $this->add_responsive_control(
            'arrow_margin',
            [
                'label' => esc_html__('Margin', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tOri_slider-arrow' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
                'condition' => [
                    'arrow_position' => ['position_top', 'position_bottom'],
                ],
            ]
        );
        $this->add_responsive_control(
            'arrow_radius',
            [
                'label' => esc_html__('Border Radius', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tOri_slider-arrow-prev i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .tOri_slider-arrow-next i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        
        $this->start_controls_tab(
            'arrow_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'bantec-toolkit' ),
            ]
        );
        $this->add_control(
            'arrow_hover_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_slider-arrow-prev i:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .tOri_slider-arrow-next i:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'arrow_hover_background',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_slider-arrow-prev i:hover' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .tOri_slider-arrow-next i:hover' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'dots_style',
            [
                'label' => esc_html__('Dot Style', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_dots' => ['yes'],
                    'active_slider' => ['yes'],
                ],
            ]
        );
        $this->start_controls_tabs(
            'dots_tabs'
        );
        $this->start_controls_tab(
            'dots_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'bantec-toolkit' ),
            ]
        );
        $this->add_control(
            'dots_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_slider-dots .swiper-pagination-bullet' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'dots_max_width',
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
					'size' => 8,
				],
                'selectors' => [
                    '{{WRAPPER}} .tOri_slider-dots .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'dots_gap',
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
                'default' => [
					'unit' => 'px',
					'size' => 8,
				],
                'selectors' => [
                    '{{WRAPPER}} .tOri_slider-dots .swiper-pagination-bullet' => 'margin-left: {{SIZE}}{{UNIT}};margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'dots_margin',
            [
                'label' => esc_html__('Margin', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tOri_slider-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'dots_radius',
            [
                'label' => esc_html__('Border Radius', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tOri_slider-dots .swiper-pagination-bullet' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'dots_hover_tab',
            [
                'label' => esc_html__( 'Active', 'bantec-toolkit' ),
            ]
        );
        $this->add_control(
            'dots_hover_background',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_slider-dots .swiper-pagination-bullet-active' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'portfolio_pagination_style',
            [
                'label' => esc_html__('Pagination', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'portfolio_pagination' => 'yes',
                ],
            ]
        );
        $this->start_controls_tabs(
            'pagination_style_tabs'
        );
        $this->start_controls_tab(
            'pagination_normal',
            [
                'label' => esc_html__('Normal', 'bantec-toolkit'),
            ]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pagination_typography',
				'selector' => '{{WRAPPER}} .theme__pagination ul li a,
				{{WRAPPER}} .theme__pagination ul li span.current',
			]
		);
        $this->add_control(
            'pagination_color',
            [
                'label' => esc_html__('Text Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme__pagination ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'pagination_bg',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme__pagination ul li a' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'pag_border_type',
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
                    '{{WRAPPER}} .theme__pagination ul li a' => 'border-style: {{VALUE}};',
                    '{{WRAPPER}} .theme__pagination ul li span.current' => 'border-style: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'pagination_border_width',
            [
                'label' => esc_html__('Border Width', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .theme__pagination ul li a' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .theme__pagination ul li span.current' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'pag_border_type!' => '',
                ],
            ]
        );
        $this->add_control(
            'pagination_border_color',
            [
                'label' => esc_html__('Border Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme__pagination ul li a' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .theme__pagination ul li span.current' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'pag_border_type!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'pagination_radius',
            [
                'label' => esc_html__('Border Radius', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .theme__pagination ul li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .theme__pagination ul li span.current' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'pagination_gap',
            [
                'label' => esc_html__('Gap', 'bantec-toolkit'),
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
                    '{{WRAPPER}} .theme__pagination ul' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'pagination_size',
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
                'selectors' => [
                    '{{WRAPPER}} .theme__pagination ul li a' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .theme__pagination ul li span.current' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'pagination_hover',
            [
                'label' => esc_html__('Active', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'pagination_hover_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme__pagination ul li span.current' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .theme__pagination ul li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'pagination_hover_bg',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme__pagination ul li span.current' => 'background: {{VALUE}};border-color: {{VALUE}}',
                    '{{WRAPPER}} .theme__pagination ul li a:hover' => 'background: {{VALUE}};border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
			'pagination_transition',
			[
				'label' => esc_html__( 'Transition Duration', 'bantec-toolkit' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 's', 'ms', 'custom' ],
				'default' => [
					'unit' => 's',
					'size' => 0.3,
				],
				'selectors' => [
					'{{WRAPPER}} .theme__pagination ul li a' => 'transition: {{SIZE}}{{UNIT}}',
				],
			]
		);
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }


    protected function render()
    {   $sliderId = wp_rand(10, 1000);
        $settings = $this->get_settings_for_display();
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $slider_field = $settings['slide_box'];
        $grid_columns = $settings['grid_columns_des'] . ' ' . $settings['grid_columns_tab'] . ' ' . $settings['grid_columns_mob'];
        $postCount = 0;
        $postsPerPage = $settings['portfolio_count']['size'];
        if (!empty($settings['category'])) {
            $portfolio_query = new \WP_Query(
                array(
                    'post_type' => 'portfolio',
                    'post_status' => 'publish',
                    'posts_per_page' => $postsPerPage,
                    'paged'     => $paged,
                    'ignore_sticky_posts' => 1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'portfolio_category',
                            'terms' => $settings['category'],
                            'field' => 'slug',
                        )
                    )
                )
            );
        } else {
            $portfolio_query = new \WP_Query(
                array(
                    'post_type' => 'portfolio',
                    'post_status' => 'publish',
                    'posts_per_page' => $postsPerPage,
                    'paged'     => $paged,
                    'ignore_sticky_posts' => 1,
                )
            );
        }
        ?>

        <?php if ('design-1' === $settings['select_design']): ?>
            <?php if ('yes' === $settings['active_slider']) : ?>
                <div class="tOri_slider">
                    <div class="swiper bantec_slider-<?php echo esc_attr($sliderId);?> <?php echo esc_attr($slider_field); ?>">
                        <div class="swiper-wrapper tOri_slider-slide">
                            <?php while ($portfolio_query->have_posts()):
                                $portfolio_query->the_post(); ?>
                                    <div class="tOri_portfolio-item swiper-slide">
                                        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>">
                                        <div class="tOri_portfolio-item-content <?php echo esc_attr( $settings['content_width'] ); ?>">
                                            <?php if (!empty($settings['portfolio_icon']['value'])):?>
                                                <a href="<?php echo esc_url(get_the_permalink()); ?>">
                                                    <div class="tOri_portfolio-item-icon">
                                                        <?php \Elementor\Icons_Manager::render_icon($settings['portfolio_icon'], ['aria-hidden' => 'true']); ?>                                                    
                                                    </div>
                                                </a>
                                            <?php endif;?>
                                            <?php if ('yes' === $settings['portfolio_show_content']): ?>
                                                <div>
                                                    <h3><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h3>
                                                    <span>
                                                        <?php $terms = get_the_terms(get_the_ID(), 'portfolio_category');
                                                            if (!empty($terms)) {
                                                                echo $terms[0]->name;
                                                            }
                                                        ?>
                                                    </span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endwhile;     
                            wp_reset_query();?>
                        </div>
                    </div>
                    <?php if ('yes' === $settings['show_arrow']) : ?>
                        <div class="tOri_slider-arrow <?php echo esc_attr($settings['arrow_position']); ?>">
                            <div class="tOri_slider-arrow-prev swiper-button-prev-<?php echo esc_attr($sliderId);?>"><i class="fal fa-long-arrow-left"></i></div>
                            <div class="tOri_slider-arrow-next swiper-button-next-<?php echo esc_attr($sliderId);?>"><i class="fal fa-long-arrow-right"></i></div>
                        </div>
                    <?php endif; ?>
                    <?php if ('yes' === $settings['show_dots']) : ?>
                        <div class="tOri_slider-dots">
                            <div class="tOri_slide_dots-<?php echo esc_attr($sliderId);?>"></div>
                        </div>
                    <?php endif; ?>
                </div>
                <?php else : ?>
                <div class="tOri_portfolio <?php echo esc_attr($grid_columns); ?>">
                    <?php while ($portfolio_query->have_posts()):
                        $portfolio_query->the_post(); ?>
                            <div class="tOri_portfolio-item normal">
                                <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>">
                                <div class="tOri_portfolio-item-content <?php echo esc_attr( $settings['content_width'] ); ?>">
                                    <?php if (!empty($settings['portfolio_icon']['value'])):?>
                                        <a href="<?php echo esc_url(get_the_permalink()); ?>">
                                            <div class="tOri_portfolio-item-icon">
                                                <?php \Elementor\Icons_Manager::render_icon($settings['portfolio_icon'], ['aria-hidden' => 'true']); ?>                                                    
                                            </div>
                                        </a>
                                    <?php endif;?>
                                    <?php if ('yes' === $settings['portfolio_show_content']): ?>
                                        <div>
                                            <h3><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h3>
                                            <span>
                                                <?php $terms = get_the_terms(get_the_ID(), 'portfolio_category');
                                                    if (!empty($terms)) {
                                                        echo $terms[0]->name;
                                                    }
                                                ?>
                                            </span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        </div>
                        <?php
                         if ('yes' === $settings['portfolio_pagination']) {
                         bantec_pagination($portfolio_query); }
                    wp_reset_query();?>
                
            <?php endif; ?>
        <?php endif; ?>
        <?php if ('yes' === $settings['active_slider']) : ?>
        <script>
            (function ($) {
                "use strict";
                $(document).ready(function () {
                    var autoplayOption = <?php echo wp_json_encode( $this->get_settings('autoplay_slide') ); ?>;
                    var enableAutoplay = (autoplayOption === 'yes');                    
                    var swiper = new Swiper(".bantec_slider-<?php echo esc_attr($sliderId);?>", {
                        loop: true,                        
                        spaceBetween: <?php echo wp_json_encode( $settings['slide_columns_gap'])?>,
                        speed: <?php echo wp_json_encode( $settings['slide_speed'])?>,
                        centeredSlides: true,
                        autoplay: enableAutoplay ? {
                            delay: <?php echo wp_json_encode( $settings['slide_delay'])?>,
                            reverseDirection: false,
                            disableOnInteraction: false,
                        } : false, // Conditionally enable or disable autoplay
                        navigation: {
                            nextEl: '.swiper-button-next-<?php echo esc_js($sliderId)?>',
                            prevEl: '.swiper-button-prev-<?php echo esc_js($sliderId)?>',
                            },		
                        pagination: {
                            el: ".tOri_slide_dots-<?php echo esc_js($sliderId)?>",
                            clickable: true,
                        },
                        breakpoints: {
                            0: {
                                slidesPerView: <?php echo wp_json_encode( $settings['slide_columns_mob'])?>,
                            },
                            768: {
                                slidesPerView: <?php echo wp_json_encode( $settings['slide_columns_tab'])?>,
                            },
                            1025: {
                                slidesPerView: <?php echo wp_json_encode( $settings['slide_columns_lap'])?>,
                            },
                            1600: {
                                slidesPerView: <?php echo wp_json_encode( $settings['slide_columns_des'])?>,
                            },
                        },
                    });

                });
            })(jQuery);
        </script>
        <?php endif;?>
    <?php
    }
}

Plugin::instance()->widgets_manager->register(new Portfolios_Bantec);