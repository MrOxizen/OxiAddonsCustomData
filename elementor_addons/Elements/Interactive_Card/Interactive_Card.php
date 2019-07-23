<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Interactive_Card;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Description of Interactive Card
 *
 * @author biplop
 * 
 */
use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Group_Control_Background as Group_Control_Background;
use \Elementor\Scheme_Typography as Scheme_Typography;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Utils as Utils;
use \Elementor\Widget_Base as Widget_Base;
use \Elementor\Group_Control_Image_Size;
use \SA_ELEMENTOR_ADDONS\Classes\Bootstrap;

class Interactive_Card extends Widget_Base {

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function get_name() {
        return 'sa_el_interactive_card';
    }

    public function get_title() {
        return esc_html__('Interactive Card', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon() {
        return 'eicon-image-before-after';
    }

    public function get_categories() {
        return ['sa-el-addons'];
    }
   
}
        