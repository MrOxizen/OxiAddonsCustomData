<?php


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
                        'front_button_border' => array(
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
        'OxiEventWidgetsModule', array(
    'flip_front' => array(// Tab.
        'title' => __('Content', SA_FLBUILDER_TEXTDOMAIN), // Tab title.
        'sections' => array(// Tab Sections.
            'Header_Settings' => array(// Section.
                'title' => __('Header Settings', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                'fields' => array(// Section Fields.
                    'flip_box_min_height' => array(
                        'type' => 'unit',
                        'label' => __('Max Width', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '400',
                        'default' => '400',
                        'slider' => true,
                        'units' => array('px'),
                        'size' => '8',
                        'responsive' => true,
                        'help' => __('Apply height to complete Flipbox. It is useful when multiple Flipboxes are in same row.', SA_FLBUILDER_TEXTDOMAIN),
                    ),
                    'header_image_settings' => array(
                        'type' => 'select',
                        'label' => __('Header Type', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'color',
                        'help' => __('Set a Header Image or Color from Here...!', SA_FLBUILDER_TEXTDOMAIN),
                        'options' => array(
                            'color' => __('Color', SA_FLBUILDER_TEXTDOMAIN),
                            'image' => __('Image', SA_FLBUILDER_TEXTDOMAIN),
                        ),
                        'toggle' => array(
                            'color' => array(
                                'fields' => array('header_background_color'),
                            ),
                            'image' => array(
                                'fields' => array('header_image', 'header_image_pos', 'header_image_repeat', 'header_image_display', 'header_image_overlay'),
                            ),
                        ),
                    ),
                    'header_image' => array(
                        'type' => 'photo',
                        'label' => __('Background Image', SA_FLBUILDER_TEXTDOMAIN),
                        'show_remove' => true,
                    ),
                    'header_background_color' => array(
                        'type' => 'color',
                        'label' => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '00a8a2',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
                    ),
                    'oxi_date' => array(
                        'type' => 'text',
                        'label' => __('Date Text', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => __("20", SA_FLBUILDER_TEXTDOMAIN),
                        'help' => __('Set Event Date from here...', SA_FLBUILDER_TEXTDOMAIN),
                        'connections' => array('string', 'html'),
                    ),
                    'oxi_month' => array(
                        'type' => 'text',
                        'label' => __('Month Text', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => __("MAR", SA_FLBUILDER_TEXTDOMAIN),
                        'help' => __('Set Event Month from here...', SA_FLBUILDER_TEXTDOMAIN),
                        'connections' => array('string', 'html'),
                    ),
                ),
            ),
            'Content_Settings' => array(// Section.
                'title' => __('Content Settings', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                'fields' => array(// Section Fields.
                    'oxi_flip_back_title' => array(
                        'type' => 'text',
                        'label' => __('Title on Front', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => __("Event Widgets", SA_FLBUILDER_TEXTDOMAIN),
                        'help' => __('Perhaps, this is the most highlighted text.', SA_FLBUILDER_TEXTDOMAIN),
                        'connections' => array('string', 'html'),
                    ),
                    'link' => array(
                        'type' => 'link',
                        'label' => __('Link', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => 'http://www.facebook.com',
                        'default' => '',
                        'show_target' => true,
                        'show_nofollow' => true,
                        'preview' => array(
                            'type' => 'none'
                        ),
                        'connection' => array('url')
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
            'button' => array(// Section.
                'title' => __('Button', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                'fields' => array(// Section Fields.
                    'show_button' => array(
                        'type' => 'select',
                        'label' => __('Show button', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'yes',
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
                'title' => __('Body Styles', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                'fields' => array(// Section Fields.
                    'inner_padding' => array(
                        'type' => 'dimension',
                        'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                        'help' => __('Manage the outside spacing of content area of event.', SA_FLBUILDER_TEXTDOMAIN),
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
            'header_style' => array(// Section.
                'title' => __('Header Image Styles', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                'fields' => array(// Section Fields.
                    'header_image_height' => array(
                        'type' => 'unit',
                        'label' => __('Header Height', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '40',
                        'default' => '40',
                        'slider' => true,
                        'units' => array('%'),
                        'size' => '8',
                        'help' => __('Set Header Image Height...', SA_FLBUILDER_TEXTDOMAIN),
                    ),
                    'header_image_pos' => array(
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
                    'header_image_repeat' => array(
                        'type' => 'select',
                        'label' => __('Repeat', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'no',
                        'options' => array(
                            'yes' => 'Yes',
                            'no' => 'No',
                        ),
                    ),
                    'header_image_display' => array(
                        'type' => 'select',
                        'label' => __('Display Sizes', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'cover',
                        'options' => array(
                            'initial' => __('Initial', SA_FLBUILDER_TEXTDOMAIN),
                            'cover' => __('Cover', SA_FLBUILDER_TEXTDOMAIN),
                            'contain' => __('Contain', SA_FLBUILDER_TEXTDOMAIN),
                        ),
                    ),
                    'header_image_overlay' => array(
                            'type' => 'color',
                            'label' => __('Overlay Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => '',
                            'show_reset' => true,
                            'connections' => array('color'),
                            'show_alpha' => true,
                        ),
                ),
            ),
            'header_content_style' => array(// Section.
                'title' => __('Header Text Body Styles', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                'fields' => array(// Section Fields.
                    'd_M_position_left' => array(
                        'type' => 'unit',
                        'label' => __('Position Left to Right', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '40',
                        'default' => '69',
                        'slider' => true,
                        'units' => array('%'),
                        'size' => '8',
                        'help' => __('Set a Value to Change Date and Month Position Left to Right or Right to Left', SA_FLBUILDER_TEXTDOMAIN),
                    ),
                    'd_M_position_bottom' => array(
                        'type' => 'unit',
                        'label' => __('Position Top to Bottom', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '40',
                        'default' => '69',
                        'slider' => true,
                        'units' => array('%'),
                        'size' => '8',
                        'help' => __('Set a Value to Change Date and Month Position Top to Bottom or Bottom to Top', SA_FLBUILDER_TEXTDOMAIN),
                    ),
                    'date_month_background_color' => array(
                        'type' => 'color',
                        'label' => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
                    ),
                    'date_month_width' => array(
                        'type' => 'unit',
                        'label' => __('Date & Month Width', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '40',
                        'default' => '80',
                        'slider' => true,
                        'units' => array('px'),
                        'size' => '8',
                        'help' => __('Set Date & Month Width...', SA_FLBUILDER_TEXTDOMAIN),
                    ),
                    'date_month_height' => array(
                        'type' => 'unit',
                        'label' => __('Date & Month Height', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '40',
                        'default' => '80',
                        'slider' => true,
                        'units' => array('px'),
                        'size' => '8',
                        'help' => __('Set Date & Month Height...', SA_FLBUILDER_TEXTDOMAIN),
                    ),
                    'date_month_border_package' => array(
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
                'title' => __('Event Content Area', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
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
                                'fields' => array('back_bg_image', 'back_bg_image_repeat', 'back_bg_image_display', 'back_bg_image_pos', 'back_bg_image_overlay'),
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
                    'back_bg_image_overlay' => array(
                            'type' => 'color',
                            'label' => __('Overlay Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => '',
                            'show_reset' => true,
                            'connections' => array('color'),
                            'show_alpha' => true,
                        ),
                    'back_background_color' => array(
                        'type' => 'color',
                        'label' => __('Background Color', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
                    ),
                    'event_content_padding' => array(
                        'type' => 'dimension',
                        'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                        'help' => __('Manage the outside spacing of content area of event.', SA_FLBUILDER_TEXTDOMAIN),
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
                    
                ),
            ),
        ),
    ),
    'typography' => array(// Tab.
        'title' => __('Typography', SA_FLBUILDER_TEXTDOMAIN), // Tab title.
        'sections' => array(// Tab Sections.
            'back_title_typography' => array(
                'title' => __('Event Title', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'back_side_typography_title_tag' => array(
                        'type' => 'select',
                        'label' => __('Title Tag', SA_FLBUILDER_TEXTDOMAIN),
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
                    'back_title_font_typo' => array(
                        'type' => 'typography',
                        'label' => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                        'responsive' => true,
                        'preview' => array(
                            'type' => 'css',
                            'selector' => '.uabb-back-text-title',
                            'important' => true,
                        ),
                    ),
                    'back_title_typography_color' => array(
                        'type' => 'color',
                        'label' => __('Back Title Color', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '444',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
                    ),
                    'back_title_typography_margin_top' => array(
                        'type' => 'unit',
                        'label' => __('Margin Top', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '25',
                        'default' => '5',
                        'slider' => true,
                        'units' => array('px'),
                        'size' => '8',
                    ),
                    'back_title_typography_margin_bottom' => array(
                        'type' => 'unit',
                        'label' => __('Margin Bottom', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '12',
                        'default' => '5',
                        'slider' => true,
                        'units' => array('px'),
                        'size' => '8',
                    ),
                ),
            ),
            'back_desc_typography' => array(
                'title' => __('Event Description', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'back_desc_font_typo' => array(
                        'type' => 'typography',
                        'label' => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                        'responsive' => true,
                        'preview' => array(
                            'type' => 'css',
                            'selector' => '.uabb-back-flip-box-section-content',
                            'important' => true,
                        ),
                    ),
                    'back_desc_typography_color' => array(
                        'type' => 'color',
                        'label' => __('Back Description Color', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
                    ),
                    'back_desc_typography_margin_top' => array(
                        'type' => 'unit',
                        'label' => __('Margin Top', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '0',
                        'slider' => true,
                        'units' => array('px'),
                        'size' => '8',
                    ),
                    'back_desc_typography_margin_bottom' => array(
                        'type' => 'unit',
                        'label' => __('Margin Bottom', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '0',
                        'slider' => true,
                        'units' => array('px'),
                        'size' => '8',
                    ),
                ),
            ),
            'header_date_typography' => array(
                'title' => __('Date TypoGraphy', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'header_date_typo' => array(
                        'type' => 'typography',
                        'label' => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                        'responsive' => true,
                        'preview' => array(
                            'type' => 'css',
                            'selector' => '.oxi-addons-BB-header-DM h2',
                            'important' => true,
                        ),
                    ),
                    'header_date_typography_color' => array(
                        'type' => 'color',
                        'label' => __('Date Color', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
                    ),
                    'header_date_typography_margin_top' => array(
                        'type' => 'unit',
                        'label' => __('Margin Top', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '0',
                        'slider' => true,
                        'units' => array('px'),
                        'size' => '8',
                    ),
                    'header_date_typography_margin_bottom' => array(
                        'type' => 'unit',
                        'label' => __('Margin Bottom', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '0',
                        'slider' => true,
                        'units' => array('px'),
                        'size' => '8',
                    ),
                ),
            ),
            'header_month_typography' => array(
                'title' => __('Month TypoGraphy', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'header_month_typo' => array(
                        'type' => 'typography',
                        'label' => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => array(
                            'font-size' => '20'
                        ),
                        'responsive' => true,
                        'preview' => array(
                            'type' => 'css',
                            'selector' => '.oxi-addons-BB-header-DM p',
                            'important' => true,
                        ),
                    ),
                    'header_month_typography_color' => array(
                        'type' => 'color',
                        'label' => __('Month Color', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
                    ),
                    'header_month_typography_margin_top' => array(
                        'type' => 'unit',
                        'label' => __('Margin Top', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '0',
                        'slider' => true,
                        'units' => array('px'),
                        'size' => '8',
                    ),
                    'header_month_typography_margin_bottom' => array(
                        'type' => 'unit',
                        'label' => __('Margin Bottom', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '0',
                        'slider' => true,
                        'units' => array('px'),
                        'size' => '8',
                    ),
                ),
            ),
            'margin_options' => array(// Section.
                'title' => __('Margin', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                'fields' => array(// Section Fields.
                    
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
                ),
            ),
        ),
    ),
        )
);
