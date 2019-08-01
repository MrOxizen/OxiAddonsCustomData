<?php

use SA_FLBUILDER_ADDONS\Classes\Bootstrap;

class OxiFlipBoxModule extends FLBuilderModule
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
                'name' => __('Flip Box', SA_FLBUILDER_TEXTDOMAIN),
                'description' => __('Flip Box', SA_FLBUILDER_TEXTDOMAIN),
                'group' => 'Shortcode Addons',
                'category' => 'Content Elements',
                'dir' => FL_MODULE_SA_FLBUILDER_URL . 'modules/sa-flipbox',
                'url' => FL_MODULE_SA_FLBUILDER_URL . 'modules/sa-flipbox',
                'editor_export' => true, // Defaults to true and can be omitted.
                'enabled' => true, // Defaults to true and can be omitted.
                'icon' => '',
            )
        );
        $this->add_css('font-awesome');
    }
}

require_once FL_MODULE_SA_FLBUILDER_URL . 'modules/sa-flipbox/flipbox-register.php';
