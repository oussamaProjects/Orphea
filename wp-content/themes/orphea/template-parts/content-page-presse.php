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

		<!-- Begin page head -->
		<div class="container">
			<?php
			if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('
			<p id="breadcrumbs">','</p>
			');
			}
			?>

			<?php if (get_field('sous_titre_page') || get_field('titre_page') ): ?>
				<div class="titre_container">
					<div class="row">
						<div class="col-md-6 ">
							<?php if ( get_field('sous_titre_page') ): ?>
								<div class="sous_titre">
									<?php the_field("sous_titre_page"); ?>
								</div>
							<?php endif; ?>
							<?php if ( get_field('titre_page') ): ?>
								<div class="titre">
									<?php the_field("titre_page"); ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<?php if (get_field('description_main_block') ): ?>
				<div class="main_block">
					<div class="row no-gutters">
						<div class="col-lg-6 col-md-12">
							<?php the_post_thumbnail(); ?>
						</div>
						<div class="col-lg-6 col-md-12">
							<div class="description">
								<?php the_field("description_main_block"); ?>
								<?php if(get_field('doc_dossier_de_presse')): ?>
									<a href="<?php the_field('doc_dossier_de_presse'); ?>" download="" class="btn download-btn"><?php _e('Télécharger', 'orphea'); ?></a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			<?php endif ?>

		</div>
		<!-- End page head -->

			<div class="container">

				<div class="articles-presse-list">
					<?php $the_query = new WP_Query(
					array(
						'post_type' => 'article_presse',
						'posts_per_page'    => -1,
						'orderby' => 'date',
						'order' => 'DESC'
						)
					);


					if ( $the_query->have_posts() ) : ?>
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<div class="row">
							<div class="col-md-2">
								<img src="<?php echo get_template_directory_uri(); ?>/img/image_article_de_presse.png" alt="Article de presse">
							</div>
							<div class="col-md-5">
								<div class="post-date">
									<?php
									if(ICL_LANGUAGE_CODE == 'fr')
										echo get_the_date('d/m/Y');
									else
									 	echo get_the_date('Y/m/d');?>
								</div>
								<div class="post-title">
									<a href="#"><?php the_title(); ?></a>
								</div>
							</div>
							<div class="col-md-5">
								<?php if(get_field('document_de_presse')): ?>
									<a href="<?php the_field('document_de_presse'); ?>" class="btn download-btn float-right" download=""><?php _e('Télécharger', 'orphea'); ?></a>
								<?php endif; ?>
							</div>
						</div>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php else : ?>
					<p><?php __('Aucun article de presse trouvé', 'orphea'); ?></p>
				<?php endif; ?>
			</div>
			<?php if(get_field('nom_contact') || get_field('fonction_contact') || get_field('email_contact')): ?>
				<div class="row press-contact-box">
					<div class="col-md-12 presse-contact-title">
						<?php _e('Votre contact', 'orphea'); ?> :
					</div>
					<div class="col-md-6 infos-contact">
						<div class="nom-contact"><?php the_field('nom_contact'); ?></div>
						<div class="fonction-contact"><?php the_field('fonction_contact'); ?></div>
					</div>
					<div class="col-md-6 email-contact">
						<a href="mailto:<?php the_field('email_contact'); ?>" class="btn contact-btn"><?php _e('Contactez-moi!', 'orphea'); ?></a>
					</div>
				</div>
			<?php endif; ?>
		</div>
		<?php include( realpath(dirname(__FILE__) ).'/footer/articles_bas_pages.php' ); ?>


	</div>
</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
