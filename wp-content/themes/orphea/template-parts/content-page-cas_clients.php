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

			<div class="container">

				<div class="clients-list">
					<!--					Le test suivant pour prévoir un filtrage au future-->
					<?php $the_query = $selected_term ?
					new WP_Query( array(
						'post_type'         => 'cas_client',
						'posts_per_page'    => -1,
						'orderby' => 'title',
						'order' => 'ASC',
						'tax_query' => array(
							array(
								'taxonomy' => 'type_activite',
								'field' => 'slug',
								'terms' => array( $selected_term )
								)
							),
						)
					) : new WP_Query(
					array(
						'post_type' => 'cas_client',
						'posts_per_page'    => -1,
						'orderby' => 'title',
						'order' => 'ASC'
						)
					);


					if ( $the_query->have_posts() ) : ?>
					<div class="row">
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<div class="client-cases-block-container col-md-6">
								<div class="client-case-block">
									<div class="client-case-thumbnail">
										<?php the_post_thumbnail(); ?>
									</div>
									<a class="client-case-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
					<?php wp_reset_postdata(); ?>
					<?php else : ?>
						<p><?php __('Aucun cas client trouvé', 'orphea'); ?></p>
					<?php endif; ?>
				</div>
			</div>

			<?php include( realpath(dirname(__FILE__) ).'/footer/articles_bas_pages.php' ); ?>


		</div>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
