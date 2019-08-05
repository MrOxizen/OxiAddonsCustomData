<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Tooltip;

if (!defined('ABSPATH')) {
    exit;
}

use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Utils as Utils;
use \Elementor\Widget_Base as Widget_Base;

class Tooltip extends Widget_Base {

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function get_name() {
        return 'sa_el_tooltip';
    }

    public function get_title() {
        return esc_html__('ToolTip', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon() {
        return 'eicon-alert oxi-el-admin-icon';
    }

    public function get_categories() {
        return ['sa-el-addons'];
    }

    protected function _register_controls() {
        /**
         * Tooltip Settings
         */
        $this->start_controls_section(
                'sa_el_section_tooltip_settings', [
            'label' => esc_html__('Content Settings', SA_ELEMENTOR_TEXTDOMAIN)
                ]
        );
        $this->add_responsive_control(
                'sa_el_tooltip_type', [
            'label' => esc_html__('Content Type', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::CHOOSE,
            'label_block' => true,
            'options' => [
                'icon' => [
                    'title' => esc_html__('Icon', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-info',
                ],
                'text' => [
                    'title' => esc_html__('Text', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-text-width',
                ],
                'image' => [
                    'title' => esc_html__('Image', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-image',
                ],
                'shortcode' => [
                    'title' => esc_html__('Shortcode', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-code',
                ],
            ],
            'default' => 'icon',
                ]
        );
        $this->add_control(
                'sa_el_tooltip_content', [
            'label' => esc_html__('Content', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::WYSIWYG,
            'label_block' => true,
            'default' => esc_html__('Hover Me!', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'sa_el_tooltip_type' => ['text']
            ],
            'dynamic' => ['active' => true]
                ]
        );
        $this->add_control(
                'sa_el_tooltip_content_tag', [
            'label' => esc_html__('Content Tag', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'span',
            'label_block' => false,
            'options' => [
                'h1' => esc_html__('H1', SA_ELEMENTOR_TEXTDOMAIN),
                'h2' => esc_html__('H2', SA_ELEMENTOR_TEXTDOMAIN),
                'h3' => esc_html__('H3', SA_ELEMENTOR_TEXTDOMAIN),
                'h4' => esc_html__('H4', SA_ELEMENTOR_TEXTDOMAIN),
                'h5' => esc_html__('H5', SA_ELEMENTOR_TEXTDOMAIN),
                'h6' => esc_html__('H6', SA_ELEMENTOR_TEXTDOMAIN),
                'div' => esc_html__('DIV', SA_ELEMENTOR_TEXTDOMAIN),
                'span' => esc_html__('SPAN', SA_ELEMENTOR_TEXTDOMAIN),
                'p' => esc_html__('P', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'condition' => [
                'sa_el_tooltip_type' => 'text'
            ]
                ]
        );
        $this->add_control(
                'sa_el_tooltip_shortcode_content', [
            'label' => esc_html__('Shortcode', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXTAREA,
            'label_block' => true,
            'default' => esc_html__('[shortcode-here]', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'sa_el_tooltip_type' => ['shortcode']
            ]
                ]
        );

        $this->add_control(
                'sa_el_tooltip_icon_content', [
            'label' => esc_html__('Icon', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => $this->Sa_El_Icon_Type(),
            'default' => $this->Sa_El_Default_Icon('fa fa-laptop', 'fa-solid', 'fa fa-laptop'),
            'condition' => [
                'sa_el_tooltip_type' => ['icon']
            ]
                ]
        );
        $this->add_control(
                'sa_el_tooltip_img_content', [
            'label' => esc_html__('Image', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
            'condition' => [
                'sa_el_tooltip_type' => ['image']
            ]
                ]
        );
        $this->add_responsive_control(
                'sa_el_tooltip_content_alignment', [
            'label' => esc_html__('Content Alignment', SA_ELEMENTOR_TEXTDOMAIN),
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
                'justify' => [
                    'title' => __('Justified', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-align-justify',
                ],
            ],
            'default' => 'left',
            'prefix_class' => 'sa-el-tooltip-align-',
                ]
        );
        $this->add_control(
                'sa_el_tooltip_enable_link', [
            'label' => esc_html__('Enable Link', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'false',
            'return_value' => 'yes',
            'condition' => [
                'sa_el_tooltip_type!' => ['shortcode']
            ]
                ]
        );
        $this->add_control(
                'sa_el_tooltip_link', [
            'label' => esc_html__('Button Link', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::URL,
            'label_block' => true,
            'default' => [
                'url' => '#',
                'is_external' => '',
            ],
            'show_external' => true,
            'condition' => [
                'sa_el_tooltip_enable_link' => 'yes'
            ]
                ]
        );
        $this->end_controls_section();

        /**
         * Tooltip Hover Content Settings
         */
        $this->start_controls_section(
                'sa_el_section_tooltip_hover_content_settings', [
            'label' => esc_html__('Tooltip Settings', SA_ELEMENTOR_TEXTDOMAIN)
                ]
        );
        $this->add_control(
                'sa_el_tooltip_hover_content', [
            'label' => esc_html__('Content', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::WYSIWYG,
            'label_block' => true,
            'default' => esc_html__('Tooltip content', SA_ELEMENTOR_TEXTDOMAIN),
            'dynamic' => ['active' => true]
                ]
        );
        $this->add_control(
                'sa_el_tooltip_hover_dir', [
            'label' => esc_html__('Hover Direction', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'right',
            'label_block' => false,
            'options' => [
                'left' => esc_html__('Left', SA_ELEMENTOR_TEXTDOMAIN),
                'right' => esc_html__('Right', SA_ELEMENTOR_TEXTDOMAIN),
                'top' => esc_html__('Top', SA_ELEMENTOR_TEXTDOMAIN),
                'bottom' => esc_html__('Bottom', SA_ELEMENTOR_TEXTDOMAIN),
            ],
                ]
        );
        $this->add_control(
                'sa_el_tooltip_hover_speed', [
            'label' => esc_html__('Hover Speed', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'label_block' => false,
            'default' => esc_html__('300', SA_ELEMENTOR_TEXTDOMAIN),
            'selectors' => [
                '{{WRAPPER}} .sa-el-tooltip:hover .sa-el-tooltip-text.sa-el-tooltip-top' => 'animation-duration: {{SIZE}}ms;',
                '{{WRAPPER}} .sa-el-tooltip:hover .sa-el-tooltip-text.sa-el-tooltip-left' => 'animation-duration: {{SIZE}}ms;',
                '{{WRAPPER}} .sa-el-tooltip:hover .sa-el-tooltip-text.sa-el-tooltip-bottom' => 'animation-duration: {{SIZE}}ms;',
                '{{WRAPPER}} .sa-el-tooltip:hover .sa-el-tooltip-text.sa-el-tooltip-right' => 'animation-duration: {{SIZE}}ms;',
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
         * Tab Style Tooltip Content
         * -------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_section_tooltip_style_settings', [
            'label' => esc_html__('Content Style', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );
        $this->add_responsive_control(
                'sa_el_tooltip_max_width', [
            'label' => __('Content Max Width', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                    'step' => 5,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-tooltip' => 'max-width: {{SIZE}}{{UNIT}};',
            ]
                ]
        );
        $this->add_responsive_control(
                'sa_el_tooltip_content_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-tooltip' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->add_responsive_control(
                'sa_el_tooltip_content_margin', [
            'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-tooltip' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->start_controls_tabs('sa_el_tooltip_content_style_tabs');
        // Normal State Tab
        $this->start_controls_tab('sa_el_tooltip_content_normal', ['label' => esc_html__('Normal', SA_ELEMENTOR_TEXTDOMAIN)]);
        $this->add_control(
                'sa_el_tooltip_content_bg_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa-el-tooltip' => 'background-color: {{VALUE}};',
            ],
                ]
        );
        $this->add_control(
                'sa_el_tooltip_content_color', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa-el-tooltip' => 'color: {{VALUE}};',
                '{{WRAPPER}} .sa-el-tooltip a' => 'color: {{VALUE}};',
            ],
                ]
        );
        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_el_tooltip_shadow',
            'selector' => '{{WRAPPER}} .sa-el-tooltip',
            'separator' => 'before'
                ]
        );
        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_tooltip_border',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa-el-tooltip',
                ]
        );
        $this->end_controls_tab();

        // Hover State Tab
        $this->start_controls_tab('sa_el_tooltip_content_hover', ['label' => esc_html__('Hover', SA_ELEMENTOR_TEXTDOMAIN)]);
        $this->add_control(
                'sa_el_tooltip_content_hover_bg_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa-el-tooltip:hover' => 'background-color: {{VALUE}};',
            ],
                ]
        );
        $this->add_control(
                'sa_el_tooltip_content_hover_color', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#212121',
            'selectors' => [
                '{{WRAPPER}} .sa-el-tooltip:hover' => 'color: {{VALUE}};',
                '{{WRAPPER}} .sa-el-tooltip:hover a' => 'color: {{VALUE}};',
            ],
                ]
        );
        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_el_tooltip_hover_shadow',
            'selector' => '{{WRAPPER}} .sa-el-tooltip:hover',
            'separator' => 'before'
                ]
        );
        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_tooltip_hover_border',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa-el-tooltip:hover',
                ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_tooltip_content_typography',
            'selector' => '{{WRAPPER}} .sa-el-tooltip',
                ]
        );
        $this->add_responsive_control(
                'sa_el_tooltip_content_radius', [
            'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-tooltip' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        /**
         * -------------------------------------------
         * Tab Style Tooltip Hover Content
         * -------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_section_tooltip_hover_style_settings', [
            'label' => esc_html__('Tooltip Style', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );
        $this->add_responsive_control(
                'sa_el_tooltip_hover_width', [
            'label' => __('Tooltip Width', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => '150'
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                    'step' => 5,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-tooltip .sa-el-tooltip-text' => 'width: {{SIZE}}{{UNIT}};',
            ]
                ]
        );
        $this->add_responsive_control(
                'sa_el_tooltip_hover_max_width', [
            'label' => __('Tooltip Max Width', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => '150'
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                    'step' => 5,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-tooltip .sa-el-tooltip-text' => 'max-width: {{SIZE}}{{UNIT}};',
            ]
                ]
        );
        $this->add_responsive_control(
                'sa_el_tooltip_hover_content_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-tooltip .sa-el-tooltip-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->add_responsive_control(
                'sa_el_tooltip_hover_content_margin', [
            'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-tooltip .sa-el-tooltip-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->add_control(
                'sa_el_tooltip_hover_content_bg_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#555',
            'selectors' => [
                '{{WRAPPER}} .sa-el-tooltip .sa-el-tooltip-text' => 'background-color: {{VALUE}};',
            ],
                ]
        );
        $this->add_control(
                'sa_el_tooltip_hover_content_color', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .sa-el-tooltip .sa-el-tooltip-text' => 'color: {{VALUE}};',
            ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_tooltip_hover_content_typography',
            'selector' => '{{WRAPPER}} .sa-el-tooltip .sa-el-tooltip-text',
                ]
        );
        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_el_tooltip_box_shadow',
            'selector' => '{{WRAPPER}} .sa-el-tooltip .sa-el-tooltip-text',
                ]
        );
        $this->add_responsive_control(
                'sa_el_tooltip_arrow_size', [
            'label' => __('Arrow Size', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 5,
                'unit' => 'px',
            ],
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ]
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-tooltip .sa-el-tooltip-text:after' => 'border-width: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .sa-el-tooltip .sa-el-tooltip-text.sa-el-tooltip-left::after' => 'top: calc( 50% - {{SIZE}}{{UNIT}} );',
                '{{WRAPPER}} .sa-el-tooltip .sa-el-tooltip-text.sa-el-tooltip-right::after' => 'top: calc( 50% - {{SIZE}}{{UNIT}} );',
                '{{WRAPPER}} .sa-el-tooltip .sa-el-tooltip-text.sa-el-tooltip-top::after' => 'left: calc( 50% - {{SIZE}}{{UNIT}} );',
                '{{WRAPPER}} .sa-el-tooltip .sa-el-tooltip-text.sa-el-tooltip-bottom::after' => 'left: calc( 50% - {{SIZE}}{{UNIT}} );',
            ],
                ]
        );
        $this->add_control(
                'sa_el_tooltip_arrow_color', [
            'label' => esc_html__('Arrow Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#555',
            'selectors' => [
                '{{WRAPPER}} .sa-el-tooltip .sa-el-tooltip-text.sa-el-tooltip-top:after' => 'border-top-color: {{VALUE}};',
                '{{WRAPPER}} .sa-el-tooltip .sa-el-tooltip-text.sa-el-tooltip-bottom:after' => 'border-bottom-color: {{VALUE}};',
                '{{WRAPPER}} .sa-el-tooltip .sa-el-tooltip-text.sa-el-tooltip-left:after' => 'border-left-color: {{VALUE}};',
                '{{WRAPPER}} .sa-el-tooltip .sa-el-tooltip-text.sa-el-tooltip-right:after' => 'border-right-color: {{VALUE}};',
            ],
                ]
        );
        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();
        $target = $settings['sa_el_tooltip_link']['is_external'] ? 'target="_blank"' : '';
        $nofollow = $settings['sa_el_tooltip_link']['nofollow'] ? 'rel="nofollow"' : '';
        ?>
        <div class="sa-el-tooltip">
            <?php if ($settings['sa_el_tooltip_type'] === 'text') : ?>
                <<?php echo esc_attr($settings['sa_el_tooltip_content_tag']); ?> class="sa-el-tooltip-content"><?php if ($settings['sa_el_tooltip_enable_link'] === 'yes') : ?><a href="<?php echo esc_url($settings['sa_el_tooltip_link']['url']); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> ><?php endif; ?><?php echo esc_html__($settings['sa_el_tooltip_content'], SA_ELEMENTOR_TEXTDOMAIN); ?><?php if ($settings['sa_el_tooltip_enable_link'] === 'yes') : ?></a><?php endif; ?></<?php echo esc_attr($settings['sa_el_tooltip_content_tag']); ?>>
                <span class="sa-el-tooltip-text sa-el-tooltip-<?php echo esc_attr($settings['sa_el_tooltip_hover_dir']) ?>"><?php echo __($settings['sa_el_tooltip_hover_content']); ?></span>
            <?php elseif ($settings['sa_el_tooltip_type'] === 'icon') : ?>
                <span class="sa-el-tooltip-content"><?php if ($settings['sa_el_tooltip_enable_link'] === 'yes') : ?><a href="<?php echo esc_url($settings['sa_el_tooltip_link']['url']); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> ><?php endif;
            echo $this->Sa_El_Icon_Render($settings['sa_el_tooltip_icon_content']);
            if ($settings['sa_el_tooltip_enable_link'] === 'yes') : ?></a><?php endif; ?></span>
                <span class="sa-el-tooltip-text sa-el-tooltip-<?php echo esc_attr($settings['sa_el_tooltip_hover_dir']) ?>"><?php echo __($settings['sa_el_tooltip_hover_content']); ?></span>
            <?php elseif ($settings['sa_el_tooltip_type'] === 'image') : ?>
                <span class="sa-el-tooltip-content"><?php if ($settings['sa_el_tooltip_enable_link'] === 'yes') : ?><a href="<?php echo esc_url($settings['sa_el_tooltip_link']['url']); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> ><?php endif; ?><img src="<?php echo esc_url($settings['sa_el_tooltip_img_content']['url']); ?>" alt="<?php echo esc_attr(get_post_meta($settings['sa_el_tooltip_img_content']['id'], '_wp_attachment_image_alt', true)); ?>"><?php if ($settings['sa_el_tooltip_enable_link'] === 'yes') : ?></a><?php endif; ?></span>
                <span class="sa-el-tooltip-text sa-el-tooltip-<?php echo esc_attr($settings['sa_el_tooltip_hover_dir']) ?>"><?php echo __($settings['sa_el_tooltip_hover_content']); ?></span>
            <?php elseif ($settings['sa_el_tooltip_type'] === 'shortcode') : ?>
                <div class="sa-el-tooltip-content"><?php echo do_shortcode($settings['sa_el_tooltip_shortcode_content']); ?></div>
                <span class="sa-el-tooltip-text sa-el-tooltip-<?php echo esc_attr($settings['sa_el_tooltip_hover_dir']) ?>"><?php echo __($settings['sa_el_tooltip_hover_content']); ?></span>
        <?php endif; ?>
        </div>
        <?php
    }

    protected function content_template() {
        
    }

}
