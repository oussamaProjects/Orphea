<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @see https://codex.wordpress.org/Template_Hierarchy
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">

		<div id="page_modele">


			<!-- start head section -->
			<div class="container">

				<?php
                if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb('
					<p id="breadcrumbs">', '</p>
					');
                }
                ?>

				<div class="main_block">
					<div class="row">
						<div class="col-md-8">
                            <h1>
                                <?php the_title() ?>
                            </h1>
							<div class="description">
								<?php the_field('description_main_block'); ?>
							</div>
						</div>
                        <div class="col-md-4">
							<div class="row">
                                <?php if (!empty(get_field('taxon_posts'))): ?>

                                <div class="col-md-12 taxon-container">
                                    <h3><?php _e('Actus', 'orphea') ?></h3>

                                    <ul>
                                        <?php foreach (get_field('taxon_posts') as $key => $post): ?>
                                            <li>
                                                <a href="<?php echo get_permalink($post->ID); ?>">
                                                    <?php echo get_the_title($post) ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>

                                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly?>
                                <?php endif; ?>

                                <?php if (!empty(get_field('taxon_links'))): ?>

                                <div class="col-md-12 taxon-container">
                                    <h3><?php _e('Liens', 'orphea') ?></h3>

                                    <ul>
                                        <?php foreach (get_field('taxon_links') as $key => $link): ?>
                                            <li>
                                                <a href="<?php echo esc_url($link['url']); ?>">
                                                    <?php echo wp_kses_post($link['titre']) ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>

                                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly?>
                                <?php endif; ?>
                            </div>
						</div>
					</div>
				</div>

			</div>
			<!-- end head section -->


			</div>
		</div><!-- .entry-content -->

	</article><!-- #post-<?php the_ID(); ?> -->
