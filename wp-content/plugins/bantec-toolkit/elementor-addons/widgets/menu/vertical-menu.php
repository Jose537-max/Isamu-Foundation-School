<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class Vertical_Menu_bantec extends Widget_Base
{
    public function get_name()
    {
        return 'vertical_menu_bantec';
    }

    public function get_title()
    {
        return esc_html__('Vertical Menu - bantec', 'bantec-toolkit');
    }

    public function get_icon()
    {
        return 'bantec-icon eicon-gallery-grid';
    }

    public function get_categories()
    {
        return ['bantec-builder'];
    }

    public function get_keywords()
    {
        return ['bantec', 'Toolkit', 'Menu', 'Navbar',];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Custom Menu', 'bantec-toolkit'),
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
    }


    protected function render()
    {
        $menuId = wp_rand(10, 1000);
        $settings = $this->get_settings_for_display();

        ?>
        
        <div class="vertical-menu vertical_menu-<?php echo esc_attr($menuId);?>">
            <?php wp_nav_menu(
                array(
                    'menu' => $settings['nav_menu'],
                    'menu_id' => 'mobilemenu',
                    'menu_class' => 'd-block',
                )
            ); ?>
        </div>
        
        <script>
            (function ($) {
                "use strict";
                $(document).ready(function () {
                    ///============= * Responsive Menu Toggle  =============\\\
                    var mobileItems = jQuery('.vertical_menu-<?php echo esc_js($menuId)?>');
                    mobileItems.find('ul li.menu-item-has-children').append('<span class="mobile-arrows far fa-plus"></span>');
                                            
                    jQuery(".vertical_menu-<?php echo esc_js($menuId)?> .mobile-arrows").click(function() {
                        jQuery(this).parent().find('ul:first').slideToggle(300);
                        jQuery(this).parent().find('.mobile-arrows').toggleClass('is-open');
                    });
                });
            })(jQuery);
        </script>
        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Vertical_Menu_bantec);