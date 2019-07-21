<?php

echo '<pre>';
print_r($settings);
echo '</pre>';
/**
 * for Button and icon 
 */
$button_position =  $icon = '';
if (isset($settings->icon) && $settings->icon != '') {
    $icon = '<i class="oxi__icon-selector ' . $settings->icon . '"></i>';
}
if ($settings->icon_position == 'left') {
    $button_position = '' . $icon . ' <span class="oxi__button-text">' . $settings->text . '</span>';
} else {
    $button_position = '<span class="oxi__button-text">' . $settings->text . '</span> ' . $icon . ' ';
}
?>
<div class="oxi__button_wrapper">
    <a class="oxi__button" href="<?php echo $settings->link; ?>" target="<?php echo $settings->link_target; ?>">
        <?php echo $button_position; ?>
    </a>
</div>