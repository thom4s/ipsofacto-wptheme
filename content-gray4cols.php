<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package ipsofacto
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php get_template_part( 'part', 'entry-header' ); ?>

  <div class="row">

    <div class="entry-content l-4col s-5col gray-col last">
      <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
      <?php the_content(); ?>
    </div><!-- .entry-content -->
  
  </div><!-- .row -->

</article><!-- #post-## -->
