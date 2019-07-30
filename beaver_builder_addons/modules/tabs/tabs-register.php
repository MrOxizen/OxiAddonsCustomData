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
            'sections' => array(
                'general' => array(
                    'title'  => 'General',
                    'fields' => array(
                        'tab_layout' => array(
                            'type' => 'select',
                            'label' => __('Layout', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'horizontal',
                            'options' => array(
                                'horizontal' => __('Horizontal', SA_FLBUILDER_TEXTDOMAIN),
                                'vertical' => __('Vertical', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                        ),
                        'tab_icon' => array(
                            'type' => 'select',
                            'label' => __('Icon ', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'none',
                            'options' => array(
                                'none' => __('None', SA_FLBUILDER_TEXTDOMAIN),
                                'enable' => __('Enable', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle' => array(
                                'enable' => array(
                                    'fields' => array('tab_icon_position')
                                )
                            )
                        ),
                        'tab_icon_position' => array(
                            'type' => 'select',
                            'label' => __('Icon Position', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'inline',
                            'options' => array(
                                'inline' => __('Inline', SA_FLBUILDER_TEXTDOMAIN),
                                'stacked' => __('Stacked', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                        ),
                    ),
                ),
                'list_item' => array(
                    'title'  => 'List Item',
                    'fields' => array(
                        'add_list_item' => array(
                            'type'         => 'form',
                            'label'        => __('List Item', SA_FLBUILDER_TEXTDOMAIN),
                            'form'         => 'oxi_addons_list_item',
                            'preview_text' => 'list_item_title',
                            'multiple'     => true,
                        ),
                    ),
                ),
            )
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
// Add List Items.
FLBuilder::register_settings_form(
    'oxi_addons_list_item',
    array(
        'title' => __('Add List Item', SA_FLBUILDER_TEXTDOMAIN),
        'tabs'  => array(
            'list_item_general' => array(
                'title'    => __('General', SA_FLBUILDER_TEXTDOMAIN),
                'sections' => array(
                    'title' => array(
                        'title'  => __('General Settings', SA_FLBUILDER_TEXTDOMAIN),
                        'fields' => array(
                            'list_item_title'       => array(
                                'type'        => 'text',
                                'label'       => __('Title', SA_FLBUILDER_TEXTDOMAIN),
                                'default'     => __('Name of the element', SA_FLBUILDER_TEXTDOMAIN),
                                'help'        => __('Provide a title for this icon list item.', SA_FLBUILDER_TEXTDOMAIN),
                                'placeholder' => __('Title', SA_FLBUILDER_TEXTDOMAIN),
                                'class'       => 'uabb-list-item-title',
                                'connections' => array('string', 'html'),
                            ),
                            'list_item_description' => array(
                                'type'        => 'editor',
                                'default'     => __('Enter description text here.', SA_FLBUILDER_TEXTDOMAIN),
                                'label'       => '',
                                'rows'        => 13,
                                'connections' => array('string', 'html'),
                            ),
                        ),
                    ),
                ),
            ),

            'list_item_image'   => array(
                'title'    => __('Icon / Image', SA_FLBUILDER_TEXTDOMAIN),
                'sections' => array(
                    'title'      => array(
                        'title'  => __('Icon / Image', SA_FLBUILDER_TEXTDOMAIN),
                        'fields' => array(
                            'image_type' => array(
                                'type'    => 'select',
                                'label'   => __('Image Type', SA_FLBUILDER_TEXTDOMAIN),
                                'default' => 'none',
                                'options' => array(
                                    'none'  => __('None', SA_FLBUILDER_TEXTDOMAIN),
                                    'icon'  => __('Icon', SA_FLBUILDER_TEXTDOMAIN),
                                    'photo' => __('Photo', SA_FLBUILDER_TEXTDOMAIN),
                                ),
                                'toggle'  => array(
                                    'icon'  => array(
                                        'sections' => array('icon_basic', 'icon_style'),
                                    ),
                                    'photo' => array(
                                        'sections' => array('img_basic', 'img_style'),
                                    ),
                                ),
                            ),
                        ),
                    ),
                    /* Icon Basic Setting */
                    'icon_basic' => array( // Section.
                        'title'  => __('Icon', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                        'fields' => array( // Section Fields.
                            'icon'       => array(
                                'type'        => 'icon',
                                'label'       => __('Icon', SA_FLBUILDER_TEXTDOMAIN),
                                'show_remove' => true,
                            ),
                            'icon_color' => array(
                                'type'        => 'color',
                                'label'       => __('Icon Color', SA_FLBUILDER_TEXTDOMAIN),
                                'default'     => '',
                                'show_reset'  => true,
                                'connections' => array('color'),
                                'show_alpha'  => true,
                            ),
                            'icon_size'     => array(
                                'type'        => 'unit',
                                'label'       => __('Icon Size', SA_FLBUILDER_TEXTDOMAIN),
                                'slider'      => true,
                                'units'       => array('px'),
                                'maxlength'   => '3',
                                'size'        => '6',
                                'placeholder' => '22',
                                'preview'     => array(
                                    'type' => 'refresh',
                                ),
                            ),
                        ),
                    ),
                    /* Image Basic Setting */
                    'img_basic'  => array( // Section.
                        'title'  => __('Image', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
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
                            'image_size'     => array(
                                'type'        => 'unit',
                                'label'       => __('Image Size', SA_FLBUILDER_TEXTDOMAIN),
                                'slider'      => true,
                                'units'       => array('px'),
                                'maxlength'   => '3',
                                'size'        => '6',
                                'placeholder' => '50',
                                'preview'     => array(
                                    'type' => 'refresh',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    )
);
