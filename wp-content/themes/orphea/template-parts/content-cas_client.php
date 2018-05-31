<?php
/**
 * Template part for displaying page content in page.php
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

                <div class="titre_container">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="sous_titre">
                                <?php _e('Retour d\'experience', 'orphea'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                $clients = get_posts(array(
                    'post_type' => 'client',
                    'meta_query' => array(
                        array(
                                'key' => 'cas_client_lie', // name of custom field
                                'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
                                'compare' => 'LIKE'
                                )
                        )
                    ));

                    ?>
                    <?php foreach($clients as $client): ?>
                        <div class="titre_container client<?php echo $client->ID; ?>">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="titre"><?php echo $client->post_title; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="main_block">
                            <div class="row">
                                <div class=" col-md-12">
                                    <div class="description"><?php echo $client->post_content; ?></div>
                                </div>
                            </div>
                        </div>
                    <?php break; ?>
                    <?php endforeach; ?>
                </div>

                <?php //include(realpath(dirname(__FILE__)) . '/parts/page_head.php'); ?>
                <div class="container">
                    <div class="page_modele_blocks">
                        <div id="<?php echo sanitize_title(get_sub_field('titre')); ?>" class="block">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="description nopadding">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <?php the_post_thumbnail(); ?>
                                </div>
                            </div>
                        </div>
                        <!-- La ligne suivante inclut la boucle de blocks special pour les cas clients (En prenant en consideration le bloc précédent). -->
                        <?php include( realpath(dirname(__FILE__) ).'/parts/cas_client_alternative_contents.php' ); ?>
                    </div>
                </div>
                <?php include(realpath(dirname(__FILE__)) . '/footer/articles_bas_pages.php'); ?>


            </div>
        </div><!-- .entry-content -->

    </article><!-- #post-<?php the_ID(); ?> -->
