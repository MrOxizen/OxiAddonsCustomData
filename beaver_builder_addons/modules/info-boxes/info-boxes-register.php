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
                'title-section' => array(
                    'fields' => array(
                        'image_type' => array(
                            'type'    => 'select',
                            'label'   => __('Image Type', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'icon',
                            'options' => array(
                                'none'  => __('None', SA_FLBUILDER_TEXTDOMAIN),
                                'icon'  => __('Icon', SA_FLBUILDER_TEXTDOMAIN),
                                'photo' => __('Photo', SA_FLBUILDER_TEXTDOMAIN),
                            ),
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

                        'it_title'     => array(
                            'type'        => 'text',
                            'label'       => __('Heading', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => __('This is an Info Box', SA_FLBUILDER_TEXTDOMAIN),
                            'help'        => __('Enter Info-Box Title here', SA_FLBUILDER_TEXTDOMAIN),
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
                            ),
                            'toggle'  => array(
                                'cta'           => array(
                                    'sections' => array('btn_style_section', 'btn_typography_section'),
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
    )
);
