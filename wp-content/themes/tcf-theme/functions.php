<?php
	
/*
This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, etc.
*/

// LOAD tcf CORE (if you remove this, the theme will break)
require_once( 'library/core.php' );


// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
require_once( 'library/admin.php' );

/*********************
LAUNCH THEME
Let's get everything up and running.
*********************/
require_once 'library/wp_bootstrap_navwalker.php';

function tcf_init() {

  // USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
  require_once( 'library/custom-post-type.php' );

  // launching operation cleanup
  add_action( 'init', 'tcf_head_cleanup' );
  // A better title
  //add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'tcf_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'tcf_gallery_style' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'tcf_scripts_and_styles', 800 );
  add_action( 'wp_enqueue_scripts', 'template_scripts_and_styles', 999 );
  // ie conditional wrapper

  // launching this stuff after theme setup
  tcf_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'tcf_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'tcf_excerpt_more' );

}

add_action( 'after_setup_theme', 'tcf_init' );


/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 680;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'tcf-thumb-600', 600, 150, true );
add_image_size( 'tcf-thumb-300', 300, 100, true );
add_image_size( 'tcf-property-slide', 1200, 500, true );
add_image_size( 'tcf-property-slide-thumb', 200, intval(500/6), true );
add_image_size( 'tcf-property-portrait', 500, 700, true );
add_image_size( 'blog-thumb', 400, 300, true );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 100 sized image,
we would use the function:
<?php the_post_thumbnail( 'tcf-thumb-300' ); ?>
for the 600 x 150 image:
<?php the_post_thumbnail( 'tcf-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'custom_image_sizes' );

function custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'tcf-thumb-600' => __('600px by 150px'),
        'tcf-thumb-300' => __('300px by 100px'),
    ) );
}

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/************* THEME CUSTOMIZE *********************/

/* 
  A good tutorial for creating your own Sections, Controls and Settings:
  http://code.tutsplus.com/series/a-guide-to-the-wordpress-theme-customizer--wp-33722
  
  Good articles on modifying the default options:
  http://natko.com/changing-default-wordpress-theme-customization-api-sections/
  http://code.tutsplus.com/tutorials/digging-into-the-theme-customizer-components--wp-27162
  
  To do:
  - Create a js for the postmessage transport method
  - Create some sanitize functions to sanitize inputs
  - Create some boilerplate Sections, Controls and Settings
*/

function theme_customizer($wp_customize) {
  // $wp_customize calls go here.
  //
  // Uncomment the below lines to remove the default customize sections 

  // $wp_customize->remove_section('title_tagline');
  // $wp_customize->remove_section('colors');
  // $wp_customize->remove_section('background_image');
  // $wp_customize->remove_section('static_front_page');
  // $wp_customize->remove_section('nav');

  // Uncomment the below lines to remove the default controls
  // $wp_customize->remove_control('blogdescription');
  
  // Uncomment the following to change the default section titles
  // $wp_customize->get_section('colors')->title = __( 'Theme Colors' );
  // $wp_customize->get_section('background_image')->title = __( 'Images' );
}

