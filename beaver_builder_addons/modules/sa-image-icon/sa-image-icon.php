<?php

use SA_FLBUILDER_ADDONS\Classes\Bootstrap;

class OxiImageIconModule extends FLBuilderModule
{

    /**
     * Constructor function that constructs default values for the Flip Box Module
     *
     * @method __construct
     */
    public function __construct()
    {
        parent::__construct(
            array(
                'name' => __('Image Icon', SA_FLBUILDER_TEXTDOMAIN),
                'description' => __('Image Icon', SA_FLBUILDER_TEXTDOMAIN),
                'group' => 'Shortcode Addons',
                'category' => 'Content Elements',
                'dir' => FL_MODULE_SA_FLBUILDER_URL . 'modules/sa-image-icon',
                'url' => FL_MODULE_SA_FLBUILDER_URL . 'modules/sa-image-icon',
                'editor_export' => true, // Defaults to true and can be omitted.
                'enabled' => true, // Defaults to true and can be omitted.
                'icon' => '',
            )
        );
        $this->add_css('font-awesome');
    }
}

require_once FL_MODULE_SA_FLBUILDER_URL . 'modules/sa-image-icon/image_icon_register.php';
