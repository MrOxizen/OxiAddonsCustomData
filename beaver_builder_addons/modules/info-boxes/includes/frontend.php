<?php

/**
 * @package shortcode addons
 */

// echo '<pre>';
// print_r($settings);
// echo '</pre>';
$heading = $description  = $button =   '';
//header
$heading = '<' . $settings->title_tag_selection . ' class="oxi__addons_header">
                ' . $settings->info_title . '
            </' . $settings->title_tag_selection . '>';
// description
if ($settings->info_desc != '') {
    $description = '<div class="oxi__addons_details">
                        ' . $settings->info_desc . '
                    </div>';
}
if ($settings->info_link_type === 'cta') {
    if ($settings->btn_link != '') {
        $button = ' <div class="oxi__addons_button_main"> <a href="' . $settings->btn_link . '" class="oxi__addons_button" target="' . $settings->btn_link_target . '"  ' . SA_FLBUILDER_HELPER::Sa_fl_builder_get_link_rel($settings->btn_link_target, $settings->btn_link_nofollow, 1) . ' > 
                      ' . $settings->btn_text . '
                    </a> </div>';
    } else {
        $button = '<div class="oxi__addons_button_main">
                       <button class="oxi__addons_button">  ' . $settings->btn_text . '</button>
                    </div>';
    }
}
$icon_image = '';
if ($settings->image_icon_type == 'icon') {
    $icon_image = '
        <div class="oxi__icon_image_main">
            <div class="oxi__icon_image">
                <i class="oxi__icon ' . $settings->icon_main . '"></i>
            </div>
        </div>
    ';
} elseif ($settings->image_icon_type == 'photo') {
    $image = '';
    if ($settings->photo_source == 'library') {
        if ($settings->photo_main_src != '') {
            $image = '<img class="oxi__addons_image" src="' . $settings->photo_main_src . '" alt="' . $settings->info_title . '-image"/>';
        }
    } else if ($settings->photo_source == 'url') {
        if ($settings->photo_url != '') {
            $image = '<img class="oxi__addons_image" src="' . $settings->photo_url . '" alt="' . $settings->info_title . '-image"/>';
        }
    }
    $icon_image = '
        <div class="oxi__icon_image_main">
            <div class="oxi__icon_image">
             ' . $image . '
            </div>
        </div>
    ';
}
$position = '';
if ($settings->position == 'i_h_d') {
    $position = '
        <div class="oxi__addons_img_heading_desc">
            ' . $icon_image . '
        <div class="oxi__addons_header_desc">' . $heading . ' ' . $description . '</div>
        </div>
    ';
} elseif ($settings->position == 'h_i_d') {
    if ($settings->info_boxes_type == 'img-on-top') {
        $position = '  <div class="oxi__addons_img_heading_desc">
                ' . $heading . '
                <div class="oxi__addons_header_desc">  ' . $icon_image . ' ' . $description . '</div>
        </div>';
    } else {
        $position = '  <div class="oxi__addons_img_heading_desc">
               ' . $icon_image . '
                <div class="oxi__addons_header_desc"> ' . $heading . '  ' . $description . '</div>
        </div>';
    }
} elseif ($settings->position == 'h_d_i') {
    if ($settings->info_boxes_type == 'img-on-right') {
        $position =  '  <div class="oxi__addons_img_heading_desc"> 
                    ' . $icon_image . '
                        <div class="oxi__addons_header_desc">' . $heading . ' ' . $description . '</div>
                    
        </div>';
    } else {
        $position =  '  <div class="oxi__addons_img_heading_desc">  
                        <div class="oxi__addons_header_desc">' . $heading . ' ' . $description . '</div>
                        ' . $icon_image . '
        </div>';
    }
}
?>
<div class="oxi__addons_info_boxes_wrapper">
    <div class="oxi__addons_info_boxes_main">
        <?php echo $position; ?>
        <?php echo $button; ?>
    </div>
</div>