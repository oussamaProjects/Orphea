<?php

/**
 * Template Name: Template sitemap.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @see https://codex.wordpress.org/Template_Hierarchy
 */
get_header();
?>
<?php /* *********************************************************************************************************************** */ ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">

		<div id="page_modele">


			<?php include realpath(dirname(__FILE__)).'/template-parts/parts/page_head.php'; ?>
			<div class="container">
			<div id="content">
				<h2>Pages</h2>
<?php
$walker_page = new Walker_Page();
echo '<ul class="sitemap">'.$walker_page->walk(get_pages(), 2).'</ul>';
?>
<!-- <h2><?php _e('Articles', 'orphea'); ?></h2>
<ul><?php $archive_query = new WP_Query('showposts=1000'); while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
<li>
<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>

</li>
<?php endwhile; ?>
</ul> -->
</div>
			</div>


		</div>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->

<?php
get_footer();
