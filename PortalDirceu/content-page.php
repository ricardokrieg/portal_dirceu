<section class='post page'>
    <article>
        <?php the_title('<h2>', '</h2>'); ?>

        <section class='content'>
            <?php xicamais_post_thumbnail(); ?>

            <?php if (is_search()): ?>
                <?php the_excerpt(); ?>
            <?php else: ?>
                <?php the_content(__('Leia Mais', 'xicamais')); ?>
                <?php
                    wp_link_pages(array(
                        'before'      => "<div class='page-links'><span class='page-links-title'>" .__('Páginas:', 'xicamais' ). "</span>",
                        'after'       => "</div>",
                        'link_before' => "<span>",
                        'link_after'  => "</span>",
                    ));
                ?>
            <?php endif; ?>
        </section>

        <?php edit_post_link(__('Editar', 'xicamais'), "<span class='edit-link'>", "</span>"); ?>
    </article>
</section>
