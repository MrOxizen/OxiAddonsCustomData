<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Icon_Box;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Scheme_Typography;
use \Elementor\Widget_Base as Widget_Base;

defined('ABSPATH') || die();

class Icon_Box extends Widget_Base {

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function get_name() {
        return 'sa-el-icon-box';
    }

    public function get_categories() {
        return ['sa-el-addons'];
    }

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __('Icon Box', SA_ELEMENTOR_TEXTDOMAIN);
    }

    /**
     * Get widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-icon-box oxi-el-admin-icon';
    }

    protected function render_edit_tools() {
        if (version_compare(ELEMENTOR_VERSION, '2.6', '<=')) {
            parent::render_edit_tools();
        }
    }

    protected function _register_controls() {
        $this->start_controls_section(
                '_section_icon', [
            'label' => __('Content', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_CONTENT,
                ]
        );

        $this->add_control(
                'icon', [
            'show_label' => false,
            'type' => $this->Sa_El_Icon_Type(),
            'label_block' => true,
            'default' => $this->Sa_El_Default_Icon('fas fa-balance-scale', 'fa-solid', 'fa fa-balance-scale'),
            'separator' => 'before',
                ]
        );

        $this->add_control(
                'title', [
            'label' => __('Title', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => __('Your Icon Box', SA_ELEMENTOR_TEXTDOMAIN),
            'placeholder' => __('Type Icon Box Title', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'badge_text', [
            'label' => __('Badge Text', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'placeholder' => __('Type Icon Badge Text', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'link', [
            'label' => __('Box Link', SA_ELEMENTOR_TEXTDOMAIN),
            'separator' => 'before',
            'type' => Controls_Manager::URL,
            'placeholder' => __('https://example.com/', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'title_tag', [
            'label' => __('Title HTML Tag', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::CHOOSE,
            'separator' => 'before',
            'options' => [
                'h1' => [
                    'title' => __('H1', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-editor-h1'
                ],
                'h2' => [
                    'title' => __('H2', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-editor-h2'
                ],
                'h3' => [
                    'title' => __('H3', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-editor-h3'
                ],
                'h4' => [
                    'title' => __('H4', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-editor-h4'
                ],
                'h5' => [
                    'title' => __('H5', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-editor-h5'
                ],
                'h6' => [
                    'title' => __('H6', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'eicon-editor-h6'
                ]
            ],
            'default' => 'h3',
            'toggle' => false,
                ]
        );

        $this->add_responsive_control(
                'align', [
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
                'justify' => [
                    'title' => __('Justify', SA_ELEMENTOR_TEXTDOMAIN),
                    'icon' => 'fa fa-align-justify',
                ],
            ],
            'toggle' => true,
            'default' => 'center',
            'selectors' => [
                '{{WRAPPER}}' => 'text-align: {{VALUE}}'
            ]
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                '_section_style_icon_box_content', [
            'label' => __('General', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );
        $this->add_responsive_control(
                'icon_box_content_padding', [
            'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-icon-box-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->add_responsive_control(
                'icon_box_content_margin', [
            'label' => __('Margin', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-icon-box-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->start_controls_tabs('_tabs_icon_box_content');

        $this->start_controls_tab(
                '_tab_icon_box_content_normal', [
            'label' => __('Normal', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );
        $this->add_group_control(
                Group_Control_Background::get_type(), [
            'name' => 'icon_box_content_bg',
            'label' => __('Background', SA_ELEMENTOR_TEXTDOMAIN),
            'types' => ['none', 'classic', 'gradient'],
            'selector' => '{{WRAPPER}} .sa-el-icon-box-content',
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'icon_box_content_box_shadow',
            'selector' => '{{WRAPPER}} .sa-el-icon-box-content',
                ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
                '_tab_icon_box_content_hover', [
            'label' => __('Hover', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );
        $this->add_group_control(
                Group_Control_Background::get_type(), [
            'name' => 'icon_box_content_bg_hover',
            'label' => __('Background', SA_ELEMENTOR_TEXTDOMAIN),
            'types' => ['none', 'classic', 'gradient'],
            'selector' => '{{WRAPPER}} .sa-el-icon-box-content:hover',
                ]
        );
        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'icon_box_content_box_shadow_hover',
            'selector' => '{{WRAPPER}} .sa-el-icon-box-content:hover',
                ]
        );
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
                '_section_style_icon', [
            'label' => __('Icon', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_responsive_control(
                'icon_size', [
            'label' => __('Size', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 10,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-icon-box-icon' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'icon_padding', [
            'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-icon-box-icon' => 'padding: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'icon_spacing', [
            'label' => __('Bottom Spacing', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'max' => 150,
                ]
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-icon-box-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'icon_border',
            'selector' => '{{WRAPPER}} .sa-el-icon-box-icon'
                ]
        );

        $this->add_responsive_control(
                'icon_border_radius', [
            'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-icon-box-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'icon_shadow',
            'exclude' => [
                'box_shadow_position',
            ],
            'selector' => '{{WRAPPER}} .sa-el-icon-box-icon'
                ]
        );

        $this->start_controls_tabs('_tabs_icon');

        $this->start_controls_tab(
                '_tab_icon_normal', [
            'label' => __('Normal', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'icon_color', [
            'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sa-el-icon-box-icon' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'icon_bg_color', [
            'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sa-el-icon-box-icon' => 'background-color: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'icon_bg_rotate', [
            'label' => __('Rotate Icon Box', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['deg'],
            'default' => [
                'unit' => 'deg',
            ],
            'range' => [
                'deg' => [
                    'min' => 0,
                    'max' => 360,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-icon-box-icon' => '-webkit-transform: rotate({{SIZE}}{{UNIT}}); transform: rotate({{SIZE}}{{UNIT}});',
                '{{WRAPPER}} .sa-el-icon-box-icon > i' => '-webkit-transform: rotate(-{{SIZE}}{{UNIT}}); transform: rotate(-{{SIZE}}{{UNIT}});',
            ],
            'condition' => [
                'icon_bg_color!' => '',
            ]
                ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
                '_tab_button_hover', [
            'label' => __('Hover', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'icon_hover_color', [
            'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}:hover .sa-el-icon-box-icon' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'icon_hover_bg_color', [
            'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}:hover .sa-el-icon-box-icon' => 'background-color: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'icon_hover_border_color', [
            'label' => __('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}:hover .sa-el-icon-box-icon' => 'border-color: {{VALUE}}',
            ],
            'condition' => [
                'icon_border_border!' => '',
            ]
                ]
        );

        $this->add_control(
                'icon_hover_bg_rotate', [
            'label' => __('Rotate Icon Box', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['deg'],
            'default' => [
                'unit' => 'deg',
            ],
            'range' => [
                'deg' => [
                    'min' => 0,
                    'max' => 360,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}}:hover .sa-el-icon-box-icon' => '-webkit-transform: rotate({{SIZE}}{{UNIT}}); transform: rotate({{SIZE}}{{UNIT}});',
                '{{WRAPPER}}:hover .sa-el-icon-box-icon > i' => '-webkit-transform: rotate(-{{SIZE}}{{UNIT}}); transform: rotate(-{{SIZE}}{{UNIT}});',
            ],
            'condition' => [
                'icon_bg_color!' => '',
            ]
                ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
                '_section_style_title', [
            'label' => __('Title', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'title',
            'selector' => '{{WRAPPER}} .sa-el-icon-box-title',
            'scheme' => Scheme_Typography::TYPOGRAPHY_2
                ]
        );

        $this->add_group_control(
                Group_Control_Text_Shadow::get_type(), [
            'name' => 'title',
            'selector' => '{{WRAPPER}} .sa-el-icon-box-title',
                ]
        );
        $this->add_responsive_control(
                'title_padding', [
            'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-icon-box-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->start_controls_tabs('_tabs_title');

        $this->start_controls_tab(
                '_tab_title_normal', [
            'label' => __('Normal', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'title_color', [
            'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sa-el-icon-box-title' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
                '_tab_title_hover', [
            'label' => __('Hover', SA_ELEMENTOR_TEXTDOMAIN),
                ]
        );

        $this->add_control(
                'title_hover_color', [
            'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}:hover .sa-el-icon-box-title' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
                '_section_style_badge', [
            'label' => __('Badge', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition' => [
                'badge_text!' => ''
            ],
                ]
        );

        $this->add_control(
                'badge_offset_toggle', [
            'label' => __('Offset', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::POPOVER_TOGGLE,
            'label_off' => __('None', SA_ELEMENTOR_TEXTDOMAIN),
            'label_on' => __('Custom', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => 'yes',
                ]
        );

        $this->start_popover();

        $this->add_responsive_control(
                'badge_offset_x', [
            'label' => __('Offset Left', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'condition' => [
                'badge_offset_toggle' => 'yes'
            ],
            'default' => [
                'size' => 1
            ],
            'range' => [
                'px' => [
                    'min' => -250,
                    'max' => 250,
                ],
            ],
            'render_type' => 'ui'
                ]
        );

        $this->add_responsive_control(
                'badge_offset_y', [
            'label' => __('Offset Top', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'condition' => [
                'badge_offset_toggle' => 'yes'
            ],
            'default' => [
                'size' => 1
            ],
            'range' => [
                'px' => [
                    'min' => -250,
                    'max' => 250,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sa-el-badge' => '-ms-transform: translate({{badge_offset_x.SIZE}}{{UNIT}}, {{SIZE}}{{UNIT}}); -webkit-transform: translate({{badge_offset_x.SIZE}}{{UNIT}}, {{SIZE}}{{UNIT}}); transform: translate({{badge_offset_x.SIZE}}{{UNIT}}, {{SIZE}}{{UNIT}});',
            ],
                ]
        );
        $this->end_popover();

        $this->add_responsive_control(
                'badge_padding', [
            'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-badge' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'badge_color', [
            'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sa-el-badge' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'badge_bg_color', [
            'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sa-el-badge' => 'background-color: {{VALUE}}',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Border::get_type(), [
            'name' => 'badge_border',
            'selector' => '{{WRAPPER}} .sa-el-badge',
                ]
        );

        $this->add_responsive_control(
                'badge_border_radius', [
            'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .sa-el-badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'badge_box_shadow',
            'exclude' => [
                'box_shadow_position',
            ],
            'selector' => '{{WRAPPER}} .sa-el-badge',
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'badge_typography',
            'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
            'exclude' => [
                'font_family',
                'line_height'
            ],
            'default' => [
                'font_size' => ['']
            ],
            'selector' => '{{WRAPPER}} .sa-el-badge',
            'scheme' => Scheme_Typography::TYPOGRAPHY_3,
                ]
        );

        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend.
     *
     * Used to generate the final HTML displayed on the frontend.
     *
     * Note that if skin is selected, it will be rendered by the skin itself,
     * not the widget.
     *
     * @since 1.0.0
     * @access public
     */
    public function render_content() {
        /**
         * Before widget render content.
         *
         * Fires before Elementor widget is being rendered.
         *
         * @since 1.0.0
         *
         * @param Widget_Base $this The current widget.
         */
        do_action('elementor/widget/before_render_content', $this);

        ob_start();

        $skin = $this->get_current_skin();
        if ($skin) {
            $skin->set_parent($this);
            $skin->render();
        } else {
            $this->render();
        }

        $widget_content = ob_get_clean();

        if (empty($widget_content)) {
            return;
        }

        if (\Elementor\Plugin::$instance->editor->is_edit_mode()) {
            $this->render_edit_tools();
        }

        $tag = 'div';
        $link = $this->get_settings_for_display('link');
        $this->add_render_attribute('icon_box', 'class', 'elementor-widget-container');

        if (!empty($link['url'])) {
            $tag = 'a';
            $this->add_render_attribute('icon_box', 'class', 'sa-el-icon-box-link');
            $this->add_render_attribute('icon_box', 'href', esc_url($link['url']));
            if (!empty($link['is_external'])) {
                $this->add_render_attribute('icon_box', 'target', '_blank');
            }
            if (!empty($link['nofollow'])) {
                $this->set_render_attribute('icon_box', 'rel', 'nofollow');
            }
        }
        ?>
        <<?php echo $tag; ?> <?php echo $this->get_render_attribute_string('icon_box'); ?>>
        <?php
        /**
         * Render widget content.
         *
         * Filters the widget content before it's rendered.
         *
         * @since 1.0.0
         *
         * @param string      $widget_content The content of the widget.
         * @param Widget_Base $this           The widget.
         */
        $widget_content = apply_filters('elementor/widget/render_content', $widget_content, $this);

        echo $widget_content; // XSS ok.
        ?>
        </<?php echo $tag; ?>>
        <?php
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $this->add_inline_editing_attributes('title', 'none');
        $this->add_render_attribute('title', 'class', 'sa-el-icon-box-title');

        $this->add_inline_editing_attributes('badge_text', 'none');
        $this->add_render_attribute('badge_text', 'class', 'sa-el-badge sa-el-badge--top-right');
        ?>
        <?php echo '<div class="sa-el-icon-box-content">' ?>
        <?php if ($settings['badge_text']) : ?>
            <span <?php echo $this->get_render_attribute_string('badge_text'); ?>><?php echo esc_html($settings['badge_text']); ?></span>
        <?php endif; ?>

        <?php if ($settings['icon']) : ?>
            <span class="sa-el-icon-box-icon">
            <?php
            echo $this->Sa_El_Icon_Render($settings['icon']);
            ?>
            </span>
        <?php endif; ?>

        <?php
        if ($settings['title']) :
            printf(
                    '<%1$s %2$s>%3$s</%1$s>', tag_escape($settings['title_tag']), $this->get_render_attribute_string('title'), esc_html($settings['title'])
            );
        endif;
        echo '</div>';
    }

}
