<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Orphea
 */

/* Template Name: Home */
get_header(); ?>

<?php include 'template-parts/home/home_header.php'; ?>



<div id="page_modele" class="index">

	<div class="container">

		<div class="row">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="col-lg-8 offset-lg-0 offset-md-1 col-md-10">
					<div class="titre_container">
						<div class="titre">
							<?php the_field("titre_page"); ?>
						</div>
					</div>

					<div class="decription">
						<?php the_content(); ?>
					</div>

					<?php if( have_rows('home_points_forts') ): ?>
						<?php while(have_rows('home_points_forts')) : the_row(); ?>
							<div class="point-fort">
								<div class="pf_icone"><img src="<?php echo get_sub_field('home_pf_icone');?>" alt=""></div>
								<div class="pf_desc"><?php _e(get_sub_field('home_pf_texte'), 'orphea') ?></div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>

				</div>
			<?php endwhile; ?>

			<div class="col-lg-4 offset-lg-0 offset-md-1 col-md-10">
				<div class="chiffre_cles">

					<div class="decription">
						<p>
							<?php if(get_field('home_des_chiffres_cles')): ?>
								<?php _e( get_field('home_des_chiffres_cles'), 'orphea' ) ?>
							<?php endif; ?>
						</p>
					</div>

					<div class="chiffres">
						<?php if( have_rows('home_chiffres_cles') ): ?>
							<?php while(have_rows('home_chiffres_cles')) : the_row(); ?>
								<div class="chiffre">
									<div class="titre"><?php the_sub_field('home_chiffre_cle'); ?></div>
									<div class="desc_chiffre"><?php _e( get_sub_field('home_texte_chiffre_cle'), 'orphea' ) ?></div>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
						<a href="<?php the_permalink(get_page_by_path('orphea')); ?>" class="btn btn-outline-white btn-en-savoir"><?php _e( 'En savoir +', 'orphea' ) ?></a>
					</div>

				</div>
				<?php $args = array( 'post_type' => 'post', 'posts_per_page' => 1,'orderby' => 'date', 'order'   => 'DESC', );
				$latest = new WP_Query( $args );
				$post_id = wp_list_pluck( $latest->posts, 'ID' );
				$post = get_post( $post_id[0] );
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id[0]), 'large' ); ?>

				<div class="news first home">
					<span class="type-article"></span>
					<div class="titre">
						<?php echo $post->post_title; ?>
					</div>
					<a href="<?php the_permalink();?>" class="btn custom-btn"><?php _e( 'Lire la suite', 'orphea' ) ?></a>
				</div>
			</div>
			<div class="news-img-container">
				<img src="<?php echo $large_image_url[0]; ?>" alt="" class="news_img">
			</div>

		</div>
	</div>

	<br>
	<br>

	<div class="calculator">
		<div class="title"><?= __('Vous avez un doute sur l\'apport du Digital Asset Management ?', 'orphea');?></div>
		<?= do_shortcode('[gravityform id="4" title="false" description="false" ajax="true"]'); ?>
		<div class="clearfix"></div>
	</div>

	<?php get_template_part( 'template-parts/content', 'temoignage' ); ?>

	<?php
	$the_query = new WP_Query( array(
		'post_type' => 'client'
		)
	);
	?>

	<?php if ( $the_query->have_posts() ) : ?>
		<div id="home_clients">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div id="home_clients_slider" class="owl-carousel owl-theme">
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<div class="client items">
									<?php the_post_thumbnail(); ?>

								</div>
							<?php endwhile; ?>
						</div>
						<div class="content-btn-container" style="text-align: center; margin: 50px 0;">
							<a href="/clients" class="btn content-btn" style="position: relative;right: auto;"><?= __('All our clients', 'orphea');?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php wp_reset_postdata(); ?>

	<?php else : ?>
		<p><?php __('Aucun client trouvé', 'orphea'); ?></p>
	<?php endif; ?>

	<div class="livre_blanc bandeau">
		<?php if(get_field('bg_img_livres_blancs')): ?>
			<img src="<?php the_field('bg_img_livres_blancs'); ?>" alt="">
		<?php endif; ?>
		<div class="info">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 offset-lg-0 offset-md-2 col-md-8">
						<div class="image">
							<?php if(get_field('image_livres_blancs')): ?>
								<img src="<?php the_field('image_livres_blancs'); ?>" alt="">
							<?php endif; ?>
						</div>
					</div>
					<div class="col-lg-6 offset-lg-0 offset-md-2 col-md-8">
						<div class="sous_titre">
							<?php if(get_field('sous_titre_livres_blancs')): ?>
								<?php _e( get_field('sous_titre_livres_blancs'), 'orphea' ); ?>
							<?php endif; ?>
						</div>
						<div class="titre">
							<?php if(get_field('titre_livres_blancs')): ?>
								<?php _e( get_field('titre_livres_blancs'), 'orphea' ); ?>
							<?php endif; ?>
						</div>
						<div class="description">
							<?php if(get_field('description_livres_blancs')): ?>
								<?php _e( get_field('description_livres_blancs'), 'orphea' ); ?>
							<?php endif; ?>
						</div>
						<div class="btns">
							<a href="<?php echo get_field('url_bouton_1'); ?>" class="btn custom-btn"><?php _e( get_field('texte_bouton_1'), 'orphea' ); ?></a>
							<a href="<?php echo get_field('url_bouton_2'); ?>" class="btn custom-btn"><?php _e( get_field('texte_bouton_2'), 'orphea'); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php
get_footer();
