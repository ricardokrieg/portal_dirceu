<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Apex_Team
 * @since Apex Team 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Page thumbnail and title.
		apexteam_post_thumbnail();
		the_title( '<header class="entry-header"><h2 class="entry-title">', '</h2></header><!-- .entry-header -->' );
	?>

	<div class="entry-content">
		<?php
			the_content();
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'apexteam' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );

			edit_post_link( __( 'Edit', 'apexteam' ), '<span class="edit-link">', '</span>' );
		?>
	</div><!-- .entry-content -->

	<span style='display:none'>
		<?php apexteam_posted_on(); ?>
	</span>
</article><!-- #post-## -->
