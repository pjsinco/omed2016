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
  
    <!--   Asides -->
    <section class="content__right">
    <?php 

    global $post;
    $asides = get_field( 'omed_asides', $post->ID );
    if ( !empty( $asides ) ):
      foreach ($asides as $aside):
    ?>
      <aside class="breakout">
        <h3><?php echo $aside->post_title ?></h3>
        <?php echo $aside->post_content; ?>
      </aside>
      
    <?php endforeach; endif; ?>
    </section>
  
  </div> <!-- .content -->
