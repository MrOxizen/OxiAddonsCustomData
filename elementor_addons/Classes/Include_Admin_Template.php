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

    /**
     * Remove files in dir
     *
     * @since 3.0.0
     */
    public function empty_dir($path) {
        if (!is_dir($path) || !file_exists($path)) {
            return;
        }

        foreach (scandir($path) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }

            unlink($this->safe_path($path . DIRECTORY_SEPARATOR . $item));
        }
    }

    public function View_Data() {

        $registered_element = $element = $array1 = array('Extension' => array());

        $registered_el = $this->registered_elements;
        foreach ($registered_el as $key => $value) {
            $array1[$value['category']] = $value['category'];
            $element[$value['category']][$key] = array('name' => $key, 'Premium' => $value['Premium'], 'condition' => $value['condition'], 'API' => $value['API']);
        }
        $array2 = array(
            'Content Elements' => 'Content Elements',
            'Creative Elements' => 'Creative Elements',
            'Marketing Elements' => 'Marketing Elements',
            'Carousel & Slider' => 'Carousel & Slider',
            'Social Elements' => 'Social Elements',
            'Form Contents' => 'Form Contents',
            'Extension' => 'Extension');
        $margecat = array_merge($array2, $array1);
        foreach ($margecat as $value) {
            (array_key_exists($value, $element) ? $registered_element[$value] = $element[$value] : '');
        }
        ?>

        <div class="oxi-addons-wrapper">
            <div class="oxi-addons-row">
                <form action="" method="POST" id="sa-el-settings">
                    <div class="oxi-addons-wrapper">
                        <div class="sa-el-header-wrap">
                            <div class="sa-el-header-left">
                                <div class="sa-el-admin-logo-inline">
                                    <img src="<?php echo WP_PLUGIN_URL . '/shortcode-addons/image/shortcode-addons.png'; ?>">
                                </div>
                                <h2 class="title">Elementor Elements Settings</h2>
                            </div>
                            <div class="sa-el-header-right">
                                <button type="submit" class="button sa-el-btn sa-el-settings-save" sa-el-change="no" style="cursor: not-allowed" disabled="disabled">Save settings</button>
                            </div>
                        </div>
                    </div>

                    <div class="ctu-ultimate-wrapper ctu-ultimate-wrapper-2">
                        <div class="ctu-ulimate-style-2">
                            <div class="vc-tabs-li vc-tabs-li-2-id-4" ref="#tabs-general">
                                General
                            </div>
                            <div class="vc-tabs-li vc-tabs-li-2-id-5" ref="#tabs-elements">
                                Elements
                            </div>
                            <div class="vc-tabs-li vc-tabs-li-2-id-4" ref="#tabs-extention">
                                Extension
                            </div>
                            <div class="vc-tabs-li vc-tabs-li-2-id-5" ref="#tabs-cache">
                                Cache
                            </div>
                        </div>
                        <div class="ctu-ultimate-style-2-content"> 
                            <div class="ctu-ulitate-style-2-tabs" id="tabs-general">
                                <div class="about-wrap text-center">
                                    <h1>Welcome to Elementor Extension</h1>
                                    <div class="about-text">
                                        Thank you for Installing Elementor Extention, The most friendly Elementor addons or all in one Package for Elementor. Here's how to get started.
                                    </div>
                                </div>
                                <div class="feature-section">
                                    <div class="about-container">
                                        <div class="about-addons-videos"><iframe src="//www.youtube.com/embed/Ovvqi7iZJ-s" frameborder="0" allowfullscreen class="about-video"></iframe></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="sa-el-admin-wrapper">


                                            <div class="sa-el-admin-block">
                                                <div class="sa-el-admin-header">
                                                    <div class="sa-el-admin-header-icon">
                                                        <span class="dashicons dashicons-format-aside"></span>
                                                    </div>    
                                                    <h4 class="sa-el-admin-header-title">Documentation</h4>  
                                                </div>
                                                <div class="sa-el-admin-block-content">
                                                    <p>Get started by spending some time with the documentation to get familiar with Shortcode Addons. Build awesome websites for you or your clients with ease.</p>
                                                    <a href="https://www.shortcode-addons.com/docs/elementor-extension/" class="sa-el-button" target="_blank">Documentation</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-lg-6 col-md-12">
                                        <div class="sa-el-admin-wrapper">
                                            <div class="sa-el-admin-block">
                                                <div class="sa-el-admin-header">
                                                    <div class="sa-el-admin-header-icon">
                                                        <span class="dashicons dashicons-format-aside"></span>
                                                    </div>    
                                                    <h4 class="sa-el-admin-header-title">Contribute to Shortcode Addons</h4>  
                                                </div>
                                                <div class="sa-el-admin-block-content">
                                                    <p>You can contribute to make Shortcode Addons better reporting bugs & creating issues. Our Development team always try to make more powerfull addons day by day with solved Issues</p>
                                                    <a href="https://wordpress.org/support/plugin/shortcode-addons/" class="sa-el-button" target="_blank">Report a bug</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-lg-6 col-md-12">
                                        <div class="sa-el-admin-wrapper">
                                            <div class="sa-el-admin-block">
                                                <div class="sa-el-admin-header">
                                                    <div class="sa-el-admin-header-icon">
                                                        <span class="dashicons dashicons-format-aside"></span>
                                                    </div>    
                                                    <h4 class="sa-el-admin-header-title">Video Tutorials </h4>  
                                                </div>
                                                <div class="sa-el-admin-block-content">
                                                    <p>Unable to use Shortcode Addons Elementor Extention? Don't worry you can check your web tutorials to make easier to use :) </p>
                                                    <a href="https://www.shortcode-addons.com/docs/elementor-extension/" class="sa-el-button" target="_blank">Video Tutorials</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                </div>   
                            </div> 
                            <div class="ctu-ulitate-style-2-tabs" id="tabs-elements">
                                <div class="oxi-addons-wrapper">
                                    <div class="oxi-addons-import-layouts">
                                        <h1>GLOBAL CONTROL</h1>
                                        <p> Use the Buttons to Activate or Deactivate all the Elements of Essential Addons at once.</p>
                                    </div>
                                    <div class="sa-el-btn-group">
                                        <button type="button" class="sa-el-btn sa-el-btn-control-enable">Enable All</button>
                                        <button type="button" class="sa-el-btn sa-el-btn-control-disable">Disable All</button>
                                    </div>
                                </div>
                                <div class="oxi-addons-wrapper">
                                    <div class="oxi-addons-row">

                                        <?php
                                        $settings = $this->Get_Active_Elements();

                                        foreach ($registered_element as $key => $value) {
                                            if ($key != 'Extension') {
                                                echo '<div class="oxi-sa-cards-wrapper">';
                                                echo '<div class="oxi-addons-ce-heading">' . oxi_addons_shortcode_name_converter($key) . '</div>';
                                                echo '<div class="row">';
                                                foreach ($value as $elements) {
                                                    echo '  <div class="col-lg-4 col-md-6 col-sm-12">
                                                                <div class="oxi-sa-cards">
                                                                    ' . (($elements['Premium'] == TRUE && apply_filters('sa-addons/pro/sa-addons', '') == FALSE) ? '<sup class="pro-label">Pro</sup>' : "") . '
                                                                    <div class="oxi-sa-cards-h1">
                                                                        ' . oxi_addons_shortcode_name_converter($elements['name']) . '
                                                                    </div>
                                                                    <div class="oxi-sa-cards-switcher ' . (($elements['Premium'] == TRUE && apply_filters('sa-addons/pro/sa-addons', '') == FALSE) ? 'oxi-sa-cards-switcher-disabled' : "") . '">
                                                                        <input type="checkbox" class="oxi-addons-switcher-btn" sa-elmentor="' . $elements['name'] . '" id="' . $elements['name'] . '" name="' . $elements['name'] . '" ' . (array_key_exists($elements['name'], $settings) ? 'checked="checked"' : '') . ' >
                                                                        <label for="' . $elements['name'] . '" class="oxi-addons-switcher-label"></label>
                                                                    </div>
                                                                </div>
                                                            </div>';
                                                }
                                                echo '</div></div>';
                                            }
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                            <div class="ctu-ulitate-style-2-tabs" id="tabs-extention">
                                <div class="oxi-addons-wrapper">
                                    <div class="oxi-addons-row">
                                        <?php
                                        $settings = $this->Get_Active_Elements();

                                        foreach ($registered_element as $key => $value) {
                                            if ($key == 'Extension') {
                                                echo '<div class="oxi-sa-cards-wrapper">';
                                                echo '<div class="oxi-addons-ce-heading">' . oxi_addons_shortcode_name_converter($key) . '</div>';
                                                echo '<div class="row">';
                                                foreach ($value as $elements) {
                                                    echo '  <div class="col-lg-4 col-md-6 col-sm-12">
                                                                <div class="oxi-sa-cards">
                                                                    ' . (($elements['Premium'] == TRUE && apply_filters('sa-addons/pro/sa-addons', '') == FALSE) ? '<sup class="pro-label">Pro</sup>' : "") . '
                                                                    <div class="oxi-sa-cards-h1">
                                                                        ' . oxi_addons_shortcode_name_converter($elements['name']) . '
                                                                    </div>
                                                                    <div class="oxi-sa-cards-switcher ' . (($elements['Premium'] == TRUE && apply_filters('sa-addons/pro/sa-addons', '') == FALSE) ? 'oxi-sa-cards-switcher-disabled' : "") . '">
                                                                        <input type="checkbox" class="oxi-addons-switcher-btn" sa-elmentor="' . $elements['name'] . '" id="' . $elements['name'] . '" name="' . $elements['name'] . '" ' . (array_key_exists($elements['name'], $settings) ? 'checked="checked"' : '') . ' >
                                                                        <label for="' . $elements['name'] . '" class="oxi-addons-switcher-label"></label>
                                                                    </div>
                                                                </div>
                                                            </div>';
                                                }
                                                echo '</div></div>';
                                            }
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                            <div class="ctu-ulitate-style-2-tabs" id="tabs-cache">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="sa-el-admin-wrapper">
                                            <div class="sa-el-admin-block">
                                                <div class="sa-el-admin-header tabs-cache">
                                                    <div class="sa-el-admin-header-icon">
                                                        <span class="dashicons dashicons-format-aside"></span>
                                                    </div>    
                                                    <h4 class="sa-el-admin-header-title">Clear Cache</h4>  
                                                </div>
                                                <div class="sa-el-admin-block-content">
                                                    <p>Shortcode Addons Elementor Elements styles & scripts are saved in Uploads folder. This option will clear all those cached files.</p>
                                                    <a href="#" class="sa-el-button sa-el-button-clear-cache">Clear Cache</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                </div>   
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="OXIAADDONSCHANGEDPOPUP" class="modal fade">
            <div class="modal-dialog modal-confirm  bounceIn ">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="icon-box">

                        </div>
                    </div>
                    <div class="modal-body text-center">
                        <h4></h4>	
                        <p></p>
                    </div>
                </div>
            </div>
        </div>  
        <?php
    }

    public function sa_elementor_save_settings() {
        check_ajax_referer('sa-elemetor', 'security');
        $satype = sanitize_text_field($_POST['satype']);
        if ($satype == 'elements') {
            $elements = sanitize_text_field($_POST['elements']);
            update_option('shortcode-addons-elementor', $elements);
            $this->empty_dir(SA_ELEMENTOR_ADDONS_ASSETS);
            die();
        } else if ($satype == 'cache') {
            // clear cache files
            $this->empty_dir(SA_ELEMENTOR_ADDONS_ASSETS);
            return wp_send_json(true);
            die();
        }
    }

}
