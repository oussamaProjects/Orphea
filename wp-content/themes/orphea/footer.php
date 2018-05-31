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
		<div class="container">
			<div class="row">
				<div class="col-lg-4 offset-lg-2 col-md-6">
					<?php echo do_shortcode('[gravityform id="5" title="false" description="false"]'); ?>
				</div>
				<div class="col-lg-4 col-md-6">
					<a href="<?=get_page_link(34);?>" class="btn btn-footer"><?php _e( 'Consultez nos actualités', 'orphea' ) ?></a>
				</div>
			</div>
		</div>


		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="footer_menus">
						<div class="footer_menu">
							<div class="titre"><?php _e( 'Besoins', 'orphea' ) ?></div>
							<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-2',
								'menu_id'        => 'primary-menu',
								)
							);
							?>
						</div>
						<div class="footer_menu">
							<div class="titre"><?php _e( 'Solutions', 'orphea' ) ?></div>
							<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-3',
								'menu_id'        => 'primary-menu',
								)
							);
							?>
						</div>
						<div class="footer_menu">
							<div class="titre"><?php _e( 'Expertise', 'orphea' ) ?></div>
							<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-6',
								'menu_id'        => 'primary-menu',
								)
							);
							?>
						</div>
						<div class="footer_menu">
							<div class="titre"><?php _e( 'Clients', 'orphea' ) ?></div>
							<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-4',
								'menu_id'        => 'primary-menu',
								)
							);
							?>
						</div>
						<div class="footer_menu">
							<div class="titre"><?php _e( 'Ressources', 'orphea' ) ?></div>
							<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-5',
								'menu_id'        => 'primary-menu',
								)
							);
							?>
						</div>
						<div class="footer_menu">
							<div class="titre"><?php _e( 'Orphea', 'orphea' ) ?></div>
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
						<a href="<?php echo get_site_url(); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/img/logo-gray.png" alt="Orphea">
						</a>
					</div>
				</div>
				<div class="col-md-7">
					<div class="footer_description">
						<p>
							<?php _e( 'Fondée en 1997, Orphea est la référence des solutions de Digital Asset Management (DAM) dédiées au stockage et à la valorisation des actifs numériques. Orphea accompagne près de 150 clients dans le monde, tous secteurs confondus. Ses photothèques, médiathèques et brand centers sont utilisés par plus de 120 000 utilisateurs dans plus de 170 pays. ' ) ?>
						</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="suivez-nous">
						<div class="sn_titre"><?php _e( 'Suivez-nous !', 'orphea' ) ?></div>
						<div class="sn_icones sn_footer">
							<div class="linkedin">
								<a target="_blank" href="https://www.linkedin.com/company/algoba-systems/">
									<i class="fa fa-linkedin" aria-hidden="true"></i>
								</a>
							</div>
							<div class="twitter">
								<a target="_blank" href="https://twitter.com/orphea_studio">
									<i class="fa fa-twitter" aria-hidden="true"></i>
								</a>
							</div>
							<div class="youtube">
								<a target="_blank" href="https://www.youtube.com/channel/UCarzrz4qY_8wEn9aNsAQOrg">
									<i class="fa fa-youtube" aria-hidden="true"></i>
								</a>
							</div>
							<div class="facebook">
								<a target="_blank" href="https://www.facebook.com/orpheastudio">
									<i class="fa fa-facebook" aria-hidden="true"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="captera-avis">
						<img class="captera-img" src="<?php echo get_template_directory_uri(); ?>/img/captera.png" alt="Orphea">
						<p><?php _e("Découvrez les avis <br> de nos clients", 'orphea') ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="site-info">

		<?php _e( '© 2017 ORPHEA' , 'orphea'  ); ?></a>
		<span class="sep"> - </span>

		<a href="<?php echo get_permalink(icl_object_id(2063,'page',false));?>">
			<?php _e( 'Plan du site' , 'orphea'  ); ?>
		</a>
		<span class="sep"> - </span>

		<a href="<?php echo get_permalink(icl_object_id(1059,'page',false));?>">
			<?php _e( 'Mentions légales' , 'orphea'  ); ?>
		</a>
		<span class="sep"> - </span>

		<a href="<?php echo get_permalink(icl_object_id(1071,'page',false));?>">
			<?php _e( 'Cookies' , 'orphea'  ); ?>
		</a>
		<span class="sep"> - </span>

		<a href="http://magina.fr/" target="_blank" rel="nofollow">
			<?php _e( 'Création Magina' , 'orphea'  ); ?>
		</a>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-37123970-11"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-37123970-1');
</script>
<script type="text/javascript">
var webleads_site_ids = webleads_site_ids || [];
webleads_site_ids.push(100739138);
(function() {
  var s = document.createElement('script');
  s.type = 'text/javascript';
  s.async = true;
  s.src = ( document.location.protocol == 'https:' ? 'https://stats.webleads-tracker.com/js' : 'http://stats.webleads-tracker.com/js' );
  ( document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0] ).appendChild( s );
})();
</script>
<noscript><p><img alt="webleads-tracker" width="1" height="1" src="//stats.webleads-tracker.com/100739138ns.gif" /></p></noscript>

</body>
</html>
