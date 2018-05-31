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

get_header();
?>
<?php /* *********************************************************************************************************************** */ ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">

		<div id="page_modele">

			<div class="container">

				<?php include( realpath(dirname(__FILE__) ).'/template-parts/parts/page_head.php' ); ?>

				<?php $args = array( 'post_type' => 'pub', 'posts_per_page' => 3,'orderby' => 'date', 'order'   => 'DESC' );
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

								<?php if( have_rows('pub_liens_telechargement') ): ?>
									<?php while ( have_rows('pub_liens_telechargement') ) : the_row(); ?>
										<?php if (get_sub_field('pub_lien_telechargement')): ?>
											<?php $lien_telechargement = get_sub_field('pub_lien_telechargement');
											$urlToDownload = $lien_telechargement['url'];
											$downloadAttr = 'download=""';

											if(get_field('formulaire_requis')) {
												$urlToDownload = get_page_link(1642).'?id_file='.$lien_telechargement['id'];
												$downloadAttr = '';
											}
											?>
											<a href="<?php echo $urlToDownload; ?>" class="btn custom-btn" <?= $downloadAttr;?>><?php _e('Téléchargez', 'orphea'); ?></a>
										<?php endif ?>
									<?php endwhile; ?>
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
					</div>

					<div class="col-lg-3 small-news-container">
						<?php
						if(count($post_ids)> 2 ){
							for($i=1 ;$i <count($post_ids);$i++) :
								$post = get_post( $post_ids[$i] );

							$small_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post_ids[$i]), array( 285, 210) );
							?>
							<div class="small-news pub">
								<div class="news-header news-header1">
									<img src="<?php echo $small_image_url[0] ?>">
									<span class="type-article"></span>
								</div>
								<div class="news-footer">
									<div class="titre">
										<?php echo $post->post_title; ?>
									</div>
									<div class="download_share">
										<?php if( have_rows('pub_liens_telechargement') ): ?>
											<?php while ( have_rows('pub_liens_telechargement') ) : the_row(); ?>
												<?php if (get_sub_field('pub_lien_telechargement')): ?>
													<?php $lien_telechargement = get_sub_field('pub_lien_telechargement');
													$urlToDownload = $lien_telechargement['url'];
													$downloadAttr = 'download=""';
													if(get_field('formulaire_requis')) {
														$urlToDownload = get_page_link(1642).'?id_file='.$lien_telechargement['id'];
														$downloadAttr = '';
													}
													?>
													<a href="<?php echo $urlToDownload; ?>" class="btn custom-btn" <?=$downloadAttr;?>><?php _e('Téléchargez', 'orphea'); ?></a>
												<?php endif ?>
											<?php endwhile; ?>
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

						<div class="col-md-8 filter">
							<?php
							$terms_pub = get_terms(
								array(
									'taxonomy' => 'categories_pub',
									'hide_empty' => false,
									'orderby' => 'date',
									'order' => 'DESC'
									)
								);
								?>
								<p class="filtrer-title">
								<?php _e('Filtrer', 'orphea'); ?>
								</p>
								<select class="filter-par" name="term_pub" onchange="this.form.submit()" >
									<option value="" >Type</option>
									<?php foreach( $terms_pub as $term_pub ) { ?>
									<option value="<?php echo $term_pub->term_id; ?>" <?php echo ( isset($_GET['term_pub']) && $term_pub->term_id == $_GET['term_pub'] ) ? "selected='selected'" : ""; ?>>
										<?php echo $term_pub->name; ?>
									</option>
									<?php }  ?>
								</select>

							</div>
							<div class="col-md-4 trier">
								<p class="trier-title">
								<?php _e('Trier l\'affichage par', 'orphea'); ?>
								</p>
								<select class="trier-par" name="trierPar"  onchange="this.form.submit()" >
									<option value="-">---</option>
									<option value="asc" <?php echo ( isset($_GET['trierPar']) && 'asc' == $_GET['trierPar'] ) ? "selected='selected'" : ""; ?>><?php _e('Par date croissante', 'orphea');?></option>
									<option value="desc" <?php echo ( isset($_GET['trierPar']) && 'desc' == $_GET['trierPar'] ) ? "selected='selected'" : ""; ?>><?php _e('Par date décroissante','orphea');?></option>
								</select>
							</div>

						</div>
					</form>

					<div class="row actus">
						<?php $args = array(
							'post_type' => 'pub',
							'post__not_in' => $post_ids,
							'posts_per_page' => 6,
							'orderby' => 'date',
							'order'   => 'DESC',
							'paged'	  => 1
							);

						if ( isset($_GET['term_pub']) && !empty($_GET['term_pub']) ) {
							$args['tax_query'] = array(
								array(
									'taxonomy' => 'categories_pub',
									'field' => 'id',
									'terms' => $_GET['term_pub']
									)
								);
						}

						if ( isset($_GET['tag']) && !empty($_GET['tag']) ) {
							$args['tag'] = $_GET['tag'];
						}

						if ( isset($_GET['trierPar']) && !empty($_GET['trierPar']) ) {
							$args['order']	= $_GET['trierPar'];
						}

						$loop = new WP_Query( $args );
						if ( $loop->have_posts() ) :
							while ( $loop->have_posts() ) : $loop->the_post();

						if(ICL_LANGUAGE_CODE == 'fr')
							$post_date = get_the_date( 'd/m/Y' );
						else
					  	$post_date = get_the_date( 'Y/m/d' ); ?>

						<div class="col-lg-4 col-md-6  thearticle">
							<?php if (get_field('pub_choix_affichage') == 'full'): ?>
								<div class="actualite full">
									<a href="#" data-toggle="modal" data-target="#modal<?php the_ID(); ?>">
										<?php the_post_thumbnail(); ?>
										<div class="loupe"></div>
									</a>
								</div>
							<?php else: ?>
								<div class="actualite">
									<div class="news-header news-header1">
										<?php the_post_thumbnail(); ?>
									</div>
									<div class="news-body">
										<span class="actupicto actualite"></span>
										<span class="news-date"><?php echo $post_date; ?></span>
										<?php if (have_rows('pub_liens_telechargement')): ?>
											<?php while (have_rows('pub_liens_telechargement')) : the_row();
												$urlToDownload = get_sub_field('pub_lien_telechargement')['url'];
												$downloadAttr = 'download=""';
												if(get_field('formulaire_requis')) {
													$urlToDownload = get_page_link(1642).'?id_file='.get_sub_field('pub_lien_telechargement')['id'];
													$downloadAttr = '';
												}
												?>
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
										//$posttags = get_the_tags();
										// $posttags = get_the_terms( get_the_ID(), 'categories_pub' );
										$posttags = wp_get_post_tags(get_the_ID());
										if ($posttags) { ?>
										<div class="tags">
											<?php foreach($posttags as $tag) {
												if($tag->term_id == 1)
													continue;
												?>
												<a href="<?php echo get_permalink(get_page_by_path('publications')) . '?tag=' . $tag->slug; ?>">#<?php echo $tag->name; ?> </a>
												<?php } ?>
											</div>
											<?php } ?>

											<?php if (get_sub_field('pub_lien_telechargement')): ?>
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
							<?php
							endwhile;
							endif; ?>

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
		</div><!-- .entry-content -->

	</article><!-- #post-<?php the_ID(); ?> -->

	<?php
	get_footer();
