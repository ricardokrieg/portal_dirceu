<?php
/**
 * Template Name: Blank Page
 *
 * @package WordPress
 * @subpackage Apex_Team
 * @since Apex Team 1.0
 */

get_header(); ?>



<?php

	if ( is_front_page() && apexteam_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
?>

	
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					the_content();

					
				endwhile;
			?>
		

<?php

get_footer();
