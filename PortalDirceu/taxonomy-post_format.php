<?php get_header(); ?>

<?php if (have_posts()): ?>
	<header class="archive-header">
		<h1 class="archive-title">
			<?php
				if (is_tax('post_format', 'post-format-aside')):
					_e('Asides', 'portaldirceu');
				elseif (is_tax('post_format', 'post-format-image')):
					_e('Images', 'portaldirceu');
				elseif (is_tax('post_format', 'post-format-video')):
					_e('Videos', 'portaldirceu');
				elseif (is_tax('post_format', 'post-format-audio')):
					_e('Audio', 'portaldirceu');
				elseif (is_tax('post_format', 'post-format-quote')):
					_e('Quotes', 'portaldirceu');
				elseif (is_tax('post_format', 'post-format-link')):
					_e('Links', 'portaldirceu');
				elseif (is_tax('post_format', 'post-format-gallery')):
					_e('Galleries', 'portaldirceu');
				else:
					_e('Archives', 'portaldirceu');
				endif;
			?>
		</h1>
	</header>

	<?php while (have_posts()) : the_post(); ?>
		<?php get_template_part('content', get_post_format()); ?>
	<?php endwhile; ?>

	<?php portaldirceu_paging_nav(); ?>
<?php else: ?>
	<section id='main'>
		<?php get_template_part('content', 'none'); ?>
	</section>
<?php endif; ?>

<aside>
	<?php get_sidebar(); ?>
</aside>

<?php get_footer();
