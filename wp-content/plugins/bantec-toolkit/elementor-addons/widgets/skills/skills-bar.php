<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit;

class Bantec_Skill_Bar extends Widget_Base
{
    public function get_name()
    {
        return 'bantec-skill-bar';
    }

    public function get_title()
    {
        return esc_html__('Skill Bar - bantec', 'bantec-toolkit');
    }

    public function get_icon()
    {
        return 'bantec-icon eicon-skill-bar';
    }

    public function get_categories()
    {
        return ['bantec-toolkit'];
    }

    public function get_keywords()
    {
        return ['bantec', 'Toolkit', 'Skill', 'bar', 'skill bar', 'circle',];
    }

    public function get_script_depends() {
		return [ 'bantec-skills-script' ];
	}

    protected function register_controls()

    {
        $this->start_controls_section(
            'section_general',
            [
                'label' => esc_html__('Select ProgressBar Style', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'select_design',
            [
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'design-1' => esc_html__('Line', 'bantec-toolkit'),
                    'design-2' => esc_html__('Circle', 'bantec-toolkit'),
                ],
                'default' => 'design-1',
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('ProgressBar Content', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'skill_lavel',
            [
                'label'   => esc_html__('Skill Lavel', 'bantec-toolkit'),
                'type'    => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '70',
                'condition' => [
                    'select_design' => ['design-2'],
                ]
            ]
        );
        $skill_item = new Repeater();
        $skill_item->add_control(
            'skill_title',
            [
                'label'   => esc_html__('Skill Title', 'bantec-toolkit'),
                'type'    => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $skill_item->add_control(
            'skill_lavel',
            [
                'label'   => esc_html__('Skill Lavel', 'bantec-toolkit'),
                'type'    => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'skills_list',
            [
                'label' => esc_html__('Skills List', 'bantec-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $skill_item->get_controls(),
                'default' => [
                    [
                        'skill_title'  => esc_html__('Web Development', 'bantec-toolkit'),
                        'skill_lavel'  => esc_html__('70', 'bantec-toolkit'),
                    ],

                    [
                        'skill_title'  => esc_html__('Graphic Design', 'bantec-toolkit'),
                        'skill_lavel'  => esc_html__('90', 'bantec-toolkit'),
                    ],
                ],
                'title_field' => '{{{ skill_title }}}',
                'condition' => [
                    'select_design' => ['design-1'],
                ]
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'skill_section_content_style',
            [
                'label' => esc_html__('Content', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_control(
			'skill_title',
			[
				'label' => esc_html__( 'Title', 'bantec-toolkit' ),
				'type' => Controls_Manager::HEADING,
                'condition' => [
                    'select_design' => ['design-1'],
                ]
			]
		);
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'skill_title_typography',
				'selector' => '{{WRAPPER}} .skill__area-item-content h6',
                'condition' => [
                    'select_design' => ['design-1'],
                ]
			]
		);
        $this->add_control(
            'skill_title_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .skill__area-item-content h6' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-1'],
                ]
            ]
        );
        $this->add_responsive_control(
            'skill_bar_item_gap',
            [
                'label' => esc_html__('Gap', 'bantec-toolkit'),
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
                    '{{WRAPPER}} .skill__area-item-inner' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'select_design' => ['design-1'],
                ],
                'separator' => 'after',
            ]
        );
		$this->add_control(
			'skill_counter',
			[
				'label' => esc_html__( 'Counter', 'bantec-toolkit' ),
				'type' => Controls_Manager::HEADING,
			]
		);

        $this->add_control(
            'show_arrow',
            [
                'label' => esc_html__('Inline Counter', 'bantec-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_off' => esc_html__('No', 'bantec-toolkit'),
                'label_on' => esc_html__('Yes', 'bantec-toolkit'),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'select_design' => ['design-1'],
                ],
            ]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'skill_counter_typography',
				'selector' => '{{WRAPPER}} .skill__area-item-content-count,
				{{WRAPPER}} .circle__progress-item-number',
			]
		);
        $this->add_control(
            'skill_counter_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .skill__area-item-content-count' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .circle__progress-item-number' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'skill_bar_section',
            [
                'label' => esc_html__('Skill Bar', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );  
        $this->add_control(
            'skill_bar_background',
            [
                'label' => esc_html__('Bar Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .skill__area-item-bar' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .circle__progress-item-bar' => '--progressColor: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'skill_inner_background',
            [
                'label' => esc_html__('Inner Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .skill__area-item-inner' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .circle__progress-item-bar' => '--barColor: {{VALUE}}',
                ],
            ]
        );             
        $this->add_control(
            'skill_area_background',
            [
                'label' => esc_html__('Area Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .circle__progress-item::after' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-2'],
                ]
            ]
        );             
        $this->add_responsive_control(
            'skill_inner_height',
            [
                'label' => esc_html__('Height', 'bantec-toolkit'),
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
					'size' => 10,
				],
                'selectors' => [
                    '{{WRAPPER}} .skill__area-item-inner' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .skill__area-item-bar' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'select_design' => ['design-1'],
                ]
            ]
        );
        $this->add_responsive_control(
            'skill_inner_width',
            [
                'label' => esc_html__('Bar Width', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ '%', 'custom' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors' => [
                    '{{WRAPPER}} .circle__progress-item::after' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'select_design' => ['design-2'],
                ]
            ]
        ); 
        $this->add_responsive_control(
            'skill_item_width',
            [
                'label' => esc_html__('Max Width', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                ],
                'default' => [
					'unit' => 'px',
					'size' => 150,
				],
                'selectors' => [
                    '{{WRAPPER}} .circle__progress-item' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'select_design' => ['design-2'],
                ]
            ]
        ); 
        $this->end_controls_section();

        $this->start_controls_section(
            'skill_bar_item',
            [
                'label' => esc_html__('Item', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'select_design' => ['design-1'],
                ]
            ]
        );          
        $this->add_responsive_control(
            'skill_item_gap',
            [
                'label' => esc_html__('Gap', 'bantec-toolkit'),
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
					'size' => 20,
				],
                'selectors' => [
                    '{{WRAPPER}} .skill__area-item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();
    }

protected function render()
{
    $settings = $this->get_settings_for_display();
        ?>
            <?php if ('design-1' === $settings['select_design']): ?>
                <div class="skill__area">
                    <?php foreach ($settings['skills_list'] as $key => $item): ?>
        <?php if ('yes' === $settings['show_arrow']) : ?>
                        <div class="skill__area-item" data-percent="<?php echo esc_html($item['skill_lavel']); ?>">
                            <div class="skill__area-item-content">
                                <h6><?php echo esc_html($item['skill_title']); ?></h6>
                            </div>
                            <div class="skill__area-item-inner">
                                <div class="skill__area-item-bar" data-width="<?php echo esc_html($item['skill_lavel']); ?>">
                                <span class="skill__area-item-content-count"></span></div>
                            </div>
                        </div> 
            <?php else : ?>
                        <div class="skill__area-item" data-percent="<?php echo esc_html($item['skill_lavel']); ?>">
                            <div class="skill__area-item-content">
                                <h6><?php echo esc_html($item['skill_title']); ?></h6>
                                <span class="skill__area-item-content-count"></span>
                            </div>
                            <div class="skill__area-item-inner">
                                <div class="skill__area-item-bar" data-width="<?php echo esc_html($item['skill_lavel']); ?>"></div>
                            </div>
                        </div>        
            
                <?php endif; ?>
                    <?php endforeach; ?>   
                </div>         
            <?php endif; ?>
            <?php if ('design-2' === $settings['select_design']): ?>
                <div class="circle__progress">
                    <div class="circle__progress-item" data-percent="<?php echo esc_html($settings['skill_lavel']); ?>">
                        <div class="circle__progress-item-bar">
                            <span class="circle__progress-item-number"></span>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Bantec_Skill_Bar);