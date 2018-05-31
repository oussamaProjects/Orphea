<?php

#----------------------------------------------------------------------------------------#
#-- METABOXES CREATION ------------------------------------------------------------------#
#----------------------------------------------------------------------------------------#


// Register custom metabox : Candidatures :
function orphea_job_answers(){
	
	# Get Current post id : 
	if ( isset( $_GET['post'] ) ) $post_id = intval( $_GET['post'] );
	elseif ( isset( $_POST['post_ID'] ) ) $post_id = intval( $_POST['post_ID'] );
	else $post_id = false;
	$post_id = (int) $post_id;
	
	# Get comments : 
	?>
    <div class="candidatures">
		<?php
        global $wpdb;
		$count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) AS count FROM ".$wpdb->prefix."rg_lead_detail WHERE form_id = %d AND field_number = %d AND value = %d", 2, 12, get_post_meta($post_id, '_job_offer_reference', true)));
		if($count > 1){
			echo '<p>Cette offre a reçu '.$count.' candidatures : </p>';	
		}
		else if($count == 1){
			echo '<p>Cette offre a reçu 1 candidature : </p>';	
		}
		else{
			echo '<p style="color:red;">Cette offre n\'a reçu aucune candidature pour le moment.</p>';	
		}
		if($count > 0){
			
			$leads = $wpdb->get_results($wpdb->prepare("SELECT lead_id FROM ".$wpdb->prefix."rg_lead_detail WHERE form_id = %d AND field_number = %d AND value = %d", 2, 12, get_post_meta($post_id, '_job_offer_reference', true)));
			echo '<table class="leads_candidatures" style="width: 100%; border:1px solid #eee;"><thead style="background:#eee; height:32px; line-height:32px;"><tr><th>Nom</th><th>Téléphone</th><th>E-mail</th><th>CV</th><th>Lettre de motivation</th><th>Autre fichier</th></tr></thead><tbody>';
			foreach($leads as $lead){
				$lead_nom 		= $wpdb->get_var($wpdb->prepare("SELECT value FROM ".$wpdb->prefix."rg_lead_detail WHERE form_id = %d AND field_number = %d AND lead_id = %d", 2, 14, $lead->lead_id));
				$lead_prenom 	= $wpdb->get_var($wpdb->prepare("SELECT value FROM ".$wpdb->prefix."rg_lead_detail WHERE form_id = %d AND field_number = %d AND lead_id = %d", 2, 15, $lead->lead_id));
				$lead_phone 	= $wpdb->get_var($wpdb->prepare("SELECT value FROM ".$wpdb->prefix."rg_lead_detail WHERE form_id = %d AND field_number = %d AND lead_id = %d", 2, 6, $lead->lead_id));
				$lead_email 	= $wpdb->get_var($wpdb->prepare("SELECT value FROM ".$wpdb->prefix."rg_lead_detail WHERE form_id = %d AND field_number = %d AND lead_id = %d", 2, 7, $lead->lead_id));
				$lead_cv 		= $wpdb->get_var($wpdb->prepare("SELECT value FROM ".$wpdb->prefix."rg_lead_detail WHERE form_id = %d AND field_number = %d AND lead_id = %d", 2, 9, $lead->lead_id));
				$lead_lettre 	= $wpdb->get_var($wpdb->prepare("SELECT value FROM ".$wpdb->prefix."rg_lead_detail WHERE form_id = %d AND field_number = %d AND lead_id = %d", 2, 16, $lead->lead_id));
				$lead_other_file 	= $wpdb->get_var($wpdb->prepare("SELECT value FROM ".$wpdb->prefix."rg_lead_detail WHERE form_id = %d AND field_number = %d AND lead_id = %d", 2, 17, $lead->lead_id));
				echo '<tr style="height:24px; line-height:24px; text-align:center;"><td>'.$lead_prenom.' '.$lead_nom.'</td><td>'.$lead_phone.'</td><td>'.$lead_email.'</td><td>';
				if($lead_cv){ echo '<a href="'.$lead_cv.'" target="_blank">Télécharger</a>'; } else{ echo ' - ';} 
				echo '</td><td>';
				if($lead_lettre){ echo '<a href="'.$lead_lettre.'" target="_blank">Télécharger</a>'; } else{ echo ' - '; } 
				echo '</td><td>';
				if($lead_other_file){ echo '<a href="'.$lead_other_file.'" target="_blank">Télécharger</a>'; } else{ echo ' - '; }
				echo '</td></tr>';
					
			}
			echo '</tbody></table>';
				
		}
        ?>
    </div>    
    <?php

}
# Register custom metabox : Candidat's Profile :
add_action( 'add_meta_boxes', 'orphea_add_candidature_metabox');
function orphea_add_candidature_metabox(){
	add_meta_box( 'orphea_job_answers', __( 'Candidatures', 'orphea_emploi' ), 'orphea_job_answers', 'job_offer', 'advanced' );
}

