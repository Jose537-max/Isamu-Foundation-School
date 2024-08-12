<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if (!defined('ABSPATH'))
    exit;

class Team_Bantec extends Widget_Base
{
    public function get_name()
    {
        return 'team-bantec';
    }

    public function get_title()
    {
        return esc_html__('Team Member - Bantec', 'bantec-toolkit');
    }

    public function get_icon()
    {
        return 'bantec-icon eicon-person';
    }

    public function get_categories()
    {
        return ['bantec-toolkit'];
    }

    public function get_keywords()
    {
        return ['bantec', 'Toolkit', 'Team', 'Member'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_general',
            [
                'label' => esc_html__('Team Style', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'select_design',
            [
                'label' => esc_html__('Select Team Style', 'bantec-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'design-1' => esc_html__('Team Style 01', 'bantec-toolkit'),
                    'design-2' => esc_html__('Team Style 02', 'bantec-toolkit'),
                ],
                'default' => 'design-1',
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_head',
            [
                'label' => esc_html__('Team Content', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'team_image',
            [
                'label' => esc_html__('Team Image', 'bantec-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'title_one',
            [
                'label' => esc_html__('Name', 'bantec-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Amelia Clover', 'bantec-toolkit'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__('Position', 'bantec-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Senior Advisor', 'bantec-toolkit'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'team_url',
            [
                'label' => esc_html__('Single URL', 'bantec-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_attr__('http://google.com', 'bantec-toolkit'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'show_social',
            [
                'label' => esc_html__('Show Social', 'bantec-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'bantec-toolkit'),
                'label_off' => esc_html__('No', 'bantec-toolkit'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $social_item = new Repeater();
        $social_item->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'bantec-toolkit'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-facebook-f',
                    'library' => 'brands',
                ],
            ]
        );
        $social_item->add_control(
            'link',
            [
                'label' => esc_html__('URL', 'bantec-toolkit'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'social_media',
            [
                'label' => esc_html__('Social Icons', 'bantec-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $social_item->get_controls(),
                'default' => [
                    [

                        'icon' => esc_html__('fab fa-facebook-f', 'bantec-toolkit'),
                        'link' => esc_attr__('https://facebook.com', 'bantec-toolkit'),
                    ],
                ],
                'condition' => [
                    'show_social' => ['yes'],
                ],
                'title_field' => '{{{ icon }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'team_image_style',
            [
                'label' => esc_html__('Image', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'team_image_radius',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Border Radius', 'bantec-toolkit'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tOri_team-item-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'team_content_style',
            [
                'label' => esc_html__('Content', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'style_tabs'
        );
        $this->start_controls_tab(
            'style_normal_tabs',
            [
                'label' => esc_html__('Normal', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'team_title',
            [
                'label' => esc_html__('Name', 'bantec-toolkit'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'team_title_typography',
                'selector' => '{{WRAPPER}} .tOri_team-item-content h5',
            ]
        );
        $this->add_control(
            'team_title_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_team-item-content h5' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'team_subtitle',
            [
                'label' => esc_html__('Position', 'bantec-toolkit'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'team_subtitle_typography',
                'selector' => '{{WRAPPER}} .tOri_team-item-content span',
            ]
        );
        $this->add_control(
            'team_subtitle_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_team-item-content span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'team_content_background',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_team-item-content' => 'background: {{VALUE}}',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow_normal',
                'selector' => '{{WRAPPER}} .tOri_team-item-content',
                'separator' => 'before',
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
                    '{{WRAPPER}} .tOri_team-item-content' => 'border-style: {{VALUE}};',
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
                    '{{WRAPPER}} .tOri_team-item-content' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .tOri_team-item-content' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'content_border_type!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'team_content_radius',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Border Radius', 'bantec-toolkit'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tOri_team-item-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'team_content_padding',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Padding', 'bantec-toolkit'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tOri_team-item-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'team_content_margin',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Margin', 'bantec-toolkit'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tOri_team-item-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'style_hover_tabs',
            [
                'label' => esc_html__('Hover', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'team_title_hover',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_team-item-content h5 a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow_hover',
                'selector' => '{{WRAPPER}} .tOri_team-item:hover .tOri_team-item-content',
                'separator' => 'before',
            ]
        );
        $this->add_control(
			'content_transition',
			[
				'label' => esc_html__( 'Transition Duration', 'bantec-toolkit' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 's', 'ms', 'custom' ],
				'default' => [
					'unit' => 's',
					'size' => 0.3,
				],
				'selectors' => [
					'{{WRAPPER}} .tOri_team-item-content' => 'transition: {{SIZE}}{{UNIT}}',
				],
			]
		);
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'team_icon_style',
            [
                'label' => esc_html__('Icon', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );   
		$this->add_control(
			'team_social',
			[
				'label' => esc_html__( 'Social', 'bantec-toolkit' ),
				'type' => Controls_Manager::HEADING,
			]
		);
        $this->start_controls_tabs(
            'style_tab'
        );
        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__('Normal', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'team_icon_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_team-item-content-social ul li a i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'team_icon_background',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_team-item-content-social ul li a i' => 'background: {{VALUE}}',
                ],                
            ]
        );
        $this->add_responsive_control(
            'social_icon_space',
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
					'size' => 8,
				],
                'selectors' => [
                    '{{WRAPPER}} .tOri_team-item-content-social ul' => 'gap: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tOri_team-item-content-social' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_icon_width',
            [
                'label' => esc_html__('Max Width', 'bantec-toolkit'),
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
					'size' => 45,
				],
                'selectors' => [
                    '{{WRAPPER}} .tOri_team-item-content-social ul li a i' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],                
            ]
        );        
        $this->add_responsive_control(
            'social_icon_size',
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
                'default' => [
					'unit' => 'px',
					'size' => 14,
				],
                'selectors' => [
                    '{{WRAPPER}} .tOri_team-item-content-social ul li a i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'team_social_radius',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Border Radius', 'bantec-toolkit'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .tOri_team-item-content-social ul li a i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->add_control(
			'team_share',
			[
				'label' => esc_html__( 'Share', 'bantec-toolkit' ),
				'type' => Controls_Manager::HEADING,
                'separator' => 'before',                
			]
		);
        $this->add_control(
            'team_share_icon_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_team-item-content-icon span' => 'color: {{VALUE}}',
                ],                
            ]
        );
        $this->add_control(
            'team_share_icon_background',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_team-item-content-icon span' => 'background: {{VALUE}}',
                ],                
            ]
        );
        $this->add_responsive_control(
            'share_icon_width',
            [
                'label' => esc_html__('Max Width', 'bantec-toolkit'),
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
					'size' => 45,
				],
                'selectors' => [
                    '{{WRAPPER}} .tOri_team-item-content-icon span' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tOri_team-item-content-icon .tOri_team-item-content-social' => 'bottom: {{SIZE}}{{UNIT}};',
                ],                
            ]
        );        
        $this->add_responsive_control(
            'share_icon_size',
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
                'default' => [
					'unit' => 'px',
					'size' => 14,
				],
                'selectors' => [
                    '{{WRAPPER}} .tOri_team-item-content-icon span' => 'font-size: {{SIZE}}{{UNIT}};',
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
            'team_icon_hover_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_team-item-content-social ul li a i:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'team_icon_hover_background',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tOri_team-item-content-social ul li a i:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs(); 
        $this->end_controls_section();
        
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $team_image = $settings['team_image'];

    ?>
        <?php if ('design-1' === $settings['select_design']): ?>

					<div class="tOri_team-item">
						<div class="tOri_team-item-image">
                        <?php
                        if ($team_image['url']) {
                            if (!empty($team_image['alt'])) {
                                echo '<img src="' . esc_url($team_image['url']) . '" alt="' . esc_attr($team_image['alt']) . '" />';
                            } else {
                                echo '<img src="' . esc_url($team_image['url']) . '" alt="' . esc_attr(__('No alt text', 'bantec-toolkit')) . '" />';
                            }
                        } ?>
						</div>
						<div class="tOri_team-item-content">
                            <div>
                                <?php if (!empty($settings['team_url'])) { ?>
                                    <h5><a href="<?php echo esc_url($settings['team_url']); ?>"><?php echo esc_html($settings['title_one']); ?></a></h5>
                                <?php } else { ?>
                                    <h5><?php echo esc_html($settings['title_one']); ?></h5>
                                <?php } ?>
					            <span><?php echo esc_html($settings['sub_title']); ?></span>
                            </div>
                            <?php if ('yes' === $settings['show_social'] && !empty($settings['social_media'])): ?>
                                <div class="tOri_team-item-content-icon">
                                    <span class="fa-sharp fa-regular fa-share-nodes"></span>
                                    <div class="tOri_team-item-content-social">
                                        <ul>
                                            <?php foreach ($settings['social_media'] as $item): ?>
                                                <li><a href="<?php echo esc_url($item['link']); ?>"><i
                                                class="<?php echo esc_attr($item['icon']['value']); ?>"></i></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php endif; ?>
						</div>
					</div>
        <?php endif; ?>

    <?php
    }
}

Plugin::instance()->widgets_manager->register(new Team_Bantec);