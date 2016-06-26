<?php
/**
 * Template part for displaying page content
 *
 * @package omed2016
 */

?>
  <div class="container-fluid wrap content">
  
    <!--  Navigation -->
    <nav class="content__left pagenav__block">
      <ul class="leftnav__items">
        <li class="leftnav__item">
          <a href="">hiya</a>
        </li>
      </ul>
    </nav>
  
    <!--   Main content -->
    <section class="content__center">

      <?php 
        while (have_posts()): the_post();

        get_template_part( 'template-parts/content', 'page_article' );

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
