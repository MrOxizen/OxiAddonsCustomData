<?php

namespace SA_ELEMENTOR_ADDONS\Extensions\SA_Advance_Tooltip;

/**
 * Description of SA_Advance_Tooltip
 *
 * @author Jabir
 */
if (!defined('ABSPATH')) {
    exit;
}

use \Elementor\Controls_Manager;
use \Elementor\Frontend;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Scheme_Typography;

class SA_Advance_Tooltip {

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function __construct() {
        add_action('elementor/element/common/_section_style/after_section_end', [$this, 'register_controls'], 10);
        add_action('elementor/widget/before_render_content', array($this, 'before_render'));
        add_action('elementor/widget/before_render_content', array($this, 'after_render'));
    }

    public function get_name() {
        return 'sa-el-tooltip-section';
    }

    public function register_controls($element) {

        $element->start_controls_section(
                'sa_el_tooltip_section', [
            'label' => __('SA Advanced Tooltip', SA_ELEMENTOR_TEXTDOMAIN),
            'tab' => Controls_Manager::TAB_ADVANCED,
                ]
        );

        $element->add_control(
                'sa_el_tooltip_section_enable', [
            'label' => __('Enable Advanced Tooltip', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
                ]
        );

        $element->start_controls_tabs('sa_el_tooltip_tabs');

        $element->start_controls_tab('sa_el_tooltip_settings', [
            'label' => __('Settings', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'sa_el_tooltip_section_enable!' => '',
            ],
        ]);

        $element->add_control(
                'sa_el_tooltip_section_content', [
            'label' => __('Content', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::TEXT,
            'default' => __('I am a tooltip', SA_ELEMENTOR_TEXTDOMAIN),
            'dynamic' => ['active' => true],
            'frontend_available' => true,
            'condition' => [
                'sa_el_tooltip_section_enable!' => '',
            ],
                ]
        );

        $element->add_control(
                'sa_el_tooltip_section_position', [
            'label' => __('Position', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'top',
            'options' => [
                'top' => __('Top', SA_ELEMENTOR_TEXTDOMAIN),
                'bottom' => __('Bottom', SA_ELEMENTOR_TEXTDOMAIN),
                'left' => __('Left', SA_ELEMENTOR_TEXTDOMAIN),
                'right' => __('Right', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'frontend_available' => true,
            'condition' => [
                'sa_el_tooltip_section_enable!' => '',
            ],
                ]
        );

        $element->add_control(
                'sa_el_tooltip_section_animation', [
            'label' => __('Animation', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'scale',
            'options' => [
                'shift-away' => __('Shift Away', SA_ELEMENTOR_TEXTDOMAIN),
                'shift-toward' => __('Shift Toward', SA_ELEMENTOR_TEXTDOMAIN),
                'scale' => __('Scale', SA_ELEMENTOR_TEXTDOMAIN),
                'fade' => __('Fade', SA_ELEMENTOR_TEXTDOMAIN),
                'perspective' => __('Perspective', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'frontend_available' => true,
            'condition' => [
                'sa_el_tooltip_section_enable!' => '',
            ],
                ]
        );

        $element->add_control(
                'sa_el_tooltip_section_arrow', [
            'label' => __('Arrow', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('Show', SA_ELEMENTOR_TEXTDOMAIN),
            'label_off' => __('Hide', SA_ELEMENTOR_TEXTDOMAIN),
            'return_value' => true,
            'default' => true,
            'frontend_available' => true,
            'condition' => [
                'sa_el_tooltip_section_enable!' => '',
            ],
                ]
        );

        $element->add_control(
                'sa_el_tooltip_section_arrow_type', [
            'label' => __('Arrow Type', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'sharp',
            'options' => [
                'sharp' => __('Sharp', SA_ELEMENTOR_TEXTDOMAIN),
                'round' => __('Round', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'frontend_available' => true,
            'condition' => [
                'sa_el_tooltip_section_enable!' => '',
                'sa_el_tooltip_section_arrow!' => '',
            ],
                ]
        );

        $element->add_control(
                'sa_el_tooltip_section_trigger', [
            'label' => __('Trigger', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'mouseenter',
            'options' => [
                'click' => __('Click', SA_ELEMENTOR_TEXTDOMAIN),
                'mouseenter' => __('Hover', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'frontend_available' => true,
            'condition' => [
                'sa_el_tooltip_section_enable!' => '',
            ],
                ]
        );

        $element->add_control(
                'sa_el_tooltip_section_duration', [
            'label' => __('Duration', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::NUMBER,
            'min' => 100,
            'max' => 1000,
            'step' => 10,
            'default' => 300,
            'frontend_available' => true,
            'condition' => [
                'sa_el_tooltip_section_enable!' => '',
            ],
                ]
        );

        $element->add_control(
                'sa_el_tooltip_section_delay', [
            'label' => __('Delay out (s)', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::NUMBER,
            'min' => 100,
            'max' => 1000,
            'step' => 5,
            'default' => 400,
            'frontend_available' => true,
            'condition' => [
                'sa_el_tooltip_section_enable!' => '',
            ],
                ]
        );

        $element->add_control(
                'sa_el_tooltip_section_size', [
            'label' => __('Size', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SELECT,
            'default' => 'regular',
            'options' => [
                'small' => __('Small', SA_ELEMENTOR_TEXTDOMAIN),
                'regular' => __('Regular', SA_ELEMENTOR_TEXTDOMAIN),
                'large' => __('Large', SA_ELEMENTOR_TEXTDOMAIN),
            ],
            'frontend_available' => true,
            'condition' => [
                'sa_el_tooltip_section_enable!' => '',
            ],
                ]
        );

        $element->end_controls_tab();

        $element->start_controls_tab('sa_el_tooltip_section_styles', [
            'label' => __('Styles', SA_ELEMENTOR_TEXTDOMAIN),
            'condition' => [
                'sa_el_tooltip_section_enable!' => '',
            ],
        ]);

        $element->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'sa_el_tooltip_section_typography',
            'selector' => '.tippy-popper[data-tippy-popper-id="{{ID}}"] .tippy-tooltip',
            'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            'separator' => 'after',
            'condition' => [
                'sa_el_tooltip_section_enable!' => '',
            ],
                ]
        );

        $element->add_control(
                'sa_el_tooltip_section_background_color', [
            'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#000000',
            'selectors' => [
                '.tippy-popper[data-tippy-popper-id="{{ID}}"] .tippy-tooltip, .tippy-popper[data-tippy-popper-id="{{ID}}"] .tippy-tooltip .tippy-backdrop' => 'background-color: {{VALUE}};',
                '.tippy-popper[data-tippy-popper-id="{{ID}}"][x-placement^=top] .tippy-tooltip .tippy-arrow' => 'border-top-color: {{VALUE}};',
                '.tippy-popper[data-tippy-popper-id="{{ID}}"][x-placement^=bottom] .tippy-tooltip .tippy-arrow' => 'border-bottom-color: {{VALUE}};',
                '.tippy-popper[data-tippy-popper-id="{{ID}}"][x-placement^=left] .tippy-tooltip .tippy-arrow' => 'border-left-color: {{VALUE}};',
                '.tippy-popper[data-tippy-popper-id="{{ID}}"][x-placement^=right] .tippy-tooltip .tippy-arrow' => 'border-right-color: {{VALUE}};',
                '.tippy-popper[data-tippy-popper-id="{{ID}}"] .tippy-tooltip .tippy-roundarrow' => 'fill: {{VALUE}};',
            ],
            'condition' => [
                'sa_el_tooltip_section_enable!' => '',
            ],
                ]
        );

        $element->add_control(
                'sa_el_tooltip_section_color', [
            'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '.tippy-popper[data-tippy-popper-id="{{ID}}"] .tippy-tooltip' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'sa_el_tooltip_section_enable!' => '',
            ],
                ]
        );

        $element->add_control(
                'sa_el_tooltip_section_border_color', [
            'label' => __('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '.tippy-popper[data-tippy-popper-id="{{ID}}"] .tippy-tooltip' => 'border: 1px solid {{VALUE}};',
            ],
            'condition' => [
                'sa_el_tooltip_section_enable!' => '',
                'sa_el_tooltip_section_arrow' => '',
            ],
                ]
        );

        $element->add_control(
                'sa_el_tooltip_section_border_radius', [
            'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '.tippy-popper[data-tippy-popper-id="{{ID}}"] .tippy-tooltip' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'sa_el_tooltip_section_enable!' => '',
            ],
                ]
        );

        $element->add_control(
                'sa_el_tooltip_section_distance', [
            'label' => __('Distance', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::NUMBER,
            'min' => 05,
            'max' => 50,
            'step' => 2,
            'default' => 10,
            'label_block' => false,
            'condition' => [
                'sa_el_tooltip_section_enable!' => '',
            ],
                ]
        );

        $element->add_control(
                'sa_el_tooltip_section_padding', [
            'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '.tippy-popper[data-tippy-popper-id="{{ID}}"] .tippy-tooltip' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'sa_el_tooltip_section_enable!' => '',
            ],
                ]
        );

        $element->add_group_control(
                Group_Control_Box_Shadow::get_type(), [
            'name' => 'sa_el_tooltip_section_box_shadow',
            'selector' => '.tippy-popper[data-tippy-popper-id="{{ID}}"] .tippy-tooltip',
            'separator' => '',
            'condition' => [
                'sa_el_tooltip_section_enable!' => '',
            ],
                ]
        );

        $element->add_control(
                'sa_el_tooltip_section_width', [
            'label' => __('Max Width', SA_ELEMENTOR_TEXTDOMAIN),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => '350',
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 500,
                ],
            ],
            'label_block' => false,
            'selectors' => [
                '.tippy-popper[data-tippy-popper-id="{{ID}}"] .tippy-tooltip' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'sa_el_tooltip_section_enable!' => '',
            ],
                ]
        );

        $element->end_controls_tab();

        $element->end_controls_tabs();

        $element->end_controls_section();
    }
    
    public function before_render($element)
    {

        $settings = $element->get_settings_for_display();

        if ($element->get_settings('sa_el_tooltip_section_enable') == 'yes') {

            $element->add_render_attribute('_wrapper', [
                'id' => 'sa-el-section-tooltip-' . $element->get_id(),
                'class' => 'sa-el-section-tooltip',
            ]);
        }

    }

    public function after_render($element)
    {
        $settings = $element->get_settings_for_display();

        if ($settings['sa_el_tooltip_section_enable'] == 'yes') {
         
            
            $data = $element->get_data();
            $content = $settings['sa_el_tooltip_section_content'];
            $position = $settings["sa_el_tooltip_section_position"];
            $animation = $settings['sa_el_tooltip_section_animation'];
            $duration = $settings["sa_el_tooltip_section_duration"];
            $distance = $settings["sa_el_tooltip_section_distance"];
            $delay = $settings["sa_el_tooltip_section_delay"];
            $arrow = $settings["sa_el_tooltip_section_arrow"];
            $arrowType = $settings["sa_el_tooltip_section_arrow_type"];
            $size = $settings["sa_el_tooltip_section_size"];
            $trigger = $settings["sa_el_tooltip_section_trigger"];
            $width = $settings["sa_el_tooltip_section_width"]; ?>
            
            <script>
                jQuery(window).on('elementor/frontend/init', function() {
                    var $currentTooltip = '#sa-el-section-tooltip-<?php echo $element->get_id(); ?>';

                    tippy($currentTooltip, {
                        content: '<?php echo $content; ?>',
                        placement: '<?php echo $position; ?>',
                        animation: '<?php echo $animation; ?>',
                        arrow: '<?php echo $arrow; ?>',
                        arrowType: '<?php echo $arrowType; ?>',
                        duration: '<?php echo $duration; ?>',
                        distance: '<?php echo $distance; ?>',
                        delay: '<?php echo $delay; ?>',
                        size: '<?php echo $size; ?>',
                        trigger: '<?php echo $trigger; ?>',
                        animateFill: false,
                        flipOnUpdate: true,
                        interactive: true,
                        maxWidth: <?php echo $width['size']; ?>,
                        zIndex: 999,
                        onShow(instance) {
                            var tippyPopper = instance.popper;
                            jQuery(tippyPopper).attr('data-tippy-popper-id', '<?php echo $data['id']; ?>');
                        }
                    });
                });
            </script>
        <?php }
    }

    public function sa_el_section_after_render($extensions) {
        $extensions[] = 'sa-el-tooltip-section';

        return $extensions;
    }

}
