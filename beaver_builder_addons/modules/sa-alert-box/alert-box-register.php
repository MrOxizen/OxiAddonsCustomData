<?php

/**
 *   heading module
 * @package Shortcode addons 
 */

FLBuilder::register_module(
    'Alert_box',
    array(
        'general'    => array(
            'title'    => __('Content', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array(
                'content'     => array(
                    'title'  => '',
                    'fields' => array(
                        'icon_show'    => array(
                            'type'    => 'select',
                            'label'   => __('Show Icon', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'show',
                            'options' => array(
                                'show'       => __('Show', SA_FLBUILDER_TEXTDOMAIN),
                                'hide'       => __('Hide', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle'  => array(
                                'show'       => array(
                                    'sections' => array('icon_settings'),
                                    'fields' => array('icon'),
                                ),
                            ),
                        ),
                        'icon'            => array(
                            'type'        => 'icon',
                            'label'       => __('Icon', SA_FLBUILDER_TEXTDOMAIN),
                            'show_remove' => true,
                            'default' => 'fas fa-exclamation-triangle'
                        ),
                        'title' => array(
                            'type'        => 'text',
                            'label'       => __('Title', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => __('Success!', SA_FLBUILDER_TEXTDOMAIN),
                            'preview'     => array(
                                'type'     => 'text',
                                'selector' => '.oxi__addons_title',
                            ),
                            'connections' => array('string', 'html'),
                        ),
                        'sub_title' => array(
                            'type'        => 'text',
                            'label'       => __('Sub Title', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => __('important alert message.', SA_FLBUILDER_TEXTDOMAIN),
                            'preview'     => array(
                                'type'     => 'text',
                                'selector' => '.oxi__addons_title',
                            ),
                            'connections' => array('string', 'html'),
                        ),
                        'cross_icon'    => array(
                            'type'    => 'select',
                            'label'   => __('Cross Icon', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'true',
                            'options' => array(
                                'true'       => __('True', SA_FLBUILDER_TEXTDOMAIN),
                                'false'       => __('False', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle'  => array(
                                'true'       => array(
                                    'sections' => array('cross_icon_setting'),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'style'      => array(
            'title'    => __('Styles', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array(
                'box_settings' => array(
                    'title'  => __('Box Settings', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'box_bg_color' => array(
                            'type'        => 'color',
                            'label'       => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => '',
                            'show_reset'  => true,
                            'connections' => array('color'),
                            'show_alpha'  => true,
                            'preview'     => array(
                                'type'     => 'css',
                                'selector' => '.oxi__addons_alert_wrapper',
                                'property' => 'color',
                            ),
                        ),
                        'box_border' => array(
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
                                'selector' => '.oxi__addons_alert_wrapper',
                                'important' => true,
                            ),
                        ),
                    ),
                ),
                'icon_settings' => array(
                    'title'  => __('Icon Basics', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'icon_size'            => array(
                            'type'        => 'unit',
                            'label'       => __('Size', SA_FLBUILDER_TEXTDOMAIN),
                            'placeholder' => '22',
                            'maxlength'   => '5',
                            'size'        => '6',
                            'units'       => array('px'),
                            'slider'      => true,
                            'preview'     => array(
                                'type'     => 'css',
                                'selector' => '.oxi__addons_icon .oxi__icons',
                                'property' => 'font-size',
                                'unit'     => 'px',
                            ),
                        ),
                        'icon_color' => array(
                            'type'        => 'color',
                            'label'       => __('Icon Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => '',
                            'show_reset'  => true,
                            'connections' => array('color'),
                            'show_alpha'  => true,
                            'preview'     => array(
                                'type'     => 'css',
                                'selector' => '.oxi__addons_icon .oxi__icons',
                                'property' => 'color',
                            ),
                        ),
                        'icon_bg_color' => array(
                            'type'        => 'color',
                            'label'       => __('Icon Background Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => '',
                            'show_reset'  => true,
                            'connections' => array('color'),
                            'show_alpha'  => true,
                            'preview'     => array(
                                'type'     => 'css',
                                'selector' => '.oxi__addons_icon',
                                'property' => 'color',
                            ),
                        ),
                        'icon_padding' => array(
                            'type' => 'dimension',
                            'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage  Icon padding', SA_FLBUILDER_TEXTDOMAIN),
                            'slider' => true,
                            'units' => array('px'),
                            'responsive' => array(
                                'placeholder' => array(
                                    'default' => '0',
                                    'medium' => '0',
                                    'responsive' => '0',
                                ),
                            ),
                        ),
                    ),
                ),
                'cross_icon_setting' => array(
                    'title'  => __('Cross Icon Setting', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'cross_icon_size'            => array(
                            'type'        => 'unit',
                            'label'       => __('Icon Size', SA_FLBUILDER_TEXTDOMAIN),
                            'placeholder' => '20',
                            'maxlength'   => '5',
                            'size'        => '6',
                            'units'       => array('px'),
                            'slider'      => true,
                            'preview'     => array(
                                'type'     => 'css',
                                'selector' => '.oxi__addons_cross_icon .cross__icons',
                                'property' => 'font-size',
                                'unit'     => 'px',
                            ),
                        ),
                        'cross_icon_color' => array(
                            'type'        => 'color',
                            'label'       => __('Icon Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => '',
                            'show_reset'  => true,
                            'connections' => array('color'),
                            'show_alpha'  => true,
                            'preview'     => array(
                                'type'     => 'css',
                                'selector' => '.oxi__addons_cross_icon .cross__icons',
                                'property' => 'color',
                            ),
                        ),
                        'cross_hover_icon_color' => array(
                            'type'        => 'color',
                            'label'       => __('Icon Hover Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => '',
                            'show_reset'  => true,
                            'connections' => array('color'),
                            'show_alpha'  => true,
                            'preview'     => array(
                                'type'     => 'css',
                                'selector' => '.oxi__addons_cross_icon .cross__icons',
                                'property' => 'color',
                            ),
                        ),
                        'cross_icon_padding' => array(
                            'type' => 'dimension',
                            'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage Cross Icon padding', SA_FLBUILDER_TEXTDOMAIN),
                            'slider' => true,
                            'units' => array('px'),
                            'responsive' => array(
                                'placeholder' => array(
                                    'default' => '0',
                                    'medium' => '0',
                                    'responsive' => '0',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'typography' => array(
            'title'    => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array(
                'title_typo'              => array(
                    'title'  => __('Title Settings', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'title_font_typo'             => array(
                            'type'       => 'typography',
                            'label'      => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.oxi__addons_title',
                                'important' => true,
                            ),
                        ),
                        'title_color'                 => array(
                            'type'        => 'color',
                            'label'       => __('Text Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => '',
                            'show_reset'  => true,
                            'connections' => array('color'),
                            'show_alpha'  => true,
                            'preview'     => array(
                                'type'     => 'css',
                                'property' => 'color',
                                'selector' => '.oxi__addons_title',
                            ),
                        ),
                        'title_padding' => array(
                            'type' => 'dimension',
                            'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage Alert box title padding', SA_FLBUILDER_TEXTDOMAIN),
                            'slider' => true,
                            'units' => array('px'),
                            'responsive' => array(
                                'placeholder' => array(
                                    'default' => '0',
                                    'medium' => '0',
                                    'responsive' => '0',
                                ),
                            ),
                        ),
                    ),
                ),
                'sub_title_typo'              => array(
                    'title'  => __('Sub Title Settings', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'sub_title_font_typo'             => array(
                            'type'       => 'typography',
                            'label'      => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.oxi__addons_subtitle',
                                'important' => true,
                            ),
                        ),
                        'sub_title_color'                 => array(
                            'type'        => 'color',
                            'label'       => __('Text Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => '',
                            'show_reset'  => true,
                            'connections' => array('color'),
                            'show_alpha'  => true,
                            'preview'     => array(
                                'type'     => 'css',
                                'property' => 'color',
                                'selector' => '.oxi__addons_subtitle',
                            ),
                        ),
                        'sub_title_padding' => array(
                            'type' => 'dimension',
                            'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage Alert Box Heading padding', SA_FLBUILDER_TEXTDOMAIN),
                            'slider' => true,
                            'units' => array('px'),
                            'responsive' => array(
                                'placeholder' => array(
                                    'default' => '0',
                                    'medium' => '0',
                                    'responsive' => '0',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    )
);
