<?php
/**
 * devtest functions and definitions
 *
 * @package devtest
 */
 
 /**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'devtest_setup' ) ) :

function devtest_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on storto, use a find and replace
	 * to change 'storto' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'devtest', get_template_directory() . '/languages' );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'storto_custom_background_args', array(
		'default-color' => '404040',
		'default-image' => '',
	) ) );
}
endif; // devtest_setup
add_action( 'after_setup_theme', 'devtest_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */

function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

/**
 * Enqueue scripts and styles.
 */
 
function devtest_scripts() {
	wp_enqueue_style( 'devtest-style', get_stylesheet_uri() );
	wp_enqueue_style( 'devtest-fontAwesome', get_template_directory_uri() .'/css/font-awesome.min.css');
	wp_enqueue_style( 'devtest-menu', get_template_directory_uri() .'/css/menu.css');
    wp_enqueue_style( 'devtest-slider', get_template_directory_uri() .'/css/jquery.bxslider.css');
//	wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/js/jquery-1.11.3.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/js/j.js', array( 'jquery' ) );
	wp_enqueue_script( 'custom-script-slider', get_stylesheet_directory_uri() . '/js/jquery.bxslider.js', array( 'jquery' ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'devtest_scripts' );



add_action('admin_head', 'my_custom_css');

function my_custom_css() {
  echo '<link rel="stylesheet" href="'.get_template_directory_uri().'/adminstyle.css" type="text/css" media="all" />';
}

function remove_api () {
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
}
add_action( ‘after_setup_theme’, 'remove_api' );
/**
 * Custom scripts for this theme.
 */
require get_template_directory() . '/theme-options.php';
require get_template_directory() . '/inc/addcustom.php';
require get_template_directory() . '/inc/login.php';
