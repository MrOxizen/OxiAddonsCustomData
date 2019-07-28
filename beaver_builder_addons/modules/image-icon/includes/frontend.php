<?php
//echo "<pre>";
//print_r($settings);
//echo "</pre>";
?>
<div class="oxi-addons-BB-imageicon">
    <div class="oxi-addons-BB-FL-imageicon-row">
       
            <?php if("icon" == $settings->image_type){ ?>
         <div class="oxi-addons-BB-FL-imageicon-icon-area">
            <div class="oxi-addons-BB-FL-imageicon-icon-inner">
                <div class="oxi-addons-BB-FL-imageicon-Icon">

                    <i class="<?php echo $settings->icon; ?>"></i>

                </div>
            </div>
         </div>
            <?php } else{?>
        <div class="oxi-addons-BB-FL-imageicon-image-area">
            <div class="oxi-addons-BB-FL-imageicon-image-inner">
                <div class="oxi-addons-BB-FL-imageicon-image">

                    <img src="<?php echo $settings->photo_src; ?>"/>

                </div>
            </div>
        </div>
            <?php } ?>
        
    </div>
</div>
