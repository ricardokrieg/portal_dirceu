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
                    </div>
                </section>
            </section>
        </section>
    </div>
<?php endwhile; ?>

<?php get_footer();
