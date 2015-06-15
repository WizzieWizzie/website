<?php

/* 
 * Moveable MetaBoxes in Wordpress Admin Area
*/ 
// add_action( 'add_meta_boxes', 'action_add_meta_boxes', 0 );
// function action_add_meta_boxes() {
//     global $_wp_post_type_features;
//     foreach ($_wp_post_type_features as $type => &$features) {
//         if (isset($features['editor']) && $features['editor']) {
//             unset($features['editor']);
//             add_meta_box(
//                 'description',
//                 __('Content'),
//                 'content_metabox',
//                 $type, 'normal', 'high'
//             );
//         }
//     }
//     add_action('admin_head', 'action_admin_head'); //white background
// }
//
// function action_admin_head() {
//     -php- <style type="text/css">.wp-editor-container{ background-color:#fff; }</style> -php- 
// }
// function content_metabox( $post ) {
//     echo '<div class="wp-editor-wrap">';
//         wp_editor($post->post_content, 'content', array('dfw' => true, 'tabindex' => 1) );
//     echo '</div>';
// }


/*
 * Increase image quality
*/
// function example_adjust_quality($image) {
//     $image->set_quality(80);
//     return $image;
// }
// add_filter('image_editor_save_pre','example_adjust_quality');
