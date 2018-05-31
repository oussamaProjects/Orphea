<?php

/**
 * Template Name: Template Actus
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

get_header();
?>
<?php /* *********************************************************************************************************************** */ ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">

		<div id="page_modele">


			<?php include( realpath(dirname(__FILE__) ).'/template-parts/parts/page_head.php' ); ?>
			<div class="container">

				<?php $args = array( 'post_type' => 'post', 'posts_per_page' => 3,'orderby' => 'date', 'order'   => 'DESC' );
				$latest = new WP_Query( $args );
				$post_ids = wp_list_pluck( $latest->posts, 'ID' );
				$post = get_post( $post_ids[0] );
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post_ids[0]), 'large' );
				if(!empty($post_ids)):  ?>
				<div class="row top-news-container">
					<div class="col-lg-9">
						<div class="featured-news" style=" background: url(<?php echo $large_image_url[0] ; ?>) no-repeat center;-webkit-background-size: cover; background-size: cover; ">
							<div class="news first small" >
								<span class="type-article"></span>
								<div class="titre">
									<?php echo $post->post_title; ?>
								</div>
								<span class="news-date"><?php
									if(ICL_LANGUAGE_CODE == 'fr')
										echo $newDate = date("d/m/Y", strtotime($post->post_date ));
									else
										echo $newDate = date("Y/m/d", strtotime($post->post_date ));
									?>
								</span>
								<a href="<?php echo get_post_permalink($post_ids[0]); ?>" class="btn custom-btn">><?php _e('Lire la suite', 'orphea');?></a>
								<a href="#" class="share">
									<span class="arrow"></span>
									<?php _e('Partager', 'orphea'); ?>
								</a>
							</div>
						</div>
					</div>

					<div class="col-lg-3 small-news-container">
						<?php
						if(count($post_ids)> 2 ){
							for($i=1 ;$i <count($post_ids);$i++) :
								$post = get_post( $post_ids[$i] );

							$small_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post_ids[$i]), array( 285, 210) );
							?>
							<div class="small-news actus-box">
								<div class="news-header news-header1">
									<img src="<?php echo $small_image_url[0] ?>">
									<span class="type-article"></span>
								</div>
								<div class="news-footer">
									<div class="titre">
										<?php echo $post->post_title; ?>
									</div>
									<div class="download_share">
										<span class="news-date"><?php
											if(ICL_LANGUAGE_CODE == 'fr')
												echo $newDate = date("d/m/Y", strtotime($post->post_date ));
											else
												echo $newDate = date("Y/m/d", strtotime($post->post_date ));
											?>
										</span>
										<a href="<?php echo get_post_permalink($post_ids[$i]); ?>" class="btn custom-btn">><?php _e('Lire la suite', 'orphea'); ?></a>
										<a href="#" class="share">
											<span class="arrow"></span>
											<?php _e('Partager', 'orphea'); ?>
										</a>
									</div>
								</div>
							</div>

							<?php
							endfor;
						} ?>

					</div>

				</div>
			<?php endif; ?>
			<form action="" method="GET">
				<div class="row filt">

					<div class="col-md-8 filter">
						<p class="filtrer-title"><?php _e('Filtrer','orphea');?></p>
						<?php
						$field_key = "field_59b7f6f87e510";
						$field = get_field_object($field_key);
						?>
						<select class="filter-par" name="type" onchange="this.form.submit()" >

							<option value="" ><?php _e('Type', 'orphea'); ?></option>
							<?php foreach( $field['choices'] as $k => $v ) {?>
							<option value="<?php echo $k; ?>" <?php echo ( isset($_GET['type']) && $k == $_GET['type'] ) ? "selected='selected'" : "not"; ?>> <?php echo $v; ?> </option>
							<?php } ?>
						</select>
						<?php
						$categories = get_categories( array(
							'orderby' => 'name',
							'order'   => 'ASC'
							)
						);
						?>
						<select class="filter-par" name="category" onchange="this.form.submit()" >
							<option value="" ><?php _e('Catégories', 'orphea'); ?></option>
							<?php foreach( $categories as $category ) { ?>
							<option value="<?php echo $category->term_id; ?>" <?php echo ( isset($_GET['category']) && $category->term_id == $_GET['category'] ) ? "selected='selected'" : ""; ?>>
								<?php echo $category->name ?>
							</option>
							<?php }  ?>
						</select>
					</div>
					<div class="col-md-4 trier">
						<p class="trier-title">
						<?php _e('Trier l\'affichage par', 'orphea'); ?></p>
						<select class="trier-par" name="trierPar"  onchange="this.form.submit()" >
							<option value="-">---</option>
							<option value="asc" <?php echo ( isset($_GET['trierPar']) && 'asc' == $_GET['trierPar'] ) ? "selected='selected'" : ""; ?>><?php _e('Par date croissante', 'orphea');?></option>
							<option value="desc" <?php echo ( isset($_GET['trierPar']) && 'desc' == $_GET['trierPar'] ) ? "selected='selected'" : ""; ?>>
							<?php _e('Par date décroissante','orphea'); ?></option>
						</select>
					</div>

				</div>
			</form>

			<div class="actus">
				<div class="row">
					<?php
					$args = array(
						'post_type' => 'post',
						'post__not_in' => $post_ids,
						'posts_per_page' => 9,
						'orderby' => 'date',
						'order'   => 'DESC',
						'paged'   => 1
						);

					if ( isset($_GET['type']) && !empty($_GET['type'])) {
						$args['meta_key'] = 'type';
						$args['meta_value']	= $_GET['type'];
					}

					if ( isset($_GET['category']) && !empty($_GET['category'])) {
						$args['cat'] = $_GET['category'];
					}

					if ( isset($_GET['trierPar']) && !empty($_GET['trierPar'])) {
						$args['order']	= $_GET['trierPar'];
					}

					if(isset($_GET['tag']) && !empty($_GET['tag'])) {
						$args['tag'] = sanitize_text_field($_GET['tag']);
					}

					$loop = new WP_Query( $args );
					if ( $loop->have_posts() ) :
						while ( $loop->have_posts() ) : $loop->the_post();

					if(ICL_LANGUAGE_CODE == 'fr')
						$post_date = get_the_date( 'd/m/Y' );
					else
				  	$post_date = get_the_date( 'Y/m/d' );?>

					<div class="col-lg-4 col-md-6 thearticle">
						<div class="actualite">
							<div class="news-header news-header1">
								<?php the_post_thumbnail(); ?>
							</div>
							<div class="news-body news-type-<?php the_field('type'); ?>">
								<span class="actupicto <?php the_field('type'); ?>"></span>
								<span class="news-date"><?php echo $post_date; ?></span>
								<a href="<?php echo get_the_permalink() ?>">
									<div class="news-title">
										<?php the_title(); ?>
									</div>
								</a>
								<div class="news-exerpt"><?php the_field("resume"); ?></div>
									<?php
									//$posttags = get_the_tags();
									// $posttags = get_the_terms(get_the_ID(), 'category');
									$posttags = wp_get_post_tags(get_the_ID());
									if ($posttags) { ?>
										<div class="tags">
											<?php
											foreach($posttags as $tag) {
												if($tag->term_id == 1)
													continue;
												?>
												<a href="<?php echo get_permalink(get_page_by_path('actualites-evenements')) . '?tag=' . $tag->slug; ?>">#<?php echo $tag->name ;?></a>
											<?php } ?>
										</div>
									<?php } ?>
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

						</div>

						<?php
						endwhile;
						endif;
						?>

					</div>
					<?php
					/**
					* Ajroudi Mohammed Edit ***************************************************************************************************
					**/
					if (  $loop->max_num_pages > 1 )
						echo '<div class="load-more-container"><div class="misha_loadmore">' . __('Afficher plus', 'orphea') . '</div></div>';
					/***************************************************************************************************/
					?>
				</div>

			</div>

		</div>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->

<?php
get_footer();
