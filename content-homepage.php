<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package ipsofacto
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header row">

    <div class="thumbnail first l-3col">
      <?php the_post_thumbnail( ); ?>
    </div>

    <div class="entry-excerpt l-2col">
      <?php the_excerpt(); ?>
    </div>
    
	</header><!-- .entry-header -->

  <div class="row">
    <div class="entry-aside l-2col first">

      <?php dynamic_sidebar('sidebar-hp'); ?>

    </div><!-- .entry-aside -->

    <div class="entry-content l-3col last">
      
      <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

      <?php the_content(); ?>

    </div><!-- .entry-content -->
  </div>


</article><!-- #post-## -->
