<?php
/**
 * Template Name: Top Level
 *
 * The template for displaying an inside top-level page.
 *
 * @package omed2016
 */
?>

<?php get_header(); ?>


  <?php get_template_part( 'template-parts/content', 'splash' ); ?>

  <?php get_template_part( 'template-parts/content', 'page' ) ?>
  


<?php
//get_sidebar();

get_footer();
      

