<?php
/**
 * Register the module and its form settings with new typography, border, align param settings provided in beaver builder version 2.2
 * Applicable for BB version greater than 2.2 and UABB version 1.3.0 or later.
 *
 * Converted font, align, border settings to respective param setting.
 *
 * @package UABB Heading Module
 */

FLBuilder::register_module(
	'OxiHeadingModule',
	array(
		'general'    => array(
			'title'    => __( 'General', SA_FLBUILDER_TEXTDOMAIN ),
			'sections' => array(
				'general'     => array(
					'title'  => '',
					'fields' => array(
						'heading' => array(
							'type'        => 'text',
							'label'       => __( 'Heading', SA_FLBUILDER_TEXTDOMAIN ),
							'default'     => __( 'Design is a funny word', SA_FLBUILDER_TEXTDOMAIN ),
							'preview'     => array(
								'type'     => 'text',
								'selector' => '.uabb-heading-text',
							),
							'connections' => array( 'string', 'html' ),
						),
						'link'    => array(
							'type'          => 'link',
							'label'         => __( 'Link', SA_FLBUILDER_TEXTDOMAIN ),
							'preview'       => array(
								'type' => 'none',
							),
							'connections'   => array( 'url' ),
							'show_target'   => true,
							'show_nofollow' => true,
						),
					),
				),
				'description' => array(
					'title'  => __( 'Description', SA_FLBUILDER_TEXTDOMAIN ),
					'fields' => array(
						'description' => array(
							'type'        => 'editor',
							'label'       => '',
							'rows'        => 7,
							'default'     => '',
							'connections' => array( 'string', 'html' ),
						),
					),
				),
				'structure'   => array(
					'title'  => __( 'Structure', SA_FLBUILDER_TEXTDOMAIN ),
					'fields' => array(
						'alignment'          => array(
							'type'    => 'align',
							'label'   => __( 'Alignment', SA_FLBUILDER_TEXTDOMAIN ),
							'default' => 'center',
							'help'    => __( 'This is the overall alignment and would apply to all Heading elements', SA_FLBUILDER_TEXTDOMAIN ),
							'preview' => array(
								'type'     => 'css',
								'selector' => '.uabb-heading-wrapper .uabb-heading, .uabb-heading-wrapper .uabb-subheading *',
								'property' => 'text-align',
							),
						),
						'r_custom_alignment' => array(
							'type'    => 'align',
							'label'   => __( 'Responsive Alignment', SA_FLBUILDER_TEXTDOMAIN ),
							'default' => 'center',
							'preview' => array(
								'type' => 'none',
							),
							'help'    => __( 'The alignment will apply on Mobile', SA_FLBUILDER_TEXTDOMAIN ),
						),
					),
				),
			),
		),
		'style'      => array(
			'title'    => __( 'Separator', SA_FLBUILDER_TEXTDOMAIN ),
			'sections' => array(
				'separator'            => array(
					'title'  => __( 'Separator', SA_FLBUILDER_TEXTDOMAIN ),
					'fields' => array(
						'separator_style'    => array(
							'type'    => 'select',
							'label'   => __( 'Separator Style', SA_FLBUILDER_TEXTDOMAIN ),
							'default' => 'none',
							'options' => array(
								'none'       => __( 'None', SA_FLBUILDER_TEXTDOMAIN ),
								'line'       => __( 'Line', SA_FLBUILDER_TEXTDOMAIN ),
								'line_icon'  => __( 'Line With Icon', SA_FLBUILDER_TEXTDOMAIN ),
								'line_image' => __( 'Line With Image', SA_FLBUILDER_TEXTDOMAIN ),
								'line_text'  => __( 'Line With Text', SA_FLBUILDER_TEXTDOMAIN ),
							),
							'toggle'  => array(
								'line'       => array(
									'sections' => array( 'separator_line' ),
									'fields'   => array( 'separator_position' ),
								),
								'line_icon'  => array(
									'sections' => array( 'separator_line', 'separator_icon_basic' ),
									'fields'   => array( 'separator_position' ),
								),
								'line_image' => array(
									'sections' => array( 'separator_line', 'separator_img_basic' ),
									'fields'   => array( 'separator_position' ),
								),
								'line_text'  => array(
									'sections' => array( 'separator_line', 'separator_text', 'separator_text_typography' ),
									'fields'   => array( 'separator_position' ),
								),
							),
						),
						'separator_position' => array(
							'type'    => 'select',
							'label'   => __( 'Separator Position', SA_FLBUILDER_TEXTDOMAIN ),
							'default' => 'center',
							'options' => array(
								'center' => __( 'Between Heading & Description', SA_FLBUILDER_TEXTDOMAIN ),
								'top'    => __( 'Top', SA_FLBUILDER_TEXTDOMAIN ),
								'bottom' => __( 'Bottom', SA_FLBUILDER_TEXTDOMAIN ),
							),
						),
					),
				),
				'separator_icon_basic' => array(
					'title'  => __( 'Icon Basics', SA_FLBUILDER_TEXTDOMAIN ),
					'fields' => array(
						'icon'                 => array(
							'type'        => 'icon',
							'label'       => __( 'Icon', SA_FLBUILDER_TEXTDOMAIN ),
							'show_remove' => true,
						),
						'icon_size'            => array(
							'type'        => 'unit',
							'label'       => __( 'Size', SA_FLBUILDER_TEXTDOMAIN ),
							'placeholder' => '30',
							'maxlength'   => '5',
							'size'        => '6',
							'units'       => array( 'px' ),
							'slider'      => true,
							'preview'     => array(
								'type'     => 'css',
								'selector' => '.uabb-icon-wrap .uabb-icon i, .uabb-icon-wrap .uabb-icon i:before',
								'property' => 'font-size',
								'unit'     => 'px',
							),
						),
						'separator_icon_color' => array(
							'type'        => 'color',
							'label'       => __( 'Icon Color', SA_FLBUILDER_TEXTDOMAIN ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
							'preview'     => array(
								'type'     => 'css',
								'selector' => '.uabb-icon-wrap .uabb-icon i, .uabb-icon-wrap .uabb-icon i:before',
								'property' => 'color',
							),
						),
					),
				),
				'separator_img_basic'  => array(
					'title'  => __( 'Image Basics', SA_FLBUILDER_TEXTDOMAIN ),
					'fields' => array(
						'photo_source'        => array(
							'type'    => 'select',
							'label'   => __( 'Photo Source', SA_FLBUILDER_TEXTDOMAIN ),
							'default' => 'library',
							'options' => array(
								'library' => __( 'Media Library', SA_FLBUILDER_TEXTDOMAIN ),
								'url'     => __( 'URL', SA_FLBUILDER_TEXTDOMAIN ),
							),
							'toggle'  => array(
								'library' => array(
									'fields' => array( 'photo' ),
								),
								'url'     => array(
									'fields' => array( 'photo_url' ),
								),
							),
						),
						'photo'               => array(
							'type'        => 'photo',
							'label'       => __( 'Photo', SA_FLBUILDER_TEXTDOMAIN ),
							'show_remove' => true,
							'connections' => array( 'photo' ),
						),
						'photo_url'           => array(
							'type'        => 'text',
							'label'       => __( 'Photo URL', SA_FLBUILDER_TEXTDOMAIN ),
							'placeholder' => 'http://www.example.com/my-photo.jpg',
						),
						'img_size'            => array(
							'type'        => 'unit',
							'label'       => __( 'Size', SA_FLBUILDER_TEXTDOMAIN ),
							'maxlength'   => '5',
							'size'        => '6',
							'units'       => array( 'px' ),
							'slider'      => true,
							'placeholder' => '50',
						),
						'responsive_img_size' => array(
							'type'      => 'unit',
							'label'     => __( 'Responsive Size', SA_FLBUILDER_TEXTDOMAIN ),
							'maxlength' => '5',
							'size'      => '6',
							'units'     => array( 'px' ),
							'slider'    => true,
							'help'      => __( 'Image size below medium devices. Leave it blank if you want to keep same size', SA_FLBUILDER_TEXTDOMAIN ),
							'preview'   => array(
								'type' => 'none',
							),
						),
					),
				),
				'separator_text'       => array(
					'title'  => __( 'Text', SA_FLBUILDER_TEXTDOMAIN ),
					'fields' => array(
						'text_inline'              => array(
							'type'    => 'text',
							'label'   => __( 'Text', SA_FLBUILDER_TEXTDOMAIN ),
							'default' => 'Ultimate',
							'preview' => array(
								'type'     => 'text',
								'selector' => '.uabb-divider-text',
							),
						),
						'responsive_compatibility' => array(
							'type'    => 'select',
							'label'   => __( 'Responsive Compatibility', SA_FLBUILDER_TEXTDOMAIN ),
							'help'    => __( 'There might be responsive issues for long texts. If you are facing such issues then select appropriate devices width to make your module responsive.', SA_FLBUILDER_TEXTDOMAIN ),
							'default' => '',
							'options' => array(
								''                         => __( 'None', SA_FLBUILDER_TEXTDOMAIN ),
								'uabb-responsive-mobile'   => __( 'Small Devices', SA_FLBUILDER_TEXTDOMAIN ),
								'uabb-responsive-medsmall' => __( 'Medium & Small Devices', SA_FLBUILDER_TEXTDOMAIN ),
							),
						),
					),
				),
				'separator_line'       => array(
					'title'  => __( 'Line Style', SA_FLBUILDER_TEXTDOMAIN ),
					'fields' => array(
						'separator_line_style'  => array(
							'type'    => 'select',
							'label'   => __( 'Style', SA_FLBUILDER_TEXTDOMAIN ),
							'default' => 'solid',
							'options' => array(
								'solid'  => __( 'Solid', SA_FLBUILDER_TEXTDOMAIN ),
								'dashed' => __( 'Dashed', SA_FLBUILDER_TEXTDOMAIN ),
								'dotted' => __( 'Dotted', SA_FLBUILDER_TEXTDOMAIN ),
								'double' => __( 'Double', SA_FLBUILDER_TEXTDOMAIN ),
							),
							'help'    => __( 'The type of border to use. Double borders must have a height of at least 3px to render properly.', SA_FLBUILDER_TEXTDOMAIN ),
							'preview' => array(
								'type'     => 'css',
								'selector' => '.uabb-separator, .uabb-separator-line > span',
								'property' => 'border-top-style',
							),
						),
						'separator_line_color'  => array(
							'type'        => 'color',
							'label'       => __( 'Color', SA_FLBUILDER_TEXTDOMAIN ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
							'preview'     => array(
								'type'     => 'css',
								'selector' => '.uabb-separator, .uabb-separator-line > span',
								'property' => 'border-top-color',
							),
						),
						'separator_line_height' => array(
							'type'        => 'unit',
							'label'       => __( 'Thickness', SA_FLBUILDER_TEXTDOMAIN ),
							'placeholder' => '1',
							'maxlength'   => '2',
							'size'        => '3',
							'units'       => array( 'px' ),
							'slider'      => true,
							'help'        => __( 'Thickness of Border', SA_FLBUILDER_TEXTDOMAIN ),
							'preview'     => array(
								'type'     => 'css',
								'selector' => '.uabb-separator, .uabb-separator-line > span',
								'property' => 'border-top-width',
								'unit'     => 'px',
							),
						),
						'separator_line_width'  => array(
							'type'        => 'unit',
							'label'       => __( 'Width', SA_FLBUILDER_TEXTDOMAIN ),
							'placeholder' => '30',
							'maxlength'   => '3',
							'size'        => '5',
							'units'       => array( '%' ),
							'slider'      => true,
						),
					),
				),
			),
		),
		'typography' => array(
			'title'    => __( 'Typography', SA_FLBUILDER_TEXTDOMAIN ),
			'sections' => array(
				'heading_typo'              => array(
					'title'  => __( 'Heading', SA_FLBUILDER_TEXTDOMAIN ),
					'fields' => array(
						'tag'                   => array(
							'type'    => 'select',
							'label'   => __( 'HTML Tag', SA_FLBUILDER_TEXTDOMAIN ),
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
							'label'      => __( 'Typography', SA_FLBUILDER_TEXTDOMAIN ),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.uabb-heading .uabb-heading-text, .uabb-heading *, .uabb-heading-text',
								'important' => true,
							),
						),
						'color'                 => array(
							'type'        => 'color',
							'label'       => __( 'Text Color', SA_FLBUILDER_TEXTDOMAIN ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
							'preview'     => array(
								'type'     => 'css',
								'property' => 'color',
								'selector' => '.fl-module-content.fl-node-content .uabb-heading  .uabb-heading-text',
							),
						),
						'heading_margin_top'    => array(
							'type'        => 'unit',
							'label'       => __( 'Margin Top', SA_FLBUILDER_TEXTDOMAIN ),
							'placeholder' => '0',
							'size'        => '5',
							'units'       => array( 'px' ),
							'slider'      => true,
							'preview'     => array(
								'type'     => 'css',
								'property' => 'margin-top',
								'selector' => '.uabb-heading',
								'unit'     => 'px',
							),
						),
						'heading_margin_bottom' => array(
							'type'        => 'unit',
							'label'       => __( 'Margin Bottom', SA_FLBUILDER_TEXTDOMAIN ),
							'placeholder' => '15',
							'size'        => '5',
							'units'       => array( 'px' ),
							'slider'      => true,
							'preview'     => array(
								'type'     => 'css',
								'property' => 'margin-bottom',
								'selector' => '.uabb-heading',
								'unit'     => 'px',
							),
						),
					),
				),
				'description_typo'          => array(
					'title'  => __( 'Description', SA_FLBUILDER_TEXTDOMAIN ),
					'fields' => array(
						'desc_font_typo'     => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', SA_FLBUILDER_TEXTDOMAIN ),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.uabb-text-editor',
								'important' => true,
							),
						),
						'desc_color'         => array(
							'type'        => 'color',
							'label'       => __( 'Color', SA_FLBUILDER_TEXTDOMAIN ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
							'preview'     => array(
								'type'     => 'css',
								'property' => 'color',
								'selector' => '.fl-module-content.fl-node-content .uabb-subheading, .fl-module-content.fl-node-content .uabb-subheading *',
							),
						),
						'desc_margin_top'    => array(
							'type'        => 'unit',
							'label'       => __( 'Margin Top', SA_FLBUILDER_TEXTDOMAIN ),
							'placeholder' => '15',
							'size'        => '5',
							'units'       => array( 'px' ),
							'slider'      => true,
							'preview'     => array(
								'type'     => 'css',
								'property' => 'margin-top',
								'selector' => '.uabb-subheading',
								'unit'     => 'px',
							),
						),
						'desc_margin_bottom' => array(
							'type'        => 'unit',
							'label'       => __( 'Margin Bottom', SA_FLBUILDER_TEXTDOMAIN ),
							'placeholder' => '0',
							'size'        => '5',
							'units'       => array( 'px' ),
							'slider'      => true,
							'preview'     => array(
								'type'     => 'css',
								'property' => 'margin-bottom',
								'selector' => '.uabb-subheading',
								'unit'     => 'px',
							),
						),
					),
				),
				'separator_text_typography' => array(
					'title'  => __( 'Separator Text Typography', SA_FLBUILDER_TEXTDOMAIN ),
					'fields' => array(
						'separator_text_tag_selection' => array(
							'type'    => 'select',
							'label'   => __( 'Text Tag', SA_FLBUILDER_TEXTDOMAIN ),
							'default' => 'h3',
							'options' => array(
								'h1'   => __( 'H1', SA_FLBUILDER_TEXTDOMAIN ),
								'h2'   => __( 'H2', SA_FLBUILDER_TEXTDOMAIN ),
								'h3'   => __( 'H3', SA_FLBUILDER_TEXTDOMAIN ),
								'h4'   => __( 'H4', SA_FLBUILDER_TEXTDOMAIN ),
								'h5'   => __( 'H5', SA_FLBUILDER_TEXTDOMAIN ),
								'h6'   => __( 'H6', SA_FLBUILDER_TEXTDOMAIN ),
								'div'  => __( 'Div', SA_FLBUILDER_TEXTDOMAIN ),
								'p'    => __( 'p', SA_FLBUILDER_TEXTDOMAIN ),
								'span' => __( 'span', SA_FLBUILDER_TEXTDOMAIN ),
							),
						),
						'separator_font_typo'          => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', SA_FLBUILDER_TEXTDOMAIN ),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.uabb-divider-text',
								'important' => true,
							),
						),
						'separator_text_color'         => array(
							'type'        => 'color',
							'label'       => __( 'Text Color', SA_FLBUILDER_TEXTDOMAIN ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
							'preview'     => array(
								'type'     => 'css',
								'property' => 'color',
								'selector' => '.uabb-divider-text',
							),
						),
					),
				),
			),
		),
	)
);
