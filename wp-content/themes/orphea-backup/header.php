<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Orphea
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'orphea' ); ?></a>
		<?php $GLOBALS['page_ID'] = get_the_ID();  ?>

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
				<div class="th_recherche th_btn"><a href="#">Recherche</a></div>
				<div class="th_contact th_btn"><a href="<?php echo get_page_link(109);?>">Contact</a></div>
				<div class="th_actus th_btn"><a href="<?php echo get_page_link(34);?>">Actus</a></div>
				<div class="th_demo th_btn"><a href="<?php echo get_page_link(109);?>">Démo</a></div>
			</div>

			<?php if(get_field('text_entete', $GLOBALS['page_ID'])){ ?>
			<div class="citation">
				<div class="titre">
					<?php the_field('text_entete', $GLOBALS['page_ID']); ?>
				</div>
			</div>
			<?php } ?>

			<nav id="site-navigation" class="main-navigation">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu'
					)
				);
				?>
			</nav><!-- #site-navigation -->
			<?php if ( get_field('page_slider', $GLOBALS['page_ID']) ): ?>
				<?php echo do_shortcode( get_field('page_slider', $GLOBALS['page_ID']) ); ?>
			<?php endif; ?>
		</header><!-- #masthead -->

		<div id="content" class="site-content">
