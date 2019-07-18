<?php
if (!defined('ABSPATH')) {
    exit;
}


if (empty($_GET['saetype'])) {
    $oxitype = '';
} else {
    $oxitype = sanitize_text_field($_GET['saetype']);
}
if (empty($_GET['sa-el-section'])) {
    $oxisection = '';
} else {
    $oxisection = sanitize_text_field($_GET['sa-el-section']);
}
?>
<div class="oxi-addons-wrapper">
    <div class="oxi-addons-sa-el-parent" id="oxi-addons-sa-el-parent">
        <div class="oxi-addons-sa-el-paren-loader">
            <div id="loading">
                <div id="loading-center">
                    <div id="loading-center-absolute">
                        <div class="object" id="object_one"></div>
                        <div class="object" id="object_two"></div>
                        <div class="object" id="object_three"></div>
                        <div class="object" id="object_four"></div>
                        <div class="object" id="object_five"></div>
                        <div class="object" id="object_six"></div>
                        <div class="object" id="object_seven"></div>
                        <div class="object" id="object_eight"></div>
                        <div class="object" id="object_big"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade sa-el-template-preview-import-modal" id="sa-el-template-preview-import-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header d-block">
                    <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="SA-el-ModalLabelTitle">Modal title</h5>
                </div>
                <div class="modal-body">
                    <p class="sa-el-msg">Import this template via one click</p>
                    <div class="sa-el-btn">
                        <span class="sa-el-loader"></span>
                        <a href="javascript:void(0)" class="el-import-btn sael-btn sa-el-final-import-start">Import Template</a>
                        <a href="#" target="_blank" data-hr="<?php echo admin_url('post.php?post=')?>" class="el-edit-btn sael-btn sa-el-final-edit-start" target="_blank">Edit Template</a>
                    </div>
                    <p class="sa-el-horizontal">OR</p>
                    <div class="sa-el-page-create">
                        <p>Create a new page from this template</p>
                        <input type="text" class="sa-el-page-name" id="sa-el-page-name" name="sa-el-page-name" placeholder="Enter a Page Name">
                        <div class="sa-el-btn">
                            <a href="javascript:void(0)" style="padding: 0;" class="el-import-btn sael-btn sa-el-final-create-start">Create New Page</a>
                            <span class="sa-el-loader-page"></span>
                        </div>
                    </div>
                    <div class="sa-el-page-edit">
                        <p style="color: #000;">Your page is successfully imported!</p>
                        <div class="sa-el-btn">
                            <a href="#" target="_blank" data-hr="<?php echo admin_url('post.php?post=')?>" class="el-edit-btn sael-btn sa-el-final-edit-page" target="_blank">Edit Page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-fullscreen" id="SA-EL-IFRAME" tabindex="-1" role="dialog" aria-labelledby="SA-EL-IFRAME" aria-hidden="true">
        <div class="modal-dialog animated zoomInLeft">
            <div class="modal-content">
                <div class="modal-header d-block">
                    <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="SA-el-ModalLabelTitle">Modal title</h5>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
</div>