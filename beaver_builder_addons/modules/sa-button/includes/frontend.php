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
<div class="oxi__button_wrapper_main">
    <?php
    if ($settings->link != '') {
        echo ' <a class="oxi__button" href="' . $settings->link . '" target="' . $settings->link_target . '" data-attr="' . $settings->secondary_text . '"
            ' . SA_FLBUILDER_HELPER::Sa_fl_builder_get_link_rel($settings->link_target, $settings->link_nofollow, 1) . ' 
        >
        <div class="oxi__button_wrapper"> ' . $button_position . ' </div>
    </a>';
    } else {
        echo '<button class="oxi__button">
               <div class="oxi__button_wrapper"> ' . $button_position . ' </div>
        </button>';
    }
    ?>

</div>