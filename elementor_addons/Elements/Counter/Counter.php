<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Counter;

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Group_Control_Background as Group_Control_Background;
use \Elementor\Scheme_Typography as Scheme_Typography;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Utils as Utils;
use \Elementor\Widget_Base as Widget_Base;

// use \SA_ELEMENTOR_ADDONS\Classes\Bootstrap;

class Counter extends Widget_Base {

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function get_name() {
        return 'sa_el_Counter';
    }

    public function get_title() {
        return esc_html__('Counter', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon() {
        return 'eicon-counter  oxi-el-admin-icon';
    }

    public function get_categories() {
        return ['sa-el-addons'];
    }

    protected function _register_controls() {

        /**
         * 	CONTENT TAB
         */
        /**
         * Content Tab: Counter
         */
        $this->start_controls_section(
                'section_counter', [
            'label' => __('Counter', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'sa_el_icon_type', [
            'label' => esc_html__('Icon Type', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::CHOOSE,
            'label_block' => false,
            'options' => [
                'none' => [
                    'title' => esc_html__('None', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-ban',
                ],
                'icon' => [
                    'title' => esc_html__('Icon', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-info-circle',
                ],
                'image' => [
                    'title' => esc_html__('Image', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-picture-o',
                ],
            ],
            'default' => 'icon',
                ]
        );

        $this->add_control(
                'counter_icon', [
            'label' => __('Icon', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::ICON,
            'default' => 'fa fa-heart',
            'condition' => [
                'sa_el_icon_type' => 'icon',
            ],
                ]
        );

        $this->add_control(
                'icon_image', [
            'label' => __('Image', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
            'condition' => [
                'sa_el_icon_type' => 'image',
            ],
                ]
        );

        $this->add_control(
                'ending_number', [
            'label' => __('Number', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::NUMBER,
            'dynamic' => [
                'active' => true,
            ],
            'default' => __('750', SA_ELEMENTOR_TEXTDOMAIN),
            'separator' => 'before',
                ]
        );

        $this->add_control(
                'number_prefix', [
            'label' => __('Number Prefix', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'dynamic' => [
                'active' => true,
            ],
                ]
        );

        $this->add_control(
                'number_suffix', [
            'label' => __('Number Suffix', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'dynamic' => [
                'active' => true,
            ],
                ]
        );

        $this->add_control(
                'counter_title', [
            'label' => __('Title', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'dynamic' => [
                'active' => true,
            ],
            'default' => __('Counter Title', SA_ELEMENTOR_TEXTDOMAIN),
            'separator' => 'before',
                ]
        );

        $this->add_control(
                'title_html_tag', [
            'label' => __('Title HTML Tag', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'div',
            'options' => [
                'h1' => __('H1', SA_ELEMENTOR_TEXTDOMAIN),
                'h2' => __('H2', SA_ELEMENTOR_TEXTDOMAIN),
                'h3' => __('H3', SA_ELEMENTOR_TEXTDOMAIN),
                'h4' => __('H4', SA_ELEMENTOR_TEXTDOMAIN),
                'h5' => __('H5', SA_ELEMENTOR_TEXTDOMAIN),
                'h6' => __('H6', SA_ELEMENTOR_TEXTDOMAIN),
                'div' => __('div', SA_ELEMENTOR_TEXTDOMAIN),
                'span' => __('span', SA_ELEMENTOR_TEXTDOMAIN),
                'p' => __('p', SA_ELEMENTOR_TEXTDOMAIN),
            ],
                ]
        );

        $this->add_control(
                'counter_layout', [
            'label' => __('Layout', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'layout-1',
            'options' => [
                'layout-1' => __('Layout 1', SA_ELEMENTOR_TEXTDOMAIN),
                'layout-2' => __('Layout 2', SA_ELEMENTOR_TEXTDOMAIN),
                'layout-3' => __('Layout 3', SA_ELEMENTOR_TEXTDOMAIN),
                'layout-4' => __('Layout 4', SA_ELEMENTOR_TEXTDOMAIN),
                'layout-5' => __('Layout 5', SA_ELEMENTOR_TEXTDOMAIN),
                'layout-6' => __('Layout 6', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'separator' => 'before',
                ]
        );

        $this->end_controls_section();

        /**
         * Content Tab: Separators
         */
        $this->start_controls_section(
                'section_counter_separators', [
            'label' => __('Dividers', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'icon_divider', [
            'label' => __('Icon Divider', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
            'label_on' => __('On', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('Off', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => 'yes',
            'condition' => [
                'sa_el_icon_type!' => 'none',
            ],
                ]
        );

        $this->add_control(
                'num_divider', [
            'label' => __('Number Divider', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'no',
            'label_on' => __('On', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('Off', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => 'yes',
                ]
        );

        $this->end_controls_section();

        /**
         * Content Tab: Settings
         */
        $this->start_controls_section(
                'section_counter_settings', [
            'label' => __('Settings', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_responsive_control(
                'counter_speed', [
            'label' => __('Counting Speed', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => ['size' => 1500],
            'range' => [
                'px' => [
                    'min' => 100,
                    'max' => 2000,
                    'step' => 1,
                ],
            ],
            'size_units' => '',
                ]
        );

        $this->end_controls_section();
        $this->end_controls_section();
        if (!apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', ['', '', TRUE])) {
            $this->start_controls_section(
                    'sa_el_section_pro', [
                'label' => __('Go Premium for More Features', SA_ELEMENTOR_TEXTDOMAIN)
                    ]
            );

            $this->add_control(
                    'sa_el_control_get_pro', [
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
        /**
         * STYLE TAB
         */
        /**
         * Style Tab: Counter
         */
        $this->start_controls_section(
                'section_style', [
            'label' => __('Counter', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_responsive_control(
                'counter_align', [
            'label' => __('Alignment', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::CHOOSE,
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
                'justify' => [
                    'title' => __('Justified', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-align-justify',
                ],
            ],
            'default' => 'center',
            'selectors' => [
                '{{WRAPPER}} .sa-el-counter-container' => 'text-align: {{VALUE}};',
            ],
                ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Icon
         */
        $this->start_controls_section(
                'section_counter_icon_style', [
            'label' => __('Icon', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'sa_el_icon_type!' => 'none',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Background::get_type(), [
            'name' => 'counter_icon_bg',
            'label' => __('Background', SA_ELEMENTOR_TEXTDOMAIN),
            'types' => ['none', 'classic', 'gradient'],
            'condition' => [
                'sa_el_icon_type!' => 'none',
            ],
            'selector' => '{{WRAPPER}} .sa-el-counter-icon',
                ]
        );

        $this->add_control(
                'counter_icon_color', [
            'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#e22b2b',
            'selectors' => [
                '{{WRAPPER}} .sa-el-counter-icon' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'sa_el_icon_type' => 'icon',
            ],
                ]
        );

        $this->add_responsive_control(
                'counter_icon_size', [
            'label' => __('Size', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 5,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'size_units' => ['px', 'em'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-counter-icon' => 'font-size: {{SIZE}}{{UNIT}}',
            ],
            'condition' => [
                'sa_el_icon_type' => 'icon',
            ],
                ]
        );

        $this->add_responsive_control(
                'counter_icon_img_width', [
            'label' => __('Image Width', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 10,
                    'max' => 500,
                    'step' => 1,
                ],
            ],
            'size_units' => ['px', '%'],
            'condition' => [
                'sa_el_icon_type' => 'image',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-counter-icon img' => 'width: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'counter_icon_rotation', [
            'label' => __('Rotation', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 360,
                    'step' => 1,
                ],
            ],
            'size_units' => '',
            'condition' => [
                'sa_el_icon_type!' => 'none',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-counter-icon .fa, {{WRAPPER}} .sa-el-counter-icon img' => 'transform: rotate( {{SIZE}}deg );',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'counter_icon_border',
            'label' => __('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'placeholder' => '1px',
            'default' => '1px',
            'selector' => '{{WRAPPER}} .sa-el-counter-icon',
            'condition' => [
                'sa_el_icon_type!' => 'none',
            ],
                ]
        );

        $this->add_control(
                'counter_icon_border_radius', [
            'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-counter-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'sa_el_icon_type!' => 'none',
            ],
                ]
        );

        $this->add_responsive_control(
                'counter_icon_padding', [
            'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'placeholder' => [
                'top' => '',
                'right' => '',
                'bottom' => '',
                'left' => '',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-counter-icon' => 'padding-top: {{TOP}}{{UNIT}}; padding-left: {{LEFT}}{{UNIT}}; padding-right: {{RIGHT}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}};',
            ],
            'condition' => [
                'sa_el_icon_type!' => 'none',
            ],
                ]
        );

        $this->add_responsive_control(
                'counter_icon_margin', [
            'label' => __('Margin', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'placeholder' => [
                'top' => '',
                'right' => '',
                'bottom' => '',
                'left' => '',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-counter-icon-wrap' => 'margin-top: {{TOP}}{{UNIT}}; margin-left: {{LEFT}}{{UNIT}}; margin-right: {{RIGHT}}{{UNIT}}; margin-bottom: {{BOTTOM}}{{UNIT}};',
            ],
            'condition' => [
                'sa_el_icon_type!' => 'none',
            ],
                ]
        );

        $this->add_control(
                'icon_divider_heading', [
            'label' => __('Icon Divider', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
            'condition' => [
                'sa_el_icon_type!' => 'none',
                'icon_divider' => 'yes',
            ],
                ]
        );

        $this->add_control(
                'icon_divider_type', [
            'label' => __('Divider Type', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'dashed',
            'options' => [
                'solid' => __('Solid', SA_ELEMENTOR_TEXTDOMAIN),
                'double' => __('Double', SA_ELEMENTOR_TEXTDOMAIN),
                'dotted' => __('Dotted', SA_ELEMENTOR_TEXTDOMAIN),
                'dashed' => __('Dashed', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-counter-icon-divider' => 'border-bottom-style: {{VALUE}}',
            ],
            'condition' => [
                'sa_el_icon_type!' => 'none',
                'icon_divider' => 'yes',
            ],
                ]
        );

        $this->add_responsive_control(
                'icon_divider_height', [
            'label' => __('Height', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 3,
            ],
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 20,
                    'step' => 1,
                ],
            ],
            'size_units' => ['px'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-counter-icon-divider' => 'border-bottom-width: {{SIZE}}{{UNIT}}',
            ],
            'condition' => [
                'sa_el_icon_type!' => 'none',
                'icon_divider' => 'yes',
            ],
                ]
        );

        $this->add_responsive_control(
                'icon_divider_width', [
            'label' => __('Width', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 94,
            ],
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 1000,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 1,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-counter-icon-divider' => 'width: {{SIZE}}{{UNIT}}',
            ],
            'condition' => [
                'sa_el_icon_type!' => 'none',
                'icon_divider' => 'yes',
            ],
                ]
        );

        $this->add_control(
                'icon_divider_color', [
            'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#474747',
            'selectors' => [
                '{{WRAPPER}} .sa-el-counter-icon-divider' => 'border-bottom-color: {{VALUE}}',
            ],
            'condition' => [
                'sa_el_icon_type!' => 'none',
                'icon_divider' => 'yes',
            ],
                ]
        );

        $this->add_responsive_control(
                'icon_divider_margin', [
            'label' => __('Spacing', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 30,
                    'step' => 1,
                ],
            ],
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-counter-icon-divider-wrap' => 'margin-bottom: {{SIZE}}{{UNIT}}',
            ],
            'condition' => [
                'sa_el_icon_type!' => 'none',
                'icon_divider' => 'yes',
            ],
                ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Number
         */
        $this->start_controls_section(
                'section_counter_num_style', [
            'label' => __('Number', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'counter_num_color', [
            'label' => __('Number Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#e22b2b',
            'selectors' => [
                '{{WRAPPER}} .sa-el-counter-number' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'counter_num_typography',
            'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa-el-counter-number-wrap',
                ]
        );

        $this->add_responsive_control(
                'counter_num_margin', [
            'label' => __('Margin', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'placeholder' => [
                'top' => '',
                'right' => '',
                'bottom' => '',
                'left' => '',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-counter-number-wrap' => 'margin-top: {{TOP}}{{UNIT}}; margin-left: {{LEFT}}{{UNIT}}; margin-right: {{RIGHT}}{{UNIT}}; margin-bottom: {{BOTTOM}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'num_divider_heading', [
            'label' => __('Number Divider', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
            'condition' => [
                'num_divider' => 'yes',
            ],
                ]
        );

        $this->add_control(
                'num_divider_type', [
            'label' => __('Divider Type', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'dashed',
            'options' => [
                'solid' => __('Solid', SA_ELEMENTOR_TEXTDOMAIN),
                'double' => __('Double', SA_ELEMENTOR_TEXTDOMAIN),
                'dotted' => __('Dotted', SA_ELEMENTOR_TEXTDOMAIN),
                'dashed' => __('Dashed', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-counter-num-divider' => 'border-bottom-style: {{VALUE}}',
            ],
            'condition' => [
                'num_divider' => 'yes',
            ],
                ]
        );

        $this->add_responsive_control(
                'num_divider_height', [
            'label' => __('Height', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 3,
            ],
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 20,
                    'step' => 1,
                ],
            ],
            'size_units' => ['px'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-counter-num-divider' => 'border-bottom-width: {{SIZE}}{{UNIT}}',
            ],
            'condition' => [
                'num_divider' => 'yes',
            ],
                ]
        );

        $this->add_responsive_control(
                'num_divider_width', [
            'label' => __('Width', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 94,
            ],
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 1000,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 1,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-counter-num-divider' => 'width: {{SIZE}}{{UNIT}}',
            ],
            'condition' => [
                'num_divider' => 'yes',
            ],
                ]
        );

        $this->add_control(
                'num_divider_color', [
            'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#474747',
            'selectors' => [
                '{{WRAPPER}} .sa-el-counter-num-divider' => 'border-bottom-color: {{VALUE}}',
            ],
            'condition' => [
                'num_divider' => 'yes',
            ],
                ]
        );

        $this->add_responsive_control(
                'num_divider_margin', [
            'label' => __('Spacing', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 30,
                    'step' => 1,
                ],
            ],
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-counter-num-divider-wrap' => 'margin-bottom: {{SIZE}}{{UNIT}}',
            ],
            'condition' => [
                'num_divider' => 'yes',
            ],
                ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Prefix
         */
        $this->start_controls_section(
                'section_number_prefix_style', [
            'label' => __('Prefix', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'number_prefix!' => '',
            ],
                ]
        );

        $this->add_control(
                'number_prefix_color', [
            'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa-el-counter-number-prefix' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'number_prefix!' => '',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'number_prefix_typography',
            'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa-el-counter-number-prefix',
            'condition' => [
                'number_prefix!' => '',
            ],
                ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Suffix
         */
        $this->start_controls_section(
                'section_number_suffix_style', [
            'label' => __('Suffix', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'number_suffix!' => '',
            ],
                ]
        );

        $this->add_control(
                'section_number_suffix_color', [
            'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa-el-counter-number-suffix' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'number_suffix!' => '',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'section_number_suffix_typography',
            'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa-el-counter-number-suffix',
            'condition' => [
                'number_suffix!' => '',
            ],
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'section_counter_title_style', [
            'label' => __('Title', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'counter_title!' => '',
            ],
                ]
        );

        $this->add_control(
                'counter_title_color', [
            'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa-el-counter-title' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'counter_title!' => '',
            ],
                ]
        );

        $this->add_control(
                'counter_title_bg_color', [
            'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa-el-counter-title' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'counter_title!' => '',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'counter_title_typography',
            'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa-el-counter-title',
            'condition' => [
                'counter_title!' => '',
            ],
                ]
        );

        $this->add_responsive_control(
                'counter_title_margin', [
            'label' => __('Margin', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'placeholder' => [
                'top' => '',
                'right' => '',
                'bottom' => '',
                'left' => '',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-counter-title' => 'margin-top: {{TOP}}{{UNIT}}; margin-left: {{LEFT}}{{UNIT}}; margin-right: {{RIGHT}}{{UNIT}}; margin-bottom: {{BOTTOM}}{{UNIT}};',
            ],
            'condition' => [
                'counter_title!' => '',
            ],
                ]
        );

        $this->add_responsive_control(
                'counter_title_padding', [
            'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'placeholder' => [
                'top' => '',
                'right' => '',
                'bottom' => '',
                'left' => '',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-counter-title' => 'padding-top: {{TOP}}{{UNIT}}; padding-left: {{LEFT}}{{UNIT}}; padding-right: {{RIGHT}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}};',
            ],
            'condition' => [
                'counter_title!' => '',
            ],
                ]
        );

        $this->end_controls_section();
    }

    /**
     * Render counter widget output on the frontend.
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

        $this->add_render_attribute('counter', 'class', 'sa-el-counter sa-el-counter-' . esc_attr($this->get_id()));

        if ($settings['counter_layout']) {
            $this->add_render_attribute('counter', 'class', 'sa-el-counter-' . $settings['counter_layout']);
        }

        $this->add_render_attribute('counter', 'data-target', '.sa-el-counter-number-' . esc_attr($this->get_id()));

        $this->add_render_attribute('counter-number', 'class', 'sa-el-counter-number sa-el-counter-number-' . esc_attr($this->get_id()));

        if ($settings['ending_number'] != '') {
            $this->add_render_attribute('counter-number', 'data-to', $settings['ending_number']);
        }

        if ($settings['counter_speed']['size'] != '') {
            $this->add_render_attribute('counter-number', 'data-speed', $settings['counter_speed']['size']);
        }

        $this->add_inline_editing_attributes('counter_title', 'none');
        $this->add_render_attribute('counter_title', 'class', 'sa-el-counter-title');
        ?>
        <div class="sa-el-counter-container">
            <div <?php echo $this->get_render_attribute_string('counter'); ?>>
                <?php if ($settings['counter_layout'] == 'layout-1' || $settings['counter_layout'] == 'layout-5' || $settings['counter_layout'] == 'layout-6') { ?>
                    <?php
                    // Counter icon
                    $this->render_icon();
                    ?>

                    <div class="sa-el-counter-number-title-wrap">
                        <div class="sa-el-counter-number-wrap">
                            <?php
                            if ($settings['number_prefix'] != '') {
                                printf('<span class="sa-el-counter-number-prefix">%1$s</span>', $settings['number_prefix']);
                            }
                            ?>
                            <div <?php echo $this->get_render_attribute_string('counter-number'); ?>>
                                0
                            </div>
                            <?php
                            if ($settings['number_suffix'] != '') {
                                printf('<span class="sa-el-counter-number-suffix">%1$s</span>', $settings['number_suffix']);
                            }
                            ?>
                        </div>

                        <?php if ($settings['num_divider'] == 'yes') { ?>
                            <div class="sa-el-counter-num-divider-wrap">
                                <span class="sa-el-counter-num-divider"></span>
                            </div>
                        <?php } ?>

                        <?php
                        if (!empty($settings['counter_title'])) {
                            printf('<%1$s %2$s>', $settings['title_html_tag'], $this->get_render_attribute_string('counter_title'));
                            echo $settings['counter_title'];
                            printf('</%1$s>', $settings['title_html_tag']);
                        }
                        ?>
                    </div>
                <?php } elseif ($settings['counter_layout'] == 'layout-2') { ?>
                    <?php
                    // Counter icon
                    $this->render_icon();

                    if (!empty($settings['counter_title'])) {
                        printf('<%1$s %2$s>', $settings['title_html_tag'], $this->get_render_attribute_string('counter_title'));
                        echo $settings['counter_title'];
                        printf('</%1$s>', $settings['title_html_tag']);
                    }
                    ?>

                    <div class="sa-el-counter-number-wrap">
                        <?php
                        if ($settings['number_prefix'] != '') {
                            printf('<span class="sa-el-counter-number-prefix">%1$s</span>', $settings['number_prefix']);
                        }
                        ?>
                        <div <?php echo $this->get_render_attribute_string('counter-number'); ?>>
                            0
                        </div>
                        <?php
                        if ($settings['number_suffix'] != '') {
                            printf('<span class="sa-el-counter-number-suffix">%1$s</span>', $settings['number_suffix']);
                        }
                        ?>
                    </div>

                    <?php if ($settings['num_divider'] == 'yes') { ?>
                        <div class="sa-el-counter-num-divider-wrap">
                            <span class="sa-el-counter-num-divider"></span>
                        </div>
                    <?php } ?>
                <?php } elseif ($settings['counter_layout'] == 'layout-3') { ?>
                    <div class="sa-el-counter-number-wrap">
                        <?php
                        if ($settings['number_prefix'] != '') {
                            printf('<span class="sa-el-counter-number-prefix">%1$s</span>', $settings['number_prefix']);
                        }
                        ?>
                        <div <?php echo $this->get_render_attribute_string('counter-number'); ?>>
                            0
                        </div>
                        <?php
                        if ($settings['number_suffix'] != '') {
                            printf('<span class="sa-el-counter-number-suffix">%1$s</span>', $settings['number_suffix']);
                        }
                        ?>
                    </div>

                    <?php if ($settings['num_divider'] == 'yes') { ?>
                        <div class="sa-el-counter-num-divider-wrap">
                            <span class="sa-el-counter-num-divider"></span>
                        </div>
                    <?php } ?>

                    <div class="sa-el-icon-title-wrap">
                        <?php
                        // Counter icon
                        $this->render_icon();

                        if (!empty($settings['counter_title'])) {
                            printf('<%1$s %2$s>', $settings['title_html_tag'], $this->get_render_attribute_string('counter_title'));
                            echo $settings['counter_title'];
                            printf('</%1$s>', $settings['title_html_tag']);
                        }
                        ?>
                    </div>
                <?php } elseif ($settings['counter_layout'] == 'layout-4') { ?>
                    <div class="sa-el-icon-title-wrap">
                        <?php
                        // Counter icon
                        $this->render_icon();

                        if (!empty($settings['counter_title'])) {
                            printf('<%1$s %2$s>', $settings['title_html_tag'], $this->get_render_attribute_string('counter_title'));
                            echo $settings['counter_title'];
                            printf('</%1$s>', $settings['title_html_tag']);
                        }
                        ?>
                    </div>

                    <div class="sa-el-counter-number-wrap">
                        <?php
                        if ($settings['number_prefix'] != '') {
                            printf('<span class="sa-el-counter-number-prefix">%1$s</span>', $settings['number_prefix']);
                        }
                        ?>
                        <div <?php echo $this->get_render_attribute_string('counter-number'); ?>>
                            0
                        </div>
                        <?php
                        if ($settings['number_suffix'] != '') {
                            printf('<span class="sa-el-counter-number-suffix">%1$s</span>', $settings['number_suffix']);
                        }
                        ?>
                    </div>

                    <?php if ($settings['num_divider'] == 'yes') { ?>
                        <div class="sa-el-counter-num-divider-wrap">
                            <span class="sa-el-counter-num-divider"></span>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div><!-- .sa-el-counter-container -->
        <?php
    }

    /**
     * Render counter icon output on the frontend.
     */
    private function render_icon() {
        $settings = $this->get_settings_for_display();

        if ($settings['sa_el_icon_type'] == 'icon') {
            if (!empty($settings['counter_icon'])) {
                ?>
                <span class="sa-el-counter-icon-wrap">
                    <span class="sa-el-counter-icon">
                        <span class="<?php echo $settings['counter_icon'] ?>" aria-hidden="true"></span>
                    </span>
                </span>
                <?php
            }
        } elseif ($settings['sa_el_icon_type'] == 'image') {
            $image = $settings['icon_image'];
            if ($image['url']) {
                ?>
                <span class="sa-el-counter-icon-wrap">
                    <span class="sa-el-counter-icon sa-el-counter-icon-img">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr(get_post_meta($image['id'], '_wp_attachment_image_alt', true)); ?>">
                    </span>
                </span>
                <?php
            }
        }

        if ($settings['icon_divider'] == 'yes') {
            if ($settings['counter_layout'] == 'layout-1' || $settings['counter_layout'] == 'layout-2') {
                ?>
                <div class="sa-el-counter-icon-divider-wrap">
                    <span class="sa-el-counter-icon-divider"></span>
                </div>
                <?php
            }
        }
    }

    /**
     * Render counter icon output in the editor.
     */
    protected function _icon_template() {
        ?>
        <# if ( settings.sa_el_icon_type == 'icon' ) { #>
        <# if ( settings.counter_icon != '' ) { #>
        <span class="sa-el-counter-icon-wrap">
            <span class="sa-el-counter-icon">
                <span class="{{ settings.counter_icon }}" aria-hidden="true"></span>
            </span>
        </span>
        <# } #>
        <# } else if ( settings.sa_el_icon_type == 'image' ) { #>
        <# if ( settings.icon_image.url != '' ) { #>
        <span class="sa-el-counter-icon-wrap">
            <span class="sa-el-counter-icon sa-el-counter-icon-img">
                <img src="{{ settings.icon_image.url }}">
            </span>
        </span>
        <# } #>
        <# } #>

        <# if ( settings.icon_divider == 'yes' ) { #>
        <# if ( settings.counter_layout == 'layout-1' || settings.counter_layout == 'layout-2' ) { #>
        <div class="sa-el-counter-icon-divider-wrap">
            <span class="sa-el-counter-icon-divider"></span>
        </div>
        <# } #>
        <# } #>
        <?php
    }

    /**
     * Render counter number output in the editor.
     */
    protected function _number_template() {
        ?>
        <div class="sa-el-counter-number-wrap">
            <#
            if ( settings.number_prefix != '' ) {
            var prefix = settings.number_prefix;

            view.addRenderAttribute( 'prefix', 'class', 'sa-el-counter-number-prefix' );

            var prefix_html = '<span' + ' ' + view.getRenderAttributeString( 'prefix' ) + '>' + prefix + '</span>';

            print( prefix_html );
            }
            #>
            <div class="sa-el-counter-number" data-to="{{ settings.ending_number }}" data-speed="{{ settings.counter_speed.size }}">
                0
            </div>
            <#
            if ( settings.number_suffix != '' ) {
            var suffix = settings.number_suffix;

            view.addRenderAttribute( 'suffix', 'class', 'sa-el-counter-number-suffix' );

            var suffix_html = '<span' + ' ' + view.getRenderAttributeString( 'suffix' ) + '>' + suffix + '</span>';

            print( suffix_html );
            }
            #>
        </div>
        <?php
    }

    /**
     * Render counter title output in the editor.
     */
    protected function _title_template() {
        ?>
        <#
        if ( settings.counter_title != '' ) {
        var title = settings.counter_title;

        view.addRenderAttribute( 'counter_title', 'class', 'sa-el-counter-title' );

        view.addInlineEditingAttributes( 'counter_title' );

        var title_html = '<' + settings.title_html_tag  + ' ' + view.getRenderAttributeString( 'counter_title' ) + '>' + title + '</' + settings.title_html_tag + '>';

        print( title_html );
        }
        #>
        <?php
    }

    /**
     * Render counter widget output in the editor.
     */
    protected function _content_template() {
        ?>
        <div class="sa-el-counter-container">
            <div class="sa-el-counter sa-el-counter-{{ settings.counter_layout }}" data-target=".sa-el-counter-number">
                <# if ( settings.counter_layout == 'layout-1' || settings.counter_layout == 'layout-5' || settings.counter_layout == 'layout-6' ) { #>
                <?php
                // Counter icon
                $this->_icon_template();
                ?>

                <div class="sa-el-counter-number-title-wrap">
                    <?php
                    // Counter number
                    $this->_number_template();
                    ?>

                    <# if ( settings.num_divider == 'yes' ) { #>
                    <div class="sa-el-counter-num-divider-wrap">
                        <span class="sa-el-counter-num-divider"></span>
                    </div>
                    <# } #>

                    <?php
                    // Title number
                    $this->_title_template();
                    ?>
                </div>
                <# } else if ( settings.counter_layout == 'layout-2' ) { #>
                <?php
                // Counter icon
                $this->_icon_template();

                // Title number
                $this->_title_template();

                // Counter number
                $this->_number_template();
                ?>

                <# if ( settings.num_divider == 'yes' ) { #>
                <div class="sa-el-counter-num-divider-wrap">
                    <span class="sa-el-counter-num-divider"></span>
                </div>
                <# } #>
                <# } else if ( settings.counter_layout == 'layout-3' ) { #>
                <?php
                // Counter number
                $this->_number_template();
                ?>

                <# if ( settings.num_divider == 'yes' ) { #>
                <div class="sa-el-counter-num-divider-wrap">
                    <span class="sa-el-counter-num-divider"></span>
                </div>
                <# } #>

                <div class="sa-el-icon-title-wrap">
                    <?php
                    // Counter icon
                    $this->_icon_template();

                    // Title number
                    $this->_title_template();
                    ?>
                </div>
                <# } else if ( settings.counter_layout == 'layout-4' ) { #>
                <div class="sa-el-icon-title-wrap">
                    <?php
                    // Counter icon
                    $this->_icon_template();

                    // Title number
                    $this->_title_template();
                    ?>
                </div>

                <?php
                // Counter number
                $this->_number_template();
                ?>

                <# if ( settings.num_divider == 'yes' ) { #>
                <div class="sa-el-counter-num-divider-wrap">
                    <span class="sa-el-counter-num-divider"></span>
                </div>
                <# } #>
                <# } #>
            </div>
        </div><!-- .sa-el-counter-container -->
        <?php
    }

}
