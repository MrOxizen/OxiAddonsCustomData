<?php

/**
 * register Oxi unlimited addons button module
 */
FLBuilder::register_module('Button_module', array(
    'General' => array(
        'title' => __('Content', SA_FLBUILDER_TEXTDOMAIN),
        'sections' => array(
            'styling' => array(
                'title'  => __('Button Style', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'styling' => array(
                        'type'    => 'select',
                        'label'   => __('Style', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'default',
                        'options' => array(
                            'default' => __('Default', SA_FLBUILDER_TEXTDOMAIN),
                            'icon' => __('Icon', SA_FLBUILDER_TEXTDOMAIN),
                        ),
                        'toggle'  => array(
                            'default'   => array(
                                'fields' => array('button_width', 'button_padding'),
                            ),
                            'icon'   => array(
                                'fields' => array('button_icon', 'icon_position', 'icon_style', 'icon_button_width', 'icon_button_height'),
                            ),
                        ),
                    ),
                ),
            ),
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
                    'icon_style' => array(
                        'type' => 'select',
                        'label' => __('Show Item', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'show_icon_text',
                        'options' => array(
                            'show_text' => __('Show Text', SA_FLBUILDER_TEXTDOMAIN),
                            'show_icon' => __('Show Icon', SA_FLBUILDER_TEXTDOMAIN),
                            'show_icon_text' => __('Show Icon & Text', SA_FLBUILDER_TEXTDOMAIN)
                        ),
                        'toggle'  => array(
                            'show_text'   => array(
                                'fields' => array('icon_animation'),
                            ),
                            'show_icon'   => array(
                                'fields' => array('icon_animation'),
                            ),
                            'show_icon_text'   => array(
                                'fields' => array('icon_position'),
                            ),
                        ),
                    ),
                    'icon_animation' => array(
                        'type' => 'select',
                        'label' => __('Animation', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'default',
                        'options' => array(
                            'default' => __('Defalut', SA_FLBUILDER_TEXTDOMAIN),
                            'left_to_right' => __('Left To Right', SA_FLBUILDER_TEXTDOMAIN),
                            'right_to_left' => __('Right To Left', SA_FLBUILDER_TEXTDOMAIN),
                            'top_to_bottom' => __('Top To Bottom', SA_FLBUILDER_TEXTDOMAIN),
                            'bottom_to_top' => __('Bottom To Top', SA_FLBUILDER_TEXTDOMAIN),
                        ),
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
                    'icon_button_width'       => array(
                        'type'        => 'text',
                        'label'       => __('Custom Width', SA_FLBUILDER_TEXTDOMAIN),
                        'default'     => '200',
                        'maxlength'   => '3',
                        'size'        => '4',
                        'description' => 'px',
                    ),
                    'icon_button_height'      => array(
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
                            'property'   => 'justify-content',
                            'selector' => '.oxi__button_wrapper'
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
        )
    ),
    'style' => array( //tab
        'title' => __('Styles', SA_FLBUILDER_TEXTDOMAIN), // Tab title.
        'sections' => array(

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
                        'help' => __('Button Background Color and Gradient', SA_FLBUILDER_TEXTDOMAIN),
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
