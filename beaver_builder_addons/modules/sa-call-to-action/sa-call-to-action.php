<?php

class SA_Call_to_Action extends FLBuilderModule
{

    public function __construct()
    {
        parent::__construct(array(
            'name' => __('Call To Action', SA_FLBUILDER_TEXTDOMAIN),
            'description' => __('A totally shortcode addons element', SA_FLBUILDER_TEXTDOMAIN),
            'group' => __('Shortcode Addons', SA_FLBUILDER_TEXTDOMAIN),
            'category' => __('Content Elements', SA_FLBUILDER_TEXTDOMAIN),
            'dir' => FL_MODULE_SA_FLBUILDER_URL . 'modules/sa-call-to-action',
            'url' => FL_MODULE_SA_FLBUILDER_URL . 'modules/sa-call-to-action',
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

require_once FL_MODULE_SA_FLBUILDER_URL . 'modules/sa-call-to-action/call-to-action-register.php';
