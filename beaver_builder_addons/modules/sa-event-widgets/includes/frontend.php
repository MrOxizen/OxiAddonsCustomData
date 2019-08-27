<?php
//echo "<pre>";
//print_r($settings);
//echo "</pre>";


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

<div class="oxi-addons-BB-event">
    <div class="oxi-addons-BB-FL-row">
        <div class="oxi-addons-BB-FL-eventwidget-icon-area">
            <div class="oxi-addons-BB-header_image">
                <div class="oxi-addons-BB-header-DM">
                    <h2><?php echo $settings->oxi_date; ?></h2>
                    <p><?php echo $settings->oxi_month; ?></p>
                </div>
            </div>
        </div>
        <div class="oxi-addons-BB-FL-eventwidget">
            <div class="oxi-addons-BB-FL-back-overlay">
                <div class="oxi-addons-BB-FL-F-title">
                    <?php if ('' == $settings->link) { ?>
                        <?php echo "<$backtitletage>" . $settings->oxi_flip_back_title . "</$backtitletage>"; ?>
                    <?php } else { ?>
                        <a class="oxi-back-title" href="<?php echo $settings->link; ?>" target="<?php echo $settings->link_target; ?>" rel="<?php echo $settings->nofollow; ?>" data-attr="<?php echo $settings->secondary_text; ?>">
                            <?php echo "<$backtitletage>" . $settings->oxi_flip_back_title . "</$backtitletage>"; ?>
                        </a>
                    <?php } ?>
                </div>
                <div class="oxi-addons-BB-FL-F-details">
                    <?php echo $settings->oxi_flip_back_details; ?>
                </div>
                <?php if ("yes" == $settings->show_button) { ?>
                    <div class="oxi__button_wrapper">
                        <?php
                        if ('' == $settings->button->link) {
                            ?>
                            <button class="oxi__button">
                                <div class="oxi__button_wrapper"><?php echo $button_position; ?> </div>
                            </button>
                            <?php
                        } else {
                            ?>
                            <a class="oxi__button" href="<?php echo $settings->button->link; ?>" target="<?php echo $settings->button->link_target; ?>" data-attr="<?php echo $settings->button->secondary_text; ?>">
                                <div class="oxi__button_wrapper"><?php echo $button_position; ?> </div>
                            </a>

                            <?php
                        }
                        ?>

                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
