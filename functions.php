<?php
/**
 * omed2016 functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package omed2016
 */


  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
function omed2016_setup() {

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/
   *     featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	register_nav_menus( 
    array( 
      'header-menu-major' => 'Header Major Menu', 
      'header-menu-minor' => 'Header Minor Menu', 
      'side-nav' => 'Side Navigation', 
    ) 
  );


	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

}
add_action( 'after_setup_theme', 'omed2016_setup' );

function omed2016_remove_widgets() {
  unregister_widget( 'WP_Widget_Pages' );
  unregister_widget( 'WP_Widget_Calendar' );
  unregister_widget( 'WP_Widget_Archives' );
  unregister_widget( 'WP_Widget_Links' );
  unregister_widget( 'WP_Widget_Meta' );
  unregister_widget( 'WP_Widget_Search' );
  unregister_widget( 'WP_Widget_Text' );
  unregister_widget( 'WP_Widget_Categories' );
  unregister_widget( 'WP_Widget_Recent_Posts' );
  unregister_widget( 'WP_Widget_Recent_Comments' );
  unregister_widget( 'WP_Widget_RSS' );
  unregister_widget( 'WP_Widget_Tag_Cloud' );
  //unregister_widget( 'WP_Nav_Menu_Widget' );
}
add_action( 'widgets_init' , 'omed2016_remove_widgets' );

/**
 * Remove default WordPress post type from admin menu
 *
 */
