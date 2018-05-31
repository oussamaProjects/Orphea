<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Orphea
 */

?>
<div class="container" >
  <div id="slider_temoignages" class="owl-carousel owl-theme">
    <?php
    $temoignages = get_posts(array(
        'post_type' => 'temoignage',
        'suppress_filters' => false,
        'posts_per_page' => -1
        ));
    ?>
    <?php foreach($temoignages as $temoignage): ?>
        <div class="temoignage row">
            <div class="titre"><?= get_the_title($temoignage->ID); ?></div>
            <div class="description"><?= wpautop(get_post_field('post_content', $temoignage->ID)); ?></div>
            <div class="client">
              <!-- <div class="logo">
                <?= get_the_post_thumbnail(get_field('client', $temoignage->ID)[0]); ?>
              </div> -->
              <div class="nom"><?php the_field('nom_client', $temoignage->ID); ?></div>
            </div>
        </div>
    <?php endforeach; ?>
  </div>
</div>
