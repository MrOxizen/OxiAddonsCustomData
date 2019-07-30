<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Protected_Content;

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
use \Elementor\Frontend;
use \Elementor\Utils as Utils;
use \Elementor\Widget_Base as Widget_Base;

class Protected_Content extends Widget_Base {

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function get_name() {
        return 'sa_el_protected_content';
    }

    public function get_title() {
        return esc_html__('Protected Content', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon() {
        return 'eicon-lock-user oxi-el-admin-icon';
    }

    public function get_categories() {
        return ['sa-el-addons'];
    }

    protected function _register_controls() {

        /**
         * Content Settings
         */
        $this->start_controls_section(
                'sa_el_protected_content', [
            'label' => esc_html__('Protected Content', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'sa_el_protected_content_type', [
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
                'sa_el_protected_content_field', [
            'label' => esc_html__('Protected Content', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::WYSIWYG,
            'label_block' => true,
            'dynamic' => [
                'active' => true
            ],
            'default' => esc_html__('This is the content that you want to be protected by either role or password.', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'sa_el_protected_content_type' => 'content',
            ],
                ]
        );

        $this->add_control(
                'sa_el_protected_content_template', [
            'label' => __('Choose Template', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'options' => $this->get_elementor_page_templates(),
            'condition' => [
                'sa_el_protected_content_type' => 'template',
            ],
                ]
        );

        $this->end_controls_section();

        /**
         * Select protection type
         */
        $this->start_controls_section(
                'sa_el_protected_content_protection', [
            'label' => esc_html__('Protection Type', SA_ELEMENTOR_TEXTDOMAIN)
                ]
        );

        $this->add_control(
                'sa_el_protected_content_protection_type', [
            'label' => esc_html__('Protection Type', SA_ELEMENTOR_TEXTDOMAIN),
            'label_block' => false,
            'type' => Controls_Manager::SELECT,
            'options' => [
                'role' => esc_html__('User role', SA_ELEMENTOR_TEXTDOMAIN),
                'password' => esc_html__('Password protected', SA_ELEMENTOR_TEXTDOMAIN)
            ],
            'default' => 'role'
                ]
        );

        $this->add_control(
                'sa_el_protected_content_role', [
            'label' => __('Select Roles', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT2,
            'label_block' => true,
            'multiple' => true,
            'options' => $this->sa_el_user_roles(),
            'condition' => [
                'sa_el_protected_content_protection_type' => 'role'
            ]
                ]
        );

        $this->add_control(
                'sa_el_show_fallback_message', [
            'label' => __('Show Preview of Error Message', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'no',
            'label_on' => __('Show', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('Hide', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => 'yes',
            'description' => 'You can force show message in order to style them properly.',
            'condition' => [
                'sa_el_protected_content_protection_type' => 'role'
            ]
                ]
        );

        $this->add_control(
                'sa_protection_password', [
            'label' => esc_html__('Set Password', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'input_type' => 'password',
            'condition' => [
                'sa_el_protected_content_protection_type' => 'password'
            ]
                ]
        );

        $this->add_control(
                'sa_protection_password_placeholder', [
            'label' => esc_html__('Input Placehlder', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'default' => 'Enter Password',
            'condition' => [
                'sa_el_protected_content_protection_type' => 'password',
            ],
                ]
        );

        $this->add_control(
                'sa_protection_password_submit_btn_txt', [
            'label' => esc_html__('Submit Button Text', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'default' => 'Submit',
            'condition' => [
                'sa_el_protected_content_protection_type' => 'password',
            ],
                ]
        );

        $this->add_control(
                'sa_el_show_content', [
            'label' => __('Show Content', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'no',
            'label_on' => __('Show', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('Hide', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => 'yes',
            'description' => 'You can force show content in order to style them properly.',
            'condition' => [
                'sa_el_protected_content_protection_type' => 'password'
            ]
                ]
        );





        $this->end_controls_section();

        /**
         * Show message
         */
        $this->start_controls_section(
                'sa_el_protected_content_message', [
            'label' => esc_html__('Message', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'sa_el_protected_content_message_type', [
            'label' => esc_html__('Message Type', SA_ELEMENTOR_TEXTDOMAIN),
            'label_block' => false,
            'type' => Controls_Manager::SELECT,
            'description' => esc_html__('Set a message or a saved template when the content is protected.', SA_ELEMENTOR_TEXTDOMAIN),
            'options' => [
                'none' => esc_html__('None', SA_ELEMENTOR_TEXTDOMAIN),
                'text' => esc_html__('Message', SA_ELEMENTOR_TEXTDOMAIN),
                'template' => esc_html__('Saved Templates', SA_ELEMENTOR_TEXTDOMAIN)
            ],
            'default' => 'text'
                ]
        );

        $this->add_control(
                'sa_el_protected_content_message_text', [
            'label' => esc_html__('Public Text', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::WYSIWYG,
            'default' => esc_html__('You do not have permission to see this content.', SA_ELEMENTOR_TEXTDOMAIN),
            'dynamic' => [
                'active' => true
            ],
            'condition' => [
                'sa_el_protected_content_message_type' => 'text'
            ]
                ]
        );

        $this->add_control(
                'sa_el_protected_content_message_template', [
            'label' => __('Choose Template', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'options' => $this->get_elementor_page_templates(),
            'condition' => [
                'sa_el_protected_content_message_type' => 'template',
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
                'sa_el_protected_content_style', [
            'label' => esc_html__('Content', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE
                ]
        );

        $this->add_control(
                'sa_el_protected_content_color', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa-el-protected-content .protected-content' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_protected_content_typography',
            'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            'selector' => '{{WRAPPER}} .sa-el-protected-content .protected-content',
                ]
        );

        $this->add_responsive_control(
                'sa_el_protected_content_alignment', [
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
                '{{WRAPPER}} .sa-el-protected-content .protected-content' => 'text-align: {{VALUE}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_protected_content_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-protected-content .protected-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'sa_el_protected_content_message_style', [
            'label' => esc_html__('Message', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE
                ]
        );

        $this->add_control(
                'sa_el_protected_content_message_text_color', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa-el-protected-content-message' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'sa_el_protected_content_message_type' => 'text',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_protected_content_message_text_typography',
            'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            'selector' => '{{WRAPPER}} .sa-el-protected-content-message, {{WRAPPER}} .protected-content-error-msg',
            'condition' => [
                'sa_el_protected_content_message_type' => 'text',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_protected_content_message_text_alignment', [
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
                '{{WRAPPER}} .sa-el-protected-content-message, {{WRAPPER}} .protected-content-error-msg' => 'text-align: {{VALUE}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_protected_content_message_text_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-protected-content-message' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'sa_el_protected_content_message_type' => 'text',
            ],
                ]
        );

        $this->end_controls_section();

        // password field style
        $this->start_controls_section(
                'sa_el_protected_content_password_field_style', [
            'label' => esc_html__('Password Field', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'sa_el_protected_content_protection_type' => 'password'
            ]
                ]
        );

        $this->add_control(
                'sa_el_protected_content_input_width', [
            'label' => esc_html__('Input Width', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'max' => 1000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-password-protected-content-fields input.sa-el-password' => 'width: {{SIZE}}px;'
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_protected_content_input_alignment', [
            'label' => esc_html__('Input Alignment', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::CHOOSE,
            'label_block' => true,
            'options' => [
                'flex-start' => [
                    'title' => esc_html__('Left', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-align-left',
                ],
                'center' => [
                    'title' => esc_html__('Center', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-align-center',
                ],
                'flex-end' => [
                    'title' => esc_html__('Right', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-align-right',
                ],
            ],
            'default' => 'left',
            'selectors' => [
                '{{WRAPPER}} .sa-el-password-protected-content-fields > form' => 'justify-content: {{VALUE}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_protected_content_password_input_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-password-protected-content-fields input.sa-el-password' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_protected_content_password_input_margin', [
            'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-password-protected-content-fields input.sa-el-password' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_protected_content_input_border_radius', [
            'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-password-protected-content-fields input.sa-el-password' => 'border-radius: {{SIZE}}px;'
            ],
                ]
        );

        $this->start_controls_tabs('sa_el_protected_content_password_input_style_tab');

        $this->start_controls_tab('sa_el_protected_content_password_input_normal_style', [
            'label' => esc_html__('Normal', SA_ELEMENTOR_TEXTDOMAIN)
        ]);

        $this->add_control(
                'sa_el_protected_content_password_input_color', [
            'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#333333',
            'selectors' => [
                '{{WRAPPER}} .sa-el-password-protected-content-fields input.sa-el-password' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_protected_content_password_input_bg_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .sa-el-password-protected-content-fields input.sa-el-password' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_protected_content_password_input_border',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa-el-password-protected-content-fields .sa-el-password'
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_el_protected_content_password_input_shadow',
            'selector' => '{{WRAPPER}} .sa-el-password-protected-content-fields .sa-el-password',
                ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab('sa_el_protected_content_password_input_hover_style', [
            'label' => esc_html__('Hover', SA_ELEMENTOR_TEXTDOMAIN)
        ]);

        $this->add_control(
                'sa_el_protected_content_password_input_hover_color', [
            'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#333333',
            'selectors' => [
                '{{WRAPPER}} .sa-el-password-protected-content-fields input.sa-el-password' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_protected_content_password_input_hover_bg_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .sa-el-password-protected-content-fields input.sa-el-password' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_protected_content_password_input_hover_border',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa-el-password-protected-content-fields .sa-el-password'
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_el_protected_content_password_input_hover_shadow',
            'selector' => '{{WRAPPER}} .sa-el-password-protected-content-fields .sa-el-password',
                ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        //submit button style
        $this->start_controls_section(
                'sa_el_protected_content_submit_button', [
            'label' => esc_html__('Button', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'sa_el_protected_content_protection_type' => 'password'
            ]
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_protected_content_submit_button_typography',
            'selector' => '{{WRAPPER}} .sa-el-password-protected-content-fields .sa-el-submit',
                ]
        );

        $this->add_responsive_control(
                'sa_el_protected_content_submit_padding', [
            'label' => esc_html__('Button Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-password-protected-content-fields .sa-el-submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_protected_content_submit_margin', [
            'label' => esc_html__('Button Margin', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-password-protected-content-fields .sa-el-submit' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_protected_content_submit_button_border_radius', [
            'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-password-protected-content-fields .sa-el-submit' => 'border-radius: {{SIZE}}px;'
            ],
                ]
        );

        $this->start_controls_tabs('sa_el_protected_content_submit_button_control_tabs');

        $this->start_controls_tab('sa_el_protected_content_submit_button_normal_tab', [
            'label' => esc_html__('Normal', SA_ELEMENTOR_TEXTDOMAIN)
        ]);

        $this->add_control(
                'sa_el_protected_content_submit_button_color', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .sa-el-password-protected-content-fields .sa-el-submit' => 'color: {{VALUE}};'
            ]
                ]
        );

        $this->add_control(
                'sa_el_protected_content_submit_button_bg_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#333333',
            'selectors' => [
                '{{WRAPPER}} .sa-el-password-protected-content-fields .sa-el-submit' => 'background: {{VALUE}};'
            ]
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_protected_content_submit_button_border',
            'selector' => '{{WRAPPER}} .sa-el-password-protected-content-fields .sa-el-submit',
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_el_protected_content_submit_button_box_shadow',
            'selector' => '{{WRAPPER}} .sa-el-password-protected-content-fields .sa-el-submit',
                ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab('sa_el_protected_content_submit_button_hover', [
            'label' => esc_html__('Hover', SA_ELEMENTOR_TEXTDOMAIN)
        ]);

        $this->add_control(
                'sa_el_protected_content_submit_button_hover_text_color', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .sa-el-password-protected-content-fields .sa-el-submit:hover' => 'color: {{VALUE}};'
            ]
                ]
        );

        $this->add_control(
                'sa_el_protected_content_submit_button_hover_bg_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#333333',
            'selectors' => [
                '{{WRAPPER}} .sa-el-password-protected-content-fields .sa-el-submit:hover' => 'background: {{VALUE}};'
            ]
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_protected_content_submit_button_hover_border',
            'selector' => '{{WRAPPER}} .sa-el-password-protected-content-fields .sa-el-submit:hover',
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_el_protected_content_submit_button_hover_box_shadow',
            'selector' => '{{WRAPPER}} .sa-el-password-protected-content-fields .sa-el-submit:hover',
                ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    /** Check current user role exists inside of the roles array. * */
    protected function current_user_privileges() {
        if (!is_user_logged_in())
            return;
        $user_role = reset(wp_get_current_user()->roles);
        return in_array($user_role, $this->get_settings('sa_el_protected_content_role'));
    }

    protected function sa_el_render_message($settings) {
        ob_start();
        ?>
        <div class="sa-el-protected-content-message">
            <?php
            if ('none' == $settings['sa_el_protected_content_message_type']) {
                //nothing happen
            } elseif ('text' == $settings['sa_el_protected_content_message_type']) {
                ?>
                <?php if (!empty($settings['sa_el_protected_content_message_type'])) : ?>
                    <div class="sa-el-protected-content-message-text"><?php echo $settings['sa_el_protected_content_message_text']; ?></div>
                <?php endif; ?>
                <?php
            }
            else {
                if (!empty($settings['sa_el_protected_content_message_template'])) {
                    $sa_el_template_id = $settings['sa_el_protected_content_message_template'];
                    $sa_el_frontend = new Frontend;

                    echo $sa_el_frontend->get_builder_content($sa_el_template_id, true);
                }
            }
            ?>
        </div>  
        <?php
        echo ob_get_clean();
    }

    protected function sa_el_render_content($settings) {
        ob_start();
        ?>
        <div class="protected-content">
            <?php if ('content' === $settings['sa_el_protected_content_type']) : ?>
                <?php if (!empty($settings['sa_el_protected_content_field'])) : ?>
                    <p><?php echo $settings['sa_el_protected_content_field']; ?></p>
                <?php endif; ?>
                <?php
            elseif ('template' === $settings['sa_el_protected_content_type']) :
                if (!empty($settings['sa_el_protected_content_template'])) {
                    $sa_el_template_id = $settings['sa_el_protected_content_template'];
                    $sa_el_frontend = new Frontend;

                    echo $sa_el_frontend->get_builder_content($sa_el_template_id, true);
                }
            endif;
            ?>
        </div>
        <?php
        echo ob_get_clean();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <?php if ('role' == $settings['sa_el_protected_content_protection_type']) : ?>
            <div class="sa-el-protected-content">     
                <?php if (true === $this->current_user_privileges()) : ?>
                    <?php $this->sa_el_render_content($this->get_settings_for_display()); ?>
                <?php else : ?>
                    <?php $this->sa_el_render_message($this->get_settings_for_display()); ?>
                <?php endif; ?>

                <?php if ('yes' == $settings['sa_el_show_fallback_message']) : ?>
                    <?php $this->sa_el_render_message($this->get_settings_for_display()); ?>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <?php
            if (!empty($settings['sa_protection_password'])) {
                if (!session_status()) {
                    session_start();
                }

                if (isset($_POST['sa_protection_password']) && ($settings['sa_protection_password'] === $_POST['sa_protection_password'])) {
                    $_SESSION['sa_protection_password'] = true;
                }
                if (!isset($_SESSION['sa_protection_password'])) {
                    if ('yes' !== $settings['sa_el_show_content']) {
                        $this->sa_el_render_message($this->get_settings_for_display());
                        $this->sa_el_get_block_pass_protected_form($settings);
                        return;
                    }
                }
            }
            ?>
            <div class="sa-el-protected-content">
                <?php $this->sa_el_render_content($this->get_settings_for_display()); ?>
            </div>
        <?php endif; ?>     
        <?php
    }

}
