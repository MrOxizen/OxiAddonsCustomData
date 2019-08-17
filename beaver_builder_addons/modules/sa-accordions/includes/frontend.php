<?php
//echo "<pre>";
//print_r($settings);
//echo "</pre>";
?>
<div class="SA-FL-accordion-main-area">
    <?php

    foreach ($settings->add_accordion as $key => $value) {
        $saaccordiontitle = $saactitletage = '';
        
        ?>
        <div class="SA-FL-accordions">
            <div class="SA-FL-accordion-heading-<?php echo $id; ?>" ref="#saacordionsid-<?php echo $id; ?>-<?php echo $key ?>">

                <?php if($settings->icon_active_deactive == 'enable'){ ?>
                <div class="span-active">
                    <i class="<?php echo $settings->active_icons_settings->icon; ?>"></i>
                </div>
                <div class="span-deactive">
                    <i class="<?php echo $settings->deactive_icons_settings->icon; ?>"></i> 
                </div>
                <?php } ?>
                <div class="SA-FL-accordion-heading-text">
                    <?php if($settings->icon_true_false == 'enable'){ ?>
                        <div class="SA-FL-accordion-heading-text-icon">
                           <i class="<?php echo $value->icon; ?>"></i>
                        </div>
                    <?php } ?>
                    <?php 
                    echo "<$settings->heading_tag_selection>"
                            . $value->accordion_title . 
                        "</$settings->heading_tag_selection>";
                    ?>
                </div>
            </div>

            <div class="SA-FL-accordion-conetent-<?php echo $id; ?>" id="saacordionsid-<?php echo $id; ?>-<?php echo $key ?>">
                <?php echo $value->accordion_description; ?>
            </div>
        </div>

    <?php } ?>

</div>
