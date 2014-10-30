<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package ipsofacto
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php if( has_post_thumbnail() || ( get_the_excerpt() != '') ){ ?>
    <header class="entry-header row">

      <div class="thumbnail first l-3col">
        <?php the_post_thumbnail( ); ?>
      </div>

      <div class="entry-excerpt l-2col">
        <?php the_excerpt(); ?>
      </div>

    </header><!-- .entry-header -->
  <?php } ?>

  <div class="row">

    <div class="entry-aside l-1col">     
      &nbsp;
    </div><!-- .entry-aside -->

    <div class="entry-content l-2col gray-col">
      <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
      <?php the_content(); ?>
    </div><!-- .entry-content -->
  
  </div><!-- .row -->

</article><!-- #post-## -->
