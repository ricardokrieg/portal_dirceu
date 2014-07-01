<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>
    <?php portaldirceu_post_thumbnail(); ?>

    <?php the_title('<div class="page-title-container"><h2>', '</h2></div>'); ?>

    <div class='container'>
        <section id='main'>
            <section class='page'>
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
        </section>
    </div>
<?php endwhile; ?>

<?php get_footer();
