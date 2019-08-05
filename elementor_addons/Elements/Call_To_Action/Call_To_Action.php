<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Call_To_Action;

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

// use \SA_ELEMENTOR_ADDONS\Classes\Bootstrap;

class Call_To_Action extends Widget_Base {

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function get_name() {
        return 'sa_el_call_to_action';
    }

    public function get_title() {
        return esc_html__('Call To Action', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon() {
        return 'eicon-call-to-action  oxi-el-admin-icon';
    }

    public function get_categories() {
        return ['sa-el-addons'];
    }

    protected function _register_controls() {

        /**
         * Call to Action Content Settings
         */
        $this->start_controls_section(
                'sa_el_section_call_to_action_content_settings', [
            'label' => esc_html__('Content Settings', SA_ELEMENTOR_TEXTDOMAIN)
                ]
        );

        $this->add_control(
                'sa_el_call_to_action_type', [
            'label' => esc_html__('Content Style', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'call-to-action-icon-flex',
            'label_block' => false,
            'options' => [
                'call-to-action-basic' => esc_html__('Basic', SA_ELEMENTOR_TEXTDOMAIN),
                'call-to-action-flex' => esc_html__('Flex Grid', SA_ELEMENTOR_TEXTDOMAIN),
                'call-to-action-icon-flex' => esc_html__('Flex Grid with Icon', SA_ELEMENTOR_TEXTDOMAIN),
            ],
                ]
        );

        /**
         * Condition: 'sa_el_call_to_action_type' => 'call-to-action-basic'
         */
        $this->add_control(
                'sa_el_call_to_action_content_type', [
            'label' => esc_html__('Content Type', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'call-to-action-default',
            'label_block' => false,
            'options' => [
                'call-to-action-default' => esc_html__('Left', SA_ELEMENTOR_TEXTDOMAIN),
                'call-to-action-center' => esc_html__('Center', SA_ELEMENTOR_TEXTDOMAIN),
                'call-to-action-right' => esc_html__('Right', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'condition' => [
                'sa_el_call_to_action_type' => 'call-to-action-basic'
            ]
                ]
        );

        $this->add_control(
                'sa_el_call_to_action_color_type', [
            'label' => esc_html__('Color Style', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'call-to-action-bg-img-fixed',
            'label_block' => false,
            'options' => [
                'call-to-action-bg-color' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'call-to-action-bg-img' => esc_html__('Background Image', SA_ELEMENTOR_TEXTDOMAIN),
                'call-to-action-bg-img-fixed' => esc_html__('Background Fixed Image', SA_ELEMENTOR_TEXTDOMAIN),
            ],
                ]
        );


        /**
         * Condition: 'sa_el_call_to_action_type' => 'call-to-action-icon-flex'
         */
        $this->add_control(
                'sa_el_call_to_action_flex_grid_icon', [
            'label' => esc_html__('Icon', SA_ELEMENTOR_TEXTDOMAIN),
            'type' =>  $this->Sa_El_Icon_Type(),
            'default' => $this->Sa_El_Default_Icon('fas fa-street-view', 'fa-solid', 'fas fa-street-view'),
            'condition' => [
                'sa_el_call_to_action_type' => 'call-to-action-icon-flex'
            ]
                ]
        );



        $this->add_control(
                'sa_el_call_to_action_title', [
            'label' => esc_html__('Title', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => esc_html__('The Ultimate Addons For Elementor', SA_ELEMENTOR_TEXTDOMAIN),
            'dynamic' => ['active' => true]
                ]
        );

        $this->add_control(
                'sa_el_call_to_action_title_content_type', [
            'label' => __('Content Type', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'options' => [
                'content' => __('Content', SA_ELEMENTOR_TEXTDOMAIN),
                'template' => __('Saved Templates', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'default' => 'content',
                ]
        );

        $this->add_control(
                'sa_el_primary_templates', [
            'label' => __('Choose Template', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'options' => $this->get_elementor_page_templates(),
            'condition' => [
                'sa_el_call_to_action_title_content_type' => 'template',
            ],
                ]
        );
        $this->add_control(
                'sa_el_call_to_action_content', [
            'label' => esc_html__('Content', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::WYSIWYG,
            'label_block' => true,
            'default' => esc_html__('Add a strong one liner supporting the heading above and giving users a reason to click on the button below.', SA_ELEMENTOR_TEXTDOMAIN),
            'separator' => 'after',
            'condition' => [
                'sa_el_call_to_action_title_content_type' => 'content'
            ]
                ]
        );

        $this->add_control(
                'sa_el_call_to_action_btn_text', [
            'label' => esc_html__('Button Text', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => esc_html__('Button Text', SA_ELEMENTOR_TEXTDOMAIN)
                ]
        );

        $this->add_control(
                'sa_el_call_to_action_btn_link', [
            'label' => esc_html__('Button Link', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::URL,
            'label_block' => true,
            'default' => [
                'url' => 'http://',
                'is_external' => '',
            ],
            'show_external' => true,
            'separator' => 'after'
                ]
        );

        /**
         * Condition: 'sa_el_call_to_action_color_type' => 'call-to-action-bg-img' && 'sa_el_call_to_action_color_type' => 'call-to-action-bg-img-fixed',
         */
        $this->add_control(
                'sa_el_call_to_action_bg_image', [
            'label' => esc_html__('Background Image', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => 'https://www.shortcode-addons.com/wp-content/uploads/2019/06/modern-illustrated-city.png',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa_el_call_to_action.bg-img' => 'background-image: url({{URL}});',
                '{{WRAPPER}} .sa_el_call_to_action.bg-img-fixed' => 'background-image: url({{URL}});',
            ],
            'condition' => [
                'sa_el_call_to_action_color_type' => ['call-to-action-bg-img', 'call-to-action-bg-img-fixed'],
            ]
                ]
        );
        $this->add_control(
                'sa_el_call_to_action_bg_image_overlay_color', [
            'label' => esc_html__('Overlay Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => 'rgba(255,255,255,0.71)',
            'selectors' => [
                '{{WRAPPER}} .sa_el_call_to_action.bg-img:after' => 'background: {{VALUE}};',
            ],
            'condition' => [
                'sa_el_call_to_action_color_type' => ['call-to-action-bg-img', 'call-to-action-bg-img-fixed'],
            ]
                ]
        );
        $this->add_control(
                'sa_el_call_to_action_bg_image', [
            'label' => esc_html__('Background Image', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
            'selectors' => [
                '{{WRAPPER}} .sa_el_call_to_action.bg-img' => 'background-image: url({{URL}});',
                '{{WRAPPER}} .sa_el_call_to_action.bg-img-fixed' => 'background-image: url({{URL}});',
            ],
            'condition' => [
                'sa_el_call_to_action_color_type' => ['call-to-action-bg-img', 'call-to-action-bg-img-fixed'],
            ]
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
         * Tab Style (call-to-action Title Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_section_call_to_action_style_settings', [
            'label' => esc_html__('Call to Action Style', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE
                ]
        );

        $this->add_control(
                'sa_el_call_to_action_container_width', [
            'label' => esc_html__('Set max width for the container?', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('yes', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('no', SA_ELEMENTOR_TEXTDOMAIN),
            'default' => 'yes',
                ]
        );

        $this->add_responsive_control(
                'sa_el_call_to_action_container_width_value', [
            'label' => __('Container Max Width (% or px)', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 1170,
                'unit' => 'px',
            ],
            'size_units' => ['px', '%'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1500,
                    'step' => 5,
                ],
                '%' => [
                    'min' => 1,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa_el_call_to_action' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'sa_el_call_to_action_container_width' => 'yes',
            ],
                ]
        );

        $this->add_control(
                'sa_el_call_to_action_bg_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#f4f4f4',
            'selectors' => [
                '{{WRAPPER}} .sa_el_call_to_action' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_call_to_action_container_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_call_to_action' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_call_to_action_container_margin', [
            'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_call_to_action' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_call_to_action_border',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa_el_call_to_action',
                ]
        );

        $this->add_control(
                'sa_el_call_to_action_border_radius', [
            'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'max' => 500,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa_el_call_to_action' => 'border-radius: {{SIZE}}px;',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_el_call_to_action_shadow',
            'selector' => '{{WRAPPER}} .sa_el_call_to_action',
                ]
        );


        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (call-to-action Title Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_section_call_to_action_title_style_settings', [
            'label' => esc_html__('Color &amp; Typography ', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE
                ]
        );

        $this->add_control(
                'sa_el_call_to_action_title_heading', [
            'label' => esc_html__('Title Style', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
                ]
        );

        $this->add_control(
                'sa_el_call_to_action_title_color', [
            'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#ec5a36',
            'selectors' => [
                '{{WRAPPER}} .sa_el_call_to_action .title' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_call_to_action_title_typography',
            'selector' => '{{WRAPPER}} .sa_el_call_to_action .title',
                ]
        );

        $this->add_control(
                'sa_el_call_to_action_content_heading', [
            'label' => esc_html__('Content Style', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before'
                ]
        );

        $this->add_control(
                'sa_el_call_to_action_content_color', [
            'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#292929',
            'selectors' => [
                '{{WRAPPER}} .sa_el_call_to_action p' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_call_to_action_content_typography',
            'selector' => '{{WRAPPER}} .sa_el_call_to_action p',
                ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Button Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_section_call_to_action_btn_style_settings', [
            'label' => esc_html__('Button Style', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE
                ]
        );

        $this->add_control(
                'sa_el_call_to_action_btn_effect_type', [
            'label' => esc_html__('Effect', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'default',
            'label_block' => false,
            'options' => [
                'default' => esc_html__('Default', SA_ELEMENTOR_TEXTDOMAIN),
                'top-to-bottom' => esc_html__('Top to Bottom', SA_ELEMENTOR_TEXTDOMAIN),
                'left-to-right' => esc_html__('Left to Right', SA_ELEMENTOR_TEXTDOMAIN),
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_call_to_action_btn_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_call_to_action .call-to-action-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_call_to_action_btn_margin', [
            'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_call_to_action .call-to-action-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_call_to_action_btn_typography',
            'selector' => '{{WRAPPER}} .sa_el_call_to_action .call-to-action-button',
                ]
        );

        $this->start_controls_tabs('sa_el_call_to_action_button_tabs');

        // Normal State Tab
        $this->start_controls_tab('sa_el_call_to_action_btn_normal', ['label' => esc_html__('Normal', SA_ELEMENTOR_TEXTDOMAIN)]);

        $this->add_control(
                'sa_el_call_to_action_btn_normal_text_color', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .sa_el_call_to_action .call-to-action-button' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_call_to_action_btn_normal_bg_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => 'rgba(236,90,54,1.00)',
            'selectors' => [
                '{{WRAPPER}} .sa_el_call_to_action .call-to-action-button' => 'background: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_call_to_action_btn_normal_border',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa_el_call_to_action .call-to-action-button',
                ]
        );

        $this->add_control(
                'sa_el_call_to_action_btn_border_radius', [
            'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa_el_call_to_action .call-to-action-button' => 'border-radius: {{SIZE}}px;',
            ],
                ]
        );

        $this->end_controls_tab();

        // Hover State Tab
        $this->start_controls_tab('sa_el_call_to_action_btn_hover', ['label' => esc_html__('Hover', SA_ELEMENTOR_TEXTDOMAIN)]);

        $this->add_control(
                'sa_el_call_to_action_btn_hover_text_color', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#f9f9f9',
            'selectors' => [
                '{{WRAPPER}} .sa_el_call_to_action .call-to-action-button:hover' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_call_to_action_btn_hover_bg_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#3F51B5',
            'selectors' => [
                '{{WRAPPER}} .sa_el_call_to_action .call-to-action-button:after' => 'background: {{VALUE}};',
                '{{WRAPPER}} .sa_el_call_to_action .call-to-action-button:hover' => 'background: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_call_to_action_btn_hover_border_color', [
            'label' => esc_html__('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa_el_call_to_action .call-to-action-button:hover' => 'border-color: {{VALUE}};',
            ],
                ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_el_call_to_action_button_shadow',
            'selector' => '{{WRAPPER}} .sa_el_call_to_action .call-to-action-button',
            'separator' => 'before'
                ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Button Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_section_call_to_action_icon_style_settings', [
            'label' => esc_html__('Icon Style', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'sa_el_call_to_action_type' => 'call-to-action-icon-flex'
            ]
                ]
        );

        $this->add_control(
                'sa_el_section_call_to_action_icon_size', [
            'label' => esc_html__('Font Size', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 80
            ],
            'range' => [
                'px' => [
                    'max' => 160,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa_el_call_to_action.call-to-action-icon-flex .icon' => 'font-size: {{SIZE}}px;',
            ],
                ]
        );

        $this->add_control(
                'sa_el_section_call_to_action_icon_color', [
            'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#444',
            'selectors' => [
                '{{WRAPPER}} .sa_el_call_to_action.call-to-action-icon-flex .icon' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();
        $target = $settings['sa_el_call_to_action_btn_link']['is_external'] ? 'target="_blank"' : '';
        $nofollow = $settings['sa_el_call_to_action_btn_link']['nofollow'] ? 'rel="nofollow"' : '';
        if ('call-to-action-bg-color' == $settings['sa_el_call_to_action_color_type']) {
            $call_to_action_class = 'bg-lite';
        } else if ('call-to-action-bg-img' == $settings['sa_el_call_to_action_color_type']) {
            $call_to_action_class = 'bg-img';
        } else if ('call-to-action-bg-img-fixed' == $settings['sa_el_call_to_action_color_type']) {
            $call_to_action_class = 'bg-img bg-fixed';
        } else {
            $call_to_action_class = '';
        }
        // Is Basic call-to-action Content Center or Not
        if ('call-to-action-center' === $settings['sa_el_call_to_action_content_type']) {
            $call_to_action_alignment = 'call-to-action-center';
        } elseif ('call-to-action-right' === $settings['sa_el_call_to_action_content_type']) {
            $call_to_action_alignment = 'call-to-action-right';
        } else {
            $call_to_action_alignment = 'call-to-action-left';
        }
        // Button Effect
        if ('left-to-right' == $settings['sa_el_call_to_action_btn_effect_type']) {
            $call_to_action_btn_effect = 'effect-2';
        } elseif ('top-to-bottom' == $settings['sa_el_call_to_action_btn_effect_type']) {
            $call_to_action_btn_effect = 'effect-1';
        } else {
            $call_to_action_btn_effect = '';
        }
        ?>
        <?php if ('call-to-action-basic' == $settings['sa_el_call_to_action_type']) : ?>
            <div class="sa_el_call_to_action <?php echo esc_attr($call_to_action_class); ?> <?php echo esc_attr($call_to_action_alignment); ?>">
                <h2 class="title"><?php echo $settings['sa_el_call_to_action_title']; ?></h2>
                <?php if ('content' == $settings['sa_el_call_to_action_title_content_type']) : ?>
                    <p><?php echo $settings['sa_el_call_to_action_content']; ?></p>
                <?php elseif ('template' == $settings['sa_el_call_to_action_title_content_type']) : ?>
                    <?php
                    if (!empty($settings['sa_el_primary_templates'])) {
                        $sa_el_template_id = $settings['sa_el_primary_templates'];
                        $sa_el_frontend = new Frontend;
                        echo $sa_el_frontend->get_builder_content($sa_el_template_id, true);
                    }
                    ?>
                <?php endif; ?>
                <a href="<?php echo esc_url($settings['sa_el_call_to_action_btn_link']['url']); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> class="call-to-action-button <?php echo esc_attr($call_to_action_btn_effect); ?>"><?php esc_html_e($settings['sa_el_call_to_action_btn_text'], SA_ELEMENTOR_TEXTDOMAIN); ?></a>
            </div>
        <?php endif; ?>
        <?php if ('call-to-action-flex' == $settings['sa_el_call_to_action_type']) : ?>
            <div class="sa_el_call_to_action call-to-action-flex <?php echo esc_attr($call_to_action_class); ?>">
                <div class="content">
                    <h2 class="title"><?php echo $settings['sa_el_call_to_action_title']; ?></h2>
                    <?php if ('content' == $settings['sa_el_call_to_action_title_content_type']) : ?>
                        <p><?php echo $settings['sa_el_call_to_action_content']; ?></p>
                    <?php elseif ('template' == $settings['sa_el_call_to_action_title_content_type']) : ?>
                        <?php
                        if (!empty($settings['sa_el_primary_templates'])) {
                            $sa_el_template_id = $settings['sa_el_primary_templates'];
                            $sa_el_frontend = new Frontend;
                            echo $sa_el_frontend->get_builder_content($sa_el_template_id, true);
                        }
                        ?>
                    <?php endif; ?>
                </div>
                <div class="action">
                    <a href="<?php echo esc_url($settings['sa_el_call_to_action_btn_link']['url']); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> class="call-to-action-button <?php echo esc_attr($call_to_action_btn_effect); ?>"><?php esc_html_e($settings['sa_el_call_to_action_btn_text'], SA_ELEMENTOR_TEXTDOMAIN); ?></a>
                </div>
            </div>
        <?php endif; ?>
        <?php if ('call-to-action-icon-flex' == $settings['sa_el_call_to_action_type']) : ?>
            <div class="sa_el_call_to_action call-to-action-icon-flex <?php echo esc_attr($call_to_action_class); ?>">
                <div class="icon">
                    <?=  $this->Sa_El_Icon_Render($settings['sa_el_call_to_action_flex_grid_icon']) ?>
                </div>
                <div class="content">
                    <h2 class="title"><?php echo $settings['sa_el_call_to_action_title']; ?></h2>
                    <?php if ('content' == $settings['sa_el_call_to_action_title_content_type']) : ?>
                        <p><?php echo $settings['sa_el_call_to_action_content']; ?></p>
                    <?php elseif ('template' == $settings['sa_el_call_to_action_title_content_type']) : ?>
                        <?php
                        if (!empty($settings['sa_el_primary_templates'])) {
                            $sa_el_template_id = $settings['sa_el_primary_templates'];
                            $sa_el_frontend = new Frontend;
                            echo $sa_el_frontend->get_builder_content($sa_el_template_id, true);
                        }
                        ?>
                    <?php endif; ?>
                </div>
                <div class="action">
                    <a href="<?php echo esc_url($settings['sa_el_call_to_action_btn_link']['url']); ?>" <?php echo $target; ?> class="call-to-action-button <?php echo esc_attr($call_to_action_btn_effect); ?>"><?php esc_html_e($settings['sa_el_call_to_action_btn_text'], SA_ELEMENTOR_TEXTDOMAIN); ?></a>
                </div>
            </div>
        <?php endif; ?>
        <?php
    }

}
