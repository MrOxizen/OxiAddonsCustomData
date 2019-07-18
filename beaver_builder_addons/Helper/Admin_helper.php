<?php

namespace SA_FLBUILDER_ADDONS\Helper;

/**
 * Description of Admin_helper
 * @author biplob
 */
trait Admin_helper
{

    use \SA_FLBUILDER_ADDONS\Classes\Template;

    public function admin_scripts()
    {
        wp_enqueue_style('sa_flbuilder-admin-stylesheets', content_url('uploads/OxiAddonsCustomData/beaver_builder_addons/assets/css/admin.css', __FILE__));
        wp_enqueue_script('sa-flbuilder-admin-script', content_url('uploads/OxiAddonsCustomData/beaver_builder_addons/assets/js/admin.js', __FILE__));
        wp_localize_script('sa-flbuilder-admin-script', 'saflbuilder', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('sa-flbuilder'),
        ));
    }

    /**
     *
     * add menu at admin panel
     */
    public function Menu()
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
        add_submenu_page('oxi-addons', 'Beaver Builder Addons', 'Beaver Builder Addons', $first_key, 'oxi-addons-fl-builder', [$this, 'oxi_addons_flbuilder']);
    }

    public function oxi_addons_flbuilder()
    {
        echo oxi_addons_import_css_js();
        echo $this->admin_scripts();
        echo OxiAddonsAdmAdminMenu('');
        echo $this->HTML();
    }
    /**
     * update ajax data to the database
     */
    final function saflbuilder_save_settings()
    {
        check_ajax_referer('sa-flbuilder', 'security');
        $elements = sanitize_text_field($_POST['elements']);
        update_option('shortcode-addons-flbuilder', $elements);
        $element = get_option('shortcode-addons-flbuilder');
        echo  $element;
        die();
    }
}
