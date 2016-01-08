<?php
// Add Featured Image 
add_theme_support( 'post-thumbnails' );

/**
 * Include javascript & CSS files
 */
function front_js_scripts() {
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-2.1.3.min.js', '', '', true  );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', '', '', true );
    wp_enqueue_script( 'bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', '', '', true );
    wp_enqueue_script( 'scrollmonitor', get_template_directory_uri() . '/js/scrollMonitor.js', '', '', true );
    wp_enqueue_script( 'custom-functions', get_template_directory_uri() . '/js/custom-functions.js', '', '', true );
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
    wp_enqueue_style('bxslider', get_template_directory_uri() . '/css/jquery.bxslider.css');
    wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
}
add_action( 'wp_enqueue_scripts', 'front_js_scripts' );

/**
 * Redirect to Theme Option Page After Activation
 */
function go_to_theme_option() {
    wp_redirect( admin_url() . 'themes.php?page=customize_theme' );
}
add_action( "after_switch_theme", "go_to_theme_option" );

/**
 * Add social fields to users
 */
function add_social_field_to_user() {
    include( TEMPLATEPATH . '/inc/user-fields.php' );
}
add_action('init', 'add_social_field_to_user');

/**
 * Add Custom theme option page
 */
function add_theme_option_page() {
    include( TEMPLATEPATH . '/inc/theme-options.php' );
}
add_action('init', 'add_theme_option_page');

/**
 * Add Menu page to Theme Menu
 */
function register_menus() {
  register_nav_menus(
    array(
      'nav-header' => __( 'Nav Header' )
    )
  );
}
add_action( 'init', 'register_menus' );

/**
 * Add post type page to receive Contact form data
 */
function custom_post_type() {
    // Labels name
    $labels = array(
        'name'                  => _x( 'Contacts', 'Page Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Contact', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Contact Form', 'text_domain' ),
        'name_admin_bar'        => __( 'Contact', 'text_domain' ),
        'archives'              => __( 'Item Archives', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
        'all_items'             => __( 'All Items', 'text_domain' ),
        'add_new_item'          => __( 'Add New Item', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Item', 'text_domain' ),
        'edit_item'             => __( 'Edit Item', 'text_domain' ),
        'update_item'           => __( 'Update Item', 'text_domain' ),
        'view_item'             => __( 'View Item', 'text_domain' ),
        'search_items'          => __( 'Search Item', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),

    );
    // Options of the page
    $args = array(
        'label'                 => __( 'Contact', 'text_domain' ),
        'description'           => __( 'Post Type Description', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array(  'title', 'editor' ),
        'taxonomies'            => array( ),
        'query_var'             => false,
        'hierarchical'          => false,
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-email-alt',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => false,
        'has_archive'           => false,       
        'exclude_from_search'   => false,
        'publicly_queryable'    => false,
        'rewrite'               => false,
        'capabilities'          => array(
                                    'edit_post'           => 'edit_contact',
                                    'publish_posts'       => 'publish_contacts',
                                    'read_private_posts'  => 'read_private_contacts',
                                    'delete_others_posts' => 'delete_other_contacts',
                                    'delete_post'         => 'delete_contact'
            ),
        'map_meta_cap' => true
    );
    register_post_type( 'contact', $args );
}
add_action( 'init', 'custom_post_type', 0);

/**
 * Enqueue Plugins & style files
 */
function enqueue_js_files() {
    $screen = get_current_screen();
    if ( 'appearance_page_customize_theme' == $screen->base ) {
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'media-upload' );
        wp_enqueue_script( 'thickbox' );
        wp_enqueue_script( 'my-upload' );
        wp_enqueue_script( 'my_custom_script', get_template_directory_uri() . '/js/media.js' );
        wp_enqueue_style( 'thickbox' );
    }
}
add_action( 'admin_print_scripts', 'enqueue_js_files' );