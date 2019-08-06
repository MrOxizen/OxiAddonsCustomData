<?php

/**
 * @package shortcode addons
 */

// echo '<pre>';
// print_r($settings);
// echo '</pre>';
$heading = $sub_heading = $description  = $button =  '';

if ($settings->it_long_desc != '') {
    if ($settings->it_link_type != 'complete_link') {
        $description = '<div class="oxi__adons_main_description">
                            <div class="oxi__addons_details">
                                    ' . $settings->it_long_desc . '
                            </div>
                        </div>';
    } else {
        $description = '<div class="oxi__adons_main_description"><a href="' . $settings->it_link . '" class="oxi__addons_details" target="' . $settings->it_link_target . '"  ' . SA_FLBUILDER_HELPER::Sa_fl_builder_get_link_rel($settings->it_link_target, $settings->it_link_nofollow, 1) . ' >  
                            ' . $settings->it_long_desc . ' 
                    </a></div>';
    }
}

//header
$heading = '<' . $settings->heading_tag_selection . ' class="oxi__addons_header">
                ' . $settings->it_title . '
            </' . $settings->heading_tag_selection . '>';
//sub header
$sub_heading = '<' . $settings->sub_heading_tag_selection . ' class="oxi__addons_sub_header">
                ' . $settings->sub_heading . '
            </' . $settings->sub_heading_tag_selection . '>';

// for info table button style

if ($settings->it_link_type === 'cta') {
    if ($settings->it_link != '') {
        $button = ' <div class="oxi__addons_button_main"> <a href="' . $settings->it_link . '" class="oxi__addons_button" target="' . $settings->it_link_target . '"  ' . SA_FLBUILDER_HELPER::Sa_fl_builder_get_link_rel($settings->it_link_target, $settings->it_link_nofollow, 1) . ' > 
                      ' . $settings->button_text . '
                    </a> </div>';
    } else {
        $button = '<div class="oxi__addons_button_main">
                       <button class="oxi__addons_button">  ' . $settings->button_text . '</button>
                    </div>';
    }
}
$icon_image = '';
if ($settings->image_type == 'icon') {
    $icon_image = '
        <div class="oxi__icon_image_main">
            <div class="oxi__icon_image">
                <i class="oxi__icon ' . $settings->icon . '"></i>
            </div>
        </div>
    ';
} elseif ($settings->image_type == 'photo') {
    $image = '';
    if ($settings->photo_source == 'library') {
        if ($settings->photo != '') {
            $image = '<img class="oxi__addons_image" src="' . $settings->photo_src . '" alt="' . $settings->it_title . '-image"/>';
        }
    } else if ($settings->photo_source == 'url') {
        if ($settings->photo_url != '') {
            $image = '<img class="oxi__addons_image" src="' . $settings->photo_url . '" alt="' . $settings->it_title . '-image"/>';
        }
    }
    $icon_image = '
        <div class="oxi__icon_image_main">
            <div class="oxi__addons_image">
             ' . $image . '
            </div>
        </div>
    ';
}
?>
<div class="oxi__addons_info_table_wrapper">
    <div class="oxi__addons_info_table_main">
        <div class="oxi__adons_header_sub_header">
            <?php echo $heading ?>
            <?php echo $sub_heading ?>
            <?php
            if ($settings->box_design == 'design02') {
                echo $icon_image;
            }
            ?>

        </div>
        <?php
        if ($settings->box_design == 'design01' || $settings->box_design == 'design03') {
            echo $icon_image;
        }
        ?>
        <?php echo $description ?>
        <?php echo $button ?>
    </div>
</div>