<?php

namespace SA_FLBUILDER_ADDONS\Classes;

/**
 * Description of Bootstrap
 * @author biplob
 */
class Bootstrap
{

    use \SA_FLBUILDER_ADDONS\Helper\Admin_helper;
    use \SA_FLBUILDER_ADDONS\Helper\Public_Helper;

    // instance container
    private static $instance = null;
    // registered elements container
    public $active_elements;

    public static function instance()
    {
        if (self::$instance == null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function __construct()
    {
        $this->active_elements = $this->get_active_elements(); // register hooks
        $this->register_hooks();
        add_action('admin_menu', array($this, 'Menu'));
        add_action('wp_ajax_saflbuilder_save_settings', array($this, 'saflbuilder_save_settings'));
        add_action('init', __CLASS__ . '::global_styles_scripts');
    }

    public function register_hooks()
    {
        if (class_exists('FLBuilder')) {
            add_action('init', array($this, 'load_modules'));
        }
    }

    public function load_modules()
    {
        require_once FL_MODULE_SA_FLBUILDER_URL . 'Classes/Helper.php';
        $active = $this->active_elements;
        foreach ($active as $key => $value) {
            require_once FL_MODULE_SA_FLBUILDER_URL . 'modules/sa-' . $key . '/sa-' . $key . '.php';
        }
    }

    static public function global_styles_scripts()
    {
        if (!is_admin()) {
            wp_register_style('sa-global-css', SA_FLBUILDER_CONTENT_URL . 'assets/css/frontend.css', array());

            wp_enqueue_style('sa-global-css');
        }
    }
}
