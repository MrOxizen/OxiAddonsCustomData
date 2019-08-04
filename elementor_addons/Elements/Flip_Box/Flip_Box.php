<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Flip_Box;

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size as Group_Control_Image_Size;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Modules\DynamicTags\Module as TagsModule;
use \Elementor\Utils as Utils;
use \Elementor\Widget_Base as Widget_Base;

class Flip_Box extends Widget_Base
{

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function get_name()
    {
        return 'sa_el_flip_box';
    }

    public function get_title()
    {
        return esc_html__('Flip Box', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon()
    {
        return 'eicon-flip-box  oxi-el-admin-icon';
    }

    public function get_categories()
    {
        return ['sa-el-addons'];
    }

    protected function _register_controls()
    {

        /**
         * Flipbox Image Settings
         */
        $this->start_controls_section(
            'sa_el_section_flipbox_content_settings',
            [
                'label' => esc_html__('Flipbox Settings', SA_ELEMENTOR_TEXTDOMAIN)
            ]
        );

        $this->add_control(
            'sa_el_flipbox_type',
            [
                'label' => esc_html__('Flipbox Type', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'animate_left',
                'label_block' => false,
                'options' => [
                    'animate_left' => esc_html__('Flip Left', SA_ELEMENTOR_TEXTDOMAIN),
                    'animate_right' => esc_html__('Flip Right', SA_ELEMENTOR_TEXTDOMAIN),
                    'animate_up' => esc_html__('Flip Top', SA_ELEMENTOR_TEXTDOMAIN),
                    'animate_down' => esc_html__('Flip Bottom', SA_ELEMENTOR_TEXTDOMAIN),
                    'animate_zoom_in' => esc_html__('Zoom In', SA_ELEMENTOR_TEXTDOMAIN),
                    'animate_zoom_out' => esc_html__('Zoom Out', SA_ELEMENTOR_TEXTDOMAIN),
                ],
            ]
        );

        $this->start_controls_tabs('icon_image_front_back');

        $this->start_controls_tab(
            'front',
            [
                'label' => __('Front', SA_ELEMENTOR_TEXTDOMAIN)
            ]
        );

        $this->add_control(
            'sa_el_flipbox_img_or_icon',
            [
                'label' => esc_html__('Icon Type', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'none' => __('None', SA_ELEMENTOR_TEXTDOMAIN),
                    'img' => __('Image', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => __('Icon', SA_ELEMENTOR_TEXTDOMAIN)
                ],
                'default' => 'icon',
            ]
        );

        $this->add_control(
            'sa_el_flipbox_image',
            [
                'label' => esc_html__('Flipbox Image', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'sa_el_flipbox_img_or_icon' => 'img'
                ]
            ]
        );

        $this->add_control(
            'sa_el_flipbox_icon',
            [
                'label' => esc_html__('Icon', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => $this->Sa_El_Icon_Type(),
                'default' => $this->Sa_El_Default_Icon('far fa-snowflake', 'fa-solid', 'fa fa-snowflake-o'),
                'condition' => [
                    'sa_el_flipbox_img_or_icon' => 'icon'
                ]
            ]
        );

        $this->add_responsive_control(
            'sa_el_flipbox_image_resizer',
            [
                'label' => esc_html__('Image Resizer', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => '100'
                ],
                'range' => [
                    'px' => [
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_elements_flip_box_front_container .sa_el_elements_flip_box_icon_image > img' => 'width: {{SIZE}}px;'
                ],
                'condition' => [
                    'sa_el_flipbox_img_or_icon' => 'img'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'full',
                'condition' => [
                    'sa_el_flipbox_image[url]!' => '',
                    'sa_el_flipbox_img_or_icon' => 'img'
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'back',
            [
                'label' => __('Back', SA_ELEMENTOR_TEXTDOMAIN)
            ]
        );

        $this->add_control(
            'sa_el_flipbox_img_or_icon_back',
            [
                'label' => esc_html__('Icon Type', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'none' => __('None', SA_ELEMENTOR_TEXTDOMAIN),
                    'img' => __('Image', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => __('Icon', SA_ELEMENTOR_TEXTDOMAIN)
                ],
                'default' => 'icon'
            ]
        );

        $this->add_control(
            'sa_el_flipbox_image_back',
            [
                'label' => esc_html__('Flipbox Image', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'sa_el_flipbox_img_or_icon_back' => 'img'
                ]
            ]
        );

        $this->add_control(
            'sa_el_flipbox_icon_back',
            [
                'label' => esc_html__('Icon', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => $this->Sa_El_Icon_Type(),
                'default' => $this->Sa_El_Default_Icon('far fa-snowflake', 'fa-solid', 'fa fa-snowflake-o'),
                'condition' => [
                    'sa_el_flipbox_img_or_icon_back' => 'icon'
                ]
            ]
        );

        $this->add_responsive_control(
            'sa_el_flipbox_image_resizer_back',
            [
                'label' => esc_html__('Image Resizer', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => '100'
                ],
                'range' => [
                    'px' => [
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_elements_flip_box_rear_container .sa_el_elements_flip_box_icon_image > img' => 'width: {{SIZE}}px;'
                ],
                'condition' => [
                    'sa_el_flipbox_img_or_icon_back' => 'img'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail_back',
                'default' => 'full',
                'condition' => [
                    'sa_el_flipbox_image[url]!' => '',
                    'sa_el_flipbox_img_or_icon_back' => 'img'
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /**
         * Flipbox Content
         */
        $this->start_controls_section(
            'sa_el_flipbox_content',
            [
                'label' => esc_html__('Flipbox Content', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->start_controls_tabs('sa_el_flipbox_content_tabs');

        $this->start_controls_tab(
            'sa_el_flipbox_content_front',
            [
                'label' => __('Front', SA_ELEMENTOR_TEXTDOMAIN)
            ]
        );

        $this->add_control(
            'sa_el_flipbox_front_title',
            [
                'label' => esc_html__('Front Title', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('Your Front Title', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'sa_el_flipbox_front_text',
            [
                'label' => esc_html__('Front Text', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::WYSIWYG,
                'label_block' => true,
                'default' => __('This is front side content.', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->end_controls_tab();


        $this->start_controls_tab(
            'sa_el_flipbox_content_back',
            [
                'label' => __('Back', SA_ELEMENTOR_TEXTDOMAIN)
            ]
        );

        $this->add_control(
            'sa_el_flipbox_back_title',
            [
                'label' => esc_html__('Back Title', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('Your Back Title', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'sa_el_flipbox_back_text',
            [
                'label' => esc_html__('Back Text', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::WYSIWYG,
                'label_block' => true,
                'default' => __('This is back side content.', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
            'sa_el_flipbox_content_alignment',
            [
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
                ],
                'default' => 'center',
                'prefix_class' => 'sa_el_flipbox_content_align_',
            ]
        );

        $this->end_controls_section();

        /**
         * ----------------------------------------------
         * Flipbox Link
         * ----------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_flixbox_link_section',
            [
                'label' => esc_html__('Link', SA_ELEMENTOR_TEXTDOMAIN)
            ]
        );

        $this->add_control(
            'flipbox_link_type',
            [
                'label' => __('Link Type', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none' => __('None', SA_ELEMENTOR_TEXTDOMAIN),
                    'box' => __('Box', SA_ELEMENTOR_TEXTDOMAIN),
                    'title' => __('Title', SA_ELEMENTOR_TEXTDOMAIN),
                    'button' => __('Button', SA_ELEMENTOR_TEXTDOMAIN),
                ],
            ]
        );

        $this->add_control(
            'flipbox_link',
            [
                'label' => __('Link', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                    'categories' => [
                        TagsModule::POST_META_CATEGORY,
                        TagsModule::URL_CATEGORY
                    ],
                ],
                'placeholder' => 'https://www.your-link.com',
                'default' => [
                    'url' => '#',
                ],
                'condition' => [
                    'flipbox_link_type!' => 'none',
                ],
            ]
        );

        $this->add_control(
            'flipbox_button_text',
            [
                'label' => __('Button Text', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __('Get Started', SA_ELEMENTOR_TEXTDOMAIN),
                'condition' => [
                    'flipbox_link_type' => 'button',
                ],
            ]
        );

        $this->add_control(
            'button_icon',
            [
                'label' => __('Button Icon', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => $this->Sa_El_Icon_Type(),
                'default' => '',
                'condition' => [
                    'flipbox_link_type' => 'button',
                ],
            ]
        );

        $this->add_control(
            'button_icon_position',
            [
                'label' => __('Icon Position', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'after',
                'options' => [
                    'after' => __('After', SA_ELEMENTOR_TEXTDOMAIN),
                    'before' => __('Before', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                'condition' => [
                    'flipbox_link_type' => 'button',
                    'button_icon!' => '',
                ],
            ]
        );

        $this->end_controls_section();
        if (!apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', ['', '', TRUE])) {
            $this->start_controls_section(
                'sa_el_section_pro',
                [
                    'label' => __('Go Premium for More Features', SA_ELEMENTOR_TEXTDOMAIN)
                ]
            );

            $this->add_control(
                'sa_el_control_get_pro',
                [
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
         * Tab Style (Flipbox Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_flipbox_style_settings',
            [
                'label' => esc_html__('Filp Box Style', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'sa_el_flipbox_front_bg_color',
            [
                'label' => esc_html__('Front Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#270887',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_elements_flip_box_front_container' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_flipbox_back_bg_color',
            [
                'label' => esc_html__('Back Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#db5959',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_elements_flip_box_rear_container' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_el_flipbox_front_back_padding',
            [
                'label' => esc_html__('Content Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_elements_flip_box_front_container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .sa_el_elements_flip_box_rear_container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sa_el_filbpox_border',
                'label' => esc_html__('Border Style', SA_ELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .sa_el_elements_flip_box_front_container, {{WRAPPER}} .sa_el_elements_flip_box_rear_container',
            ]
        );

        $this->add_control(
            'sa_el_flipbox_border_radius',
            [
                'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'step' => 1,
                        'max' => 500,
                    ],
                    '%' => [
                        'min' => 0,
                        'step' => 3,
                        'max' => 100
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_elements_flip_box_front_container' => 'border-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .sa_el_elements_flip_box_rear_container' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'sa_el_flipbox_shadow',
                'selector' => '{{WRAPPER}} .sa_el_elements_flip_box_front_container, {{WRAPPER}} .sa_el_elements_flip_box_rear_container'
            ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Flip Box Image)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_flipbox_imgae_style_settings',
            [
                'label' => esc_html__('Image Style', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'sa_el_flipbox_img_or_icon' => 'img'
                ]
            ]
        );

        $this->add_control(
            'sa_el_flipbox_img_type',
            [
                'label' => esc_html__('Image Type', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'default',
                'label_block' => false,
                'options' => [
                    'circle' => esc_html__('Circle', SA_ELEMENTOR_TEXTDOMAIN),
                    'radius' => esc_html__('Radius', SA_ELEMENTOR_TEXTDOMAIN),
                    'default' => esc_html__('Default', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                'prefix_class' => 'sa_el_flipbox_img_',
                'condition' => [
                    'sa_el_flipbox_img_or_icon' => 'img'
                ]
            ]
        );

        /**
         * Condition: 'sa_el_flipbox_img_type' => 'radius'
         */
        $this->add_control(
            'sa_el_filpbox_img_border_radius',
            [
                'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_elements_flip_box_icon_image img' => 'border-radius: {{SIZE}}px;',
                    '{{WRAPPER}} .sa_el_elements_flip_box_icon_image img' => 'border-radius: {{SIZE}}px;',
                ],
                'condition' => [
                    'sa_el_flipbox_img_or_icon' => 'img',
                    'sa_el_flipbox_img_type' => 'radius'
                ]
            ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Flip Box Icon Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_flipbox_icon_style_settings',
            [
                'label' => esc_html__('Icon Style', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'sa_el_flipbox_img_or_icon' => 'icon'
                ]
            ]
        );

        $this->start_controls_tabs('sa_el_section_icon_style_settings');
        $this->start_controls_tab('sa_el_section_icon_front_style_settings', [
            'label' => esc_html__('Front', SA_ELEMENTOR_TEXTDOMAIN)
        ]);

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sa_el_flipbox_icon_front_border',
                'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .sa_el_elements_flip_box_front_container .sa_el_elements_flip_box_icon_image',
                'condition' => [
                    'sa_el_flipbox_img_or_icon' => 'icon'
                ]
            ]
        );

        $this->add_responsive_control(
            'sa_el_flipbox_icon_front_padding',
            [
                'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_elements_flip_box_front_container .sa_el_elements_flip_box_icon_image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );

        $this->add_control(
            'sa_el_flipbox_icon_front_border_radius',
            [
                'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'step' => 1,
                        'max' => 500,
                    ],
                    '%' => [
                        'min' => 0,
                        'step' => 3,
                        'max' => 100
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_elements_flip_box_front_container .sa_el_elements_flip_box_icon_image' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'sa_el_flipbox_img_or_icon' => 'icon'
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab('sa_el_section_icon_back_style_settings', [
            'label' => esc_html__('Back', SA_ELEMENTOR_TEXTDOMAIN)
        ]);

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sa_el_flipbox_icon_back_border',
                'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .sa_el_elements_flip_box_rear_container .sa_el_elements_flip_box_icon_image',
                'condition' => [
                    'sa_el_flipbox_img_or_icon' => 'icon'
                ]
            ]
        );

        $this->add_responsive_control(
            'sa_el_flipbox_icon_back_padding',
            [
                'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_elements_flip_box_rear_container .sa_el_elements_flip_box_icon_image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );

        $this->add_control(
            'sa_el_flipbox_icon_back_border_radius',
            [
                'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'step' => 1,
                        'max' => 500,
                    ],
                    '%' => [
                        'min' => 0,
                        'step' => 3,
                        'max' => 100
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_elements_flip_box_rear_container .sa_el_elements_flip_box_icon_image' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'sa_el_flipbox_img_or_icon' => 'icon'
                ]
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Flip Box Title Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_flipbox_title_style_settings',
            [
                'label' => esc_html__('Color &amp; Typography', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->start_controls_tabs('sa_el_section_flipbox_typo_style_settings');
        $this->start_controls_tab('sa_el_section_flipbox_typo_style_front_settings', [
            'label' => esc_html__('Front', SA_ELEMENTOR_TEXTDOMAIN)
        ]);

        /**
         * Icon
         */
        $this->add_control(
            'sa_el_flipbox_front_icon_heading',
            [
                'label' => esc_html__('Icon Style', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'sa_el_flipbox_front_icon_color',
            [
                'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_elements_flip_box_front_container .sa_el_elements_flip_box_icon_image i' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_el_flipbox_front_icon_typography',
                'selector' => '{{WRAPPER}} .sa_el_elements_flip_box_front_container .sa_el_elements_flip_box_icon_image i',
            ]
        );

        /**
         * Title
         */
        $this->add_control(
            'sa_el_flipbox_front_title_heading',
            [
                'label' => esc_html__('Title Style', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'sa_el_flipbox_front_title_color',
            [
                'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_elements_flip_box_front_container .sa_el_elements_flip_box_heading' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_el_flipbox_front_title_typography',
                'selector' => '{{WRAPPER}} .sa_el_elements_flip_box_front_container .sa_el_elements_flip_box_heading'
            ]
        );

        /**
         * Content
         */
        $this->add_control(
            'sa_el_flipbox_front_content_heading',
            [
                'label' => esc_html__('Content Style', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'sa_el_flipbox_front_content_color',
            [
                'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_elements_flip_box_front_container .sa_el_elements_flip_box_content' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_el_flipbox_front_content_typography',
                'selector' => '{{WRAPPER}} .sa_el_elements_flip_box_front_container .sa_el_elements_flip_box_content'
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab('sa_el_section_flipbox_typo_style_back_settings', [
            'label' => esc_html__('Back', SA_ELEMENTOR_TEXTDOMAIN)
        ]);

        /**
         * Icon
         */
        $this->add_control(
            'sa_el_flipbox_back_icon_heading',
            [
                'label' => esc_html__('Icon Style', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'sa_el_flipbox_back_icon_color',
            [
                'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_elements_flip_box_rear_container .sa_el_elements_flip_box_icon_image i' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_el_flipbox_back_icon_typography',
                'selector' => '{{WRAPPER}} .sa_el_elements_flip_box_rear_container .sa_el_elements_flip_box_icon_image i'
            ]
        );

        /**
         * Title
         */
        $this->add_control(
            'sa_el_flipbox_back_title_heading',
            [
                'label' => esc_html__('Title Style', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'sa_el_flipbox_back_title_color',
            [
                'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_elements_flip_box_rear_container .sa_el_elements_flip_box_heading' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_el_flipbox_back_title_typography',
                'selector' => '{{WRAPPER}} .sa_el_elements_flip_box_rear_container .sa_el_elements_flip_box_heading'
            ]
        );

        /**
         * Content
         */
        $this->add_control(
            'sa_el_flipbox_back_content_heading',
            [
                'label' => esc_html__('Content Style', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'sa_el_flipbox_back_content_color',
            [
                'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_elements_flip_box_rear_container .sa_el_elements_flip_box_content' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_el_flipbox_back_content_typography',
                'selector' => '{{WRAPPER}} .sa_el_elements_flip_box_rear_container .sa_el_elements_flip_box_content'
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Flip Box Button Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_flipbox_button_style_settings',
            [
                'label' => esc_html__('Button Style', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'flipbox_link_type' => 'button'
                ]
            ]
        );

        $this->start_controls_tabs('flipbox_button_style_settings');

        $this->start_controls_tab(
            'flipbox_button_normal_style',
            [
                'label' => __('Normal', SA_ELEMENTOR_TEXTDOMAIN)
            ]
        );
        $this->add_responsive_control(
            'sa_el_flipbox_button_margin',
            [
                'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_elements_flip_box_container .sa_el_flipbox_button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_el_flipbox_button_padding',
            [
                'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_elements_flip_box_container .sa_el_flipbox_button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );

        $this->add_control(
            'sa_el_flipbox_button_color',
            [
                'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_elements_flip_box_container .sa_el_flipbox_button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_flipbox_button_bg_color',
            [
                'label' => esc_html__('Background', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_elements_flip_box_container .sa_el_flipbox_button' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_flipbox_button_border_radius',
            [
                'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'step' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_elements_flip_box_container .sa_el_flipbox_button' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_el_flipbox_button_typography',
                'selector' => '{{WRAPPER}} .sa_el_elements_flip_box_container .sa_el_flipbox_button'
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'flipbox_button_hover_style',
            [
                'label' => __('Hover', SA_ELEMENTOR_TEXTDOMAIN)
            ]
        );
        $this->add_control(
            'sa_el_flipbox_button_hover_color',
            [
                'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_elements_flip_box_container .sa_el_flipbox_button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_flipbox_button_hover_bg_color',
            [
                'label' => esc_html__('Background', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_elements_flip_box_container .sa_el_flipbox_button:hover' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings();
        $flipbox_image = $this->get_settings('sa_el_flipbox_image');
        $flipbox_image_url = Group_Control_Image_Size::get_attachment_image_src($flipbox_image['id'], 'thumbnail', $settings);
        (empty($flipbox_image_url)) ? $flipbox_image_url = $flipbox_image['url'] : $flipbox_image_url = $flipbox_image_url;

        $flipbox_if_html_tag = 'div';
        $flipbox_if_html_title_tag = 'div';
        $this->add_render_attribute('flipbox-container', 'class', 'sa_el_elements_flip_box_flip_card');
        $this->add_render_attribute('flipbox-title-container', 'class', 'sa_el_elements_flip_box_heading');

        if ($settings['flipbox_link_type'] != 'none') {
            if (!empty($settings['flipbox_link']['url'])) {
                if ($settings['flipbox_link_type'] == 'box') {
                    $flipbox_if_html_tag = 'a';

                    $this->add_render_attribute('flipbox-container', 'href', esc_url($settings['flipbox_link']['url']));

                    if ($settings['flipbox_link']['is_external']) {
                        $this->add_render_attribute('flipbox-container', 'target', '_blank');
                    }

                    if ($settings['flipbox_link']['nofollow']) {
                        $this->add_render_attribute('flipbox-container', 'rel', 'nofollow');
                    }
                } elseif ($settings['flipbox_link_type'] == 'title') {
                    $flipbox_if_html_title_tag = 'a';

                    $this->add_render_attribute(
                        'flipbox-title-container',
                        [
                            'class' => 'flipbox-linked-title',
                            'href' => $settings['flipbox_link']['url']
                        ]
                    );

                    if ($settings['flipbox_link']['is_external']) {
                        $this->add_render_attribute('flipbox-title-container', 'target', '_blank');
                    }

                    if ($settings['flipbox_link']['nofollow']) {
                        $this->add_render_attribute('flipbox-title-container', 'rel', 'nofollow');
                    }
                } elseif ($settings['flipbox_link_type'] == 'button') {
                    $this->add_render_attribute(
                        'sa_el_flipbox_button_container',
                        [
                            'class' => 'sa_el_flipbox_button',
                            'href' => $settings['flipbox_link']['url']
                        ]
                    );

                    if ($settings['flipbox_link']['is_external']) {
                        $this->add_render_attribute('sa_el_flipbox_button_container', 'target', '_blank');
                    }

                    if ($settings['flipbox_link']['nofollow']) {
                        $this->add_render_attribute('sa_el_flipbox_button_container', 'rel', 'nofollow');
                    }
                }
            }
        }


        $flipbox_image_back = $this->get_settings('sa_el_flipbox_image_back');
        $flipbox_back_image_url = Group_Control_Image_Size::get_attachment_image_src($flipbox_image_back['id'], 'thumbnail_back', $settings);
        $flipbox_back_image_url = empty($flipbox_back_image_url) ? $flipbox_image_back['url'] : $flipbox_back_image_url;

        if ($settings['sa_el_flipbox_img_or_icon_back'] != 'none') {
            if ('img' == $settings['sa_el_flipbox_img_or_icon_back']) {
                $this->add_render_attribute(
                    'flipbox-back-icon-image-container',
                    [
                        'src' => $flipbox_back_image_url,
                        'alt' => esc_attr(get_post_meta($flipbox_image_back['id'], '_wp_attachment_image_alt', true))
                    ]
                );
            } elseif ('icon' == $settings['sa_el_flipbox_img_or_icon_back']) {
                $this->add_render_attribute(
                    'flipbox-back-icon-container',
                    [
                        'class' => $settings['sa_el_flipbox_icon_back'],
                        'aria-hidden' => 'true'
                    ]
                );
            }
        }

        $this->add_render_attribute(
            'sa_el_flipbox_main_wrap',
            [
                'class' => [
                    'sa_el_elements_flip_box_container',
                    'sa_el_animate_flip',
                    'sa_el_' . esc_attr($settings['sa_el_flipbox_type'])
                ]
            ]
        );
        ?>

        <div <?php echo $this->get_render_attribute_string('sa_el_flipbox_main_wrap'); ?>>

            <<?php echo $flipbox_if_html_tag, ' ', $this->get_render_attribute_string('flipbox-container'); ?>>
                <div class="sa_el_elements_flip_box_front_container">
                    <div class="sa_el_elements_slider_display_table">
                        <div class="sa_el_elements_flip_box_vertical_align">
                            <div class="sa_el_elements_flip_box_padding">
                                <div class="sa_el_elements_flip_box_icon_image">
                                    <?php if ('icon' === $settings['sa_el_flipbox_img_or_icon']) : echo $this->Sa_El_Icon_Render($settings['sa_el_flipbox_icon']); ?>
                                    <?php elseif ('img' === $settings['sa_el_flipbox_img_or_icon']) : ?>
                                        <img src="<?php echo esc_url($flipbox_image_url); ?>" alt="<?php echo esc_attr(get_post_meta($flipbox_image['id'], '_wp_attachment_image_alt', true)); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="sa_el_elements_flip_box_heading"><?php echo esc_html__($settings['sa_el_flipbox_front_title'], SA_ELEMENTOR_TEXTDOMAIN); ?></div>
                                <div class="sa_el_elements_flip_box_content">
                                    <p><?php echo __($settings['sa_el_flipbox_front_text'], SA_ELEMENTOR_TEXTDOMAIN); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sa_el_elements_flip_box_rear_container">
                    <div class="sa_el_elements_slider_display_table">
                        <div class="sa_el_elements_flip_box_vertical_align">
                            <div class="sa_el_elements_flip_box_padding">
                                <?php if ('none' != $settings['sa_el_flipbox_img_or_icon_back']) : ?>
                                    <div class="sa_el_elements_flip_box_icon_image">
                                        <?php if ('img' == $settings['sa_el_flipbox_img_or_icon_back']) : ?>
                                            <img <?php echo $this->get_render_attribute_string('flipbox-back-icon-image-container'); ?>>
                                        <?php elseif ('icon' == $settings['sa_el_flipbox_img_or_icon_back']) : ?>
                                        <?php echo $this->Sa_El_Icon_Render($settings['sa_el_flipbox_icon_back'])?> 
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <<?php echo $flipbox_if_html_title_tag, ' ', $this->get_render_attribute_string('flipbox-title-container'); ?>><?php echo esc_html__($settings['sa_el_flipbox_back_title'], SA_ELEMENTOR_TEXTDOMAIN); ?></<?php echo $flipbox_if_html_title_tag; ?>>
                                <div class="sa_el_elements_flip_box_content">
                                    <p><?php echo __($settings['sa_el_flipbox_back_text'], SA_ELEMENTOR_TEXTDOMAIN); ?></p>
                                </div>

                                <?php if ($settings['flipbox_link_type'] == 'button' && !empty($settings['flipbox_button_text'])) : ?>
                                    <a <?php echo $this->get_render_attribute_string('sa_el_flipbox_button_container'); ?>>
                                        <?php if (!empty($settings['button_icon']) && 'before' == $settings['button_icon_position']) : echo $this->Sa_El_Icon_Render($settings['button_icon'])?>
                                        <?php endif; ?>
                                        <?php echo esc_attr($settings['flipbox_button_text']); ?>
                                        <?php if (!empty($settings['button_icon']) && 'after' == $settings['button_icon_position']) : echo $this->Sa_El_Icon_Render($settings['button_icon'])?>
                                        <?php endif; ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </<?php echo $flipbox_if_html_tag; ?>>
        </div>

    <?php
    }

    protected function content_template()
    { }
}
