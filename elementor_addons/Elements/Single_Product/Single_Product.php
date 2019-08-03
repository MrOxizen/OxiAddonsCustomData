<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Single_Product;

if (!defined('ABSPATH')) {
    exit;
}

use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Group_Control_Background as Group_Control_Background;
use \Elementor\Scheme_Typography as Scheme_Typography;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Utils as Utils;
use \Elementor\Widget_Base as Widget_Base;

class Single_Product extends Widget_Base {

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function get_name() {
        return 'sa_el_single_product';
    }

    public function get_title() {
        return esc_html__('Single Product', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon() {
        return 'eicon-image-box oxi-el-admin-icon';
    }

    public function get_categories() {
        return ['sa-el-addons'];
    }

    protected function _register_controls() {

        // Content Controls
        $this->start_controls_section(
                'sa_el_section_static_product_content', [
            'label' => esc_html__('Product Details', SA_ELEMENTOR_TEXTDOMAIN)
                ]
        );


        $this->add_control(
                'sa_el_static_product_image', [
            'label' => __('Product Image', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
                ]
        );


        $this->add_control(
                'sa_el_static_product_heading', [
            'label' => __('Product Heading', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => 'Product Name',
            'placeholder' => __('Enter heading for the product', SA_ELEMENTOR_TEXTDOMAIN),
            'title' => __('Enter heading for the product', SA_ELEMENTOR_TEXTDOMAIN),
            'dynamic' => ['active' => true]
                ]
        );

        $this->add_control(
                'sa_el_static_product_description', [
            'label' => __('Product Description', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::WYSIWYG,
            'default' => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );


        $this->add_control(
                'sa_el_static_product_title_buttons', [
            'label' => __('Links & Buttons', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
                ]
        );

        $this->add_control(
                'sa_el_static_product_link_url', [
            'label' => __('Product Link URL', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => '#',
            'placeholder' => __('Enter link URL for the promo', SA_ELEMENTOR_TEXTDOMAIN),
            'title' => __('Enter URL for the product', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'sa_el_static_product_link_target', [
            'label' => esc_html__('Open in new window?', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('_blank', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('_self', SA_ELEMENTOR_TEXTDOMAIN),
            'default' => '_self',
                ]
        );

        $this->add_control(
                'sa_el_static_product_demo_link_url', [
            'label' => __('Live Demo URL', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => '#',
            'placeholder' => __('Enter link URL for live demo', SA_ELEMENTOR_TEXTDOMAIN),
            'title' => __('Enter URL for the promo', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'sa_el_static_product_demo_text', [
            'label' => esc_html__('Live Demo Text', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('Live Demo', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'sa_el_static_product_demo_link_target', [
            'label' => esc_html__('Open in new window?', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('_blank', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('_self', SA_ELEMENTOR_TEXTDOMAIN),
            'default' => '_blank',
                ]
        );

        // generate details button

        $this->add_control(
                'sa_el_static_product_show_details_btn', [
            'label' => esc_html__('Show Details Button?', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('yes', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('no', SA_ELEMENTOR_TEXTDOMAIN),
            'default' => 'yes',
            'separator' => 'before',
                ]
        );

        $this->add_control(
                'sa_el_static_product_btn', [
            'label' => esc_html__('Button Text', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('View Details', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'sa_el_static_product_show_details_btn' => 'yes',
            ],
                ]
        );

        $this->add_control(
                'sa_el_static_product_btn_icon', [
            'label' => esc_html__('Icon', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::ICON,
            'condition' => [
                'sa_el_static_product_show_details_btn' => 'yes',
            ],
                ]
        );

        $this->add_control(
                'sa_el_static_product_btn_icon_align', [
            'label' => esc_html__('Icon Position', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'left',
            'options' => [
                'left' => esc_html__('Before', SA_ELEMENTOR_TEXTDOMAIN),
                'right' => esc_html__('After', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'condition' => [
                'sa_el_static_product_show_details_btn' => 'yes',
            ],
                ]
        );

        $this->add_control(
                'sa_el_static_product_btn_icon_indent', [
            'label' => esc_html__('Icon Spacing', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'max' => 50,
                ],
            ],
            'condition' => [
                'sa_el_static_product_show_details_btn' => 'yes',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-single-product-button-icon-right' => 'margin-left: {{SIZE}}px;',
                '{{WRAPPER}} .sa-el-single-product-button-icon-left' => 'margin-right: {{SIZE}}px;',
            ],
                ]
        );



        $this->add_control(
                'sa_el_static_product_btn_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-single-product-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'sa_el_static_product_show_details_btn' => 'yes',
            ],
                ]
        );

        $this->add_control(
                'sa_el_static_product_btn_border_radius', [
            'label' => esc_html__('Button Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-single-product-btn' => 'border-radius: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'sa_el_static_product_show_details_btn' => 'yes',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_static_product_btn_typography',
            'scheme' => Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .sa-el-single-product-btn',
            'condition' => [
                'sa_el_static_product_show_details_btn' => 'yes',
            ],
                ]
        );

        $this->start_controls_tabs('sa_el_static_product_btn_content_tabs');

        $this->start_controls_tab('normal_default_content', ['label' => esc_html__('Normal', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'sa_el_static_product_show_details_btn' => 'yes',
            ],
                ]
        );

        $this->add_control(
                'sa_el_static_product_btn_text_color', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .sa-el-single-product-btn' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'sa_el_static_product_show_details_btn' => 'yes',
            ],
                ]
        );



        $this->add_control(
                'sa_el_static_product_btn_background_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#ff1e05',
            'selectors' => [
                '{{WRAPPER}} .sa-el-single-product-btn' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'sa_el_static_product_show_details_btn' => 'yes',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_static_product_btn_border',
            'selector' => '{{WRAPPER}} .sa-el-single-product-btn',
            'condition' => [
                'sa_el_static_product_show_details_btn' => 'yes',
            ],
                ]
        );


        $this->end_controls_tab();

        $this->start_controls_tab('sa_el_static_product_btn_hover', [
            'label' => esc_html__('Hover', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'sa_el_static_product_show_details_btn' => 'yes',
            ],
                ]
        );

        $this->add_control(
                'sa_el_static_product_btn_hover_text_color', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .sa-el-single-product-btn:hover' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'sa_el_static_product_show_details_btn' => 'yes',
            ],
                ]
        );

        $this->add_control(
                'sa_el_static_product_btn_hover_background_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#272727',
            'selectors' => [
                '{{WRAPPER}} .sa-el-single-product-btn:hover' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'sa_el_static_product_show_details_btn' => 'yes',
            ],
                ]
        );

        $this->add_control(
                'sa_el_static_product_btn_hover_border_color', [
            'label' => esc_html__('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sa-el-single-product-btn:hover' => 'border-color: {{VALUE}};',
            ],
            'condition' => [
                'sa_el_static_product_show_details_btn' => 'yes',
            ],
                ]
        );
        // generate button end


        $this->end_controls_section();

        if (!apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', ['', '', TRUE])) {
            $this->start_controls_section(
                    'sa_el_section_pro', [
                'label' => __('Go Premium for More Features', SA_ELEMENTOR_TEXTDOMAIN)
                    ]
            );

            $this->add_control(
                    'sa_el_control_get_pro', [
                'label' => __('Unlock more possibilities', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    '1' => [
                        'title' => __('', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'fa fa-unlock-alt',
                    ],
                ],
                'default' => '1',
                'description' => '<span class="pro-feature"> Get the  <a href="https://www.oxilab.org/downloads/short-code-addons/" target="_blank">Pro version</a> for more stunning elements and customization options.</span>'
                    ]
            );

            $this->end_controls_section();
        }


        // Style Controls
        $this->start_controls_section(
                'sa_el_section_sa_el_static_product_settings', [
            'label' => esc_html__('Product Style', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE
                ]
        );


        $this->add_control(
                'sa_el_static_product_container_width', [
            'label' => esc_html__('Set max width for the container?', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('yes', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('no', SA_ELEMENTOR_TEXTDOMAIN),
            'default' => 'no',
                ]
        );

        $this->add_responsive_control(
                'sa_el_static_product_container_width_value', [
            'label' => __('Container Max Width (% or px)', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 480,
                'unit' => 'px',
            ],
            'size_units' => ['px', '%'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                    'step' => 5,
                ],
                '%' => [
                    'min' => 1,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-single-product' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'sa_el_static_product_container_width' => 'yes',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_static_product_text_alignment', [
            'label' => esc_html__('Content Text Alignment', SA_ELEMENTOR_TEXTDOMAIN),
            'separator' => 'before',
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
            'default' => 'center',
            'selectors' => [
                '{{WRAPPER}} .sa-el-single-product-details' => 'text-align: {{VALUE}}',
                '{{WRAPPER}} .sa-el-single-product-btn-wrap' => 'text-align: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'sa_el_static_product_content_padding', [
            'label' => esc_html__('Content Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-single-product-details' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_static_product_border',
            'selector' => '{{WRAPPER}} .sa-el-single-product',
                ]
        );


        $this->add_control(
                'sa_el_static_product_border_radius', [
            'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-single-product' => 'border-radius: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_el_static_product_box_shadow',
            'selector' => '{{WRAPPER}} .sa-el-single-product',
            'separator' => '',
                ]
        );


        $this->add_control(
                'sa_el_static_product_hover_style_title', [
            'label' => __('Hover Style', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_static_product_hover_border',
            'selector' => '{{WRAPPER}} .sa-el-single-product:hover',
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_el_static_product_hover_box_shadow',
            'selector' => '{{WRAPPER}} .sa-el-single-product:hover',
            'separator' => '',
                ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
                'sa_el_section_sa_el_static_product_styles', [
            'label' => esc_html__('Colors &amp; Typography', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE
                ]
        );

        $this->add_control(
                'sa_el_static_product_overlay_color', [
            'label' => esc_html__('Product Thumbnail Overlay Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => 'rgba(0,0,0, .75)',
            'selectors' => [
                '{{WRAPPER}} .sa-el-single-product-thumb-overlay' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_static_product_live_link_color', [
            'label' => esc_html__('Live Link Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .sa-el-single-product-thumb-overlay > a' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_static_product_live_link_typography',
            'scheme' => Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .sa-el-single-product-thumb-overlay > a',
                ]
        );

        $this->add_control(
                'sa_el_static_product_title_color', [
            'label' => esc_html__('Product Title Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#303133',
            'selectors' => [
                '{{WRAPPER}} .sa-el-single-product-details > h2 > a' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_static_product_title_typography',
            'scheme' => Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .sa-el-single-product-details > h2',
                ]
        );

        $this->add_control(
                'sa_el_static_product_content_color', [
            'label' => esc_html__('Product Content Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#7a7a7a',
            'selectors' => [
                '{{WRAPPER}} .sa-el-single-product-details > p' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_static_product_content_background', [
            'label' => esc_html__('Product Content Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .sa-el-single-product-details' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_static_product_content_typography',
            'scheme' => Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .sa-el-single-product-details > p',
                ]
        );


        $this->end_controls_section();
    }

    protected function render() {


        $settings = $this->get_settings_for_display();
        $static_product_image = $this->get_settings('sa_el_static_product_image');
        ?>


        <div id="sa-el-single-product-<?php echo esc_attr($this->get_id()); ?>" class="sa-el-single-product">
            <div class="sa-el-single-product-media">
                <div class="sa-el-single-product-thumb-overlay">
                    <a href="<?php echo esc_attr($settings['sa_el_static_product_demo_link_url']); ?>" target="<?php echo esc_attr($settings['sa_el_static_product_demo_link_target']); ?>"><span><?php echo esc_attr($settings['sa_el_static_product_demo_text']); ?></span></a>
                </div>
                <div class="sa-el-single-product-thumb">
        <?php echo '<img src="' . $static_product_image['url'] . '" alt="' . esc_attr(get_post_meta($static_product_image['id'], '_wp_attachment_image_alt', true)) . '">'; ?>
                </div>
            </div>
            <div class="sa-el-single-product-details">
        <?php if (!empty($settings['sa_el_static_product_heading'])) : ?>
                    <h2><a href="<?php echo esc_attr($settings['sa_el_static_product_link_url']); ?>" target="<?php echo esc_attr($settings['sa_el_static_product_link_target']); ?>"><?php echo esc_attr($settings['sa_el_static_product_heading']); ?></a></h2>
        <?php endif; ?>
                <p><?php echo $settings['sa_el_static_product_description']; ?></p>

        <?php if (!empty($settings['sa_el_static_product_show_details_btn'])) : ?>
                    <div class="sa-el-single-product-btn-wrap">
                        <a href="<?php echo esc_attr($settings['sa_el_static_product_link_url']); ?>" target="<?php echo esc_attr($settings['sa_el_static_product_link_target']); ?>" class="sa-el-single-product-btn">
            <?php if (!empty($settings['sa_el_static_product_btn_icon']) && $settings['sa_el_static_product_btn_icon_align'] == 'left') : ?>
                                <i class="<?php echo esc_attr($settings['sa_el_static_product_btn_icon']); ?> sa-el-single-product-button-icon-left" aria-hidden="true"></i>
            <?php endif; ?>

            <?php echo esc_attr($settings['sa_el_static_product_btn']); ?>

            <?php if (!empty($settings['sa_el_static_product_btn_icon']) && $settings['sa_el_static_product_btn_icon_align'] == 'right') : ?>
                                <i class="<?php echo esc_attr($settings['sa_el_static_product_btn_icon']); ?> sa-el-single-product-button-icon-right" aria-hidden="true"></i>
            <?php endif; ?>
                        </a>
                    </div>
        <?php endif; ?>
            </div>
        </div>


        <?php
    }


}
