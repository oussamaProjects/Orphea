<!--*******************************     cta_area_pages   -->

<?php
$cta_area_left_title 			= get_field('cta_area_left_title') ? get_field('cta_area_left_title') : __("Besoin d'un conseil d'informations supplémentaires...", "orphea");
$cta_area_left_link 			= get_field('cta_area_left_link') ? get_field('cta_area_left_link') : get_permalink(109);
$cta_area_left_target 		= (strpos($cta_area_left_link, 'orpheacogg.cluster023.hosting.ovh.net') !== false || strpos($cta_area_left_link, 'orphea.com') !== false ) ? '_parent' : '_blank';
$cta_area_left_link_label = get_field('cta_area_left_link_label') ? get_field('cta_area_left_link_label') : __("Contactez nous", "orphea");
$ctas_blocs 							= get_field('ctas_blocs');
// Default values :
if(sizeof($ctas_blocs) != 3){
	$default_ctas_blocs = new WP_Query( array('post_type' => 'cta', 'post_status' => 'publish', 'posts_per_page' => 3, 'order_by' => 'date', 'order' => 'ASC') );
	if( !is_array($ctas_blocs) ){ $ctas_blocs = array(); }
	$ctas_blocs = array_merge( $ctas_blocs, $default_ctas_blocs->posts );
	$ctas_blocs = array_unique($ctas_blocs, SORT_REGULAR);
	$ctas_blocs = array_slice($ctas_blocs, 0, 3);
}

?>

<section class="ctas_area_pages_container <?php echo (get_field('cta_area_display_links')) ? 'has-right-links' : 'simple'; ?>">

	<div class="container">
		<div class="row">

			<?php if( get_field('cta_area_display_links') ) : ?>

			<div class="col-md-6 cta_area_left">
				<p class="title"><?php echo $cta_area_left_title; ?></p>
				<a href="<?php echo $cta_area_left_link; ?>" target="<?php echo $cta_area_left_target; ?>" class="button"><?php echo $cta_area_left_link_label; ?></a>
			</div>
			<div class="col-md-6 cta_area_right">
				<div class="cta_blocs_list">
				<p class="title"><?php _e("Orphea c'est aussi", "orphea"); ?></p>

				<?php foreach($ctas_blocs as $post):
					setup_postdata($post);
					$link_mode = get_post_meta( get_the_ID(), 'cta_link_mode', true );
					$link = ($link_mode == 'Relation') ? get_permalink(get_post_meta( get_the_ID(), 'cta_relation', true)) : get_post_meta( get_the_ID(), '_cta_url', true);
				?>
				<a href="<?php echo $link; ?>" class="cta_bloc_link" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>);">
					<span><?php echo get_the_title(); ?></span>
				</a>
				<?php endforeach; wp_reset_postdata(); ?>
				</div>
			</div>

			<?php else : ?>

			<div class="col-md-6 cta_area_left">
				<p class="title"><?php echo $cta_area_left_title; ?></p>
			</div>
			<div class="col-md-6 cta_area_right">
				<a href="<?php echo $cta_area_left_link; ?>" target="<?php echo $cta_area_left_target; ?>" class="button"><?php echo $cta_area_left_link_label; ?></a>
			</div>

			<?php endif; ?>

		</div>
	</div>

</section>

<!--*******************************     END cta_area_pages   -->
