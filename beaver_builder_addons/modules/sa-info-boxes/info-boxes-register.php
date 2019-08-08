<?php

/**
 * Register the module and its form settings for beaver builder  version
 *  
 *
 * @package Shortcodes addons info table module
 */

FLBuilder::register_module(
    'info_boxes',
    array(
        'general'       => array(
            'title'    => __('Content', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array(
                /* Image Basic Setting */
                'image_icon_main'    => array( // Section.
                    'title'  => __('Image / Icon', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                    'fields' => array( // Section Fields.
                        'info_boxes_type' => array(
                            'type' => 'select',
                            'label' => __('Info Boxes Type', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'img-on-top',
                            'help' => __('Button Gradient Only Work For Button Default Effect', SA_FLBUILDER_TEXTDOMAIN),
                            'options' => array(
                                'img-on-top' => __('Image/Icon On Top', SA_FLBUILDER_TEXTDOMAIN),
                                'img-on-left' => __('Image/Icon On Left', SA_FLBUILDER_TEXTDOMAIN),
                                'img-on-right' => __('Image/Icon On Right', SA_FLBUILDER_TEXTDOMAIN),
                            ),
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
                                    'fields' => array('icon_main', 'icon_size', 'icon_color', 'icon_hover_color'),
                                ),
                                'photo' => array(
                                    'fields' => array('image_size'),
                                    'sections' => array('img_basic'),
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
                'title-section' => array(
                    'fields' => array(
                        // info Boxes title.......................................
                        'info_title'     => array(
                            'type'        => 'text',
                            'label'       => __('Heading', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => __('This is an Info Box', SA_FLBUILDER_TEXTDOMAIN),
                            'help'        => __('Enter Info-Box Title here', SA_FLBUILDER_TEXTDOMAIN),
                            'connections' => array('string', 'html'),
                        ),
                        // info boxes description.......................................
                        'info_desc' => array(
                            'type'        => 'editor',
                            'label'       => '',
                            'default'     => __('Enter description text here.', SA_FLBUILDER_TEXTDOMAIN),
                            'connections' => array('string', 'html'),
                        ),
                        'info_link_type' => array(
                            'type'    => 'select',
                            'label'   => __('Add Link', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'no',
                            'options' => array(
                                'no'            => __('No Link', SA_FLBUILDER_TEXTDOMAIN),
                                'cta'           => __('Call to Action Button', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle'  => array(
                                'cta'           => array(
                                    'sections' => array('btn-style-section', 'btn-typography'),
                                    'fields'   => array('btn_text', 'btn_link'),
                                ),
                            ),
                        ),
                        'btn_text'  => array(
                            'type'        => 'text',
                            'label'       => __('Call to action button text', SA_FLBUILDER_TEXTDOMAIN),
                            'connections' => array('string', 'html'),
                        ),
                        'btn_link'      => array(
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
                'divider_option' => array(
                    'fields' => array(
                        'divider_eanble' => array(
                            'type'    => 'select',
                            'label'   => __('Divider', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'none',
                            'options' => array(
                                'none' => __('None', SA_FLBUILDER_TEXTDOMAIN),
                                'enable' => __('Enable', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle' => array(
                                'enable' => array(
                                    'sections' => array('divider_setting'),
                                ),
                            ),
                        ),
                    ),
                ),
                'divider_setting' => array(
                    'title' => __('Divider Setting', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'divider_position' => array(
                            'type'    => 'select',
                            'label'   => __('Divider Position', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'line_header',
                            'options' => array(
                                'line_header' => __('Divider > Heading', SA_FLBUILDER_TEXTDOMAIN),
                                'heading_line' => __('Heading > Divider', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                        ),
                        'divider_width'     => array(
                            'type'        => 'unit',
                            'label'       => __('Divider Width', SA_FLBUILDER_TEXTDOMAIN),
                            'slider'      => true,
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
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                    ),
                ),
                'position' => array(
                    'title' => __('Position', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'position' => array(
                            'type' => 'select',
                            'label' => __('Position Type', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'i_h_d',
                            'help' => __('Note: if you select info boxes type left or right then not working this section', SA_FLBUILDER_TEXTDOMAIN),
                            'options' => array(
                                'i_h_d' => __('Icon > Heading > Description', SA_FLBUILDER_TEXTDOMAIN),
                                'h_i_d' => __('Heading > Icon > Description', SA_FLBUILDER_TEXTDOMAIN),
                                'h_d_i' => __('Heading > Description > Icon', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                        ),

                    ),
                ),
                'main_background_setting' => array(
                    'title' => __('Main Background Settings', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
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
                            'default' => '',
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
                            'help' => __('Manage the inside Info Boxe main area Padding', SA_FLBUILDER_TEXTDOMAIN),
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
                        'main_hover' => array(
                            'type'    => 'select',
                            'label'   => __('Main Background Hover setting', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'none',
                            'options' => array(
                                'none' => __('None', SA_FLBUILDER_TEXTDOMAIN),
                                'enable' => __('Enable', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle'  => array(
                                'enable'  => array(
                                    'sections' => array('main_hover_setting'),
                                ),
                            ),
                        ),
                    ),
                ),
                'border' => array(
                    'title' => __('Border, Radius & Shadow', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'info_boxes_border_settings' => array(
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
                                'selector' => '.oxi__addons_info_boxes_main',
                                'important' => true,
                            ),
                        ),
                    ),
                ),
                'main_hover_setting' => array(
                    'title' => __('Main Hover Settings', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'main_hover_background_type' => array(
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
                                    'fields' => array('main_hover_background_color'),
                                ),
                                'gradient' => array(
                                    'fields' => array('main_hover_gradient'),
                                ),
                            ),
                        ),
                        'main_hover_background_color' => array(
                            'type' => 'color',
                            'label' => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => '',
                            'show_reset' => true,
                            'connections' => array('color'),
                            'show_alpha' => true,
                        ),
                        'main_hover_gradient' => array(
                            'type'    => 'gradient',
                            'label'   => 'Gradient',
                            'connections' => array('gradient'),
                            'preview' => array(
                                'type'     => 'css',
                                'property' => 'background-image',
                            ),
                        ),
                        'main_border_color' => array(
                            'type' => 'color',
                            'label' => __('Border Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => '',
                            'show_reset' => true,
                            'connections' => array('color'),
                            'show_alpha' => true,
                        ),
                        'main_hover_border_radius' => array(
                            'type' => 'dimension',
                            'label' => __('Boder Radius', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage the inside Info Boxe Hover Border Radius', SA_FLBUILDER_TEXTDOMAIN),
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
                            'placeholder' => '70',
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
                            'slider'      => true,
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
                                    'fields' => array('icon_img_border_width', 'icon_img_border_color', 'icon_img_border_hover_color'),
                                ),
                                'dashed' => array(
                                    'fields' => array('icon_img_border_width', 'icon_img_border_color', 'icon_img_border_hover_color'),
                                ),
                                'dotted' => array(
                                    'fields' => array('icon_img_border_width', 'icon_img_border_color', 'icon_img_border_hover_color'),
                                ),
                                'double' => array(
                                    'fields' => array('icon_img_border_width', 'icon_img_border_color', 'icon_img_border_hover_color'),
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
                        'icon_padding' => array(
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
                        'icon_img_border_color'       => array(
                            'type'       => 'color',
                            'label'      => __('Border Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'icon_img_hover' => array(
                            'type'    => 'select',
                            'label'   => __('Icon / Imgae Hover setting', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'none',
                            'options' => array(
                                'none' => __('None', SA_FLBUILDER_TEXTDOMAIN),
                                'enable' => __('Enable', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle'  => array(
                                'enable'  => array(
                                    'sections' => array('hover_icon_img_colors'),
                                ),
                            ),
                        ),
                    ),
                ),

                'hover_icon_img_colors'  => array( // Section.
                    'title'  => __('Icon / Image Hover Colors', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                    'fields' => array( // Section Fields.  
                        'icon_hover_color'        => array(
                            'type'       => 'color',
                            'label'      => __('Icon Hover Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                            'preview'    => array(
                                'type' => 'none',
                            ),
                        ),
                        /* Background Color Dependent on Icon Style **/

                        'icon_bg_hover_color'     => array(
                            'type'       => 'color',
                            'label'      => __('Background Hover Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'preview'    => array(
                                'type' => 'none',
                            ),
                        ),
                        /* Border Color Dependent on Border Style for ICon */
                        'icon_img_border_hover_color' => array(
                            'type'       => 'color',
                            'label'      => __('Border Hover Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'icon_img_hover_border_radius' => array(
                            'type' => 'dimension',
                            'label' => __('Hover Border Radius', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage the inside Icon Hover Border Radius', SA_FLBUILDER_TEXTDOMAIN),
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
                'btn-style-section' => array(
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
                        'btn_border_style'     => array(
                            'type'    => 'select',
                            'label'   => __('Border Style', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'none',
                            'help'    => __('Select Button border style', SA_FLBUILDER_TEXTDOMAIN),
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
                        'btn_text_color'         => array(
                            'type'       => 'color',
                            'label'      => __('Text Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
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
                        'btn_bg_color'           => array(
                            'type'       => 'color',
                            'label'      => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'btn_bg_hover_color'     => array(
                            'type'       => 'color',
                            'label'      => __('Background Hover Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'btn_border_color'           => array(
                            'type'       => 'color',
                            'label'      => __('Border Color', SA_FLBUILDER_TEXTDOMAIN),
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

                        'btn_border_radius' => array(
                            'type' => 'dimension',
                            'label' => __('Boder Radius', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage the inside Info Table Button Border Radius', SA_FLBUILDER_TEXTDOMAIN),
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
                            'help' => __('Manage the inside Info Table padding', SA_FLBUILDER_TEXTDOMAIN),
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
                            'default'     => '',
                            'maxlength'   => '4',
                            'size'        => '6',
                            'slider'      => true,
                            'units'       => array('px'),
                            'placeholder' => '15',
                        ),
                        'btn_bottom_margin'         => array(
                            'type'        => 'unit',
                            'label'       => __('Bottom Margin', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => '',
                            'maxlength'   => '4',
                            'size'        => '6',
                            'slider'      => true,
                            'units'       => array('px'),
                            'placeholder' => '15',
                        ),
                    ),
                ),
            )
        ),
        'typography'    => array(
            'title'    => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array(
                'title_typography'     => array(
                    'title'  => __('Info Boxes Title', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'title_tag_selection' => array(
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
                        'title_font_typo'     => array(
                            'type'       => 'typography',
                            'label'      => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.oxi__addons_header',
                                'important' => true,
                            ),
                        ),
                        'heading_color'         => array(
                            'type'       => 'color',
                            'label'      => __('Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'heading_padding' => array(
                            'type' => 'dimension',
                            'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage the inside Info Table padding', SA_FLBUILDER_TEXTDOMAIN),
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
                'description_typography' => array(
                    'title'  => __('Description', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'description_font_typo' => array(
                            'type'       => 'typography',
                            'label'      => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.oxi__addons_details p',
                                'important' => true,
                            ),
                        ),
                        'description_color'     => array(
                            'type'       => 'color',
                            'label'      => __('Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'dsc_padding' => array(
                            'type' => 'dimension',
                            'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage the inside Info Table padding', SA_FLBUILDER_TEXTDOMAIN),
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
                'btn-typography'  => array(
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
