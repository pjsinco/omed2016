<?php 

/**
 * Session custom post type
 *
 */

add_action( 'init' , 'omed2016_custom_post_types' );

function omed2016_custom_post_types() {

  $featured_session_labels = array(
    'name'               => 'Featured Sessions',
    'singular_name'      => 'Featured Session',
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

  $featured_session_args = array(
    'labels'              => $featured_session_labels,
    'public'              => false,
    'publicly_queryable'  => false,
    'exclude_from_search' => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'capability_type'     => 'post',
    'hierarchical'        => false,
    'rewrite'             => array( 'slug' => 'featured-session' ),
    'supports'            => array( 'title', 'revision' ),
  );


  $aside_labels = array(
    'name'               => 'Asides',
    'singular_name'      => 'Aside',
    'menu_name'          => 'Asides',
    'name_admin_bar'     => 'Aside',
    'add_new'            => 'Add new',
    'add_new_item'       => 'Add new aside',
    'edit_item'          => 'Edit aside',
    'view_item'          => 'View aside',
    'all_items'          => 'All asides',
    'search_items'       => 'Search asides',
    'not_found'          => 'No asides found',
    'not_found_in_trash' => 'No asides found in trash.',
  );

  $aside_args = array(
    'labels'              => $aside_labels,
    'public'              => false,
    'publicly_queryable'  => false,
    'exclude_from_search' => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 6,
    'capability_type'     => 'post',
    'hierarchical'        => false,
    'rewrite'             => array( 'slug' => 'aside' ),
    'supports'            => array( 'title', 'editor', 'revision' ),
  );

  register_post_type( 'omed_session', $featured_session_args );
  register_post_type( 'omed_aside', $aside_args );
}



