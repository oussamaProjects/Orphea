<?php
/** 
 * Plugin Name: Orphéa - Offres d'emploi
 * Plugin URI: http://www.magina.fr/
 * Description: Ajoute un type "job_offer" pour gérer les offres publiées dans la partie Recrutement.
 * Version: 1.0
 * Author: Magina
 * Author URI: http://www.magina.fr/
 * License: Copyright - Don't copy.
 * 
 * Text Domain: orphea_emploi
 * Domain Path: /languages
*/

#----------------------------------------------------------------------------------------#
#-- LANGUAGE LOCALIZATION ---------------------------------------------------------------#
#----------------------------------------------------------------------------------------#

function orphea_emploi_load_translation_files() {
	
	load_plugin_textdomain( 'orphea_emploi', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	
}
add_action('plugins_loaded', 'orphea_emploi_load_translation_files');


#----------------------------------------------------------------------------------------#
#-- CUSTOM POST TYPES CREATION ----------------------------------------------------------#
#----------------------------------------------------------------------------------------#

include_once('inc/inc-custom-post-type.php');


#----------------------------------------------------------------------------------------#
#-- SHORTCODE CREATION ------------------------------------------------------------------#
#----------------------------------------------------------------------------------------#

include_once('inc/inc-shortcode.php');


#----------------------------------------------------------------------------------------#
#-- METABOXES CREATION ------------------------------------------------------------------#
#----------------------------------------------------------------------------------------#

include_once('inc/inc-metaboxes.php');


#-- END OF CODE -------------------------------------------------------------------------#