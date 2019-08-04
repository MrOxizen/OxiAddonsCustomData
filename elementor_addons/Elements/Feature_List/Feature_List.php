<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Feature_List;

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Group_Control_Background as Group_Control_Background;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Scheme_Color as Scheme_Color;
use \Elementor\Scheme_Typography as Scheme_Typography;
use \Elementor\Utils as Utils;
use \Elementor\Widget_Base as Widget_Base;

class Feature_List extends Widget_Base
{

    public function get_name()
    {
        return 'sa_el_feature_list';
    }

    public function get_title()
    {
        return esc_html__('Feature List', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon()
    {
        return 'eicon-bullet-list  oxi-el-admin-icon';
    }

    public function get_categories()
    {
        return ['sa-el-addons'];
    }

    protected function _register_controls()
    {
        /**
         * Feature List Settings
         */
        $this->start_controls_section(
            'sa_el_section_feature_list_content_settings',
            [
                'label' => esc_html__('Content Settings', SA_ELEMENTOR_TEXTDOMAIN)
            ]
        );

        $this->add_control(
            'sa_el_feature_list',
            [
                'label' => esc_html__('Feature Item', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::REPEATER,
                'seperator' => 'before',
                'default' => [
                    [
                        'sa_el_feature_list_icon' => 'fa fa-check',
                        'sa_el_feature_list_title' => esc_html__('Feature Item 1', SA_ELEMENTOR_TEXTDOMAIN),
                        'sa_el_feature_list_content' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisi cing elit, sed do eiusmod tempor incididunt ut abore et dolore magna', SA_ELEMENTOR_TEXTDOMAIN)
                    ],
                    [
                        'sa_el_feature_list_icon' => 'fa fa-times',
                        'sa_el_feature_list_title' => esc_html__('Feature Item 2', SA_ELEMENTOR_TEXTDOMAIN),
                        'sa_el_feature_list_content' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisi cing elit, sed do eiusmod tempor incididunt ut abore et dolore magna', SA_ELEMENTOR_TEXTDOMAIN)
                    ],
                    [
                        'sa_el_feature_list_icon' => 'fa fa-dot-circle-o',
                        'sa_el_feature_list_title' => esc_html__('Feature Item 3', SA_ELEMENTOR_TEXTDOMAIN),
                        'sa_el_feature_list_content' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisi cing elit, sed do eiusmod tempor incididunt ut abore et dolore magna', SA_ELEMENTOR_TEXTDOMAIN)
                    ]
                ],
                'fields' => [
                    [
                        'name' => 'sa_el_feature_list_icon_type',
                        'label' => esc_html__('Icon Type', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::CHOOSE,
                        'options' => [
                            'icon' => [
                                'title' => esc_html__('Icon', SA_ELEMENTOR_TEXTDOMAIN),
                                'icon' => 'fa fa-star',
                            ],
                            'image' => [
                                'title' => esc_html__('Image', SA_ELEMENTOR_TEXTDOMAIN),
                                'icon' => 'fa fa-picture-o',
                            ],
                        ],
                        'default' => 'icon',
                        'label_block' => false,
                    ],
                    [
                        'name' => 'sa_el_feature_list_icon',
                        'label' => esc_html__('Icon', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::ICON,
                        'default' => 'fa fa-plus',
                        'condition' => [
                            'sa_el_feature_list_icon_type' => 'icon'
                        ]
                    ],
                    [
                        'name' => 'sa_el_feature_list_img',
                        'label' => esc_html__('Image', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'condition' => [
                            'sa_el_feature_list_icon_type' => 'image'
                        ]
                    ],
                    [
                        'name' => 'sa_el_feature_list_title',
                        'label' => esc_html__('Title', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::TEXT,
                        'default' => esc_html__('Title', SA_ELEMENTOR_TEXTDOMAIN),
                        'dynamic' => ['active' => true]
                    ],
                    [
                        'name' => 'sa_el_feature_list_content',
                        'label' => esc_html__('Content', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => esc_html__('Consectetur adipisicing elit. Optio, neque qui velit. Magni dolorum quidem ipsam eligendi, totam, facilis laudantium cum accusamus ullam voluptatibus commodi numquam, error, est. Ea, consequatur.', SA_ELEMENTOR_TEXTDOMAIN),
                        'dynamic' => ['active' => true]
                    ],
                    [
                        'name' => 'sa_el_feature_list_link',
                        'label' => esc_html__('Link', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::URL,
                        'dynamic' => ['active' => true],
                        'placeholder' => esc_html__('https://your-link.com', SA_ELEMENTOR_TEXTDOMAIN),
                        'separator' => 'before',
                    ],
                ],
                'title_field' => '<i class="{{ sa_el_feature_list_icon }}" aria-hidden="true"></i> {{{ sa_el_feature_list_title }}}',
            ]
        );

        $this->add_control(
            'sa_el_feature_list_title_size',
            [
                'label' => esc_html__('Title HTML Tag', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                    'div' => 'div',
                    'span' => 'span',
                    'p' => 'p',
                ],
                'default' => 'h3',
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'sa_el_feature_list_icon_shape',
            [
                'label' => esc_html__('Icon Shape', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'circle',
                'label_block' => false,
                'options' => [
                    'circle' => esc_html__('Circle', SA_ELEMENTOR_TEXTDOMAIN),
                    'square' => esc_html__('Square', SA_ELEMENTOR_TEXTDOMAIN),
                    'rhombus' => esc_html__('Rhombus', SA_ELEMENTOR_TEXTDOMAIN),
                ],
            ]
        );

        $this->add_control(
            'sa_el_feature_list_icon_shape_view',
            [
                'label' => esc_html__('Shape View', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'stacked',
                'label_block' => false,
                'options' => [
                    'framed' => esc_html__('Framed', SA_ELEMENTOR_TEXTDOMAIN),
                    'stacked' => esc_html__('Stacked', SA_ELEMENTOR_TEXTDOMAIN)
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_el_feature_list_icon_position',
            [
                'label' => esc_html__('Icon Position', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'fa fa-align-left',
                    ],
                    'top' => [
                        'title' => esc_html__('Top', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'left',
                'devices' => ['desktop', 'tablet', 'mobile'],
                'desktop_default' => 'left',
                'tablet_default' => 'left',
                'mobile_default' => 'left',
                'prefix_class' => '%s-icon-position-',
                'toggle' => false,
            ]
        );

        $this->add_control(
            'sa_el_feature_list_connector',
            [
                'label' => esc_html__('Show Connector', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'label_on' => esc_html__('Show', SA_ELEMENTOR_TEXTDOMAIN),
                'label_off' => esc_html__('No', SA_ELEMENTOR_TEXTDOMAIN),
                'return_value' => 'yes',
            ]
        );

        $this->end_controls_section();

        if (!apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', ['', '', TRUE])) {
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
        /**
         * -------------------------------------------
         * Feature List Style
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_feature_list_style',
            [
                'label' => esc_html__('List', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'sa_el_feature_list_space_between',
            [
                'label' => esc_html__('Space Between', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 15,
                ],
                'range' => [
                    'px' => [
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_feature_list_items .sa_el_feature_list_item:not(:last-child)' => 'padding-bottom: calc({{SIZE}}{{UNIT}}/2)',
                    '{{WRAPPER}} .sa_el_feature_list_items .sa_el_feature_list_item:not(:first-child)' => 'margin-top: calc({{SIZE}}{{UNIT}}/2)',
                    '{{WRAPPER}} .sa_el_feature_list_items.connector_type_modern .sa_el_feature_list_item:not(:last-child):before' => 'height: calc(100% + {{SIZE}}{{UNIT}})',
                    'body.rtl {{WRAPPER}} .sa_el_feature_list_items .sa_el_feature_list_item:after' => 'left: calc(-{{SIZE}}{{UNIT}}/2)',
                ],
            ]
        );

        $this->add_control(
            'sa_el_feature_list_connector_type',
            [
                'label' => esc_html__('Connector Type', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'connector_type_classic',
                'label_block' => false,
                'options' => [
                    'connector_type_classic' => esc_html__('Classic', SA_ELEMENTOR_TEXTDOMAIN),
                    'connector_type_modern' => esc_html__('Modern', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                'condition' => [
                    'sa_el_feature_list_connector' => 'yes',
                    'sa_el_feature_list_icon_position!' => 'top',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'sa_el_feature_list_connector_styles',
            [
                'label' => esc_html__('Connector Styles', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'solid',
                'label_block' => false,
                'options' => [
                    'solid' => esc_html__('Solid', SA_ELEMENTOR_TEXTDOMAIN),
                    'dashed' => esc_html__('Dashed', SA_ELEMENTOR_TEXTDOMAIN),
                    'dotted' => esc_html__('Dotted', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                'condition' => [
                    'sa_el_feature_list_connector' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .connector_type_classic .connector' => 'border-style: {{VALUE}};',
                    '{{WRAPPER}} .connector_type_modern .sa_el_feature_list_item:before, {{WRAPPER}} .connector_type_modern .sa_el_feature_list_item:after' => 'border-style: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_feature_list_connector_color',
            [
                'label' => esc_html__('Connector Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default' => '#37368e',
                'selectors' => [
                    '{{WRAPPER}} .connector_type_classic .connector' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .connector_type_modern .sa_el_feature_list_item:before, {{WRAPPER}} .connector_type_modern .sa_el_feature_list_item:after' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'sa_el_feature_list_connector' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'sa_el_feature_list_connector_width',
            [
                'label' => esc_html__('Connector Width', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 1,
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 5,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .connector_type_classic .connector' => 'border-width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}}.-icon-position-left .connector_type_modern .sa_el_feature_list_item:before, {{WRAPPER}}.-icon-position-left .connector_type_modern .sa_el_feature_list_item:after' => 'border-width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}}.-icon-position-right .connector_type_modern .sa_el_feature_list_item:before, {{WRAPPER}}.-icon-position-right .connector_type_modern .sa_el_feature_list_item:after' => 'border-width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'sa_el_feature_list_connector' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Feature List Icon Style
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_feature_list_style_icon',
            [
                'label' => esc_html__('Icon', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sa_el_feature_list_icon_background',
                'types' => ['classic', 'gradient'],
                'exclude' => [
                    'image',
                ],
                'color' => [
                    'default' => '#39B54A',
                ],
                'selector' => '{{WRAPPER}} .sa_el_feature_list_items .sa_el_feature_list_icon_box .sa_el_feature_list_icon_inner',
            ]
        );

        $this->add_control(
            'sa_el_feature_list_secondary_color',
            [
                'label' => esc_html__('Secondary Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_feature_list_items.framed .sa_el_feature_list_icon' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'sa_el_feature_list_icon_shape_view' => 'framed',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'sa_el_feature_list_icon_color',
            [
                'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_feature_list_items .sa_el_feature_list_icon' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'sa_el_feature_list_icon_size',
            [
                'label' => esc_html__('Size', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 30,
                ],
                'range' => [
                    'px' => [
                        'min' => 6,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_feature_list_icon_box .sa_el_feature_list_icon' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .sa_el_feature_list_img' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_el_feature_list_icon_padding',
            [
                'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 15,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_feature_list_icon_box .sa_el_feature_list_icon' => 'padding: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_feature_list_icon_border_width',
            [
                'label' => esc_html__('Border Width', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 1,
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_feature_list_icon_box .sa_el_feature_list_icon_inner' => 'padding: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'sa_el_feature_list_icon_shape_view' => 'framed',
                ],
            ]
        );

        $this->add_control(
            'sa_el_feature_list_icon_border_radius',
            [
                'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_feature_list_icon_box .sa_el_feature_list_icon_inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .sa_el_feature_list_icon_box .sa_el_feature_list_icon_inner .sa_el_feature_list_icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'sa_el_feature_list_icon_shape_view' => 'framed',
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_el_feature_list_icon_space',
            [
                'label' => esc_html__('Spacing', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'desktop_default' => [
                    'size' => 30,
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'size' => 20,
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'size' => 10,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}}.-icon-position-left .sa_el_feature_list_content_box, {{WRAPPER}}.-icon-position-right .sa_el_feature_list_content_box, {{WRAPPER}}.-icon-position-top .sa_el_feature_list_content_box' => 'margin: {{SIZE}}{{UNIT}};',
                    '(mobile){{WRAPPER}}.-mobile-icon-position-left .sa_el_feature_list_content_box' => 'margin: 0 0 0 {{SIZE}}{{UNIT}} !important;',
                    '(mobile){{WRAPPER}}.-mobile-icon-position-right .sa_el_feature_list_content_box' => 'margin: 0 {{SIZE}}{{UNIT}} 0 0 !important;',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Feature List Content Style
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_feature_list_style_content',
            [
                'label' => esc_html__('Content', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'sa_el_feature_list_text_align',
            [
                'label' => __('Alignment', 'elementor'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'elementor'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'elementor'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'elementor'),
                        'icon' => 'fa fa-align-right',
                    ],
                    'justify' => [
                        'title' => __('Justified', 'elementor'),
                        'icon' => 'fa fa-align-justify',
                    ],
                ],
                'condition' => [
                    'sa_el_feature_list_icon_position' => 'top',
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_feature_list_content_box' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_feature_list_heading_title',
            [
                'label' => esc_html__('Title', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_responsive_control(
            'sa_el_feature_list_title_bottom_space',
            [
                'label' => esc_html__('Spacing', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 10,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_feature_list_title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_feature_list_title_color',
            [
                'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#414247',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_feature_list_content_box .sa_el_feature_list_title' => 'color: {{VALUE}};',
                ],
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_el_feature_list_title_typography',
                'selector' => '{{WRAPPER}} .sa_el_feature_list_content_box .sa_el_feature_list_title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
            ]
        );

        $this->add_control(
            'sa_el_feature_list_description',
            [
                'label' => esc_html__('Description', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'sa_el_feature_list_description_color',
            [
                'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_feature_list_content_box .sa_el_feature_list_content' => 'color: {{VALUE}};',
                ],
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_3,
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_el_feature_list_description_typography',
                'selector' => '{{WRAPPER}} .sa_el_feature_list_content_box .sa_el_feature_list_content',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
                'fields_options' => [
                    'font_size' => ['default' => ['unit' => 'px', 'size' => 14]]
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $this->add_render_attribute('sa_el_feature_list', [
            'id' => 'sa_el_feature_list_' . esc_attr($this->get_id()),
            'class' => [
                'sa_el_feature_list_items',
                $settings['sa_el_feature_list_icon_shape'],
                $settings['sa_el_feature_list_icon_shape_view'],
                $settings['sa_el_feature_list_connector_type'],
            ]
        ]);

        if (($settings['sa_el_feature_list_icon_position'] == 'top') && ($settings['sa_el_feature_list_connector'] == 'yes')) {
            $this->add_render_attribute('sa_el_feature_list', 'class', 'connector_type_modern');
        }

        $this->add_render_attribute('sa_el_feature_list_item', 'class', 'sa_el_feature_list_item');

        $padding = $settings['sa_el_feature_list_icon_padding']['size'];
        $font = $settings['sa_el_feature_list_icon_size']['size'];
        $border = $settings['sa_el_feature_list_icon_border_width']['right'] + $settings['sa_el_feature_list_icon_border_width']['left'];


        if ($settings['sa_el_feature_list_icon_shape'] == 'rhombus') {
            $margin = 30;
            $connector_width = ($padding * 2) + $font + $border + $margin;
        } else {
            $connector_width = ($padding * 2) + $font + $border;
        }


        if ($settings['sa_el_feature_list_icon_position'] == 'left') {

            $connector = 'right: calc(100% - ' . $connector_width . 'px); left: 0;';
        } else {
            $connector = 'left: calc(100% - ' . $connector_width . 'px); right: 0;';
        }
        ?>

        <ul <?php echo $this->get_render_attribute_string('sa_el_feature_list'); ?>>
            <?php
            $i = 0;
            foreach ($settings['sa_el_feature_list'] as $index => $item) :

                $list_icon_setting_key = $this->get_repeater_setting_key('sa_el_feature_list_icon', 'sa_el_feature_list', $index);
                $list_title_setting_key = $this->get_repeater_setting_key('sa_el_feature_list_title', 'sa_el_feature_list', $index);
                $list_content_setting_key = $this->get_repeater_setting_key('sa_el_feature_list_content', 'sa_el_feature_list', $index);
                $list_link_setting_key = $this->get_repeater_setting_key('sa_el_feature_list_link', 'sa_el_feature_list', $index);

                $this->add_render_attribute($list_icon_setting_key, 'class', 'sa_el_feature_list_icon');
                $this->add_render_attribute($list_title_setting_key, 'class', 'sa_el_feature_list_title');

                $feat_title_tag = $settings['sa_el_feature_list_title_size'];
                if (!empty($item['sa_el_feature_list_link']['url'])) {
                    $this->add_render_attribute($list_title_setting_key, 'href', $item['sa_el_feature_list_link']['url']);

                    if ($item['sa_el_feature_list_link']['is_external']) {
                        $this->add_render_attribute($list_title_setting_key, 'target', '_blank');
                    }

                    if ($item['sa_el_feature_list_link']['nofollow']) {
                        $this->add_render_attribute($list_title_setting_key, 'rel', 'nofollow');
                    }
                    $feat_title_tag = 'a';
                }
                $this->add_render_attribute($list_content_setting_key, 'class', 'sa_el_feature_list_content');

                $feature_icon_attributes = $this->get_render_attribute_string($list_icon_setting_key);

                $feature_icon_tag = 'span';
                $feature_has_icon = !empty($item['sa_el_feature_list_icon']);

                if (!empty($item['sa_el_feature_list_link']['url'])) {
                    $this->add_render_attribute($list_link_setting_key, 'href', $item['sa_el_feature_list_link']['url']);

                    if ($item['sa_el_feature_list_link']['is_external']) {
                        $this->add_render_attribute($list_link_setting_key, 'target', '_blank');
                    }

                    if ($item['sa_el_feature_list_link']['nofollow']) {
                        $this->add_render_attribute($list_link_setting_key, 'rel', 'nofollow');
                    }

                    $feature_icon_tag = 'a';
                }

                $feature_link_attributes = $this->get_render_attribute_string($list_link_setting_key);
                ?>
                <li class="sa_el_feature_list_item">
                    <?php if ('yes' == $settings['sa_el_feature_list_connector']) : ?>
                        <span class="connector" style="<?php echo $connector; ?>"></span>
                    <?php endif; ?>

                    <?php if ($feature_has_icon) : ?>

                        <div class="sa_el_feature_list_icon_box">
                            <div class="sa_el_feature_list_icon_inner">
                                <<?php
                                    echo implode(' ', [
                                        $feature_icon_tag,
                                        $feature_icon_attributes,
                                        $feature_link_attributes
                                    ]);
                                    ?>>

                                    <?php if ($item['sa_el_feature_list_icon_type'] == 'icon') { ?>
                                        <i class="<?php echo esc_attr($item['sa_el_feature_list_icon']); ?>" aria-hidden="true"></i>
                                    <?php } ?>

                                    <?php
                                    if ($item['sa_el_feature_list_icon_type'] == 'image') {
                                        $this->add_render_attribute('feature_list_image' . $i, [
                                            'src' => esc_url($item['sa_el_feature_list_img']['url']),
                                            'class' => 'sa_el_feature_list_img',
                                            'alt' => esc_attr(get_post_meta($item['sa_el_feature_list_img']['id'], '_wp_attachment_image_alt', true))
                                        ]);
                                        ?>
                                        <img <?php echo $this->get_render_attribute_string('feature_list_image' . $i); ?>>
                                    <?php } ?>

                                </<?php echo $feature_icon_tag; ?>>
                            </div>
                        </div>

                    <?php endif; ?>

                    <div class="sa_el_feature_list_content_box">
                        <<?php
                            echo implode(' ', [
                                $feat_title_tag,
                                $this->get_render_attribute_string($list_title_setting_key)
                            ]);
                            ?>><?php echo $item['sa_el_feature_list_title']; ?></<?php echo $feat_title_tag; ?>>
                        <p <?php echo $this->get_render_attribute_string($list_content_setting_key); ?>><?php echo $item['sa_el_feature_list_content']; ?></p>
                    </div>

                </li>
                <?php $i++;
            endforeach;
            ?>
        </ul>
    <?php
    }

    protected function _content_template()
    { }
}
