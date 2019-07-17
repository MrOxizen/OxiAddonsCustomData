 <?php
    if (!defined('ABSPATH')) {
        exit;
    }


    class SA_fl_builder_init
    {
        /**
         *  Constructor
         */
        public function __construct()
        {
            if (class_exists('FLBuilder')) {
                $this->include_files();
                self::includes();
            }
        }
        /**
         * Load files
         */
        public function include_files()
        {
            if (!class_exists('FLBuilder')) {
                return;
            }
        }
        /**
         * Function that includes necessary files
         * 
         */
        public static function includes()
        {
            require_once FL_MODULE_SA_FLBUILDER_URL . 'classes/class-sa-flbuilder-admin.php';
            require_once FL_MODULE_SA_FLBUILDER_URL . 'classes/class-sa-flbuilder-loader.php';
            require_once FL_MODULE_SA_FLBUILDER_URL . 'classes/class-sa-flbuilder-helper.php';
        }
    }
