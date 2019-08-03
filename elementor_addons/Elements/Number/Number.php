<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Number;

use Elementor\Scheme_Typography;
use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Text_Shadow;
use \Elementor\Widget_Base as Widget_Base;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Logo Carousel Widget
 */
class Number extends Widget_Base {

    /**
     * Retrieve logo carousel widget name.
     *
     * @access public
     *
     * @return string Number Widget.
     */
    public function get_name() {
        return 'sa_el_number';
    }

    /**
     * Retrieve logo carousel widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __('Number', SA_ELEMENTOR_TEXTDOMAIN);
    }

    /**
     * Retrieve the list of categories the logo carousel widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return ['sa-el-addons'];
    }

    /**
     * Retrieve logo carousel widget icon.
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-number-field oxi-el-admin-icon';
    }

    /**
     * Register content related controls
     */
    protected function _register_controls() {
        $this->start_controls_section(
                '_section_number', [
            'label' => __('Number', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_CONTENT,
                ]
        );

        $this->add_control(
                'number_text', [
            'label' => __('Text', SA_ELEMENTOR_TEXTDOMAIN),
            'label_block' => false,
            'type' => Controls_Manager::TEXT,
            'default' => 1
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
      
        $this->start_controls_section(
                '_section_style_number', [
            'label' => __('Text', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'number_text_color', [
            'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sa-el-number-border' => 'color: {{VALUE}};',
            ],
            'default' => '#fff'
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'number_text_typography',
            'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa-el-number-border',
            'scheme' => Scheme_Typography::TYPOGRAPHY_3
                ]
        );

        $this->add_group_control(
                Group_Control_Text_Shadow::get_type(), [
            'name' => 'number_text_shadow',
            'label' => __('Text Shadow', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa-el-number-border span',
                ]
        );

        $this->add_control(
                'number_text_rotate', [
            'label' => __('Text Rotate', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 360,
                    'step' => 5,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 0,
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-number-text' => '-webkit-transform: rotate({{SIZE}}deg);-ms-transform: rotate({{SIZE}}deg);transform: rotate({{SIZE}}deg);'
            ],
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'number_background_style', [
            'label' => __('General', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_responsive_control(
                'number_width_height', [
            'label' => __('Width and Height', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                    'step' => 5,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 50,
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-number-border' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'number_padding', [
            'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-number-border ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'number_border_radius', [
            'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-number-border' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'number_border',
            'label' => __('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa-el-number-border',
                ]
        );

        $this->add_group_control(
                Group_Control_Background::get_type(), [
            'name' => 'number_background_color',
            'label' => __('Background', SA_ELEMENTOR_TEXTDOMAIN),
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .sa-el-number-border',
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'number_box_shadow',
            'label' => __('Box Shadow', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa-el-number-border',
                ]
        );

        $this->add_responsive_control(
                'number_align', [
            'label' => __('Alignment', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => __('Left', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-align-left',
                ],
                'center' => [
                    'title' => __('Center', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-align-center',
                ],
                'right' => [
                    'title' => __('Right', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-align-right',
                ],
            ],
            'toggle' => true,
            'selectors' => [
                '{{WRAPPER}} .sa-el-number-border' => '{{VALUE}};'
            ],
            'selectors_dictionary' => [
                'left' => 'float: left',
                'center' => 'margin: 0 auto',
                'right' => 'float:right'
            ],
                ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
                'number_background_style_overlay', [
            'label' => __('Background Overlay', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_group_control(
                Group_Control_Background::get_type(), [
            'name' => 'number_background_overlay_color',
            'label' => __('Background', SA_ELEMENTOR_TEXTDOMAIN),
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .sa-el-number-border .sa-el-number-border-overlay',
                ]
        );


        $this->add_control(
                'number_background_overlay_blend_mode', [
            'label' => __('Blend Mood', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'normal',
            'options' => [
                'normal' => 'Normal',
                'multiply' => 'Multiply',
                'screen' => 'Screen',
                'overlay' => 'Overlay',
                'darken' => 'Darken',
                'lighten' => 'Lighten',
                'color-dodge' => 'Color Dodge',
                'color-burn' => 'Color Burn',
                'saturation' => 'Saturation',
                'difference' => 'Difference',
                'exclusion' => 'Exclusion',
                'hue' => 'Hue',
                'saturation' => 'Saturation',
                'color' => 'Color',
                'luminosity' => 'Luminosity',
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-number-border-overlay' => 'mix-blend-mode: {{VALUE}}',
            ],
                ]
        );


        $this->add_responsive_control(
                'number_background_overlay_blend_mode_opacity', [
            'label' => __('Opacity', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1,
                    'step' => .1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => .5,
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-number-border-overlay' => 'opacity: {{SIZE}};',
            ],
                ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>

        <div class="sa-el-number-body">
            <div class="sa-el-number-border">
                <div class="sa-el-number-border-overlay"></div>
                <span class="sa-el-number-text"><?php echo esc_html($settings['number_text']); ?></span>
            </div>
        </div>

        <?php
    }

}
