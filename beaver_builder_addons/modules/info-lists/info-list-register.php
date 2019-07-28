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
	'OxiInfoListModule',
	array(
		'info_list_item'    => array( // Tab.
			'title'    => __( 'List Item', SA_FLBUILDER_TEXTDOMAIN ), // Tab title.
			'sections' => array( // Tab Sections.
				'info_list_general' => array( // Section.
					'title'  => '', // Section Title.
					'fields' => array( // Section Fields.
						'add_list_item' => array(
							'type'         => 'form',
							'label'        => __( 'List Item', SA_FLBUILDER_TEXTDOMAIN ),
							'form'         => 'oxi_sa_info_list_item_form',
							'preview_text' => 'list_item_title',
							'multiple'     => true,
						),
					),
				),
			),
		),

		'info_list_general' => array( // Tab.
			'title'    => __( 'General', SA_FLBUILDER_TEXTDOMAIN ), // Tab title.
			'sections' => array( // Tab Sections.
				'info_list_general'   => array( // Section.
					'title'  => __( 'List Settings', SA_FLBUILDER_TEXTDOMAIN ), // Section Title.
					'fields' => array( // Section Fields.
						'icon_position'              => array(
							'type'    => 'select',
							'label'   => __( 'Icon / Image Position', SA_FLBUILDER_TEXTDOMAIN ),
							'default' => 'left',
							'options' => array(
								'left'  => __( 'Icon to the left', SA_FLBUILDER_TEXTDOMAIN ),
								'right' => __( 'Icon to the right', SA_FLBUILDER_TEXTDOMAIN ),
								'top'   => __( 'Icon at top', SA_FLBUILDER_TEXTDOMAIN ),
							),
							'toggle'  => array(
								'left'  => array(
									'fields' => array( 'align_items', 'mobile_view' ),
								),
								'right' => array(
									'fields' => array( 'align_items', 'mobile_view' ),
								),
							),
						),
						'align_items'                => array(
							'type'    => 'select',
							'label'   => __( 'Icon Vertical Alignment', SA_FLBUILDER_TEXTDOMAIN ),
							'default' => 'top',
							'options' => array(
								'center' => __( 'Center', SA_FLBUILDER_TEXTDOMAIN ),
								'top'    => __( 'Top', SA_FLBUILDER_TEXTDOMAIN ),
							),
						),
						'mobile_view'                => array(
							'type'    => 'select',
							'label'   => __( 'Mobile Structure', SA_FLBUILDER_TEXTDOMAIN ),
							'default' => '',
							'options' => array(
								''      => __( 'Inline', SA_FLBUILDER_TEXTDOMAIN ),
								'stack' => __( 'Stack', SA_FLBUILDER_TEXTDOMAIN ),
							),
							'preview' => array(
								'type' => 'none',
							),
						),
						'icon_image_size'            => array(
							'type'        => 'unit',
							'label'       => __( 'Icon / Image Size', SA_FLBUILDER_TEXTDOMAIN ),
							'slider'      => true,
							'units'       => array( 'px' ),
							'size'        => '8',
							'placeholder' => '75',
						),
						'space_between_elements'     => array(
							'type'        => 'unit',
							'label'       => __( 'Space Between Two Elements', SA_FLBUILDER_TEXTDOMAIN ),
							'slider'      => true,
							'units'       => array( 'px' ),
							'size'        => '8',
							'placeholder' => '20',
						),
						'list_icon_style'            => array(
							'type'        => 'select',
							'label'       => __( 'Icon / Image Style', SA_FLBUILDER_TEXTDOMAIN ),
							'default'     => 'simple',
							'description' => '',
							'options'     => array(
								'simple' => __( 'Simple', SA_FLBUILDER_TEXTDOMAIN ),
								'square' => __( 'Square', SA_FLBUILDER_TEXTDOMAIN ),
								'circle' => __( 'Circle', SA_FLBUILDER_TEXTDOMAIN ),
								'custom' => __( 'Design your own', SA_FLBUILDER_TEXTDOMAIN ),
							),
							'toggle'      => array(
								'circle' => array(
									'fields' => array( 'list_icon_bg_color', 'list_icon_bg_color_opc' ),
								),
								'square' => array(
									'fields' => array( 'list_icon_bg_color', 'list_icon_bg_color_opc' ),
								),
								'custom' => array(
									'fields' => array( 'list_icon_bg_color', 'list_icon_bg_color_opc', 'list_icon_bg_size', 'list_icon_bg_border_radius', 'list_icon_bg_padding', 'list_icon_border_style' ),
								),
							),
						),
						'list_icon_bg_color'         => array(
							'type'        => 'color',
							'label'       => __( 'Color Option for Background', SA_FLBUILDER_TEXTDOMAIN ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
						),
						'list_icon_bg_color_opc'     => array(
							'type'      => 'unit',
							'label'     => __( 'Opacity', SA_FLBUILDER_TEXTDOMAIN ),
							'default'   => '',
							'slider'    => true,
							'units'     => array( 'px' ),
							'maxlength' => '3',
							'size'      => '5',
						),
						'list_icon_bg_border_radius' => array(
							'type'        => 'unit',
							'label'       => __( 'Border Radius ( For Background )', SA_FLBUILDER_TEXTDOMAIN ),
							'maxlength'   => '3',
							'size'        => '4',
							'placeholder' => '0',
							'slider'      => true,
							'units'       => array( 'px' ),
						),

						'list_icon_bg_padding'       => array(
							'type'        => 'unit',
							'label'       => __( 'Padding ( For Background )', SA_FLBUILDER_TEXTDOMAIN ),
							'maxlength'   => '3',
							'size'        => '4',
							'placeholder' => '10',
							'slider'      => true,
							'units'       => array( 'px' ),
						),
						'list_icon_border_style'     => array(
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
						),
						'list_icon_border_width'     => array(
							'type'        => 'unit',
							'label'       => __( 'Border Width', SA_FLBUILDER_TEXTDOMAIN ),
							'slider'      => true,
							'units'       => array( 'px' ),
							'maxlength'   => '3',
							'size'        => '6',
							'placeholder' => '1',
						),
						'list_icon_border_color'     => array(
							'type'        => 'color',
							'label'       => __( 'Border Color', SA_FLBUILDER_TEXTDOMAIN ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
						),
						'list_icon_animation'        => array(
							'type'        => 'select',
							'label'       => __( 'Image/Icon Animation', SA_FLBUILDER_TEXTDOMAIN ),
							'description' => '',
							'help'        => __( 'Select whether you want to animate image/icon or not', SA_FLBUILDER_TEXTDOMAIN ),
							'default'     => 'no',
							'options'     => array(
								'yes' => __( 'Yes', SA_FLBUILDER_TEXTDOMAIN ),
								'no'  => __( 'No', SA_FLBUILDER_TEXTDOMAIN ),
							),
						),
					),
				),
				'info_list_connector' => array( // Section.
					'title'  => __( 'List Connector', SA_FLBUILDER_TEXTDOMAIN ), // Section Title.
					'fields' => array( // Section Fields.
						'list_connector_option' => array(
							'type'        => 'select',
							'label'       => __( 'Show Connector', SA_FLBUILDER_TEXTDOMAIN ),
							'description' => '',
							'help'        => __( 'Select whether you would like to show connector on list items.', SA_FLBUILDER_TEXTDOMAIN ),
							'default'     => 'yes',
							'options'     => array(
								'yes' => __( 'Yes', SA_FLBUILDER_TEXTDOMAIN ),
								'no'  => __( 'No', SA_FLBUILDER_TEXTDOMAIN ),
							),
							'toggle'      => array(
								'yes' => array(
									'fields' => array( 'list_connector_color', 'list_connector_style' ),
								),
							),

						),
						'list_connector_color'  => array(
							'type'        => 'color',
							'label'       => __( 'Connector Line Color', SA_FLBUILDER_TEXTDOMAIN ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
						),
						'list_connector_style'  => array(
							'type'        => 'select',
							'label'       => __( 'Connector Line Style', SA_FLBUILDER_TEXTDOMAIN ),
							'description' => '',
							'default'     => 'solid',
							'options'     => array(
								'solid'  => __( 'Solid', SA_FLBUILDER_TEXTDOMAIN ),
								'dashed' => __( 'Dashed', SA_FLBUILDER_TEXTDOMAIN ),
								'dotted' => __( 'Dotted', SA_FLBUILDER_TEXTDOMAIN ),
							),
						),
					),
				),
			),
		),

		'info_list_style'   => array( // Tab.
			'title'    => __( 'Typography', SA_FLBUILDER_TEXTDOMAIN ), // Tab title.
			'sections' => array( // Tab Sections.
				'heading_typography'     => array(
					'title'  => __( 'Title', SA_FLBUILDER_TEXTDOMAIN ),
					'fields' => array(
						'heading_tag_selection' => array(
							'type'    => 'select',
							'label'   => __( 'Select Tag', SA_FLBUILDER_TEXTDOMAIN ),
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
						'heading_font_typo'     => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', SA_FLBUILDER_TEXTDOMAIN ),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.uabb-info-list-title,.uabb-info-list-title a',
								'important' => true,
							),
						),
						'heading_color'         => array(
							'type'        => 'color',
							'default'     => '',
							'show_reset'  => true,
							'label'       => __( 'Choose Color', SA_FLBUILDER_TEXTDOMAIN ),
							'connections' => array( 'color' ),
							'show_alpha'  => true,
							'preview'     => array(
								'type'     => 'css',
								'selector' => '.uabb-info-list-title',
								'property' => 'color',
							),
						),
						'heading_margin_top'    => array(
							'label'      => __( 'Margin Top', SA_FLBUILDER_TEXTDOMAIN ),
							'type'       => 'unit',
							'size'       => '8',
							'slider'     => true,
							'units'      => array( 'px' ),
							'max_length' => '3',
						),
						'heading_margin_bottom' => array(
							'label'      => __( 'Margin Bottom', SA_FLBUILDER_TEXTDOMAIN ),
							'type'       => 'unit',
							'size'       => '8',
							'slider'     => true,
							'units'      => array( 'px' ),
							'max_length' => '3',
						),
					),
				),
				'description_typography' => array(
					'title'  => __( 'Description', SA_FLBUILDER_TEXTDOMAIN ),
					'fields' => array(
						'description_font_typo' => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', SA_FLBUILDER_TEXTDOMAIN ),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.uabb-info-list-description *',
								'important' => true,
							),
						),
						'description_color'     => array(
							'type'        => 'color',
							'label'       => __( 'Choose Color', SA_FLBUILDER_TEXTDOMAIN ),
							'preview'     => array(
								'type'     => 'css',
								'selector' => '.uabb-info-list-content .uabb-info-list-description *',
								'property' => 'color',
							),
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


// Add List Items.
FLBuilder::register_settings_form(
	'oxi_sa_info_list_item_form',
	array(
		'title' => __( 'Add List Item', SA_FLBUILDER_TEXTDOMAIN ),
		'tabs'  => array(
			'list_item_general' => array(
				'title'    => __( 'General', SA_FLBUILDER_TEXTDOMAIN ),
				'sections' => array(
					'title' => array(
						'title'  => __( 'General Settings', SA_FLBUILDER_TEXTDOMAIN ),
						'fields' => array(
							'list_item_title'       => array(
								'type'        => 'text',
								'label'       => __( 'Title', SA_FLBUILDER_TEXTDOMAIN ),
								'description' => '',
								'default'     => __( 'Name of the element', SA_FLBUILDER_TEXTDOMAIN ),
								'help'        => __( 'Provide a title for this icon list item.', SA_FLBUILDER_TEXTDOMAIN ),
								'placeholder' => __( 'Title', SA_FLBUILDER_TEXTDOMAIN ),
								'class'       => 'uabb-list-item-title',
								'connections' => array( 'string', 'html' ),
							),
							'list_item_url'         => array(
								'type'          => 'link',
								'label'         => __( 'Link', SA_FLBUILDER_TEXTDOMAIN ),
								'connections'   => array( 'url' ),
								'show_target'   => true,
								'show_nofollow' => true,
							),
							'list_item_link'        => array(
								'type'    => 'select',
								'label'   => __( 'Apply Link To', SA_FLBUILDER_TEXTDOMAIN ),
								'default' => 'no',
								'options' => array(
									'no'         => __( 'No Link', SA_FLBUILDER_TEXTDOMAIN ),
									'complete'   => __( 'Complete Box', SA_FLBUILDER_TEXTDOMAIN ),
									'list-title' => __( 'List Title', SA_FLBUILDER_TEXTDOMAIN ),
									'icon'       => __( 'Icon', SA_FLBUILDER_TEXTDOMAIN ),
								),
								'preview' => 'none',
							),
							'list_item_description' => array(
								'type'        => 'editor',
								'default'     => __( 'Enter description text here.', SA_FLBUILDER_TEXTDOMAIN ),
								'label'       => '',
								'rows'        => 13,
								'connections' => array( 'string', 'html' ),
							),
						),
					),
				),
			),

			'list_item_image'   => array(
				'title'    => __( 'Icon / Image', SA_FLBUILDER_TEXTDOMAIN ),
				'sections' => array(
					'title'      => array(
						'title'  => __( 'Icon / Image', SA_FLBUILDER_TEXTDOMAIN ),
						'fields' => array(
							'image_type' => array(
								'type'    => 'select',
								'label'   => __( 'Image Type', SA_FLBUILDER_TEXTDOMAIN ),
								'default' => 'none',
								'options' => array(
									'none'  => __( 'None', SA_FLBUILDER_TEXTDOMAIN ),
									'icon'  => __( 'Icon', SA_FLBUILDER_TEXTDOMAIN ),
									'photo' => __( 'Photo', SA_FLBUILDER_TEXTDOMAIN ),
								),
								'toggle'  => array(
									'icon'  => array(
										'sections' => array( 'icon_basic', 'icon_style', 'icon_colors' ),
									),
									'photo' => array(
										'sections' => array( 'img_basic', 'img_style' ),
									),
								),
							),
						),
					),
					/* Icon Basic Setting */
					'icon_basic' => array( // Section.
						'title'  => __( 'Icon', SA_FLBUILDER_TEXTDOMAIN ), // Section Title.
						'fields' => array( // Section Fields.
							'icon'       => array(
								'type'        => 'icon',
								'label'       => __( 'Icon', SA_FLBUILDER_TEXTDOMAIN ),
								'show_remove' => true,
							),
							'icon_color' => array(
								'type'        => 'color',
								'label'       => __( 'Icon Color', SA_FLBUILDER_TEXTDOMAIN ),
								'default'     => '',
								'show_reset'  => true,
								'connections' => array( 'color' ),
								'show_alpha'  => true,
							),
                                                    'icon_BG_color' => array(
								'type'        => 'color',
								'label'       => __( 'Background Color', SA_FLBUILDER_TEXTDOMAIN ),
								'default'     => '#fff',
								'show_reset'  => true,
								'connections' => array( 'color' ),
								'show_alpha'  => true,
							),
                                                       
						),
					),
					/* Image Basic Setting */
					'img_basic'  => array( // Section.
						'title'  => __( 'Image', SA_FLBUILDER_TEXTDOMAIN ), // Section Title.
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
							),
						),
					),
				),
			),
		),
	)
);
