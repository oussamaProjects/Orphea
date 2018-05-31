<?php

add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );


add_action('display_calculator_rio', 'calculator_rio', 10, 1);
function calculator_rio($isHome = FALSE) {

}
