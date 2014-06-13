<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Apex_Team
 * @since Apex Team 1.0
 */
?>


	<?php
	if ( is_single() ) :
				the_title( '<h2>', '</h2>' );
			else :
				the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>

       <?php apexteam_post_thumbnail(); ?> 
        


<?php
if ( is_search() ) : 
  
     the_excerpt(); 
   else : 
			the_content( __( 'Read More <span class="meta-nav">&raquo;</span>', 'apexteam' ) );
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'apexteam' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
  endif; 
		?>       
       

