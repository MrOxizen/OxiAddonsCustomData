 
     jQuery(document).ready(function () {
            <?php if ($settings->direction_style == 'left') { ?>
            jQuery(".Sa-button-left-<?php echo $id; ?>").click(function () {
                jQuery(".oxi-offcanvas-left-content-<?php echo $id; ?>").toggleClass("oxi-active");
                jQuery(".oxi-addons-OC-conetent-overlay-<?php echo $id; ?>").toggleClass("oxi-active");
            });
            jQuery(".sa-offcanvas-close-<?php echo $id; ?>").click(function () {
                jQuery(".oxi-offcanvas-left-content-<?php echo $id; ?>").toggleClass("oxi-active");
                jQuery(".oxi-addons-OC-conetent-overlay-<?php echo $id; ?>").toggleClass("oxi-active");
            });
            jQuery(".oxi-addons-OC-conetent-overlay-<?php echo $id; ?>").click(function () {
                jQuery(".oxi-offcanvas-left-content-<?php echo $id; ?>").toggleClass("oxi-active");
                jQuery(".oxi-addons-OC-conetent-overlay-<?php echo $id; ?>").toggleClass("oxi-active");
            });
            <?php } else if ($settings->direction_style == 'right') { ?>
            jQuery(".Sa-button-right-<?php echo $id; ?>").click(function () {
                jQuery(".oxi-offcanvas-right-content-<?php echo $id; ?>").toggleClass("oxi-active");
                jQuery(".oxi-addons-OC-conetent-overlay-<?php echo $id; ?>").toggleClass("oxi-active");
            });
            jQuery(".sa-offcanvas-close-<?php echo $id; ?>").click(function () {
                jQuery(".oxi-offcanvas-right-content-<?php echo $id; ?>").toggleClass("oxi-active");
                jQuery(".oxi-addons-OC-conetent-overlay-<?php echo $id; ?>").toggleClass("oxi-active");
            });
            jQuery(".oxi-addons-OC-conetent-overlay-<?php echo $id; ?>").click(function () {
                jQuery(".oxi-offcanvas-right-content-<?php echo $id; ?>").toggleClass("oxi-active");
                jQuery(".oxi-addons-OC-conetent-overlay-<?php echo $id; ?>").toggleClass("oxi-active");
            });
            <?php } else if ($settings->direction_style == 'top') { ?>
            jQuery(".Sa-button-top-<?php echo $id; ?>").click(function () {
                jQuery(".oxi-offcanvas-top-content-<?php echo $id; ?>").toggleClass("oxi-active");
                jQuery(".oxi-addons-OC-conetent-overlay-<?php echo $id; ?>").toggleClass("oxi-active");
            });
            jQuery(".sa-offcanvas-close-<?php echo $id; ?>").click(function () {
                jQuery(".oxi-offcanvas-top-content-<?php echo $id; ?>").toggleClass("oxi-active");
                jQuery(".oxi-addons-OC-conetent-overlay-<?php echo $id; ?>").toggleClass("oxi-active");
            });
            jQuery(".oxi-addons-OC-conetent-overlay-<?php echo $id; ?>").click(function () {
                jQuery(".oxi-offcanvas-top-content-<?php echo $id; ?>").toggleClass("oxi-active");
                jQuery(".oxi-addons-OC-conetent-overlay-<?php echo $id; ?>").toggleClass("oxi-active");
            });
            <?php } else { ?>
            jQuery(".Sa-button-bottom-<?php echo $id; ?>").click(function () {
                jQuery(".oxi-offcanvas-bottom-content-<?php echo $id; ?>").toggleClass("oxi-active");
                jQuery(".oxi-addons-OC-conetent-overlay-<?php echo $id; ?>").toggleClass("oxi-active");
            });
            jQuery(".sa-offcanvas-close-<?php echo $id; ?>").click(function () {
                jQuery(".oxi-offcanvas-bottom-content-<?php echo $id; ?>").toggleClass("oxi-active");
                jQuery(".oxi-addons-OC-conetent-overlay-<?php echo $id; ?>").toggleClass("oxi-active");
            });
            jQuery(".oxi-addons-OC-conetent-overlay-<?php echo $id; ?>").click(function () {
                jQuery(".oxi-offcanvas-bottom-content-<?php echo $id; ?>").toggleClass("oxi-active");
                jQuery(".oxi-addons-OC-conetent-overlay-<?php echo $id; ?>").toggleClass("oxi-active");
            });
            <?php } ?>
    });