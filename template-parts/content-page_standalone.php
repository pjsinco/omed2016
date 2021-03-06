<?php
/**
 * Template part for displaying standalone page content
 *
 * @package omed2016
 */

?>
  <div class="container-fluid wrap content">
  
    <!--   Main content -->
    <section class="content__main">

      <?php while (have_posts()): the_post(); ?>

        <?php get_template_part( 'template-parts/content', 'page_article_header' ); ?>

      <div class="content__block">
        <div class="content__block--primary">
        <?php get_template_part( 'template-parts/content', 'page_article' ); ?>
        </div> <!-- .content__block-primary -->
        <?php endwhile; ?>
        <div class="content__block--secondary">
            <?php 
            get_template_part( 'template-parts/sidebar', 'asides' );
            get_template_part( 'template-parts/sidebar', 'related' );
            ?>
        </div> <!-- .content__block-secondary -->

      </div>
    </section> <!-- .conent__main -->
  
  
  </div> <!-- .content -->

