<?php // Template Name: Inicial ?>
<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>
    <?php apply_filters('the_content', get_the_content()); ?>
    <?php if (isset($global_slide_id)): ?>
        <?php echo do_shortcode("[epsshortcode id=" .$global_slide_id. "]") ?>
        <div class='slide-shadow'></div>
    <?php endif; ?>

    <div class='container'>
        <section id='main'>
            <section class='page'>
                <section class='content'>
                    <div class='container no-padding'>
                        <?php if (is_search()): ?>
                            <?php the_excerpt(); ?>
                        <?php else: ?>
                            <?php the_content(__('Leia Mais', 'portaldirceu')); ?>

                        <?php endif; ?>

                        <div class='edit-link'>
                            <?php edit_post_link(__('Editar', 'portaldirceu'), "<span class='edit-link'>", "</span>"); ?>
                        </div>
                    </div>
                </section>
            </section>
        </section>
    </div>
<?php endwhile; ?>

<?php get_footer();
