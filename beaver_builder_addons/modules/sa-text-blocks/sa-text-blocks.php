<?php

class Text_blocks extends FLBuilderModule
{

    public function __construct()
    {
        parent::__construct(array(
            'name' => __('Text Blocks', SA_FLBUILDER_TEXTDOMAIN),
            'description' => __('A totally shortcode addons element', SA_FLBUILDER_TEXTDOMAIN),
            'group' => __('Shortcode Addons', SA_FLBUILDER_TEXTDOMAIN),
            'category' => __('Content Elements', SA_FLBUILDER_TEXTDOMAIN),
            'dir' => FL_MODULE_SA_FLBUILDER_URL . 'modules/sa-text-blocks',
            'url' => FL_MODULE_SA_FLBUILDER_URL . 'modules/sa-text-blocks',
            'icon' => 'button.svg',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled' => true, // Defaults to true and can be omitted.
            'partial_refresh' => false, // Defaults to false and can be omitted.
        ));
    }
}

require_once FL_MODULE_SA_FLBUILDER_URL . 'modules/sa-text-blocks/text-blocks-register.php';
