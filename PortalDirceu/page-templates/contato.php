<?php // Template Name: Contato ?>
<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>
    <div class='post-thumbnail'>
        <?php echo do_shortcode('[codepeople-post-map]'); ?>
    </div>

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
