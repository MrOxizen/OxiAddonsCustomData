<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Card;

/**
 * Card widget class
 *
 * @package Shortcode_Addons
 */

use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Scheme_Typography as Scheme_Typography;
use \Elementor\Widget_Base as Widget_Base;
use Elementor\Group_Control_Css_Filter;
use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Group_Control_Image_Size;

defined('ABSPATH') || die();

class Card extends Widget_Base
{
    public function get_name()
    {
        return 'sa-el-card';
    }
    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Card', SA_ELEMENTOR_TEXTDOMAIN);
    }

    /**
     * Get widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-call-to-action  oxi-el-admin-icon';
    }

    public function get_categories()
    {
        return ['sa-el-addons'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            '_section_image',
            [
                'label' => __('Image & Badge', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __('Image', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'large',
                'separator' => 'none',
            ]
        );

        $this->add_control(
            'image_position',
            [
                'label' => __('Image Position', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
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
                ],
                'toggle' => false,
                'default' => 'top',
                'prefix_class' => 'sa-el-card--'
            ]
        );

        $this->add_control(
            'badge_text',
            [
                'label' => __('Badge Text', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'default' => __('Badget Text', SA_ELEMENTOR_TEXTDOMAIN),
                'placeholder' => __('Type badge text', SA_ELEMENTOR_TEXTDOMAIN),
                'separator' => 'before',
                'description' => __('Set badget position and control all the style settings from Style tab', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title & Description', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', SA_ELEMENTOR_TEXTDOMAIN),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Your Card Title', SA_ELEMENTOR_TEXTDOMAIN),
                'placeholder' => __('Type Card Title', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Your card description goes here', SA_ELEMENTOR_TEXTDOMAIN),
                'placeholder' => __('Type card description', SA_ELEMENTOR_TEXTDOMAIN),
                'rows' => 5
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __('Title HTML Tag', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1'  => [
                        'title' => __('H1', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2'  => [
                        'title' => __('H2', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3'  => [
                        'title' => __('H3', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4'  => [
                        'title' => __('H4', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5'  => [
                        'title' => __('H5', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6'  => [
                        'title' => __('H6', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h3',
                'toggle' => false,
            ]
        );

        $this->add_responsive_control(
            'align',
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
                        'title' => __('Justify', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'fa fa-align-justify',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .elementor-widget-container' => 'text-align: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_button',
            [
                'label' => __('Button', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __('Text', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'default' => __('Button Text', SA_ELEMENTOR_TEXTDOMAIN),
                'placeholder' => __('Type button text here', SA_ELEMENTOR_TEXTDOMAIN),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __('Link', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::URL,
                'placeholder' => __('https://example.com/', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'button_icon',
            [
                'label' => __('Icon', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::ICON,
            ]
        );

        $this->add_control(
            'button_icon_position',
            [
                'label' => __('Icon Position', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'before' => [
                        'title' => __('Before', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'after' => [
                        'title' => __('After', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'before',
                'toggle' => false,
                'condition' => [
                    'button_icon!' => '',
                ],
            ]
        );

        $this->add_control(
            'button_icon_spacing',
            [
                'label' => __('Icon Spacing', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'condition' => [
                    'button_icon!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-card-btn--icon-before .sa-el-card-btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .sa-el-card-btn--icon-after .sa-el-card-btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_section();
        
        $this->start_controls_section(
            '_section_style_image',
            [
                'label' => __('Image', SA_ELEMENTOR_TEXTDOMAIN),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'image_width',
            [
                'label' => __('Width', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['%', 'px'],
                'desktop_default' => [
                    'unit' => '%',
                ],
                'tablet_default' => [
                    'unit' => '%',
                ],
                'mobile_default' => [
                    'unit' => '%',
                ],
                'range' => [
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 50,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-card-figure' => 'flex: 0 0 {{SIZE}}{{UNIT}}; max-width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}}.sa-el-card--right .sa-el-card-body, {{WRAPPER}}.sa-el-card--left .sa-el-card-body' => 'flex: 0 0 calc(100% - {{SIZE || 50}}{{UNIT}}); max-width: calc(100% - {{SIZE || 50}}{{UNIT}});',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_height',
            [
                'label' => __('Height', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-card-figure' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'offset_toggle',
            [
                'label' => __('Offset', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'label_off' => __('None', SA_ELEMENTOR_TEXTDOMAIN),
                'label_on' => __('Custom', SA_ELEMENTOR_TEXTDOMAIN),
                'return_value' => 'yes',
            ]
        );

        $this->start_popover();

        $this->add_responsive_control(
            'image_offset_x',
            [
                'label' => __('Offset Left', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'offset_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                ],
                'render_type' => 'ui'
            ]
        );

        $this->add_responsive_control(
            'image_offset_y',
            [
                'label' => __('Offset Top', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'offset_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    // Left image position styles
                    '(desktop){{WRAPPER}}.sa-el-card--left .sa-el-card-body' => 'margin-left: {{image_offset_x.SIZE || 0}}{{UNIT}}; flex: 0 0 calc((100% - {{image_width.SIZE || 50}}{{image_width.UNIT}}) + (-1 * {{image_offset_x.SIZE || 0}}{{UNIT}})); max-width: calc((100% - {{image_width.SIZE || 50}}{{image_width.UNIT}}) + (-1 * {{image_offset_x.SIZE || 0}}{{UNIT}}));',
                    '(tablet){{WRAPPER}}.sa-el-card--left .sa-el-card-body' => 'margin-left: {{image_offset_x_tablet.SIZE || 0}}{{UNIT}}; flex: 0 0 calc((100% - {{image_width_tablet.SIZE || 50}}{{image_width_tablet.UNIT}}) + (-1 * {{image_offset_x_tablet.SIZE || 0}}{{UNIT}})); max-width: calc((100% - {{image_width_tablet.SIZE || 50}}{{image_width_tablet.UNIT}}) + (-1 * {{image_offset_x_tablet.SIZE || 0}}{{UNIT}}));',
                    '(mobile){{WRAPPER}}.sa-el-card--left .sa-el-card-body' => 'margin-left: {{image_offset_x_mobile.SIZE || 0}}{{UNIT}}; flex: 0 0 calc((100% - {{image_width_mobile.SIZE || 50}}{{image_width_mobile.UNIT}}) + (-1 * {{image_offset_x_mobile.SIZE || 0}}{{UNIT}})); max-width: calc((100% - {{image_width_mobile.SIZE || 50}}{{image_width_mobile.UNIT}}) + (-1 * {{image_offset_x_mobile.SIZE || 0}}{{UNIT}}));',
                    // Image right position styles
                    '(desktop){{WRAPPER}}.sa-el-card--right .sa-el-card-body' => 'margin-right: calc(-1 * {{image_offset_x.SIZE || 0}}{{UNIT}}); flex: 0 0 calc((100% - {{image_width.SIZE || 50}}{{image_width.UNIT}}) + {{image_offset_x.SIZE || 0}}{{UNIT}}); max-width: calc((100% - {{image_width.SIZE || 50}}{{image_width.UNIT}}) + {{image_offset_x.SIZE || 0}}{{UNIT}});',
                    '(tablet){{WRAPPER}}.sa-el-card--right .sa-el-card-body' => 'margin-right: calc(-1 * {{image_offset_x_tablet.SIZE || 0}}{{UNIT}}); flex: 0 0 calc((100% - {{image_width_tablet.SIZE || 50}}{{image_width_tablet.UNIT}}) + {{image_offset_x_tablet.SIZE || 0}}{{UNIT}}); max-width: calc((100% - {{image_width_tablet.SIZE || 50}}{{image_width_tablet.UNIT}}) + {{image_offset_x_tablet.SIZE || 0}}{{UNIT}});',
                    '(mobile){{WRAPPER}}.sa-el-card--right .sa-el-card-body' => 'margin-right: calc(-1 * {{image_offset_x_mobile.SIZE || 0}}{{UNIT}}); flex: 0 0 calc((100% - {{image_width_mobile.SIZE || 50}}{{image_width_mobile.UNIT}}) + {{image_offset_x_mobile.SIZE || 0}}{{UNIT}}); max-width: calc((100% - {{image_width_mobile.SIZE || 50}}{{image_width_mobile.UNIT}}) + {{image_offset_x_mobile.SIZE || 0}}{{UNIT}});',
                    // Image translate styles
                    '(desktop){{WRAPPER}} .sa-el-card-figure' => '-ms-transform: translate({{image_offset_x.SIZE || 0}}{{UNIT}}, {{image_offset_y.SIZE || 0}}{{UNIT}}); -webkit-transform: translate({{image_offset_x.SIZE || 0}}{{UNIT}}, {{image_offset_y.SIZE || 0}}{{UNIT}}); transform: translate({{image_offset_x.SIZE || 0}}{{UNIT}}, {{image_offset_y.SIZE || 0}}{{UNIT}});',
                    '(tablet){{WRAPPER}} .sa-el-card-figure' => '-ms-transform: translate({{image_offset_x_tablet.SIZE || 0}}{{UNIT}}, {{image_offset_y_tablet.SIZE || 0}}{{UNIT}}); -webkit-transform: translate({{image_offset_x_tablet.SIZE || 0}}{{UNIT}}, {{image_offset_y_tablet.SIZE || 0}}{{UNIT}}); transform: translate({{image_offset_x_tablet.SIZE || 0}}{{UNIT}}, {{image_offset_y_tablet.SIZE || 0}}{{UNIT}});',
                    '(mobile){{WRAPPER}} .sa-el-card-figure' => '-ms-transform: translate({{image_offset_x_mobile.SIZE || 0}}{{UNIT}}, {{image_offset_y_mobile.SIZE || 0}}{{UNIT}}); -webkit-transform: translate({{image_offset_x_mobile.SIZE || 0}}{{UNIT}}, {{image_offset_y_mobile.SIZE || 0}}{{UNIT}}); transform: translate({{image_offset_x_mobile.SIZE || 0}}{{UNIT}}, {{image_offset_y_mobile.SIZE || 0}}{{UNIT}});',
                    // Card body styles
                    '{{WRAPPER}}.sa-el-card--top .sa-el-card-body' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_popover();

        $this->add_responsive_control(
            'image_padding',
            [
                'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-card-figure > img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'selector' => '{{WRAPPER}} .sa-el-card-figure > img',
            ]
        );

        $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-card-figure > img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'image_box_shadow',
                'exclude' => [
                    'box_shadow_position',
                ],
                'selector' => '{{WRAPPER}} .sa-el-card-figure > img',
                'separator' => 'after'
            ]
        );

        $this->start_controls_tabs(
            '_tabs_image_effects',
            [
                'separator' => 'before'
            ]
        );

        $this->start_controls_tab(
            '_tab_image_effects_normal',
            [
                'label' => __('Normal', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'image_opacity',
            [
                'label' => __('Opacity', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0.10,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-card-figure > img' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Css_Filter::get_type(),
            [
                'name' => 'image_css_filters',
                'selector' => '{{WRAPPER}} .sa-el-card-figure > img',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'hover',
            [
                'label' => __('Hover', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'image_opacity_hover',
            [
                'label' => __('Opacity', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0.10,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-card-figure:hover > img' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Css_Filter::get_type(),
            [
                'name' => 'image_css_filters_hover',
                'selector' => '{{WRAPPER}} .sa-el-card-figure:hover > img',
            ]
        );

        $this->add_control(
            'image_background_hover_transition',
            [
                'label' => __('Transition Duration', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 3,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-card-figure > img' => 'transition-duration: {{SIZE}}s',
                ],
            ]
        );

        $this->add_control(
            'hover_animation',
            [
                'label' => __('Hover Animation', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HOVER_ANIMATION,
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_badge',
            [
                'label' => __('Badge', SA_ELEMENTOR_TEXTDOMAIN),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'badge_position',
            [
                'label' => __('Position', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'top-left'  => __('Top Left', SA_ELEMENTOR_TEXTDOMAIN),
                    'top-center'  => __('Top Center', SA_ELEMENTOR_TEXTDOMAIN),
                    'top-right'  => __('Top Right', SA_ELEMENTOR_TEXTDOMAIN),
                    'middle-left'  => __('Middle Left', SA_ELEMENTOR_TEXTDOMAIN),
                    'middle-center'  => __('Middle Center', SA_ELEMENTOR_TEXTDOMAIN),
                    'middle-right'  => __('Middle Right', SA_ELEMENTOR_TEXTDOMAIN),
                    'bottom-left'  => __('Bottom Left', SA_ELEMENTOR_TEXTDOMAIN),
                    'bottom-center'  => __('Bottom Center', SA_ELEMENTOR_TEXTDOMAIN),
                    'bottom-right'  => __('Bottom Right', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                'default' => 'top-right',
            ]
        );

        $this->add_control(
            'badge_offset_toggle',
            [
                'label' => __('Offset', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'label_off' => __('None', SA_ELEMENTOR_TEXTDOMAIN),
                'label_on' => __('Custom', SA_ELEMENTOR_TEXTDOMAIN),
                'return_value' => 'yes',
            ]
        );

        $this->start_popover();

        $this->add_responsive_control(
            'badge_offset_x',
            [
                'label' => __('Offset Left', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'badge_offset_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                ],
                'render_type' => 'ui'
            ]
        );

        $this->add_responsive_control(
            'badge_offset_y',
            [
                'label' => __('Offset Top', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'badge_offset_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '(desktop){{WRAPPER}} .sa-el-card-badge' => '-ms-transform: translate({{badge_offset_x.SIZE || 0}}{{UNIT}}, {{badge_offset_y.SIZE || 0}}{{UNIT}}); -webkit-transform: translate({{badge_offset_x.SIZE || 0}}{{UNIT}}, {{badge_offset_y.SIZE || 0}}{{UNIT}}); transform: translate({{badge_offset_x.SIZE || 0}}{{UNIT}}, {{badge_offset_y.SIZE || 0}}{{UNIT}});',
                    '(tablet){{WRAPPER}} .sa-el-card-badge' => '-ms-transform: translate({{badge_offset_x_tablet.SIZE || 0}}{{UNIT}}, {{badge_offset_y_tablet.SIZE || 0}}{{UNIT}}); -webkit-transform: translate({{badge_offset_x_tablet.SIZE || 0}}{{UNIT}}, {{badge_offset_y_tablet.SIZE || 0}}{{UNIT}}); transform: translate({{badge_offset_x_tablet.SIZE || 0}}{{UNIT}}, {{badge_offset_y_tablet.SIZE || 0}}{{UNIT}});',
                    '(mobile){{WRAPPER}} .sa-el-card-badge' => '-ms-transform: translate({{badge_offset_x_mobile.SIZE || 0}}{{UNIT}}, {{badge_offset_y_mobile.SIZE || 0}}{{UNIT}}); -webkit-transform: translate({{badge_offset_x_mobile.SIZE || 0}}{{UNIT}}, {{badge_offset_y_mobile.SIZE || 0}}{{UNIT}}); transform: translate({{badge_offset_x_mobile.SIZE || 0}}{{UNIT}}, {{badge_offset_y_mobile.SIZE || 0}}{{UNIT}});',
                ],
            ]
        );
        $this->end_popover();

        $this->add_responsive_control(
            'badge_padding',
            [
                'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-card-badge' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'badge_color',
            [
                'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-card-badge' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'badge_bg_color',
            [
                'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#FE246E',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-card-badge' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'badge_border',
                'selector' => '{{WRAPPER}} .sa-el-card-badge',
            ]
        );

        $this->add_responsive_control(
            'badge_border_radius',
            [
                'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-card-badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'badge_box_shadow',
                'exclude' => [
                    'box_shadow_position',
                ],
                'selector' => '{{WRAPPER}} .sa-el-card-badge',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'badge_typography',
                'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
                'exclude' => [
                    'line_height'
                ],
                'default' => [
                    'font_size' => ['']
                ],
                'selector' => '{{WRAPPER}} .sa-el-card-badge',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __('Title & Description', SA_ELEMENTOR_TEXTDOMAIN),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __('Content Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-card-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            '_heading_title',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Title', SA_ELEMENTOR_TEXTDOMAIN),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => __('Bottom Spacing', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-card-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa-el-card-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .sa-el-card-title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_control(
            '_heading_description',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Description', SA_ELEMENTOR_TEXTDOMAIN),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'description_spacing',
            [
                'label' => __('Bottom Spacing', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-card-text' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa-el-card-text' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .sa-el-card-text',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => __('Button', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-card-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .sa-el-card-btn',
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .sa-el-card-btn',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-card-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .sa-el-card-btn',
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs('_tabs_button');

        $this->start_controls_tab(
            '_tab_button_normal',
            [
                'label' => __('Normal', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-card-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#FE246E',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-card-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_button_hover',
            [
                'label' => __('Hover', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa-el-card-btn:hover, {{WRAPPER}} .sa-el-card-btn:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa-el-card-btn:hover, {{WRAPPER}} .sa-el-card-btn:focus' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color',
            [
                'label' => __('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'button_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-card-btn:hover, {{WRAPPER}} .sa-el-card-btn:focus' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }
    
	protected function render() {
        $settings = $this->get_settings_for_display();

        $this->add_inline_editing_attributes( 'badge_text', 'none' );
        $this->add_render_attribute(
            'badge_text',
            'class',
            ['sa-el-card-badge', sprintf( 'sa-el-card-badge--%s', esc_attr( $settings['badge_position'] ) )]
        );

        $this->add_inline_editing_attributes( 'title', 'none' );
        $this->add_render_attribute( 'title', 'class', 'sa-el-card-title' );

        $this->add_inline_editing_attributes( 'description', 'basic' );
        $this->add_render_attribute( 'description', 'class', 'sa-el-card-text' );

        $this->add_inline_editing_attributes( 'button_text', 'none' );
        $this->add_render_attribute( 'button_text', 'class', 'sa-el-card-btn-text' );

        $this->add_render_attribute( 'button', 'class', 'sa-el-card-btn' );
        $this->add_render_attribute( 'button', 'href', esc_url( $settings['button_link']['url'] ) );
        if ( ! empty( $settings['button_link']['is_external'] ) ) {
            $this->add_render_attribute( 'button', 'target', '_blank' );
        }
        if ( ! empty( $settings['button_link']['nofollow'] ) ) {
            $this->add_render_attribute( 'button', 'rel', 'nofollow' );
        }
        ?>

        <?php if ( $settings['image']['url'] || $settings['image']['id'] ) :
            $this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
            $this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['image'] ) );
            $this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['image'] ) );
            ?>
            <figure class="sa-el-card-figure">
                <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' ); ?>
                <?php if ( $settings['badge_text'] ) : ?>
                    <div <?php echo $this->get_render_attribute_string( 'badge_text' ); ?>><?php echo esc_html( $settings['badge_text'] ); ?></div>
                <?php endif; ?>
            </figure>
        <?php endif; ?>

        <div class="sa-el-card-body">

            <?php
            if ( $settings['title_tag'] ) :
                printf( '<%1$s %2$s>%3$s</%1$s>',
                    tag_escape( $settings['title_tag'] ),
                    $this->get_render_attribute_string( 'title' ),
                    esc_html( $settings['title' ] )
                    );
            endif;
            ?>

            <?php if ( $settings['description'] ) : ?>
                <div <?php echo $this->get_render_attribute_string( 'description' ); ?>>
                    <p><?php echo wp_kses_data( $settings['description'] ); ?></p>
                </div>
            <?php endif; ?>

            <?php
            if ( $settings['button_text'] && empty( $settings['button_icon'] ) ) :
                printf( '<a %1$s>%2$s</a>',
                    $this->get_render_attribute_string( 'button' ),
                    sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) )
                    );
            elseif ( empty( $settings['button_text'] ) && $settings['button_icon'] ) :
                printf( '<a %1$s>%2$s</a>',
                    $this->get_render_attribute_string( 'button' ),
                    sprintf( '<i class="%1$s"></i>', esc_attr( $settings['button_icon'] ) )
                );
            elseif ( $settings['button_text'] && $settings['button_icon'] ) :
                if ( $settings['button_icon_position'] === 'before' ) :
                    $this->add_render_attribute( 'button', 'class', 'sa-el-card-btn--icon-before' );
                    $btn_before = sprintf( '<i class="sa-el-card-btn-icon %1$s"></i>', esc_attr( $settings['button_icon'] ) );
                    $btn_after = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) );
                else :
                    $this->add_render_attribute( 'button', 'class', 'sa-el-card-btn--icon-after' );
                    $btn_before = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) );
                    $btn_after = sprintf( '<i class="sa-el-card-btn-icon %1$s"></i>', esc_attr( $settings['button_icon'] ) );
                endif;
                printf( '<a %1$s>%2$s %3$s</a>',
                    $this->get_render_attribute_string( 'button' ),
                    $btn_before,
                    $btn_after
                );
            endif;
            ?>
        </div>
        <?php
    }

   
}
