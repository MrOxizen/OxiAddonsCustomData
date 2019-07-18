<?php

/**
 * register Oxi unlimited addons button module
 */
FLBuilder::register_module('Button_module', array(
    'General' => array(
        'title' => __('General', SA_FLBUILDER_TEXTDOMAIN),
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
                            'selector' => '.oxi-button-text'
                        ),
                        'connections' => array('string', 'html')
                    ),
                    'icon' => array(
                        'type' => 'icon',
                        'label' => __('FontAwesome Icon', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => __('', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => 'fa fa-twitter',
                        'help' => __('Insert Font Awesome Icon Class Name', SA_FLBUILDER_TEXTDOMAIN),
                        'preview' => array(
                            'type' => 'text',
                            'selector' => '.oxi-button-icon'
                        ),
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
            'padding' => array(
                'title' => __('Button Padding', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
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
        'title' => __('Button Setting', SA_FLBUILDER_TEXTDOMAIN), // Tab title.
        'sections' => array(
            'Background' => array(
                'title' => __('Background ', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
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
                        'label' => __('Background Color', 'uabb'),
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
                        'responsive' => false,
                        'preview' => array(
                            'type' => 'css',
                            'selector' => '.oxi-button-style',
                            'important' => true,
                        ),
                    ),
                ),
            ),
        ),
    ),
    'hover_setting' => array( // Tab.
        'title' => __('Hover', SA_FLBUILDER_TEXTDOMAIN), // Tab title.
        'sections' => array( // Tab Sections.
            'button_hover_setting' => array(
                'title' => __('Hover Setting', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
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
            'background_hover_setting' => array(
                'title' => __('Background Hover Setting', SA_FLBUILDER_TEXTDOMAIN),
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
                        'label' => __('Background Color', 'uabb'),
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
                ),
            ),
        ),
    ),
    'typography' => array( // Tab.
        'title' => __('Typography', SA_FLBUILDER_TEXTDOMAIN), // Tab title.
        'sections' => array( // Tab Sections.
            'colors' => array(
                'title' => __('Text Color', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'text_color' => array(
                        'type' => 'color',
                        'label' => __('Text Color', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
                    ),
                ),
            ),
            'text-align' => array(
                'title' => __('Text Color', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'text-align' => array(
                        'type'    => 'align',
                        'label'   => 'Text Align',
                        'default' => 'center',
                        'responsive' => 'true',
                        'preview' => array(
                            'type'       => 'css',
                            'selector'   => '.my-selector',
                            'property'   => 'text-align',
                        ),
                    ),
                ),
            ),
            'button_typography' => array(
                'title' => __('Front Title', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'button_font_typo' => array(
                        'type' => 'typography',
                        'label' => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                        'responsive' => true,
                        'preview' => array(
                            'type' => 'css',
                            'selector' => 'button-font',
                            'important' => true,
                        ),
                    ),
                ),
            ),
        ),
    ),
));
