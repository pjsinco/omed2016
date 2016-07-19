<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package omed2016
 */

?>

    </div><!-- #content .site-content-->
    
<?php 
  global $post; 
  $fields = get_fields( $post->ID );
  if ( !empty( $fields['highlightables'] ) ):
    $highlightable = $fields['highlightables'];

    echo do_shortcode( "[block type='Omed2016_Highlightable' id='$highlightable->ID' pinned='true']" );
  endif;
?>
    
    <footer class="footer">
      <?php get_template_part( 'template-parts/footer', 'main' ); ?>
    </footer>
    
    </div><!-- #page -->

  <?php wp_footer(); ?>

  </body>
</html>
