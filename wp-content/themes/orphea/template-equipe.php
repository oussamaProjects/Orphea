<?php

/**
 * Template Name: Template Equipe.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @see https://codex.wordpress.org/Template_Hierarchy
 */
get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">

		<div id="page_modele">


			<?php include realpath(dirname(__FILE__)).'/template-parts/parts/page_head.php'; ?>
			<div class="container">

				<?php if (have_rows('gestion_equipe')):?>
					<div class="page_modele_blocks">
						<div id="<?php echo sanitize_title(get_sub_field('titre')); ?>" class="block">
							<div class="row">
								<div class="equipe">
									<?php while (have_rows('gestion_equipe')) : the_row(); ++$a; ?>

										<?php
                                        $image = get_sub_field('team_img');
                                        $name  = get_sub_field('team_name');
                                        $job   = get_sub_field('team_poste');
                                        $link  = get_sub_field('url_linkedin');

                                        ?>
										<div class="eq_membre">
											<div class="eq_img">
												<a href="<?php echo $link; ?>">
													<i class="fa fa-linkedin fa-lg" aria-hidden="true"></i>
													<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
												</a>
											</div>
											<div class="eq_name"><a href="<?php echo $link; ?>"><?php echo $name; ?></a></div>
											<div class="eq_job"><?php echo $job; ?></div>
											<!-- <div class="eq_link"><i class="fa fa-linkedin" aria-hidden="true"></i></div> -->
										</div>

									<?php endwhile; ?>
									<div class="eq_membre">
									<a href="<?php the_permalink(icl_object_id(730, 'page', false, ICL_LANGUAGE_CODE)); ?>">
									<div class="eq_img"><img src="<?php echo get_template_directory_uri(); ?>/img/prochain_recrue.png" /></div>
										<div class="eq_name">
											<?php _e('Qui est la prochaine<br/>recrue ?', 'orphea') ?>
										</div>
									</div>
									</a>
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
