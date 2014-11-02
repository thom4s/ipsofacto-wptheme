  <?php if( has_post_thumbnail() || ( get_the_excerpt() != '') ){ ?>
    <header class="entry-header eh-2-3 row">

      <div class="thumbnail first l-2col s-1col">
        <?php the_post_thumbnail( ); ?>
      </div>

      <div class="entry-excerpt l-3col">
        <?php the_excerpt(); ?>
      </div>

    </header><!-- .entry-header -->
  <?php } ?>