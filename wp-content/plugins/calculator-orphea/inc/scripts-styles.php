<?php

#----------------------------------------------------------------------------------------#
#-- SCRIPTS & STYLES --------------------------------------------------------------------#
#----------------------------------------------------------------------------------------#


/**
 * Register and Enqueue scripts & styles for Publication PROlib
 */
function calculator_load_custom_wp_style() {
  wp_register_script( 'calculator_script', plugins_url('../js/scripts-calculator.js', __FILE__), array(), '1.0.0' );
		    wp_enqueue_script( 'calculator_script' );

  wp_register_style( 'calculator_style', plugins_url('../css/style-calculator.css', __FILE__), false, '1.0.0' );
			wp_enqueue_style( 'calculator_style');

}

add_action( 'wp_enqueue_scripts', 'calculator_load_custom_wp_style' );
