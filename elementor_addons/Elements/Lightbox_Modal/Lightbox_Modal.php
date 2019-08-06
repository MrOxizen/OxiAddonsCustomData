<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Lightbox_Modal;

if (!defined('ABSPATH'))
    exit; // If this file is called directly, abort.

use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Group_Control_Background as Group_Control_Background;
use \Elementor\Scheme_Typography as Scheme_Typography;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Utils as Utils;
use \Elementor\Widget_Base as Widget_Base;
use \Elementor\Frontend;

class Lightbox_Modal extends Widget_Base {

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function get_name() {
        return 'sa_el_lightbox';
    }

    public function get_title() {
        return esc_html__('Lightbox &amp; Modal', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon() {
        return 'eicon-lightbox oxi-el-admin-icon';
    }

    public function get_categories() {
        return ['sa-el-addons'];
    }

    protected function _register_controls() {

        /*
          /*	CONTENT TAB
          /*------------------------------------------------- */

        # Lightbox || Modal
        $this->start_controls_section(
                'sa_el_section_ligthbox_modal', [
            'label' => esc_html__('Lightbox || Modal', SA_ELEMENTOR_TEXTDOMAIN)
                ]
        );

        $this->add_control(
                'layout_type', [
            'label' => __('Layout', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'options' => [
                'standard' => __('Standard', SA_ELEMENTOR_TEXTDOMAIN),
                'fullscreen' => __('Fullscreen', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'default' => 'standard',
                ]
        );

        $this->add_responsive_control(
                'lightbox_popup_width', [
            'label' => __('Width', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => '550',
                'unit' => 'px',
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1920,
                    'step' => 1,
                ],
            ],
            'size_units' => ['px', '%'],
            'selectors' => [
                '.sa_el_lightbox_popup_window_{{ID}}' => 'width: {{SIZE}}{{UNIT}}; max-width: {{SIZE}}{{UNIT}}',
                '.sa_el_lightbox_modal_window_{{ID}}' => 'width: {{SIZE}}{{UNIT}}',
            ],
            'condition' => [
                'layout_type' => 'standard',
            ],
                ]
        );

        $this->add_control(
                'auto_height', [
            'label' => __('Auto Height', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
            'label_on' => __('Yes', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('No', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => 'yes',
            'condition' => [
                'layout_type' => 'standard',
            ],
                ]
        );

        $this->add_responsive_control(
                'popup_height', [
            'label' => __('Height', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => '450',
                'unit' => 'px',
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                    'step' => 1,
                ],
            ],
            'size_units' => ['px', '%'],
            'selectors' => [
                '.sa_el_lightbox_popup_window_{{ID}} .sa_el_lightbox_container' => 'height: {{SIZE}}{{UNIT}}',
                '.sa_el_lightbox_popup_window_{{ID}}.lightbox_type_image .sa_el_lightbox_container img' => 'max-height: 100%;',
            ],
            'condition' => [
                'auto_height!' => 'yes',
                'layout_type' => 'standard',
            ],
                ]
        );
        $this->end_controls_section(); # End Of Lightbox || Modal
        # Content Section
        $this->start_controls_section(
                'sa_el_section_ligthbox_content', [
            'label' => esc_html__('Content', SA_ELEMENTOR_TEXTDOMAIN)
                ]
        );

        $this->add_control(
                'popup_lightbox_title', [
            'label' => __('Enable Title', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'default' => '',
            'label_on' => __('Yes', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('No', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => 'yes',
                ]
        );

        $this->add_control(
                'title', [
            'label' => __('Title', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'dynamic' => [
                'active' => true,
            ],
            'default' => __('Lightbox Title', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'popup_lightbox_title' => 'yes',
            ],
            'dynamic' => ['active', true]
                ]
        );

        $this->add_control(
                'sa_el_lightbox_type', [
            'label' => esc_html__('Type', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'lightbox_type_image',
            'options' => [
                'lightbox_type_image' => esc_html__('Image', SA_ELEMENTOR_TEXTDOMAIN),
                'lightbox_type_url' => esc_html__('Link (Page/Video/Map)', SA_ELEMENTOR_TEXTDOMAIN),
                'lightbox_type_content' => esc_html__('Content', SA_ELEMENTOR_TEXTDOMAIN),
                'lightbox_type_template' => esc_html__('Saved Templates', SA_ELEMENTOR_TEXTDOMAIN),
                'lightbox_type_custom_html' => esc_html__('Custom HTML', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'dynamic' => ['active' => true]
                ]
        );

        $this->add_control(
                'sa_el_lightbox_type_image', [
            'label' => __('Choose Lightbox Image', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => 'https://www.shortcode-addons.com/wp-content/uploads/2019/07/Untitled-1.jpg',
            ],
            'condition' => [
                'sa_el_lightbox_type' => 'lightbox_type_image',
            ],
                ]
        );

        $this->add_control(
                'sa_el_primary_templates', [
            'label' => __('Choose Template', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'options' => $this->get_elementor_page_templates(),
            'condition' => [
                'sa_el_lightbox_type' => 'lightbox_type_template',
            ],
                ]
        );

        $this->add_control(
                'sa_el_lightbox_type_content', [
            'label' => __('Add your content here (HTML/Shortcode)', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::WYSIWYG,
            'default' => __('Add your popup content here', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'sa_el_lightbox_type' => 'lightbox_type_content'
            ],
            'dynamic' => ['active' => true]
                ]
        );

        $this->add_control(
                'sa_el_lightbox_type_url', [
            'label' => __('Provide Page/Video/Map URL', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::URL,
            'label_block' => true,
            'dynamic' => [
                'active' => true,
            ],
            'default' => [
                'url' => 'https://www.youtube.com/watch?v=BhgngA_cF1c&t=35s',
            ],
            'show_external' => false,
            'title' => __('Place Page/Video/Map URL', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'sa_el_lightbox_type' => 'lightbox_type_url',
            ],
                ]
        );

        $this->add_control(
                'custom_html', [
            'label' => __('Custom HTML', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::CODE,
            'language' => 'html',
            'condition' => [
                'sa_el_lightbox_type' => 'lightbox_type_custom_html',
            ],
                ]
        );

        $this->end_controls_section(); # End Of Content Section
        # Settings Section
        $this->start_controls_section(
                'sa_el_section_ligthbox_settings', [
            'label' => esc_html__('Settings', SA_ELEMENTOR_TEXTDOMAIN)
                ]
        );

        $this->add_control(
                'sa_el_lightbox_trigger_type', [
            'label' => esc_html__('Trigger', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'sa_el_lightbox_trigger_button',
            'options' => [
                'sa_el_lightbox_trigger_button' => esc_html__('Button Click', SA_ELEMENTOR_TEXTDOMAIN),
                'sa_el_lightbox_trigger_pageload' => esc_html__('Page Load', SA_ELEMENTOR_TEXTDOMAIN),
                'sa_el_lightbox_trigger_exit_intent' => esc_html__('Exit Intent', SA_ELEMENTOR_TEXTDOMAIN),
                'sa_el_lightbox_trigger_external' => esc_html__('External Element', SA_ELEMENTOR_TEXTDOMAIN),
            ],
                ]
        );

        # Lightbox trigger button
        $this->add_control(
                'page_load_heading', [
            'label' => __('Button Clilck Settings', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'condition' => [
                'sa_el_lightbox_trigger_type' => 'sa_el_lightbox_trigger_button',
            ],
                ]
        );

        $this->add_control(
                'trigger_type', [
            'label' => __('Type', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'button',
            'options' => [
                'button' => __('Button', SA_ELEMENTOR_TEXTDOMAIN),
                'icon' => __('Icon', SA_ELEMENTOR_TEXTDOMAIN),
                'image' => __('Image', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'condition' => [
                'sa_el_lightbox_trigger_type' => 'sa_el_lightbox_trigger_button',
            ],
                ]
        );

        $this->add_control(
                'sa_el_lightbox_open_btn', [
            'label' => esc_html__('Button Text', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('Open Popup', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'sa_el_lightbox_trigger_type' => 'sa_el_lightbox_trigger_button',
                'trigger_type' => 'button'
            ],
                ]
        );

        $this->add_control(
                'sa_el_lightbox_open_btn_icon', [
            'label' => esc_html__('Button Icon', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::ICON,
            'condition' => [
                'sa_el_lightbox_trigger_type' => 'sa_el_lightbox_trigger_button',
                'trigger_type' => 'button'
            ],
                ]
        );

        $this->add_control(
                'sa_el_lightbox_open_btn_icon_align', [
            'label' => esc_html__('Icon Position', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'left',
            'options' => [
                'left' => esc_html__('Before', SA_ELEMENTOR_TEXTDOMAIN),
                'right' => esc_html__('After', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'condition' => [
                'sa_el_lightbox_open_btn_icon!' => '',
                'sa_el_lightbox_trigger_type' => 'sa_el_lightbox_trigger_button',
                'trigger_type' => 'button'
            ],
                ]
        );

        $this->add_control(
                'trigger_only_icon', [
            'label' => esc_html__('Trigger Icon', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::ICON,
            'condition' => [
                'sa_el_lightbox_trigger_type' => 'sa_el_lightbox_trigger_button',
                'trigger_type' => 'icon'
            ],
                ]
        );

        $this->add_control(
                'trigger_only_image', [
            'label' => __('Trigger Image', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
            'condition' => [
                'sa_el_lightbox_trigger_type' => 'sa_el_lightbox_trigger_button',
                'trigger_type' => 'image'
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_lightbox_open_btn_alignment', [
            'label' => esc_html__('Alignment', SA_ELEMENTOR_TEXTDOMAIN),
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
                '{{WRAPPER}} .sa_el_lightbox_btn' => 'text-align: {{VALUE}}',
            ],
            'condition' => [
                'sa_el_lightbox_trigger_type' => 'sa_el_lightbox_trigger_button',
            ],
                ]
        );
        # End of lightbox trigger button
        # Lightbox trigger Page load
        $this->add_control(
                'delay_heading', [
            'label' => __('Page Load Settings', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
            'condition' => [
                'sa_el_lightbox_trigger_type' => 'sa_el_lightbox_trigger_pageload',
            ],
                ]
        );

        $this->add_control(
                'delay', [
            'label' => __('Delay', SA_ELEMENTOR_TEXTDOMAIN),
            'title' => __('seconds', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'default' => '1',
            'condition' => [
                'sa_el_lightbox_trigger_type' => 'sa_el_lightbox_trigger_pageload',
            ],
                ]
        );

        $this->add_control(
                'display_after_page_load', [
            'label' => __('Display After', SA_ELEMENTOR_TEXTDOMAIN),
            'title' => __('day(s)', SA_ELEMENTOR_TEXTDOMAIN),
            'description' => __('If a user closes the modal box, it will be displayed only after the defined day(s)', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'default' => '1',
            'condition' => [
                'sa_el_lightbox_trigger_type' => 'sa_el_lightbox_trigger_pageload',
            ],
                ]
        );
        # End of lightbox trigger Page load
        # Exit intent
        $this->add_control(
                'exit_intent_heading', [
            'label' => __('Exit Intent Settings', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'condition' => [
                'sa_el_lightbox_trigger_type' => 'sa_el_lightbox_trigger_exit_intent',
            ],
                ]
        );

        $this->add_control(
                'display_after_exit_intent', [
            'label' => __('Display After', SA_ELEMENTOR_TEXTDOMAIN),
            'title' => __('day(s)', SA_ELEMENTOR_TEXTDOMAIN),
            'description' => __('If a user closes the modal box, it will be displayed only after the defined day(s)', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'default' => '1',
            'condition' => [
                'sa_el_lightbox_trigger_type' => 'sa_el_lightbox_trigger_exit_intent',
            ],
                ]
        );
        # End of exit intent
        # Lightbox trigger external
        $this->add_control(
                'sa_el_lightbox_trigger_external', [
            'label' => __('Element Identifier', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => '#open-popup',
            'placeholder' => __('#open-popup', SA_ELEMENTOR_TEXTDOMAIN),
            'title' => __('#open-popup', SA_ELEMENTOR_TEXTDOMAIN),
            'description' => __('You can also use class identifier such as <strong>.open-popup</strong>', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'sa_el_lightbox_trigger_type' => 'sa_el_lightbox_trigger_external',
            ],
                ]
        );
        # End of lightbox trigger external
        # Exit settings
        $this->add_control(
                'exit_heading', [
            'label' => __('Exit Settings', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
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
                ]
        );

        $this->add_control(
                'esc_exit', [
            'label' => __('Esc to Exit', SA_ELEMENTOR_TEXTDOMAIN),
            'description' => __('Close the modal box by pressing the Esc key', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
            'label_on' => __('Yes', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('No', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => 'yes',
                ]
        );

        $this->add_control(
                'click_exit', [
            'label' => __('Click to Exit', SA_ELEMENTOR_TEXTDOMAIN),
            'description' => __('Close the modal box by clicking anywhere outside the modal window', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
            'label_on' => __('Yes', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('No', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => 'yes',
                ]
        );
        # End of exit settings
        # Lightbox trigger page load
        $this->add_control(
                'sa_el_lightbox_trigger_pageload', [
            'label' => esc_html__('Delay (Seconds)', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 1,
            ],
            'range' => [
                'ms' => [
                    'min' => 1,
                    'max' => 100,
                ],
            ],
            'condition' => [
                'sa_el_lightbox_trigger_type' => 'sa_el_lightbox_trigger_pageload',
            ],
                ]
        ); # End of lightbox trigger page load

        $this->end_controls_section();
        # End of Settings Section
        # Animation Section
        $this->start_controls_section(
                'animation_section', [
            'label' => esc_html__('Animation', SA_ELEMENTOR_TEXTDOMAIN)
                ]
        );

        $this->add_control(
                'lightbox_modal_animation_in', [
            'label' => __('Animation', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT2,
            'default' => '',
            'options' => [
                'mfp-zoom-in' => __('Zoom In', SA_ELEMENTOR_TEXTDOMAIN),
                'mfp-zoom-out' => __('Zoom Out', SA_ELEMENTOR_TEXTDOMAIN),
                'mfp-3d-unfold' => __('3D Unfold', SA_ELEMENTOR_TEXTDOMAIN),
                'mfp-newspaper' => __('Newspaper', SA_ELEMENTOR_TEXTDOMAIN),
                'mfp-move-from-top' => __('Move From Top', SA_ELEMENTOR_TEXTDOMAIN),
                'mfp-move-left' => __('Move Left', SA_ELEMENTOR_TEXTDOMAIN),
                'mfp-move-right' => __('Move Right', SA_ELEMENTOR_TEXTDOMAIN),
            ],
                ]
        );

        $this->end_controls_section(); # End of Animation Section

        if (apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', ['', '', FALSE])) {
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

        /* ------------------------------------------------- */
        /* 	Style TAB
          /*------------------------------------------------- */

        /**
         * Style Tab: Title
         * -------------------------------------------------
         */
        $this->start_controls_section(
                'section_title_style', [
            'label' => __('Title', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'popup_lightbox_title' => 'yes',
            ],
                ]
        );
        $this->add_responsive_control(
                'title_align', [
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
            ],
            'default' => '',
            'selectors' => [
                '.sa_el_lightbox_popup_window_{{ID}} .sa_el_lightbox_header .sa_el_lightbox_title' => 'text-align: {{VALUE}};',
            ]
                ]
        );

        $this->add_control(
                'title_bg', [
            'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '.sa_el_lightbox_popup_window_{{ID}} .sa_el_lightbox_header .sa_el_lightbox_title' => 'background-color: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'title_color', [
            'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '.sa_el_lightbox_popup_window_{{ID}} .sa_el_lightbox_header .sa_el_lightbox_title' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'title_border',
            'label' => __('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'placeholder' => '1px',
            'default' => '1px',
            'selector' => '.sa_el_lightbox_popup_window_{{ID}} .sa_el_lightbox_header .sa_el_lightbox_title',
                ]
        );

        $this->add_responsive_control(
                'title_padding', [
            'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '.sa_el_lightbox_popup_window_{{ID}} .sa_el_lightbox_header .sa_el_lightbox_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'title_typography',
            'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
            'scheme' => Scheme_Typography::TYPOGRAPHY_4,
            'selector' => '.sa_el_lightbox_popup_window_{{ID}} .sa_el_lightbox_header .sa_el_lightbox_title',
                ]
        );
        $this->end_controls_section();


        /**
         * Style Tab: Lightbox
         * -------------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_section_lightbox_styles', [
            'label' => esc_html__('Lightbox', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE
                ]
        );

        $this->add_control(
                'sa_el_lightbox_container_bg', [
            'label' => esc_html__('Background', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '.sa_el_lightbox_popup_window.sa_el_lightbox_popup_window_{{ID}}' => 'background-color: {{VALUE}};',
                '.sa_el_lightbox_popup_window.sa_el_lightbox_modal_window_{{ID}}' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_lightbox_container_border',
            'selector' => '.sa_el_lightbox_popup_window.sa_el_lightbox_popup_window_{{ID}}',
                ]
        );

        $this->add_responsive_control(
                'sa_el_lightbox_container_border_radius', [
            'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px'],
            'selectors' => [
                '.sa_el_lightbox_popup_window.sa_el_lightbox_popup_window_{{ID}}' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_lightbox_container_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px'],
            'selectors' => [
                '.sa_el_lightbox_popup_window.sa_el_lightbox_popup_window_{{ID}}' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                '.sa_el_lightbox_popup_window.sa_el_lightbox_modal_window_{{ID}}' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'lightbox_box_shadow',
            'selector' => '.sa_el_lightbox_popup_window.sa_el_lightbox_popup_window_{{ID}}',
            'separator' => 'before',
                ]
        );

        $this->end_controls_section(); # Lightbox styles

        /**
         * Style Tab: Overlay
         * -------------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_section_lightbox_overlay', [
            'label' => esc_html__('Overlay', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE
                ]
        );
        $this->add_control(
                'sa_el_lightbox_container_overlay', [
            'label' => esc_html__('Enable dark overlay?', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('yes', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('no', SA_ELEMENTOR_TEXTDOMAIN),
            'default' => 'yes',
                ]
        );

        $this->add_control(
                'sa_el_lightbox_container_overlay_color', [
            'label' => esc_html__('Overlay Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => "rgba(0,0,0,.8)",
            'selectors' => [
                '.mfp-bg.sa_el_lightbox_modal_popup_{{ID}}.mfp-bg' => 'background: {{VALUE}};',
            ],
            'condition' => [
                'sa_el_lightbox_container_overlay' => 'yes',
            ],
                ]
        );

        $this->end_controls_section();
        # Lightbox styles


        /**
         * Style Tab: Icon
         * -------------------------------------------------
         */
        $this->start_controls_section(
                'section_icon_style', [
            'label' => __('Icon', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'sa_el_lightbox_trigger_type' => 'sa_el_lightbox_trigger_button',
                'trigger_type' => ['icon', 'image']
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_lightbox_open_btn_icon_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_lightbox_btn > .sa_el_trigger_icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_lightbox_open_btn_icon_margin', [
            'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_lightbox_btn > .sa_el_trigger_icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_lightbox_open_btn_icon_border_radius', [
            'label' => esc_html__('Button Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa_el_lightbox_btn > .sa_el_trigger_icon' => 'border-radius: {{SIZE}}{{UNIT}};',
            ]
                ]
        );

        $this->start_controls_tabs('sa_el_lightbox_open_btn_icon_content_tabs');

        $this->start_controls_tab(
                'normal_default_content_icon', [
            'label' => esc_html__('Normal', SA_ELEMENTOR_TEXTDOMAIN)
                ]
        );

        $this->add_control(
                'sa_el_lightbox_open_btn_icon_color', [
            'label' => esc_html__('Icon Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .sa_el_lightbox_btn > .sa_el_trigger_icon' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_lightbox_open_btn_icon_background_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#333333',
            'selectors' => [
                '{{WRAPPER}} .sa_el_lightbox_btn > .sa_el_trigger_icon' => 'background-color: {{VALUE}};',
            ]
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_lightbox_open_btn_icon_border',
            'selector' => '{{WRAPPER}} .sa_el_lightbox_btn > .sa_el_trigger_icon',
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_el_lightbox_open_btn_icon_shadow',
            'selector' => '{{WRAPPER}} .sa_el_lightbox_btn > .sa_el_trigger_icon'
                ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
                'sa_el_lightbox_open_btn_icon_hover', [
            'label' => esc_html__('Hover', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'sa_el_lightbox_trigger_type' => 'sa_el_lightbox_trigger_button',
            ],
                ]
        );

        $this->add_control(
                'sa_el_lightbox_open_btn_icon_hover_text_color', [
            'label' => esc_html__('Icon Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .sa_el_lightbox_btn > .sa_el_trigger_icon:hover' => 'color: {{VALUE}};',
            ]
                ]
        );

        $this->add_control(
                'sa_el_lightbox_open_btn_icon_hover_background_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#272727',
            'selectors' => [
                '{{WRAPPER}} .sa_el_lightbox_btn > .sa_el_trigger_icon:hover' => 'background-color: {{VALUE}};',
            ]
                ]
        );

        $this->add_control(
                'sa_el_lightbox_open_btn_icon_hover_border_color', [
            'label' => esc_html__('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sa_el_lightbox_btn > .sa_el_trigger_icon:hover' => 'border-color: {{VALUE}};',
            ]
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_el_lightbox_open_btn_icon_hover_shadow',
            'selector' => '{{WRAPPER}} .sa_el_lightbox_btn > .sa_el_trigger_icon:hover'
                ]
        );
        $this->end_controls_tabs();

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
                '{{WRAPPER}} .sa_el_trigger_icon' => 'font-size: {{SIZE}}{{UNIT}}',
            ],
            'condition' => [
                'sa_el_lightbox_trigger_type' => 'sa_el_lightbox_trigger_button',
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
            'default' => [
                'unit' => 'px',
                'size' => 150
            ],
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_trigger_image' => 'width: {{SIZE}}{{UNIT}}',
            ],
            'condition' => [
                'sa_el_lightbox_trigger_type' => 'sa_el_lightbox_trigger_button',
                'trigger_type' => 'image',
            ],
                ]
        );

        $this->add_control(
                'icon_image_border_radius', [
            'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
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
                '{{WRAPPER}} .sa_el_trigger_image' => 'border-radius: {{SIZE}}{{UNIT}}',
            ],
            'condition' => [
                'sa_el_lightbox_trigger_type' => 'sa_el_lightbox_trigger_button',
                'trigger_type' => 'image',
            ],
                ]
        );

        $this->end_controls_section();


        /**
         * Style Tab: Button
         * -------------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_section_lightbox_trigger_styles', [
            'label' => esc_html__('Button', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'sa_el_lightbox_trigger_type' => 'sa_el_lightbox_trigger_button',
                'trigger_type' => 'button',
            ]
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

        $this->add_control(
                'button_sizing', [
            'label' => __('Square Sizing', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'no',
            'label_on' => __('Yes', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('No', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => 'OxiAddonsELEqualHeightWidth',
                ]
        );
        $this->add_control(
                'sa_el_lightbox_open_btn_icon_indent', [
            'label' => esc_html__('Icon Spacing', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'max' => 50,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa_el_lightbox_btn .open-pop-up-button-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .sa_el_lightbox_btn .open-pop-up-button-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};'
            ]
                ]
        );

        $this->add_responsive_control(
                'sa_el_lightbox_open_btn_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_lightbox_btn > span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_lightbox_open_btn_margin', [
            'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_lightbox_btn > span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_lightbox_open_btn_border_radius', [
            'label' => esc_html__('Button Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa_el_lightbox_btn > span' => 'border-radius: {{SIZE}}{{UNIT}};',
            ]
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_lightbox_open_btn_typography',
            'scheme' => Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .sa_el_lightbox_btn > span'
                ]
        );

        $this->start_controls_tabs('sa_el_lightbox_open_btn_content_tabs');

        $this->start_controls_tab(
                'normal_default_content', [
            'label' => esc_html__('Normal', SA_ELEMENTOR_TEXTDOMAIN)
                ]
        );

        $this->add_control(
                'sa_el_lightbox_open_btn_text_color', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .sa_el_lightbox_btn > span' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_lightbox_open_btn_background_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#333333',
            'selectors' => [
                '{{WRAPPER}} .sa_el_lightbox_btn > span' => 'background-color: {{VALUE}};',
            ]
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_lightbox_open_btn_border',
            'selector' => '{{WRAPPER}} .sa_el_lightbox_btn > span',
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_el_lightbox_open_btn_shadow',
            'selector' => '{{WRAPPER}} .sa_el_lightbox_btn > span'
                ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
                'sa_el_lightbox_open_btn_hover', [
            'label' => esc_html__('Hover', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'sa_el_lightbox_trigger_type' => 'sa_el_lightbox_trigger_button',
            ],
                ]
        );

        $this->add_control(
                'sa_el_lightbox_open_btn_hover_text_color', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .sa_el_lightbox_btn > span:hover' => 'color: {{VALUE}};',
            ]
                ]
        );

        $this->add_control(
                'sa_el_lightbox_open_btn_hover_background_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#272727',
            'selectors' => [
                '{{WRAPPER}} .sa_el_lightbox_btn > span:hover' => 'background-color: {{VALUE}};',
            ]
                ]
        );

        $this->add_control(
                'sa_el_lightbox_open_btn_hover_border_color', [
            'label' => esc_html__('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sa_el_lightbox_btn > span:hover' => 'border-color: {{VALUE}};',
            ]
                ]
        );

        $this->add_control(
                'button_animation', [
            'label' => __('Animation', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HOVER_ANIMATION,
            'condition' => [
                'trigger_type' => 'button',
                'sa_el_lightbox_open_btn!' => ''
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_el_lightbox_open_btn_hover_shadow',
            'selector' => '{{WRAPPER}} .sa_el_lightbox_btn > span:hover'
                ]
        );
        $this->end_controls_tabs();

        $this->end_controls_section();

        /**
         * Style Tab: Content Styles
         * -------------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_section_lightbox_content_styles', [
            'label' => esc_html__('Content Styles', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'sa_el_lightbox_type' => 'lightbox_type_content',
            ]
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_lightbox_content_typography',
            'scheme' => Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '.sa_el_lightbox_container .sa_el_lightbox_content'
                ]
        );

        $this->add_control(
                'sa_el_lightbox_content_color', [
            'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '.sa_el_lightbox_container .sa_el_lightbox_content' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->end_controls_section();


        /**
         * Style Tab: Close Button
         * -------------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_section_lightbox_closebtn_styles', [
            'label' => esc_html__('Close Button', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'close_button' => 'yes'
            ]
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
                '.sa_el_lightbox_popup_window_{{ID}} .mfp-close' => 'font-size: {{SIZE}}{{UNIT}}',
            ],
            'condition' => [
                'close_button' => 'yes',
            ],
                ]
        );

        $this->add_control(
                'close_button_weight', [
            'label' => __('Weight', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'normal',
            'options' => [
                'normal' => __('Normal', SA_ELEMENTOR_TEXTDOMAIN),
                'bold' => __('Bold', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'condition' => [
                'close_button' => 'yes',
            ],
            'selectors' => [
                '.sa_el_lightbox_popup_window_{{ID}} .mfp-close' => 'font-weight: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'close_button_position_heading', [
            'label' => __('Close Button Position', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'condition' => [
                'close_button' => 'yes',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_lightbox_close_button_left_position', [
            'label' => esc_html__('Position Right', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px', '%'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 500,
                ],
            ],
            'selectors' => [
                '.sa_el_lightbox_popup_window_{{ID}} button.mfp-close' => 'right: -{{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'close_button' => 'yes',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_lightbox_close_button_top_position', [
            'label' => esc_html__('Position Top', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px', '%'],
            'separator' => 'after',
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 500,
                ],
            ],
            'selectors' => [
                '.sa_el_lightbox_popup_window_{{ID}} button.mfp-close' => 'top: -{{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'close_button' => 'yes',
            ],
                ]
        );

        $this->add_responsive_control(
                'close_button_margin', [
            'label' => __('Margin', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'separator' => 'before',
            'placeholder' => [
                'top' => '',
                'right' => '',
                'bottom' => '',
                'left' => '',
            ],
            'selectors' => [
                '.sa_el_lightbox_popup_window_{{ID}} button.mfp-close' => 'margin-top: {{TOP}}{{UNIT}}; margin-left: {{LEFT}}{{UNIT}}; margin-right: {{RIGHT}}{{UNIT}}; margin-bottom: {{BOTTOM}}{{UNIT}};',
            ],
            'condition' => [
                'close_button' => 'yes',
            ],
                ]
        );

        $this->add_responsive_control(
                'close_button_padding', [
            'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'placeholder' => [
                'top' => '',
                'right' => '',
                'bottom' => '',
                'left' => '',
            ],
            'selectors' => [
                '.sa_el_lightbox_popup_window_{{ID}} button.mfp-close' => 'padding-top: {{TOP}}{{UNIT}}; padding-left: {{LEFT}}{{UNIT}}; padding-right: {{RIGHT}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}};',
            ],
            'condition' => [
                'close_button' => 'yes',
            ],
                ]
        );

        $this->start_controls_tabs('tabs_close_button_style');

        $this->start_controls_tab(
                'tab_close_button_normal', [
            'label' => __('Normal', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'close_button' => 'yes',
            ],
                ]
        );

        $this->add_control(
                'sa_el_lightbox_closebtn_color', [
            'label' => __('Icon Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '.sa_el_lightbox_popup_window_{{ID}} .mfp-close' => 'color: {{VALUE}}',
            ],
            'condition' => [
                'close_button' => 'yes',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Background::get_type(), [
            'name' => 'sa_el_lightbox_closebtn_bg',
            'label' => __('Background', SA_ELEMENTOR_TEXTDOMAIN),
            'types' => ['classic', 'gradient'],
            'selector' => '.sa_el_lightbox_popup_window_{{ID}} .mfp-close',
            'condition' => [
                'close_button' => 'yes',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'close_button_border_normal',
            'label' => __('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'placeholder' => '1px',
            'default' => '1px',
            'selector' => '.sa_el_lightbox_popup_window_{{ID}} .mfp-close',
            'condition' => [
                'close_button' => 'yes',
            ],
                ]
        );

        $this->add_control(
                'close_button_border_radius', [
            'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '.sa_el_lightbox_popup_window_{{ID}} .mfp-close' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'close_button' => 'yes',
            ],
                ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
                'tab_close_button_hover', [
            'label' => __('Hover', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'close_button' => 'yes',
            ],
                ]
        );

        $this->add_control(
                'close_button_color_hover', [
            'label' => __('Icon Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '.sa_el_lightbox_popup_window_{{ID}} .mfp-close:hover' => 'color: {{VALUE}}',
            ],
            'condition' => [
                'close_button' => 'yes',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Background::get_type(), [
            'name' => 'close_button_bg_hover',
            'label' => __('Background', SA_ELEMENTOR_TEXTDOMAIN),
            'types' => ['classic', 'gradient'],
            'selector' => '.sa_el_lightbox_popup_window_{{ID}} .mfp-close:hover',
            'condition' => [
                'close_button' => 'yes',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'close_button_border_hover',
            'label' => __('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'placeholder' => '1px',
            'default' => '1px',
            'selector' => '.sa_el_lightbox_popup_window_{{ID}} .mfp-close:hover',
            'condition' => [
                'close_button' => 'yes',
            ],
                ]
        );

        $this->add_control(
                'close_button_border_radius_hover', [
            'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '.sa_el_lightbox_popup_window_{{ID}} .mfp-close:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'close_button' => 'yes',
            ],
                ]
        );

        $this->end_controls_tab();

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();
        $popup_image = $this->get_settings('sa_el_lightbox_type_image');

        $this->add_render_attribute(
                'sa_el_lightbox_wrapper', [
            'data-lightbox-type' => $settings['sa_el_lightbox_type'],
            'data-lightbox-type-url' => $settings['sa_el_lightbox_type_url'],
            'data-lightbox-trigger-pageload' => $settings['sa_el_lightbox_trigger_pageload']['size'],
            'data-lightbox-closebtn-color' => $settings['sa_el_lightbox_closebtn_color']
                ]
        );

        $this->add_render_attribute('sa_el_lightbox_wrapper', 'class', 'sa_el_lightbox_wrapper');
        $this->add_render_attribute('sa_el_lightbox_wrapper', 'data-trigger', $settings['sa_el_lightbox_trigger_type']);
        $this->add_render_attribute('sa_el_lightbox_wrapper', 'data-lightbox-id', 'lightbox_' . esc_attr($this->get_id()));

        // Popup Type
        if ('lightbox_type_image' == $settings['sa_el_lightbox_type'] || 'lightbox_type_content' == $settings['sa_el_lightbox_type'] || 'lightbox_type_template' == $settings['sa_el_lightbox_type'] || 'lightbox_type_custom_html' == $settings['sa_el_lightbox_type']) {
            $this->add_render_attribute('sa_el_lightbox_wrapper', 'data-type', 'inline');
        } else if ('lightbox_type_url' === $settings['sa_el_lightbox_type']) {
            $this->add_render_attribute('sa_el_lightbox_wrapper', 'data-type', 'iframe');
        } else {
            $this->add_render_attribute('sa_el_lightbox_wrapper', 'data-type', $settings['sa_el_lightbox_type']);
        }

        if ('lightbox_type_image' === $settings['sa_el_lightbox_type'] || 'lightbox_type_content' === $settings['sa_el_lightbox_type'] || 'lightbox_type_template' === $settings['sa_el_lightbox_type'] || 'lightbox_type_custom_html' === $settings['sa_el_lightbox_type']) {
            $this->add_render_attribute('sa_el_lightbox_wrapper', 'data-src', '#sa_el_lightbox_window_' . esc_attr($this->get_id()));
        }
        if ('lightbox_type_url' === $settings['sa_el_lightbox_type']) {
            $this->add_render_attribute('sa_el_lightbox_wrapper', 'data-src', esc_url($settings['sa_el_lightbox_type_url']['url']));
            $this->add_render_attribute('sa_el_lightbox_wrapper', 'data-iframe-class', 'sa_el_lightbox_popup_window sa_el_lightbox_modal_window_' . esc_attr($this->get_id()));
        }

        if ($settings['layout_type'] == 'fullscreen') {
            $this->add_render_attribute('sa_el_lightbox_wrapper', 'data-popup-layout', 'sa_el_lightbox_popup_fullscreen');
        } else {
            $this->add_render_attribute('sa_el_lightbox_wrapper', 'data-popup-layout', 'sa_el_lightbox_popup_standard');
        }

        if ('yes' == $settings['sa_el_lightbox_container_overlay']) {
            $this->add_render_attribute('sa_el_lightbox_wrapper', 'data-main-class', 'sa_el_lightbox_modal_popup_' . esc_attr($this->get_id()));
        } else {
            $this->add_render_attribute('sa_el_lightbox_wrapper', 'data-main-class', 'sa_el_lightbox_no_overlay sa_el_lightbox_modal_popup_' . esc_attr($this->get_id()));
        }

        if ('yes' === $settings['close_button']) {
            $this->add_render_attribute('sa_el_lightbox_wrapper', 'data-close_button', 'yes');
        }

        if ('yes' === $settings['esc_exit']) {
            $this->add_render_attribute('sa_el_lightbox_wrapper', 'data-esc_exit', 'yes');
        }

        if ('yes' === $settings['click_exit']) {
            $this->add_render_attribute('sa_el_lightbox_wrapper', 'data-click_exit', 'yes');
        }

        $this->add_render_attribute('sa_el_lightbox_wrapper', 'data-effect', 'animated ' . $settings['lightbox_modal_animation_in']);

        // Trigger
        if ($settings['sa_el_lightbox_trigger_type'] != 'sa_el_lightbox_trigger_external') {
            $this->add_render_attribute('sa_el_lightbox_wrapper', 'data-trigger-element', '.sa_el_modal_popup_link_' . esc_attr($this->get_id()));
        }

        if (($settings['sa_el_lightbox_trigger_type']) == 'sa_el_lightbox_trigger_button' && $settings['trigger_type'] == 'button') {
            $trigger_html_tag = 'span';

            $this->add_render_attribute(
                    'trigger_button', [
                'id' => 'btn-sa_el_lightbox-' . esc_attr($this->get_id()),
                'class' => [
                    'sa_el_modal_popup_button',
                    'sa_el_modal_popup_link',
                    'sa_el_modal_popup_link_' . esc_attr($this->get_id()),
                    'elementor-button',
                    $settings['button_sizing'],
                    'elementor-size-' . $settings['button_size'],
                ]
                    ]
            );
           
            if ($settings['button_animation']) {
                $this->add_render_attribute('trigger_button', 'class', 'elementor-animation-' . $settings['button_animation']);
            }
        } else if ($settings['sa_el_lightbox_trigger_type'] == 'sa_el_lightbox_trigger_pageload') {
            $sa_el_delay = 1000;
            if ($settings['delay'] != '') {
                $sa_el_delay = $settings['delay'] * 1000;
            }
            $this->add_render_attribute('sa_el_lightbox_wrapper', 'data-delay', $sa_el_delay);

            if ($settings['display_after_page_load'] != '') {
                $this->add_render_attribute('sa_el_lightbox_wrapper', 'data-display-after', $settings['display_after_page_load']);
            }
        } else if ($settings['sa_el_lightbox_trigger_type'] == 'sa_el_lightbox_trigger_exit_intent') {
            if ($settings['display_after_exit_intent'] != '') {
                $this->add_render_attribute('sa_el_lightbox_wrapper', 'data-display-after', $settings['display_after_exit_intent']);
            }
        } else if ($settings['sa_el_lightbox_trigger_type'] == 'sa_el_lightbox_trigger_external') {
            if ($settings['sa_el_lightbox_trigger_external'] != '') {
                $this->add_render_attribute('sa_el_lightbox_wrapper', 'data-trigger-element', $settings['sa_el_lightbox_trigger_external']);
            }
        }

        // Popup Window
        $this->add_render_attribute('lightbox-popup-window', 'class', 'sa_el_lightbox_popup_window sa_el_lightbox_popup_window_' . esc_attr($this->get_id()));

        $this->add_render_attribute('lightbox-popup-window', 'id', 'sa_el_lightbox_window_' . esc_attr($this->get_id()));

        // Popup window container
        $this->add_render_attribute('popup-window-container', 'class', 'sa_el_lightbox_container');

        // Content based wrapper class
        $this->add_render_attribute('lightbox-popup-window', 'class', $settings['sa_el_lightbox_type']);
        ?>


        <div <?php echo $this->get_render_attribute_string('sa_el_lightbox_wrapper'); ?>>
            <div class="sa_el_lightbox_btn">
                <?php
                if (($settings['sa_el_lightbox_trigger_type']) == 'sa_el_lightbox_trigger_button') {

                    if ('button' == $settings['trigger_type']) {
                        printf('<%1$s %2$s>', $trigger_html_tag, $this->get_render_attribute_string('trigger_button'));
                        if (!empty($settings['sa_el_lightbox_open_btn_icon']) && $settings['sa_el_lightbox_open_btn_icon_align'] == 'left') {
                            printf('<i class="open-pop-up-button-icon-left %1$s" aria-hidden="true"></i>', $settings['sa_el_lightbox_open_btn_icon']);
                        }

                        echo esc_attr($settings['sa_el_lightbox_open_btn']);

                        if (!empty($settings['sa_el_lightbox_open_btn_icon']) && $settings['sa_el_lightbox_open_btn_icon_align'] == 'right') {
                            printf('<i class="open-pop-up-button-icon-right %1$s" aria-hidden="true"></i>', $settings['sa_el_lightbox_open_btn_icon']);
                        }
                        printf('</ %1$s>', $trigger_html_tag);
                    } else if ('icon' == $settings['trigger_type']) {
                        if (!empty($settings['trigger_only_icon'])) {
                            printf('<i class="sa_el_trigger_icon sa_el_modal_popup_link %1$s %2$s" aria-hidden="true"></i>', $settings['trigger_only_icon'], 'sa_el_modal_popup_link_' . esc_attr($this->get_id()));
                        }
                    } else if ('image' == $settings['trigger_type']) {
                        $trigger_image = $this->get_settings('trigger_only_image');
                        if (!empty($trigger_image['url'])) {
                            printf('<img class="sa_el_trigger_image sa_el_modal_popup_link %1$s" src="%2$s" alt="%3$s">', 'sa_el_modal_popup_link_' . esc_attr($this->get_id()), esc_url($trigger_image['url']), esc_attr(get_post_meta($trigger_image['id'], '_wp_attachment_image_alt', true)));
                        }
                    }
                }
                ?>
            </div><!-- close .sa_el_lightbox_btn -->
        </div>

        <div <?php echo $this->get_render_attribute_string('lightbox-popup-window'); ?>>
            <div <?php echo $this->get_render_attribute_string('popup-window-container'); ?>>
                <?php if ($settings['popup_lightbox_title'] == 'yes' && $settings['title'] != '') : ?>
                    <div class="sa_el_lightbox_header">
                        <h2 class="sa_el_lightbox_title"><?php echo $settings['title']; ?></h2>
                    </div>
                    <?php
                endif; // if ( $settings['popup_title'] == 'yes' ...)

                if ('lightbox_type_image' == ($settings['sa_el_lightbox_type'])) {
                    printf('<img src="%1$s" alt="%2$s">', esc_url($popup_image['url']), esc_attr(get_post_meta($popup_image['id'], '_wp_attachment_image_alt', true)));
                } elseif ('lightbox_type_content' == ($settings['sa_el_lightbox_type'])) {

                    echo do_shortcode($settings['sa_el_lightbox_type_content']);
                } elseif ('lightbox_type_template' == $settings['sa_el_lightbox_type']) {

                    if (!empty($settings['sa_el_primary_templates'])) {
                        $sa_el_template_id = $settings['sa_el_primary_templates'];
                        $sa_el_frontend = new Frontend;
                        echo $sa_el_frontend->get_builder_content($sa_el_template_id, true);
                    }
                } else if ('lightbox_type_custom_html' == $settings['sa_el_lightbox_type']) {
                    echo $settings['custom_html'];
                } else {
                    printf('<div class="sa_el_iframe_container"><iframe allowfullscreen="" src="%1$s" frameborder="0"></iframe></div>', esc_url($settings['sa_el_lightbox_type_url']['url']));
                }
                ?>


            </div>
        </div>
        <?php
    }

    protected function content_template() {
        
    }

}
