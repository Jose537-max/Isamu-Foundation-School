<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class Menu_Demo_Bantec extends Widget_Base
{
    public function get_name()
    {
        return 'menu-demo-bantec';
    }

    public function get_title()
    {
        return esc_html__('Menu Demo - Bantec', 'bantec-toolkit');
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
        return ['bantec', 'Toolkit', 'Images', 'menu', 'mega', 'header'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'menu_demo_design',
            [
                'label' => esc_html__('Menu Demo', 'bantec-toolkit'),
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
                    '{{WRAPPER}} .demo_item-thumb-content' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'demo_title',
            [
                'label'   => esc_html__('Title', 'bantec-toolkit'),
                'type'    => Controls_Manager::TEXT,
                'default' => esc_html__('Demo Name', 'bantec-toolkit'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'demo_url',
            [
                'label' => esc_html__('URL', 'bantec-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_attr__('#', 'bantec-toolkit'),
                'label_block' => true,
                'condition' => [
                    'demo_title[text]!' => '',
                ],
            ]
        );
        $this->add_control(
            'menu_demo_image',
            [
                'label' => esc_html__('Image', 'bantec-toolkit'),
                'type'  => Controls_Manager::MEDIA,
                'label_block' => true,               
            ]
        );

        $demo_items = new Repeater();
        $demo_items->add_control(
            'demo_btn_text',
            [
                'label' => esc_html__('Button Text', 'bantec-toolkit'),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $demo_items->add_control(
            'demo_btn_url',
            [
                'label' => esc_html__('Button URL', 'bantec-toolkit'),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'demo_slide',
            [
                'label' => esc_html__('Demo Item', 'bantec-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $demo_items->get_controls(),
                'default' => [
                    [
                        'demo_btn_text'     => esc_html__('Dark', 'bantec-toolkit'),
                        'demo_btn_url'      => esc_attr__('#', 'bantec-toolkit'),
                    ],
                    [
                        'demo_btn_text'     => esc_html__('One Page', 'bantec-toolkit'),
                        'demo_btn_url'      => esc_attr__('#', 'bantec-toolkit'),
                    ],
                ],
                'title_field' => '{{{ demo_btn_text }}}',                
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
            'demo_image_overlay',
            [
                'label' => esc_html__('Overlay', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .demo_item-thumb::after' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
			'overlay_transition',
			[
				'label' => esc_html__( 'Transition Duration', 'bantec-toolkit' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 's', 'ms', 'custom' ],
				'default' => [
					'unit' => 's',
					'size' => 0.4,
				],
				'selectors' => [
					'{{WRAPPER}} .demo_item-thumb::after' => 'transition: {{SIZE}}{{UNIT}}',
				],
			]
		);
        $this->add_responsive_control(
            'demo_image_radius',
            [
                'label' => esc_html__('Border Radius', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .demo_item-thumb' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'demo_button',
            [
                'label' => esc_html__('Button', 'bantec-toolkit'),
                'type' => Controls_Manager::HEADING,
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
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'demo_button_typography',
                'selector' => '{{WRAPPER}} .demo_item-thumb-button ul li a',
            ]
        );
        $this->add_control(
            'demo_button_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .demo_item-thumb-button ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'demo_button_bg',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .demo_item-thumb-button ul li a' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'demo_btn_gap',
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
                'selectors' => [
                    '{{WRAPPER}} .demo_item-thumb-button ul' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'demo_button_padding',
            [
                'label' => esc_html__('Padding', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .demo_item-thumb-button ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'demo_button_radius',
            [
                'label' => esc_html__('Border Radius', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .demo_item-thumb-button ul li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
            'demo_hover_btn_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .demo_item-thumb-button ul li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'demo_hover_btn_bg',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .demo_item-thumb-button ul li a:hover' => 'background: {{VALUE}}',
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
					'{{WRAPPER}} .demo_item-thumb-button ul li a' => 'transition: {{SIZE}}{{UNIT}}',
				],
			]
		);
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'menu_content_style',
            [
                'label' => esc_html__('Content Style', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'demo_typography',
                'selector' => '{{WRAPPER}} .demo_item-thumb-content h6',
            ]
        );
        $this->add_control(
            'demo_content_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .demo_item-thumb-content h6' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'demo_content_bg',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .demo_item-thumb-content::after' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'demo_content_padding',
            [
                'label' => esc_html__('Padding', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .demo_item-thumb-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $menu_demo_image = $settings['menu_demo_image'];

        ?>
        <div class="demo_item">
            <div class="demo_item-thumb">
                <?php
                    if ($menu_demo_image['url']) {
                        if (!empty($menu_demo_image['alt'])) {
                            echo '<img src="' . esc_url($menu_demo_image['url']) . '" alt="' . esc_attr($menu_demo_image['alt']) . '" />';
                        } else {
                            echo '<img src="' . esc_url($menu_demo_image['url']) . '" alt="' . esc_attr(__('No alt text', 'bantec-toolkit')) . '" />';
                        }
                    } 
                ?>
                <div class="demo_item-thumb-button">
                    <ul>
                        <?php foreach ($settings['demo_slide'] as $item): ?>
                            <li><a href="<?php echo esc_url($item['demo_btn_url']); ?>">
                                <?php echo esc_html($item['demo_btn_text']); ?>
                            </a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php if (!empty($settings['demo_title'])): ?>
                <div class="demo_item-thumb-content">
                    <h6><a href="<?php echo esc_url($settings['demo_url']); ?>"><?php echo esc_html($settings['demo_title']); ?></a></h6>
                </div>
            <?php endif; ?>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Menu_Demo_Bantec);