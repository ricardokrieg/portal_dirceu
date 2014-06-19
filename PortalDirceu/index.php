<?php get_header(); ?>

<div class='slide-container'></div>
<div class='slide-shadow'></div>

<?php if (have_posts()): ?>
	<section id='main'>
        <?#php dynamic_sidebar('sidebar-home'); ?>

		<?php while (have_posts()): the_post(); ?>
			<?php get_template_part('content', get_post_format()); ?>
		<?php endwhile; ?>

        <div id='nav-below' class='navigation'>
            <div class='nav-previous'><?php previous_posts_link(); ?></div>
            <div class='nav-next'><?php next_posts_link(); ?></div>
        </div>
	</section>
<?php else: ?>
	<section id='main'>
		<?php get_template_part('content', 'none'); ?>
	</section>
<?php endif; ?>

<aside>
    <?#php get_sidebar(); ?>
</aside>

<?#php get_footer();
