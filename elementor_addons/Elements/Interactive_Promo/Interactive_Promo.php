<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Interactive_Promo;

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

class Interactive_Promo extends Widget_Base {

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function get_name() {
        return 'sa_el_interactive_promo';
    }

    public function get_title() {
        return esc_html__('Interactive Promo', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon() {
        return 'eicon-info-box  oxi-el-admin-icon';
    }

    public function get_categories() {
        return ['sa-el-addons'];
    }

    protected function _register_controls() {

        // Content Controls
        $this->start_controls_section(
                'sa_el_section_promo_content', [
            'label' => esc_html__('Promo Content', SA_ELEMENTOR_TEXTDOMAIN)
                ]
        );


        $this->add_control(
                'promo_image', [
            'label' => __('Promo Image', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
                ]
        );

        $this->add_control(
                'promo_image_alt', [
            'label' => __('Image ALT Tag', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => '',
            'placeholder' => __('Enter alter tag for the image', SA_ELEMENTOR_TEXTDOMAIN),
            'title' => __('Input image alter tag here', SA_ELEMENTOR_TEXTDOMAIN),
            'dynamic' => ['action' => true]
                ]
        );

        $this->add_control(
                'promo_heading', [
            'label' => __('Promo Heading', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => 'I am Interactive',
            'placeholder' => __('Enter heading for the promo', SA_ELEMENTOR_TEXTDOMAIN),
            'title' => __('Enter heading for the promo', SA_ELEMENTOR_TEXTDOMAIN),
            'dynamic' => ['active' => true]
                ]
        );

        $this->add_control(
                'promo_content', [
            'label' => __('Promo Content', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::WYSIWYG,
            'default' => __('Click to inspect, then edit as needed.', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );


        $this->add_control(
                'promo_link_url', [
            'label' => __('Link URL', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => '#',
            'placeholder' => __('Enter link URL for the promo', SA_ELEMENTOR_TEXTDOMAIN),
            'title' => __('Enter heading for the promo', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'promo_link_target', [
            'label' => esc_html__('Open in new window?', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('_blank', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('_self', SA_ELEMENTOR_TEXTDOMAIN),
            'default' => '_self',
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

        // Style Controls
        $this->start_controls_section(
                'sa_el_section_promo_settings', [
            'label' => esc_html__('Promo Effects &amp; Settings', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE
                ]
        );

        $this->add_control(
                'promo_effect', [
            'label' => esc_html__('Set Promo Effect', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'effect-lily',
            'options' => [
                'effect-lily' => esc_html__('Lily', SA_ELEMENTOR_TEXTDOMAIN),
                'effect-sadie' => esc_html__('Sadie', SA_ELEMENTOR_TEXTDOMAIN),
                'effect-layla' => esc_html__('Layla', SA_ELEMENTOR_TEXTDOMAIN),
                'effect-oscar' => esc_html__('Oscar', SA_ELEMENTOR_TEXTDOMAIN),
                'effect-marley' => esc_html__('Marley', SA_ELEMENTOR_TEXTDOMAIN),
                'effect-ruby' => esc_html__('Ruby', SA_ELEMENTOR_TEXTDOMAIN),
                'effect-roxy' => esc_html__('Roxy', SA_ELEMENTOR_TEXTDOMAIN),
                'effect-bubba' => esc_html__('Bubba', SA_ELEMENTOR_TEXTDOMAIN),
                'effect-romeo' => esc_html__('Romeo', SA_ELEMENTOR_TEXTDOMAIN),
                'effect-sarah' => esc_html__('Sarah', SA_ELEMENTOR_TEXTDOMAIN),
                'effect-chico' => esc_html__('Chico', SA_ELEMENTOR_TEXTDOMAIN),
                'effect-milo' => esc_html__('Milo', SA_ELEMENTOR_TEXTDOMAIN),
                'effect-apollo' => esc_html__('Apolo', SA_ELEMENTOR_TEXTDOMAIN),
                'effect-jazz' => esc_html__('Jazz', SA_ELEMENTOR_TEXTDOMAIN),
                'effect-ming' => esc_html__('Ming', SA_ELEMENTOR_TEXTDOMAIN),
            ],
                ]
        );

        $this->add_control(
                'promo_container_width', [
            'label' => esc_html__('Set max width for the container?', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('yes', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('no', SA_ELEMENTOR_TEXTDOMAIN),
            'default' => 'yes',
                ]
        );

        $this->add_responsive_control(
                'promo_container_width_value', [
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
                '{{WRAPPER}} .sa-el-interactive-promo' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'promo_container_width' => 'yes',
            ],
                ]
        );


        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'promo_border',
            'selector' => '{{WRAPPER}} .sa-el-interactive-promo',
                ]
        );


        $this->add_control(
                'promo_border_radius', [
            'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-interactive-promo' => 'border-radius: {{SIZE}}{{UNIT}};',
            ],
                ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
                'sa_el_section_promo_styles', [
            'label' => esc_html__('Colors &amp; Typography', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE
                ]
        );

        $this->add_control(
                'promo_heading_color', [
            'label' => esc_html__('Promo Heading Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .sa-el-interactive-promo figure figcaption .sa-promo' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_promo_title_typography',
            'scheme' => Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .sa-el-interactive-promo figure figcaption .sa-promo',
                ]
        );

        $this->add_control(
                'promo_content_color', [
            'label' => esc_html__('Promo Content Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .sa-el-interactive-promo figure p' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_promo_content_typography',
            'scheme' => Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .sa-el-interactive-promo figure p',
                ]
        );

        $this->add_control(
                'promo_overlay_color', [
            'label' => esc_html__('Promo Overlay Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#3085a3',
            'selectors' => [
                '{{WRAPPER}} .sa-el-interactive-promo figure' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();
        $promo_image = $this->get_settings('promo_image');
        ?>
        <div id="sa-el-promo-<?php echo esc_attr($this->get_id()); ?>" class="sa-el-interactive-promo">
            <figure class="<?php echo esc_attr($settings['promo_effect']); ?>">
        <?php echo '<img alt="' . $settings['promo_image_alt'] . '" src="' . $promo_image['url'] . '">'; ?>
                <figcaption>
                    <div>
        <?php if (!empty($settings['promo_heading'])) : ?>
                            <div class="sa-promo"><?php echo esc_attr($settings['promo_heading']); ?></div>
        <?php endif; ?>

                        <p><?php echo $settings['promo_content']; ?></p>
                    </div>
        <?php if (isset($settings['promo_link_url']) && !empty($settings['promo_link_url'])): ?>
                        <a href="<?php echo esc_attr($settings['promo_link_url']); ?>" target="<?php echo esc_attr($settings['promo_link_target']); ?>"></a>
        <?php endif; ?>
                </figcaption>
            </figure>
        </div>
        <?php
    }

    protected function content_template() {
        
    }

}
