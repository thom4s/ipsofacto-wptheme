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

      <div class="thumbnail first l-3col first">
        <?php the_post_thumbnail( ); ?>
      </div>

      <div class="entry-excerpt l-2col last">
        <?php the_excerpt(); ?>
      </div>

    </header><!-- .entry-header -->
  <?php } ?>

  <div class="row">

    <div class="entry-aside l-2col">
      <div class="widget job-list">

        <!-- La liste des annonces-->
        <ul class="fleches">
          <?php
            if($post->post_parent)
            $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
            else
            $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
            if ($children) { ?>
            <ul class="fleches">
            <?php echo $children; ?>
            </ul>
            <?php } ?>
        </ul>

      </div>    
    </div><!-- .entry-aside -->

    <div class="entry-content l-3col last">


      <!-- Afficher la dernière offre ? Ou contenu statique ? -->

      <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
      <?php the_content(); ?>
    


    </div><!-- .entry-content -->
  
  </div><!-- .row -->

</article><!-- #post-## -->
