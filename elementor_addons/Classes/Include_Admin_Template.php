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
                'example',
                'testimonial',
                'flip_box',
                'info_box',
                'dual_color_heading',
                'tooltip',
                'advanced_accordion',
                'advanced_tabs',
                'feature_list',
                'offcanvas',
                'advanced_menu_PRO',
                'toggle_PRO',
                'testimonial_Slider_PRO',
                'static_product_PRO',
                'team_member_carousel',
            ),
            'Dynamic Content Elements' => array(
                'Post_Grid',
                'Post_Timeline',
                'Data_Table',
                'Content_Ticker',
                'Product_Grid',
                'Advanced_Google_Map ',
                'Post_Block',
                'Post_Carousel',
                'Smart Post_List',
                'Woo_Product_Collections',
                'Content_Timeline',
                'Dynamic_Gallery',
            ),
            'Creative Elements' => array(
                'Count_Down',
                'Fancy_Text',
                'Filterable_Gallery',
                'Progress_Bar',
                'Interactive_Promo',
                'Counter',
                'Lightbox_and_Modal',
                'Protected_Content',
                'Image_Comparison',
                'Flip_Carousel',
                'Logo_Carousel',
                'Interactive_Cards',
                'Image_Accordion',
                'One_Page_Navigation',
                'Image_Hotspots',
                'Divider',
                'Image_Scroller',
            ),
            'Marketing Elements' => array(
                'Call_To_Action',
                'Pricing_Table',
                'Price_menu',
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
