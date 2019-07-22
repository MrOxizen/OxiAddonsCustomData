<?php

/**
 * @package shortcode addons
 */
// echo '<pre>';
// print_r($settings);
// echo '</pre>';

$heading = $description = '';
if ($settings->heading != '') {
    if ($settings->link == '') {
        $heading = '<div class="oxi__addons_header">
                        ' . $settings->heading . '
                    </div>';
    } else {
        $heading = '<a href="' . $settings->link . '" class="oxi__addons_header" target="' . $settings->link_target . '"  ' . SA_FLBUILDER_HELPER::Sa_fl_builder_get_link_rel($settings->link_target, $settings->link_nofollow, 1) . ' > 
                            ' . $settings->heading . ' 
                    </a>';
    }
}
if ($settings->description != '') {
    $description = '
          <div class="oxi__addons_details">
            ' . $settings->description . '
      </div>
    ';
}
?>
<div class="oxi__addons_heading_wrapper">
    <div class="oxi__addons_main_heading">
        <?php echo $heading; ?>
        <div class="oxi__addons_line"></div>
        <?php echo $description; ?>
    </div>
</div>