<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Orphea
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">

	<div class="footer_top">
		<div class="footer_btns">
			<div class="btns">
				<a href="#" class="btn btn-footer">Téléchargez le livre blanc</a>
				<a href="#" class="btn btn-footer">Consultez tous nos ebooks</a>
			</div>
		</div>


		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="footer_menus">
						<div class="footer_menu">
							<div class="titre">Besoins</div>
							<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-2',
								'menu_id'        => 'primary-menu',
								)
							);
							?>
						</div>
						<div class="footer_menu">
							<div class="titre">Solutions</div>
							<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-3',
								'menu_id'        => 'primary-menu',
								)
							);
							?>
						</div>
						<div class="footer_menu">
							<div class="titre">Clients</div>
							<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-4',
								'menu_id'        => 'primary-menu',
								)
							);
							?>
						</div>
						<div class="footer_menu">
							<div class="titre">Resousrces</div>
							<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-5',
								'menu_id'        => 'primary-menu',
								)
							);
							?>
						</div>
						<div class="footer_menu">
							<div class="titre">Expertise</div>
							<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-6',
								'menu_id'        => 'primary-menu',
								)
							);
							?>
						</div>
						<div class="footer_menu">
							<div class="titre">Orphea</div>
							<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-7',
								'menu_id'        => 'primary-menu',
								)
							);
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="footer_between">

		<div class="container">
			<div class="row">
				<div class="col-md-2">
					<div class="logo-footer">
						<a href="#">
							<img src="<?php echo get_template_directory_uri(); ?>/img/logo-gray.png" alt="Orphea">
						</a>
					</div>
				</div>
				<div class="col-md-7">
					<div class="footer_description">
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque lauda
						</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="suivez-nous">
						<div class="sn_titre">Suivez-nous !</div>
						<div class="sn_icones sn_footer">
							<div class="linkedin">
								<a href="#">
									<i class="fa fa-linkedin" aria-hidden="true"></i>
								</a>
							</div>
							<div class="twitter">
								<a href="#">
									<i class="fa fa-twitter" aria-hidden="true"></i>
								</a>
							</div>
							<div class="youtube">
								<a href="#">
									<i class="fa fa-youtube" aria-hidden="true"></i>
								</a>
							</div>
							<div class="facebook">
								<a href="#">
									<i class="fa fa-facebook" aria-hidden="true"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="captera-avis">
						<img class="captera-img" src="<?php echo get_template_directory_uri(); ?>/img/captera.png" alt="Orphea">
						<p>Découvrez les avis <br> de nos clients</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="site-info">
		<a href="#">
			<?php _e( 'Mentions légales' , 'orphea'  ); ?>
		</a>
		<span class="sep"> - </span>
		<?php _e( 'Orphea 2017' , 'orphea'  ); ?></a>
		<span class="sep"> - </span>
		<a href="#">
			<?php _e( 'Création Magina' , 'orphea'  ); ?>
		</a>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