add_action( 'customize_register', 'theme_customizer' );

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function tcf_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1'),
		'description' => __( 'The first (primary) sidebar.'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2'),
		'description' => __( 'The second (secondary) sidebar.'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!


function breadcrumbs()
{
    $home      = __('Home'); // text for the 'Home' link
    $before    = '<li class="active">'; // tag before the current crumb
    $sep       = '';//'<span class="divider">/</span>';
    $after     = '</li>'; // tag after the current crumb
    if (!is_home() && !is_front_page() || is_paged()) {
        echo '<ul class="breadcrumb">';
        global $post;
        $homeLink = home_url();
        echo '<li><a href="' . $homeLink . '">' . $home . '</a> '.$sep. '</li> ';
        if (is_category()) {
            global $wp_query;
            $cat_obj   = $wp_query->get_queried_object();
            $thisCat   = $cat_obj->term_id;
            $thisCat   = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            if ($thisCat->parent != 0) {
                echo get_category_parents($parentCat, true, $sep);
            }
            echo $before . __('Archive by category') . ' "' . single_cat_title('', false) . '"' . $after;
        } elseif (is_day()) {
            echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time(
                'Y'
            ) . '</a></li> ';
            echo '<li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time(
                'F'
            ) . '</a></li> ';
            echo $before . get_the_time('d') . $after;
        } elseif (is_month()) {
            echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time(
                'Y'
            ) . '</a></li> ';
            echo $before . get_the_time('F') . $after;
        } elseif (is_year()) {
            echo $before . get_the_time('Y') . $after;
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug      = $post_type->rewrite;
                echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ';
                echo $before . get_the_title() . $after;
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                echo '<li>'.get_category_parents($cat, true, $sep).'</li>';
                echo $before . get_the_title() . $after;
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat    = get_the_category($parent->ID);
            $cat    = $cat[0];
            echo get_category_parents($cat, true, $sep);
            echo '<li><a href="' . get_permalink(
                $parent
            ) . '">' . $parent->post_title . '</a></li> ';
            echo $before . get_the_title() . $after;
        } elseif (is_page() && !$post->post_parent) {
            echo $before . get_the_title() . $after;
        } elseif (is_page() && $post->post_parent) {
            $parent_id   = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page          = get_page($parent_id);
                $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title(
                    $page->ID
                ) . '</a>' . $sep . '</li>';
                $parent_id     = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb) {
                echo $crumb;
            }
            echo $before . get_the_title() . $after;
        } elseif (is_search()) {
            echo $before . __('Search results for') . ' "'. get_search_query() . '"' . $after;
        } elseif (is_tag()) {
            echo $before . __('Posts tagged') . ' "' . single_tag_title('', false) . '"' . $after;
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . __('Articles posted by') . ' ' . $userdata->display_name . $after;
        } elseif (is_404()) {
            echo $before . __('Error 404') . $after;
        }
        // if (get_query_var('paged')) {
        //     if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()
        //     ) {
        //         echo ' (';
        //     }
        //     echo __('Page', 'bootstrapwp') . $sep . get_query_var('paged');
        //     if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()
        //     ) {
        //         echo ')';
        //     }
        // }
        echo '</ul>';
    }
}

/************* COMMENT LAYOUT *********************/

// Comment Layout
function tcf_comments($comments, $args, $depth ) {
    foreach($comments as $comment){
        $GLOBALS['comment'] = $comment;
    ?>
    <div id="comment-<?php comment_ID(); ?>"  class="media <?php comment_class('media'); ?>">
        <img class="mr-3" src="<?php echo get_avatar_url($comment,40); ?>" alt="Author Profile Image">
        <div class="media-body">
            <h5 class="mt-0">
                <?php printf(__( '<cite class="fn">%1$s</cite> %2$s'), get_comment_author_link(), edit_comment_link(__( '(Edit)'),'  ','') ) ?>
            </h5>
            <div class='comment-info'>
                <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y')); ?> </a></time>
            </div>
            <div class="comment-text">
                <?php echo $comment->comment_content; ?>
            </div>
            <div>
                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </div>
        </div>
    </div>

    <?php
    }
   ?>
<?php
} // don't remove this bracket!

/*
<div class="media mt-3">
                <a class="pr-3" href="#">
                    <img src="..." alt="Generic placeholder image">
                </a>
                <div class="media-body">
                    <h5 class="mt-0">Media heading</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>
            */

add_filter( 'shortcode_atts_wpcf7', 'custom_shortcode_atts_wpcf7_filter', 10, 3 );
 
function custom_shortcode_atts_wpcf7_filter( $out, $pairs, $atts ) {
    $my_attr = 'form_source';
 
    if ( isset( $atts[$my_attr] ) ) {
        $out[$my_attr] = $atts[$my_attr];
    }
 
    return $out;
}

/*
This is a modification of a function found in the
twentythirteen theme where we can declare some
external fonts. If you're using Google Fonts, you
can replace these fonts, change it in your scss files
and be up and running in seconds.
*/
function template_fonts() {
  //wp_enqueue_style('googleFonts', 'http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
  
}

