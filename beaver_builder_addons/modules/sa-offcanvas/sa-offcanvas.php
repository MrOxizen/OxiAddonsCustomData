<?php

class SA_OffCanvas extends FLBuilderModule {

    public function __construct() {
        parent::__construct(array(
            'name' => __('OffCanvas', SA_FLBUILDER_TEXTDOMAIN),
            'description' => __('A totally shortcode addons element', SA_FLBUILDER_TEXTDOMAIN),
            'group' => __('Shortcode Addons', SA_FLBUILDER_TEXTDOMAIN),
            'category' => __('Content Elements', SA_FLBUILDER_TEXTDOMAIN),
            'dir' => FL_MODULE_SA_FLBUILDER_URL . 'modules/sa-offcanvas',
            'url' => FL_MODULE_SA_FLBUILDER_URL . 'modules/sa-offcanvas',
            'icon' => 'button.svg',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled' => true, // Defaults to true and can be omitted.
            'partial_refresh' => false, // Defaults to false and can be omitted.
        ));

        //        /* Use these methods to enqueue css and js already
        //         * registered or to register and enqueue your own.
        //         */
        //        // Already registered
        //        $this->add_css('font-awesome');
        //        $this->add_js('jquery-bxslider');
        //        // Register and enqueue your own
        //      $this->add_css("offcanvas_css", content_url('uploads/OxiAddonsCustomData/beaver_builder_addons/modules/sa-offcanvas/css/js-offcanvas.css', __FILE__));
        //     $this->add_js("offcanvas_js", content_url('uploads/OxiAddonsCustomData/beaver_builder_addons/modules/sa-offcanvas/js/js-offcanvas.pkgd.js', __FILE__), 'jquery', '', true);
        //      $this->add_js("offcanvas_js", FL_MODULE_SA_FLBUILDER_URL . 'modules//js/js-offcanvas.pkgd.js', array(), '', true);
    }

}

require_once FL_MODULE_SA_FLBUILDER_URL . 'modules/sa-offcanvas/offcanvas-register.php';
