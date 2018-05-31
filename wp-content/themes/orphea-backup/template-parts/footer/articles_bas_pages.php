<!--*******************************     articles_bas_pages   -->

<?php  
$articles_bas_pages = get_field('articles_bas_pages'); 
if ($articles_bas_pages): ?>

<section class="articles_bas_pages actus"> 
	

	<div class="row">
		<?php 
		foreach($articles_bas_pages as $post): setup_postdata($post); ?>

		<div class="col-md-4">
			<div class="actualite">  

				<div class="actualite">
					<div class="news-header news-header1">
						<?php //the_post_thumbnail(); ?>
						<img src="http://localhost/orphea/wp-content/themes/orphea/img/news_img.jpg">
					</div>
					<div class="news-body">
						<span class="actupicto article"></span> 
						<span class="news-date">&nbsp;</span>
						<a href="<?php echo get_the_permalink() ?>">
							<div class="news-title">
								<?php the_title(); ?>
							</div>
						</a>
						<div class="news-exerpt"><?php the_content(); ?></div>
					</div>
				</div>

			</div>
		</div>

		<?php 
		endforeach; ?>
		
	</div>

</section> 

<?php endif; ?>

<!--*******************************     END articles_bas_pages   -->