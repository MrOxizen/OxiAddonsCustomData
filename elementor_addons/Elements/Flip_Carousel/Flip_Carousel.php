<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Flip_Carousel;

use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Group_Control_Image_Size as Group_Control_Image_Size;
use \Elementor\Widget_Base as Widget_Base;

if (!defined('ABSPATH'))
    exit; // If this file is called directly, abort.

class Flip_Carousel extends Widget_Base
{

    public function get_name()
    {
        return 'sa_el_flip_carousel';
    }

    public function get_title()
    {
        return esc_html__('Flip Carousel', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon()
    {
        return 'eicon-carousel  oxi-el-admin-icon';
    }

    public function get_categories()
    {
        return ['sa-el-addons'];
    }

    public function get_script_depends()
    {
        return [
            'sa_el_scripts'
        ];
    }

    protected function _register_controls()
    {

        /**
         * Flip Carousel Settings
         */
        $this->start_controls_section(
            'sa_el_section_flip_carousel_settings',
            [
                'label' => esc_html__('Filp Carousel Settings', SA_ELEMENTOR_TEXTDOMAIN)
            ]
        );

        $this->add_control(
            'sa_el_flip_carousel_type',
            [
                'label' => esc_html__('Carousel Type', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'coverflow',
                'label_block' => false,
                'options' => [
                    'coverflow' => esc_html__('Cover-Flow', SA_ELEMENTOR_TEXTDOMAIN),
                    'carousel' => esc_html__('Carousel', SA_ELEMENTOR_TEXTDOMAIN),
                    'flat' => esc_html__('Flat', SA_ELEMENTOR_TEXTDOMAIN),
                    'wheel' => esc_html__('Wheel', SA_ELEMENTOR_TEXTDOMAIN),
                ],
            ]
        );

        $this->add_control(
            'sa_el_flip_carousel_fade_in',
            [
                'label' => esc_html__('Fade In (ms)', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => 400,
            ]
        );

        $this->add_control(
            'sa_el_flip_carousel_start_from',
            [
                'label' => __('Item Starts From Center?', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'true',
                'label_on' => esc_html__('Yes', SA_ELEMENTOR_TEXTDOMAIN),
                'label_off' => esc_html__('No', SA_ELEMENTOR_TEXTDOMAIN),
                'return_value' => 'true',
            ]
        );

        /**
         * Condition: 'sa_el_flip_carousel_start_from' => 'true'
         */
        $this->add_control(
            'sa_el_flip_carousel_starting_number',
            [
                'label' => esc_html__('Enter Starts Number', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => 1,
                'condition' => [
                    'sa_el_flip_carousel_start_from!' => 'true'
                ]
            ]
        );

        $this->add_control(
            'sa_el_flip_carousel_loop',
            [
                'label' => __('Loop', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'false',
                'label_on' => esc_html__('Yes', SA_ELEMENTOR_TEXTDOMAIN),
                'label_off' => esc_html__('No', SA_ELEMENTOR_TEXTDOMAIN),
                'return_value' => 'true',
            ]
        );

        $this->add_control(
            'sa_el_flip_carousel_autoplay',
            [
                'label' => __('Autoplay', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'true',
                'label_on' => esc_html__('Yes', SA_ELEMENTOR_TEXTDOMAIN),
                'label_off' => esc_html__('No', SA_ELEMENTOR_TEXTDOMAIN),
                'return_value' => 'true',
            ]
        );

        /**
         * Condition: 'sa_el_flip_carousel_autoplay' => 'true'
         */
        $this->add_control(
            'sa_el_flip_carousel_autoplay_time',
            [
                'label' => esc_html__('Autoplay Timeout (ms)', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => 2000,
                'condition' => [
                    'sa_el_flip_carousel_autoplay' => 'true'
                ]
            ]
        );

        $this->add_control(
            'sa_el_flip_carousel_pause_on_hover',
            [
                'label' => __('Pause On Hover', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'true',
                'label_on' => esc_html__('Yes', SA_ELEMENTOR_TEXTDOMAIN),
                'label_off' => esc_html__('No', SA_ELEMENTOR_TEXTDOMAIN),
                'return_value' => 'true',
            ]
        );

        $this->add_control(
            'sa_el_flip_carousel_click',
            [
                'label' => __('On Click Play?', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'true',
                'label_on' => esc_html__('Yes', SA_ELEMENTOR_TEXTDOMAIN),
                'label_off' => esc_html__('No', SA_ELEMENTOR_TEXTDOMAIN),
                'return_value' => 'true',
            ]
        );

        $this->add_control(
            'sa_el_flip_carousel_scrollwheel',
            [
                'label' => __('On Scroll Wheel Play?', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'true',
                'label_on' => esc_html__('Yes', SA_ELEMENTOR_TEXTDOMAIN),
                'label_off' => esc_html__('No', SA_ELEMENTOR_TEXTDOMAIN),
                'return_value' => 'true',
            ]
        );

        $this->add_control(
            'sa_el_flip_carousel_touch',
            [
                'label' => __('On Touch Play?', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'true',
                'label_on' => esc_html__('Yes', SA_ELEMENTOR_TEXTDOMAIN),
                'label_off' => esc_html__('No', SA_ELEMENTOR_TEXTDOMAIN),
                'return_value' => 'true',
            ]
        );

        $this->add_control(
            'sa_el_flip_carousel_button',
            [
                'label' => __('Carousel Navigator', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'true',
                'label_on' => esc_html__('Yes', SA_ELEMENTOR_TEXTDOMAIN),
                'label_off' => esc_html__('No', SA_ELEMENTOR_TEXTDOMAIN),
                'return_value' => 'true',
            ]
        );

        $this->add_control(
            'sa_el_flip_carousel_spacing',
            [
                'label' => esc_html__('Slide Spacing', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => -0.6
                ],
                'range' => [
                    'px' => [
                        'min' => -1,
                        'max' => 1,
                        'step' => 0.1
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * Filp Carousel Slides
         */
        $this->start_controls_section(
            'sa_el_fli_carousel_slides',
            [
                'label' => esc_html__('Flip Carousel Slides', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'sa_el_flip_carousel_slides',
            [
                'type' => Controls_Manager::REPEATER,
                'seperator' => 'before',
                'default' => [
                    ['sa_el_flip_carousel_slide' => 'https://www.shortcode-addons.com/wp-content/uploads/2019/07/Untitled-1.jpg'],
                    ['sa_el_flip_carousel_slide' => 'https://www.shortcode-addons.com/wp-content/uploads/2019/07/Untitled-1.jpg'],
                    ['sa_el_flip_carousel_slide' => 'https://www.shortcode-addons.com/wp-content/uploads/2019/07/Untitled-1.jpg'],
                    ['sa_el_flip_carousel_slide' => 'https://www.shortcode-addons.com/wp-content/uploads/2019/07/Untitled-1.jpg'],
                    ['sa_el_flip_carousel_slide' => 'https://www.shortcode-addons.com/wp-content/uploads/2019/07/Untitled-1.jpg'],
                    ['sa_el_flip_carousel_slide' => 'https://www.shortcode-addons.com/wp-content/uploads/2019/07/Untitled-1.jpg'],
                    ['sa_el_flip_carousel_slide' => 'https://www.shortcode-addons.com/wp-content/uploads/2019/07/Untitled-1.jpg'],
                ],
                'fields' => [
                    [
                        'name' => 'sa_el_flip_carousel_slide',
                        'label' => esc_html__('Slide', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => 'https://www.shortcode-addons.com/wp-content/uploads/2019/07/Untitled-1.jpg',
                        ],
                    ],
                    [
                        'name' => 'sa_el_flip_carousel_slide_text',
                        'label' => esc_html__('Slide Text', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__('', SA_ELEMENTOR_TEXTDOMAIN)
                    ],
                    [
                        'name' => 'sa_el_flip_carousel_enable_slide_link',
                        'label' => __('Enable Slide Link', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::SWITCHER,
                        'default' => 'false',
                        'label_on' => esc_html__('Yes', SA_ELEMENTOR_TEXTDOMAIN),
                        'label_off' => esc_html__('No', SA_ELEMENTOR_TEXTDOMAIN),
                        'return_value' => 'true',
                    ],
                    [
                        'name' => 'sa_el_flip_carousel_slide_link',
                        'label' => esc_html__('Slide Link', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::URL,
                        'label_block' => true,
                        'default' => [
                            'url' => '#',
                            'is_external' => '',
                        ],
                        'show_external' => true,
                        'condition' => [
                            'sa_el_flip_carousel_enable_slide_link' => 'true'
                        ]
                    ]
                ],
                'title_field' => '{{sa_el_flip_carousel_slide_text}}',
            ]
        );

        $this->end_controls_section();

        if (!apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', ['', '', TRUE])) {
            $this->start_controls_section(
                'sa_el_section_pro',
                [
                    'label' => __('Go Premium for More Features', SA_ELEMENTOR_TEXTDOMAIN)
                ]
            );

            $this->add_control(
                'sa_el_control_get_pro',
                [
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
         * Tab Style (Flip Carousel Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_flip_carousel_style_settings',
            [
                'label' => esc_html__('Flip Carousel Style', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'sa_el_flip_carousel_bg_color',
            [
                'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_flip_carousel' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_el_flip_carousel_container_padding',
            [
                'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_flip_carousel' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_el_flip_carousel_container_margin',
            [
                'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_flip_carousel' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sa_el_flip_carousel_border',
                'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .sa_el_flip_carousel',
            ]
        );

        $this->add_control(
            'sa_el_flip_carousel_border_radius',
            [
                'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 4,
                ],
                'range' => [
                    'px' => [
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_flip_carousel' => 'border-radius: {{SIZE}}px;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'sa_el_flip_carousel_shadow',
                'selector' => '{{WRAPPER}} .sa_el_flip_carousel',
            ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Flip Carousel Navigator Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_filp_carousel_custom_nav_settings',
            [
                'label' => esc_html__('Navigator Style', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'sa_el_flip_carousel_custom_nav',
            [
                'label' => __('Navigator', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'false',
                'label_on' => esc_html__('Yes', SA_ELEMENTOR_TEXTDOMAIN),
                'label_off' => esc_html__('No', SA_ELEMENTOR_TEXTDOMAIN),
                'return_value' => 'true',
            ]
        );

        /**
         * Condition: 'sa_el_flip_carousel_custom_nav' => 'true'
         */
        $this->add_control(
            'sa_el_flip_carousel_custom_nav_prev',
            [
                'label' => esc_html__('Previous Icon', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::ICON,
                'default' => 'fa fa-arrow-left',
                'condition' => [
                    'sa_el_flip_carousel_custom_nav' => 'true'
                ]
            ]
        );

        /**
         * Condition: 'sa_el_flip_carousel_custom_nav' => 'true'
         */
        $this->add_control(
            'sa_el_flip_carousel_custom_nav_next',
            [
                'label' => esc_html__('Next Icon', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::ICON,
                'default' => 'fa fa-arrow-right',
                'condition' => [
                    'sa_el_flip_carousel_custom_nav' => 'true'
                ]
            ]
        );

        $this->add_responsive_control(
            'sa_el_flip_carousel_custom_nav_margin',
            [
                'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .flip-custom-nav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_flip_carousel_custom_nav_size',
            [
                'label' => esc_html__('Icon Size', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => '30'
                ],
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flip-custom-nav' => 'font-size: {{SIZE}}px;',
                ],
            ]
        );

        $this->add_control(
            'sa_el_flip_carousel_custom_nav_bg_size',
            [
                'label' => esc_html__('Background Size', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 40,
                ],
                'range' => [
                    'px' => [
                        'max' => 80,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flip-custom-nav' => 'width: {{SIZE}}px; height: {{SIZE}}px; line-height: {{SIZE}}px;',
                ],
            ]
        );

        $this->add_control(
            'sa_el_flip_carousel_custom_nav_border_radius',
            [
                'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 50,
                ],
                'range' => [
                    'px' => [
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flip-custom-nav' => 'border-radius: {{SIZE}}px;',
                ],
            ]
        );

        $this->add_control(
            'sa_el_flip_carousel_custom_nav_color',
            [
                'label' => esc_html__('Icon Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#42418e',
                'selectors' => [
                    '{{WRAPPER}} .flip-custom-nav' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_flip_carousel_custom_nav_bg_color',
            [
                'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .flip-custom-nav' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sa_el_flip_carousel_custom_nav_border',
                'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .flip-custom-nav',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'sa_el_flip_carousel_custom_navl_shadow',
                'selector' => '{{WRAPPER}} .flip-custom-nav',
            ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Flip Carousel Content Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'sa_el_section_filp_carousel_content_style_settings',
            [
                'label' => esc_html__('Color &amp; Typography', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'sa_el_flip_carousel_content_heading',
            [
                'label' => esc_html__('Content Style', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'sa_el_filp_carousel_content_color',
            [
                'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#4d4d4d',
                'selectors' => [
                    '{{WRAPPER}} .flip-carousel-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_el_flip_carousel_content_typography',
                'selector' => '{{WRAPPER}} .flip-carousel-text',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings();
        $flipbox_image = $this->get_settings('sa_el_flipbox_image');
        $flipbox_image_url = Group_Control_Image_Size::get_attachment_image_src($flipbox_image['id'], 'thumbnail', $settings);

        // Loop Value
        if ('true' == $settings['sa_el_flip_carousel_loop']) : $eael_loop = 'true';
        else : $eael_loop = 'false';
        endif;
        // Autoplay Value
        if ('true' == $settings['sa_el_flip_carousel_autoplay']) : $eael_autoplay = $settings['sa_el_flip_carousel_autoplay_time'];
        else : $eael_autoplay = 'false';
        endif;
        // Pause On Hover Value
        if ('true' == $settings['sa_el_flip_carousel_pause_on_hover']) : $eael_pause_hover = 'true';
        else : $eael_pause_hover = 'false';
        endif;
        // Click Value
        if ('true' == $settings['sa_el_flip_carousel_click']) : $eael_click = 'true';
        else : $eael_click = 'false';
        endif;
        // Scroll Wheel Value
        if ('true' == $settings['sa_el_flip_carousel_scrollwheel']) : $eael_wheel = 'true';
        else : $eael_wheel = 'false';
        endif;
        // Touch Play Value
        if ('true' == $settings['sa_el_flip_carousel_touch']) : $eael_touch = 'true';
        else : $eael_touch = 'false';
        endif;
        // Navigator Value
        if ('true' == $settings['sa_el_flip_carousel_button']) : $eael_buttons = 'true';
        else : $eael_buttons = 'false';
        endif;
        if ('true' == $settings['sa_el_flip_carousel_custom_nav']) : $eael_custom_buttons = 'custom';
        else : $eael_custom_buttons = '';
        endif;
        // Start Value
        if ('true' == $settings['sa_el_flip_carousel_start_from']) : $eael_start = 'center';
        else : $eael_start = (int) $settings['sa_el_flip_carousel_starting_number'];
        endif;
        ?>
        <div class="sa_el_flip_carousel flip-carousel-<?php echo esc_attr($this->get_id()); ?>" data-style="<?php echo esc_attr($settings['sa_el_flip_carousel_type']); ?>" data-start="<?php echo $eael_start; ?>" data-fadein="<?php echo esc_attr((int) $settings['sa_el_flip_carousel_fade_in']); ?>" data-loop="<?php echo $eael_loop; ?>" data-autoplay="<?php echo $eael_autoplay; ?>" data-pauseonhover="<?php echo $eael_pause_hover; ?>" data-spacing="<?php echo esc_attr($settings['sa_el_flip_carousel_spacing']['size']); ?>" data-click="<?php echo $eael_click; ?>" data-scrollwheel="<?php echo $eael_wheel; ?>" data-touch="<?php echo $eael_touch; ?>" data-buttons="<?php echo $eael_custom_buttons; ?>" data-buttonprev="<?php echo esc_attr($settings['sa_el_flip_carousel_custom_nav_prev']); ?>" data-buttonnext="<?php echo esc_attr($settings['sa_el_flip_carousel_custom_nav_next']); ?>">
            <ul class="flip-items">
                <?php
                foreach ($settings['sa_el_flip_carousel_slides'] as $slides) :
                    $image_alt_text = get_post_meta($slides['sa_el_flip_carousel_slide']['id'], '_wp_attachment_image_alt', true);
                    ?>
                    <li>
                        <?php
                        if ('true' == $slides['sa_el_flip_carousel_enable_slide_link']) :
                            $eael_slide_link = $slides['sa_el_flip_carousel_slide_link']['url'];
                            $target = $slides['sa_el_flip_carousel_slide_link']['is_external'] ? 'target="_blank"' : '';
                            $nofollow = $slides['sa_el_flip_carousel_slide_link']['nofollow'] ? 'rel="nofollow"' : '';
                            ?>
                            <a href="<?php echo esc_url($eael_slide_link); ?>" <?php echo $target; ?> <?php echo $nofollow; ?>>
                                <img src="<?php echo $slides['sa_el_flip_carousel_slide']['url'] ?>" alt="<?php echo esc_attr($image_alt_text); ?>">
                            </a>
                            <?php if ($slides['sa_el_flip_carousel_slide_text'] != '') : ?>
                                <p class="flip-carousel-text"><?php echo esc_html__($slides['sa_el_flip_carousel_slide_text']); ?></p>
                            <?php endif; ?>
                        <?php else : ?>
                            <img src="<?php echo $slides['sa_el_flip_carousel_slide']['url'] ?>" alt="<?php echo esc_attr($image_alt_text); ?>">
                            <?php if ($slides['sa_el_flip_carousel_slide_text'] != '') : ?>
                                <p class="flip-carousel-text"><?php echo esc_html__($slides['sa_el_flip_carousel_slide_text']); ?></p>
                            <?php endif; ?>
                        <?php endif; ?>

                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php
    }

    protected function content_template()
    {
        ?>
    <?php
    }
}
