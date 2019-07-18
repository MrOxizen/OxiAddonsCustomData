<?php
echo "<pre>";
print_r($settings);
echo "</pre>";
?>
<style>
    .oxi-addons-BB-flipbox {
        background-color: transparent;
        width: 100%;
        height: 100%;
        min-height: 100px;
        
        perspective: 1000px;
    }

    .oxi-addons-BB-FL-row {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
        transition: transform 0.8s;
        transform-style: preserve-3d;
    }

    .oxi-addons-BB-flipbox:hover .oxi-addons-BB-FL-row {
        transform: rotateY(180deg);
    }

    .oxi-addons-BB-FL-fontside, .oxi-addons-BB-FL-backside {
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
    }

    

    .oxi-addons-BB-FL-backside {
        transform: rotateY(180deg);
    }
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