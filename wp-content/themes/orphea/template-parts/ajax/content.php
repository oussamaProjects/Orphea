<div class="col-lg-4 col-md-6 thearticle">
	<?php if (get_field('pub_choix_affichage') == 'full'): ?>
		<div class="actualite full">
			<a href="#" data-toggle="modal" data-target="#modal<?php the_ID(); ?>">
				<?php the_post_thumbnail(); ?>
				<div class="loupe"></div>
			</a>
		</div>
		<div class="modal fade" id="modal<?php the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="exampleModalLabel"><?php the_title(); ?></h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" style="text-align: center;">
						<?php
						the_post_thumbnail('full');
						?>
					</div>
				</div>
			</div>
		</div>
	<?php else: ?>
		<div class="actualite">
			<div class="news-header news-header1">
				<?php the_post_thumbnail(); ?>
			</div>
			<div class="news-body">
				<span class="actupicto actualite"></span>
				<span class="news-date"><?php
					if(ICL_LANGUAGE_CODE == 'fr')
						echo get_the_date( 'd/m/Y' );
					else
						echo get_the_date( 'Y/m/d' );
				?></span>
				<?php if (have_rows('pub_liens_telechargement')): ?>
					<?php while (have_rows('pub_liens_telechargement')) : the_row();
						$lien_telechargement = get_sub_field('pub_lien_telechargement');
						$urlToDownload = $lien_telechargement['url'];
						$downloadAttr = 'download=""';
						if(get_field('formulaire_requis')) {
							$urlToDownload = get_page_link(1642).'?id_file='.$lien_telechargement['id'];
							$downloadAttr = '';
						} ?>
						<a href="<?php echo $urlToDownload;?>" <?=$downloadAttr;?>>
							<div class="news-title">
								<?php the_title(); ?>
							</div>
						</a>
					<?php
					// Repeater utilisé pour prevoir multiples fichiers
					break;
					endwhile;
					?>
				<?php else: ?>
					<a href="<?php echo get_the_permalink() ?>">
						<div class="news-title">
							<?php the_title(); ?>
						</div>
					</a>
				<?php endif; ?>
				<?php
				// if(get_post_type() == 'pub')
				// 	$posttags = get_the_terms( get_the_ID(), 'categories_pub' );
				// else
				if(get_post_type() == 'pub' || get_post_type() == 'post')
					$posttags = wp_get_post_tags(get_the_ID());
				else
					$posttags = get_the_terms(get_the_ID(), 'category');

				if ($posttags) { ?>
				<div class="tags">
					<?php foreach($posttags as $tag) {
						if($tag->term_id == 1)
							continue;
						if(get_post_type() == 'pub'): ?>
						<a href="<?php echo get_permalink(get_page_by_path('publications')) . '?tag=' . $tag->slug; ?>">#<?php echo $tag->name; ?> </a>
					<?php elseif(get_post_type() == 'post'): ?>
						<a href="<?php echo get_permalink(get_page_by_path('actualites-evenements')) . '?tag=' . $tag->slug; ?>">#<?php echo $tag->name ;?></a>
					<?php else: ?>
						<a href="<?php echo get_permalink(get_page_by_path('actualites-evenements')) . '?category=' . $tag->term_id; ?>">#<?php echo $tag->slug ;?></a>
					<?php endif; ?>
					<?php } ?>
				</div>
				<?php } ?>

				<?php if (get_post_type() == 'pub' && get_sub_field('pub_lien_telechargement')): ?>
					<?php $lien_telechargement = get_sub_field('pub_lien_telechargement');
					$urlToDownload = $lien_telechargement['url'];
					$downloadAttr = 'download=""';
					if(get_field('formulaire_requis')) {
						$urlToDownload = get_page_link(1642).'?id_file='.$lien_telechargement['id'];
						$downloadAttr = '';
					}
					?>
					<a href="<?php echo $urlToDownload; ?>" style="position: absolute; left: 10px; bottom: 10px; color: #84175d; border-color: #84175d;" class="btn custom-btn" <?=$downloadAttr;?>><?php _e('Téléchargez', 'orphea'); ?></a>
				<?php endif ?>

				<a href="#" class="share">
					<span class="arrow"></span>
					<?php _e('Partager', 'orphea'); ?>
				</a>
				<ul class="social-share-links">
					<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a target="_blank" href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink()); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
					<li><a target="_blank" href="https://twitter.com/home?status=<?php echo urlencode(get_permalink()); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>&summary=&source="><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
				</ul>
			</div>
		</div>
	<?php endif; ?>
</div>
