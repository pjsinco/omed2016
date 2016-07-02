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
      echo $args['before_title'] . 
        apply_filters( 'widget_title', $instance['title'] ) . 
        $args['after_title'];

        echo 'hello there.';

      echo $args['after_widget'];
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


