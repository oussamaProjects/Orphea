<?php
/**
 * Orphea Theme Customizer
 *
 * @package Orphea
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function orphea_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'orphea_customize_partial_blogname',
			) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'orphea_customize_partial_blogdescription',
			) );
	}
}
add_action( 'customize_register', 'orphea_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function orphea_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function orphea_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function orphea_customize_preview_js() {
	wp_enqueue_script( 'orphea-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'orphea_customize_preview_js' );



add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
	echo '<style>
	table.acf-input-table.row_layout > tbody > tr > td { 
		border-top: 6px solid #971a6b !important;
	}
</style>';
}