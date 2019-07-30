<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Image_Comparison;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Description of Image Comparison
 *
 * @author biplop
 * 
 */
use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Group_Control_Background as Group_Control_Background;
use \Elementor\Scheme_Typography as Scheme_Typography;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Utils as Utils;
use \Elementor\Widget_Base as Widget_Base;
use \Elementor\Group_Control_Image_Size;
use \SA_ELEMENTOR_ADDONS\Classes\Bootstrap;

class Image_Comparison extends Widget_Base {

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function get_name() {
        return 'sa_el_img_comparison';
    }

    public function get_title() {
        return esc_html__('Image Comparison', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon() {
        return 'eicon-image-before-after  oxi-el-admin-icon';
    }

    public function get_categories() {
        return ['sa-el-addons'];
    }

    protected function _register_controls() {

        // Content Controls
        $this->start_controls_section(
                'sa_el_image_comparison_images', [
            'label' => esc_html__('Images', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'before_image_label', [
            'label' => __('Label Before', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => 'Before',
            'title' => __('Input before image label', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'before_image', [
            'label' => __('Choose Before Image', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
                ]
        );

        $this->add_control(
                'before_image_alt', [
            'label' => __('Before Image ALT Tag', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => '',
            'placeholder' => __('Enter alter tag for the image', SA_ELEMENTOR_TEXTDOMAIN),
            'title' => __('Input image alter tag here', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'after_image_label', [
            'label' => __('Label After', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => 'After',
            'title' => __('Input after image label', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );
        $this->add_control(
                'after_image', [
            'label' => __('Choose After Image', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
                ]
        );

        $this->add_control(
                'after_image_alt', [
            'label' => __('After Image ALT Tag', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => '',
            'placeholder' => __('Enter alter tag for the image', SA_ELEMENTOR_TEXTDOMAIN),
            'title' => __('Input image alter tag here', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'sa_el_image_comparison_settings', [
            'label' => esc_html__('Settings', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'sa_el_image_comp_offset', [
            'label' => esc_html__('Original Image Visibility', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['%'],
            'range' => ['%' => ['min' => 10, 'max' => 90]],
            'default' => ['size' => 70, 'unit' => '%'],
                ]
        );

        $this->add_control(
                'sa_el_image_comp_orientation', [
            'label' => esc_html__('Orientation', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'options' => [
                'horizontal' => __('Horizontal', SA_ELEMENTOR_TEXTDOMAIN),
                'vertical' => __('Vertical', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'default' => 'horizontal',
                ]
        );

        $this->add_control(
                'sa_el_image_comp_overlay', [
            'label' => esc_html__('Wants Overlay ?', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('yes', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('no', SA_ELEMENTOR_TEXTDOMAIN),
            'default' => 'yes',
                ]
        );

        $this->add_control(
                'sa_el_image_comp_move', [
            'label' => esc_html__('Move Slider On Hover', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('yes', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('no', SA_ELEMENTOR_TEXTDOMAIN),
            'default' => 'no',
                ]
        );

        $this->add_control(
                'sa_el_image_comp_click', [
            'label' => esc_html__('Move Slider On Click', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('yes', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('no', SA_ELEMENTOR_TEXTDOMAIN),
            'default' => 'no',
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
                'sa_el_image_comparison_styles', [
            'label' => esc_html__('Image Container Styles', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'sa_el_image_container_width', [
            'label' => esc_html__('Set max width for the container?', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('yes', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('no', SA_ELEMENTOR_TEXTDOMAIN),
            'default' => 'yes',
                ]
        );

        $this->add_responsive_control(
                'sa_el_image_container_width_value', [
            'label' => __('Container Max Width', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 80,
                'unit' => '%',
            ],
            'size_units' => ['%', 'px'],
            'range' => [
                '%' => [
                    'min' => 1,
                    'max' => 100,
                ],
                'px' => [
                    'min' => 1,
                    'max' => 1000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-img-comp-container' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'sa_el_image_container_width' => 'yes',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_img_comp_border',
            'selector' => '{{WRAPPER}} .sa-el-img-comp-container',
                ]
        );

        $this->add_control(
                'sa_el_img_comp_border_radius', [
            'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-img-comp-container' => 'border-radius: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Handle
         */
        $this->start_controls_section(
                'section_handle_style', [
            'label' => __('Handle', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->start_controls_tabs('tabs_handle_style');

        $this->start_controls_tab(
                'tab_handle_normal', [
            'label' => __('Normal', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'handle_icon_color', [
            'label' => __('Icon Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .twentytwenty-left-arrow' => 'border-right-color: {{VALUE}}',
                '{{WRAPPER}} .twentytwenty-right-arrow' => 'border-left-color: {{VALUE}}',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Background::get_type(), [
            'name' => 'handle_background',
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .twentytwenty-handle',
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'handle_border',
            'label' => __('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'placeholder' => '1px',
            'default' => '1px',
            'selector' => '{{WRAPPER}} .twentytwenty-handle',
            'separator' => 'before',
                ]
        );

        $this->add_control(
                'handle_border_radius', [
            'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .twentytwenty-handle' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'handle_box_shadow',
            'selector' => '{{WRAPPER}} .twentytwenty-handle',
                ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
                'tab_handle_hover', [
            'label' => __('Hover', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'handle_icon_color_hover', [
            'label' => __('Icon Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .twentytwenty-handle:hover .twentytwenty-left-arrow' => 'border-right-color: {{VALUE}}',
                '{{WRAPPER}} .twentytwenty-handle:hover .twentytwenty-right-arrow' => 'border-left-color: {{VALUE}}',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Background::get_type(), [
            'name' => 'handle_background_hover',
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .twentytwenty-handle:hover',
                ]
        );

        $this->add_control(
                'handle_border_color_hover', [
            'label' => __('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .twentytwenty-handle:hover' => 'border-color: {{VALUE}}',
            ],
                ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

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
                'divider_color', [
            'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .twentytwenty-horizontal .twentytwenty-handle:before, {{WRAPPER}} .twentytwenty-horizontal .twentytwenty-handle:after, {{WRAPPER}} .twentytwenty-vertical .twentytwenty-handle:before, {{WRAPPER}} .twentytwenty-vertical .twentytwenty-handle:after' => 'background: {{VALUE}}',
            ],
                ]
        );

        $this->add_responsive_control(
                'divider_width', [
            'label' => __('Width', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 3,
                'unit' => 'px',
            ],
            'size_units' => ['px', '%'],
            'range' => [
                'px' => [
                    'max' => 20,
                ],
            ],
            'tablet_default' => [
                'unit' => 'px',
            ],
            'mobile_default' => [
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}} .twentytwenty-horizontal .twentytwenty-handle:before, {{WRAPPER}} .twentytwenty-horizontal .twentytwenty-handle:after' => 'width: {{SIZE}}{{UNIT}}; margin-left: calc(-{{SIZE}}{{UNIT}}/2);',
            ],
                ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Label
         */
        $this->start_controls_section(
                'section_label_style', [
            'label' => __('Label', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'label_horizontal_position', [
            'label' => __('Position', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::CHOOSE,
            'label_block' => false,
            'default' => 'top',
            'options' => [
                'top' => [
                    'title' => __('Top', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-v-align-top',
                ],
                'middle' => [
                    'title' => __('Middle', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-v-align-middle',
                ],
                'bottom' => [
                    'title' => __('Bottom', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-v-align-bottom',
                ],
            ],
            'prefix_class' => 'sa-el-ic-label-horizontal-',
            'condition' => [
                'orientation' => 'horizontal',
            ],
                ]
        );

        $this->add_control(
                'label_vertical_position', [
            'label' => __('Position', 'essential-addons-elementor'),
            'type' => Controls_Manager::CHOOSE,
            'label_block' => false,
            'options' => [
                'left' => [
                    'title' => __('Left', 'essential-addons-elementor'),
                    'icon' => 'eicon-h-align-left',
                ],
                'center' => [
                    'title' => __('Center', 'essential-addons-elementor'),
                    'icon' => 'eicon-h-align-center',
                ],
                'right' => [
                    'title' => __('Right', 'essential-addons-elementor'),
                    'icon' => 'eicon-h-align-right',
                ],
            ],
            'default' => 'center',
            'prefix_class' => 'sa-el-ic-label-vertical-',
            'condition' => [
                'orientation' => 'vertical',
            ],
                ]
        );

        $this->add_responsive_control(
                'label_align', [
            'label' => __('Align', 'essential-addons-elementor'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px', '%'],
            'range' => [
                'px' => [
                    'max' => 200,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}}.sa-el-ic-label-horizontal-top .twentytwenty-horizontal .twentytwenty-before-label:before,
                    {{WRAPPER}}.sa-el-ic-label-horizontal-top .twentytwenty-horizontal .twentytwenty-after-label:before' => 'top: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .twentytwenty-horizontal .twentytwenty-before-label:before' => 'left: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .twentytwenty-horizontal .twentytwenty-after-label:before' => 'right: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}}.sa-el-ic-label-horizontal-bottom .twentytwenty-horizontal .twentytwenty-before-label:before,
                    {{WRAPPER}}.sa-el-ic-label-horizontal-bottom .twentytwenty-horizontal .twentytwenty-after-label:before' => 'bottom: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .twentytwenty-vertical .twentytwenty-before-label:before' => 'top: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .twentytwenty-vertical .twentytwenty-after-label:before' => 'bottom: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}}.sa-el-ic-label-vertical-left .twentytwenty-vertical .twentytwenty-before-label:before,
                    {{WRAPPER}}.sa-el-ic-label-vertical-left .twentytwenty-vertical .twentytwenty-after-label:before' => 'left: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}}.sa-el-ic-label-vertical-right .twentytwenty-vertical .twentytwenty-before-label:before,
                    {{WRAPPER}}.sa-el-ic-label-vertical-right .twentytwenty-vertical .twentytwenty-after-label:before' => 'right: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->start_controls_tabs('tabs_label_style');

        $this->start_controls_tab(
                'tab_label_before', [
            'label' => __('Before', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'label_text_color_before', [
            'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .twentytwenty-before-label:before' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'label_bg_color_before', [
            'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .twentytwenty-before-label:before' => 'background: {{VALUE}}',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'label_border',
            'label' => __('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'placeholder' => '1px',
            'default' => '1px',
            'selector' => '{{WRAPPER}} .twentytwenty-before-label:before',
                ]
        );

        $this->add_control(
                'label_border_radius', [
            'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .twentytwenty-before-label:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
                'tab_label_after', [
            'label' => __('After', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'label_text_color_after', [
            'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .twentytwenty-after-label:before' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'label_bg_color_after', [
            'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .twentytwenty-after-label:before' => 'background: {{VALUE}}',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'label_border_after',
            'label' => __('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'placeholder' => '1px',
            'default' => '1px',
            'selector' => '{{WRAPPER}} .twentytwenty-after-label:before',
                ]
        );

        $this->add_control(
                'label_border_radius_after', [
            'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .twentytwenty-after-label:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'label_typography',
            'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
            'scheme' => Scheme_Typography::TYPOGRAPHY_4,
            'selector' => '{{WRAPPER}} .twentytwenty-before-label:before, {{WRAPPER}} .twentytwenty-after-label:before',
            'separator' => 'before',
                ]
        );

        $this->add_responsive_control(
                'label_padding', [
            'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .twentytwenty-before-label:before, {{WRAPPER}} .twentytwenty-after-label:before' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'separator' => 'before',
                ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        /**
         * Getting the options from user.
         */
        $settings = $this->get_settings();
        $before_image = $this->get_settings('before_image');
        $after_image = $this->get_settings('after_image');

        $this->add_render_attribute(
                'wrapper', [
            'id' => 'sa-el-image-comparison-' . esc_attr($this->get_id()),
            'class' => ['sa-el-img-comp-container'],
            'data-offset' => ($settings['sa_el_image_comp_offset']['size'] / 100),
            'data-orientation' => $settings['sa_el_image_comp_orientation'],
            'data-before_label' => $settings['before_image_label'],
            'data-after_label' => $settings['after_image_label'],
            'data-overlay' => $settings['sa_el_image_comp_overlay'],
            'data-onhover' => $settings['sa_el_image_comp_move'],
            'data-onclick' => $settings['sa_el_image_comp_click'],
                ]
        );

        echo '<div ' . $this->get_render_attribute_string('wrapper') . '>
			<img class="sa-el-before-img" alt="' . esc_attr($settings['before_image_alt']) . '" src="' . esc_url($before_image['url']) . '">
			<img class="sa-el-after-img" alt="' . esc_attr($settings['after_image_alt']) . '" src="' . esc_url($after_image['url']) . '">
        </div>';
    }

}
