<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package ipsofacto
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
    <nav  id="site-navigation" class="secondary-navigation" role="navigation">
      <?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
    </nav><!-- #site-navigation -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
