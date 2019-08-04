<?php

/**
 *   heading module
 * @package Shortcode addons 
 */

FLBuilder::register_module(
    'Icon_effects',
    array(
        'general'    => array(
            'title'    => __('Content', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array(
                'content'     => array(
                    'title'  => '',
                    'fields' => array(
                        'icon_main'      => array(
                            'type'        => 'icon',
                            'label'       => __('Icon', SA_FLBUILDER_TEXTDOMAIN),
                            'show_remove' => true,
                            'default'     => 'fa fa-child',
                        ),
                        'info_link_type' => array(
                            'type'    => 'select',
                            'label'   => __('Add Link', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'no',
                            'options' => array(
                                'no'            => __('No Link', SA_FLBUILDER_TEXTDOMAIN),
                                'enable'           => __('Enable Link', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle'  => array(
                                'enable'           => array(
                                    'fields'   => array('icon_link'),
                                ),
                            ),
                        ),
                        'icon_link'      => array(
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
        'style'      => array(
            'title'    => __('Style', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array(
                'Style'  => array(
                    'title'  => __('Style', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'effects'    => array(
                            'type'    => 'select',
                            'label'   => __('Effects', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'style1',
                            'options' => array(
                                'style1'       => __('Style 01', SA_FLBUILDER_TEXTDOMAIN),
                                'style2'       => __('Style 02', SA_FLBUILDER_TEXTDOMAIN),
                                'style3'       => __('Style 03', SA_FLBUILDER_TEXTDOMAIN),
                                'style4'       => __('Style 04', SA_FLBUILDER_TEXTDOMAIN),
                                'style5'       => __('Style 05', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle'  => array(
                                'style1'           => array(
                                    'fields'   => array('zoom_style', 'icon_bg_color'),
                                ),
                                'style2'           => array(
                                    'fields'   => array('zoom_style'),
                                ),
                                'style4'           => array(
                                    'fields'   => array('icon_border_width', 'effect_position'),
                                ),
                            ),
                        ),
                        'zoom_style'    => array(
                            'type'    => 'select',
                            'label'   => __('Zoom Style', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'out',
                            'options' => array(
                                'in'       => __('Zoom In', SA_FLBUILDER_TEXTDOMAIN),
                                'out'       => __('Zoom Out', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                        ),
                        'effect_position'    => array(
                            'type'    => 'select',
                            'label'   => __('Effect Position', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'left_to_right',
                            'options' => array(
                                'left_to_right'       => __('Left To Right', SA_FLBUILDER_TEXTDOMAIN),
                                'right_to_left'       => __('Right To Left', SA_FLBUILDER_TEXTDOMAIN),
                                'top_to_bottom'       => __('Top To Bottom', SA_FLBUILDER_TEXTDOMAIN),
                                'bottom_to_top'       => __('Buttom To Top', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                        ),
                    ),
                ),
                'icon_style'  => array(
                    'title'  => __('Icon Settings', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'icon_alignment' => array(
                            'type'    => 'select',
                            'label'   => __('Icon Alignment', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'center',
                            'responsive' => true,
                            'options' => array(
                                'left' => __('Left', SA_FLBUILDER_TEXTDOMAIN),
                                'center' => __('Center', SA_FLBUILDER_TEXTDOMAIN),
                                'right' => __('Right', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                        ),
                        'icon_size'          => array(
                            'type'        => 'unit',
                            'label'       => __('Icon Size', SA_FLBUILDER_TEXTDOMAIN),
                            'help'        => __('Info Boxes Icons Size', SA_FLBUILDER_TEXTDOMAIN),
                            'placeholder' => '70',
                            'maxlength'   => '3',
                            'size'        => '6',
                            'slider'      => true,
                            'units'       => array('px'),
                        ),
                        'icon_bg_size'          => array(
                            'type'        => 'unit',
                            'label'       => __('Background Size', SA_FLBUILDER_TEXTDOMAIN),
                            'help'        => __('Spacing between Icon & Background edge', SA_FLBUILDER_TEXTDOMAIN),
                            'placeholder' => '100',
                            'maxlength'   => '3',
                            'size'        => '6',
                            'slider'      => true,
                            'units'       => array('px'),
                        ),
                        'icon_border_width' => array(
                            'type'        => 'unit',
                            'label'       => __('Border Hover Width', SA_FLBUILDER_TEXTDOMAIN),
                            'slider'      => true,
                            'units'       => array('px'),
                            'maxlength'   => '3',
                            'size'        => '6',
                            'placeholder' => '1',
                            'preview'     => array(
                                'type' => 'refresh',
                            ),
                        ),
                        'icon_color'              => array(
                            'type'       => 'color',
                            'label'      => __('Icon Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'icon_bg_color'           => array(
                            'type'       => 'color',
                            'label'      => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'icon_margin' => array(
                            'type' => 'dimension',
                            'label' => __('Margin', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage the inside Info Boxe Hover Margin', SA_FLBUILDER_TEXTDOMAIN),
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
                'icon_hover_style'  => array(
                    'title'  => __('Icon Hover Settings', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'icon_hover_border_width' => array(
                            'type'        => 'unit',
                            'label'       => __('Border Hover Width', SA_FLBUILDER_TEXTDOMAIN),
                            'slider'      => true,
                            'units'       => array('px'),
                            'maxlength'   => '3',
                            'size'        => '6',
                            'placeholder' => '1',
                            'preview'     => array(
                                'type' => 'refresh',
                            ),
                        ),
                        'icon_hover_color'              => array(
                            'type'       => 'color',
                            'label'      => __('Hover Icon  Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'icon_hover_bg_color'           => array(
                            'type'       => 'color',
                            'label'      => __('Hover Background  Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'icon_hover_border_color'       => array(
                            'type'       => 'color',
                            'label'      => __('Hover Border Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                    ),
                ),

            ),
        ),
    )
);
