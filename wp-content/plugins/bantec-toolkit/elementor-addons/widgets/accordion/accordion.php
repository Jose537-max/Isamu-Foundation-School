<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class Bantec_Accordion extends Widget_Base
{
    public function get_name()
    {
        return 'bantec-accordion';
    }

    public function get_title()
    {
        return esc_html__('Accordion - Bantec', 'bantec-toolkit');
    }

    public function get_icon()
    {
        return 'bantec-icon eicon-accordion';
    }

    public function get_categories()
    {
        return ['bantec-toolkit'];
    }

    public function get_keywords()
    {
        return ['bantec', 'Toolkit', 'toggle', 'accordion', 'faq', 'collapse'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_general',
            [
                'label' => esc_html__('Content', 'bantec-toolkit'),
            ]
        );

        $accordion_item = new Repeater();

        $accordion_item->add_control(
            'accordion_title',
            [
                'label' => esc_html__('Title', 'bantec-toolkit'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $accordion_item->add_control(
            'accordion_description',
            [
                'label' => esc_html__('Content', 'bantec-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'accordion_items',
            [
                'label' => esc_html__('Accordion Items', 'bantec-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $accordion_item->get_controls(),
                'default' => [
                    [
                        'accordion_title' => esc_html__('Accordion #1', 'bantec-toolkit'),
                        'accordion_description' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec.', 'bantec-toolkit'),
                    ],
                    [
                        'accordion_title' => esc_html__('Accordion #2', 'bantec-toolkit'),
                        'accordion_description' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec.', 'bantec-toolkit'),
                    ],
                ],
                'title_field' => '{{{ accordion_title }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'accordion_section_item_style',
            [
                'label' => esc_html__('Item', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}} .accordion_area-item',
			]
		);

        $this->add_control(
            'item_border_type',
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
                    '{{WRAPPER}} .accordion_area-item' => 'border-style: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_border_width',
            [
                'label' => esc_html__('Border Width', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'border_type!' => '',
                ],
            ]
        );
        $this->add_control(
            'item_border_color',
            [
                'label' => esc_html__('Border Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'border_type!' => '',
                ],
            ]
        );    
        $this->add_control(
            'accordion_content_background',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'accordion_item_gap',
            [
                'label' => esc_html__('Gap', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'accordion_item_radius',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Border Radius', 'bantec-toolkit'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );        
        $this->end_controls_section();

        $this->start_controls_section(
            'accordion_section_title_style',
            [
                'label' => esc_html__('Title', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'accordion_title_typography',
                'selector' => '{{WRAPPER}} .accordion_area-item h6',
            ]
        );
        $this->add_control(
            'accordion_title_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item h6' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .accordion_area-item h6' => 'border-style: {{VALUE}};',
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
                    '{{WRAPPER}} .accordion_area-item h6' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .accordion_area-item h6' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'border_type!' => '',
                ],
            ]
        );        
        $this->add_responsive_control(
            'accordion_item_padding',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Padding', 'bantec-toolkit'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .accordion_area-item .icon.left::after' => 'left: {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .accordion_area-item .icon.right::after' => 'right: {{RIGHT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'accordion_section_content_style',
            [
                'label' => esc_html__('Content', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'accordion_content_typography',
                'selector' => '{{WRAPPER}} .accordion_area-item-body p',
            ]
        );
        $this->add_control(
            'accordion_content_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item-body p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'content_border_type',
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
                    '{{WRAPPER}} .accordion_area-item-body p' => 'border-style: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'content_border_width',
            [
                'label' => esc_html__('Border Width', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item-body p' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'content_border_type!' => '',
                ],
            ]
        );
        $this->add_control(
            'content_border_color',
            [
                'label' => esc_html__('Border Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item-body p' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'content_border_type!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'accordion_content_padding',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Padding', 'bantec-toolkit'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item-body p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'accordion_item_icon',
            [
                'label' => esc_html__('Icon', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
			'icon_align',
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
        $this->start_controls_tabs(
			'style_tabs'
		);
		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'bantec-toolkit' ),
			]
		);
        $this->add_control(
            'accordion_icon_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item .icon::after' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'accordion_icon_background',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item .icon::after' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'accordion_icon_size',
            [
                'label' => esc_html__('Font Size', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 16,
                ],
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item .icon::after' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'accordion_icon_width',
            [
                'label' => esc_html__('Max Width', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 22,
                ],
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item .icon::after' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		$this->add_responsive_control(
			'icon_space',
			[
				'label' => esc_html__( 'Spacing', 'bantec-toolkit' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'max' => 200,
					],
				],
                'default' => [
                    'unit' => 'px',
                    'size' => 55,
                ],
				'selectors' => [
					'{{WRAPPER}} .accordion_area-item h6' => 'padding-left: {{SIZE}}{{UNIT}};',
				],
                'condition' => [
                    'icon_align!' => 'right',
                ],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__( 'Active', 'bantec-toolkit' ),
			]
		);
        $this->add_control(
            'accordion_active_icon_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item .icon:not(.collapsed)::after' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'accordion_active_icon_background',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item .icon:not(.collapsed)::after' => 'background: {{VALUE}}',
                ],
            ]
        );
		$this->end_controls_tab();
		$this->end_controls_tabs();
        $this->end_controls_section();

    }

    protected function render()

    {
        $faqId = wp_rand(10, 1000);
        $settings = $this->get_settings_for_display();
        ?>

            <div id="accordionExamplePage<?php echo esc_attr($faqId); ?>">
                <?php foreach ($settings['accordion_items'] as $keys => $item): ?>
                    <div class="accordion_area-item">
                        <h6 class="icon <?php echo esc_attr( $settings['icon_align'] ); ?> <?php echo $keys === 0 ? '' : 'collapsed'; ?>" data-bs-toggle="collapse"
                            data-bs-target="#collapse<?php echo $keys; ?><?php echo esc_attr($faqId); ?>"><?php echo esc_html($item['accordion_title']); ?></h6>
                        <div id="collapse<?php echo $keys; ?><?php echo esc_attr($faqId); ?>"
                            class="accordion_area-item-body collapse <?php echo $keys === 0 ? 'show' : ''; ?> "
                            data-bs-parent="#accordionExamplePage<?php echo esc_attr($faqId); ?>">
                            <p>
                                <?php echo esc_html($item['accordion_description']); ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Bantec_Accordion);