function omed2016_remove_default_posts_from_admin_menu() {

  remove_menu_page( 'edit.php' );

}
add_action('admin_menu' , 'omed2016_remove_default_posts_from_admin_menu');



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function omed2016_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'omed2016_content_width', 1008 );
}
add_action( 'after_setup_theme', 'omed2016_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function omed2016_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'omed2016' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'omed2016' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'omed2016_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function omed2016_scripts() {

  wp_register_style(  
    'omed2016-style',
    get_stylesheet_uri(),
    array(),
    filemtime( get_template_directory() . '/style.css' ), 
    'screen'
  );

  wp_register_script( 
    'grunticon-loader', 
    get_template_directory_uri() . '/dist/grunticon/grunticon.loader.js',
    array(),
    false,
    false
  );

  wp_register_script( 
    'main', 
    get_template_directory_uri() . '/scripts/main.js', 
    array( 'jquery' ),
    filemtime( get_template_directory() . '/scripts/main.js' ), 
    true
  );

  /**
   * Owl Carousel for Featured Sessions slider
   *
   */
  wp_register_script(
    'owl-carousel-js',
    get_template_directory_uri() . '/scripts/owl.carousel.min.js', 
    array( 'jquery' ),
    false,
    true
  );

  wp_register_style(
    'owl-carousel-css',
    get_template_directory_uri() . '/styles/owl.carousel.css', 
    array()
  );

  wp_register_style(
    'owl-theme-css',
    get_template_directory_uri() . '/styles/owl.theme.css', 
    array( 'owl-carousel-css' )
  );

  /**
   * Fitvids
   */
  wp_register_script( 
    'fitvids', 
    get_template_directory_uri() . '/scripts/jquery.fitvids.js', 
    array( 'jquery' ), 
    false, 
    true
  );

  if ( is_front_page() ) {
    wp_enqueue_style( 'owl-carousel-css' );
    wp_enqueue_style( 'owl-theme-css' );
    wp_enqueue_script( 'owl-carousel-js' );
  }
  

	//wp_enqueue_script( 'omed2016-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	//wp_enqueue_script( 'omed2016-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	//if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		//wp_enqueue_script( 'comment-reply' );
	//}
  
	wp_enqueue_style( 'omed2016-style' );
  wp_enqueue_script( 'main' );
  wp_enqueue_script( 'grunticon-loader' );
	//wp_enqueue_script( 'fitvids' );

}
add_action( 'wp_enqueue_scripts', 'omed2016_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Set up Custom post types
 */
require_once get_template_directory() . '/inc/omed2016-custom-post-types.php';

/**
 * Set up widgets
 *
 */
require_once get_template_directory() . '/inc/omed2016-widgets.php';

/**
 * Set up shortcodes
 *
 */
require_once get_template_directory() . '/inc/omed2016-shortcodes.php';

/**
 * Pull the last item out of a url path.
 * Ex.: Returns 'registration' from "http://omed2016.dev/registration/"
 */
function get_last_url_component( $url ) {
  $filtered = array_filter(explode('/', $url)); 
  return array_pop($filtered);
}

function omed2016_add_page_slug_to_body_class( $classes ) {

  if ( !is_page() ) {
    return $classes;
  }

  global $post;

  if ( isset( $post ) ) {
    array_push( $classes, $post->post_type . '-' . $post->post_name );
  }
  
  return $classes;

}
add_filter( 'body_class', 'omed2016_add_page_slug_to_body_class' );


class Omed2016_Major_Nav_Walker_Class extends Walker_Nav_Menu {

  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat( "\t", $depth );
    $output .= "\n$indent<ul class=\"level-2 menu__list--major active\">\n";
  }

//  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0) {
//    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
//    $classes = empty( $item->classes ) ? array() : ( array ) $item->classes;
//    echo '<pre>'; var_dump($item); echo '</pre>'; die();
//  }


  function end_el( &$output, $item, $depth = 0, $args = array() ) {

    parent::end_el( $output, $item, $depth, $args );

  }
  
}

class Omed2016_Side_Nav_Walker_Class extends Walker_Nav_Menu {

  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat( "\t", $depth );
    $output .= "\n$indent<ul class=\"pagenav__items\">\n";
  }

  /**
   * We're not doing anything much different from the parent
   * class's start_el() method.
   *
   */
  function start_el( &$output, $item, $depth = 0, $args = array() ) {

    global $post;


    // Show only items within this section
    if ( $item->post_parent != 0 ) {
      if ( $item->post_parent == $post->post_parent || 
           $item->post_parent == $post->ID) {
        
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;


        $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

        $class_names = apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth );

        // We only care about 
        $class_names =  array_filter( $class_names, function($k) {
            return strpos( $k, 'current-menu-item') === 0;
          } 
        );

        $class_names[] = 'pagenav__item';

        $class_names = $class_names ? ' class="' . esc_attr( implode( ' ', $class_names ) ) . '"' : '';

        $output .= $indent . '<li ' . $class_names . '>';

        $atts = array();
        $atts['title'] = !empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = !empty( $item->target ) ? $item->target : '';
        $atts['rel'] = !empty( $item->xfn ) ? $item->xfn : '';
        $atts['href'] = !empty( $item->url ) ? $item->url : '';

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
  
        foreach ( $atts as $attr => $value ) {

          if ( !empty( $value ) ) {
            $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
            $attributes .= ' ' . $attr . '="' . $value . '"';
          }
          
        }

        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

        $item_output  = $args->before;
        $item_output .= '<a ' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= 
          apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
      }
    }

  }

  function end_el( &$output, $item, $depth = 0, $args = array() ) {

    parent::end_el( $output, $item, $depth, $args );

  }
}


class Omed2016_Minor_Nav_Walker_Class extends Walker_Nav_Menu {

  // TODO For now, nothing is happening here
  function start_el( &$output, $item, $depth = 0, $args = array() ) {

    // Get an array of URL components
    $filtered = array_filter( explode('/', $item->url) );
    
    // The last item is the title
    $title = array_pop( $filtered );

    parent::start_el( $output, $item, $depth, $args );
  }
}

function omed2016_add_class_to_menu_minor_item( 
    $classes, $item, $args, $depth 
  ) {

  if ( $args-> menu != 'header-menu-minor') {
    return $classes;
  }

  $slug = mb_strtolower( get_last_url_component( $item->url ) );
  $classes[] = 'icon-' . $slug;

  return $classes;;

}
//add_filter( 
//  'nav_menu_css_class', 
//  'omed2016_add_class_to_menu_minor_item', 
//  10, 
//  4 );

/**
 * Take the page title and format it for reference in our 
 * title => icon-class-name mapping.
 *
 * Ex.: "Exhibtors" becomes "for-exhibitors"
 *
 * @param string $title The title to format
 * @return string
 */
