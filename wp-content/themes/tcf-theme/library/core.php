<?php

/// Add ACF Pro
// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
function my_acf_settings_path( $path ) {
    // update path
    $path = get_stylesheet_directory() . '/library/plugins/acf/';
    // return
    return $path;
}
// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');
function my_acf_settings_dir( $dir ) {
    // update path
    $dir = get_stylesheet_directory_uri() . '/library/plugins/acf/';
    // return
    return $dir;
}
// 3. Hide ACF field group menu item
// if (strpos(get_site_url(),'dev-url') !== false || strpos(get_site_url(),'8888') !== false) {
// }else{
// 	add_filter('acf/settings/show_admin', '__return_false');
// }

// 4. Include ACF
include_once( get_stylesheet_directory() . '/library/plugins/acf/acf.php' );

include_once( get_stylesheet_directory() . '/library/theme-options.php');

/*********************
WP_HEAD GOODNESS
The default wordpress head is
a mess. Let's clean it up by
removing all the junk we don't
need.
*********************/

function tcf_head_cleanup() {
	// category feeds
	// remove_action( 'wp_head', 'feed_links_extra', 3 );
	// post and comment feeds
	// remove_action( 'wp_head', 'feed_links', 2 );
	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version
	remove_action( 'wp_head', 'wp_generator' );
	// remove WP version from css
	// add_filter( 'style_loader_src', 'tcf_remove_wp_ver_css_js', 9999 );
	// remove Wp version from scripts
	// add_filter( 'script_loader_src', 'tcf_remove_wp_ver_css_js', 9999 );

}

// A better title
// http://www.deluxeblogtips.com/2012/03/better-title-meta-tag.html
function rw_title( $title, $sep, $seplocation ) {
  global $page, $paged;

  // Don't affect in feeds.
  if ( is_feed() ) return $title;

  // Add the blog's name
  if ( 'right' == $seplocation ) {
    $title .= get_bloginfo( 'name' );
  } else {
    $title = get_bloginfo( 'name' ) . $title;
  }

  // Add the blog description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );

  if ( $site_description && ( is_home() || is_front_page() ) ) {
    $title .= " {$sep} {$site_description}";
  }

  // Add a page number if necessary:
  if ( $paged >= 2 || $page >= 2 ) {
    $title .= " {$sep} " . sprintf( __( 'Page %s', 'dbt' ), max( $paged, $page ) );
  }

  return $title;

} // end better title

// remove WP version from RSS
function tcf_rss_version() { return ''; }

// remove WP version from scripts
function tcf_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}

// remove injected CSS for recent comments widget
function remove_wp_widget_recent_comments_style() {
	if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
		remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
	}
}

// remove injected CSS from recent comments widget
function remove_recent_comments_style() {
	global $wp_widget_factory;
	if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
		remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
	}
}

// remove injected CSS from gallery
function tcf_gallery_style($css) {
	return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}


/*********************
SCRIPTS & ENQUEUEING
*********************/

// loading modernizr and jquery, and reply script
function tcf_scripts_and_styles() {

	global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

	if (!is_admin()) {

		//Jquery
		wp_deregister_script('jquery');
		load_script('jquery', '/assets/js/jquery-3.3.1.min.js', [], false);

		//FONT AWESOME 
		load_style('fontawesome', '/assets/css/fontawesome.min.css');

		load_style('fa-regular', '/assets/css/regular.css');

		load_style('fa-brands', '/assets/css/brands.css');

		// BOOTSTRAP 4
		load_style('bootstrap', '/assets/css/bootstrap.min.css');

		load_style('bootstrap-patch', '/assets/css/bootstrap-patch.css');

		load_script('bootstrap', '/assets/js/bootstrap.bundle.min.js', ['jquery']);

		// SEGOE UI
		load_style('segoe-ui', '/assets/css/segoe-ui.css');

		// PROXIMA NOVA
		load_style('proxima-nova', '/assets/css/proxima-nova.css');

		// OWL CAROUSEL 
		load_style('owl-carousel', '/assets/js/owl/assets/owl.carousel.min.css');

		load_script('owl-carousel', '/assets/js/owl/owl.carousel.min.js', ['jquery']);

	    // comment reply script for threaded comments
	    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
			  wp_enqueue_script( 'comment-reply' );
	    }


	}

	
}

function insert_jquery(){
	wp_enqueue_script('jquery', false, array(), false, false);
}
add_filter('wp_enqueue_scripts','insert_jquery',1);

/*********************
THEME SUPPORT
*********************/

