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

			<?php include( realpath(dirname(__FILE__) ).'/parts/page_head.php' ); ?>


			<?php
			// The following should be used for the landing page
			if($_SERVER['HTTP_X_REAL_IP'] == '90.63.230.42' && FALSE) { ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php
							the_content();

							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'prolib' ),
								'after'  => '</div>',
							) );
						?>
					</div><!-- .entry-content -->

					<?php if ( get_edit_post_link() ) : ?>
						<footer class="entry-footer">
							<?php
								edit_post_link(
									sprintf(
										/* translators: %s: Name of current post */
										esc_html__( 'Edit %s', 'prolib' ),
										the_title( '<span class="screen-reader-text">"', '"</span>', false )
									),
									'<span class="edit-link">',
									'</span>'
								);
							?>
						</footer><!-- .entry-footer -->
					<?php endif; ?>
				</article><!-- #post-## -->
				<?php
			}
			?>

			<?php include( realpath(dirname(__FILE__) ).'/parts/page_orphea_alternative_contents.php' ); ?>

			<?php include( realpath(dirname(__FILE__) ).'/footer/ctas_area_pages.php' ); ?>

			<?php include( realpath(dirname(__FILE__) ).'/footer/articles_bas_pages.php' ); ?>


		</div>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
