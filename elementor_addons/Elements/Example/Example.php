<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Example;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Description of Example
 *
 * @author biplo
 */
use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Frontend;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Utils as Utils;
use \Elementor\Widget_Base as Widget_Base;
use \SA_ELEMENTOR_ADDONS\Classes\Bootstrap;

class Example extends Widget_Base {

    public function get_name() {
        return 'example-button';
    }

    public function get_title() {
        return esc_html__('Example Button', SA_ELEMENTOR_TEXTDOMAIN);
    }

    public function get_icon() {
        return 'eicon-button';
    }

    public function get_categories() {
        return ['sa-el-addons'];
    }

    protected function _register_controls() {
        
    }

    protected function render() {
       
    }

    protected function content_template() {
        
    }

}
