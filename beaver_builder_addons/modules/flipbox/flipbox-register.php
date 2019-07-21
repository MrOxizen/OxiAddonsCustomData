<?php

FLBuilder::register_settings_form(
        'Oxi_flip_box_icon_form_field', array(
    'title' => __('Icon', SA_FLBUILDER_TEXTDOMAIN),
    'tabs' => array(
        array(
            'title' => __('Image / Icon', SA_FLBUILDER_TEXTDOMAIN),
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
FLBuilder::register_settings_form(
        'Oxi_flip_box_icon_back_field', array(
    'title' => __('Icon', SA_FLBUILDER_TEXTDOMAIN),
    'tabs' => array(
        array(
            'title' => __('Image / Icon', SA_FLBUILDER_TEXTDOMAIN),
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
        'OxiFlipBoxModule', array(
    'flip_front' => array(// Tab.
        'title' => __('Content', SA_FLBUILDER_TEXTDOMAIN), // Tab title.
        'sections' => array(// Tab Sections.
            'title' => array(// Section.
                'title' => __('Front Settings', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                'fields' => array(// Section Fields.
                    'oxi_flip_icons' => array(
                        'type' => 'form',
                        'label' => __('Icon Settings', SA_FLBUILDER_TEXTDOMAIN),
                        'form' => 'Oxi_flip_box_icon_form_field', // ID of a registered form.
                        'preview_text' => 'icon', // ID of a field to use for the preview text.
                    ),
                    'oxi_flip_front_title' => array(
                        'type' => 'text',
                        'label' => __('Title on Front', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => __("Let's Flip!", SA_FLBUILDER_TEXTDOMAIN),
                        'help' => __('Perhaps, this is the most highlighted text.', SA_FLBUILDER_TEXTDOMAIN),
                        'connections' => array('string', 'html'),
                    ),
                    'oxi_flip_front_details' => array(
                        'type' => 'editor',
                        'media_buttons' => false,
                        'rows' => 10,
                        'label' => 'Details',
                        'default' => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', SA_FLBUILDER_TEXTDOMAIN),
                        'connections' => array('string', 'html'),
                    ),
                ),
            ),
            'Back Settings' => array(// Section.
                'title' => __('Back Settings', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                'fields' => array(// Section Fields.
                    'oxi_flip_back_icons' => array(
                        'type' => 'form',
                        'label' => __('Icon Settings', SA_FLBUILDER_TEXTDOMAIN),
                        'form' => 'Oxi_flip_box_icon_back_field', // ID of a registered form.
                        'preview_text' => 'icon', // ID of a field to use for the preview text.
                    ),
                    'oxi_flip_back_title' => array(
                        'type' => 'text',
                        'label' => __('Title on Front', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => __("Let's Flip!", SA_FLBUILDER_TEXTDOMAIN),
                        'help' => __('Perhaps, this is the most highlighted text.', SA_FLBUILDER_TEXTDOMAIN),
                        'connections' => array('string', 'html'),
                    ),
                    'oxi_flip_back_details' => array(
                        'type' => 'editor',
                        'media_buttons' => false,
                        'rows' => 10,
                        'label' => 'Details',
                        'default' => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', SA_FLBUILDER_TEXTDOMAIN),
                        'connections' => array('string', 'html'),
                    ),
                ),
            ),
            
        ),
    ),
    'oxi_style' => array(// Tab.
        'title' => __('Style', SA_FLBUILDER_TEXTDOMAIN), // Tab title.
        'sections' => array(// Tab Sections.
            'general' => array(// Section.
                'title' => __('Flipbox Styles', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                'fields' => array(// Section Fields.
                    'flip_box_type' => array(
                        'type' => 'select',
                        'label' => __('Flip Type', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'horizontal_flip_left',
                        'help' => __('Select Flip type for this flip box.', SA_FLBUILDER_TEXTDOMAIN),
                        'options' => array(
                            'horizontal_flip_left' => __('Flip Horizontally From Left', SA_FLBUILDER_TEXTDOMAIN),
                            'horizontal_flip_right' => __('Flip Horizontally From Right', SA_FLBUILDER_TEXTDOMAIN),
                            'vertical_flip_top' => __('Flip Vertically From Top', SA_FLBUILDER_TEXTDOMAIN),
                            'vertical_flip_bottom' => __('Flip Vertically From Bottom', SA_FLBUILDER_TEXTDOMAIN),
                        ),
                    ),
                    'flip_box_text_align_option' => array(
                        'type' => 'select',
                        'label' => __('Text Align', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'oxi_text_center',
                        'options' => array(
                            'oxi_text_left' => __('Left', SA_FLBUILDER_TEXTDOMAIN),
                            'oxi_text_right' => __('Right', SA_FLBUILDER_TEXTDOMAIN),
                            'oxi_text_center' => __('Center', SA_FLBUILDER_TEXTDOMAIN),
                         ),
                        
                    ),
                    'flip_box_min_height' => array(
                        'type' => 'unit',
                        'label' => __('Desktop Height', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '300',
                        'slider' => true,
                        'units' => array('px'),
                        'size' => '8',
                        'help' => __('Apply height to complete Flipbox. It is useful when multiple Flipboxes are in same row.', SA_FLBUILDER_TEXTDOMAIN),
                    ),
                    'flip_box_min_height_medium' => array(
                        'type' => 'unit',
                        'label' => __('Medium Device Height', SA_FLBUILDER_TEXTDOMAIN),
                        'slider' => true,
                        'units' => array('px'),
                        'size' => '8',
                        'help' => __('Apply height to complete Flipbox for medium devices. It will inherit desktop height if empty.', SA_FLBUILDER_TEXTDOMAIN),
                    ),
                    'flip_box_min_height_small' => array(
                        'type' => 'unit',
                        'label' => __('Small Device Height', SA_FLBUILDER_TEXTDOMAIN),
                        'slider' => true,
                        'units' => array('px'),
                        'size' => '8',
                        'help' => __('Apply height to complete Flipbox for small devices. It will inherit medium height if empty.', SA_FLBUILDER_TEXTDOMAIN),
                    ),
                    
                    'inner_padding_dimension' => array(
                        'type' => 'dimension',
                        'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                        'help' => __('Manage the outside spacing of content area of flipbox.', SA_FLBUILDER_TEXTDOMAIN),
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
            'front_styles' => array(// Section.
                'title' => __('Front Side Body Style', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                'fields' => array(// Section Fields.
                    'front_background_type' => array(
                        'type' => 'select',
                        'label' => __('Background Type', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'color',
                        'help' => __('If enabled, the Content would align vertically center.', SA_FLBUILDER_TEXTDOMAIN),
                        'options' => array(
                            'color' => __('Color', SA_FLBUILDER_TEXTDOMAIN),
                            'image' => __('Image', SA_FLBUILDER_TEXTDOMAIN),
                        ),
                        'toggle' => array(
                            'color' => array(
                                'fields' => array('front_background_color', 'front_background_color_opc'),
                            ),
                            'image' => array(
                                'fields' => array('front_bg_image', 'front_bg_image_repeat', 'front_bg_image_display', 'front_bg_image_pos'),
                            ),
                        ),
                    ),
                    'front_bg_image' => array(
                        'type' => 'photo',
                        'label' => __('Background Image', SA_FLBUILDER_TEXTDOMAIN),
                        'show_remove' => true,
                    ),
                    'front_bg_image_pos' => array(
                        'type' => 'select',
                        'label' => __('Background Image Position', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'center center',
                        'options' => array(
                            'left top' => __('Left Top', SA_FLBUILDER_TEXTDOMAIN),
                            'left center' => __('Left Center', SA_FLBUILDER_TEXTDOMAIN),
                            'left bottom' => __('Left Bottom', SA_FLBUILDER_TEXTDOMAIN),
                            'center top' => __('Center Top', SA_FLBUILDER_TEXTDOMAIN),
                            'center center' => __('Center Center', SA_FLBUILDER_TEXTDOMAIN),
                            'center bottom' => __('Center Bottom', SA_FLBUILDER_TEXTDOMAIN),
                            'right top' => __('Right Top', SA_FLBUILDER_TEXTDOMAIN),
                            'right center' => __('Right Center', SA_FLBUILDER_TEXTDOMAIN),
                            'right bottom' => __('Right Bottom', SA_FLBUILDER_TEXTDOMAIN),
                        ),
                    ),
                    'front_bg_image_repeat' => array(
                        'type' => 'select',
                        'label' => __('Repeat', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'no',
                        'options' => array(
                            'yes' => 'Yes',
                            'no' => 'No',
                        ),
                    ),
                    'front_bg_image_display' => array(
                        'type' => 'select',
                        'label' => __('Display Sizes', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'cover',
                        'options' => array(
                            'initial' => __('Initial', SA_FLBUILDER_TEXTDOMAIN),
                            'cover' => __('Cover', SA_FLBUILDER_TEXTDOMAIN),
                            'contain' => __('Contain', SA_FLBUILDER_TEXTDOMAIN),
                        ),
                    ),
                    'front_background_color' => array(
                        'type' => 'color',
                        'label' => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
                    ),
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
                    ),
                ),
            ),
            'back_styles' => array(// Section.
                'title' => __('Back Side Body Styles', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                'fields' => array(// Section Fields.
                    'back_background_type' => array(
                        'type' => 'select',
                        'label' => __('Background Type', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'color',
                        'help' => __('If enabled, the Content would align vertically center.', SA_FLBUILDER_TEXTDOMAIN),
                        'options' => array(
                            'color' => __('Color', SA_FLBUILDER_TEXTDOMAIN),
                            'image' => __('Image', SA_FLBUILDER_TEXTDOMAIN),
                        ),
                        'toggle' => array(
                            'color' => array(
                                'fields' => array('back_background_color', 'back_background_color_opc'),
                            ),
                            'image' => array(
                                'fields' => array('back_bg_image', 'back_bg_image_repeat', 'back_bg_image_display', 'back_bg_image_pos'),
                            ),
                        ),
                    ),
                    'back_bg_image' => array(
                        'type' => 'photo',
                        'label' => __('Background Image', SA_FLBUILDER_TEXTDOMAIN),
                        'show_remove' => true,
                    ),
                    'back_bg_image_pos' => array(
                        'type' => 'select',
                        'label' => __('Background Image Position', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'center center',
                        'options' => array(
                            'left top' => __('Left Top', SA_FLBUILDER_TEXTDOMAIN),
                            'left center' => __('Left Center', SA_FLBUILDER_TEXTDOMAIN),
                            'left bottom' => __('Left Bottom', SA_FLBUILDER_TEXTDOMAIN),
                            'center top' => __('Center Top', SA_FLBUILDER_TEXTDOMAIN),
                            'center center' => __('Center Center', SA_FLBUILDER_TEXTDOMAIN),
                            'center bottom' => __('Center Bottom', SA_FLBUILDER_TEXTDOMAIN),
                            'right top' => __('Right Top', SA_FLBUILDER_TEXTDOMAIN),
                            'right center' => __('Right Center', SA_FLBUILDER_TEXTDOMAIN),
                            'right bottom' => __('Right Bottom', SA_FLBUILDER_TEXTDOMAIN),
                        ),
                    ),
                    'back_bg_image_repeat' => array(
                        'type' => 'select',
                        'label' => __('Repeat', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'no',
                        'options' => array(
                            'yes' => 'Yes',
                            'no' => 'No',
                        ),
                    ),
                    'back_bg_image_display' => array(
                        'type' => 'select',
                        'label' => __('Display Sizes', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'cover',
                        'options' => array(
                            'initial' => __('Initial', SA_FLBUILDER_TEXTDOMAIN),
                            'cover' => __('Cover', SA_FLBUILDER_TEXTDOMAIN),
                            'contain' => __('Contain', SA_FLBUILDER_TEXTDOMAIN),
                        ),
                    ),
                    'back_background_color' => array(
                        'type' => 'color',
                        'label' => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
                    ),
                    'back_border' => array(
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
                    ),
                ),
            ),
        ),
    ),
        )
);
