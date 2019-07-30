<?php

class Tabs extends FLBuilderModule
{

    public function __construct()
    {
        parent::__construct(array(
            'name' => __('Tabs', SA_FLBUILDER_TEXTDOMAIN),
            'description' => __('A totally shortcode addons element', SA_FLBUILDER_TEXTDOMAIN),
            'group' => __('Shortcode Addons', SA_FLBUILDER_TEXTDOMAIN),
            'category' => __('Content Elements', SA_FLBUILDER_TEXTDOMAIN),
            'dir' => FL_MODULE_SA_FLBUILDER_URL . 'modules/tabs',
            'url' => FL_MODULE_SA_FLBUILDER_URL . 'modules/tabs',
            'icon' => 'tabs.svg',
        ));

        // Register and enqueue your own
        //    $this->add_css('example-lib', $this->url . 'css/example-lib.css');
        $this->add_js('try', $this->url . 'js/try.js', array(), '', true);
    }
}

require_once FL_MODULE_SA_FLBUILDER_URL . 'modules/tabs/tabs-register.php';