function omed2016_format_menu_slug( $title ) {

  return mb_strtolower( str_replace( " ", "-", $title ) );

}

function omed2016_get_icon_class_name( $title ) {

    $icon_class_names = array(
      'registration' => 'registration',
      'faqs' => 'faq',
      'for-exhibitors' => 'for-exhibitors',
      'aoa' => 'aoa',
      'program' => 'program',
    );


    if ( $icon_class_names[$title] ) {
      return 'icon-' . $icon_class_names[$title];
    }

    return NULL;
}

function omed2016_add_class_to_menu_minor_anchor_element( $item_output, $item, $depth, $args ) {

  if ( $args->menu == 'header-menu-minor') {

    $slug = omed2016_format_menu_slug( $item->title );
    $class = omed2016_get_icon_class_name( $slug ) . ' menu-icon';

    return preg_replace( 
      '/(<a.*?>[^>]*?)</',
      "<div class=\"$class\" data-grunticon-embed></div>" . "$1" . "<",
      $item_output 
    );

  } else if ( $args->menu == 'header-menu-major' && $item->menu_item_parent == "0") {
    return preg_replace(
      "/(<a.+?>)(\\w*)/u", 
      "$1$2 <i class=\"icon-ctrl-down\"></i>", 
      $item_output
    );
  }

  return $item_output;
}
add_filter( 
  'walker_nav_menu_start_el',
  'omed2016_add_class_to_menu_minor_anchor_element',
  10,
  4
);

function omed2016_add_class_to_anchor( $nav_menu, $args ) {
    return preg_replace(
      "/<a (.*)>/",
      "<a class=\"nav__link\" $1>",
      $nav_menu
    );
//  return preg_replace(
//    "/<a (.*)>(.*)<\/a>/", 
//    "<a class=\"nav__link\" $1>$2 <i class=\"icon-ctrl-down\"></i></a>", 
//    $nav_menu
//  );
}
//add_filter( 'wp_nav_menu', 'omed2016_add_class_to_anchor', 10, 2 );

function omed2016_remove_aoa_from_menu_link( $title, $item, $args, $depth ) {

  if ( $args->menu != 'header-menu-minor' ) {
    return $title;
  }

  if ( $title != 'AOA' ) {
    return $title;
  } 

  return '';


}
add_filter( 'nav_menu_item_title', 'omed2016_remove_aoa_from_menu_link', 10, 4 );

/**
 * Add our fitvids loader
 *
 * http://fitvidsjs.com/
 */
function omed_add_fitvids_script() {
  ?>
  <script>
    jQuery(document).ready(function() {
      jQuery('#videoContainer').fitVids();
    });
  </script>
  <?php
}

function omed_add_custom_ninja_form_class ( $form_class, $form_id ) 
{
  if ( $form_id == 1 ) {
    $form_class .= ' contact-form';
  }

  return $form_class;
}
add_filter( 'ninja_forms_form_class', 'omed_add_custom_ninja_form_class', 10, 2 );

function omed_add_ninja_form_styles( $form_id ) {

  if ( $form_id == 1 ) {

    echo '<style> 

    .page-contact-us .ninja-forms-required-items {
      /* display: none; */
    }

    .page-contact-us .ninja-forms-req-symbol {
      color: #00b0b9;
    }

    .page-contact-us .ninja-forms-field {
      width: 100% !important;
      margin-left: 0 !important;
      margin-right: 0 !important;
      margin-top: .5rem;
      border-color: #00b0b9;
    }

    .page-contact-us .ninja-forms-error .ninja-forms-field {
      margin-bottom: .33rem;
    }

    .page-contact-us .ninja-forms-field-error p {
      font-size: .75rem;
      text-align: center;
      color: #cb333b;
    }

    .ninja-forms-error-msg {
      margin-bottom: 1rem;
      text-align: center;
      background: #fcef06;
      padding: .5rem 0;
      font-size: .875rem;
      color: #00b0b9;
    }

    </style>';


  }

}
add_action( 'ninja_forms_display_css' , 'omed_add_ninja_form_styles' );

