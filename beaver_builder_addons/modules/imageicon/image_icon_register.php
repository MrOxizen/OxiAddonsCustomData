<?php
/**
 * Register the module and its form settings with new typography, border, align param settings provided in beaver builder version 2.2.
 * Applicable for BB version greater than 2.2 and UABB version 1.3.0 or later.
 *
 * Converted font, align, border settings to respective param setting.
 *
 * @package UABB Image Icon Module
 */

FLBuilder::register_module(
	'OxiImageIconModule',
	array(
		'general' => array( // Tab.
			'title'    => __( 'General', SA_FLBUILDER_TEXTDOMAIN ), // Tab title.
			'sections' => array( // Tab Sections.
				'type_general' => array( // Section.
					'title'  => __( 'Image/Icon', SA_FLBUILDER_TEXTDOMAIN ), // Section Title.
					'fields' => array( // Section Fields.
						'image_type' => array(
							'type'    => 'select',
							'label'   => __( 'Image Type', SA_FLBUILDER_TEXTDOMAIN ),
							'default' => 'icon',
							'options' => array(
								'icon'  => __( 'Icon', SA_FLBUILDER_TEXTDOMAIN ),
								'photo' => __( 'Photo', SA_FLBUILDER_TEXTDOMAIN ),
							),
							'toggle'  => array(
								'icon'  => array(
									'sections' => array( 'icon_basic', 'icon_style', 'iconbox_colors' ),
								),
								'photo' => array(
									'sections' => array( 'img_basic', 'img_style', 'imgbox_colors' ),
								),
							),
						),
					),
				),

				/* Icon Basic Setting */
				'icon_basic'   => array( // Section.
					'title'  => __( 'Icon Basics', SA_FLBUILDER_TEXTDOMAIN ), // Section Title.
					'fields' => array( // Section Fields.
						'icon'       => array(
							'type'        => 'icon',
							'label'       => __( 'Icon', SA_FLBUILDER_TEXTDOMAIN ),
							'default'     => 'ua-icon ua-icon-mail2',
							'show_remove' => true,
						),
						'icon_size'  => array(
							'type'        => 'unit',
							'label'       => __( 'Size', SA_FLBUILDER_TEXTDOMAIN ),
							'placeholder' => '30',
							'maxlength'   => '5',
							'size'        => '6',
							'slider'      => true,
							'units'       => array( 'px' ),
						),
						'icon_align' => array(
							'type'    => 'select',
							'label'   => __( 'Alignment', SA_FLBUILDER_TEXTDOMAIN ),
							'default' => 'center',
							'options' => array(
								'left'   => __( 'Left', SA_FLBUILDER_TEXTDOMAIN ),
								'center' => __( 'Center', SA_FLBUILDER_TEXTDOMAIN ),
								'right'  => __( 'Right', SA_FLBUILDER_TEXTDOMAIN ),
							),
						),
					),
				),
				/* Image Basic Setting */
				'img_basic'    => array( // Section.
					'title'  => __( 'Image Basics', SA_FLBUILDER_TEXTDOMAIN ), // Section Title.
					'fields' => array( // Section Fields.
						'photo_source' => array(
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
						'photo'        => array(
							'type'        => 'photo',
							'label'       => __( 'Photo', SA_FLBUILDER_TEXTDOMAIN ),
							'show_remove' => true,
							'connections' => array( 'photo' ),
						),
						'photo_url'    => array(
							'type'        => 'text',
							'label'       => __( 'Photo URL', SA_FLBUILDER_TEXTDOMAIN ),
							'placeholder' => 'http://www.example.com/my-photo.jpg',
							'connections' => array( 'url' ),
						),
						'img_size'     => array(
							'type'        => 'unit',
							'label'       => __( 'Size', SA_FLBUILDER_TEXTDOMAIN ),
							'placeholder' => 'auto',
							'maxlength'   => '5',
							'size'        => '6',
							'slider'      => true,
							'units'       => array( 'px' ),
						),
						'img_align'    => array(
							'type'    => 'select',
							'label'   => __( 'Alignment', SA_FLBUILDER_TEXTDOMAIN ),
							'default' => 'center',
							'options' => array(
								'left'   => __( 'Left', SA_FLBUILDER_TEXTDOMAIN ),
								'center' => __( 'Center', SA_FLBUILDER_TEXTDOMAIN ),
								'right'  => __( 'Right', SA_FLBUILDER_TEXTDOMAIN ),
							),
						),
					),
				),

				/* Icon Style Section */
				'icon_style'   => array(
					'title'  => 'Style',
					'fields' => array(
						/* Icon Style */
						'icon_style'            => array(
							'type'    => 'select',
							'label'   => __( 'Icon Background Style', SA_FLBUILDER_TEXTDOMAIN ),
							'default' => 'simple',
							'options' => array(
								'simple' => __( 'Simple', SA_FLBUILDER_TEXTDOMAIN ),
								'circle' => __( 'Circle Background', SA_FLBUILDER_TEXTDOMAIN ),
								'square' => __( 'Square Background', SA_FLBUILDER_TEXTDOMAIN ),
								'custom' => __( 'Design your own', SA_FLBUILDER_TEXTDOMAIN ),
							),
							'toggle'  => array(
								'simple' => array(
									'fields' => array(),
								),
								'circle' => array(
									'fields' => array( 'icon_color_preset', 'icon_bg_color', 'icon_bg_hover_color', 'icon_three_d' ),
								),
								'square' => array(
									'fields' => array( 'icon_color_preset', 'icon_bg_color', 'icon_bg_hover_color', 'icon_three_d' ),
								),
								'custom' => array(
									'fields' => array( 'icon_color_preset', 'icon_border_style', 'icon_bg_color', 'icon_bg_hover_color', 'icon_three_d', 'icon_bg_size', 'icon_bg_border_radius' ),
								),
							),
							'trigger' => array(
								'custom' => array(
									'fields' => array( 'icon_border_style' ),
								),
							),
						),

						/* Icon Background SIze */
						'icon_bg_size'          => array(
							'type'        => 'unit',
							'label'       => __( 'Background Size', SA_FLBUILDER_TEXTDOMAIN ),
							'help'        => __( 'Spacing between Icon & Background edge', SA_FLBUILDER_TEXTDOMAIN ),
							'maxlength'   => '3',
							'size'        => '6',
							'slider'      => true,
							'units'       => array( 'px' ),
							'placeholder' => '30',
						),

						/* Border Style and Radius for Icon */
						'icon_border_style'     => array(
							'type'    => 'select',
							'label'   => __( 'Border Style', SA_FLBUILDER_TEXTDOMAIN ),
							'default' => 'solid',
							'help'    => __( 'The type of border to use. Double borders must have a width of at least 3px to render properly.', SA_FLBUILDER_TEXTDOMAIN ),
							'options' => array(
								'none'   => __( 'None', SA_FLBUILDER_TEXTDOMAIN ),
								'solid'  => __( 'Solid', SA_FLBUILDER_TEXTDOMAIN ),
								'dashed' => __( 'Dashed', SA_FLBUILDER_TEXTDOMAIN ),
								'dotted' => __( 'Dotted', SA_FLBUILDER_TEXTDOMAIN ),
								'double' => __( 'Double', SA_FLBUILDER_TEXTDOMAIN ),
							),
							'toggle'  => array(
								'solid'  => array(
									'fields' => array( 'icon_border_width', 'icon_border_color', 'icon_border_hover_color' ),
								),
								'dashed' => array(
									'fields' => array( 'icon_border_width', 'icon_border_color', 'icon_border_hover_color' ),
								),
								'dotted' => array(
									'fields' => array( 'icon_border_width', 'icon_border_color', 'icon_border_hover_color' ),
								),
								'double' => array(
									'fields' => array( 'icon_border_width', 'icon_border_color', 'icon_border_hover_color' ),
								),
							),
						),
						'icon_border_width'     => array(
							'type'        => 'unit',
							'label'       => __( 'Border Width', SA_FLBUILDER_TEXTDOMAIN ),
							'default'     => '',
							'slider'      => true,
							'units'       => array( 'px' ),
							'maxlength'   => '3',
							'size'        => '6',
							'placeholder' => '1',
							
						),
						'icon_bg_border_radius' => array(
							'type'        => 'unit',
							'label'       => __( 'Border Radius', SA_FLBUILDER_TEXTDOMAIN ),
							'default'     => '',
							'slider'      => true,
							'units'       => array( 'px' ),
							'maxlength'   => '3',
							'size'        => '6',
							'placeholder' => '20',
							
						),
					),
				),

				/* Image Style Section */
				'img_style'    => array(
					'title'  => __( 'Style', SA_FLBUILDER_TEXTDOMAIN ),
					'fields' => array(
						/* Image Style */
						'image_style'          => array(
							'type'    => 'select',
							'label'   => __( 'Image Style', SA_FLBUILDER_TEXTDOMAIN ),
							'default' => 'simple',
							'help'    => __( 'Circle and Square style will crop your image in 1:1 ratio', SA_FLBUILDER_TEXTDOMAIN ),
							'options' => array(
								'simple' => __( 'Simple', SA_FLBUILDER_TEXTDOMAIN ),
								'circle' => __( 'Circle', SA_FLBUILDER_TEXTDOMAIN ),
								'square' => __( 'Square', SA_FLBUILDER_TEXTDOMAIN ),
								'custom' => __( 'Design your own', SA_FLBUILDER_TEXTDOMAIN ),
							),
							'toggle'  => array(
								'simple' => array(
									'fields' => array(),
								),
								'circle' => array(
									'fields' => array(),
								),
								'square' => array(
									'fields' => array(),
								),
								'custom' => array(
									'sections' => array( 'img_colors' ),
									'fields'   => array( 'img_bg_size', 'img_border_style', 'img_border_width', 'img_bg_border_radius' ),
								),
							),
							'trigger' => array(
								'custom' => array(
									'fields' => array( 'img_border_style' ),
								),

							),
						),

						/* Image Background Size */
						'img_width'          => array(
							'type'      => 'unit',
							'label'     => __( 'Image Width', SA_FLBUILDER_TEXTDOMAIN ),
							'default'   => '',
							'help'      => __( 'Spacing between Image edge & Background edge', SA_FLBUILDER_TEXTDOMAIN ),
							'maxlength' => '3',
							'size'      => '6',
							'slider'    => true,
							'units'     => array( 'px' ),
							
						),
                                            /* Image Background Size */
						'img_height'          => array(
							'type'      => 'unit',
							'label'     => __( 'Image Height', SA_FLBUILDER_TEXTDOMAIN ),
							'default'   => '',
							'help'      => __( 'Spacing between Image edge & Background edge', SA_FLBUILDER_TEXTDOMAIN ),
							'maxlength' => '3',
							'size'      => '6',
							'slider'    => true,
							'units'     => array( 'px' ),
							
						),

						/* Border Style and Radius for Image */
						'img_border_style'     => array(
							'type'    => 'select',
							'label'   => __( 'Border Style', SA_FLBUILDER_TEXTDOMAIN ),
							'default' => 'none',
							'help'    => __( 'The type of border to use. Double borders must have a width of at least 3px to render properly.', SA_FLBUILDER_TEXTDOMAIN ),
							'options' => array(
								'none'   => __( 'None', SA_FLBUILDER_TEXTDOMAIN ),
								'solid'  => __( 'Solid', SA_FLBUILDER_TEXTDOMAIN ),
								'dashed' => __( 'Dashed', SA_FLBUILDER_TEXTDOMAIN ),
								'dotted' => __( 'Dotted', SA_FLBUILDER_TEXTDOMAIN ),
								'double' => __( 'Double', SA_FLBUILDER_TEXTDOMAIN ),
							),
							'toggle'  => array(
								'solid'  => array(
									'fields' => array( 'img_border_width', 'img_border_radius', 'img_border_color', 'img_border_hover_color' ),
								),
								'dashed' => array(
									'fields' => array( 'img_border_width', 'img_border_radius', 'img_border_color', 'img_border_hover_color' ),
								),
								'dotted' => array(
									'fields' => array( 'img_border_width', 'img_border_radius', 'img_border_color', 'img_border_hover_color' ),
								),
								'double' => array(
									'fields' => array( 'img_border_width', 'img_border_radius', 'img_border_color', 'img_border_hover_color' ),
								),
							),
						),
						'img_border_width'     => array(
							'type'        => 'unit',
							'label'       => __( 'Border Width', SA_FLBUILDER_TEXTDOMAIN ),
							'slider'      => true,
							'units'       => array( 'px' ),
							'maxlength'   => '3',
							'size'        => '6',
							'placeholder' => '1',
							
						),
						'img_bg_border_radius' => array(
							'type'        => 'unit',
							'label'       => __( 'Border Radius', SA_FLBUILDER_TEXTDOMAIN ),
							'slider'      => true,
							'units'       => array( 'px' ),
							'maxlength'   => '3',
							'size'        => '6',
							'placeholder' => '0',
						),
					),
				),
				/* Icon Colors */
				'iconbox_colors'  => array( // Section.
					'title'  => __( 'Colors', SA_FLBUILDER_TEXTDOMAIN ), // Section Title.
					'fields' => array( // Section Fields.

						
						/* Icon Color */
						'icon_color'              => array(
							'type'        => 'color',
							'label'       => __( 'Icon Color', SA_FLBUILDER_TEXTDOMAIN ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
						),
						'icon_hover_color'        => array(
							'type'        => 'color',
							'label'       => __( 'Icon Hover Color', SA_FLBUILDER_TEXTDOMAIN ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
							'preview'     => array(
								'type' => 'none',
							),
						),

						/* Background Color Dependent on Icon Style **/
						'icon_bg_color'           => array(
							'type'        => 'color',
							'label'       => __( 'Background Color', SA_FLBUILDER_TEXTDOMAIN ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
						),
						'icon_bg_hover_color'     => array(
							'type'        => 'color',
							'label'       => __( 'Background Hover Color', SA_FLBUILDER_TEXTDOMAIN ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
							'preview'     => array(
								'type' => 'none',
							),
						),
						/* Border Color Dependent on Border Style for ICon */
						'icon_border_color'       => array(
							'type'        => 'color',
							'label'       => __( 'Border Color', SA_FLBUILDER_TEXTDOMAIN ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
						),
						'icon_border_hover_color' => array(
							'type'        => 'color',
							'label'       => __( 'Border Hover Color', SA_FLBUILDER_TEXTDOMAIN ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
						),

						
					),
				),

				/* Image Colors */
				'imgbox_colors'   => array( // Section.
					'title'  => __( 'Colors', SA_FLBUILDER_TEXTDOMAIN ), // Section Title.
					'fields' => array( // Section Fields.
						/* Background Color Dependent on Icon Style **/
						'img_bg_color'           => array(
							'type'        => 'color',
							'label'       => __( 'Background Color', SA_FLBUILDER_TEXTDOMAIN ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
						),
						'img_bg_hover_color'     => array(
							'type'        => 'color',
							'label'       => __( 'Background Hover Color', SA_FLBUILDER_TEXTDOMAIN ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
							'preview'     => array(
								'type' => 'none',
							),
						),
						/* Border Color Dependent on Border Style for Image */
						'img_border_color'       => array(
							'type'        => 'color',
							'label'       => __( 'Border Color', SA_FLBUILDER_TEXTDOMAIN ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
						),
						'img_border_hover_color' => array(
							'type'        => 'color',
							'label'       => __( 'Border Hover Color', SA_FLBUILDER_TEXTDOMAIN ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
						),
					),
				),

			),
		),
	)
);
