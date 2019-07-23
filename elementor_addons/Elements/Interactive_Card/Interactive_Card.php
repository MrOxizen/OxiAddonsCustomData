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
        return 'fas fa-address-card';
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
            'label' => esc_html__('Interactive Card', 'essential-addons-elementor')
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_style', [
            'label' => esc_html__('Card Style', 'essential-addons-elementor'),
            'type' => Controls_Manager::SELECT,
            'default' => 'text-card',
            'label_block' => false,
            'options' => [
                'text-card' => esc_html__('Text Card', 'essential-addons-elementor'),
                'img-card' => esc_html__('Image Card', 'essential-addons-elementor'),
            ],
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_type', [
            'label' => esc_html__('Card Type', 'essential-addons-elementor'),
            'type' => Controls_Manager::SELECT,
            'default' => 'img-grid',
            'label_block' => false,
            'options' => [
                'img-grid' => esc_html__('Image Grid', 'essential-addons-elementor'),
                'scrollable' => esc_html__('Scrollable Content', 'essential-addons-elementor'),
                'video' => esc_html__('Video', 'essential-addons-elementor'),
            ],
                ]
        );


        $this->start_controls_tabs('sa_el_interactive_card_Tabs');
        // Front Panel Tab
        $this->start_controls_tab('front-panel', ['label' => esc_html__('Front Panel', 'essential-addons-elementor')]);
        $this->add_control(
                'sa_el_interactive_card_front_panel_counter', [
            'label' => esc_html__('Counter', 'essential-addons-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => false,
            'default' => esc_html__('1', 'essential-addons-elementor'),
            'dynamic' => ['active' => true],
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card',
            ]
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_front_panel_title', [
            'label' => esc_html__('Title', 'essential-addons-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => false,
            'default' => esc_html__('Interactive Cards', 'essential-addons-elementor'),
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card',
            ],
            'dynamic' => ['active' => true]
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_front_img', [
            'label' => esc_html__('Cover Image', 'essential-addons-elementor'),
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
            'label' => __('Content Type', 'essential-addons-elementor'),
            'type' => Controls_Manager::SELECT,
            'options' => [
                'content' => __('Content', 'essential-addons-elementor'),
                'template' => __('Saved Templates', 'essential-addons-elementor'),
            ],
            'default' => 'content',
                ]
        );

        $this->add_control(
                'sa_el_primary_templates', [
            'label' => __('Choose Template', 'essential-addons-elementor'),
            'type' => Controls_Manager::SELECT,
           'options' => $this->get_elementor_page_templates(),
            'condition' => [
                'sa_el_interactive_card_text_type' => 'template',
            ],
                ]
        );
        $this->add_control(
                'sa_el_interactive_card_front_panel_content', [
            'label' => esc_html__('Content', 'essential-addons-elementor'),
            'type' => Controls_Manager::WYSIWYG,
            'label_block' => true,
            'default' => esc_html__('A new concept of showing content in your web page with more interactive way.', 'essential-addons-elementor'),
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card',
                'sa_el_interactive_card_text_type' => 'content'
            ],
            'dynamic' => ['active' => true]
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_front_panel_btn', [
            'label' => esc_html__('Button Text', 'essential-addons-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => false,
            'default' => esc_html__('More', 'essential-addons-elementor'),
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card',
            ]
                ]
        );
        $this->end_controls_tab();

        // Rear Panel Tab
        $this->start_controls_tab('rear-panel', ['label' => esc_html__('Rear Panel', 'essential-addons-elementor')]);
        $this->add_control(
                'sa_el_interactive_card_rear_image', [
            'label' => esc_html__('Cover Image', 'essential-addons-elementor'),
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
            'label' => esc_html__('Image Alignment', 'essential-addons-elementor'),
            'type' => Controls_Manager::SELECT,
            'default' => 'top',
            'label_block' => false,
            'options' => [
                'left' => esc_html__('Left', 'essential-addons-elementor'),
                'right' => esc_html__('Right', 'essential-addons-elementor'),
                'top' => esc_html__('Top', 'essential-addons-elementor'),
            ],
            'prefix_class' => 'sa-el-interactive-card-rear-img-align-',
            'condition' => [
                'sa_el_interactive_card_type' => 'img-grid'
            ]
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_rear_image_height', [
            'label' => esc_html__('Image Height', 'essential-addons-elementor'),
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
            'label' => esc_html__('Title', 'essential-addons-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => esc_html__('Cool Headline', 'essential-addons-elementor'),
            'condition' => [
                'sa_el_interactive_card_type' => 'img-grid'
            ],
            'dynamic' => ['active' => true]
                ]
        );
        $this->add_control(
                'sa_el_interactive_card_rear_text_type', [
            'label' => __('Content Type', 'essential-addons-elementor'),
            'type' => Controls_Manager::SELECT,
            'options' => [
                'content' => __('Content', 'essential-addons-elementor'),
                'template' => __('Saved Templates', 'essential-addons-elementor'),
            ],
            'default' => 'content',
                ]
        );

        $this->add_control(
                'sa_el_primary_rear_templates', [
            'label' => __('Choose Template', 'essential-addons-elementor'),
            'type' => Controls_Manager::SELECT,
            'options' => $this->get_elementor_page_templates(),
            'condition' => [
                'sa_el_interactive_card_rear_text_type' => 'template',
            ],
                ]
        );
        $this->add_control(
                'sa_el_interactive_card_rear_content', [
            'label' => esc_html__('Content', 'essential-addons-elementor'),
            'type' => Controls_Manager::WYSIWYG,
            'label_block' => true,
            'default' => esc_html__('A new concept of showing content in your web page with more interactive way.', 'essential-addons-elementor'),
            'dynamic' => ['active' => true],
            'condition' => [
                'sa_el_interactive_card_type' => 'img-grid',
                'sa_el_interactive_card_rear_text_type' => 'content'
            ]
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_rear_btn', [
            'label' => esc_html__('Button Text', 'essential-addons-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => esc_html__('Read More', 'essential-addons-elementor'),
            'condition' => [
                'sa_el_interactive_card_type' => 'img-grid'
            ]
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_rear_btn_link', [
            'label' => esc_html__('Button Link', 'essential-addons-elementor'),
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
            'label' => esc_html__('Custom Content', 'essential-addons-elementor'),
            'type' => Controls_Manager::WYSIWYG,
            'label_block' => true,
            'default' => __('<h2>Custom Content</h2> <strong>A new concept of showing content in your web page with more interactive way</strong>. <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates assumenda recusandae a dolorum, nulla fugit reiciendis inventore explicabo cum autem placeat dignissimos doloremque quae magni sapiente eligendi hic ipsum quaerat mollitia, natus ullam. Repellat eligendi corporis cum suscipit totam molestiae ad, explicabo magnam libero, iusto sequi voluptatem nam culpa laboriosam officia consequatur eaque accusamus distinctio quas ipsa fuga consectetur iure asperiores! Ratione veniam magnam culpa temporibus nam quam cumque nesciunt debitis reprehenderit obcaecati eum tempore harum officiis autem facere, quos, ad officia sunt asperiores. Reprehenderit molestiae, vero omnis alias voluptatem recusandae dolores ab at. Nemo aliquam fuga vel necessitatibus voluptatum officiis ipsum, consequuntur id eum maiores debitis nostrum expedita libero saepe, doloribus mollitia minus quidem quo facere, consequatur! Veniam delectus doloribus blanditiis aliquid iure officiis modi sapiente unde. Ad, placeat suscipit. Perspiciatis dolores, expedita optio omnis reiciendis obcaecati quidem saepe praesentium autem unde suscipit nostrum natus vel tempore quas laudantium, excepturi! Ad, illo. Libero earum doloribus perspiciatis impedit, cum magni sint odio! Maxime sunt iste quibusdam nisi quia, voluptas, dolore tempora dolor neque error ducimus. Quas excepturi qui inventore quod at amet ipsa quasi blanditiis, voluptatem aliquam dolor beatae enim obcaecati alias voluptatibus vel molestias deleniti eius error nostrum, nesciunt adipisci quibusdam. Non mollitia rerum in commodi optio ipsam, neque quidem voluptatum velit quaerat suscipit consectetur nostrum odio, rem illo! Id placeat dignissimos tempora aliquam fugit veniam quam cum repudiandae fugiat nemo ad iure qui cupiditate natus aspernatur, dicta dolore ab corporis perferendis quaerat eaque assumenda libero explicabo beatae. Quas.</p>', 'essential-addons-elementor'),
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
            'label' => esc_html__('Youtube URL', 'essential-addons-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => false,
            'default' => esc_html__('https://www.youtube.com/embed/7Spk7k69WZM', 'essential-addons-elementor'),
            'condition' => [
                'sa_el_interactive_card_type' => 'video'
            ]
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_youtube_video_fullscreen', [
            'label' => esc_html__('Allow Full Screen?', 'essential-addons-elementor'),
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
            'label' => esc_html__('Animation Settings', 'essential-addons-elementor')
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_content_animation', [
            'label' => esc_html__('Content Animation', 'essential-addons-elementor'),
            'type' => Controls_Manager::SELECT,
            'default' => 'content-show',
            'label_block' => false,
            'options' => [
                'content-show' => esc_html__('Appear', 'essential-addons-elementor'),
                'slide-in-left' => esc_html__('SlideInLeft', 'essential-addons-elementor'),
                'slide-in-right' => esc_html__('SlideInRight', 'essential-addons-elementor'),
                'slide-in-swing-left' => esc_html__('SlideInSwingLeft', 'essential-addons-elementor'),
                'slide-in-swing-right' => esc_html__('SlideInSwingRight', 'essential-addons-elementor'),
            ],
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_animation_reveal_time', [
            'label' => esc_html__('Timing (ms)', 'essential-addons-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => false,
            'default' => 400
                ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (General Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_interactive_card_general_style', [
            'label' => esc_html__('General Style', 'essential-addons-elementor'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_responsive_control(
                'sa_el_interactive_card_general_width', [
            'label' => esc_html__('Max Width', 'essential-addons-elementor'),
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
            'label' => esc_html__('Height', 'essential-addons-elementor'),
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
            'label' => esc_html__('Background Color', 'essential-addons-elementor'),
            'type' => Controls_Manager::COLOR,
            'default' => '#262C37',
            'selectors' => [
                '{{WRAPPER}} .interactive-card' => 'background: {{VALUE}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_interactive_card_general_container_padding', [
            'label' => esc_html__('Padding', 'essential-addons-elementor'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .interactive-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_small_overlay_circle_bg', [
            'label' => esc_html__('Small Overlay Circle', 'essential-addons-elementor'),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .interactive-card .front-content::after' => 'background-color: {{VALUE}};',
            ],
                ]
        );
        $this->add_control(
                'sa_el_interactive_card_large_overlay_circle_bg', [
            'label' => esc_html__('Large Overlay Circle', 'essential-addons-elementor'),
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
            'label' => esc_html__('Front Panel Style', 'essential-addons-elementor'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_front_panel_bg_color', [
            'label' => esc_html__('Background Color', 'essential-addons-elementor'),
            'type' => Controls_Manager::COLOR,
            'default' => '#262C37',
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
            'label' => esc_html__('Front Content Width', 'essential-addons-elementor'),
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
            'label' => esc_html__('Front Content Height', 'essential-addons-elementor'),
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
            'label' => esc_html__('Padding', 'essential-addons-elementor'),
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
            'label' => esc_html__('Border', 'essential-addons-elementor'),
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
            'label' => esc_html__('Rear Panel Style', 'essential-addons-elementor'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_rear_panel_bg_color', [
            'label' => esc_html__('Background Color', 'essential-addons-elementor'),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .interactive-card .content' => 'background: {{VALUE}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_interactive_card_rear_panel_container_padding', [
            'label' => esc_html__('Padding', 'essential-addons-elementor'),
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
            'label' => esc_html__('Border', 'essential-addons-elementor'),
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
            'label' => esc_html__('Front Panel Color &amp; Typography', 'essential-addons-elementor'),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card'
            ]
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_front_title_counter_heading', [
            'label' => esc_html__('Counter Style', 'essential-addons-elementor'),
            'type' => Controls_Manager::HEADING,
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_front_counter_color', [
            'label' => esc_html__('Color', 'essential-addons-elementor'),
            'type' => Controls_Manager::COLOR,
            'default' => '#737373',
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
            'label' => esc_html__('Title Style', 'essential-addons-elementor'),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before'
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_front_title_color', [
            'label' => esc_html__('Color', 'essential-addons-elementor'),
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
            'label' => esc_html__('Content Style', 'essential-addons-elementor'),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before'
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_front_content_color', [
            'label' => esc_html__('Color', 'essential-addons-elementor'),
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
            'label' => esc_html__('Rear Panel Color &amp; Typography', 'essential-addons-elementor'),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'sa_el_interactive_card_type!' => 'scrollable'
            ]
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_rear_title_heading', [
            'label' => esc_html__('Title Style', 'essential-addons-elementor'),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before'
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_rear_title_color', [
            'label' => esc_html__('Color', 'essential-addons-elementor'),
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
            'label' => esc_html__('Content Style', 'essential-addons-elementor'),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before'
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_rear_content_color', [
            'label' => esc_html__('Color', 'essential-addons-elementor'),
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
            'label' => esc_html__('Front Panel Button Style', 'essential-addons-elementor'),
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
            'label' => esc_html__('Button Style ( Front Panel )', 'essential-addons-elementor'),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card'
            ]
                ]
        );

        $this->add_responsive_control(
                'sa_el_interactive_card_front_btn_padding', [
            'label' => esc_html__('Padding', 'essential-addons-elementor'),
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
            'label' => esc_html__('Margin', 'essential-addons-elementor'),
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
            'label' => esc_html__('Normal', 'essential-addons-elementor'),
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card'
            ]
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_front_btn_normal_text_color', [
            'label' => esc_html__('Text Color', 'essential-addons-elementor'),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
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
            'label' => esc_html__('Background Color', 'essential-addons-elementor'),
            'type' => Controls_Manager::COLOR,
            'default' => '#49508c',
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
            'label' => esc_html__('Border', 'essential-addons-elementor'),
            'selector' => '{{WRAPPER}} .interactive-card .front-text-content .footer a.interactive-btn',
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card'
            ]
                ]
        );

        $this->add_responsive_control(
                'sa_el_interactive_card_front_btn_border_radius', [
            'label' => esc_html__('Border Radius', 'essential-addons-elementor'),
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
            'label' => esc_html__('Hover', 'essential-addons-elementor'),
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card'
            ]
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_front_btn_hover_text_color', [
            'label' => esc_html__('Text Color', 'essential-addons-elementor'),
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
            'label' => esc_html__('Background Color', 'essential-addons-elementor'),
            'type' => Controls_Manager::COLOR,
            'default' => '#7e5ae2',
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
            'label' => esc_html__('Border Color', 'essential-addons-elementor'),
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
            'label' => esc_html__('Rear Panel Button Style', 'essential-addons-elementor'),
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
            'label' => esc_html__('Button Style ( Rear Panel )', 'essential-addons-elementor'),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
            'condition' => [
                'sa_el_interactive_card_style' => 'text-card'
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_interactive_card_rear_btn_padding', [
            'label' => esc_html__('Padding', 'essential-addons-elementor'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .interactive-card .interactive-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_interactive_card_rear_btn_margin', [
            'label' => esc_html__('Margin', 'essential-addons-elementor'),
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
        $this->start_controls_tab('sa_el_interactive_card_rear_btn_normal', ['label' => esc_html__('Normal', 'essential-addons-elementor')]);

        $this->add_control(
                'sa_el_interactive_card_rear_btn_normal_text_color', [
            'label' => esc_html__('Text Color', 'essential-addons-elementor'),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .interactive-card .interactive-btn' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_rear_btn_normal_bg_color', [
            'label' => esc_html__('Background Color', 'essential-addons-elementor'),
            'type' => Controls_Manager::COLOR,
            'default' => '#49508c',
            'selectors' => [
                '{{WRAPPER}} .interactive-card .interactive-btn' => 'background: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_interactive_card_rear_btn_border',
            'label' => esc_html__('Border', 'essential-addons-elementor'),
            'selector' => '{{WRAPPER}} .interactive-card .interactive-btn',
                ]
        );

        $this->add_responsive_control(
                'sa_el_interactive_card_rear_btn_border_radius', [
            'label' => esc_html__('Border Radius', 'essential-addons-elementor'),
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
        $this->start_controls_tab('sa_el_interactive_card_rear_btn_hover', ['label' => esc_html__('Hover', 'essential-addons-elementor')]);

        $this->add_control(
                'sa_el_interactive_card_rear_btn_hover_text_color', [
            'label' => esc_html__('Text Color', 'essential-addons-elementor'),
            'type' => Controls_Manager::COLOR,
            'default' => '#f9f9f9',
            'selectors' => [
                '{{WRAPPER}} .interactive-card .interactive-btn:hover' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_rear_btn_hover_bg_color', [
            'label' => esc_html__('Background Color', 'essential-addons-elementor'),
            'type' => Controls_Manager::COLOR,
            'default' => '#7e5ae2',
            'selectors' => [
                '{{WRAPPER}} .interactive-card .interactive-btn:hover' => 'background: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_rear_btn_hover_border_color', [
            'label' => esc_html__('Border Color', 'essential-addons-elementor'),
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
            'label' => esc_html__('Close Button Style', 'essential-addons-elementor'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_close_button_bg_color', [
            'label' => esc_html__('Background Color', 'essential-addons-elementor'),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .interactive-card .close-me' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_close_button_icon_color', [
            'label' => esc_html__('Icon Color', 'essential-addons-elementor'),
            'type' => Controls_Manager::COLOR,
            'default' => '#333',
            'selectors' => [
                '{{WRAPPER}} .interactive-card .close-me' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_close_button_icon', [
            'label' => esc_html__('Icon', 'essential-addons-elementor'),
            'type' => Controls_Manager::ICON,
            'default' => 'fa fa-times',
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_close_button_icon_size', [
            'label' => esc_html__('Icon Size', 'essential-addons-elementor'),
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
            'label' => esc_html__('Icon Font Size', 'essential-addons-elementor'),
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
            'label' => esc_html__('Position', 'essential-addons-elementor'),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before'
                ]
        );

        $this->add_control(
                'sa_el_interactive_card_close_btn_from_top', [
            'label' => esc_html__('Vertical', 'essential-addons-elementor'),
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
            'label' => esc_html__('Horizontal', 'essential-addons-elementor'),
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


}
