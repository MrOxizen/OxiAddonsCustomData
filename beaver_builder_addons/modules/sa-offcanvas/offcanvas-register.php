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
                        'toggle' => array(
                            'left' => array(
                                'fields' => array('offcanvas_bar_width'),
                            ),
                            'right' => array(
                                'fields' => array('offcanvas_bar_width'),
                            ),
                            'top' => array(
                                'fields' => array('offcanvas_bar_height'),
                            ),
                            'bottom' => array(
                                'fields' => array('offcanvas_bar_height'),
                            ),
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
        'title' => __('Style', SA_FLBUILDER_TEXTDOMAIN),
        'sections' => array(
            'offcanvas_bar' => array(
                'title' => __('Offcanvas Bar', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'offcanvas_bar_bg' => array(
                        'type' => 'color',
                        'label' => __('Background', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'fff',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
                        'preview' => array(
                            'type' => 'css',
                            'selector' => '.oxi__addons_image_icon_divider .oxi__icon',
                            'property' => 'color',
                        ),
                    ),
                    'offcanvas_bar_width' => array(
                        'type' => 'unit',
                        'label' => 'Width',
                        'slider' => true,
                        'responsive' => true,
                        'description' => 'px',
                        'default' => '300'
                    ),
                    'offcanvas_bar_height' => array(
                        'type' => 'unit',
                        'label' => 'Height',
                        'slider' => true,
                        'responsive' => true,
                        'description' => 'px',
                        'default' => '300'
                    ),
                    'offcanvas_bar_border_style' => array(
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
                                'fields' => array('offcanvas_bar_border_width', 'offcanvas_bar_border_color'),
                            ),
                            'dashed' => array(
                                'fields' => array('offcanvas_bar_border_width', 'offcanvas_bar_border_color'),
                            ),
                            'dotted' => array(
                                'fields' => array('offcanvas_bar_border_width', 'offcanvas_bar_border_color'),
                            ),
                            'double' => array(
                                'fields' => array('offcanvas_bar_border_width', 'offcanvas_bar_border_color'),
                            ),
                        ),
                    ),
                    'offcanvas_bar_border' => array(
                        'type' => 'dimension',
                        'label' => __('Border', SA_FLBUILDER_TEXTDOMAIN),
                        'help' => __('Manage the outside spacing of content area of flipbox.', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '1',
                        'slider' => true,
                        'units' => array('px'),
                    ),
                    'offcanvas_bar_border_color' => array(
                        'type' => 'color',
                        'label' => __('Border Color', SA_FLBUILDER_TEXTDOMAIN),
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
                    'offcanvas_bar_border_radius' => array(
                        'type' => 'dimension',
                        'label' => __('Border Radius', SA_FLBUILDER_TEXTDOMAIN),
                        'help' => __('Manage the outside spacing of content area of flipbox.', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '',
                        'responsive' => true,
                        'slider' => true,
                        'units' => array('px'),
                    ),
                    'offcanvas_bar_padding' => array(
                        'type' => 'dimension',
                        'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                        'help' => __('Manage the outside spacing of content area of flipbox.', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '15',
                        'responsive' => true,
                        'slider' => true,
                        'units' => array('px'),
                    ),
                ),
            ),
            'offcanvas_content' => array(
                'title' => __('Offcanvas Content', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'offcanvas_content_bg' => array(
                        'type' => 'color',
                        'label' => __('Background', SA_FLBUILDER_TEXTDOMAIN),
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
                    'offcanvas_content_border_style' => array(
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
                                'fields' => array('offcanvas_content_border_width', 'offcanvas_content_border_color'),
                            ),
                            'dashed' => array(
                                'fields' => array('offcanvas_content_border_width', 'offcanvas_content_border_color'),
                            ),
                            'dotted' => array(
                                'fields' => array('offcanvas_content_border_width', 'offcanvas_content_border_color'),
                            ),
                            'double' => array(
                                'fields' => array('offcanvas_content_border_width', 'offcanvas_content_border_color'),
                            ),
                        ),
                    ),
                    'offcanvas_content_border' => array(
                        'type' => 'dimension',
                        'label' => __('Border', SA_FLBUILDER_TEXTDOMAIN),
                        'help' => __('Manage the outside spacing of content area of flipbox.', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '',
                        'placeholder' => '1',
                        'slider' => true,
                        'units' => array('px'),
                    ),
                    'offcanvas_content_border_color' => array(
                        'type' => 'color',
                        'label' => __('Border Color', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
                        
                    ),
                    'offcanvas_content_border_radius' => array(
                        'type' => 'dimension',
                        'label' => __('Border Radius', SA_FLBUILDER_TEXTDOMAIN),
                        'help' => __('Manage the outside spacing of content area of flipbox.', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '',
                        'placeholder' => '5',
                        'slider' => true,
                        'units' => array('px'),
                    ),
                    'offcanvas_content_padding' => array(
                        'type' => 'dimension',
                        'label' => __('Padding', SA_FLBUILDER_TEXTDOMAIN),
                        'help' => __('Manage the outside spacing of content area of flipbox.', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => ' ',
                        'placeholder' => '10',
                        'responsive' => true,
                        'slider' => true,
                        'units' => array('px'),
                    ),
                    'offcanvas_content_margin' => array(
                        'type' => 'dimension',
                        'label' => __('Margin', SA_FLBUILDER_TEXTDOMAIN),
                        'help' => __('Manage the outside spacing of content area of flipbox.', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '10',
                        'placeholder' => '20',
                        'responsive' => true,
                        'slider' => true,
                        'units' => array('px'),
                    ),
                ),
            ),
            'offcanvas_close_icon' => array(
                'title' => __('Close Icon', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'offcanvas_close_icon_class' => array(
                        'type' => 'icon',
                        'label' => __('Icon', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => __('fas fa-times', SA_FLBUILDER_TEXTDOMAIN),
                        'placeholder' => 'fas fa-times',
                        'help' => __('Sellect Icon from Icon Library', SA_FLBUILDER_TEXTDOMAIN),
                        'connections' => array('string', 'html'),
                        'show_remove' => true,
                    ),
                    'offcanvas_close_icon_color' => array(
                        'type' => 'color',
                        'label' => __('Icon Color', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '999',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
                       
                    ),
                    'offcanvas_close_icon_size' => array(
                        'type' => 'unit',
                        'label' => 'Icon Size',
                        'slider' => true,
                        'description' => 'px',
                        'default' => '18'
                    ),
                    'offcanvas_close_icon_margin' => array(
                        'type' => 'dimension',
                        'label' => __('Position', SA_FLBUILDER_TEXTDOMAIN),
                        'help' => __('Manage The Icon Position.', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '1',
                        'responsive' => true,
                        'slider' => true,
                        'units' => array('%'),
                    ),
                ),
            ),
            'offcanvas_overlay' => array(
                'title' => __('Overlay', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'offcanvas_overlay_color' => array(
                        'type' => 'color',
                        'label' => __('Overlay Color', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '444',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
                        
                    ),
                    'offcanvas_overlay_opacity' => array(
                        'type' => 'unit',
                        'label' => 'Opacity',
                        'slider' => array(
                            'min' => 0.01,
                            'max' => 1,
                            'step' => 0.01
                        ),
                        'description' => '',
                        'default' => '0.5'
                    ),
                ),
            ),
        ),
    ),
    'typography' => array(
        'title' => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
        'sections' => array(
            'offcanvas_typo' => array(
                'title' => __('Heading', SA_FLBUILDER_TEXTDOMAIN),
                'fields' => array(
                    'tag' => array(
                        'type' => 'select',
                        'label' => __('HTML Tag', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => 'h4',
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
                        
                    ),
                    'title_color' => array(
                        'type' => 'color',
                        'label' => __('Text Color', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '333',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
                        
                    ),
                    'offcanvas_heading_padding' => array(
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
                        
                    ),
                    'desc_color' => array(
                        'type' => 'color',
                        'label' => __('Color', SA_FLBUILDER_TEXTDOMAIN),
                        'default' => '666',
                        'show_reset' => true,
                        'connections' => array('color'),
                        'show_alpha' => true,
                        
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
                                'property' => 'text-align',
                                'selector' => '.oxi__button_wrapper_main'
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
