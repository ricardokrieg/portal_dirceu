<?php $metadata = wp_get_attachment_metadata(); ?>

<?php get_header(); ?>

<section id='main'>
	<?php if (have_posts()): ?>
	    <?php while (have_posts()): the_post(); ?>
	    	<section class='post image-attachment'>
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

	            		<?php xicamais_the_attached_image(); ?>

	    	            <?php if (is_search()): ?>
	    	                <?php the_excerpt(); ?>
	    	            <?php else: ?>
	    	            	<?php if (has_excerpt()): ?>
		            			<?php the_excerpt(); ?>
	    	            	<?php endif; ?>

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

            <section class='author-post'>
                <div>
                    <? echo get_avatar(get_the_author_meta('user_email'), '90'); ?>
                    <span>
                        <h4><?php echo get_the_author(); ?></h4>
                        <p><? echo get_the_author_meta('user_description'); ?></p>
                    </span>
                </div>
            </section>

            <nav id='image-navigation' class='navigation image-navigation'>
            	<div class='nav-links'>
            		<?php previous_image_link(false, "<div class='previous-image'>" .__('Imagem Anterior', 'xicamais'). "</div>"); ?>
            		<?php next_image_link(false, "<div class='next-image'>" .__('Próxima Imagem', 'xicamais'). "</div>"); ?>
            	</div>
            </nav>

	    	<?php if (comments_open() || get_comments_number()): ?>
	    		<?php comments_template(); ?>
	    	<?php endif; ?>
        <?php endwhile; ?>
    <?php else: ?>
        <?php get_template_part('content', 'none'); ?>
    <?php endif; ?>
</section>

<aside>
	<?php get_sidebar(); ?>
</aside>

<?php get_footer();
