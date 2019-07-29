<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SA_ELEMENTOR_ADDONS\Classes;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Description of Sa_Elementor_Admin
 *
 * @author biplo
 */
trait Sa_Elementor_Admin {

    use \SA_ELEMENTOR_ADDONS\Classes\Include_Admin_Template;

    private function admin_scripts() {
        wp_enqueue_style('sa_elemetor-admin-stylesheets', content_url('uploads/OxiAddonsCustomData/elementor_addons/assets/css/admin.css', __FILE__));
        wp_enqueue_script('sa-elemetor-admin-script', content_url('uploads/OxiAddonsCustomData/elementor_addons/assets/js/admin.js', __FILE__));
        wp_localize_script('sa-elemetor-admin-script', 'saelemetor', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('sa-elemetor'),
        ));
    }

    /**
     *
     * add menu at admin panel
     */
    public function Menu() {
        $user_role = get_option('oxi_addons_user_permission');
        $role_object = get_role($user_role);
        $first_key = '';
        if (isset($role_object->capabilities) && is_array($role_object->capabilities)) {
            reset($role_object->capabilities);
            $first_key = key($role_object->capabilities);
        } else {
            $first_key = 'manage_options';
        }
        add_submenu_page('oxi-addons', 'Elementor Addons', 'Elementor Addons', $first_key, 'oxi-el-addons', [$this, 'oxi_addons_elementors']);
    }

    /**
     *
     * @global type $wp_version
     * @return html Display setting options
     */
    public function oxi_addons_elementors() {
        echo oxi_addons_import_css_js();
        echo $this->admin_scripts();
        echo OxiAddonsAdmAdminMenu('');
        $this->View_Data();
    }

}
