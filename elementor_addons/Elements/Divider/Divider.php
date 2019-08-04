<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Divider;

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
use \Elementor\Utils as Utils;
use \Elementor\Widget_Base as Widget_Base;
use Elementor\Group_Control_Text_Shadow;

// use \SA_ELEMENTOR_ADDONS\Classes\Bootstrap;

class Divider extends Widget_Base {

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function get_name() {
        return 'sa_el_Divider';
    }

    public function get_title() {
        return esc_html__('Divider', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon() {
        return 'eicon-divider  oxi-el-admin-icon';
    }

    public function get_categories() {
        return ['sa-el-addons'];
    }

    protected function _register_controls() {

        /* ----------------------------------------------------------------------------------- */
        /* 	CONTENT TAB
          /*----------------------------------------------------------------------------------- */

        /**
         * Content Tab: Divider
         */
        $this->start_controls_section(
                'section_buton', [
            'label' => __('Divider', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'divider_type', [
            'label' => esc_html__('Type', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::CHOOSE,
            'label_block' => false,
            'options' => [
                'plain' => [
                    'title' => esc_html__('Plain', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-ellipsis-h',
                ],
                'text' => [
                    'title' => esc_html__('Text', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-file-text-o',
                ],
                'icon' => [
                    'title' => esc_html__('Icon', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-certificate',
                ],
                'image' => [
                    'title' => esc_html__('Image', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-picture-o',
                ],
            ],
            'default' => 'icon',
                ]
        );

        $this->add_control(
                'divider_direction', [
            'label' => __('Direction', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'horizontal',
            'options' => [
                'horizontal' => __('Horizontal', SA_ELEMENTOR_TEXTDOMAIN),
                'vertical' => __('Vertical', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'condition' => [
                'divider_type' => 'plain',
            ],
                ]
        );

        $this->add_control(
                'divider_text', [
            'label' => __('Text', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'default' => __('Divider Text', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'divider_type' => 'text',
            ],
                ]
        );

        $this->add_control(
                'divider_icon', [
            'label' => __('Icon', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => $this->Sa_El_Icon_Type(),
            'label_block' => true,
            'default' => $this->Sa_El_Default_Icon('fas fa-certificate', 'fa-solid', 'fas fa-certificate'),
            'condition' => [
                'divider_type' => 'icon',
            ],
                ]
        );

        $this->add_control(
                'text_html_tag', [
            'label' => __('HTML Tag', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'span',
            'options' => [
                'h1' => __('H1', SA_ELEMENTOR_TEXTDOMAIN),
                'h2' => __('H2', SA_ELEMENTOR_TEXTDOMAIN),
                'h3' => __('H3', SA_ELEMENTOR_TEXTDOMAIN),
                'h4' => __('H4', SA_ELEMENTOR_TEXTDOMAIN),
                'h5' => __('H5', SA_ELEMENTOR_TEXTDOMAIN),
                'h6' => __('H6', SA_ELEMENTOR_TEXTDOMAIN),
                'div' => __('div', SA_ELEMENTOR_TEXTDOMAIN),
                'span' => __('span', SA_ELEMENTOR_TEXTDOMAIN),
                'p' => __('p', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'condition' => [
                'divider_type' => 'text',
            ],
                ]
        );

        $this->add_control(
                'divider_image', [
            'label' => __('Image', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
            'condition' => [
                'divider_type' => 'image',
            ],
                ]
        );

        $this->add_responsive_control(
                'align', [
            'label' => __('Alignment', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::CHOOSE,
            'default' => 'center',
            'options' => [
                'left' => [
                    'title' => __('Left', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-h-align-left',
                ],
                'center' => [
                    'title' => __('Center', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-h-align-center',
                ],
                'right' => [
                    'title' => __('Right', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-h-align-right',
                ],
            ],
            'selectors' => [
                '{{WRAPPER}}' => 'text-align: {{VALUE}};',
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
        /* ----------------------------------------------------------------------------------- */
        /* 	STYLE TAB
          /*----------------------------------------------------------------------------------- */

        /**
         * Style Tab: Divider
         */
        $this->start_controls_section(
                'section_divider_style', [
            'label' => __('Divider', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );


        $this->add_control(
                'divider_vertical_align', [
            'label' => __('Vertical Alignment', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::CHOOSE,
            'label_block' => false,
            'default' => 'middle',
            'options' => [
                'top' => [
                    'title' => __('Top', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-v-align-top',
                ],
                'middle' => [
                    'title' => __('Center', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-v-align-middle',
                ],
                'bottom' => [
                    'title' => __('Bottom', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-v-align-bottom',
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .divider-text-wrap' => 'align-items: {{VALUE}};',
            ],
            'selectors_dictionary' => [
                'top' => 'flex-start',
                'middle' => 'center',
                'bottom' => 'flex-end',
            ],
            'condition' => [
                'divider_type!' => 'plain',
            ],
                ]
        );

        $this->add_control(
                'divider_style', [
            'label' => __('Style', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'dashed',
            'options' => [
                'solid' => __('Solid', SA_ELEMENTOR_TEXTDOMAIN),
                'dashed' => __('Dashed', SA_ELEMENTOR_TEXTDOMAIN),
                'dotted' => __('Dotted', SA_ELEMENTOR_TEXTDOMAIN),
                'double' => __('Double', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-divider, {{WRAPPER}} .divider-border' => 'border-style: {{VALUE}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'horizontal_height', [
            'label' => __('Height', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['%', 'px'],
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 60,
                ],
            ],
            'default' => [
                'size' => 3,
                'unit' => 'px',
            ],
            'tablet_default' => [
                'unit' => 'px',
            ],
            'mobile_default' => [
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-divider.horizontal' => 'border-bottom-width: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .divider-border' => 'border-top-width: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'divider_direction' => 'horizontal',
            ],
                ]
        );

        $this->add_responsive_control(
                'vertical_height', [
            'label' => __('Height', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['%', 'px'],
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 500,
                ],
            ],
            'default' => [
                'size' => 80,
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
            ],
            'condition' => [
                'divider_direction' => 'vertical',
            ],
                ]
        );

        $this->add_responsive_control(
                'horizontal_width', [
            'label' => __('Width', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['%', 'px'],
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 1200,
                ],
            ],
            'default' => [
                'size' => 300,
                'unit' => 'px',
            ],
            'tablet_default' => [
                'unit' => 'px',
            ],
            'mobile_default' => [
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-divider.horizontal' => 'width: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .divider-text-container' => 'width: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'divider_direction' => 'horizontal',
            ],
                ]
        );

        $this->add_responsive_control(
                'vertical_width', [
            'label' => __('Width', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['%', 'px'],
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 100,
                ],
            ],
            'default' => [
                'size' => 3,
                'unit' => 'px',
            ],
            'tablet_default' => [
                'unit' => 'px',
            ],
            'mobile_default' => [
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-divider.vertical' => 'border-left-width: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .divider-text-container' => 'width: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'divider_direction' => 'vertical',
            ],
                ]
        );

        $this->add_control(
                'divider_border_color', [
            'label' => __('Divider Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa-el-divider, {{WRAPPER}} .divider-border' => 'border-color: {{VALUE}};',
            ],
            'condition' => [
                'divider_type' => 'plain',
            ],
                ]
        );

        $this->start_controls_tabs('tabs_before_after_style');

        $this->start_controls_tab(
                'tab_before_style', [
            'label' => __('Before', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'divider_type!' => 'plain',
            ],
                ]
        );

        $this->add_control(
                'divider_before_color', [
            'label' => __('Divider Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'condition' => [
                'divider_type!' => 'plain',
            ],
            'selectors' => [
                '{{WRAPPER}} .divider-border-left .divider-border' => 'border-color: {{VALUE}};',
            ],
                ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
                'tab_after_style', [
            'label' => __('After', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'divider_type!' => 'plain',
            ],
                ]
        );

        $this->add_control(
                'divider_after_color', [
            'label' => __('Divider Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'condition' => [
                'divider_type!' => 'plain',
            ],
            'selectors' => [
                '{{WRAPPER}} .divider-border-right .divider-border' => 'border-color: {{VALUE}};',
            ],
                ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /**
         * Style Tab: Text
         */
        $this->start_controls_section(
                'section_text_style', [
            'label' => __('Text', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'divider_type' => 'text',
            ],
                ]
        );

        $this->add_control(
                'text_position', [
            'label' => __('Position', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => __('Left', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-h-align-left',
                ],
                'center' => [
                    'title' => __('Center', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-h-align-center',
                ],
                'right' => [
                    'title' => __('Right', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-h-align-right',
                ],
            ],
            'default' => 'center',
            'prefix_class' => 'sa-el-divider-'
                ]
        );

        $this->add_control(
                'divider_text_color', [
            'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'condition' => [
                'divider_type' => 'text',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-divider-text' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'typography',
            'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
            'scheme' => Scheme_Typography::TYPOGRAPHY_4,
            'selector' => '{{WRAPPER}} .sa-el-divider-text',
            'condition' => [
                'divider_type' => 'text',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Text_Shadow::get_type(), [
            'name' => 'divider_text_shadow',
            'selector' => '{{WRAPPER}} .sa-el-divider-text',
                ]
        );

        $this->add_responsive_control(
                'text_spacing', [
            'label' => __('Spacing', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['%', 'px'],
            'range' => [
                'px' => [
                    'max' => 200,
                ],
            ],
            'condition' => [
                'divider_type' => 'text',
            ],
            'selectors' => [
                '{{WRAPPER}}.sa-el-divider-center .sa-el-divider-content' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}}.sa-el-divider-left .sa-el-divider-content' => 'margin-right: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}}.sa-el-divider-right .sa-el-divider-content' => 'margin-left: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Icon
         */
        $this->start_controls_section(
                'section_icon_style', [
            'label' => __('Icon', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'divider_type' => 'icon',
            ],
                ]
        );

        $this->add_control(
                'icon_position', [
            'label' => __('Position', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => __('Left', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-h-align-left',
                ],
                'center' => [
                    'title' => __('Center', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-h-align-center',
                ],
                'right' => [
                    'title' => __('Right', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-h-align-right',
                ],
            ],
            'default' => 'center',
            'prefix_class' => 'sa-el-divider-'
                ]
        );

        $this->add_control(
                'divider_icon_color', [
            'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'condition' => [
                'divider_type' => 'icon',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-divider-icon' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'icon_size', [
            'label' => __('Size', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['%', 'px'],
            'range' => [
                'px' => [
                    'max' => 100,
                ],
            ],
            'default' => [
                'size' => 16,
                'unit' => 'px',
            ],
            'condition' => [
                'divider_type' => 'icon',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-divider-icon' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'icon_rotation', [
            'label' => __('Icon Rotation', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['%', 'px'],
            'range' => [
                'px' => [
                    'max' => 360,
                ],
            ],
            'default' => [
                'unit' => 'px',
            ],
            'tablet_default' => [
                'unit' => 'px',
            ],
            'mobile_default' => [
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-divider-icon .fa' => 'transform: rotate( {{SIZE}}deg );',
            ],
            'condition' => [
                'divider_type' => 'icon',
            ],
                ]
        );

        $this->add_responsive_control(
                'icon_spacing', [
            'label' => __('Spacing', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['%', 'px'],
            'range' => [
                'px' => [
                    'max' => 200,
                ],
            ],
            'condition' => [
                'divider_type' => 'icon',
            ],
            'selectors' => [
                '{{WRAPPER}}.sa-el-divider-center .sa-el-divider-content' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}}.sa-el-divider-left .sa-el-divider-content' => 'margin-right: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}}.sa-el-divider-right .sa-el-divider-content' => 'margin-left: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Image
         */
        $this->start_controls_section(
                'section_image_style', [
            'label' => __('Image', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'divider_type' => 'image',
            ],
                ]
        );

        $this->add_control(
                'image_position', [
            'label' => __('Position', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => __('Left', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-h-align-left',
                ],
                'center' => [
                    'title' => __('Center', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-h-align-center',
                ],
                'right' => [
                    'title' => __('Right', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-h-align-right',
                ],
            ],
            'default' => 'center',
            'prefix_class' => 'sa-el-divider-'
                ]
        );

        $this->add_responsive_control(
                'image_width', [
            'label' => __('Width', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['%', 'px'],
            'range' => [
                'px' => [
                    'max' => 1200,
                ],
            ],
            'default' => [
                'size' => 80,
                'unit' => 'px',
            ],
            'tablet_default' => [
                'unit' => 'px',
            ],
            'mobile_default' => [
                'unit' => 'px',
            ],
            'condition' => [
                'divider_type' => 'image',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-divider-image' => 'width: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'icon_border_radius', [
            'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'condition' => [
                'divider_type' => 'image',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-divider-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'image_spacing', [
            'label' => __('Spacing', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['%', 'px'],
            'range' => [
                'px' => [
                    'max' => 200,
                ],
            ],
            'condition' => [
                'divider_type' => 'image',
            ],
            'selectors' => [
                '{{WRAPPER}}.sa-el-divider-center .sa-el-divider-content' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}}.sa-el-divider-left .sa-el-divider-content' => 'margin-right: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}}.sa-el-divider-right .sa-el-divider-content' => 'margin-left: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->end_controls_section();
    }

    /**
     * Render divider widget output on the frontend.
     */
    protected function render() {
        $settings = $this->get_settings();

        $this->add_render_attribute('divider', 'class', 'sa-el-divider');

        if ($settings['divider_direction']) {
            $this->add_render_attribute('divider', 'class', $settings['divider_direction']);
        }

        if ($settings['divider_style']) {
            $this->add_render_attribute('divider', 'class', $settings['divider_style']);
        }

        $this->add_render_attribute('divider-content', 'class', 'sa-el-divider-' . $settings['divider_type']);

        $this->add_inline_editing_attributes('divider_text', 'none');
        $this->add_render_attribute('divider_text', 'class', 'sa-el-divider-' . $settings['divider_type']);
        ?>
        <div class="sa-el-divider-wrap">
            <?php if ($settings['divider_type'] == 'plain') { ?>
                <div <?php echo $this->get_render_attribute_string('divider'); ?>></div>
                <?php
            } else {
                ?>
                <div class="divider-text-container">
                    <div class="divider-text-wrap">
                        <span class="divider-border-wrap divider-border-left">
                            <span class="divider-border"></span>
                        </span>
                        <span class="sa-el-divider-content">
                            <?php if ($settings['divider_type'] == 'text' && $settings['divider_text']) { ?>
                                <?php
                                printf('<%1$s %2$s>%3$s</%1$s>', $settings['text_html_tag'], $this->get_render_attribute_string('divider_text'), $settings['divider_text']);
                                ?>
                            <?php } elseif ($settings['divider_type'] == 'icon' && $settings['divider_icon']) { ?>
                                <span <?php echo $this->get_render_attribute_string('divider-content'); ?>><?php
                                    echo  $this->Sa_El_Icon_Render($settings['divider_icon']);
                                    ?>
                                </span>
                            <?php } elseif ($settings['divider_type'] == 'image') { ?>
                                <span <?php echo $this->get_render_attribute_string('divider-content'); ?>>
                                    <?php if (isset($settings['divider_image']['url'])) { ?>
                                        <img src="<?php echo esc_url($settings['divider_image']['url']); ?>" alt="<?php echo esc_attr(get_post_meta($settings['divider_image']['id'], '_wp_attachment_image_alt', true)); ?>">
                                    <?php } ?>
                                </span>
                            <?php } ?>
                        </span>
                        <span class="divider-border-wrap divider-border-right">
                            <span class="divider-border"></span>
                        </span>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>    
        <?php
    }

}
