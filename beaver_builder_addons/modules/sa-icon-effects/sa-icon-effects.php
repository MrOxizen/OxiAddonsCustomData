<?php

class Icon_effects extends FLBuilderModule
{

    public function __construct()
    {
        parent::__construct(array(
            'name' => __('Icon Effect', SA_FLBUILDER_TEXTDOMAIN),
            'description' => __('A totally shortcode addons element', SA_FLBUILDER_TEXTDOMAIN),
            'group' => __('Shortcode Addons', SA_FLBUILDER_TEXTDOMAIN),
            'category' => __('Content Elements', SA_FLBUILDER_TEXTDOMAIN),
            'dir' => FL_MODULE_SA_FLBUILDER_URL . 'modules/sa-icon-effects',
            'url' => FL_MODULE_SA_FLBUILDER_URL . 'modules/sa-icon-effects',
            'icon' => 'icon_effects.svg',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled' => true, // Defaults to true and can be omitted.
            'partial_refresh' => false, // Defaults to false and can be omitted.
        ));
    }
}

require_once FL_MODULE_SA_FLBUILDER_URL . 'modules/sa-icon-effects/icon-effects-register.php';
