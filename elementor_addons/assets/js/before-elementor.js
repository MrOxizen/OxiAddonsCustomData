;
(function (elementor, $, window) {
    'use strict';

    elementor.on('panel:init', function () {
        $('#elementor-panel-elements-search-input').on('keyup', _.debounce(function () {
            $('#elementor-panel-elements')
                    .find('.oxi-el-admin-icon')
                    .parents('.elementor-element')
                    .addClass('sa-el-widgets-addons');
        }, 100));
    });
}(elementor, jQuery, window));