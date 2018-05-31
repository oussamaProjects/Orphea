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
					<div class="row">
						<div class="col-lg-10 offset-lg-1">
							<div class="clients-cat-links">
								<?php $selected_term = ( isset($_GET['term']) && !empty($_GET['term']) ) ? $_GET['term'] : null; ?>
								<a href="<?php echo get_page_link('clients') ?>" <?php if(!$selected_term) echo 'class="active"' ?>><?php _e('Tous', 'orphea');?></a>
								<?php
								$terms = get_terms('type_activite');
								foreach($terms as $term){
									echo '<a href="'.get_page_link('clients').'?term=' . $term->slug . '" class="'.($selected_term == $term->slug ? 'active' : '').'">' . $term->name . '</a>';
								} ?>
							</div>
						</div>
					</div>
					<?php $the_query = $selected_term ?
					new WP_Query( array(
						'post_type'         => 'client',
						'post_status'				=> 'publish',
						'posts_per_page'    => 20,
						'orderby' => 'title',
						'order' => 'ASC',
						'tax_query' => array(
							array(
								'taxonomy' => 'type_activite',
								'field' => 'slug',
								'terms' => array( $selected_term )
								)
							),
						'paged'   => 1
						)
					) : new WP_Query(
					array(
						'post_type' => 'client',
						'post_status'						=> 'publish',
						'posts_per_page'    => 20,
						'orderby' => 'title',
						'order' => 'ASC',
						'paged'   => 1
						)
					);


					if ( $the_query->have_posts() ) : ?>
					<div class="row">
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<div class="client-block-container thearticle col-lg-3 col-md-4">
								<div class="client-block">
									<div class="client-logo">
										<?php the_post_thumbnail(); ?>
									</div>
									<div class="client-links">
										<?php if(count(get_field('cas_client_lie'))): ?>
											<?php foreach(get_field('cas_client_lie') as $cas_lie):?>
												<a href="<?php the_permalink($cas_lie); ?>"><?php _e('Voir le cas clients', 'orphea'); ?></a>
											<?php endforeach; ?>
											<?php if(get_field('site_du_client')): ?>
												<span>&nbsp;|&nbsp;</span>
											<?php endif; ?>
										<?php endif; ?>
										<?php if(get_field('site_du_client')): ?>
											<a href="<?php echo get_field('site_du_client'); ?>" target="_blank"><?php _e('Voir le site public', 'orphea'); ?></a>
										<?php endif; ?>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
						<div class="client-block-container col-lg-3 col-md-4">
							<div class="voir-cas-block">
								<a href="<?php the_permalink(get_page_by_path('cas-clients')); ?>"><?php _e('Voir les cas clients', 'orphea'); ?></a>
							</div>
						</div>
					</div>
					<?php
					if (  $the_query->max_num_pages > 1 )
						echo '<div class="load-more-container"><div class="misha_loadmore">' . __('Afficher plus', 'orphea') . '</div></div>';
					?>
					<?php wp_reset_postdata(); ?>
				<?php else : ?>
					<p><?php __('Aucun client trouvé', 'orphea'); ?></p>
				<?php endif; ?>
			</div>

		</div>

		<?php include( realpath(dirname(__FILE__) ).'/footer/ctas_area_pages.php' ); ?>
		<?php include( realpath(dirname(__FILE__) ).'/footer/articles_bas_pages.php' ); ?>


	</div>
</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
