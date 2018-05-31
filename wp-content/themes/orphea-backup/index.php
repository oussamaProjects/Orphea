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
				<div class="col-md-8">
					<div class="titre_container">
						<div class="titre">
							<?php the_field("titre_page"); ?>
						</div>
					</div>
					<div class="decription">
						<?php the_content( ); ?>
					</div>
					<div class="point-fort">
						<div class="pf_icone"><img src="<?php echo get_template_directory_uri();?>/img/pdt-robuste.png" alt=""></div>
						<div class="pf_desc">Un produit <b>robuste, performant et évolutif.</b></div>
					</div>
					<div class="point-fort">
						<div class="pf_icone"><img src="<?php echo get_template_directory_uri();?>/img/accompagnement.png" alt=""></div>
						<div class="pf_desc">Un <b>accompagnement personnalisé</b> pour structurer vos processus métier.</div>
					</div>
					<div class="point-fort">
						<div class="pf_icone"><img src="<?php echo get_template_directory_uri();?>/img/hebergement.png" alt=""></div>
						<div class="pf_desc">Un <b>hébergement sécurisé</b> de vos données en France.</div>
					</div>
					<div class="point-fort">
						<div class="pf_icone"><img src="<?php echo get_template_directory_uri();?>/img/expertise.png" alt=""></div>
						<div class="pf_desc">Une <b>expertise documentaire et éditoriale.</b></div>
					</div>
					<div class="point-fort">
						<div class="pf_icone"><img src="<?php echo get_template_directory_uri();?>/img/assistance.png" alt=""></div>
						<div class="pf_desc">Une <b>assistance</b> aux utilisateurs et un <b>support technique réactif.</b></div>
					</div>
					<?php/*
								// check if the repeater field has rows of data
								if( have_rows('repeater_field_name') ):

								 	// loop through the rows of data
								    while ( have_rows('repeater_field_name') ) : the_row();

								        // display a sub field value
								        the_sub_field('sub_field_name');

								    endwhile;

								else :

								    // no rows found

								endif;
					*/?>

				</div>
			<?php endwhile; ?>

			<div class="col-md-4">
				<div class="chiffre_cles">

					<div class="decription">
						<p>
							Acteur de référence du Digital Asset Managment depuis plus de 20 ans, Orphea accompagne les entreprises et organisationsà la mise en place de plateformes collaboratives et évolutives pour gérer et diffuser leurs médias.
						</p>
					</div>
					<div class="chiffres">

						<div class="chiffre">
							<div class="titre">+ 20</div>
							<div class="desc_chiffre">ans expérience</div>
						</div>

						<div class="chiffre">
							<div class="titre">+ 150</div>
							<div class="desc_chiffre">client</div>
						</div>

						<div class="chiffre">
							<div class="titre">+ 200</div>
							<div class="desc_chiffre">millions de médias</div>
						</div>

						<div class="chiffre">
							<div class="titre">+ 120 000</div>
							<div class="desc_chiffre">utilisateurs</div>
						</div>
					</div>

				</div>
				<?php $args = array( 'post_type' => 'post', 'posts_per_page' => 1,'orderby' => 'date', 'order'   => 'DESC', );
				$latest = new WP_Query( $args );
				$post_id = wp_list_pluck( $latest->posts, 'ID' );
				$post = get_post( $post_id[0] );
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id[0]), 'large' ); ?>

				<div class="news first home">
					<div class="titre">
						<?php echo $post->post_title; ?>
					</div>
					<a href="<?php the_permalink();?>" class="btn custom-btn">Lire la suite</a>
				</div>
			</div>
			<img src="<?php echo $large_image_url[0]; ?>" alt="" class="news_img">

		</div>
	</div>

	<br>
	<br>
	<div class="livre_blanc bandeau">
		<img src="<?php bloginfo( 'template_directory' ); ?>/img/livre_blanc_img.jpg" alt="">
		<div class="info">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="image">
							<img src="<?php bloginfo( 'template_directory' ); ?>/img/livre_img.png" alt="">
						</div>
					</div>
					<div class="col-md-6">
						<div class="sous_titre">
							notre livre blanc
						</div>
						<div class="titre">
							Bien gérer votre patrimoine numérique :
							les 4 étapes indispensables
						</div>
						<div class="description">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit,
							sed do eiusmod tempor incididunt ut labore et dolore
							magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
							ullamco laboris nisi ut aliquip ex ea commodo
						</div>
						<div class="btns">
							<a href="#" class="btn custom-btn">Téléchargez le livre blanc</a>
							<a href="#" class="btn custom-btn">Consultez tous nos ebooks</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<br>
</div>


<?php
get_footer();
