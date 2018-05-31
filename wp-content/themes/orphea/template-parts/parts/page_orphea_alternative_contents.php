<?php if( have_rows('blocks') ): ?>
	<div class="container">
		<div class="page_modele_blocks">
			<?php while ( have_rows('blocks') ) : the_row(); ?>

				<div id="<?php echo sanitize_title(get_sub_field('titre')); ?>" class="block"<?php if(get_sub_field('image_de_fond')) echo 'style="background-image:url(' . get_sub_field('image_de_fond') . ');"'; ?>>
					<div class="row">

						<div class="col-md-9">
							<?php if (get_sub_field('titre')): ?>
								<div class="titre"><?php the_sub_field('titre'); ?></div>
							<?php endif ?>
							<?php if (get_sub_field('description')): ?>
								<div class="description">
									<?php the_sub_field('description'); ?>
								</div>
							<?php endif ?>
						</div>

						<?php if( have_rows('points_forts') ): $a = 0; ?>
							<div class="points-forts col-md-12">
								<?php while ( have_rows('points_forts') ) : the_row(); $a++;?>
									<div class="row">
										<?php if (get_sub_field('pf_icone')): ?>
											<div class="col-md-2 pf-icone">
												<img src="<?php the_sub_field('pf_icone'); ?>" alt="">
											</div>
										<?php endif ?>
										<?php if (get_sub_field('pf_desc')): ?>
											<div class="col-md-8 pf-desc">
												<?php the_sub_field('pf_desc'); ?>
											</div>
										<?php endif ?>
									</div>
								<?php endwhile; ?>
							</div>
						<?php endif ?>

						<?php $type_grille = get_sub_field('type_grille'); ?>

						<?php if( have_rows('grille') ): $a = 0; ?>
							<div class="grille <?php echo ($type_grille == 'rond') ? 'rond' : 'carre' ; ?>">
								<?php while ( have_rows('grille') ) : the_row(); $a++;?>


									<?php if (get_sub_field('pave')): ?>
										<div class="pave">
											<div class="num"><?php echo $a; ?></div>
											<div class="text">
												<?php the_sub_field('pave'); ?>
											</div>
										</div>
									<?php endif ?>

								<?php endwhile; ?>
							</div>
						<?php endif ?>

						<?php if (get_sub_field('description_2')): ?>
							<div class="col-md-9">
								<div class="description">
									<?php the_sub_field('description_2'); ?>
								</div>
							</div>
						<?php endif ?>

						<?php if (get_sub_field('quote')): ?>
							<div class="col-md-12">
								<div class="quote">
									<?php the_sub_field('quote'); ?>
								</div>
							</div>
						<?php endif ?>

						<?php if (get_sub_field('lien_telechargement') && get_sub_field('titre_lien_telechargement')): ?>
							<div class="col-md-12">
								<div class="content-btn-container">
									<a  href="<?php the_sub_field('lien_telechargement'); ?>"
										class="btn content-btn <?php echo get_sub_field('position_lien_telechargement') ?>">
										<?php the_sub_field('titre_lien_telechargement'); ?>
									</a>
								</div>
							</div>
						<?php endif ?>

						<?php if (get_sub_field('icone_innovation') || get_sub_field('icone_clients')  || get_sub_field('icone_projets')  || get_sub_field('icone_utilisateurs') || get_sub_field('icone_donnees')  || get_sub_field('icone_actifs_numeriques')  || get_sub_field('icone_telechargements') || get_sub_field('icone_hausse_ca') || get_sub_field('icone_ca_investis_rd') || get_sub_field('icone_activite_a_lexport') || get_sub_field('chiffres_cles_l2_z2')): ?>
							<div class="col-md-12 chiffres-cles">
							<div class="row">
								<div class="col-md-2 offset-md-1 text-center">
									<img class="ca-icon" src="<?php the_sub_field('icone_innovation'); ?>" />
									<?php the_sub_field('contenu_innovation'); ?>
								</div>
								<div class="col-md-2 offset-md-1 text-center">
									<img class="ca-icon" src="<?php the_sub_field('icone_clients'); ?>" />
									<?php the_sub_field('contenu_clients'); ?>
								</div>
								<div class="col-md-2 offset-md-1 text-center">
									<img class="ca-icon" src="<?php the_sub_field('icone_projets'); ?>" />
									<?php the_sub_field('contenu_projets'); ?>
								</div>
								<div class="col-md-2 offset-md-1 text-center">
									<img class="ca-icon" src="<?php the_sub_field('icone_utilisateurs'); ?>" />
									<?php the_sub_field('contenu_utilisateurs'); ?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-2 offset-md-1 text-center">
									<img class="ca-icon" src="<?php the_sub_field('icone_donnees'); ?>" />
									<?php the_sub_field('contenu_données'); ?>
								</div>
								<div class="col-md-2 offset-md-1 text-center">
									<img class="ca-icon" src="<?php the_sub_field('icone_actifs_numeriques'); ?>" />
									<?php the_sub_field('contenu_actifs_numeriques'); ?>
								</div>
								<div class="col-md-2 offset-md-1 text-center">
									<img class="ca-icon" src="<?php the_sub_field('icone_telechargements'); ?>" />
									<?php the_sub_field('contenu_telechargements'); ?>
								</div>
							</div>
								<div class="row">
									<div class="col-md-12">
										<div class="ca-title"><?php _e('Une croissance pérenne', 'orphea'); ?></div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-5 offset-md-1">
										<div class="row">
											<div class="col-md-6 text-center">
												<img class="ca-icon" src="<?php the_sub_field('icone_hausse_ca'); ?>" />
												<?php the_sub_field('contenu_hausse_ca'); ?>
											</div>
											<div class="col-md-6 text-center">
												<img class="ca-icon" src="<?php the_sub_field('icone_ca_investis_rd'); ?>" />
												<?php the_sub_field('contenu_ca_investis_rd'); ?>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 text-center">
												<img class="ca-icon" src="<?php the_sub_field('icone_activite_a_lexport'); ?>" />
												<?php the_sub_field('contenu_activite_a_lexport'); ?>
											</div>
										</div>
									</div>
									<div class="col-md-6 chiffres-cl text-center">
										<img src="<?php the_sub_field('chiffres_cles_l2_z2'); ?>" />
										<div class="chiffre-cl1"><?php the_sub_field('contenu_1_clients_orphea'); ?></div>
										<div class="chiffre-cl2"><?php the_sub_field('contenu_2_clients_orphea'); ?></div>
										<div class="chiffre-cl3"><?php the_sub_field('contenu_3_clients_orphea'); ?></div>
										<div class="chiffre-cl4"><?php the_sub_field('contenu_4_clients_orphea'); ?></div>
									</div>
								</div>
							</div>
						<?php endif ?>

					</div>
				</div>

			<?php endwhile; ?>

			<div id="block-chiffres-cles" class="block">
				<div class="col-md-9">
					<?php if (get_field('chiffres_cles_titre')): ?>
						<div class="titre"><?php the_field('chiffres_cles_titre'); ?></div>
					<?php endif ?>
				</div>
				<div class="col-md-12 chiffres-cles">
					<?php if(have_rows('chiffres_p1')): ?>
						<div class="row">
							<?php while ( have_rows('chiffres_p1') ) : the_row(); ?>
									<div class="col-md-2 offset-md-1 text-center">
										<img class="ca-icon" src="<?php the_sub_field('chiffre_cle_icone'); ?>" />
										<?php the_sub_field('chiffre_cle_contenu'); ?>
									</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
					<?php if( get_field('chiffres_cles_titre_2') ): ?>
					<div class="row">
						<div class="col-md-12">
							<div class="ca-title"><?php _e( get_field('chiffres_cles_titre_2'), 'orphea' ); ?></div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-5 offset-md-1">
					<?php if(have_rows('chiffres_partie_2')): ?>
						<div class="row">
							<div class="col-md-6 text-center">
								<img class="ca-icon" src="<?php the_sub_field('chiffre_cle_icone'); ?>" />
								<?php the_sub_field('chiffre_cle_contenu'); ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
				<div class="col-md-6 chiffres-cl text-center">
					<img src="<?php the_field('chiffres_cles_clients_bg_img'); ?>" />
					<div class="chiffre-cl1"><?php the_field('chiffres_cles_contenu_1_cl'); ?></div>
					<div class="chiffre-cl2"><?php the_field('chiffres_cles_contenu_2_cl'); ?></div>
					<div class="chiffre-cl3"><?php the_field('chiffres_cles_contenu_3_cl'); ?></div>
					<div class="chiffre-cl4"><?php the_field('chiffres_cles_contenu_4_cl'); ?></div>
				</div>
			</div>
		</div>
	</div>
	<!-- The following should be used for the landing page -->
<?php elseif($_SERVER['HTTP_X_REAL_IP'] == '90.63.230.42' && FALSE) :?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<!-- <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?> -->
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
<?php endif ?>
