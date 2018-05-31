<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Orphea
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<?php
		if ( have_posts() ) : ?>


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
						<div class="col-md-12">
							<div class="titre">Glossaire</div>
						</div>
					</div>
				</div>

				<div class="main_block">
					<div class="row">
						<div class=" col-md-12">
			<a href="<?php echo get_permalink(16);?>#digital-asset-management-dam" class="glossaire_intro_dam"><img src="<?= home_url();?>/wp-content/uploads/2017/09/orphea_studio_visuel_offres.jpg" /><br /><br /><img src="<?=home_url();?>/wp-content/uploads/2017/09/speech-orphea_0.gif" /></a>
			<ul class="glossaire_list_refs">

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php
				//get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

			</ul>
			</div>
					</div>
				</div>

			</div>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
