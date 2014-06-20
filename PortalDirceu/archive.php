<?php get_header(); ?>

<?php if (have_posts()): ?>
	<h1>
		<?php if (is_day()): ?>
			<?php echo get_the_date(); ?>
		<?php elseif (is_month()): ?>
			<?php echo get_the_date(_x('F Y', 'Formato de Data para arquivo mensal', 'portaldirceu')); ?>
		<?php elseif (is_year()): ?>
			<?php echo get_the_date(_x('Y', 'Formato de Data para arquivo anual', 'portaldirceu')); ?>
		<?php else: ?>
			<?php _e('Arquivo', 'portaldirceu'); ?>
		<?php endif; ?>
	</h1>

	<section id='main'>
		<?php while (have_posts()) : the_post(); ?>
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
