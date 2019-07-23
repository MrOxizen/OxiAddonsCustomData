<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Image_Comparison;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Description of Image Comparison
 *
 * @author biplo
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

class Image_Comparison extends Widget_Base {

    use \SA_ELEMENTOR_ADDONS\Helper\Public_Helper;

    public function get_name() {
        return 'sa_el_img_comparison';
    }

    public function get_title() {
        return esc_html__('Image Comparison', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon() {
        return 'eicon-image-before-after';
    }

    public function get_categories() {
        return ['sa-el-addons'];
    }

}
        