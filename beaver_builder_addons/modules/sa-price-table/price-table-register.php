<?php

/**
 * Register the module and its form settings for beaver builder  version
 *  
 *
 * @package Shortcodes addons Price Table module
 */

FLBuilder::register_module(
    'price_table',
    array(
        'general'       => array(
            'title'    => __('Content', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array(
                'features'       => array(
                    'title'         => __('Feature', SA_FLBUILDER_TEXTDOMAIN),
                    'fields'        => array(
                        'features'          => array(
                            'type'          => 'text',
                            'label'         => '',
                            'default'       => __('Feature 01', SA_FLBUILDER_TEXTDOMAIN),
                            'placeholder'   => __('Add new Feature', SA_FLBUILDER_TEXTDOMAIN),
                            'multiple'      => true,
                            'preview'   => array(
                                'type'      => 'none'
                            )
                        ),
                    )
                ),
                'title-section' => array(
                    'title'  => __('Price Title & value', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'title'     => array(
                            'type'        => 'text',
                            'label'       => __('title', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => __('Premium', SA_FLBUILDER_TEXTDOMAIN),
                            'help'        => __('Enter price table Title here', SA_FLBUILDER_TEXTDOMAIN),
                            'connections' => array('string', 'html'),
                        ),
                        'price_value'     => array(
                            'type'        => 'text',
                            'label'       => __('Price Value', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => __('<sup>$</sup>70', SA_FLBUILDER_TEXTDOMAIN),
                            'help'        => __('Enter price table price value', SA_FLBUILDER_TEXTDOMAIN),
                            'connections' => array('string', 'html'),
                        ),
                        'duration'     => array(
                            'type'        => 'text',
                            'label'       => __('Duration', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => __('Monthly', SA_FLBUILDER_TEXTDOMAIN),
                            'help'        => __('Enter price table Duration', SA_FLBUILDER_TEXTDOMAIN),
                            'connections' => array('string', 'html'),
                        ),
                    ),
                ),
                'button_ribbon_show' => array(
                    'title'  => __('Button & ribbon', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'ribbon' => array(
                            'type'    => 'select',
                            'label'   => __('Ribbon', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'show',
                            'options' => array(
                                'show'            => __('Show', SA_FLBUILDER_TEXTDOMAIN),
                                'hide'           => __('Hide', SA_FLBUILDER_TEXTDOMAIN)
                            ),
                            'toggle'  => array(
                                'show'           => array(
                                    'sections' => array('ribbon_settings'),
                                    'fields' => array('ribbon_text'),
                                ),
                            ),
                        ),
                        'ribbon_text'     => array(
                            'type'        => 'text',
                            'label'       => __('ribbon Text', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => __('recommend', SA_FLBUILDER_TEXTDOMAIN),
                            'help'        => __('Enter price table ribbon Text', SA_FLBUILDER_TEXTDOMAIN),
                            'connections' => array('string', 'html'),
                        ),
                        'price_button' => array(
                            'type'    => 'select',
                            'label'   => __('Price Button', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'show',
                            'options' => array(
                                'show'            => __('Show', SA_FLBUILDER_TEXTDOMAIN),
                                'hide'           => __('Hide', SA_FLBUILDER_TEXTDOMAIN)
                            ),
                            'toggle'  => array(
                                'show'           => array(
                                    'sections' => array('button_settings', 'btn_typography', 'button_hover_settings'),
                                    'fields' => array('button_text', 'button_link'),
                                ),
                            ),
                        ),
                        'button_text'  => array(
                            'type'        => 'text',
                            'label'       => __('Button Text', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => __('Click Me', SA_FLBUILDER_TEXTDOMAIN),
                            'connections' => array('string', 'html'),
                        ),
                        'button_link'      => array(
                            'type'          => 'link',
                            'label'         => __('Select URL', SA_FLBUILDER_TEXTDOMAIN),
                            'connections'   => array('url'),
                            'show_target'   => true,
                            'show_nofollow' => true,
                        ),
                    ),
                ),
            ),
        ),
        'style'         => array(
            'title'    => __('Styles', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array(
                'layout-section'     => array(
                    'title'  => __('Styles', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'box_layout' => array(
                            'type'    => 'select',
                            'label'   => __('Select Layout Style', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'layout01',
                            'options' => array(
                                'layout01' => __('Layout 01', SA_FLBUILDER_TEXTDOMAIN),
                                'layout02' => __('Layout 02', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle'  => array(
                                'layout01' => array(
                                    'fields' => array('feature_top_margin'),
                                ),
                                'layout02' => array(
                                    'sections' => array('cricle_settings'),
                                    'fields' => array('feature_top_margin_02_layout'),
                                ),
                            ),
                        ),
                    ),
                ),
                'price_box' => array(
                    'title' => __('Outer Box Design', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'pice_border_package' => array(
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
                                'selector' => '.oxi__addons_price_table_main',
                                'important' => true,
                            ),
                        ),
                    ),
                ),
                'feature_settings'     => array(
                    'title'  => __('Feature Settings', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'feature_odd_bg_color'           => array(
                            'type'       => 'color',
                            'label'      => __('Odd Background Color', SA_FLBUILDER_TEXTDOMAIN),
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'feature_even_bg_color'           => array(
                            'type'       => 'color',
                            'label'      => __('Even Background Color', SA_FLBUILDER_TEXTDOMAIN),
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'feature_border_style'     => array(
                            'type'    => 'select',
                            'label'   => __('Border Bottom Style', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'none',
                            'help'    => __('Select  border  Bottom style', SA_FLBUILDER_TEXTDOMAIN),
                            'options' => array(
                                'none'   => __('None', SA_FLBUILDER_TEXTDOMAIN),
                                'solid'  => __('Solid', SA_FLBUILDER_TEXTDOMAIN),
                                'dashed' => __('Dashed', SA_FLBUILDER_TEXTDOMAIN),
                                'dotted' => __('Dotted', SA_FLBUILDER_TEXTDOMAIN),
                                'double' => __('Double', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle'  => array(
                                'solid'  => array(
                                    'fields' => array('feature_border_width', 'feature_border_color'),
                                ),
                                'dashed' => array(
                                    'fields' => array('feature_border_width', 'feature_border_color'),
                                ),
                                'dotted' => array(
                                    'fields' => array('feature_border_width', 'feature_border_color'),
                                ),
                                'double' => array(
                                    'fields' => array('feature_border_width', 'feature_border_color'),
                                ),
                            ),
                        ),
                        'feature_border_width'     => array(
                            'type'        => 'unit',
                            'label'       => __('Border Bottom Width', SA_FLBUILDER_TEXTDOMAIN),
                            'slider'      => true,
                            'units'       => array('px'),
                            'maxlength'   => '3',
                            'size'        => '6',
                            'placeholder' => '1',
                            'preview'     => array(
                                'type' => 'refresh',
                            ),
                        ),
                        'feature_border_color'           => array(
                            'type'       => 'color',
                            'label'      => __('Border Bottom Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'feature_padding' => array(
                            'type' => 'dimension',
                            'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage the Feature Padding Padding', SA_FLBUILDER_TEXTDOMAIN),
                            'slider' => true,
                            'units' => array('px'),
                            'responsive' => array(
                                'placeholder' => array(
                                    'default' => '5',
                                    'medium' => '5',
                                    'responsive' => '5',
                                ),
                            ),
                        ),
                        'feature_top_margin_02_layout'         => array(
                            'type'        => 'unit',
                            'label'       => __('Top Margin', SA_FLBUILDER_TEXTDOMAIN),
                            'maxlength'   => '4',
                            'size'        => '6',
                            'slider'      => true,
                            'units'       => array('px'),
                            'placeholder' => '80',
                        ),
                        'feature_top_margin'         => array(
                            'type'        => 'unit',
                            'label'       => __('Top Margin', SA_FLBUILDER_TEXTDOMAIN),
                            'maxlength'   => '4',
                            'size'        => '6',
                            'slider'      => true,
                            'units'       => array('px'),
                            'placeholder' => '10',
                        ),
                        'feature_bottom_margin'         => array(
                            'type'        => 'unit',
                            'label'       => __('Bottom Margin', SA_FLBUILDER_TEXTDOMAIN),
                            'maxlength'   => '4',
                            'size'        => '6',
                            'slider'      => true,
                            'units'       => array('px'),
                            'placeholder' => '10',
                        ),
                    ),
                ),

                'title_settings' => array(
                    'title' => __('Title & Price ', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'background_type' => array(
                            'type' => 'select',
                            'label' => __('Background Type', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'color',
                            'help' => __('Title Background Color Or Gradient', SA_FLBUILDER_TEXTDOMAIN),
                            'options' => array(
                                'color' => __('Color', SA_FLBUILDER_TEXTDOMAIN),
                                'gradient' => __('Gradient', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle' => array(
                                'color' => array(
                                    'fields' => array('title_bg'),
                                ),
                                'gradient' => array(
                                    'fields' => array('title_gradient'),
                                ),
                            ),
                        ),
                        'title_bg' => array(
                            'type' => 'color',
                            'label' => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => '',
                            'show_reset' => true,
                            'connections' => array('color'),
                            'show_alpha' => true,
                        ),
                        'title_gradient' => array(
                            'type'    => 'gradient',
                            'label'   => 'Gradient',
                            'connections' => array('gradient'),
                            'preview' => array(
                                'type'     => 'css',
                                'property' => 'background-image',
                            ),
                        ),
                        'title_padding' => array(
                            'type' => 'dimension',
                            'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage the Title Padding Padding', SA_FLBUILDER_TEXTDOMAIN),
                            'slider' => true,
                            'units' => array('px'),
                            'responsive' => array(
                                'placeholder' => array(
                                    'default' => '5',
                                    'medium' => '5',
                                    'responsive' => '5',
                                ),
                            ),
                        ),
                        'title_top_margin'         => array(
                            'type'        => 'unit',
                            'label'       => __('Top Margin', SA_FLBUILDER_TEXTDOMAIN),
                            'maxlength'   => '4',
                            'size'        => '6',
                            'slider'      => true,
                            'units'       => array('px'),
                            'placeholder' => '50',
                        ),
                    )
                ),
                'ribbon_settings' => array(
                    'title' => __('Ribbon Settings', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'rib_bg_color'           => array(
                            'type'       => 'color',
                            'label'      => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '55bfff',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'rib_width'         => array(
                            'type'        => 'unit',
                            'label'       => __('width', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => '170',
                            'maxlength'   => '4',
                            'size'        => '6',
                            'slider' => array(
                                'min'      => 0,
                                'max'      => 300,
                                'step'     => 5,
                            ),
                            'units'       => array('px'),
                            'placeholder' => '0',
                        ),
                        'rib_height'         => array(
                            'type'        => 'unit',
                            'label'       => __('height', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => '40',
                            'maxlength'   => '4',
                            'size'        => '6',
                            'slider' => array(
                                'min'      => 0,
                                'max'      => 300,
                                'step'     => 5,
                            ),
                            'units'       => array('px'),
                            'placeholder' => '0',
                        ),
                        'position' => array(
                            'type'    => 'select',
                            'label'   => __('Position', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'left',
                            'options' => array(
                                'left'            => __('Left', SA_FLBUILDER_TEXTDOMAIN),
                                'right'           => __('Right', SA_FLBUILDER_TEXTDOMAIN)
                            ),
                        ),
                        'rib_horizontal'         => array(
                            'type'        => 'unit',
                            'label'       => __('Position Horizontal', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => '-50',
                            'maxlength'   => '4',
                            'size'        => '6',
                            'slider' => array(
                                'min'      => -100,
                                'max'      => 100,
                                'step'     => 5,
                            ),
                            'units'       => array('px'),
                            'placeholder' => '0',
                        ),
                        'rib_vertical'         => array(
                            'type'        => 'unit',
                            'label'       => __('Position Vertical', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => '20',
                            'maxlength'   => '4',
                            'size'        => '6',
                            'slider' => array(
                                'min'      => -100,
                                'max'      => 100,
                                'step'     => 5,
                            ),
                            'units'       => array('px'),
                            'placeholder' => '0',
                        ),
                    ),
                ),
                'cricle_settings' => array(
                    'title' => __('Cricle Design', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'cricle_bg_size'          => array(
                            'type'        => 'unit',
                            'label'       => __('Background Size', SA_FLBUILDER_TEXTDOMAIN),
                            'help'        => __('Spacing between Icon & Background edge', SA_FLBUILDER_TEXTDOMAIN),
                            'placeholder' => '120',
                            'maxlength'   => '3',
                            'size'        => '6',
                            'slider'      => true,
                            'units'       => array('px'),
                        ),
                        'cricle_bg_color'           => array(
                            'type'       => 'color',
                            'label'      => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '55ddaa',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'cricle_border_style'     => array(
                            'type'    => 'select',
                            'label'   => __('Border Style', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'none',
                            'help'    => __('Select border style', SA_FLBUILDER_TEXTDOMAIN),
                            'options' => array(
                                'none'   => __('None', SA_FLBUILDER_TEXTDOMAIN),
                                'solid'  => __('Solid', SA_FLBUILDER_TEXTDOMAIN),
                                'dashed' => __('Dashed', SA_FLBUILDER_TEXTDOMAIN),
                                'dotted' => __('Dotted', SA_FLBUILDER_TEXTDOMAIN),
                                'double' => __('Double', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle'  => array(
                                'solid'  => array(
                                    'fields' => array('cricle_border_width', 'cricle_border_color'),
                                ),
                                'dashed' => array(
                                    'fields' => array('cricle_border_width', 'cricle_border_color'),
                                ),
                                'dotted' => array(
                                    'fields' => array('cricle_border_width', 'cricle_border_color'),
                                ),
                                'double' => array(
                                    'fields' => array('cricle_border_width', 'cricle_border_color'),
                                ),
                            ),
                        ),
                        'cricle_border_width'     => array(
                            'type'        => 'unit',
                            'label'       => __('Border Width', SA_FLBUILDER_TEXTDOMAIN),
                            'slider'      => true,
                            'units'       => array('px'),
                            'maxlength'   => '3',
                            'size'        => '6',
                            'placeholder' => '1',
                            'preview'     => array(
                                'type' => 'refresh',
                            ),
                        ),
                        'cricle_border_color'           => array(
                            'type'       => 'color',
                            'label'      => __('Border Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'cricle_border_radius' => array(
                            'type' => 'dimension',
                            'label' => __('Border Radius', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage the inside Icon Border Radius', SA_FLBUILDER_TEXTDOMAIN),
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

                'button_settings' => array(
                    'title'  => __('Button Style', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'btn_alignment' => array(
                            'type'    => 'select',
                            'label'   => __('Select Button Alignment', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'center',
                            'options' => array(
                                'left' => __('Left', SA_FLBUILDER_TEXTDOMAIN),
                                'center' => __('Center', SA_FLBUILDER_TEXTDOMAIN),
                                'right' => __('Right', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                        ),

                        'btn_text_color'         => array(
                            'type'       => 'color',
                            'label'      => __('Text Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'btn_bg_color'           => array(
                            'type'       => 'color',
                            'label'      => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'btn_border_style'     => array(
                            'type'    => 'select',
                            'label'   => __('Border Style', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'none',
                            'help'    => __('Select border style ', SA_FLBUILDER_TEXTDOMAIN),
                            'options' => array(
                                'none'   => __('None', SA_FLBUILDER_TEXTDOMAIN),
                                'solid'  => __('Solid', SA_FLBUILDER_TEXTDOMAIN),
                                'dashed' => __('Dashed', SA_FLBUILDER_TEXTDOMAIN),
                                'dotted' => __('Dotted', SA_FLBUILDER_TEXTDOMAIN),
                                'double' => __('Double', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle'  => array(
                                'solid'  => array(
                                    'fields' => array('btn_border_color', 'btn_border_width', 'btn_hover_border_color'),
                                ),
                                'dashed' => array(
                                    'fields' => array('btn_border_color', 'btn_border_width', 'btn_hover_border_color'),
                                ),
                                'dotted' => array(
                                    'fields' => array('btn_border_color', 'btn_border_width', 'btn_hover_border_color'),
                                ),
                                'double' => array(
                                    'fields' => array('btn_border_color', 'btn_border_width', 'btn_hover_border_color'),
                                ),
                            ),
                        ),
                        'btn_border_width'     => array(
                            'type'        => 'unit',
                            'label'       => __('Border Width', SA_FLBUILDER_TEXTDOMAIN),
                            'slider'      => true,
                            'units'       => array('px'),
                            'maxlength'   => '3',
                            'size'        => '6',
                            'placeholder' => '1',
                            'preview'     => array(
                                'type' => 'refresh',
                            ),
                        ),
                        'btn_border_color'           => array(
                            'type'       => 'color',
                            'label'      => __('Border Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'btn_border_radius' => array(
                            'type' => 'dimension',
                            'label' => __('Boder Radius', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage the inside Price Table Button Border Radius', SA_FLBUILDER_TEXTDOMAIN),
                            'slider' => true,
                            'units' => array('px'),
                            'responsive' => array(
                                'placeholder' => array(
                                    'default' => '5',
                                    'medium' => '5',
                                    'responsive' => '5',
                                ),
                            ),
                        ),
                        'btn_padding' => array(
                            'type' => 'dimension',
                            'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage the inside Price Table padding', SA_FLBUILDER_TEXTDOMAIN),
                            'slider' => true,
                            'units' => array('px'),
                            'responsive' => array(
                                'placeholder' => array(
                                    'default' => '10',
                                    'medium' => '5',
                                    'responsive' => '5',
                                ),
                            ),
                        ),
                        'btn_top_margin'         => array(
                            'type'        => 'unit',
                            'label'       => __('Top Margin', SA_FLBUILDER_TEXTDOMAIN),
                            'maxlength'   => '4',
                            'size'        => '6',
                            'slider'      => true,
                            'units'       => array('px'),
                            'placeholder' => '5',
                        ),
                        'btn_bottom_margin'         => array(
                            'type'        => 'unit',
                            'label'       => __('Bottom Margin', SA_FLBUILDER_TEXTDOMAIN),
                            'maxlength'   => '4',
                            'size'        => '6',
                            'slider'      => true,
                            'units'       => array('px'),
                            'placeholder' => '5',
                        ),
                        'box_shadow' => array(
                            'type'        => 'shadow',
                            'label'       => 'Box Shadow',
                            'show_spread' => true,
                            'preview'     => array(
                                'type'     => 'css',
                                'selector' => '.oxi__addons_button',
                                'property' => 'box-shadow',
                            ),
                        ),
                    ),
                ),
                'button_hover_settings' => array(
                    'title'  => __('Button Hover Style', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'btn_text_hover_color'   => array(
                            'type'       => 'color',
                            'label'      => __('Text Hover Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                            'preview'    => array(
                                'type' => 'none',
                            ),
                        ),

                        'btn_bg_hover_color'     => array(
                            'type'       => 'color',
                            'label'      => __('Background Hover Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'btn_hover_border_color'           => array(
                            'type'       => 'color',
                            'label'      => __('Border Hover Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'box_hover_shadow' => array(
                            'type'        => 'shadow',
                            'label'       => 'Hover Box Shadow',
                            'show_spread' => true,
                            'preview'     => array(
                                'type'     => 'css',
                                'selector' => '.oxi__addons_button',
                                'property' => 'box-shadow',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'typography'    => array(
            'title'    => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array(
                'heading_typography'     => array(
                    'title'  => __('Heading', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'heading_tag_selection' => array(
                            'type'    => 'select',
                            'label'   => __('Select Tag', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'h3',
                            'options' => array(
                                'h1'   => __('H1', SA_FLBUILDER_TEXTDOMAIN),
                                'h2'   => __('H2', SA_FLBUILDER_TEXTDOMAIN),
                                'h3'   => __('H3', SA_FLBUILDER_TEXTDOMAIN),
                                'h4'   => __('H4', SA_FLBUILDER_TEXTDOMAIN),
                                'h5'   => __('H5', SA_FLBUILDER_TEXTDOMAIN),
                                'h6'   => __('H6', SA_FLBUILDER_TEXTDOMAIN),
                                'div'  => __('Div', SA_FLBUILDER_TEXTDOMAIN),
                                'p'    => __('p', SA_FLBUILDER_TEXTDOMAIN),
                                'span' => __('span', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                        ),
                        'heading_font_typo'     => array(
                            'type'       => 'typography',
                            'label'      => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.oxi__addons_title',
                                'important' => true,
                            ),
                        ),
                        'heading_color'         => array(
                            'type'       => 'color',
                            'label'      => __('Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => 'fff',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'heading_padding' => array(
                            'type' => 'dimension',
                            'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage the inside Price Table padding', SA_FLBUILDER_TEXTDOMAIN),
                            'slider' => true,
                            'units' => array('px'),
                            'responsive' => array(
                                'placeholder' => array(
                                    'default' => '5',
                                    'medium' => '5',
                                    'responsive' => '5',
                                ),
                            ),
                        ),
                    ),
                ),

                'price_typography'         => array(
                    'title'  => __('Price Typo', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'price_font_typo' => array(
                            'type'       => 'typography',
                            'label'      => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.oxi__addons_price',
                                'important' => true,
                            ),
                        ),
                        'price_color'     => array(
                            'type'       => 'color',
                            'label'      => __('Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => 'fff',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'price_padding' => array(
                            'type' => 'dimension',
                            'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage the inside Price Table padding', SA_FLBUILDER_TEXTDOMAIN),
                            'slider' => true,
                            'units' => array('px'),
                            'responsive' => array(
                                'placeholder' => array(
                                    'default' => '5',
                                    'medium' => '5',
                                    'responsive' => '5',
                                ),
                            ),
                        ),
                    ),
                ),
                'duration_typography'         => array(
                    'title'  => __('Duration', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'duration_font_typo' => array(
                            'type'       => 'typography',
                            'label'      => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.oxi__addons_duration',
                                'important' => true,
                            ),
                        ),
                        'duration_color'     => array(
                            'type'       => 'color',
                            'label'      => __('Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => 'fff',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'duration_padding' => array(
                            'type' => 'dimension',
                            'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage the inside Info Table padding', SA_FLBUILDER_TEXTDOMAIN),
                            'slider' => true,
                            'units' => array('px'),
                            'responsive' => array(
                                'placeholder' => array(
                                    'default' => '5',
                                    'medium' => '5',
                                    'responsive' => '5',
                                ),
                            ),
                        ),
                    ),
                ),
                'feature_typography'         => array(
                    'title'  => __('Feature Typo', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'feature_font_typo' => array(
                            'type'       => 'typography',
                            'label'      => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.oxi__addons_feature',
                                'important' => true,
                            ),
                        ),
                        'feature_color'     => array(
                            'type'       => 'color',
                            'label'      => __('Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'feature_span_color'     => array(
                            'type'       => 'color',
                            'label'      => __('Span Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                    ),
                ),
                'ribbon_typography'         => array(
                    'title'  => __('Ribbon Typo', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'ribbon_font_typo' => array(
                            'type'       => 'typography',
                            'label'      => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.oxi__addons_main_title_value::after',
                                'important' => true,
                            ),
                        ),
                        'ribbon_color'     => array(
                            'type'       => 'color',
                            'label'      => __('Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => 'fff',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                    ),
                ),
                'btn_typography'         => array(
                    'title'  => __('Button', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'btn_font_typo' => array(
                            'type'       => 'typography',
                            'label'      => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.oxi__addons_button',
                                'important' => true,
                            ),
                        ),
                    ),
                ),
            ),
        ),
    )
);
