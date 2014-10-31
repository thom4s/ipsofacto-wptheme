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

    <div class="entry-aside l-2col  s-5col">
      <div class="widget job-list">

        <!-- La liste des annonces-->
        <ul class="fleches">
          <?php

            if($post->post_parent)
              $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
            else
              $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");

            if ($children) { 
              echo $children;
            } else {
              echo 'Aucun poste à pourvoir pour le moment.';
            } ?>
        </ul>

      </div>    
    </div><!-- .entry-aside -->

    <div class="entry-content l-3col  s-5col last">

      <!-- Afficher la dernière offre ? Ou contenu statique ? -->

      <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
      <?php the_content(); ?>
    


    </div><!-- .entry-content -->
  
  </div><!-- .row -->

</article><!-- #post-## -->
