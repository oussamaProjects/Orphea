<?php if( have_rows('blocks') ): ?>
	<?php while ( have_rows('blocks') ) : the_row(); ?>
		
		<div id="<?php echo sanitize_title(get_sub_field('titre')); ?>" class="block">
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

			</div>
		</div>

	<?php endwhile; ?>
<?php endif ?>