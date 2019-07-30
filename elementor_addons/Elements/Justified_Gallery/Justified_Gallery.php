<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Justified_Gallery;

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

use Elementor\Group_Control_Css_Filter;
use Elementor\Repeater;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Utils;
use Elementor\Widget_Base as Widget_Base;
use \SA_ELEMENTOR_ADDONS\Classes\Bootstrap;

class Justified_Gallery extends Widget_Base {

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function get_name() {
        return 'sa_el_justified_gallery';
    }

    public function get_title() {
        return esc_html__('Justified Gallery', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon() {
        return 'eicon-gallery-justified  oxi-el-admin-icon';
    }

    public function get_categories() {
        return ['sa-el-addons'];
    }

    protected function _register_controls() {
        $this->start_controls_section(
                'sa_el_section_gallery', [
            'label' => __('Gallery', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_CONTENT,
                ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
                'filter', [
            'label' => __('Filter Name', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'placeholder' => __('Type gallery filter name', SA_ELEMENTOR_TEXTDOMAIN),
            'description' => __('Filter navigation will be built using filter name', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $repeater->add_control(
                'images', [
            'type' => Controls_Manager::GALLERY,
                ]
        );

        $this->add_control(
                'gallery', [
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'show_label' => false,
            'title_field' => 'Filter Group: {{filter}}',
            'default' => [
                [
                    'filter' => __('Shortcode Addons', SA_ELEMENTOR_TEXTDOMAIN),
                ]
            ]
                ]
        );

        $this->add_group_control(
                Group_Control_Image_Size::get_type(), [
            'name' => 'thumbnail',
            'default' => 'medium_large',
            'separator' => 'before',
            'exclude' => [
                'custom'
            ]
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                '_section_settings', [
            'label' => __('Settings', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_CONTENT,
                ]
        );

        $this->add_control(
                'show_filter', [
            'label' => __('Show Filter?', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('Yes', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('No', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => 'yes',
            'description' => __('Enable to display filter navigation. Filter navigation will be built using filter name from gallery', SA_ELEMENTOR_TEXTDOMAIN)
                ]
        );

        $this->add_control(
                'show_all_filter', [
            'label' => __('Show All Filter?', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('Yes', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('No', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => 'yes',
            'default' => 'yes',
            'description' => __('Enable to display all filter button', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'show_filter' => 'yes'
            ]
                ]
        );

        $this->add_control(
                'all_filter_label', [
            'label' => __('Filter Label', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'default' => __('All', SA_ELEMENTOR_TEXTDOMAIN),
            'placeholder' => __('Type filter label', SA_ELEMENTOR_TEXTDOMAIN),
            'description' => __('Type all filter label', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'show_all_filter' => 'yes',
                'show_filter' => 'yes'
            ]
                ]
        );



        $this->end_controls_section();


        $this->start_controls_section(
                '_section_style_image', [
            'label' => __('Image', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_responsive_control(
                'image_border_radius', [
            'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-justified-gallery-item, {{WRAPPER}} .sa-el-justified-gallery-item > img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'image_box_shadow',
            'exclude' => [
                'box_shadow_position',
            ],
            'selector' => '{{WRAPPER}} .sa-el-justified-gallery-item'
                ]
        );

        $this->add_control(
                'image_bg_color', [
            'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sa-el-justified-gallery-item' => 'background-color: {{VALUE}};'
            ]
                ]
        );

        $this->start_controls_tabs(
                '_tabs_image_effects', [
            'separator' => 'before'
                ]
        );

        $this->start_controls_tab(
                '_tab_image_effects_normal', [
            'label' => __('Normal', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'image_opacity', [
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
                '{{WRAPPER}} .sa-el-justified-gallery-item > img' => 'opacity: {{SIZE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Css_Filter::get_type(), [
            'name' => 'image_css_filters',
            'selector' => '{{WRAPPER}} .sa-el-justified-gallery-item > img',
                ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab('hover', [
            'label' => __('Hover', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'image_opacity_hover', [
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
                '{{WRAPPER}} .sa-el-justified-gallery-item:hover > img' => 'opacity: {{SIZE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Css_Filter::get_type(), [
            'name' => 'image_css_filters_hover',
            'selector' => '{{WRAPPER}} .sa-el-justified-gallery-item:hover > img',
                ]
        );

        $this->add_control(
                'image_background_hover_transition', [
            'label' => __('Transition Duration', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'max' => 3,
                    'step' => 0.1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-justified-gallery-item > img' => 'transition-duration: {{SIZE}}s',
            ],
                ]
        );

        $this->add_control(
                'image_hover_animation', [
            'label' => __('Hover Animation', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HOVER_ANIMATION,
            'default' => 'grow',
            'label_block' => false,
                ]
        );


        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
                '_section_style_menu', [
            'label' => __('Filter Menu', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                '_heading_menu', [
            'label' => __('Menu', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
                ]
        );

        $this->add_responsive_control(
                'menu_margin', [
            'label' => __('Margin', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-gallery-filter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                '_heading_buttons', [
            'label' => __('Filter Buttons', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
                ]
        );

        $this->add_responsive_control(
                'button_padding', [
            'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-gallery-filter > li > button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'button_spacing', [
            'label' => __('Spacing', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-gallery-filter > li:not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'button_border',
            'selector' => '{{WRAPPER}} .sa-el-gallery-filter > li > button'
                ]
        );

        $this->add_responsive_control(
                'button_border_radius', [
            'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-gallery-filter > li > button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'button_box_shadow',
            'exclude' => [
                'box_shadow_position',
            ],
            'selector' => '{{WRAPPER}} .sa-el-gallery-filter > li > button'
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'button_typography',
            'selector' => '{{WRAPPER}} .sa-el-gallery-filter > li > button',
            'scheme' => Scheme_Typography::TYPOGRAPHY_3,
                ]
        );

        $this->add_responsive_control(
                'button_align', [
            'label' => __('Alignment', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::CHOOSE,
            'label_block' => false,
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
            'desktop_default' => 'left',
            'toggle' => false,
            'selectors' => [
                '{{WRAPPER}} .sa-el-gallery-filter' => 'text-align: {{VALUE}};'
            ]
                ]
        );

        $this->start_controls_tabs('_tabs_style_button');

        $this->start_controls_tab(
                '_tab_button_normal', [
            'label' => __('Normal', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'button_color', [
            'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa-el-gallery-filter > li > button' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'button_bg_color', [
            'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sa-el-gallery-filter > li > button' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
                '_tab_button_hover', [
            'label' => __('Hover', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'button_hover_color', [
            'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sa-el-gallery-filter > li > button:hover, {{WRAPPER}} .sa-el-gallery-filter > li > button:focus, {{WRAPPER}} .sa-el-gallery-filter > .sa-el-filter-active > button:hover, {{WRAPPER}} .sa-el-gallery-filter > .sa-el-filter-active > button:focus' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'button_hover_bg_color', [
            'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sa-el-gallery-filter > li > button:hover, {{WRAPPER}} .sa-el-gallery-filter > li > button:focus, {{WRAPPER}} .sa-el-gallery-filter > .sa-el-filter-active > button:hover, {{WRAPPER}} .sa-el-gallery-filter > .sa-el-filter-active > button:focus' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'button_hover_border_color', [
            'label' => __('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'condition' => [
                'button_border_border!' => '',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-gallery-filter > li > button:hover, {{WRAPPER}} .sa-el-gallery-filter > li > button:focus, {{WRAPPER}} .sa-el-gallery-filter > .sa-el-filter-active > button:hover, {{WRAPPER}} .sa-el-gallery-filter > .sa-el-filter-active > button:focus' => 'border-color: {{VALUE}};',
            ],
                ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
                '_tab_button_active', [
            'label' => __('Active', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'button_active_color', [
            'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sa-el-gallery-filter > .sa-el-filter-active > button' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'button_active_bg_color', [
            'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sa-el-gallery-filter > .sa-el-filter-active > button' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'button_active_border_color', [
            'label' => __('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'condition' => [
                'button_border_border!' => '',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-gallery-filter > .sa-el-filter-active > button' => 'border-color: {{VALUE}};',
            ],
                ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function sa_get_gallery_data() {
        $gallery = $this->get_settings_for_display('gallery');

        if (!is_array($gallery) || empty($gallery)) {
            return [];
        }

        $menu = [];
        $items = [];

        foreach ($gallery as $item) {
            if (empty($item['images'])) {
                continue;
            }

            $images = $item['images'];
            $filter = 'sa-el-filter-is--' . sanitize_title_with_dashes($item['filter']);

            if ($filter && !isset($data[$filter])) {
                $menu[$filter] = $item['filter'];
            }

            foreach ($images as $image) {
                if (!isset($items[$image['id']])) {
                    $items[$image['id']] = [$filter];
                } else {
                    array_push($items[$image['id']], $filter);
                }
            }
        }

        return [
            'menu' => $menu,
            'items' => $items
        ];
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $gallery = $this->sa_get_gallery_data();

        if (empty($gallery)) {
            return;
        }

        $this->add_render_attribute('container', 'class', [
            'sa-el-justified-gallery-wrapper',
            'sa-el-js-justified-gallery',
        ]);

        $this->add_render_attribute('container', 'data-happy-settings');

        if ($settings['show_filter'] === 'yes') :
            ?>
            <ul class="sa-el-gallery-filter sa-el-js-gallery-filter">
                <?php if ($settings['show_all_filter'] === 'yes') : ?>
                    <li class="sa-el-filter-active"><button type="button" data-filter="*"><?php echo esc_html($settings['all_filter_label']); ?></button></li>
                <?php endif; ?>
                <?php foreach ($gallery['menu'] as $key => $val) : ?>
                    <li><button type="button" data-filter=".<?php echo esc_attr($key); ?>"><?php echo esc_html($val); ?></button></li>
            <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <div <?php echo $this->get_render_attribute_string('container'); ?>>
            <?php
            foreach ($gallery['items'] as $id => $filters) :
                $caption = $settings['show_caption'] ? esc_attr(wp_get_attachment_caption($id)) : '';
                ?>
                <a class="sa-el-justified-gallery-item <?php echo esc_attr(implode(' ', $filters)); ?>">
                <?php echo wp_get_attachment_image($id, $settings['thumbnail_size'], false, ['alt' => $caption, 'class' => 'elementor-animation-' . esc_attr($settings['image_hover_animation'])]); ?>
                </a>
        <?php endforeach; ?>
        </div>

        <?php
    }

}
