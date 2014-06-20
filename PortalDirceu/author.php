<?php get_header(); ?>

<?php if (have_posts()) : ?>
	<?php the_post(); ?>
	<h1>
		<?php printf(__('Posts de %s', 'portaldirceu'), get_the_author()); ?>
	</h1>

	<?php if (get_the_author_meta('description')) : ?>
		<span class='author-description'><?php the_author_meta('description'); ?></span>
	<?php endif; ?>

	<section id='main'>
		<?php rewind_posts(); ?>
		<?php while (have_posts()): the_post(); ?>
			<?php get_template_part('content', get_post_format()); ?>
		<?php endwhile; ?>

		<?php portaldirceu_paging_nav(); ?>
	</section>
<?php else: ?>
	<section id='main'>
		<?php get_template_part('content', 'none'); ?>
	</section>
<?php endif; ?>

<aside>
	<?php get_sidebar(); ?>
</aside>

<?php get_footer();




