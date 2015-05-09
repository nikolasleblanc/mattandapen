<?php
/*
Author: Ole Fredrik Lie
URL: http://olefredrik.com
*/


// Various clean up functions
require_once('library/cleanup.php');

// Required for Foundation to work properly
require_once('library/foundation.php');

// Register all navigation menus
require_once('library/navigation.php');

// Add menu walker
require_once('library/menu-walker.php');

// Create widget areas in sidebar and footer
require_once('library/widget-areas.php');

// Return entry meta information for posts
require_once('library/entry-meta.php');

// Enqueue scripts
require_once('library/enqueue-scripts.php');

// Add theme support
require_once('library/theme-support.php');

// Add Header image
require_once('library/custom-header.php');

// Creates Movie Reviews Custom Post Type
function two_pens_init() {
    $args = array(
      'label' => 'Two Pens',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'two-pens'),
        'query_var' => true,
        'menu_icon' => 'dashicons-text',
        'has_archive' => true,
        'taxonomies' => array('category', 'post_tag'),
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes')
        );
    register_post_type( 'two-pens', $args );
}
add_action( 'init', 'two_pens_init' );

// Extended subscription function with subscription type variable
function add_photo_shortcode( $atts ) {
    global $post;

    extract( shortcode_atts( array(
        'size' => null,
        'id' => '',
        'align' => ''
    ), $atts, 'photo' ) );

    $post_meta = get_post_meta($post->ID);

    $tmpId = array_search($id, $post_meta['photoID']);

    $image = $post_meta["image"][$tmpId];
    $caption = $post_meta["caption"][$tmpId];
    $credit = $post_meta["credit"][$tmpId];

    $image_url = wp_get_attachment_image( $image, $size ); // returns an array

    $html = '';

    $class = '';
    if ($align != '') {
      $class = ' ' . $align;
    }

    if ($image_url != '') {
      $html = '<div class="photo' . $class . '""><div class="image">' . $image_url . '</div>';
      if ($caption != '') {
        $html .= '<div class="caption">' . $caption . '</div>';
      }
      if ($credit != '') {
        $html .= '<div class="credit">' . $credit . '</div>';
      }
      $html .= '</div>';
    }

    return sprintf( '%s', $html);
}
add_shortcode( 'photo', 'add_photo_shortcode' );

// Extended subscription function with subscription type variable
function add_pullQuote_shortcode( $atts ) {
    global $post;

    extract( shortcode_atts( array(
        'id'=>'',
        'align'=>''
    ), $atts, 'pullQuote' ) );

    $post_meta = get_post_meta($post->ID);

    $tmpId = array_search($id, $post_meta['pullQuoteID']);

    $pullQuote = $post_meta["pull_quote"][$tmpId];

    $html = '';

    $class = '';
    if ($align != '') {
      $class = ' ' . $align;
    }


    if ($pullQuote != '') {
      $html = '<div class="pullQuote' . $class . '">&ldquo;' . $pullQuote . '&rdquo;</div>';
    }


    return sprintf( '%s', $html);
}
add_shortcode( 'pullQuote', 'add_pullQuote_shortcode' );


function my_taxonomies_pen() {
  $labels = array(
    'name'              => _x( 'The Pen Ands...', 'taxonomy general name' ),
    'singular_name'     => _x( 'The Pen And...', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Pen Ands..' ),
    'all_items'         => __( 'All Pen Ands...' ),
    'edit_item'         => __( 'Edit Pen And...' ),
    'update_item'       => __( 'Update Pen And...' ),
    'add_new_item'      => __( 'Add New Pen And...' ),
    'new_item_name'     => __( 'New Pen And...' ),
    'menu_name'         => __( 'Pen Ands...' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'pen', 'two-pens', $args );
}

add_action( 'init', 'my_taxonomies_pen', 0 );

// Creates Movie Reviews Custom Post Type
function published_works_init() {
    $args = array(
      'label' => 'Published Works',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'published-works'),
        'query_var' => true,
        'menu_icon' => 'dashicons-book',
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes'
        ),
        'taxonomies' => array('category', 'post_tag')
    );
    register_post_type( 'published-works', $args );
}
add_action( 'init', 'published_works_init' );

function my_taxonomies_publisher() {
  $labels = array(
    'name'              => _x( 'Publishers', 'taxonomy general name' ),
    'singular_name'     => _x( 'Publisher', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Publishers' ),
    'all_items'         => __( 'All Publishers' ),
    'edit_item'         => __( 'Edit Publisher' ),
    'update_item'       => __( 'Update Publisher' ),
    'add_new_item'      => __( 'Add New Publisher' ),
    'new_item_name'     => __( 'New Publisher' ),
    'menu_name'         => __( 'Publishers' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'publisher', 'published-works', $args );
}

add_action( 'init', 'my_taxonomies_publisher', 0 );

function new_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'new_excerpt_length');

?>
