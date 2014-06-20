<?php get_header(); ?>

<section id='main'>
    <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
			<?php get_template_part('content', get_post_format()); ?>

            <section class='author-post'>
                <div>
                    <? echo get_avatar(get_the_author_meta('user_email'), '90'); ?>
                    <span>
                        <h4><?php echo get_the_author(); ?></h4>
                        <p><? echo get_the_author_meta('user_description'); ?></p>
                    </span>
                </div>
            </section>

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
