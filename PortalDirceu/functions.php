<?php
/**
 * Set up the content width value based on the theme's design.
 */

if (!isset($content_width)) {
	$content_width = 474;
}

/**
 * portaldirceu only works in WordPress 3.6 or later.
 */

if (version_compare($GLOBALS['wp_version'], '3.6', '<')) {
	require get_template_directory() . '/inc/back-compat.php';
}

if (!function_exists('portaldirceu_setup')):

/**
 * portaldirceu setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since portaldirceu 1.0
 */

function portaldirceu_setup() {
	/*
	 * Make portaldirceu available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on portaldirceu, use a find and
	 * replace to change 'portaldirceu' to the name of your theme in all
	 * template files.
	 */

	load_theme_textdomain('portaldirceu', get_template_directory() . '/languages');

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style(array('css/editor-style.css', portaldirceu_font_url()));

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support('automatic-feed-links');

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(672, 372, true);
	add_image_size('portaldirceu-full-width', 1038, 576, true);

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus(array(
		'principal'		=> __('Menu Principal', 'portaldirceu'),
	));

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support('html5', array(
		'search-form', 'comment-form', 'comment-list',
	));

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	// add_theme_support('post-formats', array(
	// 	'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
	// ));

	// This theme allows users to set a custom background.
	add_theme_support('custom-background', apply_filters('portaldirceu_custom_background_args', array(
		'default-color' => 'ffe3f0',
		'default-image' => '/wp-content/themes/portaldirceu/img/bg.png',
	)));

	// Add support for featured content.
	add_theme_support('featured-content', array(
		'featured_content_filter' => 'portaldirceu_get_featured_posts',
		'max_posts' => 6,
	));

	// This theme uses its own gallery styles.
	add_filter('use_default_gallery_style', '__return_false');

	require_once dirname(__FILE__) . '/inc/class-tgm-plugin-activation.php';
	add_action('tgmpa_register', 'portal_dirceu_register_required_plugins');

	require_once dirname(__FILE__) . '/inc/planos.php';
}
endif; // portaldirceu_setup

add_action('after_setup_theme', 'portaldirceu_setup');

/**
 * Adjust content_width value for image attachment template.
 *
 * @since portaldirceu 1.0
 *
 * @return void
 */

function portaldirceu_content_width() {
	if (is_attachment() && wp_attachment_is_image()) {
		$GLOBALS['content_width'] = 810;
	}
}

add_action('template_redirect', 'portaldirceu_content_width');

/**
 * Getter function for Featured Content Plugin.
 *
 * @since portaldirceu 1.0
 *
 * @return array An array of WP_Post objects.
 */

function portaldirceu_get_featured_posts() {
	/**
	 * Filter the featured posts to return in portaldirceu.
	 *
	 * @since portaldirceu 1.0
	 *
	 * @param array|bool $posts Array of featured posts, otherwise false.
	 */

	return apply_filters('portaldirceu_get_featured_posts', array());
}

/**
 * A helper conditional function that returns a boolean value.
 *
 * @since portaldirceu 1.0
 *
 * @return bool Whether there are featured posts.
 */

function portaldirceu_has_featured_posts() {
	return !is_paged() && (bool) portaldirceu_get_featured_posts();
}

