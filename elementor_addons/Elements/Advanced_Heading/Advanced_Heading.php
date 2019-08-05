<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Advanced_Heading;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Description of Advanced_Heading
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

class Advanced_Heading extends Widget_Base {

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function get_name() {
        return 'sa_el_advanced_heading';
    }

    public function get_title() {
        return esc_html__('Advanced Heading', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon() {
        return 'eicon-heading  oxi-el-admin-icon';
    }

    public function get_categories() {
        return ['sa-el-addons'];
    }

    protected function _register_controls() {

        /**
         * Advanced Heading Content Settings
         */
        $this->start_controls_section(
                'sa_el_section_dch_content_settings', [
            'label' => esc_html__('Content Settings', SA_ELEMENTOR_TEXTDOMAIN)
                ]
        );

        $this->add_control(
                'sa_el_dch_type', [
            'label' => esc_html__('Content Style', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'dch-icon-on-top',
            'label_block' => false,
            'options' => [
                'dch-default' => esc_html__('Default', SA_ELEMENTOR_TEXTDOMAIN),
                'dch-icon-on-top' => esc_html__('Icon on top', SA_ELEMENTOR_TEXTDOMAIN),
                'dch-icon-subtext-on-top' => esc_html__('Icon &amp; sub-text on top', SA_ELEMENTOR_TEXTDOMAIN),
                'dch-subtext-on-top' => esc_html__('Sub-text on top', SA_ELEMENTOR_TEXTDOMAIN),
            ],
                ]
        );

        $this->add_control(
                'sa_el_show_dch_icon_content', [
            'label' => __('Show Icon', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
            'label_on' => __('Show', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('Hide', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => 'yes',
            'separator' => 'after',
                ]
        );
        /**
         * Condition: 'sa_el_show_dch_icon_content' => 'yes'
         */
        $this->add_control(
                'sa_el_dch_icon', [
            'label' => esc_html__('Icon', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => $this->Sa_El_Icon_Type(),
            'default' => $this->Sa_El_Default_Icon('fa fa-briefcase', 'fa-solid', 'fa fa-briefcase'),
            'condition' => [
                'sa_el_show_dch_icon_content' => 'yes'
            ]
                ]
        );

        $this->add_control(
                'sa_el_dch_first_title', [
            'label' => esc_html__('Title ( First Part )', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => esc_html__('Advanced Heading', SA_ELEMENTOR_TEXTDOMAIN),
            'dynamic' => ['action' => true]
                ]
        );

        $this->add_control(
                'sa_el_dch_last_title', [
            'label' => esc_html__('Title ( Last Part )', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => esc_html__('Example', SA_ELEMENTOR_TEXTDOMAIN),
            'dynamic' => ['action' => true]
                ]
        );

        $this->add_control(
                'sa_el_dch_subtext', [
            'label' => esc_html__('Sub Text', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::WYSIWYG,
            'label_block' => true,
            'default' => esc_html__('Insert a meaningful line to evaluate the headline.', SA_ELEMENTOR_TEXTDOMAIN)
                ]
        );

        $this->add_responsive_control(
                'sa_el_dch_content_alignment', [
            'label' => esc_html__('Alignment', SA_ELEMENTOR_TEXTDOMAIN),
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
            'prefix_class' => 'sa_el_advance_header-content-align-'
                ]
        );

        $this->end_controls_section();

        if (!apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', FALSE)) {
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
         * Tab Style ( Dual Heading Style )
         * -------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_section_dch_style_settings', [
            'label' => esc_html__('Dual Heading Style', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE
                ]
        );

        $this->add_control(
                'sa_el_dch_bg_color', [
            'label' => esc_html__('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .sa_el_advance_header' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_dch_container_padding', [
            'label' => esc_html__('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_advance_header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa_el_dch_container_margin', [
            'label' => esc_html__('Margin', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa_el_advance_header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'sa_el_dch_border',
            'label' => esc_html__('Border', SA_ELEMENTOR_TEXTDOMAIN),
            'selector' => '{{WRAPPER}} .sa_el_advance_header',
                ]
        );

        $this->add_control(
                'sa_el_dch_border_radius', [
            'label' => esc_html__('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'max' => 500,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa_el_advance_header' => 'border-radius: {{SIZE}}px;',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_el_dch_shadow',
            'selector' => '{{WRAPPER}} .sa_el_advance_header',
                ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Icon Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_section_dch_icon_style_settings', [
            'label' => esc_html__('Icon Style', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'sa_el_show_dch_icon_content' => 'yes'
            ]
                ]
        );

        $this->add_control(
                'sa_el_dch_icon_size', [
            'label' => __('Icon Size', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 36,
            ],
            'range' => [
                'px' => [
                    'min' => 20,
                    'max' => 100,
                    'step' => 1,
                ]
            ],
            'selectors' => [
                '{{WRAPPER}} .sa_el_advance_header i' => 'font-size: {{SIZE}}px;',
            ],
                ]
        );

        $this->add_control(
                'sa_el_dch_icon_color', [
            'label' => esc_html__('Icon Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#4d4d4d',
            'selectors' => [
                '{{WRAPPER}} .sa_el_advance_header i' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Title Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
                'sa_el_section_dch_title_style_settings', [
            'label' => esc_html__('Color &amp; Typography', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'sa_el_dch_title_heading', [
            'label' => esc_html__('Title Style', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
                ]
        );

        $this->add_control(
                'sa_el_dch_base_title_color', [
            'label' => esc_html__('Main Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#4d4d4d',
            'selectors' => [
                '{{WRAPPER}} .sa_el_advance_header .title' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'sa_el_dch_dual_title_color', [
            'label' => esc_html__('Dual Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#1f87dd',
            'selectors' => [
                '{{WRAPPER}} .sa_el_advance_header .title span.lead' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_dch_first_title_typography',
            'selector' => '{{WRAPPER}} .sa_el_advance_header .title, {{WRAPPER}} .sa_el_advance_header .title span',
                ]
        );

        $this->add_control(
                'sa_el_dch_sub_title_headi;ng', [
            'label' => esc_html__('Sub-title Style ', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before'
                ]
        );

        $this->add_control(
                'sa_el_dch_subtext_color', [
            'label' => esc_html__('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#4d4d4d',
            'selectors' => [
                '{{WRAPPER}} .sa_el_advance_header .subtext' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_dch_subtext_typography',
            'selector' => '{{WRAPPER}} .sa_el_advance_header .subtext',
                ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();
        ?>
        <?php if ('dch-default' == $settings['sa_el_dch_type']) : ?>
            <div class="sa_el_advance_header">
                <h2 class="title"><span class="lead"><?php esc_html_e($settings['sa_el_dch_first_title'], SA_ELEMENTOR_TEXTDOMAIN); ?></span> <span><?php esc_html_e($settings['sa_el_dch_last_title'], SA_ELEMENTOR_TEXTDOMAIN); ?></span></h2>
                <span class="subtext"><?php echo $settings['sa_el_dch_subtext']; ?></span>
                <?php
                if ('yes' == $settings['sa_el_show_dch_icon_content']) :
                    echo $this->Sa_El_Icon_Render($settings['sa_el_dch_icon']);
                endif;
                ?>
            </div>
        <?php endif; ?>

            <?php if ('dch-icon-on-top' == $settings['sa_el_dch_type']) : ?>
            <div class="sa_el_advance_header">
                <?php
                if ('yes' == $settings['sa_el_show_dch_icon_content']) :
                    echo $this->Sa_El_Icon_Render($settings['sa_el_dch_icon']);
                endif;
                ?>
                <h2 class="title"><span class="lead"><?php esc_html_e($settings['sa_el_dch_first_title'], SA_ELEMENTOR_TEXTDOMAIN); ?></span> <span><?php esc_html_e($settings['sa_el_dch_last_title'], SA_ELEMENTOR_TEXTDOMAIN); ?></span></h2>
                <span class="subtext"><?php echo $settings['sa_el_dch_subtext']; ?></span>
            </div>
            <?php endif; ?>

            <?php if ('dch-icon-subtext-on-top' == $settings['sa_el_dch_type']) : ?>
            <div class="sa_el_advance_header">
            <?php
            if ('yes' == $settings['sa_el_show_dch_icon_content']) :
                echo $this->Sa_El_Icon_Render($settings['sa_el_dch_icon']);
            endif;
            ?>
                <span class="subtext"><?php echo $settings['sa_el_dch_subtext']; ?></span>
                <h2 class="title"><span class="lead"><?php esc_html_e($settings['sa_el_dch_first_title'], SA_ELEMENTOR_TEXTDOMAIN); ?></span> <span><?php esc_html_e($settings['sa_el_dch_last_title'], SA_ELEMENTOR_TEXTDOMAIN); ?></span></h2>
            </div>
            <?php endif; ?>

            <?php if ('dch-subtext-on-top' == $settings['sa_el_dch_type']) : ?>
            <div class="sa_el_advance_header">
                <span class="subtext"><?php echo $settings['sa_el_dch_subtext']; ?></span>
                <h2 class="title"><span class="lead"><?php esc_html_e($settings['sa_el_dch_first_title'], SA_ELEMENTOR_TEXTDOMAIN); ?></span> <span><?php esc_html_e($settings['sa_el_dch_last_title'], SA_ELEMENTOR_TEXTDOMAIN); ?></span></h2>
            <?php
            if ('yes' == $settings['sa_el_show_dch_icon_content']) :
                echo $this->Sa_El_Icon_Render($settings['sa_el_dch_icon']);
            endif;
            ?>
            </div>
        <?php endif; ?>

        <?php
    }

    protected function content_template() {
        
    }

}
