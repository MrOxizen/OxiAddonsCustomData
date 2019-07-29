jQuery(document).ready(function ($) {

    $('.oxi-addons-switcher-btn').on('change', function (e) {
        var addons = $(this).attr('sa-elmentor');
        if ($(this).is(":checked")) {
            var settings = 'TRUE';
        } else {
            var settings = 'FALSE';
        }
        if ($(this).is('[sa-elmentor]')) {
            var elements = $("form#sa-el-settings").serialize();
            // console.log(saelemetor);
            jQuery.post({
                url: saelemetor.ajaxurl,
                data: {
                    action: 'sa_elementor_save_settings',
                    security: saelemetor.nonce,
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