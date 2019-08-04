<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Button;

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Scheme_Typography as Scheme_Typography;
use \Elementor\Widget_Base as Widget_Base;


class Button extends Widget_Base
{
    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function get_name()
    {
        return 'sa_el_creative_button';
    }

    public function get_title()
    {
        return esc_html__('Button', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon()
    {
        return 'eicon-button  oxi-el-admin-icon';
    }

    public function get_categories()
    {
        return ['sa-el-addons'];
    }

    protected function _register_controls()
    {

        // Content Controls
        $this->start_controls_section(
            'sa_el_section_creative_button_content',
            [
                'label' => esc_html__('Button Content', SA_ELEMENTOR_TEXTDOMAIN)
            ]
        );


        $this->add_control(
            'creative_button_text',
            [
                'label' => __('Button Text', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Click Me!',
                'placeholder' => __('Enter button text', SA_ELEMENTOR_TEXTDOMAIN),
                'title' => __('Enter button text here', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'creative_button_secondary_text',
            [
                'label' => __('Button Secondary Text', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Go!',
                'placeholder' => __('Enter button secondary text', SA_ELEMENTOR_TEXTDOMAIN),
                'title' => __('Enter button secondary text here', SA_ELEMENTOR_TEXTDOMAIN),
                'condition' => [
                    'creative_button_effect' => ['sa_el_creative_button_winona', 'sa_el_creative_button_tamaya', 'sa_el_creative_button_rayen'],
                ],
            ]
        );


        $this->add_control(
            'creative_button_link_url',
            [
                'label' => esc_html__('Link URL', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => '',
                ],
                'show_external' => true,
            ]
        );

        $this->add_control(
            'sa_el_creative_button_icon',
            [
                'label' => esc_html__('Icon', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => $this->Sa_El_Icon_Type(),
            ]
        );

        $this->add_control(
            'sa_el_creative_button_icon_alignment',
            [
                'label' => esc_html__('Icon Position', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'left',
                'options' => [
                    'left' => esc_html__('Before', SA_ELEMENTOR_TEXTDOMAIN),
                    'right' => esc_html__('After', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                'condition' => [
                    'sa_el_creative_button_icon!' => '',
                ],
            ]
        );


        $this->add_control(
            'sa_el_creative_button_icon_indent',
            [
                'label' => esc_html__('Icon Spacing', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 60,
                    ],
                ],
                'condition' => [
                    'sa_el_creative_button_icon!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_creative_button_icon_right' => 'padding-left: {{SIZE}}px;',
                    '{{WRAPPER}} .sa_el_creative_button_icon_left' => 'padding-right: {{SIZE}}px;',
                    '{{WRAPPER}} .sa_el_creative_button_shikoba i' => 'left: -{{SIZE}}px;',
                ],
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
        // Style Controls
        $this->start_controls_section(
            'sa_el_section_creative_button_settings',
            [
                'label' => esc_html__('Button Effects &amp; Styles', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_control(
            'creative_button_effect',
            [
                'label' => esc_html__('Set Button Effect', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'sa_el_creative_button_default',
                'options' => [
                    'sa_el_creative_button_default' => esc_html__('Default', SA_ELEMENTOR_TEXTDOMAIN),
                    'sa_el_creative_button_winona' => esc_html__('Winona', SA_ELEMENTOR_TEXTDOMAIN),
                    'sa_el_creative_button_ujarak' => esc_html__('Ujarak', SA_ELEMENTOR_TEXTDOMAIN),
                    'sa_el_creative_button_shutter' => esc_html__('Shutter ' . apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('Pro Only*', 'data', FALSE)), SA_ELEMENTOR_TEXTDOMAIN),
                    'sa_el_creative_button_wayra' => esc_html__('Wayra ' . apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('Pro Only*', 'data', FALSE)), SA_ELEMENTOR_TEXTDOMAIN),
                    'sa_el_creative_button_tamaya' => esc_html__('Tamaya ' . apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('Pro Only*', 'data', FALSE)), SA_ELEMENTOR_TEXTDOMAIN),
                    'sa_el_creative_button_rayen' => esc_html__('Rayen ' . apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('Pro Only*', 'data', FALSE)), SA_ELEMENTOR_TEXTDOMAIN),
                ],
            ]
        );

        $this->add_control(
            'creative_button_effect_shutter',
            [
                'label' => __('Shutter Direction', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'shutouthor',
                'options' => [
                    'shutinhor' => __('Shutter in Horizontal ' . apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('Pro Only*', 'data', FALSE)), SA_ELEMENTOR_TEXTDOMAIN),
                    'shutinver' => __('Shutter in Vertical ' . apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('Pro Only*', 'data', FALSE)), SA_ELEMENTOR_TEXTDOMAIN),
                    'shutoutver' => __('Shutter out Horizontal ' . apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('Pro Only*', 'data', FALSE)), SA_ELEMENTOR_TEXTDOMAIN),
                    'shutouthor' => __('Shutter out Vertical ' . apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('Pro Only*', 'data', FALSE)), SA_ELEMENTOR_TEXTDOMAIN),
                    'scshutoutver' => __('Scaled Shutter Vertical ' . apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('Pro Only*', 'data', FALSE)), SA_ELEMENTOR_TEXTDOMAIN),
                    'scshutouthor' => __('Scaled Shutter Horizontal ' . apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('Pro Only*', 'data', FALSE)), SA_ELEMENTOR_TEXTDOMAIN),
                    'dshutinver' => __('Tilted Left ' . apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('Pro Only*', 'data', FALSE)), SA_ELEMENTOR_TEXTDOMAIN),
                    'dshutinhor' => __('Tilted Right ' . apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('Pro Only*', 'data', FALSE)), SA_ELEMENTOR_TEXTDOMAIN),
                ],
                'condition' => [
                    'creative_button_effect' => 'sa_el_creative_button_shutter',
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_el_creative_button_alignment',
            [
                'label' => esc_html__('Button Alignment', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => true,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__('Left', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'fa fa-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html__('Right', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_creative_button_wrapper' => 'justify-content: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_el_creative_button_width',
            [
                'label' => esc_html__('Width', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_creative_button' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_el_creative_button_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .sa_el_creative_button',
            ]
        );

        $this->add_responsive_control(
            'sa_el_creative_button_padding',
            [
                'label' => esc_html__('Button Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_creative_button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_winona::after' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_winona > span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_tamaya::before' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_rayen::before' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_rayen > span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );



        $this->start_controls_tabs('sa_el_creative_button_tabs');

        $this->start_controls_tab('normal', ['label' => esc_html__('Normal', SA_ELEMENTOR_TEXTDOMAIN)]);

        $this->add_control(
            'sa_el_creative_button_text_color',
            [
                'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_creative_button' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_tamaya::before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_tamaya::after' => 'color: {{VALUE}};',
                ],
            ]
        );



        $this->add_control(
            'sa_el_creative_button_background_color',
            [
                'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#6200EE',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_creative_button' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_ujarak:hover' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_wayra:hover' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_tamaya::before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_tamaya::after' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_rayen:hover' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_shutinhor::before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_shutinver::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sa_el_creative_button_border',
                'selector' => '{{WRAPPER}} .sa_el_creative_button',
            ]
        );

        $this->add_control(
            'sa_el_creative_button_border_radius',
            [
                'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_creative_button' => 'border-radius: {{SIZE}}px;',
                    '{{WRAPPER}} .sa_el_creative_button::before' => 'border-radius: {{SIZE}}px;',
                    '{{WRAPPER}} .sa_el_creative_button::after' => 'border-radius: {{SIZE}}px;',
                ],
            ]
        );



        $this->end_controls_tab();

        $this->start_controls_tab('sa_el_creative_button_hover', ['label' => esc_html__('Hover', SA_ELEMENTOR_TEXTDOMAIN)]);

        $this->add_control(
            'sa_el_creative_button_hover_text_color',
            [
                'label' => esc_html__('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_creative_button:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_winona::after' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_creative_button_hover_background_color',
            [
                'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#f54',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_creative_button:hover' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_ujarak::before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_wayra:hover::before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_tamaya:hover' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_rayen::before' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'creative_button_effect!' => ['sa_el_creative_button_shutter']
                ],
            ]
        );
        $this->add_control(
            'sa_el_creative_button_shutter_hover_background_color',
            [
                'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#f54',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_shutinhor' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_shutinver' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_shutouthor::before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_shutoutver::before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_scshutouthor::before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_scshutoutver::before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_dshutinhor::before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_dshutinver::before' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'creative_button_effect' => ['sa_el_creative_button_shutter']
                ],
            ]
        );

        $this->add_control(
            'sa_el_creative_button_hover_border_color',
            [
                'label' => esc_html__('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_creative_button:hover' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_wapasha::before' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_antiman::before' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_pipaluk::before' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .sa_el_creative_button.sa_el_creative_button_quidel::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();


        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .sa_el_creative_button',
            ]
        );


        $this->end_controls_section();



        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings();

        if ($settings['creative_button_effect'] == 'sa_el_creative_button_default') {
            $style_class = $settings['creative_button_effect'];
        } elseif ($settings['creative_button_effect'] == 'sa_el_creative_button_winona') {
            $style_class = $settings['creative_button_effect'];
        } elseif ($settings['creative_button_effect'] == 'sa_el_creative_button_ujarak') {
            $style_class = $settings['creative_button_effect'];
        } elseif ($settings['creative_button_effect'] == 'sa_el_creative_button_wayra' && apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('', '', TRUE))) {
            $style_class = $settings['creative_button_effect'];
        } elseif ($settings['creative_button_effect'] == 'sa_el_creative_button_tamaya' && apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('', '', TRUE))) {
            $style_class = $settings['creative_button_effect'];
        } elseif ($settings['creative_button_effect'] == 'sa_el_creative_button_rayen' && apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('', '', TRUE))) {
            $style_class = $settings['creative_button_effect'];
        } elseif ($settings['creative_button_effect'] == 'sa_el_creative_button_shutter' && apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array('', '', TRUE))) {
            $style_class = 'sa_el_creative_button_' . $settings['creative_button_effect_shutter'];
        }

        $this->add_render_attribute('sa_el_creative_button', [
            'href' => esc_attr($settings['creative_button_link_url']['url']),
        ]);
        if ($settings['creative_button_link_url']['is_external']) {
            $this->add_render_attribute('sa_el_creative_button', 'target', '_blank');
        }

        if ($settings['creative_button_link_url']['nofollow']) {
            $this->add_render_attribute('sa_el_creative_button', 'rel', 'nofollow');
        }

        $this->add_render_attribute('sa_el_creative_button', 'data-text', esc_attr($settings['creative_button_secondary_text']));
        ?>
        <div class="sa_el_creative_button_wrapper">
            <a class="sa_el_creative_button <?php echo esc_attr($style_class); ?>" <?php echo $this->get_render_attribute_string('sa_el_creative_button'); ?>>
                <span>
                    <?php if (!empty($settings['sa_el_creative_button_icon']) && $settings['sa_el_creative_button_icon_alignment'] == 'left') : ?>
                        <span class="sa_el_creative_button_icon_left"><?php echo $this->Sa_El_Icon_Render($settings['sa_el_creative_button_icon']); ?></span>
                    <?php endif; ?>

                    <?php echo $settings['creative_button_text']; ?>

                    <?php if (!empty($settings['sa_el_creative_button_icon']) && $settings['sa_el_creative_button_icon_alignment'] == 'right') : ?>
                    <span class="sa_el_creative_button_icon_right"><?php echo $this->Sa_El_Icon_Render($settings['sa_el_creative_button_icon']); ?></span> 
                    <?php endif; ?>
                </span>
            </a>
        </div>
    <?php
    }

    protected function content_template()
    { }
}
