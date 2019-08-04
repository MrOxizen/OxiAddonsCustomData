<?php

/**
 * @package shortcode addons
 */

// echo '<pre>';
// print_r($settings);
// echo '</pre>';

$icon_link = '';

if ($settings->info_link_type != 'no') {
    if ($settings->icon_link != '') {
        $icon_link = '<a href="' . $settings->icon_link . '" class="oxi__addons_icon" target="' . $settings->icon_link_target . '"  ' . SA_FLBUILDER_HELPER::Sa_fl_builder_get_link_rel($settings->icon_link_target, $settings->icon_link_nofollow, 1) . ' >
            <i class="fab fa-snapchat-square oxi__icons"></i>
        </a>';
    }
} else {
    $icon_link = '<div class="oxi__addons_icon">
            <i class="fab fa-snapchat-square oxi__icons"></i>
        </div>';
}
?>

<div class="oxi__addons_main_wrapper">
    <div class="oxi__addons_icon_wrapper">
        <?php echo $icon_link; ?>
    </div>
</div>