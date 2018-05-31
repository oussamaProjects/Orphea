<?php

/**
 * Template Name: Template Download
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Orphea
 */

get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">

		<div id="page_modele">


      <?php include( realpath(dirname(__FILE__) ).'/template-parts/parts/page_head.php' ); ?>
      <div class="container">

       <div class="main_block">
        <div class="row">
          <div class="col-md-6 offset-3">
            <div class="contactform">
             <?php
						 $idToDownload = '';
						 if(!empty($_GET['id_file']))
						 		$idToDownload = intval($_GET['id_file']);

						 if(!empty($_POST) && !empty($_GET['id_file'])) {
							 echo sprintf( wp_kses( __( '<a href="%s" style="color: #84175d; text-decoration: underline;" download="">Votre document</a>.', 'orphea' ), array(  'a' => array( 'href' => array(), 'download' => array(), 'style' => array() ) ) ), esc_url( wp_get_attachment_url($idToDownload) ) );
						 }

						 echo do_shortcode('[gravityform id="6" title="true" description="true" field_values="file_dwl='.$idToDownload.'"]');
						  ?>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

</div>
</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->

<?php
get_footer();
