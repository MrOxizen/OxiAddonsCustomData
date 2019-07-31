<?php
//echo "<pre>";
//print_r($settings);
//echo "</pre>";
?>
<style>
    .SA-FL-accordion-main-area{
        max-width: 500px;
        height: auto;
        margin: 10px auto;
    }
    .SA-FL-accordions{
        width: 100%;
        height: auto;
        background-color: #f5f5f5;
    }
    .SA-FL-accordion-heading{
        display: block;
        padding: 10px 15px;
        text-decoration: none;
        color: #555;
        font-weight: 600;
        border-bottom: 1px solid #ddd;
        -webkit-transition:all 0.2s linear;
        -moz-transition:all 0.2s linear;
        transition:all 0.2s linear;
    }
    .SA-FL-accordion-heading.active .span-active{
            display: flex;
            align-items: center;
            justify-content: center;
            background: red;
            font-size: 20px;
            width: 100%;
            max-width: 80px;
            height: 80px;
            color: #fff;
            border: 1px solid yellow;
            border-radius: 10px;
            margin: 0px;
            
        }
        .SA-FL-accordion-heading .span-deactive{
            display: flex;
            align-items: center;
            justify-content: center;
            background: blue;
            font-size: 20px;
            width: 100%;    
            max-width: 80px;
            height: 80px;
            color: #fff;
            border: 1px solid green;
            border-radius: 5px;
            margin: 0px;
            
        }
        .SA-FL-accordion-heading:hover{
        background-color:#3399cc;
        color: #fff;
    }
        .SA-FL-accordion-heading:hover .span-deactive{
            color: #fff;
            border-color: yellow;
            background: red;
        }
    .SA-FL-accordion-heading .span-active{
            display: none;
        }
    .SA-FL-accordion-heading.active .span-deactive{
            display: none;
        }
    .SA-FL-accordion-heading.active{
        background-color:#3399cc;
        color: #fff;
    }
    .SA-FL-accordion-conetent{
        background-color: #fff;
        border-bottom: 1px solid #ddd;
        display:none;
        padding: 10px 15px;
        margin: 0;
        color: #333;
    }
    
</style>


<div class="SA-FL-accordion-main-area">
    <?php foreach ($settings->add_accordion as $key => $value) { ?>
            <div class="SA-FL-accordions">
                <div class="SA-FL-accordion-heading" ref="#saacordionsid-<?php echo $key ?>">
                     Vestibulum 
                     <div class="span-active">
                          <i class="fa fa-minus"></i>
                     </div>
                     <div class="span-deactive">
                         <i class="fa fa-plus"></i>
                        
                     </div>
                </div>
                
                <div class="SA-FL-accordion-conetent" id="saacordionsid-<?php echo $key ?>">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.
                </div>
            </div>
           
    <?php } ?>

</div>

<script>








</script>
