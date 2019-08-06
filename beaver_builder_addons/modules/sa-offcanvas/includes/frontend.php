<?php
/**
 * @package shortcode addons
 */
//echo '<pre>';
//print_r($settings);
//echo '</pre>';
?>
<script>
    jQuery(function () {

        jQuery(document).on("beforecreate.offcanvas", function (e) {
            var dataOffcanvas = jQuery(e.target).data('offcanvas-component');
            console.log(dataOffcanvas);
            dataOffcanvas.onInit = function () {
                console.log(this);
            };
        });

        jQuery(document).on("create.offcanvas", function (e) {
            var dataOffcanvas = jQuery(e.target).data('offcanvas-component');
            console.log(dataOffcanvas.options);
            dataOffcanvas.onOpen = function () {
                console.log('Callback onOpen');
            };
            dataOffcanvas.onClose = function () {
                console.log('Callback onClose');
            };
        });

        jQuery(document).on("clicked.offcanvas-trigger clicked.offcanvas", function (e) {
            var dataBtnText = jQuery(e.target).text();
            console.log(e.type + '.' + e.namespace + ': ' + dataBtnText);
        });

        jQuery(document).on("open.offcanvas", function (e) {
            var dataOffcanvasID = jQuery(e.target).attr('id');
            console.log(e.type + ': #' + dataOffcanvasID);
        });

        jQuery(document).on("resizing.offcanvas", function (e) {
            var dataOffcanvasID = jQuery(e.target).attr('id');
            console.log(e.type + ': #' + dataOffcanvasID);
        });

        jQuery(document).on("close.offcanvas", function (e) {
            var dataOffcanvasID = jQuery(e.target).attr('id');
            console.log(e.type + ': #' + dataOffcanvasID);
        });

        jQuery(document).on("destroy.offcanvas", function (e) {
            var dataOffcanvasID = jQuery(e.target).attr('id');
            console.log(e.type + ': #' + dataOffcanvasID);
        });

        jQuery('#bottom').on("create.offcanvas", function (e) {
            var api = jQuery(this).data('offcanvas-component');

            console.log(api);
            jQuery('.sa-destroy').on('click', function () {
                api.destroy();
                //jQuery( '#top' ).data('offcanvas-component').destroy();
                console.log(api);
                console.log(jQuery('#top').data());
            });
        });

        jQuery('#left').offcanvas({

            modifiers: "left,overlay",
            triggerButton: '.sa-offcanvas-trigger-left'
        });

        jQuery('.sa-enhance').on('click', function () {
            console.log('enhance');
            jQuery(document).trigger("enhance");
        });

        jQuery(document).trigger("enhance");
    });
</script>
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
            <?php if ($settings->direction_style == 'left') { ?>
                <div class="sa-offcanvas-trigger-left" data-offcanvas-trigger="left"   >
                    <button class="oxi__button">
                        <div class="oxi__button_wrapper"><?php echo $button_position ?></div>
                    </button>
                </div>
            <?php } else if ($settings->direction_style == 'right') { ?>
                <div class="sa-offcanvas-trigger-right" data-offcanvas-trigger="right" >
                    <button class="oxi__button">
                        <div class="oxi__button_wrapper"><?php echo $button_position ?></div>
                    </button>
                </div>
            <?php } else if ($settings->direction_style == 'top') { ?>
                <div class="sa-offcanvas-trigger" data-offcanvas-trigger="top" >
                    <button class="oxi__button">
                        <div class="oxi__button_wrapper"><?php echo $button_position ?></div>
                    </button>
                </div>
            <?php } else { ?>
                <div class="sa-offcanvas-trigger" data-offcanvas-trigger="bottom" >
                    <button class="oxi__button">
                        <div class="oxi__button_wrapper"><?php echo $button_position ?></div>
                    </button>
                </div>
            <?php } ?>
        </div>
    </main>


    <?php if ($settings->direction_style == 'left') { ?>
        <aside id="left" role="complementary">
            <i class="fa fa-close sa-offcanvas-close"></i>
        </aside>
    <?php } else if ($settings->direction_style == 'right') { ?>
        <aside class="sa-offcanvas" data-offcanvas-options='{"modifiers":"right,overlay"}' id="right" role="complementary">
            <i class="fa fa-close sa-offcanvas-close" data-button-options='{"modifiers":"m1,m2"}'></i>
        </aside>
    <?php } else if ($settings->direction_style == 'top') { ?>
        <aside class="sa-offcanvas" data-offcanvas-options='{"modifiers":"top,fixed,overlay"}' id="top" role="complementary">
            <i class="fa fa-close sa-offcanvas-close" data-button-options='{"modifiers":"m1,m2"}'></i>
        </aside>
    <?php } else { ?>
        <aside class="sa-offcanvas" data-offcanvas-options='{"modifiers":"bottom, fixed, overlay"}' id="bottom" role="complementary">
            <i class="fa fa-close sa-offcanvas-close" data-button-options='{"modifiers":"m1,m2"}'></i>
        </aside>
    <?php } ?>








</div>




