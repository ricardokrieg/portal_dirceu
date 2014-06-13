<?php
/**
 * Template Name: Three Fold Page
 *
 * @package WordPress
 * @subpackage Apex_Team
 * @since Apex Team 1.0
 */

get_header(); ?>




<div class="inner-wrapper">
  <div class="banner">
    <div class="container">
    	<?php
    	// Start the Loop.
				while ( have_posts() ) : the_post();

      the_title( '<h2 class="entry-title">', '</h2><!-- .entry-header -->' );
     ?><p><?php 
			the_content();
	 ?></p><?php 		
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'apexteam' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );

			edit_post_link( __( 'Edit', 'apexteam' ), '<span class="edit-link">', '</span>' );
			endwhile;
		?>
   
  </div>
</div>
  
  
 <div class="tip-top-roller"></div> 
  <div class="case">
        <div class="container pick-center" >

      <div class="twelve columns stay-middle">
<?php if ( is_active_sidebar( 'sidebar-4' ) ) {
  
       dynamic_sidebar( 'sidebar-4' );

       } ?>
  




       

      </div>
     



      </div>
       
    
    
    
    
    
  </div>
    <div class="tip-bottom-ripper"></div>
  
  <div class="tile-holder-dark">
  <div class="container  sign-up-panel">
    


<?php if ( is_active_sidebar( 'sidebar-5' ) ) {
  
       dynamic_sidebar( 'sidebar-5' );

       } ?>



   </div>
  </div>



  
  <div class="tip-top-roller"></div>
  <div class="tile-holder-light">
    <div class="container tweet-panel">
     

<?php if ( is_active_sidebar( 'sidebar-6' ) ) {
  
       dynamic_sidebar( 'sidebar-6' );

       } ?>


    </div>
  </div>

  
</div>

<?php

get_footer();













