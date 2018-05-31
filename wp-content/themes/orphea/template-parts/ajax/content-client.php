<div class="client-block-container thearticle col-lg-3 col-md-4">
	<div class="client-block">
		<div class="client-logo">
			<?php the_post_thumbnail(); ?>
		</div>
		<div class="client-links">
			<?php if(count(get_field('cas_client_lie'))): ?>
				<?php foreach(get_field('cas_client_lie') as $cas_lie):?>
					<a href="<?php the_permalink($cas_lie); ?>"><?php _e('Voir le cas clients', 'orphea'); ?></a>
				<?php endforeach; ?>
				<?php if(get_field('site_du_client')): ?>
					<span>&nbsp;|&nbsp;</span>
				<?php endif; ?>
			<?php endif; ?>
			<?php if(get_field('site_du_client')): ?>
				<a href="<?php echo get_field('site_du_client'); ?>" target="_blank"><?php _e('Voir le site public', 'orphea'); ?></a>
			<?php endif; ?>
		</div>
	</div>
</div>