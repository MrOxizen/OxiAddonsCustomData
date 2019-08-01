jQuery(document).ready(function ($) {
    $('.oxi-addons-switcher-btn').on('change', function (e) {
        $('.sa-el-header-right .sa-el-settings-save').removeAttr("disabled").removeAttr("sa-el-change").css('cursor', 'pointer').html('Save Settings');
        ;
    })

    $('.sa-el-header-right .sa-el-settings-save').on('click', function (e) {
        e.preventDefault();
        var elements = $("form#sa-el-settings").serialize();
        // console.log(saelemetor);
        if ($(this).is("[sa-el-change]")) {
            $('.sa-el-header-right .sa-el-settings-save').html('Save Settings');
            $('.sa-el-header-right .sa-el-settings-save').attr("disabled", "disabled").css('cursor', 'not-allowed');
        } else {
            jQuery.post({
                url: saelemetor.ajaxurl,
                beforeSend: function () {
                    $('.sa-el-header-right .sa-el-settings-save').html('<span class="dashicons dashicons-admin-generic"></span> saving data');
                },
                data: {
                    action: 'sa_elementor_save_settings',
                    security: saelemetor.nonce,
                    elements: elements,
                    satype: 'elements'
                },
                success: function (data) {
                    $('.sa-el-header-right .sa-el-settings-save').attr("sa-el-change", "no");
                    $('.sa-el-header-right .sa-el-settings-save').html('saved &#128522;');
                    $('#OXIAADDONSCHANGEDPOPUP .icon-box').html('<span class="dashicons dashicons-yes"></span>');
                    $('#OXIAADDONSCHANGEDPOPUP .modal-body.text-center h4').html('Great!');
                    $('#OXIAADDONSCHANGEDPOPUP .modal-body.text-center p').html('Select elements has been saved successfully.');
                    $('#OXIAADDONSCHANGEDPOPUP').modal('show');
                    OXIAADDONSCHANGEDPOPUP();
                }
            });
        }

        return false;
    })
    $('.sa-el-admin-block-content .sa-el-button-clear-cache').on('click', function (e) {
        e.preventDefault();
        jQuery.post({
            url: saelemetor.ajaxurl,
            beforeSend: function () {
                $('.sa-el-admin-block-content .sa-el-button-clear-cache').html('<span class="dashicons dashicons-admin-generic"></span> Deleting');
            },
            data: {
                action: 'sa_elementor_save_settings',
                security: saelemetor.nonce,
                satype: 'cache'
            },
            success: function (data) {
                console.log(data);
                $('.sa-el-admin-block-content .sa-el-button-clear-cache').html('Complete &#128522;');
                $('#OXIAADDONSCHANGEDPOPUP .icon-box').html('<span class="dashicons dashicons-yes"></span>');
                $('#OXIAADDONSCHANGEDPOPUP .modal-body.text-center h4').html('Great!');
                $('#OXIAADDONSCHANGEDPOPUP .modal-body.text-center p').html('Cache has been delete successfully.');
                $('#OXIAADDONSCHANGEDPOPUP').modal('show');
                OXIAADDONSCHANGEDPOPUP();
            }
        });
        return false;
    })



    function OXIAADDONSCHANGEDPOPUP() {
        if (($("#OXIAADDONSCHANGEDPOPUP").data('bs.modal') || {})._isShown) {
            setTimeout(function () {
                $('#OXIAADDONSCHANGEDPOPUP').modal('hide');
            }, 3000);
        }
    }

    $('.sa-el-btn-group .sa-el-btn-control-enable').on('click', function (e) {
        e.preventDefault();
        $("#tabs-elements .oxi-sa-cards .oxi-sa-cards-switcher input:enabled").each(
                function (i) {
                    $(this)
                            .prop("checked", true)
                            .change();
                }
        );
    });
    $(".oxi-sa-cards-switcher-disabled").each(function (i) {
        $(this).children('input').attr("disabled", "disabled");
    });
    $(".oxi-sa-cards-switcher-disabled").on('click', function (e) {
        e.preventDefault();
        $('#OXIAADDONSCHANGEDPOPUP .icon-box').html('<span class="dashicons dashicons-shield-alt"></span>');
        $('#OXIAADDONSCHANGEDPOPUP .modal-body.text-center h4').html('Go Premium');
        $('#OXIAADDONSCHANGEDPOPUP .modal-body.text-center p').html('Purchase our <a href="https://www.oxilab.org/downloads/short-code-addons/" target="_blank">premium version</a> to unlock these pro components!');
        $('#OXIAADDONSCHANGEDPOPUP').modal('show');
        OXIAADDONSCHANGEDPOPUP();
    });


    $('.sa-el-btn-group .sa-el-btn-control-disable').on('click', function (e) {
        e.preventDefault();
        $("#tabs-elements .oxi-sa-cards .oxi-sa-cards-switcher input:enabled").each(
                function (i) {
                    $(this)
                            .prop("checked", false)
                            .change();
                }
        );
    });

    var fristtabs = '#tabs-general';
    var hash = window.location.hash;
    fristtabs = (hash !== '' ? hash : fristtabs)
    jQuery(".ctu-ulimate-style-2 .vc-tabs-li[ref='" + fristtabs + "']").addClass("active");
    jQuery(".ctu-ulitate-style-2-tabs" + fristtabs).css("display", "block");
    jQuery(".ctu-ulimate-style-2 .vc-tabs-li").click(function () {
        if (jQuery(this).hasClass("active")) {
            return false;
        } else {
            jQuery(".ctu-ulimate-style-2 .vc-tabs-li").removeClass("active");
            jQuery(this).toggleClass("active");
            jQuery(".ctu-ulitate-style-2-tabs").css("display", "none");
            var activeTab = jQuery(this).attr("ref");
            jQuery(activeTab).css("display", "block");
        }
    });
});