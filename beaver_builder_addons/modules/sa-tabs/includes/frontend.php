<?php

/**
 * @package shortcode addons
 */

// echo '<pre>';
// print_r($settings);
// echo '</pre>';

?>

<div id="oxi__tab_wraper_main" class="oxi__tab_wraper_main">
    <div class="oxi__addons_wrapper">
        <div class="oxi__tab_nav_main">
            <ul class="oxi__tab_ul">
                <?php
                $items = $settings->add_list_item;
                foreach ($items as $key => $value) {
                    $data =  json_decode(json_encode($value), true);
                    $tab_icon = '';
                    if ($settings->tab_icon == 'enable') {
                        if ($data['image_type'] == 'icon') {
                            $tab_icon  = '<div class="oxi__icon_image_main"> 
                                        <i class="oxi__icon ' . $data['icon'] . '"></i>
                                    </div>';
                        } else {
                            $image = '';
                            if ($data['photo_source'] == 'library') {
                                if ($data['photo'] != '') {
                                    $image = '<img class="oxi__addons_image" src="' . $data['photo_src'] . '" alt="' . $data['list_item_title'] . '-image"/>';
                                }
                            } else if ($data['photo_source'] == 'url') {
                                if ($data['photo_url'] != '') {
                                    $image = '<img class="oxi__addons_image" src="' . $data['photo_url'] . '" alt="' . $data['list_item_title'] . '-image"/>';
                                }
                            }
                            $tab_icon = '
                            <div class="oxi__icon_image_main"> 
                                ' . $image . ' 
                            </div>
                        ';
                        }
                    }
                    $icon_title  = '';
                    if ($settings->icon_position == 'left') {
                        $icon_title = '
                        ' . $tab_icon . '
                         <span class="oxi_addon_title">' . $data["list_item_title"] . '</span>
                        ';
                    } elseif ($settings->icon_position == 'right') {
                        $icon_title = ' 
                         <span class="oxi_addon_title">' . $data["list_item_title"] . '</span>
                          ' . $tab_icon . '
                        ';
                    } elseif ($settings->icon_position == 'stacked') {
                        $icon_title = ' 
                            <div>  ' . $tab_icon . '</div>
                         <span class="oxi_addon_title">' . $data["list_item_title"] . '</span> 
                        ';
                    }
                    ?>
                    <li class="oxi__tab_li oxi-<?php echo $id; ?>" data-tab="tab-<?php echo $key; ?>-<?php echo $id; ?>" data-inital="<?php echo $settings->initial_open ?>">
                        <?php echo $icon_title; ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="oxi__tab_content_main">
            <?php
            $items = $settings->add_list_item;
            foreach ($items as $key => $value) {
                $data =  json_decode(json_encode($value), true);
                ?>
                <div class="oxi__tab_content oxi-content-<?php echo $id; ?>" id="tab-<?php echo $key; ?>-<?php echo $id; ?>"> <?php echo $data['list_item_description'] ?></div>
            <?php } ?>
        </div>
    </div>
</div>