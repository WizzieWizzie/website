<?php

/*
 * Register Quote Post Type
 * --------------------------------------------------------- */

function add_quote_post_type() {

    $labels = array(
        'name' => _x('Quotes', 'quote general name'),
        'singular_name' => _x('Quote', 'quote singular name'),
        'add_new' => _x('Add Quote', 'Day'),
        'add_new_item' => __('Add a New Quote'),
        'edit_item' => __('Edit Quote'),
        'new_item' => __('New Quote'),
        'view_item' => __('View Quote'),
        'search_items' => __('Search Quotes'),
        'not_found' =>  __('No Quotes found'),
        'not_found_in_trash' => __('No Quotes found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels'          => $labels,
        'description'     => 'Wizzie Wizzie Coding Club Quotes',
        'menu_position'   => 21,
        'menu_icon'       => 'dashicons-format-quote',
        'public'          => true,
        'query_var'       => true,
        'supports'        => array('title', 'editor'),
        'rewrite'         => array('slug' => 'quote'),
        'hierarchical'    => true,
        'has_archive'     => false,
        'capability_type' => 'page'
    );

    register_post_type( 'quote', $args );

};

add_action('init', 'add_quote_post_type');

/*
 * Register Location Post Type
 * --------------------------------------------------------- */

function add_location_post_type() {

    $labels = array(
        'name' => _x('Locations', 'location general name'),
        'singular_name' => _x('Location', 'location singular name'),
        'add_new' => _x('Add Location', 'Day'),
        'add_new_item' => __('Add a New Location'),
        'edit_item' => __('Edit Location'),
        'new_item' => __('New Location'),
        'view_item' => __('View Location'),
        'search_items' => __('Search Location'),
        'not_found' =>  __('No Location found'),
        'not_found_in_trash' => __('No Location found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels'          => $labels,
        'description'     => 'Wizzie Wizzie Coding Club Locations',
        'menu_position'   => 31,
        'menu_icon'       => 'dashicons-location',
        'public'          => true,
        'query_var'       => true,
        'supports'        => array('title'),
        'rewrite'         => array('slug' => 'location'),
        'hierarchical'    => true,
        'has_archive'     => false,
        'capability_type' => 'page'
    );

    register_post_type( 'location', $args );

};

add_action('init', 'add_location_post_type');
?>