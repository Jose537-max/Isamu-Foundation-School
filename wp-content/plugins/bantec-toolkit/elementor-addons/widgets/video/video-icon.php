<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class Video_Icon_Bantec extends Widget_Base
{
    public function get_name()
    {
        return 'video_icon_bantec';
    }

    public function get_title()
    {
        return esc_html__('Video Icon - Bantec', 'bantec-toolkit');
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
        return ['bantec', 'Toolkit', 'Video', 'Icon', 'play',];
    }

    public function get_style_depends() {
		return [ 'bantec-magnific-style' ];
	}

    public function get_script_depends() {
		return [ 'bantec-magnific-script' ];
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
            'icon',
            [
                'label' => esc_html__('Icon', 'bantec-toolkit'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa fa-play',
                    'library' => 'brands',
                ],
            ]
        );
        $this->add_control(
            'video_url',
            [
                'label' => esc_html__('Video URL', 'bantec-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_attr__('https://www.youtube.com/watch?v=SZEflIVnhH8', 'bantec-toolkit'),
                'label_block' => true,
            ]
        );
        $this->add_responsive_control(
            'align',
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
                'selectors' => [
                    '{{WRAPPER}} .video-icon-aligment' => 'text-align: {{VALUE}};',
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
            'color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bantec-video-icon a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'background_color',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bantec-video-icon a' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'border_color',
            [
                'label' => esc_html__('Border', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bantec-video-icon::after' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .bantec-video-icon::before' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_size',
            [
                'label' => esc_html__('Font Size', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bantec-video-icon a' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'box_width',
            [
                'label' => esc_html__('Max Width', 'bantec-toolkit'),
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
                    '{{WRAPPER}} .video a' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();

        ?>
        <div class="video-icon-aligment">
            <div class="bantec-video-icon video video-pulse">
                <a class="video-popup" href="<?php echo esc_url($settings['video_url']); ?>"><i
                        class="<?php echo esc_attr($settings['icon']['value']); ?>"></i></a>
			</div>
        </div>



        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Video_Icon_Bantec);