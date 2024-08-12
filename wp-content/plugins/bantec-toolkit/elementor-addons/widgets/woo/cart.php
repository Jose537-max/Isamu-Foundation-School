<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class Woo_Mini_Cart extends Widget_Base
{
    public function get_name()
    {
        return 'woo-mini-cart';
    }

    public function get_title()
    {
        return esc_html__('Cart Icon - Bantec', 'bantec-toolkit');
    }

    public function get_icon()
    {
        return 'bantec-icon eicon-youtube';
    }

    public function get_categories()
    {
        return ['bantec-toolkit'];
    }

    public function get_keywords()
    {
        return ['woocommerce', 'cart', 'mini', 'Icon', 'total count',];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Section Content', 'bantec-toolkit'),
            ]
        );

        $this->add_control(
            'cart_icon',
            [
                'label' => esc_html__('Icon', 'bantec-toolkit'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa-sharp fa-solid fa-cart-shopping',
                    'library' => 'brands',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Style', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'cart_icon_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cart_icon i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'cart_icon_size',
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
                'selectors' => [
                    '{{WRAPPER}} .cart_icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'cart_counter',
            [
                'label' => esc_html__('Quantity', 'bantec-toolkit'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'cart_typography',
                'selector' => '{{WRAPPER}} .cart_icon span',
            ]
        );
        $this->add_control(
            'cart_counter_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cart_icon span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'cart_counter_bg',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cart_icon span' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'cart_counter_radius',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Border Radius', 'bantec-toolkit'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .cart_icon span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'cart_counter_width',
            [
                'label' => esc_html__('Max Width', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .cart_icon span' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'cart_counter_v',
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
                    '{{WRAPPER}} .cart_icon span' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'cart_counter_h',
            [
                'label' => esc_html__('X Position', 'bantec-toolkit'),
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
                    '{{WRAPPER}} .cart_icon span' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();

        if (\Elementor\Plugin::$instance->editor->is_edit_mode()) {
            $cart_count_display = 0;
        } else {
            $cart_count = WC()->cart->get_cart_contents_count();
            $cart_count_display = $cart_count;
        }
        ?>
        
        <div class="cart_icon">
            <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="cart-icon">
                <i class="<?php echo esc_attr($settings['cart_icon']['value']); ?>"></i>
                <span class="cart-count">
                    <?php echo esc_html($cart_count_display); ?>
                </span>
            </a>
        </div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Woo_Mini_Cart);