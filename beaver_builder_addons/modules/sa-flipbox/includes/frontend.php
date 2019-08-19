<?php
//echo "<pre>";
//print_r($settings);
//echo "</pre>";
$fronttitletage = $settings->front_side_typography_title_tag;
$backtitletage = $settings->back_side_typography_title_tag;
$titletage = $bctitletage = '';
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
                <?php echo "<$fronttitletage>".$settings->oxi_flip_front_title."</$fronttitletage>" ?>
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
                <?php echo "<$backtitletage>".  $settings->oxi_flip_back_title. "</$backtitletage>"; ?>
            </div>
            <div class="oxi-addons-BB-FL-F-details">
                <?php echo $settings->oxi_flip_back_details; ?>
            </div>
            <?php if ("yes" == $settings->show_button) { ?>
                <div class="oxi__button_wrapper">
                    <?php
                    if ($settings->button->link != '') {
                        ?>
                        <a class="oxi__button" href="<?php echo $settings->button->link; ?>" target="<?php echo $settings->button->link_target; ?>" data-attr="<?php echo $settings->button->secondary_text; ?>">
                            <div class="oxi__button_wrapper"><?php echo $button_position; ?> </div>
                        </a>
                        <?php
                    } else {
                        ?>
                        <button class="oxi__button">
                            <div class="oxi__button_wrapper"><?php echo $button_position; ?> </div>
                        </button>
                        <?php
                    }
                    ?>

                </div>
            <?php } ?>
        </div>
    </div>
</div>
