<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class Text_Slide_bantec extends Widget_Base
{
    public function get_name()
    {
        return 'text-slide-bantec';
    }

    public function get_title()
    {
        return esc_html__('Text Slide - Bantec', 'bantec-toolkit');
    }

    public function get_icon()
    {
        return 'bantec-icon eicon-gallery-grid';
    }

    public function get_categories()
    {
        return ['bantec-toolkit'];
    }

    public function get_keywords()
    {
        return ['bantec', 'slide', 'text', 'content', 'slider'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__('Style & Options', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'slide_speed',
            [
                'label' => esc_html__('Animation Speed', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['s'],
                'range' => [
                    's' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 's',
                    'size' => 5,
                ],
                'selectors' => [
                    '{{WRAPPER}} .scroll' => 'animation: scroll {{SIZE}}{{UNIT}} linear infinite;',
                    '{{WRAPPER}} .text_scroll' => 'animation: scroll {{SIZE}}{{UNIT}} linear infinite;',
                ],
            ]
        );
        $this->add_control(
            'select_slide',
            [
                'label' => esc_html__('Animation Style', 'bantec-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'scroll' => esc_html__('Left to Right', 'bantec-toolkit'),
                    'text_scroll' => esc_html__('Right to Left', 'bantec-toolkit'),
                ],
                'default' => 'scroll',
                'label_block' => true,
            ]
        );
        $this->add_control(
            'text_stroke',
            [
                'label' => esc_html__('Text Stroke', 'bantec-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'bantec-toolkit'),
                'label_off' => esc_html__('No', 'bantec-toolkit'),
                'return_value' => 'text-border',
                'default' => 'no-text-border',
                'condition' => [
                    'type_of_slide' => ['text'],
                ]
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Slide Content', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'type_of_slide',
            [
                'label' => esc_html__('Type Of Content', 'bantec-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'text' => esc_html__('Text', 'bantec-toolkit'),
                    'image' => esc_html__('Image', 'bantec-toolkit'),
                ],
                'default' => 'text',
                'label_block' => true,
            ]
        );
        $image_slide = new Repeater();
        $image_slide->add_control(
            'slide_image',
            [
                'label' => esc_html__('Choose Image', 'bantec-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $image_slide->add_control(
            'image_slide_url',
            [
                'label' => esc_html__('Content URL', 'bantec-toolkit'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'image_slides',
            [
                'label' => esc_html__('Content Lists', 'bantec-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $image_slide->get_controls(),
                'default' => [
                    [
                        'image_slide_url' => esc_attr__('http://google.com', 'bantec-toolkit'),
                        'slide_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],

                    [
                        'image_slide_url' => esc_attr__('http://google.com', 'bantec-toolkit'),
                        'slide_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],

                    ],
                ],

                'title_field' => 'Image Slide',
                'condition' => [
                    'type_of_slide' => ['image'],
                ]
            ]
        );

        $text_slide = new Repeater();
        $text_slide->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'bantec-toolkit'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa fa-star',
                    'library' => 'brands',
                ],
            ]
        );
        $text_slide->add_control(
            'text_slide_content',
            [
                'label' => esc_html__('Content', 'bantec-toolkit'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $text_slide->add_control(
            'text_slide_url',
            [
                'label' => esc_html__('Content URL', 'bantec-toolkit'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'text_slides',
            [
                'label' => esc_html__('Content Lists', 'bantec-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $text_slide->get_controls(),
                'default' => [
                    [

                        'text_slide_content' => esc_html__('Add Your Heading Text Here', 'bantec-toolkit'),
                        'text_slide_url' => esc_attr__('http://google.com', 'bantec-toolkit'),
                    ],

                    [

                        'text_slide_content' => esc_html__('Add Your Heading Text Here', 'bantec-toolkit'),
                        'text_slide_url' => esc_attr__('http://google.com', 'bantec-toolkit'),

                    ],
                ],

                'title_field' => '{{{ text_slide_content }}}',
                'condition' => [
                    'type_of_slide' => ['text'],
                ]
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'item_style_section',
            [
                'label' => esc_html__('Item Style', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'type_of_slide' => ['image'],
                ]
            ]
        );
        $this->add_responsive_control(
			'image_width',
			[
				'label' => esc_html__( 'Width', 'bantec-toolkit' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .text__slider ul li > a img' => 'width: {{SIZE}}{{UNIT}};',
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
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .text__slider ul li > a img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'object-fit',
			[
				'label' => esc_html__( 'Object Fit', 'bantec-toolkit' ),
				'type' => Controls_Manager::SELECT,
				'condition' => [
					'image_height[size]!' => '',
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
			]
		);
        $this->add_responsive_control(
            'item_space',
            [
                'label' => esc_html__('Gap', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 150,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 40,
                ],
                'selectors' => [
                    '{{WRAPPER}} .text__slider ul li' => 'margin-left: {{SIZE}}{{UNIT}};margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'heading_style_section',
            [
                'label' => esc_html__('Heading Style', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'type_of_slide' => ['text'],
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'heading_typography',
                'selector' => '{{WRAPPER}} .text__slider ul li h2',
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .text__slider ul li h2 a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'heading_hover_color',
            [
                'label' => esc_html__('Hover Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .text__slider ul li h2 a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'icon_style_section',
            [
                'label' => esc_html__('Icon Style', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'type_of_slide' => ['text'],
                ]
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .text__slider ul li i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .no-icon-border i' => '-webkit-text-fill-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'icon_hover_color',
            [
                'label' => esc_html__('Hover Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .text__slider ul li a:hover i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'icon_opacity',
            [
                'label' => esc_html__('Opacity', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1,
                        'step' => 0.01,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0.5,
                ],
                'selectors' => [
                    '{{WRAPPER}} .text__slider ul li i' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_space',
            [
                'label' => esc_html__('Space', 'bantec-toolkit'),
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
                    '{{WRAPPER}} .text__slider ul li i' => 'margin-left: {{SIZE}}{{UNIT}};margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_size',
            [
                'label' => esc_html__('Size', 'bantec-toolkit'),
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
                    'size' => 28,
                ],
                'selectors' => [
                    '{{WRAPPER}} .text__slider ul li i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'iconStroke',
            [
                'label' => esc_html__('Icon Stroke', 'bantec-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('No', 'bantec-toolkit'),
                'label_off' => esc_html__('Yes', 'bantec-toolkit'),
                'default' => 'icon-border',
                'return_value' => 'no-icon-border',
                'condition' => [
                    'type_of_slide' => ['text'],
                ]
            ]
        );

        $this->end_controls_section();

    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $counter = 0;

        ?>
        <?php if ('text' === $settings['type_of_slide'] && !empty($settings['text_slides'])): ?>
            <!-- Text Slider Area Start -->
            <div class="text__slider">
                <div class="text-slide">
                    <div class="sliders <?php echo esc_attr($settings['select_slide']); ?>">
                        <ul>
                        <?php
foreach ($settings['text_slides'] as $item):
    $counter++;
?>
    <li>
        <h2>
            <a class="<?php echo ($counter % 2 == 0) ? $settings['text_stroke'] : 'no-text-border'; ?> <?php echo ($counter % 2 == 0) ? $settings['iconStroke'] : 'no-icon-border'; ?>" href="<?php echo esc_url($item['text_slide_url']); ?>">
                <?php if (!empty($item['icon']['value'])):?>
                    <?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true']); ?>
                <?php endif;?>
                <?php echo esc_html($item['text_slide_content']); ?>
            </a>
        </h2>
    </li>
<?php endforeach; ?>

                        </ul>
                    </div>
                    <div class="sliders <?php echo esc_attr($settings['select_slide']); ?>">
                        <ul>
                        <?php
foreach ($settings['text_slides'] as $item):
    $counter++;
?>
    <li>
        <h2>
            <a class="<?php echo ($counter % 2 == 0) ? $settings['text_stroke'] : 'no-text-border'; ?> <?php echo ($counter % 2 == 0) ? $settings['iconStroke'] : 'no-icon-border'; ?>" href="<?php echo esc_url($item['text_slide_url']); ?>">
                <?php if (!empty($item['icon']['value'])):?>
                    <?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true']); ?>
                <?php endif;?>
                <?php echo esc_html($item['text_slide_content']); ?>
            </a>
        </h2>
    </li>
<?php endforeach; ?>

                        </ul>
                    </div>
                </div>
            </div>
            <!-- Text Slider Area Start -->
        <?php endif; ?>

        <?php if ('image' === $settings['type_of_slide'] && !empty($settings['image_slides'])): ?>
            <div class="text__slider">
                <div class="text-slide">
                    <div class="sliders <?php echo esc_attr($settings['select_slide']); ?>">
                        <ul>
                            <?php
                            foreach ($settings['image_slides'] as $item):
                                $counter++;
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($item['image_slide_url']); ?>">
                                        <img src="<?php echo esc_url($item['slide_image']['url']) ?>" alt="image">
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="sliders <?php echo esc_attr($settings['select_slide']); ?>">
                        <ul>
                            <?php
                            foreach ($settings['image_slides'] as $item):
                                $counter++;
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($item['image_slide_url']); ?>">
                                        <img src="<?php echo esc_url($item['slide_image']['url']) ?>" alt="image">
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Text_Slide_bantec);