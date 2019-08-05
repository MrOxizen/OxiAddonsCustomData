<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Progress_Bar;

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Group_Control_Background as Group_Control_Background;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Scheme_Typography as Scheme_Typography;
use \Elementor\Widget_Base as Widget_Base;

class Progress_Bar extends Widget_Base
{

    public function get_name()
    {
        return 'sa-el-progress-bar';
    }

    public function get_title()
    {
        return esc_html__('Progress Bar', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon()
    {
        return ' eicon-text-align-left oxi-el-admin-icon';
    }

    public function get_categories()
    {
        return ['sa-el-addons'];
    }

    protected function _register_controls()
    {

        /*-----------------------------------------------------------------------------------*/
        /*  CONTENT TAB
        /*-----------------------------------------------------------------------------------*/

        /**
         * Content Tab: Layout
         */
        $this->start_controls_section(
            'progress_bar_section_layout',
            [
                'label' => __('Layout', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'progress_bar_layout',
            [
                'label'   => __('Layout', SA_ELEMENTOR_TEXTDOMAIN),
                'type'    => Controls_Manager::SELECT,
                'default' => 'line',
                'options' => [
                    'line'             => __('Line', SA_ELEMENTOR_TEXTDOMAIN),
                    'line_rainbow'     => __('Line Rainbow ' . apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('Pro Only', 'data', FALSE)), SA_ELEMENTOR_TEXTDOMAIN),
                    'circle'           => __('Circle', SA_ELEMENTOR_TEXTDOMAIN),
                    'circle_fill'      => __('Circle Fill ' . apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('Pro Only', 'data', FALSE)), SA_ELEMENTOR_TEXTDOMAIN),
                    'half_circle'      => __('Half Circle', SA_ELEMENTOR_TEXTDOMAIN),
                    'half_circle_fill' => __('Half Circle Fill ' . apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('Pro Only', 'data', FALSE)), SA_ELEMENTOR_TEXTDOMAIN),
                    'box'              => __('Box ' . apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('Pro Only', 'data', FALSE)), SA_ELEMENTOR_TEXTDOMAIN),
                ],
            ]
        );

        $this->add_control(
            'progress_bar_title',
            [
                'label' => __('Title', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'default' => __('Progress Bar', SA_ELEMENTOR_TEXTDOMAIN),
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'progress_bar_title_html_tag',
            [
                'label' => __('Title HTML Tag', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1'   => __('H1', SA_ELEMENTOR_TEXTDOMAIN),
                    'h2'   => __('H2', SA_ELEMENTOR_TEXTDOMAIN),
                    'h3'   => __('H3', SA_ELEMENTOR_TEXTDOMAIN),
                    'h4'   => __('H4', SA_ELEMENTOR_TEXTDOMAIN),
                    'h5'   => __('H5', SA_ELEMENTOR_TEXTDOMAIN),
                    'h6'   => __('H6', SA_ELEMENTOR_TEXTDOMAIN),
                    'div'  => __('div', SA_ELEMENTOR_TEXTDOMAIN),
                    'span' => __('span', SA_ELEMENTOR_TEXTDOMAIN),
                    'p'    => __('p', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                'default' => 'div',
            ]
        );

        $this->add_control(
            'progress_bar_value',
            [
                'label'      => __('Counter Value', SA_ELEMENTOR_TEXTDOMAIN),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['%'],
                'range'      => [
                    '%' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 50,
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'progress_bar_show_count',
            [
                'label'        => esc_html__('Display Count', SA_ELEMENTOR_TEXTDOMAIN),
                'type'         => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'progress_bar_animation_duration',
            [
                'label'      => __('Animation Duration', SA_ELEMENTOR_TEXTDOMAIN),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min' => 1000,
                        'max' => 10000,
                        'step' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 1500,
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'progress_bar_prefix_label',
            [
                'label'     => __('Prefix Label', SA_ELEMENTOR_TEXTDOMAIN),
                'type'      => Controls_Manager::TEXT,
                'default'   => __('Prefix', SA_ELEMENTOR_TEXTDOMAIN),
                'condition' => [
                    'progress_bar_layout' => 'half_circle',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'progress_bar_postfix_label',
            [
                'label'     => __('Postfix Label', SA_ELEMENTOR_TEXTDOMAIN),
                'type'      => Controls_Manager::TEXT,
                'default'   => __('Postfix', SA_ELEMENTOR_TEXTDOMAIN),
                'condition' => [
                    'progress_bar_layout' => 'half_circle',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        if (apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('', '', FALSE))) {
            $this->start_controls_section(
                'sa_el_section_pro',
                [
                    'label' => __('Go Premium for More Features', SA_ELEMENTOR_TEXTDOMAIN)
                ]
            );

            $this->add_control(
                'sa_el_control_get_pro',
                [
                    'label' => __('Unlock more possibilities', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        '1' => [
                            'title' => __('', SA_ELEMENTOR_TEXTDOMAIN),
                            'icon' => 'fa fa-unlock-alt',
                        ],
                    ],
                    'default' => '1',
                    'description' => '<span class="pro-feature"> Get the  <a href="https://www.oxilab.org/downloads/short-code-addons/" target="_blank">Pro version</a> for more stunning elements and customization options.</span>'
                ]
            );

            $this->end_controls_section();
        }

        /*-----------------------------------------------------------------------------------*/
        /*  STYLE TAB
        /*-----------------------------------------------------------------------------------*/

        /**
         * Style Tab: General(Line)
         */
        $style_condition = ['line', 'line_rainbow'];

        if (apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('hasd', '', TRUE))) {
            $style_condition = array_merge($style_condition, ['circle_fill', 'half_circle_fill', 'box']);
        }
        // print_r($style_condition);
        $this->start_controls_section(
            'progress_bar_section_style_general_line',
            [
                'label'     => __('General', SA_ELEMENTOR_TEXTDOMAIN),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'progress_bar_layout' => $style_condition,
                ],
            ]
        );

        $this->add_control(
            'progress_bar_line_alignment',
            [
                'label' => __('Alignment', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'center',
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Background
         */
        $this->start_controls_section(
            'progress_bar_section_style_bg',
            [
                'label'     => __('Background', SA_ELEMENTOR_TEXTDOMAIN),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'progress_bar_layout' => $style_condition, // ['line', 'line_rainbow'] ( Pro Only )
                ],
            ]
        );

        $this->add_control(
            'progress_bar_line_width',
            [
                'label' => __('Width', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-progressbar-line-container' => 'width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'progress_bar_line_height',
            [
                'label' => __('Height', SA_ELEMENTOR_TEXTDOMAIN),
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
                    'size' => 12,
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-progressbar-line' => 'height: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'progress_bar_line_bg_color',
            [
                'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#eee',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-progressbar-line' => 'background-color: {{VALUE}}',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Fill
         */
        $this->start_controls_section(
            'progress_bar_section_style_fill',
            [
                'label' => __('Fill', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'progress_bar_layout' => $style_condition, // will here ['line', 'line_rainbow'] ( Pro Only )
                ],
            ]
        );

        $this->add_control(
            'progress_bar_line_fill_height',
            [
                'label' => __('Height', SA_ELEMENTOR_TEXTDOMAIN),
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
                    'size' => 12,
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-progressbar-line-fill' => 'height: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        if (apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('', '', FALSE))) {
            $line_fill_color_condition = [
                'progress_bar_layout' => 'line',
            ];
        } else {
            $line_fill_color_condition = [];
        }
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'    => 'progress_bar_line_fill_color',
                'label'   => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'types'   => ['classic', 'gradient'],
                'exclude' => [
                    'image',
                ],
                'condition' => $line_fill_color_condition,
                'selector' => '{{WRAPPER}} .sa-el-progressbar-line-fill',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'progress_bar_line_fill_stripe',
            [
                'label'        => __('Show Stripe', SA_ELEMENTOR_TEXTDOMAIN),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'condition'     => $line_fill_color_condition,
                'default'      => 'no',
                'separator'    => 'before',
            ]
        );

        $this->add_control(
            'progress_bar_line_fill_stripe_animate',
            [
                'label' => __('Stripe Animation', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'normal'  => __('Left To Right', SA_ELEMENTOR_TEXTDOMAIN),
                    'reverse' => __('Right To Left', SA_ELEMENTOR_TEXTDOMAIN),
                    'none'    => __('Disabled', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                'default'   => 'none',
                'condition' => [
                    'progress_bar_line_fill_stripe' => 'yes',
                    'progress_bar_layout' => 'line'
                ]
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: General(Circle)
         */
        $circle_general_condition = ['circle', 'half_circle'];
        if (apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('', '', TRUE))) {
            $circle_general_condition = array_merge($circle_general_condition, ['circle_fill', 'half_circle_fill']);
        }

        $this->start_controls_section(
            'progress_bar_section_style_general_circle',
            [
                'label'     => __('General', SA_ELEMENTOR_TEXTDOMAIN),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'progress_bar_layout' => [$circle_general_condition],
                ],
            ]
        );

        $this->add_control(
            'progress_bar_circle_alignment',
            [
                'label' => __('Alignment', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'center',
            ]
        );

        $this->add_control(
            'progress_bar_circle_size',
            [
                'label'      => __('Size', SA_ELEMENTOR_TEXTDOMAIN),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min'  => 50,
                        'max'  => 500,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 200,
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-progressbar-circle'            => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .sa-el-progressbar-half-circle'       => 'width: {{SIZE}}{{UNIT}}; height: calc({{SIZE}} / 2 * 1{{UNIT}});',
                    '{{WRAPPER}} .sa-el-progressbar-half-circle-after' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .sa-el-progressbar-circle-shadow'     => 'width: calc({{SIZE}}{{UNIT}} + 20px); height: calc({{SIZE}}{{UNIT}} + 20px);',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'progress_bar_circle_bg_color',
            [
                'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-progressbar-circle-inner' => 'background-color: {{VALUE}}',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'progress_bar_circle_stroke_width',
            [
                'label'      => __('Stroke Width', SA_ELEMENTOR_TEXTDOMAIN),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 12,
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-progressbar-circle-inner' => 'border-width: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .sa-el-progressbar-circle-half' => 'border-width: {{SIZE}}{{UNIT}}',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'progress_bar_circle_stroke_color',
            [
                'label'     => __('Stroke Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#eee',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-progressbar-circle-inner' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        if (apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('', '', TRUE))) {
            $circle_fill_color_condition = [
                '{{WRAPPER}} .sa-el-progressbar-circle-half' => 'border-color: {{VALUE}}',
                '{{WRAPPER}} .sa-el-progressbar-circle-fill .sa-el-progressbar-circle-half' => 'background-color: {{VALUE}}',
                '{{WRAPPER}} .sa-el-progressbar-half-circle-fill .sa-el-progressbar-circle-half' => 'background-color: {{VALUE}}',
            ];
        } else {
            $circle_fill_color_condition = [
                '{{WRAPPER}} .sa-el-progressbar-circle-half' => 'border-color: {{VALUE}}',
            ];
        }

        $this->add_control(
            'progress_bar_circle_fill_color',
            [
                'label'     => __('Fill Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#000',
                'selectors' => $circle_fill_color_condition,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'      => 'progress_bar_circle_box_shadow',
                'label'     => __('Box Shadow', SA_ELEMENTOR_TEXTDOMAIN),
                'selector'  => '{{WRAPPER}} .sa-el-progressbar-circle-shadow',
                'condition' => [
                    'progress_bar_layout' => 'circle',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        // Import progress bar style controlls
        // do_action('add_progress_bar_control', $this);
        if (apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('', '', TRUE))) {
            /**
             * Style Tab: General(Box)
             */
            $this->start_controls_section(
                'progress_bar_section_style_general_box',
                [
                    'label' => __('General', SA_ELEMENTOR_TEXTDOMAIN),
                    'tab' => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'progress_bar_layout' => 'box',
                    ],
                ]
            );

            $this->add_control(
                'progress_bar_box_alignment',
                [
                    'label' => __('Alignment', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __('Left', SA_ELEMENTOR_TEXTDOMAIN),
                            'icon' => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => __('Center', SA_ELEMENTOR_TEXTDOMAIN),
                            'icon' => 'fa fa-align-center',
                        ],
                        'right' => [
                            'title' => __('Right', SA_ELEMENTOR_TEXTDOMAIN),
                            'icon' => 'fa fa-align-right',
                        ],
                    ],
                    'default' => 'center',
                ]
            );

            $this->add_control(
                'progress_bar_box_width',
                [
                    'label' => __('Width', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range' => [
                        'px' => [
                            'min' => 100,
                            'max' => 500,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 140,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .sa-el-progressbar-box' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'progress_bar_box_height',
                [
                    'label'      => __('Height', SA_ELEMENTOR_TEXTDOMAIN),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range'      => [
                        'px' => [
                            'min'  => 100,
                            'max'  => 500,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 200,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .sa-el-progressbar-box' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'progress_bar_box_bg_color',
                [
                    'label'     => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .sa-el-progressbar-box' => 'background-color: {{VALUE}}',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'progress_bar_box_fill_color',
                [
                    'label' => __('Fill Color', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#000',
                    'selectors' => [
                        '{{WRAPPER}} .sa-el-progressbar-box-fill' => 'background-color: {{VALUE}}',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'progress_bar_box_stroke_width',
                [
                    'label' => __('Stroke Width', SA_ELEMENTOR_TEXTDOMAIN),
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
                        'size' => 1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .sa-el-progressbar-box' => 'border-width: {{SIZE}}{{UNIT}}',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'progress_bar_box_stroke_color',
                [
                    'label' => __('Stroke Color', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#eee',
                    'selectors' => [
                        '{{WRAPPER}} .sa-el-progressbar-box' => 'border-color: {{VALUE}}',
                    ],
                ]
            );

            $this->end_controls_section();
        }



        /**
         * Style Tab: Typography
         */
        $this->start_controls_section(
            'progress_bar_section_style_typography',
            [
                'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'progress_bar_title_typography',
                'label'    => __('Title', SA_ELEMENTOR_TEXTDOMAIN),
                'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .sa-el-progressbar-title',
            ]
        );

        $this->add_control(
            'progress_bar_title_color',
            [
                'label' => __('Title Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-progressbar-title' => 'color: {{VALUE}}',
                ],
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'progress_bar_count_typography',
                'label' => __('Counter', SA_ELEMENTOR_TEXTDOMAIN),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .sa-el-progressbar-count-wrap',
            ]
        );

        $this->add_control(
            'progress_bar_count_color',
            [
                'label' => __('Counter Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-progressbar-count-wrap' => 'color: {{VALUE}}',
                ],
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'progress_bar_after_typography',
                'label' => __('Prefix/Postfix', SA_ELEMENTOR_TEXTDOMAIN),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .sa-el-progressbar-half-circle-after span',
                'condition' => [
                    'progress_bar_layout' => 'half_circle',
                ],
            ]
        );

        $this->add_control(
            'progress_bar_after_color',
            [
                'label' => __('Prefix/Postfix Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-progressbar-half-circle-after' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'progress_bar_layout' => 'half_circle',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings       = $this->get_settings_for_display();
        $wrap_classes   = ['sa-el-progressbar'];
        $circle_wrapper = [];

        if (apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('', '', FALSE))) {
            if (in_array($settings['progress_bar_layout'], ['line', 'line_rainbow', 'circle_fill', 'half_circle_fill', 'box'])) {
                $settings['progress_bar_layout'] = 'line';
            }
        }

        if ($settings['progress_bar_layout'] == 'line' || $settings['progress_bar_layout'] == 'line_rainbow') {

            $wrap_classes[] = 'sa-el-progressbar-line';

            // $wrap_classes = apply_filters('sa_el_progressbar_rainbow_wrap_class', $wrap_classes, $settings);
            if (apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('', '', TRUE))) {
                if ($settings['progress_bar_layout'] == 'line_rainbow') {
                    $wrap_classes[] = 'sa-el-progressbar-line-rainbow';
                }
            }

            if ($settings['progress_bar_line_fill_stripe'] == 'yes') {
                $wrap_classes[] = 'sa-el-progressbar-line-stripe';
            }

            if ($settings['progress_bar_line_fill_stripe_animate'] == 'normal') {
                $wrap_classes[] = 'sa-el-progressbar-line-animate';
            } else if ($settings['progress_bar_line_fill_stripe_animate'] == 'reverse') {
                $wrap_classes[] = 'sa-el-progressbar-line-animate-rtl';
            }

            $this->add_render_attribute('sa-el-progressbar-line', [
                'class'         => $wrap_classes,
                'data-layout'   => 'line',
                'data-count'    => $settings['progress_bar_value']['size'],
                'data-duration' => $settings['progress_bar_animation_duration']['size'],
            ]);

            $this->add_render_attribute('sa-el-progressbar-line-fill', [
                'class' => 'sa-el-progressbar-line-fill',
                'style' => '-webkit-transition-duration:' . $settings['progress_bar_animation_duration']['size'] . 'ms;-o-transition-duration:' . $settings['progress_bar_animation_duration']['size'] . 'ms;transition-duration:' . $settings['progress_bar_animation_duration']['size'] . 'ms;',
            ]);

            echo '<div class="sa-el-progressbar-line-container ' . $settings['progress_bar_line_alignment'] . '">
                ' . ($settings['progress_bar_title'] ? sprintf('<%1$s class="%2$s">', $settings['progress_bar_title_html_tag'], 'sa-el-progressbar-title') . $settings['progress_bar_title'] . sprintf('</%1$s>', $settings['progress_bar_title_html_tag']) : '') . '

                <div ' . $this->get_render_attribute_string('sa-el-progressbar-line') . '>
                    ' . ($settings['progress_bar_show_count'] === 'yes' ? '<span class="sa-el-progressbar-count-wrap"><span class="sa-el-progressbar-count">0</span><span class="postfix">' . $settings['progress_bar_value']['unit'] . '</span></span>' : '') . '
                    <span ' . $this->get_render_attribute_string('sa-el-progressbar-line-fill') . '></span>
                </div>
            </div>';
        }
        if ($settings['progress_bar_layout'] == 'circle' || $settings['progress_bar_layout'] == 'circle_fill') {

            $wrap_classes[] = 'sa-el-progressbar-circle';
            // $wrap_classes = apply_filters('sa_el_progressbar_circle_fill_wrap_class', $wrap_classes, $settings);
            if (apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('', '', TRUE))) {
                if ($settings['progress_bar_layout'] == 'circle_fill') {
                    $wrap_classes[] = 'sa-el-progressbar-circle-fill';
                }
            }

            $this->add_render_attribute(
                'sa-el-progressbar-circle',
                [
                    'class'         => $wrap_classes,
                    'data-layout'   => $settings['progress_bar_layout'],
                    'data-count'    => $settings['progress_bar_value']['size'],
                    'data-duration' => $settings['progress_bar_animation_duration']['size'],
                ]
            );

            echo '<div class="sa-el-progressbar-circle-container ' . $settings['progress_bar_circle_alignment'] . '">
                ' . ($settings['progress_bar_circle_box_shadow_box_shadow'] ? '<div class="sa-el-progressbar-circle-shadow">' : '') . '

                <div ' . $this->get_render_attribute_string('sa-el-progressbar-circle') . '>
                    <div class="sa-el-progressbar-circle-pie">
                        <div class="sa-el-progressbar-circle-half-left sa-el-progressbar-circle-half"></div>
                        <div class="sa-el-progressbar-circle-half-right sa-el-progressbar-circle-half"></div>
                    </div>
                    <div class="sa-el-progressbar-circle-inner"></div>
                    <div class="sa-el-progressbar-circle-inner-content">
                        ' . ($settings['progress_bar_title'] ? sprintf('<%1$s class="%2$s">', $settings['progress_bar_title_html_tag'], 'sa-el-progressbar-title') . $settings['progress_bar_title'] . sprintf('</%1$s>', $settings['progress_bar_title_html_tag']) : '') . '
                        ' . ($settings['progress_bar_show_count'] === 'yes' ? '<span class="sa-el-progressbar-count-wrap"><span class="sa-el-progressbar-count">0</span><span class="postfix">' . $settings['progress_bar_value']['unit'] . '</span></span>' : '') . '
                    </div>
                </div>

                ' . ($settings['progress_bar_circle_box_shadow_box_shadow'] ? '</div>' : '') . '
            </div>';
        }
        if (apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('', '', TRUE))) {
            $circle_condition = $settings['progress_bar_layout'] == 'half_circle' || $settings['progress_bar_layout'] == 'half_circle_fill';
        } else {
            $circle_condition = $settings['progress_bar_layout'] == 'half_circle';
        }
        if ($circle_condition) {
            $wrap_classes[] = 'sa-el-progressbar-half-circle';
            // $wrap_classes = apply_filters('sa_el_progressbar_half_circle_wrap_class', $wrap_classes, $settings);

            if (apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('', '', TRUE))) {
                if ($settings['progress_bar_layout'] == 'half_circle_fill') {
                    $wrap_classes[] = 'sa-el-progressbar-half-circle-fill';
                }
            }

            $this->add_render_attribute(
                'sa-el-progressbar-circle-half',
                [
                    'class' => 'sa-el-progressbar-circle-half',
                    'style' => '-webkit-transition-duration:' . $settings['progress_bar_animation_duration']['size'] . 'ms;-o-transition-duration:' . $settings['progress_bar_animation_duration']['size'] . 'ms;transition-duration:' . $settings['progress_bar_animation_duration']['size'] . 'ms;',
                ]
            );

            $this->add_render_attribute(
                'sa-el-progressbar-half-circle',
                [
                    'class'         => $wrap_classes,
                    'data-layout'   => $settings['progress_bar_layout'],
                    'data-count'    => $settings['progress_bar_value']['size'],
                    'data-duration' => $settings['progress_bar_animation_duration']['size'],
                ]
            );

            echo '<div class="sa-el-progressbar-circle-container ' . $settings['progress_bar_circle_alignment'] . '">
                <div ' . $this->get_render_attribute_string('sa-el-progressbar-half-circle') . '>
                    <div class="sa-el-progressbar-circle">
                        <div class="sa-el-progressbar-circle-pie">
                            <div ' . $this->get_render_attribute_string('sa-el-progressbar-circle-half') . '></div>
                        </div>
                        <div class="sa-el-progressbar-circle-inner"></div>
                    </div>
                    <div class="sa-el-progressbar-circle-inner-content">
                        ' . ($settings['progress_bar_title'] ? sprintf('<%1$s class="%2$s">', $settings['progress_bar_title_html_tag'], 'sa-el-progressbar-title') . $settings['progress_bar_title'] . sprintf('</%1$s>', $settings['progress_bar_title_html_tag']) : '') . '
                        ' . ($settings['progress_bar_show_count'] === 'yes' ? '<span class="sa-el-progressbar-count-wrap"><span class="sa-el-progressbar-count">0</span><span class="postfix">' . $settings['progress_bar_value']['unit'] . '</span></span>' : '') . '
                    </div>
                </div>
                <div class="sa-el-progressbar-half-circle-after">
                    ' . ($settings['progress_bar_prefix_label'] ? sprintf('<span class="sa-el-progressbar-prefix-label">%1$s</span>', $settings['progress_bar_prefix_label']) : '') . '
                    ' . ($settings['progress_bar_postfix_label'] ? sprintf('<span class="sa-el-progressbar-postfix-label">%1$s</span>', $settings['progress_bar_postfix_label']) : '') . '
                </div>
            </div>';
        }
        // do_action('add_sa_el_progressbar_block', $settings, $this, $wrap_classes);

        if (apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('', '', TRUE))) {
            if ($settings['progress_bar_layout'] == 'box') {
                $wrap_classes[] = 'sa-el-progressbar-box';

                $this->add_render_attribute('sa-el-progressbar-box', [
                    'class'         => $wrap_classes,
                    'data-layout'   => $settings['progress_bar_layout'],
                    'data-count'    => $settings['progress_bar_value']['size'],
                    'data-duration' => $settings['progress_bar_animation_duration']['size'],
                ]);

                $this->add_render_attribute('sa-el-progressbar-box-fill', [
                    'class' => 'sa-el-progressbar-box-fill',
                    'style' => '-webkit-transition-duration:' . $settings['progress_bar_animation_duration']['size'] . 'ms;-o-transition-duration:' . $settings['progress_bar_animation_duration']['size'] . 'ms;transition-duration:' . $settings['progress_bar_animation_duration']['size'] . 'ms;',
                ]);

                echo '<div class="sa-el-progressbar-box-container ' . $settings['progress_bar_box_alignment'] . '">
                    <div ' . $this->get_render_attribute_string('sa-el-progressbar-box') . '>
                        <div class="sa-el-progressbar-box-inner-content">
                            ' . ($settings['progress_bar_title'] ? sprintf('<%1$s class="%2$s">', $settings['progress_bar_title_html_tag'], 'sa-el-progressbar-title') . $settings['progress_bar_title'] . sprintf('</%1$s>', $settings['progress_bar_title_html_tag']) : '') . '
                            ' . ($settings['progress_bar_show_count'] === 'yes' ? '<span class="sa-el-progressbar-count-wrap"><span class="sa-el-progressbar-count">0</span><span class="postfix">' . $settings['progress_bar_value']['unit'] . '</span></span>' : '') . '
                        </div>
                        <div ' . $this->get_render_attribute_string('sa-el-progressbar-box-fill') . '></div>
                    </div>
                </div>';
            }
        }
    }
}
