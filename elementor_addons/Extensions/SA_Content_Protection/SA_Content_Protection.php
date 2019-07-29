<?php

namespace SA_ELEMENTOR_ADDONS\Extensions\SA_Content_Protection;

/**
 * Description of SA_Content_Protection
 *
 * @author Jabir
 */
if (!defined('ABSPATH')) {
    exit;
}

use \Elementor\Controls_Manager;
use \Elementor\Frontend;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Scheme_Typography;

class SA_Content_Protection {

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function __construct() {
        add_action('elementor/element/common/_section_style/after_section_end', [$this, 'register_controls'], 10);
        add_action('elementor/widget/render_content', [$this, 'render_content'], 10, 2);
    }

    public function register_controls($element) {
        $element->start_controls_section(
                'sa_el_ext_content_protection_section', [
            'label' => esc_html__('SA Content Protection', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_ADVANCED,
                ]
        );

        $element->add_control(
                'sa_el_ext_content_protection', [
            'label' => __('Enable Content Protection', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'no',
            'label_on' => __('Yes', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('No', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => 'yes',
                ]
        );

        $element->add_control(
                'sa_el_ext_content_protection_type', [
            'label' => esc_html__('Protection Type', SA_ELEMENTOR_TEXTDOMAIN),
            'label_block' => false,
            'type' => Controls_Manager::SELECT,
            'options' => [
                'role' => esc_html__('User role', SA_ELEMENTOR_TEXTDOMAIN),
                'password' => esc_html__('Password protected', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'default' => 'role',
            'condition' => [
                'sa_el_ext_content_protection' => 'yes',
            ],
                ]
        );

        $element->add_control(
                'sa_el_ext_content_protection_role', [
            'label' => __('Select Roles', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT2,
            'label_block' => true,
            'multiple' => true,
            'options' => $this->sa_el_user_roles(),
            'condition' => [
                'sa_el_ext_content_protection' => 'yes',
                'sa_el_ext_content_protection_type' => 'role',
            ],
                ]
        );

        $element->add_control(
                'sa_el_ext_content_protection_password', [
            'label' => esc_html__('Set Password', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'input_type' => 'password',
            'condition' => [
                'sa_el_ext_content_protection' => 'yes',
                'sa_el_ext_content_protection_type' => 'password',
            ],
                ]
        );

        $element->add_control(
                'sa_el_ext_content_protection_password_placeholder', [
            'label' => esc_html__('Input Placehlder', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'default' => 'Enter Password',
            'condition' => [
                'sa_el_ext_content_protection' => 'yes',
                'sa_el_ext_content_protection_type' => 'password',
            ],
                ]
        );

        $element->add_control(
                'sa_el_ext_content_protection_password_submit_btn_txt', [
            'label' => esc_html__('Submit Button Text', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'default' => 'Submit',
            'condition' => [
                'sa_el_ext_content_protection' => 'yes',
                'sa_el_ext_content_protection_type' => 'password',
            ],
                ]
        );

        $element->start_controls_tabs(
                'sa_el_ext_content_protection_tabs', [
            'condition' => [
                'sa_el_ext_content_protection' => 'yes',
            ],
                ]
        );

        $element->start_controls_tab(
                'sa_el_ext_content_protection_tab_message', [
            'label' => __('Message', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $element->add_control(
                'sa_el_ext_content_protection_message_type', [
            'label' => esc_html__('Message Type', SA_ELEMENTOR_TEXTDOMAIN),
            'label_block' => false,
            'type' => Controls_Manager::SELECT,
            'description' => esc_html__('Set a message or a saved template when the content is protected.', SA_ELEMENTOR_TEXTDOMAIN),
            'options' => [
                'none' => esc_html__('None', SA_ELEMENTOR_TEXTDOMAIN),
                'text' => esc_html__('Message', SA_ELEMENTOR_TEXTDOMAIN),
                'template' => esc_html__('Saved Templates', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'default' => 'text',
                ]
        );

        $element->add_control(
                'sa_el_ext_content_protection_message_text', [
            'label' => esc_html__('Public Text', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::WYSIWYG,
            'default' => esc_html__('You do not have permission to see this content.', SA_ELEMENTOR_TEXTDOMAIN),
            'dynamic' => [
                'active' => true,
            ],
            'condition' => [
                'sa_el_ext_content_protection_message_type' => 'text',
            ],
                ]
        );

        $element->add_control(
                'sa_el_ext_content_protection_message_template', [
            'label' => __('Choose Template', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'options' => $this->get_elementor_page_templates(),
            'condition' => [
                'sa_el_ext_content_protection_message_type' => 'template',
            ],
                ]
        );

        $element->end_controls_tab();

        $element->start_controls_tab(
                'sa_el_ext_content_protection_tab_style', [
            'label' => __('Style', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        # message
        $element->add_control(
                'sa_el_ext_content_protection_message_styles', [
            'label' => __('Message', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'after',
            'condition' => [
                'sa_el_ext_content_protection_message_type' => 'text',
            ],
                ]
        );

        $element->add_control(
                'sa_el_ext_content_protection_message_text_color', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa-el-protected-content-message' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'sa_el_ext_content_protection_message_type' => 'text',
            ],
                ]
        );

        $element->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_ext_content_protection_message_text_typography',
            'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            'selector' => '{{WRAPPER}} .sa-el-protected-content-message, {{WRAPPER}} .protected-content-error-msg',
            'condition' => [
                'sa_el_ext_content_protection_message_type' => 'text',
            ],
                ]
        );

        $element->add_responsive_control(
                'sa_el_ext_content_protection_message_text_alignment', [
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
            'condition' => [
                'sa_el_ext_content_protection_message_type' => 'text',
            ],
                ]
        );

        $element->add_responsive_control(
                'sa_el_ext_content_protection_message_text_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-protected-content-message' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'sa_el_ext_content_protection_message_type' => 'text',
            ],
                ]
        );

        # password field
        $element->add_control(
                'sa_el_ext_content_protection_input_styles', [
            'label' => __('Password Field', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'after',
            'condition' => [
                'sa_el_ext_content_protection_type' => 'password',
            ],
                ]
        );

        $element->add_control(
                'sa_el_ext_content_protection_input_width', [
            'label' => esc_html__('Input Width', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'max' => 1000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-password-protected-content-fields input.sa-el-password' => 'width: {{SIZE}}px;',
            ],
            'condition' => [
                'sa_el_ext_content_protection_type' => 'password',
            ],
                ]
        );

        $element->add_responsive_control(
                'sa_el_ext_content_protection_input_alignment', [
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
            'condition' => [
                'sa_el_ext_content_protection_type' => 'password',
            ],
                ]
        );

        $element->add_responsive_control(
                'sa_el_ext_content_protection_password_input_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-password-protected-content-fields input.sa-el-password' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'sa_el_ext_content_protection_type' => 'password',
            ],
                ]
        );

        $element->add_responsive_control(
                'sa_el_ext_content_protection_password_input_margin', [
            'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-password-protected-content-fields input.sa-el-password' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'sa_el_ext_content_protection_type' => 'password',
            ],
                ]
        );

        $element->add_control(
                'sa_el_ext_content_protection_input_border_radius', [
            'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-password-protected-content-fields input.sa-el-password' => 'border-radius: {{SIZE}}px;',
            ],
            'condition' => [
                'sa_el_ext_content_protection_type' => 'password',
            ],
                ]
        );

        $element->add_control(
                'sa_el_ext_content_protection_password_input_color', [
            'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#333333',
            'selectors' => [
                '{{WRAPPER}} .sa-el-password-protected-content-fields input.sa-el-password' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'sa_el_ext_content_protection_type' => 'password',
            ],
                ]
        );

        $element->add_control(
                'sa_el_ext_content_protection_password_input_bg_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .sa-el-password-protected-content-fields input.sa-el-password' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'sa_el_ext_content_protection_type' => 'password',
            ],
                ]
        );

        $element->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_ext_content_protection_password_input_border',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa-el-password-protected-content-fields .sa-el-password',
            'condition' => [
                'sa_el_ext_content_protection_type' => 'password',
            ],
                ]
        );

        $element->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_el_ext_content_protection_password_input_shadow',
            'selector' => '{{WRAPPER}} .sa-el-password-protected-content-fields .sa-el-password',
            'condition' => [
                'sa_el_ext_content_protection_type' => 'password',
            ],
                ]
        );

        # password field hover
        $element->add_control(
                'sa_el_ext_content_protection_input_styles_hover', [
            'label' => __('Password Field Hover', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'after',
            'condition' => [
                'sa_el_ext_content_protection_type' => 'password',
            ],
                ]
        );

        $element->add_control(
                'sa_el_protected_content_password_input_hover_color', [
            'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#333333',
            'selectors' => [
                '{{WRAPPER}} .sa-el-password-protected-content-fields input.sa-el-password:hover' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'sa_el_ext_content_protection_type' => 'password',
            ],
                ]
        );

        $element->add_control(
                'sa_el_protected_content_password_input_hover_bg_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .sa-el-password-protected-content-fields input.sa-el-password:hover' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'sa_el_ext_content_protection_type' => 'password',
            ],
                ]
        );

        $element->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_protected_content_password_input_hover_border',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa-el-password-protected-content-fields .sa-el-password:hover',
            'condition' => [
                'sa_el_ext_content_protection_type' => 'password',
            ],
                ]
        );

        $element->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_el_protected_content_password_input_hover_shadow',
            'selector' => '{{WRAPPER}} .sa-el-password-protected-content-fields .sa-el-password"hover',
            'condition' => [
                'sa_el_ext_content_protection_type' => 'password',
            ],
                ]
        );

        # submit button
        $element->add_control(
                'sa_el_ext_content_protection_submit_button_styles', [
            'label' => __('Submit Button', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'after',
            'condition' => [
                'sa_el_ext_content_protection_type' => 'password',
            ],
                ]
        );

        $element->add_control(
                'sa_el_ext_content_protection_submit_button_color', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .sa-el-password-protected-content-fields .sa-el-submit' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'sa_el_ext_content_protection_type' => 'password',
            ],
                ]
        );

        $element->add_control(
                'sa_el_ext_content_protection_submit_button_bg_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#333333',
            'selectors' => [
                '{{WRAPPER}} .sa-el-password-protected-content-fields .sa-el-submit' => 'background: {{VALUE}};',
            ],
            'condition' => [
                'sa_el_ext_content_protection_type' => 'password',
            ],
                ]
        );

