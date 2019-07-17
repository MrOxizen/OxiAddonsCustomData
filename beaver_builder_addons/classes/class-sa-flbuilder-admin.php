 
<?php
if (!defined('ABSPATH')) {
    exit;
}
/**
 * A class that handles loading custom modules and custom
 * fields if the builder is installed and activated.
 */
final class SA_fl_builder_admin
{

    public function __construct()
    {
        add_action('wp_ajax_saflbuilder_save_settings', array($this, 'saflbuilder_save_settings'));
        if (isset($_REQUEST['page']) && 'oxi-addons-flbuilder' == $_REQUEST['page']) {
            add_action('admin_enqueue_scripts', __CLASS__ . '::admin_scripts');
        }
    }
    /**
     * update ajax data to the database
     */
    public function saflbuilder_save_settings()
    {
        check_ajax_referer('sa-flbuilder', 'security');
        $elements = sanitize_text_field($_POST['elements']);
        update_option('shortcode-addons-flbuilder', $elements);
        $element = get_option('shortcode-addons-flbuilder');
        echo  $element;
        die();
    }

    /**
     *
     * add menu at admin panel
     */
    public function Flbuilder_Menu()
    {
        $user_role = get_option('oxi_addons_user_permission');
        $role_object = get_role($user_role);
        $first_key = '';
        if (isset($role_object->capabilities) && is_array($role_object->capabilities)) {
            reset($role_object->capabilities);
            $first_key = key($role_object->capabilities);
        } else {
            $first_key = 'manage_options';
        }

        $title = 'Beaver Builder Addons';
        $cap =  $first_key;
        $slug = 'oxi-addons-flbuilder';
        $func = __CLASS__ . '::oxi_addons_flbuilder_render';
        add_submenu_page('oxi-addons', $title, $title, $cap, $slug, $func);
    }

    public static function oxi_addons_flbuilder_render()
    {
        echo OxiAddonsAdmAdminMenu('');
        echo oxi_addons_import_css_js();
        self::render_page_header();
        self::render();
    }

    static public function render()
    {
        include_once FL_MODULE_SA_FLBUILDER_URL . 'admin/admin-settings.php';
    }

    static function render_page_header()
    {
        echo '<div class="oxi-addons-wrapper"> 
                 <div class="oxi-addons-import-layouts">
                        <h1>GLOBAL CONTROL</h1>
                        <p> Use the Buttons to Activate or Deactivate all the Elements of Essential Addons at once.</p>
                </div>
            </div>';
    }

    /**
     *
     * @return Enqueue admin panel required css/js
     */
    public static function admin_scripts()
    {
        wp_enqueue_style('sa_flbuilder-admin-stylesheets', content_url('uploads/OxiAddonsCustomData/beaver_builder_addons/assets/css/admin.css', __FILE__));
        wp_enqueue_script('sa-flbuilder-admin-script', content_url('uploads/OxiAddonsCustomData/beaver_builder_addons/assets/js/admin.js', __FILE__));
        wp_localize_script('sa-flbuilder-admin-script', 'saflbuilder', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('sa-flbuilder'),
        ));
    }
}

new SA_fl_builder_admin();
