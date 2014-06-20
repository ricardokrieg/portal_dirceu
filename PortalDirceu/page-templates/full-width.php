<?php // Template Name: Full Width Page ?>
<?php get_header(); ?>

<section id='main' class='fullwidth'>
    <?php if (is_front_page() && portaldirceu_has_featured_posts()): ?>
    	<?php get_template_part('featured-content'); ?>
    <?php endif; ?>

    <?php while (have_posts()): the_post(); ?>
    	<?php get_template_part('content', 'page'); ?>
    <?php endwhile; ?>
</section>

<?php get_footer();
