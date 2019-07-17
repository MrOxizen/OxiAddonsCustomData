<?php

/**
 * Text Domain: sae_template
 *
 * @package Shortcode_Addons/SAE_Templates
 *
 *
 * Elements for WordPress is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 */
if (!defined('ABSPATH')) {
    exit;
}


define('SAE_TEMPLATES_SLUG', 'sae-templates');
define('SAE_TEMPLATES_VER', '1.0');
define('SAE_TEMPLATES_FILE', OxiAddonsCustomData . 'elementor_templates/');
define('SAE_TEMPLATES_PHP_VERSION', '5.6');
define('SAE_TEMPLATES_TEXTDOMAIN', 'sae-templates');

class SAETemplates_BLocks {

    /**
     * SAETemplates_BLocks constructor.
     *
     * The main plugin actions registered for WordPress
     */
    public function __construct() {
        add_action('init', array($this, 'SAE_check_dependencies'));
        $this->SAE_include_files();
        $this->hooks();
    }

    /**
     * Initialize
     */
    public function hooks() {
        add_action('admin_enqueue_scripts', array($this, 'SAE_admin_scripts',));
        add_action('wp_ajax_sael_template_data_load', array($this, 'sael_template_data_load'));
    }

    /**
     * Load files
     */
    public function SAE_include_files() {
        if (did_action('elementor/loaded')) {
            include_once( SAE_TEMPLATES_FILE . 'includes/class-sael-temp_importer.php' );
            include_once( SAE_TEMPLATES_FILE . 'includes/class-sael-temp-remote.php' );
        }
    }

