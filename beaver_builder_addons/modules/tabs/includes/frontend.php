<?php

/**
 * @package shortcode addons
 */

// echo '<pre>';
// print_r($settings);
// echo '</pre>'; 
?>

<div id="oxi__tab_wraper_main_<?php echo $id; ?>" class="oxi__tab_wraper_main">
    <div class="oxi__tab_nav_main">
        <ul class="oxi__tab_ul">
            <?php
            $items = $settings->add_list_item;
            foreach ($items as $key => $value) {
                $data =  json_decode(json_encode($value), true);
                ?>
                <li class="oxi__tab_li" data-tab="tab-<?php echo $key; ?>">
                    <i class="fab fa-facebook"></i>
                    <span class="sa_el_tab_title"> <?php echo $data['list_item_title'] ?></span>
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

            <div class="oxi__tab_content" id="tab-<?php echo $key; ?>"> <?php echo $data['list_item_description'] ?></div>
        <?php } ?>
    </div>
</div>