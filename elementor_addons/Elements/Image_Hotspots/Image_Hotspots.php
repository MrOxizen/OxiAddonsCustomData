<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Image_Hotspots;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Description of Image Hotspots
 *
 * @author biplo
 * 
 */
use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Group_Control_Background as Group_Control_Background;
use \Elementor\Scheme_Typography as Scheme_Typography;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Utils as Utils;
use \Elementor\Widget_Base as Widget_Base;
use \Elementor\Group_Control_Image_Size;
use \SA_ELEMENTOR_ADDONS\Classes\Bootstrap;

class Image_Hotspots extends Widget_Base {

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function get_name() {
        return 'sa_el_img_hotspots';
    }

    public function get_title() {
        return esc_html__('Image Hotspots', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon() {
        return 'eicon-image-hotspot oxi-el-admin-icon';
    }

    public function get_categories() {
        return ['sa-el-addons'];
    }

    protected function _register_controls() {

        /* ----------------------------------------------------------------------------------- */
        /* 	CONTENT TAB
          /*----------------------------------------------------------------------------------- */

        /**
         * Content Tab: Image
         */
        $this->start_controls_section(
                'section_image', [
            'label' => __('Image', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'image', [
            'label' => __('Image', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Image_Size::get_type(), [
            'name' => 'image',
            'label' => __('Image Size', SA_ELEMENTOR_TEXTDOMAIN),
            'default' => 'full',
                ]
        );

        $this->end_controls_section();

        /**
         * Content Tab: Hotspots
         */
        $this->start_controls_section(
                'section_hotspots', [
            'label' => __('Hotspots', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->start_controls_tabs('hot_spots_tabs');

        $repeater->start_controls_tab('tab_content', ['label' => __('Content', SA_ELEMENTOR_TEXTDOMAIN)]);

        $repeater->add_control(
                'hotspot_type', [
            'label' => __('Type', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'icon',
            'options' => [
                'icon' => __('Icon', SA_ELEMENTOR_TEXTDOMAIN),
                'text' => __('Text', SA_ELEMENTOR_TEXTDOMAIN),
                'blank' => __('Blank', SA_ELEMENTOR_TEXTDOMAIN),
            ],
                ]
        );

        $repeater->add_control(
                'hotspot_icon', [
            'label' => __('Icon', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::ICON,
            'default' => 'fa fa-plus',
            'condition' => [
                'hotspot_type' => 'icon',
            ],
                ]
        );

        $repeater->add_control(
                'hotspot_text', [
            'label' => __('Text', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => 'Go',
            'condition' => [
                'hotspot_type' => 'text',
            ],
                ]
        );

        $repeater->add_control(
                'hotspot_link', [
            'label' => __('Link', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => '#',
                ]
        );

        $repeater->add_control(
                'hotspot_link_target', [
            'label' => __('Open Link in New Tab', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
            'label_on' => __('Yes', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('No', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => 'yes',
                ]
        );

        $repeater->end_controls_tab();

        $repeater->start_controls_tab('tab_position', ['label' => __('Position', SA_ELEMENTOR_TEXTDOMAIN)]);

        $repeater->add_control(
                'left_position', [
            'label' => __('Left Position', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 0.1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} {{CURRENT_ITEM}}' => 'left: {{SIZE}}%;',
            ],
                ]
        );

        $repeater->add_control(
                'top_position', [
            'label' => __('Top Position', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 0.1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} {{CURRENT_ITEM}}' => 'top: {{SIZE}}%;',
            ],
                ]
        );

        $repeater->end_controls_tab();

        $repeater->start_controls_tab('tab_tooltip', ['label' => __('Tooltip', SA_ELEMENTOR_TEXTDOMAIN)]);

        $repeater->add_control(
                'tooltip', [
            'label' => __('Tooltip', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'default' => '',
            'label_on' => __('Show', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('Hide', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => 'yes',
                ]
        );

        $repeater->add_control(
                'tooltip_position_local', [
            'label' => __('Tooltip Position', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'global',
            'options' => [
                'global' => __('Global', SA_ELEMENTOR_TEXTDOMAIN),
                'top' => __('Top', SA_ELEMENTOR_TEXTDOMAIN),
                'bottom' => __('Bottom', SA_ELEMENTOR_TEXTDOMAIN),
                'left' => __('Left', SA_ELEMENTOR_TEXTDOMAIN),
                'right' => __('Right', SA_ELEMENTOR_TEXTDOMAIN),
                'top-left' => __('Top Left', SA_ELEMENTOR_TEXTDOMAIN),
                'top-right' => __('Top Right', SA_ELEMENTOR_TEXTDOMAIN),
                'bottom-left' => __('Bottom Left', SA_ELEMENTOR_TEXTDOMAIN),
                'bottom-right' => __('Bottom Right', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'condition' => [
                'tooltip' => 'yes',
            ],
                ]
        );

        $repeater->add_control(
                'tooltip_content', [
            'label' => __('Tooltip Content', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::WYSIWYG,
            'default' => __('Tooltip Content', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'tooltip' => 'yes',
            ],
                ]
        );

        $repeater->end_controls_tab();

        $repeater->end_controls_tabs();

        $this->add_control(
                'hot_spots', [
            'label' => '',
            'type' => Controls_Manager::REPEATER,
            'default' => [
                [
                    'feature_text' => __('Hotspot #1', SA_ELEMENTOR_TEXTDOMAIN),
                    'feature_icon' => 'fa fa-plus',
                    'left_position' => 20,
                    'top_position' => 30,
                ],
            ],
            'fields' => array_values($repeater->get_controls()),
            'title_field' => '{{{ hotspot_text }}}',
                ]
        );

        $this->add_control(
                'hotspot_pulse', [
            'label' => __('Glow Effect', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
            'label_on' => __('Yes', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('No', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => 'yes',
                ]
        );

        $this->end_controls_section();

        /**
         * Content Tab: Tooltip Settings
         */
        $this->start_controls_section(
                'section_tooltip', [
            'label' => __('Tooltip Settings', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'tooltip_arrow', [
            'label' => __('Show Arrow', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
            'label_on' => __('Yes', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('No', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => 'yes',
                ]
        );

        $this->add_control(
                'tooltip_size', [
            'label' => __('Size', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'default',
            'options' => [
                'default' => __('Default', SA_ELEMENTOR_TEXTDOMAIN),
                'tiny' => __('Tiny', SA_ELEMENTOR_TEXTDOMAIN),
                'small' => __('Small', SA_ELEMENTOR_TEXTDOMAIN),
                'large' => __('Large', SA_ELEMENTOR_TEXTDOMAIN)
            ],
                ]
        );

        $this->add_control(
                'tooltip_position', [
            'label' => __('Global Position', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'top',
            'options' => [
                'top' => __('Top', SA_ELEMENTOR_TEXTDOMAIN),
                'bottom' => __('Bottom', SA_ELEMENTOR_TEXTDOMAIN),
                'left' => __('Left', SA_ELEMENTOR_TEXTDOMAIN),
                'right' => __('Right', SA_ELEMENTOR_TEXTDOMAIN),
                'top-left' => __('Top Left', SA_ELEMENTOR_TEXTDOMAIN),
                'top-right' => __('Top Right', SA_ELEMENTOR_TEXTDOMAIN),
                'bottom-left' => __('Bottom Left', SA_ELEMENTOR_TEXTDOMAIN),
                'bottom-right' => __('Bottom Right', SA_ELEMENTOR_TEXTDOMAIN),
            ],
                ]
        );

        $this->add_control(
                'tooltip_animation_in', [
            'label' => __('Animation In', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT2,
            'default' => '',
            'options' => [
                'bounce' => __('Bounce', SA_ELEMENTOR_TEXTDOMAIN),
                'flash' => __('Flash', SA_ELEMENTOR_TEXTDOMAIN),
                'pulse' => __('Pulse', SA_ELEMENTOR_TEXTDOMAIN),
                'rubberBand' => __('rubberBand', SA_ELEMENTOR_TEXTDOMAIN),
                'shake' => __('Shake', SA_ELEMENTOR_TEXTDOMAIN),
                'swing' => __('Swing', SA_ELEMENTOR_TEXTDOMAIN),
                'tada' => __('Tada', SA_ELEMENTOR_TEXTDOMAIN),
                'wobble' => __('Wobble', SA_ELEMENTOR_TEXTDOMAIN),
                'bounceIn' => __('bounceIn', SA_ELEMENTOR_TEXTDOMAIN),
                'bounceInDown' => __('bounceInDown', SA_ELEMENTOR_TEXTDOMAIN),
                'bounceInLeft' => __('bounceInLeft', SA_ELEMENTOR_TEXTDOMAIN),
                'bounceInRight' => __('bounceInRight', SA_ELEMENTOR_TEXTDOMAIN),
                'bounceInUp' => __('bounceInUp', SA_ELEMENTOR_TEXTDOMAIN),
                'bounceOut' => __('bounceOut', SA_ELEMENTOR_TEXTDOMAIN),
                'bounceOutDown' => __('bounceOutDown', SA_ELEMENTOR_TEXTDOMAIN),
                'bounceOutLeft' => __('bounceOutLeft', SA_ELEMENTOR_TEXTDOMAIN),
                'bounceOutRight' => __('bounceOutRight', SA_ELEMENTOR_TEXTDOMAIN),
                'bounceOutUp' => __('bounceOutUp', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeIn' => __('fadeIn', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeInDown' => __('fadeInDown', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeInDownBig' => __('fadeInDownBig', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeInLeft' => __('fadeInLeft', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeInLeftBig' => __('fadeInLeftBig', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeInRight' => __('fadeInRight', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeInRightBig' => __('fadeInRightBig', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeInUp' => __('fadeInUp', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeInUpBig' => __('fadeInUpBig', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeOut' => __('fadeOut', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeOutDown' => __('fadeOutDown', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeOutDownBig' => __('fadeOutDownBig', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeOutLeft' => __('fadeOutLeft', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeOutLeftBig' => __('fadeOutLeftBig', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeOutRight' => __('fadeOutRight', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeOutRightBig' => __('fadeOutRightBig', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeOutUp' => __('fadeOutUp', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeOutUpBig' => __('fadeOutUpBig', SA_ELEMENTOR_TEXTDOMAIN),
                'flip' => __('flip', SA_ELEMENTOR_TEXTDOMAIN),
                'flipInX' => __('flipInX', SA_ELEMENTOR_TEXTDOMAIN),
                'flipInY' => __('flipInY', SA_ELEMENTOR_TEXTDOMAIN),
                'flipOutX' => __('flipOutX', SA_ELEMENTOR_TEXTDOMAIN),
                'flipOutY' => __('flipOutY', SA_ELEMENTOR_TEXTDOMAIN),
                'lightSpeedIn' => __('lightSpeedIn', SA_ELEMENTOR_TEXTDOMAIN),
                'lightSpeedOut' => __('lightSpeedOut', SA_ELEMENTOR_TEXTDOMAIN),
                'rotateIn' => __('rotateIn', SA_ELEMENTOR_TEXTDOMAIN),
                'rotateInDownLeft' => __('rotateInDownLeft', SA_ELEMENTOR_TEXTDOMAIN),
                'rotateInDownLeft' => __('rotateInDownRight', SA_ELEMENTOR_TEXTDOMAIN),
                'rotateInUpLeft' => __('rotateInUpLeft', SA_ELEMENTOR_TEXTDOMAIN),
                'rotateInUpRight' => __('rotateInUpRight', SA_ELEMENTOR_TEXTDOMAIN),
                'rotateOut' => __('rotateOut', SA_ELEMENTOR_TEXTDOMAIN),
                'rotateOutDownLeft' => __('rotateOutDownLeft', SA_ELEMENTOR_TEXTDOMAIN),
                'rotateOutDownLeft' => __('rotateOutDownRight', SA_ELEMENTOR_TEXTDOMAIN),
                'rotateOutUpLeft' => __('rotateOutUpLeft', SA_ELEMENTOR_TEXTDOMAIN),
                'rotateOutUpRight' => __('rotateOutUpRight', SA_ELEMENTOR_TEXTDOMAIN),
                'hinge' => __('Hinge', SA_ELEMENTOR_TEXTDOMAIN),
                'rollIn' => __('rollIn', SA_ELEMENTOR_TEXTDOMAIN),
                'rollOut' => __('rollOut', SA_ELEMENTOR_TEXTDOMAIN),
                'zoomIn' => __('zoomIn', SA_ELEMENTOR_TEXTDOMAIN),
                'zoomInDown' => __('zoomInDown', SA_ELEMENTOR_TEXTDOMAIN),
                'zoomInLeft' => __('zoomInLeft', SA_ELEMENTOR_TEXTDOMAIN),
                'zoomInRight' => __('zoomInRight', SA_ELEMENTOR_TEXTDOMAIN),
                'zoomInUp' => __('zoomInUp', SA_ELEMENTOR_TEXTDOMAIN),
                'zoomOut' => __('zoomOut', SA_ELEMENTOR_TEXTDOMAIN),
                'zoomOutDown' => __('zoomOutDown', SA_ELEMENTOR_TEXTDOMAIN),
                'zoomOutLeft' => __('zoomOutLeft', SA_ELEMENTOR_TEXTDOMAIN),
                'zoomOutRight' => __('zoomOutRight', SA_ELEMENTOR_TEXTDOMAIN),
                'zoomOutUp' => __('zoomOutUp', SA_ELEMENTOR_TEXTDOMAIN),
            ],
                ]
        );

        $this->add_control(
                'tooltip_animation_out', [
            'label' => __('Animation Out', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT2,
            'default' => '',
            'options' => [
                'bounce' => __('Bounce', SA_ELEMENTOR_TEXTDOMAIN),
                'flash' => __('Flash', SA_ELEMENTOR_TEXTDOMAIN),
                'pulse' => __('Pulse', SA_ELEMENTOR_TEXTDOMAIN),
                'rubberBand' => __('rubberBand', SA_ELEMENTOR_TEXTDOMAIN),
                'shake' => __('Shake', SA_ELEMENTOR_TEXTDOMAIN),
                'swing' => __('Swing', SA_ELEMENTOR_TEXTDOMAIN),
                'tada' => __('Tada', SA_ELEMENTOR_TEXTDOMAIN),
                'wobble' => __('Wobble', SA_ELEMENTOR_TEXTDOMAIN),
                'bounceIn' => __('bounceIn', SA_ELEMENTOR_TEXTDOMAIN),
                'bounceInDown' => __('bounceInDown', SA_ELEMENTOR_TEXTDOMAIN),
                'bounceInLeft' => __('bounceInLeft', SA_ELEMENTOR_TEXTDOMAIN),
                'bounceInRight' => __('bounceInRight', SA_ELEMENTOR_TEXTDOMAIN),
                'bounceInUp' => __('bounceInUp', SA_ELEMENTOR_TEXTDOMAIN),
                'bounceOut' => __('bounceOut', SA_ELEMENTOR_TEXTDOMAIN),
                'bounceOutDown' => __('bounceOutDown', SA_ELEMENTOR_TEXTDOMAIN),
                'bounceOutLeft' => __('bounceOutLeft', SA_ELEMENTOR_TEXTDOMAIN),
                'bounceOutRight' => __('bounceOutRight', SA_ELEMENTOR_TEXTDOMAIN),
                'bounceOutUp' => __('bounceOutUp', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeIn' => __('fadeIn', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeInDown' => __('fadeInDown', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeInDownBig' => __('fadeInDownBig', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeInLeft' => __('fadeInLeft', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeInLeftBig' => __('fadeInLeftBig', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeInRight' => __('fadeInRight', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeInRightBig' => __('fadeInRightBig', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeInUp' => __('fadeInUp', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeInUpBig' => __('fadeInUpBig', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeOut' => __('fadeOut', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeOutDown' => __('fadeOutDown', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeOutDownBig' => __('fadeOutDownBig', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeOutLeft' => __('fadeOutLeft', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeOutLeftBig' => __('fadeOutLeftBig', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeOutRight' => __('fadeOutRight', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeOutRightBig' => __('fadeOutRightBig', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeOutUp' => __('fadeOutUp', SA_ELEMENTOR_TEXTDOMAIN),
                'fadeOutUpBig' => __('fadeOutUpBig', SA_ELEMENTOR_TEXTDOMAIN),
                'flip' => __('flip', SA_ELEMENTOR_TEXTDOMAIN),
                'flipInX' => __('flipInX', SA_ELEMENTOR_TEXTDOMAIN),
                'flipInY' => __('flipInY', SA_ELEMENTOR_TEXTDOMAIN),
                'flipOutX' => __('flipOutX', SA_ELEMENTOR_TEXTDOMAIN),
                'flipOutY' => __('flipOutY', SA_ELEMENTOR_TEXTDOMAIN),
                'lightSpeedIn' => __('lightSpeedIn', SA_ELEMENTOR_TEXTDOMAIN),
                'lightSpeedOut' => __('lightSpeedOut', SA_ELEMENTOR_TEXTDOMAIN),
                'rotateIn' => __('rotateIn', SA_ELEMENTOR_TEXTDOMAIN),
                'rotateInDownLeft' => __('rotateInDownLeft', SA_ELEMENTOR_TEXTDOMAIN),
                'rotateInDownLeft' => __('rotateInDownRight', SA_ELEMENTOR_TEXTDOMAIN),
                'rotateInUpLeft' => __('rotateInUpLeft', SA_ELEMENTOR_TEXTDOMAIN),
                'rotateInUpRight' => __('rotateInUpRight', SA_ELEMENTOR_TEXTDOMAIN),
                'rotateOut' => __('rotateOut', SA_ELEMENTOR_TEXTDOMAIN),
                'rotateOutDownLeft' => __('rotateOutDownLeft', SA_ELEMENTOR_TEXTDOMAIN),
                'rotateOutDownLeft' => __('rotateOutDownRight', SA_ELEMENTOR_TEXTDOMAIN),
                'rotateOutUpLeft' => __('rotateOutUpLeft', SA_ELEMENTOR_TEXTDOMAIN),
                'rotateOutUpRight' => __('rotateOutUpRight', SA_ELEMENTOR_TEXTDOMAIN),
                'hinge' => __('Hinge', SA_ELEMENTOR_TEXTDOMAIN),
                'rollIn' => __('rollIn', SA_ELEMENTOR_TEXTDOMAIN),
                'rollOut' => __('rollOut', SA_ELEMENTOR_TEXTDOMAIN),
                'zoomIn' => __('zoomIn', SA_ELEMENTOR_TEXTDOMAIN),
                'zoomInDown' => __('zoomInDown', SA_ELEMENTOR_TEXTDOMAIN),
                'zoomInLeft' => __('zoomInLeft', SA_ELEMENTOR_TEXTDOMAIN),
                'zoomInRight' => __('zoomInRight', SA_ELEMENTOR_TEXTDOMAIN),
                'zoomInUp' => __('zoomInUp', SA_ELEMENTOR_TEXTDOMAIN),
                'zoomOut' => __('zoomOut', SA_ELEMENTOR_TEXTDOMAIN),
                'zoomOutDown' => __('zoomOutDown', SA_ELEMENTOR_TEXTDOMAIN),
                'zoomOutLeft' => __('zoomOutLeft', SA_ELEMENTOR_TEXTDOMAIN),
                'zoomOutRight' => __('zoomOutRight', SA_ELEMENTOR_TEXTDOMAIN),
                'zoomOutUp' => __('zoomOutUp', SA_ELEMENTOR_TEXTDOMAIN),
            ],
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
        /* 	STYLE TAB
          /*----------------------------------------------------------------------------------- */

        /**
         * Style Tab: Image
         */
        $this->start_controls_section(
                'section_image_style', [
            'label' => __('Image', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_responsive_control(
                'image_width', [
            'label' => __('Width', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 1200,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 1,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-hot-spot-image' => 'width: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Hotspot
         */
        $this->start_controls_section(
                'section_hotspots_style', [
            'label' => __('Hotspot', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_responsive_control(
                'hotspot_icon_size', [
            'label' => __('Size', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => ['size' => '14'],
            'range' => [
                'px' => [
                    'min' => 6,
                    'max' => 40,
                    'step' => 1,
                ],
            ],
            'size_units' => ['px'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-hot-spot-wrap' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; font-size: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'icon_color_normal', [
            'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .sa-el-hot-spot-wrap, {{WRAPPER}} .sa-el-hot-spot-inner, {{WRAPPER}} .sa-el-hot-spot-inner:before' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'icon_bg_color_normal', [
            'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa-el-hot-spot-wrap, {{WRAPPER}} .sa-el-hot-spot-inner, {{WRAPPER}} .sa-el-hot-spot-inner:before, {{WRAPPER}} .sa-el-hotspot-icon-wrap' => 'background-color: {{VALUE}}',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'icon_border_normal',
            'label' => __('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'placeholder' => '1px',
            'default' => '1px',
            'selector' => '{{WRAPPER}} .sa-el-hot-spot-wrap'
                ]
        );

        $this->add_control(
                'icon_border_radius', [
            'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-hot-spot-wrap, {{WRAPPER}} .sa-el-hot-spot-inner, {{WRAPPER}} .sa-el-hot-spot-inner:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'icon_padding', [
            'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-hot-spot-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'icon_box_shadow',
            'selector' => '{{WRAPPER}} .sa-el-hot-spot-wrap',
            'separator' => 'before',
                ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Tooltip
         */
        $this->start_controls_section(
                'section_tooltips_style', [
            'label' => __('Tooltip', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'tooltip_bg_color', [
            'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#d30038',
                ]
        );

        $this->add_control(
                'tooltip_color', [
            'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
                ]
        );

        $this->add_control(
                'tooltip_width', [
            'label' => __('Width', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 50,
                    'max' => 400,
                    'step' => 1,
                ],
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'tooltip_typography',
            'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
            'scheme' => Scheme_Typography::TYPOGRAPHY_4,
            'selector' => '.sa-el-tooltip-{{ID}}',
                ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();

        if (empty($settings['image']['url'])) {
            return;
        }
        ?>
        <div class="sa-el-image-hotspots">
            <div class="sa-el-hot-spot-image">
                <?php
                $i = 1;
                foreach ($settings['hot_spots'] as $index => $item) :

                    $this->add_render_attribute('hotspot' . $i, 'class', 'sa-el-hot-spot-wrap elementor-repeater-item-' . esc_attr($item['_id']));

                    if ($item['tooltip'] == 'yes' && $item['tooltip_content'] != '') {
                        $this->add_render_attribute('hotspot' . $i, 'class', 'sa-el-hot-spot-tooptip');
                        $this->add_render_attribute('hotspot' . $i, 'data-tipso', '<span class="sa-el-single-tooltip sa-el-tooltip-' . $this->get_id() . '">' . $this->parse_text_editor($item['tooltip_content']) . '</span>');
                    }

                    $this->add_render_attribute('hotspot' . $i, 'data-tooltip-position-global', $settings['tooltip_position']);

                    if ($item['hotspot_link'] != '#' && $item['hotspot_link'] != '') {
                        $this->add_render_attribute('hotspot' . $i, 'data-link', esc_url($item['hotspot_link']));
                    }

                    if ($item['hotspot_link_target']) {
                        $this->add_render_attribute('hotspot' . $i, 'data-link-target', '_blank');
                    }

                    if ($item['tooltip_position_local'] != 'global') {
                        $this->add_render_attribute('hotspot' . $i, 'data-tooltip-position-local', $item['tooltip_position_local']);
                    }

                    if ($settings['tooltip_size']) {
                        $this->add_render_attribute('hotspot' . $i, 'data-tooltip-size', $settings['tooltip_size']);
                    }

                    if ($settings['tooltip_width']) {
                        $this->add_render_attribute('hotspot' . $i, 'data-tooltip-width', $settings['tooltip_width']['size']);
                    }

                    if ($settings['tooltip_animation_in']) {
                        $this->add_render_attribute('hotspot' . $i, 'data-tooltip-animation-in', $settings['tooltip_animation_in']);
                    }

                    if ($settings['tooltip_animation_out']) {
                        $this->add_render_attribute('hotspot' . $i, 'data-tooltip-animation-out', $settings['tooltip_animation_out']);
                    }

                    if ($settings['tooltip_bg_color']) {
                        $this->add_render_attribute('hotspot' . $i, 'data-tooltip-background', $settings['tooltip_bg_color']);
                    }

                    if ($settings['tooltip_color']) {
                        $this->add_render_attribute('hotspot' . $i, 'data-tooltip-text-color', $settings['tooltip_color']);
                    }

                    if ($settings['tooltip_arrow'] == 'yes') {
                        $this->add_render_attribute('hotspot' . $i, 'data-tooltip-arrow', $settings['tooltip_arrow']);
                    }

                    $this->add_render_attribute('hotspot_inner_' . $i, 'class', 'sa-el-hot-spot-inner');

                    if ($settings['hotspot_pulse'] == 'yes') {
                        $this->add_render_attribute('hotspot_inner_' . $i, 'class', 'hotspot-animation');
                    }
                    ?>
                    <span <?php echo $this->get_render_attribute_string('hotspot' . $i); ?>>
                        <span <?php echo $this->get_render_attribute_string('hotspot_inner_' . $i); ?>>
                            <?php
                            if ($item['hotspot_type'] == 'icon') {
                                printf('<span class="sa-el-hotspot-icon-wrap"><span class="sa-el-hotspot-icon tooltip %1$s"></span></span>', esc_attr($item['hotspot_icon']));
                            } elseif ($item['hotspot_type'] == 'text') {
                                printf('<span class="sa-el-hotspot-icon-wrap"><span class="sa-el-hotspot-text">%1$s</span></span>', esc_attr($item['hotspot_text']));
                            }
                            ?>
                        </span>
                    </span>
                    <?php $i++;
                endforeach;
                ?>

        <?php echo Group_Control_Image_Size::get_attachment_image_html($settings); ?>
            </div>
        </div>
        <?php
    }

}
