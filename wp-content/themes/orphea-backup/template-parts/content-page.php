<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Orphea
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content"> 

		<div id="page_modele">


			<div class="container">

				<?php include( realpath(dirname(__FILE__) ).'/parts/page_head.php' ); ?>

				<?php include( realpath(dirname(__FILE__) ).'/parts/page_alternative_contents.php' ); ?>

				<?php include( realpath(dirname(__FILE__) ).'/footer/articles_bas_pages.php' ); ?>

			</div>

		</div>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->

