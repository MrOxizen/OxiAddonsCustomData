<?php

declare(strict_types=1);
/**
 * Text Domain: SA_FLBuilder
 *
 * @package Shortcode_Addons/SA_FLBuilder
 *
 * 
 */
if (!defined('ABSPATH')) {
    exit;
}


define('FL_MODULE_SA_FLBUILDER_URL', OxiAddonsCustomData . 'beaver_builder_addons/');
define('SA_FLBUILDER_TEXTDOMAIN', 'sa-flbuilder');
define('SA_FLBUILDER_CONTENT_URL', content_url('uploads/OxiAddonsCustomData/beaver_builder_addons/'));
require_once FL_MODULE_SA_FLBUILDER_URL . 'autoloader.php';
if (!class_exists('SA_FLBUILDER_ADDONS')) {

    class SA_FLBUILDER_ADDONS
    {

        /**
         * Minimum Beaver Builder Version
         *
         * @since 1.0.0
         * @var string Minimum Beaver Builder version required to run the plugin.
         */
        const MINIMUM_FLBUILDER_VERSION = '2.2.0';

        /**
         * Minimum PHP Version
         *
         * @since 1.0.0
         * @var string Minimum PHP version required to run the plugin.
         */
        const MINIMUM_PHP_VERSION = '5.6';

        /**
         * Constructor
         *
         * @since 1.0.0
         * @access public
         */
        public function __construct()
        {
            // before init hook
            do_action('sa-fl-builder/before_init');
            // Load translation
            add_action('init', array($this, 'i18n'));
            add_filter(SA_FLBUILDER_TEXTDOMAIN . '/pro-enable', array($this, 'Pro_Enable'));
            // Init Plugin
            add_action('plugins_loaded', array($this, 'init'));
        }

        /**
         * Load Textdomain
         *
         * Load plugin localization files.
         * Fired by `init` action hook.
         *
         * @since 1.0.0
         * @access public
         */
        public function i18n()
        {
            load_plugin_textdomain('sa-flbuilder');
        }

        /**
         * Initialize the plugin
         *
         * Validates that Beaver Builder is already loaded.
         * Checks for basic plugin requirements, if one check fail don't continue,
         * if all check have passed include the plugin class.
         *
         * Fired by `plugins_loaded` action hook.
         *
         * @since 1.0.0
         * @access public
         */
        public function init()
        {


            // Check if Beaver Builder installed and activated
            if (!class_exists('FLBuilder')) {
                add_action('admin_notices', array($this, 'admin_notice_missing_main_plugin'));
                return;
            }

            // Check for required Beaver Builder version
            if (!version_compare(FL_BUILDER_VERSION, self::MINIMUM_FLBUILDER_VERSION, '>=')) {
                add_action('admin_notices', array($this, 'admin_notice_minimum_version'));
                return;
            }

            // Check for required PHP version
            if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
                add_action('admin_notices', array($this, 'admin_notice_minimum_php_version'));
                return;
            }
            \SA_FLBUILDER_ADDONS\Classes\Bootstrap::instance();
            // Once we get here, We have passed all validation checks so we can safely include our plugin
        }

        public function admin_notice_missing_main_plugin()
        {
            $screen = get_current_screen();
            if (isset($screen->parent_file) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id) {
                return;
            }
            $plugin = 'beaver-builder-lite-version/fl-builder.php';
            $file_path = 'beaver-builder-lite-version/fl-builder.php';
            $installed_plugins = get_plugins();

            if (isset($installed_plugins[$file_path])) { // check if plugin is installed
                if (!current_user_can('activate_plugins')) {
                    return;
                }
                $activation_url = wp_nonce_url('plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin);

                $message = '<p><strong>' . __('Shortcode Addons Beaver Builder Extention', SA_FLBUILDER_TEXTDOMAIN) . '</strong>' . __(' widgets not working because you need to activate the Beaver Builder plugin.', SA_FLBUILDER_TEXTDOMAIN) . '</p>';
                $message .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $activation_url, __('Activate Beaver Builder Now', SA_FLBUILDER_TEXTDOMAIN)) . '</p>';
            } else {
                if (!current_user_can('install_plugins')) {
                    return;
                }

                $install_url = wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=beaver-builder-lite-version'), 'install_beaver-builder-lite-version');

                $message = '<p><strong>' . __('Shortcode Addons Beaver Builder Extention', SA_FLBUILDER_TEXTDOMAIN) . '</strong>' . __(' widgets not working because you need to install the Beaver Builder plugin', SA_FLBUILDER_TEXTDOMAIN) . '</p>';
                $message .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $install_url, __('Install  Beaver Builder Now', SA_FLBUILDER_TEXTDOMAIN)) . '</p>';
            }

            echo '<div class="error"><p>' . $message . '</p></div>';
        }

        /**
         * Admin notice
         *
         * Warning when the site doesn't have a minimum required Beaver Builder version.
         *
         * @since 1.0.0
         * @access public
         */
        public function admin_notice_minimum_version()
        {
            if (!current_user_can('update_plugins')) {
                return;
            }

            $file_path = 'beaver-builder-lite-version/fl-builder.php';

            $upgrade_link = wp_nonce_url(self_admin_url('update.php?action=upgrade-plugin&plugin=') . $file_path, 'upgrade-plugin_' . $file_path);
            $message = '<p><strong>' . __('Shortcode Addons  Beaver Builder Extention', SA_FLBUILDER_TEXTDOMAIN) . '</strong>' . __(' widgets not working because you are using an old version of  Beaver Builder .', SA_FLBUILDER_TEXTDOMAIN) . '</p>';
            $message .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $upgrade_link, __('Update Beaver Builder Now', SA_FLBUILDER_TEXTDOMAIN)) . '</p>';
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
                esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', SA_FLBUILDER_TEXTDOMAIN),
                '<strong>' . esc_html__('Shortcode Addons  Beaver Builder Extention', SA_FLBUILDER_TEXTDOMAIN) . '</strong>',
                '<strong>' . esc_html__('PHP', SA_FLBUILDER_TEXTDOMAIN) . '</strong>',
                self::MINIMUM_PHP_VERSION
            );

            printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
        }

        function Pro_Enable($value)
        {
            $valids = get_option('oxi_addons_license_status');
            if ($valids == 'valid') {
                return '';
            } else {
                return $value;
            }
        }
    }
}

/*
 * Starts our plugin class, easy!
 */
new SA_FLBUILDER_ADDONS();
