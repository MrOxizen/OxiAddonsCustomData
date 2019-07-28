jQuery(document).ready(function ($) {
    var form_sa_el_data = $("form#sa-el-settings").serialize();
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
                    $('#OXIAADDONSCHANGEDPOPUP .modal-body.text-center p').html('Your account has been created successfully.');
                    $('#OXIAADDONSCHANGEDPOPUP').modal('show');
                    OXIAADDONSCHANGEDPOPUP();
                }
            });
        }

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



//     $('.oxi-addons-switcher-btn').on('change', function (e) {
//        var addons = $(this).attr('sa-elmentor');
//        if ($(this).is(":checked")) {
//            var settings = 'TRUE';
//        } else {
//            var settings = 'FALSE';
//        }
//        if ($(this).is('[sa-elmentor]')) {
//            var elements = $("form#sa-el-settings").serialize();
//            // console.log(saelemetor);
//            jQuery.post({
//                url: saelemetor.ajaxurl,
//                data: {
//                    action: 'sa_elementor_save_settings',
//                    security: saelemetor.nonce,
//                    elements: elements
//                },
//                success: function (data) {
//                    if (data.replace(/^\s*\n/gm, "") === elements) {
//                        var DL = (settings === 'TRUE' ? 'Active' : 'Deactive');
//                        var data = "<strong>" + addons.replace(/[_]/g, " ").replace(/\b\w/g, function (e) {
//                            return e.toUpperCase()
//                        }) + "</strong> " + DL + " Successfully";
//                        jQuery.bootstrapGrowl(data, {});
//                    } else {
//                        alert('Somethings got Error, Kindly Contact Via Oxilab Development')
//                    }
//                }
//            });
//        }
//    })

































// $('.sa-el-header-right .sa-el-settings-save').attr("disabled", "disabled").css('cursor', 'not-allowed');
//    $('.sa-el-header-right .sa-el-settings-save .dashicons-admin-generic').css('display', 'none')

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