// Adding WP 3+ Functions & Theme Support
function tcf_theme_support() {

	// wp thumbnails (sizes handled in functions.php)
	add_theme_support( 'post-thumbnails' );

	// default thumb size
	set_post_thumbnail_size(125, 125, true);

	// wp custom background (thx to @bransonwerner for update)
	add_theme_support( 'custom-background',
	    array(
	    'default-image' => '',    // background image default
	    'default-color' => '',    // background color default (dont add the #)
	    'wp-head-callback' => '_custom_background_cb',
	    'admin-head-callback' => '',
	    'admin-preview-callback' => ''
	    )
	);

	// rss thingy
	add_theme_support('automatic-feed-links');

	// to add header image support go here: http://themble.com/support/adding-header-background-image-support/


	// wp menus
	add_theme_support( 'menus' );

	// registering wp3+ menus
	register_nav_menus(
		array(
			'main-nav' => __( 'The Main Menu'),   // main nav in header
			'footer-links' => __( 'Footer Links') // secondary nav in footer
		)
	);

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form'
	) );

}


/*********************
RELATED POSTS FUNCTION
*********************/

// Related Posts Function (call using tcf_related_posts(); )
function tcf_related_posts() {
	echo '<ul id="related-posts">';
	global $post;
	$tags = wp_get_post_tags( $post->ID );
	if($tags) {
		foreach( $tags as $tag ) {
			$tag_arr .= $tag->slug . ',';
		}
		$args = array(
			'tag' => $tag_arr,
			'numberposts' => 5, /* you can change this to show more */
			'post__not_in' => array($post->ID)
		);
		$related_posts = get_posts( $args );
		if($related_posts) {
			foreach ( $related_posts as $post ) : setup_postdata( $post ); ?>
				<li class="related_post"><a class="entry-unrelated" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
			<?php endforeach; }
		else { ?>
			<?php echo '<li class="no_related_post">' . __( 'No Related Posts Yet!') . '</li>'; ?>
		<?php }
	}
	wp_reset_postdata();
	echo '</ul>';
}

/*********************
PAGE NAVI
*********************/

// Numeric Page Navi (built into the theme by default)
function tcf_page_navi($wp_query = null) {
	if(!$wp_query){
  		global $wp_query;
	}

	if ( null === $wp_query ) {
		global $wp_query;
	}

	$pages = paginate_links([
		'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
		'format'       => '?paged=%#%',
		'current'      => max( 1, get_query_var( 'paged' ) ),
		'total'        => $wp_query->max_num_pages,
		'type'         => 'array',
		'show_all'     => false,
		'end_size'     => 3,
		'mid_size'     => 1,
		'prev_next'    => true,
		'prev_text'    => __( '<i class="far fa-arrow-left"></i> Prev' ),
		'next_text'    => __( 'Next <i class="far fa-arrow-right"></i>' ),
		'add_args'     => false,
		'add_fragment' => ''
	]);

	if ( is_array( $pages ) ) {
		//$paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
		$pagination = '<nav>';
		$pagination .= '<ul class="pagination">';
		foreach ( $pages as $page ) {
			$pagination .= '<li class="page-item '. (strpos($page, 'next') !== false || strpos($page, 'prev') !== false ? 'arrow' : 'number') .' '.(strpos($page, 'current') !== false ? 'active' : '').'"> ' . str_replace( 'page-numbers', 'page-link', $page ) . '</li>';
		}
		$pagination .= '</ul>';
		$pagination .= '</nav>';

		echo $pagination;
	}
}


/*********************
RANDOM CLEANUP ITEMS
*********************/

// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function filter_ptags_on_images($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

// This removes the annoying […] to a Read More link
function tcf_excerpt_more($more) {
	global $post;
	// edit here if you like
	return '...  <a class="excerpt-read-more" href="'. get_permalink( $post->ID ) . '" title="'. __( 'Read ') . esc_attr( get_the_title( $post->ID ) ).'">'. __( 'Read more &raquo;') .'</a>';
}

function mbe_wp_head(){
	$top = 30;
    // echo '<style>'.PHP_EOL.
    // 	'body{ padding-top: '.$top.'px !important; }'. PHP_EOL.
    // 	'body.body-logged-in{ padding-top: '.($top+32).'px !important; }' . PHP_EOL;
		
    // echo '@media screen and (max-width: 782px){'.PHP_EOL.
	//     	'body.body-logged-in{ padding-top: '.($top+46).'px !important; }'.PHP_EOL.
	//     '}';

    // echo '</style>'.PHP_EOL;
}

add_action('wp_head', 'mbe_wp_head');


function mbe_body_class($classes){
    if(is_user_logged_in()){
        $classes[] = 'body-logged-in';
    } else{
        $classes[] = 'body-logged-out';
    }
    return $classes;
}

add_filter('body_class', 'mbe_body_class');

function tcf_template_path() {
  return Tcf_Wrapping::$main_template;
}

class Tcf_Wrapping {

  // Stores the full path to the main template file
  static $main_template;

  // Stores the base name of the template file; e.g. 'page' for 'page.php' etc.
  static $base;

  static function wrap($template) {
     error_log($template,0);
    self::$main_template = $template;

    //self::$base = substr(basename(self::$main_template), 0, -4);



    $templates = array('base.php');



    return locate_template($templates);

  }
}

add_filter('template_include', array('Tcf_Wrapping', 'wrap'), 99);
