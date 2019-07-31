<?php

/**
 * Register the module and its form settings with new typography, border, align param settings provided in beaver builder version 2.2
 * Applicable for BB version greater than 2.2 and OXSA version 1.3.0 or later.
 *
 * Converted font, align, border settings to respective param setting.
 *
 * @package OXSA Info List Module
 */
FLBuilder::register_settings_form(
        'oxi_SA_active_icon_form', array(
    'title' => __('Icon', SA_FLBUILDER_TEXTDOMAIN),
    'tabs' => array(
        array(
            'title' => __('Active Icon', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array(
                'icon_basic' => array(
                    'title' => __('Icon Basics', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                    'fields' => array(// Section Fields.
                        'icon' => array(
                            'type' => 'icon',
                            'label' => __('Icon', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'ua-icon ua-icon-cog',
                            'show_remove' => true,
                        ),
                        'icon_size' => array(
                            'type' => 'unit',
                            'label' => __('Size', SA_FLBUILDER_TEXTDOMAIN),
                            'placeholder' => '30',
                            'maxlength' => '5',
                            'size' => '6',
                            'slider' => true,
                            'units' => array('px'),
                        ),
                    ),
                ),
                'icon_style' => array(
                    'title' => __('Style', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        
                        /* Icon Background SIze */
                        'icon_bg_size' => array(
                            'type' => 'unit',
                            'label' => __('Background Size', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => 'Spacing between Icon & Background edge',
                            'placeholder' => '30',
                            'maxlength' => '3',
                            'size' => '6',
                            'slider' => true,
                            'units' => array('px'),
                        ),
                        /* Border Style and Radius for Icon */
                        'icon_border_style' => array(
                            'type' => 'select',
                            'label' => __('Border Style', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'none',
                            'help' => __('The type of border to use. Double borders must have a width of at least 3px to render properly.', SA_FLBUILDER_TEXTDOMAIN),
                            'options' => array(
                                'none' => __('None', SA_FLBUILDER_TEXTDOMAIN),
                                'solid' => __('Solid', SA_FLBUILDER_TEXTDOMAIN),
                                'dashed' => __('Dashed', SA_FLBUILDER_TEXTDOMAIN),
                                'dotted' => __('Dotted', SA_FLBUILDER_TEXTDOMAIN),
                                'double' => __('Double', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle' => array(
                                'solid' => array(
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
                        'icon_border_width' => array(
                            'type' => 'unit',
                            'label' => __('Border Width', SA_FLBUILDER_TEXTDOMAIN),
                            'slider' => true,
                            'units' => array('px'),
                            'maxlength' => '3',
                            'size' => '6',
                            'placeholder' => '1',
                        ),
                        'icon_bg_border_radius' => array(
                            'type' => 'unit',
                            'label' => __('Border Radius', SA_FLBUILDER_TEXTDOMAIN),
                            'slider' => true,
                            'units' => array('px'),
                            'maxlength' => '3',
                            'size' => '6',
                            'placeholder' => '20',
                        ),
                    ),
                ),
                'icon_colors' => array(// Section.
                    'title' => __('Colors', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                    'fields' => array(// Section Fields.

                        /* Icon Color */
                        'icon_color' => array(
                            'type' => 'color',
                            'label' => __('Icon Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        /* Background Color Dependent on Icon Style * */
                        'icon_bg_color' => array(
                            'type' => 'color',
                            'label' => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => '',
                            'show_reset' => true,
                            'connections' => array('color'),
                            'show_alpha' => true,
                        ),
                       
                        /* Border Color Dependent on Border Style for ICon */
                        'icon_border_color' => array(
                            'type' => 'color',
                            'label' => __('Border Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => '',
                            'show_reset' => true,
                            'connections' => array('color'),
                            'show_alpha' => true,
                        ),
                      
                       
                    ),
                ),
            ),
        ),
    ),
        )
);
FLBuilder::register_settings_form(
        'oxi_SA_deactive_icon_form', array(
    'title' => __('Icon', SA_FLBUILDER_TEXTDOMAIN),
    'tabs' => array(
        array(
            'title' => __('Active Icon', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array(
                'icon_basic' => array(
                    'title' => __('Icon Basics', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                    'fields' => array(// Section Fields.
                        'icon' => array(
                            'type' => 'icon',
                            'label' => __('Icon', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'ua-icon ua-icon-cog',
                            'show_remove' => true,
                        ),
                        'icon_size' => array(
                            'type' => 'unit',
                            'label' => __('Size', SA_FLBUILDER_TEXTDOMAIN),
                            'placeholder' => '30',
                            'maxlength' => '5',
                            'size' => '6',
                            'slider' => true,
                            'units' => array('px'),
                        ),
                    ),
                ),
                'icon_style' => array(
                    'title' => __('Style', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        /* Icon Style */
                        'icon_style' => array(
                            'type' => 'select',
                            'label' => __('Icon Background Style', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'simple',
                            'options' => array(
                                'simple' => __('Simple', SA_FLBUILDER_TEXTDOMAIN),
                                'circle' => __('Circle Background', SA_FLBUILDER_TEXTDOMAIN),
                                'square' => __('Square Background', SA_FLBUILDER_TEXTDOMAIN),
                                'custom' => __('Design your own', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle' => array(
                                'simple' => array(
                                    'fields' => array(),
                                ),
                                'circle' => array(
                                    'fields' => array('icon_color_preset', 'icon_bg_color', 'icon_bg_color_opc', 'icon_bg_hover_color', 'icon_bg_hover_color_opc', 'icon_three_d'),
                                ),
                                'square' => array(
                                    'fields' => array('icon_color_preset', 'icon_bg_color', 'icon_bg_color_opc', 'icon_bg_hover_color', 'icon_bg_hover_color_opc', 'icon_three_d'),
                                ),
                                'custom' => array(
                                    'fields' => array('icon_color_preset', 'icon_border_style', 'icon_bg_color', 'icon_bg_color_opc', 'icon_bg_hover_color', 'icon_bg_hover_color_opc', 'icon_three_d', 'icon_bg_size', 'icon_bg_border_radius'),
                                ),
                            ),
                            'trigger' => array(
                                'custom' => array(
                                    'fields' => array('icon_border_style'),
                                ),
                            ),
                        ),
                        /* Icon Background SIze */
                        'icon_bg_size' => array(
                            'type' => 'unit',
                            'label' => __('Background Size', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => 'Spacing between Icon & Background edge',
                            'placeholder' => '30',
                            'maxlength' => '3',
                            'size' => '6',
                            'slider' => true,
                            'units' => array('px'),
                        ),
                        /* Border Style and Radius for Icon */
                        'icon_border_style' => array(
                            'type' => 'select',
                            'label' => __('Border Style', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'none',
                            'help' => __('The type of border to use. Double borders must have a width of at least 3px to render properly.', SA_FLBUILDER_TEXTDOMAIN),
                            'options' => array(
                                'none' => __('None', SA_FLBUILDER_TEXTDOMAIN),
                                'solid' => __('Solid', SA_FLBUILDER_TEXTDOMAIN),
                                'dashed' => __('Dashed', SA_FLBUILDER_TEXTDOMAIN),
                                'dotted' => __('Dotted', SA_FLBUILDER_TEXTDOMAIN),
                                'double' => __('Double', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle' => array(
                                'solid' => array(
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
                        'icon_border_width' => array(
                            'type' => 'unit',
                            'label' => __('Border Width', SA_FLBUILDER_TEXTDOMAIN),
                            'slider' => true,
                            'units' => array('px'),
                            'maxlength' => '3',
                            'size' => '6',
                            'placeholder' => '1',
                        ),
                        'icon_bg_border_radius' => array(
                            'type' => 'unit',
                            'label' => __('Border Radius', SA_FLBUILDER_TEXTDOMAIN),
                            'slider' => true,
                            'units' => array('px'),
                            'maxlength' => '3',
                            'size' => '6',
                            'placeholder' => '20',
                        ),
                    ),
                ),
                'icon_colors' => array(// Section.
                    'title' => __('Colors', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                    'fields' => array(// Section Fields.

                        /* Icon Color */
                        'icon_color' => array(
                            'type' => 'color',
                            'label' => __('Icon Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => '',
                            'show_reset' => true,
                        ),
                        /* Background Color Dependent on Icon Style * */
                        'icon_bg_color' => array(
                            'type' => 'color',
                            'label' => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => '',
                            'show_reset' => true,
                            'connections' => array('color'),
                            'show_alpha' => true,
                        ),
                        'icon_bg_color_opc' => array(
                            'type' => 'text',
                            'label' => __('Opacity', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => '',
                            'description' => '%',
                            'maxlength' => '3',
                            'size' => '5',
                        ),
                        /* Border Color Dependent on Border Style for ICon */
                        'icon_border_color' => array(
                            'type' => 'color',
                            'label' => __('Border Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => '',
                            'show_reset' => true,
                            'connections' => array('color'),
                            'show_alpha' => true,
                        ),
                        /* Gradient Color Option */
                        'icon_three_d' => array(
                            'type' => 'select',
                            'label' => __('Gradient', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => '0',
                            'options' => array(
                                '0' => __('No', SA_FLBUILDER_TEXTDOMAIN),
                                '1' => __('Yes', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
        )
);

FLBuilder::register_module(
        'OxiAccordionsModule', array(
    'accordion' => array(// Tab.
        'title' => __('List Item', SA_FLBUILDER_TEXTDOMAIN), // Tab title.
        'sections' => array(// Tab Sections.
            'accordion_general' => array(// Section.
                'title' => '', // Section Title.
                'fields' => array(// Section Fields.
                    'add_accordion' => array(
                        'type' => 'form',
                        'label' => __('List Item', SA_FLBUILDER_TEXTDOMAIN),
                        'form' => 'oxi_sa_accordion_item_form',
                        'preview_text' => 'accordion_title',
                        'multiple' => true,
                    ),
                ),
            ),
        ),
    ),
    'accordion_general' => array(// Tab.
        'title' => __('General', SA_FLBUILDER_TEXTDOMAIN), // Tab title.
        'sections' => array(// Tab Sections.
            'Active_icon' => array(
                'title' => __('Active Icon', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'active_icon' => array(
                        'type' => 'select',
                        'label' => __('Active Icon', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'none',
                        'options' => array(
                            'none' => __('None', SA_FLBUILDER_TEXTDOMAIN),
                            'icon' => __('Icon', SA_FLBUILDER_TEXTDOMAIN),
                        ),
                        'toggle' => array(
                            'icon' => array(
                                'fields' => array('active_icons_settings'),
                            ),
                        ),
                    ),
                    'active_icons_settings' => array(
                        'type' => 'form',
                        'label' => __('Icon Settings', SA_FLBUILDER_TEXTDOMAIN),
                        'form' => 'oxi_SA_active_icon_form', // ID of a registered form.
                        'preview_text' => 'icon', // ID of a field to use for the preview text.
                    ),
                ),
            ),
            'Deactive_icon' => array(
                'title' => __('Deactive Icon', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'deactive_icon' => array(
                        'type' => 'select',
                        'label' => __('Deactive Icon', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'none',
                        'options' => array(
                            'none' => __('None', SA_FLBUILDER_TEXTDOMAIN),
                            'icon' => __('Icon', SA_FLBUILDER_TEXTDOMAIN),
                        ),
                        'toggle' => array(
                            'icon' => array(
                                'fields' => array('deactive_icons_settings'),
                            ),
                        ),
                    ),
                    'deactive_icons_settings' => array(
                        'type' => 'form',
                        'label' => __('Icon Settings', SA_FLBUILDER_TEXTDOMAIN),
                        'form' => 'oxi_SA_deactive_icon_form', // ID of a registered form.
                        'preview_text' => 'icon', // ID of a field to use for the preview text.
                    ),
                ),
            ),
        ),
    ),
    'accordion_style' => array(// Tab.
        'title' => __('Typography', SA_FLBUILDER_TEXTDOMAIN), // Tab title.
        'sections' => array(// Tab Sections.
            'heading_typography' => array(
                'title' => __('Title', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'heading_tag_selection' => array(
                        'type' => 'select',
                        'label' => __('Select Tag', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'h3',
                        'options' => array(
                            'h1' => __('H1', SA_FLBUILDER_TEXTDOMAIN),
                            'h2' => __('H2', SA_FLBUILDER_TEXTDOMAIN),
                            'h3' => __('H3', SA_FLBUILDER_TEXTDOMAIN),
                            'h4' => __('H4', SA_FLBUILDER_TEXTDOMAIN),
                            'h5' => __('H5', SA_FLBUILDER_TEXTDOMAIN),
                            'h6' => __('H6', SA_FLBUILDER_TEXTDOMAIN),
                            'div' => __('Div', SA_FLBUILDER_TEXTDOMAIN),
                            'p' => __('p', SA_FLBUILDER_TEXTDOMAIN),
                            'span' => __('span', SA_FLBUILDER_TEXTDOMAIN),
                        ),
                    ),
                    'heading_font_typo' => array(
                        'type' => 'typography',
                        'label' => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                        'responsive' => true,
                        'preview' => array(
                            'type' => 'css',
                            'selector' => '.uabb-info-list-title,.uabb-info-list-title a',
                            'important' => true,
                        ),
                    ),
                    'heading_color' => array(
                        'type' => 'color',
                        'default' => '',
                        'show_reset' => true,
                        'label' => __('Choose Color', SA_FLBUILDER_TEXTDOMAIN),
                        'connections' => array('color'),
                        'show_alpha' => true,
                        'preview' => array(
                            'type' => 'css',
                            'selector' => '.uabb-info-list-title',
                            'property' => 'color',
                        ),
                    ),
                    'heading_margin_top' => array(
                        'label' => __('Margin Top', SA_FLBUILDER_TEXTDOMAIN),
                        'type' => 'unit',
                        'size' => '8',
                        'slider' => true,
                        'units' => array('px'),
                        'max_length' => '3',
                    ),
                    'heading_margin_bottom' => array(
                        'label' => __('Margin Bottom', SA_FLBUILDER_TEXTDOMAIN),
                        'type' => 'unit',
                        'size' => '8',
                        'slider' => true,
                        'units' => array('px'),
                        'max_length' => '3',
                    ),
                ),
            ),
            'description_typography' => array(
                'title' => __('Description', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'description_font_typo' => array(
                        'type' => 'typography',
                        'label' => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                        'responsive' => true,
                        'preview' => array(
                            'type' => 'css',
                            'selector' => '.uabb-info-list-description *',
                            'important' => true,
                        ),
                    ),
                    'description_color' => array(
                        'type' => 'color',
                        'label' => __('Choose Color', SA_FLBUILDER_TEXTDOMAIN),
                        'preview' => array(
                            'type' => 'css',
                            'selector' => '.uabb-info-list-content .uabb-info-list-description *',
                            'property' => 'color',
                        ),
                        'default' => '',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
                    ),
                ),
            ),
        ),
    ),
        )
);


// Add List Items.
FLBuilder::register_settings_form(
    'oxi_sa_accordion_item_form', array(
    'title' => __('Add Accordion', SA_FLBUILDER_TEXTDOMAIN),
    'tabs' => array(
        'accordion_general' => array(
            'title' => __('General', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array(
                'title' => array(
                    'title' => __('General Settings', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'accordion_title' => array(
                            'type' => 'text',
                            'label' => __('Title', SA_FLBUILDER_TEXTDOMAIN),
                            'description' => '',
                            'default' => __('Name of the element', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Provide a title for this icon list item.', SA_FLBUILDER_TEXTDOMAIN),
                            'placeholder' => __('Title', SA_FLBUILDER_TEXTDOMAIN),
                            'class' => 'uabb-list-item-title',
                            'connections' => array('string', 'html'),
                        ),
                        'accordion_description' => array(
                            'type' => 'editor',
                            'default' => __('Enter description text here.', SA_FLBUILDER_TEXTDOMAIN),
                            'label' => '',
                            'rows' => 13,
                            'connections' => array('string', 'html'),
                        ),
                    ),
                ),
            ),
        ),
        'accordion_image' => array(
            'title' => __('Icon', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array(
                'title' => array(
                    'title' => __('Icon Settings', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'icon_basic' => array(
                            'type' => 'icon',
                            'label' => __('Icon', SA_FLBUILDER_TEXTDOMAIN),
                            'show_remove' => true,
                        ),
                        'icon_color' => array(
                            'type' => 'color',
                            'label' => __('Icon Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => '',
                            'show_reset' => true,
                            'connections' => array('color'),
                            'show_alpha' => true,
                        ),
                    ),
                ),
            ),
        ),
    ),
        )
);




