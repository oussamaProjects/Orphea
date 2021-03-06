<?php

/**
 * Template Name: Template contact
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Orphea
 */

get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">

		<div id="page_modele">

			<div class="container">

        <?php include( realpath(dirname(__FILE__) ).'/template-parts/parts/page_head.php' ); ?>

					<div class="main_block">
            <div class="row">
              <div class="col-md-6 offset-3">
                <div class="contactform">
									<?php// echo do_shortcode( '[gravityform id="1" title="true" description="true"]' ) ; ?>
                  <form action="#">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group "><input type="text" class="form-control" placeholder="Nom*"></div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group "><input type="text" class="form-control" placeholder="Pénom*"></div>
                      </div>
                    </div>
                    <div class="form-group "><input type="text" class="form-control" placeholder="Fonction*"></div>
                    <div class="form-group ">
                      <select class="form-control">
                        <option>------</option>
                        <option>Pays</option>
                        <option>Pays</option>
                        <option>Pays</option>
                        <option>Pays</option>
                      </select>
                    </div>
										  <div class="form-group"><input type="text" class="form-control" placeholder="Société*"></div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group"><input type="text" class="form-control" placeholder="E-mail*"></div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group"><input type="text" class="form-control" placeholder="Téléphone"></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="">Comment nous avez-vous connu ?</label>
                      <div class="form-group">
                        <select class="form-control">
                          <option>------</option>
                          <option>Choix 1</option>
                          <option>Choix 1</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" rows="10" placeholder="Message*"></textarea>
                    </div>
                      <button type="submit" class="btn btn-site btn-lg ">Envoyer</button>
                  </form>
                </div>
              </div>
            </div>
					</div>

		</div>
	</div>

</div>
</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->

<?php
get_footer();
