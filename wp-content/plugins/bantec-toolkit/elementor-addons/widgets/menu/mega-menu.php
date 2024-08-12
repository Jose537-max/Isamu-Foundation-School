<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class Bantec_Mega_Menu extends Widget_Base
{
    public function get_name()
    {
        return 'bantec_mega_menu';
    }

    public function get_title()
    {
        return esc_html__('Mega Menu - Bantec', 'bantec-toolkit');
    }

    public function get_icon()
    {
        return 'bantec-icon eicon-nav-menu';
    }

    public function get_categories()
    {
        return ['bantec-toolkit'];
    }

    public function get_keywords()
    {
        return ['bantec-toolkit', 'Menu', 'Mega', 'Header', 'nav'];
    }

    protected function register_controls()
    {


        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Desktop Mega Menu', 'bantec-toolkit'),
            ]
        );

        $this->add_control(
            'nav_menu',
            [
                'label' => __('Select a Menu', 'bantec-toolkit'),
                'type' => Controls_Manager::SELECT2,
                'options' => bantec_nav_menu(),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'mobile_content',
            [
                'label' => esc_html__('Mobile Menu', 'bantec-toolkit'),
            ]
        );

        $this->add_control(
            'mobile_logo',
            [
                'label' => esc_html__('Mobile Logo', 'bantec-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        
        $this->add_control(
            'logo_url',
            [
                'label' => esc_html__('URL', 'bantec-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_attr__('http://google.com', 'bantec-toolkit'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Deaktop Style', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'desktop_menu_align',
            [
                'label' => esc_html__('Menu Alignment', 'bantec-toolkit'),
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
                    '{{WRAPPER}} .header_mega-menu .menu' => 'justify-content: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'menu_typography',
                'selector' => '{{WRAPPER}} .header_mega-menu ul li.menu-item > a',
            ]
        );

        $this->add_control(
            'menu_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header_mega-menu ul li.menu-item > a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .header_mega-menu ul li.menu-item-has-children > a::before' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .header_mega-menu ul li.mega-menu-enabled > a::before' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'menu_hover_color',
            [
                'label' => esc_html__('Hover Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header_mega-menu ul li.menu-item:hover > a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .header_mega-menu ul li.menu-item-has-children:hover > a::before' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .header_mega-menu ul li.mega-menu-enabled:hover > a::before' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'mega_top_menu_padding',
            [
                'label' => esc_html__('Padding', 'bantec-toolkit'),
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
                    '{{WRAPPER}} .header_mega-menu ul li.menu-item > a' => 'padding-top: {{SIZE}}{{UNIT}};padding-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'menu_height',
            [
                'label' => esc_html__('Menu Gap', 'bantec-toolkit'),
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
                    '{{WRAPPER}} .header_mega-menu .menu > li' => 'margin-right: {{SIZE}}{{UNIT}};margin-left: {{SIZE}}{{UNIT}};',                
                ],
            ]
        );

        $this->add_control(
            'mega_menu_style',
            [
                'label' => esc_html__('Mega Menu', 'bantec-toolkit'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'mega_menu_background',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header_mega-menu ul li .mega-menu-wrap' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'mega_menu_padding',
            [
                'label' => esc_html__('Padding', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .header_mega-menu ul li .mega-menu-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'sub_menu_style',
            [
                'label' => esc_html__('Sub Menu', 'bantec-toolkit'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'submenu_border_type',
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
                    '{{WRAPPER}} .header_mega-menu ul li .sub-menu' => 'border-style: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'submenu_border_width',
            [
                'label' => esc_html__('Border Width', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .header_mega-menu ul li .sub-menu' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'submenu_border_type!' => '',
                ],
            ]
        );
        $this->add_control(
            'submenu_border_color',
            [
                'label' => esc_html__('Border Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header_mega-menu ul li .sub-menu' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'submenu_border_type!' => '',
                ],
            ]
        );
        $this->add_control(
            'sub_menu_background',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header_mega-menu ul li .sub-menu' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'sub_menu_box_shadow',
				'selector' => '{{WRAPPER}} .header_mega-menu ul li .sub-menu',
			]
		);
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_menu_typography',
                'selector' => '{{WRAPPER}} .header_mega-menu ul li .sub-menu li > a',
            ] 
        );
        $this->add_control(
            'sub_menu_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header_mega-menu ul li .sub-menu li a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .header_mega-menu ul li .sub-menu li.menu-item-has-children > a::before' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'sub_menu_hover_color',
            [
                'label' => esc_html__('Hover Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header_mega-menu ul li .sub-menu li:hover > a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .header_mega-menu ul li .sub-menu li.menu-item-has-children:hover > a::before' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .header_mega-menu ul li .sub-menu li > a::after' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'sub_menu_border_color',
            [
                'label' => esc_html__('Border Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header_mega-menu ul li .sub-menu li > a' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'submenu_height',
            [
                'label' => esc_html__('Sub Menu Top Space', 'bantec-toolkit'),
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
                    '{{WRAPPER}} .header_mega-menu ul li > .sub-menu' => 'top: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .header_mega-menu ul li .mega-menu-wrap' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );                
        $this->add_control(
            'submenu_dropdown',
            [
                'label' => esc_html__('Dropdown Menu Top Space', 'bantec-toolkit'),
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
                    '{{WRAPPER}} .header_mega-menu ul li > .sub-menu li > .sub-menu' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'menu_arrow_icon_space',
            [
                'label' => esc_html__('Menu Arrow Space', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .header_mega-menu ul li.menu-item-has-children > a::before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'nav_style_section',
            [
                'label' => esc_html__('Mobile Nav Style', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'mobile_menu_align',
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
                'default' => 'right',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .nav_menu_bar' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'nav_icon_color',
            [
                'label' => esc_html__('Icon', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header_nav-menu-responsive .nav_menu_bar > i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'mobile_nav_popup',
            [
                'label' => esc_html__('Nav Popup', 'bantec-toolkit'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'mobile_popup_nav_bg_color',
            [
                'label' => esc_html__('Popup BG', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header_nav-menu-responsive .nav_menu_bar-popup' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'mobile_popup_nav_icon_color',
            [
                'label' => esc_html__('Close Icon', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header_nav-menu-responsive .nav_menu_bar-popup-close i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'mobile_popup_nav_icon_bg',
            [
                'label' => esc_html__('Close Icon BG', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header_nav-menu-responsive .nav_menu_bar-popup-close i' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'mobile_popup_nav_color',
            [
                'label' => esc_html__('Menu Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header_nav-menu-responsive .nav_menu_bar-popup ul li .menu-link' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'mobile_popup_nav_color_hover',
            [
                'label' => esc_html__('Menu Hover', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header_nav-menu-responsive .nav_menu_bar-popup ul li:hover > .menu-link' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'mobile_popup_nav_border_color',
            [
                'label' => esc_html__('Menu Border', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header_nav-menu-responsive .nav_menu_bar-popup ul li .menu-link' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'mobile_popup_nav_color_arrow',
            [
                'label' => esc_html__('Dropdown Arrow', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vertical-menu ul li.menu-item-has-children > span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .vertical-menu ul li.mega-menu-enabled > span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'mobile_popup_nav_color_arrow_bg',
            [
                'label' => esc_html__('Arrow BG', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vertical-menu ul li.menu-item-has-children > span' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .vertical-menu ul li.mega-menu-enabled > span' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'popup_padding',
            [
                'label' => esc_html__('Popup Padding', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .header_nav-menu-responsive .nav_menu_bar-popup' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    
    }


    protected function render()
    {   $menuId = wp_rand(10, 1000);
        $settings = $this->get_settings_for_display();

        ?>
            <div class="header_mega mega-menu-main">
                <div class="header_mega-menu">
                    <?php wp_nav_menu(
                        array(
                            'menu' => $settings['nav_menu'],
                            'walker' => new \Bantec_Custom_Nav_Walker(),
                        )
                    ); ?>
                </div>                   
                <div class="header_nav-menu-responsive nav_menu_popup-<?php echo esc_attr($menuId);?>">
                    <div class="nav_menu_bar">
                        <i class="fal fa-bars"></i>
                    </div>
                    <div class="nav_menu_bar-popup">
                        <div class="nav_menu_bar-popup-top">
                            <?php if($settings['mobile_logo']['url']) : ?>
                            <div class="nav_menu_bar-popup-top-logo">
                                <a href="<?php echo esc_url($settings['logo_url']); ?>"><img src="<?php echo esc_url($settings['mobile_logo']['url']) ?>" alt="Mobile Logo"></a>
                            </div>
                            <?php endif;?>
                            <div class="nav_menu_bar-popup-close"><i class="fal fa-times"></i></div>
                        </div>
                        <div class="vertical-menu vertical_menu-<?php echo esc_attr($menuId);?>">
                            <?php wp_nav_menu(
                                array(
                                    'menu' => $settings['nav_menu'],
                                    'menu_id' => 'mobilemenu',
                                    'menu_class' => 'd-block',
                                    'walker' => new \Bantec_Custom_Nav_Walker(),
                                )
                            ); ?>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                (function ($) {
                    "use strict";    
                    $(document).ready(function () {
                        ///============= Nav Menu Sidebar Popup  =============\\\
                        $(".nav_menu_popup-<?php echo esc_attr($menuId);?> .nav_menu_bar i").on("click", function () {
                            $(".nav_menu_popup-<?php echo esc_attr($menuId);?> .nav_menu_bar-popup").addClass("show");
                        });
                        $(".nav_menu_popup-<?php echo esc_attr($menuId);?> .nav_menu_bar-popup-close").on("click", function () {
                            $(".nav_menu_popup-<?php echo esc_attr($menuId);?> .nav_menu_bar-popup").removeClass("show");
                        });	
                        ///============= * Responsive Menu Toggle  =============\\\
                        var mobileItems = jQuery('.vertical_menu-<?php echo esc_js($menuId)?>');
                        mobileItems.find('ul li.menu-item-has-children, ul li.mega-menu-enabled').append('<span class="mobile-arrows far fa-plus"></span>');
                                                
                        jQuery(".vertical_menu-<?php echo esc_js($menuId)?> .mobile-arrows").click(function() {
                            jQuery(this).parent().find('ul.sub-menu:first, .mega-menu-wrap').slideToggle(300);
                            jQuery(this).parent().find('> .mobile-arrows').toggleClass('is-open');
                        });
                        // ///============= * MegaMenu Width  =============\\\
                        function setMegaMenuStyles() {
                            var windowWidth = $(window).width();                            
                            if (windowWidth >= 1000) {
                                $('.header_mega-menu .mega-menu-wrap').each(function() {
                                    var leftPosition = Math.floor($(this).position().left - $(this).offset().left);
                                    $(this).css({
                                        'width': windowWidth + 'px',
                                        'left': leftPosition + 'px'
                                    }); 
                                });
                            } else {
                                $('.header_mega-menu .mega-menu-wrap').each(function() {
                                    $(this).css({
                                        'width': '',
                                        'left': ''
                                    });
                                });
                            }
                        }
                        $(document).ready(function() {
                            setMegaMenuStyles();
                            $(window).resize(function() {
                                setMegaMenuStyles();
                            });
                        });
                    });
                })(jQuery);
            </script>
        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Bantec_Mega_Menu);