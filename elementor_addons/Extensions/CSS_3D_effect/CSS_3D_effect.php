<?php

namespace SA_ELEMENTOR_ADDONS\Extensions\CSS_3D_effect;

/**
 * Description of SA_Content_Protection
 *
 * @author Jabir
 */
if (!defined('ABSPATH')) {
    exit;
}
use \Elementor\Controls_Manager;
use \Elementor\Frontend;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Scheme_Typography;


class CSS_3D_effect {

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function __construct() {
      
        add_action('elementor/element/common/_section_style/after_section_end', [$this, 'register_controls'], 10);

    }
    public function get_name() {
        return 'sa-el-effects';
    }
     public function register_controls($element) {

        $element->start_controls_section(
                'sa_el_effects_section', [
            'label' => __('SA 3D Css Effects', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_ADVANCED,
                ]
        );

  
        $element->add_control(
            'sa_el_floating_fx',
            [
                'label' => __( 'Floating Effects', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'frontend_available' => true,
            ]
        );

        $element->add_control(
            'sa_el_floating_fx_translate_toggle',
            [
                'label' => __( 'Translate', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'return_value' => 'yes',
                'frontend_available' => true,
                'condition' => [
                    'sa_el_floating_fx' => 'yes',
                ]
            ]
        );

        $element->start_popover();

        $element->add_control(
            'sa_el_floating_fx_translate_x',
            [
                'label' => __( 'Translate X', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'sizes' => [
                        'from' => 0,
                        'to' => 5,
                    ],
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                    ]
                ],
                'labels' => [
                    __( 'From', SA_ELEMENTOR_TEXTDOMAIN ),
                    __( 'To', SA_ELEMENTOR_TEXTDOMAIN ),
                ],
                'scales' => 1,
                'handles' => 'range',
                'condition' => [
                    'sa_el_floating_fx_translate_toggle' => 'yes',
                    'sa_el_floating_fx' => 'yes',
                ],
                'render_type' => 'none',
                'frontend_available' => true,
            ]
        );

        $element->add_control(
            'sa_el_floating_fx_translate_y',
            [
                'label' => __( 'Translate Y', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'sizes' => [
                        'from' => 0,
                        'to' => 5,
                    ],
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                    ]
                ],
                'labels' => [
                    __( 'From', SA_ELEMENTOR_TEXTDOMAIN ),
                    __( 'To', SA_ELEMENTOR_TEXTDOMAIN ),
                ],
                'scales' => 1,
                'handles' => 'range',
                'condition' => [
                    'sa_el_floating_fx_translate_toggle' => 'yes',
                    'sa_el_floating_fx' => 'yes',
                ],
                'render_type' => 'none',
                'frontend_available' => true,
            ]
        );

        $element->add_control(
            'sa_el_floating_fx_translate_duration',
            [
                'label' => __( 'Duration', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10000,
                        'step' => 100
                    ]
                ],
                'default' => [
                    'size' => 1000,
                ],
                'condition' => [
                    'sa_el_floating_fx_translate_toggle' => 'yes',
                    'sa_el_floating_fx' => 'yes',
                ],
                'render_type' => 'none',
                'frontend_available' => true,
            ]
        );

        $element->add_control(
            'sa_el_floating_fx_translate_delay',
            [
                'label' => __( 'Delay', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 5000,
                        'step' => 100
                    ]
                ],
                'condition' => [
                    'sa_el_floating_fx_translate_toggle' => 'yes',
                    'sa_el_floating_fx' => 'yes',
                ],
                'render_type' => 'none',
                'frontend_available' => true,
            ]
        );

        $element->end_popover();

        $element->add_control(
            'sa_el_floating_fx_rotate_toggle',
            [
                'label' => __( 'Rotate', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'return_value' => 'yes',
                'frontend_available' => true,
                'condition' => [
                    'sa_el_floating_fx' => 'yes',
                ]
            ]
        );

        $element->start_popover();

        $element->add_control(
            'sa_el_floating_fx_rotate_x',
            [
                'label' => __( 'Rotate X', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'sizes' => [
                        'from' => 0,
                        'to' => 45,
                    ],
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => -180,
                        'max' => 180,
                    ]
                ],
                'labels' => [
                    __( 'From', SA_ELEMENTOR_TEXTDOMAIN ),
                    __( 'To', SA_ELEMENTOR_TEXTDOMAIN ),
                ],
                'scales' => 1,
                'handles' => 'range',
                'condition' => [
                    'sa_el_floating_fx_rotate_toggle' => 'yes',
                    'sa_el_floating_fx' => 'yes',
                ],
                'render_type' => 'none',
                'frontend_available' => true,
            ]
        );

