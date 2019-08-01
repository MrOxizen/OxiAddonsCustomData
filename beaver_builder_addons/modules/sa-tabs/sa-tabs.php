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
            'dir' => FL_MODULE_SA_FLBUILDER_URL . 'modules/sa-tabs',
            'url' => FL_MODULE_SA_FLBUILDER_URL . 'modules/sa-tabs',
            'icon' => 'tabs.svg',
            'editor_export' => true,
            'enabled'       => true,
        ));
    }
}

require_once FL_MODULE_SA_FLBUILDER_URL . 'modules/sa-tabs/tabs-register.php';
