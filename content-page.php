<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package ipsofacto
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header row">

		
	</header><!-- .entry-header -->

  <div class="row">
    <div class="entry-aside l-2col">
      <?php echo rwmb_meta( 'ipsofacto_wysiwyg' ); ?>
      

    </div><!-- .entry-aside -->

    <div class="entry-content l-3col last">
      
      <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

      <?php the_content(); ?>

    </div><!-- .entry-content -->
  </div><!-- .row -->


</article><!-- #post-## -->
