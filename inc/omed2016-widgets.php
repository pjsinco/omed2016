<?php

class Omed2016_Featured_Sessions_Widget extends WP_Widget {

  public function __construct() {

    $base_id = 'featured-sessions';
    $name = 'Featured Sessions';

    $widget_ops = array( 
      'classname' => 'featuredsessions',
      'description' => 'Featured sessions',
    );

    parent::__construct( $base_id, $name, $widget_ops );

  }

  public function widget( $args, $instance ) {

    echo $args['before_widget'];

    if ( !empty( $instance['title'] ) ) {
    ?>
      <div class="container-fluid pageblock wrap">
        <h3 class="section__header">
<?php
          echo $args['before_title'] . 
          apply_filters( 'widget_title', $instance['title'] ) . 
          $args['after_title'];
?>
        </h3>
      </div>

      <div class="card__block container-fluid pageblock wrap">
<?php 
        $post_args = array(
          'posts_per_page' => 3,
          'post_type' => 'omed_session',
        );

        $sessions = get_posts( $post_args );

        foreach ($sessions as $session) {
          setup_postdata( $session );
          
?>        
        <div class="card">
          <div class="card__body">
            <div class="card__imagecontainer">
              <img class="card__image" src="<?php echo get_field( 'session_speaker_photo_url', $session->ID ); ?>">
            </div>
            <div class="card__name"><?php echo get_field( 'session_speaker', $session->ID ); ?></div>
            <div class="card__kicker"><?php echo get_field( 'session_sponsor', $session->ID ); ?></div>
            <div class="card__header"><?php echo $session->post_title; ?></div>
            <div class="card__header--minor"><?php echo get_field( 'date_and_time', $session->ID ); ?></div>
            <a href="<?php echo get_field( 'session_more_info_link', $session->ID ); ?>" class="btn btn--primary">Read more</a>
          </div>
        </div>
<?php
        }

      echo $args['after_widget'];
?>
      </div>
<?php
      
    }

  }

  public function form( $instance ) {

    $title = !empty( $instance['title'] ) ? $instance['title'] : 'New title';

  ?>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">Title: </label>
      <input class="widefat" type="text" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'title') ); ?>" value="<?php echo esc_attr( $title ); ?>" />
    </p>
  <?php

  }

  public function update( $new_instance, $old_instance ) {

    $instance = array();
    $instance['title'] = ( !empty($new_instance['title']) ? strip_tags( $new_instance['title'] ) : '' );

    return $instance;
      
  }

}


function omed2016_register_widgets( ) {

  register_widget( 'Omed2016_Featured_Sessions_Widget' );
  
}
add_action( 'widgets_init' , 'omed2016_register_widgets' );


