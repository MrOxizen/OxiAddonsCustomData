<?php

/**
 *   heading module
 * @package Shortcode addons 
 */

FLBuilder::register_module(
    'Text_blocks',
    array(
        'general'    => array(
            'title'    => __('Content', SA_FLBUILDER_TEXTDOMAIN),
            'sections' => array(
                'content'     => array(
                    'title'  => '',
                    'fields' => array(
                        'heading_top' => array(
                            'type'        => 'text',
                            'label'       => __('Top Text', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => __('Lorem', SA_FLBUILDER_TEXTDOMAIN),
                            'preview'     => array(
                                'type'     => 'text',
                                'selector' => '.oxi__addons_top_heading',
                            ),
                            'connections' => array('string', 'html'),
                        ),
                        'heading_middle' => array(
                            'type'        => 'text',
                            'label'       => __('Middle Text', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => __('Lorem Ipsum', SA_FLBUILDER_TEXTDOMAIN),
                            'preview'     => array(
                                'type'     => 'text',
                                'selector' => '.oxi__addons_middle_heading',
                            ),
                            'connections' => array('string', 'html'),
                        ),
                        'heading_bottom' => array(
                            'type'        => 'text',
                            'label'       => __('Bottom Text', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => __('Lorem Ipsum Is dummy Text', SA_FLBUILDER_TEXTDOMAIN),
                            'preview'     => array(
                                'type'     => 'text',
                                'selector' => '.oxi__addons_bottom_heading',
                            ),
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
                            ),
                        ),
                        'separator_position' => array(
                            'type'    => 'select',
                            'label'   => __('Separator Position', SA_FLBUILDER_TEXTDOMAIN),
                            'default' => 'top',
                            'options' => array(
                                'top' => __('Heading Top > Line', SA_FLBUILDER_TEXTDOMAIN),
                                'center'    => __('Heading Middle > Line', SA_FLBUILDER_TEXTDOMAIN),
                                'bottom' => __('Heading Bottom > Line', SA_FLBUILDER_TEXTDOMAIN),
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
                'heading_top_typo'              => array(
                    'title'  => __('Top Text Settings', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'tag_top' => array(
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
                                'p' => 'p',
                                'div' => 'div',
                                'span' => 'span',
                            ),
                        ),
                        'font_top_typo'             => array(
                            'type'       => 'typography',
                            'label'      => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.oxi__addons_heading_top',
                                'important' => true,
                            ),
                        ),
                        'title_top_color'                 => array(
                            'type'        => 'color',
                            'label'       => __('Text Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => '',
                            'show_reset'  => true,
                            'connections' => array('color'),
                            'show_alpha'  => true,
                            'preview'     => array(
                                'type'     => 'css',
                                'property' => 'color',
                                'selector' => '.oxi__addons_heading_top',
                            ),
                        ),
                        'heading_top_padding' => array(
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
                'heading_middle_typo'              => array(
                    'title'  => __('Middle Text Settings', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'tag_middle' => array(
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
                                'p' => 'p',
                                'div' => 'div',
                                'span' => 'span',
                            ),
                        ),
                        'font_middle_typo'             => array(
                            'type'       => 'typography',
                            'label'      => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.oxi__addons_heading_middle',
                                'important' => true,
                            ),
                        ),
                        'title_middle_color'                 => array(
                            'type'        => 'color',
                            'label'       => __('Text Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => '',
                            'show_reset'  => true,
                            'connections' => array('color'),
                            'show_alpha'  => true,
                            'preview'     => array(
                                'type'     => 'css',
                                'property' => 'color',
                                'selector' => '.oxi__addons_heading_middle',
                            ),
                        ),
                        'heading_middle_padding' => array(
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
                'heading_bottom_typo'              => array(
                    'title'  => __('Bottom Text Settings', SA_FLBUILDER_TEXTDOMAIN),
                    'fields' => array(
                        'tag_bottom' => array(
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
                                'p' => 'p',
                                'div' => 'div',
                                'span' => 'span',
                            ),
                        ),
                        'font_bottom_typo'             => array(
                            'type'       => 'typography',
                            'label'      => __('Typography', SA_FLBUILDER_TEXTDOMAIN),
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.oxi__addons_heading_bottom',
                                'important' => true,
                            ),
                        ),
                        'title_bottom_color'                 => array(
                            'type'        => 'color',
                            'label'       => __('Text Color', SA_FLBUILDER_TEXTDOMAIN),
                            'default'     => '',
                            'show_reset'  => true,
                            'connections' => array('color'),
                            'show_alpha'  => true,
                            'preview'     => array(
                                'type'     => 'css',
                                'property' => 'color',
                                'selector' => '.oxi__addons_heading_bottom',
                            ),
                        ),
                        'heading_bottom_padding' => array(
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
            ),
        ),
    )
);
