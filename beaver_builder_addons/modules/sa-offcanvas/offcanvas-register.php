<?php

/**
 *   footer module
 * @package Shortcode addons 
 */
FLBuilder::register_module(
        'SA_OffCanvas', array(
    'general' => array(
        'title' => __('Content', SA_FLBUILDER_TEXTDOMAIN),
        'sections' => array(
            'content' => array(
                'title' => '',
                'fields' => array(
                    'add_offcanvas_item' => array(
                        'type' => 'form',
                        'label' => __('Content Item', SA_FLBUILDER_TEXTDOMAIN),
                        'form' => 'oxi_sa_offcanvas_item_form',
                        'preview_text' => 'footer_info_title',
                        'multiple' => true,
                    ),
                ),
            ),
            'offcanvas_toggle_button' => array(// Section.
                'title' => 'Toggle Button', // Section Title.
                'fields' => array(// Section Fields.
                    'button' => array(
                        'type' => 'form',
                        'label' => __('Button Settings', SA_FLBUILDER_TEXTDOMAIN),
                        'form' => 'sa_fl_offcanvas_form_field', // ID of a registered form.
                        'preview_text' => 'text', // ID of a field to use for the preview text.
                    ),
                    
                ),
            ),
            'offcanvas_settings' => array(// Section.
                'title' => 'Settings', // Section Title.
                'fields' => array(// Section Fields.
                    'direction_style' => array(
                        'type' => 'select',
                        'label' => __('Direction', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'left',
                        'options' => array(
                            'left' => __('Left', SA_FLBUILDER_TEXTDOMAIN),
                            'right' => __('Right', SA_FLBUILDER_TEXTDOMAIN),
                            'top' => __('Top', SA_FLBUILDER_TEXTDOMAIN),
                            'bottom' => __('Bottom', SA_FLBUILDER_TEXTDOMAIN),
                        ),
                    ),
                    'close_button' => array(
                        'type' => 'select',
                        'label' => __('Show Close Button', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'enable',
                        'options' => array(
                            'enable' => __('Enable', SA_FLBUILDER_TEXTDOMAIN),
                            'disable' => __('Disable', SA_FLBUILDER_TEXTDOMAIN),

                        ),
                    ),
                    'click_any_where' => array(
                        'type' => 'select',
                        'label' => __('Click anywhere to Close', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'enable',
                        'options' => array(
                            'enable' => __('Enable', SA_FLBUILDER_TEXTDOMAIN),
                            'disable' => __('Disable', SA_FLBUILDER_TEXTDOMAIN),

                        ),
                    ),
                    
                ),
            ),
        ),
    ),
    'style' => array(
        'title' => __('Separator', SA_FLBUILDER_TEXTDOMAIN),
        'sections' => array(
            'separator' => array(
                'title' => __('Separator', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'separator_style' => array(
                        'type' => 'select',
                        'label' => __('Separator Style', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'line',
                        'options' => array(
                            'none' => __('None', SA_FLBUILDER_TEXTDOMAIN),
                            'line' => __('Line', SA_FLBUILDER_TEXTDOMAIN),
                            'line_icon' => __('Line With Icon', SA_FLBUILDER_TEXTDOMAIN),
                            'line_image' => __('Line With Image', SA_FLBUILDER_TEXTDOMAIN),
                            'line_text' => __('Line With Text', SA_FLBUILDER_TEXTDOMAIN),
                        ),
                        'toggle' => array(
                            'line' => array(
                                'sections' => array('separator_line'),
                                'fields' => array('separator_position'),
                            ),
                            'line_icon' => array(
                                'sections' => array('separator_line', 'separator_icon_basic'),
                                'fields' => array('separator_position'),
                            ),
                            'line_image' => array(
                                'sections' => array('separator_line', 'separator_img_basic'),
                                'fields' => array('separator_position'),
                            ),
                            'line_text' => array(
                                'sections' => array('separator_line', 'separator_text', 'separator_text_typography'),
                                'fields' => array('separator_position'),
                            ),
                        ),
                    ),
                    'separator_position' => array(
                        'type' => 'select',
                        'label' => __('Separator Position', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'center',
                        'options' => array(
                            'center' => __('Between Heading & Description', SA_FLBUILDER_TEXTDOMAIN),
                            'top' => __('Top', SA_FLBUILDER_TEXTDOMAIN),
                            'bottom' => __('Bottom', SA_FLBUILDER_TEXTDOMAIN),
                        ),
                    ),
                ),
            ),
            'separator_icon_basic' => array(
                'title' => __('Icon Basics', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'icon' => array(
                        'type' => 'icon',
                        'label' => __('Icon', SA_FLBUILDER_TEXTDOMAIN),
                        'show_remove' => true,
                    ),
                    'icon_size' => array(
                        'type' => 'unit',
                        'label' => __('Size', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '22',
                        'maxlength' => '5',
                        'size' => '6',
                        'units' => array('px'),
                        'slider' => true,
                        'preview' => array(
                            'type' => 'css',
                            'selector' => '.oxi__addons_image_icon_divider .oxi__icon',
                            'property' => 'font-size',
                            'unit' => 'px',
                        ),
                    ),
                    'separator_icon_color' => array(
                        'type' => 'color',
                        'label' => __('Icon Color', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
                        'preview' => array(
                            'type' => 'css',
                            'selector' => '.oxi__addons_image_icon_divider .oxi__icon',
                            'property' => 'color',
                        ),
                    ),
                    'padding_left' => array(
                        'type' => 'unit',
                        'label' => __('Padding Left', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '5',
                        'maxlength' => '5',
                        'size' => '6',
                        'units' => array('px'),
                        'slider' => true,
                        'preview' => array(
                            'type' => 'css',
                            'selector' => '.oxi__addons_image_icon_divider',
                            'property' => 'padding-left',
                            'unit' => 'px',
                        ),
                    ),
                    'padding_right' => array(
                        'type' => 'unit',
                        'label' => __('Padding Right', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '5',
                        'maxlength' => '5',
                        'size' => '6',
                        'units' => array('px'),
                        'slider' => true,
                        'preview' => array(
                            'type' => 'css',
                            'selector' => '.oxi__addons_image_icon_divider',
                            'property' => 'padding-right',
                            'unit' => 'px',
                        ),
                    ),
                ),
            ),
            'separator_img_basic' => array(
                'title' => __('Image Basics', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'photo_source' => array(
                        'type' => 'select',
                        'label' => __('Photo Source', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'library',
                        'options' => array(
                            'library' => __('Media Library', SA_FLBUILDER_TEXTDOMAIN),
                            'url' => __('URL', SA_FLBUILDER_TEXTDOMAIN),
                        ),
                        'toggle' => array(
                            'library' => array(
                                'fields' => array('photo'),
                            ),
                            'url' => array(
                                'fields' => array('photo_url'),
                            ),
                        ),
                    ),
                    'photo' => array(
                        'type' => 'photo',
                        'label' => __('Photo', SA_FLBUILDER_TEXTDOMAIN),
                        'show_remove' => true,
                        'connections' => array('photo'),
                    ),
                    'photo_url' => array(
                        'type' => 'text',
                        'label' => __('Photo URL', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => 'http://www.example.com/my-photo.jpg',
                    ),
                    'img_size' => array(
                        'type' => 'unit',
                        'label' => __('Size', SA_FLBUILDER_TEXTDOMAIN),
                        'maxlength' => '5',
                        'size' => '6',
                        'units' => array('px'),
                        'slider' => true,
                        'placeholder' => '50',
                    ),
                    'responsive_img_size' => array(
                        'type' => 'unit',
                        'label' => __('Responsive Size', SA_FLBUILDER_TEXTDOMAIN),
                        'maxlength' => '5',
                        'size' => '6',
                        'units' => array('px'),
                        'slider' => true,
                        'help' => __('Image size below medium devices. Leave it blank if you want to keep same size', SA_FLBUILDER_TEXTDOMAIN),
                        'preview' => array(
                            'type' => 'none',
                        ),
                    ),
                ),
            ),
            'separator_text' => array(
                'title' => __('Text', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'text_inline' => array(
                        'type' => 'text',
                        'label' => __('Text', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'Ultimate',
                        'preview' => array(
                            'type' => 'text',
                            'selector' => '.oxi__line_text',
                        ),
                    ),
                    'responsive_compatibility' => array(
                        'type' => 'select',
                        'label' => __('Responsive Compatibility', SA_FLBUILDER_TEXTDOMAIN),
                        'help' => __('There might be responsive issues for long texts. If you are facing such issues then select appropriate devices width to make your module responsive.', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '',
                        'options' => array(
                            'none' => __('None', SA_FLBUILDER_TEXTDOMAIN),
                            'mobile_device' => __('Small Devices', SA_FLBUILDER_TEXTDOMAIN),
                            'medium_device' => __('Medium & Small Devices', SA_FLBUILDER_TEXTDOMAIN),
                        ),
                    ),
                ),
            ),
            'separator_line' => array(
                'title' => __('Line Style', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'separator_line_style' => array(
                        'type' => 'select',
                        'label' => __('Style', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'solid',
                        'options' => array(
                            'solid' => __('Solid', SA_FLBUILDER_TEXTDOMAIN),
                            'dashed' => __('Dashed', SA_FLBUILDER_TEXTDOMAIN),
                            'dotted' => __('Dotted', SA_FLBUILDER_TEXTDOMAIN),
                            'double' => __('Double', SA_FLBUILDER_TEXTDOMAIN),
                        ),
                        'help' => __('The type of border to use. Double borders must have a height of at least 2px to render properly.', SA_FLBUILDER_TEXTDOMAIN),
                        'preview' => array(
                            'type' => 'css',
                            'selector' => '.oxi__addons_seperator_span',
                            'property' => 'border-top-style',
                        ),
                    ),
                    'alignment' => array(
                        'type' => 'align',
                        'label' => 'Alignment',
                        'default' => 'center',
                        'responsive' => true,
                        'preview' => array(
                            'type' => 'css',
                            'selector' => '.oxi__addons_line_divider',
                            'property' => 'text-align',
                        ),
                    ),
                    'separator_line_color' => array(
                        'type' => 'color',
                        'label' => __('Color', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
                        'preview' => array(
                            'type' => 'css',
                            'selector' => '.oxi__addons_seperator_span',
                            'property' => 'border-top-color',
                        ),
                    ),
                    'separator_line_height' => array(
                        'type' => 'unit',
                        'label' => __('Thickness', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '2',
                        'maxlength' => '2',
                        'size' => '3',
                        'units' => array('px'),
                        'slider' => true,
                        'help' => __('Thickness of Border', SA_FLBUILDER_TEXTDOMAIN),
                        'preview' => array(
                            'type' => 'css',
                            'selector' => '.oxi__addons_seperator_span',
                            'property' => 'border-top-width',
                            'unit' => 'px',
                        ),
                    ),
                    'separator_line_width' => array(
                        'type' => 'unit',
                        'label' => __('Width', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => '40',
                        'maxlength' => '3',
                        'size' => '5',
                        'units' => array('%'),
                        'slider' => true,
                        'responsive' => true,
                        'preview' => array(
                            'type' => 'css',
                            'selector' => '.oxi__addons_seperator_width',
                            'property' => 'width',
                            'unit' => '%',
                        ),
                    ),
                ),
            ),
        ),
    ),
    'typography' => array(
        'title' => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
        'sections' => array(
            'footer_typo' => array(
                'title' => __('Heading', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'tag' => array(
                        'type' => 'select',
                        'label' => __('HTML Tag', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'h3',
                        'options' => array(
                            'h1' => 'h1',
                            'h2' => 'h2',
                            'h3' => 'h3',
                            'h4' => 'h4',
                            'h5' => 'h5',
                            'h6' => 'h6',
                        ),
                    ),
                    'font_typo' => array(
                        'type' => 'typography',
                        'label' => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                        'responsive' => true,
                        'preview' => array(
                            'type' => 'css',
                            'selector' => '.oxi__addons_footer',
                            'important' => true,
                        ),
                    ),
                    'title_color' => array(
                        'type' => 'color',
                        'label' => __('Text Color', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
                        'preview' => array(
                            'type' => 'css',
                            'property' => 'color',
                            'selector' => '.oxi__addons_footer',
                        ),
                    ),
                    'footer_padding' => array(
                        'type' => 'dimension',
                        'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                        'help' => __('Manage Heading padding', SA_FLBUILDER_TEXTDOMAIN),
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
            'description_typo' => array(
                'title' => __('Description', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'desc_font_typo' => array(
                        'type' => 'typography',
                        'label' => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                        'responsive' => true,
                        'preview' => array(
                            'type' => 'css',
                            'selector' => '.oxi__addons_details',
                            'important' => true,
                        ),
                    ),
                    'desc_color' => array(
                        'type' => 'color',
                        'label' => __('Color', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
                        'preview' => array(
                            'type' => 'css',
                            'property' => 'color',
                            'selector' => '.oxi__addons_details',
                        ),
                    ),
                    'desc_padding' => array(
                        'type' => 'dimension',
                        'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                        'help' => __('Manage Description padding', SA_FLBUILDER_TEXTDOMAIN),
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
            'separator_text_typography' => array(
                'title' => __('Separator Text Typography', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'separator_text_tag_selection' => array(
                        'type' => 'select',
                        'label' => __('Text Tag', SA_FLBUILDER_TEXTDOMAIN),
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
                    'separator_font_typo' => array(
                        'type' => 'typography',
                        'label' => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                        'responsive' => true,
                        'preview' => array(
                            'type' => 'css',
                            'selector' => '.oxi__line_text',
                            'important' => true,
                        ),
                    ),
                    'separator_text_color' => array(
                        'type' => 'color',
                        'label' => __('Text Color', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
                        'preview' => array(
                            'type' => 'css',
                            'property' => 'color',
                            'selector' => '.oxi__line_text',
                        ),
                    ),
                ),
            ),
        ),
    ),
        )
);

FLBuilder::register_settings_form(
        'oxi_sa_offcanvas_item_form', array(
    'title' => __('Offcanvas', SA_FLBUILDER_TEXTDOMAIN),
    'tabs' => array(
        array(
            'title' => __('OffCanvas', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array(
                'offcanvas' => array(
                    'title' => __('OffCanvas Title', SA_FLBUILDER_TEXTDOMAIN), // Section Title.
                    'fields' => array(// Section Fields.
                        'offcanvas_title' => array(
                            'type' => 'text',
                            'label' => __('Title', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => __('Offcanvas Title text here', SA_FLBUILDER_TEXTDOMAIN),
                            'preview' => array(
                                'type' => 'text',
                                'selector' => '.oxi__addons_offcanvas',
                            ),
                            'connections' => array('string', 'html'),
                        ),
                    ),
                ),
                'offcanvas_desctiption' => array(
                    'title' => __('Desctiption', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'description' => array(
                            'type' => 'editor',
                            'label' => '',
                            'rows' => 7,
                            'default' => 'Lorem Ipsum is simply dummy text',
                            'connections' => array('string', 'html'),
                        ),
                       
                       
                    ),
                ),
                
            ),
        ),
    ),
        )
);




FLBuilder::register_settings_form(
        'sa_fl_offcanvas_form_field', array(
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
