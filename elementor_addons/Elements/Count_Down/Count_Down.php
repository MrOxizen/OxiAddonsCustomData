<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Count_Down;

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Frontend;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Scheme_Typography as Scheme_Typography;
use \Elementor\Widget_Base as Widget_Base;

class Count_down extends Widget_Base {

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function get_name() {
        return 'sa_el_countdown';
    }

    public function get_title() {
        return esc_html__('Count Down', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon() {
        return 'eicon-countdown  oxi-el-admin-icon';
    }

    public function get_categories() {
        return ['sa-el-addons'];
    }

    protected function _register_controls() {


        $this->start_controls_section(
                'sa_el_section_countdown_settings_general', [
            'label' => esc_html__('Timer Settings', SA_ELEMENTOR_TEXTDOMAIN)
                ]
        );

        $this->add_control(
                'sa_el_countdown_due_time', [
            'label' => esc_html__('Countdown Due Date', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DATE_TIME,
            'default' => date("Y-m-d", strtotime("+ 1 day")),
            'description' => esc_html__('Set the due date and time', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'sa_el_countdown_label_view', [
            'label' => esc_html__('Label Position', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'sa_el_countdown_label_block',
            'options' => [
                'sa_el_countdown_label_block' => esc_html__('Block', SA_ELEMENTOR_TEXTDOMAIN),
                'sa_el_countdown_label_inline' => esc_html__('Inline', SA_ELEMENTOR_TEXTDOMAIN),
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_countdown_label_padding_left', [
            'label' => esc_html__('Left spacing for Labels', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'description' => esc_html__('Use when you select inline labels', SA_ELEMENTOR_TEXTDOMAIN),
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa_el_countdown_label' => 'padding-left:{{SIZE}}px;',
            ],
            'condition' => [
                'sa_el_countdown_label_view' => 'sa_el_countdown_label_inline',
            ],
                ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
                'sa_el_section_countdown_settings_content', [
            'label' => esc_html__('Content Settings', SA_ELEMENTOR_TEXTDOMAIN)
                ]
        );

        $this->add_control(
                'sa_el_section_countdown_style', [
            'label' => esc_html__('Countdown Style', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'style-1',
            'label_block' => false,
            'options' => [
                'style-1' => esc_html__('Style 1', SA_ELEMENTOR_TEXTDOMAIN),
                'style-2' => esc_html__('Style 2', SA_ELEMENTOR_TEXTDOMAIN),
                'style-3' => esc_html__('Style 3', SA_ELEMENTOR_TEXTDOMAIN),
            ],
                ]
        );


        $this->add_control(
                'sa_el_countdown_days', [
            'label' => esc_html__('Display Days', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'return_value' => 'yes',
            'default' => 'yes',
                ]
        );

        $this->add_control(
                'sa_el_countdown_days_label', [
            'label' => esc_html__('Custom Label for Days', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('Days', SA_ELEMENTOR_TEXTDOMAIN),
            'description' => esc_html__('Leave blank to hide', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'sa_el_countdown_days' => 'yes',
            ],
                ]
        );


        $this->add_control(
                'sa_el_countdown_hours', [
            'label' => esc_html__('Display Hours', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'return_value' => 'yes',
            'default' => 'yes',
                ]
        );

        $this->add_control(
                'sa_el_countdown_hours_label', [
            'label' => esc_html__('Custom Label for Hours', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('Hours', SA_ELEMENTOR_TEXTDOMAIN),
            'description' => esc_html__('Leave blank to hide', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'sa_el_countdown_hours' => 'yes',
            ],
                ]
        );

        $this->add_control(
                'sa_el_countdown_minutes', [
            'label' => esc_html__('Display Minutes', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'return_value' => 'yes',
            'default' => 'yes',
                ]
        );

        $this->add_control(
                'sa_el_countdown_minutes_label', [
            'label' => esc_html__('Custom Label for Minutes', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('Minutes', SA_ELEMENTOR_TEXTDOMAIN),
            'description' => esc_html__('Leave blank to hide', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'sa_el_countdown_minutes' => 'yes',
            ],
                ]
        );

        $this->add_control(
                'sa_el_countdown_seconds', [
            'label' => esc_html__('Display Seconds', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'return_value' => 'yes',
            'default' => 'yes',
                ]
        );

        $this->add_control(
                'sa_el_countdown_seconds_label', [
            'label' => esc_html__('Custom Label for Seconds', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('Seconds', SA_ELEMENTOR_TEXTDOMAIN),
            'description' => esc_html__('Leave blank to hide', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'sa_el_countdown_seconds' => 'yes',
            ],
                ]
        );

        $this->add_control(
                'sa_el_countdown_separator_heading', [
            'label' => __('Countdown Separator', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
                ]
        );

        $this->add_control(
                'sa_el_countdown_separator', [
            'label' => esc_html__('Display Separator', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'return_value' => 'sa_el_countdown_show_separator',
            'default' => '',
                ]
        );

        $this->add_control(
                'sa_el_countdown_separator_color', [
            'label' => esc_html__('Separator Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'condition' => [
                'sa_el_countdown_separator' => 'sa_el_countdown_show_separator',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa_el_countdown_digits::after' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_countdown_separator_typography',
            'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            'selector' => '{{WRAPPER}} .sa_el_countdown_digits::after',
            'condition' => [
                'sa_el_countdown_separator' => 'sa_el_countdown_show_separator',
            ],
                ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
                'countdown_on_expire_settings', [
            'label' => esc_html__('Expire Action', SA_ELEMENTOR_TEXTDOMAIN)
                ]
        );

        $this->add_control(
                'countdown_expire_type', [
            'label' => esc_html__('Expire Type', SA_ELEMENTOR_TEXTDOMAIN),
            'label_block' => false,
            'type' => Controls_Manager::SELECT,
            'description' => esc_html__('Choose whether if you want to set a message or a redirect link', SA_ELEMENTOR_TEXTDOMAIN),
            'options' => [
                'none' => esc_html__('None', SA_ELEMENTOR_TEXTDOMAIN),
                'text' => esc_html__('Message', SA_ELEMENTOR_TEXTDOMAIN),
                'url' => esc_html__('Redirection Link', SA_ELEMENTOR_TEXTDOMAIN),
                'template' => esc_html__('Saved Templates', SA_ELEMENTOR_TEXTDOMAIN)
            ],
            'default' => 'none'
                ]
        );

        $this->add_control(
                'countdown_expiry_text_title', [
            'label' => esc_html__('On Expiry Title', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__('Countdown is finished!', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'countdown_expire_type' => 'text'
            ]
                ]
        );

        $this->add_control(
                'countdown_expiry_text', [
            'label' => esc_html__('On Expiry Content', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::WYSIWYG,
            'default' => esc_html__('Dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'countdown_expire_type' => 'text'
            ]
                ]
        );

        $this->add_control(
                'countdown_expiry_redirection', [
            'label' => esc_html__('Redirect To (URL)', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'condition' => [
                'countdown_expire_type' => 'url'
            ],
            'default' => '#'
                ]
        );

        $this->add_control(
                'countdown_expiry_templates', [
            'label' => __('Choose Template', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'options' => $this->get_elementor_page_templates(),
            'condition' => [
                'countdown_expire_type' => 'template',
            ],
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
        $this->start_controls_section(
                'sa_el_section_countdown_styles_general', [
            'label' => esc_html__('Countdown Styles', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE
                ]
        );

        $this->add_control(
                'sa_el_countdown_background', [
            'label' => esc_html__('Box Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa_el_countdown_item > div' => 'background: {{VALUE}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_countdown_spacing', [
            'label' => esc_html__('Space Between Boxes', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 15,
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa_el_countdown_item > div' => 'margin-right:{{SIZE}}px; margin-left:{{SIZE}}px;',
                '{{WRAPPER}} .sa_el_countdown_container' => 'margin-right: -{{SIZE}}px; margin-left: -{{SIZE}}px;',
            ],
            'condition' => [
                'sa_el_section_countdown_style' => ['style-1', 'style-3']
            ]
                ]
        );

        $this->add_responsive_control(
                'sa_el_countdown_container_margin_bottom', [
            'label' => esc_html__('Space Below Container', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 0,
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa_el_countdown_container' => 'margin-bottom:{{SIZE}}px;',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_countdown_box_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_countdown_item > div' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_countdown_box_border',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa_el_countdown_item > div',
                ]
        );

        $this->add_control(
                'sa_el_countdown_box_border_radius', [
            'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'selectors' => [
                '{{WRAPPER}} .sa_el_countdown_item > div' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_el_countdown_box_shadow',
            'selector' => '{{WRAPPER}} .sa_el_countdown_item > div',
                ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
                'sa_el_section_countdown_styles_content', [
            'label' => esc_html__('Color &amp; Typography', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE
                ]
        );

        $this->add_control(
                'sa_el_countdown_digits_heading', [
            'label' => __('Countdown Digits', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
                ]
        );

        $this->add_control(
                'sa_el_countdown_digits_color', [
            'label' => esc_html__('Digits Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#fec503',
            'selectors' => [
                '{{WRAPPER}} .sa_el_countdown_digits' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_countdown_digit_typography',
            'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            'selector' => '{{WRAPPER}} .sa_el_countdown_digits',
                ]
        );

        $this->add_control(
                'sa_el_countdown_label_heading', [
            'label' => __('Countdown Labels', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
                ]
        );

        $this->add_control(
                'sa_el_countdown_label_color', [
            'label' => esc_html__('Label Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa_el_countdown_label' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_countdown_label_typography',
            'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            'selector' => '{{WRAPPER}} .sa_el_countdown_label',
                ]
        );


        $this->end_controls_section();



        $this->start_controls_section(
                'sa_el_section_countdown_styles_individual', [
            'label' => esc_html__('Individual Box Styling', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE
                ]
        );

        $this->add_control(
                'sa_el_countdown_days_label_heading', [
            'label' => __('Days', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
                ]
        );

        $this->add_control(
                'sa_el_countdown_days_background_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa_el_countdown_item > div.sa_el_countdown_days' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_countdown_days_digit_color', [
            'label' => esc_html__('Digit Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa_el_countdown_days .sa_el_countdown_digits' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_countdown_days_label_color', [
            'label' => esc_html__('Label Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa_el_countdown_days .sa_el_countdown_label' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_countdown_days_border_color', [
            'label' => esc_html__('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa_el_countdown_item > div.sa_el_countdown_days' => 'border-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_countdown_hours_label_heading', [
            'label' => __('Hours', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
                ]
        );

        $this->add_control(
                'sa_el_countdown_hours_background_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa_el_countdown_item > div.sa_el_countdown_hours' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_countdown_hours_digit_color', [
            'label' => esc_html__('Digit Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa_el_countdown_hours .sa_el_countdown_digits' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_countdown_hours_label_color', [
            'label' => esc_html__('Label Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa_el_countdown_hours .sa_el_countdown_label' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_countdown_hours_border_color', [
            'label' => esc_html__('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa_el_countdown_item > div.sa_el_countdown_hours' => 'border-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_countdown_minutes_label_heading', [
            'label' => __('Minutes', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
                ]
        );

        $this->add_control(
                'sa_el_countdown_minutes_background_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa_el_countdown_item > div.sa_el_countdown_minutes' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_countdown_minutes_digit_color', [
            'label' => esc_html__('Digit Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa_el_countdown_minutes .sa_el_countdown_digits' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_countdown_minutes_label_color', [
            'label' => esc_html__('Label Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa_el_countdown_minutes .sa_el_countdown_label' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_countdown_minutes_border_color', [
            'label' => esc_html__('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa_el_countdown_item > div.sa_el_countdown_minutes' => 'border-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_countdown_seconds_label_heading', [
            'label' => __('Seconds', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
                ]
        );

        $this->add_control(
                'sa_el_countdown_seconds_background_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa_el_countdown_item > div.sa_el_countdown_seconds' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_countdown_seconds_digit_color', [
            'label' => esc_html__('Digit Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa_el_countdown_seconds .sa_el_countdown_digits' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_countdown_seconds_label_color', [
            'label' => esc_html__('Label Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa_el_countdown_seconds .sa_el_countdown_label' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_countdown_seconds_border_color', [
            'label' => esc_html__('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa_el_countdown_item > div.sa_el_countdown_seconds' => 'border-color: {{VALUE}};',
            ],
                ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
                'sa_el_section_countdown_expire_style', [
            'label' => esc_html__('Expire Message', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'countdown_expire_type' => 'text'
            ]
                ]
        );

        $this->add_responsive_control(
                'sa_el_countdown_expire_message_alignment', [
            'label' => esc_html__('Text Alignment', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::CHOOSE,
            'label_block' => true,
            'options' => [
                'left' => [
                    'title' => esc_html__('Left', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-align-left',
                ],
                'center' => [
                    'title' => esc_html__('Center', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-align-center',
                ],
                'right' => [
                    'title' => esc_html__('Right', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-align-right',
                ],
            ],
            'default' => 'left',
            'selectors' => [
                '{{WRAPPER}} .sa_el_countdown_finish_message' => 'text-align: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'heading_sa_el_countdown_expire_title', [
            'label' => __('Title Style', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before'
                ]
        );

        $this->add_control(
                'sa_el_countdown_expire_title_color', [
            'label' => esc_html__('Title Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa_el_countdown_finish_message .expiry-title' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'countdown_expire_type' => 'text',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'eael_countdown_expire_title_typography',
            'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            'selector' => '{{WRAPPER}} .sa_el_countdown_finish_message .expiry-title',
            'condition' => [
                'countdown_expire_type' => 'text',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_expire_title_margin', [
            'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_countdown_finish_message .expiry-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
            ],
                ]
        );

        $this->add_control(
                'heading_sa_el_countdown_expire_message', [
            'label' => __('Content Style', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before'
                ]
        );

        $this->add_control(
                'sa_el_countdown_expire_message_color', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa_el_countdown_finish_text' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'countdown_expire_type' => 'text',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_countdown_expire_message_typography',
            'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            'selector' => '.sa_el_countdown_finish_text',
            'condition' => [
                'countdown_expire_type' => 'text',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_countdown_expire_message_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'separator' => 'before',
            'selectors' => [
                '{{WRAPPER}} .sa_el_countdown_container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'countdown_expire_type' => 'text',
            ],
                ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings();

        $get_due_date = esc_attr($settings['sa_el_countdown_due_time']);

        $due_date = date("M d Y G:i:s", strtotime($get_due_date));
        if ('style-1' === $settings['sa_el_section_countdown_style']) {
            $eael_countdown_style = 'style-1';
        } elseif ('style-2' === $settings['sa_el_section_countdown_style']) {
            $eael_countdown_style = 'style-2';
        } elseif ('style-3' === $settings['sa_el_section_countdown_style']) {
            $eael_countdown_style = 'style-3';
        }

        if ('template' == $settings['countdown_expire_type']) {
            if (!empty($settings['countdown_expiry_templates'])) {
                $eael_template_id = $settings['countdown_expiry_templates'];
                $eael_frontend = new Frontend;
                $template = $eael_frontend->get_builder_content($eael_template_id, true);
            }
        }

        $this->add_render_attribute('sa_el_countdown', 'class', 'sa_el_countdown_wrapper');
        $this->add_render_attribute('sa_el_countdown', 'data-countdown-id', esc_attr($this->get_id()));
        $this->add_render_attribute('sa_el_countdown', 'data-expire-type', $settings['countdown_expire_type']);

        if ($settings['countdown_expire_type'] == 'text') {
            if (!empty($settings['countdown_expiry_text'])) {
                $this->add_render_attribute('sa_el_countdown', 'data-expiry-text', wp_kses_post($settings['countdown_expiry_text']));
            }

            if (!empty($settings['countdown_expiry_text_title'])) {
                $this->add_render_attribute('sa_el_countdown', 'data-expiry-title', wp_kses_post($settings['countdown_expiry_text_title']));
            }
        } elseif ($settings['countdown_expire_type'] == 'url') {
            $this->add_render_attribute('sa_el_countdown', 'data-redirect-url', $settings['countdown_expiry_redirection']);
        } elseif ($settings['countdown_expire_type'] == 'template') {
            $this->add_render_attribute('sa_el_countdown', 'data-template', esc_attr($template));
        } else {
            //do nothing
        }
        ?>

        <div <?php echo $this->get_render_attribute_string('sa_el_countdown'); ?>>
            <div class="sa_el_countdown_container <?php echo esc_attr($settings['sa_el_countdown_label_view']); ?> <?php echo esc_attr($settings['sa_el_countdown_separator']); ?>">
                <ul id="sa_el_countdown_<?php echo esc_attr($this->get_id()); ?>" class="sa_el_countdown_items <?php echo esc_attr($eael_countdown_style); ?>" data-date="<?php echo esc_attr($due_date); ?>">
                    <?php if (!empty($settings['sa_el_countdown_days'])) : ?><li class="sa_el_countdown_item"><div class="sa_el_countdown_days"><span data-days class="sa_el_countdown_digits">00</span><?php if (!empty($settings['sa_el_countdown_days_label'])) : ?><span class="sa_el_countdown_label"><?php echo esc_attr($settings['sa_el_countdown_days_label']); ?></span><?php endif; ?></div></li><?php endif; ?>
                    <?php if (!empty($settings['sa_el_countdown_hours'])) : ?><li class="sa_el_countdown_item"><div class="sa_el_countdown_hours"><span data-hours class="sa_el_countdown_digits">00</span><?php if (!empty($settings['sa_el_countdown_hours_label'])) : ?><span class="sa_el_countdown_label"><?php echo esc_attr($settings['sa_el_countdown_hours_label']); ?></span><?php endif; ?></div></li><?php endif; ?>
                    <?php if (!empty($settings['sa_el_countdown_minutes'])) : ?><li class="sa_el_countdown_item"><div class="sa_el_countdown_minutes"><span data-minutes class="sa_el_countdown_digits">00</span><?php if (!empty($settings['sa_el_countdown_minutes_label'])) : ?><span class="sa_el_countdown_label"><?php echo esc_attr($settings['sa_el_countdown_minutes_label']); ?></span><?php endif; ?></div></li><?php endif; ?>
                    <?php if (!empty($settings['sa_el_countdown_seconds'])) : ?><li class="sa_el_countdown_item"><div class="sa_el_countdown_seconds"><span data-seconds class="sa_el_countdown_digits">00</span><?php if (!empty($settings['sa_el_countdown_seconds_label'])) : ?><span class="sa_el_countdown_label"><?php echo esc_attr($settings['sa_el_countdown_seconds_label']); ?></span><?php endif; ?></div></li><?php endif; ?>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>

        <?php
    }

    protected function content_template() {
        
    }

}