        $element->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_ext_content_protection_submit_button_border',
            'selector' => '{{WRAPPER}} .sa-el-password-protected-content-fields .sa-el-submit',
            'condition' => [
                'sa_el_ext_content_protection_type' => 'password',
            ],
                ]
        );

        $element->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_el_ext_content_protection_submit_button_box_shadow',
            'selector' => '{{WRAPPER}} .sa-el-password-protected-content-fields .sa-el-submit',
            'condition' => [
                'sa_el_ext_content_protection_type' => 'password',
            ],
                ]
        );

        $element->add_control(
                'sa_el_ext_content_protection_submit_button_styles_hover', [
            'label' => __('Submit Button Hover', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'after',
            'condition' => [
                'sa_el_ext_content_protection_type' => 'password',
            ],
                ]
        );

        $element->add_control(
                'sa_el_ext_content_protection_submit_button_hover_text_color', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .sa-el-password-protected-content-fields .sa-el-submit:hover' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'sa_el_ext_content_protection_type' => 'password',
            ],
                ]
        );

        $element->add_control(
                'sa_el_ext_content_protection_submit_button_hover_bg_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#333333',
            'selectors' => [
                '{{WRAPPER}} .sa-el-password-protected-content-fields .sa-el-submit:hover' => 'background: {{VALUE}};',
            ],
            'condition' => [
                'sa_el_ext_content_protection_type' => 'password',
            ],
                ]
        );

        $element->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_ext_content_protection_submit_button_hover_border',
            'selector' => '{{WRAPPER}} .sa-el-password-protected-content-fields .sa-el-submit:hover',
            'condition' => [
                'sa_el_ext_content_protection_type' => 'password',
            ],
                ]
        );

        $element->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_el_ext_content_protection_submit_button_hover_box_shadow',
            'selector' => '{{WRAPPER}} .sa-el-password-protected-content-fields .sa-el-submit:hover',
            'condition' => [
                'sa_el_ext_content_protection_type' => 'password',
            ],
                ]
        );

        $element->end_controls_tab();

        $element->end_controls_tabs();

        $element->end_controls_section();
    }

    # Check current user role exists inside of the roles array.

    protected function current_user_privileges($settings) {
        if (!is_user_logged_in()) {
            return;
        }

        $user_role = reset(wp_get_current_user()->roles);
        return in_array($user_role, (array) $settings['sa_el_ext_content_protection_role']);
    }

    # render message

    protected function render_message($settings) {
        $html = '<div class="sa-el-protected-content-message">';

        if ($settings['sa_el_ext_content_protection_message_type'] == 'text') {
            $html .= '<div class="sa-el-protected-content-message-text">' . $settings['sa_el_ext_content_protection_message_text'] . '</div>';
        } elseif ($settings['sa_el_ext_content_protection_message_type'] == 'template') {
            if (!empty($settings['sa_el_ext_content_protection_message_template'])) {
                $template_id = $settings['sa_el_ext_content_protection_message_template'];
                $frontend = new Frontend;

                $html .= $frontend->get_builder_content($template_id, true);
            }
        }
        $html .= '</div>';

        return $html;
    }

    # password input form

    public function password_protected_form($settings) {
        $html = '<div class="sa-el-password-protected-content-fields">
            <form method="post">
                <input type="password" name="sa_el_ext_content_protection_password" class="sa-el-password" placeholder="' . $settings['sa_el_ext_content_protection_password_placeholder'] . '">
                <input type="submit" value="' . $settings['sa_el_ext_content_protection_password_submit_btn_txt'] . '" class="sa-el-submit">
            </form>';

        if (isset($_POST['sa_el_ext_content_protection_password'])) {
            if ($settings['sa_el_ext_content_protection_password'] != $_POST['sa_el_ext_content_protection_password']) {
                $html .= sprintf(__('<p class="protected-content-error-msg">Password does not match.</p>', SA_ELEMENTOR_TEXTDOMAIN));
            }
        }

        $html .= '</div>';

        return $html;
    }

    public function render_content($content, $widget) {
        $settings = $widget->get_settings_for_display();
        $html = '';

        if ($settings['sa_el_ext_content_protection'] == 'yes') {
            if ($settings['sa_el_ext_content_protection_type'] == 'role') {
                if ($this->current_user_privileges($settings) === true) {
                    $html .= $content;
                } else {
                    $html .= '<div class="sa-el-protected-content">' . $this->render_message($settings) . '</div>';
                }
            } elseif ($settings['sa_el_ext_content_protection_type'] == 'password') {
                if (empty($settings['sa_el_ext_content_protection_password'])) {
                    $html .= $content;
                } else {
                    $unlocked = false;

                    if (isset($_POST['sa_el_ext_content_protection_password'])) {
                        if ($settings['sa_el_ext_content_protection_password'] == $_POST['sa_el_ext_content_protection_password']) {
                            $unlocked = true;

                            $html .= "<script>
                                var expires = new Date();
                                expires.setTime(expires.getTime() + (1 * 60 * 60 * 1000));
                                document.cookie = 'sa_el_ext_content_protection_password=true;expires=' + expires.toUTCString();
                            </script>";
                        }
                    }

                    if (isset($_COOKIE['sa_el_ext_content_protection_password']) || $unlocked) {
                        $html .= $content;
                    } else {
                        $html .= '<div class="sa-el-protected-content">' . $this->render_message($settings) . $this->password_protected_form($settings) . '</div>';
                    }
                }
            }
        } else {
            $html .= $content;
        }

        return $html;
    }

}