        $element->add_control(
            'sa_el_floating_fx_rotate_y',
            [
                'label' => __( 'Rotate Y', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'sizes' => [
                        'from' => 0,
                        'to' => 45,
                    ],
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => -180,
                        'max' => 180,
                    ]
                ],
                'labels' => [
                    __( 'From', SA_ELEMENTOR_TEXTDOMAIN ),
                    __( 'To', SA_ELEMENTOR_TEXTDOMAIN ),
                ],
                'scales' => 1,
                'handles' => 'range',
                'condition' => [
                    'sa_el_floating_fx_rotate_toggle' => 'yes',
                    'sa_el_floating_fx' => 'yes',
                ],
                'render_type' => 'none',
                'frontend_available' => true,
            ]
        );

        $element->add_control(
            'sa_el_floating_fx_rotate_z',
            [
                'label' => __( 'Rotate Z', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'sizes' => [
                        'from' => 0,
                        'to' => 45,
                    ],
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => -180,
                        'max' => 180,
                    ]
                ],
                'labels' => [
                    __( 'From', SA_ELEMENTOR_TEXTDOMAIN ),
                    __( 'To', SA_ELEMENTOR_TEXTDOMAIN ),
                ],
                'scales' => 1,
                'handles' => 'range',
                'condition' => [
                    'sa_el_floating_fx_rotate_toggle' => 'yes',
                    'sa_el_floating_fx' => 'yes',
                ],
                'render_type' => 'none',
                'frontend_available' => true,
            ]
        );

        $element->add_control(
            'sa_el_floating_fx_rotate_duration',
            [
                'label' => __( 'Duration', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10000,
                        'step' => 100
                    ]
                ],
                'default' => [
                    'size' => 1000,
                ],
                'condition' => [
                    'sa_el_floating_fx_rotate_toggle' => 'yes',
                    'sa_el_floating_fx' => 'yes',
                ],
                'render_type' => 'none',
                'frontend_available' => true,
            ]
        );

        $element->add_control(
            'sa_el_floating_fx_rotate_delay',
            [
                'label' => __( 'Delay', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 5000,
                        'step' => 100
                    ]
                ],
                'condition' => [
                    'sa_el_floating_fx_rotate_toggle' => 'yes',
                    'sa_el_floating_fx' => 'yes',
                ],
                'render_type' => 'none',
                'frontend_available' => true,
            ]
        );

        $element->end_popover();

        $element->add_control(
            'sa_el_floating_fx_scale_toggle',
            [
                'label' => __( 'Scale', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'return_value' => 'yes',
                'frontend_available' => true,
                'condition' => [
                    'sa_el_floating_fx' => 'yes',
                ]
            ]
        );

        $element->start_popover();

        $element->add_control(
            'sa_el_floating_fx_scale_x',
            [
                'label' => __( 'Scale X', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'sizes' => [
                        'from' => 1,
                        'to' => 1.2,
                    ],
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 5,
                        'step' => .1
                    ]
                ],
                'labels' => [
                    __( 'From', SA_ELEMENTOR_TEXTDOMAIN ),
                    __( 'To', SA_ELEMENTOR_TEXTDOMAIN ),
                ],
                'scales' => 1,
                'handles' => 'range',
                'condition' => [
                    'sa_el_floating_fx_scale_toggle' => 'yes',
                    'sa_el_floating_fx' => 'yes',
                ],
                'render_type' => 'none',
                'frontend_available' => true,
            ]
        );

        $element->add_control(
            'sa_el_floating_fx_scale_y',
            [
                'label' => __( 'Scale Y', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'sizes' => [
                        'from' => 1,
                        'to' => 1.2,
                    ],
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 5,
                        'step' => .1
                    ]
                ],
                'labels' => [
                    __( 'From', SA_ELEMENTOR_TEXTDOMAIN ),
                    __( 'To', SA_ELEMENTOR_TEXTDOMAIN ),
                ],
                'scales' => 1,
                'handles' => 'range',
                'condition' => [
                    'sa_el_floating_fx_scale_toggle' => 'yes',
                    'sa_el_floating_fx' => 'yes',
                ],
                'render_type' => 'none',
                'frontend_available' => true,
            ]
        );

        $element->add_control(
            'sa_el_floating_fx_scale_duration',
            [
                'label' => __( 'Duration', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10000,
                        'step' => 100
                    ]
                ],
                'default' => [
                    'size' => 1000,
                ],
                'condition' => [
                    'sa_el_floating_fx_scale_toggle' => 'yes',
                    'sa_el_floating_fx' => 'yes',
                ],
                'render_type' => 'none',
                'frontend_available' => true,
            ]
        );

        $element->add_control(
            'sa_el_floating_fx_scale_delay',
            [
                'label' => __( 'Delay', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 5000,
                        'step' => 100
                    ]
                ],
                'condition' => [
                    'sa_el_floating_fx_scale_toggle' => 'yes',
                    'sa_el_floating_fx' => 'yes',
                ],
                'render_type' => 'none',
                'frontend_available' => true,
            ]
        );

        $element->end_popover();

        $element->add_control(
            'sa_el_hr',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );

        $element->add_control(
            'sa_el_transform_fx',
            [
                'label' => __( 'CSS Transform', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
            ]
        );

        $element->add_control(
            'sa_el_transform_fx_translate_toggle',
            [
                'label' => __( 'Translate', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'return_value' => 'yes',
                'condition' => [
                    'sa_el_transform_fx' => 'yes',
                ],
            ]
        );

        $element->start_popover();

        $element->add_responsive_control(
            'sa_el_transform_fx_translate_x',
            [
                'label' => __( 'Translate X', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ]
                ],
                'condition' => [
                    'sa_el_transform_fx_translate_toggle' => 'yes',
                    'sa_el_transform_fx' => 'yes',
                ],
            ]
        );

        $element->add_responsive_control(
            'sa_el_transform_fx_translate_y',
            [
                'label' => __( 'Translate Y', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ]
                ],
                'condition' => [
                    'sa_el_transform_fx_translate_toggle' => 'yes',
                    'sa_el_transform_fx' => 'yes',
                ],
                'selectors' => [
                    '(desktop){{WRAPPER}}' =>
                        '-ms-transform:'
                            . 'translate({{sa_el_transform_fx_translate_x.SIZE || 0}}px, {{sa_el_transform_fx_translate_y.SIZE || 0}}px);'
                        . '-webkit-transform:'
                            . 'translate({{sa_el_transform_fx_translate_x.SIZE || 0}}px, {{sa_el_transform_fx_translate_y.SIZE || 0}}px);'
                        . 'transform:'
                            . 'translate({{sa_el_transform_fx_translate_x.SIZE || 0}}px, {{sa_el_transform_fx_translate_y.SIZE || 0}}px);',
                    '(tablet){{WRAPPER}}' =>
                        '-ms-transform:'
                            . 'translate({{sa_el_transform_fx_translate_x_tablet.SIZE || 0}}px, {{sa_el_transform_fx_translate_y_tablet.SIZE || 0}}px);'
                        . '-webkit-transform:'
                            . 'translate({{sa_el_transform_fx_translate_x_tablet.SIZE || 0}}px, {{sa_el_transform_fx_translate_y_tablet.SIZE || 0}}px);'
                        . 'transform:'
                            . 'translate({{sa_el_transform_fx_translate_x_tablet.SIZE || 0}}px, {{sa_el_transform_fx_translate_y_tablet.SIZE || 0}}px);',
                    '(mobile){{WRAPPER}}' =>
                        '-ms-transform:'
                            . 'translate({{sa_el_transform_fx_translate_x_mobile.SIZE || 0}}px, {{sa_el_transform_fx_translate_y_mobile.SIZE || 0}}px);'
                        . '-webkit-transform:'
                            . 'translate({{sa_el_transform_fx_translate_x_mobile.SIZE || 0}}px, {{sa_el_transform_fx_translate_y_mobile.SIZE || 0}}px);'
                        . 'transform:'
                            . 'translate({{sa_el_transform_fx_translate_x_mobile.SIZE || 0}}px, {{sa_el_transform_fx_translate_y_mobile.SIZE || 0}}px);',
                ]
            ]
        );

        $element->end_popover();

        $element->add_control(
            'sa_el_transform_fx_rotate_toggle',
            [
                'label' => __( 'Rotate', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'condition' => [
                    'sa_el_transform_fx' => 'yes',
                ],
            ]
        );

        $element->start_popover();

        $element->add_responsive_control(
            'sa_el_transform_fx_rotate_x',
            [
                'label' => __( 'Rotate X', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -180,
                        'max' => 180,
                    ]
                ],
                'condition' => [
                    'sa_el_transform_fx_rotate_toggle' => 'yes',
                    'sa_el_transform_fx' => 'yes',
                ],
            ]
        );

        $element->add_responsive_control(
            'sa_el_transform_fx_rotate_y',
            [
                'label' => __( 'Rotate Y', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -180,
                        'max' => 180,
                    ]
                ],
                'condition' => [
                    'sa_el_transform_fx_rotate_toggle' => 'yes',
                    'sa_el_transform_fx' => 'yes',
                ],
            ]
        );

        $element->add_responsive_control(
            'sa_el_transform_fx_rotate_z',
            [
                'label' => __( 'Rotate Z', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -180,
                        'max' => 180,
                    ]
                ],
                'condition' => [
                    'sa_el_transform_fx_rotate_toggle' => 'yes',
                    'sa_el_transform_fx' => 'yes',
                ],
                'selectors' => [
                    '(desktop){{WRAPPER}}' =>
                        '-ms-transform:'
                            . 'translate({{sa_el_transform_fx_translate_x.SIZE || 0}}px, {{sa_el_transform_fx_translate_y.SIZE || 0}}px) '
                            . 'rotateX({{sa_el_transform_fx_rotate_x.SIZE || 0}}deg) rotateY({{sa_el_transform_fx_rotate_y.SIZE || 0}}deg) rotateZ({{sa_el_transform_fx_rotate_z.SIZE || 0}}deg);'
                        . '-webkit-transform:'
                            . 'translate({{sa_el_transform_fx_translate_x.SIZE || 0}}px, {{sa_el_transform_fx_translate_y.SIZE || 0}}px) '
                            . 'rotateX({{sa_el_transform_fx_rotate_x.SIZE || 0}}deg) rotateY({{sa_el_transform_fx_rotate_y.SIZE || 0}}deg) rotateZ({{sa_el_transform_fx_rotate_z.SIZE || 0}}deg);'
                        . 'transform:'
                            . 'translate({{sa_el_transform_fx_translate_x.SIZE || 0}}px, {{sa_el_transform_fx_translate_y.SIZE || 0}}px) '
                            . 'rotateX({{sa_el_transform_fx_rotate_x.SIZE || 0}}deg) rotateY({{sa_el_transform_fx_rotate_y.SIZE || 0}}deg) rotateZ({{sa_el_transform_fx_rotate_z.SIZE || 0}}deg);',
                    '(tablet){{WRAPPER}}' =>
                        '-ms-transform:'
                            . 'translate({{sa_el_transform_fx_translate_x_tablet.SIZE || 0}}px, {{sa_el_transform_fx_translate_y_tablet.SIZE || 0}}px) '
                            . 'rotateX({{sa_el_transform_fx_rotate_x_tablet.SIZE || 0}}deg) rotateY({{sa_el_transform_fx_rotate_y_tablet.SIZE || 0}}deg) rotateZ({{sa_el_transform_fx_rotate_z_tablet.SIZE || 0}}deg);'
                        . '-webkit-transform:'
                            . 'translate({{sa_el_transform_fx_translate_x_tablet.SIZE || 0}}px, {{sa_el_transform_fx_translate_y_tablet.SIZE || 0}}px) '
                            . 'rotateX({{sa_el_transform_fx_rotate_x_tablet.SIZE || 0}}deg) rotateY({{sa_el_transform_fx_rotate_y_tablet.SIZE || 0}}deg) rotateZ({{sa_el_transform_fx_rotate_z_tablet.SIZE || 0}}deg);'
                        . 'transform:'
                            . 'translate({{sa_el_transform_fx_translate_x_tablet.SIZE || 0}}px, {{sa_el_transform_fx_translate_y_tablet.SIZE || 0}}px) '
                            . 'rotateX({{sa_el_transform_fx_rotate_x_tablet.SIZE || 0}}deg) rotateY({{sa_el_transform_fx_rotate_y_tablet.SIZE || 0}}deg) rotateZ({{sa_el_transform_fx_rotate_z_tablet.SIZE || 0}}deg);',
                    '(mobile){{WRAPPER}}' =>
                        '-ms-transform:'
                            . 'translate({{sa_el_transform_fx_translate_x_mobile.SIZE || 0}}px, {{sa_el_transform_fx_translate_y_mobile.SIZE || 0}}px) '
                            . 'rotateX({{sa_el_transform_fx_rotate_x_mobile.SIZE || 0}}deg) rotateY({{sa_el_transform_fx_rotate_y_mobile.SIZE || 0}}deg) rotateZ({{sa_el_transform_fx_rotate_z_mobile.SIZE || 0}}deg);'
                        . '-webkit-transform:'
                            . 'translate({{sa_el_transform_fx_translate_x_mobile.SIZE || 0}}px, {{sa_el_transform_fx_translate_y_mobile.SIZE || 0}}px) '
                            . 'rotateX({{sa_el_transform_fx_rotate_x_mobile.SIZE || 0}}deg) rotateY({{sa_el_transform_fx_rotate_y_mobile.SIZE || 0}}deg) rotateZ({{sa_el_transform_fx_rotate_z_mobile.SIZE || 0}}deg);'
                        . 'transform:'
                            . 'translate({{sa_el_transform_fx_translate_x_mobile.SIZE || 0}}px, {{sa_el_transform_fx_translate_y_mobile.SIZE || 0}}px) '
                            . 'rotateX({{sa_el_transform_fx_rotate_x_mobile.SIZE || 0}}deg) rotateY({{sa_el_transform_fx_rotate_y_mobile.SIZE || 0}}deg) rotateZ({{sa_el_transform_fx_rotate_z_mobile.SIZE || 0}}deg);'
                ]
            ]
        );

        $element->end_popover();

        $element->add_control(
            'sa_el_transform_fx_scale_toggle',
            [
                'label' => __( 'Scale', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'return_value' => 'yes',
                'condition' => [
                    'sa_el_transform_fx' => 'yes',
                ],
            ]
        );

        $element->start_popover();

        $element->add_responsive_control(
            'sa_el_transform_fx_scale_x',
            [
                'label' => __( 'Scale X', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 1
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 5,
                        'step' => .1
                    ]
                ],
                'condition' => [
                    'sa_el_transform_fx_scale_toggle' => 'yes',
                    'sa_el_transform_fx' => 'yes',
                ],
            ]
        );

        $element->add_responsive_control(
            'sa_el_transform_fx_scale_y',
            [
                'label' => __( 'Scale Y', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 1
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 5,
                        'step' => .1
                    ]
                ],
                'condition' => [
                    'sa_el_transform_fx_scale_toggle' => 'yes',
                    'sa_el_transform_fx' => 'yes',
                ],
                'selectors' => [
                    '(desktop){{WRAPPER}}' =>
                        '-ms-transform:'
                            . 'translate({{sa_el_transform_fx_translate_x.SIZE || 0}}px, {{sa_el_transform_fx_translate_y.SIZE || 0}}px) '
                            . 'rotateX({{sa_el_transform_fx_rotate_x.SIZE || 0}}deg) rotateY({{sa_el_transform_fx_rotate_y.SIZE || 0}}deg) rotateZ({{sa_el_transform_fx_rotate_z.SIZE || 0}}deg) '
                            . 'scaleX({{sa_el_transform_fx_scale_x.SIZE || 1}}) scaleY({{sa_el_transform_fx_scale_y.SIZE || 1}});'
                        . '-webkit-transform:'
                            . 'translate({{sa_el_transform_fx_translate_x.SIZE || 0}}px, {{sa_el_transform_fx_translate_y.SIZE || 0}}px) '
                            . 'rotateX({{sa_el_transform_fx_rotate_x.SIZE || 0}}deg) rotateY({{sa_el_transform_fx_rotate_y.SIZE || 0}}deg) rotateZ({{sa_el_transform_fx_rotate_z.SIZE || 0}}deg) '
                            . 'scaleX({{sa_el_transform_fx_scale_x.SIZE || 1}}) scaleY({{sa_el_transform_fx_scale_y.SIZE || 1}});'
                        . 'transform:'
                            . 'translate({{sa_el_transform_fx_translate_x.SIZE || 0}}px, {{sa_el_transform_fx_translate_y.SIZE || 0}}px) '
                            . 'rotateX({{sa_el_transform_fx_rotate_x.SIZE || 0}}deg) rotateY({{sa_el_transform_fx_rotate_y.SIZE || 0}}deg) rotateZ({{sa_el_transform_fx_rotate_z.SIZE || 0}}deg) '
                            . 'scaleX({{sa_el_transform_fx_scale_x.SIZE || 1}}) scaleY({{sa_el_transform_fx_scale_y.SIZE || 1}});',
                    '(tablet){{WRAPPER}}' =>
                        '-ms-transform:'
                            . 'translate({{sa_el_transform_fx_translate_x_tablet.SIZE || 0}}px, {{sa_el_transform_fx_translate_y_tablet.SIZE || 0}}px) '
                            . 'rotateX({{sa_el_transform_fx_rotate_x_tablet.SIZE || 0}}deg) rotateY({{sa_el_transform_fx_rotate_y_tablet.SIZE || 0}}deg) rotateZ({{sa_el_transform_fx_rotate_z_tablet.SIZE || 0}}deg) '
                            . 'scaleX({{sa_el_transform_fx_scale_x_tablet.SIZE || 1}}) scaleY({{sa_el_transform_fx_scale_y_tablet.SIZE || 1}});'
                        . '-webkit-transform:'
                            . 'translate({{sa_el_transform_fx_translate_x_tablet.SIZE || 0}}px, {{sa_el_transform_fx_translate_y_tablet.SIZE || 0}}px) '
                            . 'rotateX({{sa_el_transform_fx_rotate_x_tablet.SIZE || 0}}deg) rotateY({{sa_el_transform_fx_rotate_y_tablet.SIZE || 0}}deg) rotateZ({{sa_el_transform_fx_rotate_z_tablet.SIZE || 0}}deg) '
                            . 'scaleX({{sa_el_transform_fx_scale_x_tablet.SIZE || 1}}) scaleY({{sa_el_transform_fx_scale_y_tablet.SIZE || 1}});'
                        . 'transform:'
                            . 'translate({{sa_el_transform_fx_translate_x_tablet.SIZE || 0}}px, {{sa_el_transform_fx_translate_y_tablet.SIZE || 0}}px) '
                            . 'rotateX({{sa_el_transform_fx_rotate_x_tablet.SIZE || 0}}deg) rotateY({{sa_el_transform_fx_rotate_y_tablet.SIZE || 0}}deg) rotateZ({{sa_el_transform_fx_rotate_z_tablet.SIZE || 0}}deg) '
                            . 'scaleX({{sa_el_transform_fx_scale_x_tablet.SIZE || 1}}) scaleY({{sa_el_transform_fx_scale_y_tablet.SIZE || 1}});',
                    '(mobile){{WRAPPER}}' =>
                        '-ms-transform:'
                            . 'translate({{sa_el_transform_fx_translate_x_mobile.SIZE || 0}}px, {{sa_el_transform_fx_translate_y_mobile.SIZE || 0}}px) '
                            . 'rotateX({{sa_el_transform_fx_rotate_x_mobile.SIZE || 0}}deg) rotateY({{sa_el_transform_fx_rotate_y_mobile.SIZE || 0}}deg) rotateZ({{sa_el_transform_fx_rotate_z_mobile.SIZE || 0}}deg) '
                            . 'scaleX({{sa_el_transform_fx_scale_x_mobile.SIZE || 1}}) scaleY({{sa_el_transform_fx_scale_y_mobile.SIZE || 1}});'
                        . '-webkit-transform:'
                            . 'translate({{sa_el_transform_fx_translate_x_mobile.SIZE || 0}}px, {{sa_el_transform_fx_translate_y_mobile.SIZE || 0}}px) '
                            . 'rotateX({{sa_el_transform_fx_rotate_x_mobile.SIZE || 0}}deg) rotateY({{sa_el_transform_fx_rotate_y_mobile.SIZE || 0}}deg) rotateZ({{sa_el_transform_fx_rotate_z_mobile.SIZE || 0}}deg) '
                            . 'scaleX({{sa_el_transform_fx_scale_x_mobile.SIZE || 1}}) scaleY({{sa_el_transform_fx_scale_y_mobile.SIZE || 1}});'
                        . 'transform:'
                            . 'translate({{sa_el_transform_fx_translate_x_mobile.SIZE || 0}}px, {{sa_el_transform_fx_translate_y_mobile.SIZE || 0}}px) '
                            . 'rotateX({{sa_el_transform_fx_rotate_x_mobile.SIZE || 0}}deg) rotateY({{sa_el_transform_fx_rotate_y_mobile.SIZE || 0}}deg) rotateZ({{sa_el_transform_fx_rotate_z_mobile.SIZE || 0}}deg) '
                            . 'scaleX({{sa_el_transform_fx_scale_x_mobile.SIZE || 1}}) scaleY({{sa_el_transform_fx_scale_y_mobile.SIZE || 1}});'
                ]
            ]
        );

        $element->end_popover();

        $element->add_control(
            'sa_el_transform_fx_skew_toggle',
            [
                'label' => __( 'Skew', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'return_value' => 'yes',
                'condition' => [
                    'sa_el_transform_fx' => 'yes',
                ],
            ]
        );

        $element->start_popover();

        $element->add_responsive_control(
            'sa_el_transform_fx_skew_x',
            [
                'label' => __( 'Skew X', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['deg'],
                'range' => [
                    'px' => [
                        'min' => -180,
                        'max' => 180,
                    ]
                ],
                'condition' => [
                    'sa_el_transform_fx_skew_toggle' => 'yes',
                    'sa_el_transform_fx' => 'yes',
                ],
            ]
        );

        $element->add_responsive_control(
            'sa_el_transform_fx_skew_y',
            [
                'label' => __( 'Skew Y', SA_ELEMENTOR_TEXTDOMAIN ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['deg'],
                'range' => [
                    'px' => [
                        'min' => -180,
                        'max' => 180,
                    ]
                ],
                'condition' => [
                    'sa_el_transform_fx_skew_toggle' => 'yes',
                    'sa_el_transform_fx' => 'yes',
                ],
                'selectors' => [
                    '(desktop){{WRAPPER}}' =>
                        '-ms-transform:'
                            . 'translate({{sa_el_transform_fx_translate_x.SIZE || 0}}px, {{sa_el_transform_fx_translate_y.SIZE || 0}}px) '
                            . 'rotateX({{sa_el_transform_fx_rotate_x.SIZE || 0}}deg) rotateY({{sa_el_transform_fx_rotate_y.SIZE || 0}}deg) rotateZ({{sa_el_transform_fx_rotate_z.SIZE || 0}}deg) '
                            . 'scaleX({{sa_el_transform_fx_scale_x.SIZE || 1}}) scaleY({{sa_el_transform_fx_scale_y.SIZE || 1}}) '
                            . 'skew({{sa_el_transform_fx_skew_x.SIZE || 0}}deg, {{sa_el_transform_fx_skew_y.SIZE || 0}}deg);'
                        . '-webkit-transform:'
                            . 'translate({{sa_el_transform_fx_translate_x.SIZE || 0}}px, {{sa_el_transform_fx_translate_y.SIZE || 0}}px) '
                            . 'rotateX({{sa_el_transform_fx_rotate_x.SIZE || 0}}deg) rotateY({{sa_el_transform_fx_rotate_y.SIZE || 0}}deg) rotateZ({{sa_el_transform_fx_rotate_z.SIZE || 0}}deg) '
                            . 'scaleX({{sa_el_transform_fx_scale_x.SIZE || 1}}) scaleY({{sa_el_transform_fx_scale_y.SIZE || 1}}) '
                            . 'skew({{sa_el_transform_fx_skew_x.SIZE || 0}}deg, {{sa_el_transform_fx_skew_y.SIZE || 0}}deg);'
                        . 'transform:'
                            . 'translate({{sa_el_transform_fx_translate_x.SIZE || 0}}px, {{sa_el_transform_fx_translate_y.SIZE || 0}}px) '
                            . 'rotateX({{sa_el_transform_fx_rotate_x.SIZE || 0}}deg) rotateY({{sa_el_transform_fx_rotate_y.SIZE || 0}}deg) rotateZ({{sa_el_transform_fx_rotate_z.SIZE || 0}}deg) '
                            . 'scaleX({{sa_el_transform_fx_scale_x.SIZE || 1}}) scaleY({{sa_el_transform_fx_scale_y.SIZE || 1}}) '
                            . 'skew({{sa_el_transform_fx_skew_x.SIZE || 0}}deg, {{sa_el_transform_fx_skew_y.SIZE || 0}}deg);',
                    '(tablet){{WRAPPER}}' =>
                        '-ms-transform:'
                            . 'translate({{sa_el_transform_fx_translate_x_tablet.SIZE || 0}}px, {{sa_el_transform_fx_translate_y_tablet.SIZE || 0}}px) '
                            . 'rotateX({{sa_el_transform_fx_rotate_x_tablet.SIZE || 0}}deg) rotateY({{sa_el_transform_fx_rotate_y_tablet.SIZE || 0}}deg) rotateZ({{sa_el_transform_fx_rotate_z_tablet.SIZE || 0}}deg) '
                            . 'scaleX({{sa_el_transform_fx_scale_x_tablet.SIZE || 1}}) scaleY({{sa_el_transform_fx_scale_y_tablet.SIZE || 1}}) '
                            . 'skew({{sa_el_transform_fx_skew_x_tablet.SIZE || 0}}deg, {{sa_el_transform_fx_skew_y_tablet.SIZE || 0}}deg);'
                        . '-webkit-transform:'
                            . 'translate({{sa_el_transform_fx_translate_x_tablet.SIZE || 0}}px, {{sa_el_transform_fx_translate_y_tablet.SIZE || 0}}px) '
                            . 'rotateX({{sa_el_transform_fx_rotate_x_tablet.SIZE || 0}}deg) rotateY({{sa_el_transform_fx_rotate_y_tablet.SIZE || 0}}deg) rotateZ({{sa_el_transform_fx_rotate_z_tablet.SIZE || 0}}deg) '
                            . 'scaleX({{sa_el_transform_fx_scale_x_tablet.SIZE || 1}}) scaleY({{sa_el_transform_fx_scale_y_tablet.SIZE || 1}}) '
                            . 'skew({{sa_el_transform_fx_skew_x_tablet.SIZE || 0}}deg, {{sa_el_transform_fx_skew_y_tablet.SIZE || 0}}deg);'
                        . 'transform:'
                            . 'translate({{sa_el_transform_fx_translate_x_tablet.SIZE || 0}}px, {{sa_el_transform_fx_translate_y_tablet.SIZE || 0}}px) '
                            . 'rotateX({{sa_el_transform_fx_rotate_x_tablet.SIZE || 0}}deg) rotateY({{sa_el_transform_fx_rotate_y_tablet.SIZE || 0}}deg) rotateZ({{sa_el_transform_fx_rotate_z_tablet.SIZE || 0}}deg) '
                            . 'scaleX({{sa_el_transform_fx_scale_x_tablet.SIZE || 1}}) scaleY({{sa_el_transform_fx_scale_y_tablet.SIZE || 1}}) '
                            . 'skew({{sa_el_transform_fx_skew_x_tablet.SIZE || 0}}deg, {{sa_el_transform_fx_skew_y_tablet.SIZE || 0}}deg);',
                    '(mobile){{WRAPPER}}' =>
                        '-ms-transform:'
                            . 'translate({{sa_el_transform_fx_translate_x_mobile.SIZE || 0}}px, {{sa_el_transform_fx_translate_y_mobile.SIZE || 0}}px) '
                            . 'rotateX({{sa_el_transform_fx_rotate_x_mobile.SIZE || 0}}deg) rotateY({{sa_el_transform_fx_rotate_y_mobile.SIZE || 0}}deg) rotateZ({{sa_el_transform_fx_rotate_z_mobile.SIZE || 0}}deg) '
                            . 'scaleX({{sa_el_transform_fx_scale_x_mobile.SIZE || 1}}) scaleY({{sa_el_transform_fx_scale_y_mobile.SIZE || 1}}) '
                            . 'skew({{sa_el_transform_fx_skew_x_mobile.SIZE || 0}}deg, {{sa_el_transform_fx_skew_y_mobile.SIZE || 0}}deg);'
                        . '-webkit-transform:'
                            . 'translate({{sa_el_transform_fx_translate_x_mobile.SIZE || 0}}px, {{sa_el_transform_fx_translate_y_mobile.SIZE || 0}}px) '
                            . 'rotateX({{sa_el_transform_fx_rotate_x_mobile.SIZE || 0}}deg) rotateY({{sa_el_transform_fx_rotate_y_mobile.SIZE || 0}}deg) rotateZ({{sa_el_transform_fx_rotate_z_mobile.SIZE || 0}}deg) '
                            . 'scaleX({{sa_el_transform_fx_scale_x_mobile.SIZE || 1}}) scaleY({{sa_el_transform_fx_scale_y_mobile.SIZE || 1}}) '
                            . 'skew({{sa_el_transform_fx_skew_x_mobile.SIZE || 0}}deg, {{sa_el_transform_fx_skew_y_mobile.SIZE || 0}}deg);'
                        . 'transform:'
                            . 'translate({{sa_el_transform_fx_translate_x_mobile.SIZE || 0}}px, {{sa_el_transform_fx_translate_y_mobile.SIZE || 0}}px) '
                            . 'rotateX({{sa_el_transform_fx_rotate_x_mobile.SIZE || 0}}deg) rotateY({{sa_el_transform_fx_rotate_y_mobile.SIZE || 0}}deg) rotateZ({{sa_el_transform_fx_rotate_z_mobile.SIZE || 0}}deg) '
                            . 'scaleX({{sa_el_transform_fx_scale_x_mobile.SIZE || 1}}) scaleY({{sa_el_transform_fx_scale_y_mobile.SIZE || 1}}) '
                            . 'skew({{sa_el_transform_fx_skew_x_mobile.SIZE || 0}}deg, {{sa_el_transform_fx_skew_y_mobile.SIZE || 0}}deg);'
                ]
            ]
        );

        $element->end_popover();
   

        $element->end_controls_section();
    }
    
    
}
