<?php
//echo "<pre>";
//print_r($settings);
//echo "</pre>";
$fronttitletage = $settings->front_side_typography_title_tag;
$backtitletage = $settings->back_side_typography_title_tag;
$titletage = $bctitletage = '';
if ("h1" == $fronttitletage) {
    $titletage = "<h1>" . $settings->oxi_flip_front_title . "</h1>";
} elseif ("h2" == $fronttitletage) {
    $titletage = "<h2>" . $settings->oxi_flip_front_title . "</h2>";
} elseif ("h3" == $fronttitletage) {
    $titletage = "<h3>" . $settings->oxi_flip_front_title . "</h3>";
} elseif ("h4" == $fronttitletage) {
    $titletage = "<h4>" . $settings->oxi_flip_front_title . "</h4>";
} elseif ("h5" == $fronttitletage) {
    $titletage = "<h5>" . $settings->oxi_flip_front_title . "</h5>";
} elseif ("h6" == $fronttitletage) {
    $titletage = "<h6>" . $settings->oxi_flip_front_title . "</h6>";
} elseif ("p" == $fronttitletage) {
    $titletage = "<p>" . $settings->oxi_flip_front_title . "</p>";
} elseif ("div" == $fronttitletage) {
    $titletage = "<div>" . $settings->oxi_flip_front_title . "</div>";
} else {
    $titletage = "<span>" . $settings->oxi_flip_front_title . "</span>";
}

if ("h1" == $backtitletage) {
    $bctitletage = "<h1>" . $settings->oxi_flip_back_title . "</h1>";
} elseif ("h2" == $backtitletage) {
    $bctitletage = "<h2>" . $settings->oxi_flip_back_title . "</h2>";
} elseif ("h3" == $backtitletage) {
    $bctitletage = "<h3>" . $settings->oxi_flip_back_title . "</h3>";
} elseif ("h4" == $backtitletage) {
    $bctitletage = "<h4>" . $settings->oxi_flip_back_title . "</h4>";
} elseif ("h5" == $backtitletage) {
    $bctitletage = "<h5>" . $settings->oxi_flip_back_title . "</h5>";
} elseif ("h6" == $backtitletage) {
    $bctitletage = "<h6>" . $settings->oxi_flip_back_title . "</h6>";
} elseif ("p" == $backtitletage) {
    $bctitletage = "<p>" . $settings->oxi_flip_back_title . "</p>";
} elseif ("div" == $backtitletage) {
    $bctitletage = "<div>" . $settings->oxi_flip_back_title . "</div>";
} else {
    $bctitletage = "<span>" . $settings->oxi_flip_back_title . "</span>";
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
<div class="oxi-addons-BB-flipbox">
    <div class="oxi-addons-BB-FL-row">
        <div class="oxi-addons-BB-FL-fontside">
            <div class="oxi-addons-BB-FL-fontside-icon-area">
                <div class="oxi-addons-BB-FL-fontside-icon-inner">
                    <div class="oxi-addons-BB-FL-F-Icon">

                        <i class="<?php echo $settings->oxi_flip_icons->icon; ?> oxi-bb-incons"></i>

                    </div>
                </div>
            </div>
            <div class="oxi-addons-BB-FL-F-title">
                <?php echo $titletage; ?>
            </div>
            <div class="oxi-addons-BB-FL-F-details">
                <?php echo $settings->oxi_flip_front_details; ?>
            </div>
        </div>
        <div class="oxi-addons-BB-FL-backside">
            <div class="oxi-addons-BB-FL-backside-icon-area">
                <div class="oxi-addons-BB-FL-backside-icon-inner">
                    <div class="oxi-addons-BB-FL-B-Icon">
                        <i class="<?php echo $settings->oxi_flip_back_icons->icon; ?>"></i>
                    </div>
                </div>
            </div>
            <div class="oxi-addons-BB-FL-F-title">
                <?php echo $bctitletage; ?>
            </div>
            <div class="oxi-addons-BB-FL-F-details">
                <?php echo $settings->oxi_flip_back_details; ?>
            </div>
            <?php if("yes" == $settings->show_button){ ?>
            <div class="oxi__button_wrapper">
                <?php
                if ($settings->button->link != '') {
                    echo ' <a class="oxi__button" href="' . $settings->button->link . '" target="' . $settings->button->link_target . '" data-attr="' . $settings->button->secondary_text . '">
                                <div class="oxi__button_wrapper"> ' . $button_position . ' </div>
                             </a>';
                } else {
                    echo '<button class="oxi__button">
                            <div class="oxi__button_wrapper"> ' . $button_position . ' </div>
                          </button>';
                }
                ?>

            </div>
            <?php }?>
        </div>
    </div>
</div>
