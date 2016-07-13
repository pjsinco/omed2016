<?php 

/**
 * Our template for the home page
 *
 * Template name: Home page
 * 
 * package: omed2016 
 */
?>
<?php get_header(); ?>

<?php get_template_part( 'template-parts/content', 'splash' ); ?>

<?php 
  while ( have_posts() ): 
    the_post(); 
    the_content();
  endwhile; 
?>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
