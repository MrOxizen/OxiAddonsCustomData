<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Fancy_Text;

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Scheme_Typography as Scheme_Typography;
use \Elementor\Widget_Base as Widget_Base;
use \Elementor\Repeater;

class Fancy_Text extends Widget_Base
{

    public function get_name()
    {
        return 'sa_el_fancy_text';
    }

    public function get_title()
    {
        return esc_html__('Fancy Text', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon()
    {
        return 'eicon-animation-text  oxi-el-admin-icon';
    }

    public function get_categories()
    {
        return ['sa-el-addons'];
    }

    protected $allowed_html = array(
        'strong' => array(
            'style' => array()
        ),
        'span' => array(
            'style' => array()
        ),
        'em' => array(
            'style' => array()
        ),
        'a' => array(
            'href' => array(),
            'style' => array()
        ),
    );

    protected function _register_controls()
    {

        // Content Controls
        $this->start_controls_section(
            'sa_el_fancy_text_content',
            [
                'label' => esc_html__('Fancy Text', SA_ELEMENTOR_TEXTDOMAIN)
            ]
        );


        $this->add_control(
            'sa_el_fancy_text_prefix',
            [
                'label' => esc_html__('Prefix Text', SA_ELEMENTOR_TEXTDOMAIN),
                'placeholder' => esc_html__('Place your prefix text', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Your ', SA_ELEMENTOR_TEXTDOMAIN),
                'dynamic' => ['active' => true]
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'sa_el_fancy_text_strings_text_field',
            [
                'label' => esc_html__('Fancy String', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'dynamic' => ['active' => true]
            ]
        );

        $this->add_control(
            'sa_el_fancy_text_strings',
            [
                'label' => __('Fancy Text Strings', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::REPEATER,
                'show_label' => true,
                'fields' => array_values($repeater->get_controls()),
                'title_field' => '{{{ sa_el_fancy_text_strings_text_field }}}',
                'default' => [
                    [
                        'sa_el_fancy_text_strings_text_field' => __('First', SA_ELEMENTOR_TEXTDOMAIN),
                    ],
                    [
                        'sa_el_fancy_text_strings_text_field' => __('Second', SA_ELEMENTOR_TEXTDOMAIN),
                    ],
                    [
                        'sa_el_fancy_text_strings_text_field' => __('Third', SA_ELEMENTOR_TEXTDOMAIN),
                    ]
                ],
            ]
        );

        $this->add_control(
            'sa_el_fancy_text_suffix',
            [
                'label' => esc_html__('Suffix Text', SA_ELEMENTOR_TEXTDOMAIN),
                'placeholder' => esc_html__('Place your suffix text', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__(' string.', SA_ELEMENTOR_TEXTDOMAIN),
                'dynamic' => ['active' => true]
            ]
        );

        $this->end_controls_section();

        // Settings Control
        $this->start_controls_section(
            'sa_el_fancy_text_settings',
            [
                'label' => esc_html__('Fancy Text Settings', SA_ELEMENTOR_TEXTDOMAIN)
            ]
        );

        $this->add_control(
            'sa_el_fancy_text_style',
            [
                'label' => esc_html__('Style Type', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'style-1',
                'options' => [
                    'style-1' => esc_html__('Style 1', SA_ELEMENTOR_TEXTDOMAIN),
                    'style-2' => esc_html__('Style 2', SA_ELEMENTOR_TEXTDOMAIN),
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_el_fancy_text_alignment',
            [
                'label' => esc_html__('Alignment', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::CHOOSE,
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
                    '{{WRAPPER}} .sa_el_fancy_text_container' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'sa_el_fancy_text_transition_type',
            [
                'label' => esc_html__('Animation Type', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'typing',
                'options' => [
                    'typing' => esc_html__('Typing', SA_ELEMENTOR_TEXTDOMAIN),
                    'fadeIn' => esc_html__('Fade', SA_ELEMENTOR_TEXTDOMAIN),
                    'fadeInUp' => esc_html__('Fade Up', SA_ELEMENTOR_TEXTDOMAIN),
                    'fadeInDown' => esc_html__('Fade Down', SA_ELEMENTOR_TEXTDOMAIN),
                    'fadeInLeft' => esc_html__('Fade Left', SA_ELEMENTOR_TEXTDOMAIN),
                    'fadeInRight' => esc_html__('Fade Right', SA_ELEMENTOR_TEXTDOMAIN),
                    'zoomIn' => esc_html__('Zoom', SA_ELEMENTOR_TEXTDOMAIN),
                    'bounceIn' => esc_html__('Bounce', SA_ELEMENTOR_TEXTDOMAIN),
                    'swing' => esc_html__('Swing', SA_ELEMENTOR_TEXTDOMAIN),
                ],
            ]
        );


        $this->add_control(
            'sa_el_fancy_text_speed',
            [
                'label' => esc_html__('Typing Speed', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::NUMBER,
                'default' => '50',
                'condition' => [
                    'sa_el_fancy_text_transition_type' => 'typing',
                ],
            ]
        );

        $this->add_control(
            'sa_el_fancy_text_delay',
            [
                'label' => esc_html__('Delay on Change', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::NUMBER,
                'default' => '2500'
            ]
        );

        $this->add_control(
            'sa_el_fancy_text_loop',
            [
                'label' => esc_html__('Loop the Typing', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'sa_el_fancy_text_transition_type' => 'typing',
                ],
            ]
        );

        $this->add_control(
            'sa_el_fancy_text_cursor',
            [
                'label' => esc_html__('Display Type Cursor', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'sa_el_fancy_text_transition_type' => 'typing',
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

        $this->start_controls_section(
            'sa_el_fancy_text_prefix_styles',
            [
                'label' => esc_html__('Prefix Text Styles', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'sa_el_fancy_text_prefix_color',
            [
                'label' => esc_html__('Prefix Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa_el_fancy_text_prefix' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .sa_el_fancy_text_prefix',
            ]
        );


        $this->end_controls_section();



        $this->start_controls_section(
            'sa_el_fancy_text_strings_styles',
            [
                'label' => esc_html__('Fancy Text Styles', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'sa_el_fancy_text_strings_color',
            [
                'label' => esc_html__('Fancy Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa_el_fancy_text_strings' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sa_el_fancy_text_strings_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .sa_el_fancy_text_strings, {{WRAPPER}} .typed-cursor',
            ]
        );

        $this->add_control(
            'sa_el_fancy_text_strings_background_color',
            [
                'label' => esc_html__('Background', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa_el_fancy_text_strings' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sa_el_fancy_text_cursor_color',
            [
                'label' => esc_html__('Typing Cursor Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .typed-cursor' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'sa_el_fancy_text_cursor' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_el_fancy_text_strings_padding',
            [
                'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_fancy_text_strings' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sa_el_fancy_text_strings_margin',
            [
                'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_fancy_text_strings' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );



        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sa_el_fancy_text_strings_border',
                'selector' => '{{WRAPPER}} .sa_el_fancy_text_strings',
            ]
        );


        $this->add_control(
            'sa_el_fancy_text_strings_border_radius',
            [
                'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa_el_fancy_text_strings' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();



        $this->start_controls_section(
            'sa_el_fancy_text_suffix_styles',
            [
                'label' => esc_html__('Suffix Text Styles', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'sa_el_fancy_text_suffix_color',
            [
                'label' => esc_html__('Suffix Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa_el_fancy_text_suffix' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ending_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .sa_el_fancy_text_suffix',
            ]
        );


        $this->end_controls_section();
    }

    public function fancy_text($settings)
    {
        $fancy_text = array();
        foreach ($settings as $item) {
            if (!empty($item['sa_el_fancy_text_strings_text_field'])) {
                $fancy_text[] = $item['sa_el_fancy_text_strings_text_field'];
            }
        }
        $fancy_text = implode("|", $fancy_text);
        return $fancy_text;
    }

    protected function render()
    {


        $settings = $this->get_settings_for_display();
        $fancy_text = $this->fancy_text($settings['sa_el_fancy_text_strings']);

        $this->add_render_attribute('fancy-text', 'class', 'sa_el_fancy_text_container');
        $this->add_render_attribute('fancy-text', 'class', esc_attr($settings['sa_el_fancy_text_style']));
        $this->add_render_attribute('fancy-text', 'data-fancy-text-id', esc_attr($this->get_id()));
        $this->add_render_attribute('fancy-text', 'data-fancy-text', $fancy_text);
        $this->add_render_attribute('fancy-text', 'data-fancy-text-transition-type', $settings['sa_el_fancy_text_transition_type']);
        $this->add_render_attribute('fancy-text', 'data-fancy-text-speed', $settings['sa_el_fancy_text_speed']);
        $this->add_render_attribute('fancy-text', 'data-fancy-text-delay', $settings['sa_el_fancy_text_delay']);
        $this->add_render_attribute('fancy-text', 'data-fancy-text-cursor', $settings['sa_el_fancy_text_cursor']);
        $this->add_render_attribute('fancy-text', 'data-fancy-text-loop', $settings['sa_el_fancy_text_loop']);
        ?>

        <div <?php echo $this->get_render_attribute_string('fancy-text'); ?>>
            <?php if (!empty($settings['sa_el_fancy_text_prefix'])) : ?>
                <span class="sa_el_fancy_text_prefix"><?php echo wp_kses(($settings['sa_el_fancy_text_prefix']), $this->allowed_html); ?> </span>
            <?php endif; ?>

            <?php if ($settings['sa_el_fancy_text_transition_type'] == 'fancy') : ?>
                <span id="sa_el_fancy_text_<?php echo esc_attr($this->get_id()); ?>" class="sa_el_fancy_text_strings"></span>
            <?php endif; ?>

            <?php if ($settings['sa_el_fancy_text_transition_type'] != 'fancy') : ?>
                <span id="sa_el_fancy_text_<?php echo esc_attr($this->get_id()); ?>" class="sa_el_fancy_text_strings">
                    <?php
                    $sa_el_fancy_text_strings_list = "";
                    foreach ($settings['sa_el_fancy_text_strings'] as $item) {
                        $sa_el_fancy_text_strings_list .= $item['sa_el_fancy_text_strings_text_field'] . ', ';
                    }
                    echo rtrim($sa_el_fancy_text_strings_list, ", ");
                    ?>
                </span>
            <?php endif; ?>

            <?php if (!empty($settings['sa_el_fancy_text_suffix'])) : ?>
                <span class="sa_el_fancy_text_suffix"> <?php echo wp_kses(($settings['sa_el_fancy_text_suffix']), $this->allowed_html); ?></span>
            <?php endif; ?>
        </div><!-- close .sa_el_fancy_text_container -->

        <div class="clearfix"></div>

    <?php
    }

    protected function content_template()
    { }
}
