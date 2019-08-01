<?php
//echo "<pre>";
//print_r($settings);
//echo "</pre>";
$fronttitletage = $settings->front_side_typography_title_tag;
$titletage = $bctitletage = '';
if ("h1" == $fronttitletage) {
    $titletage = "<h1>" . $settings->oxi_call_front_title . "</h1>";
} elseif ("h2" == $fronttitletage) {
    $titletage = "<h2>" . $settings->oxi_call_front_title . "</h2>";
} elseif ("h3" == $fronttitletage) {
    $titletage = "<h3>" . $settings->oxi_call_front_title . "</h3>";
} elseif ("h4" == $fronttitletage) {
    $titletage = "<h4>" . $settings->oxi_call_front_title . "</h4>";
} elseif ("h5" == $fronttitletage) {
    $titletage = "<h5>" . $settings->oxi_call_front_title . "</h5>";
} elseif ("h6" == $fronttitletage) {
    $titletage = "<h6>" . $settings->oxi_call_front_title . "</h6>";
} elseif ("p" == $fronttitletage) {
    $titletage = "<p>" . $settings->oxi_call_front_title . "</p>";
} elseif ("div" == $fronttitletage) {
    $titletage = "<div>" . $settings->oxi_call_front_title . "</div>";
} else {
    $titletage = "<span>" . $settings->oxi_call_front_title . "</span>";
}




$button_position = $icon = '';

if (isset($settings->button->button_icon) && $settings->button->button_icon != '') {
    $icon = '<i class="oxi__icon-selector ' . $settings->button->button_icon . '"></i>';
}
if ($settings->button->icon_position == 'left') {
    $button_position = '' . $icon . ' <span class="oxi__button-text">' . $settings->button->text . '</span>';
} else {
    $button_position = '<span class="oxi__button-text">' . $settings->button->text . '</span> ' . $icon . ' ';
}
?>
<div class="oxi-addons-BB-callbox">
    <div class="oxi-addons-BB-FL-row">
        <div class="oxi-addons-BB-FL-fontside">
           <?php if('flex_grid' !== $settings->content_style){ ?>
             <div class="oxi-addons-BB-FL-fontside-icon-area">
                <div class="oxi-addons-BB-FL-fontside-icon-inner">
                    <div class="oxi-addons-BB-FL-F-Icon">

                        <i class="<?php echo $settings->oxi_call_to_action_icons->icon; ?> oxi-bb-incons"></i>

                    </div>
                </div>
            </div>
           <?php }?>
            <div class="oxi-addons-BB-FL-F-TT-DS">
                <div class="oxi-addons-BB-FL-F-title">
                    <?php echo $titletage; ?>
                </div>
                <div class="oxi-addons-BB-FL-F-details">
                    <?php echo $settings->oxi_call_front_details; ?>
                </div>
            </div>
            <?php if ("yes" == $settings->show_button) { ?>
                <div class="oxi__button_wrapper">
                    <?php
                    if ($settings->button->link != '') {
                        echo ' <a class="oxi__button" href="' . $settings->button->link . '" target="' . $settings->button->link_target . '" data-attr="' . $settings->button->secondary_text . '">
                                <div class="oxi__button_wrapper_item"> ' . $button_position . ' </div>
                             </a>';
                    } else {
                        echo '<button class="oxi__button">
                            <div class="oxi__button_wrapper_item"> ' . $button_position . ' </div>
                          </button>';
                    }
                    ?>

                </div>
            <?php } ?>
        </div>

    </div>
</div>
