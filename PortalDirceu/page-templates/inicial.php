<?php // Template Name: Inicial ?>
<?php get_header(); ?>

<section id='main' class='fullwidth'>
    <?php while (have_posts()): the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; ?>
</section>

<?php get_footer();
