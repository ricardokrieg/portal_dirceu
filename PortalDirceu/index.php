<?php get_header(); ?>

<div class='container'>
    <div class='slide-container'></div>
    <div class='slide-shadow'></div>

    <?php if (have_posts()): ?>
        <section id='main'>
            <?php while (have_posts()): the_post(); ?>
                <?php get_template_part('content', get_post_format()); ?>
            <?php endwhile; ?>
        </section>
    <?php else: ?>
        <section id='main'>
            <?php get_template_part('content', 'none'); ?>
        </section>
    <?php endif; ?>
</div>

<?php get_footer();
