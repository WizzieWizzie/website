<?php


// -----------------------------------------------------------------
//    META:HEAD
// -----------------------------------------------------------------


/*
 * Does nice things to the wordpress title,
 * Mostly regarding the pagination
*/
function fix_wp_title($title_parts){


    global $wp_query;
    
    $page_nr = get_query_var('paged');
    
    if ($page_nr) {
    
        if (get_query_var('category_name')) {
            $newTitle = ucfirst(get_query_var('category_name'))." / " . $page_nr;
        } else {
            $newTitle = "News / " . $page_nr;
        }
    
        $title[0] = $newTitle;
    
    } else if (is_front_page()){
    
        $title[0] = 'Wizzie Wizzie | London Computer Coding Club';

    } else {
        $title = $title_parts;
    }

    return $title;
    
}

function wizzie_wp_title(){
    add_filter('wp_title_parts', 'fix_wp_title', 99, 1);
    wp_title( '| Wizzie Wizzie | London Computer Coding Club', true, 'right' );
}

// -----------------------------------------------------------------
//    BODY:CLASS
// -----------------------------------------------------------------

/*
    Clean the Wordpress body_class function

    @returns template-name, parents, home....
*/
function condensed_body_class($classes) {

    global $post;

    // Clear Wordpress default classes

    $classes = [];

    // add a class for the name of the page - later might want to remove the 
    // auto generated pageid class which isn't very useful

    if (is_front_page()) { $classes[] = "frontpage"; }
    if (is_home())       { $classes[] = "homepage"; }

    if (is_page()) {
        $pn = $post->post_name;
        $classes[] = "page_".$pn;
    }

    // Child

    if (is_page() && $post->post_parent) {
        $post_parent = get_post($post->post_parent);
        $parentSlug = $post_parent->post_name;
        $classes[] = "parent_".$parentSlug;
    }

    // Single

    if (is_single()) {
        $classes[] = "single-".get_post_type();
    }

    // add class for the name of the custom template used (if any)
    // returns the templates file name without the extention
    $temp = get_page_template();
    if ($temp != null) {
        $path = pathinfo($temp);
        $tmp = $path['filename'] . "." . $path['extension'];
        $tn= str_replace(".php", "", $tmp);
        $classes[] = $tn;
    }

    $classes[] = get_colour_scheme();

    return $classes;

}

add_filter('body_class', 'condensed_body_class');


function get_wp_template() {

    if (is_front_page()) { return "frontpage"; }
    if (is_home())       { return "homepage"; }

    $temp = get_page_template();
    if ($temp != null) {
        $path = pathinfo($temp);
        $tmp = $path['filename'] . "." . $path['extension'];
        $tn= str_replace(".php", "", $tmp);
        return $tn;
    }

}

// -----------------------------------------------------------------
//    NAVIGATION
// -----------------------------------------------------------------

/*
 * LOAD THE CUSTOM NAVIGATION
*/
function wizzie_navigation(){

    $args = array(
        'container'       => '',
        'menu'            => 'primary',
        'items_wrap'      => '%3$s',
        'walker'          => new MV_Cleaner_Walker_Nav_Menu()
    );

    wp_nav_menu( $args );

    echo "\n";
}

/*
 * LOAD THE CUSTOM NAVIGATION II
 * NAVIGATION WALKER - LA Customized
*/
class MV_Cleaner_Walker_Nav_Menu extends Walker {

    var $tree_type = array( 'post_type', 'taxonomy', 'custom' );
    var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

    function start_lvl(&$output, $depth = 0, $args = []) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }

    function end_lvl(&$output, $depth = 0, $args = []) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    function start_el(&$output, $item, $depth = 1, $args = [], $current_object_id = 0) {

        global $wp_query;

        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : str_repeat( " ", 12 );

        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes = in_array( 'current-menu-item', $classes ) ? array( 'current' ) : array();
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = strlen( trim( $class_names ) ) > 0 ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', '', $item, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= "\n". $indent . "\t    <li" . $id . $value . $class_names .'>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    function end_el(&$output, $object, $depth = 0, $args = []) {
        $output .= "</li>";

        // Last menu item needs to have the class "last" added for this to work
        if ($object->classes[0] == "last") {
            $output .= "\n\t        ";
        }

    }
}


// ---------------------------------------------------------------
//   IMAGES
// ---------------------------------------------------------------

/*
 * Unset the standard thumbnail sizes we're not using anyway
*/
function filter_image_sizes($sizes) {
    unset( $sizes['thumbnail']);
    unset( $sizes['medium']);
    unset( $sizes['large']);
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'filter_image_sizes');


// -----------------------------------------------------------------
//  TEXTUAL CONTENT
// -----------------------------------------------------------------

/*
 * Normal-Word based Excerpt Length
*/
function custom_excerpt_length($length) {
    return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/*
 * Readmore
*/
function custom_excerpt_more($more) {
    return "...";
    return ""; # '<a href="'.get_the_permalink().'" class="more">Read more...</a>';
}
add_filter('excerpt_more', 'custom_excerpt_more');



// -----------------------------------------------------------------
//  PAGINATION
// -----------------------------------------------------------------

/*
    Create a simple pagination
*/
function news_pagingation() {

    // Pagination rewrite inspired by
    // http://tinyurl.com/mmmpzyq

    if (is_singular())
        return;

    global $wp_query;

    if ($wp_query->max_num_pages <= 1)
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /** Add current page to the array */
    if ( $paged >= 1 ) $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ( $paged >= 2 )
        $links[] = $paged - 1;

    if ( ( $paged + 1 ) <= $max )
        $links[] = $paged + 1;


    echo '<div class="pagination"><ul class="col-x03">' . "\n";

    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="current"' : '';
        printf( '<li><a %s href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );

    echo '</ul></div>' . "\n";

}


/*
    Returns the colour scheme if one has been set
    based on an ACF field called -- GUESS -- ok it's colour_scheme
*/
function get_colour_scheme(){
    # wp_reset_query();
    if (get_field('colour_scheme')) return "color-scheme-".get_field('colour_scheme');
}


// -----------------------------------------------------------------
//  FORM FUNCTIONS
// -----------------------------------------------------------------

/*
    Populate a Location field with available
    location options using the locations custom post type
*/
function form_get_location_options() {

    $return = "";

    $args = array(
        'post_type' => 'location',
        'posts_per_page' => -1
    );

    $query = new WP_QUERY($args);

    while ($query->have_posts()) {
        $query->the_post();
        $return .= "<option value='".esc_attr(get_the_title())."'>".get_the_title()."</option>";
    }

    return $return;
    
}

