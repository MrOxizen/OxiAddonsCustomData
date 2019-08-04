<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Filterable_Gallery;

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Scheme_Typography as Scheme_Typography;
use \Elementor\Widget_Base as Widget_Base;

class Filterable_Gallery extends Widget_Base
{

    public function get_name()
    {
        return 'sa_el_filterable_gallery';
    }

    public function get_title()
    {
        return esc_html__('Filterable Gallery', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon()
    {
        return 'eicon-gallery-grid  oxi-el-admin-icon';
    }

    public function get_categories()
    {
        return ['sa-el-addons'];
    }

    protected function _register_controls()
    {
        /**
         * Filter Gallery Settings
         */
        $this->start_controls_section(
            'sa_el_section_fg_settings',
            [
                'label' => esc_html__('Settings', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'sa_el_fg_items_to_show',
            [
                'label' => esc_html__('Items to show', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => 6,
            ]
        );

        $this->add_control(
            'sa_el_fg_filter_duration',
            [
                'label' => esc_html__('Animation Duration (ms)', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => 500,
            ]
        );

        $this->add_responsive_control(
            'columns',
            [
                'label' => __('Columns', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => '3',
                'tablet_default' => '2',
                'mobile_default' => '1',
                'options' => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                ],
                'prefix_class' => 'elementor-grid%s-',
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'sa_el_fg_grid_style',
            [
                'label' => esc_html__('Layout', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'grid',
                'options' => [
                    'grid' => esc_html__('Grid', SA_ELEMENTOR_TEXTDOMAIN),
                    'masonry' => esc_html__('Masonry', SA_ELEMENTOR_TEXTDOMAIN),
                ],
            ]
        );

        $this->add_control(
            'sa_el_fg_grid_item_height',
            [
                'label' => esc_html__('Image Height', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'default' => '300',
                'condition' => [
                    'sa_el_fg_grid_style' => 'grid',
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_filterable_gallery_item_wrap .sa_el_gallery_grid_item .gallery-item-thumbnail-wrap' => 'height: {{VALUE}}px;',
                ],
            ]
        );

        $this->add_control(
            'sa_el_fg_caption_style',
            [
                'label' => esc_html__('Caption Style', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'hoverer',
                'options' => [
                    'hoverer' => __('Overlay', SA_ELEMENTOR_TEXTDOMAIN),
                    'card' => __('Card', SA_ELEMENTOR_TEXTDOMAIN),
                ],
            ]
        );

        $this->add_control(
            'sa_el_fg_grid_hover_style',
            [
                'label' => esc_html__('Hover Style', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'sa_el_slide_up',
                'options' => [
                    'sa_el_none' => esc_html__('None', SA_ELEMENTOR_TEXTDOMAIN),
                    'sa_el_slide_up' => esc_html__('Slide In Up', SA_ELEMENTOR_TEXTDOMAIN),
                    'sa_el_fade_in' => esc_html__('Fade In', SA_ELEMENTOR_TEXTDOMAIN),
                    'sa_el_zoom_in' => esc_html__('Zoom In ', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                'condition' => [
                    'sa_el_fg_caption_style' => 'hoverer',
                ],
            ]
        );
        $this->add_control(
            'sa_el_fg_grid_hover_transition',
            [
                'label' => esc_html__('Hover Transition', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 500,
                ],
                'range' => [
                    'px' => [
                        'max' => 4000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .gallery-item-caption-wrap' => 'transition: {{SIZE}}ms;',
                ],
                'condition' => [
                    'sa_el_fg_grid_hover_style!' => 'sa_el_none',
                ],
            ]
        );

        $this->add_control(
            'sa_el_fg_show_popup',
            [
                'label' => esc_html__('Link to', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'buttons',
                'options' => [
                    'none' => esc_html__('None', SA_ELEMENTOR_TEXTDOMAIN),
                    'media' => esc_html__('Media', SA_ELEMENTOR_TEXTDOMAIN),
                    'buttons' => esc_html__('Buttons', SA_ELEMENTOR_TEXTDOMAIN),
                ],
            ]
        );

        $this->add_control(
            'sa_el_section_fg_zoom_icon',
            [
                'label' => esc_html__('Lightbox Icon', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::ICON,
                'default' => 'fa fa-search-plus',
                'condition' => [
                    'sa_el_fg_show_popup' => 'buttons',
                ],
            ]
        );

        $this->add_control(
            'sa_el_section_fg_link_icon',
            [
                'label' => esc_html__('Link Icon', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::ICON,
                'default' => 'fa fa-link',
                'condition' => [
                    'sa_el_fg_show_popup' => 'buttons',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * Filter Gallery Control Settings
         */
        $this->start_controls_section(
            'sa_el_section_fg_control_settings',
            [
                'label' => esc_html__('Filterable Controls', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'filter_enable',
            [
                'label' => __('Enable Filter', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'sa_el_fg_all_label_text',
            [
                'label' => esc_html__('Gallery All Label', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'default' => 'All Item',
                'condition' => [
                    'filter_enable' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'sa_el_fg_controls',
            [
                'type' => Controls_Manager::REPEATER,
                'seperator' => 'before',
                'default' => [
                    ['sa_el_fg_control' => 'Gallery Item'],
                ],
                'fields' => [
                    [
                        'name' => 'sa_el_fg_control',
                        'label' => esc_html__('List Item', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__('Gallery Item', SA_ELEMENTOR_TEXTDOMAIN),
                    ],
                ],
                'title_field' => '{{sa_el_fg_control}}',
            ]
        );

        $this->end_controls_section();

        /**
         * Filter Gallery Grid Settings
         */
        $this->start_controls_section(
            'sa_el_section_fg_grid_settings',
            [
                'label' => esc_html__('Gallery Items', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'photo_gallery',
            [
                'label' => __('Enable Photo Gallery', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'sa_el_fg_gallery_items',
            [
                'type' => Controls_Manager::REPEATER,
                'seperator' => 'before',
                'default' => [
                    ['sa_el_fg_gallery_item_name' => 'Gallery Item Name'],
                    ['sa_el_fg_gallery_item_name' => 'Gallery Item Name'],
                    ['sa_el_fg_gallery_item_name' => 'Gallery Item Name'],
                    ['sa_el_fg_gallery_item_name' => 'Gallery Item Name'],
                    ['sa_el_fg_gallery_item_name' => 'Gallery Item Name'],
                    ['sa_el_fg_gallery_item_name' => 'Gallery Item Name'],
                ],
                'fields' => [
                    [
                        'name' => 'fg_video_gallery_switch',
                        'label' => __('Video Gallery?', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::SWITCHER,
                        'default' => 'false',
                        'label_on' => esc_html__('Yes', SA_ELEMENTOR_TEXTDOMAIN),
                        'label_off' => esc_html__('No', SA_ELEMENTOR_TEXTDOMAIN),
                        'return_value' => 'true',
                    ],
                    [
                        'name' => 'sa_el_fg_gallery_item_video_link',
                        'label' => esc_html__('Video Link', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'https://www.youtube.com/',
                        'condition' => [
                            'fg_video_gallery_switch' => 'true',
                        ],
                    ],
                    [
                        'name' => 'sa_el_fg_gallery_control_name',
                        'label' => esc_html__('Control Name', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => '',
                        'description' => __('Use the gallery control name from Control Settings. Separate multiple items with comma (e.g. <strong>Gallery Item, Gallery Item 2</strong>)', SA_ELEMENTOR_TEXTDOMAIN),
                    ],
                    [
                        'name' => 'sa_el_fg_gallery_item_name',
                        'label' => esc_html__('Item Name', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__('Gallery item name', SA_ELEMENTOR_TEXTDOMAIN),
                    ],
                    [
                        'name' => 'sa_el_fg_gallery_item_content',
                        'label' => esc_html__('Item Content', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::TEXTAREA,
                        'label_block' => true,
                        'default' => esc_html__('Consectetur adipisicing elit. Lorem ipsum dolor sit amet,  Quidem, provident.', SA_ELEMENTOR_TEXTDOMAIN),
                    ],
                    [
                        'name' => 'sa_el_fg_gallery_img',
                        'label' => esc_html__('Image', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => 'https://www.shortcode-addons.com/wp-content/uploads/2019/07/black-background-camera-color-1619654-1.jpg',
                        ],
                    ],
                    [
                        'name' => 'fg_video_gallery_play_icon',
                        'label' => __('Video play icon', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => 'https://www.shortcode-addons.com/wp-content/uploads/2019/07/play-icon.png',
                        ],
                        'condition' => [
                            'fg_video_gallery_switch' => 'true',
                        ],
                    ],
                    [
                        'name' => 'sa_el_fg_gallery_lightbox',
                        'label' => __('Gallery Lightbox Button?', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::SWITCHER,
                        'default' => 'true',
                        'label_on' => esc_html__('Yes', SA_ELEMENTOR_TEXTDOMAIN),
                        'label_off' => esc_html__('No', SA_ELEMENTOR_TEXTDOMAIN),
                        'return_value' => 'true',
                        'condition' => [
                            'fg_video_gallery_switch!' => 'true',
                        ],
                    ],
                    [
                        'name' => 'sa_el_fg_gallery_link',
                        'label' => __('Gallery Link Button?', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::SWITCHER,
                        'default' => 'true',
                        'label_on' => esc_html__('Yes', SA_ELEMENTOR_TEXTDOMAIN),
                        'label_off' => esc_html__('No', SA_ELEMENTOR_TEXTDOMAIN),
                        'return_value' => 'true',
                        'condition' => [
                            'fg_video_gallery_switch!' => 'true',
                        ],
                    ],
                    [
                        'name' => 'sa_el_fg_gallery_img_link',
                        'type' => Controls_Manager::URL,
                        'label_block' => true,
                        'default' => [
                            'url' => '#',
                            'is_external' => '',
                        ],
                        'show_external' => true,
                        'condition' => [
                            'fg_video_gallery_switch!' => 'true',
                            'sa_el_fg_gallery_link' => 'true',
                        ],
                    ],
                ],
                'title_field' => '{{sa_el_fg_gallery_item_name}}',
            ]
        );

        $this->end_controls_section();

        /**
         * Content Tab: Gallery Load More Button
         */
        $this->start_controls_section(
            'section_pagination',
            [
                'label' => __('Load More Button', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'pagination',
            [
                'label' => __('Load More Button', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'false',
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'images_per_page',
            [
                'label' => __('Images Per Page', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'default' => 6,
                'condition' => [
                    'pagination' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'load_more_text',
            [
                'label' => __('Button Text', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'default' => __('Load More', SA_ELEMENTOR_TEXTDOMAIN),
                'condition' => [
                    'pagination' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'nomore_items_text',
            [
                'label' => __('No More Items Text', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'default' => __('No more items!', SA_ELEMENTOR_TEXTDOMAIN),
                'condition' => [
                    'pagination' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'button_size',
            [
                'label' => __('Size', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'sm',
                'options' => [
                    'xs' => __('Extra Small', SA_ELEMENTOR_TEXTDOMAIN),
                    'sm' => __('Small', SA_ELEMENTOR_TEXTDOMAIN),
                    'md' => __('Medium', SA_ELEMENTOR_TEXTDOMAIN),
                    'lg' => __('Large', SA_ELEMENTOR_TEXTDOMAIN),
                    'xl' => __('Extra Large', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                'condition' => [
                    'pagination' => 'yes',
                    'load_more_text!' => '',
                ],
            ]
        );

        $this->add_control(
            'load_more_icon',
            [
                'label' => __('Button Icon', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::ICON,
                'default' => '',
                'condition' => [
                    'pagination' => 'yes',
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
                    'pagination' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'load_more_align',
            [
                'label' => __('Alignment', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::CHOOSE,
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
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_filterable_gallery_loadmore' => 'text-align: {{VALUE}};',
                ],
                'condition' => [
                    'pagination' => 'yes',
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
         * Tab Style (Filterable Gallery Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_fg_style_settings',
            [
                'label' => esc_html__('General Style', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sa_el_fg_bg_color',
            [
                'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_filter_gallery_wrapper' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_el_fg_container_padding',
            [
                'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_filter_gallery_wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_el_fg_container_margin',
            [
                'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_filter_gallery_wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sa_el_fg_border',
                'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .sa_el_filter_gallery_wrapper',
            ]
        );

        $this->add_control(
            'sa_el_fg_border_radius',
            [
                'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 0,
                ],
                'range' => [
                    'px' => [
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_filter_gallery_wrapper' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'eael_fg_shadow',
                'selector' => '{{WRAPPER}} .sa_el_filter_gallery_wrapper',
            ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Filterable Gallery Control Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_fg_control_style_settings',
            [
                'label' => esc_html__('Control Style', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'sa_el_fg_control_padding',
            [
                'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_filter_gallery_control ul li.control' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_el_fg_control_margin',
            [
                'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_filter_gallery_control ul li.control' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_el_fg_control_typography',
                'selector' => '{{WRAPPER}} .sa_el_filter_gallery_control ul li.control',
            ]
        );
        // Tabs
        $this->start_controls_tabs('sa_el_fg_control_tabs');

        // Normal State Tab
        $this->start_controls_tab('sa_el_fg_control_normal', ['label' => esc_html__('Normal', SA_ELEMENTOR_TEXTDOMAIN)]);

        $this->add_control(
            'sa_el_fg_control_normal_text_color',
            [
                'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '##ff4e64',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_filter_gallery_control ul li.control' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_fg_control_normal_bg_color',
            [
                'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_filter_gallery_control ul li.control' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sa_el_fg_control_normal_border',
                'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .sa_el_filter_gallery_control ul > li.control',
            ]
        );

        $this->add_control(
            'sa_el_fg_control_normal_border_radius',
            [
                'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 0,
                ],
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_filter_gallery_control ul > li.control' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'sa_el_fg_control_shadow',
                'selector' => '{{WRAPPER}} .sa_el_filter_gallery_control ul li.control',
                'separator' => 'before',
            ]
        );

        $this->end_controls_tab();

        // Active State Tab
        $this->start_controls_tab('sa_el_cta_btn_hover', ['label' => esc_html__('Active', SA_ELEMENTOR_TEXTDOMAIN)]);

        $this->add_control(
            'sa_el_fg_control_active_text_color',
            [
                'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_filter_gallery_control ul li.active' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_fg_control_active_bg_color',
            [
                'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#ff4e64',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_filter_gallery_control ul li.control.active' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sa_el_fg_control_active_border',
                'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .sa_el_filter_gallery_control ul > li.control.active',
            ]
        );

        $this->add_control(
            'sa_el_fg_control_active_border_radius',
            [
                'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 0,
                ],
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_filter_gallery_control ul li.control.active' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'sa_el_fg_control_active_shadow',
                'selector' => '{{WRAPPER}} .sa_el_filter_gallery_control ul li.control.active',
                'separator' => 'before',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Filterable Gallery Item Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_fg_item_style_settings',
            [
                'label' => esc_html__('Item Style', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'sa_el_fg_item_container_padding',
            [
                'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_filterable_gallery_item_wrap .sa_el_gallery_grid_item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_el_fg_item_container_margin',
            [
                'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_filterable_gallery_item_wrap .sa_el_gallery_grid_item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sa_el_fg_item_border',
                'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .sa_el_filterable_gallery_item_wrap .sa_el_gallery_grid_item',
            ]
        );

        $this->add_control(
            'sa_el_fg_item_border_radius',
            [
                'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 0,
                ],
                'range' => [
                    'px' => [
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_filterable_gallery_item_wrap .sa_el_gallery_grid_item' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'sa_el_fg_item_shadow',
                'selector' => '{{WRAPPER}} .sa_el_filterable_gallery_item_wrap .sa_el_gallery_grid_item',
            ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Filterable Gallery Hoverer Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_fg_item_cap_style_settings',
            [
                'label' => esc_html__('Item Hover Style', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'sa_el_fg_caption_style' => 'hoverer',
                ],
            ]
        );

        $this->add_control(
            'sa_el_fg_item_cap_bg_color',
            [
                'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => 'rgba(0,0,0,0.7)',
                'selectors' => [
                    '{{WRAPPER}} .gallery-item-caption-wrap .gallery-item-hoverer-bg' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_el_fg_item_cap_container_padding',
            [
                'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .gallery-item-caption-wrap.caption-style-hoverer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_fg_item_hover_title_typography_heading',
            [
                'label' => esc_html__('Title Typography', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'sa_el_fg_item_hover_title_color',
            [
                'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .gallery-item-caption-wrap.caption-style-hoverer .fg-item-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_fg_item_hover_title_hover_color',
            [
                'label' => esc_html__('Hover Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery-item-caption-wrap.caption-style-hoverer .fg-item-title:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_el_fg_item_hover_title_typography',
                'selector' => '{{WRAPPER}} .gallery-item-caption-wrap.caption-style-hoverer .fg-item-title',
            ]
        );

        $this->add_control(
            'sa_el_fg_item_hover_content_typography_heading',
            [
                'label' => esc_html__('Content Typography', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'sa_el_fg_item_hover_content_color',
            [
                'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .gallery-item-caption-wrap.caption-style-hoverer .fg-item-content' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_el_fg_item_hover_content_typography',
                'selector' => '{{WRAPPER}} .gallery-item-caption-wrap.caption-style-hoverer .fg-item-content',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'eael_fg_item_cap_border',
                'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .gallery-item-caption-wrap.caption-style-hoverer',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'sa_el_fg_item_cap_shadow',
                'selector' => '{{WRAPPER}} .gallery-item-thumbnail-wrap .gallery-item-caption-wrap',
            ]
        );

        $this->add_responsive_control(
            'sa_el_fg_item_hoverer_content_alignment',
            [
                'label' => esc_html__('Content Alignment', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => true,
                'separator' => 'before',
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
                'prefix_class' => 'sa_el-fg-hoverer-content-align-',
            ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Filterable Gallery card Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_fg_item_card_hover_style',
            [
                'label' => esc_html__('Item Hover Style', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'sa_el_fg_caption_style' => 'card',
                ],
            ]
        );

        $this->add_control(
            'sa_el_fg_item_card_hover_bg_color',
            [
                'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => 'rgba(0,0,0,0.7)',
                'selectors' => [
                    '{{WRAPPER}} .gallery-item-caption-wrap.card-hover-bg' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Video item Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_fg_video_item_style',
            [
                'label' => esc_html__('Video item hover', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sa_el_fg_video_item_hover_bg',
            [
                'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => 'rgba(0, 0, 0, .7)',
                'selectors' => [
                    '{{WRAPPER}} .video-popup-bg' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_fg_video_item_hover_bg_trans',
            [
                'label' => esc_html__('Background transition', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'px' => 350,
                ],
                'range' => [
                    'px' => [
                        'max' => 4000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .video-popup-bg' => 'transition: {{SIZE}}ms;',
                ],
            ]
        );

        $this->add_control(
            'sa_el_fg_video_item_hover_icon_size',
            [
                'label' => esc_html__('Icon size', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'default' => [
                    'px' => 62,
                ],
                'range' => [
                    'px' => [
                        'max' => 150,
                    ],
                    'em' => [
                        'max' => 150,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .video-popup > img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_fg_video_item_icon_hover_scale',
            [
                'label' => esc_html__('Hover icon scale', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'default' => '1.1',
                'selectors' => [
                    '{{WRAPPER}} .video-popup:hover > img' => 'transform: scale({{VALUE}});',
                ],
            ]
        );

        $this->add_control(
            'sa_el_fg_video_item_icon_hover_scale_transition',
            [
                'label' => esc_html__('Icon transition', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'px' => 350,
                ],
                'range' => [
                    'px' => [
                        'max' => 4000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .video-popup > img' => 'transition: {{SIZE}}ms;',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Card Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_fg_item_content_style_settings',
            [
                'label' => esc_html__('Item Card Style', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'sa_el_fg_caption_style' => 'card',
                ],
            ]
        );

        $this->add_control(
            'sa_el_fg_item_content_bg_color',
            [
                'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#f1f2f9',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_filterable_gallery_item_wrap .gallery-item-caption-wrap.caption-style-card' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_el_fg_item_content_container_padding',
            [
                'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_filterable_gallery_item_wrap .gallery-item-caption-wrap.caption-style-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sa_el_fg_item_content_border',
                'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .sa_el_filterable_gallery_item_wrap .gallery-item-caption-wrap.caption-style-card',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'sa_el_fg_item_content_shadow',
                'selector' => '{{WRAPPER}} .sa_el_filterable_gallery_item_wrap .gallery-item-caption-wrap.caption-style-card',
            ]
        );

        $this->add_control(
            'sa_el_fg_item_content_title_typography_settings',
            [
                'label' => esc_html__('Title Typography', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'sa_el_fg_item_content_title_color',
            [
                'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#F56A6A',
                'selectors' => [
                    '{{WRAPPER}} .gallery-item-caption-wrap.caption-style-card .fg-item-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_fg_item_content_title_hover_color',
            [
                'label' => esc_html__('Hover Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .gallery-item-caption-wrap.caption-style-card .fg-item-title:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_el_fg_item_content_title_typography',
                'selector' => '{{WRAPPER}} .gallery-item-caption-wrap.caption-style-card .fg-item-title',
            ]
        );

        $this->add_control(
            'sa_el_fg_item_content_text_typography_settings',
            [
                'label' => esc_html__('Content Typography', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'sa_el_fg_item_content_text_color',
            [
                'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#444',
                'selectors' => [
                    '{{WRAPPER}} .gallery-item-caption-wrap.caption-style-card .fg-item-content' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_el_fg_item_content_text_typography',
                'selector' => '{{WRAPPER}} .gallery-item-caption-wrap.caption-style-card .fg-item-content',
            ]
        );

        $this->add_responsive_control(
            'sa_el_fg_item_content_alignment',
            [
                'label' => esc_html__('Content Alignment', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => true,
                'separator' => 'before',
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
                'prefix_class' => 'sa_el-fg-card-content-align-',
            ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Hoverer Icon Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_fg_item_hover_icons_style',
            [
                'label' => esc_html__('Icons Style', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sa_el_fg_item_icon_bg_color',
            [
                'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#FD576B',
                'selectors' => [
                    '{{WRAPPER}} .gallery-item-caption-wrap .gallery-item-buttons > a' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_fg_item_icon_color',
            [
                'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .gallery-item-caption-wrap .gallery-item-buttons > a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_el_fg_item_icon_padding',
            [
                'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .gallery-item-caption-wrap .gallery-item-buttons > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_el_fg_item_icon_margin',
            [
                'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .gallery-item-caption-wrap .gallery-item-buttons > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_fg_item_icon_exact_size',
            [
                'label' => esc_html__('Icon Size', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 120,
                    ],
                    'em' => [
                        'min' => 10,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .gallery-item-caption-wrap .gallery-item-buttons > a' => 'height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_fg_item_icon_size',
            [
                'label' => esc_html__('Icon Font Size', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'range' => [
                    'px' => [
                        'max' => 50,
                    ],
                    'em' => [
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 18,
                ],
                'selectors' => [
                    '{{WRAPPER}} .gallery-item-caption-wrap .gallery-item-buttons > a' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sa_el_fg_item_icon_border',
                'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .gallery-item-caption-wrap .gallery-item-buttons > a',
            ]
        );

        $this->add_control(
            'sa_el_fg_item_icon_border_radius',
            [
                'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 100,
                ],
                'range' => [
                    'px' => [
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .gallery-item-caption-wrap .gallery-item-buttons > a' => 'border-radius: {{SIZE}}px;',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Load More Button
         * -------------------------------------------------
         */
        $this->start_controls_section(
            'section_loadmore_button_style',
            [
                'label' => __('Load More Button', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'pagination' => 'yes',
                    'load_more_text!' => '',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_margin_top',
            [
                'label' => __('Top Spacing', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 80,
                        'step' => 1,
                    ],
                ],
                'size_units' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_gallery_load_more' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('tabs_eael_load_more_button_style');

        $this->start_controls_tab(
            'tab_load_more_button_normal',
            [
                'label' => __('Normal', SA_ELEMENTOR_TEXTDOMAIN),
                'condition' => [
                    'pagination' => 'yes',
                    'load_more_text!' => '',
                ],
            ]
        );

        $this->add_control(
            'load_more_button_bg_color_normal',
            [
                'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#333',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_gallery_load_more' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'pagination' => 'yes',
                    'load_more_text!' => '',
                ],
            ]
        );

        $this->add_control(
            'load_more_button_text_color_normal',
            [
                'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_gallery_load_more' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'pagination' => 'yes',
                    'load_more_text!' => '',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'load_more_button_border_normal',
                'label' => __('Border', SA_ELEMENTOR_TEXTDOMAIN),
                'placeholder' => '1px',
                'default' => '1px',
                'selector' => '{{WRAPPER}} .sa_el_gallery_load_more',
                'condition' => [
                    'pagination' => 'yes',
                    'load_more_text!' => '',
                ],
            ]
        );

        $this->add_control(
            'load_more_button_border_radius',
            [
                'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_gallery_load_more' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'pagination' => 'yes',
                    'load_more_text!' => '',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'load_more_button_typography',
                'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .sa_el_gallery_load_more',
                'condition' => [
                    'pagination' => 'yes',
                    'load_more_text!' => '',
                ],
            ]
        );

        $this->add_responsive_control(
            'load_more_button_padding',
            [
                'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_gallery_load_more' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'pagination' => 'yes',
                    'load_more_text!' => '',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'load_more_button_box_shadow',
                'selector' => '{{WRAPPER}} .sa_el_gallery_load_more',
                'condition' => [
                    'pagination' => 'yes',
                    'load_more_text!' => '',
                ],
            ]
        );

        $this->add_control(
            'load_more_button_icon_heading',
            [
                'label' => __('Button Icon', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'pagination' => 'yes',
                    'load_more_icon!' => '',
                ],
            ]
        );

        $this->add_responsive_control(
            'load_more_button_icon_margin',
            [
                'label' => __('Margin', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'placeholder' => [
                    'top' => '',
                    'right' => '',
                    'bottom' => '',
                    'left' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_gallery_load_more .sa_el_filterable_gallery_load_more_icon' => 'margin-top: {{TOP}}{{UNIT}}; margin-left: {{LEFT}}{{UNIT}}; margin-right: {{RIGHT}}{{UNIT}}; margin-bottom: {{BOTTOM}}{{UNIT}};',
                ],
                'condition' => [
                    'pagination' => 'yes',
                    'load_more_icon!' => '',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_button_hover',
            [
                'label' => __('Hover', SA_ELEMENTOR_TEXTDOMAIN),
                'condition' => [
                    'pagination' => 'yes',
                    'load_more_text!' => '',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color_hover',
            [
                'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_gallery_load_more:hover' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'pagination' => 'yes',
                    'load_more_text!' => '',
                ],
            ]
        );

        $this->add_control(
            'button_text_color_hover',
            [
                'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_gallery_load_more:hover' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'pagination' => 'yes',
                    'load_more_text!' => '',
                ],
            ]
        );

        $this->add_control(
            'button_border_color_hover',
            [
                'label' => __('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_gallery_load_more:hover' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'pagination' => 'yes',
                    'load_more_text!' => '',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow_hover',
                'selector' => '{{WRAPPER}} .sa_el_gallery_load_more:hover',
                'condition' => [
                    'pagination' => 'yes',
                    'load_more_text!' => '',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    public function sorter_class($string)
    {
        $sorter_class = strtolower($string);
        $sorter_class = str_replace(' ', '-', $sorter_class);
        $sorter_class = str_replace('&', 'and', $sorter_class);
        $sorter_class = str_replace('amp;', '', $sorter_class);
        $sorter_class = str_replace('/', 'slash', $sorter_class);

        $sorter_class = str_replace(',-', ' sa_el-cf-', $sorter_class);
        $sorter_class = str_replace('.', '-', $sorter_class);
        $sorter_class = str_replace(',', ' ', $sorter_class);
        return $sorter_class;
    }

    protected function render_filters()
    {
        $settings = $this->get_settings_for_display();
        $all_text = ($settings['sa_el_fg_all_label_text'] != '') ? $settings['sa_el_fg_all_label_text'] : esc_html__('All', SA_ELEMENTOR_TEXTDOMAIN);

        if ($settings['filter_enable'] == 'yes') {
            ?>
            <div class="sa_el_filter_gallery_control">
                <ul>
                    <?php if ($settings['sa_el_fg_all_label_text']) { ?>
                        <li class="control active" data-filter="*"><?php echo $all_text; ?></li>
                    <?php } ?>

                    <?php foreach ($settings['sa_el_fg_controls'] as $key => $control) :
                        $sorter_filter = $this->sorter_class($control['sa_el_fg_control']);
                        ?>
                        <li class="control <?php
                                            if ($key == 0 && empty($settings['sa_el_fg_all_label_text'])) {
                                                echo 'active';
                                            }
                                            ?>" data-filter=".sa_el-cf-<?php echo esc_attr($sorter_filter); ?>"><?php echo esc_html__($control['sa_el_fg_control']); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php
        }
    }

    protected function render_loadmore_button()
    {
        $settings = $this->get_settings_for_display();

        $this->add_render_attribute(
            'load-more-button',
            'class',
            [
                'sa_el_gallery_load_more',
                'elementor-button',
                'elementor-size-' . $settings['button_size'],
            ]
        );

        if ($settings['pagination'] == 'yes') {
            ?>
            <div class="sa_el_filterable_gallery_loadmore">
                <a href="#" <?php echo $this->get_render_attribute_string('load-more-button'); ?>>
                    <span class="sa_el-button-loader"></span>
                    <?php if (!empty($settings['load_more_icon']) && $settings['button_icon_position'] == 'before') { ?>
                        <span class="sa_el_filterable_gallery_load_more_icon <?php echo esc_attr($settings['load_more_icon']); ?>" aria-hidden="true"></span>
                    <?php } ?>
                    <span class="sa_el_filterable_gallery-load-more-text">
                        <?php echo $settings['load_more_text']; ?>
                    </span>
                    <?php if (!empty($settings['load_more_icon']) && $settings['button_icon_position'] == 'after') { ?>
                        <span class="sa_el_filterable_gallery_load_more_icon <?php echo esc_attr($settings['load_more_icon']); ?>" aria-hidden="true"></span>
                    <?php } ?>
                </a>
            </div>
        <?php
        }
    }

    protected function gallery_item_store()
    {
        $settings = $this->get_settings_for_display();
        $gallery_items = $settings['sa_el_fg_gallery_items'];
        $gallery_store = [];
        $counter = 0;

        foreach ($gallery_items as $gallery) {
            $gallery_store[$counter]['title'] = $gallery['sa_el_fg_gallery_item_name'];
            $gallery_store[$counter]['content'] = $gallery['sa_el_fg_gallery_item_content'];
            $gallery_store[$counter]['id'] = $gallery['_id'];
            $gallery_store[$counter]['image'] = $gallery['sa_el_fg_gallery_img'];
            $gallery_store[$counter]['image'] = $gallery['sa_el_fg_gallery_img']['url'];
            $gallery_store[$counter]['image_id'] = $gallery['sa_el_fg_gallery_img']['id'];
            $gallery_store[$counter]['maybe_link'] = $gallery['sa_el_fg_gallery_link'];
            $gallery_store[$counter]['link'] = $gallery['sa_el_fg_gallery_img_link'];
            $gallery_store[$counter]['video_gallery_switch'] = $gallery['fg_video_gallery_switch'];
            $gallery_store[$counter]['video_link'] = $gallery['sa_el_fg_gallery_item_video_link'];
            $gallery_store[$counter]['show_lightbox'] = $gallery['sa_el_fg_gallery_lightbox'];
            $gallery_store[$counter]['play_icon'] = $gallery['fg_video_gallery_play_icon'];
            $gallery_store[$counter]['controls'] = $this->sorter_class($gallery['sa_el_fg_gallery_control_name']);
            $counter++;
        }

        return $gallery_store;
    }

    protected function eael_render_fg_buttons($settings, $item)
    {
        $html = '<div class="gallery-item-buttons">';

        if (!empty($settings['sa_el_section_fg_zoom_icon']) && ($item['show_lightbox'] == true)) {
            $html .= '<a href="' . esc_url($item['image']) . '" class="sa_el_magnific_link"><i class="' . $settings['sa_el_section_fg_zoom_icon'] . '" aria-hidden="true"></i></a>';
        }

        if ($item['maybe_link'] == 'true') {
            $a_string = 'href="' . esc_url($item['link']['url']) . '"';

            if ($item['link']['nofollow']) {
                $a_string .= 'rel="nofollow"';
            }

            if ($item['link']['is_external']) {
                $a_string .= 'target="_blank"';
            }

            if (!empty($settings['sa_el_section_fg_link_icon'])) {
                $html .= '<a ' . $a_string . '><i class="' . $settings['sa_el_section_fg_link_icon'] . '" aria-hidden="true"></i></a>';
            }
        }

        $html .= '</div>';
        return $html;
    }

    protected function render_gallery_items($init_show = 0)
    {
        $settings = $this->get_settings_for_display();
        $gallery = $this->gallery_item_store();
        $gallery_markup = [];

        $caption_style = $settings['sa_el_fg_caption_style'] == 'card' ? 'caption-style-card' : 'caption-style-hoverer';

        foreach ($gallery as $item) {
            if ($item['controls'] != '') {
                $html = '<div class="sa_el_filterable_gallery_item_wrap sa_el-cf-' . $item['controls'] . '">
				<div class="sa_el_gallery_grid_item">';
            } else {
                $html = '<div class="sa_el_filterable_gallery_item_wrap">
				<div class="sa_el_gallery_grid_item">';
            }
            if ($settings['sa_el_fg_caption_style'] === 'card' && $item['video_gallery_switch'] === 'false' && $settings['sa_el_fg_show_popup'] === 'media') {
                $html .= '<a href="' . esc_url($item['image']) . '" class="sa_el_magnific_link media-content-wrap">';
            }
            $html .= '<div class="gallery-item-thumbnail-wrap">
							<img src="' . $item['image'] . '" alt="' . esc_attr(get_post_meta($item['image_id'], '_wp_attachment_image_alt', true)) . '">';

            if ($settings['sa_el_fg_show_popup'] == 'buttons' && $settings['sa_el_fg_caption_style'] === 'card') {
                $html .= '<div class="gallery-item-caption-wrap card-hover-bg caption-style-hoverer ' . $settings['sa_el_fg_grid_hover_style'] . '">';
                $html .= ($this->eael_render_fg_buttons($settings, $item));
                $html .= '</div>';
            }

            if (isset($item['video_gallery_switch']) && ($item['video_gallery_switch'] === 'true')) {
                $icon_url = isset($item['play_icon']['url']) ? $item['play_icon']['url'] : '';
                $video_url = isset($item['video_link']) ? $item['video_link'] : '#';

                $html .= '<a href="' . esc_url($video_url) . '" class="video-popup sa_el_magnific_video_link">
								<div class="video-popup-bg"></div>';

                if (!empty($icon_url)) {
                    $html .= '<img src="' . esc_url($icon_url) . '">';
                }

                $html .= '</a>';
            }

            $html .= '</div>';

            if ($settings['sa_el_fg_caption_style'] == 'card') {
                $html .= '</a>';
            }

            if ($settings['sa_el_fg_show_popup'] == 'media' && $settings['sa_el_fg_caption_style'] !== 'card') {
                $html .= '<a href="' . esc_url($item['image']) . '" class="sa_el_magnific_link media-content-wrap">';
            }

            if ($item['video_gallery_switch'] === 'false' || $settings['sa_el_fg_caption_style'] === 'card') {

                if ($settings['sa_el_fg_grid_hover_style'] !== 'sa_el_none') {


                    $html .= '<div class="gallery-item-caption-wrap ' . $caption_style . ' ' . $settings['sa_el_fg_grid_hover_style'] . '">';

                    if ('hoverer' == $settings['sa_el_fg_caption_style']) {
                        $html .= '<div class="gallery-item-hoverer-bg"></div>';
                    }

                    $html .= '<div class="gallery-item-caption-over">';

                    if (isset($item['title']) && !empty($item['title']) || isset($item['content']) && !empty($item['content'])) {
                        if (!empty($item['title'])) {
                            $html .= '<h5 class="fg-item-title">' . $item['title'] . '</h5>';
                        }
                        if (!empty($item['content'])) {
                            $html .= '<p class="fg-item-content">' . $item['content'] . '</p>';
                        }
                    }

                    if ($settings['sa_el_fg_show_popup'] == 'buttons' && $settings['sa_el_fg_caption_style'] !== 'card') {
                        $html .= ($this->eael_render_fg_buttons($settings, $item));
                    }
                    $html .= '</div>';
                    $html .= '</div>';
                }
            }

            if ($settings['sa_el_fg_show_popup'] == 'media') {
                $html .= '</a>';
            }

            $html .= '
				</div>
			</div>';

            $gallery_markup[] = $html;
        }
        return $gallery_markup;
    }

    protected function render()
    {
        $settings = $this->get_settings();

        if (!empty($settings['sa_el_fg_filter_duration'])) {
            $filter_duration = $settings['sa_el_fg_filter_duration'];
        } else {
            $filter_duration = 500;
        }

        $this->add_render_attribute(
            'gallery',
            [
                'id' => 'sa_el_filter_gallery_wrapper-' . esc_attr($this->get_id()),
                'class' => 'sa_el_filter_gallery_wrapper',
            ]
        );

        $gallery_settings = [
            'grid_style' => $settings['sa_el_fg_grid_style'],
            'popup' => $settings['sa_el_fg_show_popup'],
            'duration' => $filter_duration,
            'gallery_enabled' => $settings['photo_gallery'],
        ];

        if (\Elementor\Plugin::$instance->editor->is_edit_mode()) {
            $gallery_settings['post_id'] = \Elementor\Plugin::$instance->editor->get_post_id();
        } else {
            $gallery_settings['post_id'] = get_the_ID();
        }

        $gallery_settings['widget_id'] = $this->get_id();

        $no_more_items_text = esc_html__($settings['nomore_items_text'], SA_ELEMENTOR_TEXTDOMAIN);
        $grid_class = $settings['sa_el_fg_grid_style'] == 'grid' ? 'sa_el_filter_gallery_grid' : 'masonry';

        $this->add_render_attribute('gallery-items-wrap', [
            'class' => [
                'sa_el_filter_gallery_container',
                $grid_class
            ],
            'data-images-per-page' => $settings['images_per_page'],
            'data-total-gallery-items' => count($settings['sa_el_fg_gallery_items']),
            'data-nomore-item-text' => $no_more_items_text,
        ]);

        $this->add_render_attribute('gallery-items-wrap', 'data-settings', wp_json_encode($gallery_settings));
        $this->add_render_attribute('gallery-items-wrap', 'data-gallery-items', wp_json_encode($this->render_gallery_items()));
        $this->add_render_attribute('gallery-items-wrap', 'data-init-show', esc_attr($settings['sa_el_fg_items_to_show']));
        ?>
        <div <?php echo $this->get_render_attribute_string('gallery'); ?>>
            <?php $this->render_filters(); ?>
            <div <?php echo $this->get_render_attribute_string('gallery-items-wrap'); ?>>
                <?php
                $init_show = absint($settings['sa_el_fg_items_to_show']);

                for ($i = 0; $i < $init_show; $i++) {
                    if (array_key_exists($i, $this->render_gallery_items())) {
                        echo $this->render_gallery_items()[$i];
                    }
                }
                ?>
            </div>
            <?php
            if (\Elementor\Plugin::instance()->editor->is_edit_mode()) {
                $this->render_editor_script();
            }
            $this->render_loadmore_button();
            ?>
        </div>
    <?php
    }

    /**
     * Render masonry script
     *
     * @access protected
     */
    protected function render_editor_script()
    {
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.sa_el_filter_gallery_container').each(function() {
                    var $node_id = '<?php echo $this->get_id(); ?>',
                        $scope = $('[data-id="' + $node_id + '"]'),
                        $gallery = $(this),
                        $settings = $gallery.data('settings'),
                        $gallery_items = $gallery.data('gallery-items'),
                        $layout_mode = ($settings.grid_style == 'masonry' ? 'masonry' : 'fitRows'),
                        $gallery_enabled = ($settings.gallery_enabled == 'yes' ? true : false);

                    if ($gallery.closest($scope).length < 1) {
                        return;
                    }

                    // init isotope
                    var $isotope_gallery = $gallery.isotope({
                        itemSelector: '.sa_el_filterable_gallery_item_wrap',
                        layoutMode: $layout_mode,
                        percentPosition: true,
                        filter: $('.sa_el_filter_gallery_control .control.active', $scope).data('filter')
                    });

                    // not necessary, just in case
                    $isotope_gallery.imagesLoaded().progress(function() {
                        $isotope_gallery.isotope('layout');
                    });

                    // resize
                    $('.sa_el_filterable_gallery_item_wrap', $gallery).resize(function() {
                        $isotope_gallery.isotope('layout');
                    });

                    // filter
                    $scope.on('click', '.control', function() {
                        var $this = $(this),
                            $filterValue = $this.data('filter');

                        $this.siblings().removeClass('active');
                        $this.addClass('active');
                        $isotope_gallery.isotope({
                            filter: $filterValue
                        });
                    });

                    // popup
                    $('.sa_el_magnific_link', $scope).magnificPopup({
                        type: 'image',
                        gallery: {
                            enabled: $gallery_enabled,
                        },
                        callbacks: {
                            close: function() {
                                $('#elementor-lightbox').hide();
                            }
                        }
                    });

                    $($scope).magnificPopup({
                        delegate: '.sa_el_magnific_video_link',
                        type: 'iframe',
                        callbacks: {
                            close: function() {
                                $('#elementor-lightbox').hide();
                            }
                        }
                    });

                    // Load more button
                    $scope.on('click', '.sa_el_gallery_load_more', function(e) {
                        e.preventDefault();

                        var $this = $(this),
                            $init_show = $('.sa_el_filter_gallery_container', $scope).children('.sa_el_filterable_gallery_item_wrap').length,
                            $total_items = $gallery.data('total-gallery-items'),
                            $images_per_page = $gallery.data('images-per-page'),
                            $nomore_text = $gallery.data('nomore-item-text'),
                            $items = [];

                        if ($init_show == $total_items) {
                            $this.html('<div class="no-more-items-text">' + $nomore_text + '</div>');
                            setTimeout(function() {
                                $this.fadeOut('slow');
                            }, 600);
                        }

                        // new items html
                        for (var i = $init_show; i < ($init_show + $images_per_page); i++) {
                            $items.push($($gallery_items[i])[0]);
                        }

                        // append items
                        $gallery.append($items)
                        $isotope_gallery.isotope('appended', $items)
                        $isotope_gallery.imagesLoaded().progress(function() {
                            $isotope_gallery.isotope('layout')
                        })

                        // reinit magnificPopup
                        $('.sa_el_magnific_link', $scope).magnificPopup({
                            type: 'image',
                            gallery: {
                                enabled: $gallery_enabled
                            },
                            callbacks: {
                                close: function() {
                                    $('#elementor-lightbox').hide();
                                }
                            }
                        })
                    });

                });
            });
        </script>
    <?php
    }

    protected function content_template()
    { }
}
