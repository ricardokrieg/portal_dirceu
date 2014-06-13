<?php
/**
 * The Content Sidebar second
 *
 * @package WordPress
 * @subpackage Apex_Team
 * @since Apex Team 1.0
 */


?>
<div id="content-sidebar" class="content-sidebar widget-area" role="complementary">
	<?php
	if (is_active_sidebar( 'sidebar-7' ) )
	 {
	 	dynamic_sidebar( 'sidebar-7' ); 
	 }

	?>
	

	
</div><!-- #content-sidebar -->
