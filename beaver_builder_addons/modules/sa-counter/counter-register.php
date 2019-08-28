<?php

/**
 * Register the module and its form settings for beaver builder  version
 *  
 *
 * @package Shortcodes addons info table modules
 */

FLBuilder::register_module(
    'Counter',
    array(
        'general'       => array(
            'title'    => __('Content', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array(
                'general' => array( 
                    'fields' => array( 
                        'counter_style' => array(
                            'type' => 'select',
                            'label' => __('Design', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'design_one',
                            'help' => __('Select Counter Design layout ', SA_FLBUILDER_TEXTDOMAIN),
                            'options' => array(
                                'design_one' => __('Design One', SA_FLBUILDER_TEXTDOMAIN), 
                            ),
                            'toggle'  => array(
                                'design_one'  => array(
                                    'fields' => array('sign'),
                                ), 
                            ),
                        ),
                         // counter title.......................................
                         'counter_title'     => array(
                            'type'        => 'text',
                            'label'       => __('Title', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => __('KBS OF HTML FILES', SA_FLBUILDER_TEXTDOMAIN),
                            'help'        => __('Enter Counter title', SA_FLBUILDER_TEXTDOMAIN),
                            'connections' => array('string', 'html'),
                        ),
                        // number .......................................
                        'counter_number'     => array(
                            'type'        => 'text',
                            'label'       => __('Number', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => __('10000', SA_FLBUILDER_TEXTDOMAIN),
                            'help'        => __('Enter counter Number', SA_FLBUILDER_TEXTDOMAIN),
                            'connections' => array('string', 'html'),
                        ),
                        
                        // sign .......................................
                        'sign'     => array(
                            'type'        => 'text',
                            'label'       => __('Sign', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => __('k', SA_FLBUILDER_TEXTDOMAIN),
                            'help'        => __('Enter counter sign', SA_FLBUILDER_TEXTDOMAIN),
                            'connections' => array('string', 'html'),
                        ),
                        'image_icon_type' => array(
                            'type'    => 'select',
                            'label'   => __('Type', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'icon',
                            'options' => array(
                                'none'  => __('None', SA_FLBUILDER_TEXTDOMAIN),
                                'icon'  => __('Icon', SA_FLBUILDER_TEXTDOMAIN),
                                'photo' => __('Photo', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle'  => array(
                                'icon'  => array(
                                    'fields' => array('icon_main', 'icon_size', 'icon_color'),
                                    'sections' => array('image_icon_setting'),
                                ),
                                'photo' => array(
                                    'fields' => array('image_size'),
                                    'sections' => array('img_basic','image_icon_setting'),
                                ),
                            ),
                        ),
                       
                        // Icon ......................................
                        'icon_main'      => array(
                            'type'        => 'icon',
                            'label'       => __('Icon', SA_FLBUILDER_TEXTDOMAIN),
                            'show_remove' => true,
                            'default'     => 'fa fa-child',
                        ), 
                    ),
                ),
                /* Image Basic Setting */
                'img_basic'    => array( // Section.
                    'title'  => __('Image Basics', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                    'fields' => array( // Section Fields.
                        'photo_source' => array(
                            'type'    => 'select',
                            'label'   => __('Photo Source', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'library',
                            'options' => array(
                                'library' => __('Media Library', SA_FLBUILDER_TEXTDOMAIN),
                                'url'     => __('URL', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle'  => array(
                                'library' => array(
                                    'fields' => array('photo_main'),
                                ),
                                'url'     => array(
                                    'fields' => array('photo_url'),
                                ),
                            ),
                        ),
                        'photo_main'        => array(
                            'type'        => 'photo',
                            'label'       => __('Photo', SA_FLBUILDER_TEXTDOMAIN),
                            'show_remove' => true,
                            'connections' => array('photo'),
                        ),
                        'photo_url'    => array(
                            'type'        => 'text',
                            'label'       => __('Photo URL', SA_FLBUILDER_TEXTDOMAIN),
                            'placeholder' => 'http://www.example.com/my-photo.jpg',
                        ),
                    ),
                ),
                /* Image Basic Setting */
                'counter_setting'    => array( // Section.
                    'title'  => __('Counter Setting', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                    'fields' => array( // Section Fields.
                        'counter_duration'     => array(
                            'type'        => 'unit',
                            'label'       => __('Counter Duration', SA_FLBUILDER_TEXTDOMAIN),
                            'slider'      => array(
                                'max' => 10.0,
                                'min' => 0,
                                'step' => 0.1
                            ), 
                            'maxlength'   => '3',
                            'size'        => '6',
                            'placeholder' => '3',
                            'preview'     => array(
                                'type' => 'refresh',
                            ),
                        ), 
                        'counter_delay'     => array(
                            'type'        => 'unit',
                            'label'       => __('Counter Delay', SA_FLBUILDER_TEXTDOMAIN),
                            'slider'      => array(
                                'max' => 10.0,
                                'min' => 0,
                                'step' => 0.01
                            ), 
                            'maxlength'   => '3',
                            'size'        => '6',
                            'placeholder' => '0.01',
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
                'counter_box' => array(
                    'title' => __('Counter Box Setting', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'counter_border_settings' => array(
                            'type' => 'border',
                            'label' => __('Border', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => array(
                                'style' => 'none',
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
                                'selector' => '.oxi__sa_counter_main',
                                'important' => true,
                            ),
                        ),
                        'main_background_type' => array(
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
                                    'fields' => array('main_background_color'),
                                ),
                                'gradient' => array(
                                    'fields' => array('main_gradient'),
                                ),
                            ),
                        ),
                        'main_background_color' => array(
                            'type' => 'color',
                            'label' => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => '5caaf5',
                            'show_reset' => true,
                            'connections' => array('color'),
                            'show_alpha' => true,
                        ),
                        'main_gradient' => array(
                            'type'    => 'gradient',
                            'label'   => 'Gradient',
                            'connections' => array('gradient'),
                            'preview' => array(
                                'type'     => 'css',
                                'property' => 'background-image',
                            ),
                        ),
                        'main_padding' => array(
                            'type' => 'dimension',
                            'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage Main  padding', SA_FLBUILDER_TEXTDOMAIN),
                            'slider' => true,
                            'units' => array('px'),
                            'responsive' => array(
                                'placeholder' => array(
                                    'default' => '15',
                                    'medium' => '15',
                                    'responsive' => '15',
                                ),
                            ),
                        ),
                    )
                ), 
                'image_icon_setting' => array(
                    'title' => __('Image Icons Setting', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'img_icon_alignment' => array(
                            'type'    => 'select',
                            'label'   => __('Select Image / Icon Alignment', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'center',
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
                            'placeholder' => '48',
                            'maxlength'   => '3',
                            'size'        => '6',
                            'slider'      => true,
                            'units'       => array('px'),
                        ),
                        'image_size'          => array(
                            'type'        => 'unit',
                            'label'       => __('Image Size', SA_FLBUILDER_TEXTDOMAIN),
                            'help'        => __('Info Boxes Image Size', SA_FLBUILDER_TEXTDOMAIN),
                            'placeholder' => '40',
                            'maxlength'   => '3',
                            'size'        => '6',
                            'slider'      => true,
                            'units'       => array('px'),
                        ),

                        /* Icon Background SIze */
                        'icon_img_bg_size'          => array(
                            'type'        => 'unit',
                            'label'       => __('Background Size', SA_FLBUILDER_TEXTDOMAIN),
                            'help'        => __('Spacing between Icon & Background edge', SA_FLBUILDER_TEXTDOMAIN),
                            'placeholder' => '100',
                            'maxlength'   => '3',
                            'size'        => '6',
                            'slider'      => array(
                                'max' => 500,
                                'step' => 10
                            ),
                            'units'       => array('px'),
                        ),
                        /* Border Style and Radius for Icon or image */
                        'icon_img_border_style'     => array(
                            'type'    => 'select',
                            'label'   => __('Border Style', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'none',
                            'help'    => __('The type of border to use. Double borders must have a width of at least 3px to render properly.', SA_FLBUILDER_TEXTDOMAIN),
                            'options' => array(
                                'none'   => __('None', SA_FLBUILDER_TEXTDOMAIN),
                                'solid'  => __('Solid', SA_FLBUILDER_TEXTDOMAIN),
                                'dashed' => __('Dashed', SA_FLBUILDER_TEXTDOMAIN),
                                'dotted' => __('Dotted', SA_FLBUILDER_TEXTDOMAIN),
                                'double' => __('Double', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle'  => array(
                                'solid'  => array(
                                    'fields' => array('icon_img_border_width', 'icon_img_border_color'),
                                ),
                                'dashed' => array(
                                    'fields' => array('icon_img_border_width', 'icon_img_border_color'),
                                ),
                                'dotted' => array(
                                    'fields' => array('icon_img_border_width', 'icon_img_border_color'),
                                ),
                                'double' => array(
                                    'fields' => array('icon_img_border_width', 'icon_img_border_color'),
                                ),
                            ),
                        ),
                        'icon_img_border_width'     => array(
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
                        'icon_img_border_radius' => array(
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
                        'icon_color'              => array(
                            'type'       => 'color',
                            'label'      => __('Icon Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => 'fff',
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
                        'icon_img_border_color'       => array(
                            'type'       => 'color',
                            'label'      => __('Border Color', SA_FLBUILDER_TEXTDOMAIN),
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
                'divider_setting' => array(
                    'title' => __('Divider Setting', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'divider_show' => array(
                            'type' => 'select',
                            'label' => __('Divider', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'show',
                            'help' => __('Select Counter Divider show or hide', SA_FLBUILDER_TEXTDOMAIN),
                            'options' => array(
                                'show' => __('Show', SA_FLBUILDER_TEXTDOMAIN), 
                                'hide' => __('Hide', SA_FLBUILDER_TEXTDOMAIN), 
                            ),
                            'toggle'  => array(
                                'show'  => array(
                                    'fields' => array('divider_alignment','divider_position','divider_width','divider_height','divider_color'),
                                ), 
                            ),
                        ),

                        'divider_position' => array(
                            'type'    => 'select',
                            'label'   => __('Divider Position', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'counter_divider',
                            'options' => array(
                                'icon_divider' => __('Icon > Divider', SA_FLBUILDER_TEXTDOMAIN),
                                'counter_divider' => __('Couter > Divider', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                        ),
                        'divider_alignment' => array(
                            'type'    => 'select',
                            'label'   => __('Divider Alignment', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'center',
                            'options' => array(
                                'left' => __('Left', SA_FLBUILDER_TEXTDOMAIN),
                                'center' => __('Center', SA_FLBUILDER_TEXTDOMAIN),
                                'right' => __('Right', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                        ),
                        'divider_width'     => array(
                            'type'        => 'unit',
                            'label'       => __('Divider Width', SA_FLBUILDER_TEXTDOMAIN),
                            'slider'      => array(
                                'max'=> 500,
                                'step' => 5
                            ),
                            'units'       => array('px'),
                            'maxlength'   => '3',
                            'size'        => '6',
                            'placeholder' => '50',
                            'preview'     => array(
                                'type' => 'refresh',
                            ),
                        ),
                        'divider_height'     => array(
                            'type'        => 'unit',
                            'label'       => __('Divider Height', SA_FLBUILDER_TEXTDOMAIN),
                            'slider'      => true,
                            'units'       => array('px'),
                            'maxlength'   => '3',
                            'size'        => '6',
                            'placeholder' => '2',
                            'preview'     => array(
                                'type' => 'refresh',
                            ),
                        ),
                        'divider_color'              => array(
                            'type'       => 'color',
                            'label'      => __('Divider Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => 'fff',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                    ),
                ),
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
                        'title_font_typo'             => array(
                            'type'       => 'typography',
                            'label'      => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.oxi__sa_counter_title',
                                'important' => true,
                            ),
                        ),
                        'title_color'                 => array(
                            'type'        => 'color',
                            'label'       => __('Text Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => 'fff',
                            'show_reset'  => true,
                            'connections' => array('color'),
                            'show_alpha'  => true,
                            'preview'     => array(
                                'type'     => 'css',
                                'property' => 'color',
                                'selector' => '.oxi__sa_counter_title',
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
                'counter_sign'              => array(
                    'title'  => __('Count and Sign typo', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array( 
                        'counter_sign_font_typo'             => array(
                            'type'       => 'typography',
                            'label'      => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.oxi__sa_counter_number',
                                'important' => true,
                            ),
                        ),
                        'counter_sign_color'                 => array(
                            'type'        => 'color',
                            'label'       => __('Text Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => 'fff',
                            'show_reset'  => true,
                            'connections' => array('color'),
                            'show_alpha'  => true,
                            'preview'     => array(
                                'type'     => 'css',
                                'property' => 'color',
                                'selector' => '.oxi__sa_counter_number',
                            ),
                        ),
                        'counter_sign_padding' => array(
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
 
