<section class='post page'>
    <article>
        <?#php the_title('<h2>', '</h2>'); ?>

        <section class='content'>
            <?php portaldirceu_post_thumbnail(); ?>

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
        </section>

        <?php edit_post_link(__('Editar', 'portaldirceu'), "<span class='edit-link'>", "</span>"); ?>
    </article>
</section>
