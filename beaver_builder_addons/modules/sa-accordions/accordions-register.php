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
                            'default' => 'fas fa-minus',
                            'show_remove' => true,
                        ),
                        'icon_size' => array(
                            'type' => 'unit',
                            'label' => __('Size', SA_FLBUILDER_TEXTDOMAIN),
                            'placeholder' => '30',
                            'default' => '20',
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
                            'default' => '30',
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
                            'default' => '1',
                            'size' => '6',
                            'placeholder' => '1',
                        ),
                        'icon_bg_border_radius' => array(
                            'type' => 'unit',
                            'label' => __('Border Radius', SA_FLBUILDER_TEXTDOMAIN),
                            'slider' => true,
                            'units' => array('px'),
                            'maxlength' => '3',
                            'default' => '5',
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
                            'default' => 'fff',
                            'show_reset' => true,
                        ),
                        /* Background Color Dependent on Icon Style * */
                        'icon_bg_color' => array(
                            'type' => 'color',
                            'label' => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => '005b54',
                            'show_reset' => true,
                            'connections' => array('color'),
                            'show_alpha' => true,
                        ),
                       
                        /* Border Color Dependent on Border Style for ICon */
                        'icon_border_color' => array(
                            'type' => 'color',
                            'label' => __('Border Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'f9e500',
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
            'title' => __('Deactive Icon', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array(
                'icon_basic' => array(
                    'title' => __('Icon Basics', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                    'fields' => array(// Section Fields.
                        'icon' => array(
                            'type' => 'icon',
                            'label' => __('Icon', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'fas fa-plus',
                            'show_remove' => true,
                        ),
                        'icon_size' => array(
                            'type' => 'unit',
                            'label' => __('Size', SA_FLBUILDER_TEXTDOMAIN),
                            'placeholder' => '30',
                            'maxlength' => '5',
                            'default' => '20',
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
                            'default' => '30',
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
                            'default' => '1',
                            'size' => '6',
                            'placeholder' => '1',
                        ),
                        'icon_bg_border_radius' => array(
                            'type' => 'unit',
                            'label' => __('Border Radius', SA_FLBUILDER_TEXTDOMAIN),
                            'slider' => true,
                            'units' => array('px'),
                            'maxlength' => '3',
                            'default' => '5',
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
                            'default' => 'fff',
                            'show_reset' => true,
                        ),
                        /* Background Color Dependent on Icon Style * */
                        'icon_bg_color' => array(
                            'type' => 'color',
                            'label' => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'a59c9b',
                            'show_reset' => true,
                            'connections' => array('color'),
                            'show_alpha' => true,
                        ),
                       
                        /* Border Color Dependent on Border Style for ICon */
                        'icon_border_color' => array(
                            'type' => 'color',
                            'label' => __('Border Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => '00e2f7',
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
                        'default' => 'icon',
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
                        'default' => 'icon',
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
        'title' => __('Style', SA_FLBUILDER_TEXTDOMAIN), // Tab title.
        'sections' => array(// Tab Sections.
            'accordion_background' => array(
                'title' => __('Background', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'accordion_abg_color' => array(
                        'type' => 'color',
                        'default' => '00bcb0',
                        'show_reset' => true,
                        'label' => __('Active Background Color', SA_FLBUILDER_TEXTDOMAIN),
                        'connections' => array('color'),
                        'show_alpha' => true,
                        
                    ),
                    'accordion_dbg_color' => array(
                        'type' => 'color',
                        'default' => 'eaeaea',
                        'show_reset' => true,
                        'label' => __('Deactive Background Color', SA_FLBUILDER_TEXTDOMAIN),
                        'connections' => array('color'),
                        'show_alpha' => true,
                        
                    ),
                    'accordion_border_style' => array(
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
                                    'fields' => array('body_border_width', 'accordion_border_color', 'accordion_aborder_color'),
                                ),
                                'dashed' => array(
                                    'fields' => array('body_border_width', 'accordion_border_color', 'accordion_aborder_color'),
                                ),
                                'dotted' => array(
                                    'fields' => array('body_border_width', 'accordion_border_color', 'accordion_aborder_color'),
                                ),
                                'double' => array(
                                    'fields' => array('body_border_width', 'accordion_border_color', 'accordion_aborder_color'),
                                ),
                            ),
                        ),
                    'body_border_width' => array(
                        'type' => 'dimension',
                        'label' => __('Border', SA_FLBUILDER_TEXTDOMAIN),
                        'help' => __('Manage the outside spacing of content area of flipbox.', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '1',
                        'slider' => true,
                        'units' => array('px'),
                        
                    ),
                    'accordion_border_color' => array(
                        'type' => 'color',
                        'default' => '',
                        'show_reset' => true,
                        'label' => __('Border Color', SA_FLBUILDER_TEXTDOMAIN),
                        'connections' => array('color'),
                        'show_alpha' => true,
                        
                    ),
                    'accordion_aborder_color' => array(
                        'type' => 'color',
                        'default' => '',
                        'show_reset' => true,
                        'label' => __('Active Border Color', SA_FLBUILDER_TEXTDOMAIN),
                        'connections' => array('color'),
                        'show_alpha' => true,
                        
                    ),
                    'body_padding' => array(
                        'type' => 'dimension',
                        'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                        'help' => __('Space between accordion to another accordion', SA_FLBUILDER_TEXTDOMAIN),
                        'slider' => true,
                        'default' => '15',
                        'units' => array('px'),
                        'responsive' => array(
                            'placeholder' => array(
                                'default' => '15',
                                'medium' => '',
                                'responsive' => '',
                            ),
                        ),
                    ),
                    'body_margin' => array(
                        'type' => 'dimension',
                        'label' => __('Margin', SA_FLBUILDER_TEXTDOMAIN),
                        'help' => __('Space between accordion to another accordion', SA_FLBUILDER_TEXTDOMAIN),
                        'slider' => true,
                        'units' => array('px'),
                        'responsive' => array(
                            'placeholder' => array(
                                'default' => '15',
                                'medium' => '',
                                'responsive' => '',
                            ),
                        ),
                    ),
                    
                ),
            ),
            'accordion_description_background' => array(
                'title' => __('Description Background', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'accordion_descbg_color' => array(
                        'type' => 'color',
                        'default' => 'fff',
                        'show_reset' => true,
                        'label' => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                        'connections' => array('color'),
                        'show_alpha' => true,
                        
                    ),
                    
                    'accordion_description_border_style' => array(
                            'type' => 'select',
                            'label' => __('Border Style', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'solid',
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
                                    'fields' => array('body_description_border_width', 'accordion_border_color', 'accordion_aborder_color'),
                                ),
                                'dashed' => array(
                                    'fields' => array('body_description_border_width', 'accordion_border_color', 'accordion_aborder_color'),
                                ),
                                'dotted' => array(
                                    'fields' => array('body_description_border_width', 'accordion_border_color', 'accordion_aborder_color'),
                                ),
                                'double' => array(
                                    'fields' => array('body_description_border_width', 'accordion_border_color', 'accordion_aborder_color'),
                                ),
                            ),
                        ),
                    'body_description_border_width' => array(
                        'type' => 'dimension',
                        'label' => __('Border', SA_FLBUILDER_TEXTDOMAIN),
                        'help' => __('Manage the outside spacing of content area of flipbox.', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '1',
                        'slider' => true,
                        'units' => array('px'),
                        
                    ),
                    'accordion_description_border_color' => array(
                        'type' => 'color',
                        'default' => 'ddd',
                        'show_reset' => true,
                        'label' => __('Border Color', SA_FLBUILDER_TEXTDOMAIN),
                        'connections' => array('color'),
                        'show_alpha' => true,
                        
                    ),
                    
                    'description_padding' => array(
                        'type' => 'dimension',
                        'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                        'help' => __('Space between accordion to another accordion', SA_FLBUILDER_TEXTDOMAIN),
                        'slider' => true,
                        'default' => '15',
                        'units' => array('px'),
                        'responsive' => array(
                            'placeholder' => array(
                                'default' => '15',
                                'medium' => '',
                                'responsive' => '',
                            ),
                        ),
                    ),
                    'description__margin' => array(
                        'type' => 'dimension',
                        'label' => __('Margin', SA_FLBUILDER_TEXTDOMAIN),
                        'help' => __('Space between accordion to another accordion', SA_FLBUILDER_TEXTDOMAIN),
                        'slider' => true,
                        
                        'units' => array('px'),
                        'responsive' => array(
                            'placeholder' => array(
                                'default' => '15',
                                'medium' => '',
                                'responsive' => '',
                            ),
                        ),
                    ),
                    
                ),
            ),
        ),
    ),
    'accordion_typography' => array(// Tab.
        'title' => __('Typography', SA_FLBUILDER_TEXTDOMAIN), // Tab title.
        'sections' => array(// Tab Sections.
            'heading_typography' => array(
                'title' => __('Title', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'heading_tag_selection' => array(
                        'type' => 'select',
                        'label' => __('Select Tag', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'h5',
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
                        
                    ),
                    'active_heading_color' => array(
                        'type' => 'color',
                        'default' => 'fff',
                        'show_reset' => true,
                        'label' => __('Active Title Color', SA_FLBUILDER_TEXTDOMAIN),
                        'connections' => array('color'),
                        'show_alpha' => true,
                        
                    ),
                    'deactive_heading_color' => array(
                        'type' => 'color',
                        'default' => '6b6564',
                        'show_reset' => true,
                        'label' => __('Deactive Title Color', SA_FLBUILDER_TEXTDOMAIN),
                        'connections' => array('color'),
                        'show_alpha' => true,
                        
                    ),
                    'sa_accordion_title_padding' => array(
                        'type' => 'dimension',
                        'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                        'help' => __('Space between accordion to another accordion', SA_FLBUILDER_TEXTDOMAIN),
                        'slider' => true,
                        'units' => array('px'),
                        'responsive' => array(
                            'placeholder' => array(
                                'default' => '15',
                                'medium' => '',
                                'responsive' => '',
                            ),
                        ),
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
                        'default' => '',
                    ),
                    'description_color' => array(
                        'type' => 'color',
                        'label' => __('Choose Color', SA_FLBUILDER_TEXTDOMAIN),
                        'preview' => array(
                            'type' => 'css',
                            'selector' => '.uabb-info-list-content .uabb-info-list-description *',
                            'property' => 'color',
                        ),
                        'default' => '333333',
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




