<?php
echo "<pre>";
print_r($settings);
echo "</pre>";
?>


<div class="oxi-sa-module-content oxi-sa-info-list">
    <?php
    foreach ($settings->add_list_item as $items) {
        $nofollow = '';
        if($items->list_item_url_nofollow == 'yes'){
            $nofollow = 'nofollow';
        }
        if($items->image_type == 'photo'){
           if($items->photo_source == 'url'){
                $oxiPhoto = '<div class="oxi-SA-BB-Image">
                                <img src="' . $items->photo_url . '"/>
                            </div>';
           }else{
               $oxiPhoto = '<div class="oxi-SA-BB-Image">
                                <img src="' . $items->photo_src . '"/>
                            </div>';
           }
        }else{
           $oxiPhoto = '<div class="oxi-SA-BB-Icon" style="color:#'.$items->icon_color.'">
                                <i style="background:#'.$items->icon_BG_color.'" class="' . $items->icon . '"></i>
                            </div>';
        }
        if ($items->list_item_link == 'complete') {
            echo '
            <div class="oxi-SA-BB-List-items-connector">
                <a href="' . $items->list_item_url . '" target="' . $items->list_item_url_target . '" rel="' . $nofollow . '">
                    <div class="oxi-SA-BB-List-items">
                        <div class="oxi-SA-BB-Icon-Image">
                            '.$oxiPhoto.'
                        </div>
                        <div class="oxi-SA-BB-content-area">
                            <div class="oxi-SA-BB-title">
                                ' . $items->list_item_title . '
                            </div>
                            <div class="oxi-SA-BB-details">
                                ' . $items->list_item_description . '
                            </div>
                        </div>

                    </div>
                </a>
            <div class="oxi-SA-BB-conector"></div>
        </div>';
        } else if ($items->list_item_link == 'list-title') {
            echo '
            <div class="oxi-SA-BB-List-items-connector">
                <div class="oxi-SA-BB-List-items">
                    <div class="oxi-SA-BB-Icon-Image">
                        '.$oxiPhoto.'
                    </div>
                    <div class="oxi-SA-BB-content-area">
                        <a href="' . $items->list_item_url . '" target="' . $items->list_item_url_target . '" rel="' . $nofollow . '">
                            <div class="oxi-SA-BB-title">
                                ' . $items->list_item_title . '
                            </div>
                        </a>
                        <div class="oxi-SA-BB-details">
                            ' . $items->list_item_description . '
                        </div>
                    </div>
                    
                </div>
                <div class="oxi-SA-BB-conector"></div>
            </div>';
        } else{
            
            echo '
            <div class="oxi-SA-BB-List-items-connector">
                <div class="oxi-SA-BB-List-items">
                <a href="' . $items->list_item_url . '" target="' . $items->list_item_url_target . '" rel="' . $nofollow . '">
                    <div class="oxi-SA-BB-Icon-Image">
                       '.$oxiPhoto.'
                    </div>
                    </a>
                    <div class="oxi-SA-BB-content-area">
                            <div class="oxi-SA-BB-title">
                                ' . $items->list_item_title . '
                            </div>
                        <div class="oxi-SA-BB-details">
                            ' . $items->list_item_description . '
                        </div>
                    </div>
                    
                </div>
                <div class="oxi-SA-BB-conector"></div>
            </div>';
        }
        
    }
    ?>
</div>
