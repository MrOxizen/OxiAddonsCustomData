<?php

/**
 * Register the module and its form settings with new typography, border, align param settings provided in beaver builder version 2.2
 * Applicable for BB version greater than 2.2 and OXSA version 1.3.0 or later.
 *
 * Converted font, align, border settings to respective param setting.
 *
 * @package OXSA Info List Module
 */
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
                                'fields' => array('icon_basic', 'icon_color', 'icon_BG_color'),
                            ),
                        ),
                    ),
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
                    'icon_BG_color' => array(
                        'type' => 'color',
                        'label' => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '#fff',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
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
                                'fields' => array('d_icon', 'd_icon_color', 'd_icon_BG_color'),
                            ),
                        ),
                    ),
                    'd_icon' => array(
                        'type' => 'icon',
                        'label' => __('Icon', SA_FLBUILDER_TEXTDOMAIN),
                        'show_remove' => true,
                    ),
                    'd_icon_color' => array(
                        'type' => 'color',
                        'label' => __('Icon Color', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
                    ),
                    'd_icon_BG_color' => array(
                        'type' => 'color',
                        'label' => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '#fff',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
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
