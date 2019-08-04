<?php

namespace SA_FLBUILDER_ADDONS\Helper;

/**
 * Description of Public_Helper
 * @author biplob
 */
trait Public_Helper {

    public static function get_active_elements() {
        $installed = get_option('shortcode-addons-flbuilder');
        parse_str($installed, $elements);
        
        return $elements;
    }

}
