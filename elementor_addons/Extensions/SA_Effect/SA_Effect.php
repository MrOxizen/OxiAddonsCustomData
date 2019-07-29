<?php

namespace SA_ELEMENTOR_ADDONS\Extensions\SA_Content_Protection;

/**
 * Description of SA_Content_Protection
 *
 * @author Jabir
 */
if (!defined('ABSPATH')) {
    exit;
}

use \Elementor\Controls_Manager;
use \Elementor\Frontend;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Scheme_Typography;

class SA_Content_Protection {

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function __construct() {
        add_action('elementor/element/common/_section_style/after_section_end', [$this, 'register_controls'], 10);
        add_action('elementor/widget/render_content', [$this, 'render_content'], 10, 2);
    }

}
