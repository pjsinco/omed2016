<?php

class Omed2016_Featured_Sessions_Block extends WP_Widget {

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

    if ( !empty( $instance['title'] ) ):
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

      <section class="card__block container-fluid pageblock wrap">
      <?php 
        $post_args = array(
          'posts_per_page' => 3,
          'post_type' => 'omed_session',
        );

        $sessions = get_posts( $post_args );

        foreach ( $sessions as $session ):
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
        endforeach;

      echo $args['after_widget'];
      ?>
      </section>
      <?php
      
    endif;

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

class Omed2016_Intro_Block extends WP_Widget {

  public function __construct() {
    $base_id = 'intro-block';
    $name = 'Introduction';

    $widget_ops = array( 
      'classname' => 'intro',
      'description' => 'Introductory text for display on the home page',
    );

    parent::__construct( $base_id, $name, $widget_ops );

  }

  public function widget( $args, $instance ) {

    echo $args['before_widget'];

    ?>
    <section class="intro__block container-fluid pageblock">
      <div class="row center-xs">
        <div class="col-xs-12 icon-omed-logo">
        </div> <!-- .col -->
      </div><!-- .row -->
      <div class="row center-xs">
        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
          <p class="intro__text"><?php echo $instance['body']; ?></p>
        </div> <!-- .col -->
      </div><!-- .row -->
    </section>
    <?php

    echo $args['after_widget'];

  }

  public function form( $instance ) {
    $body = !empty( $instance['body'] ) ? $instance['body'] : '';
    ?>

    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'body' ) ); ?>">Introductory body text: </label>
      <textarea class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'body' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'body') ); ?>"><?php echo esc_attr( $body ); ?></textarea>
    </p>

    <?php

  }

  public function update( $new_instance, $old_instance ) {
		$instance = array();
    $instance['body'] = ( !empty( $new_instance['body'] ) ? $new_instance['body'] : '' );

    return $instance;
  }

}

class Omed2016_Quicklinks_Block extends WP_Widget {

  public function __construct() {

    $base_id = 'quicklinks';
    $name = 'Quicklinks';

    $widget_ops = array(
      'classname' => 'quicklinks__block',
      'description' => 'Quicklinks',
    );

    parent::__construct( $base_id, $name, $widget_ops );
  }

  public function widget( $args, $instance ) {

    echo $args['before_widget'];

    ?>

    <section class="quicklinks__block container-fluid pageblock wrap">
      <ul "quicklinks__list">

    <?php
    $args = array(
      'posts_per_page' => 3,
      'post_type' => 'omed_quicklink',
    );

    if ( !empty( $instance['ids'] ) ):
      $args['post__in'] = array_map( 'trim', explode( ',', $instance['ids']) );
      $args['posts_per_page'] = -1;
    endif;

    $quicklinks = get_posts( $args );
    foreach ($quicklinks as $quicklink):
      setup_postdata( $quicklink );
    ?>
        <li class="quicklinks__item <?php echo get_field( 'omed_quicklink_icon_class_name', $quicklink->ID ); ?>">
          <div class="quicklinks__body">
            <h4 class="quicklinks__header"><?php echo $quicklink->post_title ?></h4>
            <p class="quicklinks__body"><?php echo get_field( 'omed_quicklink_body_text', $quicklink->ID ); ?></p>
            <a href="<?php echo get_field( 'omed_quicklink_link', $quicklink->ID ); ?>" class="btn btn--primary">Go</a>
          </div> <!-- .quicklinks__body -->
        </li> <!-- .col -->

    <?php
    endforeach;
    ?>
      </ul>
    </section>
    <?php
    echo $args['after_widget'];
  }

  public function form( $instance ) {
    
    $ids = !empty( $instance['ids'] ) ? $instance['ids'] : '';
    ?>

    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'ids' ) ); ?>">Quicklink IDs to display (comma-separated list): </label>
      <input class="widefat" type="text" name="<?php echo esc_attr( $this->get_field_name( 'ids' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'ids') ); ?>" value="<?php echo esc_attr( $ids ); ?>" />
    </p>

     <?php
  }

  public function update( $new_instance, $old_instance ) {

		$instance = array();
    $instance['ids'] = ( !empty( $new_instance['ids'] ) ? $new_instance['ids'] : '' );

		return $instance;

  }
}


