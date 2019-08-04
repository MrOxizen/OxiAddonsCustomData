<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Interactive_Card;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Description of Interactive Card
 *
 * @author biplop
 * 
 */
use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Frontend;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Utils as Utils;
use \Elementor\Widget_Base;
use \SA_ELEMENTOR_ADDONS\Classes\Bootstrap;

class Interactive_Card extends Widget_Base {

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function get_name() {
        return 'sa_el_interactive_card';
    }

    public function get_title() {
        return esc_html__('Interactive Card', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon() {
        return 'eicon-accordion  oxi-el-admin-icon';
    }

    public function get_categories() {
        return ['sa-el-addons'];
    }

    protected function _register_controls() {

        /**
         * Interactive Cards Contents
         */
        $this->start_controls_section(
                'sa_el_section_interactive_card_contents', [
            'label' => esc_html__('Interactive Card', SA_ELEMENTOR_TEXTDOMAIN)
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_style', [
            'label' => esc_html__('Card Style', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'text-card',
            'label_block' => false,
            'options' => [
                'text-card' => esc_html__('Text Card', SA_ELEMENTOR_TEXTDOMAIN),
                'img-card' => esc_html__('Image Card', SA_ELEMENTOR_TEXTDOMAIN),
            ],
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_type', [
            'label' => esc_html__('Card Type', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'img-grid',
            'label_block' => false,
            'options' => [
                'img-grid' => esc_html__('Image Grid', SA_ELEMENTOR_TEXTDOMAIN),
                'scrollable' => esc_html__('Scrollable Content', SA_ELEMENTOR_TEXTDOMAIN),
                'video' => esc_html__('Video', SA_ELEMENTOR_TEXTDOMAIN),
            ],
                ]
        );


        $this->start_controls_tabs('sa_el_interactive_card_Tabs');
        // Front Panel Tab
        $this->start_controls_tab('front-panel', ['label' => esc_html__('Front Panel', SA_ELEMENTOR_TEXTDOMAIN)]);
        $this->add_control(
                'sa_el_interactive_card_front_panel_counter', [
            'label' => esc_html__('Counter', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'label_block' => false,
            'default' => esc_html__('1', SA_ELEMENTOR_TEXTDOMAIN),
            'dynamic' => ['active' => true],
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card',
            ]
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_front_panel_title', [
            'label' => esc_html__('Title', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'label_block' => false,
            'default' => esc_html__('Interactive Cards', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card',
            ],
            'dynamic' => ['active' => true]
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_front_img', [
            'label' => esc_html__('Cover Image', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
            'condition' => [
                'sa_el_interactive_card_style' => 'img-card'
            ],
            'selectors' => [
                '{{WRAPPER}} .interactive-card .front-content .image-screen' => 'background-image: url({{URL}});',
            ],
                ]
        );
        $this->add_control(
                'sa_el_interactive_card_text_type', [
            'label' => __('Content Type', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'options' => [
                'content' => __('Content', SA_ELEMENTOR_TEXTDOMAIN),
                'template' => __('Saved Templates', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'default' => 'content',
                ]
        );

        $this->add_control(
                'sa_el_primary_templates', [
            'label' => __('Choose Template', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'options' => $this->get_elementor_page_templates(),
            'condition' => [
                'sa_el_interactive_card_text_type' => 'template',
            ],
                ]
        );
        $this->add_control(
                'sa_el_interactive_card_front_panel_content', [
            'label' => esc_html__('Content', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::WYSIWYG,
            'label_block' => true,
            'default' => esc_html__('A new concept of showing content in your web page with more interactive way.', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card',
                'sa_el_interactive_card_text_type' => 'content'
            ],
            'dynamic' => ['active' => true]
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_front_panel_btn', [
            'label' => esc_html__('Button Text', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'label_block' => false,
            'default' => esc_html__('More', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card',
            ]
                ]
        );
        $this->end_controls_tab();

        // Rear Panel Tab
        $this->start_controls_tab('rear-panel', ['label' => esc_html__('Rear Panel', SA_ELEMENTOR_TEXTDOMAIN)]);
        $this->add_control(
                'sa_el_interactive_card_rear_image', [
            'label' => esc_html__('Cover Image', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
            'selectors' => [
                '{{WRAPPER}} .content .image' => 'background-image: url({{URL}});',
            ],
            'condition' => [
                'sa_el_interactive_card_type' => 'img-grid'
            ]
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_rear_image_alignment', [
            'label' => esc_html__('Image Alignment', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'top',
            'label_block' => false,
            'options' => [
                'left' => esc_html__('Left', SA_ELEMENTOR_TEXTDOMAIN),
                'right' => esc_html__('Right', SA_ELEMENTOR_TEXTDOMAIN),
                'top' => esc_html__('Top', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'prefix_class' => 'sa-el-interactive-card-rear-img-align-',
            'condition' => [
                'sa_el_interactive_card_type' => 'img-grid'
            ]
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_rear_image_height', [
            'label' => esc_html__('Image Height', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 62,
                'unit' => '%',
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
                '{{WRAPPER}}.sa-el-interactive-card-rear-img-align-top .interactive-card .content .content-inner .image' => 'height: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'sa_el_interactive_card_rear_image_alignment' => 'top'
            ]
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_rear_title', [
            'label' => esc_html__('Title', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => esc_html__('Cool Headline', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'sa_el_interactive_card_type' => 'img-grid'
            ],
            'dynamic' => ['active' => true]
                ]
        );
        $this->add_control(
                'sa_el_interactive_card_rear_text_type', [
            'label' => __('Content Type', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'options' => [
                'content' => __('Content', SA_ELEMENTOR_TEXTDOMAIN),
                'template' => __('Saved Templates', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'default' => 'content',
                ]
        );

        $this->add_control(
                'sa_el_primary_rear_templates', [
            'label' => __('Choose Template', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'options' => $this->get_elementor_page_templates(),
            'condition' => [
                'sa_el_interactive_card_rear_text_type' => 'template',
            ],
                ]
        );
        $this->add_control(
                'sa_el_interactive_card_rear_content', [
            'label' => esc_html__('Content', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::WYSIWYG,
            'label_block' => true,
            'default' => esc_html__('A new concept of showing content in your web page with more interactive way.', SA_ELEMENTOR_TEXTDOMAIN),
            'dynamic' => ['active' => true],
            'condition' => [
                'sa_el_interactive_card_type' => 'img-grid',
                'sa_el_interactive_card_rear_text_type' => 'content'
            ]
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_rear_btn', [
            'label' => esc_html__('Button Text', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => esc_html__('Read More', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'sa_el_interactive_card_type' => 'img-grid'
            ]
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_rear_btn_link', [
            'label' => esc_html__('Button Link', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::URL,
            'label_block' => true,
            'default' => [
                'url' => '#',
                'is_external' => '',
            ],
            'show_external' => true,
            'condition' => [
                'sa_el_interactive_card_type' => 'img-grid'
            ]
                ]
        );

        /**
         * Scrollable Content
         */
        $this->add_control(
                'sa_el_interactive_card_rear_custom_code', [
            'label' => esc_html__('Custom Content', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::WYSIWYG,
            'label_block' => true,
            'default' => __('<h2>Custom Content</h2> <strong>A new concept of showing content in your web page with more interactive way</strong>. <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates assumenda recusandae a dolorum, nulla fugit reiciendis inventore explicabo cum autem placeat dignissimos doloremque quae magni sapiente eligendi hic ipsum quaerat mollitia, natus ullam. Repellat eligendi corporis cum suscipit totam molestiae ad, explicabo magnam libero, iusto sequi voluptatem nam culpa laboriosam officia consequatur eaque accusamus distinctio quas ipsa fuga consectetur iure asperiores! Ratione veniam magnam culpa temporibus nam quam cumque nesciunt debitis reprehenderit obcaecati eum tempore harum officiis autem facere, quos, ad officia sunt asperiores. Reprehenderit molestiae, vero omnis alias voluptatem recusandae dolores ab at. Nemo aliquam fuga vel necessitatibus voluptatum officiis ipsum, consequuntur id eum maiores debitis nostrum expedita libero saepe, doloribus mollitia minus quidem quo facere, consequatur! Veniam delectus doloribus blanditiis aliquid iure officiis modi sapiente unde. Ad, placeat suscipit. Perspiciatis dolores, expedita optio omnis reiciendis obcaecati quidem saepe praesentium autem unde suscipit nostrum natus vel tempore quas laudantium, excepturi! Ad, illo. Libero earum doloribus perspiciatis impedit, cum magni sint odio! Maxime sunt iste quibusdam nisi quia, voluptas, dolore tempora dolor neque error ducimus. Quas excepturi qui inventore quod at amet ipsa quasi blanditiis, voluptatem aliquam dolor beatae enim obcaecati alias voluptatibus vel molestias deleniti eius error nostrum, nesciunt adipisci quibusdam. Non mollitia rerum in commodi optio ipsam, neque quidem voluptatum velit quaerat suscipit consectetur nostrum odio, rem illo! Id placeat dignissimos tempora aliquam fugit veniam quam cum repudiandae fugiat nemo ad iure qui cupiditate natus aspernatur, dicta dolore ab corporis perferendis quaerat eaque assumenda libero explicabo beatae. Quas.</p>', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'sa_el_interactive_card_type' => 'scrollable',
                'sa_el_interactive_card_rear_text_type' => 'content'
            ]
                ]
        );

        /**
         * Video Content
         */
        $this->add_control(
                'sa_el_interactive_card_youtube_video_url', [
            'label' => esc_html__('Youtube URL', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'label_block' => false,
            'default' => esc_html__('https://www.youtube.com/watch?v=BhgngA_cF1c', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'sa_el_interactive_card_type' => 'video'
            ]
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_youtube_video_fullscreen', [
            'label' => esc_html__('Allow Full Screen?', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'return_value' => 'yes',
            'default' => 'no',
            'condition' => [
                'sa_el_interactive_card_type' => 'video'
            ]
                ]
        );
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /**
         * Interactive Cards Settings
         */
        $this->start_controls_section(
                'sa_el_section_interactive_card_animation_settings', [
            'label' => esc_html__('Animation Settings', SA_ELEMENTOR_TEXTDOMAIN)
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_content_animation', [
            'label' => esc_html__('Content Animation', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'content-show',
            'label_block' => false,
            'options' => [
                'content-show' => esc_html__('Appear', SA_ELEMENTOR_TEXTDOMAIN),
                'slide-in-left' => esc_html__('SlideInLeft', SA_ELEMENTOR_TEXTDOMAIN),
                'slide-in-right' => esc_html__('SlideInRight', SA_ELEMENTOR_TEXTDOMAIN),
                'slide-in-swing-left' => esc_html__('SlideInSwingLeft', SA_ELEMENTOR_TEXTDOMAIN),
                'slide-in-swing-right' => esc_html__('SlideInSwingRight', SA_ELEMENTOR_TEXTDOMAIN),
            ],
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_animation_reveal_time', [
            'label' => esc_html__('Timing (ms)', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'label_block' => false,
            'default' => 400
                ]
        );

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
        /**
         * -------------------------------------------
         * Tab Style (General Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_interactive_card_general_style', [
            'label' => esc_html__('General Style', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_responsive_control(
                'sa_el_interactive_card_general_width', [
            'label' => esc_html__('Max Width', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 100,
                'unit' => '%',
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
                '{{WRAPPER}} .interactive-card' => 'width: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_interactive_card_general_height', [
            'label' => esc_html__('Height', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 600,
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
                '{{WRAPPER}} .interactive-card' => 'height: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_general_bg_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#c63579',
            'selectors' => [
                '{{WRAPPER}} .interactive-card' => 'background: {{VALUE}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_interactive_card_general_container_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .interactive-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_small_overlay_circle_bg', [
            'label' => esc_html__('Small Overlay Circle', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .interactive-card .front-content::after' => 'background-color: {{VALUE}};',
            ],
                ]
        );
        $this->add_control(
                'sa_el_interactive_card_large_overlay_circle_bg', [
            'label' => esc_html__('Large Overlay Circle', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .interactive-card .front-content::before' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Interactive Card Front Panel)
         * -------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_interactive_card_front_style', [
            'label' => esc_html__('Front Panel Style', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_front_panel_bg_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#c63579',
            'selectors' => [
                '{{WRAPPER}} .interactive-card .front-text-content .image-screen' => 'background: {{VALUE}};',
            ],
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card'
            ]
                ]
        );

        $this->add_responsive_control(
                'sa_el_interactive_card_front_content_width', [
            'label' => esc_html__('Front Content Width', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 100,
                'unit' => '%',
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
            'condition' => [
                'sa_el_interactive_card_style' => 'img-card',
            ],
            'selectors' => [
                '{{WRAPPER}} .interactive-card .front-content' => 'width: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_interactive_card_front_content_height', [
            'label' => esc_html__('Front Content Height', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 100,
                'unit' => '%',
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
            'condition' => [
                'sa_el_interactive_card_style' => 'img-card',
            ],
            'selectors' => [
                '{{WRAPPER}} .interactive-card .front-content' => 'height: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_interactive_cardfront_panel_container_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .interactive-card .front-text-content .image-screen' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card'
            ]
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_interactive_card_front_panel_border',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .interactive-card .front-content',
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_el_interactive_card_front_content_shadow',
            'selector' => '{{WRAPPER}} .interactive-card .front-content .image-screen',
                ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Interactive Card Rear Panel)
         * -------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_interactive_card_rear_style', [
            'label' => esc_html__('Rear Panel Style', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_rear_panel_bg_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .interactive-card .content' => 'background: {{VALUE}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_interactive_card_rear_panel_container_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .interactive-card .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_interactive_card_rear_panel_border',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .interactive-card .content',
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_el_interactive_card_rear_content_shadow',
            'selector' => '{{WRAPPER}} .interactive-card .content .content-inner',
                ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Front Panel Typogrpahy)
         * -------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_interactive_card_front_typography', [
            'label' => esc_html__('Front Panel Color &amp; Typography', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card'
            ]
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_front_title_counter_heading', [
            'label' => esc_html__('Counter Style', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_front_counter_color', [
            'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .interactive-card .front-text-content .header .card-number' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_interactive_card_front_counter_typography',
            'selector' => '{{WRAPPER}} .interactive-card .front-text-content .header .card-number',
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_front_title_heading', [
            'label' => esc_html__('Title Style', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before'
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_front_title_color', [
            'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .interactive-card .front-text-content .header .title' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_interactive_card_front_title_typography',
            'selector' => '{{WRAPPER}} .interactive-card .front-text-content .header .title',
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_front_content_heading', [
            'label' => esc_html__('Content Style', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before'
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_front_content_color', [
            'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#cecece',
            'selectors' => [
                '{{WRAPPER}} .interactive-card .front-text-content .front-text-body' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_interactive_card_front_content_typography',
            'selector' => '{{WRAPPER}} .interactive-card .front-text-content .front-text-body',
                ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Rear Panel Typogrpahy)
         * -------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_interactive_card_rear_typography', [
            'label' => esc_html__('Rear Panel Color &amp; Typography', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'sa_el_interactive_card_type!' => 'scrollable'
            ]
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_rear_title_heading', [
            'label' => esc_html__('Title Style', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before'
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_rear_title_color', [
            'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#444',
            'selectors' => [
                '{{WRAPPER}} .interactive-card .content .text .title' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_interactive_card_rear_title_typography',
            'selector' => '{{WRAPPER}} .interactive-card .content .text .title',
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_rear_content_heading', [
            'label' => esc_html__('Content Style', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before'
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_rear_content_color', [
            'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#4d4d4d',
            'selectors' => [
                '{{WRAPPER}} .interactive-card .content .text' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_interactive_card_rear_content_typography',
            'selector' => '{{WRAPPER}} .interactive-card .content .text',
                ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Button Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_interactive_card_front_button_style', [
            'label' => esc_html__('Front Panel Button Style', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card'
            ]
                ]
        );

        /**
         * Front Panel Button
         */
        $this->add_control(
                'sa_el_interactive_card_button_style_front_panel', [
            'label' => esc_html__('Button Style ( Front Panel )', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card'
            ]
                ]
        );

        $this->add_responsive_control(
                'sa_el_interactive_card_front_btn_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .interactive-card .front-text-content .footer a.interactive-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card'
            ]
                ]
        );

        $this->add_responsive_control(
                'sa_el_interactive_card_front_btn_margin', [
            'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .interactive-card .front-text-content .footer a.interactive-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card'
            ]
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_interactive_card_front_btn_typography',
            'selector' => '{{WRAPPER}} .interactive-card .front-text-content .footer a.interactive-btn',
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card'
            ]
                ]
        );

        $this->start_controls_tabs('sa_el_interactive_card_front_button_tabs');

        // Normal State Tab
        $this->start_controls_tab(
                'sa_el_interactive_card_front_btn_normal', [
            'label' => esc_html__('Normal', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card'
            ]
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_front_btn_normal_text_color', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#c63579',
            'selectors' => [
                '{{WRAPPER}} .interactive-card .front-text-content .footer a.interactive-btn' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card'
            ]
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_front_btn_normal_bg_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .interactive-card .front-text-content .footer a.interactive-btn' => 'background: {{VALUE}};',
            ],
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card'
            ]
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_interactive_card_front_btn_border',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .interactive-card .front-text-content .footer a.interactive-btn',
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card'
            ]
                ]
        );

        $this->add_responsive_control(
                'sa_el_interactive_card_front_btn_border_radius', [
            'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'max' => 50,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .interactive-card .front-text-content .footer a.interactive-btn' => 'border-radius: {{SIZE}}px;',
            ],
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card'
            ]
                ]
        );

        $this->end_controls_tab();

        // Hover State Tab
        $this->start_controls_tab(
                'sa_el_interactive_card_front_btn_hover', [
            'label' => esc_html__('Hover', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card'
            ]
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_front_btn_hover_text_color', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#f9f9f9',
            'selectors' => [
                '{{WRAPPER}} .interactive-card .front-text-content .footer a.interactive-btn:hover' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card'
            ]
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_front_btn_hover_bg_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#009cd1',
            'selectors' => [
                '{{WRAPPER}} .interactive-card .front-text-content .footer a.interactive-btn:hover' => 'background: {{VALUE}};',
            ],
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card'
            ]
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_front_btn_hover_border_color', [
            'label' => esc_html__('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .interactive-card .front-text-content .footer a.interactive-btn:hover' => 'border-color: {{VALUE}};',
            ],
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card'
            ]
                ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_el_interactive_card_front_button_shadow',
            'selector' => '{{WRAPPER}} .interactive-card .front-text-content .footer a.interactive-btn',
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card'
            ],
            'separator' => 'none'
                ]
        );



        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Rear Panel Button Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_interactive_card_rear_button_style', [
            'label' => esc_html__('Rear Panel Button Style', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'sa_el_interactive_card_type' => 'img-grid'
            ]
                ]
        );

        /**
         * Rear Panel Button
         */
        $this->add_control(
                'sa_el_interactive_card_button_style_rear_text_panel', [
            'label' => esc_html__('Button Style ( Rear Panel )', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card'
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_interactive_card_rear_btn_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .interactive-card .interactive-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_interactive_card_rear_btn_margin', [
            'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .interactive-card .interactive-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_interactive_card_rear_btn_typography',
            'selector' => '{{WRAPPER}} .interactive-card .interactive-btn',
                ]
        );

        $this->start_controls_tabs('sa_el_interactive_card_rear_button_tabs');

        // Normal State Tab
        $this->start_controls_tab('sa_el_interactive_card_rear_btn_normal', ['label' => esc_html__('Normal', SA_ELEMENTOR_TEXTDOMAIN)]);

        $this->add_control(
                'sa_el_interactive_card_rear_btn_normal_text_color', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .interactive-card .interactive-btn' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_rear_btn_normal_bg_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#f15540',
            'selectors' => [
                '{{WRAPPER}} .interactive-card .interactive-btn' => 'background: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_interactive_card_rear_btn_border',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .interactive-card .interactive-btn',
                ]
        );

        $this->add_responsive_control(
                'sa_el_interactive_card_rear_btn_border_radius', [
            'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'max' => 50,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .interactive-card .interactive-btn' => 'border-radius: {{SIZE}}px;',
            ],
                ]
        );

        $this->end_controls_tab();

        // Hover State Tab
        $this->start_controls_tab('sa_el_interactive_card_rear_btn_hover', ['label' => esc_html__('Hover', SA_ELEMENTOR_TEXTDOMAIN)]);

        $this->add_control(
                'sa_el_interactive_card_rear_btn_hover_text_color', [
            'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#f9f9f9',
            'selectors' => [
                '{{WRAPPER}} .interactive-card .interactive-btn:hover' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_rear_btn_hover_bg_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#7e5ae2',
            'selectors' => [
                '{{WRAPPER}} .interactive-card .interactive-btn:hover' => 'background: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_rear_btn_hover_border_color', [
            'label' => esc_html__('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .interactive-card .interactive-btn:hover' => 'border-color: {{VALUE}};',
            ],
                ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_el_interactive_card_rear_button_shadow',
            'selector' => '{{WRAPPER}} .interactive-card .interactive-btn',
            'separator' => 'before'
                ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Close Button Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_interactive_card_close_button_style', [
            'label' => esc_html__('Close Button Style', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_close_button_bg_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .interactive-card .close-me' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_close_button_icon_color', [
            'label' => esc_html__('Icon Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#333',
            'selectors' => [
                '{{WRAPPER}} .interactive-card .close-me' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_close_button_icon', [
            'label' => esc_html__('Icon', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::ICON,
            'default' => 'fa fa-times',
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_close_button_icon_size', [
            'label' => esc_html__('Icon Size', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 30
            ],
            'range' => [
                'px' => [
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .interactive-card .close-me' => 'width: {{SIZE}}px; height: {{SIZE}}px; line-height: {{SIZE}}px;',
            ],
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_close_button_icon_font_size', [
            'label' => esc_html__('Icon Font Size', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 13
            ],
            'range' => [
                'px' => [
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .interactive-card .close-me' => 'font-size: {{SIZE}}px;',
            ],
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_colse_btn_position_heading', [
            'label' => esc_html__('Position', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before'
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_close_btn_from_top', [
            'label' => esc_html__('Vertical', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 15
            ],
            'range' => [
                'px' => [
                    'max' => 200,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .interactive-card .close-me' => 'top: {{SIZE}}px;',
            ],
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_close_btn_from_right', [
            'label' => esc_html__('Horizontal', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 15
            ],
            'range' => [
                'px' => [
                    'max' => 200,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .interactive-card .close-me' => 'right: {{SIZE}}px;',
            ],
                ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        // Rear Button Link Target and NoFollow
        $target = $settings['sa_el_interactive_card_rear_btn_link']['is_external'] ? 'target="_blank"' : '';
        $nofollow = $settings['sa_el_interactive_card_rear_btn_link']['nofollow'] ? 'rel="nofollow"' : '';

        // Youtube FullScreen
        if ('yes' === $settings['sa_el_interactive_card_youtube_video_fullscreen']) : $full_screen = 'allowfullscreen';
        else: $full_screen = '';
        endif;

        $this->add_render_attribute('sa-el-interactive-card', [
            'class' => 'interactive-card',
            'data-interactive-card-id' => esc_attr($this->get_id()),
            'data-animation' => $settings['sa_el_interactive_card_content_animation'],
            'data-animation-time' => $settings['sa_el_interactive_card_animation_reveal_time']
        ]);
        ?>
        <div id="interactive-card-<?php echo esc_attr($this->get_id()); ?>"  
             <?php echo $this->get_render_attribute_string('sa-el-interactive-card'); ?>>
                 <?php if ('text-card' === $settings['sa_el_interactive_card_style']) : ?>
                <div class="front-content front-text-content">
                    <div class="image-screen">
                        <div class="header">
                            <?php if (!empty($settings['sa_el_interactive_card_front_panel_counter'])) : ?>
                                <div class="card-number"><?php echo $settings['sa_el_interactive_card_front_panel_counter']; ?></div>
                            <?php endif; ?>
                            <?php if (!empty($settings['sa_el_interactive_card_front_panel_title'])) : ?>
                                <div class="title"><?php echo $settings['sa_el_interactive_card_front_panel_title']; ?></div>
                            <?php endif; ?>
                        </div>
                        <?php if ('content' == $settings['sa_el_interactive_card_text_type']): ?>
                            <?php if (!empty($settings['sa_el_interactive_card_front_panel_content'])) : ?>
                                <div class="front-text-body">
                                    <?php echo $settings['sa_el_interactive_card_front_panel_content']; ?>
                                </div>
                            <?php endif; ?>
                        <?php elseif ('template' == $settings['sa_el_interactive_card_text_type']) : ?>
                            <div class="front-text-body">
                                <?php
                                if (!empty($settings['sa_el_primary_templates'])) {
                                    $sa_el_template_id = $settings['sa_el_primary_templates'];
                                    $sa_el_frontend = new Frontend;

                                    echo $sa_el_frontend->get_builder_content($sa_el_template_id, true);
                                }
                                ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($settings['sa_el_interactive_card_front_panel_btn'])) : ?>
                            <div class="footer">
                                <a href="javascript:;" class="interactive-btn"><?php echo $settings['sa_el_interactive_card_front_panel_btn']; ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php elseif ('img-card' === $settings['sa_el_interactive_card_style']) : ?>
                <div class="front-content">
                    <div class="image-screen">
                        <div class="image-screen-overlay"></div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="content">
                <span class="close close-me"><i class="<?php echo esc_attr($settings['sa_el_interactive_card_close_button_icon']); ?>"></i></span>
                <?php if ('img-grid' === $settings['sa_el_interactive_card_type']) : ?>
                    <div class="content-inner">
                        <div class="text">
                            <div class="text-inner">
                                <?php if (!empty($settings['sa_el_interactive_card_rear_title'])) : ?>
                                    <div class="title"><?php echo $settings['sa_el_interactive_card_rear_title']; ?></div>
                                <?php endif; ?>
                                <?php if ('content' == $settings['sa_el_interactive_card_rear_text_type']) : ?>
                                    <?php echo wpautop($settings['sa_el_interactive_card_rear_content']); ?>
                                <?php elseif ('template' == $settings['sa_el_interactive_card_rear_text_type']) : ?>
                                    <?php
                                    if (!empty($settings['sa_el_primary_rear_templates'])) {
                                        $sa_el_template_id = $settings['sa_el_primary_rear_templates'];
                                        $sa_el_frontend = new Frontend;

                                        echo $sa_el_frontend->get_builder_content($sa_el_template_id, true);
                                    }
                                    ?>
                                <?php endif; ?>
                                <?php if (!empty($settings['sa_el_interactive_card_rear_btn'])) : ?>
                                    <a href="<?php echo esc_url($settings['sa_el_interactive_card_rear_btn_link']['url']); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> class="interactive-btn"><?php echo $settings['sa_el_interactive_card_rear_btn']; ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if (!empty($settings['sa_el_interactive_card_rear_image'])) : ?>
                            <div class="image"></div>
                        <?php endif; ?>
                    </div>
                <?php elseif ('scrollable' === $settings['sa_el_interactive_card_type']) : ?>
                    <div class="content-overflow">
                        <?php if ('content' == $settings['sa_el_interactive_card_rear_text_type']) : ?>
                            <?php echo do_shortcode(wp_kses_post($settings['sa_el_interactive_card_rear_custom_code'])); ?>
                        <?php elseif ('template' == $settings['sa_el_interactive_card_rear_text_type']) : ?>
                            <?php
                            if (!empty($settings['sa_el_primary_rear_templates'])) {
                                $sa_el_template_id = $settings['sa_el_primary_rear_templates'];
                                $sa_el_frontend = new Frontend;

                                echo $sa_el_frontend->get_builder_content($sa_el_template_id, true);
                            }
                            ?>
                        <?php endif; ?>
                    </div>
                    <?php elseif ('video' === $settings['sa_el_interactive_card_type']) :
                    ?>
                    <iframe src="<?php echo esc_url(str_replace('watch?v=', 'embed/', $settings['sa_el_interactive_card_youtube_video_url'])); ?>" <?php echo $full_screen; ?>></iframe>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }

    protected function content_template() {
        
    }

}
