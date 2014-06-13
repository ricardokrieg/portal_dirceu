<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Apex_Team
 * @since Apex Team 1.0
 */

get_header(); ?>

<div class="sitepage-wrapper">
<div class="container">
<div class="eleven columns">
	
			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Not Found', 'apexteam' ); ?></h1>
			</header>

			<div class="page-content">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'apexteam' ); ?></p>

				<?php get_search_form(); ?>
			</div><!-- .page-content -->


</div>
<div class="five columns">
    <?php get_sidebar('content'); ?>

    
    
    </div>		
	
</div>
</div><!-- #main-content -->

<?php
get_footer();