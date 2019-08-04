<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Toggle;

use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Group_Control_Background as Group_Control_Background;
use \Elementor\Scheme_Typography as Scheme_Typography;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Utils as Utils;
use \Elementor\Widget_Base as Widget_Base;
use \Elementor\Frontend;
use \Elementor\Control_Media as Control_Media;

if (!defined('ABSPATH'))
    exit; // If this file is called directly, abort.

class Toggle extends Widget_Base {

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function get_name() {
        return 'sa-el-toggle';
    }

    public function get_title() {
        return esc_html__('Content Toggle', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon() {
        return 'eicon-toggle oxi-el-admin-icon';
    }

    public function get_categories() {
        return ['sa-el-addons'];
    }

    /**
     * Register toggle widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @access protected
     */
    protected function _register_controls() {

        /* ----------------------------------------------------------------------------------- */
        /* 	CONTENT TAB
          /*----------------------------------------------------------------------------------- */

        /**
         * Content Tab: Primary
         */
        $this->start_controls_section(
                'section_primary', [
            'label' => __('Primary', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'primary_label', [
            'label' => __('Label', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'default' => __('Limited', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'primary_content_type', [
            'label' => __('Content Type', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'options' => [
                'image' => __('Image', SA_ELEMENTOR_TEXTDOMAIN),
                'content' => __('Content', SA_ELEMENTOR_TEXTDOMAIN),
                'template' => __('Saved Templates', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'default' => 'content',
                ]
        );

        $this->add_control(
                'primary_templates', [
            'label' => __('Choose Template', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'options' => $this->get_elementor_page_templates(),
            'condition' => [
                'primary_content_type' => 'template',
            ],
                ]
        );

        $this->add_control(
                'primary_content', [
            'label' => __('Content', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::WYSIWYG,
            'default' => __('Limited Content', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'primary_content_type' => 'content',
            ],
                ]
        );

        $this->add_control(
                'primary_image', [
            'label' => __('Image', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
            'condition' => [
                'primary_content_type' => 'image',
            ],
                ]
        );

        $this->end_controls_section();

        /**
         * Content Tab: Secondary
         */
        $this->start_controls_section(
                'section_secondary', [
            'label' => __('Secondary', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'secondary_label', [
            'label' => __('Label', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'default' => __('Unlimited', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'secondary_content_type', [
            'label' => __('Content Type', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'options' => [
                'image' => __('Image', SA_ELEMENTOR_TEXTDOMAIN),
                'content' => __('Content', SA_ELEMENTOR_TEXTDOMAIN),
                'template' => __('Saved Templates', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'default' => 'content',
                ]
        );

        $this->add_control(
                'secondary_templates', [
            'label' => __('Choose Template', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'options' => $this->get_elementor_page_templates(),
            'condition' => [
                'secondary_content_type' => 'template',
            ],
                ]
        );

        $this->add_control(
                'secondary_content', [
            'label' => __('Content', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::WYSIWYG,
            'default' => __('Unlimited Content', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'secondary_content_type' => 'content',
            ],
                ]
        );

        $this->add_control(
                'secondary_image', [
            'label' => __('Image', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
            'condition' => [
                'secondary_content_type' => 'image',
            ],
                ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Overlay
         */
        $this->start_controls_section(
                'section_toggle_switch_style', [
            'label' => __('Switch', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'toggle_switch_alignment', [
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
            'prefix_class' => 'sa-el-toggle-',
            'frontend_available' => true,
                ]
        );

        $this->add_control(
                'switch_style', [
            'label' => __('Switch Style', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'options' => [
                'round' => __('Round', SA_ELEMENTOR_TEXTDOMAIN),
                'rectangle' => __('Rectangle', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'default' => 'round',
                ]
        );

        $this->add_responsive_control(
                'toggle_switch_size', [
            'label' => __('Switch Size', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 26,
                'unit' => 'px',
            ],
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 15,
                    'max' => 60,
                ],
            ],
            'tablet_default' => [
                'unit' => 'px',
            ],
            'mobile_default' => [
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-toggle-switch-container' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'toggle_switch_spacing', [
            'label' => __('Headings Spacing', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 15,
                'unit' => 'px',
            ],
            'size_units' => ['px', '%'],
            'range' => [
                'px' => [
                    'max' => 80,
                ],
            ],
            'tablet_default' => [
                'unit' => 'px',
            ],
            'mobile_default' => [
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-toggle-switch-container' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'toggle_switch_gap', [
            'label' => __('Margin Bottom', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 20,
                'unit' => 'px',
            ],
            'size_units' => ['px', '%'],
            'range' => [
                'px' => [
                    'max' => 80,
                ],
            ],
            'tablet_default' => [
                'unit' => 'px',
            ],
            'mobile_default' => [
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-toggle-switch-wrap' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->start_controls_tabs('tabs_switch');

        $this->start_controls_tab(
                'tab_switch_primary', [
            'label' => __('Primary', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_group_control(
                Group_Control_Background::get_type(), [
            'name' => 'toggle_switch_primary_background',
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .sa-el-toggle-slider',
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'toggle_switch_primary_border',
            'label' => __('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'placeholder' => '1px',
            'default' => '1px',
            'selector' => '{{WRAPPER}} .sa-el-toggle-switch-container',
                ]
        );

        $this->add_control(
                'toggle_switch_primary_border_radius', [
            'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-toggle-switch-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
                'tab_switch_secondary', [
            'label' => __('Secondary', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_group_control(
                Group_Control_Background::get_type(), [
            'name' => 'toggle_switch_secondary_background',
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .sa-el-toggle-switch-on .sa-el-toggle-slider',
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'toggle_switch_secondary_border',
            'label' => __('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'placeholder' => '1px',
            'default' => '1px',
            'selector' => '{{WRAPPER}} .sa-el-toggle-switch-container.sa-el-toggle-switch-on',
                ]
        );

        $this->add_control(
                'toggle_switch_secondary_border_radius', [
            'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-toggle-switch-container.sa-el-toggle-switch-on' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
                'switch_controller_heading', [
            'label' => __('Controller', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
                ]
        );

        $this->add_group_control(
                Group_Control_Background::get_type(), [
            'name' => 'toggle_controller_background',
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .sa-el-toggle-slider::before',
                ]
        );

        $this->add_control(
                'toggle_controller_border_radius', [
            'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-toggle-slider::before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'default' => 'middle',
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
            'selectors_dictionary' => [
                'top' => 'flex-start',
                'middle' => 'center',
                'bottom' => 'flex-end',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-toggle-switch-inner' => 'align-items: {{VALUE}}',
            ],
                ]
        );

        $this->start_controls_tabs('tabs_label_style');

        $this->start_controls_tab(
                'tab_label_primary', [
            'label' => __('Primary', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'label_text_color_primary', [
            'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa-el-primary-toggle-label' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'label_active_text_color_primary', [
            'label' => __('Active Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa-el-primary-toggle-label.active' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'label_typography_primary',
            'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
            'scheme' => Scheme_Typography::TYPOGRAPHY_4,
            'selector' => '{{WRAPPER}} .sa-el-primary-toggle-label',
            'separator' => 'before',
                ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
                'tab_label_secondary', [
            'label' => __('Secondary', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'label_text_color_secondary', [
            'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa-el-secondary-toggle-label' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'label_active_text_color_secondary', [
            'label' => __('Active Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa-el-secondary-toggle-label.active' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'label_typography_secondary',
            'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
            'scheme' => Scheme_Typography::TYPOGRAPHY_4,
            'selector' => '{{WRAPPER}} .sa-el-secondary-toggle-label',
            'separator' => 'before',
                ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /**
         * Style Tab: Content
         */
        $this->start_controls_section(
                'section_content_style', [
            'label' => __('Content', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'content_alignment', [
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
                '{{WRAPPER}} .sa-el-toggle-content-wrap' => 'text-align: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'content_text_color', [
            'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa-el-toggle-content-wrap' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'content_typography',
            'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
            'scheme' => Scheme_Typography::TYPOGRAPHY_4,
            'selector' => '{{WRAPPER}} .sa-el-toggle-content-wrap',
                ]
        );

        $this->end_controls_section();
    }

    /**
     * Render toggle widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings();

        $this->add_render_attribute('toggle-container', 'class', 'sa-el-toggle-container');

        $this->add_render_attribute('toggle-container', 'id', 'sa-el-toggle-container-' . esc_attr($this->get_id()));

        $this->add_render_attribute('toggle-container', 'data-toggle-target', '#sa-el-toggle-container-' . esc_attr($this->get_id()));

        $this->add_render_attribute('toggle-switch-wrap', 'class', 'sa-el-toggle-switch-wrap');

        $this->add_render_attribute('toggle-switch-container', 'class', 'sa-el-toggle-switch-container');

        $this->add_render_attribute('toggle-switch-container', 'class', 'sa-el-toggle-switch-' . $settings['switch_style']);

        $this->add_render_attribute('toggle-content-wrap', 'class', 'sa-el-toggle-content-wrap primary');
        ?>
        <div <?php echo $this->get_render_attribute_string('toggle-container'); ?>>
            <div <?php echo $this->get_render_attribute_string('toggle-switch-wrap'); ?>>
                <div class="sa-el-toggle-switch-inner">
        <?php if ($settings['primary_label'] != '') { ?>
                        <div class="sa-el-primary-toggle-label">
            <?php echo esc_attr($settings['primary_label']); ?>
                        </div>
        <?php } ?>
                    <div <?php echo $this->get_render_attribute_string('toggle-switch-container'); ?>>
                        <label class="sa-el-toggle-switch">
                            <input type="checkbox">
                            <span class="sa-el-toggle-slider"></span>
                        </label>
                    </div>
        <?php if ($settings['secondary_label'] != '') { ?>
                        <div class="sa-el-secondary-toggle-label">
            <?php echo esc_attr($settings['secondary_label']); ?>
                        </div>
        <?php } ?>
                </div>
            </div>
            <div <?php echo $this->get_render_attribute_string('toggle-content-wrap'); ?>>
                <div class="sa-el-toggle-primary-wrap">
        <?php
        if ($settings['primary_content_type'] == 'content') {
            echo $this->parse_text_editor($settings['primary_content']);
        } elseif ($settings['primary_content_type'] == 'image') {
            $this->add_render_attribute('primary-image', 'src', $settings['primary_image']['url']);
            $this->add_render_attribute('primary-image', 'alt', Control_Media::get_image_alt($settings['primary_image']));
            $this->add_render_attribute('primary-image', 'title', Control_Media::get_image_title($settings['primary_image']));

            printf('<img %s />', $this->get_render_attribute_string('primary-image'));
        } elseif ($settings['primary_content_type'] == 'template') {
            if (!empty($settings['primary_templates'])) {
                $sa_el_template_id = $settings['primary_templates'];
                $sa_el_frontend = new Frontend;

                echo $sa_el_frontend->get_builder_content($sa_el_template_id, true);
            }
        }
        ?>
                </div>
                <div class="sa-el-toggle-secondary-wrap">
        <?php
        if ($settings['secondary_content_type'] == 'content') {
            echo $this->parse_text_editor($settings['secondary_content']);
        } elseif ($settings['secondary_content_type'] == 'image') {
            $this->add_render_attribute('secondary-image', 'src', $settings['secondary_image']['url']);
            $this->add_render_attribute('secondary-image', 'alt', Control_Media::get_image_alt($settings['secondary_image']));
            $this->add_render_attribute('secondary-image', 'title', Control_Media::get_image_title($settings['secondary_image']));

            printf('<img %s />', $this->get_render_attribute_string('secondary-image'));
        } elseif ($settings['secondary_content_type'] == 'template') {
            if (!empty($settings['secondary_templates'])) {
                $sa_el_template_id = $settings['secondary_templates'];
                $sa_el_frontend = new Frontend;

                echo $sa_el_frontend->get_builder_content($sa_el_template_id, true);
            }
        }
        ?>
                </div>
            </div>
        </div>
                    <?php
                }

                /**
                 * Render toggle widget output in the editor.
                 *
                 * Written as a Backbone JavaScript template and used to generate the live preview.
                 *
                 * @access protected
                 */
                protected function _content_template() {
                    
                }

            }
            