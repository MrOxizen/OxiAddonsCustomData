<?php

class Progress extends FLBuilderModule
{
    public function __construct()
    {
        parent::__construct(array(
            'name' => __('Progress Bar', SA_FLBUILDER_TEXTDOMAIN),
            'description' => __('A totally shortcode addons element', SA_FLBUILDER_TEXTDOMAIN),
            'group' => __('Shortcode Addons', SA_FLBUILDER_TEXTDOMAIN),
            'category' => __('Content Elements', SA_FLBUILDER_TEXTDOMAIN),
            'dir' => FL_MODULE_SA_FLBUILDER_URL . 'modules/sa-progress-bar',
            'url' => FL_MODULE_SA_FLBUILDER_URL . 'modules/sa-progress-bar',
            'icon' => 'progress.svg',
            'editor_export' => true,
            'enabled'       => true,
        ));
    }
}

require_once FL_MODULE_SA_FLBUILDER_URL . 'modules/sa-progress-bar/progress-bar-register.php';
