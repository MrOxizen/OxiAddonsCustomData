<?php

namespace SA_ELEMENTOR_ADDONS;

if (!defined('ABSPATH')) {
    exit;
}



/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of elementor_addons
 *
 * @author biplob
 */
define('SA_ELEMENTOR_ADDONS_URL', OxiAddonsCustomData . 'elementor_addons/');
define('SA_ELEMENTOR_ADDONS_ASSETS', OxiAddonsCustomData . 'elementor_addons/cache/');
define('SA_ELEMENTOR_TEXTDOMAIN', 'sa-el-addons');

require_once SA_ELEMENTOR_ADDONS_URL . 'autoloader.php';

final class SA_ELEMENTOR_ADDONS
{

    /**
     * Minimum Elementor Version
     *
     * @since 1.2.0
     * @var string Minimum Elementor version required to run the plugin.
     */
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

    /**
     * Minimum PHP Version
     *
     * @since 1.2.0
     * @var string Minimum PHP version required to run the plugin.
     */
    const MINIMUM_PHP_VERSION = '7.0';

    /**
     * Constructor
     *
     * @since 1.6.0
     * @access public
     */
    public function __construct()
    {
        // before init hook
        do_action('sa-el-addons/before_init');
        // Load translation
        add_action('init', array($this, 'i18n'));
        add_filter(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', array($this, 'Pro_Enable'));
        // Init Plugin
        add_action('plugins_loaded', array($this, 'init'));
    }

    /**
     * Load Textdomain
     *
     * Load plugin localization files.
     * Fired by `init` action hook.
     *
     * @since 1.6.0
     * @access public
     */
    public function i18n()
    {
        load_plugin_textdomain('sa-el-addons');
    }

    /**
     * Initialize the plugin
     *
     * Validates that Elementor is already loaded.
     * Checks for basic plugin requirements, if one check fail don't continue,
     * if all check have passed include the plugin class.
     *
     * Fired by `plugins_loaded` action hook.
     *
     * @since 1.2.0
     * @access public
     */
    public function init()
    {


        // Check if Elementor installed and activated
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', array($this, 'admin_notice_missing_main_plugin'));
            return;
        }

        // Check for required Elementor version
        if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
            add_action('admin_notices', array($this, 'admin_notice_minimum_elementor_version'));
            return;
        }

        // Check for required PHP version
        if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
            add_action('admin_notices', array($this, 'admin_notice_minimum_php_version'));
            return;
        }
        \SA_ELEMENTOR_ADDONS\Classes\Bootstrap::instance();
        // Once we get here, We have passed all validation checks so we can safely include our plugin
    }

    public function admin_notice_missing_main_plugin()
    {
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

            $message = '<p><strong>' . __('Shortcode Addons Elementor Extention', SA_ELEMENTOR_TEXTDOMAIN) . '</strong>' . __(' widgets not working because you need to activate the Elementor plugin.', SA_ELEMENTOR_TEXTDOMAIN) . '</p>';
            $message .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $activation_url, __('Activate Elementor Now', SA_ELEMENTOR_TEXTDOMAIN)) . '</p>';
        } else {
            if (!current_user_can('install_plugins')) {
                return;
            }

            $install_url = wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=elementor'), 'install_elemntor');

            $message = '<p><strong>' . __('Shortcode Addons Elementor Extention', SA_ELEMENTOR_TEXTDOMAIN) . '</strong>' . __(' widgets not working because you need to install the Elemenor plugin', SA_ELEMENTOR_TEXTDOMAIN) . '</p>';
            $message .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $install_url, __('Install Elementor Now', SA_ELEMENTOR_TEXTDOMAIN)) . '</p>';
        }

        echo '<div class="error"><p>' . $message . '</p></div>';
    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required Elementor version.
     *
     * @since 1.0.0
     * @access public
     */
    public function admin_notice_minimum_elementor_version()
    {
        if (!current_user_can('update_plugins')) {
            return;
        }

        $file_path = 'elementor/elementor.php';

        $upgrade_link = wp_nonce_url(self_admin_url('update.php?action=upgrade-plugin&plugin=') . $file_path, 'upgrade-plugin_' . $file_path);
        $message = '<p><strong>' . __('Shortcode Addons Elementor Extention', SA_ELEMENTOR_TEXTDOMAIN) . '</strong>' . __(' widgets not working because you are using an old version of Elementor.', SA_ELEMENTOR_TEXTDOMAIN) . '</p>';
        $message .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $upgrade_link, __('Update Elementor Now', SA_ELEMENTOR_TEXTDOMAIN)) . '</p>';
        echo '<div class="error">' . $message . '</div>';
    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required PHP version.
     *
     * @since 1.0.0
     * @access public
     */
    public function admin_notice_minimum_php_version()
    {
        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-hello-world'),
            '<strong>' . esc_html__('Shortcode Addons Elementor Extention', SA_ELEMENTOR_TEXTDOMAIN) . '</strong>',
            '<strong>' . esc_html__('PHP', SA_ELEMENTOR_TEXTDOMAIN) . '</strong>',
            self::MINIMUM_PHP_VERSION
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    function Pro_Enable($data = array('', '', FALSE))
    {
        /**
         * Admin notice
         *  $data[0] = DATA, $data[1] = TYPE & $data[2] = Boolean;
         * Be Careful about data rendering, While $data is array or String & $type is data type as blank or string.
         * Data type String will return string data and Blank will return True False
         * $boolean will define Pro or Free Version while True is PREMIUM & False is FREE;
         * 
         * @since 1.0.1
         * @access public
         */
        $valids = get_option('oxi_addons_license_status');
      
        if ($data[1] != '') {
            if ($data[2] == TRUE) {
                if ($valids == 'valid') {
                    return $data[0];
                } else {
                    return '';
                }
            } else {
                if ($valids == 'valid') {
                    return '';
                } else {
                    return $data[0];
                }
            }
        } else {
            if ($data[2] == TRUE) {
                if ($valids == 'valid') {
                    return TRUE;
                } else {
                    return FALSE;
                }
            } else {
                if ($valids == 'valid') {
                    return FALSE;
                } else {
                    return TRUE;
                }
            }
        }
    }
}

new SA_ELEMENTOR_ADDONS;
