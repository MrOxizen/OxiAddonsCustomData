<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Tabs;

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Frontend;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Utils as Utils;
use \Elementor\Widget_Base as Widget_Base;

class Tabs extends Widget_Base {

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function get_name() {
        return 'sa_el_tabs';
    }

    public function get_title() {
        return esc_html__('Tabs', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon() {
        return 'eicon-tabs oxi-el-admin-icon';
    }

    public function get_categories() {
        return ['sa-el-addons'];
    }

    protected function _register_controls() {
        /**
         * Tabs Settings
         */
        $this->start_controls_section(
                'sa_el_section_tabs_settings', [
            'label' => esc_html__('General Settings', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );
        $this->add_control(
                'sa_el_tab_layout', [
            'label' => esc_html__('Layout', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'sa_el_tabs_horizontal',
            'label_block' => false,
            'options' => [
                'sa_el_tabs_horizontal' => esc_html__('Horizontal', SA_ELEMENTOR_TEXTDOMAIN),
                'sa_el_tabs_vertical' => esc_html__('Vertical', SA_ELEMENTOR_TEXTDOMAIN),
            ],
                ]
        );
        $this->add_control(
                'sa_el_tabs_icon_show', [
            'label' => esc_html__('Enable Icon', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
            'return_value' => 'yes',
                ]
        );
        $this->add_control(
                'sa_el_tab_icon_position', [
            'label' => esc_html__('Icon Position', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'sa_el_tab_inline_icon',
            'label_block' => false,
            'options' => [
                'sa_el_tab_top_icon' => esc_html__('Stacked', SA_ELEMENTOR_TEXTDOMAIN),
                'sa_el_tab_inline_icon' => esc_html__('Inline', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'condition' => [
                'sa_el_tabs_icon_show' => 'yes',
            ],
                ]
        );
        $this->end_controls_section();

        /**
         * Tabs Content Settings
         */
        $this->start_controls_section(
                'sa_el_section_tabs_content_settings', [
            'label' => esc_html__('Content', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );
        $this->add_control(
                'sa_el_tabs_tab', [
            'type' => Controls_Manager::REPEATER,
            'seperator' => 'before',
            'default' => [
                ['sa_el_tabs_tab_title' => esc_html__('Your Title #', SA_ELEMENTOR_TEXTDOMAIN)],
                ['sa_el_tabs_tab_title' => esc_html__('Your Title #', SA_ELEMENTOR_TEXTDOMAIN)],
                ['sa_el_tabs_tab_title' => esc_html__('Your Title #', SA_ELEMENTOR_TEXTDOMAIN)],
            ],
            'fields' => [
                [
                    'name' => 'sa_el_tabs_tab_show_as_default',
                    'label' => __('Set as Default', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::SWITCHER,
                    'default' => 'inactive',
                    'return_value' => 'active-default',
                ],
                [
                    'name' => 'sa_el_tabs_icon_type',
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
                            'icon' => 'fa fa-gear',
                        ],
                        'image' => [
                            'title' => esc_html__('Image', SA_ELEMENTOR_TEXTDOMAIN),
                            'icon' => 'fa fa-picture-o',
                        ],
                    ],
                    'default' => 'icon',
                ],
                [
                    'name' => 'sa_el_tabs_tab_title_icon',
                    'label' => esc_html__('Icon', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::ICON,
                    'default' => 'fa fa-home',
                    'condition' => [
                        'sa_el_tabs_icon_type' => 'icon',
                    ],
                ],
                [
                    'name' => 'sa_el_tabs_tab_title_image',
                    'label' => esc_html__('Image', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
                        'sa_el_tabs_icon_type' => 'image',
                    ],
                ],
                [
                    'name' => 'sa_el_tabs_tab_title',
                    'label' => esc_html__('Tab Title', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Tab Title', SA_ELEMENTOR_TEXTDOMAIN),
                    'dynamic' => ['active' => true],
                ],
                [
                    'name' => 'sa_el_tabs_text_type',
                    'label' => __('Content Type', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'content' => __('Content', SA_ELEMENTOR_TEXTDOMAIN),
                        'template' => __('Saved Templates', SA_ELEMENTOR_TEXTDOMAIN),
                    ],
                    'default' => 'content',
                ],
                [
                    'name' => 'sa_el_primary_templates',
                    'label' => __('Choose Template', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::SELECT,
                    'options' => $this->get_elementor_page_templates(),
                    'condition' => [
                        'sa_el_tabs_text_type' => 'template',
                    ],
                ],
                [
                    'name' => 'sa_el_tabs_tab_content',
                    'label' => esc_html__('Tab Content', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::WYSIWYG,
                    'default' => esc_html__('consectetur adipisicing elit. Optio, neque qui velit. Magni dolorum quidem ipsam eligendi, totam, facilis laudantium cum accusamus ullam voluptatibus commodi numquam, error, est. Ea, consequatur.', SA_ELEMENTOR_TEXTDOMAIN),
                    'dynamic' => ['active' => true],
                    'condition' => [
                        'sa_el_tabs_text_type' => 'content',
                    ],
                ],
            ],
            'title_field' => '{{sa_el_tabs_tab_title}}',
                ]
        );
        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style Tabs Generel Style
         * -------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_section_tabs_style_settings', [
            'label' => esc_html__('General', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );
        $this->add_responsive_control(
                'sa_el_tabs_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_tabs' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->add_responsive_control(
                'sa_el_tabs_margin', [
            'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_tabs' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_tabs_border',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa_el_tabs',
                ]
        );
        $this->add_responsive_control(
                'sa_el_tabs_border_radius', [
            'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_tabs' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_el_tabs_box_shadow',
            'selector' => '{{WRAPPER}} .sa_el_tabs',
                ]
        );
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
         * -------------------------------------------
         * Tab Styl Tabs Content Style
         * -------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_section_tabs_tab_style_settings', [
            'label' => esc_html__('Tab Title', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_tabs_tab_title_typography',
            'selector' => '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_nav > ul li',
                ]
        );
        $this->add_responsive_control(
                'sa_el_tabs_title_width', [
            'label' => __('Title Min Width', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px', 'em'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                    'step' => 1,
                ],
                'em' => [
                    'min' => 0,
                    'max' => 50,
                    'step' => 1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa_el_tabs.sa_el_tabs_vertical .sa_el_tabs_nav > ul' => 'min-width: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'sa_el_tab_layout' => 'sa_el_tabs_vertical',
            ],
                ]
        );
        $this->add_responsive_control(
                'sa_el_tabs_tab_icon_size', [
            'label' => __('Icon Size', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 16,
                'unit' => 'px',
            ],
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 200,
                    'step' => 1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_nav > ul li i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_nav > ul li img' => 'width: {{SIZE}}{{UNIT}};',
            ],
                ]
        );
        $this->add_responsive_control(
                'sa_el_tabs_tab_icon_gap', [
            'label' => __('Icon Gap', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 10,
                'unit' => 'px',
            ],
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa_el_tab_inline_icon li i, {{WRAPPER}} .sa_el_tab_inline_icon li img' => 'margin-right: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .sa_el_tab_top_icon li i, {{WRAPPER}} .sa_el_tab_top_icon li img' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
                ]
        );
        $this->add_responsive_control(
                'sa_el_tabs_tab_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_nav > ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->add_responsive_control(
                'sa_el_tabs_tab_margin', [
            'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_nav > ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->start_controls_tabs('sa_el_tabs_header_tabs');
        // Normal State Tab
        $this->start_controls_tab('sa_el_tabs_header_normal', ['label' => esc_html__('Normal', SA_ELEMENTOR_TEXTDOMAIN)]);
        $this->add_control(
                'sa_el_tabs_tab_color', [
            'label' => esc_html__('Tab Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#f1f1f1',
            'selectors' => [
                '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_nav > ul li' => 'background-color: {{VALUE}};',
            ],
                ]
        );
        $this->add_control(
                'sa_el_tabs_tab_text_color', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#333',
            'selectors' => [
                '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_nav > ul li' => 'color: {{VALUE}};',
            ],
                ]
        );
        $this->add_control(
                'sa_el_tabs_tab_icon_color', [
            'label' => esc_html__('Icon Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#333',
            'selectors' => [
                '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_nav > ul li i' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'sa_el_tabs_icon_show' => 'yes',
            ],
                ]
        );
        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_tabs_tab_border',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_nav > ul li',
                ]
        );
        $this->add_responsive_control(
                'sa_el_tabs_tab_border_radius', [
            'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_nav > ul li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->end_controls_tab();
        // Hover State Tab
        $this->start_controls_tab('sa_el_tabs_header_hover', ['label' => esc_html__('Hover', SA_ELEMENTOR_TEXTDOMAIN)]);
        $this->add_control(
                'sa_el_tabs_tab_color_hover', [
            'label' => esc_html__('Tab Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#f1f1f1',
            'selectors' => [
                '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_nav > ul li:hover' => 'background-color: {{VALUE}};',
            ],
                ]
        );
        $this->add_control(
                'sa_el_tabs_tab_text_color_hover', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#333',
            'selectors' => [
                '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_nav > ul li:hover' => 'color: {{VALUE}};',
            ],
                ]
        );
        $this->add_control(
                'sa_el_tabs_tab_icon_color_hover', [
            'label' => esc_html__('Icon Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#333',
            'selectors' => [
                '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_nav > ul li:hover .fa' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'sa_el_tabs_icon_show' => 'yes',
            ],
                ]
        );
        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_tabs_tab_border_hover',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_nav > ul li:hover',
                ]
        );
        $this->add_responsive_control(
                'sa_el_tabs_tab_border_radius_hover', [
            'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_nav > ul li:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->end_controls_tab();
        // Active State Tab
        $this->start_controls_tab('sa_el_tabs_header_active', ['label' => esc_html__('Active', SA_ELEMENTOR_TEXTDOMAIN)]);
        $this->add_control(
                'sa_el_tabs_tab_color_active', [
            'label' => esc_html__('Tab Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#212121',
            'selectors' => [
                '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_nav > ul li.active' => 'background-color: {{VALUE}};',
                '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_nav > ul li.active-default' => 'background-color: {{VALUE}};',
            ],
                ]
        );
        $this->add_control(
                'sa_el_tabs_tab_text_color_active', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_nav > ul li.active' => 'color: {{VALUE}};',
                '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_nav > ul li.active-deafult' => 'color: {{VALUE}};',
            ],
                ]
        );
        $this->add_control(
                'sa_el_tabs_tab_icon_color_active', [
            'label' => esc_html__('Icon Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_nav > ul li.active .fa' => 'color: {{VALUE}};',
                '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_nav > ul li.active-default .fa' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'sa_el_tabs_icon_show' => 'yes',
            ],
                ]
        );
        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_tabs_tab_border_active',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_nav > ul li.active, {{WRAPPER}} .sa_el_tabs .sa_el_tabs_nav > ul li.active-default',
                ]
        );
        $this->add_responsive_control(
                'sa_el_tabs_tab_border_radius_active', [
            'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_nav > ul li.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_nav > ul li.active-default' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style Tabs Content Style
         * -------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_section_tabs_tab_content_style_settings', [
            'label' => esc_html__('Content', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );
        $this->add_control(
                'sa_el_tabs_content_bg_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_content > div' => 'background-color: {{VALUE}};',
            ],
                ]
        );
        $this->add_control(
                'sa_el_tabs_content_text_color', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#333',
            'selectors' => [
                '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_content > div' => 'color: {{VALUE}};',
            ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_tabs_content_typography',
            'selector' => '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_content > div',
                ]
        );
        $this->add_responsive_control(
                'sa_el_tabs_content_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_content > div' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->add_responsive_control(
                'sa_el_tabs_content_margin', [
            'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_content > div' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_tabs_content_border',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_content > div',
                ]
        );
        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_el_tabs_content_shadow',
            'selector' => '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_content > div',
            'separator' => 'before',
                ]
        );
        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style Tabs Caret Style
         * -------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_section_tabs_tab_caret_style_settings', [
            'label' => esc_html__('Caret', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );
        $this->add_control(
                'sa_el_tabs_tab_caret_show', [
            'label' => esc_html__('Show Caret on Active Tab', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
            'return_value' => 'yes',
                ]
        );
        $this->add_control(
                'sa_el_tabs_tab_caret_size', [
            'label' => esc_html__('Caret Size', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 10,
            ],
            'range' => [
                'px' => [
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_nav > ul li:after' => 'border-width: {{SIZE}}px; bottom: -{{SIZE}}px',
                '{{WRAPPER}} .sa_el_tabs.sa_el_tabs_vertical .sa_el_tabs_nav > ul li:after' => 'right: -{{SIZE}}px; top: calc(50% - {{SIZE}}px) !important;',
            ],
            'condition' => [
                'sa_el_tabs_tab_caret_show' => 'yes',
            ],
                ]
        );
        $this->add_control(
                'sa_el_tabs_tab_caret_color', [
            'label' => esc_html__('Caret Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#212121',
            'selectors' => [
                '{{WRAPPER}} .sa_el_tabs .sa_el_tabs_nav > ul li:after' => 'border-top-color: {{VALUE}};',
                '{{WRAPPER}} .sa_el_tabs.sa_el_tabs_vertical .sa_el_tabs_nav > ul li:after' => 'border-top-color: transparent; border-left-color: {{VALUE}};',
            ],
            'condition' => [
                'sa_el_tabs_tab_caret_show' => 'yes',
            ],
                ]
        );
        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();
        $sa_el_find_default_tab = array();
        $sa_el_adv_tab_id = 1;
        $sa_el_tab_content_id = 1;

        $this->add_render_attribute(
                'sa_el_tab_wrapper', [
            'id' => "sa_el_tabs-{$this->get_id()}",
            'class' => ['sa_el_tabs', $settings['sa_el_tab_layout']],
            'data-tabid' => $this->get_id(),
                ]
        );
        if ($settings['sa_el_tabs_tab_caret_show'] != 'yes') {
            $this->add_render_attribute('sa_el_tab_wrapper', 'class', 'active-caret-on');
        }

        $this->add_render_attribute('sa_el_tab_icon_position', 'class', esc_attr($settings['sa_el_tab_icon_position']));
        ?>
        <div <?php echo $this->get_render_attribute_string('sa_el_tab_wrapper'); ?>>
            <div class="sa_el_tabs_nav">
                <ul <?php echo $this->get_render_attribute_string('sa_el_tab_icon_position'); ?>>
        <?php foreach ($settings['sa_el_tabs_tab'] as $tab) : ?>
                        <li class="<?php echo esc_attr($tab['sa_el_tabs_tab_show_as_default']); ?>">
            <?php if ($settings['sa_el_tabs_icon_show'] === 'yes') :
                if ($tab['sa_el_tabs_icon_type'] === 'icon') :
                    ?>
                                    <i class="<?php echo esc_attr($tab['sa_el_tabs_tab_title_icon']); ?>"></i>
                <?php elseif ($tab['sa_el_tabs_icon_type'] === 'image') : ?>
                                    <img src="<?php echo esc_attr($tab['sa_el_tabs_tab_title_image']['url']); ?>" alt="<?php echo esc_attr(get_post_meta($tab['sa_el_tabs_tab_title_image']['id'], '_wp_attachment_image_alt', true)); ?>">
                <?php endif; ?>
            <?php endif; ?> <span class="sa_el_tab_title"><?php echo $tab['sa_el_tabs_tab_title']; ?></span></li>
        <?php endforeach; ?>
                </ul>
            </div>
            <div class="sa_el_tabs_content">
        <?php foreach ($settings['sa_el_tabs_tab'] as $tab) : $sa_el_find_default_tab[] = $tab['sa_el_tabs_tab_show_as_default']; ?>
                    <div class="clearfix <?php echo esc_attr($tab['sa_el_tabs_tab_show_as_default']); ?>">
            <?php if ('content' == $tab['sa_el_tabs_text_type']) : ?>
                <?php echo do_shortcode($tab['sa_el_tabs_tab_content']); ?>
            <?php elseif ('template' == $tab['sa_el_tabs_text_type']) : ?>
                <?php
                if (!empty($tab['sa_el_primary_templates'])) {
                    $sa_el_template_id = $tab['sa_el_primary_templates'];
                    $sa_el_frontend = new Frontend;
                    echo $sa_el_frontend->get_builder_content($sa_el_template_id, true);
                }
                ?>
            <?php endif; ?>
                    </div>
        <?php endforeach; ?>
            </div>
        </div>
        <?php
    }

    protected function content_template() {
        
    }

}
