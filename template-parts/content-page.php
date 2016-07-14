<?php
/**
 * Template part for displaying page content
 *
 * @package omed2016
 */

?>
<?php while (have_posts()): the_post(); ?>

  <div class="container-fluid wrap content">

    <?php if ( !is_page_template( 'page-standalone.php' ) ): ?>
  
    <!--  Navigation -->
    <nav class="content__left pagenav__block">
      <ul class="leftnav__items">
        <li class="leftnav__item">
          <a href="">hiya</a>
        </li>
      </ul>
    </nav>
    <?php endif; ?>
  
    <!--   Main content -->
    <section class="content__main<?php if ( is_page_template( 'page-standalone.php' ) ): echo '--full'; endif;  ?>">


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
