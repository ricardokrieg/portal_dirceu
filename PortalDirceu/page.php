<?php get_header(); ?>

<div class='container'>
    <section id='main'>
        <?php while (have_posts()): the_post(); ?>
            <section class='page'>
                <?php portaldirceu_post_thumbnail(); ?>

                <?php the_title('<div class="page-title-container"><h2>', '</h2></div>'); ?>

                <section class='content'>
                    <div class='container with-padding'>
                        <?php if (is_search()): ?>
                            <?php the_excerpt(); ?>
                        <?php else: ?>
                            <?php the_content(__('Leia Mais', 'portaldirceu')); ?>
                            <?php
                                wp_link_pages(array(
                                    'before'      => "<div class='page-links'><span class='page-links-title'>" .__('Páginas:', 'portaldirceu' ). "</span>",
                                    'after'       => "</div>",
                                    'link_before' => "<span>",
                                    'link_after'  => "</span>",
                                ));
                            ?>
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