function portaldirceu_widgets_init() {
	register_sidebar(array(
		'name'          => __('Página Inicial', 'portaldirceu'),
		'id'            => 'sidebar-home',
		'description'   => __('Aparece apenas na página inicial do site.', 'portaldirceu'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Topo', 'portaldirceu'),
		'id'            => 'sidebar-header',
		'description'   => __('Parte Superior do site, ao lado da logo.', 'portaldirceu'),
		'before_widget' => '<span id="%1$s" class="widget %2$s">',
		'after_widget'  => '</span>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Barra Lateral', 'portaldirceu'),
		'id'            => 'sidebar-lateral',
		'description'   => __('Barra lateral do site', 'portaldirceu'),
		'before_widget' => '<span id="%1$s" class="widget %2$s">',
		'after_widget'  => '</span>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Rodapé', 'portaldirceu'),
		'id'            => 'sidebar-rodape',
		'description'   => __('Rodapé do site', 'portaldirceu'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Abaixo do Rodapé', 'portaldirceu'),
		'id'            => 'sidebar-rodape-below',
		'description'   => __('Abaixo do rodapé do site', 'portaldirceu'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	));
}

add_action('widgets_init', 'portaldirceu_widgets_init');

/**
 * Register Lato Google font for portaldirceu.
 *
 * @since portaldirceu 1.0
 *
 * @return string
 */

function portaldirceu_font_url() {
	$font_url = '';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */

	if ('off' !== _x('on', 'Lato font: on or off', 'portaldirceu')) {
		$font_url = add_query_arg('family', urlencode('Lato:300,400,700,900,300italic,400italic,700italic'), "//fonts.googleapis.com/css");
	}

	return $font_url;
}

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since portaldirceu 1.0
 *
 * @return void
 */

function portaldirceu_scripts() {
	// Add Lato font, used in the main stylesheet.
	wp_enqueue_style('portaldirceu-lato', portaldirceu_font_url(), array(), null);

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style('genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.2');

	// Load our main stylesheet.
	wp_enqueue_style('portaldirceu-style', get_stylesheet_uri(), array('genericons'));

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style('portaldirceu-ie', get_template_directory_uri() . '/css/ie.css', array('portaldirceu-style', 'genericons'), '20131205');
	wp_style_add_data('portaldirceu-ie', 'conditional', 'lt IE 9');

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	if (is_singular() && wp_attachment_is_image()) {
		wp_enqueue_script('portaldirceu-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array('jquery'), '20130402');
	}

	if (is_active_sidebar('sidebar-3')) {
		wp_enqueue_script('jquery-masonry');
	}

	if (is_front_page() && 'slider' == get_theme_mod('featured_content_layout')) {
		wp_enqueue_script('portaldirceu-slider', get_template_directory_uri() . '/js/slider.js', array('jquery'), '20131205', true);
		wp_localize_script('portaldirceu-slider', 'featuredSliderDefaults', array(
			'prevText' => __('Previous', 'portaldirceu'),
			'nextText' => __('Next', 'portaldirceu')
		));
	}

	wp_enqueue_script('portaldirceu-script', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20131209', true);
}

add_action('wp_enqueue_scripts', 'portaldirceu_scripts');

/**
 * Enqueue Google fonts style to admin screen for custom header display.
 *
 * @since portaldirceu 1.0
 *
 * @return void
 */

function portaldirceu_admin_fonts() {
	wp_enqueue_style('portaldirceu-lato', portaldirceu_font_url(), array(), null);
}

add_action('admin_print_scripts-appearance_page_custom-header', 'portaldirceu_admin_fonts');

if (!function_exists('portaldirceu_the_attached_image')):
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since portaldirceu 1.0
 *
 * @return void
 */

function portaldirceu_the_attached_image() {
	$post = get_post();

	/**
	 * Filter the default portaldirceu attachment size.
	 *
	 * @since portaldirceu 1.0
	 *
	 * @param array $dimensions {
	 *     An array of height and width dimensions.
	 *
	 *     @type int $height Height of the image in pixels. Default 810.
	 *     @type int $width  Width of the image in pixels. Default 810.
	 * }
	 */

	$attachment_size     = apply_filters('portaldirceu_attachment_size', array(810, 810));
	$next_attachment_url = wp_get_attachment_url();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */

	$attachment_ids = get_posts(array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	));

	// If there is more than 1 attachment in a gallery...
	if (count($attachment_ids) > 1) {
		foreach ($attachment_ids as $attachment_id) {
			if ($attachment_id == $post->ID) {
				$next_id = current($attachment_ids);
				break;
			}
		}

		// get the URL of the next image attachment...
		if ($next_id) {
			$next_attachment_url = get_attachment_link($next_id);
		}
		// or get the URL of the first image attachment.
		else {
			$next_attachment_url = get_attachment_link(array_shift($attachment_ids));
		}
	}

	printf('<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url),
		wp_get_attachment_image($post->ID, $attachment_size)
	);
}
endif;

if (!function_exists('portaldirceu_list_authors')):
/**
 * Print a list of all site contributors who published at least one post.
 *
 * @since portaldirceu 1.0
 *
 * @return void
 */

function portaldirceu_list_authors() {
	$contributor_ids = get_users(array(
		'fields'  => 'ID',
		'orderby' => 'post_count',
		'order'   => 'DESC',
		'who'     => 'authors',
	));

	foreach ($contributor_ids as $contributor_id):
		$post_count = count_user_posts($contributor_id);

		// Move on if user has not published a post (yet).
		if (!$post_count) {
			continue;
		}
	?>

	<div class="contributor">
		<div class="contributor-info">
			<div class="contributor-avatar"><?php echo get_avatar($contributor_id, 132); ?></div>
			<div class="contributor-summary">
				<h2 class="contributor-name"><?php echo get_the_author_meta('display_name', $contributor_id); ?></h2>

				<p class="contributor-bio">
					<?php echo get_the_author_meta('description', $contributor_id); ?>
				</p>

				<a class="contributor-posts-link" href="<?php echo esc_url(get_author_posts_url($contributor_id)); ?>">
					<?php printf(_n('%d Article', '%d Articles', $post_count, 'portaldirceu'), $post_count); ?>
				</a>
			</div><!-- .contributor-summary -->
		</div><!-- .contributor-info -->
	</div><!-- .contributor -->

	<?php
	endforeach;
}
endif;

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 * 7. Featured content layout.
 *
 * @since portaldirceu 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */

function portaldirceu_body_classes($classes) {
	if (is_multi_author()) {
		$classes[] = 'group-blog';
	}

	if ( get_header_image() ) {
		$classes[] = 'header-image';
	} else {
		$classes[] = 'masthead-fixed';
	}

	if ( is_archive() || is_search() || is_home() ) {
		$classes[] = 'list-view';
	}

	if ( ( ! is_active_sidebar( 'sidebar-2' ) )
		|| is_page_template( 'page-templates/full-width.php' )
		|| is_page_template( 'page-templates/contributors.php' )
		|| is_attachment() ) {
		$classes[] = 'full-width';
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		$classes[] = 'footer-widgets';
	}

	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		$classes[] = 'slider';
	} elseif ( is_front_page() ) {
		$classes[] = 'grid';
	}

	return $classes;
}

add_filter( 'body_class', 'portaldirceu_body_classes' );

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @since portaldirceu 1.0
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */

function portaldirceu_post_classes( $classes ) {
	if ( ! post_password_required() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}

add_filter( 'post_class', 'portaldirceu_post_classes' );

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since portaldirceu 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */

function portaldirceu_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'portaldirceu' ), max( $paged, $page ) );
	}

	return $title;
}

