<?php
//echo "<pre>";
//print_r($settings);
//echo "</pre>";
?>
<div class="SA-FL-accordion-main-area">
    <?php
    foreach ($settings->add_accordion as $key => $value) {
        $saaccordiontitle = $saactitletage = '';
        $saaccordiontitle = $settings->heading_tag_selection;
        if ("h1" == $saaccordiontitle) {
            $saactitletage = "<h1>" . $value->accordion_title . "</h1>";
        } elseif ("h2" == $saaccordiontitle) {
            $saactitletage = "<h2>" . $value->accordion_title . "</h2>";
        } elseif ("h3" == $saaccordiontitle) {
            $saactitletage = "<h3>" . $value->accordion_title . "</h3>";
        } elseif ("h4" == $saaccordiontitle) {
            $saactitletage = "<h4>" . $value->accordion_title . "</h4>";
        } elseif ("h5" == $saaccordiontitle) {
            $saactitletage = "<h5>" . $value->accordion_title . "</h5>";
        } elseif ("h6" == $saaccordiontitle) {
            $saactitletage = "<h6>" . $value->accordion_title . "</h6>";
        } elseif ("p" == $saaccordiontitle) {
            $saactitletage = "<p>" . $value->accordion_title . "</p>";
        } elseif ("div" == $saaccordiontitle) {
            $saactitletage = "<div>" . $value->accordion_title . "</div>";
        } else {
            $saactitletage = "<span>" . $value->accordion_title . "</span>";
        }
        ?>
        <div class="SA-FL-accordions">
            <div class="SA-FL-accordion-heading-<?php echo $id; ?>" ref="#saacordionsid-<?php echo $id; ?>-<?php echo $key ?>">

                <div class="span-active">
                    <i class="<?php echo $settings->active_icons_settings->icon; ?>"></i>
                </div>
                <div class="span-deactive">
                    <i class="<?php echo $settings->deactive_icons_settings->icon; ?>"></i> 
                </div>
                <div class="SA-FL-accordion-heading-text">
                    <?php echo $saactitletage; ?>
                </div>
            </div>

            <div class="SA-FL-accordion-conetent-<?php echo $id; ?>" id="saacordionsid-<?php echo $id; ?>-<?php echo $key ?>">
                <?php echo $value->accordion_description; ?>
            </div>
        </div>

    <?php } ?>

</div>
