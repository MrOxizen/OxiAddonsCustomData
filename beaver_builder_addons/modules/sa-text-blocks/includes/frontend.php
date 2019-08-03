<?php

/**
 * @package shortcode addons
 */

// echo '<pre>';
// print_r($settings);
// echo '</pre>';

$heading_top = $heading_middle = $heading_bottom = $separator =  $oxi_addons_main = '';

if ($settings->separator_style != 'none') {
    if ($settings->separator_style === 'line') {
        $separator = ' <div class="oxi__addons_line_divider">
                            <span class="oxi__addons_seperator_span oxi__addons_seperator_width"></span>
                        </div>';
    } else if ($settings->separator_style === 'line_icon') {
        $divider_icon = '';
        if (!empty($settings->icon)) {
            $divider_icon =  '<i class="oxi__icon ' . $settings->icon . '"></i>';
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
                $divider_image = '<img class="oxi__addons_image" src="' . $settings->photo_src . '" alt="' . $settings->heading . '"/>';
            }
        } else if ($settings->photo_source == 'url') {
            if ($settings->photo_url != '') {
                $divider_image = '<img class="oxi__addons_image" src="' . $settings->photo_url . '" alt="' . $settings->heading . '"/>';
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
    }
}

if ($settings->heading_top != '') {
    $heading_top = '<' . $settings->tag_top . ' class="oxi__addons_heading_top">' . $settings->heading_top . '</' . $settings->tag_top . '>';
}
if ($settings->heading_middle != '') {
    $heading_middle = '<' . $settings->tag_middle . ' class="oxi__addons_heading_middle">' . $settings->heading_middle . '</' . $settings->tag_middle . '>';
}
if ($settings->heading_bottom != '') {
    $heading_bottom = '<' . $settings->tag_bottom . ' class="oxi__addons_heading_bottom">' . $settings->heading_bottom . '</' . $settings->tag_bottom . '>';
}

if ($settings->separator_style === 'none') {
    $oxi_addons_main =  '
        ' . $heading_top . ' 
        ' . $heading_middle . '
        ' . $heading_bottom . '
    ';
} else {
    if ($settings->separator_position === 'top') {
        $oxi_addons_main =  '
        ' . $heading_top . ' 
        ' . $separator . '  
        ' . $heading_middle . '
        ' . $heading_bottom . '
    ';
    } else if ($settings->separator_position === 'bottom') {
        $oxi_addons_main =  '
       ' . $heading_top . ' 
        ' . $heading_middle . '
        ' . $heading_bottom . '
        ' . $separator . '
    ';
    } else if ($settings->separator_position === 'center') {
        $oxi_addons_main =  ' 
          ' . $heading_top . '  
        ' . $heading_middle . '
          ' . $separator . ' 
        ' . $heading_bottom . '
    ';
    }
}


?>

<div class="oxi__addons_wrapper_main">
    <div class="oxi__addons_heading_wrapper">
        <?php echo $oxi_addons_main; ?>
    </div>
</div>