<?php

/**
 * Register the module and its form settings for beaver builder  version
 *  
 *
 * @package Shortcodes addons info table modules
 */

FLBuilder::register_module(
    'Progress',
    array(
        'general'       => array(
            'title'    => __('Content', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array(
                'general' => array( 
                    'fields' => array( 
                        'layout' => array(
                            'type' => 'select',
                            'label' => __('Layout', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'line',
                            'options' => array(
                                'line' => __('Line', SA_FLBUILDER_TEXTDOMAIN), 
                                'circle' => __('Circle', SA_FLBUILDER_TEXTDOMAIN), 
                            ),
                            'toggle' => array(
                                'line' => array(
                                    'fields' => array('counter_value','animation_duration','background_border_radius','fill_border_radius','show_stripe','stripe_animation','fill_height','width','height'),
                                ),
                                'circle' => array(
                                    'fields' => array('circle_counter_value','circle_animation_duration','circle_size','circle_fill_thickness'),
                                )
                            )
                        ),
                        'title' => array(
                            'type'        => 'text',
                            'label'       => __('Title', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => __('Progress Bar', SA_FLBUILDER_TEXTDOMAIN),
                            'preview'     => array(
                                'type'     => 'text',
                                'selector' => '.oxi_sa_progress_title',
                            ),
                            'connections' => array('string', 'html'),
                        ),
                        'counter_value'     => array(
                            'type'        => 'unit',
                            'label'       => __('Counter Value', SA_FLBUILDER_TEXTDOMAIN),
                            'slider'      => true,
                            'units'       => array('%'),
                            'maxlength'   => '3',
                            'size'        => '6',
                            'placeholder' => '70',
                            'preview'     => array(
                                'type' => 'refresh',
                            ),
                        ), 
                        'circle_counter_value'     => array(
                            'type'        => 'unit',
                            'label'       => __('Counter Value', SA_FLBUILDER_TEXTDOMAIN),
                            'slider'      => array(
                                'max' => 1.0,
                                'min' => 0,
                                'step' => 0.01
                            ), 
                            'maxlength'   => '3',
                            'size'        => '6',
                            'placeholder' => '0.75',
                            'preview'     => array(
                                'type' => 'refresh',
                            ),
                        ), 
                        'dis_count' => array(
                            'type' => 'select',
                            'label' => __('Display Count', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'on',
                            'options' => array(
                                'on' => __('On', SA_FLBUILDER_TEXTDOMAIN), 
                                'off' => __('Off', SA_FLBUILDER_TEXTDOMAIN), 
                            ), 
                        ),
                        'animation_duration'     => array(
                            'type'        => 'unit',
                            'label'       => __('Animation Duration
                            ', SA_FLBUILDER_TEXTDOMAIN),
                            'slider' => true,
                            'maxlength'   => '100',
                            'size'        => '6',
                            'placeholder' => '60',
                            'preview'     => array(
                                'type' => 'refresh',
                            ),
                        ), 
                        'circle_animation_duration'     => array(
                            'type'        => 'unit',
                            'label'       => __('Animation Duration
                            ', SA_FLBUILDER_TEXTDOMAIN),
                            'slider' => array(
                                'max' => 10000,
                                'min' => 500,
                                'step' => 500
                            ),
                            'maxlength'   => '100',
                            'size'        => '6',
                            'placeholder' => '500',
                            'preview'     => array(
                                'type' => 'refresh',
                            ),
                        ), 
                    ),
                ),
            )
        ),
        'style'         => array(
            'title'    => __('Styles', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array(
                'general' => array(
                    'title' => __('General', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'alignment' => array(
                            'type' => 'select',
                            'label' => __('Alignment', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'center',
                            'options' => array(
                                'left' => __('Left', SA_FLBUILDER_TEXTDOMAIN), 
                                'center' => __('Center', SA_FLBUILDER_TEXTDOMAIN), 
                                'right' => __('right', SA_FLBUILDER_TEXTDOMAIN), 
                            ), 
                        ), 
                    )
                ),
                'background' => array(
                    'title' => __('Background', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'width'     => array(
                            'type'        => 'unit',
                            'label'       => __('Width', SA_FLBUILDER_TEXTDOMAIN),
                            'slider'      => true,
                            'units'       => array('%'),
                            'maxlength'   => '3',
                            'size'        => '6',
                            'placeholder' => '80',
                            'preview'     => array(
                                'type' => 'refresh',
                            ),
                        ), 
                        'height'     => array(
                            'type'        => 'unit',
                            'label'       => __('Height', SA_FLBUILDER_TEXTDOMAIN),
                            'slider'      => true,
                            'units'       => array('px'),
                            'maxlength'   => '3',
                            'size'        => '6',
                            'placeholder' => '20',
                            'preview'     => array(
                                'type' => 'refresh',
                            ), 
                        ), 
                        'circle_size'     => array(
                            'type'        => 'unit',
                            'label'       => __('Size', SA_FLBUILDER_TEXTDOMAIN),
                            'slider'      => array(
                                'max' => 500,
                                'min' => 50,
                                'step' => 5
                            ),
                            'units'       => array('px'),
                            'maxlength'   => '3',
                            'size'        => '6',
                            'placeholder' => '150',
                            'preview'     => array(
                                'type' => 'refresh',
                            ),
                        ),  
                        'background_color'                 => array(
                            'type'        => 'color',
                            'label'       => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => '3388d2',
                            'show_reset'  => true,
                            'connections' => array('color'),
                            'show_alpha'  => true, 
                        ),
                        'background_border_radius' => array(
                            'type' => 'dimension',
                            'label' => __('Border Radius', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage Background Border radius', SA_FLBUILDER_TEXTDOMAIN),
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
                    )
                ),
                'fill' => array(
                    'title' => __('Fill', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(  
                        'fill_height'     => array(
                            'type'        => 'unit',
                            'label'       => __('Height', SA_FLBUILDER_TEXTDOMAIN),
                            'slider'      => true,
                            'units'       => array('px'),
                            'maxlength'   => '3',
                            'size'        => '6',
                            'placeholder' => '10',
                            'preview'     => array(
                                'type' => 'refresh',
                            ), 
                        ), 
                        'circle_fill_thickness'     => array(
                            'type'        => 'unit',
                            'label'       => __('Thickness', SA_FLBUILDER_TEXTDOMAIN),
                            'slider'      => array(
                                'max' => 12,
                                'min' => 0,
                                'setp' => 1
                            ),
                            'units'       => array('px'),
                            'maxlength'   => '10',
                            'size'        => '10',
                            'placeholder' => '8',
                            'preview'     => array(
                                'type' => 'refresh',
                            ), 
                        ), 
                        'background_type' => array(
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
                                    'fields' => array('fill_background_color',),
                                ),
                                'gradient' => array(
                                    'fields' => array('gradient'),
                                ),
                            ),
                        ),
                        'fill_background_color' => array(
                            'type' => 'color',
                            'label' => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => '83bfd1',
                            'show_reset' => true,
                            'connections' => array('color'),
                            'show_alpha' => true,
                        ),
                        'gradient' => array(
                            'type'    => 'gradient',
                            'label'   => 'Gradient',
                            'connections' => array('gradient'),
                            'preview' => array(
                                'type'     => 'css',
                                'property' => 'background',
                            ),
                        ),
                        'fill_border_radius' => array(
                            'type' => 'dimension',
                            'label' => __('Border Radius', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage Fill Border radius', SA_FLBUILDER_TEXTDOMAIN),
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
                        'show_stripe' => array(
                            'type' => 'select',
                            'label' => __('Show Stripe', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'false',
                              'options' => array(
                                'true' => __('True', SA_FLBUILDER_TEXTDOMAIN),
                                'false' => __('False', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle' => array(
                                'true' => array(
                                    'fields' => array('stripe_animation'),
                                ), 
                            ),
                        ),
                        'stripe_animation' => array(
                            'type' => 'select',
                            'label' => __('Stripe Animation', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'left',
                              'options' => array(
                                'left' => __('Left To Right', SA_FLBUILDER_TEXTDOMAIN), 
                                'right' => __('Right to Left', SA_FLBUILDER_TEXTDOMAIN), 
                                'disabled' => __('Disabled', SA_FLBUILDER_TEXTDOMAIN), 
                            ),
                        ),
                    )
                )
            )
        ),
        'typography'    => array(
            'title'    => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array(
                'title_typo'              => array(
                    'title'  => __('Title', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'tag' => array(
                            'type'    => 'select',
                            'label'   => __('HTML Tag', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'h3',
                            'options' => array(
                                'p' => 'p',
                                'div' => 'div',
                                'h1' => 'h1',
                                'h2' => 'h2',
                                'h3' => 'h3',
                                'h4' => 'h4',
                                'h5' => 'h5',
                                'h6' => 'h6',
                                
                            ),
                        ),
                        'font_typo'             => array(
                            'type'       => 'typography',
                            'label'      => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.oxi__sa_progress_title',
                                'important' => true,
                            ),
                        ),
                        'title_color'                 => array(
                            'type'        => 'color',
                            'label'       => __('Text Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => '888',
                            'show_reset'  => true,
                            'connections' => array('color'),
                            'show_alpha'  => true,
                            'preview'     => array(
                                'type'     => 'css',
                                'property' => 'color',
                                'selector' => '.oxi__sa_progress_title',
                            ),
                        ),
                        'title_padding' => array(
                            'type' => 'dimension',
                            'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage Title padding', SA_FLBUILDER_TEXTDOMAIN),
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
                'count_typo'              => array(
                    'title'  => __('Counter', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array( 
                        'count_typo'             => array(
                            'type'       => 'typography',
                            'label'      => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.oxi__sa_progress_percentage',
                                'important' => true,
                            ),
                        ),
                        'count_color'                 => array(
                            'type'        => 'color',
                            'label'       => __('Text Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => '777',
                            'show_reset'  => true,
                            'connections' => array('color'),
                            'show_alpha'  => true,
                            'preview'     => array(
                                'type'     => 'css',
                                'property' => 'color',
                                'selector' => '.oxi__sa_progress_percentage',
                            ),
                        ),
                        'count_padding' => array(
                            'type' => 'dimension',
                            'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage Title padding', SA_FLBUILDER_TEXTDOMAIN),
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
 
