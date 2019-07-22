<?php

/**
 * for Button and icon 
 */
$button_position =  $icon = '';

if (isset($settings->button_icon) && $settings->button_icon != '') {
    $icon = '<i class="oxi__icon-selector ' . $settings->button_icon . '"></i>';
}
if ($settings->icon_position == 'left') {
    $button_position = '' . $icon . ' <span class="oxi__button-text">' . $settings->text . '</span>';
} else {
    $button_position = '<span class="oxi__button-text">' . $settings->text . '</span> ' . $icon . ' ';
}
?>
<div class="oxi__button_wrapper">
    <?php
    if ($settings->link != '') {
        echo ' <a class="oxi__button" href="' . $settings->link . '" target="' . $settings->link_target . '" data-attr="' . $settings->secondary_text . '">
        <div class="oxi__button_wrapper"> ' . $button_position . ' </div>
    </a>';
    } else {
        echo '<button class="oxi__button">
               <div class="oxi__button_wrapper"> ' . $button_position . ' </div>
        </button>';
    }
    ?>

</div>