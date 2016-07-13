<?php

function omed_block_shortcode( $atts ) {

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

add_shortcode( 'block', 'omed_block_shortcode' );

function omed_video_shortcode($atts, $content = null ) {
  // we're going to need fitvids
  wp_enqueue_script('fitvids');
  add_action( 'wp_footer' , 'omed_add_fitvids_script', 50 );

  // Available types: 'pageblock', 'article'
  $a = shortcode_atts(
    array(
      'embed' => '',
      'caption' => '',
      'container' => 'article', 
    ), $atts
  );

  $output = '';
  $class = 'video__block' . ($a['container'] == 'pageblock' ? '--nopad' : '');

  if ( $a['container'] == 'pageblock' ) {
    $output .= '<div class="container-fluid pageblock wrap">' . PHP_EOL;
  }

  $output .= "<div class='$class'>" . PHP_EOL;
  $output .= '<figure class="video__container" id="videoContainer">';
  $output .= $a['embed'];
  $output .= '</figure>' . PHP_EOL;
  if ( $a['caption'] ) {
    $output .= '<figcaption class="video__caption">' . PHP_EOL;
    $output .= $a['caption'];
    $output .= '</figcaption>' . PHP_EOL;
  }
  $output .= '</div> <!-- .video__block -->' . PHP_EOL;

  if ( $a['container'] == 'pageblock' ) {
    $output .= '</div> <!-- hiya .container-fluid pageblock wrap -->' . PHP_EOL;
  }

  return $output;
  
}
add_shortcode('omed-video', 'omed_video_shortcode' );

function omed_section_title_shortcode( $atts, $content = null ) {
  $a = shortcode_atts(
    array(
      'title' => '',
    ), $atts
  );
  
  $output  = '<div class="container-fluid pageblock wrap">' . PHP_EOL;
  $output .= '<h3 class="section__header">' . PHP_EOL;
  $output .= $a['title'] . '</h3>' . PHP_EOL;
  $output .= '</div>' . PHP_EOL;

  return $output;
}
add_shortcode('section-title', 'omed_section_title_shortcode' );
