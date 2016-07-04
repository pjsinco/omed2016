<?php

function omed2016_block_shortcode( $atts ) {

  extract( 
    shortcode_atts(
      array(
      'type' => '',
      'title' => '',
      ), $atts
    )
  );

  $args = array(
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
  );

  ob_start();
  the_widget( $type, $atts, $args );
  $output = ob_get_clean();

  return $output;
}

add_shortcode( 'block', 'omed2016_block_shortcode' );
