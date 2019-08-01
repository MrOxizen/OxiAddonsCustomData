<?php

/**
 *   heading module
 * @package Shortcode addons 
 */

FLBuilder::register_module(
    'Heading_module',
    array(
        'general'    => array(
            'title'    => __('Content', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array(
                'content'     => array(
                    'title'  => '',
                    'fields' => array(
                        'heading' => array(
                            'type'        => 'text',
                            'label'       => __('Heading', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => __('Heading text here', SA_FLBUILDER_TEXTDOMAIN),
                            'preview'     => array(
                                'type'     => 'text',
                                'selector' => '.oxi__addons_header',
                            ),
                            'connections' => array('string', 'html'),
                        ),
                        'link'    => array(
                            'type'          => 'link',
                            'label'         => __('Link', SA_FLBUILDER_TEXTDOMAIN),
                            'preview'       => array(
                                'type' => 'none',
                            ),
                            'connections'   => array('url'),
                            'show_target'   => true,
                            'show_nofollow' => true,
                        ),
                    ),
                ),
                'description' => array(
                    'title'  => __('Description', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'description' => array(
                            'type'        => 'editor',
                            'label'       => '',
                            'rows'        => 7,
                            'default'     => 'Lorem Ipsum is simply dummy text',
                            'connections' => array('string', 'html'),
                        ),
                    ),
                ),
            ),
        ),
        'style'      => array(
            'title'    => __('Separator', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array(
                'separator'  => array(
                    'title'  => __('Separator', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'separator_style'    => array(
                            'type'    => 'select',
                            'label'   => __('Separator Style', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'line',
                            'options' => array(
                                'none'       => __('None', SA_FLBUILDER_TEXTDOMAIN),
                                'line'       => __('Line', SA_FLBUILDER_TEXTDOMAIN),
                                'line_icon'  => __('Line With Icon', SA_FLBUILDER_TEXTDOMAIN),
                                'line_image' => __('Line With Image', SA_FLBUILDER_TEXTDOMAIN),
                                'line_text'  => __('Line With Text', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'toggle'  => array(
                                'line'       => array(
                                    'sections' => array('separator_line'),
                                    'fields'   => array('separator_position'),
                                ),
                                'line_icon'  => array(
                                    'sections' => array('separator_line', 'separator_icon_basic'),
                                    'fields'   => array('separator_position'),
                                ),
                                'line_image' => array(
                                    'sections' => array('separator_line', 'separator_img_basic'),
                                    'fields'   => array('separator_position'),
                                ),
                                'line_text'  => array(
                                    'sections' => array('separator_line', 'separator_text', 'separator_text_typography'),
                                    'fields'   => array('separator_position'),
                                ),
                            ),
                        ),
                        'separator_position' => array(
                            'type'    => 'select',
                            'label'   => __('Separator Position', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'center',
                            'options' => array(
                                'center' => __('Between Heading & Description', SA_FLBUILDER_TEXTDOMAIN),
                                'top'    => __('Top', SA_FLBUILDER_TEXTDOMAIN),
                                'bottom' => __('Bottom', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                        ),
                    ),
                ),
                'separator_icon_basic' => array(
                    'title'  => __('Icon Basics', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'icon'                 => array(
                            'type'        => 'icon',
                            'label'       => __('Icon', SA_FLBUILDER_TEXTDOMAIN),
                            'show_remove' => true,
                        ),
                        'icon_size'            => array(
                            'type'        => 'unit',
                            'label'       => __('Size', SA_FLBUILDER_TEXTDOMAIN),
                            'placeholder' => '22',
                            'maxlength'   => '5',
                            'size'        => '6',
                            'units'       => array('px'),
                            'slider'      => true,
                            'preview'     => array(
                                'type'     => 'css',
                                'selector' => '.oxi__addons_image_icon_divider .oxi__icon',
                                'property' => 'font-size',
                                'unit'     => 'px',
                            ),
                        ),
                        'separator_icon_color' => array(
                            'type'        => 'color',
                            'label'       => __('Icon Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => '',
                            'show_reset'  => true,
                            'connections' => array('color'),
                            'show_alpha'  => true,
                            'preview'     => array(
                                'type'     => 'css',
                                'selector' => '.oxi__addons_image_icon_divider .oxi__icon',
                                'property' => 'color',
                            ),
                        ),
                        'padding_left'            => array(
                            'type'        => 'unit',
                            'label'       => __('Padding Left', SA_FLBUILDER_TEXTDOMAIN),
                            'placeholder' => '5',
                            'maxlength'   => '5',
                            'size'        => '6',
                            'units'       => array('px'),
                            'slider'      => true,
                            'preview'     => array(
                                'type'     => 'css',
                                'selector' => '.oxi__addons_image_icon_divider',
                                'property' => 'padding-left',
                                'unit'     => 'px',
                            ),
                        ),
                        'padding_right'            => array(
                            'type'        => 'unit',
                            'label'       => __('Padding Right', SA_FLBUILDER_TEXTDOMAIN),
                            'placeholder' => '5',
                            'maxlength'   => '5',
                            'size'        => '6',
                            'units'       => array('px'),
                            'slider'      => true,
                            'preview'     => array(
                                'type'     => 'css',
                                'selector' => '.oxi__addons_image_icon_divider',
                                'property' => 'padding-right',
                                'unit'     => 'px',
                            ),
                        ),
                    ),
                ),
                'separator_img_basic'  => array(
                    'title'  => __('Image Basics', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'photo_source'        => array(
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
                        'photo'               => array(
                            'type'        => 'photo',
                            'label'       => __('Photo', SA_FLBUILDER_TEXTDOMAIN),
                            'show_remove' => true,
                            'connections' => array('photo'),
                        ),
                        'photo_url'           => array(
                            'type'        => 'text',
                            'label'       => __('Photo URL', SA_FLBUILDER_TEXTDOMAIN),
                            'placeholder' => 'http://www.example.com/my-photo.jpg',
                        ),
                        'img_size'            => array(
                            'type'        => 'unit',
                            'label'       => __('Size', SA_FLBUILDER_TEXTDOMAIN),
                            'maxlength'   => '5',
                            'size'        => '6',
                            'units'       => array('px'),
                            'slider'      => true,
                            'placeholder' => '50',
                        ),
                        'responsive_img_size' => array(
                            'type'      => 'unit',
                            'label'     => __('Responsive Size', SA_FLBUILDER_TEXTDOMAIN),
                            'maxlength' => '5',
                            'size'      => '6',
                            'units'     => array('px'),
                            'slider'    => true,
                            'help'      => __('Image size below medium devices. Leave it blank if you want to keep same size', SA_FLBUILDER_TEXTDOMAIN),
                            'preview'   => array(
                                'type' => 'none',
                            ),
                        ),
                    ),
                ),
                'separator_text'       => array(
                    'title'  => __('Text', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'text_inline'              => array(
                            'type'    => 'text',
                            'label'   => __('Text', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'Ultimate',
                            'preview' => array(
                                'type'     => 'text',
                                'selector' => '.oxi__line_text',
                            ),
                        ),
                        'responsive_compatibility' => array(
                            'type'    => 'select',
                            'label'   => __('Responsive Compatibility', SA_FLBUILDER_TEXTDOMAIN),
                            'help'    => __('There might be responsive issues for long texts. If you are facing such issues then select appropriate devices width to make your module responsive.', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => '',
                            'options' => array(
                                'none'                         => __('None', SA_FLBUILDER_TEXTDOMAIN),
                                'mobile_device'   => __('Small Devices', SA_FLBUILDER_TEXTDOMAIN),
                                'medium_device' => __('Medium & Small Devices', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                        ),
                    ),
                ),
                'separator_line'       => array(
                    'title'  => __('Line Style', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'separator_line_style'  => array(
                            'type'    => 'select',
                            'label'   => __('Style', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'solid',
                            'options' => array(
                                'solid'  => __('Solid', SA_FLBUILDER_TEXTDOMAIN),
                                'dashed' => __('Dashed', SA_FLBUILDER_TEXTDOMAIN),
                                'dotted' => __('Dotted', SA_FLBUILDER_TEXTDOMAIN),
                                'double' => __('Double', SA_FLBUILDER_TEXTDOMAIN),
                            ),
                            'help'    => __('The type of border to use. Double borders must have a height of at least 2px to render properly.', SA_FLBUILDER_TEXTDOMAIN),
                            'preview' => array(
                                'type'     => 'css',
                                'selector' => '.oxi__addons_seperator_span',
                                'property' => 'border-top-style',
                            ),
                        ),
                        'alignment' => array(
                            'type'    => 'align',
                            'label'   => 'Alignment',
                            'default' => 'center',
                            'responsive' => true,
                            'preview' => array(
                                'type'       => 'css',
                                'selector'   => '.oxi__addons_line_divider',
                                'property'   => 'text-align',
                            ),
                        ),
                        'separator_line_color'  => array(
                            'type'        => 'color',
                            'label'       => __('Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => '',
                            'show_reset'  => true,
                            'connections' => array('color'),
                            'show_alpha'  => true,
                            'preview'     => array(
                                'type'     => 'css',
                                'selector' => '.oxi__addons_seperator_span',
                                'property' => 'border-top-color',
                            ),
                        ),
                        'separator_line_height' => array(
                            'type'        => 'unit',
                            'label'       => __('Thickness', SA_FLBUILDER_TEXTDOMAIN),
                            'placeholder' => '2',
                            'maxlength'   => '2',
                            'size'        => '3',
                            'units'       => array('px'),
                            'slider'      => true,
                            'help'        => __('Thickness of Border', SA_FLBUILDER_TEXTDOMAIN),
                            'preview'     => array(
                                'type'     => 'css',
                                'selector' => '.oxi__addons_seperator_span',
                                'property' => 'border-top-width',
                                'unit'     => 'px',
                            ),
                        ),
                        'separator_line_width'  => array(
                            'type'        => 'unit',
                            'label'       => __('Width', SA_FLBUILDER_TEXTDOMAIN),
                            'placeholder' => '40',
                            'maxlength'   => '3',
                            'size'        => '5',
                            'units'       => array('%'),
                            'slider'      => true,
                            'responsive'      => true,
                            'preview'     => array(
                                'type'     => 'css',
                                'selector' => '.oxi__addons_seperator_width',
                                'property' => 'width',
                                'unit'     => '%',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'typography' => array(
            'title'    => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array(
                'heading_typo'              => array(
                    'title'  => __('Heading', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'tag' => array(
                            'type'    => 'select',
                            'label'   => __('HTML Tag', SA_FLBUILDER_TEXTDOMAIN),
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
                        'font_typo'             => array(
                            'type'       => 'typography',
                            'label'      => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.oxi__addons_header',
                                'important' => true,
                            ),
                        ),
                        'title_color'                 => array(
                            'type'        => 'color',
                            'label'       => __('Text Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => '',
                            'show_reset'  => true,
                            'connections' => array('color'),
                            'show_alpha'  => true,
                            'preview'     => array(
                                'type'     => 'css',
                                'property' => 'color',
                                'selector' => '.oxi__addons_header',
                            ),
                        ),
                        'heading_padding' => array(
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
                'description_typo'          => array(
                    'title'  => __('Description', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'desc_font_typo'     => array(
                            'type'       => 'typography',
                            'label'      => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.oxi__addons_details',
                                'important' => true,
                            ),
                        ),
                        'desc_color'         => array(
                            'type'        => 'color',
                            'label'       => __('Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => '',
                            'show_reset'  => true,
                            'connections' => array('color'),
                            'show_alpha'  => true,
                            'preview'     => array(
                                'type'     => 'css',
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
                    'title'  => __('Separator Text Typography', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'separator_text_tag_selection' => array(
                            'type'    => 'select',
                            'label'   => __('Text Tag', SA_FLBUILDER_TEXTDOMAIN),
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
                        'separator_font_typo'          => array(
                            'type'       => 'typography',
                            'label'      => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.oxi__line_text',
                                'important' => true,
                            ),
                        ),
                        'separator_text_color'         => array(
                            'type'        => 'color',
                            'label'       => __('Text Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => '',
                            'show_reset'  => true,
                            'connections' => array('color'),
                            'show_alpha'  => true,
                            'preview'     => array(
                                'type'     => 'css',
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
