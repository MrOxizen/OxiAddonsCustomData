jQuery(document).ready(function ($) {
    $('.oxi-addons-switcher-btn').on('change', function () {
        var addons = $(this).attr('flbuilder');

        if ($(this).is(":checked")) {
            var settings = 'TRUE';
        } else {
            var settings = 'FALSE';
        }
        var elements = $("form#sa-flbuilder-settings").serialize();
        if ($(this).is('[flbuilder]')) {
            jQuery.post({
                url: saflbuilder.ajaxurl,
                data: {
                    action: 'saflbuilder_save_settings',
                    security: saflbuilder.nonce,
                    elements: elements
                },
                success: function (data) {
                    if (data.replace(/^\s*\n/gm, "") === elements) {
                        var DL = (settings === 'TRUE' ? 'Active' : 'Deactive');
                        var data = "<strong>" + addons.replace(/[_]/g, " ").replace(/\b\w/g, function (e) {
                            return e.toUpperCase()
                        }) + "</strong> " + DL + " Successfully";
                        jQuery.bootstrapGrowl(data, {});
                    } else {
                        alert('Somethings got Error, Kindly Contact Via Oxilab Development')
                    }
                }
            });
        }
    })

});
