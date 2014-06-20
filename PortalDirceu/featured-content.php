<div id='featured-content' class='featured-content'>
	<div class='featured-content-inner'>
		<?php do_action('xicamais_featured_posts_before'); ?>

		<?php $featured_posts = xicamais_get_featured_posts(); ?>
		<?php foreach ((array) $featured_posts as $order => $post): ?>
			<?php setup_postdata($post); ?>

			<?php get_template_part('content', 'featured-post'); ?>
		<?php endforeach; ?>

		<?php do_action('xicamais_featured_posts_after'); ?>

		<?php wp_reset_postdata(); ?>
	</div>
</div>
