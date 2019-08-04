<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Info_Box;

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Frontend;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size as Group_Control_Image_Size;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Utils as Utils;
use \Elementor\Widget_Base as Widget_Base;

class Info_Box extends Widget_Base
{

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function get_name()
    {
        return 'sa_el_info_box';
    }

    public function get_title()
    {
        return esc_html__('Info Box', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon()
    {
        return 'eicon-info-box  oxi-el-admin-icon';
    }

    public function get_categories()
    {
        return ['sa-el-addons'];
    }

    protected function _register_controls()
    {

        /**
         * Infobox Image Settings
         */
        $this->start_controls_section(
            'sa_el_section_infobox_content_settings',
            [
                'label' => esc_html__('Infobox Image', SA_ELEMENTOR_TEXTDOMAIN)
            ]
        );

        $this->add_control(
            'sa_el_infobox_img_type',
            [
                'label' => esc_html__('Infobox Type', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'img-on-top',
                'label_block' => false,
                'options' => [
                    'img-on-top' => esc_html__('Image/Icon On Top', SA_ELEMENTOR_TEXTDOMAIN),
                    'img-on-left' => esc_html__('Image/Icon On Left', SA_ELEMENTOR_TEXTDOMAIN),
                    'img-on-right' => esc_html__('Image/Icon On Right', SA_ELEMENTOR_TEXTDOMAIN),
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_el_infobox_content_alignment',
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
                'prefix_class' => 'sa_el_infobox_content_align_',
                'condition' => [
                    'sa_el_infobox_img_type' => 'img-on-top'
                ]
            ]
        );

        $this->add_responsive_control(
            'sa_el_infobox_img_or_icon',
            [
                'label' => esc_html__('Image or Icon', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => true,
                'options' => [
                    'none' => [
                        'title' => esc_html__('None', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'fa fa-ban',
                    ],
                    'number' => [
                        'title' => esc_html__('Number', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'fa fa-sort-numeric-desc',
                    ],
                    'icon' => [
                        'title' => esc_html__('Icon', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'fa fa-info-circle',
                    ],
                    'img' => [
                        'title' => esc_html__('Image', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'fa fa-picture-o',
                    ]
                ],
                'default' => 'icon',
            ]
        );

        $this->add_responsive_control(
            'icon_vertical_position',
            [
                'label' => __('Icon Position', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'top',
                'condition' => [
                    'sa_el_infobox_img_type!' => 'img-on-top'
                ],
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
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox .infobox_icon' => 'align-self: {{VALUE}};'
                ],
                'selectors_dictionary' => [
                    'top' => 'baseline',
                    'middle' => 'center',
                    'bottom' => 'flex-end',
                ],
            ]
        );

        /**
         * Condition: 'sa_el_infobox_img_or_icon' => 'img'
         */
        $this->add_control(
            'sa_el_infobox_image',
            [
                'label' => esc_html__('Infobox Image', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'sa_el_infobox_img_or_icon' => 'img'
                ]
            ]
        );


        /**
         * Condition: 'sa_el_infobox_img_or_icon' => 'icon'
         */
        $this->add_control(
            'sa_el_infobox_icon',
            [
                'label' => esc_html__('Icon', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::ICON,
                'default' => 'eicon-info-box',
                'condition' => [
                    'sa_el_infobox_img_or_icon' => 'icon'
                ]
            ]
        );

        /**
         * Condition: 'sa_el_infobox_img_or_icon' => 'number'
         */
        $this->add_control(
            'sa_el_infobox_number',
            [
                'label' => esc_html__('Number', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'condition' => [
                    'sa_el_infobox_img_or_icon' => 'number'
                ]
            ]
        );

        $this->end_controls_section();

        /**
         * Infobox Content
         */
        $this->start_controls_section(
            'sa_el_infobox_content',
            [
                'label' => esc_html__('Infobox Content', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );
        $this->add_control(
            'sa_el_infobox_title',
            [
                'label' => esc_html__('Infobox Title', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'dynamic' => [
                    'active' => true
                ],
                'default' => esc_html__('This is an info box', SA_ELEMENTOR_TEXTDOMAIN)
            ]
        );
        $this->add_control(
            'sa_el_show_infobox_content',
            [
                'label' => __('Show Content', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __('Show', SA_ELEMENTOR_TEXTDOMAIN),
                'label_off' => __('Hide', SA_ELEMENTOR_TEXTDOMAIN),
                'return_value' => 'yes',
            ]
        );
        $this->add_control(
            'sa_el_infobox_text_type',
            [
                'label' => __('Content Type', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'content' => __('Content', SA_ELEMENTOR_TEXTDOMAIN),
                    'template' => __('Saved Templates', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                'default' => 'content',
                'condition' => [
                    'sa_el_show_infobox_content' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'sa_el_primary_templates',
            [
                'label' => __('Choose Template', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'options' => $this->get_elementor_page_templates(),
                'condition' => [
                    'sa_el_infobox_text_type' => 'template',
                ],
            ]
        );
        $this->add_control(
            'sa_el_infobox_text',
            [
                'label' => esc_html__('Infobox Content', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::WYSIWYG,
                'label_block' => true,
                'dynamic' => [
                    'active' => true
                ],
                'default' => esc_html__('Write a short description, that will describe the title or something informational and useful.', SA_ELEMENTOR_TEXTDOMAIN),
                'condition' => [
                    'sa_el_infobox_text_type' => 'content',
                    'sa_el_show_infobox_content' => 'yes',
                ],
            ]
        );


        $this->end_controls_section();

        /**
         * ----------------------------------------------
         * Infobox Button
         * ----------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_infobox_button',
            [
                'label' => esc_html__('Link', SA_ELEMENTOR_TEXTDOMAIN)
            ]
        );

        $this->add_control(
            'sa_el_show_infobox_button',
            [
                'label' => __('Show Infobox Button', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', SA_ELEMENTOR_TEXTDOMAIN),
                'label_off' => __('No', SA_ELEMENTOR_TEXTDOMAIN),
                'condition' => [
                    'sa_el_show_infobox_clickable!' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'sa_el_show_infobox_clickable',
            [
                'label' => __('Infobox Clickable', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'label_on' => __('Yes', SA_ELEMENTOR_TEXTDOMAIN),
                'label_off' => __('No', SA_ELEMENTOR_TEXTDOMAIN),
                'return_value' => 'yes',
                'condition' => [
                    'sa_el_show_infobox_button!' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'sa_el_show_infobox_clickable_link',
            [
                'label' => esc_html__('Infobox Link', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => 'http://',
                    'is_external' => '',
                ],
                'show_external' => true,
                'condition' => [
                    'sa_el_show_infobox_clickable' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'infobox_button_text',
            [
                'label' => __('Button Text', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Click Me!',
                'separator' => 'before',
                'placeholder' => __('Enter button text', SA_ELEMENTOR_TEXTDOMAIN),
                'title' => __('Enter button text here', SA_ELEMENTOR_TEXTDOMAIN),
                'condition' => [
                    'sa_el_show_infobox_button' => 'yes'
                ]
            ]
        );

        $this->add_responsive_control(
            'sa_el_infobox_content_alignment_button',
            [
                'label' => esc_html__('Button Alignment', SA_ELEMENTOR_TEXTDOMAIN),
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
                    '{{WRAPPER}} .sa_el_infobox .infobox-button' => 'text-align: {{VALUE}};'
                ],
                'condition' => [
                    'sa_el_show_infobox_content!' => 'yes',
                    'sa_el_infobox_img_type!' => 'img-on-top'
                ]
            ]
        );

        $this->add_control(
            'infobox_button_link_url',
            [
                'label' => __('Link URL', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => __('Enter link URL for the button', SA_ELEMENTOR_TEXTDOMAIN),
                'show_external' => true,
                'default' => [
                    'url' => '#'
                ],
                'title' => __('Enter heading for the button', SA_ELEMENTOR_TEXTDOMAIN),
                'condition' => [
                    'sa_el_show_infobox_button' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'sa_el_infobox_button_icon',
            [
                'label' => esc_html__('Icon', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::ICON,
                'condition' => [
                    'sa_el_show_infobox_button' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'sa_el_infobox_button_icon_alignment',
            [
                'label' => esc_html__('Icon Position', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'left',
                'options' => [
                    'left' => esc_html__('Before', SA_ELEMENTOR_TEXTDOMAIN),
                    'right' => esc_html__('After', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                'condition' => [
                    'sa_el_infobox_button_icon!' => '',
                    'sa_el_show_infobox_button' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'sa_el_infobox_button_icon_indent',
            [
                'label' => esc_html__('Icon Spacing', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 60,
                    ],
                ],
                'condition' => [
                    'sa_el_infobox_button_icon!' => '',
                    'sa_el_show_infobox_button' => 'yes'
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox_button_icon_right' => 'margin-left: {{SIZE}}px;',
                    '{{WRAPPER}} .sa_el_infobox_button_icon_left' => 'margin-right: {{SIZE}}px;',
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
         * Tab Style (Info Box Image)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_infobox_imgae_style_settings',
            [
                'label' => esc_html__('Image Style', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'sa_el_infobox_img_or_icon' => 'img'
                ]
            ]
        );

        $this->start_controls_tabs('sa_el_infobox_image_style');

        $this->start_controls_tab(
            'sa_el_infobox_image_icon_normal',
            [
                'label' => __('Normal', SA_ELEMENTOR_TEXTDOMAIN)
            ]
        );

        $this->add_control(
            'sa_el_infobox_image_icon_bg_color',
            [
                'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox .infobox_icon img' => 'background-color: {{VALUE}};',
                ]
            ]
        );

        $this->add_responsive_control(
            'sa_el_infobox_image_icon_padding',
            [
                'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox .infobox_icon img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sa_el_infobox_image_border',
                'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .sa_el_infobox .infobox_icon img'
            ]
        );

        $this->add_control(
            'sa_el_infobox_img_shape',
            [
                'label' => esc_html__('Image Shape', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'square',
                'label_block' => false,
                'options' => [
                    'square' => esc_html__('Square', SA_ELEMENTOR_TEXTDOMAIN),
                    'circle' => esc_html__('Circle', SA_ELEMENTOR_TEXTDOMAIN),
                    'radius' => esc_html__('Radius', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                'prefix_class' => 'sa_el_infobox_shape_',
                'condition' => [
                    'sa_el_infobox_img_or_icon' => 'img'
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'sa_el_infobox_image_icon_hover',
            [
                'label' => __('Hover', SA_ELEMENTOR_TEXTDOMAIN)
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'sa_el_infobox_image_icon_hover_shadow',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox .infobox_icon:hover img' => 'background-color: {{VALUE}};',
                ]
            ]
        );

        $this->add_control(
            'sa_el_infobox_image_icon_hover_animation',
            [
                'label' => esc_html__('Animation', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HOVER_ANIMATION
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sa_el_infobox_hover_image_border',
                'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .sa_el_infobox:hover .infobox_icon img'
            ]
        );

        $this->add_control(
            'sa_el_infobox_hover_img_shape',
            [
                'label' => esc_html__('Image Shape', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'square',
                'label_block' => false,
                'options' => [
                    'square' => esc_html__('Square', SA_ELEMENTOR_TEXTDOMAIN),
                    'circle' => esc_html__('Circle', SA_ELEMENTOR_TEXTDOMAIN),
                    'radius' => esc_html__('Radius', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                'prefix_class' => 'sa_el_infobox-hover-img-shape-',
                'condition' => [
                    'sa_el_infobox_img_or_icon' => 'img'
                ]
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
            'sa_el_infobox_image_resizer',
            [
                'label' => esc_html__('Image Resizer', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 100
                ],
                'range' => [
                    'px' => [
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox .infobox_icon img' => 'width: {{SIZE}}px;',
                    '{{WRAPPER}} .sa_el_infobox.icon-on-left .infobox_icon' => 'width: {{SIZE}}px;',
                    '{{WRAPPER}} .sa_el_infobox.icon-on-right .infobox_icon' => 'width: {{SIZE}}px;',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'full',
                'condition' => [
                    'sa_el_infobox_image[url]!' => '',
                ],
                'condition' => [
                    'sa_el_infobox_img_or_icon' => 'img',
                ]
            ]
        );

        $this->add_responsive_control(
            'sa_el_infobox_img_margin',
            [
                'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox .infobox_icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


        /**
         * -------------------------------------------
         * Tab Style (Info Box Number Icon Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_infobox_number_icon_style_settings',
            [
                'label' => esc_html__('Number Icon Style', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'sa_el_infobox_img_or_icon' => 'number'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_el_infobox_number_icon_typography',
                'selector' => '{{WRAPPER}} .sa_el_infobox .infobox_icon .infobox_icon_number',
            ]
        );

        $this->add_responsive_control(
            'sa_el_infobox_number_icon_bg_size',
            [
                'label' => __('Icon Background Size', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 90,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox .infobox_icon .infobox_icon_wrap' => 'width: {{SIZE}}px; height: {{SIZE}}px;',
                ],
                'condition' => [
                    'sa_el_infobox_icon_bg_shape!' => 'none'
                ]
            ]
        );

        $this->add_responsive_control(
            'sa_el_infobox_number_icon_margin',
            [
                'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox .infobox_icon_wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('sa_el_infobox_numbericon_style_controls');

        $this->start_controls_tab(
            'sa_el_infobox_number_icon_normal',
            [
                'label' => esc_html__('Normal', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'sa_el_infobox_number_icon_color',
            [
                'label' => esc_html__('Icon Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#A57DFA',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox .infobox_icon .infobox_icon_number' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .sa_el_infobox.icon_beside_title .infobox_content .title figure .infobox_icon_number' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_infobox_number_icon_bg_color',
            [
                'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox .infobox_icon .infobox_icon_wrap' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'sa_el_infobox_icon_bg_shape!' => 'none',
                ]
            ]
        );

        $this->add_control(
            'sa_el_infobox_number_icon_bg_shape',
            [
                'label' => esc_html__('Background Shape', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'none',
                'label_block' => false,
                'options' => [
                    'none' => esc_html__('None', SA_ELEMENTOR_TEXTDOMAIN),
                    'circle' => esc_html__('Circle', SA_ELEMENTOR_TEXTDOMAIN),
                    'radius' => esc_html__('Radius', SA_ELEMENTOR_TEXTDOMAIN),
                    'square' => esc_html__('Square', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                'prefix_class' => 'sa_el_infobox_icon_bg_shape_'
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sa_el_infobox_number_icon_border',
                'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .sa_el_infobox .infobox_icon_wrap'
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'sa_el_infobox_number_icon_shadow',
                'selector' => '{{WRAPPER}} .sa_el_infobox .infobox_icon_wrap',
            ]
        );

        $this->end_controls_tab();


        $this->start_controls_tab(
            'sa_el_infobox_number_icon_hover',
            [
                'label' => esc_html__('Hover', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'sa_el_infobox_number_icon_hover_animation',
            [
                'label' => esc_html__('Animation', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HOVER_ANIMATION
            ]
        );

        $this->add_control(
            'sa_el_infobox_number_icon_hover_color',
            [
                'label' => esc_html__('Icon Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#4d4d4d',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox:hover .infobox_icon .infobox_icon_number' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .sa_el_infobox.icon_beside_title:hover .infobox_content .title figure .infobox_icon_number' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_infobox_number_icon_hover_bg_color',
            [
                'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox:hover .infobox_icon .infobox_icon_wrap' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'sa_el_infobox_img_type!' => ['img-on-left', 'img-on-right'],
                    'sa_el_infobox_icon_bg_shape!' => 'none',
                ]
            ]
        );

        $this->add_control(
            'sa_el_infobox_number_icon_hover_bg_shape',
            [
                'label' => esc_html__('Background Shape', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'none',
                'label_block' => false,
                'options' => [
                    'none' => esc_html__('None', SA_ELEMENTOR_TEXTDOMAIN),
                    'circle' => esc_html__('Circle', SA_ELEMENTOR_TEXTDOMAIN),
                    'radius' => esc_html__('Radius', SA_ELEMENTOR_TEXTDOMAIN),
                    'square' => esc_html__('Square', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                'prefix_class' => 'sa_el_infobox_icon_hover_bg_shape_',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sa_el_infobox_hover_number_icon_border',
                'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .sa_el_infobox:hover .infobox_icon_wrap'
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'sa_el_infobox_number_icon_hover_shadow',
                'selector' => '{{WRAPPER}} .sa_el_infobox:hover .infobox_icon_wrap',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Info Box Icon Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_infobox_icon_style_settings',
            [
                'label' => esc_html__('Icon Style', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'sa_el_infobox_img_or_icon' => 'icon'
                ]
            ]
        );

        $this->add_responsive_control(
            'sa_el_infobox_icon_size',
            [
                'label' => __('Icon Size', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 40,
                ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 100,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox .infobox_icon i' => 'font-size: {{SIZE}}px;',
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_el_infobox_icon_bg_size',
            [
                'label' => __('Icon Background Size', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 90,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox .infobox_icon .infobox_icon_wrap' => 'width: {{SIZE}}px; height: {{SIZE}}px;',
                ],
                'condition' => [
                    'sa_el_infobox_icon_bg_shape!' => 'none'
                ]
            ]
        );

        $this->add_responsive_control(
            'sa_el_infobox_icon_margin',
            [
                'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox .infobox_icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('sa_el_infobox_icon_style_controls');

        $this->start_controls_tab(
            'sa_el_infobox_icon_normal',
            [
                'label' => esc_html__('Normal', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'sa_el_infobox_icon_color',
            [
                'label' => esc_html__('Icon Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#A57DFA',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox .infobox_icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .sa_el_infobox.icon_beside_title .infobox_content .title figure i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_infobox_icon_bg_shape',
            [
                'label' => esc_html__('Background Shape', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'none',
                'label_block' => false,
                'options' => [
                    'none' => esc_html__('None', SA_ELEMENTOR_TEXTDOMAIN),
                    'circle' => esc_html__('Circle', SA_ELEMENTOR_TEXTDOMAIN),
                    'radius' => esc_html__('Radius', SA_ELEMENTOR_TEXTDOMAIN),
                    'square' => esc_html__('Square', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                'prefix_class' => 'sa_el_infobox_icon_bg_shape_'
            ]
        );

        $this->add_control(
            'sa_el_infobox_icon_bg_color',
            [
                'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox .infobox_icon .infobox_icon_wrap' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'sa_el_infobox_icon_bg_shape!' => 'none',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sa_el_infobox_icon_border',
                'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .sa_el_infobox .infobox_icon_wrap'
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'sa_el_infobox_icon_shadow',
                'selector' => '{{WRAPPER}} .sa_el_infobox .infobox_icon_wrap',
            ]
        );

        $this->end_controls_tab();


        $this->start_controls_tab(
            'sa_el_infobox_icon_hover',
            [
                'label' => esc_html__('Hover', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'sa_el_infobox_icon_hover_animation',
            [
                'label' => esc_html__('Animation', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HOVER_ANIMATION
            ]
        );

        $this->add_control(
            'sa_el_infobox_icon_hover_color',
            [
                'label' => esc_html__('Icon Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#A57DFA',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox:hover .infobox_icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .sa_el_infobox.icon_beside_title:hover .infobox_content .title figure i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_infobox_icon_hover_bg_color',
            [
                'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox:hover .infobox_icon .infobox_icon_wrap' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'sa_el_infobox_img_type!' => ['img-on-left', 'img-on-right'],
                    'sa_el_infobox_icon_bg_shape!' => 'none',
                ]
            ]
        );

        $this->add_control(
            'sa_el_infobox_icon_hover_bg_shape',
            [
                'label' => esc_html__('Background Shape', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'none',
                'label_block' => false,
                'options' => [
                    'none' => esc_html__('None', SA_ELEMENTOR_TEXTDOMAIN),
                    'circle' => esc_html__('Circle', SA_ELEMENTOR_TEXTDOMAIN),
                    'radius' => esc_html__('Radius', SA_ELEMENTOR_TEXTDOMAIN),
                    'square' => esc_html__('Square', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                'prefix_class' => 'sa_el_infobox_icon_hover_bg_shape_',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sa_el_infobox_hover_icon_border',
                'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .sa_el_infobox:hover .infobox_icon_wrap'
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'sa_el_infobox_icon_hover_shadow',
                'selector' => '{{WRAPPER}} .sa_el_infobox:hover .infobox_icon_wrap',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style ( Info Box Button Style )
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_infobox_button_settings',
            [
                'label' => esc_html__('Button Styles', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'sa_el_show_infobox_button' => 'yes'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_el_infobox_button_typography',
                'selector' => '{{WRAPPER}} .sa_el_infobox .infobox-button a.sa_el_infobox_button',
            ]
        );

        $this->add_responsive_control(
            'sa_el_creative_button_padding',
            [
                'label' => esc_html__('Button Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox .infobox-button a.sa_el_infobox_button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_infobox_button_border_radius',
            [
                'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox .infobox-button a.sa_el_infobox_button' => 'border-radius: {{SIZE}}px;'
                ],
            ]
        );

        $this->start_controls_tabs('infobox_button_styles_controls_tabs');

        $this->start_controls_tab('infobox_button_normal', [
            'label' => esc_html__('Normal', SA_ELEMENTOR_TEXTDOMAIN)
        ]);

        $this->add_control(
            'sa_el_infobox_button_text_color',
            [
                'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox .sa_el_infobox_button' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'sa_el_infobox_button_background_color',
            [
                'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#6E13EF',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox .sa_el_infobox_button' => 'background: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sa_el_infobox_button_border',
                'selector' => '{{WRAPPER}} .sa_el_infobox .sa_el_infobox_button',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .sa_el_infobox .sa_el_infobox_button',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab('infobox_button_hover', [
            'label' => esc_html__('Hover', SA_ELEMENTOR_TEXTDOMAIN)
        ]);

        $this->add_control(
            'sa_el_infobox_button_hover_text_color',
            [
                'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox .sa_el_infobox_button:hover' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'sa_el_infobox_button_hover_background_color',
            [
                'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#6E13EF',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox .sa_el_infobox_button:hover' => 'background: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sa_el_infobox_button_hover_border',
                'selector' => '{{WRAPPER}} .sa_el_infobox .sa_el_infobox_button:hover',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_hover_box_shadow',
                'selector' => '{{WRAPPER}} .sa_el_infobox .sa_el_infobox_button:hover',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();



        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Info Box Title Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_infobox_title_style_settings',
            [
                'label' => esc_html__('Color &amp; Typography', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->start_controls_tabs('infobox_content_hover_style_tab');

        $this->start_controls_tab('infobox_content_normal_style', [
            'label' => esc_html__('Normal', SA_ELEMENTOR_TEXTDOMAIN)
        ]);

        $this->add_control(
            'sa_el_infobox_title_heading',
            [
                'label' => esc_html__('Title Style', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'sa_el_infobox_title_color',
            [
                'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#212121',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox .infobox_content .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_el_infobox_title_typography',
                'selector' => '{{WRAPPER}} .sa_el_infobox .infobox_content .title',
            ]
        );

        $this->add_responsive_control(
            'sa_el_infobox_title_margin',
            [
                'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox .infobox_content .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'sa_el_infobox_content_heading',
            [
                'label' => esc_html__('Content Style', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'sa_el_infobox_content_margin',
            [
                'label' => esc_html__('Content Only Margin', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox .infobox_content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_infobox_content_background',
            [
                'label' => esc_html__('Content Only Background', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox .infobox_content' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_el_infobox_content_only_padding',
            [
                'label' => esc_html__('Content Only Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'default' => ['50'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox .infobox_content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_infobox_content_color',
            [
                'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#4d4d4d',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox .infobox_content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_el_infobox_content_typography_hover',
                'selector' => '{{WRAPPER}} .sa_el_infobox .infobox_content p',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab('infobox_content_hover_style', [
            'label' => esc_html__('Hover', SA_ELEMENTOR_TEXTDOMAIN)
        ]);

        $this->add_control(
            'sa_el_infobox_title_hover_color',
            [
                'label' => esc_html__('Title Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox:hover .infobox_content h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_infobox_content_hover_color',
            [
                'label' => esc_html__('Content Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox:hover .infobox_content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_infobox_content_transition',
            [
                'label' => esc_html__('Transition', SA_ELEMENTOR_TEXTDOMAIN),
                'description' => esc_html__('Transition will applied to ms (ex: 300ms).', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::NUMBER,
                'separator' => 'before',
                'min' => 100,
                'max' => 1000,
                'default' => 100,
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox:hover .infobox_content h4' => 'transition: {{SIZE}}ms;',
                    '{{WRAPPER}} .sa_el_infobox:hover .infobox_content p' => 'transition: {{SIZE}}ms;'
                ]
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style',
            [
                'label' => esc_html__('Info Box Advanced', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_ADVANCED,
                'name' => 'advanced',
            ]
        );  // \Elementor\Controls_Manager::TAB_ADVANCED

        $this->add_responsive_control(
            '_margin',
            [
                'label' => __('', 'elementor'),
                'name' => '_margin',
            ]
        );

        $this->add_responsive_control(
            'sa_el_infobox_container_padding',
            [
                'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_infobox' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * This function is responsible for rendering divs and contents
     * for infobox before partial.
     * 
     * @param	$settings
     */
    protected function sa_el_infobox_before($settings)
    {

        $this->add_render_attribute('sa_el_infobox_inner', 'class', 'sa_el_infobox');

        if ('img-on-left' == $settings['sa_el_infobox_img_type'])
            $this->add_render_attribute('sa_el_infobox_inner', 'class', 'icon-on-left');

        if ('img-on-right' == $settings['sa_el_infobox_img_type'])
            $this->add_render_attribute('sa_el_infobox_inner', 'class', 'icon-on-right');

        $target = $settings['sa_el_show_infobox_clickable_link']['is_external'] ? 'target="_blank"' : '';
        $nofollow = $settings['sa_el_show_infobox_clickable_link']['nofollow'] ? 'rel="nofollow"' : '';

        ob_start();
        ?>
        <?php if ('yes' == $settings['sa_el_show_infobox_clickable']) : ?><a href="<?php echo esc_url($settings['sa_el_show_infobox_clickable_link']['url']) ?>" <?php echo $target; ?> <?php echo $nofollow; ?>><?php endif; ?>
            <div <?php echo $this->get_render_attribute_string('sa_el_infobox_inner'); ?>>
                <?php
                echo ob_get_clean();
            }

            /**
             * This function is rendering closing divs and tags
             * of before partial for infobox.
             * 
             * @param	$settings
             */
            protected function sa_el_infobox_after($settings)
            {
                ob_start();
                ?></div><?php if ('yes' == $settings['sa_el_show_infobox_clickable']) : ?></a>
        <?php
        endif;
        echo ob_get_clean();
    }

    /**
     * This function is rendering appropriate icon for infobox.
     * 
     * @param $settings
     */
    protected function render_infobox_icon($settings)
    {

        if ('none' == $settings['sa_el_infobox_img_or_icon'])
            return;

        $infobox_image = $this->get_settings('sa_el_infobox_image');
        $infobox_image_url = Group_Control_Image_Size::get_attachment_image_src($infobox_image['id'], 'thumbnail', $settings);
        if (empty($infobox_image_url)) : $infobox_image_url = $infobox_image['url'];
        else : $infobox_image_url = $infobox_image_url;
        endif;

        $this->add_render_attribute(
            'infobox_icon',
            [
                'class' => ['infobox_icon']
            ]
        );

        if ($settings['sa_el_infobox_icon_hover_animation']) {
            $this->add_render_attribute('infobox_icon', 'class', 'elementor-animation-' . $settings['sa_el_infobox_icon_hover_animation']);
        }

        if ($settings['sa_el_infobox_image_icon_hover_animation']) {
            $this->add_render_attribute('infobox_icon', 'class', 'elementor-animation-' . $settings['sa_el_infobox_image_icon_hover_animation']);
        }

        if ($settings['sa_el_infobox_number_icon_hover_animation']) {
            $this->add_render_attribute('infobox_icon', 'class', 'elementor-animation-' . $settings['sa_el_infobox_number_icon_hover_animation']);
        }

        if ('icon' == $settings['sa_el_infobox_img_or_icon']) {
            $this->add_render_attribute('infobox_icon', 'class', 'sa_el_icon_only');
        }

        ob_start();
        ?>
        <div <?php echo $this->get_render_attribute_string('infobox_icon'); ?>>

            <?php if ('img' == $settings['sa_el_infobox_img_or_icon']) : ?>
                <img src="<?php echo esc_url($infobox_image_url); ?>" alt="<?php echo esc_attr(get_post_meta($infobox_image['id'], '_wp_attachment_image_alt', true)); ?>">
            <?php endif; ?>

            <?php if ('icon' == $settings['sa_el_infobox_img_or_icon']) : ?>
                <div class="infobox_icon_wrap">
                    <i class="<?php echo esc_attr($settings['sa_el_infobox_icon']); ?>"></i>
                </div>
            <?php endif; ?>

            <?php if ('number' == $settings['sa_el_infobox_img_or_icon']) : ?>
                <div class="infobox_icon_wrap">
                    <span class="infobox_icon_number"><?php echo esc_attr($settings['sa_el_infobox_number']); ?></span>
                </div>
            <?php endif; ?>

        </div>
        <?php
        echo ob_get_clean();
    }

    protected function render_infobox_content($settings)
    {

        $this->add_render_attribute('infobox_content', 'class', 'infobox_content');
        if ('icon' == $settings['sa_el_infobox_img_or_icon'])
            $this->add_render_attribute('infobox_content', 'class', 'sa_el_icon_only');

        ob_start();
        ?>
        <div <?php echo $this->get_render_attribute_string('infobox_content'); ?>>
            <h4 class="title"><?php echo $settings['sa_el_infobox_title']; ?></h4>
            <?php if ('yes' != $settings['sa_el_show_infobox_content']) : $this->render_infobox_button($this->get_settings_for_display()); ?>
            <?php endif; ?>
            <?php if ('yes' == $settings['sa_el_show_infobox_content']) : ?>
                <?php if ('content' === $settings['sa_el_infobox_text_type']) : ?>
                    <?php if (!empty($settings['sa_el_infobox_text'])) : ?>
                        <p><?php echo $settings['sa_el_infobox_text']; ?></p>
                    <?php endif; ?>

                    <?php $this->render_infobox_button($this->get_settings_for_display()); ?>
                <?php
                elseif ('template' === $settings['sa_el_infobox_text_type']) :
                    if (!empty($settings['sa_el_primary_templates'])) {
                        $sa_el_template_id = $settings['sa_el_primary_templates'];
                        $sa_el_frontend = new Frontend;

                        echo $sa_el_frontend->get_builder_content($sa_el_template_id, true);
                    }
                endif;
                ?>
            <?php endif; ?>
        </div>
        <?php
        echo ob_get_clean();
    }

    /**
     * This function rendering infobox button
     * 
     * @param $settings
     */
    protected function render_infobox_button($settings)
    {
        if ('yes' == $settings['sa_el_show_infobox_clickable'] || 'yes' != $settings['sa_el_show_infobox_button'])
            return;

        $this->add_render_attribute('infobox_button', 'class', 'sa_el_infobox_button');

        if ($settings['infobox_button_link_url']['url'])
            $this->add_render_attribute('infobox_button', 'href', esc_url($settings['infobox_button_link_url']['url']));

        if ('on' == $settings['infobox_button_link_url']['is_external'])
            $this->add_render_attribute('infobox_button', 'target', '_blank');

        if ('on' == $settings['infobox_button_link_url']['nofollow'])
            $this->add_render_attribute('infobox_button', 'rel', 'nofollow');

        $this->add_render_attribute('button_icon', [
            'class' => esc_attr($settings['sa_el_infobox_button_icon']),
            'aria-hidden' => 'true'
        ]);

        if ('left' == $settings['sa_el_infobox_button_icon_alignment'])
            $this->add_render_attribute('button_icon', 'class', 'sa_el_infobox_button_icon_left');

        if ('right' == $settings['sa_el_infobox_button_icon_alignment'])
            $this->add_render_attribute('button_icon', 'class', 'sa_el_infobox_button_icon_right');

        ob_start();
        ?>
        <div class="infobox-button">
            <a <?php echo $this->get_render_attribute_string('infobox_button'); ?>>
                <?php if ('left' == $settings['sa_el_infobox_button_icon_alignment']) : ?><i <?php echo $this->get_render_attribute_string('button_icon'); ?>></i><?php endif; ?>
                <?php echo esc_attr($settings['infobox_button_text']); ?>
                <?php if ('right' == $settings['sa_el_infobox_button_icon_alignment']) : ?><i <?php echo $this->get_render_attribute_string('button_icon'); ?>></i><?php endif; ?>
            </a>
        </div>
        <?php
        echo ob_get_clean();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $this->sa_el_infobox_before($settings);
        $this->render_infobox_icon($settings);
        $this->render_infobox_content($settings);
        $this->sa_el_infobox_after($settings);
    }

    protected function content_template()
    { }
}
