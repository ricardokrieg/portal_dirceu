<?php // Template Name: Contato ?>
<?php get_header(); ?>

<div class='container'>
    <section id='main'>
        <?php while (have_posts()): the_post(); ?>
            <section class='page'>
                <?php if (is_active_sidebar('widget-map')): ?>
                    <?php dynamic_sidebar('widget-map'); ?>
                <?php endif; ?>

                <?php the_title('<div class="page-title-container"><h2>', '</h2></div>'); ?>

                <section class='content'>
                    <div class='container with-padding'>
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
        <?php endwhile; ?>
    </section>
</div>

<?php get_footer();
