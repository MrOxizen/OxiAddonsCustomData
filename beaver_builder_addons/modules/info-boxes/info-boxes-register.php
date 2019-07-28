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
                                    'sections' => array('icon_basic', 'icon_style', 'icon_colors'),
                                    'fields' => array('icon_main'),
                                ),
                                'photo' => array(
                                    'sections' => array('img_basic', 'img_style'),
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
                                    'sections' => array('btn-style-section', 'btn_typography_section'),
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
            )
        ),
    )
);
