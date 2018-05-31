<?php

/**
* Template Name: Template Pub
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

				<?php $args = array( 'post_type' => 'pub', 'posts_per_page' => 3,'orderby' => 'date', 'order'   => 'DESC', );
				$latest = new WP_Query( $args );
				$post_ids = wp_list_pluck( $latest->posts, 'ID' );
				$post = get_post( $post_ids[0] );
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post_ids[0]), 'large' );
				if(!empty($post_ids)):  ?>
				<div class="row top-news-container">
					<div class="col-md-9">
						<div class="featured-news" style=" background: url(<?php echo $large_image_url[0] ; ?>) no-repeat center;-webkit-background-size: cover; background-size: cover; ">
							<div class="news first small" >
								<span class="type-article"></span>
								<div class="titre">
									<?php echo $post->post_title; ?>
								</div>

								<?php if( have_rows('pub_liens_telechargement') ): ?>
									<?php while ( have_rows('pub_liens_telechargement') ) : the_row(); ?>
										<?php if (get_sub_field('pub_lien_telechargement')): ?>
											<?php $lien_telechargement = get_sub_field('pub_lien_telechargement'); ?>
											<a href="<?php echo $lien_telechargement['url']; ?>" class="btn custom-btn">Téléchargez</a>
										<?php endif ?>
									<?php endwhile; ?>
								<?php endif ?>	

								<a href="#" class="share">
									<span class="arrow"></span>
									Partager
								</a>
							</div>
						</div>
					</div>

					<div class="col-md-3 small-news-container">
						<?php 
						if(count($post_ids)> 2 ){
							for($i=1 ;$i <count($post_ids);$i++) : 
								$post = get_post( $post_ids[$i] );

							$small_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post_ids[$i]), array( 285, 210) );
							?>
							<div class="small-news">
								<div class="news-header news-header1">
									<img src="<?php echo $small_image_url[0] ?>">
									<span class="type-article"></span>
								</div>
								<div class="news-footer">

									<?php if( have_rows('pub_liens_telechargement') ): ?>
										<?php while ( have_rows('pub_liens_telechargement') ) : the_row(); ?>
											<?php if (get_sub_field('pub_lien_telechargement')): ?>
												<?php $lien_telechargement = get_sub_field('pub_lien_telechargement'); ?>
												<a href="<?php echo $lien_telechargement['url']; ?>" class="btn custom-btn">Téléchargez</a>
											<?php endif ?>
										<?php endwhile; ?>
									<?php endif ?>

									<a href="#" class="share">
										<span class="arrow"></span>
										Partager
									</a>
								</div>
							</div>

							<?php 
							endfor;
						} ?>

					</div>
				</div>
				<?php 
				endif; ?>

				<form action="" method="GET">
					<div class="row filt">

						<div class="col-md-6 filter">
							<p class="filtrer-title">Filtrer</p>
							<?php 
							$field_key = "field_59b7f6f87e510";
							$field = get_field_object($field_key);
							?>
							<select class="filter-par" name="type" onchange="this.form.submit()" >
								<option value="" >Type</option>
								<?php foreach( $field['choices'] as $k => $v ) {?>
								<option value="<?php echo $k?>"> <?php echo $v ?> </option>
								<?php  } ?>
							</select>
						</div>

						<div class="col-md-6 trier">
							<p class="trier-title">Trier l'affichage par</p>
							<select class="trier-par" name="trierPar"  onchange="this.form.submit()" >
								<option value="" >Catégories</option>
								<option></option>
							</select>
						</div>
					</div>
				</form>

				<div class="row actus">
					<?php $args = array( 'post_type' => 'pub', 'posts_per_page' => 6,'orderby' => 'date', 'order'   => 'DESC', );
					$loop = new WP_Query( $args );
					if ( $loop->have_posts() ) : 
						while ( $loop->have_posts() ) : $loop->the_post();  
					$post_date = get_the_date( 'd/m/Y' );  ?>

					<div class="col-md-4">
						<?php if (get_field('pub_choix_affichage') == 'full'): ?>
							<div class="actualite full">
								<a href="<?php echo get_the_permalink() ?>">
									<div class="news-header news-header1">
										<img src="http://localhost/orphea/wp-content/themes/orphea/img/news_img.jpg">
									</div> 
								</a>
							</div>
						<?php else: ?>
							<div class="actualite">
								<div class="news-header news-header1">
									<img src="http://localhost/orphea/wp-content/themes/orphea/img/news_img.jpg">
								</div>
								<div class="news-body">
									<span class="actupicto article"></span>
									<span class="news-date"><?php echo $post_date; ?></span>
									<a href="<?php echo get_the_permalink() ?>">
										<div class="news-title">
											<?php the_title(); ?>
										</div>
									</a>
									<div class="news-exerpt"><?php the_field("resume"); ?>resume</div>
									<?php 
									$posttags = get_the_tags();
									if ($posttags) { ?>
									<div class="tags">
										<?php foreach($posttags as $tag) { ?>
										<a href="#$tag->slug">#<?php echo $tag->name; ?> </a>
										<?php } ?>
									</div>
									<?php } ?>
									<a href="#" class="share">
										<span class="arrow"></span>
										Partager
									</a>
								</div>
							</div>
						<?php endif; ?>
					</div>

					<?php 
					endwhile; 
					endif; ?>
					</div>
			</div>

		</div>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->

<?php
get_footer();