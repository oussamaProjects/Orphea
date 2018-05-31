<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Orphea
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<div id="page_modele">
			<div class="container">
			<?php
			if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('
			<p id="breadcrumbs">','</p>
			');
			}
			?>
			<ul class="top-right-icons float-right">
				<li>
					<a href="#" class="share"><img src="<?php echo get_template_directory_uri(); ?>/img/article_share_icon.png" alt="" srcset=""></a>
					<ul class="social-share-links">
						<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a target="_blank" href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink()); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						<li><a target="_blank" href="https://twitter.com/home?status=<?php echo urlencode(get_permalink()); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>&summary=&source="><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
					</ul>
				</li>
				<li><a target="_blank" href="<?php echo get_permalink() . '?format=pdf'; ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/article_pdf_icon.png" alt="" srcset=""></a></li>
				<li><a href="#" id="print-link"><img src="<?php echo get_template_directory_uri(); ?>/img/article_print_icon.png" alt="" srcset=""></a></li>
			</ul>
				<div class="titre_container">
					<div class="row">
						<div class="col-md-6">
							<div class="sous_titre">
							</div>
							<div class="titre"><?php the_title(); ?></div>
						</div>
					</div>
				</div>

				<div class="main_block">
					<div class="row">
						<div class=" col-md-12">
							<div class="description"><?php the_content(); ?></div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