add_filter( 'wp_title', 'portaldirceu_wp_title', 10, 2 );

// Implement Custom Header features.
require get_template_directory() . '/inc/custom-header.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Add Theme Customizer functionality.
require get_template_directory() . '/inc/customizer.php';

/*
 * Add Featured Content functionality.
 *
 * To overwrite in a plugin, define your own Featured_Content class on or
 * before the 'setup_theme' hook.
 */
if ( ! class_exists( 'Featured_Content' ) && 'plugins.php' !== $GLOBALS['pagenow'] ) {
	require get_template_directory() . '/inc/featured-content.php';
}

remove_filter('the_content', 'wpautop');


/*special freaturs */
$themename = "Basic Template";
$shortname = str_replace(' ', '_', strtolower($themename));

function get_theme_option($option)
{
	global $shortname;

	return stripslashes(get_option($shortname . '_' . $option));
}

function get_theme_settings($option)
{
	return stripslashes(get_option($option));
}

function cats_to_select()
{
	$categories = get_categories('hide_empty=0');
	$categories_array[] = array('value'=>'0', 'title'=>'Select');

	foreach ($categories as $cat) {
		if($cat->category_count == '0') {
			$posts_title = 'No posts!';
		} elseif($cat->category_count == '1') {
			$posts_title = '1 post';
		} else {
			$posts_title = $cat->category_count . ' posts';
		}

		$categories_array[] = array('value'=> $cat->cat_ID, 'title'=> $cat->cat_name . ' ( ' . $posts_title . ' )');
	  }

	return $categories_array;
}

$options = array (
	array('type' => 'open'),

	array(
		'name'	=> "Copyright",
		'desc'	=> "Texto exibido no rodapé do site",
		'id'	=> $shortname.'_copyright',
		'type' 	=> 'text',
		'std' 	=> '',
	),

	array('type' => 'close')
);

function mytheme_add_admin() {
    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {
        if ( 'save' == $_REQUEST['action'] ) {
            foreach ($options as $value) {
                update_option( $value['id'], $_REQUEST[ $value['id'] ] );
            }

            foreach ($options as $value) {
                if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); }
            }

        	echo '<meta http-equiv="refresh" content="0;url=themes.php?page=functions.php&saved=true">';
        	die;
        }
    }

    add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

