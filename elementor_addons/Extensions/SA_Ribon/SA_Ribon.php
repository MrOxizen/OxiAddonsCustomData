<?php

namespace SA_ELEMENTOR_ADDONS\Extensions\SA_Ribon;

/**
 * Description of SA_Ribon
 *
 * @author Jabir
 */
if (!defined('ABSPATH')) {
    exit;
}

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Scheme_Typography;

class SA_Ribon {

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function __construct() {
        add_action('elementor/element/common/_section_style/after_section_end', [$this, 'register_controls'], 10);
        add_action('elementor/widget/render_content', [$this, 'render_content'], 10, 2);
    }

    public function get_name() {
        return 'sa-el-sa_ribon';
    }

    public function register_controls($element) {

        $element->start_controls_section(
                'sa_el_ribon_section', [
            'label' => __('SA Ribon', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_ADVANCED,
                ]
        );
        $element->add_control(
                'sa_el_ribon_switch', [
            'label' => __('Ribon', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'return_value' => 'yes',
            'frontend_available' => true,
                ]
        );
        $element->start_controls_tabs('sa_el_ribon_all');

        $element->start_controls_tab(
                'sa_el_ribon_settings', [
            'label' => __('Settings', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'sa_el_ribon_switch' => 'yes',
            ],
                ]
        );
        $element->add_control(
                'ribon_position', [
            'label' => __('Ribon Position', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::CHOOSE,
            'label_block' => false,
            'options' => [
                'left' => [
                    'title' => __('Left', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-h-align-left',
                ],
                'right' => [
                    'title' => __('Right', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-h-align-right',
                ],
            ],
            'condition' => [
                'sa_el_ribon_switch' => 'yes',
            ],
            'toggle' => false,
            'default' => 'right',
            'prefix_class' => 'sa_el_ribon__',
                ]
        );
        $element->add_control(
                'sa_el_ribon_section_content', [
            'label' => __('Ribon Text', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'default' => __('New', SA_ELEMENTOR_TEXTDOMAIN),
            'frontend_available' => true,
            'condition' => [
                'sa_el_ribon_switch' => 'yes',
            ],
                ]
        );
        $element->add_control(
                'sa_el_ribon_icon', [
            'label' => __('Icon', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'return_value' => 'yes',
            'frontend_available' => true,
            'condition' => [
                'sa_el_ribon_switch' => 'yes',
            ],
                ]
        );
        $element->add_control(
                'sa_el_ribon_icon_class', [
            'show_label' => false,
            'type' => $this->Sa_El_Icon_Type(),
            'label_block' => true,
            'default' => $this->Sa_El_Default_Icon('fas fa-balance-scale', 'fa-solid', 'fa fa-balance-scale'),
            'separator' => 'before',
            'condition' => [
                'sa_el_ribon_icon' => 'yes',
            ],
                ]
        );
        $element->add_control(
                'ribon_icon_position', [
            'label' => __('Icon Position', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::CHOOSE,
            'label_block' => false,
            'options' => [
                'left' => [
                    'title' => __('Left', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-h-align-left',
                ],
                'right' => [
                    'title' => __('Right', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-h-align-right',
                ],
            ],
            'condition' => [
                'sa_el_ribon_icon' => 'yes',
            ],
            'toggle' => false,
            'default' => 'left',
            'prefix_class' => 'sa_el_ribon_icon__'
                ]
        );
        $element->add_responsive_control(
                'sa_ribon_icon_spacing', [
            'label' => __('Icon Spacing', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 40,
                ],
            ],
            'default' => [
                'size' => 15,
                'unit' => 'px',
            ],
            'tablet_default' => [
                'unit' => 'px',
            ],
            'mobile_default' => [
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa_el_ribon_icon_left' => 'padding-right: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .sa_el_ribon_icon_right' => 'padding-left: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'sa_el_ribon_icon' => 'yes',
            ],
                ]
        );
        $element->end_controls_tab();
        $element->start_controls_tab(
                'sa_el_ribon_style', [
            'label' => __('Style', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'sa_el_ribon_switch' => 'yes',
            ],
                ]
        );

        $element->add_control(
                'ribon_color', [
            'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .sa_el_ribon_switch-wrapper-{{ID}}' => 'color: {{VALUE}}',
            ],
            'condition' => [
                'sa_el_ribon_switch' => 'yes',
            ],
                ]
        );

        $element->add_control(
                'ribon_bg_color', [
            'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#8200f4',
            'selectors' => [
                '{{WRAPPER}} .sa_el_ribon_switch-wrapper-{{ID}}' => 'background-color: {{VALUE}}',
            ], 'condition' => [
                'sa_el_ribon_switch' => 'yes',
            ],
                ]
        );
        $element->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'ribon_typography',
            'selector' => '{{WRAPPER}} .sa_el_ribon_switch-wrapper-{{ID}}',
            'condition' => [
                'sa_el_ribon_switch' => 'yes',
            ],
            'scheme' => Scheme_Typography::TYPOGRAPHY_4,
                ]
        );

        $element->add_responsive_control(
                'sa_ribon_vertical_height', [
            'label' => __('Height', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['%', 'px'],
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 300,
                ],
            ],
            'default' => [
                'size' => 35,
                'unit' => 'px',
            ],
            'tablet_default' => [
                'unit' => 'px',
            ],
            'mobile_default' => [
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa_el_ribon_switch-wrapper-{{ID}}' => 'height: {{SIZE}}{{UNIT}};'
            ], 'condition' => [
                'sa_el_ribon_switch' => 'yes',
            ],
                ]
        );
        $element->add_responsive_control(
                'sa_ribon_horizontal_height', [
            'label' => __('Width', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 400,
                ],
            ],
            'default' => [
                'size' => 200,
                'unit' => 'px',
            ],
            'tablet_default' => [
                'unit' => 'px',
            ],
            'mobile_default' => [
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa_el_ribon_switch-wrapper-{{ID}}' => 'width: {{SIZE}}{{UNIT}};'
            ],
            'condition' => [
                'sa_el_ribon_switch' => 'yes',
            ],
                ]
        );

        $element->add_responsive_control(
                'sa_ribon_left', [
            'label' => __('Left', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => -150,
                    'max' => 200,
                ],
            ],
            'default' => [
                'size' => -44,
                'unit' => 'px',
            ],
            'tablet_default' => [
                'unit' => 'px',
            ],
            'mobile_default' => [
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa_el_ribon_switch-wrapper-{{ID}}' => 'left: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'ribon_position' => 'left',
            ],
                ]
        );
        $element->add_responsive_control(
                'sa_ribon_right', [
            'label' => __('Right', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => -150,
                    'max' => 200,
                ],
            ],
            'default' => [
                'size' => -44,
                'unit' => 'px',
            ],
            'tablet_default' => [
                'unit' => 'px',
            ],
            'mobile_default' => [
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa_el_ribon_switch-wrapper-{{ID}}' => 'right: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'ribon_position' => 'right',
            ],
                ]
        );

        $element->add_responsive_control(
                'sa_ribon_top_pos', [
            'label' => __('Top', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => -200,
                    'max' => 200,
                ],
            ],
            'default' => [
                'size' => 28,
                'unit' => 'px',
            ],
            'tablet_default' => [
                'unit' => 'px',
            ],
            'mobile_default' => [
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}}  .sa_el_ribon_switch-wrapper-{{ID}}' => 'top: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'sa_el_ribon_switch' => 'yes',
            ],
                ]
        );
        $element->add_responsive_control(
                'sa_ribon_rotate_left', [
            'label' => __('Rotate', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => -360,
                    'max' => 360,
                ],
            ],
            'default' => [
                'size' => -41,
                'unit' => 'px',
            ],
            'tablet_default' => [
                'unit' => 'px',
            ],
            'mobile_default' => [
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa_el_ribon_switch-wrapper-{{ID}}' => 'transform: rotate({{SIZE}}deg);',
            ],
            'condition' => [
                'ribon_position' => 'left',
            ],
                ]
        );
        $element->add_responsive_control(
                'sa_ribon_rotate_right', [
            'label' => __('Rotate', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => -360,
                    'max' => 360,
                ],
            ],
            'default' => [
                'size' => 41,
                'unit' => 'px',
            ],
            'tablet_default' => [
                'unit' => 'px',
            ],
            'mobile_default' => [
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa_el_ribon_switch-wrapper-{{ID}}' => 'transform: rotate({{SIZE}}deg);',
            ],
            'condition' => [
                'ribon_position' => 'right',
            ],
                ]
        );


        $element->add_responsive_control(
                'ribon_padding', [
            'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_ribon_switch-wrapper-{{ID}}' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ], 'condition' => [
                'sa_el_ribon_switch' => 'yes',
            ],
                ]
        );
        $element->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'ribon_box_shadow',
            'selector' => '{{WRAPPER}}  .sa_el_ribon_switch-wrapper-{{ID}}',
                ]
        );
        $element->end_controls_tab();



        $element->end_controls_tabs();
        $element->end_controls_section();
    }

    public function render_content($content, $widget) {

        $settings = $widget->get_settings_for_display();
        $html = $icon = '';
        if ($settings['sa_el_ribon_switch'] == 'yes') {
            $html .= '<div class="sa_el_ribon_switch-wrapper sa_el_ribon_switch-wrapper-' . $widget->get_id() . '">';
            if ($settings['sa_el_ribon_icon'] == 'yes'):
                $icon = $this->Sa_El_Icon_Render($settings['sa_el_ribon_icon_class']);
            endif;
            if ($settings['ribon_icon_position'] == 'left'):
                $html .= '<span class="sa_el_ribon_icon sa_el_ribon_icon_left">' . $icon . '</span>';
                $html .= '<span>' . $settings['sa_el_ribon_section_content'] . '</span>';
            else:
                $html .= '<span>' . $settings['sa_el_ribon_section_content'] . '</span>';
                $html .= '<span class="sa_el_ribon_icon sa_el_ribon_icon_right">' . $icon . '</span>';
            endif;
            $html .= '</div>';
        }

        $html .= $content;

        return $html;
    }

}
