<?php
/***
 * The plugin/function for all of your theme.
 *  @package wp demos a01
 * @since 1.0.0
 */

//Google Fonts pre-connect to help load 3rd-party requests 
function gg_gfonts_prefetch() {
   echo '<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>';
   echo '<link rel="preconnect" href="https://fonts.googleapis.com/" crossorigin>';
}

add_action( 'wp_head', 'gg_gfonts_prefetch' );

//styles & script function
function wpdemos_a01_styles() {
   
   //Adding in Google Fonts
   wp_enqueue_style('Bitter', 'https://fonts.googleapis.com/css2?family=Bitter:wght@300&display=swap', false);
   wp_enqueue_style('Cabin', 'https://fonts.googleapis.com/css2?family=Cabin:wght@400;700&display=swap', false);
   
   //reset
   wp_enqueue_style( 'reset', get_template_directory_uri() . '/assets/css/reset.css', false, '1.0');
   
   //required stylesheet
   wp_enqueue_style( 'style', get_stylesheet_uri() );

   //scripts
   wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '3.6.0', true);

}
add_action('wp_enqueue_scripts', 'wpdemos_a01_styles');


function theme_setup(){
   /** post formats */
   $post_formats = array('aside','image','gallery','video','audio','link','quote','status');
   add_theme_support( 'post-formats', $post_formats);

   /** post thumbnail **/
   add_theme_support( 'post-thumbnails' );
   
   /** title-tag **/
   add_theme_support( 'title-tag' );
   
   /** HTML5 support **/
   add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
   
   /** refresh widgest **/
   add_theme_support( 'customize-selective-refresh-widgets' );
   
   /** custom background **/
   $bg_defaults = array(
      'default-image' => '',
      'default-preset' => 'default',
      'default-size' => 'cover',
      'default-repeat' => 'no-repeat',
      'default-attachment' => 'scroll',
   );
   add_theme_support( 'custom-background', $bg_defaults );

   /** custom header **/
   $header_defaults = array(
      'default-image' => '',
      'width' => 300,
      'height' => 60,
      'flex-height' => true,
      'flex-width' => true,
      'default-text-color' => '',
      'header-text' => true,
      'uploads' => true,
   );
   add_theme_support( 'custom-header', $header_defaults );

   /** custom logo **/
   add_theme_support( 'custom-logo', array(
      'height' => 60,
      'width' => 400,
      'flex-height' => true,
      'flex-width' => true,
      'header-text' => array( 'site-title', 'site-description' ),
   ) );

  }
  add_action('after_setup_theme','theme_setup');

//REGISTER MENUS
function register_menus() {
   register_nav_menus(
      array(
         'main-menu'    => 'Main Menu',
         'footer-menu'  => "Footer Menu",
      )
   );
}
add_action('init', 'register_menus');


//register widgets file
$wpdemos_includes = array(
   '/widgets.php',   //register widgets
);

foreach ($wpdemos_includes as $file ) {
   $filepath = locate_template( 'inc' . $file );
   if( ! $filepath ) {
      trigger_error ( sprintf ( 'Error locating /inc%s file inclusion', $file ), E_USER_ERROR);
   }
   require_once $filepath;
}

//if you just to add without an array 
//require('inc/widgets.php');
