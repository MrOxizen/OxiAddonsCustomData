<?php




if (!empty($settings)) {
   $iconboxstyle = $settings->icon_style;
   $imagestyle = $settings->image_style;
    ?>

    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-imageicon-icon-area{
    text-align:<?php echo $settings->icon_align; ?>;
    }
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-imageicon-icon-inner{
    display: inline-block;
    }
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-imageicon-Icon:hover{
        background:#<?php echo $settings->icon_bg_hover_color; ?>;
        color: #<?php echo $settings->icon_hover_color; ?>;
        border-color: #<?php echo $settings->icon_border_hover_color; ?>;
    }
        
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-imageicon-image-area{
        text-align:<?php echo $settings->img_align; ?>;
    } 
    
    
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-imageicon-Icon{
    <?php
    if ($iconboxstyle == "simple") {
        ?>
        font-size:<?php echo $settings->icon_size; ?>px;
        color: #<?php echo $settings->icon_color; ?>;
        <?php
    }elseif ($iconboxstyle == "circle") {
        ?>
        font-size:<?php echo $settings->icon_size; ?>px;
        color: #<?php echo $settings->icon_color; ?>;
        width: 60px;
        height: 60px;
        background: #<?php echo $settings->icon_bg_color; ?>;
        border-radius: 100%;
        opacity: <?php echo $settings->icon_bg_color_opc; ?>;
        display: flex;
        justify-content: center;
        align-items: center;
        <?php
    }elseif($iconboxstyle == "square") {
        ?>
        font-size:<?php echo $settings->icon_size; ?>px;
        color: #<?php echo $settings->icon_color; ?>;
        width: 60px;
        height: 60px;
        background: #<?php echo $settings->icon_bg_color; ?>;
        opacity: <?php echo $settings->icon_bg_color_opc; ?>;
        display: flex;
        justify-content: center;
        align-items: center;
        <?php
    }else{
        ?>
        font-size:<?php echo $settings->icon_size; ?>px;
        color: #<?php echo $settings->icon_color; ?>;
        width: <?php echo $settings->icon_bg_size; ?>px;
        height: <?php echo $settings->icon_bg_size; ?>px;
        background: #<?php echo $settings->icon_bg_color; ?>;
        opacity: <?php echo $settings->icon_bg_color_opc; ?>;
        border-radius: <?php echo $settings->icon_bg_border_radius; ?>px;
        border-style: <?php echo $settings->icon_border_style; ?>;
        border-width: <?php echo $settings->icon_border_width; ?>px;
        border-color: #<?php echo $settings->icon_border_color; ?>;
        display: flex;
        justify-content: center;
        align-items: center;
        <?php
    };
    ?>
    }
    
        
        
      .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-imageicon-image img{
    <?php
    if ($imagestyle == "simple") {
        ?>
        width:<?php echo $settings->img_size; ?>px;
        <?php
    }else if ($imagestyle == "circle") {
        ?>
        width: 100px;
        height: 100px;
        border-radius: 100%;
        <?php
    }else if($imagestyle == "square") {
        ?>
        width: 100px;
        height: 100px;
        <?php
    }else{
        ?>
        width: <?php echo $settings->img_width; ?>px;
        height: <?php echo $settings->img_height; ?>px;
        border-radius: <?php echo $settings->img_bg_border_radius; ?>px;
        background: #<?php echo $settings->img_bg_color; ?>;
        border-style: <?php echo $settings->img_border_style; ?>;
        border-width: <?php echo $settings->img_border_width; ?>px;
        border-color: #<?php echo $settings->img_border_color; ?>;
        <?php
    };
    ?> 
    
    }   
        
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-imageicon-image img:hover{
        background: #<?php echo $settings->img_bg_hover_color; ?>;
        border-color: #<?php echo $settings->img_border_hover_color; ?>;
    }    

    @media only screen and (min-width : 669px) and (max-width : 993px){
     
    }
    @media only screen and (max-width : 668px){
   
    }   


    <?php
}
?>