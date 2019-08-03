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
use \Elementor\Frontend;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Scheme_Typography;

class SA_Ribon {

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function __construct() {
        add_action('elementor/element/common/_section_style/after_section_end', [$this, 'register_controls'], 10);
        add_action('elementor/widget/before_render_content', array($this, 'before_render'));
        add_action('elementor/widget/before_render_content', array($this, 'after_render'));
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
            'prefix_class' => 'sa_el_ribon__'
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
            'selectors' => [
                '{{WRAPPER}} .sa-el-ribon' => 'color: {{VALUE}}',
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
            'selectors' => [
                '{{WRAPPER}} .sa-el-ribon' => 'background-color: {{VALUE}}',
            ], 'condition' => [
                'sa_el_ribon_switch' => 'yes',
            ],
                ]
        );
        $element->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'ribon_typography',
            'selector' => '{{WRAPPER}} .sa-el-ribon',
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
                'size' => 38,
                'unit' => 'px',
            ],
            'tablet_default' => [
                'unit' => 'px',
            ],
            'mobile_default' => [
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-divider.vertical' => 'height: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .divider-border' => 'border-top-width: {{SIZE}}{{UNIT}};',
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
                'size' => 140,
                'unit' => 'px',
            ],
            'tablet_default' => [
                'unit' => 'px',
            ],
            'mobile_default' => [
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-ribon.horizontal' => 'width: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'sa_el_ribon_switch' => 'yes',
            ],
                ]
        );

        $element->add_responsive_control(
                'sa_ribon_left_right', [
            'label' => __('Left & Right', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => -150,
                    'max' => 200,
                ],
            ],
            'default' => [
                'size' => -66,
                'unit' => 'px',
            ],
            'tablet_default' => [
                'unit' => 'px',
            ],
            'mobile_default' => [
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-ribon.horizontal' => 'width: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'sa_el_ribon_switch' => 'yes',
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
                '{{WRAPPER}} .sa-el-ribon.horizontal' => 'width: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'sa_el_ribon_switch' => 'yes',
            ],
                ]
        );
        $element->add_responsive_control(
                'sa_ribon_rotate', [
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
                'size' => 45,
                'unit' => 'px',
            ],
            'tablet_default' => [
                'unit' => 'px',
            ],
            'mobile_default' => [
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-ribon.horizontal' => 'width: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'sa_el_ribon_switch' => 'yes',
            ],
                ]
        );


        $element->add_responsive_control(
                'ribon_padding', [
            'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-ribon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ], 'condition' => [
                'sa_el_ribon_switch' => 'yes',
            ],
                ]
        );
        $element->end_controls_tab();



        $element->end_controls_tabs();
        $element->end_controls_section();
    }
      public function before_render($element)
    {

        $settings = $element->get_settings_for_display();

        if ($element->get_settings('sa_el_ribon_switch') == 'yes') {

            $element->add_render_attribute('_wrapper', [
                'id' => 'sa_el_ribon_' . $element->get_id(),
                'class' => 'sa_el_ribon',
            ]);
        }

    }

    public function after_render($element)
    {
        $settings = $element->get_settings_for_display();

        
    }

}
