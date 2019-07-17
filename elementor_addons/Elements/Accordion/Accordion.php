<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Accordion;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Description of Accordion
 *
 * @author biplo
 * 
 */
use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Scheme_Typography as Scheme_Typography;
use \Elementor\Widget_Base as Widget_Base;
use \SA_ELEMENTOR_ADDONS\Classes\Bootstrap;

class Accordion extends Widget_Base {

    public function get_name() {
        return 'accordion-button';
    }

    public function get_title() {
        return esc_html__('SA Accordion', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon() {
        return 'eicon-button';
    }

    public function get_categories() {
        return ['sa-el-addons'];
    }

    protected function _register_controls() {
        $this->start_controls_section(
                'sa_accordion', [
            'label' => esc_html__('General Settings', SA_ELEMENTOR_TEXTDOMAIN)
                ]
        );
        $this->add_control(
                'sa_accordion_type', [
            'label' => esc_html__('Accordion Type', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'accordion',
            'label_block' => false,
            'options' => [
                'accordion' => esc_html__('Accordion', SA_ELEMENTOR_TEXTDOMAIN),
                'toggle' => esc_html__('Toggle', SA_ELEMENTOR_TEXTDOMAIN),
            ],
                ]
        );
        $this->add_control(
                'sa_accordion_icon_show', [
            'label' => esc_html__('Enable Toggle Icon', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
            'return_value' => 'yes',
                ]
        );
        $this->add_control(
                'selected_icon', [
            'label' => __('Icon', 'elementor'),
            'type' => Controls_Manager::ICONS,
            'separator' => 'before',
            'fa4compatibility' => 'icon',
            'default' => [
                'value' => 'fas fa-plus',
                'library' => 'fa-solid',
            ],
            'condition' => [
                'sa_accordion_icon_show' => 'yes',
            ],
                ]
        );

        $this->add_control(
                'selected_active_icon', [
            'label' => __('Active Icon', 'elementor'),
            'type' => Controls_Manager::ICONS,
            'fa4compatibility' => 'icon_active',
            'default' => [
                'value' => 'fas fa-minus',
                'library' => 'fa-solid',
            ],
            'condition' => [
                'sa_accordion_icon_show' => 'yes',
            ],
                ]
        );
        $this->end_controls_section();
        /**
         * Advance Accordion Content Settings
         */
        $this->start_controls_section(
                'sa_accordion_content_settings', [
            'label' => esc_html__('Content Settings', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );
        $this->add_control(
                'sa_accordion_tab', [
            'type' => Controls_Manager::REPEATER,
            'seperator' => 'before',
            'default' => [
                ['sa_accordion_tab_title' => esc_html__('Accordion Tab Title 1', SA_ELEMENTOR_TEXTDOMAIN)],
                ['sa_accordion_tab_title' => esc_html__('Accordion Tab Title 2', SA_ELEMENTOR_TEXTDOMAIN)],
                ['sa_accordion_tab_title' => esc_html__('Accordion Tab Title 3', SA_ELEMENTOR_TEXTDOMAIN)],
            ],
            'fields' => [
                [
                    'name' => 'sa_accordion_tab_default_active',
                    'label' => esc_html__('Active as Default', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::SWITCHER,
                    'default' => 'no',
                    'return_value' => 'yes',
                ],
                [
                    'name' => 'sa_accordion_tab_icon_show',
                    'label' => esc_html__('Enable Tab Icon', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::SWITCHER,
                    'default' => 'yes',
                    'return_value' => 'yes',
                ],
                [
                    'name' => 'sa_accordion_tab_title_icon',
                    'label' => esc_html__('Icon', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::ICON,
                    'default' => 'fa fa-plus',
                    'condition' => [
                        'sa_accordion_tab_icon_show' => 'yes',
                    ],
                ],
                [
                    'name' => 'sa_accordion_tab_title',
                    'label' => esc_html__('Tab Title', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Tab Title', SA_ELEMENTOR_TEXTDOMAIN),
                    'dynamic' => ['active' => true],
                ],
                [
                    'name' => 'sa_accordion_text_type',
                    'label' => __('Content Type', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'content' => __('Content', SA_ELEMENTOR_TEXTDOMAIN),
                        'template' => __('Saved Templates', SA_ELEMENTOR_TEXTDOMAIN),
                    ],
                    'default' => 'content',
                ],
                [
                    'name' => 'sa_accordion_tab_content',
                    'label' => esc_html__('Tab Content', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::WYSIWYG,
                    'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, neque qui velit. Magni dolorum quidem ipsam eligendi, totam, facilis laudantium cum accusamus ullam voluptatibus commodi numquam, error, est. Ea, consequatur.', SA_ELEMENTOR_TEXTDOMAIN),
                    'dynamic' => ['active' => true],
                    'condition' => [
                        'sa_accordion_text_type' => 'content',
                    ],
                ],
            ],
            'title_field' => '{{sa_accordion_tab_title}}',
                ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
                'sa_accordion_style_settings', [
            'label' => esc_html__('General Style', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );
           $this->add_responsive_control(
            'sa_accordion_padding',
            [
                'label' => esc_html__('Padding',SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-adv-accordion' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'sa_accordion_margin',
            [
                'label' => esc_html__('Margin',SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-adv-accordion' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sa_accordion_border',
                'label' => esc_html__('Border',SA_ELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .eael-adv-accordion',
            ]
        );
        $this->add_responsive_control(
            'sa_accordion_border_radius',
            [
                'label' => esc_html__('Border Radius',SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-adv-accordion' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'sa_accordion_box_shadow',
                'selector' => '{{WRAPPER}} .eael-adv-accordion',
            ]
        );
        $this->end_controls_section();
         $this->start_controls_section(
            'sa_accordion_tab_style_settings',
            [
                'label' => esc_html__('Tab Style', 'essential-addons-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_accordion_tab_title_typography',
                'selector' => '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header',
            ]
        );
        $this->add_responsive_control(
            'sa_accordion_tab_icon_size',
            [
                'label' => __('Icon Size', 'essential-addons-elementor'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 16,
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
                    '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header .fa' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'sa_accordion_tab_icon_gap',
            [
                'label' => __('Icon Gap', 'essential-addons-elementor'),
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
                    '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header .fa' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'sa_accordion_tab_padding',
            [
                'label' => esc_html__('Padding', 'essential-addons-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'sa_accordion_tab_margin',
            [
                'label' => esc_html__('Margin', 'essential-addons-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('sa_accordion_header_tabs');
        # Normal State Tab
        $this->start_controls_tab('sa_accordion_header_normal', ['label' => esc_html__('Normal', 'essential-addons-elementor')]);
        $this->add_control(
            'sa_accordion_tab_color',
            [
                'label' => esc_html__('Tab Background Color', 'essential-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#f1f1f1',
                'selectors' => [
                    '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sa_accordion_tab_text_color',
            [
                'label' => esc_html__('Text Color', 'essential-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#333',
                'selectors' => [
                    '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sa_accordion_tab_icon_color',
            [
                'label' => esc_html__('Icon Color', 'essential-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#333',
                'selectors' => [
                    '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header .fa' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'eael_adv_tabs_icon_show' => 'yes',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sa_accordion_tab_border',
                'label' => esc_html__('Border', 'essential-addons-elementor'),
                'selector' => '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header',
            ]
        );
        $this->add_responsive_control(
            'sa_accordion_tab_border_radius',
            [
                'label' => esc_html__('Border Radius', 'essential-addons-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        # Hover State Tab
        $this->start_controls_tab(
            'sa_accordion_header_hover',
            [
                'label' => esc_html__('Hover', 'essential-addons-elementor'),
            ]
        );

        $this->add_control(
            'sa_accordion_tab_color_hover',
            [
                'label' => esc_html__('Tab Background Color', 'essential-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#414141',
                'selectors' => [
                    '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sa_accordion_tab_text_color_hover',
            [
                'label' => esc_html__('Text Color', 'essential-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sa_accordion_tab_icon_color_hover',
            [
                'label' => esc_html__('Icon Color', 'essential-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header:hover .fa' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'sa_accordion_toggle_icon_show' => 'yes',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sa_accordion_tab_border_hover',
                'label' => esc_html__('Border', 'essential-addons-elementor'),
                'selector' => '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header:hover',
            ]
        );
        $this->add_responsive_control(
            'sa_accordion_tab_border_radius_hover',
            [
                'label' => esc_html__('Border Radius', 'essential-addons-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        #Active State Tab
        $this->start_controls_tab(
            'sa_accordion_header_active',
            [
                'label' => esc_html__('Active', 'essential-addons-elementor'),
            ]
        );

        $this->add_control(
            'sa_accordion_tab_color_active',
            [
                'label' => esc_html__('Tab Background Color', 'essential-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#444',
                'selectors' => [
                    '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header.active' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sa_accordion_tab_text_color_active',
            [
                'label' => esc_html__('Text Color', 'essential-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header.active' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sa_accordion_tab_icon_color_active',
            [
                'label' => esc_html__('Icon Color', 'essential-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header.active .fa' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'sa_accordion_toggle_icon_show' => 'yes',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sa_accordion_tab_border_active',
                'label' => esc_html__('Border', 'essential-addons-elementor'),
                'selector' => '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header.active',
            ]
        );
        $this->add_responsive_control(
            'sa_accordion_tab_border_radius_active',
            [
                'label' => esc_html__('Border Radius', 'essential-addons-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style Advance Accordion Content Style
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_accordion_tab_content_style_settings',
            [
                'label' => esc_html__('Content Style', 'essential-addons-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sa_accordion_content_bg_color',
            [
                'label' => esc_html__('Background Color', 'essential-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-content' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sa_accordion_content_text_color',
            [
                'label' => esc_html__('Text Color', 'essential-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#333',
                'selectors' => [
                    '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-content' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_accordion_content_typography',
                'selector' => '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-content',
            ]
        );
        $this->add_responsive_control(
            'sa_accordion_content_padding',
            [
                'label' => esc_html__('Padding', 'essential-addons-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'sa_accordion_content_margin',
            [
                'label' => esc_html__('Margin', 'essential-addons-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sa_accordion_content_border',
                'label' => esc_html__('Border', 'essential-addons-elementor'),
                'selector' => '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-content',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'sa_accordion_content_shadow',
                'selector' => '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-content',
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();

        /**
         * Advance Accordion Caret Settings
         */
        $this->start_controls_section(
            'eael_section_sa_accordion_caret_settings',
            [
                'label' => esc_html__('Toggle Caret Style', 'essential-addons-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'sa_accordion_tab_toggle_icon_size',
            [
                'label' => __('Icon Size', 'essential-addons-elementor'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 16,
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
                    '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header .fa-toggle' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'sa_accordion_icon_show' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'sa_accordion_tabs_tab_toggle_color',
            [
                'label' => esc_html__('Caret Color', 'essential-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#444',
                'selectors' => [
                    '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header .fa-toggle' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'sa_accordion_icon_show' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'sa_accordion_toggle_active_color',
            [
                'label' => esc_html__('Caret Color (Active)', 'essential-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header.active .fa-toggle' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list:hover .eael-accordion-header .fa-toggle' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'sa_accordion_icon_show' => 'yes',
                ],
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        
    }

}
