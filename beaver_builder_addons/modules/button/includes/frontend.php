<?php

echo '<pre>';
print_r($settings);
echo '</pre>';

// SA_FLBootstrap::sa_fl_custom_padding_margin('button', $settings, '');

print_r(SA_FLBUILDER_HELPER::get_active_elements());
/**
 * for Button and icon 
 */
$button_position =  $icon = '';
if (isset($settings->icon) && $settings->icon != '') {
    $icon = '<i class="' . $settings->icon . '"></i>';
}
if ($settings->icon_position == 'left') {
    $button_position = '' . $icon . ' ' . $settings->text . '';
} else {
    $button_position = '' . $settings->text . ' ' . $icon . ' ';
}
?>
<div class="oxi__button_wrapper">
    <a class="oxi__button" href="<?php echo $settings->link; ?>" target="<?php echo $settings->link_target; ?>">
        <?php echo $button_position; ?>
    </a>
</div>