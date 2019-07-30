<?php

FLBuilder::register_settings_form(
        'Oxi_call_box_icon_form_field', array(
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
                        'Call_to_action_text_align_option' => array(
                            'type' => 'select',
                            'label' => __('Text Align', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'oxi_text_center',
                            'options' => array(
                                'oxi_text_left' => __('Left', SA_FLBUILDER_TEXTDOMAIN),
                                'oxi_text_right' => __('Right', SA_FLBUILDER_TEXTDOMAIN),
                                'oxi_text_center' => __('Center', SA_FLBUILDER_TEXTDOMAIN),
                            ),
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
                    ),
                ),
            ),
        ),
    ),
        )
);

FLBuilder::register_settings_form(
        'sa_fl_button_form_field', array(
    'title' => __('Button', SA_FLBUILDER_TEXTDOMAIN),
    'tabs' => array(
        'General' => array(
            'title' => __('Content', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array(
                'general' => array(
                    'title' => '',
                    'fields' => array(
                        'text' => array(
                            'type' => 'text',
                            'label' => __('Button Text', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => __('Click Here', SA_FLBUILDER_TEXTDOMAIN),
                            'preview' => array(
                                'type' => 'text',
                                'selector' => '.oxi__button'
                            ),
                            'connections' => array('string', 'html')
                        ),
                        'secondary_text' => array(
                            'type' => 'text',
                            'label' => __('Secondary Text', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => __('Go!', SA_FLBUILDER_TEXTDOMAIN),
                            'preview' => array(
                                'type' => 'text',
                                'selector' => '.oxi__button'
                            ),
                            'connections' => array('string', 'html')
                        ),
                        'button_icon' => array(
                            'type' => 'icon',
                            'label' => __('Icon', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => __('', SA_FLBUILDER_TEXTDOMAIN),
                            'placeholder' => 'fa fa-twitter',
                            'help' => __('Insert Font Awesome Icon Class Name', SA_FLBUILDER_TEXTDOMAIN),
                            'connections' => array('string', 'html'),
                            'show_remove' => true,
                        ),
                        'icon_position' => array(
                            'type' => 'select',
                            'label' => __('Icon Position', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'left',
                            'options' => array(
                                'left' => __('Left Side', SA_FLBUILDER_TEXTDOMAIN),
                                'right' => __('Right Side', SA_FLBUILDER_TEXTDOMAIN)
                            ),
                        ),
                        'icon_spacing' => array(
                            'type' => 'unit',
                            'label' => 'Icon Spacing',
                            'description' => 'px',
                            'default' => '5'
                        ),
                    )
                ),
                'link' => array(
                    'title' => __('Link', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'link' => array(
                            'type' => 'link',
                            'label' => __('Link', SA_FLBUILDER_TEXTDOMAIN),
                            'placeholder' => 'http://www.facebook.com',
                            'default' => '#',
                            'show_target' => true,
                            'show_nofollow' => true,
                            'preview' => array(
                                'type' => 'none'
                            ),
                            'connection' => array('url')
                        )
                    )
                ),
            )
        ),
        'style' => array(//tab
            'title' => __('Styles', SA_FLBUILDER_TEXTDOMAIN), // Tab title.
            'sections' => array(
                'styling' => array(
                    'title' => __('Button Style', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'styling' => array(
                            'type' => 'select',
                            'label' => __('Button Effects', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'default',
                            'options' => array(
                                'default' => __('Default', SA_FLBUILDER_TEXTDOMAIN),
                                'shutter' => __('Shutter', SA_FLBUILDER_TEXTDOMAIN),
                                'rayen' => __('Rayen', SA_FLBUILDER_TEXTDOMAIN),
                                'winona' => __('Winona', SA_FLBUILDER_TEXTDOMAIN),
                                'tamaya' => __('Tamaya', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle' => array(
                                'shutter' => array(
                                    'fields' => array('shutter_effects'),
                                ),
                                'rayen' => array(
                                    'fields' => array('rayen_effects'),
                                ),
                                'winona' => array(
                                    'fields' => array('winona_effects', 'secondary_text'),
                                ),
                                'tamaya' => array(
                                    'fields' => array('secondary_text'),
                                ),
                            ),
                        ),
                        'shutter_effects' => array(
                            'type' => 'select',
                            'label' => __('Shutter', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'left_to_right',
                            'options' => array(
                                'shutter_in_hori' => __('Shutter in Horizontal', SA_FLBUILDER_TEXTDOMAIN),
                                'shutter_in_var' => __('Shutter in Vertical', SA_FLBUILDER_TEXTDOMAIN),
                                'shutter_out_hori' => __('Shutter out Horizontal', SA_FLBUILDER_TEXTDOMAIN),
                                'shutter_out_var' => __('Shutter out Vertical', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                        ),
                        'rayen_effects' => array(
                            'type' => 'select',
                            'label' => __('Shutter', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'default',
                            'options' => array(
                                'left_to_right' => __('Left To Right', SA_FLBUILDER_TEXTDOMAIN),
                                'right_to_left' => __('Right To Left', SA_FLBUILDER_TEXTDOMAIN),
                                'top_to_bottom' => __('Top To Bottom', SA_FLBUILDER_TEXTDOMAIN),
                                'bottom_to_top' => __('Bottom To Top', SA_FLBUILDER_TEXTDOMAIN)
                            ),
                        ),
                        'winona_effects' => array(
                            'type' => 'select',
                            'label' => __('Shutter', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'default',
                            'options' => array(
                                'left_to_right' => __('Left To Right', SA_FLBUILDER_TEXTDOMAIN),
                                'right_to_left' => __('Right To Left', SA_FLBUILDER_TEXTDOMAIN),
                                'top_to_bottom' => __('Top To Bottom', SA_FLBUILDER_TEXTDOMAIN),
                                'bottom_to_top' => __('Bottom To Top', SA_FLBUILDER_TEXTDOMAIN)
                            ),
                        ),
                    ),
                ),
                'Color' => array(
                    'title' => __('Color', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'text_color' => array(
                            'type' => 'color',
                            'label' => __('Text Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => '',
                            'show_reset' => true,
                            'connections' => array('color'),
                            'show_alpha' => true,
                        ),
                        'button_background_type' => array(
                            'type' => 'select',
                            'label' => __('Background Type', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'color',
                            'help' => __('Button Gradient Only Work For Button Default Effect', SA_FLBUILDER_TEXTDOMAIN),
                            'options' => array(
                                'color' => __('Color', SA_FLBUILDER_TEXTDOMAIN),
                                'gradient' => __('Gradient', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle' => array(
                                'color' => array(
                                    'fields' => array('button_background_color', 'button_background_color_opc'),
                                ),
                                'gradient' => array(
                                    'fields' => array('button_gradient'),
                                ),
                            ),
                        ),
                        'button_background_color' => array(
                            'type' => 'color',
                            'label' => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => '',
                            'show_reset' => true,
                            'connections' => array('color'),
                            'show_alpha' => true,
                        ),
                        'button_gradient' => array(
                            'type' => 'gradient',
                            'label' => 'Gradient',
                            'connections' => array('gradient'),
                            'preview' => array(
                                'type' => 'css',
                                'property' => 'background-image',
                            ),
                        ),
                    ),
                ),
                'border' => array(
                    'title' => __('Border', SA_FLBUILDER_TEXTDOMAIN),
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
                                'selector' => '.oxi__button',
                                'important' => true,
                            ),
                        ),
                    ),
                ),
                'button_hover_setting' => array(
                    'title' => __('Hover Setting', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'button_hover_background_type' => array(
                            'type' => 'select',
                            'label' => __('Background Type', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'color',
                            'help' => __('Button Hover Background Color and Gradient', SA_FLBUILDER_TEXTDOMAIN),
                            'options' => array(
                                'color' => __('Color', SA_FLBUILDER_TEXTDOMAIN),
                                'gradient' => __('Gradient', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle' => array(
                                'color' => array(
                                    'fields' => array('button_hover_background_color', 'button_background_color_opc'),
                                ),
                                'gradient' => array(
                                    'fields' => array('button_hover_gradient'),
                                ),
                            ),
                        ),
                        'button_hover_background_color' => array(
                            'type' => 'color',
                            'label' => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => '',
                            'show_reset' => true,
                            'connections' => array('color'),
                            'show_alpha' => true,
                        ),
                        'button_hover_gradient' => array(
                            'type' => 'gradient',
                            'label' => 'Gradient',
                            'connections' => array('gradient'),
                            'preview' => array(
                                'type' => 'css',
                                'property' => 'background-image',
                            ),
                        ),
                        'hover_text_color' => array(
                            'type' => 'color',
                            'label' => __('Hover Text Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => '',
                            'show_reset' => true,
                            'connections' => array('color'),
                            'show_alpha' => true,
                        ),
                        'hover_border_color' => array(
                            'type' => 'color',
                            'label' => __('Hover Border Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => '',
                            'show_reset' => true,
                            'connections' => array('color'),
                            'show_alpha' => true,
                        ),
                        'hover_box_shadow' => array(
                            'type' => 'shadow',
                            'label' => 'Hover Box Shadow',
                            'show_spread' => true,
                            'preview' => array(
                                'type' => 'css',
                                'selector' => '.oxi-addons-hover-box-shadow',
                                'property' => 'box-shadow',
                            ),
                        ),
                    ),
                ),
                'formatting' => array(
                    'title' => __('Structure', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'button_width' => array(
                            'type' => 'select',
                            'label' => __('Width', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'auto',
                            'options' => array(
                                'auto' => _x('Auto', 'Width.', SA_FLBUILDER_TEXTDOMAIN),
                                'full' => __('Full Width', SA_FLBUILDER_TEXTDOMAIN),
                                'custom' => __('Custom', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle' => array(
                                'auto' => array(
                                    'fields' => array('button_padding'),
                                ),
                                'full' => array(
                                    'fields' => array('button_padding'),
                                ),
                                'custom' => array(
                                    'fields' => array('custom_width', 'custom_height'),
                                ),
                            ),
                        ),
                        'custom_width' => array(
                            'type' => 'text',
                            'label' => __('Custom Width', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => '200',
                            'maxlength' => '3',
                            'size' => '4',
                            'description' => 'px',
                        ),
                        'custom_height' => array(
                            'type' => 'text',
                            'label' => __('Custom Height', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => '45',
                            'maxlength' => '3',
                            'size' => '4',
                            'description' => 'px',
                        ),
                        'alignment' => array(
                            'type' => 'align',
                            'label' => 'Alignment',
                            'default' => 'center',
                            'responsive' => true,
                            'preview' => array(
                                'type' => 'css',
                                'property' => 'justify-content',
                                'selector' => '.oxi__button_wrapper'
                            ),
                        ),
                        'button_padding' => array(
                            'type' => 'dimension',
                            'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                            'help' => __('Manage the inside Button padding', SA_FLBUILDER_TEXTDOMAIN),
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
        'typography' => array(// Tab.
            'title' => __('Typography', SA_FLBUILDER_TEXTDOMAIN), // Tab title.
            'sections' => array(// Tab Sections. 
                'button_typography' => array(
                    'title' => __('Front Title', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'button_font_typo' => array(
                            'type' => 'typography',
                            'label' => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                            'responsive' => true,
                            'preview' => array(
                                'type' => 'css',
                                'selector' => '.oxi__button',
                                'important' => true,
                            ),
                        ),
                    ),
                ),
            ),
        ),
    )
        )
);
FLBuilder::register_module(
        'SA_Call_to_Action', array(
    'call_front' => array(// Tab.
        'title' => __('Content', SA_FLBUILDER_TEXTDOMAIN), // Tab title.
        'sections' => array(// Tab Sections.
            'title' => array(// Section.
                'title' => __('Front Settings', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                'fields' => array(// Section Fields.

                    'oxi_call_front_title' => array(
                        'type' => 'text',
                        'label' => __('Title on Front', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => __("Call To Action!", SA_FLBUILDER_TEXTDOMAIN),
                        'help' => __('Perhaps, this is the most highlighted text.', SA_FLBUILDER_TEXTDOMAIN),
                        'connections' => array('string', 'html'),
                    ),
                    'oxi_call_front_details' => array(
                        'type' => 'editor',
                        'media_buttons' => false,
                        'rows' => 10,
                        'label' => 'Details',
                        'default' => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', SA_FLBUILDER_TEXTDOMAIN),
                        'connections' => array('string', 'html'),
                    ),
                ),
            ),
            'button' => array(// Section.
                'title' => __('Button', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                'fields' => array(// Section Fields.
                    'show_button' => array(
                        'type' => 'select',
                        'label' => __('Show button', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'no',
                        'options' => array(
                            'no' => __('No', SA_FLBUILDER_TEXTDOMAIN),
                            'yes' => __('Yes', SA_FLBUILDER_TEXTDOMAIN),
                        ),
                        'toggle' => array(
                            'no' => array(
                                'fields' => array(),
                            ),
                            'yes' => array(
                                'fields' => array('button', 'button_margin_top', 'button_margin_bottom'),
                            ),
                        ),
                    ),
                    'button' => array(
                        'type' => 'form',
                        'label' => __('Button Settings', SA_FLBUILDER_TEXTDOMAIN),
                        'form' => 'sa_fl_button_form_field', // ID of a registered form.
                        'preview_text' => 'text', // ID of a field to use for the preview text.
                    ),
                ),
            ),
        ),
    ),
    'oxi_style' => array(// Tab.
        'title' => __('Style', SA_FLBUILDER_TEXTDOMAIN), // Tab title.
        'sections' => array(// Tab Sections.
            'general' => array(// Section.
                'title' => __('Content Styles', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                'fields' => array(// Section Fields.
                    'content_style' => array(
                        'type' => 'select',
                        'label' => __('Flip Type', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'horizontal_call_left',
                        'help' => __('Select Flip type for this call box.', SA_FLBUILDER_TEXTDOMAIN),
                        'options' => array(
                            'basic' => __('Basic', SA_FLBUILDER_TEXTDOMAIN),
                            'flex_grid' => __('Flex Grid', SA_FLBUILDER_TEXTDOMAIN),
                            'flex_grid_icon' => __('Flex Grid Icon', SA_FLBUILDER_TEXTDOMAIN),
                        ),
                        'toggle' => array(
                            'basic' => array(
                                'fields' => array('oxi_call_to_action_icons'),
                            ),
                            'flex_grid_icon' => array(
                                'fields' => array('oxi_call_to_action_icons'),
                            ),
                        ),
                    ),
                    'oxi_call_to_action_icons' => array(
                        'type' => 'form',
                        'label' => __('Icon Settings', SA_FLBUILDER_TEXTDOMAIN),
                        'form' => 'Oxi_call_box_icon_form_field', // ID of a registered form.
                        'preview_text' => 'icon', // ID of a field to use for the preview text.
                    ),
                    'inner_padding_dimension' => array(
                        'type' => 'dimension',
                        'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                        'help' => __('Manage the outside spacing of content area of callbox.', SA_FLBUILDER_TEXTDOMAIN),
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
                'title' => __('Background Body Style', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
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
        ),
    ),
    'typography' => array(// Tab.
        'title' => __('Typography', SA_FLBUILDER_TEXTDOMAIN), // Tab title.
        'sections' => array(// Tab Sections.
            'front_title_typography' => array(
                'title' => __('Title', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'front_side_typography_title_tag' => array(
                        'type' => 'select',
                        'label' => __('Title Tag', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'h2',
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
                    'front_title_font_typo' => array(
                        'type' => 'typography',
                        'label' => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                        'responsive' => true,
                        'preview' => array(
                            'type' => 'css',
                            'selector' => '.uabb-face-text-title',
                            'important' => true,
                        ),
                    ),
                    'front_title_typography_color' => array(
                        'type' => 'color',
                        'label' => __('Title Color', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
                    ),
                    'front_title_typography_margin_top' => array(
                        'type' => 'unit',
                        'label' => __('Margin Top', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '0',
                        'slider' => true,
                        'units' => array('px'),
                        'size' => '8',
                    ),
                    'front_title_typography_margin_bottom' => array(
                        'type' => 'unit',
                        'label' => __('Margin Bottom', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '12',
                        'slider' => true,
                        'units' => array('px'),
                        'size' => '8',
                    ),
                ),
            ),
            'front_desc_typography' => array(
                'title' => __('Description', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'front_desk_font_typo' => array(
                        'type' => 'typography',
                        'label' => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                        'responsive' => true,
                        'preview' => array(
                            'type' => 'css',
                            'selector' => '.uabb-call-box-section-content',
                            'important' => true,
                        ),
                    ),
                    'front_desc_typography_color' => array(
                        'type' => 'color',
                        'label' => __('Description Color', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
                    ),
                    'front_desc_typography_margin_top' => array(
                        'type' => 'unit',
                        'label' => __('Margin Top', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '0',
                        'slider' => true,
                        'units' => array('px'),
                        'size' => '8',
                    ),
                    'front_desc_typography_margin_bottom' => array(
                        'type' => 'unit',
                        'label' => __('Margin Bottom', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '25',
                        'slider' => true,
                        'units' => array('px'),
                        'size' => '8',
                    ),
                ),
            ),
            'margin_options' => array(// Section.
                'title' => __('Margin', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                'fields' => array(// Section Fields.
                    'icon_margin_top' => array(
                        'type' => 'unit',
                        'label' => __('Icon Margin Top', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '25',
                        'slider' => true,
                        'units' => array('px'),
                        'size' => '8',
                    ),
                    'icon_margin_bottom' => array(
                        'type' => 'unit',
                        'label' => __('Icon Margin Bottom', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '15',
                        'slider' => true,
                        'units' => array('px'),
                        'size' => '8',
                    ),
                    'icon_margin_right' => array(
                        'type' => 'unit',
                        'label' => __('Icon Margin Right', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '15',
                        'slider' => true,
                        'units' => array('px'),
                        'size' => '8',
                    ),
                    'icon_margin_left' => array(
                        'type' => 'unit',
                        'label' => __('Icon Margin Left', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '15',
                        'slider' => true,
                        'units' => array('px'),
                        'size' => '8',
                    ),
                    'button_margin_top' => array(
                        'type' => 'unit',
                        'label' => __('Button Margin Top', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '15',
                        'slider' => true,
                        'units' => array('px'),
                        'size' => '8',
                    ),
                    'button_margin_bottom' => array(
                        'type' => 'unit',
                        'label' => __('Button Margin Bottom', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '0',
                        'slider' => true,
                        'units' => array('px'),
                        'size' => '8',
                    ),
                    'button_margin_right' => array(
                        'type' => 'unit',
                        'label' => __('Button Margin Right', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '0',
                        'slider' => true,
                        'units' => array('px'),
                        'size' => '8',
                    ),
                    'button_margin_left' => array(
                        'type' => 'unit',
                        'label' => __('Button Margin Left', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '0',
                        'slider' => true,
                        'units' => array('px'),
                        'size' => '8',
                    ),
                ),
            ),
        ),
    ),
        )
);
