<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Apex_Team
 * @since Apex Team 1.0
 */

get_header(); ?>

<div class="blog-wrapper">
<div class="container">
	<div class="eleven columns">

<?php
			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
					// Previous/next post navigation.
					apexteam_post_nav();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}

				endwhile;
				

			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif;
		?>
		

		


	</div>
    
    <div class="five columns">
    <?php get_sidebar(); ?>

    
    
    </div>
</div>

</div>




<?php
get_sidebar();
get_footer();




