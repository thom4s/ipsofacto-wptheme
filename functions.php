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
		'name'          => __( 'Contenus colonne Accueil', 'ipsofacto' ),
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

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ipsofacto_scripts' );


/**
 * PostTypes
 */
require get_template_directory() . '/inc/pt-team.php';
// require get_template_directory() . '/inc/pt-job.php';
require get_template_directory() . '/inc/pt-missions.php';
require get_template_directory() . '/inc/pt-publications.php';

/**
 * MetaBoxes
 */
require get_template_directory() . '/inc/metaboxes.php';


function getposts( $atts ){
	
	$a = shortcode_atts( array(
  	'contenu' 		=> '',
  	'format'			=> 'simple',
  	'combien'			=> -1,
  	'position'		=> '',
  ), $atts );

	$args = array(
		'post_type' 			=> $a['contenu'],
		'posts_per_page'	=> $a['combien'],
		'order'						=> 'ASC'
	);

	if($a['position'] == 'fin'){
		$class = 'fix-list-place';
	} else {
		$class = '';
	}

	// The Query
	$the_query = new WP_Query( $args );

	// The Loop
	if ( $the_query->have_posts() ) {
		switch ($a['format']) {
		    case 'brute':
						while ( $the_query->have_posts() ) {
							$the_query->the_post(); ?>
							
								<h4><?php the_title(); ?></h4>
								<?php the_content(); ?>
						
						<?php }
		        break;

		    case 'simple':
		        echo '<ul class="clearfix serial-'. $a['format']. ' ' . $class . $a['contenu'] .'">';
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
		        echo '<ul class="clearfix serial-'. $a['format']. ' ' . $class . ' ' . $a['contenu'] .'">';
						while ( $the_query->have_posts() ) {
							$the_query->the_post(); ?>

							<li class="">
								<h3>
									<?php 
										$signesAstro =  get_the_terms( $post->ID, 'signe-astro' );
										if($signesAstro) {
											foreach ($signesAstro as $signeAstro) {
												$tax_term_id = $signeAstro->term_taxonomy_id;
											 	$images = get_option('taxonomy_image_plugin');
											 	echo '<span class="astro left">'. wp_get_attachment_image( $images[$tax_term_id], '' ). '</span>';
											}
										}
									?>

									<?php the_title(); ?>

									<?php
										$signesChinois =  get_the_terms( $post->ID, 'signe-chinois' );
										if($signesChinois) {
											foreach ($signesChinois as $signeChinois) {
												$tax_term_id = $signeChinois->term_taxonomy_id;
											 	$images = get_option('taxonomy_image_plugin');
											 	echo '<span class="astro right">'. wp_get_attachment_image( $images[$tax_term_id], '' ). '</span>';
											}
										}
									?>

								</h3>
								<?php the_content(); ?>
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


// Format excerpt for pages
function custom_excerpt_length( $length ) {
	return 0;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');


// Remove ToolBar when logged
show_admin_bar(false);


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
