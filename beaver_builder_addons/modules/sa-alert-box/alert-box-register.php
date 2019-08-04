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
                        'separator_style'    => array(
                            'type'    => 'select',
                            'label'   => __('Show Icon', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'line',
                            'options' => array(
                                'show'       => __('Show', SA_FLBUILDER_TEXTDOMAIN),
                                'hide'       => __('Hide', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle'  => array(
                                'line'       => array(
                                    'sections' => array('separator_line'),
                                    'fields' => array('icon'),
                                ),
                            ),
                        ),
                        'icon'                 => array(
                            'type'        => 'icon',
                            'label'       => __('Icon', SA_FLBUILDER_TEXTDOMAIN),
                            'show_remove' => true,
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
                    ),
                ),

            ),
        ),
        'style'      => array(
            'title'    => __('Separator', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array(
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
                                'selector' => '.oxi__addons_image_icon_divider .oxi__icon',
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
                                'selector' => '.oxi__icon',
                                'property' => 'color',
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
                        'title_font_top_typo'             => array(
                            'type'       => 'typography',
                            'label'      => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.oxi__addons_title',
                                'important' => true,
                            ),
                        ),
                        'title_top_color'                 => array(
                            'type'        => 'color',
                            'label'       => __('Text Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => '',
                            'show_reset'  => true,
                            'connections' => array('color'),
                            'show_alpha'  => true,
                            'preview'     => array(
                                'type'     => 'css',
                                'property' => 'color',
                                'selector' => '.oxi__addons_heading_top',
                            ),
                        ),
                        'title_top_padding' => array(
                            'type' => 'dimension',
                            'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage Heading padding', SA_FLBUILDER_TEXTDOMAIN),
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
                    'title'  => __('Top Text Settings', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'sub_title_font_top_typo'             => array(
                            'type'       => 'typography',
                            'label'      => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.oxi__addons_sub_title',
                                'important' => true,
                            ),
                        ),
                        'sub_title_top_color'                 => array(
                            'type'        => 'color',
                            'label'       => __('Text Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => '',
                            'show_reset'  => true,
                            'connections' => array('color'),
                            'show_alpha'  => true,
                            'preview'     => array(
                                'type'     => 'css',
                                'property' => 'color',
                                'selector' => '.oxi__addons_heading_top',
                            ),
                        ),
                        'sub_title_top_padding' => array(
                            'type' => 'dimension',
                            'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage Heading padding', SA_FLBUILDER_TEXTDOMAIN),
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
