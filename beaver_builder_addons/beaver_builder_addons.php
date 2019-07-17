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
define('SA_FLBUILDER_TEXTDOMAIN', 'SA_FLBuilder');

if (!class_exists('SA_FLBUILDER_ADDONS')) {
    class SA_FLBUILDER_ADDONS
    {
        /**
         * SAETemplates_BLocks constructor.
         *
         * The main plugin actions registered for WordPress
         */
        public function __construct()
        {
            add_action('init', array($this, 'check_dependencies'));
            require_once FL_MODULE_SA_FLBUILDER_URL . 'classes/class-sa-flbuilder-init.php';
            new SA_fl_builder_init();
        }

        /**
         * Check plugin dependencies
         * Check if Elementor plugin is installed
         */
        public function check_dependencies()
        {
            if (!class_exists('FLBuilder')) {
                add_action('admin_notices', array($this, 'widget_fail_load'));
                return;
            } else {
                $admin = new SA_fl_builder_admin();
                add_action('admin_menu', array(&$admin, 'Flbuilder_Menu'));
            }
            $version_required = '2.2';
            if (!version_compare(FL_BUILDER_VERSION, $version_required, '>=')) {
                add_action('admin_notices', array($this, 'update_notice'));
                return;
            }
        }

        /**
         * This notice will appear if Elementor is not installed or activated or both
         */
        public function widget_fail_load()
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

                $message = '<p><strong>' . __('Shortcode Addons Elementor Templates & Blocks', SA_FLBUILDER_TEXTDOMAIN) . '</strong>' . __(' widgets not working because you need to activate the Elementor plugin.', SA_FLBUILDER_TEXTDOMAIN) . '</p>';
                $message .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $activation_url, __('Activate Elementor Now', SA_FLBUILDER_TEXTDOMAIN)) . '</p>';
            } else {
                if (!current_user_can('install_plugins')) {
                    return;
                }

                $install_url = wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=beaver-builder-lite-version'), 'install_beaver_builder_lite_version');

                $message = '<p><strong>' . __('Shortcode Addons Elementor Templates & Blocks', SA_FLBUILDER_TEXTDOMAIN) . '</strong>' . __(' widgets not working because you need to install the Elemenor plugin', SA_FLBUILDER_TEXTDOMAIN) . '</p>';
                $message .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $install_url, __('Install Elementor Now', SA_FLBUILDER_TEXTDOMAIN)) . '</p>';
            }

            echo '<div class="error"><p>' . $message . '</p></div>';
        }

        /**
         * Display admin notice for Elementor update if Elementor version is old
         */
        public function update_notice()
        {
            if (!current_user_can('update_plugins')) {
                return;
            }

            $file_path = 'beaver-builder-lite-version/fl-builder.php';

            $upgrade_link = wp_nonce_url(self_admin_url('update.php?action=upgrade-plugin&plugin=') . $file_path, 'upgrade-plugin_' . $file_path);
            $message = '<p><strong>' . __('Shortcode Addons Elementor Templates & Blocks', SA_FLBUILDER_TEXTDOMAIN) . '</strong>' . __(' widgets not working because you are using an old version of Elementor.', SA_FLBUILDER_TEXTDOMAIN) . '</p>';
            $message .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $upgrade_link, __('Update Elementor Now', SA_FLBUILDER_TEXTDOMAIN)) . '</p>';
            echo '<div class="error">' . $message . '</div>';
        }
    }
}

/*
 * Starts our plugin class, easy!
 */
new SA_FLBUILDER_ADDONS();
