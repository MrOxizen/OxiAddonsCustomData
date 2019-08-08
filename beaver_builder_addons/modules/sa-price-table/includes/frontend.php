<?php

/**
 * @package shortcode addons
 */

// echo '<pre>';
// print_r($settings);
// echo '</pre>';
$title = $price = $duration  = $button =  '';
/**
 * start coding for button
 */
if ($settings->price_button === 'show'   && $settings->button_text != '') {
    if ($settings->button_link != '') {
        $button = ' <div class="oxi__addons_button_main"> <a href="' . $settings->button_link . '" class="oxi__addons_button" target="' . $settings->button_link_target . '"  ' . SA_FLBUILDER_HELPER::Sa_fl_builder_get_link_rel($settings->button_link_target, $settings->button_link_nofollow, 1) . ' > 
                      ' . $settings->button_text . '
                    </a> </div>';
    } else {
        $button = '<div class="oxi__addons_button_main">
                       <button class="oxi__addons_button">  ' . $settings->button_text . '</button>
                    </div>';
    }
} // end button coding
if ($settings->title != '') {
    $title = '<' . $settings->heading_tag_selection . ' class="oxi__addons_title">' . $settings->title . '</' . $settings->heading_tag_selection . '>';
}
if ($settings->title != '') {
    $price = '<div class="oxi__addons_price">' . $settings->price_value . '</div>';
}
if ($settings->title != '') {
    $duration = ' <div class="oxi__addons_duration">' . $settings->duration . '</div>';
}
?>
<div class="oxi__addons_price_table_wrapper">
    <div class="oxi__addons_price_table_main">
        <div class="oxi__addons_price_table">
            <div class="oxi__addons_main_title_value">
                <?php echo $title;
                if ($settings->box_layout == 'layout02') {
                    echo '<div class="oxi_specer"></div>';
                }
                ?>
                <div class="oxi__addons_price_duration">
                    <div class="oxi__addons_price_main">
                        <?php echo $price; ?>
                        <?php echo $duration; ?>
                    </div>
                </div>
            </div>
            <div class="oxi__addons_feature_main">
                <ul class="oxi__addons_feature_ul">
                    <?php
                    $items = $settings->features;
                    foreach ($items as $key => $value) {
                        $data =  json_decode(json_encode($value), true);
                        echo ' <li class="oxi__addons_feature">' . $data . '</li>';
                    }
                    ?>

                </ul>
            </div>
            <?php echo $button; ?>
        </div>
    </div>
</div>