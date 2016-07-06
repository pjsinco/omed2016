<?php
/**
 * Template part for displaying splinkles
 *
 * @package omed2016
 */

global $post;
$page_splinkle = get_field( 'omed_page_splinkle', $post->ID );
$splinkles = get_field('omed_splinkle', $page_splinkle->ID); 

if ( !empty( $splinkles ) ):
?>
  <aside class="splinkle">
    <ul class="splinkle__items">
    <?php foreach( $splinkles as $splinkle ): ?>
      <li class="splinkle__item">
        <a class="splinkle__link" href="<?php echo $splinkle->guid; ?>"><?php echo $splinkle->post_title; ?></a>
        <?php $blurb = get_field( 'omed_page_blurb', $splinkle->ID ); ?>
        <?php if ( !empty( $blurb ) ): ?>
        <p class="splinkle__blurb"><?php echo $blurb; ?></p>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
    </ul>
  </aside>
<?php endif;