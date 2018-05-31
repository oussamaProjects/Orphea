<!--*******************************     articles_bas_pages   -->

<?php
$articles_bas_pages = get_field('articles_bas_pages');
if (count($articles_bas_pages) == 0 || $articles_bas_pages == ''){
	$articles_bas_pages = new WP_Query(array(
		'post_type' => 'articles_bas_pages',
		'posts_per_page' => 3
	));
	?>
<section class="articles_bas_pages_container actus">


	<div class="container">
		<div class="row">

			<?php
			while($articles_bas_pages->have_posts()): $articles_bas_pages->the_post();

			$urlArticle = get_the_permalink();
			$donwloadArticle = '';
			if(get_field('fichier_a_telecharger') && !empty(get_field('fichier_a_telecharger')['url'])) {

				$urlArticle = get_field('fichier_a_telecharger')['url'];
				$donwloadArticle = ' download="" ';
			} elseif(get_field('rediriger_vers') && !empty(get_field('rediriger_vers'))) {
				$urlArticle = get_field('rediriger_vers') ;
				$donwloadArticle = ' target="_blank" ';
			}
			?>

			<div class="col-lg-4 col-md-6">
				<div class="actualite">

					<div class="actualite">
						<div class="news-header news-header1">
							<?php the_post_thumbnail(); ?>
						</div>
						<div class="news-body">
						<?php if(get_field('pave_icon')): ?>
							<div class="pave-icon">
								<img src="<?php echo get_field('pave_icon')['url']; ?>" alt="">
							</div>
						<?php endif; ?>
							<span class="actupicto article"></span>
							<span class="news-date">&nbsp;</span>
							<a href="<?php echo $urlArticle ?>" <?=$donwloadArticle;?>>
								<div class="news-title">
									<?php the_title(); ?>
								</div>
							</a>
							<div class="news-exerpt"><?php the_excerpt(); ?></div>
						</div>
					</div>

				</div>
			</div>

			<?php
			endwhile; ?>

		</div>
	</div>

</section>
	<?php
}else{
/* echo "<pre>";
var_dump($articles_bas_pages);
exit; */
if ($articles_bas_pages): ?>

<section class="articles_bas_pages_container actus">


	<div class="container">
		<div class="row">

			<?php
			foreach($articles_bas_pages as $post): setup_postdata($post);

			$urlArticle = get_the_permalink();
			$donwloadArticle = '';
			if(get_field('fichier_a_telecharger') && !empty(get_field('fichier_a_telecharger')['url'])) {
				$urlArticle = get_field('fichier_a_telecharger')['url'];
				$donwloadArticle = ' download="" ';
			} elseif(get_field('rediriger_vers') && !empty(get_field('rediriger_vers'))) {
				$urlArticle = get_field('rediriger_vers') ;
				$donwloadArticle = ' target="_blank" ';
			}

			?>

			<div class="col-lg-4 col-md-6">
				<div class="actualite">

					<div class="actualite">
						<div class="news-header news-header1">
							<?php the_post_thumbnail(); ?>
						</div>
						<div class="news-body">
						<?php if(get_field('pave_icon')): ?>
							<div class="pave-icon">
								<img src="<?php echo get_field('pave_icon')['url']; ?>" alt="">
							</div>
						<?php endif; ?>
							<span class="actupicto article"></span>
							<span class="news-date">&nbsp;</span>
							<a href="<?php echo $urlArticle ?>" <?=$donwloadArticle;?>>
								<div class="news-title">
									<?php the_title(); ?>
								</div>
							</a>
							<div class="news-exerpt"><?php the_excerpt(); ?></div>
						</div>
					</div>

				</div>
			</div>

			<?php
			endforeach; ?>

		</div>
	</div>

</section>

<?php endif;
}
?>

<!--*******************************     END articles_bas_pages   -->
