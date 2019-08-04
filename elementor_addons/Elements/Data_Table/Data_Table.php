<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Data_Table;

if (!defined('ABSPATH')) {
    exit;
}


use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Frontend;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Utils as Utils;
use \Elementor\Widget_Base as Widget_Base;


class Data_Table extends Widget_Base {

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function get_name() {
        return 'sa_el_data_table';
    }

    public function get_title() {
        return esc_html__('Data Table', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon() {
        return 'eicon-table  oxi-el-admin-icon';
    }

    public function get_categories() {
        return ['sa-el-addons'];
    }

    protected function _register_controls() {

        /**
         * Data Table Header
         */
        $this->start_controls_section(
                'sa_el_section_data_table_header', [
            'label' => esc_html__('Header', SA_ELEMENTOR_TEXTDOMAIN)
                ]
        );

        $this->add_control(
                'sa_el_section_data_table_enabled', [
            'label' => __('Enable Table Sorting', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => esc_html__('No', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => 'true',
                ]
        );
        $this->add_control(
                'sa_el_data_table_header_cols_data', [
            'type' => Controls_Manager::REPEATER,
            'seperator' => 'before',
            'default' => [
                ['sa_el_data_table_header_col' => 'Table Header'],
                ['sa_el_data_table_header_col' => 'Table Header'],
                ['sa_el_data_table_header_col' => 'Table Header'],
                ['sa_el_data_table_header_col' => 'Table Header'],
            ],
            'fields' => [
                [
                    'name' => 'sa_el_data_table_header_col',
                    'label' => esc_html__('Column Name', SA_ELEMENTOR_TEXTDOMAIN),
                    'default' => 'Table Header',
                    'type' => Controls_Manager::TEXT,
                    'label_block' => false,
                ],
                [
                    'name' => 'sa_el_data_table_header_col_span',
                    'label' => esc_html__('Column Span', SA_ELEMENTOR_TEXTDOMAIN),
                    'default' => '',
                    'type' => Controls_Manager::TEXT,
                    'label_block' => false,
                ],
                [
                    'name' => 'sa_el_data_table_header_col_icon_enabled',
                    'label' => esc_html__('Enable Header Icon', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __('yes', SA_ELEMENTOR_TEXTDOMAIN),
                    'label_off' => __('no', SA_ELEMENTOR_TEXTDOMAIN),
                    'default' => 'false',
                    'return_value' => 'true',
                ],
                [
                    'name' => 'sa_el_data_table_header_icon_type',
                    'label' => esc_html__('Header Icon Type', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'none' => [
                            'title' => esc_html__('None', SA_ELEMENTOR_TEXTDOMAIN),
                            'icon' => 'fa fa-ban',
                        ],
                        'icon' => [
                            'title' => esc_html__('Icon', SA_ELEMENTOR_TEXTDOMAIN),
                            'icon' => 'fa fa-star',
                        ],
                        'image' => [
                            'title' => esc_html__('Image', SA_ELEMENTOR_TEXTDOMAIN),
                            'icon' => 'fa fa-picture-o',
                        ],
                    ],
                    'default' => 'icon',
                    'condition' => [
                        'sa_el_data_table_header_col_icon_enabled' => 'true'
                    ]
                ],
                [
                    'name' => 'sa_el_data_table_header_col_icon',
                    'label' => esc_html__('Icon', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::ICON,
                    'default' => '',
                    'condition' => [
                        'sa_el_data_table_header_col_icon_enabled' => 'true',
                        'sa_el_data_table_header_icon_type' => 'icon'
                    ]
                ],
                [
                    'name' => 'sa_el_data_table_header_col_img',
                    'label' => esc_html__('Image', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
                        'sa_el_data_table_header_icon_type' => 'image'
                    ]
                ],
                [
                    'name' => 'sa_el_data_table_header_col_img_size',
                    'label' => esc_html__('Image Size(px)', SA_ELEMENTOR_TEXTDOMAIN),
                    'default' => '25',
                    'type' => Controls_Manager::NUMBER,
                    'label_block' => false,
                    'condition' => [
                        'sa_el_data_table_header_icon_type' => 'image'
                    ]
                ],
                [
                    'name' => 'sa_el_data_table_header_css_class',
                    'label' => esc_html__('CSS Class', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => false,
                ],
                [
                    'name' => 'sa_el_data_table_header_css_id',
                    'label' => esc_html__('CSS ID', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => false,
                ],
            ],
            'title_field' => '{{sa_el_data_table_header_col}}',
                ]
        );

        $this->end_controls_section();

        /**
         * Data Table Content
         */
        $this->start_controls_section(
                'sa_el_section_data_table_cotnent', [
            'label' => esc_html__('Content', SA_ELEMENTOR_TEXTDOMAIN)
                ]
        );

        $this->add_control(
                'sa_el_data_table_content_rows', [
            'type' => Controls_Manager::REPEATER,
            'seperator' => 'before',
            'default' => [
                ['sa_el_data_table_content_row_type' => 'row'],
                ['sa_el_data_table_content_row_type' => 'col'],
                ['sa_el_data_table_content_row_type' => 'col'],
                ['sa_el_data_table_content_row_type' => 'col'],
                ['sa_el_data_table_content_row_type' => 'col'],
            ],
            'fields' => [
                [
                    'name' => 'sa_el_data_table_content_row_type',
                    'label' => esc_html__('Row Type', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'row',
                    'label_block' => false,
                    'options' => [
                        'row' => esc_html__('Row', SA_ELEMENTOR_TEXTDOMAIN),
                        'col' => esc_html__('Column', SA_ELEMENTOR_TEXTDOMAIN),
                    ]
                ],
                [
                    'name' => 'sa_el_data_table_content_row_colspan',
                    'label' => esc_html__('Col Span', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::NUMBER,
                    'description' => esc_html__('Default: 1 (optional).'),
                    'default' => 1,
                    'min' => 1,
                    'label_block' => true,
                    'condition' => [
                        'sa_el_data_table_content_row_type' => 'col'
                    ]
                ],
                [
                    'name' => 'sa_el_data_table_content_row_rowspan',
                    'label' => esc_html__('Row Span', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::NUMBER,
                    'description' => esc_html__('Default: 1 (optional).'),
                    'default' => 1,
                    'min' => 1,
                    'label_block' => true,
                    'condition' => [
                        'sa_el_data_table_content_row_type' => 'col'
                    ]
                ],
                [
                    'name' => 'sa_el_data_table_content_type',
                    'label' => esc_html__('Content Type', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'textarea' => [
                            'title' => esc_html__('Textarea', SA_ELEMENTOR_TEXTDOMAIN),
                            'icon' => 'fa fa-text-width',
                        ],
                        'editor' => [
                            'title' => esc_html__('Editor', SA_ELEMENTOR_TEXTDOMAIN),
                            'icon' => 'fa fa-pencil',
                        ],
                        'template' => [
                            'title' => esc_html__('Templates', SA_ELEMENTOR_TEXTDOMAIN),
                            'icon' => 'fa fa-file',
                        ]
                    ],
                    'default' => 'textarea',
                    'condition' => [
                        'sa_el_data_table_content_row_type' => 'col'
                    ]
                ],
                [
                    'name' => 'sa_el_primary_templates_for_tables',
                    'label' => __('Choose Template', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::SELECT,
                    'options' => $this->get_elementor_page_templates(),
                    'condition' => [
                        'sa_el_data_table_content_type' => 'template',
                    ],
                ],
                [
                    'name' => 'sa_el_data_table_content_row_title',
                    'label' => esc_html__('Cell Text', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::TEXTAREA,
                    'label_block' => true,
                    'default' => esc_html__('Content', SA_ELEMENTOR_TEXTDOMAIN),
                    'condition' => [
                        'sa_el_data_table_content_row_type' => 'col',
                        'sa_el_data_table_content_type' => 'textarea'
                    ]
                ],
                [
                    'name' => 'sa_el_data_table_content_row_content',
                    'label' => esc_html__('Cell Text', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::WYSIWYG,
                    'label_block' => true,
                    'default' => esc_html__('Content', SA_ELEMENTOR_TEXTDOMAIN),
                    'condition' => [
                        'sa_el_data_table_content_row_type' => 'col',
                        'sa_el_data_table_content_type' => 'editor'
                    ]
                ],
                [
                    'name' => 'sa_el_data_table_content_row_title_link',
                    'label' => esc_html__('Link', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::URL,
                    'label_block' => true,
                    'default' => [
                        'url' => '',
                        'is_external' => '',
                    ],
                    'show_external' => true,
                    'separator' => 'before',
                    'condition' => [
                        'sa_el_data_table_content_row_type' => 'col',
                        'sa_el_data_table_content_type' => 'textarea'
                    ],
                ],
                [
                    'name' => 'sa_el_data_table_content_row_css_class',
                    'label' => esc_html__('CSS Class', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => false,
                    'condition' => [
                        'sa_el_data_table_content_row_type' => 'col'
                    ]
                ],
                [
                    'name' => 'sa_el_data_table_content_row_css_id',
                    'label' => esc_html__('CSS ID', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => false,
                    'condition' => [
                        'sa_el_data_table_content_row_type' => 'col'
                    ]
                ]
            ],
            'title_field' => '{{sa_el_data_table_content_row_type}}::{{sa_el_data_table_content_row_title || sa_el_data_table_content_row_content}}',
                ]
        );

        $this->end_controls_section();

       

        /**
         * -------------------------------------------
         * Tab Style (Data Table Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_section_data_table_style_settings', [
            'label' => esc_html__('General Style', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE
                ]
        );

        $this->add_responsive_control(
                'table_width', [
            'label' => __('Width', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 100,
                'unit' => '%',
            ],
            'size_units' => ['%', 'px'],
            'range' => [
                '%' => [
                    'min' => 1,
                    'max' => 100,
                ],
                'px' => [
                    'min' => 1,
                    'max' => 1200,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-data-table' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'table_alignment', [
            'label' => __('Alignment', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::CHOOSE,
            'label_block' => false,
            'default' => 'center',
            'options' => [
                'left' => [
                    'title' => __('Left', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-h-align-left',
                ],
                'center' => [
                    'title' => __('Center', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-h-align-center',
                ],
                'right' => [
                    'title' => __('Right', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-h-align-right',
                ],
            ],
            'prefix_class' => 'sa-el-table-align-',
                ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Data Table Header Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_section_data_table_title_style_settings', [
            'label' => esc_html__('Header Style', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE
                ]
        );


        $this->add_control(
                'sa_el_section_data_table_header_radius', [
            'label' => esc_html__('Header Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'max' => 50,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-data-table thead tr th:first-child' => 'border-radius: {{SIZE}}px 0px 0px 0px;',
                '{{WRAPPER}} .sa-el-data-table thead tr th:last-child' => 'border-radius: 0px {{SIZE}}px 0px 0px;',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_data_table_each_header_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-data-table .table-header th' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                '{{WRAPPER}} .sa-el-data-table tbody tr td .th-mobile-screen' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->start_controls_tabs('sa_el_data_table_header_title_clrbg');

        $this->start_controls_tab('sa_el_data_table_header_title_normal', ['label' => esc_html__('Normal', SA_ELEMENTOR_TEXTDOMAIN)]);

        $this->add_control(
                'sa_el_data_table_header_title_color', [
            'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .sa-el-data-table thead tr th' => 'color: {{VALUE}};',
                '{{WRAPPER}} table.dataTable thead .sorting:after' => 'color: {{VALUE}};',
                '{{WRAPPER}} table.dataTable thead .sorting_asc:after' => 'color: {{VALUE}};',
                '{{WRAPPER}} table.dataTable thead .sorting_desc:after' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_data_table_header_title_bg_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#00c6c7',
            'selectors' => [
                '{{WRAPPER}} .sa-el-data-table thead tr th' => 'background-color: {{VALUE}};'
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_data_table_header_border',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa-el-data-table thead tr th'
                ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab('sa_el_data_table_header_title_hover', ['label' => esc_html__('Hover', SA_ELEMENTOR_TEXTDOMAIN)]);

        $this->add_control(
                'sa_el_data_table_header_title_hover_color', [
            'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .sa-el-data-table thead tr th:hover' => 'color: {{VALUE}};',
                '{{WRAPPER}} table.dataTable thead .sorting:after:hover' => 'color: {{VALUE}};',
                '{{WRAPPER}} table.dataTable thead .sorting_asc:after:hover' => 'color: {{VALUE}};',
                '{{WRAPPER}} table.dataTable thead .sorting_desc:after:hover' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_data_table_header_title_hover_bg_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sa-el-data-table thead tr th:hover' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_data_table_header_hover_border',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa-el-data-table thead tr th:hover',
                ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_data_table_header_title_typography',
            'selector' => '{{WRAPPER}} .sa-el-data-table thead > tr th',
                ]
        );

        $this->add_responsive_control(
                'sa_el_data_table_header_title_alignment', [
            'label' => esc_html__('Title Alignment', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::CHOOSE,
            'label_block' => true,
            'options' => [
                'left' => [
                    'title' => esc_html__('Left', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-align-left',
                ],
                'center' => [
                    'title' => esc_html__('Center', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-align-center',
                ],
                'right' => [
                    'title' => esc_html__('Right', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-align-right',
                ],
            ],
            'default' => 'left',
            'prefix_class' => 'sa-el-dt-th-align-',
                ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Data Table Content Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_section_data_table_content_style_settings', [
            'label' => esc_html__('Content Style', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE
                ]
        );

        $this->start_controls_tabs('sa_el_data_table_content_row_cell_styles');

        $this->start_controls_tab('sa_el_data_table_odd_cell_style', ['label' => esc_html__('Normal', SA_ELEMENTOR_TEXTDOMAIN)]);

        $this->add_control(
                'sa_el_data_table_content_odd_style_heading', [
            'label' => esc_html__('ODD Cell', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
                ]
        );

        $this->add_control(
                'sa_el_data_table_content_color_odd', [
            'label' => esc_html__('Color ( Odd Row )', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#6d7882',
            'selectors' => [
                '{{WRAPPER}} .sa-el-data-table tbody > tr:nth-child(2n) td' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_data_table_content_bg_odd', [
            'label' => esc_html__('Background ( Odd Row )', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#f2f2f2',
            'selectors' => [
                '{{WRAPPER}} .sa-el-data-table tbody > tr:nth-child(2n) td' => 'background: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_data_table_content_even_style_heading', [
            'label' => esc_html__('Even Cell', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before'
                ]
        );

        $this->add_control(
                'sa_el_data_table_content_even_color', [
            'label' => esc_html__('Color ( Even Row )', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#6d7882',
            'selectors' => [
                '{{WRAPPER}} .sa-el-data-table tbody > tr:nth-child(2n+1) td' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_data_table_content_bg_even_color', [
            'label' => esc_html__('Background Color (Even Row)', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa-el-data-table tbody > tr:nth-child(2n+1) td' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_data_table_cell_border',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa-el-data-table tbody tr td',
            'separator' => 'before'
                ]
        );

        $this->add_responsive_control(
                'sa_el_data_table_each_cell_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-data-table tbody tr td' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab('sa_el_data_table_odd_cell_hover_style', ['label' => esc_html__('Hover', SA_ELEMENTOR_TEXTDOMAIN)]);

        $this->add_control(
                'sa_el_data_table_content_hover_color_odd', [
            'label' => esc_html__('Color ( Odd Row )', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sa-el-data-table tbody > tr:nth-child(2n) td:hover' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_data_table_content_hover_bg_odd', [
            'label' => esc_html__('Background ( Odd Row )', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sa-el-data-table tbody > tr:nth-child(2n) td:hover' => 'background: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_data_table_content_even_hover_style_heading', [
            'label' => esc_html__('Even Cell', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
                ]
        );

        $this->add_control(
                'sa_el_data_table_content_hover_color_even', [
            'label' => esc_html__('Color ( Even Row )', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#6d7882',
            'selectors' => [
                '{{WRAPPER}} .sa-el-data-table tbody > tr:nth-child(2n+1) td:hover' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_data_table_content_bg_even_hover_color', [
            'label' => esc_html__('Background Color (Even Row)', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa-el-data-table tbody > tr:nth-child(2n+1) td:hover' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_data_table_content_typography',
            'selector' => '{{WRAPPER}} .sa-el-data-table tbody tr td'
                ]
        );

        $this->add_control(
                'sa_el_data_table_content_link_typo', [
            'label' => esc_html__('Link Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before'
                ]
        );

        /* Table Content Link */
        $this->start_controls_tabs('sa_el_data_table_link_tabs');

        // Normal State Tab
        $this->start_controls_tab('sa_el_data_table_link_normal', ['label' => esc_html__('Normal', SA_ELEMENTOR_TEXTDOMAIN)]);

        $this->add_control(
                'sa_el_data_table_link_normal_text_color', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#c15959',
            'selectors' => [
                '{{WRAPPER}} .sa-el-data-table-wrap table td a' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->end_controls_tab();

        // Hover State Tab
        $this->start_controls_tab('sa_el_data_table_link_hover', ['label' => esc_html__('Hover', SA_ELEMENTOR_TEXTDOMAIN)]);

        $this->add_control(
                'sa_el_data_table_link_hover_text_color', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#6d7882',
            'selectors' => [
                '{{WRAPPER}} .sa-el-data-table-wrap table td a:hover' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control(
                'sa_el_data_table_content_alignment', [
            'label' => esc_html__('Content Alignment', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::CHOOSE,
            'label_block' => true,
            'options' => [
                'left' => [
                    'title' => esc_html__('Left', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-align-left',
                ],
                'center' => [
                    'title' => esc_html__('Center', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-align-center',
                ],
                'right' => [
                    'title' => esc_html__('Right', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-align-right',
                ],
            ],
            'default' => 'left',
            'prefix_class' => 'sa-el-dt-td-align-',
                ]
        );
        $this->end_controls_section();


        /**
         * -------------------------------------------
         * Responsive Style (Data Table Content Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_section_data_table_responsive_style_settings', [
            'label' => esc_html__('Responsive Options', SA_ELEMENTOR_TEXTDOMAIN),
            'devices' => ['tablet', 'mobile'],
            'tab' => Controls_Manager::TAB_STYLE
                ]
        );

        $this->add_control(
                'sa_el_enable_responsive_header_styles', [
            'label' => __('Enable Responsive Table', SA_ELEMENTOR_TEXTDOMAIN),
            'description' => esc_html__('If enabled, table header will be automatically responsive for mobile.', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => esc_html__('No', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => 'yes',
                ]
        );

        $this->add_responsive_control(
                'mobile_table_header_width', [
            'label' => __('Width', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 100,
                'unit' => 'px',
            ],
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 200,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-data-table .th-mobile-screen' => 'flex-basis: {{SIZE}}px;',
            ],
            'condition' => [
                'sa_el_enable_responsive_header_styles' => 'yes'
            ]
                ]
        );

        $this->add_responsive_control(
                'sa_el_data_table_responsive_header_color', [
            'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa-el-data-table tbody .th-mobile-screen' => 'color: {{VALUE}};'
            ],
            'condition' => [
                'sa_el_enable_responsive_header_styles' => 'yes'
            ]
                ]
        );

        $this->add_responsive_control(
                'sa_el_data_table_responsive_header_bg_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa-el-data-table tbody .th-mobile-screen' => 'background-color: {{VALUE}};'
            ],
            'condition' => [
                'sa_el_enable_responsive_header_styles' => 'yes'
            ]
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_data_table_responsive_header_typography',
            'selector' => '{{WRAPPER}} .sa-el-data-table .th-mobile-screen',
            'condition' => [
                'sa_el_enable_responsive_header_styles' => 'yes'
            ]
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_data_table_responsive_header_border',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} tbody td .th-mobile-screen',
            'condition' => [
                'sa_el_enable_responsive_header_styles' => 'yes'
            ]
                ]
        );


        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings();

        $table_tr = [];
        $table_td = [];

        // Storing Data table content values
        foreach ($settings['sa_el_data_table_content_rows'] as $content_row) {

            $row_id = uniqid();
            if ($content_row['sa_el_data_table_content_row_type'] == 'row') {
                $table_tr[] = [
                    'id' => $row_id,
                    'type' => $content_row['sa_el_data_table_content_row_type'],
                ];
            }
            if ($content_row['sa_el_data_table_content_row_type'] == 'col') {
                $target = $content_row['sa_el_data_table_content_row_title_link']['is_external'] ? 'target="_blank"' : '';
                $nofollow = $content_row['sa_el_data_table_content_row_title_link']['nofollow'] ? 'rel="nofollow"' : '';

                $table_tr_keys = array_keys($table_tr);
                $last_key = end($table_tr_keys);

                $tbody_content = ($content_row['sa_el_data_table_content_type'] == 'editor') ? $content_row['sa_el_data_table_content_row_content'] : $content_row['sa_el_data_table_content_row_title'];

                $table_td[] = [
                    'row_id' => $table_tr[$last_key]['id'],
                    'type' => $content_row['sa_el_data_table_content_row_type'],
                    'content_type' => $content_row['sa_el_data_table_content_type'],
                    'template' => $content_row['sa_el_primary_templates_for_tables'],
                    'title' => $tbody_content,
                    'link_url' => $content_row['sa_el_data_table_content_row_title_link']['url'],
                    'link_target' => $target,
                    'nofollow' => $nofollow,
                    'colspan' => $content_row['sa_el_data_table_content_row_colspan'],
                    'rowspan' => $content_row['sa_el_data_table_content_row_rowspan'],
                    'tr_class' => $content_row['sa_el_data_table_content_row_css_class'],
                    'tr_id' => $content_row['sa_el_data_table_content_row_css_id']
                ];
            }
        }
        $table_th_count = count($settings['sa_el_data_table_header_cols_data']);
        $this->add_render_attribute('sa_el_data_table_wrap', [
            'class' => 'sa-el-data-table-wrap',
            'data-table_id' => esc_attr($this->get_id()),
            'data-custom_responsive' => $settings['sa_el_enable_responsive_header_styles'] ? 'true' : 'false'
        ]);
       
            $this->add_render_attribute('sa_el_data_table_wrap', 'data-table_enabled', 'true');
   
        $this->add_render_attribute('sa_el_data_table', [
            'class' => ['tablesorter sa-el-data-table', esc_attr($settings['table_alignment'])],
            'id' => 'sa-el-data-table-' . esc_attr($this->get_id())
        ]);

        $this->add_render_attribute('td_content', [
            'class' => 'td-content'
        ]);

        if ('yes' == $settings['sa_el_enable_responsive_header_styles']) {
            $this->add_render_attribute('sa_el_data_table_wrap', 'class', 'custom-responsive-option-enable');
        }
        ?>
        <div <?php echo $this->get_render_attribute_string('sa_el_data_table_wrap'); ?>>
            <table <?php echo $this->get_render_attribute_string('sa_el_data_table'); ?>>
                <thead>
                    <tr class="table-header">
                        <?php
                        $i = 0;
                        foreach ($settings['sa_el_data_table_header_cols_data'] as $header_title) :
                            $this->add_render_attribute('th_class' . $i, [
                                'class' => [$header_title['sa_el_data_table_header_css_class']],
                                'id' => $header_title['sa_el_data_table_header_css_id'],
                                'colspan' => $header_title['sa_el_data_table_header_col_span']
                            ]);

                           
                                $this->add_render_attribute('th_class' . $i, 'class', 'sorting');
                           
                            ?>
                            <th <?php echo $this->get_render_attribute_string('th_class' . $i); ?>>
                                <?php
                                if ($header_title['sa_el_data_table_header_col_icon_enabled'] == 'true' && $header_title['sa_el_data_table_header_icon_type'] == 'icon') :
                                    $this->add_render_attribute('table_header_col_icon' . $i, [
                                        'class' => ['data-header-icon', esc_attr($header_title['sa_el_data_table_header_col_icon'])]
                                    ]);
                                    ?>
                                    <i <?php echo $this->get_render_attribute_string('table_header_col_icon' . $i); ?>></i>
                                <?php endif; ?>
                                <?php
                                if ($header_title['sa_el_data_table_header_col_icon_enabled'] == 'true' && $header_title['sa_el_data_table_header_icon_type'] == 'image') :
                                    $this->add_render_attribute('data_table_th_img' . $i, [
                                        'src' => esc_url($header_title['sa_el_data_table_header_col_img']['url']),
                                        'class' => 'sa-el-data-table-th-img',
                                        'style' => "width:{$header_title['sa_el_data_table_header_col_img_size']}px;",
                                        'alt' => esc_attr(get_post_meta($header_title['sa_el_data_table_header_col_img']['id'], '_wp_attachment_image_alt', true))
                                    ]);
                                    ?><img <?php echo $this->get_render_attribute_string('data_table_th_img' . $i); ?>><?php endif; ?><?php echo __($header_title['sa_el_data_table_header_col'], SA_ELEMENTOR_TEXTDOMAIN); ?></th>
                                <?php $i++;
                            endforeach;
                            ?>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($table_tr); $i++) : ?>
                        <tr>
                            <?php
                            for ($j = 0; $j < count($table_td); $j++) {
                                if ($table_tr[$i]['id'] == $table_td[$j]['row_id']) {

                                    $this->add_render_attribute('table_inside_td' . $i . $j, [
                                        'colspan' => $table_td[$j]['colspan'] > 1 ? $table_td[$j]['colspan'] : '',
                                        'rowspan' => $table_td[$j]['rowspan'] > 1 ? $table_td[$j]['rowspan'] : '',
                                        'class' => $table_td[$j]['tr_class'],
                                        'id' => $table_td[$j]['tr_id']
                                            ]
                                    );
                                    ?>
                                    <?php if ($table_td[$j]['content_type'] == 'textarea' && !empty($table_td[$j]['link_url'])) : ?>
                                        <td <?php echo $this->get_render_attribute_string('table_inside_td' . $i . $j); ?>>
                                            <div class="td-content-wrapper">
                                                <a href="<?php echo esc_url($table_td[$j]['link_url']); ?>" <?php echo $table_td[$j]['link_target'] ?> <?php echo $table_td[$j]['nofollow'] ?>><?php echo wp_kses_post($table_td[$j]['title']); ?></a>
                                            </div>
                                        </td>

                                    <?php elseif ($table_td[$j]['content_type'] == 'template' && !empty($table_td[$j]['template'])) : ?>
                                        <td <?php echo $this->get_render_attribute_string('table_inside_td' . $i . $j); ?>>
                                            <div class="td-content-wrapper">
                                                <div <?php echo $this->get_render_attribute_string('td_content'); ?>>
                                                    <?php
                                                    $sa_el_frontend = new Frontend;
                                                    echo $sa_el_frontend->get_builder_content(intval($table_td[$j]['template']), true);
                                                    ?>
                                                </div>
                                            </div>
                                        </td>
                                    <?php else: ?>
                                        <td <?php echo $this->get_render_attribute_string('table_inside_td' . $i . $j); ?>>
                                            <div class="td-content-wrapper"><div <?php echo $this->get_render_attribute_string('td_content'); ?>><?php echo $table_td[$j]['title']; ?></div></div>
                                        </td>
                                    <?php endif; ?>
                                    <?php
                                }
                            }
                            ?>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
        <?php
    }

    protected function content_template() {
        
    }

}
