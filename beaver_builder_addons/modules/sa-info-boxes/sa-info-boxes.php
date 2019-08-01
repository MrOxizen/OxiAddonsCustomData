<?php

class info_boxes extends FLBuilderModule
{

    public function __construct()
    {
        parent::__construct(array(
            'name' => __('Info Boxes', SA_FLBUILDER_TEXTDOMAIN),
            'description' => __('A totally shortcode addons element', SA_FLBUILDER_TEXTDOMAIN),
            'group' => __('Shortcode Addons', SA_FLBUILDER_TEXTDOMAIN),
            'category' => __('Content Elements', SA_FLBUILDER_TEXTDOMAIN),
            'dir' => FL_MODULE_SA_FLBUILDER_URL . 'modules/sa-info-boxes',
            'url' => FL_MODULE_SA_FLBUILDER_URL . 'modules/sa-info-boxes',
            'icon' => 'info-boxes.svg',
        ));

        //        /* Use these methods to enqueue css and js already
        //         * registered or to register and enqueue your own.
        //         */
        //        // Already registered
        //        $this->add_css('font-awesome');
        //        $this->add_js('jquery-bxslider');
        //        // Register and enqueue your own
        //        $this->add_css('example-lib', $this->url . 'css/example-lib.css');
        //        $this->add_js('example-lib', $this->url . 'js/example-lib.js', array(), '', true);
    }
}

require_once FL_MODULE_SA_FLBUILDER_URL . 'modules/sa-info-boxes/info-boxes-register.php';
