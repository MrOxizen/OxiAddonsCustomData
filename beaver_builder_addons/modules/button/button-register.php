<?php

/**
 * register Oxi unlimited addons button module
 */
FLBuilder::register_module('Button_module', array(
    'General' => array(
        'title' => __('Content', SA_FLBUILDER_TEXTDOMAIN),
        'sections' => array(
            'general' => array(
                'title' => '',
                'fields' => array(
                    'text' => array(
                        'type' => 'text',
                        'label' => __('Button Text', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => __('Click Here', SA_FLBUILDER_TEXTDOMAIN),
                        'preview' => array(
                            'type' => 'text',
                            'selector' => '.oxi__button'
                        ),
                        'connections' => array('string', 'html')
                    ),
                    'secondary_text' => array(
                        'type' => 'text',
                        'label' => __('Secondary Text', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => __('Go!', SA_FLBUILDER_TEXTDOMAIN),
                        'preview' => array(
                            'type' => 'text',
                            'selector' => '.oxi__button'
                        ),
                        'connections' => array('string', 'html')
                    ),
                    'button_icon' => array(
                        'type' => 'icon',
                        'label' => __('Icon', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => __('', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => 'fa fa-twitter',
                        'help' => __('Insert Font Awesome Icon Class Name', SA_FLBUILDER_TEXTDOMAIN),
                        'connections' => array('string', 'html'),
                        'show_remove' => true,
                    ),
                    'icon_position' => array(
                        'type' => 'select',
                        'label' => __('Icon Position', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'left',
                        'options' => array(
                            'left' => __('Left Side', SA_FLBUILDER_TEXTDOMAIN),
                            'right' => __('Right Side', SA_FLBUILDER_TEXTDOMAIN)
                        ),
                    ),
                    'icon_spacing' => array(
                        'type'        => 'unit',
                        'label'       => 'Icon Spacing',
                        'description' => 'px',
                        'default' => '5'
                    ),
                )
            ),
            'link' => array(
                'title' => __('Link', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'link' => array(
                        'type' => 'link',
                        'label' => __('Link', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => 'http://www.facebook.com',
                        'default' => '#',
                        'show_target' => true,
                        'show_nofollow' => true,
                        'preview' => array(
                            'type' => 'none'
                        ),
                        'connection' => array('url')
                    )
                )
            ),
        )
    ),
    'style' => array( //tab
        'title' => __('Styles', SA_FLBUILDER_TEXTDOMAIN), // Tab title.
        'sections' => array(
            'styling' => array(
                'title'  => __('Button Style', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'styling' => array(
                        'type'    => 'select',
                        'label'   => __('Button Effects', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'default',
                        'options' => array(
                            'default' => __('Default', SA_FLBUILDER_TEXTDOMAIN),
                            'shutter' => __('Shutter', SA_FLBUILDER_TEXTDOMAIN),
                            'rayen' => __('Rayen', SA_FLBUILDER_TEXTDOMAIN),
                            'winona' => __('Winona', SA_FLBUILDER_TEXTDOMAIN),
                            'tamaya' => __('Tamaya', SA_FLBUILDER_TEXTDOMAIN),
                        ),
                        'toggle'  => array(
                            'shutter'   => array(
                                'fields' => array('shutter_effects'),
                            ),
                            'rayen'   => array(
                                'fields' => array('rayen_effects'),
                            ),
                            'winona'   => array(
                                'fields' => array('winona_effects', 'secondary_text'),
                            ),
                            'tamaya'   => array(
                                'fields' => array('secondary_text'),
                            ),
                        ),
                    ),
                    'shutter_effects' => array(
                        'type'    => 'select',
                        'label'   => __('Shutter', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'left_to_right',
                        'options' => array(
                            'shutter_in_hori' => __('Shutter in Horizontal', SA_FLBUILDER_TEXTDOMAIN),
                            'shutter_in_var' => __('Shutter in Vertical', SA_FLBUILDER_TEXTDOMAIN),
                            'shutter_out_hori' => __('Shutter out Horizontal', SA_FLBUILDER_TEXTDOMAIN),
                            'shutter_out_var' => __('Shutter out Vertical', SA_FLBUILDER_TEXTDOMAIN),
                        ),
                    ),
                    'rayen_effects' => array(
                        'type'    => 'select',
                        'label'   => __('Shutter', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'default',
                        'options' => array(
                            'left_to_right' => __('Left To Right', SA_FLBUILDER_TEXTDOMAIN),
                            'right_to_left' => __('Right To Left', SA_FLBUILDER_TEXTDOMAIN),
                            'top_to_bottom' => __('Top To Bottom', SA_FLBUILDER_TEXTDOMAIN),
                            'bottom_to_top' => __('Bottom To Top', SA_FLBUILDER_TEXTDOMAIN)
                        ),
                    ),
                    'winona_effects' => array(
                        'type'    => 'select',
                        'label'   => __('Shutter', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'default',
                        'options' => array(
                            'left_to_right' => __('Left To Right', SA_FLBUILDER_TEXTDOMAIN),
                            'right_to_left' => __('Right To Left', SA_FLBUILDER_TEXTDOMAIN),
                            'top_to_bottom' => __('Top To Bottom', SA_FLBUILDER_TEXTDOMAIN),
                            'bottom_to_top' => __('Bottom To Top', SA_FLBUILDER_TEXTDOMAIN)
                        ),
                    ),
                ),
            ),
            'formatting' => array(
                'title'  => __('Structure', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'button_width' => array(
                        'type'    => 'select',
                        'label'   => __('Width', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'auto',
                        'options' => array(
                            'auto'   => _x('Auto', 'Width.', SA_FLBUILDER_TEXTDOMAIN),
                            'full'   => __('Full Width', SA_FLBUILDER_TEXTDOMAIN),
                            'custom' => __('Custom', SA_FLBUILDER_TEXTDOMAIN),
                        ),
                        'toggle'  => array(
                            'auto'   => array(
                                'fields' => array('button_padding'),
                            ),
                            'full'   => array(
                                'fields' => array('button_padding'),
                            ),
                            'custom' => array(
                                'fields' => array('custom_width', 'custom_height'),
                            ),
                        ),
                    ),
                    'custom_width'  => array(
                        'type'        => 'text',
                        'label'       => __('Custom Width', SA_FLBUILDER_TEXTDOMAIN),
                        'default'     => '200',
                        'maxlength'   => '3',
                        'size'        => '4',
                        'description' => 'px',
                    ),
                    'custom_height'      => array(
                        'type'        => 'text',
                        'label'       => __('Custom Height', SA_FLBUILDER_TEXTDOMAIN),
                        'default'     => '45',
                        'maxlength'   => '3',
                        'size'        => '4',
                        'description' => 'px',
                    ),
                    'alignment' => array(
                        'type'    => 'align',
                        'label'   => 'Alignment',
                        'default' => 'center',
                        'responsive' => true,
                        'preview' => array(
                            'type'       => 'css',
                            'property'   => 'text-align',
                            'selector' => '.oxi__button_wrapper_main'
                        ),
                    ),
                    'button_padding' => array(
                        'type' => 'dimension',
                        'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                        'help' => __('Manage the inside Button padding', SA_FLBUILDER_TEXTDOMAIN),
                        'slider' => true,
                        'units' => array('px'),
                        'responsive' => array(
                            'placeholder' => array(
                                'default' => '15',
                                'medium' => '10',
                                'responsive' => '5',
                            ),
                        ),
                    ),
                ),
            ),
            'Color' => array(
                'title' => __('Color', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'text_color' => array(
                        'type' => 'color',
                        'label' => __('Text Color', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
                    ),
                    'button_background_type' => array(
                        'type' => 'select',
                        'label' => __('Background Type', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'color',
                        'help' => __('Button Gradient Only Work For Button Default Effect', SA_FLBUILDER_TEXTDOMAIN),
                        'options' => array(
                            'color' => __('Color', SA_FLBUILDER_TEXTDOMAIN),
                            'gradient' => __('Gradient', SA_FLBUILDER_TEXTDOMAIN),
                        ),
                        'toggle' => array(
                            'color' => array(
                                'fields' => array('button_background_color', 'button_background_color_opc'),
                            ),
                            'gradient' => array(
                                'fields' => array('button_gradient'),
                            ),
                        ),
                    ),
                    'button_background_color' => array(
                        'type' => 'color',
                        'label' => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
                    ),
                    'button_gradient' => array(
                        'type'    => 'gradient',
                        'label'   => 'Gradient',
                        'connections' => array('gradient'),
                        'preview' => array(
                            'type'     => 'css',
                            'property' => 'background-image',
                        ),
                    ),
                ),
            ),
            'border' => array(
                'title' => __('Border', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'front_border' => array(
                        'type' => 'border',
                        'label' => __('Border', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => array(
                            'style' => 'solid',
                            'color' => 'dbdbdb',
                            'width' => array(
                                'top' => '1',
                                'right' => '1',
                                'bottom' => '1',
                                'left' => '1',
                            ),
                        ),
                        'responsive' => true,
                        'preview' => array(
                            'type' => 'css',
                            'selector' => '.oxi__button',
                            'important' => true,
                        ),
                    ),
                ),
            ),
            'button_hover_setting' => array(
                'title' => __('Hover Setting', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'button_hover_background_type' => array(
                        'type' => 'select',
                        'label' => __('Background Type', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'color',
                        'help' => __('Button Hover Background Color and Gradient', SA_FLBUILDER_TEXTDOMAIN),
                        'options' => array(
                            'color' => __('Color', SA_FLBUILDER_TEXTDOMAIN),
                            'gradient' => __('Gradient', SA_FLBUILDER_TEXTDOMAIN),
                        ),
                        'toggle' => array(
                            'color' => array(
                                'fields' => array('button_hover_background_color', 'button_background_color_opc'),
                            ),
                            'gradient' => array(
                                'fields' => array('button_hover_gradient'),
                            ),
                        ),
                    ),
                    'button_hover_background_color' => array(
                        'type' => 'color',
                        'label' => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
                    ),
                    'button_hover_gradient' => array(
                        'type'    => 'gradient',
                        'label'   => 'Gradient',
                        'connections' => array('gradient'),
                        'preview' => array(
                            'type'     => 'css',
                            'property' => 'background-image',
                        ),
                    ),
                    'hover_text_color' => array(
                        'type' => 'color',
                        'label' => __('Hover Text Color', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
                    ),
                    'hover_border_color' => array(
                        'type' => 'color',
                        'label' => __('Hover Border Color', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
                    ),
                    'hover_box_shadow' => array(
                        'type'        => 'shadow',
                        'label'       => 'Hover Box Shadow',
                        'show_spread' => true,
                        'preview'     => array(
                            'type'     => 'css',
                            'selector' => '.oxi-addons-hover-box-shadow',
                            'property' => 'box-shadow',
                        ),
                    ),
                ),
            ),
        ),
    ),
    'typography' => array( // Tab.
        'title' => __('Typography', SA_FLBUILDER_TEXTDOMAIN), // Tab title.
        'sections' => array( // Tab Sections. 
            'button_typography' => array(
                'title' => __('Front Title', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'button_font_typo' => array(
                        'type' => 'typography',
                        'label' => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                        'responsive' => true,
                        'preview' => array(
                            'type' => 'css',
                            'selector' => '.oxi__button',
                            'important' => true,
                        ),
                    ),
                ),
            ),
        ),
    ),
));