class Omed2016_Highlightable extends WP_Widget {

  public function __construct() {
    $base_id = 'highlightable';
    $name = 'Highlightable';

    $widget_ops = array( 
      'classname' => 'highlightable',
      'description' => 'Highlightable',
    );

    parent::__construct( $base_id, $name, $widget_ops );
  }

  public function form( $instance ) {
    $id = !empty( $instance['id'] ) ? $instance['id'] : '';
    $pinned = !empty( $instance['pinned'] ) ? $instance['pinned'] : '';
    ?>

    <p>
      <label 
        for="<?php echo esc_attr( $this->get_field_id( 'id' ) ); ?>"
      >ID of Highlightable to display: </label>
      <input 
        class="widefat" 
        type="text" 
        name="<?php echo esc_attr( $this->get_field_name( 'id' ) ); ?>" 
        id="<?php echo esc_attr( $this->get_field_id( 'id') ); ?>" 
        value="<?php echo esc_attr( $id ); ?>" 
      />
    </p>

    <p>
      <label 
        for="<?php echo esc_attr( $this->get_field_id( 'pinned' ) ); ?>"
      >Pin to the footer: </label>
      <input 
        class="widefat" 
        type="checkbox" 
        name="<?php echo esc_attr( $this->get_field_name( 'pinned' ) ); ?>" 
        id="<?php echo esc_attr( $this->get_field_id( 'pinned') ); ?>" 
        <?php echo (!empty( $pinned ) ? 'checked' : ''); ?>
      />
    </p>
     <?php

  }

  public function widget( $args, $instance ) {

    echo $args['before_widget'];

    $args = array(
      'post_type' => 'omed_highlightable',
      'p' => (int) $instance['id'],
    );

    $highlightable_array = get_posts( $args );
    if ( !empty( $highlightable_array ) ):
      $highlightable = get_fields($highlightable_array[0]->ID);
    else:
      return;
    endif;
    ?>

    <section 
      class="highlightable <?php echo ( !empty( $highlightable['omed_highlightable_flipped'] ) ? 'highlightable--flipped' : '' ); ?> <?php echo ( isset( $instance['pinned'] ) ? 'highlightable--pinned' : '' ); ?> container-fluid pageblock relative"  >
      <div class="highlightable__block wrap">
        <div class="highlightable__body">
          <div class="highlightable__imagecontainer">
            <img class="highlightable__image" src="<?php echo $highlightable['omed_highlightable_image']['url']; ?>" alt="<?php echo $highlightable['omed_highlightable_image']['alt'] ?>">
          </div> <!-- .highlightable__imagecontainer -->
          <div class="highlightable__text">
            <h5 class="highlightable__kicker"><?php echo $highlightable['omed_highlightable_kicker'] ?></h5>
            <h4 class="highlightable__header"><?php echo $highlightable['omed_highlightable_body'] ?></h4>
            <button class="btn btn--sm <?php echo ( isset( $instance['pinned'] ) ? 'btn--primary' : 'btn--reverse' ); ?>">Lorem ipsum</button>
          </div> <!-- .highlightable__text -->
        </div> <!-- .highlightable__body -->
      </div> <!-- .highlightable__block -->
    </section>

    <?php
    echo $args['after_widget'];
  }

  public function update( $new_instance, $old_instance ) {
		$instance = array();
    $instance['id'] = ( !empty( $new_instance['id'] ) ? $new_instance['id'] : '' );
    $instance['pinned'] = ( !empty( $new_instance['pinned'] ) ? $new_instance['pinned'] : '' );

		return $instance;

  }

}

function omed2016_register_widgets( ) {

  register_widget( 'Omed2016_Featured_Sessions_Block' );
  register_widget( 'Omed2016_Quicklinks_Block' );
  register_widget( 'Omed2016_Intro_Block' );
  register_widget( 'Omed2016_Highlightable' );

  
}
add_action( 'widgets_init' , 'omed2016_register_widgets' );
