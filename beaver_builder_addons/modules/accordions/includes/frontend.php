<?php
//echo "<pre>";
//print_r($settings);
//echo "</pre>";
?>
<style>
    .SA-FL-accordion-header{
        width: 100%;
        float: left;
        cursor: pointer;
        display: flex;
        align-items: center;
        border: 1px solid #000;
        border-radius: 5px;
        padding: 10px;
    }
    .span-deactive{
            display: flex;
            float: left;
            align-items: center;
            justify-content: center;
            background: red;
            font-size: 20px;
            width: 100%;    
            max-width: 100px;
            height: 100px;
            color: blue;
            border: 1px solid yellow;
            border-radius: 5px;
            margin: 10px;
            
        }
        .SA-FL-accordion-header.active .span-active{
            display: flex;
            float: left;
            align-items: center;
            justify-content: center;
             background: red;
            font-size: 20px;
            width: 100%;    
            max-width: 100px;
            height: 100px;
            color: blue;
            border: 1px solid yellow;
            border-radius: 5px;
            margin: 10px;
            
        }
        .SA-FL-accordion-header:hover .span-deactive{
            color: white;
            border-color: green;
            background: blue; 
        }
        .SA-FL-accordion-header .span-active{
            display: none;
        }
        .SA-FL-accordion-header.active .span-deactive{
            display: none;
        }
</style>


<div class="SA-FL-accordion-main-area">
    <?php foreach ($settings->add_accordion as $value) { ?>
        <div class="SA-FL-accordion-area">
            <div class="SA-FL-accordion-header" ref="#hello">
                <div class="span-active">icon one</div>
                <div class="span-deactive">icon two</div>
                <div class="heading-data">This is accordion</div>
            </div>
            <div class="SA-FL-accordion-details-area" id="hello">
                <div class="SA-FL-accordion-details">
                    loreal i's taata taata d'art boa poaceous
                </div>
            </div>
        </div>  

    <?php } ?>

</div>


