<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @see https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>



<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'orphea'); ?></a>
		<?php $GLOBALS['page_ID'] = get_the_ID(); ?>

		<header id="masthead" class="site-header">

			<div class="menu_logo_container">
				<div id="menu_burger" class="menu_icon">
					<span class="menu_1"></span>
					<span class="menu_2"></span>
					<span class="menu_3"></span>
				</div>
				<div class="logo"><?php the_custom_logo(); ?></div>
			</div>
			<div class="top_header">
				<div class="th_btn th_recherche"><a id="search-link" href="#"><?php _e('Recherche', 'orphea'); ?></a></div>
				<div class="th_btn th_contact"><a href="<?php echo get_page_link(109); ?>"><?php _e('Contact', 'orphea'); ?></a></div>
				<div class="th_btn th_actus"><a href="<?php echo get_page_link(34); ?>"><?php _e('Actus', 'orphea'); ?></a></div>
				<div class="th_btn th_social"><a href="<?php echo get_page_link(2327); ?>"><?php _e('Social', 'orphea'); ?></a></div>
				<div class="th_btn th_demo"><a href="<?php echo get_page_link(2075); ?>"><?php _e('Démo', 'orphea'); ?></a></div>
				<div class="th_btn th_wpml"><?php echo language_selector_code_(); ?></div>
			</div>
			<?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>

			<?php if (get_field('text_entete', $GLOBALS['page_ID'])) {
    ?>
			<div class="citation">
				<div class="titre">
					<?php the_field('text_entete', $GLOBALS['page_ID']); ?>
				</div>
			</div>
			<?php
} ?>

			<nav id="site-navigation" class="main-navigation">
				<?php
                wp_nav_menu(array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                    )
                );
                ?>
			</nav><!-- #site-navigation -->
			<?php if (get_field('page_slider', $GLOBALS['page_ID'])): ?>
				<div class="page_slider">
					<?php echo do_shortcode(get_field('page_slider', $GLOBALS['page_ID'])); ?>
				</div>
			<?php elseif (is_singular('glossaire_ref') || is_post_type_archive('glossaire_ref')): ?>
				<div class="page_slider">
					<?php layerslider(45); ?>
				</div>
			<?php elseif (is_singular('cas_client')): ?>
				<div class="page_slider">
					<?php
                    if (ICL_LANGUAGE_CODE === 'fr') {
                        layerslider(20);
                    } else {
                        layerslider(51);
                    }
                    ?>
				</div>
			<?php else: ?>
				<div class="full-width-featured-img">
					<?php the_post_thumbnail('full'); ?>
				</div>
			<?php endif; ?>
		</header><!-- #masthead -->

		<div id="content" class="site-content">
<div class="Go_up">
	<a href="#">
		<img src="<?php echo get_template_directory_uri(); ?>/img/go_up.png" alt="<?php _e('Naviguer en haut', 'orphea'); ?>">
	</a>
</div>
