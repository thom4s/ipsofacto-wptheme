<?php
/**
 * ipsofacto functions and definitions
 *
 * @package ipsofacto
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'ipsofacto_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ipsofacto_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on ipsofacto, use a find and replace
	 * to change 'ipsofacto' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'ipsofacto', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' ); 
	
	add_post_type_support( 'page', array('excerpt', 'thumbnail') );


	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Menu principal', 'ipsofacto' ),
		'secondary' => __( 'Menu footer', 'ipsofacto' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'ipsofacto_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // ipsofacto_setup
add_action( 'after_setup_theme', 'ipsofacto_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function ipsofacto_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'ipsofacto' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Sidebar Accueil', 'ipsofacto' ),
		'id'            => 'sidebar-hp',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

}
add_action( 'widgets_init', 'ipsofacto_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function ipsofacto_scripts() {
	wp_enqueue_style( 'ipsofacto-style', get_stylesheet_uri() );

	wp_enqueue_script( 'ipsofacto-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'ipsofacto-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ipsofacto_scripts' );


/**
 * PostTypes
 */
require get_template_directory() . '/inc/pt-team.php';
require get_template_directory() . '/inc/pt-job.php';
require get_template_directory() . '/inc/pt-interventions.php';
require get_template_directory() . '/inc/pt-publications.php';

/**
 * MetaBoxes
 */
require get_template_directory() . '/inc/metaboxes.php';


function getposts( $atts ){
	
	$a = shortcode_atts( array(
  	'contenu' 		=> '',
  	'format'			=> 'simple'
  ), $atts );

	$args = array(
		'post_type' 			=> $a['contenu'],
		'posts_per_page'	=> -1,
	);

	// The Query
	$the_query = new WP_Query( $args );

	// The Loop
	if ( $the_query->have_posts() ) {
		switch ($a['format']) {
		    case 'simple':
		        echo '<ul class="serial-list">';
						while ( $the_query->have_posts() ) {
							$the_query->the_post(); ?>
						
							<li> 
								<h4><?php the_title(); ?></h4>
								<?php the_content(); ?>
							</li>
						
						<?php }
						echo '</ul>';
		        break;
		    case 'blocks':
		        echo '<ul class="serial-blocks">';
						while ( $the_query->have_posts() ) {
							$the_query->the_post(); ?>

							<li class="">
								<h3><?php the_title(); ?></h3>
								<?php the_content(); ?>
								<a href="mailto:<?php echo rwmb_meta( 'ipsofacto_email' ); ?>"><?php echo rwmb_meta( 'ipsofacto_email' ); ?></a>
							</li>

						<?php }
						echo '</ul>';
		        break;
		}
	} else {
		echo 'aucun résultat';
	}
	wp_reset_postdata();
}
add_shortcode( 'lister', 'getposts' );



function custom_excerpt_length( $length ) {
	return 0;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
