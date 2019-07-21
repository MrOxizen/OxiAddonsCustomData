<?php
echo "<pre>";
print_r($settings);
echo "</pre>";
?>
<style>
    

    

    
</style>
<div class="oxi-addons-BB-flipbox">
    <div class="oxi-addons-BB-FL-row">
        <div class="oxi-addons-BB-FL-fontside">
            <div class="oxi-addons-BB-FL-fontside-icon-area">
                <div class="oxi-addons-BB-FL-fontside-icon-inner">
                    <div class="oxi-addons-BB-FL-F-Icon">

                        <i class="<?php echo $settings->oxi_flip_icons->icon; ?> oxi-bb-incons"></i>

                    </div>
                </div>
            </div>
            <div class="oxi-addons-BB-FL-F-title">
                <?php echo $settings->oxi_flip_front_title; ?>
            </div>
            <div class="oxi-addons-BB-FL-F-details">
                <?php echo $settings->oxi_flip_front_details; ?>
            </div>
        </div>
        <div class="oxi-addons-BB-FL-backside">
            <div class="oxi-addons-BB-FL-backside-icon-area">
                <div class="oxi-addons-BB-FL-backside-icon-inner">
                    <div class="oxi-addons-BB-FL-B-Icon">
                        <i class="<?php echo $settings->oxi_flip_back_icons->icon; ?>"></i>
                    </div>
                </div>
            </div>
            <div class="oxi-addons-BB-FL-F-title">
                <?php echo $settings->oxi_flip_back_title; ?>
            </div>
            <div class="oxi-addons-BB-FL-F-details">
                <?php echo $settings->oxi_flip_back_details; ?>
            </div>
        </div>
    </div>
</div>
