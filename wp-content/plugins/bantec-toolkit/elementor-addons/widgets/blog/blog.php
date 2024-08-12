<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class Bantec_Blog extends Widget_Base
{


    public function get_name()
    {
        return 'bantec-blog';
    }


    public function get_title()
    {
        return esc_html__('Blog - Bantec', 'bantec-toolkit');
    }


    public function get_icon()
    {
        return 'bantec-icon eicon-posts-grid';
    }


    public function get_categories()
    {
        return ['bantec-toolkit'];
    }

    public function get_keywords()
    {
        return ['post', 'Toolkit', 'Blog', 'Grid', 'list'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'section_general',
            [
                'label' => esc_html__('Style & Column', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'select_design',
            [
                'label' => esc_html__('Select a Style', 'bantec-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'design-1' => esc_html__('Blog Style 01', 'bantec-toolkit'),
                ],
                'default' => 'design-1',
                'label_block' => true,
            ]
        );
        $this->add_control(
            'grid_columns_des',
            [
                'label' => esc_html__('Columns On Desktop', 'bantec-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'show_two' => esc_html__('Column 2', 'bantec-toolkit'),
                    'show_three' => esc_html__('Column 3', 'bantec-toolkit'),
                    'show_four' => esc_html__('Column 4', 'bantec-toolkit'),
                    'show_five' => esc_html__('Column 5', 'bantec-toolkit'),
                ],
                'default' => 'show_three',
                'label_block' => true,
            ]
        );
        $this->add_control(
            'grid_columns_tab',
            [
                'label' => esc_html__('Columns On Tablet', 'bantec-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'md_show_one' => esc_html__('Column 1', 'bantec-toolkit'),
                    'md_show_two' => esc_html__('Column 2', 'bantec-toolkit'),
                    'md_show_three' => esc_html__('Column 3', 'bantec-toolkit'),
                ],
                'default' => 'md_show_three',
                'label_block' => true,
            ]

        );
        $this->add_control(
            'grid_columns_mob',
            [
                'label' => esc_html__('Columns On Mobile', 'bantec-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'sm_show_one' => esc_html__('Column 1', 'bantec-toolkit'),
                    'sm_show_two' => esc_html__('Column 2', 'bantec-toolkit'),
                    'sm_show_three' => esc_html__('Column 3', 'bantec-toolkit'),
                ],
                'default' => 'sm_show_two',
                'label_block' => true,
            ]
        );
        $this->add_responsive_control(
            'blog_item_gap',
            [
                'label' => esc_html__('Colum Gap', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-area' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'blog_query',
            [
                'label' => esc_html__('Blog Query', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'post_count',
            [
                'label' => esc_html__('Number Of Posts', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['count'],
                'range' => [
                    'count' => [
                        'min' => 2,
                        'max' => 15,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'count',
                    'size' => 3,
                ],
            ]
        );
        $this->add_control(
            'word_limit',
            [
                'label' => esc_html__('Content Word Limit', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['count'],
                'range' => [
                    'count' => [
                        'min' => 5,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'count',
                    'size' => 10,
                ],
            ]
        );
        $this->add_control(
            'category',
            [
                'label' => esc_html__('Categories', 'bantec-toolkit'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => true,
                'options' => bantec_post_categories(),
            ]
        );
        $this->add_control(
            'blog_btn_text',
            [
                'label' => esc_html__('Blog Button', 'bantec-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'bantec-toolkit'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'btn_icon',
            [
                'label' => esc_html__('Button Icon', 'bantec-toolkit'),
                'type' => Controls_Manager::ICONS,
                'condition' => [
                    'blog_btn_text[value]!' => '',
                ],
            ]
        );
        $this->add_control(
            'icon_align',
            [
                'label' => esc_html__('Icon Position', 'bantec-toolkit'),
                'type' => Controls_Manager::SELECT,
                'default' => 'left',
                'options' => [
                    'left' => esc_html__('Before', 'bantec-toolkit'),
                    'right' => esc_html__('After', 'bantec-toolkit'),
                ],
                'condition' => [
                    'btn_icon[value]!' => '',
                    'blog_btn_text[value]!' => '',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'blog_settings',
            [
                'label' => esc_html__('Settings', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'blog_date_meta',
            [
                'label' => esc_html__('Show Date', 'bantec-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'bantec-toolkit'),
                'label_off' => esc_html__('No', 'bantec-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',

            ]
        );
        $this->add_control(
            'blog_username_meta',
            [
                'label' => esc_html__('Show Username', 'bantec-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'bantec-toolkit'),
                'label_off' => esc_html__('No', 'bantec-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',

            ]
        );
        $this->add_control(
            'blog_comment_meta',
            [
                'label' => esc_html__('Show Comment', 'bantec-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'bantec-toolkit'),
                'label_off' => esc_html__('No', 'bantec-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'blog_nav',
            [
                'label' => esc_html__('Pagination', 'bantec-toolkit'),
            ]
        );

        $this->add_control(
            'blog_pagination',
            [
                'label' => esc_html__('Show', 'bantec-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'bantec-toolkit'),
                'label_off' => esc_html__('No', 'bantec-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => Controls_Manager::DIVIDER,
                'condition' => [
                    'blog_pagination' => ['yes'],
                ],
            ]
        );

        $this->add_responsive_control(
            'blog_pagination_aligment',
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
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .theme__pagination' => 'text-align: {{VALUE}};',
                ],
                'condition' => [
                    'blog_pagination' => ['yes'],
                ],
            ]
        );

        $this->add_control(
            'hr1',
            [
                'type' => Controls_Manager::DIVIDER,
                'condition' => [
                    'blog_pagination' => ['yes'],
                ],
            ]
        );

        $this->add_responsive_control(
            'blog_pagination_space',
            [
                'label' => esc_html__('Space', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .theme__pagination' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'blog_pagination' => ['yes'],
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'blog_item_style',
            [
                'label' => esc_html__('Item', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'blog_item_content',
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
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'blog_item_horizontal',
            [
                'label' => esc_html__('Image Position', 'bantec-toolkit'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex' => [
                        'title' => esc_html__('Left', 'bantec-toolkit'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'block' => [
                        'title' => esc_html__('Top', 'bantec-toolkit'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'row-reverse' => [
                        'title' => esc_html__('Right', 'bantec-toolkit'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'block',
                'toggle' => false,
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item' => 'display: {{VALUE}}; flex-direction: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'blog_image',
            [
                'label' => esc_html__('Image', 'bantec-toolkit'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_responsive_control(
            'blog_image_width',
            [
                'label' => esc_html__('Image Width', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-image img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_height',
            [
                'label' => esc_html__('Height', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-image img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'blog_image_max',
            [
                'label' => esc_html__('Column Width', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-img' => 'width: {{SIZE}}{{UNIT}}; max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'blog_image_radius',
            [
                'label' => esc_html__('Border Radius', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'blog_date_style',
            [
                'label' => esc_html__('Date & Month', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'blog_date_meta' => ['yes'],
                ],
            ]
        );
        $this->add_control(
            'blog_date_view',
            [
                'label' => esc_html__('Layout', 'bantec-toolkit'),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'traditional',
                'options' => [
                    'traditional' => [
                        'title' => esc_html__('Default', 'bantec-toolkit'),
                        'icon' => 'eicon-editor-list-ul',
                    ],
                    'inline' => [
                        'title' => esc_html__('Inline', 'bantec-toolkit'),
                        'icon' => 'eicon-ellipsis-h',
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'blog_date_gap',
            [
                'label' => esc_html__('Gap', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-image-date.inline' => 'gap: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'blog_date_view' => 'inline',
                ],
            ]
        );
        $this->add_control(
            'horizontal_icon_align',
            [
                'label' => esc_html__('Horizontal Alignment', 'bantec-toolkit'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Start', 'bantec-toolkit'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'right' => [
                        'title' => esc_html__('End', 'bantec-toolkit'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'toggle' => false,
                'default' => 'right',
            ]
        );
        $this->add_control(
            'vertical_icon_align',
            [
                'label' => esc_html__('Vertical Alignment', 'bantec-toolkit'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'top' => [
                        'title' => esc_html__('Top', 'bantec-toolkit'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'bottom' => [
                        'title' => esc_html__('Bottom', 'bantec-toolkit'),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'toggle' => false,
                'default' => 'top',
            ]
        );
        $this->add_control(
            'blog_date',
            [
                'label' => esc_html__('Date', 'bantec-toolkit'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'date_typography',
                'selector' => '{{WRAPPER}} .blog_one-item-image-date h6',
            ]
        );
        $this->add_control(
            'date_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-image-date h6' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'blog_month',
            [
                'label' => esc_html__('Month', 'bantec-toolkit'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'month_typography',
                'selector' => '{{WRAPPER}} .blog_one-item-image-date span',
            ]
        );
        $this->add_control(
            'month_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-image-date span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'date_background',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-image-date' => 'background: {{VALUE}}',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'date_padding',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Padding', 'bantec-toolkit'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-image-date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'date_margin',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Margin', 'bantec-toolkit'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-image-date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'date_radius',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Border Radius', 'bantec-toolkit'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-image-date' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'blog_meta_style',
            [
                'label' => esc_html__('Meta', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'meta_style_tabs'
        );
        $this->start_controls_tab(
            'meta_normal_tab',
            [
                'label' => esc_html__('Normal', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'meta_view',
            [
                'label' => esc_html__('Layout', 'bantec-toolkit'),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'inline-block',
                'options' => [
                    'inline-block' => [
                        'title' => esc_html__('Inline', 'bantec-toolkit'),
                        'icon' => 'eicon-ellipsis-h',
                    ],
                    'block' => [
                        'title' => esc_html__('Block', 'bantec-toolkit'),
                        'icon' => 'eicon-editor-list-ul',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content-meta' => 'display: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'meta_background',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content-meta' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'meta_typography',
                'selector' => '{{WRAPPER}} .blog__two-item-content-meta ul li a,
                {{WRAPPER}} .blog_one-item-content-meta ul li a',
            ]
        );
        $this->add_control(
            'meta_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content-meta ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'meta_icon_color',
            [
                'label' => esc_html__('Icon Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content-meta ul li a i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'meta_icon_space',
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
                    '{{WRAPPER}} .blog_one-item-content-meta ul li a' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'blog_meta_position',
            [
                'label' => esc_html__('Vertical Position', 'bantec-toolkit'),
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
                    '{{WRAPPER}} .blog_one-item-content-meta' => 'transform: translateY({{SIZE}}{{UNIT}});',
                ],
            ]
        );
        $this->add_responsive_control(
            'meta_padding',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Padding', 'bantec-toolkit'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content-meta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'meta_margin',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Margin', 'bantec-toolkit'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content-meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .blog_one-item-content-meta' => 'border-style: {{VALUE}};',
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
                    '{{WRAPPER}} .blog_one-item-content-meta' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .blog_one-item-content-meta' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'border_type!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'meta_radius',
            [
                'label' => esc_html__('Border Radius', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content-meta' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'meta_hover_tab',
            [
                'label' => esc_html__('Hover', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'hover_meta_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content-meta ul li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'blog_content_style',
            [
                'label' => esc_html__('Content', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
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
        $this->add_control(
            'blog_title',
            [
                'label' => esc_html__('Title', 'bantec-toolkit'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'blog_title_typography',
                'selector' => '{{WRAPPER}} .blog__two-item-content h4,
                {{WRAPPER}} .blog_one-item-content h5',
            ]
        );
        $this->add_control(
            'blog_title_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content h5' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'blog_content_background',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content' => 'background: {{VALUE}}',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow_normal',
                'selector' => '{{WRAPPER}} .blog_one-item-content,
				{{WRAPPER}} .blog__three-item-content',
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
                    '{{WRAPPER}} .blog_one-item-content' => 'border-style: {{VALUE}};',
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
                    '{{WRAPPER}} .blog_one-item-content' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .blog_one-item-content' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'content_border_type!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'blog_content_radius',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Border Radius', 'bantec-toolkit'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'blog_content_padding',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Padding', 'bantec-toolkit'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'blog_content_margin',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Margin', 'bantec-toolkit'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'blog_title_hover',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content h5 a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow_hover',
                'selector' => '{{WRAPPER}} .blog_one-item:hover .blog_one-item-content,
				{{WRAPPER}} .log__three-item:hover .blog__three-item-content',
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'content_transition',
            [
                'label' => esc_html__('Transition Duration', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['s', 'ms', 'custom'],
                'default' => [
                    'unit' => 's',
                    'size' => 0.3,
                ],
                'selectors' => [
                    '{{WRAPPER}} .blog_one-item-content' => 'transition: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'blog_button_style',
            [
                'label' => esc_html__('Button', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'blog_btn_text[value]!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'blog_btn_position',
            [
                'label' => esc_html__('Vertical Position', 'bantec-toolkit'),
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
                    '{{WRAPPER}} .blog_btn' => 'transform: translateY({{SIZE}}{{UNIT}});',
                ],
            ]
        );
        $this->start_controls_tabs(
            'btn_style_tabs'
        );
        $this->start_controls_tab(
            'btn_normal',
            [
                'label' => esc_html__('Normal', 'bantec-toolkit'),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typography',
                'selector' => '{{WRAPPER}} .blog_btn',
            ]
        );
        $this->add_control(
            'btn_color',
            [
                'label' => esc_html__('Text Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_bg',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_btn' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_border_type',
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
                    '{{WRAPPER}} .blog_btn' => 'border-style: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_border_width',
            [
                'label' => esc_html__('Border Width', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .blog_btn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'btn_border_type!' => '',
                ],
            ]
        );
        $this->add_control(
            'btn_border_color',
            [
                'label' => esc_html__('Border Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_btn' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'btn_border_type!' => '',
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
                    '{{WRAPPER}} .blog_btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .blog_btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_margin',
            [
                'label' => esc_html__('Margin', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .blog_btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'btn_icon_style',
            [
                'label' => esc_html__('Icon Style', 'bantec-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'btn_icon[value]!' => '',
                ],
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
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .blog_btn' => 'gap: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'btn_icon[value]!' => '',
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
                        'max' => 40,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .blog_btn i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'btn_icon[value]!' => '',
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
                    '{{WRAPPER}} .blog_btn i' => 'top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'btn_icon[value]!' => '',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'btn_hover',
            [
                'label' => esc_html__('Hover', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'btn_hover_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_bg',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_btn::before' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .blog_btn::after' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .blog_btn:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_transition',
            [
                'label' => esc_html__('Transition Duration', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['s', 'ms', 'custom'],
                'default' => [
                    'unit' => 's',
                    'size' => 0.3,
                ],
                'selectors' => [
                    '{{WRAPPER}} .blog_btn' => 'transition: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .blog_btn::before' => 'transition: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .blog_btn::after' => 'transition: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'blog_pagination_style',
            [
                'label' => esc_html__('Pagination', 'bantec-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'blog_pagination' => 'yes',
                ],
            ]
        );
        $this->start_controls_tabs(
            'pagination_style_tabs'
        );
        $this->start_controls_tab(
            'pagination_normal',
            [
                'label' => esc_html__('Normal', 'bantec-toolkit'),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'pagination_typography',
                'selector' => '{{WRAPPER}} .theme__pagination ul li a,
				{{WRAPPER}} .theme__pagination ul li span.current',
            ]
        );
        $this->add_control(
            'pagination_color',
            [
                'label' => esc_html__('Text Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme__pagination ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'pagination_bg',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme__pagination ul li a' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'pag_border_type',
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
                    '{{WRAPPER}} .theme__pagination ul li a' => 'border-style: {{VALUE}};',
                    '{{WRAPPER}} .theme__pagination ul li span.current' => 'border-style: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'pagination_border_width',
            [
                'label' => esc_html__('Border Width', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .theme__pagination ul li a' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .theme__pagination ul li span.current' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'pag_border_type!' => '',
                ],
            ]
        );
        $this->add_control(
            'pagination_border_color',
            [
                'label' => esc_html__('Border Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme__pagination ul li a' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .theme__pagination ul li span.current' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'pag_border_type!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'pagination_radius',
            [
                'label' => esc_html__('Border Radius', 'bantec-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .theme__pagination ul li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .theme__pagination ul li span.current' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'pagination_gap',
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
                    '{{WRAPPER}} .theme__pagination ul' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'pagination_size',
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
                'selectors' => [
                    '{{WRAPPER}} .theme__pagination ul li a' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .theme__pagination ul li span.current' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'pagination_hover',
            [
                'label' => esc_html__('Active', 'bantec-toolkit'),
            ]
        );
        $this->add_control(
            'pagination_hover_color',
            [
                'label' => esc_html__('Color', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme__pagination ul li span.current' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .theme__pagination ul li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'pagination_hover_bg',
            [
                'label' => esc_html__('Background', 'bantec-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme__pagination ul li span.current' => 'background: {{VALUE}};border-color: {{VALUE}}',
                    '{{WRAPPER}} .theme__pagination ul li a:hover' => 'background: {{VALUE}};border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'pagination_transition',
            [
                'label' => esc_html__('Transition Duration', 'bantec-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['s', 'ms', 'custom'],
                'default' => [
                    'unit' => 's',
                    'size' => 0.3,
                ],
                'selectors' => [
                    '{{WRAPPER}} .theme__pagination ul li a' => 'transition: {{SIZE}}{{UNIT}}',
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
        $grid_columns = $settings['grid_columns_des'] . ' ' . $settings['grid_columns_tab'] . ' ' . $settings['grid_columns_mob'];

        if (is_front_page()) {
            $paged = get_query_var('page') ? get_query_var('page') : 1;
        } else {
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        }

        if (!empty($settings['category'])) {
            $post_query = new \WP_Query(
                array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'paged' => $paged,
                    'posts_per_page' => $settings['post_count']['size'],
                    'ignore_sticky_posts' => 1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'terms' => $settings['category'],
                            'field' => 'slug',
                        )
                    )
                )
            );
        } else {

            $post_query = new \WP_Query(
                array(
                    'post_type' => 'post',
                    'paged' => $paged,
                    'post_status' => 'publish',
                    'posts_per_page' => $settings['post_count']['size'],
                    'ignore_sticky_posts' => 1,
                )
            );
        }


        include ('template/blog-style-one.php');




    }
}

Plugin::instance()->widgets_manager->register(new Bantec_Blog);
