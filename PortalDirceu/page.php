<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>
    <?php portaldirceu_post_thumbnail(); ?>

    <?php the_title('<div class="page-title-container"><h2>', '</h2></div>'); ?>

    <div class='container'>
        <section id='main'>
            <section class='page'>
                <section class='content'>
                    <div class='container with-padding'>
                        <?php the_content(); ?>


                        <?php if (false): ?>
                        <?php
                            $small_msg_1_title = get_field('small-msg-1-title');
                            $small_msg_1_content = get_field('small-msg-1-content');
                            $small_msg_1_image = get_field('small-msg-1-image');

                            $small_msg_2_title = get_field('small-msg-2-title');
                            $small_msg_2_content = get_field('small-msg-2-content');
                            $small_msg_2_image = get_field('small-msg-2-image');

                            $small_msg_3_title = get_field('small-msg-3-title');
                            $small_msg_3_content = get_field('small-msg-3-content');
                            $small_msg_3_image = get_field('small-msg-3-image');

                            $display_msg_1 = ($small_msg_1_title || $small_msg_1_content || $small_msg_1_image);
                            $display_msg_2 = ($small_msg_2_title || $small_msg_2_content || $small_msg_2_image);
                            $display_msg_3 = ($small_msg_3_title || $small_msg_3_content || $small_msg_3_image);
                        ?>

                        <div class='small-msg-container'></div>

                        <?php endif; ?>
                    </div>
                </section>
            </section>
        </section>
    </div>
<?php endwhile; ?>

<?php get_footer();
