<?php

namespace SA_ELEMENTOR_ADDONS\Classes;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bootstrap
 *
 * @author biplo
 */
class Bootstrap {

    use \SA_ELEMENTOR_ADDONS\Helper\Scripts_Loader;
    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;
    use \SA_ELEMENTOR_ADDONS\Classes\Sa_Elementor_Admin;

    // instance container
    private static $instance = null;
    // registered elements container
    public $registered_elements;
    // transient elements container
    public $transient_elements;

    public static function instance() {
        if (self::$instance == null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function __construct() {
        $this->registered_elements = $this->Get_Registered_elements(); // register hooks
        $this->register_hooks();
        add_action('admin_menu', array($this, 'Menu'));
        add_action('wp_ajax_sa_elementor_save_settings', array($this, 'sa_elementor_save_settings'));
    }

    // Elements
    public function register_hooks() {
        add_action('elementor/elements/categories_registered', array($this, 'register_widget_categories'));
        add_action('elementor/controls/controls_registered', array($this, 'register_controls_group'));
        add_action('elementor/widgets/widgets_registered', array($this, 'register_elements'));

        add_action('elementor/frontend/after_enqueue_scripts', array($this, 'sl_enqueue_scripts'));
        add_action('elementor/editor/after_enqueue_scripts', array($this, 'enqueue_editor_scripts'));
    }

}
