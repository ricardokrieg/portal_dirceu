<?php get_header(); ?>

<?php if (have_posts()): ?>
	<h1>
		<?php echo single_tag_title('', false); ?>
	</h1>

	<?php $term_description = term_description(); ?>
	<?php if (!empty($term_description)): ?>
		<span class='taxonomy-description'><?php echo $term_description ?></div>
	<?php endif; ?>

	<section id='main'>
		<?php while (have_posts()): the_post(); ?>
			<?php get_template_part('content', get_post_format()); ?>
		<?php endwhile; ?>

		<?php xicamais_paging_nav(); ?>
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
