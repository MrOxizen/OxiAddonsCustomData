<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SA_ELEMENTOR_ADDONS\Classes;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Description of Include_Admin_Template
 *
 * @author biplo
 */
trait Include_Admin_Template {

    public function View_Data() {

        $elementor = array(
            'Content Elements' => array(
                'accordion',
                'button',
                'call_to_action',
                'tabs',
                'divider',
                'counter',
                'count_down',              
                'dual_color_heading',
                'fancy_text',
                'feature_list',
                'filterable_gallery',
                'advanced_heading',
                'flip_box',
                'flip_carousel',
                'image_accordion',
                'image_hotspots',
                'image_scroller',
                'image_comparison',
                'info_box',
                'interactive_card',
                'interactive_promo',
                'lightbox_and_modal',
                'logo_carousel',
                'offcanvas',
                'tooltip',
                'price_menu',
                'pricing_table',
                'progress_bar',
                'protected_content',         
                'single_product',      
                'team_member_carousel',
                'team_member',
                'testimonial_slider',
                'testimonial',
                'toggle',
                'card',
                'justified_gallery'
            ),
            'Dynamic Content Elements' => array(
                
            ),
            'Creative Elements' => array(
               
            ),
            'Marketing Elements' => array(
               
            )
        );
        ?>
        <div class="oxi-addons-wrapper">
            <div class="oxi-addons-import-layouts">
                <h1>GLOBAL CONTROL</h1>
                <p> Use the Buttons to Activate or Deactivate all the Elements of Essential Addons at once.</p>
            </div>
        </div>
        <div class="oxi-addons-wrapper">
            <div class="oxi-addons-row">
                <form action="" method="POST" id="sa-el-settings">
                    <?php
                    $settings = $this->Get_Active_Elements();
                    foreach ($elementor as $key => $value) {
                        echo '<div class="oxi-sa-cards-wrapper">';
                        echo '<div class="oxi-addons-ce-heading">' . oxi_addons_shortcode_name_converter($key) . '</div>';
                        echo '<div class="row">';
                        foreach ($value as $elements) {
                            echo '  <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="oxi-sa-cards">
                                <div class="oxi-sa-cards-h1">
                                    ' . oxi_addons_shortcode_name_converter($elements) . '
                                </div>
                                <div class="oxi-sa-cards-switcher">
                                    <input type="checkbox" class="oxi-addons-switcher-btn" sa-elmentor="' . $elements . '" id="' . $elements . '" name="' . $elements . '" ' . (array_key_exists($elements, $settings) ? 'checked="checked"' : '') . '>
                                    <label for="' . $elements . '" class="oxi-addons-switcher-label"></label>
                                </div>
                            </div>
                        </div>';
                        }
                        echo '</div></div>';
                    }
                    ?>
                </form>
            </div>
        </div>
        <?php
    }

    public function sa_elementor_save_settings() {
        check_ajax_referer('sa-elemetor', 'security');
        $elements = sanitize_text_field($_POST['elements']);
        update_option('shortcode-addons-elementor', $elements);
        $output = get_option('shortcode-addons-elementor');
        parse_str($elements, $element);
        $this->generate_scripts(array_keys($element));
        echo $output;
        die();
    }

}
