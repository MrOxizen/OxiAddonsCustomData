<?php

/**
 * Register the module and its form settings for beaver builder  version
 *  
 *
 * @package Shortcodes addons info table module
 */

FLBuilder::register_module(
    'info_table',
    array(
        'general'       => array(
            'title'    => __('Content', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array(
                'title-section' => array(
                    'title'  => __('Info-Table', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'it_title'     => array(
                            'type'        => 'text',
                            'label'       => __('Heading', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => __('Where does it come from?', SA_FLBUILDER_TEXTDOMAIN),
                            'help'        => __('Enter Info-Table Title here', SA_FLBUILDER_TEXTDOMAIN),
                            'connections' => array('string', 'html'),
                        ),
                        'sub_heading'  => array(
                            'type'        => 'text',
                            'label'       => __('Sub Heading', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => __('There are many variations of passages of Lorem Ipsum', SA_FLBUILDER_TEXTDOMAIN),
                            'connections' => array('string', 'html'),
                        ),
                        'it_long_desc' => array(
                            'type'        => 'editor',
                            'label'       => '',
                            'default'     => __('Enter description text here.', SA_FLBUILDER_TEXTDOMAIN),
                            'connections' => array('string', 'html'),
                        ),
                        'it_link_type' => array(
                            'type'    => 'select',
                            'label'   => __('Add Link', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'no',
                            'options' => array(
                                'no'            => __('No Link', SA_FLBUILDER_TEXTDOMAIN),
                                'cta'           => __('Call to Action Button', SA_FLBUILDER_TEXTDOMAIN),
                                'complete_link' => __('Link to Complete Box', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle'  => array(
                                'cta'           => array(
                                    'sections' => array('btn-style-section', 'btn_typography'),
                                    'fields'   => array('button_text', 'it_link'),
                                ),
                                'complete_link' => array(
                                    'fields' => array('it_link'),
                                ),
                            ),
                        ),
                        'button_text'  => array(
                            'type'        => 'text',
                            'label'       => __('Call to action button text', SA_FLBUILDER_TEXTDOMAIN),
                            'connections' => array('string', 'html'),
                        ),
                        'it_link'      => array(
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
                'style-section'     => array(
                    'title'  => __('Styles', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'box_design' => array(
                            'type'    => 'select',
                            'label'   => __('Select Design Style', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'design01',
                            'options' => array(
                                'design01' => __('Design 01', SA_FLBUILDER_TEXTDOMAIN),
                                'design02' => __('Design 02', SA_FLBUILDER_TEXTDOMAIN),
                                'design03' => __('Design 03', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle'  => array(
                                'design03' => array(
                                    'fields' => array('box_height'),
                                ),
                            ),
                        ),
                        'box_height'         => array(
                            'type'        => 'unit',
                            'label'       => __('Height', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => '120',
                            'maxlength'   => '4',
                            'size'        => '6',
                            'slider'      => true,
                            'units'       => array('px'),
                            'placeholder' => '100',
                        ),
                    ),
                ),

                'border' => array(
                    'title' => __('Border, Radius & Shadow', SA_FLBUILDER_TEXTDOMAIN),
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
                                'selector' => '.oxi__addons_info_table_main',
                                'important' => true,
                            ),
                        ),
                    ),
                ),
                'heading_subheading' => array(
                    'title' => __('Heading SubHeading', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'background_type' => array(
                            'type' => 'select',
                            'label' => __('Background Type', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'color',
                            'help' => __('Heading SubHeading Gradient', SA_FLBUILDER_TEXTDOMAIN),
                            'options' => array(
                                'color' => __('Color', SA_FLBUILDER_TEXTDOMAIN),
                                'gradient' => __('Gradient', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle' => array(
                                'color' => array(
                                    'fields' => array('heading_subheading_background_color'),
                                ),
                                'gradient' => array(
                                    'fields' => array('heading_subheading_gradient'),
                                ),
                            ),
                        ),
                        'heading_subheading_background_color' => array(
                            'type' => 'color',
                            'label' => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => '',
                            'show_reset' => true,
                            'connections' => array('color'),
                            'show_alpha' => true,
                        ),
                        'heading_subheading_gradient' => array(
                            'type'    => 'gradient',
                            'label'   => 'Gradient',
                            'connections' => array('gradient'),
                            'preview' => array(
                                'type'     => 'css',
                                'property' => 'background-image',
                            ),
                        ),
                        'heading_sub_heading_padding' => array(
                            'type' => 'dimension',
                            'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage the inside Icon Padding', SA_FLBUILDER_TEXTDOMAIN),
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
                    )
                ),
                'desc_settings' => array(
                    'title' => __('Description Settings', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'desc_background_color' => array(
                            'type' => 'color',
                            'label' => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => '',
                            'show_reset' => true,
                            'connections' => array('color'),
                            'show_alpha' => true,
                        ),
                        'desc_border_style'     => array(
                            'type'    => 'select',
                            'label'   => __('Border Top Style', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'none',
                            'help'    => __('Description Top Border Type Style', SA_FLBUILDER_TEXTDOMAIN),
                            'options' => array(
                                'none'   => __('None', SA_FLBUILDER_TEXTDOMAIN),
                                'solid'  => __('Solid', SA_FLBUILDER_TEXTDOMAIN),
                                'dashed' => __('Dashed', SA_FLBUILDER_TEXTDOMAIN),
                                'dotted' => __('Dotted', SA_FLBUILDER_TEXTDOMAIN),
                                'double' => __('Double', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle'  => array(
                                'solid'  => array(
                                    'fields' => array('desc_border_width', 'desc_border_color'),
                                ),
                                'dashed' => array(
                                    'fields' => array('desc_border_width', 'desc_border_color'),
                                ),
                                'dotted' => array(
                                    'fields' => array('desc_border_width', 'desc_border_color'),
                                ),
                                'double' => array(
                                    'fields' => array('desc_border_width', 'desc_border_color'),
                                ),
                            ),
                        ),
                        'desc_border_width'     => array(
                            'type'        => 'unit',
                            'label'       => __('Border Top Width', SA_FLBUILDER_TEXTDOMAIN),
                            'slider'      => true,
                            'units'       => array('px'),
                            'maxlength'   => '3',
                            'size'        => '6',
                            'placeholder' => '1',
                            'preview'     => array(
                                'type' => 'refresh',
                            ),
                        ),
                        'desc_border_color'       => array(
                            'type'       => 'color',
                            'label'      => __('Border Top Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                    )
                ),
                'btn-style-section' => array(
                    'title'  => __('Button Style', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
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
            ),
        ),
        'it_image_icon' => array(
            'title'    => __('Image / Icon', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array(
                'type_general' => array( // Section.
                    'title'  => __('Image / Icon', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                    'fields' => array( // Section Fields.
                        'image_type' => array(
                            'type'    => 'select',
                            'label'   => __('Image Type', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'icon',
                            'options' => array(
                                'none'  => __('None', SA_FLBUILDER_TEXTDOMAIN),
                                'icon'  => __('Icon', SA_FLBUILDER_TEXTDOMAIN),
                                'photo' => __('Photo', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'class'   => 'class_image_type',
                            'toggle'  => array(
                                'icon'  => array(
                                    'sections' => array('icon_basic', 'icon_style', 'icon_colors'),
                                    'fields' => array('alignment', 'icon_image_padding'),
                                ),
                                'photo' => array(
                                    'sections' => array('img_basic', 'img_style'),
                                    'fields' => array('alignment', 'icon_image_padding'),
                                ),
                            ),
                        ),
                        'alignment'    => array(
                            'type'    => 'select',
                            'label'   => __('Alignment', SA_FLBUILDER_TEXTDOMAIN),
                            'responsive' => true,
                            'options' => array(
                                'left'    => __('Left', SA_FLBUILDER_TEXTDOMAIN),
                                'center'  => __('Center', SA_FLBUILDER_TEXTDOMAIN),
                                'right'   => __('Right', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'default' => 'center',
                        ),
                        'icon_image_padding' => array(
                            'type' => 'dimension',
                            'label' => __('Margin', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage the inside Info Table Icon Icon Or Image  Margin', SA_FLBUILDER_TEXTDOMAIN),
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
                'icon_basic'   => array( // Section.
                    'title'  => __('Icon Basics', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                    'fields' => array( // Section Fields.
                        'icon'      => array(
                            'type'        => 'icon',
                            'label'       => __('Icon', SA_FLBUILDER_TEXTDOMAIN),
                            'show_remove' => true,
                            'default'     => 'fa fa-child',
                        ),
                        'icon_size' => array(
                            'type'        => 'unit',
                            'label'       => __('Size', SA_FLBUILDER_TEXTDOMAIN),
                            'maxlength'   => '5',
                            'size'        => '6',
                            'slider'      => true,
                            'units'       => array('px'),
                            'placeholder' => '75',
                            'preview'     => array(
                                'type' => 'refresh',
                            ),
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
                                    'fields' => array('photo'),
                                ),
                                'url'     => array(
                                    'fields' => array('photo_url'),
                                ),
                            ),
                        ),
                        'photo'        => array(
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
                        'img_size'     => array(
                            'type'        => 'unit',
                            'label'       => __('Size', SA_FLBUILDER_TEXTDOMAIN),
                            'maxlength'   => '5',
                            'size'        => '6',
                            'slider'      => true,
                            'units'       => array('px'),
                            'placeholder' => '150',
                            'preview'     => array(
                                'type' => 'refresh',
                            ),
                        ),
                    ),
                ),
                'icon_style'   => array(
                    'title'  => __('Style', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        /* Icon Style */
                        'icon_style'            => array(
                            'type'    => 'select',
                            'label'   => __('Icon Background Style', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'simple',
                            'options' => array(
                                'simple' => __('Simple', SA_FLBUILDER_TEXTDOMAIN),
                                'circle' => __('Circle Background', SA_FLBUILDER_TEXTDOMAIN),
                                'square' => __('Square Background', SA_FLBUILDER_TEXTDOMAIN),
                                'custom' => __('Design your own', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle'  => array(
                                'simple' => array(
                                    'fields' => array(),
                                ),
                                'circle' => array(
                                    'fields' => array('icon_bg_color', 'icon_bg_hover_color'),
                                ),
                                'square' => array(
                                    'fields' => array('icon_bg_color', 'icon_bg_hover_color'),
                                ),
                                'custom' => array(
                                    'fields' => array('icon_border_style', 'icon_bg_color', 'icon_bg_hover_color', 'icon_bg_size', 'icon_bg_border_radius'),
                                ),
                            ),
                            'trigger' => array(
                                'custom' => array(
                                    'fields' => array('icon_border_style'),
                                ),
                            ),
                        ),

                        /* Icon Background SIze */
                        'icon_bg_size'          => array(
                            'type'        => 'unit',
                            'label'       => __('Background Size', SA_FLBUILDER_TEXTDOMAIN),
                            'help'        => __('Spacing between Icon & Background edge', SA_FLBUILDER_TEXTDOMAIN),
                            'placeholder' => '30',
                            'maxlength'   => '3',
                            'size'        => '6',
                            'slider'      => true,
                            'units'       => array('px'),
                        ),

                        /* Border Style and Radius for Icon */
                        'icon_border_style'     => array(
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
                                    'fields' => array('icon_border_width', 'icon_border_color', 'icon_border_hover_color'),
                                ),
                                'dashed' => array(
                                    'fields' => array('icon_border_width', 'icon_border_color', 'icon_border_hover_color'),
                                ),
                                'dotted' => array(
                                    'fields' => array('icon_border_width', 'icon_border_color', 'icon_border_hover_color'),
                                ),
                                'double' => array(
                                    'fields' => array('icon_border_width', 'icon_border_color', 'icon_border_hover_color'),
                                ),
                            ),
                        ),
                        'icon_border_width'     => array(
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
                        'icon_bg_border_radius' => array(
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
                'img_style'    => array(
                    'title'  => __('Style', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        /* Image Style */
                        'image_style'          => array(
                            'type'    => 'select',
                            'label'   => __('Image Style', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'simple',
                            'help'    => __('Circle and Square style will crop your image in 1:1 ratio', SA_FLBUILDER_TEXTDOMAIN),
                            'options' => array(
                                'simple' => __('Simple', SA_FLBUILDER_TEXTDOMAIN),
                                'circle' => __('Circle', SA_FLBUILDER_TEXTDOMAIN),
                                'square' => __('Square', SA_FLBUILDER_TEXTDOMAIN),
                                'custom' => __('Design your own', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'class'   => 'uabb-image-icon-style',
                            'toggle'  => array(
                                'simple' => array(
                                    'fields' => array(),
                                ),
                                'circle' => array(
                                    'fields' => array(),
                                ),
                                'square' => array(
                                    'fields' => array(),
                                ),
                                'custom' => array(
                                    'sections' => array('img_colors'),
                                    'fields'   => array('img_bg_size', 'img_border_style', 'img_border_width', 'img_bg_border_radius'),
                                ),
                            ),
                            'trigger' => array(
                                'custom' => array(
                                    'fields' => array('img_border_style'),
                                ),

                            ),
                        ),

                        /* Image Background Size */
                        'img_bg_size'          => array(
                            'type'      => 'unit',
                            'label'     => __('Background Size', SA_FLBUILDER_TEXTDOMAIN),
                            'help'      => __('Spacing between Image edge & Background edge', SA_FLBUILDER_TEXTDOMAIN),
                            'maxlength' => '3',
                            'size'      => '6',
                            'slider'    => true,
                            'units'     => array('px'),
                            'preview'   => array(
                                'type' => 'refresh',
                            ),
                        ),

                        'img_border_radius' => array(
                            'type' => 'dimension',
                            'label' => __('Border Radius', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage the inside Info Table Border Radius', SA_FLBUILDER_TEXTDOMAIN),
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

                        /* Border Style and Radius for Image */
                        'img_border_style'     => array(
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
                                    'fields' => array('img_border_width', 'img_border_color', 'img_border_hover_color'),
                                ),
                                'dashed' => array(
                                    'fields' => array('img_border_width', 'img_border_color', 'img_border_hover_color'),
                                ),
                                'dotted' => array(
                                    'fields' => array('img_borimg_border_radiuser_width', 'img_border_color', 'img_border_hover_color'),
                                ),
                                'double' => array(
                                    'fields' => array('img_border_width', 'img_border_color', 'img_border_hover_color'),
                                ),
                            ),
                        ),
                        'img_border_width'     => array(
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
                    ),
                ),
                'icon_colors'  => array( // Section.
                    'title'  => __('Colors', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                    'fields' => array( // Section Fields. 
                        /* Icon Color */
                        'icon_color'              => array(
                            'type'       => 'color',
                            'label'      => __('Icon Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
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
                        'icon_bg_color'           => array(
                            'type'       => 'color',
                            'label'      => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
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
                        'icon_border_color'       => array(
                            'type'       => 'color',
                            'label'      => __('Border Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'icon_border_hover_color' => array(
                            'type'       => 'color',
                            'label'      => __('Border Hover Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                    ),
                ),
                'img_colors'   => array( // Section.
                    'title'  => __('Colors', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                    'fields' => array( // Section Fields.
                        /* Background Color Dependent on Icon Style **/
                        'img_bg_color'           => array(
                            'type'       => 'color',
                            'label'      => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'img_bg_hover_color'     => array(
                            'type'       => 'color',
                            'label'      => __('Background Hover Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                            'preview'    => array(
                                'type' => 'none',
                            ),
                        ),

                        /* Border Color Dependent on Border Style for Image */
                        'img_border_color'       => array(
                            'type'       => 'color',
                            'label'      => __('Border Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'img_border_hover_color' => array(
                            'type'       => 'color',
                            'label'      => __('Border Hover Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
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
                'sub_heading_typography' => array(
                    'title'  => __('Sub Heading', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'sub_heading_tag_selection' => array(
                            'type'    => 'select',
                            'label'   => __('Select Tag', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'h5',
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
                        'sub_heading_font_typo'     => array(
                            'type'       => 'typography',
                            'label'      => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.oxi__addons_sub_header',
                                'important' => true,
                            ),
                        ),
                        'sub_heading_color'         => array(
                            'type'       => 'color',
                            'label'      => __('Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'sub_heading_padding' => array(
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
