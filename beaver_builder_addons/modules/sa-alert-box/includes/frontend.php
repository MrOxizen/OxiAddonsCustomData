<?php

/**
 * @package shortcode addons
 */

// echo '<pre>';
// print_r($settings);
// echo '</pre>';

$title = $subtitle = $icon = $cross_icon = '';

if ($settings->title != '') {
    $title = '  <h2 class="oxi__addons_title">' . $settings->title . '</h2>';
}
if ($settings->sub_title != '') {
    $subtitle = '<p class="oxi__addons_subtitle">' . $settings->sub_title . '</p>';
}
if ($settings->icon_show == 'show') {
    $icon = '<div class="oxi__addons_icon"><i class="' . $settings->icon . ' oxi__icons"></i></div>';
}
if ($settings->cross_icon == 'true') {
    $cross_icon = '<div class="oxi__addons_cross_icon" id="oxi__cross_' . $id . '"><i class="fas fa-times cross__icons"></i></div>';
}

?>
<div class="oxi__addons_wrapper_main">
    <div class="oxi__addons_alert_wrapper" id="oxi__alert_<?php echo $id ?>">
        <?php echo $icon ?>
        <div class="oxi__addons_title_subtitle">
            <?php echo $title ?>
            <?php echo $subtitle ?>
        </div>
        <?php echo $cross_icon ?>
    </div>
</div>