add_action('wp_enqueue_scripts', 'template_fonts');

function template_scripts_and_styles(){
	//styles
    load_style('style', '/assets/css/style.css');
	
	//scripts
    load_script('main', '/assets/js/main.js', ['jquery']);

    //lightslider
    load_style('lightslider', '/assets/lightslider/css/lightslider.min.css');
    load_script('lightslider', '/assets/lightslider/js/lightslider.min.js', ['jquery']);
}

function load_script($name, $path, $dependants = [], $header = true){
    $filename = get_template_directory() . $path;
    $filetime = is_file($filename) ? filemtime($filename) : '';
    wp_register_script( $name, get_stylesheet_directory_uri() . $path, $dependants, $filetime, $header);
	wp_enqueue_script( $name );
}

function load_style($name, $path, $dependants = [], $header = 'all'){
    $filename = get_template_directory() . $path;
    $filetime = is_file($filename) ? filemtime($filename) : '';

    wp_register_style( $name, get_stylesheet_directory_uri() . $path, $dependants, $filetime, $header);
    wp_enqueue_style( $name );
}

function get_assets_directory(){
    return get_template_directory_uri() . '/assets';
}
function get_img_directory(){
    return get_assets_directory() . '/img';
}
function page_title_block($title = '', $image = ''){
    if(!$image){
        $image = get_img_directory() . '/header-villa.png';
    }
    load_include('page-title', ['title' => $title, 'image' => $image]);
}

function has_include($file){
    return is_file(get_template_directory() . '/includes/' . $file . '.php');
}
function load_include($file, $args = []){
    $filename = 'includes/' . $file . '.php';
    extract($args);
    global $post;   
    
    return include(  locate_template( $filename ) ); 
}

function create_page($post){
    $post = array_merge([
        'post_title'    => '',
        'post_content'  => '',
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'     => 'page',
        //'post_parent' => 111,
    ], $post);

    $inserted = wp_insert_post($post);
}

function get_price_text($str){
    if(is_numeric(str_replace(',', '', $str))){
        return '$' . number_format( floatval($str) ?: 0, 2, '.', ',');
    }
    return $str;
}

function propertyPageInfo($options = []){
    $options = array_merge([
        'page' => null,
        'property' => null,
        'autoselect' => false,
        'slug' => null,
    ], $options);

    if(!empty($options['property']) ) {
        $options['page'] = pageByProperty($options['property']);
    }

    $parent = !empty($options['page']->post_parent) ? get_page($options['page']->post_parent) : $options['page'];

    $options['slug'] = !empty($options['slug']) ? $options['slug'] : $parent->post_name;
    $pages = propertyPagesBySlug($options['slug']);

    $activePage = $options['autoselect'] ? reset($pages) : false;

    foreach($pages as $p){
        if($p->ID == $options['page']->ID){
            $activePage = $p;
            break;
        }
    }
    return ['active' => $activePage, 'pages' => $pages];
}
function pageByProperty($property){
    $terms = get_terms([
        'taxonomy' => 'property_cat',
        'hide_empty' => true,
        'object_ids' => [$property->ID],
    ]);

    if($terms){
        $category = reset($terms);

        $the_query = new WP_Query([
            'post_type' => 'page',
            'posts_per_page' => 1, 
            'meta_query' => array(                  
                'relation' => 'AND',                
                array(
                    'key' => 'page_category',                
                    'value' => $category->term_id,                
                    'compare' => '=',
                ),
            ),
        ]);

        if($the_query->have_posts()){
            $page = clone $the_query->posts[0];
        }

        wp_reset_query();
    }
    return $page;
}
function propertyPagesBySlug($slug){
    return get_pages([
        'parent' => get_page_by_path($slug)->ID,
        'sort_column' => "menu_order",
        'sort_order' => 'ASC',
    ]);
}

function coming_soon_shortcode($attrs){
    ob_start();
    load_include('coming-soon');
    return ob_get_clean();
}
add_shortcode('coming_soon', 'coming_soon_shortcode');