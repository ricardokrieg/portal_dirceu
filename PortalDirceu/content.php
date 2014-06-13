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

<div class="blog-content-holder">
	<?php
	if ( is_single() ) :
				the_title( '<h2>', '</h2>' );
			else :
				the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
		
			?>
	<div class="auth-title">By <?php echo get_the_author();?><span><?php if ( get_the_author_meta( 'twitter' ) ) : ?> - 
	<a href="http://twitter.com/<?php the_author_meta('twitter' );?>"> @<?php the_author_meta('twitter' );?></a>
<?php endif; ?></span></div>
       <?php apexteam_post_thumbnail(); ?> 
        <div class="blog-content-stall">
       
        <div class="date-block">
        <?php echo get_the_date('M');?><br/>
        <span> <?php echo get_the_date('j');?></span><br/>
        <?php echo get_the_date('Y');?>
        </div>


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
        
        </div>
        
        <div class="blog-item-footer">
        
<?php
          if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
      ?>
      <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'apexteam' ), __( '1 Comment', 'apexteam' ), __( '% Comments', 'apexteam' ) ); ?></span>
      <?php } 
        the_tags('','','');
      ?>
        
        
         
          
        </div>
     
        
		</div>



