<?php // Template Name: Left Sidebar Page ?>
<?php get_header(); ?>

<aside class='left-sidebar'>
	<?php get_sidebar(); ?>
</aside>

<section id='main' class='left-sidebar'>
    <?php if (is_front_page() && xicamais_has_featured_posts()): ?>
    	<?php get_template_part('featured-content'); ?>
    <?php endif; ?>

    <?php while (have_posts()): the_post(); ?>
    	<?php get_template_part('content', 'page'); ?>
    <?php endwhile; ?>
</section>

<?php get_footer();
