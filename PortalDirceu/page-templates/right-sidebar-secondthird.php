<?php
/**
 * Template Name: Right Sidebar Secondthird
 *
 * @package WordPress
 * @subpackage Apex_Team
 * @since Apex Team 1.0
 */

get_header(); ?>

<div class="sitepage-wrapper">
<div class="container">
	
<div class="eleven columns">
<?php
	if ( is_front_page() && apexteam_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}

				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

					
				endwhile;
			?>
</div>
<div class="five columns">
    <?php get_sidebar('secondthird'); ?>

    
    
</div>	
	
</div>
</div><!-- #main-content -->

<?php
get_footer();
