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
                        'initial_open' => array(
                            'type' => 'select',
                            'label' => __('Initial Open', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => '0',
                            'options' => array(
                                '0' => __('1st Tab', SA_FLBUILDER_TEXTDOMAIN),
                                '1' => __('2nd Tab', SA_FLBUILDER_TEXTDOMAIN),
                                '2' => __('3rd Tab', SA_FLBUILDER_TEXTDOMAIN),
                                '3' => __('4th Tab', SA_FLBUILDER_TEXTDOMAIN),
                                '4' => __('5th Tab', SA_FLBUILDER_TEXTDOMAIN),
                                '5' => __('6th Tab', SA_FLBUILDER_TEXTDOMAIN),
                                '6' => __('7th Tab', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                        ),
                        'tab_layout' => array(
                            'type' => 'select',
                            'label' => __('Layout', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'horizontal',
                            'options' => array(
                                'horizontal' => __('Horizontal', SA_FLBUILDER_TEXTDOMAIN),
                                'vertical' => __('Vertical', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle' => array(
                                'vertical' => array(
                                    'fields' => array('tab_width'),
                                )
                            )
                        ),
                        'tab_width'     => array(
                            'type'        => 'unit',
                            'label'       => __('Vartical Tab Width', SA_FLBUILDER_TEXTDOMAIN),
                            'slider'      => true,
                            'units'       => array('%'),
                            'maxlength'   => '3',
                            'size'        => '6',
                            'placeholder' => '1',
                            'preview'     => array(
                                'type' => 'refresh',
                            ),
                        ),
                        'tab_icon' => array(
                            'type' => 'select',
                            'label' => __('Icon / Image ', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'none',
                            'options' => array(
                                'none' => __('None', SA_FLBUILDER_TEXTDOMAIN),
                                'enable' => __('Enable', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle' => array(
                                'enable' => array(
                                    'fields' => array('tab_icon_position', 'title_icon_color', 'title_icon_size', 'title_active_icon_color', 'title_hover_icon_color'),
                                )
                            )
                        ),
                        'icon_position' => array(
                            'type' => 'select',
                            'label' => __('Icon / Image Position', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'left',
                            'options' => array(
                                'left' => __('Left', SA_FLBUILDER_TEXTDOMAIN),
                                'right' => __('Right', SA_FLBUILDER_TEXTDOMAIN),
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
            'sections' => array(
                'general' => array(
                    'title' => __('General', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'general_padding' => array(
                            'type' => 'dimension',
                            'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage the tabs box padding', SA_FLBUILDER_TEXTDOMAIN),
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
                        'general_margin_padding' => array(
                            'type' => 'dimension',
                            'label' => __('Margin', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage the tabs box Margin', SA_FLBUILDER_TEXTDOMAIN),
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
                        'general_border_style'     => array(
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
                                    'fields' => array('general_border_color', 'general_border_width'),
                                ),
                                'dashed' => array(
                                    'fields' => array('general_border_color', 'general_border_width'),
                                ),
                                'dotted' => array(
                                    'fields' => array('general_border_color', 'general_border_width'),
                                ),
                                'double' => array(
                                    'fields' => array('general_border_color', 'general_border_width'),
                                ),
                            ),
                        ),
                        'general_border_width'     => array(
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
                        'general_border_color'           => array(
                            'type'       => 'color',
                            'label'      => __('Border Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'general_border_radius' => array(
                            'type' => 'dimension',
                            'label' => __('Border Radius', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage the tabs box Margin', SA_FLBUILDER_TEXTDOMAIN),
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
                        'general_shadow' => array(
                            'type'        => 'shadow',
                            'label'       => 'Shadow',
                            'show_spread' => true,
                            'preview'     => array(
                                'type'     => 'css',
                                'selector' => '.oxi__addons_wrapper',
                                'property' => 'box-shadow',
                            ),
                        ),
                    )
                ),
                'title' => array(
                    'title' => __('Title Setting', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'icon_gap'     => array(
                            'type'        => 'unit',
                            'label'       => __('Icon Gap', SA_FLBUILDER_TEXTDOMAIN),
                            'slider'      => true,
                            'units'       => array('px'),
                            'maxlength'   => '3',
                            'size'        => '6',
                            'placeholder' => '1',
                            'preview'     => array(
                                'type' => 'refresh',
                            ),
                        ),
                        'title_bg_color'         => array(
                            'type'       => 'color',
                            'label'      => __('Background color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'title_color'         => array(
                            'type'       => 'color',
                            'label'      => __('Text Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'title_icon_size'     => array(
                            'type'        => 'unit',
                            'label'       => __('Icon / Image Size', SA_FLBUILDER_TEXTDOMAIN),
                            'slider'      => true,
                            'units'       => array('px'),
                            'maxlength'   => '3',
                            'size'        => '6',
                            'placeholder' => '22',
                            'preview'     => array(
                                'type' => 'refresh',
                            ),
                        ),
                        'title_icon_color' => array(
                            'type'        => 'color',
                            'label'       => __('Icon Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => '',
                            'show_reset'  => true,
                            'connections' => array('color'),
                            'show_alpha'  => true,
                        ),

                        'title_border_style'     => array(
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
                                    'fields' => array('title_border_color', 'title_border_width'),
                                ),
                                'dashed' => array(
                                    'fields' => array('title_border_color', 'title_border_width'),
                                ),
                                'dotted' => array(
                                    'fields' => array('title_border_color', 'title_border_width'),
                                ),
                                'double' => array(
                                    'fields' => array('title_border_color', 'title_border_width'),
                                ),
                            ),
                        ),
                        'title_border_width'     => array(
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
                        'title_border_color'           => array(
                            'type'       => 'color',
                            'label'      => __('Border Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'title_border_radius' => array(
                            'type' => 'dimension',
                            'label' => __('Border Radius', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage the tabs box Margin', SA_FLBUILDER_TEXTDOMAIN),
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
                'title_hover' => array(
                    'title' => __('Title Hover Setting', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'tab_title_hover' => array(
                            'type' => 'select',
                            'label' => __('Hover style', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'none',
                            'options' => array(
                                'none' => __('None', SA_FLBUILDER_TEXTDOMAIN),
                                'enable' => __('Enable', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle' => array(
                                'enable' => array(
                                    'fields' => array('title_hover_bg_color', 'title_hover_color', 'title_hover_icon_color', 'title_hover_border_color'),
                                )
                            )
                        ),
                        'title_hover_bg_color'         => array(
                            'type'       => 'color',
                            'label'      => __('Background Hover color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'title_hover_color'         => array(
                            'type'       => 'color',
                            'label'      => __('Hover Text Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'title_hover_icon_color' => array(
                            'type'        => 'color',
                            'label'       => __('Hover Icon Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => '',
                            'show_reset'  => true,
                            'connections' => array('color'),
                            'show_alpha'  => true,
                        ),
                        'title_hover_border_color'           => array(
                            'type'       => 'color',
                            'label'      => __('Hover Border Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                    )
                ),
                'title_active' => array(
                    'title' => __('Title Active Setting', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'tab_title_active' => array(
                            'type' => 'select',
                            'label' => __('Active style', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'none',
                            'options' => array(
                                'none' => __('None', SA_FLBUILDER_TEXTDOMAIN),
                                'enable' => __('Enable', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle' => array(
                                'enable' => array(
                                    'fields' => array('title_active_bg_color', 'title_active_color', 'title_active_icon_color', 'title_active_border_color'),
                                )
                            ),
                        ),
                        'title_active_bg_color'         => array(
                            'type'       => 'color',
                            'label'      => __('Background Active color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'title_active_color'         => array(
                            'type'       => 'color',
                            'label'      => __('Active Text Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'title_active_icon_color' => array(
                            'type'        => 'color',
                            'label'       => __('Active Icon Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => '',
                            'show_reset'  => true,
                            'connections' => array('color'),
                            'show_alpha'  => true,
                        ),
                        'title_active_border_color'           => array(
                            'type'       => 'color',
                            'label'      => __('Active Border Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                    )
                ),
                'description' => array(
                    'title' => __('Description Setting', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'desc_bg_color'         => array(
                            'type'       => 'color',
                            'label'      => __('Background color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'desc_color'         => array(
                            'type'       => 'color',
                            'label'      => __('Text Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'desc_border_style'     => array(
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
                                    'fields' => array('desc_border_color', 'desc_border_width'),
                                ),
                                'dashed' => array(
                                    'fields' => array('desc_border_color', 'desc_border_width'),
                                ),
                                'dotted' => array(
                                    'fields' => array('desc_border_color', 'desc_border_width'),
                                ),
                                'double' => array(
                                    'fields' => array('desc_border_color', 'desc_border_width'),
                                ),
                            ),
                        ),
                        'desc_border_width'     => array(
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
                        'desc_border_color'           => array(
                            'type'       => 'color',
                            'label'      => __('Border Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'    => '',
                            'show_reset' => true,
                            'show_alpha' => true,
                        ),
                        'desc_shadow' => array(
                            'type'        => 'shadow',
                            'label'       => 'Shadow',
                            'show_spread' => true,
                            'preview'     => array(
                                'type'     => 'css',
                                'selector' => '.my-selector',
                                'property' => 'box-shadow',
                            ),
                        ),
                    )
                ),
                'caret' => array(
                    'title' => __('Caret', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'caret' => array(
                            'type' => 'select',
                            'label' => __('Caret', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'enable',
                            'options' => array(
                                'none' => __('None', SA_FLBUILDER_TEXTDOMAIN),
                                'enable' => __('Enable', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle' => array(
                                'enable' => array(
                                    'fields' => array('caret_size', 'caret_color', 'caret_style'),
                                )
                            )
                        ),
                        'caret_style' => array(
                            'type' => 'select',
                            'label' => __('Style', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'outside',
                            'options' => array(
                                'outside' => __('Outside', SA_FLBUILDER_TEXTDOMAIN),
                                'inside' => __('Inside', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                        ),
                        'caret_size'     => array(
                            'type'        => 'unit',
                            'label'       => __('Caret Size', SA_FLBUILDER_TEXTDOMAIN),
                            'slider'      => true,
                            'units'       => array('px'),
                            'maxlength'   => '3',
                            'size'        => '6',
                            'placeholder' => '1',
                            'preview'     => array(
                                'type' => 'refresh',
                            ),
                        ),
                        'caret_color' => array(
                            'type'        => 'color',
                            'label'       => __('Caret Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => '000',
                            'show_reset'  => true,
                            'connections' => array('color'),
                            'show_alpha'  => true,
                        ),
                    )
                )
            )
        ),
        'typography'    => array(
            'title'    => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array(
                'title_typography'     => array(
                    'title'  => __('Title Settings', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'title_font_typo'     => array(
                            'type'       => 'typography',
                            'label'      => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.oxi__tab_wraper_main .oxi__tab_li',
                                'important' => true,
                            ),
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
                        'title_margin' => array(
                            'type' => 'dimension',
                            'label' => __('Margin', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage the tabs box Margin', SA_FLBUILDER_TEXTDOMAIN),
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
                'description_typography' => array(
                    'title'  => __('Description Settings', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'description_font_typo' => array(
                            'type'       => 'typography',
                            'label'      => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.oxi__tab_content , .oxi__tab_content *',
                                'important' => true,
                            ),
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
                        'desc_margin_padding' => array(
                            'type' => 'dimension',
                            'label' => __('Margin', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage the tabs box Margin', SA_FLBUILDER_TEXTDOMAIN),
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
                        ),
                    ),
                ),
            ),
        ),
    )
);
