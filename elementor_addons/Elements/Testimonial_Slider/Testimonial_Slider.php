<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Testimonial_Slider;

use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Utils as Utils;
use \Elementor\Widget_Base as Widget_Base;

if (!defined('ABSPATH'))
    exit; // If this file is called directly, abort.

class Testimonial_Slider extends Widget_Base {

    public function get_name() {
        return 'sa-el-testimonial-slider';
    }

    public function get_title() {
        return esc_html__('Testimonial Slider', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon() {
        return 'eicon-accordion oxi-el-admin-icon';
    }

    public function get_categories() {
        return ['sa-el-addons'];
    }

    protected function _register_controls() {


        $this->start_controls_section(
                'sa_el_section_testimonial_content', [
            'label' => esc_html__('Testimonial Content', SA_ELEMENTOR_TEXTDOMAIN)
                ]
        );


        $this->add_control(
                'sa_el_testimonial_slider_item', [
            'type' => Controls_Manager::REPEATER,
            'default' => [
                [
                    'sa_el_testimonial_name' => 'John Doe',
                ],
                [
                    'sa_el_testimonial_name' => 'Jane Doe',
                ],
            ],
            'fields' => [
                [
                    'name' => 'sa_el_testimonial_enable_avatar',
                    'label' => esc_html__('Display Avatar?', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::SWITCHER,
                    'default' => 'yes',
                ],
                [
                    'name' => 'sa_el_testimonial_image',
                    'label' => esc_html__('Testimonial Avatar', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
                        'sa_el_testimonial_enable_avatar' => 'yes',
                    ],
                ],
                [
                    'name' => 'sa_el_testimonial_name',
                    'label' => esc_html__('User Name', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('John Doe', SA_ELEMENTOR_TEXTDOMAIN),
                    'dynamic' => ['active' => true]
                ],
                [
                    'name' => 'sa_el_testimonial_company_title',
                    'label' => esc_html__('Company Name', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Codetic', SA_ELEMENTOR_TEXTDOMAIN),
                    'dynamic' => ['active' => true]
                ],
                [
                    'name' => 'sa_el_testimonial_description',
                    'label' => esc_html__('Testimonial Description', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::WYSIWYG,
                    'default' => esc_html__('"Lorem ipsum dolor sit amet, consectetur adipiscing elit,', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                [
                    'name' => 'sa_el_testimonial_enable_rating',
                    'label' => esc_html__('Display Rating?', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::SWITCHER,
                    'default' => 'yes',
                ],
                [
                    'name' => 'sa_el_testimonial_rating_number',
                    'label' => __('Rating Number', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'rating-five',
                    'options' => [
                        'rating-one' => __('1', SA_ELEMENTOR_TEXTDOMAIN),
                        'rating-two' => __('2', SA_ELEMENTOR_TEXTDOMAIN),
                        'rating-three' => __('3', SA_ELEMENTOR_TEXTDOMAIN),
                        'rating-four' => __('4', SA_ELEMENTOR_TEXTDOMAIN),
                        'rating-five' => __('5', SA_ELEMENTOR_TEXTDOMAIN),
                    ],
                    'condition' => [
                        'sa_el_testimonial_enable_rating' => 'yes',
                    ],
                ],
            ],
            'title_field' => 'Testimonial Item',
                ]
        );



        $this->end_controls_section();

        /**
         * Content Tab: Carousel Settings
         */
        $this->start_controls_section(
                'section_additional_options', [
            'label' => __('Carousel Settings', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'carousel_effect', [
            'label' => __('Effect', SA_ELEMENTOR_TEXTDOMAIN),
            'description' => __('Sets transition effect', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'slide',
            'options' => [
                'slide' => __('Slide', SA_ELEMENTOR_TEXTDOMAIN),
                'fade' => __('Fade', SA_ELEMENTOR_TEXTDOMAIN),
                'cube' => __('Cube', SA_ELEMENTOR_TEXTDOMAIN),
                'coverflow' => __('Coverflow', SA_ELEMENTOR_TEXTDOMAIN),
                'flip' => __('Flip', SA_ELEMENTOR_TEXTDOMAIN),
            ],
                ]
        );

        $this->add_responsive_control(
                'items', [
            'label' => __('Visible Items', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => ['size' => 1],
            'tablet_default' => ['size' => 1],
            'mobile_default' => ['size' => 1],
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 10,
                    'step' => 1,
                ],
            ],
            'size_units' => '',
                ]
        );

        $this->add_responsive_control(
                'margin', [
            'label' => __('Items Gap', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => ['size' => 10],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'size_units' => '',
                ]
        );

        $this->add_control(
                'slider_speed', [
            'label' => __('Slider Speed', SA_ELEMENTOR_TEXTDOMAIN),
            'description' => __('Duration of transition between slides (in ms)', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => ['size' => 1000],
            'range' => [
                'px' => [
                    'min' => 100,
                    'max' => 3000,
                    'step' => 1,
                ],
            ],
            'size_units' => '',
                ]
        );

        $this->add_control(
                'autoplay', [
            'label' => __('Autoplay', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
            'label_on' => __('Yes', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('No', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => 'yes',
                ]
        );

        $this->add_control(
                'autoplay_speed', [
            'label' => __('Autoplay Speed', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => ['size' => 2000],
            'range' => [
                'px' => [
                    'min' => 500,
                    'max' => 5000,
                    'step' => 1,
                ],
            ],
            'size_units' => '',
            'condition' => [
                'autoplay' => 'yes',
            ],
                ]
        );

        $this->add_control(
                'pause_on_hover', [
            'label' => __('Pause On Hover', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'default' => '',
            'label_on' => __('Yes', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('No', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => 'yes',
            'condition' => [
                'autoplay' => 'yes',
            ],
                ]
        );

        $this->add_control(
                'infinite_loop', [
            'label' => __('Infinite Loop', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
            'label_on' => __('Yes', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('No', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => 'yes',
                ]
        );

        $this->add_control(
                'grab_cursor', [
            'label' => __('Grab Cursor', SA_ELEMENTOR_TEXTDOMAIN),
            'description' => __('Shows grab cursor when you hover over the slider', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'default' => '',
            'label_on' => __('Show', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('Hide', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => 'yes',
                ]
        );

        $this->add_control(
                'navigation_heading', [
            'label' => __('Navigation', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
                ]
        );

        $this->add_control(
                'arrows', [
            'label' => __('Arrows', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
            'label_on' => __('Yes', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('No', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => 'yes',
                ]
        );

        $this->add_control(
                'dots', [
            'label' => __('Dots', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
            'label_on' => __('Yes', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('No', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => 'yes',
                ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
                'sa_el_section_testimonial_styles_general', [
            'label' => esc_html__('Testimonial Styles', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE
                ]
        );

        $this->add_control(
                'sa_el_testimonial_style', [
            'label' => __('Select Style', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'default-style',
            'options' => [
                'default-style' => __('Default', SA_ELEMENTOR_TEXTDOMAIN),
                'classic-style' => __('Classic', SA_ELEMENTOR_TEXTDOMAIN),
                'middle-style' => __('Content | Icon/Image | Bio', SA_ELEMENTOR_TEXTDOMAIN),
                'icon-img-left-content' => __('Icon/Image | Content', SA_ELEMENTOR_TEXTDOMAIN),
                'icon-img-right-content' => __('Content | Icon/Image', SA_ELEMENTOR_TEXTDOMAIN),
                'content-top-icon-title-inline' => __('Content Top | Icon Title Inline', SA_ELEMENTOR_TEXTDOMAIN),
                'content-bottom-icon-title-inline' => __('Content Bottom | Icon Title Inline', SA_ELEMENTOR_TEXTDOMAIN)
            ]
                ]
        );

        $this->add_control(
                'sa_el_testimonial_background', [
            'label' => esc_html__('Testimonial Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa-el-testimonial-item' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_testimonial_alignment', [
            'label' => esc_html__('Set Alignment', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::CHOOSE,
            'label_block' => true,
            'options' => [
                'sa-el-testimonial-align-default' => [
                    'title' => __('Default', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-ban',
                ],
                'sa-el-testimonial-align-left' => [
                    'title' => esc_html__('Left', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-align-left',
                ],
                'sa-el-testimonial-align-centered' => [
                    'title' => esc_html__('Center', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-align-center',
                ],
                'sa-el-testimonial-align-right' => [
                    'title' => esc_html__('Right', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-align-right',
                ],
            ],
            'default' => 'sa-el-testimonial-align-centered'
                ]
        );

        $this->add_control(
                'sa_el_testimonial_user_display_block', [
            'label' => esc_html__('Display User & Company Block?', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
                ]
        );


        $this->add_responsive_control(
                'sa_el_testimonial_margin', [
            'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
            'description' => 'Need to refresh the page to see the change properly',
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-testimonial-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_testimonial_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-testimonial-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_testimonial_border',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa-el-testimonial-item',
                ]
        );

        $this->add_control(
                'sa_el_testimonial_border_radius', [
            'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'selectors' => [
                '{{WRAPPER}} .sa-el-testimonial-item' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
            ],
                ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
                'sa_el_section_testimonial_image_styles', [
            'label' => esc_html__('Testimonial Image Style', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE
                ]
        );

        $this->add_responsive_control(
                'sa_el_testimonial_image_max_width', [
            'label' => esc_html__('Image Max Width', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 25,
                'unit' => '%',
            ],
            'range' => [
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                ],
            ],
            'size_units' => ['%', 'px'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-testimonial-image' => 'max-width:{{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_testimonial_image_width', [
            'label' => esc_html__('Image Width', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 150,
                'unit' => 'px',
            ],
            'range' => [
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                ],
            ],
            'size_units' => ['%', 'px'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-testimonial-image img' => 'width:{{SIZE}}{{UNIT}};',
            ],
                ]
        );


        $this->add_responsive_control(
                'sa_el_testimonial_image_margin', [
            'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-testimonial-image img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_testimonial_image_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-testimonial-image img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );


        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_testimonial_image_border',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa-el-testimonial-image img',
                ]
        );

        $this->add_control(
                'sa_el_testimonial_image_rounded', [
            'label' => esc_html__('Rounded Avatar?', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'return_value' => 'testimonial-avatar-rounded',
            'default' => '',
                ]
        );


        $this->add_control(
                'sa_el_testimonial_image_border_radius', [
            'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'selectors' => [
                '{{WRAPPER}} .sa-el-testimonial-image img' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
            ],
            'condition' => [
                'sa_el_testimonial_image_rounded!' => 'testimonial-avatar-rounded',
            ],
                ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
                'sa_el_section_testimonial_typography', [
            'label' => esc_html__('Color &amp; Typography', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE
                ]
        );

        $this->add_control(
                'sa_el_testimonial_name_heading', [
            'label' => __('User Name', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
                ]
        );

        $this->add_control(
                'sa_el_testimonial_name_color', [
            'label' => esc_html__('User Name Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#272727',
            'selectors' => [
                '{{WRAPPER}} .sa-el-testimonial-content .sa-el-testimonial-user' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_testimonial_name_typography',
            'selector' => '{{WRAPPER}} .sa-el-testimonial-content .sa-el-testimonial-user',
                ]
        );

        $this->add_control(
                'sa_el_testimonial_company_heading', [
            'label' => __('Company Name', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
                ]
        );


        $this->add_control(
                'sa_el_testimonial_company_color', [
            'label' => esc_html__('Company Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#272727',
            'selectors' => [
                '{{WRAPPER}} .sa-el-testimonial-content .sa-el-testimonial-user-company' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_testimonial_position_typography',
            'selector' => '{{WRAPPER}} .sa-el-testimonial-content .sa-el-testimonial-user-company',
                ]
        );

        $this->add_control(
                'sa_el_testimonial_description_heading', [
            'label' => __('Testimonial Text', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
                ]
        );

        $this->add_control(
                'sa_el_testimonial_description_color', [
            'label' => esc_html__('Testimonial Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#7a7a7a',
            'selectors' => [
                '{{WRAPPER}} .sa-el-testimonial-content .sa-el-testimonial-text' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_testimonial_description_typography',
            'selector' => '{{WRAPPER}} .sa-el-testimonial-content .sa-el-testimonial-text',
                ]
        );

        $this->add_control(
                'sa_el_testimonial_quotation_heading', [
            'label' => __('Quotation Mark', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
                ]
        );

        $this->add_control(
                'sa_el_testimonial_quotation_color', [
            'label' => esc_html__('Quotation Mark Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => 'rgba(0,0,0,0.15)',
            'selectors' => [
                '{{WRAPPER}} .sa-el-testimonial-quote' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_testimonial_quotation_typography',
            'selector' => '{{WRAPPER}} .sa-el-testimonial-quote',
                ]
        );


        $this->end_controls_section();

        /**
         * Style Tab: Arrows
         */
        $this->start_controls_section(
                'section_arrows_style', [
            'label' => __('Arrows', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'arrows' => 'yes',
            ],
                ]
        );

        $this->add_control(
                'arrow', [
            'label' => __('Choose Arrow', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'label_block' => true,
            'default' => 'fa fa-angle-right',
            'options' => [
                'fa fa-angle-right' => __('Angle', SA_ELEMENTOR_TEXTDOMAIN),
                'fa fa-angle-double-right' => __('Double Angle', SA_ELEMENTOR_TEXTDOMAIN),
                'fa fa-chevron-right' => __('Chevron', SA_ELEMENTOR_TEXTDOMAIN),
                'fa fa-chevron-circle-right' => __('Chevron Circle', SA_ELEMENTOR_TEXTDOMAIN),
                'fa fa-arrow-right' => __('Arrow', SA_ELEMENTOR_TEXTDOMAIN),
                'fa fa-long-arrow-right' => __('Long Arrow', SA_ELEMENTOR_TEXTDOMAIN),
                'fa fa-caret-right' => __('Caret', SA_ELEMENTOR_TEXTDOMAIN),
                'fa fa-caret-square-o-right' => __('Caret Square', SA_ELEMENTOR_TEXTDOMAIN),
                'fa fa-arrow-circle-right' => __('Arrow Circle', SA_ELEMENTOR_TEXTDOMAIN),
                'fa fa-arrow-circle-o-right' => __('Arrow Circle O', SA_ELEMENTOR_TEXTDOMAIN),
                'fa fa-toggle-right' => __('Toggle', SA_ELEMENTOR_TEXTDOMAIN),
                'fa fa-hand-o-right' => __('Hand', SA_ELEMENTOR_TEXTDOMAIN),
            ],
                ]
        );

        $this->add_responsive_control(
                'arrows_size', [
            'label' => __('Arrows Size', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => ['size' => '22'],
            'range' => [
                'px' => [
                    'min' => 15,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'size_units' => ['px'],
            'selectors' => [
                '{{WRAPPER}} .swiper-container-wrap .swiper-button-next, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'left_arrow_position', [
            'label' => __('Align Left Arrow', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => -100,
                    'max' => 40,
                    'step' => 1,
                ],
            ],
            'size_units' => ['px'],
            'selectors' => [
                '{{WRAPPER}} .swiper-container-wrap .swiper-button-prev' => 'left: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'right_arrow_position', [
            'label' => __('Align Right Arrow', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => -100,
                    'max' => 40,
                    'step' => 1,
                ],
            ],
            'size_units' => ['px'],
            'selectors' => [
                '{{WRAPPER}} .swiper-container-wrap .swiper-button-next' => 'right: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->start_controls_tabs('tabs_arrows_style');

        $this->start_controls_tab(
                'tab_arrows_normal', [
            'label' => __('Normal', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'arrows_bg_color_normal', [
            'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .swiper-container-wrap .swiper-button-next, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'arrows_color_normal', [
            'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .swiper-container-wrap .swiper-button-next, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'arrows_border_normal',
            'label' => __('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'placeholder' => '1px',
            'default' => '1px',
            'selector' => '{{WRAPPER}} .swiper-container-wrap .swiper-button-next, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev'
                ]
        );

        $this->add_control(
                'arrows_border_radius_normal', [
            'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .swiper-container-wrap .swiper-button-next, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
                'tab_arrows_hover', [
            'label' => __('Hover', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'arrows_bg_color_hover', [
            'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .swiper-container-wrap .swiper-button-next:hover, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev:hover' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'arrows_color_hover', [
            'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .swiper-container-wrap .swiper-button-next:hover, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev:hover' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'arrows_border_color_hover', [
            'label' => __('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .swiper-container-wrap .swiper-button-next:hover, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev:hover' => 'border-color: {{VALUE}};',
            ],
                ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control(
                'arrows_padding', [
            'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .swiper-container-wrap .swiper-button-next, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'separator' => 'before',
                ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Dots
         */
        $this->start_controls_section(
                'section_dots_style', [
            'label' => __('Dots', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'dots' => 'yes',
            ],
                ]
        );

        $this->add_control(
                'dots_position', [
            'label' => __('Position', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'options' => [
                'inside' => __('Inside', SA_ELEMENTOR_TEXTDOMAIN),
                'outside' => __('Outside', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'default' => 'outside',
                ]
        );

        $this->add_responsive_control(
                'dots_size', [
            'label' => __('Size', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 2,
                    'max' => 40,
                    'step' => 1,
                ],
            ],
            'size_units' => '',
            'selectors' => [
                '{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}',
            ],
                ]
        );

        $this->add_responsive_control(
                'dots_spacing', [
            'label' => __('Spacing', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 30,
                    'step' => 1,
                ],
            ],
            'size_units' => '',
            'selectors' => [
                '{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}}',
            ],
                ]
        );

        $this->start_controls_tabs('tabs_dots_style');

        $this->start_controls_tab(
                'tab_dots_normal', [
            'label' => __('Normal', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'dots_color_normal', [
            'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet' => 'background: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'active_dot_color_normal', [
            'label' => __('Active Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet-active' => 'background: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'dots_border_normal',
            'label' => __('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'placeholder' => '1px',
            'default' => '1px',
            'selector' => '{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet',
                ]
        );

        $this->add_control(
                'dots_border_radius_normal', [
            'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'dots_padding', [
            'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'allowed_dimensions' => 'vertical',
            'placeholder' => [
                'top' => '',
                'right' => 'auto',
                'bottom' => '',
                'left' => 'auto',
            ],
            'selectors' => [
                '{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullets' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
                'tab_dots_hover', [
            'label' => __('Hover', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'dots_color_hover', [
            'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet:hover' => 'background: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'dots_border_color_hover', [
            'label' => __('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet:hover' => 'border-color: {{VALUE}};',
            ],
                ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function _render_user_meta($item) {
        $settings = $this->get_settings();
        ob_start();
        ?>
        <p class="sa-el-testimonial-user" <?php if (!empty($settings['sa_el_testimonial_user_display_block'])) : ?> style="display: block; float: none;"<?php endif; ?>><?php echo esc_attr($item['sa_el_testimonial_name']); ?></p>
        <p class="sa-el-testimonial-user-company"><?php echo esc_attr($item['sa_el_testimonial_company_title']); ?></p>
        <?php
        echo ob_get_clean();
    }

    protected function _render_user_avatar($item) {
        if ($item['sa_el_testimonial_enable_avatar'] != 'yes')
            return;
        $settings = $this->get_settings();
        ob_start();
        ?>
        <div class="sa-el-testimonial-image">
        <?php if ('default-style' == $settings['sa_el_testimonial_style']) : ?>
                <span class="sa-el-testimonial-quote"></span>
        <?php endif; ?>
            <figure>
                <img src="<?php echo $item['sa_el_testimonial_image']['url']; ?>" alt="<?php echo esc_attr(get_post_meta($item['sa_el_testimonial_image']['id'], '_wp_attachment_image_alt', true)); ?>">
            </figure>
        </div>
        <?php
        echo ob_get_clean();
    }

    protected function _render_user_ratings($item) {
        if (empty($item['sa_el_testimonial_enable_rating']))
            return;
        ob_start();
        ?>
        <ul class="testimonial-star-rating">
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
            <li><i class="fa fa-star" aria-hidden="true"></i></li>
        </ul>
        <?php
        echo ob_get_clean();
    }

    protected function _render_user_description($item) {
        echo '<div class="sa-el-testimonial-text">' . wpautop($item["sa_el_testimonial_description"]) . '</div>';
    }

    protected function _render_quote() {
        echo '<span class="sa-el-testimonial-quote"></span>';
    }

    protected function render() {

        $settings = $this->get_settings_for_display();
        $testimonial_classes = $this->get_settings('sa_el_testimonial_image_rounded') . " " . $this->get_settings('sa_el_testimonial_alignment');
        $navigation_type = $this->get_settings('sa_el_testimonial_slider_navigation');

        $this->add_render_attribute('testimonial-slider-wrap', 'class', 'swiper-container-wrap');

        if ($settings['dots_position']) {
            $this->add_render_attribute('testimonial-slider-wrap', 'class', 'swiper-container-wrap-dots-' . $settings['dots_position']);
        }

        $this->add_render_attribute('testimonial-slider-wrap', [
            'class' => ['sa-el-testimonial-slider', $settings['sa_el_testimonial_style']],
            'id' => 'sa-el-testimonial-' . esc_attr($this->get_id()),
        ]);

        $this->add_render_attribute('testimonial-slider', [
            'class' => [
                'swiper-container',
                'sa-el-testimonial-slider-main',
                'swiper-container-' . esc_attr($this->get_id())
            ],
            'data-pagination' => '.swiper-pagination-' . esc_attr($this->get_id()),
            'data-arrow-next' => '.swiper-button-next-' . esc_attr($this->get_id()),
            'data-arrow-prev' => '.swiper-button-prev-' . esc_attr($this->get_id())
        ]);

        if (!empty($settings['items']['size'])) {
            $this->add_render_attribute('testimonial-slider', 'data-items', $settings['items']['size']);
        }

        if (!empty($settings['items_tablet']['size'])) {
            $this->add_render_attribute('testimonial-slider', 'data-items-tablet', $settings['items_tablet']['size']);
        }

        if (!empty($settings['items_mobile']['size'])) {
            $this->add_render_attribute('testimonial-slider', 'data-items-mobile', $settings['items_mobile']['size']);
        }

        if (!empty($settings['margin']['size'])) {
            $this->add_render_attribute('testimonial-slider', 'data-margin', $settings['margin']['size']);
        }

        if (!empty($settings['margin_tablet']['size'])) {
            $this->add_render_attribute('testimonial-slider', 'data-margin-tablet', $settings['margin_tablet']['size']);
        }

        if (!empty($settings['margin_mobile']['size'])) {
            $this->add_render_attribute('testimonial-slider', 'data-margin-mobile', $settings['margin_mobile']['size']);
        }

        if ($settings['carousel_effect']) {
            $this->add_render_attribute('testimonial-slider', 'data-effect', $settings['carousel_effect']);
        }

        if (!empty($settings['slider_speed']['size'])) {
            $this->add_render_attribute('testimonial-slider', 'data-speed', $settings['slider_speed']['size']);
        }

        if ($settings['infinite_loop'] == 'yes') {
            $this->add_render_attribute('testimonial-slider', 'data-loop', 1);
        }

        if ($settings['grab_cursor'] == 'yes') {
            $this->add_render_attribute('testimonial-slider', 'data-grab-cursor', 1);
        }

        if ($settings['arrows'] == 'yes') {
            $this->add_render_attribute('testimonial-slider', 'data-arrows', 1);
        }

        if ($settings['dots'] == 'yes') {
            $this->add_render_attribute('testimonial-slider', 'data-dots', 1);
        }

        if ($settings['autoplay'] == 'yes' && !empty($settings['autoplay_speed']['size'])) {
            $this->add_render_attribute('testimonial-slider', 'data-autoplay_speed', $settings['autoplay_speed']['size']);
        }

        if ($settings['pause_on_hover'] == 'yes') {
            $this->add_render_attribute('testimonial-slider', 'data-pause-on-hover', 'true');
        }
        ?>

        <div <?php echo $this->get_render_attribute_string('testimonial-slider-wrap'); ?>>
            <div <?php echo $this->get_render_attribute_string('testimonial-slider'); ?>>

                <div class="swiper-wrapper">
        <?php
        $i = 0;
        foreach ($settings['sa_el_testimonial_slider_item'] as $item) :
            $this->add_render_attribute('testimonial-content-wrapper' . $i, [
                'class' => ['sa-el-testimonial-content', $item['sa_el_testimonial_rating_number']],
                'style' => $item['sa_el_testimonial_enable_avatar'] == '' ? 'width: 100%;' : ''
            ]);

            $this->add_render_attribute('testimonial-slide' . $i, [
                'class' => ['sa-el-testimonial-item', 'clearfix', 'swiper-slide', $testimonial_classes]
            ]);
            ?>


            <?php if ('classic-style' == $settings['sa_el_testimonial_style']) { ?>
                            <div <?php echo $this->get_render_attribute_string('testimonial-slide' . $i); ?>>
                                <div <?php echo $this->get_render_attribute_string('testimonial-content-wrapper' . $i); ?>>
                <?php $this->_render_quote(); ?>
                                    <div class="testimonial-classic-style-content">
                <?php
                $this->_render_user_description($item);
                $this->_render_user_ratings($item);
                $this->_render_user_meta($item);
                ?>
                                    </div>
                <?php $this->_render_user_avatar($item); ?>
                                </div>
                            </div>
            <?php } ?>

            <?php if ('middle-style' == $settings['sa_el_testimonial_style']) { ?>
                            <div <?php echo $this->get_render_attribute_string('testimonial-slide' . $i); ?>>
                                <div <?php echo $this->get_render_attribute_string('testimonial-content-wrapper' . $i); ?>>
                <?php
                $this->_render_quote();
                $this->_render_user_description($item);
                ?>
                <?php $this->_render_user_avatar($item); ?>
                                    <div class="middle-style-content">
                <?php
                $this->_render_user_ratings($item);
                $this->_render_user_meta($item);
                ?>
                                    </div>
                                </div>
                            </div>
            <?php } ?>

            <?php if ('icon-img-left-content' == $settings['sa_el_testimonial_style']) { ?>
                            <div <?php echo $this->get_render_attribute_string('testimonial-slide' . $i); ?>>
                <?php $this->_render_user_avatar($item); ?>
                                <div <?php echo $this->get_render_attribute_string('testimonial-content-wrapper' . $i); ?>>
                <?php
                $this->_render_quote();
                $this->_render_user_description($item);
                $this->_render_user_ratings($item);
                $this->_render_user_meta($item);
                ?>
                                </div>
                            </div>
            <?php } ?>

            <?php if ('icon-img-right-content' == $settings['sa_el_testimonial_style']) { ?>
                            <div <?php echo $this->get_render_attribute_string('testimonial-slide' . $i); ?>>
                                <div <?php echo $this->get_render_attribute_string('testimonial-content-wrapper' . $i); ?>>
                <?php
                $this->_render_quote();
                $this->_render_user_description($item);
                $this->_render_user_ratings($item);
                $this->_render_user_meta($item);
                ?>
                                </div>
                <?php $this->_render_user_avatar($item); ?>
                            </div>
            <?php } ?>


            <?php if ('content-top-icon-title-inline' == $settings['sa_el_testimonial_style']) { ?>
                            <div <?php echo $this->get_render_attribute_string('testimonial-slide' . $i); ?>>
                                <div <?php echo $this->get_render_attribute_string('testimonial-content-wrapper' . $i); ?>>
                            <?php
                            $this->_render_quote();
                            $this->_render_user_description($item);
                            ?>
                                    <div class="testimonial-inline-style">
                            <?php
                            $this->_render_user_avatar($item);
                            $this->_render_user_meta($item);
                            $this->_render_user_ratings($item);
                            ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

            <?php if ('content-bottom-icon-title-inline' == $settings['sa_el_testimonial_style']) { ?>
                            <div <?php echo $this->get_render_attribute_string('testimonial-slide' . $i); ?>>
                                <div <?php echo $this->get_render_attribute_string('testimonial-content-wrapper' . $i); ?>>
                                    <div class="testimonial-inline-style">
                                        <?php
                                        $this->_render_user_avatar($item);
                                        $this->_render_user_meta($item);
                                        $this->_render_user_ratings($item);
                                        ?>
                                    </div>
                                    <?php
                                    $this->_render_quote();
                                    $this->_render_user_description($item);
                                    ?>
                                </div>
                            </div>
            <?php } ?>


                                <?php if ('default-style' == $settings['sa_el_testimonial_style']) { ?>
                            <div <?php echo $this->get_render_attribute_string('testimonial-slide' . $i); ?>>
                                    <?php $this->_render_user_avatar($item); ?>
                                <div <?php echo $this->get_render_attribute_string('testimonial-content-wrapper' . $i); ?>>
                                    <?php //$this->_render_quote(); ?>
                                    <div class="default-style-testimonial-content">
                                        <?php
                                        $this->_render_user_description($item);
                                        $this->_render_user_ratings($item);
                                        $this->_render_user_meta($item);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>


                            <?php $i++;
                        endforeach; ?>
                </div>
                            <?php
                            $this->render_dots();

                            $this->render_arrows();
                            ?>
            </div>
        </div>

                    <?php
                }

                /**
                 * Render logo carousel dots output on the frontend.
                 */
                protected function render_dots() {
                    $settings = $this->get_settings_for_display();

                    if ($settings['dots'] == 'yes') {
                        ?>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-<?php echo esc_attr($this->get_id()); ?>"></div>
                    <?php
                    }
                }

                /**
                 * Render logo carousel arrows output on the frontend.
                 */
                protected function render_arrows() {
                    $settings = $this->get_settings_for_display();

                    if ($settings['arrows'] == 'yes') {
                        ?>
                                    <?php
                                    if ($settings['arrow']) {
                                        $pa_next_arrow = $settings['arrow'];
                                        $pa_prev_arrow = str_replace("right", "left", $settings['arrow']);
                                    } else {
                                        $pa_next_arrow = 'fa fa-angle-right';
                                        $pa_prev_arrow = 'fa fa-angle-left';
                                    }
                                    ?>
            <!-- Add Arrows -->
            <div class="swiper-button-next swiper-button-next-<?php echo esc_attr($this->get_id()); ?>">
                <i class="<?php echo esc_attr($pa_next_arrow); ?>"></i>
            </div>
            <div class="swiper-button-prev swiper-button-prev-<?php echo esc_attr($this->get_id()); ?>">
                <i class="<?php echo esc_attr($pa_prev_arrow); ?>"></i>
            </div>
                                <?php
                                }
                            }

                            protected function content_template() {
                                
                            }

                        }
                        