<?php

/**
 * Enqueue Styles.
 */
function enqueue_style(){
	wp_enqueue_style('swiper-css', get_stylesheet_directory_uri() . '/dist/css/vendor/swiper-bundle.css');
  wp_enqueue_style('form-css', get_stylesheet_directory_uri() . '/dist/css/vendor/form.min.css');
  wp_enqueue_style('transition-css', get_stylesheet_directory_uri() . '/dist/css/vendor/transition.min.css');
  wp_enqueue_style('dropdown-css', get_stylesheet_directory_uri() . '/dist/css/vendor/dropdown.min.css');
  wp_enqueue_style('input-css', get_stylesheet_directory_uri() . '/dist/css/vendor/input.min.css');
  wp_enqueue_style('message-css', get_stylesheet_directory_uri() . '/dist/css/vendor/message.min.css');
  wp_enqueue_style('flatpickr-css', get_stylesheet_directory_uri() . '/dist/css/vendor/flatpickr.css');
  wp_enqueue_style('main-css', get_stylesheet_directory_uri() . '/dist/css/main.css');
}
add_action('wp_enqueue_scripts', 'enqueue_style');

/**
 * Enqueue Scripts.
 */
function enqueue_js(){
	wp_enqueue_script( 'vendor-js-defer', get_stylesheet_directory_uri() . '/dist/js/vendors.js', array(), false, true );
  wp_enqueue_script( 'swiper', get_stylesheet_directory_uri() .'/dist/js/swiper-bundle.min.js', array(), false, true );
  if (is_front_page()) {
    wp_enqueue_script( 'home-js-defer', get_stylesheet_directory_uri() . '/dist/js/home.js', array(), false, true );
  }  
  wp_enqueue_script( 'mobileSwiper-js-defer', get_stylesheet_directory_uri() . '/dist/js/mobileSwiper.js', array(), false, true );
  wp_enqueue_script( 'main-js-defer', get_stylesheet_directory_uri() . '/dist/js/main.js', array(), false, true );
  if ( is_page_template( 'page-why-zetworks.php' ) ) {
    wp_enqueue_script( 'why-zetworks', get_stylesheet_directory_uri() . '/dist/js/WhyZetWerk.js', array(), false, true );
  }    
  if ( is_page_template( 'page-how-zetwerk.php' ) ) {
    wp_enqueue_script( 'how-zetworks', get_stylesheet_directory_uri() . '/dist/js/how-zetworks.js', array(), false, true );
  }  
  if(is_archive('press-release')) {
    wp_enqueue_script( 'press-release', get_stylesheet_directory_uri() . '/dist/js/precision-manufacturing-die-casting.js', array(), false, true );
  }     

  if(is_page_template('page-media-assets.php')) {
    wp_enqueue_script( 'press-release', get_stylesheet_directory_uri() . '/dist/js/precision-manufacturing-die-casting.js', array(), false, true );
  }   

  if ( is_page_template( 'contact-us.php' ) ) {
    wp_enqueue_script( 'contact-us', get_stylesheet_directory_uri() . '/dist/js/contact-us.js', array(), false, true );
  } 

  if(is_singular('manufacturing')){
    wp_enqueue_script( 'manufacturing-js', get_stylesheet_directory_uri() . '/dist/js/precision-manufacturing-die-casting.js', array(), false, true );
  }     
  if(get_post_type() === 'post') {
    wp_enqueue_script( 'manufacturing-js', get_stylesheet_directory_uri() . '/dist/js/precision-manufacturing-die-casting.js', array(), false, true );
  }  
}
add_action('wp_enqueue_scripts', 'enqueue_js');


function filters() {
  wp_register_script( 'filter-scripts', get_stylesheet_directory_uri() . '/dist/js/filter-script.js', array('jquery'), time());
  global $wp_query;
  wp_localize_script( 'filter-scripts', 'loadmore_params', array(
    'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
    'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
    'current_page' => $wp_query->query_vars['paged'] ? $wp_query->query_vars['paged'] : 1,
    'max_page' => $wp_query->max_num_pages
  ));
  wp_enqueue_script( 'filter-scripts' );
}
add_action( 'wp_enqueue_scripts', 'filters', 1 );