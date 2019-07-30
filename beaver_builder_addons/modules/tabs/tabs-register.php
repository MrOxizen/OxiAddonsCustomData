<?php

/**
 * Register the module and its form settings for beaver builder  version
 *  
 *
 * @package Shortcodes addons info table module
 */

FLBuilder::register_module(
    'Tabs',
    array(
        'general'       => array(
            'title'    => __('Content', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array()
        ),
        'style'         => array(
            'title'    => __('Styles', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array()
        ),
        'typography'    => array(
            'title'    => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array(
                'title_typography'     => array(
                    'title'  => __('Title Settings', SA_FLBUILDER_TEXTDOMAIN),
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
                    'title'  => __('Description Settings', SA_FLBUILDER_TEXTDOMAIN),
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
            ),
        ),
    )
);
