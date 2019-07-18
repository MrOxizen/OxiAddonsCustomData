function alignModal() {
    var modalDialog = jQuery(this).find(".modal-dialog");
    /* Applying the top margin on modal dialog to align it vertically center */
    modalDialog.css("margin-top", Math.max(0, (jQuery(window).height() - modalDialog.height()) / 2));
}
// Align modal when it is displayed
jQuery(".sa-el-template-preview-import-modal").on("shown.bs.modal", alignModal);
// Align modal when user resize the window
jQuery(window).on("resize", function () {
    jQuery(".sa-el-template-preview-import-modal:visible").each(alignModal);
});
jQuery(window).load(function () {
    var height = jQuery("#wpbody").height();
    jQuery('.oxi-addons-sa-el-paren-loader').css('min-height', height + 'px');

})


jQuery(window).load(function () {
    var urlParams = new URLSearchParams(window.location.search);
    var NAME = '';
    if (!urlParams.has('saetype') && !urlParams.has('sa-el-section')) {
        var datatype = '';
    } else if (urlParams.has('saetype') && !urlParams.has('sa-el-section')) {
        var datatype = 'blocks';
    } else if (urlParams.has('saetype') && urlParams.has('sa-el-section')) {
        var datatype = 'blocks';
        var NAME = urlParams.get('sa-el-section');
    } else if (!urlParams.has('saetype') && urlParams.has('sa-el-section')) {
        var datatype = '';
        var NAME = urlParams.get('sa-el-section');
    }
    jQuery.post({
        url: sa_el_js_object.ajaxurl,
        data: {
            action: 'sael_template_data_load',
            datatype: datatype,
            NAME: NAME,
        },
        success: function (data) {
            setTimeout(function () {
                jQuery("#oxi-addons-sa-el-parent").html(data);
            }, 1000);
        }
    });
});
jQuery(document).on("click", ".sa-el-preview-button", function (e) {
    e.preventDefault();
    var dataurl = jQuery(this).attr('data-url');
    var datatitle = jQuery(this).attr('sa-el-title');
    var IframeData = '<iframe id="sa-el-iframe-loader" src="' + dataurl + '">Your browser doesn\'t support iframes</iframe>';
    jQuery("#SA-EL-IFRAME .modal-body").html(IframeData);
    jQuery("#SA-EL-IFRAME #SA-el-ModalLabelTitle").html(datatitle);
    jQuery("#SA-EL-IFRAME").modal();
    return false;
});
jQuery("#SA-EL-IFRAME").on("hidden.bs.modal", function () {
    jQuery("#sa-el-iframe-loader").remove();
});
jQuery(document).on("click", ".sa-el-import-start", function (e) {
    e.preventDefault();
    var datatitle = jQuery(this).attr('sa-el-title');
    var datasaelid = jQuery(this).attr('sael-id');
    var required = require = jQuery(this).attr('sael_required');
    jQuery(".sa-el-reqired-plugins").remove();
    jQuery("#sa-el-template-preview-import-modal .sa-el-final-import-start").attr("sa-elid", datasaelid);
    jQuery("#sa-el-template-preview-import-modal .sa-el-final-create-start").attr("sa-elid", datasaelid);
    jQuery("#sa-el-template-preview-import-modal .sa-el-final-import-start").attr("sael_required", '');
    jQuery("#sa-el-template-preview-import-modal .sa-el-final-create-start").attr("sael_required", '');
    jQuery("#sa-el-template-preview-import-modal h5.modal-title").html(datatitle);
    jQuery("#sa-el-template-preview-import-modal .sa-el-final-import-start").html('Import Template');
    jQuery("#sa-el-template-preview-import-modal .sa-el-final-create-start").html('Create New Page');
    if (required !== '') {
        var res = required.split(",");

        var require = '<div class="sa-el-reqired-plugins"><p class="sa-el-msg"><span class="dashicons dashicons-admin-tools"></span> Required Plugins</p><ul class="required-plugins-list">';
        jQuery.each(res, function (index, value) {
            if (value !== '') {
                require += '<li class="sa-el-card">' + value.split("/")[0] + '</li>';
            }
        });
        require += '</ul><div>';
        jQuery("#sa-el-template-preview-import-modal .sa-el-final-import-start").attr('sael_required', required);
        jQuery("#sa-el-template-preview-import-modal .sa-el-final-create-start").attr('sael_required', required);

    }
    jQuery("#sa-el-template-preview-import-modal .modal-body").before(require);
    jQuery(".sa-el-final-edit-start").slideUp();
    jQuery(".sa-el-page-edit").slideUp();
    jQuery(".sa-el-final-import-start").slideDown();
    jQuery(".sa-el-page-create").slideDown();
    jQuery('#sa-el-page-name').val('');
    jQuery("#sa-el-template-preview-import-modal").modal();
    return false;
});
jQuery(".sa-el-final-edit-start").slideToggle();
jQuery(".sa-el-page-edit").slideToggle();
jQuery(document).on("click", ".sa-el-final-import-start", function (e) {
    var template_id = jQuery(this).attr('sa-elid');
    var required = jQuery(this).attr('sael_required');
    if (required !== '') {
        var res = required.split(",");
        var alertdata = 'For import this layouts kindly Install first ';
        jQuery.each(res, function (index, value) {
            if (value !== '') {
                alertdata += value.split("/")[0] + ', ';
            }
        });
        alert(alertdata);
        e.preventDefault();
        return false;
    } else {
        jQuery.post({
            url: sa_el_js_object.ajaxurl,
            data: {
                action: 'sael_template_data_loads',
                template_id: template_id,
            },
            beforeSend: function () {
                jQuery(".sa-el-final-import-start").html('Importing...');
            },
            success: function (data) {
                console.log(data);
                if (data == 'problem') {
                    alert('Error Data :( Kindly contact to Shortcode Addons')
                } else {
                    jQuery(".sa-el-final-import-start").slideToggle();
                    jQuery(".sa-el-final-edit-start").attr('href', jQuery(".sa-el-final-edit-start").attr('data-hr') + data + '&action=elementor');
                    jQuery(".sa-el-final-edit-start").slideToggle();
                }
            }
        });
        e.preventDefault();
        return false;
    }
});
jQuery(document).on("click", ".sa-el-final-create-start", function (e) {
    var template_id = jQuery(this).attr('sa-elid');
    var required = jQuery(this).attr('sael_required');
    if (required !== '') {
        var res = required.split(",");
        var alertdata = 'For import this layouts kindly Install first ';
        jQuery.each(res, function (index, value) {
            if (value !== '') {
                alertdata += value.split("/")[0] + ', ';
            }
        });
        alert(alertdata);
        e.preventDefault();
        return false;
    } else {
        var with_page = jQuery('#sa-el-page-name').val();
        if (with_page == '') {
            alert('kindly Add Page Title');
            e.preventDefault();
            return false;
        }
        jQuery.post({
            url: sa_el_js_object.ajaxurl,
            data: {
                action: 'sael_template_data_loads',
                template_id: template_id,
                with_page: with_page
            },
            beforeSend: function () {
                jQuery(".sa-el-final-create-start").html('Creating...');
                jQuery('#sa-el-page-name').val('');
            },
            success: function (data) {
                if (data == 'problem') {
                    alert('Error Data :( Kindly contact to Shortcode Addons')
                } else {
                    jQuery(".sa-el-final-edit-page").attr('href', jQuery(".sa-el-final-edit-page").attr('data-hr') + data + '&action=elementor');
                    jQuery(".sa-el-page-create").slideToggle();
                    jQuery(".sa-el-page-edit").slideToggle();
                }
            }
        });
        e.preventDefault();
        return false;
    }
});
