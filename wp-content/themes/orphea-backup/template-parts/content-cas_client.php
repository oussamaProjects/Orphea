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

                <div class="titre_container">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="sous_titre">
                                Retour d'experience
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
                    <div class="titre_container">
                        <div class="row">
                            <div class="col-md-6">
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

                    <?php endforeach; ?>


                <?php include(realpath(dirname(__FILE__)) . '/parts/page_head.php'); ?>
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
                </div>

                <?php include(realpath(dirname(__FILE__)) . '/footer/articles_bas_pages.php'); ?>

            </div>

        </div>
    </div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->


