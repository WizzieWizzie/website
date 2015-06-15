<?php

$textdomain = "wizzie";

/**
 * WIZZIE FUNCTIONS INCLUDES
*/

require_once locate_template('/lib/dev.php');
require_once locate_template('/lib/admin.php');
require_once locate_template('/lib/post-types.php');
require_once locate_template('/lib/frontend.php');
require_once locate_template('/lib/ajax.php');

add_action( 'after_setup_theme',  'wizzie_setup' );
add_action( 'wp_enqueue_scripts', 'wizzie_stylesheets' );
add_action( 'wp_enqueue_scripts', 'wizzie_scripts' );

/*
 * WIZZIE UPDATE SETTINGS
*/
add_filter( 'allow_minor_auto_core_updates', '__return_true' );

/**
 * WIZZIE THEME SETUP
*/
function wizzie_setup(){

    add_filter( 'show_admin_bar', '__return_false' );

    register_nav_menus(array(
        'primary' => 'Primary Navigation'
    ));

    // add_theme_support( 'post-thumbnails', array( /*'post',*/ 'gallery' ) );
    // add_image_size( 'mm-medium', 772, 482, array('center', 'center') );
    
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
}

/**
 * Register Stylesheets
 */
function wizzie_stylesheets(){

    $styles = array (

        'default' => array(
            'normalize'    => get_stylesheet_directory_uri().'/css/normalise.css',
            'respond'      => get_stylesheet_directory_uri().'/css/respond.css',
            'styles'       => get_stylesheet_directory_uri().'/css/style.css',
            'owl'          => get_stylesheet_directory_uri().'/js/owl-carousel/owl.carousel.css',
            'roboto'       => 'http://fonts.googleapis.com/css?family=Roboto:400,100,300,500',
            'amatic'       => 'http://fonts.googleapis.com/css?family=Amatic+SC:400,700'
        ),

        'homepage' => array()

    );

    add_editor_style( get_stylesheet_directory_uri().'/css/editor-styles.css' );

    // Default styles

    foreach( $styles['default'] as $k => $v ) {
        wp_register_style( $k, $v );
        wp_enqueue_style( $k );
    }

    // Page specific styles

    if ( is_front_page() ) {
        foreach( $styles['homepage'] as $k => $v ) {
            wp_register_style( $k, $v );
            wp_enqueue_style( $k );
        }
    }

}

/**
 * Register Javascript
 */
function wizzie_scripts(){

    global $post;

    // Switch WP to use latest jQuery
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', "//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js", false, 'latest', false );
        wp_enqueue_script('jquery');
    }

    $template = get_wp_template();
    $gmapsApiKey = "AIzaSyDlxjpW_MizvPRGfEYiEZl5xinJZbivse8";

    wp_register_script('modernizr',   get_template_directory_uri().'/js/vendor/modernizr-2.8.3-custom.js'     , array('jquery'), '2.8.3', false);
    wp_register_script('plugins',     get_template_directory_uri().'/js/plugins.js'                           , array('jquery'), null   , true);
    wp_register_script('wizzie',      get_template_directory_uri().'/js/wizzie.js'                            , array('jquery'), null   , true);
    wp_register_script('migrate',     get_template_directory_uri().'/js/vendor/jquery-migrate-v.1.2.1.min.js' , array('jquery'), null   , true);
    wp_register_script('owl',         get_template_directory_uri().'/js/owl-carousel/owl.carousel.min.js'     , array('jquery'), null   , true);
    wp_register_script('gmapsapi',   '//maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false&amp;key=' . $gmapsApiKey  , array()          , '1.0.0', true);
    wp_register_script('gmaps',       get_template_directory_uri().'/js/map.js'                                            , array('gmapsapi'), '1.0.0', true);
    wp_register_script('parsley',     get_template_directory_uri().'/js/parsley/parsley.min.js'               , array('jquery'), null   , true);

    wp_enqueue_script('modernizr');
    wp_enqueue_script('plugins');
    wp_enqueue_script('migrate');
    wp_enqueue_script('wizzie');

    /*
        Select Javascript loading
    */

    if ($template == 'template-when') {
        wp_enqueue_script('gmapsapi');
        wp_enqueue_script('gmaps');
        wp_enqueue_script('owl');
    }

    if ($template == 'template-signup') {
        wp_enqueue_script('parsley');
    }

    add_action('wp_footer', 'jQueryFallback', 99);

}

function jQueryFallback(){
    $script = '<script src="'.get_template_directory_uri().'/js/vendor/jquery-v1.11.1.min.js"><\/script>';
    echo "<script>window.jQuery || document.write('".$script."')</script>";
}

/**
 * LA custom wp_header
 */
function wizzie_wp_header() {

    // Remove unnecessary header tags
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'wp_generator' );

    // Indent wp_head output
    $patterns = array( "/\n/" => "\n    " );
    ob_start();
    wp_head();
    echo preg_replace( array_keys($patterns), array_values($patterns), ob_get_clean() );
}

function wizzie_wp_footer() {

    // Indent wp_footer output
    $patterns = array( "/\n/" => "\n    " );
    ob_start();
    wp_footer();
    echo "    ".preg_replace( array_keys($patterns), array_values($patterns), ob_get_clean() );
}

?>