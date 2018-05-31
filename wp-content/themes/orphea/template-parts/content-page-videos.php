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

			<?php include(realpath(dirname(__FILE__)) . '/parts/page_head.php'); ?>

			<div class="container">

				<div class="">
					<?php $the_query = new WP_Query(
						array(
							'post_type' => 'publication_video',
							'posts_per_page'    => -1
							)
						);


						if ( $the_query->have_posts() ) : ?>
						<div class="row videos-block-container">
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<div class="col-lg-4 col-md-6">
									<div class="video-block">
										<div class="video-thumbnail">
											<?php the_post_thumbnail(); ?>
											<img class="video-play-icon" data-toggle="modal" data-target="#modal<?php the_ID(); ?>" src="<?php echo get_template_directory_uri(); ?>/img/video_play_icon.png" alt="Orphea">
										</div>
										<div class="video-title">
											<?php the_title(); ?>
										</div>
									</div>
								</div>
								<!-- Modal -->
								<div class="modal fade" id="modal<?php the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="exampleModalLabel"><?php the_title(); ?></h4>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<?php
												if(get_field('url_video_ext')){
													global $wp_embed;
													$video_url = get_field('url_video_ext');
													echo $wp_embed->run_shortcode( '[embed]' . $video_url . '[/embed]' );
												}
												?>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
											</div>
										</div>
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


