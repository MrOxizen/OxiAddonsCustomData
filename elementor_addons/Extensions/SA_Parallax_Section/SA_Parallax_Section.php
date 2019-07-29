<?php

namespace SA_ELEMENTOR_ADDONS\Extensions\SA_Parallax_Section;

/**
 * Description of SA_Parallax_Section
 *
 * @author Jabir
 */
if (!defined('ABSPATH')) {
    exit;
}

use Elementor\Utils;
use Elementor\Repeater;
use Elementor\Element_Base;
use Elementor\Elementor_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Responsive\Responsive;
use Elementor\Widget_Base;

class SA_Parallax_Section {

    public function __construct() {
        add_action('elementor/element/section/_section_style/before_section_start', array($this, 'register_controls'), 10);
        add_action('elementor/frontend/section/after_render', array($this, 'after_render'), 10);
    }

  public function register_controls( $element ) {

        $element->start_controls_section('sa_el_parallax_section',
            [
                'label' => __( 'SA Parallax', SA_ELEMENTOR_TEXTDOMAIN ),
                'tab'   => Controls_Manager::TAB_LAYOUT
            ]
        );

        $element->add_control('sa_el_parallax_switcher',
            [
				'label' => __( 'Enable Parallax', SA_ELEMENTOR_TEXTDOMAIN ),
				'type'  => Controls_Manager::SWITCHER,
			]
        );
        
        $element->add_control('sa_el_parallax_update',
        [
            'label'          => '<div class="elementor-update-preview" style="background-color: #fff;display: block;"><div class="elementor-update-preview-button-wrapper" style="display:block;"><button class="elementor-update-preview-button elementor-button elementor-button-success" style="background: #d30c5c; margin: 0 auto; display:block;">Apply Changes</button></div><div class="elementor-update-preview-title" style="display:block;text-align:center;margin-top: 10px;">Update changes to page</div></div>',
                'type'          => Controls_Manager::RAW_HTML,
                'condition'   => [
                    'sa_el_parallax_switcher' => 'yes'
                ]
            ] 
        );
        
		$element->add_control('sa_el_parallax_type',
			[
				'label'   => __( 'Type', SA_ELEMENTOR_TEXTDOMAIN ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'scroll'         => __( 'Scroll', SA_ELEMENTOR_TEXTDOMAIN ),
					'scroll-opacity' => __( 'Scroll with Fade', SA_ELEMENTOR_TEXTDOMAIN ),
					'opacity'        => __( 'Fade', SA_ELEMENTOR_TEXTDOMAIN ),
					'scale'          => __( 'Zoom', SA_ELEMENTOR_TEXTDOMAIN ),
					'scale-opacity'  => __( 'Zoom with Fade', SA_ELEMENTOR_TEXTDOMAIN ),
					'automove'       => __( 'In-Motion', SA_ELEMENTOR_TEXTDOMAIN ),
					'multi'          => __( 'Multi-Layered', SA_ELEMENTOR_TEXTDOMAIN )
				],
                'label_block' => 'true',
                'condition'   => [
                    'sa_el_parallax_switcher' => 'yes'
                ]
			]
        );
        
        $repeater = new Repeater();
        
        $repeater->add_control('sa_el_parallax_layer_image',
			[
				'label'   => __( 'Choose Image', SA_ELEMENTOR_TEXTDOMAIN ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
                'label_block' => true
			]
		);
        
        $repeater->add_control('sa_el_parallax_layer_mouse',
            [
                'label'       => esc_html__('Mouse Hover Interaction', SA_ELEMENTOR_TEXTDOMAIN),
                'type'        => Controls_Manager::SWITCHER,
                'default'     => 'yes'
            ]
        );
        
        $repeater->add_control('sa_el_parallax_layer_rate',
            [
                'label'         => esc_html__('Moving Intensity', SA_ELEMENTOR_TEXTDOMAIN),
                'type'          => Controls_Manager::NUMBER,
                'default'       => -10,
                'min'           => -20,
                'max'           => 20,
                'step'          => 1,
                'condition'     => [
                    'sa_el_parallax_layer_mouse' => 'yes'
                ]
            ]
        );

        $repeater->add_control('sa_el_parallax_layer_hor_pos',
            [
                'label'       => esc_html__('Horizontal Position', SA_ELEMENTOR_TEXTDOMAIN),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 50,
                'min'         => 0,
                'max'         => 100
            ]
        );
        
        $repeater->add_control('sa_el_parallax_layer_ver_pos',
            [
                'label'       => esc_html__('Vertical Position', SA_ELEMENTOR_TEXTDOMAIN),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 50,
                'min'         => 0,
                'max'         => 100,
            ]
        );

        $repeater->add_control('sa_el_parallax_layer_back_size',
            [
                'label'   => esc_html__( 'Image Size', SA_ELEMENTOR_TEXTDOMAIN ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'auto',
                'options' => [
                    'auto'    => esc_html__( 'Auto', SA_ELEMENTOR_TEXTDOMAIN ),
                    'cover'   => esc_html__( 'Cover', SA_ELEMENTOR_TEXTDOMAIN ),
                    'contain' => esc_html__( 'Contain', SA_ELEMENTOR_TEXTDOMAIN ),
                ],
            ]
        );
        
        $repeater->add_control('sa_el_parallax_layer_z_index',
			[
				'label'       => __( 'z-index', SA_ELEMENTOR_TEXTDOMAIN ),
				'type'        => Controls_Manager::NUMBER,
				'default'     => 1
			]
		);

        $element->add_control('sa_el_parallax_auto_type',
			[
				'label'   => __( 'Motion Direction', SA_ELEMENTOR_TEXTDOMAIN ),
				'type'    => Controls_Manager::SELECT,
				'default' => 11,
				'options' => [
					11   => __( 'Left to Right', SA_ELEMENTOR_TEXTDOMAIN ),
					'right'  => __( 'Right to Left', SA_ELEMENTOR_TEXTDOMAIN ),
					'top'    => __( 'Top to Bottom', SA_ELEMENTOR_TEXTDOMAIN ),
					'bottom' => __( 'Bottom to Top', SA_ELEMENTOR_TEXTDOMAIN ),
				],
				'condition'     => [
                    'sa_el_parallax_type'     => 'automove',
                    'sa_el_parallax_switcher' => 'yes'
				],
			]
		);
        
        $element->add_control('sa_el_parallax_speed',
			[
				'label'     => __( 'Parallax Speed', SA_ELEMENTOR_TEXTDOMAIN ),
				'type'      => Controls_Manager::NUMBER,
				'min'       => -1,
				'max'       => 2,
				'step'      => 0.1,
				'default'   => 1.3,
				'condition' => [
                    'sa_el_parallax_type!'    => [ 'automove' , 'multi' ],
                    'sa_el_parallax_switcher' => 'yes'
				],
			]
		);
        
        $element->add_control('sa_el_auto_speed',
			[
				'label'       => __( 'Motion Speed', SA_ELEMENTOR_TEXTDOMAIN ),
				'type'        => Controls_Manager::NUMBER,
				'default'     => 4,
				'min'         => 0,
				'max'         => 150,
				'condition'   => [
                    'sa_el_parallax_type'     => 'automove',
                    'sa_el_parallax_switcher' => 'yes'
				],
			]
		);
		
		$element->add_control('sa_el_parallax_android_support',
			[
				'label'     => esc_html__( 'Parallax on Android Devices', SA_ELEMENTOR_TEXTDOMAIN ),
				'type'      => Controls_Manager::SWITCHER,
				'condition' => [
                    'sa_el_parallax_type!'    => [ 'automove' , 'multi' ],
                    'sa_el_parallax_switcher' => 'yes'
				],
			]
		);
		
		$element->add_control('sa_el_parallax_ios_support',
			[
				'label'     => esc_html__( 'Parallax on iOS Devices', SA_ELEMENTOR_TEXTDOMAIN ),
				'type'      => Controls_Manager::SWITCHER,
				'condition' => [
                    'sa_el_parallax_type!'    => [ 'automove' , 'multi' ],
                    'sa_el_parallax_switcher' => 'yes'
				],
			]
		);
        
        $element->add_control('sa_el_parallax_layers_list',
            [
                'type'   => Controls_Manager::REPEATER,
                'fields' => array_values( $repeater->get_controls() ),
                'condition' => [
                    'sa_el_parallax_switcher' => 'yes',
                    'sa_el_parallax_type'     => 'multi'
                ]
            ]
        );
        
        $element->end_controls_section();

    }

    public function after_render($element) {

        $data = $element->get_data();
        $type = $data['elType'];
        $settings = $data['settings'];

        $parallax = isset($settings['sa_el_parallax_type']) ? $settings['sa_el_parallax_type'] : '';

        if ('section' === $type && isset($parallax) && '' !== $parallax && 'yes' === $element->get_settings('sa_el_parallax_switcher')
        ) {
            //    add_filter('eael/section/after_render', [$this, 'sa_el_section_after_render']);

            $android = ( isset($settings['sa_el_parallax_android_support']) && $settings['sa_el_parallax_android_support'] == 'yes' ) ? 0 : 1;
            $ios = ( isset($settings['sa_el_parallax_ios_support']) && $settings['sa_el_parallax_ios_support'] == 'yes' ) ? 0 : 1;
            $speed = !empty($settings['sa_el_parallax_speed']) ? $settings['sa_el_parallax_speed'] : 0.5;
            $auto_speed = !empty($settings['sa_el_auto_speed']) ? $settings['sa_el_auto_speed'] : 3;
            $repeater_list = ( isset($settings['sa_el_parallax_layers_list']) && $settings['sa_el_parallax_layers_list'] ) ? $settings['sa_el_parallax_layers_list'] : array();
            ?>		
            <script>
                (function ($) {
                    "use strict";

                    var target = $('.elementor-element-<?php echo $element->get_id(); ?>');

            <?php if ('automove' != $parallax && 'multi' != $parallax) : ?>

                        var SAParallaxElement = {

                            init: function () {
                                elementorFrontend.hooks.addAction('frontend/element_ready/global', SAParallaxElement.initWidget);
                            },
                            responsiveParallax: function () {
                                var android = <?php echo $android; ?>,
                                        ios = <?php echo $ios; ?>;
                                switch (true || 1) {
                                    case android && ios:
                                        return /iPad|iPhone|iPod|Android/;
                                        break;
                                    case android && ! ios:
                                        return /Android/;
                                        break;
                                    case ! android && ios:
                                        return /iPad|iPhone|iPod/;
                                        break;
                                    case (! android && ! ios):
                                        return null;
                                }
                            },
                            initWidget: function ($scope) {

                                target.jarallax({
                                    type: '<?php echo $parallax; ?>',
                                    speed: <?php echo $speed; ?>,
                                    keepImg: true,
                                    disableParallax: SAParallaxElement.responsiveParallax(),
                                });
                            }

                        };

                        $(window).on('elementor/frontend/init', SAParallaxElement.init);

            <?php elseif ('multi' == $parallax) : $counter = 0; ?>

                        target.addClass('sa-el-prallax-multi');

                <?php foreach ($repeater_list as $layer): $counter = $counter + 1; ?>

                            var backgroundImage = '<?php echo $layer['sa_el_parallax_layer_image']['url']; ?>',
                                    mouseParallax = ' data-parallax="' + <?php echo ($layer['sa_el_parallax_layer_mouse'] == 'yes') ? 'true' : 'false'; ?> + '" ',
                                    mouseRate = ' data-rate="' + <?php echo $layer['sa_el_parallax_layer_rate']; ?> + '" ';

                            $('<div id="sa-el-parallax-layer-<?php echo $element->get_id() . '-' . $counter; ?>"' + mouseParallax + mouseRate + ' class="sa-el-parallax-layer"></div>').prependTo(target).css({
                                'z-index': <?php echo!empty($layer['sa_el_parallax_layer_z_index']) ? $layer['sa_el_parallax_layer_z_index'] : 0; ?>,
                                'background-image': 'url(' + backgroundImage + ')',
                                'background-size': '<?php echo $layer['sa_el_parallax_layer_back_size']; ?>',
                                'background-position-x': <?php echo!empty($layer['sa_el_parallax_layer_hor_pos']) ? $layer['sa_el_parallax_layer_hor_pos'] : 50; ?> + '%',
                                'background-position-y': <?php echo!empty($layer['sa_el_parallax_layer_ver_pos']) ? $layer['sa_el_parallax_layer_ver_pos'] : 50; ?> + '%'

                            });

                <?php endforeach; ?>

                        if ($(window).outerWidth() > <?php echo esc_js(Responsive::get_breakpoints()['md']); ?>) {

                            $('.elementor-element-<?php echo $element->get_id(); ?>').mousemove(function (e) {

                                $(this).find('.sa-el-parallax-layer[data-parallax="true"]').each(function (index, element) {

                                    $(this).parallax($(this).data('rate'), e);

                                });

                            });

                        }


            <?php else: ?>

                        target.css('background-position', '0px 0px');

                <?php if (11 == $settings['sa_el_parallax_auto_type']) : ?>

                            var position = parseInt(target.css('background-position-x'));
                            setInterval(function () {

                                position = position + <?php echo $auto_speed; ?>;

                                target.css("backgroundPosition", position + "px 0");

                            }, 70);

                <?php elseif ('right' == $settings['sa_el_parallax_auto_type']) : ?>

                            var position = parseInt(target.css('background-position-x'));

                            setInterval(function () {

                                position = position - <?php echo $auto_speed; ?>;

                                target.css("backgroundPosition", position + "px 0");

                            }, 70);

                <?php elseif ('top' == $settings['sa_el_parallax_auto_type']) : ?>

                            var position = parseInt(target.css('background-position-y'));

                            setInterval(function () {

                                position = position + <?php echo $auto_speed; ?>;

                                target.css("backgroundPosition", "0 " + position + "px");

                            }, 70);

                <?php elseif ('bottom' == $settings['sa_el_parallax_auto_type']) : ?>

                            var position = parseInt(target.css('background-position-y'));

                            setInterval(function () {

                                position = position - <?php echo $auto_speed; ?>;
                                target.css("backgroundPosition", "0 " + position + "px");

                            }, 70);

                <?php endif; ?>
            <?php endif; ?>
                }(jQuery));
            </script>
        <?php
        }
    }

    public function sa_el_section_after_render($extensions) {
        $extensions[] = 'section-parallax';

        return $extensions;
    }

}
