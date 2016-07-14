<?php
/**
 * Template part for displaying relateds
 *
 * @package omed2016
 */

global $post;
$link_group = get_field( 'omed_splinkle_for_page', $post->ID );
$links = get_field('omed_splinkle', $link_group->ID); 


if ( !empty( $links ) ):
?>
  <aside class="splinkle">
    <h3 class="splinkle__header">Related Pages</h3>
    <ul class="splinkle__items">
    <?php foreach( $links as $link ): ?>

      <li class="splinkle__item">
        <a class="splinkle__link" href="<?php echo $link->guid; ?>">
          <span class="boldfont"><?php echo $link->post_title; ?></span>

          <?php $blurb = get_field( 'omed_page_blurb', $link->ID ); ?>
          <?php if ( !empty( $blurb ) ): ?>
          <p class="splinkle__blurb"><?php echo $blurb; ?></p>
          <?php endif; ?>
        </a>
      </li>
    <?php endforeach; ?>
    </ul>
  </aside>
<?php endif;
