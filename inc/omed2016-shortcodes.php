<?php

function omed2016_widget_shortcode( $atts ) {

  extract( 
    shortcode_atts(
      array(
      'type' => '',
      'title' => '',
      ), $atts
    )
  );

  $args = array(
    'before_widget' => '<div class="box widget">',
    'after_widget' => '</div>',
    'before_title' => '<div class="widget-title">',
    'after_title' => '</div>',
  );

  ob_start();
  the_widget( $type, $atts, $args );
  $output = ob_get_clean();

  return $output;
}

add_shortcode( 'widget', 'omed2016_widget_shortcode' );
