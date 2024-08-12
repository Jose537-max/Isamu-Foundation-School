<?php

namespace Elementor;

use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if (!defined('ABSPATH')) exit;

class Slider_BannerTwo extends Widget_Base
{
    public function get_name()
    {
        return 'bantec-banner-two';
    }

    public function get_title()
    {
        return esc_html__('Banner Two - Bantec', 'bantec-toolkit');
    }

    public function get_icon()
    {
        return 'bantec-icon eicon-post-slider';
    }

    public function get_categories()
    {
        return ['bantec-toolkit'];
    }

    public function get_keywords()
    {
        return ['bantec', 'Toolkit', 'Banner', 'Slider', 'Hero'];
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
            'section_content',
            [
                'label' => esc_html__('Slider Content', 'bantec-toolkit'),
            ]
        );

        $banner_slider = new Repeater();        
        $banner_slider->add_control(
            'slider_image',
            [
                'label' => esc_html__('Choose Image', 'bantec-toolkit'),
                'type'  => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );       
        $banner_slider->add_control(
            'slider_subtitle',
            [
                'label'   => esc_html__('Sub Title', 'bantec-toolkit'),
                'type'    => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $banner_slider->add_control(
            'slider_title',
            [
                'label'   => esc_html__('Title', 'bantec-toolkit'),
                'type'    => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $banner_slider->add_control(
            'slider_content',
            [
                'label'   => esc_html__('Content', 'bantec-toolkit'),
                'type'    => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $banner_slider->add_control(
            'slider_btn_text',
            [
                'label' => esc_html__('Button Text', 'bantec-toolkit'),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $banner_slider->add_control(
            'slider_btn_url',
            [
                'label' => esc_html__('Button URL', 'bantec-toolkit'),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'banner_slides',
            [
                'label' => esc_html__('Banner Slides', 'bantec-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $banner_slider->get_controls(),
                'default' => [
                    [
                        'slider_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'slider_subtitle'     => esc_html__('Digital Growth', 'bantec-toolkit'),
                        'slider_title'        => esc_html__('Empowering Organizations ', 'bantec-toolkit'),  
                        'slider_content'        => esc_html__('Lorem ipsum dolor sit amet, conse ct etur adipiscing elit. Sed sit amet rcus nunc. Duis egestas ac ante sed tincidun', 'bantec-toolkit'),                  
                        'slider_btn_text'     => esc_html__('Read More', 'bantec-toolkit'),                        
                        'slider_btn_url'      => esc_attr__('http://google.com', 'bantec-toolkit'),                        
                    ],
                    [
                        'slider_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'slider_subtitle'     => esc_html__('Digital Growth', 'bantec-toolkit'),
                        'slider_title'        => esc_html__('Empowering Organizations ', 'bantec-toolkit'),  
                        'slider_content'        => esc_html__('Lorem ipsum dolor sit amet, conse ct etur adipiscing elit. Sed sit amet rcus nunc. Duis egestas ac ante sed tincidun', 'bantec-toolkit'),
                        'slider_btn_text'     => esc_html__('Read More', 'bantec-toolkit'),                        
                        'slider_btn_url'      => esc_attr__('http://google.com', 'bantec-toolkit'),                        
                    ],
                ],
                'title_field' => '{{{ slider_title }}}',                
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_general',
            [
                'label' => esc_html__('Banner Shape', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'banner_shape_one',
            [
                'label' => esc_html__('Shape One', 'bantec-toolkit'),
                'type'  => Controls_Manager::MEDIA,
                'label_block' => true,               
            ]
        );
        $this->add_control(
            'banner_shape_two',
            [
                'label' => esc_html__('Shape Two', 'bantec-toolkit'),
                'type'  => Controls_Manager::MEDIA,
                'label_block' => true,               
            ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'banner_style_section',
            [
                'label' => esc_html__('Content Style', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'banner_padding',
            [
                'label' => esc_html__('Banner Padding', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tOri_banner-two-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->add_control(
			'banner_tag',
			[
				'label' => esc_html__( 'Sub Title', 'bantec-toolkit' ),
				'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                
			]
		);
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tag_typography',
                'selector' => '{{WRAPPER}} .tOri_banner-two-content > span',
                
            ]
        );
        $this->add_control(
            'banner_sub_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_banner-two-content > span' => 'color: {{VALUE}}',
                ],                
            ]
        );
        $this->add_control(
            'banner_sub_bg',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_banner-two-content > span' => 'background: {{VALUE}}',
                ],                
            ]
        );
		$this->add_control(
			'banner_title',
			[
				'label' => esc_html__( 'Title', 'bantec-toolkit' ),
				'type' => Controls_Manager::HEADING,
                
			]
		);
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'selector' => '{{WRAPPER}} .tOri_banner-two-content h1',
                
            ]
        );
        $this->add_control(
            'banner_title_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_banner-two-content h1' => 'color: {{VALUE}}',
                ],                
            ]
        );
        $this->add_responsive_control(
            'banner_title_gap',
            [
                'label' => esc_html__('Gap', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors' => [
                    '{{WRAPPER}} .tOri_banner-two-content h1' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'banner_title_width',
            [
                'label' => esc_html__('Max Width', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1500,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors' => [
                    '{{WRAPPER}} .tOri_banner-two-content h1' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		$this->add_control(
			'banner_content',
			[
				'label' => esc_html__( 'Content', 'bantec-toolkit' ),
				'type' => Controls_Manager::HEADING,
                
			]
		);
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .tOri_banner-two-content p',
                
            ]
        );
        $this->add_control(
            'banner_content_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_banner-two-content p' => 'color: {{VALUE}}',
                ],                
            ]
        );
        $this->add_responsive_control(
            'banner_content_width',
            [
                'label' => esc_html__('Max Width', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1500,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors' => [
                    '{{WRAPPER}} .tOri_banner-two-content p' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'banner_content_gap',
            [
                'label' => esc_html__('Gap', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors' => [
                    '{{WRAPPER}} .tOri_banner-two-content p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'button_style_section',
            [
                'label' => esc_html__('Button Style', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
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
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'skill_counter_typography',
				'selector' => '{{WRAPPER}} .tOri-button',
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
                'label' => esc_html__('BG Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri-button' => 'background: {{VALUE}}',
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
		$this->add_control(
			'btn_icon_text',
			[
				'label' => esc_html__( 'Icon Style', 'bantec-toolkit' ),
				'type' => Controls_Manager::HEADING,
                'separator' => 'before',
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
                'label' => esc_html__('Color', 'bantec-toolkit'),
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
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'arrow_style',
            [
                'label' => esc_html__('Arrow Style', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
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
                    '{{WRAPPER}} .tOri_banner-two-arrow-prev i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .tOri_banner-two-arrow-next i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'arrow_background',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_banner-two-arrow-prev i' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .tOri_banner-two-arrow-next i' => 'background: {{VALUE}};',
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
                    '{{WRAPPER}} .tOri_banner-two-arrow-prev i' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tOri_banner-two-arrow-next i' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tOri_banner-two-arrow-prev' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tOri_banner-two-arrow-next' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .tOri_banner-two-arrow-prev i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tOri_banner-two-arrow-next i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'arrow_outside',
            [
                'label' => esc_html__('Arrow Position', 'bantec-toolkit'),
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
                'selectors' => [
                    '{{WRAPPER}} .tOri_banner-two-arrow-prev' => 'left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tOri_banner-two-arrow-next' => 'right: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .tOri_banner-two-arrow-prev i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .tOri_banner-two-arrow-next i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'arrow_opacity',
            [
                'label' => esc_html__('Opacity', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tOri_banner-two .tOri_banner-two-arrow-prev i' => 'opacity: {{SIZE}};',
                    '{{WRAPPER}} .tOri_banner-two .tOri_banner-two-arrow-next i' => 'opacity: {{SIZE}};',
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
                    '{{WRAPPER}} .tOri_banner-two-arrow-prev i:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .tOri_banner-two-arrow-next i:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'arrow_hover_background',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_banner-two-arrow-prev i:hover' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .tOri_banner-two-arrow-next i:hover' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'active_arrow_opacity',
            [
                'label' => esc_html__('Opacity', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tOri_banner-two:hover .tOri_banner-two-arrow-prev i' => 'opacity: {{SIZE}};',
                    '{{WRAPPER}} .tOri_banner-two:hover .tOri_banner-two-arrow-next i' => 'opacity: {{SIZE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'active_arrow_outside',
            [
                'label' => esc_html__('Arrow Position', 'bantec-toolkit'),
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
                'selectors' => [
                    '{{WRAPPER}} .tOri_banner-two:hover .tOri_banner-two-arrow-prev' => 'left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tOri_banner-two:hover .tOri_banner-two-arrow-next' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

    }

    protected function render()
    {
        $bantec_htmls = array(
            'a'      => array(
                'href'   => array(),
                'target' => array()
            ),
            'strong' => array(),
            'br' => array(),
            'small'  => array(),
            'span'   => array(
                'class' => array()
            ),
            'p'      => array(),
        );
        $settings = $this->get_settings_for_display();
        $banner_shape_one = $settings['banner_shape_one'];
        $banner_shape_two = $settings['banner_shape_two'];
    ?>
    
        <div class="tOri_banner-two">
            <div class="swiper banner-slider">
                <div class="swiper-wrapper">
                    <?php foreach ($settings['banner_slides'] as $slide) : ?>
                        <div class="tOri_banner-two-image swiper-slide" style="background-image: url(<?php echo esc_url($slide['slider_image']['url']) ?>)">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="tOri_banner-two-content">
                                            <?php if (!empty($slide['slider_subtitle'])): ?>
                                                <span data-animation="fadeInUp" data-delay=".3s"><?php echo esc_html($slide['slider_subtitle'],); ?></span>
                                            <?php endif; ?>
                                            <?php if (!empty($slide['slider_title'])): ?>
                                                <h1 data-animation="fadeInUp" data-delay=".5s"><?php echo wp_kses($slide['slider_title'], $bantec_htmls); ?></h1>
                                            <?php endif; ?>
                                            <?php if (!empty($slide['slider_content'])): ?>
                                                <p data-animation="fadeInUp" data-delay=".8s"><?php echo wp_kses($slide['slider_content'], $bantec_htmls); ?></p>
                                            <?php endif; ?>
                                            <?php if (!empty($slide['slider_btn_url'])): ?>
                                                <div data-animation="fadeInUp" data-delay="1s">
                                                    <a class="tOri-button" href="<?php echo esc_url($slide['slider_btn_url']); ?>"><?php echo esc_html($slide['slider_btn_text']); ?><i class="fa-regular fa-arrow-right-long"></i></a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tOri_banner-two-shape-one" data-animation="fadeInLeft" data-delay=".5s">
                                <?php
                                if ($banner_shape_one['url']) {
                                    if (!empty($banner_shape_one['alt'])) {
                                        echo '<img src="' . esc_url($banner_shape_one['url']) . '" alt="' . esc_attr($banner_shape_one['alt']) . '" />';
                                    } else {
                                        echo '<img src="' . esc_url($banner_shape_one['url']) . '" alt="' . esc_attr(__('No alt text', 'bantec-toolkit')) . '" />';
                                    }
                                } ?>
                            </div>
                            <div class="tOri_banner-two-shape-two" data-animation="fadeInRight" data-delay=".5s">
                                <?php
                                if ($banner_shape_two['url']) {
                                    if (!empty($banner_shape_two['alt'])) {
                                        echo '<img src="' . esc_url($banner_shape_two['url']) . '" alt="' . esc_attr($banner_shape_two['alt']) . '" />';
                                    } else {
                                        echo '<img src="' . esc_url($banner_shape_two['url']) . '" alt="' . esc_attr(__('No alt text', 'bantec-toolkit')) . '" />';
                                    }
                                } ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="tOri_banner-two-arrow">
                <div class="tOri_banner-two-arrow-prev banner_prev"><i class="fal fa-long-arrow-left"></i></div>
                <div class="tOri_banner-two-arrow-next banner_next"><i class="fal fa-long-arrow-right"></i></div>
            </div>
        </div>
    <?php
    }
}

Plugin::instance()->widgets_manager->register(new Slider_BannerTwo);