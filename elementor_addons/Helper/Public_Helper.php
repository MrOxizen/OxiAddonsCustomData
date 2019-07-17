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
            $installed = 'example=on&testimonial=on&flip_box=on&info_box=on&dual_color_heading=on&tooltip=on&advanced_accordion=on&advanced_tabs=on&offcanvas=on&advanced_menu_PRO=on&testimonial_Slider_PRO=on&static_product_PRO=on&Post_Grid=on&Post_Timeline=on&Content_Ticker=on&Product_Grid=on&Post_Block=on&Post_Carousel=on&Woo_Product_Collections=on&Content_Timeline=on';
            update_option('shortcode-addons-elementor', $installed);
        }
        parse_str($installed, $settings);
        return $settings;
    }

    function Get_Registered_elements() {
        $response = [
            'example' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Example\Example',
                'dependency' => [
                    'css' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Example/assets/index.min.css',
                    ],
                    'js' => [
                        SA_ELEMENTOR_ADDONS_URL . 'Elements/Example/assets/index.min.js',
                    ],
                ],
            ],
//            'testimonial' => [
//                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Testimonial',
//                'dependency' => [
//                    'css' => [
////                        SA_ELEMENTOR_ADDONS_URL . DIRECTORY_SEPARATOR . 'assets/front-end/css/fancy-text/index.min.css',
//                    ],
//                    'js' => [
////                        SA_ELEMENTOR_ADDONS_URL . DIRECTORY_SEPARATOR . 'assets/front-end/js/vendor/fancy-text/fancy-text.min.js',
////                        SA_ELEMENTOR_ADDONS_URL . DIRECTORY_SEPARATOR . 'assets/front-end/js/fancy-text/index.min.js',
//                    ],
//                ],
//            ],
            'tooltip' => [
                'class' => '\SA_ELEMENTOR_ADDONS\Elements\Tooltip',
                'dependency' => [
                    'css' => [
//                        SA_ELEMENTOR_ADDONS_URL . DIRECTORY_SEPARATOR . 'assets/front-end/css/fancy-text/index.min.css',
                    ],
                    'js' => [
//                        SA_ELEMENTOR_ADDONS_URL . DIRECTORY_SEPARATOR . 'assets/front-end/js/vendor/fancy-text/fancy-text.min.js',
//                        SA_ELEMENTOR_ADDONS_URL . DIRECTORY_SEPARATOR . 'assets/front-end/js/fancy-text/index.min.js',
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
                ], 1);
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

    public function safe_protocol($url) {
        return preg_replace(['/^http:/', '/^https:/', '/(?!^)\/\//'], ['', '', '/'], $url);
    }

    public function has_cache_files($post_type = null, $post_id = null) {
        $css_path = SA_ELEMENTOR_ADDONS_ASSETS . ($post_type ? 'sa-el-addons' . $post_type : 'sa-el-addons') . ($post_id ? '-' . $post_id : '') . '.min.css';
        $js_path = SA_ELEMENTOR_ADDONS_ASSETS . ($post_type ? 'sa-el-addons' . $post_type : 'sa-el-addons') . ($post_id ? '-' . $post_id : '') . '.min.js';

        if (is_readable($this->safe_path($css_path)) && is_readable($this->safe_path($js_path))) {
            return true;
        }

        return false;
    }

    public function enqueue_scripts() {
        if (!$this->has_cache_files()) {
            $this->generate_scripts($this->Get_Active_Elements());
        }

        // enqueue scripts
        if ($this->has_cache_files()) {
            $css_file = SA_ELEMENTOR_ADDONS_ASSETS . '/' . SA_ELEMENTOR_TEXTDOMAIN . '.min.css';
            $js_file = SA_ELEMENTOR_ADDONS_ASSETS . '/' . SA_ELEMENTOR_TEXTDOMAIN . '.min.js';
        } else {
            $css_file = SA_ELEMENTOR_ADDONS_URL . '/assets/css/style.css';
            $js_file = SA_ELEMENTOR_ADDONS_URL . '/assets/js/jquery.js';
        }

        wp_enqueue_style(
                SA_ELEMENTOR_TEXTDOMAIN . '-css', $this->safe_protocol($css_file), false, $this->VERSION
        );

        wp_enqueue_script(
                SA_ELEMENTOR_TEXTDOMAIN . '-js', $this->safe_protocol($js_file), ['jquery'], $this->VERSION, true
        );

        // hook extended assets
        do_action(SA_ELEMENTOR_TEXTDOMAIN . '/after_enqueue_scripts', $this->has_cache_files());
    }

}
