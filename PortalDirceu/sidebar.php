<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Apex_Team
 * @since Apex Team 1.0
 */
?>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	
	<?php endif; ?>

