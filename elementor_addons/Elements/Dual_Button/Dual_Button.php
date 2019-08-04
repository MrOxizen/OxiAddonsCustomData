<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Dual_Button;

if (!defined('ABSPATH')) {
    exit;
}

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Scheme_Typography;
use \Elementor\Widget_Base as Widget_Base;

class Dual_Button extends Widget_Base
{

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function get_name()
    {
        return 'sa-el-dual-button';
    }

    public function get_categories()
    {
        return ['sa-el-addons'];
    }
    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Dual Button', SA_ELEMENTOR_TEXTDOMAIN);
    }

    /**
     * Get widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-dual-button oxi-el-admin-icon';
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            '_section_button',
            [
                'label' => __('Dual Buttons', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs('_tabs_buttons');

        $this->start_controls_tab(
            '_tab_button_left',
            [
                'label' => __('Left', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'left_button_text',
            [
                'label' => __('Text', SA_ELEMENTOR_TEXTDOMAIN),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Button Text', SA_ELEMENTOR_TEXTDOMAIN)
            ]
        );

        $this->add_control(
            'left_button_link',
            [
                'label' => __('Link', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::URL,
            ]
        );

        $this->add_control(
            'left_button_icon',
            [
                'label' => __('Icon', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => $this->Sa_El_Icon_Type(),
            ]
        );

        $this->add_control(
            'left_button_icon_position',
            [
                'label' => __('Icon Position', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'before' => [
                        'title' => __('Before', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'after' => [
                        'title' => __('After', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'eicon-h-align-right',
                    ]
                ],
                'toggle' => false,
                'default' => 'before',
                'condition' => [
                    'left_button_icon!' => '',
                ]
            ]
        );

        $this->add_control(
            'left_button_icon_spacing',
            [
                'label' => __('Icon Spacing', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'condition' => [
                    'left_button_icon!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-dual-btn--left .sa-el-dual-btn-icon--before' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .sa-el-dual-btn--left .sa-el-dual-btn-icon--after' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_button_connector',
            [
                'label' => __('Connector', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'button_connector_hide',
            [
                'label' => __('Hide Connector?', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Hide', SA_ELEMENTOR_TEXTDOMAIN),
                'label_off' => __('Show', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'button_connector_type',
            [
                'label' => __('Connector Type', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'text' => [
                        'title' => __('Text', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'fa fa-text-width',
                    ],
                    'icon' => [
                        'title' => __('Icon', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'fa fa-star',
                    ]
                ],
                'toggle' => false,
                'default' => 'text',
                'condition' => [
                    'button_connector_hide!' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'button_connector_text',
            [
                'label' => __('Text', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'default' => __('Or', SA_ELEMENTOR_TEXTDOMAIN),
                'condition' => [
                    'button_connector_hide!' => 'yes',
                    'button_connector_type' => 'text',
                ]
            ]
        );

        $this->add_control(
            'button_connector_icon',
            [
                'label' => __('Icon', SA_ELEMENTOR_TEXTDOMAIN),
                'type' =>  $this->Sa_El_Icon_Type(),
                'condition' => [
                    'button_connector_hide!' => 'yes',
                    'button_connector_type' => 'icon',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_button_right',
            [
                'label' => __('Right', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'right_button_text',
            [
                'label' => __('Text', SA_ELEMENTOR_TEXTDOMAIN),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Button Text', SA_ELEMENTOR_TEXTDOMAIN)
            ]
        );

        $this->add_control(
            'right_button_link',
            [
                'label' => __('Link', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::URL
            ]
        );

        $this->add_control(
            'right_button_icon',
            [
                'label' => __('Icon', SA_ELEMENTOR_TEXTDOMAIN),
                'type' =>  $this->Sa_El_Icon_Type(),
            ]
        );

        $this->add_control(
            'right_button_icon_position',
            [
                'label' => __('Icon Position', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'before' => [
                        'title' => __('Before', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'after' => [
                        'title' => __('After', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'eicon-h-align-right',
                    ]
                ],
                'toggle' => false,
                'default' => 'after',
                'condition' => [
                    'right_button_icon!' => ''
                ]
            ]
        );

        $this->add_control(
            'right_button_icon_spacing',
            [
                'label' => __('Icon Spacing', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'condition' => [
                    'right_button_icon!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-dual-btn--right .sa-el-dual-btn-icon--before' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .sa-el-dual-btn--right .sa-el-dual-btn-icon--after' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_common',
            [
                'label' => __('Common', SA_ELEMENTOR_TEXTDOMAIN),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-dual-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_gap',
            [
                'label' => __('Space Between Buttons', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-dual-btn--left' => 'margin-right: calc({{SIZE}}{{UNIT}}/2);',
                    '{{WRAPPER}} .sa-el-dual-btn--right' => 'margin-left: calc({{SIZE}}{{UNIT}}/2);',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .sa-el-dual-btn',
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .sa-el-dual-btn'
            ]
        );

        $this->add_control(
            'button_align_x',
            [
                'label' => __('Horizontal Alignment', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'flex-start' => [
                        'title' => __('Left', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'flex-end' => [
                        'title' => __('Right', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'eicon-h-align-right',
                    ]
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .elementor-widget-container' => 'justify-content: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_align_y',
            [
                'label' => __('Vertical Alignment', SA_ELEMENTOR_TEXTDOMAIN),
                'description' => __('Only works when buttons have different height', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'flex-start' => [
                        'title' => __('Left', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'center' => [
                        'title' => __('Center', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'flex-end' => [
                        'title' => __('Right', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'eicon-v-align-bottom',
                    ]
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .elementor-widget-container' => 'align-items: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_left_button',
            [
                'label' => __('Left Button', SA_ELEMENTOR_TEXTDOMAIN),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'left_button_padding',
            [
                'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-dual-btn--left' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'left_button_border',
                'selector' => '{{WRAPPER}} .sa-el-dual-btn--left'
            ]
        );

        $this->add_responsive_control(
            'left_button_border_radius',
            [
                'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-dual-btn--left' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'left_button_typography',
                'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .sa-el-dual-btn--left',
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'left_button_box_shadow',
                'selector' => '{{WRAPPER}} .sa-el-dual-btn--left'
            ]
        );

        $this->start_controls_tabs('_tabs_left_button');

        $this->start_controls_tab(
            '_tab_left_button_normal',
            [
                'label' => __('Normal', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'left_button_bg_color',
            [
                'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa-el-dual-btn--left' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'left_button_text_color',
            [
                'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa-el-dual-btn--left' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tabs_left_button_hover',
            [
                'label' => __('Hover', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'left_button_hover_bg_color',
            [
                'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa-el-dual-btn--left:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'left_button_hover_text_color',
            [
                'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa-el-dual-btn--left:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'left_button_hover_border_color',
            [
                'label' => __('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa-el-dual-btn--left:hover' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'left_button_border_border!' => ''
                ]
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_connector',
            [
                'label' => __('Connector', SA_ELEMENTOR_TEXTDOMAIN),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'connector_notice',
            [
                'type' => Controls_Manager::RAW_HTML,
                'raw' => __('Connector is hidden now, please enable connector from Content > Connector tab.', SA_ELEMENTOR_TEXTDOMAIN),
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
                'condition' => [
                    'button_connector_hide' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'connector_text_color',
            [
                'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa-el-dual-btn-connector' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'connector_bg_color',
            [
                'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa-el-dual-btn-connector' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'connector_typography',
                'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .sa-el-dual-btn-connector',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'connector_box_shadow',
                'selector' => '{{WRAPPER}} .sa-el-dual-btn-connector'
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_right_button',
            [
                'label' => __('Right Button', SA_ELEMENTOR_TEXTDOMAIN),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'right_button_padding',
            [
                'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-dual-btn--right' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'right_button_border',
                'selector' => '{{WRAPPER}} .sa-el-dual-btn--right'
            ]
        );

        $this->add_responsive_control(
            'right_button_border_radius',
            [
                'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-dual-btn--right' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'right_button_typography',
                'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .sa-el-dual-btn--right',
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'right_button_box_shadow',
                'selector' => '{{WRAPPER}} .sa-el-dual-btn--right'
            ]
        );

        $this->start_controls_tabs('_tabs_right_button');

        $this->start_controls_tab(
            '_tab_right_button_normal',
            [
                'label' => __('Normal', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'right_button_bg_color',
            [
                'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa-el-dual-btn--right' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'right_button_text_color',
            [
                'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa-el-dual-btn--right' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tabs_right_button_hover',
            [
                'label' => __('Hover', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'right_button_hover_bg_color',
            [
                'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa-el-dual-btn--right:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'right_button_hover_text_color',
            [
                'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa-el-dual-btn--right:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'right_button_hover_border_color',
            [
                'label' => __('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa-el-dual-btn--right:hover' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'right_button_border_border!' => ''
                ]
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        // Left button
        $this->add_render_attribute('left_button', 'class', 'sa-el-dual-btn sa-el-dual-btn--left');
        $this->add_render_attribute('left_button', 'href', esc_url($settings['left_button_link']['url']));
        if (!empty($settings['left_button_link']['is_external'])) {
            $this->add_render_attribute('left_button', 'target', '_blank');
        }
        if (!empty($settings['left_button_link']['nofollow'])) {
            $this->add_render_attribute('left_button', 'rel', 'nofollow');
        }
        $this->add_inline_editing_attributes('left_button_text', 'none');

        if ($settings['left_button_icon']) {
            $this->add_render_attribute('left_button_icon', 'class', [
                'sa-el-dual-btn-icon',
                'sa-el-dual-btn-icon--' . esc_attr($settings['left_button_icon_position']),
                esc_attr($settings['left_button_icon'])
            ]);
        }

        // Button connector
        $this->add_render_attribute('button_connector_text', 'class', 'sa-el-dual-btn-connector');
        if ($settings['button_connector_type'] === 'icon') {
            $this->add_render_attribute('button_connector_text', 'class', 'sa-el-dual-btn-connector--icon');
            $connector = $this->Sa_El_Icon_Render($settings['button_connector_icon']);
        } else {
            $this->add_render_attribute('button_connector_text', 'class', 'sa-el-dual-btn-connector--text');
            $this->add_inline_editing_attributes('button_connector_text', 'none');
            $connector = esc_html($settings['button_connector_text']);
        }

        // Right button
        $this->add_render_attribute('right_button', 'class', 'sa-el-dual-btn sa-el-dual-btn--right');
        $this->add_render_attribute('right_button', 'href', esc_url($settings['right_button_link']['url']));
        if (!empty($settings['right_button_link']['is_external'])) {
            $this->add_render_attribute('right_button', 'target', '_blank');
        }
        if (!empty($settings['right_button_link']['nofollow'])) {
            $this->add_render_attribute('right_button', 'rel', 'nofollow');
        }
        $this->add_inline_editing_attributes('right_button_text', 'none');

        if ($settings['right_button_icon']) {
            $this->add_render_attribute('right_button_icon', 'class', [
                'sa-el-dual-btn-icon',
                'sa-el-dual-btn-icon--' . esc_attr($settings['right_button_icon_position']),
                esc_attr($settings['right_button_icon'])
            ]);
        }
        ?>
        <div class="sa-el-dual-btn-wrapper">
            <a <?php echo $this->get_render_attribute_string('left_button'); ?>>
                <?php if ($settings['left_button_icon_position'] === 'before') : ?>
                <span  <?php echo $this->get_render_attribute_string('left_button_icon')?>>
                    <?php echo $this->Sa_El_Icon_Render($settings['left_button_icon']) ?>
                </span>
                <?php endif; ?>
                <span <?php echo $this->get_render_attribute_string('left_button_text'); ?>><?php echo esc_html($settings['left_button_text']); ?></span>
                <?php if ($settings['left_button_icon_position'] === 'after') : ?>
                <span  <?php echo $this->get_render_attribute_string('left_button_icon')?>>
                    <?php echo $this->Sa_El_Icon_Render($settings['left_button_icon']) ?>
                </span>
                <?php endif; ?>
            </a>
            <?php if ($settings['button_connector_hide'] !== 'yes') : ?>
                <span <?php echo $this->get_render_attribute_string('button_connector_text'); ?>><?php echo $connector; ?></span>
            <?php endif; ?>
        </div>
        <div class="sa-el-dual-btn-wrapper">
            <a <?php echo $this->get_render_attribute_string('right_button'); ?>>
                <?php if ($settings['right_button_icon_position'] === 'before') : ?>
                <span  <?php echo $this->get_render_attribute_string('right_button_icon')?>>
                    <?php echo $this->Sa_El_Icon_Render($settings['right_button_icon']) ?>
                </span>
                <?php endif; ?>
                <span <?php echo $this->get_render_attribute_string('right_button_text'); ?>><?php echo esc_html($settings['right_button_text']); ?></span>
                <?php if ($settings['right_button_icon_position'] === 'after') : ?>
                <span  <?php echo $this->get_render_attribute_string('right_button_icon')?>>
                    <?php echo $this->Sa_El_Icon_Render($settings['right_button_icon']) ?>
                </span>
                <?php endif; ?>
            </a>
        </div>
    <?php
    }
}
