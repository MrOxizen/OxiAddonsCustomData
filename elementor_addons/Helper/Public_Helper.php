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
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => 'wp-forms',
                'API' => ''
            ],
            'button' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Button\Button',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Button/assets/index.min.css',
                    ],
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
            ],
            'call_to_action' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Call_To_Action\Call_To_Action',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Call_To_Action/assets/index.min.css',
                    ],
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
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
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
            ],
            'divider' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Divider\Divider',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Divider/assets/index.min.css',
                    ]
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
            ],
            'counter' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Counter\Counter',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'assets/vendor/odometer/css/odometer-theme-default.min.css',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Counter/assets/index.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'assets/vendor/waypoints/js/waypoints.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'assets/vendor/odometer/js/odometer.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Counter/assets/index.min.js',
                    ],
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
            ],
            'count_down' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Count_Down\Count_Down',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Count_Down/assets/index.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'assets/vendor/countdown/js/countdown.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Count_Down/assets/index.min.js',
                    ],
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
            ],
            'fancy_text' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Fancy_Text\Fancy_Text',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Fancy_Text/assets/index.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'assets/vendor/fancy-text/js/fancy-text.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Fancy_Text/assets/index.min.js',
                    ],
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
            ],
            'feature_list' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Feature_List\Feature_List',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Feature_List/assets/index.min.css',
                    ]
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
            ],
            'filterable_gallery' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Filterable_Gallery\Filterable_Gallery',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'assets/vendor/magnific-popup/css/index.min.css',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Filterable_Gallery/assets/index.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'assets/vendor/imagesLoaded/js/imagesloaded.pkgd.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'assets/vendor/isotope/js/isotope.pkgd.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'assets/vendor/magnific-popup/js/jquery.magnific-popup.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Filterable_Gallery/assets/index.min.js',
                    ],
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
            ],
            'advanced_heading' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Advanced_Heading\Advanced_Heading',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Advanced_Heading/assets/index.min.css',
                    ],
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
            ],
            'flip_box' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Flip_Box\Flip_Box',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Flip_Box/assets/index.min.css',
                    ],
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
            ],
            'flip_carousel' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Flip_Carousel\Flip_Carousel',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'assets/vendor/flipster/css/jquery.flipster.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'assets/vendor/flipster/js/jquery.flipster.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Flip_Carousel/assets/index.min.js',
                    ]
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
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
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
            ],
            'image_hotspots' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Image_Hotspots\Image_Hotspots',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Image_Hotspots/assets/index.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'assets/vendor/tipso/js/tipso.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Image_Hotspots/assets/index.min.js',
                    ]
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
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
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
            ],
            'image_comparison' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Image_Comparison\Image_Comparison',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'assets/vendor/twentytwenty/css/twentytwenty.min.css',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Image_Comparison/assets/index.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'assets/vendor/event_move/js/jquery.event.move.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'assets/vendor/twentytwenty/js/jquery.twentytwenty.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Image_Comparison/assets/index.min.js',
                    ],
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
            ],
            'info_box' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Info_Box\Info_Box',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Info_Box/assets/index.min.css',
                    ]
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
            ],
            'interactive_card' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Interactive_Card\Interactive_Card',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'assets/vendor/interactive-cards/css/interactive-cards.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'assets/vendor/nicescroll/js/jquery.nicescroll.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'assets/vendor/interactive-cards/js/interactive-cards.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Interactive_Card/assets/index.min.js',
                    ],
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
            ],
            'interactive_promo' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Interactive_Promo\Interactive_Promo',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Interactive_Promo/assets/index.min.css',
                    ],
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
            ],
            'lightbox_and_modal' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Lightbox_Modal\Lightbox_Modal',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'assets/vendor/magnific-popup/css/index.min.css',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Lightbox_Modal/assets/index.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'assets/vendor/magnific-popup/js/jquery.magnific-popup.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'assets/vendor/cookie/js/jquery.cookie.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Lightbox_Modal/assets/index.min.js',
                    ],
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
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
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
            ],
            'offcanvas' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Offcanvas\Offcanvas',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Offcanvas/assets/index.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'assets/vendor/offcanvas/js/offcanvas.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Offcanvas/assets/index.min.js',
                    ],
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
            ],
            'tooltip' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Tooltip\Tooltip',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Tooltip/assets/index.min.css',
                    ],
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
            ],
            'price_menu' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Price_Menu\Price_Menu',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Price_Menu/assets/index.min.css',
                    ],
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
            ],
            'pricing_table' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Pricing_Table\Pricing_Table',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'assets/vendor/tooltipster/css/tooltipster.bundle.min.css',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Pricing_Table/assets/index.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'assets/vendor/tooltipster/js/tooltipster.bundle.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Pricing_Table/assets/index.min.js',
                    ],
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
            ],
            'progress_bar' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Progress_Bar\Progress_Bar',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Progress_Bar/assets/index.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'assets/vendor/inview/js/inview.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'assets/vendor/progress-bar/js/progress-bar.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Progress_Bar/assets/index.min.js',
                    ],
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
            ],
            'protected_content' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Protected_Content\Protected_Content',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Protected_Content/assets/index.min.css',
                    ],
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
            ],
            'single_product' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Single_Product\Single_Product',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Single_Product/assets/index.min.css',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Single_Product/assets/overlay.min.css',
                    ],
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
            ],
            'team_member_carousel' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Team_Member_Carousel\Team_Member_Carousel',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Team_Member_Carousel/assets/index.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Team_Member_Carousel/assets/index.min.js',
                    ],
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
            ],
            'team_member' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Team_Member\Team_Member',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Team_Member/assets/index.min.css',
                    ]
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
            ],
            'testimonial_slider' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Testimonial_Slider\Testimonial_Slider',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Testimonial_Slider/assets/index.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Testimonial_Slider/assets/index.min.js',
                    ],
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
            ],
            'testimonial' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Testimonial\Testimonial',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Testimonial/assets/index.min.css',
                    ]
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
            ],
            'toggle' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Toggle\Toggle',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Toggle/assets/index.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Toggle/assets/index.min.js',
                    ],
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
            ],
            'card' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Card\Card',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Card/assets/index.min.css',
                    ],
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
            ],
            'justified_gallery' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Justified_Gallery\Justified_Gallery',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'assets/vendor/justifiedGallery/css/justifiedGallery.min.css',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Justified_Gallery/assets/index.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'assets/vendor/justifiedGallery/js/jquery.justifiedGallery.min.js',
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Justified_Gallery/assets/index.min.js',
                    ],
                ],
                'category' => 'Content Elements',
                'Premium' => TRUE,
                'condition' => '',
                'API' => ''
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
        //do_action(SA_ELEMENTOR_TEXTDOMAIN . '/after_enqueue_scripts', $this->has_cache_files());
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
        } else {
            $options[] = 'No ' . ucfirst($type) . ' Found';
        }
        return $options;
    }

    /**
     * Get all User Roles
     *
     * @return array
     */
    public function sa_el_user_roles() {
        global $wp_roles;
        $all = $wp_roles->roles;
        $all_roles = array();
        if (!empty($all)) {
            foreach ($all as $key => $value) {
                $all_roles[$key] = $all[$key]['name'];
            }
        }
        return $all_roles;
    }

    /**
     * Protected Form Input Fields
     */
    public function sa_el_get_block_pass_protected_form($settings) {
        echo '<div class="sa-el-password-protected-content-fields">';
        echo '<form method="post">';
        echo '<input type="password" name="sa_protection_password" class="sa-el-password" placeholder="' . $settings['sa_protection_password_placeholder'] . '">';
        echo '<input type="submit" value="' . $settings['sa_protection_password_submit_btn_txt'] . '" class="sa-el-submit">';
        echo '</form>';
        if (isset($_POST['sa_protection_password']) && ($settings['sa_protection_password'] !== $_POST['sa_protection_password'])) {
            echo sprintf(__('<p class="protected-content-error-msg">Password does not match.</p>', SA_ELEMENTOR_TEXTDOMAIN));
        }
        echo '</div>';
    }

    // Get all WordPress registered widgets
    public function sa_get_registered_sidebars() {
        global $wp_registered_sidebars;
        $options = [];

        if (!$wp_registered_sidebars) {
            $options[''] = __('No sidebars were found', SA_ELEMENTOR_TEXTDOMAIN);
        } else {
            $options['---'] = __('Choose Sidebar', SA_ELEMENTOR_TEXTDOMAIN);

            foreach ($wp_registered_sidebars as $sidebar_id => $sidebar) {
                $options[$sidebar_id] = $sidebar['name'];
            }
        }
        return $options;
    }

    /**
     *  Price Table Feature Function
     */
    protected function render_feature_list($settings, $obj) {
        if (empty($settings['sa_el_pricing_table_items'])) {
            return;
        }

        $counter = 0;
        ?>
        <ul>
            <?php
            foreach ($settings['sa_el_pricing_table_items'] as $item) :

                if ('yes' !== $item['sa_el_pricing_table_icon_mood']) {
                    $obj->add_render_attribute('pricing_feature_item' . $counter, 'class', 'disable-item');
                }

                if ('yes' === $item['sa_el_pricing_item_tooltip']) {
                    $obj->add_render_attribute(
                            'pricing_feature_item' . $counter, [
                        'class' => 'tooltip',
                        'title' => $item['sa_el_pricing_item_tooltip_content'],
                        'id' => $obj->get_id() . $counter,
                            ]
                    );
                }

                if ('yes' == $item['sa_el_pricing_item_tooltip']) {

                    if ($item['sa_el_pricing_item_tooltip_side']) {
                        $obj->add_render_attribute('pricing_feature_item' . $counter, 'data-side', $item['sa_el_pricing_item_tooltip_side']);
                    }

                    if ($item['sa_el_pricing_item_tooltip_trigger']) {
                        $obj->add_render_attribute('pricing_feature_item' . $counter, 'data-trigger', $item['sa_el_pricing_item_tooltip_trigger']);
                    }

                    if ($item['sa_el_pricing_item_tooltip_animation']) {
                        $obj->add_render_attribute('pricing_feature_item' . $counter, 'data-animation', $item['sa_el_pricing_item_tooltip_animation']);
                    }

                    if (!empty($item['pricing_item_tooltip_animation_duration'])) {
                        $obj->add_render_attribute('pricing_feature_item' . $counter, 'data-animation_duration', $item['pricing_item_tooltip_animation_duration']);
                    }

                    if (!empty($item['sa_el_pricing_table_toolip_arrow'])) {
                        $obj->add_render_attribute('pricing_feature_item' . $counter, 'data-arrow', $item['sa_el_pricing_table_toolip_arrow']);
                    }

                    if (!empty($item['sa_el_pricing_item_tooltip_theme'])) {
                        $obj->add_render_attribute('pricing_feature_item' . $counter, 'data-theme', $item['sa_el_pricing_item_tooltip_theme']);
                    }
                }
                ?>
                <li <?php echo $obj->get_render_attribute_string('pricing_feature_item' . $counter); ?>>
                    <?php if ('show' === $settings['sa_el_pricing_table_icon_enabled']) : ?>
                        <span class="li-icon" style="color:<?php echo esc_attr($item['sa_el_pricing_table_list_icon_color']); ?>"><i class="<?php echo esc_attr($item['sa_el_pricing_table_list_icon']); ?>"></i></span>
                        <?php endif; ?>
                        <?php echo $item['sa_el_pricing_table_item']; ?>
                </li>
                <?php
                $counter++;
            endforeach;
            ?>
        </ul>
        <?php
    }

}
