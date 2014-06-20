<?php get_header(); ?>

<?php if (have_posts()): ?>
	<h1>
		<?php printf(__('Resultados para: %s', 'xicamais'), get_search_query()); ?>
	</h1>

	<section id='main'>
		<?php while (have_posts()): the_post(); ?>
			<?php get_template_part('content', get_post_format()); ?>
		<?php endwhile; ?>

		<?php xicamais_paging_nav(); ?>
	</section>
<?php else: ?>
	<?php get_template_part('content', 'none'); ?>
<?php endif; ?>

<aside>
	<?php get_sidebar(); ?>
</aside>

<?php get_footer();
