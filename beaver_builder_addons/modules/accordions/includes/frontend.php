<?php
//echo "<pre>";
//print_r($settings);
//echo "</pre>";
?>
<div class="SA-FL-accordion-main-area">
    <?php foreach ($settings->add_accordion as $key => $value) { ?>
            <div class="SA-FL-accordions">
                <div class="SA-FL-accordion-heading" ref="#saacordionsid-<?php echo $key ?>">
                     
                     <div class="span-active">
                          <i class="<?php echo $settings->active_icons_settings->icon ;?>"></i>
                     </div>
                     <div class="span-deactive">
                         <i class="<?php echo $settings->deactive_icons_settings->icon ;?>"></i> 
                     </div>
                    <div class="SA-FL-accordion-heading-text">
                       <?php echo $value->accordion_title ;?>
                    </div>
                </div>
                
                <div class="SA-FL-accordion-conetent" id="saacordionsid-<?php echo $key ?>">
                    <?php echo $value->accordion_description ;?>
                </div>
            </div>
           
    <?php } ?>

</div>
