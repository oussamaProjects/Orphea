<?php

/**
 * Template Name: Template Equipe
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

			<div class="container">

				<?php include( realpath(dirname(__FILE__) ).'/template-parts/parts/page_head.php' ); ?>

				<?php if( have_rows('gestion_equipe') ):?>
					<div class="page_modele_blocks">
						<div id="<?php echo sanitize_title(get_sub_field('titre')); ?>" class="block">
							<div class="row">
								<div class="equipe">
								<?php while ( have_rows('gestion_equipe') ) : the_row(); $a++;?>

										<?php
										// vars
												$image = get_sub_field('team_img');
												$name = get_sub_field('team_name');
												$job = get_sub_field('team_poste');
												$link = get_sub_field('link');

										 ?>
											<div class="eq_membre">
												<div class="eq_img"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" /></div>
												<div class="eq_name"><?php echo $name; ?></div>
												<div class="eq_job"><?php echo $job; ?></div>
												<div class="eq_link"><?php echo $link; ?></div>
											</div>

								<?php endwhile; ?>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>


			</div>
		</div>

	</div>
</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->

<?php
get_footer();
