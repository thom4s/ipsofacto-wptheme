<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package ipsofacto
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php get_template_part( 'part', 'entryheader-2-3' ); ?>


  <div class="row">

    <div class="entry-content l-5col first plain">
      <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
      <?php the_content(); ?>
    </div><!-- .entry-content -->
  
  </div><!-- .row -->

</article><!-- #post-## -->
