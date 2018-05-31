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
				<div class="col-lg-6 col-md-12">
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

	<?php if (get_field('titre_main_block') && get_field('description_main_block') ): ?>
		<div class="main_block">
			<div class="row">
				<div class="col-lg-6">
					<div class="titre">
						<?php the_field("titre_main_block"); ?>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="description">
						<?php the_field("description_main_block"); ?>
					</div>
				</div>
			</div>
		</div>
	<?php elseif (get_field('titre_main_block') && !get_field('description_main_block') ): ?>
		<div class="main_block">
			<div class="row">
				<div class="col-md-12">
					<div class="titre">
						<?php the_field("titre_main_block"); ?>
					</div>
				</div>
			</div>
		</div>
	<?php elseif (!get_field('titre_main_block') && get_field('description_main_block') ): ?>
		<div class="main_block">
			<div class="row">
				<div class="col-md-12">
					<div class="description">
						<?php the_field("description_main_block"); ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif ?>

</div>
