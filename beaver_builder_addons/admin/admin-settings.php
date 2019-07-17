<?php
if (!defined('ABSPATH')) {
    exit;
}


$flbuilder = array(
    'Content Elements' => array(
        'button',
    ),

);

?>

<div class="oxi-addons-wrapper">
    <div class="oxi-addons-row">
        <form action="" method="POST" id="sa-flbuilder-settings" name="sa-flbuilder-settings">
            <?php
            $installed = get_option('shortcode-addons-flbuilder');
            parse_str($installed, $settings);
            foreach ($flbuilder as $key => $value) {
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
                                    <input type="checkbox" class="oxi-addons-switcher-btn" flbuilder="' . $elements . '" id="' . $elements . '" name="' . $elements . '" ' . (array_key_exists($elements, $settings) ? 'checked="checked"' : '') . '>
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