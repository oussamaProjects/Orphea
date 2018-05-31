<?php
/**
 * Functions which create posts type
 *
 * @package Orphea
 */

 function cptui_register_my_cpts() {

	/**
	 * Post Type: Chiffres clés.
	 */

	$labels = array(
		"name" => __( "Chiffres clés", "orphea" ),
		"singular_name" => __( "Chiffre clés", "orphea" ),
	);

	$args = array(
		"label" => __( "Chiffres clés", "orphea" ),
		"labels" => $labels,
		"description" => "",
		"public" => false,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "chiffres_cles", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "chiffres_cles", $args );

	/**
	 * Post Type: CTAs.
	 */

	$labels = array(
		"name" => __( "CTAs", "orphea" ),
		"singular_name" => __( "CTA", "orphea" ),
	);

	$args = array(
		"label" => __( "CTAs", "orphea" ),
		"labels" => $labels,
		"description" => "",
		"public" => false,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "cta", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-admin-links",
		"supports" => array( "title", "thumbnail" ),
	);

	register_post_type( "cta", $args );

	/**
	 * Post Type: Cas clients.
	 */

	$labels = array(
		"name" => __( "Cas clients", "orphea" ),
		"singular_name" => __( "Cas client", "orphea" ),
	);

	$args = array(
		"label" => __( "Cas clients", "orphea" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "cas_client", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 8,
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "cas_client", $args );

	/**
	 * Post Type: Clients.
	 */

	$labels = array(
		"name" => __( "Clients", "orphea" ),
		"singular_name" => __( "Client", "orphea" ),
	);

	$args = array(
		"label" => __( "Clients", "orphea" ),
		"labels" => $labels,
		"description" => "",
		"public" => false,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "client", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 7,
		"menu_icon" => "dashicons-admin-users",
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "client", $args );

	/**
	 * Post Type: Articles de bas de pages.
	 */

	$labels = array(
		"name" => __( "Articles de bas de pages", "orphea" ),
		"singular_name" => __( "Article de bas de pages", "orphea" ),
	);

	$args = array(
		"label" => __( "Articles de bas de pages", "orphea" ),
		"labels" => $labels,
		"description" => "",
		"public" => false,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "articles_bas_pages", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 9,
		"menu_icon" => "dashicons-format-aside",
		"supports" => array( "title", "editor", "thumbnail", "excerpt" ),
	);

	register_post_type( "articles_bas_pages", $args );

	/**
	 * Post Type: Publications.
	 */

	$labels = array(
		"name" => __( "Publications", "orphea" ),
		"singular_name" => __( "Publication", "orphea" ),
	);

	$args = array(
		"label" => __( "Publications", "orphea" ),
		"labels" => $labels,
		"description" => "",
		"public" => false,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "pub", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 5,
		"menu_icon" => "dashicons-calendar",
		"supports" => array( "title", "editor", "thumbnail", "excerpt", "post-formats" ),
		"taxonomies" => array( "post_tag", "categories_pub" ),
	);

	register_post_type( "pub", $args );

	/**
	 * Post Type: Témoignages.
	 */

	$labels = array(
		"name" => __( "Témoignages", "orphea" ),
		"singular_name" => __( "Témoignage", "orphea" ),
	);

	$args = array(
		"label" => __( "Témoignages", "orphea" ),
		"labels" => $labels,
		"description" => "",
		"public" => false,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "temoignage", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-format-status",
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "temoignage", $args );

	/**
	 * Post Type: Articles de presse.
	 */

	$labels = array(
		"name" => __( "Articles de presse", "orphea" ),
		"singular_name" => __( "Article de presse", "orphea" ),
	);

	$args = array(
		"label" => __( "Articles de presse", "orphea" ),
		"labels" => $labels,
		"description" => "",
		"public" => false,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "article_presse", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-media-document",
		"supports" => array( "title" ),
	);

	register_post_type( "article_presse", $args );

	/**
	 * Post Type: Vidéos.
	 */

	$labels = array(
		"name" => __( "Vidéos", "orphea" ),
		"singular_name" => __( "Vidéo", "orphea" ),
	);

	$args = array(
		"label" => __( "Vidéos", "orphea" ),
		"labels" => $labels,
		"description" => "",
		"public" => false,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "publication_video", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-format-video",
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "publication_video", $args );

	/**
	 * Post Type: Références.
	 */

	$labels = array(
		"name" => __( "Références", "orphea" ),
		"singular_name" => __( "Référence", "orphea" ),
		"menu_name" => __( "Glossaire", "orphea" ),
		"all_items" => __( "Toutes les références", "orphea" ),
		"add_new" => __( "Ajouter nouvelle", "orphea" ),
		"add_new_item" => __( "Ajouter nouvelle référence", "orphea" ),
		"edit_item" => __( "Modifier la référence", "orphea" ),
		"new_item" => __( "Nouvelle référence", "orphea" ),
		"view_item" => __( "Voir la référence", "orphea" ),
		"view_items" => __( "Voir les références", "orphea" ),
		"search_items" => __( "Chercher une référence", "orphea" ),
		"not_found" => __( "Aucune référence trouvée", "orphea" ),
		"not_found_in_trash" => __( "Aucune référence trouvée dans la corbeille", "orphea" ),
		"parent_item_colon" => __( "Référence parente", "orphea" ),
		"archives" => __( "Glossaire Archives", "orphea" ),
		"insert_into_item" => __( "Insérer dans la référence", "orphea" ),
		"uploaded_to_this_item" => __( "Mis en ligne sur cette référence", "orphea" ),
		"filter_items_list" => __( "Filtrer la liste de références", "orphea" ),
		"items_list_navigation" => __( "Navigation parmi les références", "orphea" ),
		"items_list" => __( "Liste des références", "orphea" ),
		"parent_item_colon" => __( "Référence parente", "orphea" ),
	);

	$args = array(
		"label" => __( "Références", "orphea" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => "glossaire",
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "glossaire", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 8,
		"menu_icon" => "dashicons-editor-textcolor",
		"supports" => array( "title", "editor" ),
	);

	register_post_type( "glossaire_ref", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );
