<?php

/**
 * A class that handles loading custom modules and custom
 * fields if the builder is installed and activated.
 */
class SA_FLBUILDER_LOADER
{

    /**
     * Initializes the class once all plugins have loaded.
     */
    static public function init()
    {
        add_action('plugins_loaded', __CLASS__ . '::setup_hooks');
    }

    /**
     * Setup hooks if the builder is installed and activated.
     */
    static public function setup_hooks()
    {
        if (!class_exists('FLBuilder')) {
            return;
        }

        // Load custom modules.
        add_action('init', __CLASS__ . '::load_modules');
    }

    /**
     * Loads our custom modules.
     */
    static public function load_modules()
    {
        $installed = get_option('shortcode-addons-flbuilder');
        parse_str($installed, $settings);
        foreach ($settings as $key => $value) {
            require_once FL_MODULE_SA_FLBUILDER_URL . 'modules/' . $key . '/' . $key . '.php';
        }
    }
}

SA_FLBUILDER_LOADER::init();
