<?php

namespace SA_ELEMENTOR_ADDONS\Helper;

if (!defined('ABSPATH')) {
    exit;
}
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Public_Helper
 *
 * @author biplo
 */
trait Public_Helper {

    function Get_Active_Elements() {
        $installed = get_option('shortcode-addons-elementor');
        if (empty($installed) || $installed == '') {
            $installed = 'button=on&testimonial=on&flip_box=on&info_box=on&dual_color_heading=on&tooltip=on&advanced_accordion=on&advanced_tabs=on&offcanvas=on&advanced_menu_PRO=on&testimonial_Slider_PRO=on&static_product_PRO=on&Post_Grid=on&Post_Timeline=on&Content_Ticker=on&Product_Grid=on&Post_Block=on&Post_Carousel=on&Woo_Product_Collections=on&Content_Timeline=on';
            update_option('shortcode-addons-elementor', $installed);
        }
        parse_str($installed, $settings);
        return $settings;
    }

    function Get_Registered_elements() {
        $response = [
            'accordion' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Accordion\Accordion',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Accordion/assets/index.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Accordion/assets/index.min.js',
                    ],
                ],
            ],
            'button' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Button\Button',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Button/assets/index.min.css',
                    ],
                ],
            ],
            'icon_box' => [
                'class' => 'SA_ELEMENTOR_ADDONS\Elements\Icon_Box\Icon_Box',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Icon_Box/assets/index.min.css',
                    ],
                ],
            ],
            'call_to_action' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Call_To_Action\Call_To_Action',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Call_To_Action/assets/index.min.css',
                    ],
                ],
            ],
            'tabs' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Tabs\Tabs',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Tabs/assets/index.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Tabs/assets/index.min.js',
                    ],
                ],
            ],
            'divider' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Divider\Divider',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Divider/assets/index.min.css',
                    ]
                ],
            ],
            'counter' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Counter\Counter',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Counter/assets/vendor/css/odometer-theme-default.min.css',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Counter/assets/index.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Counter/assets/vendor/js/waypoints.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Counter/assets/vendor/js/odometer.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Counter/assets/index.min.js',
                    ],
                ],
            ],
            'count_down' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Count_Down\Count_Down',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Count_Down/assets/index.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Count_Down/assets/vendor/countdown.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Count_Down/assets/index.min.js',
                    ],
                ],
            ],
            'fancy_text' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Fancy_Text\Fancy_Text',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Fancy_Text/assets/index.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Fancy_Text/assets/vendor/fancy-text.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Fancy_Text/assets/index.min.js',
                    ],
                ],
            ],
            'feature_list' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Feature_List\Feature_List',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Feature_List/assets/index.min.css',
                    ]
                ],
            ],
            'filterable_gallery' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Filterable_Gallery\Filterable_Gallery',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Filterable_Gallery/assets/vendor/magnific-popup/index.min.css',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Filterable_Gallery/assets/index.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Filterable_Gallery/assets/vendor/imagesLoaded/imagesloaded.pkgd.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Filterable_Gallery/assets/vendor/isotope/isotope.pkgd.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Filterable_Gallery/assets/vendor/magnific-popup/jquery.magnific-popup.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Filterable_Gallery/assets/index.min.js',
                    ],
                ],
            ],
            'advanced_heading' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Advanced_Heading\Advanced_Heading',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Advanced_Heading/assets/index.min.css',
                    ],
                ],
            ],
            'flip_box' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Flip_Box\Flip_Box',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Flip_Box/assets/index.min.css',
                    ],
                ],
            ],
            'flip_carousel' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Flip_Carousel\Flip_Carousel',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Flip_Carousel/assets/vendor/jquery.flipster.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Flip_Carousel/assets/vendor/jquery.flipster.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Flip_Carousel/assets/index.min.js',
                    ]
                ]
            ],
            'image_accordion' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Image_Accordion\Image_Accordion',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Image_Accordion/assets/index.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Image_Accordion/assets/index.min.js',
                    ]
                ],
            ],
            'image_hotspots' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Image_Hotspots\Image_Hotspots',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Image_Hotspots/assets/index.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Image_Hotspots/vendor/js/tipso.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Image_Hotspots/assets/index.min.js',
                    ]
                ],
            ],
            'image_scroller' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Image_Scroller\Image_Scroller',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Image_Scroller/assets/index.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Image_Scroller/assets/index.min.js',
                    ]
                ],
            ],
            'image_comparison' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Image_Comparison\Image_Comparison',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Image_Comparison/assets/vendor/css/twentytwenty.min.css',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Image_Comparison/assets/index.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Image_Comparison/assets/vendor/js/jquery.event.move.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Image_Comparison/assets/vendor/js/jquery.twentytwenty.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Image_Comparison/assets/index.min.js',
                    ],
                ],
            ],
            'info_box' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Info_Box\Info_Box',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Info_Box/assets/index.min.css',
                    ]
                ],
            ],
            'interactive_card' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Interactive_Card\Interactive_Card',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Interactive_Card/assets/vendor/css/interactive-cards.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Interactive_Card/assets/vendor/js/jquery.nicescroll.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Interactive_Card/assets/vendor/js/interactive-cards.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Interactive_Card/assets/index.min.js',
                    ],
                ],
            ],
            'interactive_promo' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Interactive_Promo\Interactive_Promo',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Interactive_Promo/assets/index.min.css',
                    ],
                ],
            ],
            'lightbox_and_modal' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Lightbox_Modal\Lightbox_Modal',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Lightbox_Modal/assets/vendor/index.min.css',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Lightbox_Modal/assets/index.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Lightbox_Modal/assets/vendor/jquery.magnific-popup.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Lightbox_Modal/assets/vendor/jquery.cookie.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Lightbox_Modal/assets/index.min.js',
                    ],
                ],
            ],
            'logo_carousel' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Logo_Carousel\Logo_Carousel',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Logo_Carousel/assets/index.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Logo_Carousel/assets/index.min.js',
                    ],
                ],
            ],
        ];
        return $response;
    }

    public function register_widget_categories($elements_manager) {
        $elements_manager->add_category(
                'sa-el-addons', [
            'title' => __('Shortcode Addons', SA_ELEMENTOR_TEXTDOMAIN),
            'icon' => 'font',
                ], 1
        );
    }

    /**
     * Add new elementor group control
     *
     * @since v1.0.0
     */
    public function register_controls_group($controls_manager) {
        
    }

    /**
     * Register widgets
     *
     * @since v3.0.0
     */
    public function register_elements($widgets_manager) {
        $active_elements = $this->Get_Active_Elements();

        asort($active_elements);

        foreach ($active_elements as $key => $active_element) {
            if (array_key_exists($key, $this->registered_elements) && class_exists($this->registered_elements[$key]['class'])) {
                $widgets_manager->register_widget_type(new $this->registered_elements[$key]['class']);
            }
        }
    }

    public function has_cache_files($post_type = null, $post_id = null) {
        $css_path = SA_ELEMENTOR_ADDONS_ASSETS . ($post_type ? SA_ELEMENTOR_TEXTDOMAIN . $post_type : SA_ELEMENTOR_TEXTDOMAIN) . ($post_id ? '-' . $post_id : '') . '.min.css';
        $js_path = SA_ELEMENTOR_ADDONS_ASSETS . ($post_type ? SA_ELEMENTOR_TEXTDOMAIN . $post_type : SA_ELEMENTOR_TEXTDOMAIN) . ($post_id ? '-' . $post_id : '') . '.min.js';

        if (is_readable($this->safe_path($css_path)) && is_readable($this->safe_path($js_path))) {
            return true;
        }

        return false;
    }

    public function sl_enqueue_scripts() {
        if (!$this->has_cache_files()) {

            $this->generate_scripts($this->Get_Active_Elements());
        }
        // enqueue scripts
        if ($this->has_cache_files()) {
            $css_file = 'cache/' . SA_ELEMENTOR_TEXTDOMAIN . '.min.css';
            $js_file = 'cache/' . SA_ELEMENTOR_TEXTDOMAIN . '.min.js';
        } else {
            $css_file = '/assets/css/style.css';
            $js_file = '/assets/js/jquery.js';
        }
        wp_enqueue_style(SA_ELEMENTOR_TEXTDOMAIN, content_url('uploads/OxiAddonsCustomData/elementor_addons/' . $css_file));
        wp_enqueue_script(SA_ELEMENTOR_TEXTDOMAIN . '-js', content_url('uploads/OxiAddonsCustomData/elementor_addons/' . $js_file), ['jquery']);
        // hook extended assets
        do_action(SA_ELEMENTOR_TEXTDOMAIN . '/after_enqueue_scripts', $this->has_cache_files());
    }

    /**
     * Get all elementor page templates
     *
     * @return array
     */
    public function get_elementor_page_templates($type = null) {
        $args = [
            'post_type' => 'elementor_library',
            'posts_per_page' => -1,
        ];

        if ($type) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'elementor_library_type',
                    'field' => 'slug',
                    'terms' => $type,
                ],
            ];
        }

        $page_templates = get_posts($args);
        $options = array();

        if (!empty($page_templates) && !is_wp_error($page_templates)) {
            foreach ($page_templates as $post) {
                $options[$post->ID] = $post->post_title;
            }
        }
        return $options;
    }

}
