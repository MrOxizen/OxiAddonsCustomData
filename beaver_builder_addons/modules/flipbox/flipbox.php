<?php

class OxiFlipBoxModule extends FLBuilderModule {

    /**
     * Constructor function that constructs default values for the Flip Box Module
     *
     * @method __construct
     */
    public function __construct() {
        parent::__construct(
                array(
                    'name' => __('Flip Box', SA_FLBUILDER_TEXTDOMAIN),
                    'description' => __('Flip Box', SA_FLBUILDER_TEXTDOMAIN),
                    'category' => 'flipbox',
                    'group' => 'Shortcode Elements',
                    'editor_export' => true, // Defaults to true and can be omitted.
                    'enabled' => true, // Defaults to true and can be omitted.
                    'icon' => '',
                )
        );
        $this->add_css('font-awesome');
    }

}
require_once FL_MODULE_SA_FLBUILDER_URL . 'modules/flipbox/flipbox-register.php';
