<?php

namespace Elementor;

use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if (!defined('ABSPATH')) exit;

class Slider_BannerOne extends Widget_Base
{
    public function get_name()
    {
        return 'bantec-banner-one';
    }

    public function get_title()
    {
        return esc_html__('Banner One - Bantec', 'bantec-toolkit');
    }

    public function get_icon()
    {
        return 'bantec-icon eicon-slides';
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
            'slider_title',
            [
                'label'   => esc_html__('Title', 'bantec-toolkit'),
                'type'    => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $banner_slider->add_control(
            'slider_content',
            [
                'label'   => esc_html__('Content', 'bantec-toolkit'),
                'type'    => Controls_Manager::TEXTAREA,
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
                        'slider_title'     => esc_html__('Pioneering Progress One Algorithm', 'bantec-toolkit'),
                        'slider_content'        => esc_html__('Lorem ipsum dolor sit amet, conse ct etur adipiscing elit. Sed sit amet rcus nunc. Duis egestas ac ante ', 'bantec-toolkit'),                    
                        'slider_btn_text'     => esc_html__('Read More', 'bantec-toolkit'),                        
                        'slider_btn_url'      => esc_attr__('http://google.com', 'bantec-toolkit'),                        
                    ],
                    [
                        'slider_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'slider_title'     => esc_html__('Pioneering Progress One Algorithm', 'bantec-toolkit'),
                        'slider_content'        => esc_html__('Lorem ipsum dolor sit amet, conse ct etur adipiscing elit. Sed sit amet rcus nunc. Duis egestas ac ante ', 'bantec-toolkit'),                        
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
            'banner_shape_img',
            [
                'label' => esc_html__('Banner Bg', 'bantec-toolkit'),
                'type'  => Controls_Manager::MEDIA,
                'label_block' => true,               
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
        $this->add_control(
            'banner_shape_three',
            [
                'label' => esc_html__('Shape Three', 'bantec-toolkit'),
                'type'  => Controls_Manager::MEDIA,
                'label_block' => true,               
            ]
        );
        $this->add_control(
            'banner_shape_content',
            [
                'label' => esc_html__('Content', 'bantec-toolkit'),
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
                    '{{WRAPPER}} .tOri_banner-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->add_control(
			'banner_subtitle',
			[
				'label' => esc_html__( 'Title', 'bantec-toolkit' ),
				'type' => Controls_Manager::HEADING,
                
			]
		);
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'selector' => '{{WRAPPER}} .tOri_banner-content h2',
                
            ]
        );
        $this->add_control(
            'banner_subtitle_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_banner-content h2' => 'color: {{VALUE}}',
                ],                
            ]
        );
		$this->add_control(
			'banner_title',
			[
				'label' => esc_html__( 'Content', 'bantec-toolkit' ),
				'type' => Controls_Manager::HEADING,
                
			]
		);
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .tOri_banner-content p',
                
            ]
        );
        $this->add_control(
            'banner_title_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_banner-content p' => 'color: {{VALUE}}',
                ],                
            ]
        );
        $this->add_responsive_control(
            'banner_title_margin',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Margin', 'bantec-toolkit'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tOri_banner-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
    }

    protected function render()
    {
        $bantec_htmls = array(
            'a'      => array(
                'href'   => array(),
                'target' => array()
            ),
            'strong' => array(),
            'small'  => array(),
            'span'   => array(
                'class' => array()
            ),
            'p'      => array(),
        );
        $settings = $this->get_settings_for_display();
        $banner_shape_img = $settings['banner_shape_img'];
        $banner_shape_one = $settings['banner_shape_one'];
        $banner_shape_two = $settings['banner_shape_two'];
        $banner_shape_three = $settings['banner_shape_three'];
        $banner_shape_content = $settings['banner_shape_content'];
    ?>
        <!-- Start Banner Style 04 -->

    <div class="tOri_banner">
        <div class="swiper slide_three">
            <div class="swiper-wrapper">
                <?php foreach ($settings['banner_slides'] as $slide) : ?>
                <div class="tOri_banner-area swiper-slide">
                <div class="tOri_banner-area-image" style="background-image: url(<?php echo esc_url($slide['slider_image']['url']) ?>)"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-5 col-lg-6">
                                <div class="tOri_banner-content">
                                    <?php if (!empty($slide['slider_title'])): ?>
                                        <h2 data-animation="fadeInUp" data-delay=".4s"><?php echo wp_kses($slide['slider_title'], $bantec_htmls); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($slide['slider_content'])): ?>
                                        <p data-animation="fadeInUp" data-delay=".8s"><?php echo esc_html($slide['slider_content']); ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($slide['slider_btn_url'])): ?>
                                    <div data-animation="fadeInUp" data-delay="1.3s">
                                        <a class="tOri-button" href="<?php echo esc_url($slide['slider_btn_url']); ?>"><?php echo esc_html($slide['slider_btn_text']); ?><i class="fa-regular fa-arrow-right-long"></i></a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-6">
                                <div class="image_shape">
                                    <div class="image_shape-one" data-animation="fadeIn" data-delay=".9s">
                                        <?php
                                        if ($banner_shape_one['url']) {
                                            if (!empty($banner_shape_one['alt'])) {
                                                echo '<img src="' . esc_url($banner_shape_one['url']) . '" alt="' . esc_attr($banner_shape_one['alt']) . '" />';
                                            } else {
                                                echo '<img src="' . esc_url($banner_shape_one['url']) . '" alt="' . esc_attr(__('No alt text', 'bantec-toolkit')) . '" />';
                                            }
                                        } ?>
                                    </div>
                                    <div class="image_shape-two" data-animation="fadeInDown" data-delay=".6s">
                                        <?php
                                        if ($banner_shape_two['url']) {
                                            if (!empty($banner_shape_two['alt'])) {
                                                echo '<img src="' . esc_url($banner_shape_two['url']) . '" alt="' . esc_attr($banner_shape_two['alt']) . '" />';
                                            } else {
                                                echo '<img src="' . esc_url($banner_shape_two['url']) . '" alt="' . esc_attr(__('No alt text', 'bantec-toolkit')) . '" />';
                                            }
                                        } ?>
                                    </div>
                                    <div class="image_shape-three" data-animation="fadeInUp" data-delay=".7s">
                                        <?php
                                        if ($banner_shape_three['url']) {
                                            if (!empty($banner_shape_three['alt'])) {
                                                echo '<img src="' . esc_url($banner_shape_three['url']) . '" alt="' . esc_attr($banner_shape_three['alt']) . '" />';
                                            } else {
                                                echo '<img src="' . esc_url($banner_shape_three['url']) . '" alt="' . esc_attr(__('No alt text', 'bantec-toolkit')) . '" />';
                                            }
                                        } ?>
                                    </div>
                                    <div class="image_shape-four">
                                        <?php
                                        if ($banner_shape_content['url']) {
                                            if (!empty($banner_shape_content['alt'])) {
                                                echo '<img src="' . esc_url($banner_shape_content['url']) . '" alt="' . esc_attr($banner_shape_content['alt']) . '" />';
                                            } else {
                                                echo '<img src="' . esc_url($banner_shape_content['url']) . '" alt="' . esc_attr(__('No alt text', 'bantec-toolkit')) . '" />';
                                            }
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="tOri_banner-thumb">
            <div class="swiper slide_thumb">
                <div class="swiper-wrapper thumb__area">
                    <?php $i = 0;
                        foreach ($settings['banner_slides'] as $slide) : 
                        $i++;
                    ?>
                        <div class="tOri_banner-thumb-item swiper-slide">
                            <img src="<?php echo esc_url($slide['slider_image']['url']) ?>" alt="banner">
                            <h6><?php echo sprintf('%02d', $i); ?></h6>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
            <!-- End Banner Style 04 -->
        <style>
            <?php if (!empty($banner_shape_img['url'])): ?>
                .tOri_banner-area-image::before {
                    background-image: url("<?php echo esc_url($banner_shape_img['url']);?>");
                }
            <?php endif; ?>
        </style>
    <?php
    }
}

Plugin::instance()->widgets_manager->register(new Slider_BannerOne);