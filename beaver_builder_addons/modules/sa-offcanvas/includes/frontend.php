<?php
/**
 * @package shortcode addons
 */
//echo '<pre>';
//print_r($settings);
//echo '</pre>';
?>




<?php
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
<div class="oxi_sa_offcanvas_wrapter">
    <main class="c-offcanvas-content-wrap" role="main">
        <div class="o-wrapper">
            <div class="oxi__button_wrapper_main">
                <?php if ($settings->direction_style == 'left') { ?>
                    <div class="Sa-button-left-<?php echo $id; ?>">
                        <button class="oxi__button">
                            <div class="oxi__button_wrapper"><?php echo $button_position ?></div>
                        </button>
                    </div>
                    <div class="oxi-addons-OC-conetent-overlay-<?php echo $id; ?>"></div>
                <?php } else if ($settings->direction_style == 'right') { ?>
                    <div class="Sa-button-right-<?php echo $id; ?>" >
                        <button class="oxi__button">
                            <div class="oxi__button_wrapper"><?php echo $button_position ?></div>
                        </button>
                    </div>
                    <div class="oxi-addons-OC-conetent-overlay-<?php echo $id; ?>"></div>
                <?php } else if ($settings->direction_style == 'top') { ?>
                    <div class="Sa-button-top-<?php echo $id; ?>" >
                        <button class="oxi__button">
                            <div class="oxi__button_wrapper"><?php echo $button_position ?></div>
                        </button>
                    </div>
                    <div class="oxi-addons-OC-conetent-overlay-<?php echo $id; ?>"></div>
                <?php } else { ?>
                    <div class="Sa-button-bottom-<?php echo $id; ?>" >
                        <button class="oxi__button">
                            <div class="oxi__button_wrapper"><?php echo $button_position ?></div>
                        </button>
                    </div>
                    <div class="oxi-addons-OC-conetent-overlay-<?php echo $id; ?>"></div>
                <?php } ?>
            </div>
        </div>
    </main>


    <?php if ($settings->direction_style == 'left') { ?>
        <div class="oxi-offcanvas-left-content-<?php echo $id; ?> oxi_addons_bar_style">
            <?php if ($settings->close_button == 'enable') { ?>
                <i class="<?php echo $settings->offcanvas_close_icon_class; ?> sa-offcanvas-close-<?php echo $id; ?>"></i>
            <?php } ?>
            <div class="oxi_offcanvas_content_area">
                <?php
                foreach ($settings->add_offcanvas_item as $offrander) {
                    echo '<div class="oxi_offcanvas_bar_content">
                            <div class="oxi_offcanvas_bar_title"><' . $settings->tag . '>' . $offrander->offcanvas_title . '</' . $settings->tag . '></div>
                            <div class="oxi_foocanvas_bar_description">' . $offrander->description . '</div>
                        </div>';
                };
                ?>
            </div>
        </div>
    <?php } else if ($settings->direction_style == 'right') { ?>
        <div class="oxi-offcanvas-right-content-<?php echo $id; ?> oxi_addons_bar_style">
            <?php if ($settings->close_button == 'enable') { ?>
                <i class="<?php echo $settings->offcanvas_close_icon_class; ?> sa-offcanvas-close-<?php echo $id; ?>"></i>
            <?php } ?>
            <div class="oxi_offcanvas_content_area">
                <?php
                foreach ($settings->add_offcanvas_item as $offrander) {
                    echo '<div class="oxi_offcanvas_bar_content">
                            <div class="oxi_offcanvas_bar_title"><' . $settings->tag . '>' . $offrander->offcanvas_title . '</' . $settings->tag . '></div>
                            <div class="oxi_foocanvas_bar_description">' . $offrander->description . '</div>
                        </div>';
                };
                ?>
            </div>
        </div>
    <?php } else if ($settings->direction_style == 'top') { ?>
        <div class="oxi-offcanvas-top-content-<?php echo $id; ?> oxi_addons_bar_style">
            <?php if ($settings->close_button == 'enable') { ?>
                <i class="<?php echo $settings->offcanvas_close_icon_class; ?> sa-offcanvas-close-<?php echo $id; ?>"></i>
            <?php } ?>
            <div class="oxi_offcanvas_content_area">
                <?php
                foreach ($settings->add_offcanvas_item as $offrander) {
                    echo '<div class="oxi_offcanvas_bar_content">
                            <div class="oxi_offcanvas_bar_title"><' . $settings->tag . '>' . $offrander->offcanvas_title . '</' . $settings->tag . '></div>
                            <div class="oxi_foocanvas_bar_description">' . $offrander->description . '</div>
                        </div>';
                };
                ?>
            </div>
        </div>
    <?php } else { ?>
        <div class="oxi-offcanvas-bottom-content-<?php echo $id; ?> oxi_addons_bar_style">
            <?php if ($settings->close_button == 'enable') { ?>
                <i class="<?php echo $settings->offcanvas_close_icon_class; ?> sa-offcanvas-close-<?php echo $id; ?>"></i>
            <?php } ?>
            <div class="oxi_offcanvas_content_area">
                <?php
                foreach ($settings->add_offcanvas_item as $offrander) {
                    echo '<div class="oxi_offcanvas_bar_content">
                            <div class="oxi_offcanvas_bar_title"><' . $settings->tag . '>' . $offrander->offcanvas_title . '</' . $settings->tag . '></div>
                            <div class="oxi_foocanvas_bar_description">' . $offrander->description . '</div>
                        </div>';
                };
                ?>
            </div>
        </div>
    <?php } ?>
</div>




