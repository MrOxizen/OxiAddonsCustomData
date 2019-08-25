<?php
if (!empty($settings)) {

    

    if ($settings->icon_position == 'left') {
        ?>
        .fl-node-<?php echo $id; ?> .oxi-SA-BB-Icon-Image{
        margin-right: 30px;
        order: 1;
        }
        .fl-node-<?php echo $id; ?> .oxi-SA-BB-List-items-connector a{
            order: 1;
        }
        .fl-node-<?php echo $id; ?> .oxi-SA-BB-content-area{
            order: 2;
            width: 100%;
        }
        .fl-node-<?php echo $id; ?> .oxi-SA-BB-Icon-Image{
            z-index: 2;
            width: 35%;

        }
        .fl-node-<?php echo $id; ?> .oxi-SA-BB-List-items a{
            width: 35%;
        }
        
        .fl-node-<?php echo $id; ?> .oxi-SA-BB-conector{
        left: 14%;
        }

        <?php
    }else if($settings->icon_position == 'right'){
       ?>
         .fl-node-<?php echo $id; ?> .oxi-SA-BB-Icon-Image{
            margin-right: 0px;
            order: 3;
            float: right;
        }
        .fl-node-<?php echo $id; ?> .oxi-SA-BB-Icon-Image{
            z-index: 2;
            width: 35%;
            display: flex;
            justify-content: flex-end;
        }
        .fl-node-<?php echo $id; ?> .oxi-SA-BB-List-items-connector a{
            order: 3;
        }
        .fl-node-<?php echo $id; ?> .oxi-SA-BB-content-area{
            order: 2;
            width: 100%;
        }
        
        .fl-node-<?php echo $id; ?> .oxi-SA-BB-conector{
        right: 9%;
        }  
           
        <?php 
    }else if($settings->icon_position == 'top'){
        
    }else{
        
    }
    ?>
    
    .fl-node-<?php echo $id; ?>  .oxi-SA-BB-List-items-connector a{
        width: 100%;
     }
     .fl-node-<?php echo $id; ?>  .oxi-SA-BB-Icon-Image a{
        width: 100%;
        justify-content: flex-end;
        display: flex;
     }
    .fl-node-<?php echo $id; ?> .oxi-SA-BB-Image img{
        width: 90px;
    }
    
    .fl-node-<?php echo $id; ?> .oxi-SA-BB-Icon{
        font-size: 80px;
    }
        
        <?php
}
