<?php

//----------------------------------------------------------------------------------------#
//-- SHORTCODE CREATION ------------------------------------------------------------------#
//----------------------------------------------------------------------------------------#

// Add Shortcode which displays job offers list
function orphea_list_job_offers()
{
    $return             = '';
    $return_spontaneous = '
	<div class="job_offers_spontaneous">
		<div>
			<p class="spontaneous_title">'.__('Didn\'t find any listings that match your type?', 'orphea_emploi').'</p>
		</div>
		<div>
			<a href="'.get_permalink(821).'?spontanee=Oui" class="spontaneous_apply">'.__('Spontanous Application', 'orphea_emploi').'</a>
		</div>
	</div>';
    $args_jobs = array(
        'post_type'            => 'job_offer',
        'post_status'          => 'publish',
        'posts_per_page'       => 10,
    );
    $jobs = new WP_Query($args_jobs);

    if ($jobs->have_posts()):

        $return .= '<ul class="list_job_offers">';
    while ($jobs->have_posts()):

            $jobs->the_post();
    $return .= '
			<li id="job_'.get_the_ID().'">
				<div class="job_row">
					<div class="job_short_desc">
						<p class="job_title">'.get_the_title().'</p>
						<div class="job_attributes">
							<p class="job_location">'.get_post_meta(get_the_ID(), '_job_offer_localisation', true).'</p>
							<p class="job_type">'.get_post_meta(get_the_ID(), '_job_offer_type', true).'</p>
							<p class="job_date">'.get_post_meta(get_the_ID(), '_job_offer_date', true).'</p>
						</div>
					</div>
					<div class="job_action">
						<a href="'.get_permalink(821).'?spontanee=Non&ref='.get_post_meta(get_the_ID(), '_job_offer_reference', true).'" class="job_apply">'.__('Apply', 'orphea_emploi').'</a>
					</div>
				</div>
				<div class="job_long_desc">
				'.get_the_content().'
				</div>
			</li>';

    endwhile;
    wp_reset_postdata();
    $return .= '</ul>'.$return_spontaneous;
    $return .= '<script type="text/javascript">jQuery(document).ready(function(){ jQuery(".list_job_offers li").on("click", function(){ jQuery(this).find(".job_long_desc").slideToggle(); }); });</script>'; else:

        $return = $return_spontaneous;

    endif;

    return $return;
}
add_shortcode('list_job_offers', 'orphea_list_job_offers');

//-- END OF CODE -------------------------------------------------------------------------#
