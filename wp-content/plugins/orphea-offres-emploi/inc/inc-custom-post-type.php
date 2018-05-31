<?php

#----------------------------------------------------------------------------------------#
#-- CUSTOM POST TYPES CREATION ----------------------------------------------------------#
#----------------------------------------------------------------------------------------#


// Register Custom Post Type
function orphea_add_custom_post_type_job_offer() {

	$labels = array(
		'name'                  => _x( 'Jobs', 'Post Type General Name', 'orphea_emploi' ),
		'singular_name'         => _x( 'Job Offer', 'Post Type Singular Name', 'orphea_emploi' ),
		'menu_name'             => __( 'Jobs', 'orphea_emploi' ),
		'name_admin_bar'        => __( 'Job Offer', 'orphea_emploi' ),
		'archives'              => __( 'Jobs', 'orphea_emploi' ),
		'attributes'            => __( 'Job Attributes', 'orphea_emploi' ),
		'parent_item_colon'     => __( 'Parent Job:', 'orphea_emploi' ),
		'all_items'             => __( 'All Jobs', 'orphea_emploi' ),
		'add_new_item'          => __( 'Add New Job', 'orphea_emploi' ),
		'add_new'               => __( 'Add Job', 'orphea_emploi' ),
		'new_item'              => __( 'New Job', 'orphea_emploi' ),
		'edit_item'             => __( 'Edit Job', 'orphea_emploi' ),
		'update_item'           => __( 'Update Job', 'orphea_emploi' ),
		'view_item'             => __( 'View Job', 'orphea_emploi' ),
		'view_items'            => __( 'View Jobs', 'orphea_emploi' ),
		'search_items'          => __( 'Search Job', 'orphea_emploi' ),
		'not_found'             => __( 'Not found', 'orphea_emploi' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'orphea_emploi' ),
		'featured_image'        => __( 'Featured Image', 'orphea_emploi' ),
		'set_featured_image'    => __( 'Set featured image', 'orphea_emploi' ),
		'remove_featured_image' => __( 'Remove featured image', 'orphea_emploi' ),
		'use_featured_image'    => __( 'Use as featured image', 'orphea_emploi' ),
		'insert_into_item'      => __( 'Insert into job', 'orphea_emploi' ),
		'uploaded_to_this_item' => __( 'Uploaded to this job', 'orphea_emploi' ),
		'items_list'            => __( 'Jobs list', 'orphea_emploi' ),
		'items_list_navigation' => __( 'Jobs list navigation', 'orphea_emploi' ),
		'filter_items_list'     => __( 'Filter jobs list', 'orphea_emploi' ),
	);
	$args = array(
		'label'                 => __( 'Job offer', 'orphea_emploi' ),
		'description'           => __( 'Manage All Job offer', 'orphea_emploi' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'revisions' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_icon'							=> 'dashicons-id-alt',
		'menu_position'         => 8,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'capability_type'       => 'post',
	);
	register_post_type( 'job_offer', $args );


}

// Hook into the 'init' action
add_action( 'init', 'orphea_add_custom_post_type_job_offer', 0 );




# Ajoute une nouvelle colonne avec la vignette dans la page d'admin :
function orphea_add_job_offer_columns($columns) {
	
	// Insert new columns : 
	$columns = array_slice($columns, 0, 2) + array('application' => __('Number of Applications', 'orphea_emploi')) + array_slice($columns, 2, count($columns)-1);
    return $columns;
	
}
add_filter('manage_job_offer_posts_columns' , 'orphea_add_job_offer_columns');


function orphea_manage_job_offer_columns( $column, $post_id ) {
    
	switch ( $column ) {
        case 'application' :
			
			global $wpdb;
			$count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) AS count FROM ".$wpdb->prefix."rg_lead_detail WHERE form_id = %d AND field_number = %d AND value = %d", 2, 12, get_post_meta($post_id, '_job_offer_reference', true)));
			if($count > 0){
				echo '<a href="'.admin_url('admin.php?page=gf_entries&view=entries&id=2&sort=0&dir=DESC&s='.get_post_meta($post_id, '_job_offer_reference', true).'&star=null&read=null&field_id=12&operator=is').'" style="padding-left:15px;">'.$count.'</a>';	
			}
			else{
				echo '<span style="color:red; padding-left:15px;">0</span>';	
			}
            break;
    }
	
}
add_action( 'manage_job_offer_posts_custom_column', 'orphea_manage_job_offer_columns', 10, 2 );



#-- END OF CODE -------------------------------------------------------------------------#