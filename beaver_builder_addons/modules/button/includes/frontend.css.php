<?php
SA_FLBUILDER_HELPER::sa_fl_border_package($settings, 'front_border', '.fl-node-' . $id . ' .oxi__button');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('button', $settings, 'margin', '.fl-node-' . $id . ' .oxi__button', 'px');





SA_FLBUILDER_HELPER::sa_fl_responsive_setting('background-color', $settings, 'button_background_color', '.fl-node-' . $id . ' .oxi__button');

if (!empty($settings)) {
    ?>


    .fl-node-<?php echo $id; ?> .oxi__button{
    <?php
    // Helper::sa_fl_custom_padding_margin('button', $settings->front_border, '');
    // Helper::sa_fl_custom_box_shadow($settings->box_shadow);


    ?>
    transition: all 0.5s ease;
    }
    .fl-node-<?php echo $id; ?> .oxi__button:hover{
    <?php
    SA_FLBUILDER_HELPER::sa_fl_custom_box_shadow($settings->hover_box_shadow);
    ?>
    }




    @media only screen and (min-width : 669px) and (max-width : 993px){
    .fl-node-<?php echo $id; ?> .oxi__button{
    <?php
    // Helper::custom_padding_margin('button', $settings, 'medium');
    ?>
    }
    }
    @media only screen and (max-width : 668px){
    .fl-node-<?php echo $id; ?> .oxi__button{
    <?php
    // Helper::custom_padding_margin('button', $settings, 'responsive');
    ?>
    }
    }

<?php }
?>