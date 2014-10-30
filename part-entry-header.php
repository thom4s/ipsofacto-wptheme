  <?php if( has_post_thumbnail() || ( get_the_excerpt() != '') ){ ?>
    <header class="entry-header row">

      <div class="thumbnail first l-3col s-2col">
        <?php the_post_thumbnail( ); ?>
      </div>

      <div class="entry-excerpt l-2col s-3col">
        <?php the_excerpt(); ?>
      </div>

    </header><!-- .entry-header -->
  <?php } ?>