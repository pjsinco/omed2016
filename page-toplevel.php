<?php
/**
 * Template Name: Top-level
 *
 * The template for displaying an inside top-level page.
 *
 * @package omed2016
 */
?>

<?php get_header(); ?>


  <?php get_template_part( 'template-parts/content', 'splash' ); ?>
  
  <div class="container-fluid wrap content">
  
    <!--  Navigation -->
    <nav class="content__left pagenav__block">
      <ul class="leftnav__items">
        <li class="leftnav__item">
          <a href="">hiya</a>
        </li>
    </nav>
  
    <!--   Main content -->
    <section class="content__center">

      <?php 
        while (have_posts()): the_post();

        get_template_part( 'template-parts/content', 'page' );

        endwhile; 
      ?>
    </section> <!-- .col -->
  
    <!--   Callouts -->
    <section class="content__right">
      <aside class="breakout">
        <h3>hiya</h3>
        hello there
      </aside>
    </section>
  
  </div> <!-- .content -->


<?php
//get_sidebar();

get_footer();
      

