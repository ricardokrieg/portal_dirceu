<?php
/**
 * The Content Sidebar
 *
 * @package WordPress
 * @subpackage Apex_Team
 * @since Apex Team 1.0
 */


?>
<div id="content-sidebar" class="content-sidebar widget-area" role="complementary">
	<?php
	if (is_active_sidebar( 'sidebar-2' ) )
	 {
	 	dynamic_sidebar( 'sidebar-2' ); 
	 }
	 if (is_active_sidebar( 'sidebar-7' ) )
	 {
	 	dynamic_sidebar( 'sidebar-7' ); 
	 }

	if (is_active_sidebar( 'sidebar-8' ) )
	 {
	 	dynamic_sidebar( 'sidebar-8' ); 
	 }

	?>
	

	
</div><!-- #content-sidebar -->
