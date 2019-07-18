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
use \SA_ELEMENTOR_ADDONS\Classes\Bootstrap as SA_ELBootstrap;

class Accordion extends Widget_Base {

    public function get_name() {
        return 'sa_el_accordion';
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
                'sa_accordion_icon_selected', [
            'label' => __('Icon', SA_ELEMENTOR_TEXTDOMAIN),
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
                'sa_accordion_icon_active', [
            'label' => __('Active Icon', SA_ELEMENTOR_TEXTDOMAIN),
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
        $this->add_control(
            'sa_accordion_toggle_speed',
            [
                'label' => esc_html__('Toggle Speed (ms)', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::NUMBER,
                'label_block' => false,
                'default' => 300,
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
                 [
                    'name' => 'sa_accordion_tab_template',
                    'label' => __('Content Type', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::SELECT,
                    'options' => SA_ELBootstrap::get_elementor_page_templates(),
                    'condition' => [
                        'sa_accordion_text_type' => 'template',
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
                'sa_accordion_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_accordion' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->add_responsive_control(
                'sa_accordion_margin', [
            'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_accordion' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_accordion_border',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa_el_accordion',
                ]
        );
        $this->add_responsive_control(
                'sa_accordion_border_radius', [
            'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_accordion' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_accordion_box_shadow',
            'selector' => '{{WRAPPER}} .sa_el_accordion',
                ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
                'sa_accordion_tab_style_settings', [
            'label' => esc_html__('Tab Style', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_accordion_tab_title_typography',
            'selector' => '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list .sa_el_accordion_header',
                ]
        );
        $this->add_responsive_control(
                'sa_accordion_tab_icon_size', [
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
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list .sa_el_accordion_header .fa' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
                ]
        );
        $this->add_responsive_control(
                'sa_accordion_tab_icon_gap', [
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
                '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list .sa_el_accordion_header .fa' => 'margin-right: {{SIZE}}{{UNIT}};',
            ],
                ]
        );
        $this->add_responsive_control(
                'sa_accordion_tab_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list .sa_el_accordion_header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->add_responsive_control(
                'sa_accordion_tab_margin', [
            'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list .sa_el_accordion_header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->start_controls_tabs('sa_accordion_header_tabs');
        # Normal State Tab
        $this->start_controls_tab('sa_accordion_header_normal', ['label' => esc_html__('Normal', SA_ELEMENTOR_TEXTDOMAIN)]);
        $this->add_control(
                'sa_accordion_tab_color', [
            'label' => esc_html__('Tab Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#f1f1f1',
            'selectors' => [
                '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list .sa_el_accordion_header' => 'background-color: {{VALUE}};',
            ],
                ]
        );
        $this->add_control(
                'sa_accordion_tab_text_color', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#333',
            'selectors' => [
                '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list .sa_el_accordion_header' => 'color: {{VALUE}};',
            ],
                ]
        );
        $this->add_control(
                'sa_accordion_tab_icon_color', [
            'label' => esc_html__('Icon Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#333',
            'selectors' => [
                '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list .sa_el_accordion_header .fa' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'sa_adv_tabs_icon_show' => 'yes',
            ],
                ]
        );
        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_accordion_tab_border',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list .sa_el_accordion_header',
                ]
        );
        $this->add_responsive_control(
                'sa_accordion_tab_border_radius', [
            'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list .sa_el_accordion_header' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->end_controls_tab();

        # Hover State Tab
        $this->start_controls_tab(
                'sa_accordion_header_hover', [
            'label' => esc_html__('Hover', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'sa_accordion_tab_color_hover', [
            'label' => esc_html__('Tab Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#414141',
            'selectors' => [
                '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list .sa_el_accordion_header:hover' => 'background-color: {{VALUE}};',
            ],
                ]
        );
        $this->add_control(
                'sa_accordion_tab_text_color_hover', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list .sa_el_accordion_header:hover' => 'color: {{VALUE}};',
            ],
                ]
        );
        $this->add_control(
                'sa_accordion_tab_icon_color_hover', [
            'label' => esc_html__('Icon Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list .sa_el_accordion_header:hover .fa' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'sa_accordion_toggle_icon_show' => 'yes',
            ],
                ]
        );
        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_accordion_tab_border_hover',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list .sa_el_accordion_header:hover',
                ]
        );
        $this->add_responsive_control(
                'sa_accordion_tab_border_radius_hover', [
            'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list .sa_el_accordion_header:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->end_controls_tab();

        #Active State Tab
        $this->start_controls_tab(
                'sa_accordion_header_active', [
            'label' => esc_html__('Active', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'sa_accordion_tab_color_active', [
            'label' => esc_html__('Tab Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#444',
            'selectors' => [
                '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list .sa_el_accordion_header.active' => 'background-color: {{VALUE}};',
            ],
                ]
        );
        $this->add_control(
                'sa_accordion_tab_text_color_active', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list .sa_el_accordion_header.active' => 'color: {{VALUE}};',
            ],
                ]
        );
        $this->add_control(
                'sa_accordion_tab_icon_color_active', [
            'label' => esc_html__('Icon Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list .sa_el_accordion_header.active .fa' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'sa_accordion_toggle_icon_show' => 'yes',
            ],
                ]
        );
        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_accordion_tab_border_active',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list .sa_el_accordion_header.active',
                ]
        );
        $this->add_responsive_control(
                'sa_accordion_tab_border_radius_active', [
            'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list .sa_el_accordion_header.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'sa_accordion_tab_content_style_settings', [
            'label' => esc_html__('Content Style', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'sa_accordion_content_bg_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list .sa_el_accordion_content' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_accordion_content_text_color', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#333',
            'selectors' => [
                '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list .sa_el_accordion_content' => 'color: {{VALUE}};',
            ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_accordion_content_typography',
            'selector' => '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list .sa_el_accordion_content',
                ]
        );
        $this->add_responsive_control(
                'sa_accordion_content_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list .sa_el_accordion_content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->add_responsive_control(
                'sa_accordion_content_margin', [
            'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list .sa_el_accordion_content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_accordion_content_border',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list .sa_el_accordion_content',
                ]
        );
        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_accordion_content_shadow',
            'selector' => '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list .sa_el_accordion_content',
            'separator' => 'before',
                ]
        );
        $this->end_controls_section();

        /**
         * Advance Accordion Caret Settings
         */
        $this->start_controls_section(
                'sa_accordion_caret_settings', [
            'label' => esc_html__('Toggle Caret Style', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_responsive_control(
                'sa_accordion_tab_toggle_icon_size', [
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
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list .sa_el_accordion_header .fa-toggle' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'sa_accordion_icon_show' => 'yes',
            ],
                ]
        );
        $this->add_control(
                'sa_accordion_tabs_tab_toggle_color', [
            'label' => esc_html__('Caret Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#444',
            'selectors' => [
                '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list .sa_el_accordion_header .fa-toggle' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'sa_accordion_icon_show' => 'yes',
            ],
                ]
        );
        $this->add_control(
                'sa_accordion_toggle_active_color', [
            'label' => esc_html__('Caret Color (Active)', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list .sa_el_accordion_header.active .fa-toggle' => 'color: {{VALUE}};',
                '{{WRAPPER}} .sa_el_accordion .sa_el_accordion_list:hover .sa_el_accordion_header .fa-toggle' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'sa_accordion_icon_show' => 'yes',
            ],
                ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $id_int = substr($this->get_id_int(), 0, 3);
    
        $this->add_render_attribute('sa_el_accordion', 'class', 'sa_el_accordion');
        $this->add_render_attribute('sa_el_accordion', 'id', 'sa_el_accordion-' . esc_attr($this->get_id()));
          print_r($id_int);
        ?>
        <div
        <?php echo $this->get_render_attribute_string('sa_el_accordion'); ?>
        <?php echo 'data-sa-accordion-id="' . esc_attr($this->get_id()) . '"'; ?>
        <?php echo!empty($settings['sa_accordion_type']) ? 'data-accordion-type="' . esc_attr($settings['sa_accordion_type']) . '"' : 'accordion'; ?>
        <?php echo!empty($settings['sa_accordion_toggle_speed']) ? 'data-toogle-speed="' . esc_attr($settings['sa_accordion_toggle_speed']) . '"' : '300'; ?>
            >
                <?php
                foreach ($settings['sa_accordion_tab'] as $index => $tab):

                    $tab_count = $index + 1;
                    $tab_title_setting_key = $this->get_repeater_setting_key('sa_accordion_tab_title', 'sa_accordion_tab', $index);
                    $tab_content_setting_key = $this->get_repeater_setting_key('sa_accordion_tab_content', 'sa_accordion_tab', $index);

                    $tab_title_class = ['sa_el_tab_title', 'sa_el_header'];
                    $tab_content_class = ['sa_el_content', 'clearfix'];

                    if ($tab['sa_accordion_tab_default_active'] == 'yes') {
                        $tab_title_class[] = 'active-default';
                        $tab_content_class[] = 'active-default';
                    }

                    $this->add_render_attribute($tab_title_setting_key, [
                        'id' => 'sa_el_tab_title_' . $id_int . $tab_count,
                        'class' => $tab_title_class,
                        'tabindex' => $id_int . $tab_count,
                        'data-tab' => $tab_count,
                        'role' => 'tab',
                        'aria-controls' => 'sa_el_tab_content_' . $id_int . $tab_count,
                    ]);

                    $this->add_render_attribute($tab_content_setting_key, [
                        'id' => 'sa_el_tab_content_' . $id_int . $tab_count,
                        'class' => $tab_content_class,
                        'data-tab' => $tab_count,
                        'role' => 'tabpanel',
                        'aria-labelledby' => 'sa_el_tab_title_' . $id_int . $tab_count,
                    ]);
                    ?>
                <div class="sa_el_accordion_list">

                    <div <?php echo $this->get_render_attribute_string($tab_title_setting_key); ?>>
                        <span><?php if ($tab['sa_accordion_tab_icon_show'] === 'yes'): ?><i class="<?php echo esc_attr($tab['sa_accordion_tab_title_icon']); ?> fa-accordion-icon"></i><?php endif; ?><?php echo $tab['sa_accordion_tab_title']; ?></span>
                        <?php if ($settings['sa_accordion_icon_show'] === 'yes'): ?><i class="<?php echo esc_attr($settings['sa_accordion_icon_selected']); ?> fa-toggle"></i>
                        <?php endif; ?>
                    </div>

                    <div <?php echo $this->get_render_attribute_string($tab_content_setting_key); ?>>
                        <?php if ('content' == $tab['sa_accordion_text_type']): ?>
                            <p><?php echo do_shortcode($tab['sa_accordion_tab_content']); ?></p>
                        <?php
                        elseif ('template' == $tab['sa_accordion_text_type']):
                            if (!empty($tab['sa_accordion_tab_template'])) {
                                $sa_template_id = $tab['sa_accordion_tab_template'];
                                $sa_frontend = new Frontend;
                                echo $sa_frontend->get_builder_content($sa_template_id, true);
                            }
                       
                        endif;
                        ?>
                    </div>

                </div>
        <?php endforeach; ?>
        </div>
        <?php
    }

}