    /**
     * Check plugin dependencies
     * Check if Elementor plugin is installed
     */
    public function SAE_check_dependencies() {

        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', array($this, 'SAE_layouts_widget_fail_load'));
            return;
        } else {
            add_action('admin_menu', array($this, 'SAE_menu'));
        }
        $elementor_version_required = '1.1.2';
        if (!version_compare(ELEMENTOR_VERSION, $elementor_version_required, '>=')) {
            add_action('admin_notices', array($this, 'SAE_layouts_elementor_update_notice'));
            return;
        }
    }

    /**
     * This notice will appear if Elementor is not installed or activated or both
     */
    public function SAE_layouts_widget_fail_load() {

        $screen = get_current_screen();
        if (isset($screen->parent_file) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id) {
            return;
        }
        $plugin = 'elementor/elementor.php';
        $file_path = 'elementor/elementor.php';
        $installed_plugins = get_plugins();

        if (isset($installed_plugins[$file_path])) { // check if plugin is installed
            if (!current_user_can('activate_plugins')) {
                return;
            }
            $activation_url = wp_nonce_url('plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin);

            $message = '<p><strong>' . __('Shortcode Addons Elementor Templates & Blocks', SAE_TEMPLATES_TEXTDOMAIN) . '</strong>' . __(' widgets not working because you need to activate the Elementor plugin.', SAE_TEMPLATES_TEXTDOMAIN) . '</p>';
            $message .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $activation_url, __('Activate Elementor Now', SAE_TEMPLATES_TEXTDOMAIN)) . '</p>';
        } else {
            if (!current_user_can('install_plugins')) {
                return;
            }

            $install_url = wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=elementor'), 'install-plugin_elementor');

            $message = '<p><strong>' . __('Shortcode Addons Elementor Templates & Blocks', SAE_TEMPLATES_TEXTDOMAIN) . '</strong>' . __(' widgets not working because you need to install the Elemenor plugin', SAE_TEMPLATES_TEXTDOMAIN) . '</p>';
            $message .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $install_url, __('Install Elementor Now', SAE_TEMPLATES_TEXTDOMAIN)) . '</p>';
        }

        echo '<div class="error"><p>' . $message . '</p></div>';
    }

    /**
     * Display admin notice for Elementor update if Elementor version is old
     */
    public function SAE_layouts_elementor_update_notice() {
        if (!current_user_can('update_plugins')) {
            return;
        }

        $file_path = 'elementor/elementor.php';

        $upgrade_link = wp_nonce_url(self_admin_url('update.php?action=upgrade-plugin&plugin=') . $file_path, 'upgrade-plugin_' . $file_path);
        $message = '<p><strong>' . __('Shortcode Addons Elementor Templates & Blocks', SAE_TEMPLATES_TEXTDOMAIN) . '</strong>' . __(' widgets not working because you are using an old version of Elementor.', CTW_DOMAIN) . '</p>';
        $message .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $upgrade_link, __('Update Elementor Now', CTW_DOMAIN)) . '</p>';
        echo '<div class="error">' . $message . '</div>';
    }

    /**
     *
     * @return Enqueue admin panel required css/js
     */
    public function SAE_admin_scripts() {
        wp_register_style('sael-admin-stylesheets', content_url('uploads/OxiAddonsCustomData/elementor_templates/assets/admin.css', __FILE__));
        wp_register_script('sael-admin-script', content_url('uploads/OxiAddonsCustomData/elementor_templates/assets/admin.js', __FILE__), array('jquery'), false, true);
        wp_localize_script('sael-admin-script', 'sa_el_js_object', array('ajaxurl' => admin_url('admin-ajax.php')));
        if (isset($_GET['page']) && $_GET['page'] == 'oxi-addons-el-template') {

            wp_enqueue_style('sael-admin-stylesheets');
            wp_enqueue_script('sael-admin-script');
//            wp_enqueue_script('lfe-admin-live-script');
//            add_thickbox();
        }
    }

    /**
     *
     * add menu at admin panel
     */
    public function SAE_menu() {
        $user_role = get_option('oxi_addons_user_permission');
        $role_object = get_role($user_role);
        $first_key = '';
        if (isset($role_object->capabilities) && is_array($role_object->capabilities)) {
            reset($role_object->capabilities);
            $first_key = key($role_object->capabilities);
        } else {
            $first_key = 'manage_options';
        }
        add_submenu_page('oxi-addons', 'Elementor Templates', 'Elementor Templates', $first_key, 'oxi-addons-el-template', 'oxi_addons_elementor_template');

        /**
         *
         * @global type $wp_version
         * @return html Display setting options
         */
        function oxi_addons_elementor_template() {
            echo OxiAddonsAdmAdminMenu('');
            echo oxi_addons_import_css_js();
            include_once SAE_TEMPLATES_FILE . '/includes/layouts.php';
        }

    }

    private function SAE_layouts_plugins_dependency($required) {
        $required = explode(',', $required);
        $installed_plugins = get_plugins();
        $return = '';
        foreach ($required as $value) {
            if ($value != '') {
              $return .= (isset($installed_plugins[$value]) ? '' : $value . ',');
            }
        }
        return $return;
    }

    public function sael_template_data_load() {
        $categories = SAEL\SAEL_Temp_Remote::sael_get_instance()->categories_list();
        $templates = SAEL\SAEL_Temp_Remote::sael_get_instance()->templates_list();
        $rtdata = '';
        $val = get_option('oxi_addons_license_status');
        $oxitype = sanitize_text_field($_POST['datatype']);
        $oxisection = sanitize_text_field($_POST['NAME']);
        $aray = explode('oxi-addons-el-template', $link);

        if (empty($oxitype) && empty($oxisection)) {
            $temdata = '';
            $num = $pg = 0;
            foreach ($categories['category'] as $cat) {
                if ($cat['category_parent'] == $categories['parent']['templates']) {
                    $temdata .= '<div class="oxi-el-template-data-col">
                                    <div class="oxi-el-template-data-image">
                                        <div class="oxi-el-template-data-image-data"style="background-image: url(' . $cat['thumbnail'] . ')"></div>
                                        <a href="' . admin_url('admin.php?page=oxi-addons-el-template&sa-el-section=' . $cat['slug'] . '') . '"></a>
                                    </div>
                                    <div class="oxi-el-template-data-content">
                                        <div class="oxi-el-template-data-content-data">
                                            <h3>' . $cat['title'] . '</h3>
                                            ' . $cat['template_count'] . ' Page Templates in this Kits
                                        </div>
                                    </div>
                                </div>';
                    $pg += $cat['template_count'];
                    $num++;
                }
            }

            $rtdata .= '  <div class="oxi-el-template-body">
                        <div class="oxi-el-template-count">
                            <h1 class="oxi-el-template-count-h1">Free Template Kits for Elementor</h1>
                            <div class="oxi-el-template-count-data">' . $num . ' Free Template Kits, over ' . $pg . ' individual Responsive Page Templates.</div>
                        </div>
                        <div class="oxi-el-template-data">
                        ' . $temdata . '
                        </div>
                    </div>';
        } else if (empty($oxitype) && !empty($oxisection)) {
            $args = array('post_type' => 'elementor_library', 'posts_per_page' => -1,);
            $el_library = array();
            $query = new WP_Query($args);
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $el_library[0][$query->post->post_name] = $query->post->post_name;
                    $el_library[1][$query->post->post_name] = $query->post->ID;
                }
            }
            $i = 0;
            $tempdata = '';
            foreach ($templates['templates'][$oxisection] as $section) {
                if ($section['is_pro'] && $val != 'valid') {
                    $profile = '<div class="oxi-el-template-section-imagebody">
                                        <a href="#" data-url="' . $section['url'] . '" class="sael-btn sa-el-preview-button"  sa-el-title="' . $section['title'] . ' Templates">Preview</a>
                                    </div>
                                    <div class="oxi-el-template-section-imagebody-pro">
                                         <div class="sa-el-pro-spn">Upgrade</div>
                                    </div>';
                } else if (array_key_exists($section['post_name'], $el_library[0])) {
                    $profile = '<div class="oxi-el-template-section-imagebody">
                                        <a href="#" data-url="' . $section['url'] . '" class="sael-btn sa-el-preview-button" sa-el-title="' . $section['title'] . ' Templates">Preview</a>
                                        <a href="' . admin_url('post.php?post=' . $el_library[1][$section['post_name']] . '&action=elementor') . '" target="_blank" class="sael-btn el-edit-btn">Edit Template</a>
                                    </div>';
                } else {
                    $profile = '<div class="oxi-el-template-section-imagebody">
                                        <a href="#" data-url="' . $section['url'] . '" class="sael-btn sa-el-preview-button">Preview</a>
                                        <a href="javascript:void(0)"  class="sael-btn el-import-btn  sa-el-import-start" sael_required="' . str_replace('-', ' ', $section['required']) . '" sael-id="' . $section['id'] . '" sa-el-title="' . $section['title'] . ' Template">Import</a>
                                    </div>';
                }
                $tempdata .= '<div class="oxi-el-template-data-col">
                                <div class="oxi-el-template-section-image">
                                    <div class="oxi-el-template-section-image-data"style="background-image: url(' . $section['thumbnail'] . ')"></div>
                                    ' . $profile . '
                                </div>
                                <div class="oxi-el-template-data-content">
                                    <div class="oxi-el-template-data-content-data">
                                        <h3>' . $section['title'] . '</h3>
                                    </div>
                                </div>
                            </div>';
                $i++;
            }

            $rtdata .= '<div class="oxi-el-template-section">
                    <div class="oxi-el-template-back-menu">
                        <a href="' . admin_url('admin.php?page=oxi-addons-el-template') . '">Back to Elementor Templates</a>
                    </div>
                    <div class="oxi-el-template-count-section">
                        <div class="oxi-el-template-count">
                            <h1 class="oxi-el-template-count-h1">' . $categories['category'][$oxisection]['title'] . '</h1>
                            <div class="oxi-el-template-count-data">' . $i++ . ' Page Templates in this Kits.</div>
                        </div>
                    </div>
                    <div class="oxi-el-template-data">
                            ' . $tempdata . '
                    </div>
                </div>';
        } else if ($oxitype == 'blocks' && empty($oxisection)) {
            $temdata = '';
            $pg = 0;
            foreach ($categories['category'] as $cat) {
                if ($cat['category_parent'] == $categories['parent']['blocks']) {
                    $temdata .= '<div class="oxi-el-blocks-data-col">
                                    <div class="oxi-el-blocks-data-content">
                                        <div class="oxi-el-template-data-content-data">
                                            <h3>' . $cat['title'] . '</h3>
                                            ' . $cat['template_count'] . ' Page Templates in this Kits
                                            <a href="' . admin_url('admin.php?page=oxi-addons-el-template&saetype=blocks&sa-el-section=' . $cat['slug']) . '"></a>
                                        </div>
                                    </div>
                                </div>';
                    $pg += $cat['template_count'];
                }
            }
            $rtdata .= '<div class="oxi-el-blocks-body" >
                    <div class="oxi-el-template-count">
                        <h1 class="oxi-el-template-count-h1">Free Block Kits for Elementor</h1>
                        <div class="oxi-el-template-count-data">Browse over ' . $pg . ' free Responsive Block.</div>
                    </div>
                    <div class="oxi-el-blocks-data">
                        ' . $temdata . '
                    </div>
                </div>';
        } else if ($oxitype == 'blocks' && !empty($oxisection)) {
            $args = array('post_type' => 'elementor_library', 'posts_per_page' => -1,);
            $el_library = array();
            $query = new WP_Query($args);
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $el_library[0][$query->post->post_name] = $query->post->post_name;
                    $el_library[1][$query->post->post_name] = $query->post->ID;
                }
            }
            $i = 0;
            $tempdata = '';
            foreach ($templates['templates'][$oxisection] as $section) {

                if ($section['is_pro'] && $val != 'valid') {
                    $profile = ' <a href="javascript:void(0)" data-url="https://demo.layoutsforelementor.com/home-maintenance" class="sael-btn sa-el-blocks-pro-button">Upgrade Please</a>';
                } else if (array_key_exists($section['post_name'], $el_library[0])) {
                    $profile = '<a href="' . admin_url('post.php?post=' . $el_library[1][$section['post_name']] . '&action=elementor') . '" target="_blank" class="sael-btn el-edit-btn">Edit Block</a>';
                } else {
                    $profile = ' <a href="javascript:void(0)" data-url="https://demo.layoutsforelementor.com/home-maintenance" class="sael-btn el-import-btn sa-el-import-start"  sael_required="' . $this->SAE_layouts_plugins_dependency($section['required']) . '" sael-id="' . $section['id'] . '"  sa-el-title="' . $section['title'] . ' Block">Import</a>';
                }
                $tempdata .= '<div class="oxi-el-blocks-section-col">
                                <div class="oxi-el-blocks-section-image">
                                    <img src="' . $section['thumbnail'] . '" alt="' . $section['title'] . '">
                                    <div class="oxi-el-template-section-imagebody">
                                         <a href="#" data-url="' . $section['url'] . '" class="sael-btn sa-el-preview-button" sa-el-title="' . $section['title'] . ' Block">Preview</a>
                                    </div>
                                </div>
                                <div class="oxi-el-blocks-section-content">
                                    <div class="oxi-el-template-count">
                                        <h1 class="oxi-el-template-count-h1">' . $section['title'] . '</h1>
                                        <div class="oxi-el-template-count-data">Import this template to make it available in your Elementor Saved Templates list for future use.</div>
                                        <div class="oxi-el-blocks-section-success">Congrats! This was just imported to the WordPress library.</div>
                                        ' . $profile . '
                                      </div>
                                </div>
                            </div>';
                $i++;
            }
            $rtdata .= '  <div class="oxi-el-blocks-section">
                        <div class="oxi-el-template-back-menu">
                            <a href="' . admin_url('admin.php?page=oxi-addons-el-template&saetype=blocks') . '">Back to all Blocks</a>
                        </div>
                        <div class="oxi-el-template-count-section">
                            <div class="oxi-el-template-count">
                                <h1 class="oxi-el-template-count-h1">' . $categories['category'][$oxisection]['title'] . '</h1>
                                <div class="oxi-el-template-count-data">' . $i++ . ' Templates in this blocks category.</div>
                            </div>
                        </div>
                        
                        <div class="oxi-el-template-data">
                            ' . $tempdata . '
                        </div>
                    </div>';
        }
        echo $rtdata;
        die();
    }

}

/*
 * Starts our plugin class, easy!
 */
new SAETemplates_BLocks();
