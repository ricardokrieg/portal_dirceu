<section class='post'>
    <article>
        <section class='date'>
            <?php echo get_the_date('j'); ?> <?php echo get_the_date('M'); ?> <p><?php echo get_the_date('Y'); ?></p>
        </section>

    	<?php if (is_single()): ?>
            <?php the_title('<h2>', '</h2>'); ?>
        <?php else: ?>
            <?php the_title("<h2><a href='" .esc_url(get_permalink()). "' rel='bookmark'>", "</a></h2>"); ?>
        <?php endif; ?>

        <section class='author'>
            <ul class='post-categories'>
                <?php echo get_the_category_list(); ?>
            </ul>

            <em>por</em> <?php echo get_the_author(); ?>
        </section>

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

        <section class='tags'>
            <br>
            <?php the_tags("<h4>Tags:</h4>", '', "<br>"); ?>
        </section>

        <section class='medias'>
            <?php if (!post_password_required() && (comments_open() || get_comments_number())): ?>
                <?php
                    comments_popup_link(
                        "<em>Deixe um comentário:</em> <span class='count'>0</span>",
                        "<em>Deixe um comentário:</em> <span class='count'>1</span>",
                        "<em>Deixe um comentário:</em> <span class='count'>%</span>"
                    );
                ?>
            <?php endif; ?>
        </section>
    </article>
</section>
