<?php
/**
 * @package shortcode addons
 */
//echo '<pre>';
//print_r($settings);
//echo '</pre>';

$footer = $description = $separator = $oxi_addons_main = '';
if ($settings->footer != '') {
    $footer = '<' . $settings->tag . ' class="oxi__addons_header">
                        ' . $settings->footer . '
                    </' . $settings->tag . '>';
}
if ($settings->description != '') {
    $description = '
          <div class="oxi__addons_details">
            ' . $settings->description . '
      </div>
    ';
}



if ($settings->separator_style != 'none') {
    if ($settings->separator_style === 'line') {
        $separator = ' <div class="oxi__addons_line_divider">
                            <span class="oxi__addons_seperator_span oxi__addons_seperator_width"></span>
                        </div>';
    } else if ($settings->separator_style === 'line_icon') {
        $divider_icon = '';
        if (!empty($settings->icon)) {
            $divider_icon = '<i class="oxi__icon ' . $settings->icon . '"></i>';
        }

        $separator = '<div class="oxi__addons_line_divider oxi__addons_seperator_width oxi__margin">
                        <div class="oxi__addons_seperator oxi__before">
                            <span class="oxi__addons_seperator_span"></span>
                        </div>
                            <div class="oxi__addons_image_icon_divider">
                                ' . $divider_icon . '
                            </div>
                        <div class="oxi__addons_seperator oxi__after">
                            <span class="oxi__addons_seperator_span"></span>
                        </div> 
                    </div>';
    } else if ($settings->separator_style == 'line_image') {
        $divider_image = '';
        if ($settings->photo_source == 'library') {
            if ($settings->photo != '') {
                $divider_image = '<img class="oxi__addons_image" src="' . $settings->photo_src . '" alt="' . $settings->footer . '"/>';
            }
        } else if ($settings->photo_source == 'url') {
            if ($settings->photo_url != '') {
                $divider_image = '<img class="oxi__addons_image" src="' . $settings->photo_url . '" alt="' . $settings->footer . '"/>';
            }
        }
        $separator = '<div class="oxi__addons_line_divider oxi__addons_seperator_width oxi__margin">
                        <div class="oxi__addons_seperator oxi__before">
                            <span class="oxi__addons_seperator_span"></span>
                        </div>
                            <div class="oxi__addons_image_icon_divider">
                                ' . $divider_image . '
                            </div>
                        <div class="oxi__addons_seperator oxi__after">
                            <span class="oxi__addons_seperator_span"></span>
                        </div> 
                    </div>';
    } else if ($settings->separator_style === 'line_text') {
        $text = '';
        if ($settings->text_inline != '') {
            $text = '   <' . $settings->separator_text_tag_selection . ' class="oxi__line_text">' . $settings->text_inline . '</' . $settings->separator_text_tag_selection . '>';
        }
        $separator = '<div class="oxi__addons_line_divider oxi__addons_seperator_width oxi__margin">
                        <div class="oxi__addons_seperator oxi__before">
                            <span class="oxi__addons_seperator_span"></span>
                        </div>
                            <div class="oxi__addons_image_icon_divider">
                                ' . $text . '
                            </div>
                        <div class="oxi__addons_seperator oxi__after">
                            <span class="oxi__addons_seperator_span"></span>
                        </div> 
                    </div>';
    }
}
if ($settings->separator_style === 'none') {
    $oxi_addons_main = '
        ' . $footer . ' 
        ' . $description . '
    ';
} else {
    if ($settings->separator_position === 'top') {
        $oxi_addons_main = '
        ' . $separator . ' 
        ' . $footer . ' 
        ' . $description . '
    ';
    } else if ($settings->separator_position === 'bottom') {
        $oxi_addons_main = '
        ' . $footer . ' 
        ' . $description . '
        ' . $separator . '
    ';
    } else if ($settings->separator_position === 'center') {
        $oxi_addons_main = '
        ' . $footer . ' 
        ' . $separator . ' 
        ' . $description . '
    ';
    }
}

?>
<div class="oxi__addons_footer_wrapper">
    <div class="oxi__addons_main_footer">
        <?php
        if ($settings->icon_position == 'bottom') {
            ?>
            <?php echo $oxi_addons_main; ?>
            <div class="oxi__addons_footer_icon_area">
                <?php
                foreach ($settings->add_footer_icon as $value) {
                    if ($value->link != '') {
                        
                        ?>
                        <a href="<?php echo $value->link; ?>" target="<?php echo $value->link_target; ?>" ref="<?php echo $value->link_nofollow; ?>">
                            <div class="oxi_footer_info_icon">
                                <i class="<?php echo $value->icon; ?>"></i>
                                
                            </div>
                        </a>
                        <?php
                    } else {
                        ?>
                        <div class="oxi_footer_info_icon">
                            <i class="<?php echo $value->icon; ?>"></i>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>  


            <?php
        } else {
            ?>    
            
            <div class="oxi__addons_footer_icon_area">
                <?php
                foreach ($settings->add_footer_icon as $value) {
                    if ($value->link != '') {
                        ?>
                        <a href="<?php echo $value->link ?>" target="<?php echo $value->link_target ?>" ref="<?php echo $value->link_nofollow ?>">
                            <div class="oxi_footer_info_icon">
                                <i class="<?php echo $value->icon; ?>"></i>
                            </div>
                        </a>
                        <?php
                    } else {
                        ?>
                        <div class="oxi_footer_info_icon">
                            <i class="<?php echo $value->icon; ?>"></i>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <?php echo $oxi_addons_main; ?>
            <?php
        }
        ?>
    </div>

</div>