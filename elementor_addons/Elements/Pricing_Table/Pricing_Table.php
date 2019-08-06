<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Pricing_Table;

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

use \Elementor\Utils;
use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size as Group_Control_Image_Size;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Widget_Base as Widget_Base;

class Pricing_Table extends Widget_Base
{

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function get_name()
    {
        return 'sa_el_pricing_table';
    }

    public function get_title()
    {
        return esc_html__('Pricing Table', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon()
    {
        return 'eicon-price-table oxi-el-admin-icon';
    }

    public function get_categories()
    {
        return ['sa-el-addons'];
    }

    protected function _register_controls()
    {

        /**
         * Pricing Table Settings
         */
        $this->start_controls_section(
            'sa_el_section_pricing_table_settings',
            [
                'label' => esc_html__('Settings', SA_ELEMENTOR_TEXTDOMAIN)
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_style',
            [
                'label' => esc_html__('Pricing Style', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'style-1',
                'label_block' => false,
                'options' => [
                    'style-1' => esc_html__('Default', SA_ELEMENTOR_TEXTDOMAIN),
                    'style-2' => esc_html__('Pricing Style 2', SA_ELEMENTOR_TEXTDOMAIN),
                    'style-3' => esc_html__('Pricing Style 3 ' . apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('Pro Only', 'data', FALSE)), SA_ELEMENTOR_TEXTDOMAIN),
                    'style-4' => esc_html__('Pricing Style 4 ' . apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('Pro Only', 'data', FALSE)), SA_ELEMENTOR_TEXTDOMAIN),
                ],
            ]
        );


        /**
         * Condition: 'sa_el_pricing_table_featured' => 'yes'
         */
        $this->add_control(
            'sa_el_pricing_table_icon_enabled',
            [
                'label' => esc_html__('List Icon', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'show',
                'default' => 'show',
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_title',
            [
                'label' => esc_html__('Title', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => esc_html__('Basic Plan', SA_ELEMENTOR_TEXTDOMAIN)
            ]
        );

        /**
         * Condition: 'sa_el_pricing_table_style' => 'style-2'
         */
        $this->add_control(
            'sa_el_pricing_table_sub_title',
            [
                'label' => esc_html__('Sub Title', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => esc_html__('A tagline here.', SA_ELEMENTOR_TEXTDOMAIN),
                'condition' => [
                    'sa_el_pricing_table_style' => 'style-2',
                ]
            ]
        );

        /**
         * Condition: 'sa_el_pricing_table_style' => 'style-2'
         */
        $this->add_control(
            'sa_el_pricing_table_style_2_icon',
            [
                'label' => esc_html__('Icon', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::ICON,
                'default' => 'fa fa-home',
                'condition' => [
                    'sa_el_pricing_table_style' => 'style-2'
                ]
            ]
        );
        /**
         * Condition: 'sa_el_pricing_table_style' => 'style-4'
         */
        if (apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('', '', TRUE))) {

            $this->add_control(
                'sa_el_pricing_table_style_4_image',
                [
                    'label' => esc_html__('Header Image', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .sa-el-pricing-image' => 'background-image: url({{URL}});',
                    ],
                    'condition' => [
                        'sa_el_pricing_table_style' => 'style-4'
                    ]
                ]
            );
        }


        $this->end_controls_section();

        /**
         * Pricing Table Price
         */
        $this->start_controls_section(
            'sa_el_section_pricing_table_price',
            [
                'label' => esc_html__('Price', SA_ELEMENTOR_TEXTDOMAIN)
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_price',
            [
                'label' => esc_html__('Price', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => esc_html__('99', SA_ELEMENTOR_TEXTDOMAIN)
            ]
        );
        $this->add_control(
            'sa_el_pricing_table_onsale',
            [
                'label' => __('On Sale?', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'label_on' => __('Yes', SA_ELEMENTOR_TEXTDOMAIN),
                'label_off' => __('No', SA_ELEMENTOR_TEXTDOMAIN),
                'return_value' => 'yes',
            ]
        );
        $this->add_control(
            'sa_el_pricing_table_onsale_price',
            [
                'label' => esc_html__('Sale Price', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => esc_html__('89', SA_ELEMENTOR_TEXTDOMAIN),
                'condition' => [
                    'sa_el_pricing_table_onsale' => 'yes'
                ]
            ]
        );
        $this->add_control(
            'sa_el_pricing_table_price_cur',
            [
                'label' => esc_html__('Price Currency', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => esc_html__('$', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_price_cur_placement',
            [
                'label' => esc_html__('Currency Placement', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'left',
                'label_block' => false,
                'options' => [
                    'left' => esc_html__('Left', SA_ELEMENTOR_TEXTDOMAIN),
                    'right' => esc_html__('Right', SA_ELEMENTOR_TEXTDOMAIN),
                ],
            ]
        );
        /**
         * Condition: 'sa_el_pricing_table_style' => 'style-3'
         */
        $this->add_control(
            'sa_el_pricing_table_style_3_price_position',
            [
                'label' => esc_html__('Pricing Position', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'bottom',
                'label_block' => false,
                'options' => [
                    'top' => esc_html__('On Top', SA_ELEMENTOR_TEXTDOMAIN),
                    'bottom' => esc_html__('At Bottom', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                'condition' => [
                    'sa_el_pricing_table_style' => 'style-3'
                ]
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_price_period',
            [
                'label' => esc_html__('Price Period (per)', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => esc_html__('month', SA_ELEMENTOR_TEXTDOMAIN)
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_period_separator',
            [
                'label' => esc_html__('Period Separator', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => esc_html__('/', SA_ELEMENTOR_TEXTDOMAIN)
            ]
        );

        $this->end_controls_section();

        /**
         * Pricing Table Feature
         */
        $this->start_controls_section(
            'sa_el_section_pricing_table_feature',
            [
                'label' => esc_html__('Feature', SA_ELEMENTOR_TEXTDOMAIN)
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_items',
            [
                'type' => Controls_Manager::REPEATER,
                'seperator' => 'before',
                'default' => [
                    ['sa_el_pricing_table_item' => 'Unlimited calls'],
                    ['sa_el_pricing_table_item' => 'Free hosting'],
                    ['sa_el_pricing_table_item' => '500 MB of storage space'],
                    ['sa_el_pricing_table_item' => '500 MB Bandwidth'],
                    ['sa_el_pricing_table_item' => '24/7 support']
                ],
                'fields' => [
                    [
                        'name' => 'sa_el_pricing_table_item',
                        'label' => esc_html__('List Item', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__('Pricing table list item', SA_ELEMENTOR_TEXTDOMAIN)
                    ],
                    [
                        'name' => 'sa_el_pricing_table_list_icon',
                        'label' => esc_html__('List Icon', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::ICON,
                        'label_block' => false,
                        'default' => 'fa fa-check',
                    ],
                    [
                        'name' => 'sa_el_pricing_table_icon_mood',
                        'label' => esc_html__('Item Active?', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::SWITCHER,
                        'return_value' => 'yes',
                        'default' => 'yes'
                    ],
                    [
                        'name' => 'sa_el_pricing_table_list_icon_color',
                        'label' => esc_html__('Icon Color', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::COLOR,
                        'default' => '#00C853',
                    ],
                    [
                        'name' => 'sa_el_pricing_item_tooltip',
                        'label' => esc_html__('Enable Tooltip?', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::SWITCHER,
                        'return_value' => 'yes',
                        'default' => false
                    ],
                    [
                        'name' => 'sa_el_pricing_item_tooltip_content',
                        'label' => esc_html__('Tooltip Content', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __("I'm a awesome tooltip!!", SA_ELEMENTOR_TEXTDOMAIN),
                        'condition' => [
                            'sa_el_pricing_item_tooltip' => 'yes'
                        ]
                    ],
                    [
                        'name' => 'sa_el_pricing_item_tooltip_side',
                        'label' => esc_html__('Tooltip Side', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::CHOOSE,
                        'options' => [
                            'left' => [
                                'title' => __('Left', SA_ELEMENTOR_TEXTDOMAIN),
                                'icon' => 'eicon-h-align-left',
                            ],
                            'top' => [
                                'title' => __('Top', SA_ELEMENTOR_TEXTDOMAIN),
                                'icon' => 'eicon-v-align-top',
                            ],
                            'right' => [
                                'title' => __('Right', SA_ELEMENTOR_TEXTDOMAIN),
                                'icon' => 'eicon-h-align-right',
                            ],
                            'bottom' => [
                                'title' => __('Bottom', SA_ELEMENTOR_TEXTDOMAIN),
                                'icon' => 'eicon-v-align-bottom',
                            ],
                        ],
                        'default' => 'top',
                        'condition' => [
                            'sa_el_pricing_item_tooltip' => 'yes'
                        ]
                    ],
                    [
                        'name' => 'sa_el_pricing_item_tooltip_trigger',
                        'label' => esc_html__('Tooltip Trigger', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::SELECT2,
                        'options' => [
                            'hover' => __('Hover', SA_ELEMENTOR_TEXTDOMAIN),
                            'click' => __('Click', SA_ELEMENTOR_TEXTDOMAIN),
                        ],
                        'default' => 'hover',
                        'condition' => [
                            'sa_el_pricing_item_tooltip' => 'yes'
                        ]
                    ],
                    [
                        'name' => 'sa_el_pricing_item_tooltip_animation',
                        'label' => esc_html__('Tooltip Animation', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::SELECT2,
                        'options' => [
                            'fade' => __('Fade', SA_ELEMENTOR_TEXTDOMAIN),
                            'grow' => __('Grow', SA_ELEMENTOR_TEXTDOMAIN),
                            'swing' => __('Swing', SA_ELEMENTOR_TEXTDOMAIN),
                            'slide' => __('Slide', SA_ELEMENTOR_TEXTDOMAIN),
                            'fall' => __('Fall', SA_ELEMENTOR_TEXTDOMAIN),
                        ],
                        'default' => 'fade',
                        'condition' => [
                            'sa_el_pricing_item_tooltip' => 'yes'
                        ]
                    ],
                    [
                        'name' => 'pricing_item_tooltip_animation_duration',
                        'label' => esc_html__('Animation Duration', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::TEXT,
                        'default' => 300,
                        'condition' => [
                            'sa_el_pricing_item_tooltip' => 'yes'
                        ]
                    ],
                    [
                        'name' => 'sa_el_pricing_table_toolip_arrow',
                        'label' => esc_html__('Tooltip Arrow', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::SWITCHER,
                        'return_value' => 'yes',
                        'default' => 'yes',
                        'condition' => [
                            'sa_el_pricing_item_tooltip' => 'yes'
                        ]
                    ],
                    [
                        'name' => 'sa_el_pricing_item_tooltip_theme',
                        'label' => esc_html__('Tooltip Theme', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::SELECT2,
                        'options' => [
                            'default' => __('Default', SA_ELEMENTOR_TEXTDOMAIN),
                            'noir' => __('Noir', SA_ELEMENTOR_TEXTDOMAIN),
                            'light' => __('Light', SA_ELEMENTOR_TEXTDOMAIN),
                            'punk' => __('Punk', SA_ELEMENTOR_TEXTDOMAIN),
                            'shadow' => __('Shadow', SA_ELEMENTOR_TEXTDOMAIN),
                            'borderless' => __('Borderless', SA_ELEMENTOR_TEXTDOMAIN),
                        ],
                        'default' => 'noir',
                        'condition' => [
                            'sa_el_pricing_item_tooltip' => 'yes'
                        ]
                    ],
                ],
                'title_field' => '{{sa_el_pricing_table_item}}',
            ]
        );

        $this->end_controls_section();

        /**
         * Pricing Table Footer
         */
        $this->start_controls_section(
            'sa_el_section_pricing_table_footerr',
            [
                'label' => esc_html__('Footer', SA_ELEMENTOR_TEXTDOMAIN)
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_button_icon',
            [
                'label' => esc_html__('Button Icon', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::ICON,
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_button_icon_alignment',
            [
                'label' => esc_html__('Icon Position', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'left',
                'options' => [
                    'left' => esc_html__('Before', SA_ELEMENTOR_TEXTDOMAIN),
                    'right' => esc_html__('After', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                'condition' => [
                    'sa_el_pricing_table_button_icon!' => '',
                ],
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_button_icon_indent',
            [
                'label' => esc_html__('Icon Spacing', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 60,
                    ],
                ],
                'condition' => [
                    'sa_el_pricing_table_button_icon!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing-button i.fa-icon-left' => 'margin-right: {{SIZE}}px;',
                    '{{WRAPPER}} .sa-el-pricing-button i.fa-icon-right' => 'margin-left: {{SIZE}}px;',
                ],
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_btn',
            [
                'label' => esc_html__('Button Text', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('Choose Plan', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_btn_link',
            [
                'label' => esc_html__('Button Link', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => '',
                ],
                'show_external' => true,
            ]
        );

        $this->end_controls_section();

        /**
         * Pricing Table Rebon
         */
        $this->start_controls_section(
            'sa_el_section_pricing_table_featured',
            [
                'label' => esc_html__('Ribbon', SA_ELEMENTOR_TEXTDOMAIN)
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_featured',
            [
                'label' => esc_html__('Featured?', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_featured_styles',
            [
                'label' => esc_html__('Ribbon Style', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'ribbon-1',
                'options' => [
                    'ribbon-1' => esc_html__('Style 1', SA_ELEMENTOR_TEXTDOMAIN),
                    'ribbon-2' => esc_html__('Style 2', SA_ELEMENTOR_TEXTDOMAIN),
                    'ribbon-3' => esc_html__('Style 3', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                'condition' => [
                    'sa_el_pricing_table_featured' => 'yes',
                ],
            ]
        );

        /**
         * Condition: 'sa_el_pricing_table_featured_styles' => [ 'ribbon-2', 'ribbon-3' ], 'sa_el_pricing_table_featured' => 'yes'
         */
        $this->add_control(
            'sa_el_pricing_table_featured_tag_text',
            [
                'label' => esc_html__('Featured Tag Text', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => esc_html__('Featured', SA_ELEMENTOR_TEXTDOMAIN),
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing.style-1 .sa-el-pricing-item.featured:before' => 'content: "{{VALUE}}";',
                    '{{WRAPPER}} .sa-el-pricing.style-2 .sa-el-pricing-item.featured:before' => 'content: "{{VALUE}}";',
                ],
                'condition' => [
                    'sa_el_pricing_table_featured_styles' => ['ribbon-2', 'ribbon-3'],
                    'sa_el_pricing_table_featured' => 'yes'
                ]
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
         * Tab Style (Pricing Table Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_pricing_table_style_settings',
            [
                'label' => esc_html__('Pricing Table Style', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_bg_color',
            [
                'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing .sa-el-pricing-item' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_el_pricing_table_container_padding',
            [
                'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing .sa-el-pricing-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_el_pricing_table_container_margin',
            [
                'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing .sa-el-pricing-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sa_el_pricing_table_border',
                'label' => esc_html__('Border Type', SA_ELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .sa-el-pricing .sa-el-pricing-item',
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_border_radius',
            [
                'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 4,
                ],
                'range' => [
                    'px' => [
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing .sa-el-pricing-item' => 'border-radius: {{SIZE}}px;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'sa_el_pricing_table_shadow',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing .sa-el-pricing-item',
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_el_pricing_table_content_alignment',
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
                'prefix_class' => 'sa-el-pricing-content-align-',
            ]
        );

        $this->add_responsive_control(
            'sa_el_pricing_table_content_button_alignment',
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
                'default' => 'center',
                'prefix_class' => 'sa-el-pricing-button-align-',
            ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Style (Header)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_pricing_table_header_style_settings',
            [
                'label' => esc_html__('Header', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_title_heading',
            [
                'label' => esc_html__('Title Style', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_title_color',
            [
                'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing-item .header .title' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .sa-el-pricing.style-3 .sa-el-pricing-item:hover .header:after' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_style_2_title_bg_color',
            [
                'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#EEF6F9',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing.style-2 .sa-el-pricing-item .header' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .sa-el-pricing.style-4 .sa-el-pricing-item .header' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'sa_el_pricing_table_style' => ['style-2']
                ]
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_style_1_title_line_color',
            [
                'label' => esc_html__('Line Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#dbdbdb',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing.style-1 .sa-el-pricing-item .header:after' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'sa_el_pricing_table_style' => ['style-1']
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_el_pricing_table_title_typography',
                'selector' => '{{WRAPPER}} .sa-el-pricing-item .header .title',
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_subtitle_heading',
            [
                'label' => esc_html__('Subtitle Style', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'sa_el_pricing_table_style!' => 'style-1'
                ]
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_subtitle_color',
            [
                'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing-item .header .subtitle' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'sa_el_pricing_table_style!' => 'style-1'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_el_pricing_table_subtitle_typography',
                'selector' => '{{WRAPPER}} .sa-el-pricing-item .header .subtitle',
                'condition' => [
                    'sa_el_pricing_table_style!' => 'style-1'
                ]
            ]
        );

        $this->end_controls_section();


        /**
         * -------------------------------------------
         * Style (Pricing)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_pricing_table_title_style_settings',
            [
                'label' => esc_html__('Pricing', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_price_tag_onsale_heading',
            [
                'label' => esc_html__('Original Price', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'sa_el_pricing_table_onsale' => 'yes'
                ]
            ]

        );

        $this->add_control(
            'sa_el_pricing_table_pricing_onsale_color',
            [
                'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#999',
                'condition' => [
                    'sa_el_pricing_table_onsale' => 'yes'
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing-item .muted-price' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_el_pricing_table_price_tag_onsale_typography',
                'condition' => [
                    'sa_el_pricing_table_onsale' => 'yes'
                ],
                'selector' => '{{WRAPPER}} .sa-el-pricing-item .muted-price',
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_price_tag_heading',
            [
                'label' => esc_html__('Sale Price', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_pricing_color',
            [
                'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing-item .price-tag' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_el_pricing_table_price_tag_typography',
                'selector' => '{{WRAPPER}} .sa-el-pricing-item .price-tag',
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_price_currency_heading',
            [
                'label' => esc_html__('Currency', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_pricing_curr_color',
            [
                'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#00C853',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing-item .price-tag .price-currency' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_el_pricing_table_price_cur_typography',
                'selector' => '{{WRAPPER}} .sa-el-pricing-item .price-currency',
            ]
        );

        $this->add_responsive_control(
            'sa_el_pricing_table_price_cur_margin',
            [
                'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing-item .price-currency' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_pricing_period_heading',
            [
                'label' => esc_html__('Pricing Period', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_pricing_period_color',
            [
                'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing-item .price-period' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_el_pricing_table_price_preiod_typography',
                'selector' => '{{WRAPPER}} .sa-el-pricing-item .price-period',
            ]
        );


        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Style (Feature List)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_pricing_table_style_featured_list_settings',
            [
                'label' => esc_html__('Feature List', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_list_item_color',
            [
                'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing-item .body ul li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_list_disable_item_color',
            [
                'label' => esc_html__('Disable item color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing .sa-el-pricing-item ul li.disable-item' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_el_pricing_table_list_item_typography',
                'selector' => '{{WRAPPER}} .sa-el-pricing-item .body ul li',
            ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Style (Ribbon)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_pricing_table_style_3_featured_tag_settings',
            [
                'label' => esc_html__('Ribbon', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'sa_el_pricing_table_featured' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_style_1_featured_bar_color',
            [
                'label' => esc_html__('Line Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#00C853',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing.style-1 .sa-el-pricing-item.ribbon-1:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .sa-el-pricing.style-2 .sa-el-pricing-item.ribbon-1:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .sa-el-pricing.style-3 .sa-el-pricing-item.ribbon-1:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .sa-el-pricing.style-4 .sa-el-pricing-item.ribbon-1:before' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'sa_el_pricing_table_featured' => 'yes',
                    'sa_el_pricing_table_featured_styles' => 'ribbon-1'
                ],
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_style_1_featured_bar_height',
            [
                'label' => esc_html__('Line Height', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 3
                ],
                'range' => [
                    'px' => [
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing.style-1 .sa-el-pricing-item.ribbon-1:before' => 'height: {{SIZE}}px;',
                    '{{WRAPPER}} .sa-el-pricing.style-2 .sa-el-pricing-item.ribbon-1:before' => 'height: {{SIZE}}px;',
                    '{{WRAPPER}} .sa-el-pricing.style-3 .sa-el-pricing-item.ribbon-1:before' => 'height: {{SIZE}}px;',
                    '{{WRAPPER}} .sa-el-pricing.style-4 .sa-el-pricing-item.ribbon-1:before' => 'height: {{SIZE}}px;',
                ],
                'condition' => [
                    'sa_el_pricing_table_featured' => 'yes',
                    'sa_el_pricing_table_featured_styles' => 'ribbon-1'
                ],
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_featured_tag_font_size',
            [
                'label' => esc_html__('Font Size', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 10
                ],
                'range' => [
                    'px' => [
                        'max' => 18,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing.style-1 .sa-el-pricing-item.ribbon-2:before' => 'font-size: {{SIZE}}px;',
                    '{{WRAPPER}} .sa-el-pricing.style-2 .sa-el-pricing-item.ribbon-2:before' => 'font-size: {{SIZE}}px;',
                    '{{WRAPPER}} .sa-el-pricing.style-3 .sa-el-pricing-item.ribbon-2:before' => 'font-size: {{SIZE}}px;',
                    '{{WRAPPER}} .sa-el-pricing.style-4 .sa-el-pricing-item.ribbon-2:before' => 'font-size: {{SIZE}}px;',
                    '{{WRAPPER}} .sa-el-pricing.style-1 .sa-el-pricing-item.ribbon-3:before' => 'font-size: {{SIZE}}px;',
                    '{{WRAPPER}} .sa-el-pricing.style-2 .sa-el-pricing-item.ribbon-3:before' => 'font-size: {{SIZE}}px;',
                    '{{WRAPPER}} .sa-el-pricing.style-3 .sa-el-pricing-item.ribbon-3:before' => 'font-size: {{SIZE}}px;',
                    '{{WRAPPER}} .sa-el-pricing.style-4 .sa-el-pricing-item.ribbon-3:before' => 'font-size: {{SIZE}}px;',
                ],
                'condition' => [
                    'sa_el_pricing_table_featured' => 'yes',
                    'sa_el_pricing_table_featured_styles' => ['ribbon-2', 'ribbon-3']
                ],
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_featured_tag_text_color',
            [
                'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing.style-1 .sa-el-pricing-item.ribbon-2:before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .sa-el-pricing.style-2 .sa-el-pricing-item.ribbon-2:before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .sa-el-pricing.style-3 .sa-el-pricing-item.ribbon-2:before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .sa-el-pricing.style-4 .sa-el-pricing-item.ribbon-2:before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .sa-el-pricing.style-1 .sa-el-pricing-item.ribbon-3:before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .sa-el-pricing.style-2 .sa-el-pricing-item.ribbon-3:before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .sa-el-pricing.style-3 .sa-el-pricing-item.ribbon-3:before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .sa-el-pricing.style-4 .sa-el-pricing-item.ribbon-3:before' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'sa_el_pricing_table_featured' => 'yes',
                    'sa_el_pricing_table_featured_styles' => ['ribbon-2', 'ribbon-3']
                ],
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_featured_tag_bg_color',
            [
                'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing.style-1 .sa-el-pricing-item.ribbon-2:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .sa-el-pricing.style-1 .sa-el-pricing-item.ribbon-2:after' => 'border-bottom-color: {{VALUE}};',
                    '{{WRAPPER}} .sa-el-pricing.style-1 .sa-el-pricing-item.ribbon-3:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .sa-el-pricing.style-2 .sa-el-pricing-item.ribbon-2:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .sa-el-pricing.style-2 .sa-el-pricing-item.ribbon-2:after' => 'border-bottom-color: {{VALUE}};',
                    '{{WRAPPER}} .sa-el-pricing.style-2 .sa-el-pricing-item.ribbon-3:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .sa-el-pricing.style-3 .sa-el-pricing-item.ribbon-2:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .sa-el-pricing.style-3 .sa-el-pricing-item.ribbon-2:after' => 'border-bottom-color: {{VALUE}};',
                    '{{WRAPPER}} .sa-el-pricing.style-3 .sa-el-pricing-item.ribbon-3:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .sa-el-pricing.style-4 .sa-el-pricing-item.ribbon-2:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .sa-el-pricing.style-4 .sa-el-pricing-item.ribbon-2:after' => 'border-bottom-color: {{VALUE}};',
                    '{{WRAPPER}} .sa-el-pricing.style-4 .sa-el-pricing-item.ribbon-3:before' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'sa_el_pricing_table_featured' => 'yes',
                    'sa_el_pricing_table_featured_styles' => ['ribbon-2', 'ribbon-3']
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Tooltip Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_pricing_table_tooltip_style',
            [
                'label' => esc_html__('Tooltip', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_tooltip_bg_color',
            [
                'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    'div.tooltipster-base.tooltipster-sidetip .tooltipster-box' => 'background-color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_tooltip_arrow_bg',
            [
                'label' => esc_html__('Arrow Background', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#3d3d3d',
                'selectors' => [
                    'div.tooltipster-base.tooltipster-sidetip.tooltipster-top .tooltipster-arrow-border,
					div.tooltipster-base.tooltipster-sidetip.tooltipster-top .tooltipster-arrow-background' => 'border-top-color: {{VALUE}};',
                    'div.tooltipster-base.tooltipster-sidetip.tooltipster-right .tooltipster-arrow-border, .tooltipster-base.tooltipster-sidetip.tooltipster-right .tooltipster-arrow-background' => 'border-right-color: {{VALUE}};',
                    'div.tooltipster-base.tooltipster-sidetip.tooltipster-left .tooltipster-arrow-border,
					div.tooltipster-base.tooltipster-sidetip.tooltipster-left .tooltipster-arrow-background' => 'border-left-color: {{VALUE}};',
                    'div.tooltipster-base.tooltipster-sidetip.tooltipster-bottom .tooltipster-arrow-border,
					div.tooltipster-base.tooltipster-sidetip.tooltipster-bottom .tooltipster-arrow-background' => 'border-bottom-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_tooltip_color',
            [
                'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    'div.tooltipster-base.tooltipster-sidetip .tooltipster-box .tooltipster-content' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_el_pricing_table_tooltip_padding',
            [
                'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => 'px',
                'description' => __('Refresh your browser after saving the padding value for see changes.', SA_ELEMENTOR_TEXTDOMAIN),
                'selectors' => [
                    'div.tooltipster-base.tooltipster-sidetip .tooltipster-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sa_el_pricing_table_tooltip_border',
                'label' => esc_html__('Border Type', SA_ELEMENTOR_TEXTDOMAIN),
                'selector' => '.tooltipster-base.tooltipster-sidetip .tooltipster-box'
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_tooltip_border_radius',
            [
                'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    '%' => [
                        'max' => 100,
                        'step' => 1
                    ],
                    'px' => [
                        'max' => 200,
                        'step' => 1
                    ],
                ],
                'selectors' => [
                    '.tooltipster-base.tooltipster-sidetip .tooltipster-box' => 'border-radius: {{SIZE}}{{UNIT}};'
                ],
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_tooltip_arrow_heading',
            [
                'label' => __('Tooltip Arrow', SA_ELEMENTOR_TEXTDOMAIN),
                'separator' => 'before',
                'type' => Controls_Manager::HEADING
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_tooltip_arrow_size',
            [
                'label' => esc_html__('Arrow Size', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 45,
                        'step' => 1
                    ],
                ],
                'selectors' => [
                    // Right Position Arrow
                    'div.tooltipster-base.tooltipster-sidetip.tooltipster-right .tooltipster-arrow' => 'width: calc( {{SIZE}}px * 2); height: calc( {{SIZE}}px * 2); margin-top: calc( (-{{SIZE}}px * 2) / 2 ); left: calc( (-{{SIZE}}px * 2) / 2 );',
                    'div.tooltipster-sidetip.tooltipster-right .tooltipster-box' => 'margin-left: calc({{SIZE}}px - 10px);',
                    'div.tooltipster-base.tooltipster-sidetip.tooltipster-right .tooltipster-arrow-background,.tooltipster-sidetip.tooltipster-right .tooltipster-arrow-border' => 'border: {{SIZE}}px solid transparent;',
                    // Left Position Arrow
                    '.tooltipster-sidetip.tooltipster-base.tooltipster-left .tooltipster-arrow' => 'width: calc( {{SIZE}}px * 2); height: calc( {{SIZE}}px * 2); margin-top: calc( (-{{SIZE}}px * 2) / 2 ); right: calc( (-{{SIZE}}px * 2) / 2 );',
                    'div.tooltipster-sidetip.tooltipster-left .tooltipster-box' => 'margin-right: calc({{SIZE}}px - 1px);',
                    'div.tooltipster-base.tooltipster-sidetip.tooltipster-left .tooltipster-arrow-background, .tooltipster-sidetip.tooltipster-left .tooltipster-arrow-border' => 'border: {{SIZE}}px solid transparent;',
                    // Top Position Arrow
                    '.tooltipster-sidetip.tooltipster-base.tooltipster-top .tooltipster-arrow' => 'width: calc( {{SIZE}}px * 2); height: calc( {{SIZE}}px * 2); margin-left: calc( (-{{SIZE}}px * 2) / 2 ); left: 40%;top: 100%;',
                    'div.tooltipster-sidetip.tooltipster-top .tooltipster-box' => 'margin-bottom: -1px;',
                    'div.tooltipster-base.tooltipster-sidetip.tooltipster-top .tooltipster-arrow-background, .tooltipster-sidetip.tooltipster-top .tooltipster-arrow-border' => 'border: {{SIZE}}px solid transparent;',
                    // Bottom Position Arrow
                    '.tooltipster-sidetip.tooltipster-base.tooltipster-bottom .tooltipster-arrow' => 'width: calc( {{SIZE}}px * 2); height: calc( {{SIZE}}px * 2); margin-left: calc( (-{{SIZE}}px * 2) / 2 ); left: 40%; top: auto; bottom: 88%;',
                    'div.tooltipster-base.tooltipster-sidetip.tooltipster-bottom .tooltipster-arrow-background,
					.tooltipster-sidetip.tooltipster-bottom .tooltipster-arrow-border' => 'border: {{SIZE}}px solid transparent;',
                ],
            ]
        );
        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Pricing Table Icon Style)
         * Condition: 'sa_el_pricing_table_style' => 'style-2'
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_pricing_table_icon_settings',
            [
                'label' => esc_html__('Icon Settings', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'sa_el_pricing_table_style' => 'style-2'
                ]
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_icon_bg_show',
            [
                'label' => __('Show Background', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __('Show', SA_ELEMENTOR_TEXTDOMAIN),
                'label_off' => __('Hide', SA_ELEMENTOR_TEXTDOMAIN),
                'return_value' => 'yes',
            ]
        );

        /**
         * Condition: 'sa_el_pricing_table_icon_bg_show' => 'yes'
         */
        $this->add_control(
            'sa_el_pricing_table_icon_bg_color',
            [
                'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing.style-2 .sa-el-pricing-item .sa-el-pricing-icon .icon' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'sa_el_pricing_table_icon_bg_show' => 'yes'
                ]
            ]
        );

        /**
         * Condition: 'sa_el_pricing_table_icon_bg_show' => 'yes'
         */
        $this->add_control(
            'sa_el_pricing_table_icon_bg_hover_color',
            [
                'label' => esc_html__('Background Hover Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing.style-2 .sa-el-pricing-item:hover .sa-el-pricing-icon .icon' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'sa_el_pricing_table_icon_bg_show' => 'yes'
                ],
                'separator' => 'after',
            ]
        );


        $this->add_control(
            'sa_el_pricing_table_icon_settings',
            [
                'label' => esc_html__('Icon Size', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 30
                ],
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing.style-2 .sa-el-pricing-item .sa-el-pricing-icon .icon i' => 'font-size: {{SIZE}}px;',
                ],
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_icon_area_width',
            [
                'label' => esc_html__('Icon Area Width', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 80
                ],
                'range' => [
                    'px' => [
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing.style-2 .sa-el-pricing-item .sa-el-pricing-icon .icon' => 'width: {{SIZE}}px;',
                ],
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_icon_area_height',
            [
                'label' => esc_html__('Icon Area Height', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 80
                ],
                'range' => [
                    'px' => [
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing.style-2 .sa-el-pricing-item .sa-el-pricing-icon .icon' => 'height: {{SIZE}}px;',
                ],
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_icon_line_height',
            [
                'label' => esc_html__('Icon Alignment', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 80
                ],
                'range' => [
                    'px' => [
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing.style-2 .sa-el-pricing-item .sa-el-pricing-icon .icon i' => 'line-height: {{SIZE}}px;',
                ],
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_icon_color',
            [
                'label' => esc_html__('Icon Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing.style-2 .sa-el-pricing-item .sa-el-pricing-icon .icon i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_icon_hover_color',
            [
                'label' => esc_html__('Icon Hover Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing.style-2 .sa-el-pricing-item:hover .sa-el-pricing-icon .icon i' => 'color: {{VALUE}};',
                ],
                'separator' => 'after'
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sa_el_pricing_table_icon_border',
                'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .sa-el-pricing.style-2 .sa-el-pricing-item .sa-el-pricing-icon .icon',
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_icon_border_hover_color',
            [
                'label' => esc_html__('Hover Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing.style-2 .sa-el-pricing-item:hover .sa-el-pricing-icon .icon' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'sa_el_pricing_table_icon_border_border!' => ''
                ]
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_icon_border_radius',
            [
                'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 50,
                ],
                'range' => [
                    'px' => [
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing.style-2 .sa-el-pricing-item .sa-el-pricing-icon .icon' => 'border-radius: {{SIZE}}%;',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Button Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_pricing_table_btn_style_settings',
            [
                'label' => esc_html__('Button', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_responsive_control(
            'sa_el_pricing_table_btn_padding',
            [
                'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing .sa-el-pricing-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_el_pricing_table_btn_margin',
            [
                'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing .sa-el-pricing-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_el_pricing_table_btn_typography',
                'selector' => '{{WRAPPER}} .sa-el-pricing .sa-el-pricing-button',
            ]
        );

        $this->start_controls_tabs('sa_el_cta_button_tabs');

        // Normal State Tab
        $this->start_controls_tab('sa_el_pricing_table_btn_normal', ['label' => esc_html__('Normal', SA_ELEMENTOR_TEXTDOMAIN)]);

        $this->add_control(
            'sa_el_pricing_table_btn_normal_text_color',
            [
                'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing .sa-el-pricing-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_btn_normal_bg_color',
            [
                'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#00C853',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing .sa-el-pricing-button' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sa_el_pricing_table_btn_border',
                'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .sa-el-pricing .sa-el-pricing-button',
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_btn_border_radius',
            [
                'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing .sa-el-pricing-button' => 'border-radius: {{SIZE}}px;',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'sa_el_cta_button_shadow',
                'selector' => '{{WRAPPER}} .sa-el-pricing .sa-el-pricing-button',
                'separator' => 'before'
            ]
        );

        $this->end_controls_tab();

        // Hover State Tab
        $this->start_controls_tab('sa_el_pricing_table_btn_hover', ['label' => esc_html__('Hover', SA_ELEMENTOR_TEXTDOMAIN)]);

        $this->add_control(
            'sa_el_pricing_table_btn_hover_text_color',
            [
                'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#f9f9f9',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing .sa-el-pricing-button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_btn_hover_bg_color',
            [
                'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#03b048',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing .sa-el-pricing-button:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_pricing_table_btn_hover_border_color',
            [
                'label' => esc_html__('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-pricing .sa-el-pricing-button:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'sa_el_cta_button_shadow_hover',
                'selector' => '{{WRAPPER}} .sa-el-pricing .sa-el-pricing-button:hover',
                'separator' => 'before'
            ]
        );
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings();
        $pricing_table_image = $this->get_settings('sa_el_pricing_table_image');
        $pricing_table_image_url = Group_Control_Image_Size::get_attachment_image_src($pricing_table_image['id'], 'thumbnail', $settings);
        $target = $settings['sa_el_pricing_table_btn_link']['is_external'] ? 'target="_blank"' : '';
        $nofollow = $settings['sa_el_pricing_table_btn_link']['nofollow'] ? 'rel="nofollow"' : '';
        if ('yes' === $settings['sa_el_pricing_table_featured']) : $featured_class = 'featured ' . $settings['sa_el_pricing_table_featured_styles'];
        else : $featured_class = '';
        endif;

        if ('yes' === $settings['sa_el_pricing_table_onsale']) {
            if ($settings['sa_el_pricing_table_price_cur_placement'] == 'left') {
                $pricing = '<del class="muted-price"><span class="muted-price-currency">' . $settings['sa_el_pricing_table_price_cur'] . '</span>' . $settings['sa_el_pricing_table_price'] . '</del> <span class="price-currency">' . $settings['sa_el_pricing_table_price_cur'] . '</span>' . $settings['sa_el_pricing_table_onsale_price'];
            } else if ($settings['sa_el_pricing_table_price_cur_placement'] == 'right') {
                $pricing = '<del class="muted-price">' . $settings['sa_el_pricing_table_price'] . '<span class="muted-price-currency">' . $settings['sa_el_pricing_table_price_cur'] . '</span></del> ' . $settings['sa_el_pricing_table_onsale_price'] . '<span class="price-currency">' . $settings['sa_el_pricing_table_price_cur'] . '</span>';
            }
        } else {
            if ($settings['sa_el_pricing_table_price_cur_placement'] == 'left') {
                $pricing = '<span class="price-currency">' . $settings['sa_el_pricing_table_price_cur'] . '</span>' . $settings['sa_el_pricing_table_price'];
            } else if ($settings['sa_el_pricing_table_price_cur_placement'] == 'right') {
                $pricing = $settings['sa_el_pricing_table_price'] . '<span class="price-currency">' . $settings['sa_el_pricing_table_price_cur'] . '</span>';
            }
        }
        ?>
        <?php if ('style-1' === $settings['sa_el_pricing_table_style']) : ?>
            <div class="sa-el-pricing style-1">
                <div class="sa-el-pricing-item <?php echo esc_attr($featured_class); ?>">
                    <div class="header">
                        <div class="title"><?php echo $settings['sa_el_pricing_table_title']; ?></div>
                    </div>
                    <div class="sa-el-pricing-tag">
                        <span class="price-tag"><?php echo $pricing; ?></span>
                        <span class="price-period"><?php echo $settings['sa_el_pricing_table_period_separator']; ?> <?php echo $settings['sa_el_pricing_table_price_period']; ?></span>
                    </div>
                    <div class="body">
                        <?php $this->render_feature_list($settings, $this); ?>
                    </div>
                    <div class="footer">
                        <a href="<?php echo esc_url($settings['sa_el_pricing_table_btn_link']['url']); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> class="sa-el-pricing-button">
                            <?php if ('left' == $settings['sa_el_pricing_table_button_icon_alignment']) : ?>
                                <i class="<?php echo esc_attr($settings['sa_el_pricing_table_button_icon']); ?> fa-icon-left"></i>
                                <?php echo $settings['sa_el_pricing_table_btn']; ?>
                            <?php elseif ('right' == $settings['sa_el_pricing_table_button_icon_alignment']) : ?>
                                <?php echo $settings['sa_el_pricing_table_btn']; ?>
                                <i class="<?php echo esc_attr($settings['sa_el_pricing_table_button_icon']); ?> fa-icon-right"></i>
                            <?php endif; ?>
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ('style-2' === $settings['sa_el_pricing_table_style']) : ?>
            <div class="sa-el-pricing style-2">
                <div class="sa-el-pricing-item <?php echo esc_attr($featured_class); ?>">
                    <div class="sa-el-pricing-icon">
                        <span class="icon" style="background:
                                    <?php if ('yes' != $settings['sa_el_pricing_table_icon_bg_show']) : echo 'none';
                                    endif;
                                    ?>;"><i class="<?php echo esc_attr($settings['sa_el_pricing_table_style_2_icon']); ?>"></i></span>
                    </div>
                    <div class="header">
                        <div class="title"><?php echo $settings['sa_el_pricing_table_title']; ?></div>
                        <span class="subtitle"><?php echo $settings['sa_el_pricing_table_sub_title']; ?></span>
                    </div>
                    <div class="sa-el-pricing-tag">
                        <span class="price-tag"><?php echo $pricing; ?></span>
                        <span class="price-period"><?php echo $settings['sa_el_pricing_table_period_separator']; ?> <?php echo $settings['sa_el_pricing_table_price_period']; ?></span>
                    </div>
                    <div class="body">
                        <?php $this->render_feature_list($settings, $this); ?>
                    </div>
                    <div class="footer">
                        <a href="<?php echo esc_url($settings['sa_el_pricing_table_btn_link']['url']); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> class="sa-el-pricing-button">
                            <?php if ('left' == $settings['sa_el_pricing_table_button_icon_alignment']) : ?>
                                <i class="<?php echo esc_attr($settings['sa_el_pricing_table_button_icon']); ?> fa-icon-left"></i>
                                <?php echo $settings['sa_el_pricing_table_btn']; ?>
                            <?php elseif ('right' == $settings['sa_el_pricing_table_button_icon_alignment']) : ?>
                                <?php echo $settings['sa_el_pricing_table_btn']; ?>
                                <i class="<?php echo esc_attr($settings['sa_el_pricing_table_button_icon']); ?> fa-icon-right"></i>
                            <?php endif; ?>
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ('style-3' === $settings['sa_el_pricing_table_style'] && apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('', '', TRUE))) : ?>
            <div class="sa-el-pricing style-3">
                <div class="sa-el-pricing-item <?php echo esc_attr($featured_class);
                                                ?>">
                    <?php if ('top' === $settings['sa_el_pricing_table_style_3_price_position']) : ?>
                        <div class="sa-el-pricing-tag on-top">
                            <span class="price-tag"><?php echo $pricing; ?></span>
                            <span class="price-period"><?php echo $settings['sa_el_pricing_table_period_separator']; ?> <?php echo $settings['sa_el_pricing_table_price_period']; ?></span>
                        </div>
                    <?php endif; ?>
                    <div class="header">
                        <div class="title"><?php echo $settings['sa_el_pricing_table_title']; ?></div>
                        <span class="subtitle"><?php echo $settings['sa_el_pricing_table_sub_title']; ?></span>
                    </div>
                    <div class="body">
                        <?php $this->render_feature_list($settings, $this); ?>
                    </div>
                    <?php if ('bottom' === $settings['sa_el_pricing_table_style_3_price_position']) : ?>
                        <div class="sa-el-pricing-tag">
                            <span class="price-tag"><?php echo $pricing; ?></span>
                            <span class="price-period"><?php echo $settings['sa_el_pricing_table_period_separator']; ?> <?php echo $settings['sa_el_pricing_table_price_period']; ?></span>
                        </div>
                    <?php endif; ?>
                    <div class="footer">
                        <a href="<?php echo esc_url($settings['sa_el_pricing_table_btn_link']['url']); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> class="sa-el-pricing-button">
                            <?php if ('left' == $settings['sa_el_pricing_table_button_icon_alignment']) : ?>
                                <i class="<?php echo esc_attr($settings['sa_el_pricing_table_button_icon']); ?> fa-icon-left"></i>
                                <?php echo $settings['sa_el_pricing_table_btn']; ?>
                            <?php elseif ('right' == $settings['sa_el_pricing_table_button_icon_alignment']) : ?>
                                <?php echo $settings['sa_el_pricing_table_btn']; ?>
                                <i class="<?php echo esc_attr($settings['sa_el_pricing_table_button_icon']); ?> fa-icon-right"></i>
                            <?php endif; ?>
                        </a>
                    </div>
                </div>
            </div>

        <?php endif; ?>
        <?php if ('style-4' === $settings['sa_el_pricing_table_style'] && apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('', '', TRUE))) : ?>
            <div class="sa-el-pricing style-4">
                <div class="sa-el-pricing-item <?php echo esc_attr($featured_class);
                                                ?>">
                    <div class="sa-el-pricing-image">
                        <div class="sa-el-pricing-tag">
                            <span class="price-tag"><?php echo $pricing; ?></span>
                            <span class="price-period"><?php echo $settings['sa_el_pricing_table_period_separator']; ?> <?php echo $settings['sa_el_pricing_table_price_period']; ?></span>
                        </div>
                    </div>
                    <div class="header">
                        <div class="title"><?php echo $settings['sa_el_pricing_table_title']; ?></div>
                        <span class="subtitle"><?php echo $settings['sa_el_pricing_table_sub_title']; ?></span>
                    </div>
                    <div class="body">
                        <?php $this->render_feature_list($settings, $this); ?>
                    </div>
                    <div class="footer">
                        <a href="<?php echo esc_url($settings['sa_el_pricing_table_btn_link']['url']); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> class="sa-el-pricing-button">
                            <?php if ('left' == $settings['sa_el_pricing_table_button_icon_alignment']) : ?>
                                <i class="<?php echo esc_attr($settings['sa_el_pricing_table_button_icon']); ?> fa-icon-left"></i>
                                <?php echo $settings['sa_el_pricing_table_btn']; ?>
                            <?php elseif ('right' == $settings['sa_el_pricing_table_button_icon_alignment']) : ?>
                                <?php echo $settings['sa_el_pricing_table_btn']; ?>
                                <i class="<?php echo esc_attr($settings['sa_el_pricing_table_button_icon']); ?> fa-icon-right"></i>
                            <?php endif; ?>
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php
    }

    protected function content_template()
    { }
}
