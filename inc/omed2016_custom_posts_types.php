<?php 

/**
 * Session custom post type
 *
 */

add_action( 'init' , 'omed2016_custom_post_types' );

function omed2016_custom_post_types() {

  $labels = array(
    'name' => 'Featured Sessions',
    'singular_name' => 'Featured Session',
    'menu_name'          => 'Featured Sessions',
    'name_admin_bar'     => 'Featured Session',
    'add_new'            => 'Add new',
    'add_new_item'       => 'Add new featured session',
    'edit_item'          => 'Edit featured session',
    'view_item'          => 'View featured session',
    'all_items'          => 'All featured sessions',
    'search_items'       => 'Search featured sessions',
    'not_found'          => 'No featured sessions found',
    'not_found_in_trash' => 'No featured sessions found in trash.',
  );

  $args = array(
    'labels' => $labels,
    'public' => false,
    'publicly_queryable' => false,
    'exclude_from_search' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_admin_bar' => true,
    'menu_position' => 5,
    'capability_type' => 'post',
    'hierarchical' => false,
    'rewrite' => array( 'slug' => 'featured-session' ),
    'supports' => array( 'title', 'revision' ),
  );

  register_post_type( 'omed_session', $args );
}

