<?php
/**
 * @package shortcode addons
 */
//echo '<pre>';
//print_r(jQuerysettings);
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

<div clas="oxi_sa_offcanvas_wrapter">
    <main class="c-offcanvas-content-wrap" role="main">
        <div class="o-wrapper">
            <div class="sa-offcanvas-trigger-left" data-offcanvas-trigger="left"   >Left</div>
            <a class="sa-offcanvas-trigger-right" data-offcanvas-trigger="right" >Right</a>
            <a class="sa-offcanvas-trigger" data-offcanvas-trigger="top" >Top</a>
            <a class="sa-offcanvas-trigger" data-offcanvas-trigger="bottom" >Bottom</a>
        </div>
    </main>

    <aside id="left" role="complementary">

        <button class="sa-offcanvas-close">Close</button>
    </aside>

    <aside class="sa-offcanvas" data-offcanvas-options='{"modifiers":"right,overlay"}' id="right" role="complementary">

        <button class="sa-offcanvas-close" data-button-options='{"modifiers":"m1,m2"}'>Close</button>
    </aside>

    <aside class="sa-offcanvas" data-offcanvas-options='{"modifiers":"top,fixed,overlay"}' id="top" role="complementary">

        <a data-focus href="#">Test</a>
        <button data-focus class="sa-offcanvas-close" data-button-options='{"modifiers":"m1,m2"}'>Close</button>
    </aside>
    <aside class="sa-offcanvas" data-offcanvas-options='{"modifiers":"bottom, fixed, overlay"}' id="bottom" role="complementary">

        <button class="sa-offcanvas-close" data-button-options='{"modifiers":"m1,m2"}'>Close</button>
    </aside>

</div>




