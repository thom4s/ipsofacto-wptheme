<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package ipsofacto
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div class="row">

    <div class="entry-aside l-1col">     
      &nbsp;
    </div><!-- .entry-aside -->

    <div class="entry-content l-2col gray-col">


      <h2><?php _e('Pages', 'ipsofacto'); ?></h2>
      <ul><?php wp_list_pages("title_li=" ); ?></ul>

      <h2><?php _e('RSS Feeds', 'textdomain'); ?></h2>
      <ul>
        <li><a title="Full content" href="feed:<?php bloginfo('rss2_url'); ?>"><?php _e('Main RSS' , 'ipsofacto'); ?></a></li>
        <li><a title="Comment Feed" href="feed:<?php bloginfo('comments_rss2_url'); ?>"><?php _e('Comment Feed', 'ipsofacto'); ?></a></li>
      </ul>

    </div><!-- .entry-content -->
  
  </div><!-- .row -->

</article><!-- #post-## -->


