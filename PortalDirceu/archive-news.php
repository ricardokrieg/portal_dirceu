<?php

/**

 * The template for displaying Archive pages

 *

 * Used to display archive-type pages if nothing more specific matches a query.

 * For example, puts together date-based pages if no date.php file exists.

 *

 * If you'd like to further customize these archive views, you may create a

 * new template file for each specific one. For example, Apex Team

 * already has tag.php for Tag archives, category.php for Category archives,

 * and author.php for Author archives.

 *

 * @link http://codex.wordpress.org/Template_Hierarchy

 *

 * @package WordPress

 * @subpackage Apex_Team

 * @since Apex Team 1.0

 */

get_header(); ?>
<div class="content-body  customize-support">

<div class="container">

<div class="eleven columns">

<div class="content-holder">









<?php

			if ( have_posts() ) : ?>

				

				

			<?php

				while ( have_posts() ) : the_post();


?> <div class="news-wrap"><?php
					/*

					 * Include the post format-specific template for the content. If you want to

					 * use this in a child theme, then include a file called called content-___.php

					 * (where ___ is the post format) and that will be used instead.

					 */

					get_template_part( 'content', 'news' );

?></div><?php

				endwhile;

				// Previous/next post navigation.

				apexteam_paging_nav();



			else :

				// If no content, include the "No posts found" template.

				get_template_part( 'content', 'none' );



			endif;

		?>

		













</div>

</div>

<div class="five columns">

 <?php get_sidebar('news'); ?>



</div>



</div>

</div>



<?php



get_footer();

















