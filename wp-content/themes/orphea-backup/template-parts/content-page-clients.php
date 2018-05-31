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


				<div class="clients-list">
					<div class="row">
						<div class="col-lg-10 offset-lg-1">
							<div class="clients-cat-links">
								<?php $selected_term = ( isset($_GET['term']) && !empty($_GET['term']) ) ? $_GET['term'] : null; ?>
								<a href="<?php echo get_page_link('clients') ?>" <?php if(!$selected_term) echo 'class="active"' ?>>Tous</a>
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
											'post_type' => 'client',
											'posts_per_page'    => -1,
											'orderby' => 'title',
											'order' => 'ASC'
									)
							);


					if ( $the_query->have_posts() ) : ?>
					<div class="row">
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<div class="client-block-container col-md-3">
								<div class="client-block">
									<div class="client-logo">
										<?php the_post_thumbnail(); ?>
									</div>
									<div class="client-links">
										<?php if(count(get_field('cas_client_lie'))): ?>
											<?php foreach(get_field('cas_client_lie') as $cas_lie):?>
												<a href="<?php the_permalink($cas_lie); ?>">Voir le cas clients</a>
											<?php endforeach; ?>
											<?php if(get_field('site_du_client')): ?>
												<span>&nbsp;|&nbsp;</span>
											<?php endif; ?>
										<?php endif; ?>
										<?php if(get_field('site_du_client')): ?>
											<a href="<?php echo get_field('site_du_client'); ?>" target="_blank">Voir le site public</a>
										<?php endif; ?>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
					<?php wp_reset_postdata(); ?>
					<?php else : ?>
						<p><?php __('Aucun client trouvé', 'orphea'); ?></p>
					<?php endif; ?>
				</div>

				<?php include( realpath(dirname(__FILE__) ).'/footer/articles_bas_pages.php' ); ?>

			</div>

		</div>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->


