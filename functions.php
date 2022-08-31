<?php
/**
 * krischan functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Krischan
 * subpackage Krischan 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * subpackage Krischan 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}

/**
 * krischan only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'krischan_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * subpackage Krischan 1.0
 */
function krischan_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on krischan, use a find and replace
	 * to change 'krischan' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'krischan', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 700, 200, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'krischan' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

	/*
	 * Declare woocommerce support.
	 */
    add_theme_support( 'woocommerce' );
}
endif; // krischan_setup
add_action( 'after_setup_theme', 'krischan_setup' );

/**
 * Register widget area.
 *
 * subpackage Krischan 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function krischan_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'krischan' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'krischan' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'krischan_widgets_init' );


/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * subpackage Krischan 1.1
 */
function krischan_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'krischan_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 *
 * subpackage Krischan 1.0
 */
function krischan_scripts() {

	// Load our main stylesheet.
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.6.1' );
	wp_enqueue_style( 'krischan-style', get_stylesheet_uri() );

	// Load the html5 shiv.
	wp_enqueue_script( 'krischan-html5', get_template_directory_uri() . '/js/html5shiv-printshiv.min.js', array(), '3.7.3' );
	wp_script_add_data( 'krischan-html5', 'conditional', 'lt IE 9' );

    // Theme script
	wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '20141010', true );
	wp_enqueue_script( 'krischan-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '20141010', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'krischan_scripts' );

/**
 * Custom template tags for this theme.
 *
 * subpackage Krischan 1.0
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Main nav walker class.
 *
 * subpackage Krischan 1.0
 */
require get_template_directory() . '/inc/main-nav-walker.php';


function krischan_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'krischan_section_id' , array(
		'title'      => __('Visible Section Name','krischan'),
		'priority'   => 30
	) );

	$wp_customize->add_setting( 'krischan_header_color' , array(
		'default' => '#000',
		'sanitize_callback' => 'krischan_sanitize_hex_color',
	) );

	$wp_customize->add_control(
		'krischan_control_id',
		array(
			'label'    => __( 'Control Label', 'krischan' ),
			'description' => __( 'Applied to the header on small screens and the sidebar on wide screens.', 'krischan' ),
			'section'  => 'krischan_section_id',
			'settings' => 'krischan_header_color',
			'type'     => 'text'
		)
	);
}
add_action( 'customize_register', 'krischan_customize_register' );

function krischan_sanitize_hex_color( $input ){
	return $input;
}

/*
 * Woocommerce Integration
 *
 * Remove default markup and add our theme's markup
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

add_filter( 'woocommerce_show_page_title', 'krischan_show_page_title');

function my_theme_wrapper_start() {
	?>
	<div class="section section-page-title">
		<div class="container">
			<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
		</div>
	</div>
	<div class="site-content">
		<div class="container">
			<main id="main" class="site-main" role="main"><?php
}

function my_theme_wrapper_end() {
	?>
			</main>
			<?php //get_sidebar(); ?>
		</div>
	</div>
	<?php
}

function krischan_show_page_title(){
	return false;
}



// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter( 'woocommerce_add_to_cart_fragments', 'mytheme_cart_item_count_fragment' );
function mytheme_cart_item_count_fragment( $fragments ) {
	ob_start();
	?>
	<a href="<?php echo WC()->cart->get_cart_url(); ?>">
		<svg viewBox="0 0 24 24"><path d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z" /></svg>
		<span><?php echo WC()->cart->cart_contents_count; ?></span>
	</a>
	<?php

	$fragments['#nav-cart>a'] = ob_get_clean();

	return $fragments;
}

// Custom body classes
add_filter( 'body_class', 'krischan_body_classes' );
function krischan_body_classes( $classes ){
	$template = wp_basename( get_page_template(), '.php' );
	if( 'page-full-width' === $template ){
		$classes[] = 'page-full-width';
	}
	return $classes;
}


add_action( 'woocommerce_after_shop_loop_item', 'krischan_template_loop_demo', 11 );
function krischan_template_loop_demo(){
	global $product;
	?> <a href="//demo.erikathemes.com/?theme=<?php echo $product->post->post_name; ?>" rel="nofollow" class="button">Demo</a><?php
}


/*
* Add directory separator if its missing. Can be \ or / depending on OS.
*
* @param string $string
* @return string $string
*/
function krischan_fs_right_sep( $string ){
	$c = substr($string, -1);
	if($c !== '/' and $c !== '\\'){
		return $string.DIRECTORY_SEPARATOR;
	}
	return $string;
}

/**
* Include the view file and extract the passed variables
* 
* @param string $file File name of the template
* @param array $vars Template variables passed to the template
* @return void on success string "Not found $view_file" on fail
*/
function krischan_view_render($file, $vars = array()){
	$plugin_path = realpath(get_template_directory()).DIRECTORY_SEPARATOR;
	$view_folder = $plugin_path.'views';
	$view_file = krischan_fs_right_sep($view_folder).$file; // Add directory separator if needed
	if(@file_exists($view_file)){
		if(!empty($vars)){
			extract($vars, EXTR_SKIP); // Extract variables
		}

		include $view_file; //Include the view file
	} else {
		echo '<p>Not found '.$view_file.'</p>';
	}
}

/**
 * Wrapper for WP get_post_custom that automatically unserialize data.
 *
 * @param int $post_id ID of post
 * @param string $key Meta key name
 *
 * @return array Array of data or empty array
 */
function krischan_get_post_meta( $post_id, $key ) {
	$meta = get_post_custom( $post_id );
	if ( isset( $meta[ $key ][0] ) and ! empty( $meta[ $key ][0] ) ) {
		return maybe_unserialize( $meta[ $key ][0] );
	}
	return array();
}




function krischan_register_admin_scripts($hook ) {
 
	if( 'journal' == get_post_type() || 'issue' == get_post_type() || 'article' == get_post_type() ){ // Limit loading to certain admin pages
		
		wp_enqueue_style( 'krischan-admin-style', get_template_directory_uri().'/css/admin.css');
		wp_enqueue_script( "krischan-admin-script", get_template_directory_uri().'/js/admin.js', array('jquery'));
	}
}
add_action( 'admin_enqueue_scripts', 'krischan_register_admin_scripts', 10);



require get_template_directory() . '/inc/journal.php';
require get_template_directory() . '/inc/issue.php';
require get_template_directory() . '/inc/articles.php';


