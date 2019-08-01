<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Offcanvas;

if (!defined('ABSPATH')) {
    exit;
}

use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Group_Control_Background as Group_Control_Background;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Scheme_Typography as Scheme_Typography;
use \Elementor\Widget_Base as Widget_Base;

class Offcanvas extends Widget_Base {

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function get_name() {
        return 'sa_el_offcanvas';
    }

    public function get_title() {
        return esc_html__('Offcanvas', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon() {
        return 'eicon-sidebar oxi-el-admin-icon';
    }

    public function get_categories() {
        return ['sa-el-addons'];
    }

    protected function _register_controls() {

        /* -------------------------------------- */
        ##  CONTENT TAB    ##
        /* -------------------------------------- */

        /**
         * Content Tab: Offcanvas
         * -------------------------------------------------
         */
        $this->start_controls_section(
                'section_content_offcanvas', [
            'label' => __('Offcanvas Content', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'content_type', [
            'label' => __('Content Type', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'options' => [
                'sidebar' => __('Sidebar', SA_ELEMENTOR_TEXTDOMAIN),
                'custom' => __('Custom Content', SA_ELEMENTOR_TEXTDOMAIN),
                'section' => __('Saved Section', SA_ELEMENTOR_TEXTDOMAIN),
                'widget' => __('Saved Widget', SA_ELEMENTOR_TEXTDOMAIN),
                'template' => __('Saved Page Template', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'default' => 'custom',
                ]
        );

        $registered_sidebars = $this->sa_get_registered_sidebars();
        $this->add_control(
                'sidebar', [
            'label' => __('Choose Sidebar', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => array_shift($registered_sidebars),
            'options' => $registered_sidebars,
            'condition' => [
                'content_type' => 'sidebar',
            ],
                ]
        );

        $this->add_control(
                'saved_widget', [
            'label' => __('Choose Widget', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'options' => $this->get_elementor_page_templates('widget'),
            'default' => '',
            'condition' => [
                'content_type' => 'widget',
            ],
                ]
        );

        $this->add_control(
                'saved_section', [
            'label' => __('Choose Section', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'options' => $this->get_elementor_page_templates('section'),
            'default' => '-1',
            'condition' => [
                'content_type' => 'section',
            ],
                ]
        );

        $this->add_control(
                'templates', [
            'label' => __('Choose Template', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'options' => $this->get_elementor_page_templates('page'),
            'default' => '-1',
            'condition' => [
                'content_type' => 'template',
            ],
                ]
        );

        $this->add_control(
                'custom_content', [
            'label' => '',
            'type' => Controls_Manager::REPEATER,
            'default' => [
                [
                    'title' => __('Box 1', SA_ELEMENTOR_TEXTDOMAIN),
                    'description' => __('Text box description goes here', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                [
                    'title' => __('Box 2', SA_ELEMENTOR_TEXTDOMAIN),
                    'description' => __('Text box description goes here', SA_ELEMENTOR_TEXTDOMAIN),
                ],
            ],
            'fields' => [
                [
                    'name' => 'title',
                    'label' => __('Title', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::TEXT,
                    'dynamic' => [
                        'active' => true,
                    ],
                    'default' => __('Title', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                [
                    'name' => 'description',
                    'label' => __('Description', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::WYSIWYG,
                    'dynamic' => [
                        'active' => true,
                    ],
                    'default' => '',
                ],
            ],
            'title_field' => '{{{ title }}}',
            'condition' => [
                'content_type' => 'custom',
            ],
                ]
        );

        $this->end_controls_section(); #section_content_offcanvas

        /**
         * Content Tab: Toggle Button
         * -------------------------------------------------
         */
        $this->start_controls_section(
                'section_button_settings', [
            'label' => __('Toggle Button', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'button_text', [
            'label' => __('Button Text', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'dynamic' => [
                'active' => true,
            ],
            'default' => __('Click Here', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'button_icon', [
            'label' => __('Button Icon', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::ICON,
            'default' => '',
                ]
        );

        $this->add_control(
                'button_icon_position', [
            'label' => __('Icon Position', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'before',
            'options' => [
                'before' => __('Before', SA_ELEMENTOR_TEXTDOMAIN),
                'after' => __('After', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'prefix_class' => 'sa-el-offcanvas-icon-',
            'condition' => [
                'button_icon!' => '',
            ],
                ]
        );

        $this->add_responsive_control(
                'button_icon_spacing', [
            'label' => __('Icon Spacing', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => '5',
                'unit' => 'px',
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 50,
                    'step' => 1,
                ],
            ],
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}}.sa-el-offcanvas-icon-before .sa-el-offcanvas-toggle-icon' => 'margin-right: {{SIZE}}{{UNIT}}',
                '{{WRAPPER}}.sa-el-offcanvas-icon-after .sa-el-offcanvas-toggle-icon' => 'margin-left: {{SIZE}}{{UNIT}}',
            ],
            'condition' => [
                'button_icon!' => '',
            ],
                ]
        );

        $this->end_controls_section();

        /**
         * Content Tab: Settings
         * -------------------------------------------------
         */
        $this->start_controls_section(
                'section_settings', [
            'label' => __('Settings', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'direction', [
            'label' => __('Direction', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::CHOOSE,
            'label_block' => false,
            'toggle' => false,
            'default' => 'left',
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
            'frontend_available' => true,
                ]
        );

        $this->add_control(
                'content_transition', [
            'label' => __('Content Transition', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'slide',
            'options' => [
                'slide' => __('Slide', SA_ELEMENTOR_TEXTDOMAIN),
                'reveal' => __('Reveal', SA_ELEMENTOR_TEXTDOMAIN),
                'push' => __('Push', SA_ELEMENTOR_TEXTDOMAIN),
                'slide-along' => __('Slide Along', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'frontend_available' => true,
            'separator' => 'before',
                ]
        );

        $this->add_control(
                'close_button', [
            'label' => __('Show Close Button', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
            'label_on' => __('Yes', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('No', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => 'yes',
            'separator' => 'before',
                ]
        );

        $this->add_control(
                'esc_close', [
            'label' => __('Esc to Close', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
            'label_on' => __('Yes', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('No', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => 'yes',
                ]
        );

        $this->add_control(
                'body_click_close', [
            'label' => __('Click anywhere to Close', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
            'label_on' => __('Yes', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('No', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => 'yes',
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
        /*    STYLE TAB
          /*----------------------------------------------------------------------------------- */

        /**
         * Style Tab: Offcanvas Bar
         * -------------------------------------------------
         */
        $this->start_controls_section(
                'section_offcanvas_bar_style', [
            'label' => __('Offcanvas Bar', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_group_control(
                Group_Control_Background::get_type(), [
            'name' => 'offcanvas_bar_bg',
            'label' => __('Background', SA_ELEMENTOR_TEXTDOMAIN),
            'types' => ['classic', 'gradient'],
            'selector' => '.sa-el-offcanvas-content.sa-el-offcanvas-content-{{ID}}',
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'offcanvas_bar_border',
            'label' => __('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'placeholder' => '1px',
            'default' => '1px',
            'selector' => '.sa-el-offcanvas-content.sa-el-offcanvas-content-{{ID}}',
                ]
        );

        $this->add_control(
                'offcanvas_bar_border_radius', [
            'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '.sa-el-offcanvas-content-{{ID}}' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'offcanvas_bar_padding', [
            'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '.sa-el-offcanvas-content-{{ID}} .sa-el-offcanvas-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'offcanvas_bar_box_shadow',
            'selector' => '.sa-el-offcanvas-content-{{ID}}',
            'separator' => 'before',
                ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Content
         * -------------------------------------------------
         */
        $this->start_controls_section(
                'section_popup_content_style', [
            'label' => __('Content', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'content_type' => ['sidebar', 'custom'],
            ],
                ]
        );

        $this->add_responsive_control(
                'content_align', [
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
                    'title' => __('Justified', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-align-justify',
                ],
            ],
            'default' => '',
            'selectors' => [
                '.sa-el-offcanvas-content-{{ID}} .sa-el-offcanvas-body' => 'text-align: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'widget_heading', [
            'label' => __('Box', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
            'condition' => [
                'content_type' => ['sidebar', 'custom'],
            ],
                ]
        );

        $this->add_control(
                'widgets_bg_color', [
            'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '.sa-el-offcanvas-content-{{ID}} .sa-el-offcanvas-custom-widget, .sa-el-offcanvas-content-{{ID}} .widget' => 'background-color: {{VALUE}}',
            ],
            'condition' => [
                'content_type' => ['sidebar', 'custom'],
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'widgets_border',
            'label' => __('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'placeholder' => '1px',
            'default' => '1px',
            'selector' => '.sa-el-offcanvas-content-{{ID}} .sa-el-offcanvas-custom-widget, .sa-el-offcanvas-content-{{ID}} .widget',
            'condition' => [
                'content_type' => ['sidebar', 'custom'],
            ],
                ]
        );

        $this->add_control(
                'widgets_border_radius', [
            'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '.sa-el-offcanvas-content-{{ID}} .sa-el-offcanvas-custom-widget, .sa-el-offcanvas-content-{{ID}} .widget' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'content_type' => ['sidebar', 'custom'],
            ],
                ]
        );

        $this->add_responsive_control(
                'widgets_bottom_spacing', [
            'label' => __('Bottom Spacing', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => '20',
                'unit' => 'px',
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 60,
                    'step' => 1,
                ],
            ],
            'size_units' => ['px', '%'],
            'selectors' => [
                '.sa-el-offcanvas-content-{{ID}} .sa-el-offcanvas-custom-widget, .sa-el-offcanvas-content-{{ID}} .widget' => 'margin-bottom: {{SIZE}}{{UNIT}}',
            ],
            'condition' => [
                'content_type' => ['sidebar', 'custom'],
            ],
                ]
        );

        $this->add_responsive_control(
                'widgets_padding', [
            'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '.sa-el-offcanvas-content-{{ID}} .sa-el-offcanvas-custom-widget, .sa-el-offcanvas-content-{{ID}} .widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'content_type' => ['sidebar', 'custom'],
            ],
                ]
        );

        $this->add_control(
                'text_heading', [
            'label' => __('Text', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
            'condition' => [
                'content_type' => ['sidebar', 'custom'],
            ],
                ]
        );

        $this->add_control(
                'content_text_color', [
            'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '.sa-el-offcanvas-content-{{ID}} .sa-el-offcanvas-body, .sa-el-offcanvas-content-{{ID}} .sa-el-offcanvas-body *:not(.fa):not(.eicon)' => 'color: {{VALUE}}',
            ],
            'condition' => [
                'content_type' => ['sidebar', 'custom'],
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'text_typography',
            'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
            'scheme' => Scheme_Typography::TYPOGRAPHY_4,
            'selector' => '.sa-el-offcanvas-content-{{ID}} .sa-el-offcanvas-body, .sa-el-offcanvas-content-{{ID}} .sa-el-offcanvas-body *:not(.fa):not(.eicon)',
            'condition' => [
                'content_type' => ['sidebar', 'custom'],
            ],
                ]
        );

        $this->add_control(
                'links_heading', [
            'label' => __('Links', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
            'condition' => [
                'content_type' => ['sidebar', 'custom'],
            ],
                ]
        );

        $this->start_controls_tabs('tabs_links_style');

        $this->start_controls_tab(
                'tab_links_normal', [
            'label' => __('Normal', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'content_type' => ['sidebar', 'custom'],
            ],
                ]
        );

        $this->add_control(
                'content_links_color', [
            'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '.sa-el-offcanvas-content-{{ID}} .sa-el-offcanvas-body a' => 'color: {{VALUE}}',
            ],
            'condition' => [
                'content_type' => ['sidebar', 'custom'],
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'links_typography',
            'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
            'scheme' => Scheme_Typography::TYPOGRAPHY_4,
            'selector' => '.sa-el-offcanvas-content-{{ID}} .sa-el-offcanvas-body a',
            'condition' => [
                'content_type' => ['sidebar', 'custom'],
            ],
                ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
                'tab_links_hover', [
            'label' => __('Hover', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'content_type' => ['sidebar', 'custom'],
            ],
                ]
        );

        $this->add_control(
                'content_links_color_hover', [
            'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '.sa-el-offcanvas-content-{{ID}} .sa-el-offcanvas-body a:hover' => 'color: {{VALUE}}',
            ],
            'condition' => [
                'content_type' => ['sidebar', 'custom'],
            ],
                ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /**
         * Style Tab: Icon
         * -------------------------------------------------
         */
        $this->start_controls_section(
                'section_icon_style', [
            'label' => __('Icon', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'trigger' => 'on-click',
                'trigger_type!' => 'button',
            ],
                ]
        );

        $this->add_control(
                'icon_color', [
            'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa-el-trigger-icon' => 'color: {{VALUE}}',
            ],
            'condition' => [
                'trigger' => 'on-click',
                'trigger_type' => 'icon',
            ],
                ]
        );

        $this->add_responsive_control(
                'icon_size', [
            'label' => __('Size', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => '28',
                'unit' => 'px',
            ],
            'range' => [
                'px' => [
                    'min' => 10,
                    'max' => 80,
                    'step' => 1,
                ],
            ],
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-trigger-icon' => 'font-size: {{SIZE}}{{UNIT}}',
            ],
            'condition' => [
                'trigger' => 'on-click',
                'trigger_type' => 'icon',
            ],
                ]
        );

        $this->add_responsive_control(
                'icon_image_width', [
            'label' => __('Width', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 10,
                    'max' => 1200,
                    'step' => 1,
                ],
            ],
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-trigger-image' => 'width: {{SIZE}}{{UNIT}}',
            ],
            'condition' => [
                'trigger' => 'on-click',
                'trigger_type' => 'image',
            ],
                ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Toggle Button
         * -------------------------------------------------
         */
        $this->start_controls_section(
                'section_toggle_button_style', [
            'label' => __('Toggle Button', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_responsive_control(
                'button_align', [
            'label' => __('Alignment', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::CHOOSE,
            'default' => 'left',
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
                '{{WRAPPER}} .sa-el-offcanvas-toggle-wrap' => 'text-align: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'button_size', [
            'label' => __('Size', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'md',
            'options' => [
                'xs' => __('Extra Small', SA_ELEMENTOR_TEXTDOMAIN),
                'sm' => __('Small', SA_ELEMENTOR_TEXTDOMAIN),
                'md' => __('Medium', SA_ELEMENTOR_TEXTDOMAIN),
                'lg' => __('Large', SA_ELEMENTOR_TEXTDOMAIN),
                'xl' => __('Extra Large', SA_ELEMENTOR_TEXTDOMAIN),
            ],
                ]
        );

        $this->start_controls_tabs('tabs_button_style');

        $this->start_controls_tab(
                'tab_button_normal', [
            'label' => __('Normal', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'button_bg_color_normal', [
            'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#f20089',
            'selectors' => [
                '{{WRAPPER}} .sa-el-offcanvas-toggle' => 'background-color: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'button_text_color_normal', [
            'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .sa-el-offcanvas-toggle' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'button_border_normal',
            'label' => __('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'placeholder' => '1px',
            'default' => '1px',
            'selector' => '{{WRAPPER}} .sa-el-offcanvas-toggle',
                ]
        );

        $this->add_control(
                'button_border_radius', [
            'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-offcanvas-toggle' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'button_typography',
            'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
            'scheme' => Scheme_Typography::TYPOGRAPHY_4,
            'selector' => '{{WRAPPER}} .sa-el-offcanvas-toggle',
                ]
        );

        $this->add_responsive_control(
                'button_padding', [
            'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-offcanvas-toggle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'button_box_shadow',
            'selector' => '{{WRAPPER}} .sa-el-offcanvas-toggle',
                ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
                'tab_button_hover', [
            'label' => __('Hover', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'button_bg_color_hover', [
            'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa-el-offcanvas-toggle:hover' => 'background-color: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'button_text_color_hover', [
            'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa-el-offcanvas-toggle:hover' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'button_border_color_hover', [
            'label' => __('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa-el-offcanvas-toggle:hover' => 'border-color: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'button_animation', [
            'label' => __('Animation', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HOVER_ANIMATION,
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'button_box_shadow_hover',
            'selector' => '{{WRAPPER}} .sa-el-offcanvas-toggle:hover',
                ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /**
         * Style Tab: Close Button
         * -------------------------------------------------
         */
        $this->start_controls_section(
                'section_close_button_style', [
            'label' => __('Close Button', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'close_button' => 'yes',
            ],
                ]
        );

        $this->add_control(
                'close_button_icon', [
            'label' => __('Button Icon', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::ICON,
            'default' => 'fa fa-close',
            'condition' => [
                'close_button' => 'yes',
            ],
                ]
        );

        $this->add_control(
                'close_button_text_color', [
            'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '.sa-el-offcanvas-close-{{ID}}' => 'color: {{VALUE}}',
            ],
            'condition' => [
                'close_button' => 'yes',
            ],
                ]
        );

        $this->add_responsive_control(
                'close_button_size', [
            'label' => __('Size', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => '28',
                'unit' => 'px',
            ],
            'range' => [
                'px' => [
                    'min' => 10,
                    'max' => 80,
                    'step' => 1,
                ],
            ],
            'size_units' => ['px', '%'],
            'selectors' => [
                '.sa-el-offcanvas-content-{{ID}} .sa-el-offcanvas-close-{{ID}}' => 'font-size: {{SIZE}}{{UNIT}}',
            ],
            'condition' => [
                'close_button' => 'yes',
            ],
                ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Overlay
         * -------------------------------------------------
         */
        $this->start_controls_section(
                'section_overlay_style', [
            'label' => __('Overlay', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'overlay_bg_color', [
            'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '.sa-el-offcanvas-content-{{ID}}-open .sa-el-offcanvas-container:after' => 'background: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'overlay_opacity', [
            'label' => __('Opacity', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1,
                    'step' => 0.01,
                ],
            ],
            'selectors' => [
                '.sa-el-offcanvas-content-{{ID}}-open .sa-el-offcanvas-container:after' => 'opacity: {{SIZE}};',
            ],
                ]
        );

        $this->end_controls_section();
    }

    /**
     * Render close button for offcanvas output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @access protected
     */
    protected function render_close_button() {
        $settings = $this->get_settings_for_display();

        if ($settings['close_button'] != 'yes') {
            return;
        }

        $this->add_render_attribute(
                'close-button', 'class', [
            'sa-el-offcanvas-close',
            'sa-el-offcanvas-close-' . esc_attr($this->get_id()),
                ]
        );

        $this->add_render_attribute('close-button', 'role', 'button');
        ?>
        <div class="sa-el-offcanvas-header">
            <div <?php echo $this->get_render_attribute_string('close-button'); ?>>
                <?php if ($settings['close_button_icon'] != '') { ?>
                    <span class="<?php echo esc_attr($settings['close_button_icon']); ?>"></span>
                <?php } else { ?>
                    <span class="fa fa-close"></span>
                <?php } // end of if( $settings['close_button_icon'] != '' )  ?>
            </div>
        </div>
        <?php
    }

    /**
     * Render sidebars for output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @access protected
     */
    protected function render_sidebar() {
        $settings = $this->get_settings_for_display();
        $sidebar = $settings['sidebar'];

        if (empty($sidebar)) {
            return;
        }

        dynamic_sidebar($sidebar);
    }

    /**
     * Render custom template or saved template output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @access protected
     */
    protected function render_custom_content() {
        $settings = $this->get_settings_for_display();

        if (count($settings['custom_content'])) {
            foreach ($settings['custom_content'] as $key => $item) {
                ?>
                <div class="sa-el-offcanvas-custom-widget">
                    <h3 class="sa-el-offcanvas-widget-title"><?php echo $item['title']; ?></h3>
                    <div class="sa-el-offcanvas-widget-content">
                        <?php echo $item['description']; ?>
                    </div>
                </div>
                <?php
            }
        }
    }

    /**
     * Render offcanvas content widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $setting_attr = [
            'sa_content_id' => esc_attr($this->get_id()),
            'sa_direction' => esc_attr($settings['direction']),
            'sa_transition' => esc_attr($settings['content_transition']),
            'sa_esc_close' => esc_attr($settings['esc_close']),
            'sa_body_click_close' => esc_attr($settings['body_click_close']),
        ];

        $this->add_render_attribute(
                'content-wrap', [
            'class' => 'sa-el-offcanvas-content-wrap',
            'data-settings' => htmlspecialchars(json_encode($setting_attr)),
                ]
        );

        $this->add_render_attribute(
                'content', [
            'class' => [
                'sa-el-offcanvas-content',
                'sa-el-offcanvas-content-' . esc_attr($this->get_id()),
                'sa-el-offcanvas-' . $setting_attr['sa_transition'],
                'elementor-element-' . $setting_attr['sa_content_id'],
                'sa-el-offcanvas-content-' . $setting_attr['sa_direction'],
            ],
                ]
        );

        $this->add_render_attribute(
                'toggle-button', [
            'class' => [
                'sa-el-offcanvas-toggle',
                'sa-el-offcanvas-toogle-' . esc_attr($this->get_id()),
                'elementor-button',
                'elementor-size-' . esc_attr($settings['button_size']),
            ],
                ]
        );

        if ($settings['button_animation']) {
            $this->add_render_attribute('toggle-button', 'class', 'elementor-animation-' . esc_attr($settings['button_animation']));
        }
        ?>
        <div <?php echo $this->get_render_attribute_string('content-wrap'); ?>>

            <?php if ($settings['button_text'] != '' || $settings['button_text'] != ''): ?>
                <div class="sa-el-offcanvas-toggle-wrap">
                    <div <?php echo $this->get_render_attribute_string('toggle-button'); ?>>
                        <?php if (!empty($settings['button_icon'])): ?>
                            <span class="sa-el-offcanvas-toggle-icon <?php echo esc_attr($settings['button_icon']); ?>"></span>
                        <?php endif; ?>
                        <span class="sa-el-toggle-text">
                            <?php echo $settings['button_text']; ?>
                        </span>
                    </div>
                </div>
            <?php endif; // end of if( $settings['button_text'] != '' || $settings['button_text'] != '' )  ?>

            <div <?php echo $this->get_render_attribute_string('content'); ?>>
                <?php $this->render_close_button(); ?>
                <div class="sa-el-offcanvas-body">
                    <?php
                    if ('sidebar' == $settings['content_type']) {

                        $this->render_sidebar();
                    } else if ('custom' == $settings['content_type']) {

                        $this->render_custom_content();
                    } else if ('section' == $settings['content_type'] && !empty($settings['saved_section'])) {

                        echo \Elementor\Plugin::$instance->frontend->get_builder_content_for_display($settings['saved_section']);
                    } elseif ('template' == $settings['content_type'] && !empty($settings['templates'])) {

                        echo \Elementor\Plugin::$instance->frontend->get_builder_content_for_display($settings['templates']);
                    } elseif ('widget' == $settings['content_type'] && !empty($settings['saved_widget'])) {

                        echo \Elementor\Plugin::$instance->frontend->get_builder_content_for_display($settings['saved_widget']);
                    }
                    ?>
                </div><!-- /.sa-el-offcanvas-body -->
            </div>
        </div>
        <?php
    }

    protected function content_template() {
        
    }

}
