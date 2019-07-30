<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Image_Accordion;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Description of Image Accordion
 *
 * @author biplo
 * 
 */
use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Widget_Base as Widget_Base;
use \SA_ELEMENTOR_ADDONS\Classes\Bootstrap;

class Image_Accordion extends Widget_Base {

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function get_name() {
        return 'sa_el_img_accordion';
    }

    public function get_title() {
        return esc_html__('Image Accordion', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon() {
        return 'eicon-featured-image  oxi-el-admin-icon';
    }

    public function get_categories() {
        return ['sa-el-addons'];
    }

    protected function _register_controls() {
        /**
         * Image accordion Content Settings
         */
        $this->start_controls_section(
                'sa_el_section_img_accordion_settings', [
            'label' => esc_html__('Image Accordion Settings', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'sa_el_img_accordion_type', [
            'label' => esc_html__('Accordion Style', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'on-hover',
            'label_block' => false,
            'options' => [
                'on-hover' => esc_html__('On Hover', SA_ELEMENTOR_TEXTDOMAIN),
                'on-click' => esc_html__('On Click', SA_ELEMENTOR_TEXTDOMAIN),
            ],
                ]
        );

        $this->add_control(
                'sa_el_img_accordions', [
            'type' => Controls_Manager::REPEATER,
            'seperator' => 'before',
            'default' => [
                ['sa_el_accordion_bg' => 'https://www.shortcode-addons.com/wp-content/uploads/2019/07/Untitled-1.jpg'],
                ['sa_el_accordion_bg' => 'https://www.shortcode-addons.com/wp-content/uploads/2019/07/Untitled-1.jpg'],
                ['sa_el_accordion_bg' => 'https://www.shortcode-addons.com/wp-content/uploads/2019/07/Untitled-1.jpg'],
                ['sa_el_accordion_bg' => 'https://www.shortcode-addons.com/wp-content/uploads/2019/07/Untitled-1.jpg'],
            ],
            'fields' => [
                [
                    'name' => 'sa_el_accordion_bg',
                    'label' => esc_html__('Background Image', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::MEDIA,
                    'label_block' => true,
                    'default' => [
                        'url' => 'https://www.shortcode-addons.com/wp-content/uploads/2019/07/Untitled-1.jpg',
                    ],
                ],
                [
                    'name' => 'sa_el_accordion_tittle',
                    'label' => esc_html__('Title', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => esc_html__('Accordion item title', SA_ELEMENTOR_TEXTDOMAIN),
                    'dynamic' => ['active' => true],
                ],
                [
                    'name' => 'sa_el_accordion_content',
                    'label' => esc_html__('Content', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::WYSIWYG,
                    'label_block' => true,
                    'default' => esc_html__('Accordion content goes here!', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                [
                    'name' => 'sa_el_accordion_title_link',
                    'label' => esc_html__('Title Link', SA_ELEMENTOR_TEXTDOMAIN),
                    'type' => Controls_Manager::URL,
                    'label_block' => true,
                    'default' => [
                        'url' => '#',
                        'is_external' => '',
                    ],
                    'show_external' => true,
                ],
            ],
            'title_field' => '{{sa_el_accordion_tittle}}',
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
         * Tab Style (Image accordion)
         * -------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_section_img_accordion_style_settings', [
            'label' => esc_html__('Image Accordion Style', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'sa_el_accordion_height', [
            'label' => esc_html__('Height', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'default' => '400',
            'description' => 'Unit in px',
            'selectors' => [
                '{{WRAPPER}} .sa-el-img-accordion ' => 'height: {{VALUE}}px;',
            ],
                ]
        );

        $this->add_control(
                'sa_el_accordion_bg_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa-el-img-accordion' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_accordion_container_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-img-accordion' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_accordion_container_margin', [
            'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-img-accordion' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_accordion_border',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa-el-img-accordion',
                ]
        );

        $this->add_control(
                'sa_el_accordion_border_radius', [
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
                '{{WRAPPER}} .sa-el-img-accordion' => 'border-radius: {{SIZE}}px;',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_el_accordion_shadow',
            'selector' => '{{WRAPPER}} .sa-el-img-accordion',
                ]
        );

        $this->add_control(
                'sa_el_accordion_img_overlay_color', [
            'label' => esc_html__('Overlay Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => 'rgba(0, 0, 0, .3)',
            'selectors' => [
                '{{WRAPPER}} .sa-el-img-accordion a:after' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_accordion_img_hover_color', [
            'label' => esc_html__('Hover Overlay Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => 'rgba(0, 0, 0, .5)',
            'selectors' => [
                '{{WRAPPER}} .sa-el-img-accordion a:hover::after' => 'background-color: {{VALUE}};',
                '{{WRAPPER}} .sa-el-img-accordion a.overlay-active:after' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Image accordion Content Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_section_img_accordion_typography_settings', [
            'label' => esc_html__('Color &amp; Typography', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'sa_el_accordion_title_text', [
            'label' => esc_html__('Title', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
                ]
        );

        $this->add_control(
                'sa_el_accordion_title_color', [
            'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .sa-el-img-accordion .overlay h2' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_accordion_title_typography',
            'selector' => '{{WRAPPER}} .sa-el-img-accordion .overlay h2',
                ]
        );

        $this->add_control(
                'sa_el_accordion_content_text', [
            'label' => esc_html__('Content', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
                ]
        );

        $this->add_control(
                'sa_el_accordion_content_color', [
            'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#fff',
            'selectors' => [
                '{{WRAPPER}} .sa-el-img-accordion .overlay p' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_accordion_content_typography',
            'selector' => '{{WRAPPER}} .sa-el-img-accordion .overlay p',
                ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $this->add_render_attribute('sa-el-image-accordion', 'class', 'sa-el-img-accordion');
        $this->add_render_attribute('sa-el-image-accordion', 'data-img-accordion-id', esc_attr($this->get_id()));
        $this->add_render_attribute('sa-el-image-accordion', 'data-img-accordion-type', $settings['sa_el_img_accordion_type']);

        if (!empty($settings['sa_el_img_accordions'])) {
            echo '<div ' . $this->get_render_attribute_string('sa-el-image-accordion') . ' id="sa-el-img-accordion-' . $this->get_id() . '">';
            foreach ($settings['sa_el_img_accordions'] as $img_accordion) {
                $sa_el_accordion_link = $img_accordion['sa_el_accordion_title_link']['url'];
                $target = $img_accordion['sa_el_accordion_title_link']['is_external'] ? 'target="_blank"' : '';
                $nofollow = $img_accordion['sa_el_accordion_title_link']['nofollow'] ? 'rel="nofollow"' : '';

                echo '<a href="' . esc_url($sa_el_accordion_link) . '" ' . $target . ' ' . $nofollow . ' style="background-image: url(' . esc_url($img_accordion['sa_el_accordion_bg']['url']) . ');">
		            <div class="overlay">
		              <div class="overlay-inner">
		                <h2>' . $img_accordion['sa_el_accordion_tittle'] . '</h2>
		                <p>' . $img_accordion['sa_el_accordion_content'] . '</p>
		              </div>
		            </div>
		          </a>';
            }
            echo '</div>';

            if ('on-hover' === $settings['sa_el_img_accordion_type']) {
                echo '<style>
                  #sa-el-img-accordion-' . $this->get_id() . ' a:hover {
                    flex: 3;
                  }
                  #sa-el-img-accordion-' . $this->get_id() . ' a:hover .overlay-inner * {
                    opacity: 1;
                    visibility: visible;
                    transform: none;
                    transition: all .3s .3s;
                  }
                </style>';
            }
        }
    }

}
