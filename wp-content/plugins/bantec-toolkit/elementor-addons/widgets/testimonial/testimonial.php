<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if (!defined('ABSPATH')) exit;

class Testimonial_Bantec extends Widget_Base
{
    public function get_name()
    {
        return 'testimonials';
    }

    public function get_title()
    {
        return esc_html__('Testimonial - Bantec', 'bantec-toolkit');
    }

    public function get_icon()
    {
        return 'bantec-icon eicon-review';
    }

    public function get_categories()
    {
        return ['bantec-toolkit'];
    }

    public function get_keywords()
    {
        return ['bantec', 'Toolkit', 'Client', 'Testimonial', 'Review'];
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
                    'design-1' => esc_html__('Testimonial Style 01', 'bantec-toolkit'),
                    'design-2' => esc_html__('Testimonial Style 02', 'bantec-toolkit'),
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
            'section_content',
            [
                'label' => esc_html__('Testimonial Content', 'bantec-toolkit'),
            ]
        );
        $testimonial_item = new Repeater();
        $testimonial_item->add_control(
            'test_title',
            [
                'label'   => esc_html__('Author Name', 'bantec-toolkit'),
                'type'    => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $testimonial_item->add_control(
            'test_subtitle',
            [
                'label'   => esc_html__('Author Position', 'bantec-toolkit'),
                'type'    => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $testimonial_item->add_control(
            'test_description',
            [
                'label'   => esc_html__('Write Content', 'bantec-toolkit'),
                'type'    => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'testimonial_items',
            [
                'label' => esc_html__('Testimonial Slides', 'bantec-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $testimonial_item->get_controls(),
                'default' => [
                    [
                        'test_subtitle'     => esc_html__('Web Designer', 'bantec-toolkit'),
                        'test_title'        => esc_html__('Sara Albert', 'bantec-toolkit'),
                        'test_description'  => esc_html__('Proin pretium sem libero, nec aliquet augue lobortis in. Phasellus nibh quam, molestie id est sit amet.', 'bantec-toolkit'),
                    ],
                    [
                        'test_subtitle'     => esc_html__('Developer', 'bantec-toolkit'),
                        'test_title'        => esc_html__('Richerd William', 'bantec-toolkit'),
                        'test_description'  => esc_html__('Proin pretium sem libero, nec aliquet augue lobortis in. Phasellus nibh quam, molestie id est sit amet.', 'bantec-toolkit'),
                    ],
                ],
                'title_field' => '{{{ test_title }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'testimonial_item',
            [
                'label' => esc_html__('Testimonial Item', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
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
        $this->add_control(
            'testimonial_item_background',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_testimonial-item' => 'background: {{VALUE}}',
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
                    '{{WRAPPER}} .tOri_testimonial-item' => 'border-style: {{VALUE}};',
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
                    '{{WRAPPER}} .tOri_testimonial-item' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .tOri_testimonial-item' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'border_type!' => '',
                ],
            ]
        );        
        $this->add_responsive_control(
            'testimonial_item_radius',
            [
                'label' => esc_html__('Border Radius', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tOri_testimonial-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'testimonial_item_padding',
            [
                'label' => esc_html__('Padding', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tOri_testimonial-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'testimonial_item_content',
            [
                'label' => esc_html__('Item Content', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_control(
			'author_name',
			[
				'label' => esc_html__( 'Author Name', 'bantec-toolkit' ),
				'type' => Controls_Manager::HEADING,
                
			]
		);
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'author_typography',
                'selector' => '{{WRAPPER}} .tOri_testimonial-item-top .name h5',
                
            ]
        );
        $this->add_control(
            'author_name_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_testimonial-item-top .name h5' => 'color: {{VALUE}}',
                ],                
            ]
        );
		$this->add_control(
			'author_position',
			[
				'label' => esc_html__( 'Author Position', 'bantec-toolkit' ),
				'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                
			]
		);
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'position_typography',
                'selector' => '{{WRAPPER}} .tOri_testimonial-item-top .name span',
                
            ]
        );
        $this->add_control(
            'author_position_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_testimonial-item-top .name span' => 'color: {{VALUE}}',
                ],                
            ]
        );
		$this->add_control(
			'author_content',
			[
				'label' => esc_html__( 'Author Content', 'bantec-toolkit' ),
				'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                
			]
		);
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .tOri_testimonial-item p',
                
            ]
        );
        $this->add_control(
            'author_content_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_testimonial-item p' => 'color: {{VALUE}}',
                ],                
            ]
        );
        $this->add_responsive_control(
            'testimonial_content_margin',
            [
                'label' => esc_html__('Margin', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tOri_testimonial-item p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'rating_color',
            [
                'label' => esc_html__('Rating Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_testimonial-item .rating i' => 'color: {{VALUE}}',
                ],    
                'separator' => 'before',            
            ]
        );        
        $this->add_responsive_control(
            'rating_size',
            [
                'label' => esc_html__('Rating Size', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tOri_testimonial-item .rating i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
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
    }

    protected function render()
    {   
        $sliderId = wp_rand(10, 1000);
        $settings   = $this->get_settings_for_display();
        $grid_columns = $settings['grid_columns_des'] . ' ' . $settings['grid_columns_tab'] . ' ' . $settings['grid_columns_mob'];

    ?>

    <?php if ('design-1' === $settings['select_design']): ?>
        <?php if ('yes' === $settings['active_slider']) : ?>
            <div class="tOri_slider">
                <div class="swiper bantec_slider-<?php echo esc_attr($sliderId);?>">
                    <div class="swiper-wrapper">
                        <?php foreach ($settings['testimonial_items'] as $slide) : ?>
                            <div class="tOri_testimonial-item swiper-slide">
                                <div class="tOri_testimonial-item-top">
                                    <div class="name">
                                        <h5><?php echo esc_html($slide['test_title']); ?></h5>
                                        <span class="text-eight"><?php echo esc_html($slide['test_subtitle']); ?></span>
                                    </div>
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <p><?php echo esc_html($slide['test_description']); ?></p>
                            </div>
                        <?php endforeach; ?>
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
                    <?php foreach ($settings['testimonial_items'] as $slide) : ?>
                        <div class="tOri_testimonial-item swiper-slide">
                            <div class="tOri_testimonial-item-top">
                                <div class="name">
                                    <h5><?php echo esc_html($slide['test_title']); ?></h5>
                                    <span class="text-eight"><?php echo esc_html($slide['test_subtitle']); ?></span>
                                </div>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <p><?php echo esc_html($slide['test_description']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php if ('design-2' === $settings['select_design']): ?>
        <?php if ('yes' === $settings['active_slider']) : ?>
            <div class="tOri_slider">
                <div class="swiper bantec_slider-<?php echo esc_attr($sliderId);?>">
                    <div class="swiper-wrapper">
                        <?php foreach ($settings['testimonial_items'] as $slide) : ?>
                            <div class="tOri_testimonial-item swiper-slide">
                                <div class="tOri_testimonial-item-top">
                                    <div class="name">
                                        <h5><?php echo esc_html($slide['test_title']); ?></h5>
                                        <span class="text-eight"><?php echo esc_html($slide['test_subtitle']); ?></span>
                                    </div>
                                </div>
                                <p><?php echo esc_html($slide['test_description']); ?></p>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        <?php endforeach; ?>
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
                    <?php foreach ($settings['testimonial_items'] as $slide) : ?>
                        <div class="tOri_testimonial-item swiper-slide">
                            <div class="tOri_testimonial-item-top">
                                <div class="name">
                                    <h5><?php echo esc_html($slide['test_title']); ?></h5>
                                    <span class="text-eight"><?php echo esc_html($slide['test_subtitle']); ?></span>
                                </div>
                            </div>
                            <p><?php echo esc_html($slide['test_description']); ?></p>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
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
                                slidesPerView: <?php echo wp_json_encode( $settings['slide_columns_des'])?>,
                            },
                        },
                    });

                });
            })(jQuery);
        </script>

<?php
    }
}

Plugin::instance()->widgets_manager->register(new Testimonial_Bantec);
