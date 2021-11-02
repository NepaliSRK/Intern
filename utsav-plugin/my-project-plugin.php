<?php
/**
 * Plugin Name: Utsav Plugin
 * * Description: Handles Utsav's requirements with this plugin.
 */

 // Remove the admin bar from the front end
// add_filter( 'show_admin_bar', '__return_false' );

 
//Init Hook for the custom post type
 
add_action('init', 'create_custom_post_type');
 
function create_custom_post_type() {
 
$supports = array(
'title', // post title
'editor', // post content
'author', // post author
'thumbnail', // featured images
'excerpt', // post excerpt
'custom-fields', // custom fields
'comments', // post comments
'revisions', // post revisions
'post-formats', // post formats
);
 
$labels = array(
'name' => _x('news', 'plural'),
'singular_name' => _x('news', 'singular'),
'menu_name' => _x('News', 'admin menu'),
'name_admin_bar' => _x('news', 'admin bar'),
'add_new' => _x('Add New', 'add new'),
'add_new_item' => __('Add New news'),
'new_item' => __('New news'),
'edit_item' => __('Edit news'),
'view_item' => __('View news'),
'all_items' => __('All news'),
'search_items' => __('Search news'),
'not_found' => __('No news found.'),
);
 
$args = array(
'supports' => $supports,
'labels' => $labels,
'description' => 'Holds our News and specific data',
'public' => true,
'taxonomies' => array( 'category', 'post_tag' ),
'show_ui' => true,
'show_in_menu' => true,
'show_in_nav_menus' => true,
'show_in_admin_bar' => true,
'can_export' => true,
'capability_type' => 'post',
 'show_in_rest' => true,
'query_var' => true,
'rewrite' => array('slug' => 'news'),
'has_archive' => true,
'hierarchical' => false,
'menu_position' => 6,
'menu_icon' => 'dashicons-megaphone',
);

register_post_type('news', $args); // Register Post type

}

// add_filter( 'single_template', 'pp_event_single_template', 16 );

// $pp_event_single_template = apply_filters( 'single_template',  $int ); 
                         
// if ( !empty( $pp_event_single_template ) ) { 
                         
// }

// define the single_template callback 
function filter_single_template( $template ) { 
    global $post;
    // make filter magic happen here... 
    if($post->post_type == "news")
        return plugin_dir_path( __FILE__ ) . "single-template.php";

    return $template;
} 

// // add the filter 
add_filter( 'single_template', 'filter_single_template', 10, 2 ); 
         