function mytheme_admin_init() {
    global $themename, $shortname, $options;

    $get_theme_options = get_option($shortname . '_options');

    if($get_theme_options != 'yes') {
    	$new_options = $options;
    	foreach ($new_options as $new_value) {
         	update_option( $new_value['id'],  $new_value['std'] );
		}

    	update_option($shortname . '_options', 'yes');
    }
}


if(!function_exists('get_sidebars')) {
	function get_sidebars() {
		get_sidebar();
	}
}


function mytheme_admin() {
    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
?>

<div class="wrap">
	<h2><?php echo $themename; ?> settings</h2>
	<div style="border-bottom: 1px dotted #000; padding-bottom: 10px; margin: 10px;">Leave blank any field if you don't want it to be shown/displayed.</div>

	<form method="post">
		<?php foreach ($options as $value) {
			switch ( $value['type'] ) {
			case "open":
		?>

        <table width="100%" border="0" style=" padding:10px;">
		<?php break;
		case "close":
		?>
        </table><br />

		<?php break;
		case "title":
		?>

		<table width="100%" border="0" style="padding:5px 10px;"><tr>
        	<td colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
        </tr>

		<?php break;
		case 'text':
		?>

        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><input style="width:100%;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php echo get_theme_settings( $value['id'] ); ?>" /></td>
        </tr>

        <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php
		break;
		case 'textarea':
		?>

        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:100%; height:140px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo get_theme_settings( $value['id'] ); ?></textarea></td>
        </tr>

        <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php
		break;
		case 'select':
		?>

        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%">
				<select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
					<?php
						foreach ($value['options'] as $option) { ?>
						<option value="<?php echo $option['value']; ?>" <?php if ( get_theme_settings( $value['id'] ) == $option['value']) { echo ' selected="selected"'; } ?>><?php echo $option['title']; ?></option>
						<?php } ?>
				</select>
			</td>
       </tr>

       <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
       </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php
        break;
		case "checkbox":
		?>

            <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
                <td width="80%"><? if(get_theme_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                        <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                        </td>
            </tr>

            <tr>
                <td><small><?php echo $value['desc']; ?></small></td>
           </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

        <?php 		break;
}
}
?>

<!--</table>-->

<p class="submit">
<input name="save" type="submit" value="Save changes" />
<input type="hidden" name="action" value="save" />
</p>
</form>

<?php
}
mytheme_admin_init();

add_action('admin_menu', 'mytheme_add_admin');
//in the theme's functions.php file

// Search Form

function portaldirceu_search_form($form) {
    return $form . "<div class='clear'></div>";
}

add_filter('get_search_form', 'portaldirceu_search_form');

// Logo

function portaldirceu_theme_customizer($wp_customize) {
    $wp_customize->add_section('portaldirceu_logo_section', array(
        'title'       => __('Logo', 'portaldirceu'),
        'priority'    => 30,
        'description' => 'Upload a logo to replace the default site name and description in the header',
    ));
    $wp_customize->add_setting('portaldirceu_logo');

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'portaldirceu_logo', array(
        'label'    => __('Logo', 'portaldirceu'),
        'section'  => 'portaldirceu_logo_section',
        'settings' => 'portaldirceu_logo',
    )));
}
add_action('customize_register', 'portaldirceu_theme_customizer');

// Comments

function portaldirceu_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>

	<li <?php comment_class(); ?>>
		<div id="comment-<?php comment_ID() ?>">
			<span class="comment-avatar">
				<?php echo get_avatar($comment, $size='76', $default='<path_to_url>'); ?>

				<span class="reply">
					<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</span>
			</span>

			<span class="comment-meta">
				<span><?php echo get_comment_author_link() ?></span> <?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?>
				<?php edit_comment_link(__('(Edit)'),'  ','') ?>
			</span>

			<?php comment_text() ?>
		</div>
	</li>
<?php
}

function portal_dirceu_register_required_plugins() {
    $plugins = array(
        array(
            'name'               => 'Easy WP Parallax Slider',
            'slug'               => 'easy-wp-parallax-slider',
            'source'             => get_stylesheet_directory() . '/plugins/easy-wp-parallax-slider.zip',
            'required'           => true,
            'version'            => '',
            'force_activation'   => true,
            'force_deactivation' => false,
            'external_url'       => '',
        ),
    );

    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa($plugins, $config);
}
