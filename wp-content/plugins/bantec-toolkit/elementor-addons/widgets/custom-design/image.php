<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class Image_Bantec extends Widget_Base
{
    public function get_name()
    {
        return 'image-bantec';
    }

    public function get_title()
    {
        return esc_html__('Images - Bantec', 'bantec-toolkit');
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
        return ['bantec', 'Toolkit', 'Images', 'left', 'right'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__('Image Style', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'select_design',
            [
                'label' => esc_html__('Select Image Style', 'bantec-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'design-1' => esc_html__('Style 01', 'bantec-toolkit'),
                    'design-2' => esc_html__('Style 02', 'bantec-toolkit'),
                ],
                'default' => 'design-1',
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'image_section_image',
            [
                'label' => esc_html__('Images', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'image_one',
            [
                'label' => esc_html__('Image One', 'bantec-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'image_two',
            [
                'label' => esc_html__('Image Two', 'bantec-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'image_three',
            [
                'label' => esc_html__('Image Three', 'bantec-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'select_design' => ['design-2'],
                ]
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'image_style_section',
            [
                'label' => esc_html__('Style', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
			'width',
			[
				'label' => esc_html__( 'Width', 'bantec-toolkit' ),
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
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .tOri_image-img img' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .tOri_image-two-img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'max-width',
			[
				'label' => esc_html__( 'Max Width', 'bantec-toolkit' ),
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
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .tOri_image-img img' => 'max-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .tOri_image-two-img' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'height',
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
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .tOri_image-img img' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .tOri_image-two-img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'object-fit',
			[
				'label' => esc_html__( 'Object Fit', 'bantec-toolkit' ),
				'type' => Controls_Manager::SELECT,
				'condition' => [
					'height[size]!' => '',
				],
				'options' => [
					'' => esc_html__( 'Default'),
					'fill' => esc_html__( 'Fill'),
					'cover' => esc_html__( 'Cover'),
					'contain' => esc_html__( 'Contain'),
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tOri_image-img img' => 'object-fit: {{VALUE}};',
				],
                'condition' => [
                    'select_design' => ['design-1'],
                ]
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
                    '{{WRAPPER}} .tOri_image-img img' => 'border-style: {{VALUE}};',
                ],
                'condition' => [
                    'select_design' => ['design-1'],
                ]
            ]
        );
        $this->add_control(
            'border_width',
            [
                'label' => esc_html__('Border Width', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tOri_image-img img' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .tOri_image-img img' => 'border-color: {{VALUE}};',
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
                    '{{WRAPPER}} .tOri_image-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
                'condition' => [
                    'select_design' => ['design-1'],
                ]
            ]
        );
        $this->add_responsive_control(
            'btn_padding',
            [
                'label' => esc_html__('Padding', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tOri_image-img img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'select_design' => ['design-1'],
                ]
            ]
        );
        $this->add_control(
			'animation_roll',
			[
				'label' => esc_html__( 'Roll Animation', 'bantec-toolkit' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tOri_image .shape' => 'animation: rollShape {{SIZE}}s infinite linear;',
				],
                'condition' => [
                    'select_design' => ['design-1'],
                ]
			]
		);
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $image_one = $settings['image_one'];
        $image_two = $settings['image_two'];
        $image_three = $settings['image_three'];
        ?>

        <?php if ('design-1' === $settings['select_design']): ?>
            <div class="tOri_image">
                <div class="tOri_image-img">
					<?php
                        if ($image_one['url']) {
                            if (!empty($image_one['alt'])) {
                                echo '<img src="' . esc_url($image_one['url']) . '" alt="' . esc_attr($image_one['alt']) . '" />';
                            } else {
                                echo '<img src="' . esc_url($image_one['url']) . '" alt="' . esc_attr(__('No alt text', 'bantec-toolkit')) . '" />';
                            }
                        }
                    ?>
                </div>
					<?php
                        if ($image_two['url']) {
                            if (!empty($image_two['alt'])) {
                                echo '<img class="shape" src="' . esc_url($image_two['url']) . '" alt="' . esc_attr($image_two['alt']) . '" />';
                            } else {
                                echo '<img class="shape" src="' . esc_url($image_two['url']) . '" alt="' . esc_attr(__('No alt text', 'bantec-toolkit')) . '" />';
                            }
                        }
                    ?>
            </div>
        <?php endif; ?>

        <?php if ('design-2' === $settings['select_design']): ?>
            <div class="tOri_image-two">
                <div class="tOri_image-two-img">
					<?php
                        if ($image_one['url']) {
                            if (!empty($image_one['alt'])) {
                                echo '<img class="one" src="' . esc_url($image_one['url']) . '" alt="' . esc_attr($image_one['alt']) . '" />';
                            } else {
                                echo '<img class="one" src="' . esc_url($image_one['url']) . '" alt="' . esc_attr(__('No alt text', 'bantec-toolkit')) . '" />';
                            }
                        }
                    ?>
					<?php
                        if ($image_two['url']) {
                            if (!empty($image_two['alt'])) {
                                echo '<img class="shape" src="' . esc_url($image_two['url']) . '" alt="' . esc_attr($image_two['alt']) . '" />';
                            } else {
                                echo '<img class="shape" src="' . esc_url($image_two['url']) . '" alt="' . esc_attr(__('No alt text', 'bantec-toolkit')) . '" />';
                            }
                        }
                    ?>
					<?php
                        if ($image_three['url']) {
                            if (!empty($image_three['alt'])) {
                                echo '<img class="shape-two" src="' . esc_url($image_three['url']) . '" alt="' . esc_attr($image_three['alt']) . '" />';
                            } else {
                                echo '<img class="shape-two" src="' . esc_url($image_three['url']) . '" alt="' . esc_attr(__('No alt text', 'bantec-toolkit')) . '" />';
                            }
                        }
                    ?>
                </div>
            </div>
        <?php endif; ?>

        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Image_Bantec);