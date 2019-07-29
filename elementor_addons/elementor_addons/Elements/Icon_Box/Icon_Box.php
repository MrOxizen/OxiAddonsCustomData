<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Icon_Box;

if (!defined('ABSPATH')) {
    exit;
}

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

class Icon_Box extends Widget_Base {

    public function get_name() {
        return 'sa_el_icon_box_button';
    }

    public function get_title() {
        return esc_html__('Icon Box', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon() {
        return 'eicon-button';
    }

    public function get_categories() {
        return ['sa-el-addons'];
    }

    public function get_keywords() {
        return ['info', 'box', 'icon'];
    }

    protected function _register_controls() {

        $this->start_controls_section(
                '_section_icon', [
            'label' => __('Content', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_CONTENT,
                ]
        );

        $this->add_control(
                'icon', [
            'show_label' => false,
            'type' => Controls_Manager::ICON,
            'label_block' => true,
            'default' => 'fa fa-smile-o',
                ]
        );

        $this->add_control(
                'title', [
            'label' => __('Title', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => __('Icon Box Title', SA_ELEMENTOR_TEXTDOMAIN),
            'placeholder' => __('Type Icon Box Title', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'badge_text', [
            'label' => __('Badge Text', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'placeholder' => __('Type Icon Badge Text', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'link', [
            'label' => __('Box Link', SA_ELEMENTOR_TEXTDOMAIN),
            'separator' => 'before',
            'type' => Controls_Manager::URL,
            'placeholder' => __('https://example.com/', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'title_tag', [
            'label' => __('Title HTML Tag', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::CHOOSE,
            'separator' => 'before',
            'options' => [
                'h1' => [
                    'title' => __('H1', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-editor-h1'
                ],
                'h2' => [
                    'title' => __('H2', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-editor-h2'
                ],
                'h3' => [
                    'title' => __('H3', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-editor-h3'
                ],
                'h4' => [
                    'title' => __('H4', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-editor-h4'
                ],
                'h5' => [
                    'title' => __('H5', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-editor-h5'
                ],
                'h6' => [
                    'title' => __('H6', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-editor-h6'
                ]
            ],
            'default' => 'h2',
            'toggle' => false,
                ]
        );

        $this->add_responsive_control(
                'align', [
            'label' => __('Alignment', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => __('Left', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-align-left',
                ],
                'center' => [
                    'title' => __('Center', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-align-center',
                ],
                'right' => [
                    'title' => __('Right', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-align-right',
                ],
                'justify' => [
                    'title' => __('Justify', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-align-justify',
                ],
            ],
            'toggle' => true,
            'selectors' => [
                '{{WRAPPER}}' => 'text-align: {{VALUE}}'
            ]
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                '_section_style_icon', [
            'label' => __('Icon', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_responsive_control(
                'icon_size', [
            'label' => __('Size', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 10,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .ha-icon-box-icon' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'icon_padding', [
            'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'selectors' => [
                '{{WRAPPER}} .ha-icon-box-icon' => 'padding: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'icon_spacing', [
            'label' => __('Bottom Spacing', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'max' => 150,
                ]
            ],
            'selectors' => [
                '{{WRAPPER}} .ha-icon-box-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'icon_border',
            'selector' => '{{WRAPPER}} .ha-icon-box-icon'
                ]
        );

        $this->add_responsive_control(
                'icon_border_radius', [
            'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ha-icon-box-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'icon_shadow',
            'exclude' => [
                'box_shadow_position',
            ],
            'selector' => '{{WRAPPER}} .ha-icon-box-icon'
                ]
        );

        $this->start_controls_tabs('_tabs_icon');

        $this->start_controls_tab(
                '_tab_icon_normal', [
            'label' => __('Normal', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'icon_color', [
            'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .ha-icon-box-icon' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'icon_bg_color', [
            'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .ha-icon-box-icon' => 'background-color: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'icon_bg_rotate', [
            'label' => __('Rotate Icon Box', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['deg'],
            'default' => [
                'unit' => 'deg',
            ],
            'range' => [
                'deg' => [
                    'min' => 0,
                    'max' => 360,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .ha-icon-box-icon' => '-webkit-transform: rotate({{SIZE}}{{UNIT}}); transform: rotate({{SIZE}}{{UNIT}});',
                '{{WRAPPER}} .ha-icon-box-icon > i' => '-webkit-transform: rotate(-{{SIZE}}{{UNIT}}); transform: rotate(-{{SIZE}}{{UNIT}});',
            ],
            'condition' => [
                'icon_bg_color!' => '',
            ]
                ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
                '_tab_button_hover', [
            'label' => __('Hover', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'icon_hover_color', [
            'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}:hover .ha-icon-box-icon' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'icon_hover_bg_color', [
            'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}:hover .ha-icon-box-icon' => 'background-color: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'icon_hover_border_color', [
            'label' => __('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}:hover .ha-icon-box-icon' => 'border-color: {{VALUE}}',
            ],
            'condition' => [
                'icon_border_border!' => '',
            ]
                ]
        );

        $this->add_control(
                'icon_hover_bg_rotate', [
            'label' => __('Rotate Icon Box', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['deg'],
            'default' => [
                'unit' => 'deg',
            ],
            'range' => [
                'deg' => [
                    'min' => 0,
                    'max' => 360,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}}:hover .ha-icon-box-icon' => '-webkit-transform: rotate({{SIZE}}{{UNIT}}); transform: rotate({{SIZE}}{{UNIT}});',
                '{{WRAPPER}}:hover .ha-icon-box-icon > i' => '-webkit-transform: rotate(-{{SIZE}}{{UNIT}}); transform: rotate(-{{SIZE}}{{UNIT}});',
            ],
            'condition' => [
                'icon_bg_color!' => '',
            ]
                ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
                '_section_style_title', [
            'label' => __('Title', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'title',
            'selector' => '{{WRAPPER}} .ha-icon-box-title',
            'scheme' => Scheme_Typography::TYPOGRAPHY_2
                ]
        );

        $this->add_group_control(
                Group_Control_Text_Shadow::get_type(), [
            'name' => 'title',
            'selector' => '{{WRAPPER}} .ha-icon-box-title',
                ]
        );

        $this->start_controls_tabs('_tabs_title');

        $this->start_controls_tab(
                '_tab_title_normal', [
            'label' => __('Normal', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'title_color', [
            'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .ha-icon-box-title' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
                '_tab_title_hover', [
            'label' => __('Hover', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'title_hover_color', [
            'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}:hover .ha-icon-box-title' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
                '_section_style_badge', [
            'label' => __('Badge', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'badge_offset_toggle', [
            'label' => __('Offset', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::POPOVER_TOGGLE,
            'label_off' => __('None', SA_ELEMENTOR_TEXTDOMAIN),
            'label_on' => __('Custom', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => 'yes',
                ]
        );

        $this->start_popover();

        $this->add_responsive_control(
                'badge_offset_x', [
            'label' => __('Offset Left', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'condition' => [
                'badge_offset_toggle' => 'yes'
            ],
            'default' => [
                'size' => 1
            ],
            'range' => [
                'px' => [
                    'min' => -250,
                    'max' => 250,
                ],
            ],
            'render_type' => 'ui'
                ]
        );

        $this->add_responsive_control(
                'badge_offset_y', [
            'label' => __('Offset Top', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'condition' => [
                'badge_offset_toggle' => 'yes'
            ],
            'default' => [
                'size' => 1
            ],
            'range' => [
                'px' => [
                    'min' => -250,
                    'max' => 250,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .ha-badge' => '-ms-transform: translate({{badge_offset_x.SIZE}}{{UNIT}}, {{SIZE}}{{UNIT}}); -webkit-transform: translate({{badge_offset_x.SIZE}}{{UNIT}}, {{SIZE}}{{UNIT}}); transform: translate({{badge_offset_x.SIZE}}{{UNIT}}, {{SIZE}}{{UNIT}});',
            ],
                ]
        );
        $this->end_popover();

        $this->add_responsive_control(
                'badge_padding', [
            'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .ha-badge' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'badge_color', [
            'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .ha-badge' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'badge_bg_color', [
            'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .ha-badge' => 'background-color: {{VALUE}}',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'badge_border',
            'selector' => '{{WRAPPER}} .ha-badge',
                ]
        );

        $this->add_responsive_control(
                'badge_border_radius', [
            'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ha-badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'badge_box_shadow',
            'exclude' => [
                'box_shadow_position',
            ],
            'selector' => '{{WRAPPER}} .ha-badge',
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'badge_typography',
            'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
            'exclude' => [
                'font_family',
                'line_height'
            ],
            'default' => [
                'font_size' => ['']
            ],
            'selector' => '{{WRAPPER}} .ha-badge',
            'scheme' => Scheme_Typography::TYPOGRAPHY_3,
                ]
        );

        $this->end_controls_section();
    }

}
