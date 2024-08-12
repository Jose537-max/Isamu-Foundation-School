<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class Bantec_Search extends Widget_Base
{
    public function get_name()
    {
        return 'bantec-search';
    }

    public function get_title()
    {
        return esc_html__('Search - Bantec', 'bantec-toolkit');
    }

    public function get_icon()
    {
        return 'bantec-icon eicon-search';
    }

    public function get_categories()
    {
        return ['bantec-toolkit'];
    }

    public function get_keywords()
    {
        return ['bantec', 'Toolkit', 'Search', 'Icon', 'header'];
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
            'btn_text',
            [
                'label' => esc_html__('Placeholder', 'bantec-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Search...', 'bantec-toolkit'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Icon Style', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'menu_align',
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
                    '{{WRAPPER}} .tOri-search' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'search_color',
            [
                'label' => esc_html__('Icon Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri-search-icon i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'search_size',
            [
                'label' => esc_html__('Icon Size', 'bantec-toolkit'),
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
                    '{{WRAPPER}} .tOri-search-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'style_section_popup',
            [
                'label' => esc_html__('Popup Style', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'search_bg',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri-search-box' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'search_bg_form',
            [
                'label' => esc_html__('Form Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri-search-box input' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'search_color_form',
            [
                'label' => esc_html__('Form Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri-search-box input' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'search_color_icon',
            [
                'label' => esc_html__('Form Icon Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri-search-box button' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'search_bg_close',
            [
                'label' => esc_html__('Close Icon Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri-search-box-icon i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
            <div class="tOri-search">
                <div class="search">
                    <span class="tOri-search-icon open"><i class="fal fa-search"></i></span>
                </div>
                <div class="tOri-search-box">
                    <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                        <input type="search" placeholder="<?php echo esc_attr($settings['btn_text']); ?>"
                            value="<?php the_search_query(); ?>" name="s">
                        <button value="Search" type="submit"><i class="fal fa-search"></i>
                        </button>
                    </form>
                    <span class="tOri-search-box-icon"><i class="fal fa-times"></i></span>
                </div>
            </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Bantec_Search);