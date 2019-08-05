<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Price_Menu;

use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Scheme_Typography as Scheme_Typography;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Widget_Base as Widget_Base;
use Elementor\Group_Control_Image_Size;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class Price_Menu extends Widget_Base
{

    public function get_name()
    {
        return 'sa_el_price_menu';
    }

    public function get_title()
    {
        return __('Price Menu', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_categories()
    {
        return ['sa-el-addons'];
    }

    public function get_icon()
    {
        return 'eicon-price-list oxi-el-admin-icon';
    }

    protected function _register_controls()
    {

        /* ----------------------------------------------------------------------------------- */
        /* 	Content Tab
          /*----------------------------------------------------------------------------------- */

        $this->start_controls_section(
            'section_price_menu',
            [
                'label' => __('Price Menu', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'menu_items',
            [
                'label' => '',
                'type' => Controls_Manager::REPEATER,
                'default' => [
                    [
                        'menu_title' => __('Menu Item 01', SA_ELEMENTOR_TEXTDOMAIN),
                        'menu_price' => '$29',
                    ],
                    [
                        'menu_title' => __('Menu Item 02', SA_ELEMENTOR_TEXTDOMAIN),
                        'menu_price' => '$29',
                    ],
                    [
                        'menu_title' => __('Menu Item 03', SA_ELEMENTOR_TEXTDOMAIN),
                        'menu_price' => '$29',
                    ],
                ],
                'fields' => [
                    [
                        'name' => 'menu_title',
                        'label' => __('Title', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::TEXT,
                        'dynamic' => [
                            'active' => true,
                        ],
                        'label_block' => true,
                        'placeholder' => __('Title', SA_ELEMENTOR_TEXTDOMAIN),
                        'default' => __('Title', SA_ELEMENTOR_TEXTDOMAIN),
                    ],
                    [
                        'name' => 'menu_description',
                        'label' => __('Description', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::TEXTAREA,
                        'dynamic' => [
                            'active' => true,
                        ],
                        'label_block' => true,
                        'placeholder' => __('Description', SA_ELEMENTOR_TEXTDOMAIN),
                        'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit', SA_ELEMENTOR_TEXTDOMAIN),
                    ],
                    [
                        'name' => 'menu_price',
                        'label' => __('Price', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::TEXT,
                        'dynamic' => [
                            'active' => true,
                        ],
                        'default' => '$29',
                    ],
                    [
                        'name' => 'discount',
                        'label' => __('Discount', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::SWITCHER,
                        'default' => 'no',
                        'label_on' => __('On', SA_ELEMENTOR_TEXTDOMAIN),
                        'label_off' => __('Off', SA_ELEMENTOR_TEXTDOMAIN),
                        'return_value' => 'yes',
                    ],
                    [
                        'name' => 'original_price',
                        'label' => __('Original Price', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::TEXT,
                        'dynamic' => [
                            'active' => true,
                        ],
                        'default' => '$69',
                        'condition' => [
                            'discount' => 'yes',
                        ],
                    ],
                    [
                        'name' => 'image_switch',
                        'label' => __('Show Image', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::SWITCHER,
                        'default' => '',
                        'label_on' => __('On', SA_ELEMENTOR_TEXTDOMAIN),
                        'label_off' => __('Off', SA_ELEMENTOR_TEXTDOMAIN),
                        'return_value' => 'yes',
                    ],
                    [
                        'name' => 'image',
                        'label' => __('Image', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::MEDIA,
                        'dynamic' => [
                            'active' => true,
                        ],
                        'condition' => [
                            'image_switch' => 'yes',
                        ],
                    ],
                    [
                        'name' => 'link',
                        'label' => __('Link', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::URL,
                        'dynamic' => [
                            'active' => true,
                        ],
                        'placeholder' => 'https://www.your-link.com',
                    ]
                ],
                'title_field' => '{{{ menu_title }}}',
            ]
        );

        $this->add_control(
            'menu_style',
            [
                'label' => __('Menu Style', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'style_1',
                'options' => [
                    'style_sa' => __('SA Style', SA_ELEMENTOR_TEXTDOMAIN),
                    'style_1' => __('Style 1', SA_ELEMENTOR_TEXTDOMAIN),
                    'style_2' => __('Style 2', SA_ELEMENTOR_TEXTDOMAIN),
                    'style_3' => __('Style 3', SA_ELEMENTOR_TEXTDOMAIN),
                    'style_4' => __('Style 4', SA_ELEMENTOR_TEXTDOMAIN),
                ],
            ]
        );

        $this->add_responsive_control(
            'menu_align',
            [
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
                    '{{WRAPPER}} .sa_el_restaurant_menu_style_4' => 'text-align: {{VALUE}};',
                ],
                'condition' => [
                    'menu_style' => 'style_4',
                ],
            ]
        );

        $this->add_control(
            'title_price_connector',
            [
                'label' => __('Title-Price Connector', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __('Yes', SA_ELEMENTOR_TEXTDOMAIN),
                'label_off' => __('No', SA_ELEMENTOR_TEXTDOMAIN),
                'return_value' => 'yes',
                'condition' => [
                    'menu_style' => 'style_1',
                ],
            ]
        );

        $this->add_control(
            'title_separator',
            [
                'label' => __('Title Separator', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'label_on' => __('Yes', SA_ELEMENTOR_TEXTDOMAIN),
                'label_off' => __('No', SA_ELEMENTOR_TEXTDOMAIN),
                'return_value' => 'yes',
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
        /* ----------------------------------------------------------------------------------- */
        /* 	Style Tab
          /*----------------------------------------------------------------------------------- */

        /**
         * Style Tab: Menu Items Section
         */
        $this->start_controls_section(
            'section_items_style',
            [
                'label' => __('Menu Items', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'items_bg_color',
            [
                'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_restaurant_menu .sa_el_restaurant_menu_item' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'items_spacing',
            [
                'label' => __('Items Spacing', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_restaurant_menu_item_wrap' => 'margin-bottom: calc(({{SIZE}}{{UNIT}})/2); padding-bottom: calc(({{SIZE}}{{UNIT}})/2)',
                ],
            ]
        );

        $this->add_responsive_control(
            'items_padding',
            [
                'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_restaurant_menu .sa_el_restaurant_menu_item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'items_border',
                'label' => __('Border', SA_ELEMENTOR_TEXTDOMAIN),
                'placeholder' => '1px',
                'default' => '1px',
                'selector' => '{{WRAPPER}} .sa_el_restaurant_menu .sa_el_restaurant_menu_item',
            ]
        );

        $this->add_control(
            'items_border_radius',
            [
                'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_restaurant_menu .sa_el_restaurant_menu_item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'pricing_table_shadow',
                'selector' => '{{WRAPPER}} .sa_el_restaurant_menu_item',
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Menu Items Section
         */
        $this->start_controls_section(
            'section_content_style',
            [
                'label' => __('Content', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'menu_style' => 'style_sa',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_restaurant_menu_content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'menu_style' => 'style_sa',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Title Section
         */
        $this->start_controls_section(
            'section_title_style',
            [
                'label' => __('Title', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_restaurant_menu .sa_el_restaurant_menu_title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .sa_el_restaurant_menu .sa_el_restaurant_menu_title',
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => __('Margin Bottom', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 40,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_restaurant_menu .sa_el_restaurant_menu_header' => 'margin-bottom: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_title_separator_style',
            [
                'label' => __('Title Separator', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'title_separator' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'divider_title_border_type',
            [
                'label' => __('Border Type', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'dotted',
                'options' => [
                    'none' => __('None', SA_ELEMENTOR_TEXTDOMAIN),
                    'solid' => __('Solid', SA_ELEMENTOR_TEXTDOMAIN),
                    'double' => __('Double', SA_ELEMENTOR_TEXTDOMAIN),
                    'dotted' => __('Dotted', SA_ELEMENTOR_TEXTDOMAIN),
                    'dashed' => __('Dashed', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_restaurant_menu .sa_el_price_menu_divider' => 'border-bottom-style: {{VALUE}}',
                ],
                'condition' => [
                    'title_separator' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'divider_title_border_weight',
            [
                'label' => __('Border Height', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 1,
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 20,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_restaurant_menu .sa_el_price_menu_divider' => 'border-bottom-width: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'title_separator' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'divider_title_border_width',
            [
                'label' => __('Border Width', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 100,
                    'unit' => '%',
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 20,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_restaurant_menu .sa_el_price_menu_divider' => 'width: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'title_separator' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'divider_title_border_color',
            [
                'label' => __('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_restaurant_menu .sa_el_price_menu_divider' => 'border-bottom-color: {{VALUE}}',
                ],
                'condition' => [
                    'title_separator' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'divider_title_spacing',
            [
                'label' => __('Margin Bottom', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_restaurant_menu .sa_el_price_menu_divider' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_price_style',
            [
                'label' => __('Price', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'price_badge_heading',
            [
                'label' => __('Price Badge', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'menu_style' => 'style_sa',
                ],
            ]
        );

        $this->add_control(
            'badge_text_color',
            [
                'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_restaurant_menu_style_sa .sa_el_restaurant_menu_price' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'menu_style' => 'style_sa',
                ],
            ]
        );

        $this->add_control(
            'badge_bg_color',
            [
                'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_restaurant_menu_style_sa .sa_el_restaurant_menu_price:after' => 'border-right-color: {{VALUE}}',
                ],
                'condition' => [
                    'menu_style' => 'style_sa',
                ],
            ]
        );

        $this->add_control(
            'price_color',
            [
                'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_restaurant_menu .sa_el_restaurant_menu_price_discount' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'menu_style!' => 'style_sa',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_typography',
                'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .sa_el_restaurant_menu .sa_el_restaurant_menu_price_discount',
            ]
        );

        $this->add_control(
            'original_price_heading',
            [
                'label' => __('Original Price', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'original_price_strike',
            [
                'label' => __('Strikethrough', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __('On', SA_ELEMENTOR_TEXTDOMAIN),
                'label_off' => __('Off', SA_ELEMENTOR_TEXTDOMAIN),
                'return_value' => 'yes',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_restaurant_menu .sa_el_restaurant_menu_price_original' => 'text-decoration: line-through;',
                ],
            ]
        );

        $this->add_control(
            'original_price_color',
            [
                'label' => __('Original Price Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#ddd',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_restaurant_menu .sa_el_restaurant_menu_price_original' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'original_price_typography',
                'label' => __('Original Price Typography', SA_ELEMENTOR_TEXTDOMAIN),
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .sa_el_restaurant_menu .sa_el_restaurant_menu_price_original',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_description_style',
            [
                'label' => __('Description', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#ddd',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_restaurant_menu_description' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .sa_el_restaurant_menu_description',
            ]
        );

        $this->add_responsive_control(
            'description_spacing',
            [
                'label' => __('Margin Bottom', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_restaurant_menu_description' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Image Section
         */
        $this->start_controls_section(
            'section_image_style',
            [
                'label' => __('Image', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image_size',
                'label' => __('Image Size', SA_ELEMENTOR_TEXTDOMAIN),
                'default' => 'thumbnail',
            ]
        );

        $this->add_control(
            'image_bg_color',
            [
                'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_restaurant_menu_image img' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_width',
            [
                'label' => __('Width', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 300,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 5,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_restaurant_menu_image img' => 'width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_margin',
            [
                'label' => __('Margin', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_restaurant_menu_image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_padding',
            [
                'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_restaurant_menu_image img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'label' => __('Border', SA_ELEMENTOR_TEXTDOMAIN),
                'placeholder' => '1px',
                'default' => '1px',
                'selector' => '{{WRAPPER}} .sa_el_restaurant_menu_image img',
            ]
        );

        $this->add_control(
            'image_border_radius',
            [
                'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_restaurant_menu_image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'image_vertical_position',
            [
                'label' => __('Vertical Position', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
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
                    '{{WRAPPER}} .sa_el_restaurant_menu .sa_el_restaurant_menu_image' => 'align-self: {{VALUE}}',
                ],
                'selectors_dictionary' => [
                    'top' => 'flex-start',
                    'middle' => 'center',
                    'bottom' => 'flex-end',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Items Divider Section
         */
        $this->start_controls_section(
            'section_table_title_connector_style',
            [
                'label' => __('Title-Price Connector', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'title_price_connector' => 'yes',
                    'menu_style' => 'style_1',
                ],
            ]
        );

        $this->add_control(
            'title_connector_vertical_align',
            [
                'label' => __('Vertical Alignment', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::CHOOSE,
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
                    '{{WRAPPER}} .sa_el_restaurant_menu_style_1 .sa_el_price_title_connector' => 'align-self: {{VALUE}};',
                ],
                'selectors_dictionary' => [
                    'top' => 'flex-start',
                    'middle' => 'center',
                    'bottom' => 'flex-end',
                ],
                'condition' => [
                    'title_price_connector' => 'yes',
                    'menu_style' => 'style_1',
                ],
            ]
        );

        $this->add_control(
            'items_divider_style',
            [
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
                    '{{WRAPPER}} .sa_el_restaurant_menu_style_1 .sa_el_price_title_connector' => 'border-bottom-style: {{VALUE}}',
                ],
                'condition' => [
                    'title_price_connector' => 'yes',
                    'menu_style' => 'style_1',
                ],
            ]
        );

        $this->add_control(
            'items_divider_color',
            [
                'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_restaurant_menu_style_1 .sa_el_price_title_connector' => 'border-bottom-color: {{VALUE}}',
                ],
                'condition' => [
                    'title_price_connector' => 'yes',
                    'menu_style' => 'style_1',
                ],
            ]
        );

        $this->add_responsive_control(
            'items_divider_weight',
            [
                'label' => __('Divider Weight', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => ['size' => '1'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 30,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_restaurant_menu_style_1 .sa_el_price_title_connector' => 'border-bottom-width: {{SIZE}}{{UNIT}}; bottom: calc((-{{SIZE}}{{UNIT}})/2)',
                ],
                'condition' => [
                    'title_price_connector' => 'yes',
                    'menu_style' => 'style_1',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $i = 1;
        $this->add_render_attribute('price-menu', 'class', 'sa_el_restaurant_menu');

        if ($settings['menu_style']) {
            $this->add_render_attribute('price-menu', 'class', 'sa_el_restaurant_menu_' . $settings['menu_style']);
        }
        ?>
        <div <?php echo $this->get_render_attribute_string('price-menu'); ?>>
            <div class="sa_el_restaurant_menu_items">
                <?php foreach ($settings['menu_items'] as $index => $item) : ?>
                    <?php
                    $title_key = $this->get_repeater_setting_key('menu_title', 'menu_items', $index);
                    $this->add_render_attribute($title_key, 'class', 'sa_el_restaurant_menu_title-text');
                    $this->add_inline_editing_attributes($title_key, 'none');

                    $description_key = $this->get_repeater_setting_key('menu_description', 'menu_items', $index);
                    $this->add_render_attribute($description_key, 'class', 'sa_el_restaurant_menu_description');
                    $this->add_inline_editing_attributes($description_key, 'basic');

                    $discount_price_key = $this->get_repeater_setting_key('menu_price', 'menu_items', $index);
                    $this->add_render_attribute($discount_price_key, 'class', 'sa_el_restaurant_menu_price_discount');
                    $this->add_inline_editing_attributes($discount_price_key, 'none');

                    $original_price_key = $this->get_repeater_setting_key('original_price', 'menu_items', $index);
                    $this->add_render_attribute($original_price_key, 'class', 'sa_el_restaurant_menu_price_original');
                    $this->add_inline_editing_attributes($original_price_key, 'none');
                    ?>
                    <div class="sa_el_restaurant_menu_item_wrap">
                        <div class="sa_el_restaurant_menu_item">
                            <?php if ($item['image_switch'] == 'yes') { ?>
                                <div class="sa_el_restaurant_menu_image">
                                    <?php
                                    if (!empty($item['image']['url'])) :
                                        $image = $item['image'];
                                        $image_url = Group_Control_Image_Size::get_attachment_image_src($image['id'], 'image_size', $settings);
                                        ?>
                                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(get_post_meta($image['id'], '_wp_attachment_image_alt', true)); ?>">
                                    <?php endif; ?>
                                </div>
                            <?php } ?>

                            <div class="sa_el_restaurant_menu_content">
                                <div class="sa_el_restaurant_menu_header">
                                    <?php if (!empty($item['menu_title'])) { ?>
                                        <h4 class="sa_el_restaurant_menu_title">
                                            <?php
                                            if (!empty($item['link']['url'])) {
                                                $this->add_render_attribute('price-menu-link' . $i, 'href', $item['link']['url']);

                                                if (!empty($item['link']['is_external'])) {
                                                    $this->add_render_attribute('price-menu-link' . $i, 'target', '_blank');
                                                }
                                                ?>
                                                <a <?php echo $this->get_render_attribute_string('price-menu-link' . $i); ?>>
                                                    <span <?php echo $this->get_render_attribute_string($title_key); ?>>
                                                        <?php echo $item['menu_title']; ?>
                                                    </span>
                                                </a>
                                            <?php
                                            } else {
                                                ?>
                                                <span <?php echo $this->get_render_attribute_string($title_key); ?>>
                                                    <?php echo $item['menu_title']; ?>
                                                </span>
                                            <?php
                                            }
                                            ?>
                                        </h4>
                                    <?php } ?>

                                    <?php if ($settings['title_price_connector'] == 'yes') { ?>
                                        <span class="sa_el_price_title_connector"></span>
                                    <?php } ?>

                                    <?php if ($settings['menu_style'] == 'style_1') { ?>
                                        <?php if (!empty($item['menu_price'])) { ?>
                                            <span class="sa_el_restaurant_menu_price">
                                                <?php if ($item['discount'] == 'yes') { ?>
                                                    <span <?php echo $this->get_render_attribute_string($original_price_key); ?>>
                                                        <?php echo esc_attr($item['original_price']); ?>
                                                    </span>
                                                <?php } ?>
                                                <span <?php echo $this->get_render_attribute_string($discount_price_key); ?>>
                                                    <?php echo esc_attr($item['menu_price']); ?>
                                                </span>
                                            </span>
                                        <?php } ?>
                                    <?php } ?>
                                </div>

                                <?php if ($settings['title_separator'] == 'yes') { ?>
                                    <div class="sa_el_price_menu_divider_wrap">
                                        <div class="sa_el_price_menu_divider"></div>
                                    </div>
                                <?php } ?>

                                <?php
                                if (!empty($item['menu_description'])) {
                                    $description_html = sprintf('<div %1$s>%2$s</div>', $this->get_render_attribute_string($description_key), $item['menu_description']);

                                    echo $description_html;
                                }
                                ?>

                                <?php if ($settings['menu_style'] != 'style_1') { ?>
                                    <?php if (!empty($item['menu_price'])) { ?>
                                        <span class="sa_el_restaurant_menu_price">
                                            <?php if ($item['discount'] == 'yes') { ?>
                                                <span <?php echo $this->get_render_attribute_string($original_price_key); ?>>
                                                    <?php echo esc_attr($item['original_price']); ?>
                                                </span>
                                            <?php } ?>
                                            <span <?php echo $this->get_render_attribute_string($discount_price_key); ?>>
                                                <?php echo esc_attr($item['menu_price']); ?>
                                            </span>
                                        </span>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php $i++;
                endforeach;
                ?>
            </div>
        </div>
    <?php
    }
}
