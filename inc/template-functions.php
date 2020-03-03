<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package cactuskiev
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function cactuskiev_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'cactuskiev_body_classes' );


function cactuskiev_enqueue_google_fonts() {
	wp_enqueue_style( 'opensans', 'https://fonts.googleapis.com/css?family=Open+Sans|Comfortaa' );
}
add_action( 'wp_enqueue_scripts', 'cactuskiev_enqueue_google_fonts' );


function add_my_currency( $currencies ) {

     $currencies['UAH'] = __( 'Українська гривня', 'woocommerce' );

     return $currencies;

}

add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);

function add_my_currency_symbol( $currency_symbol, $currency ) {

     switch( $currency ) {

         case 'UAH': $currency_symbol = 'грн'; break;

     }

     return $currency_symbol;

}

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

remove_action('wp_head', 'feed_links_extra', 3 ); // links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2 ); // links to the general feeds: post and comment Feed
/*
add_filter('nav_menu_item_id', 'filter_menu_id');
function filter_menu_id(){
    return;
}
*/
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
  return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
}



				// Register Custom Post Type
				function custom_post_type() {

					$labels = array(
						'name'                  => 'Новости',
						'singular_name'         => 'Новость',
						'menu_name'             => 'Новости',
						'name_admin_bar'        => 'Новость',
						'archives'              => 'Item Archives',
						'attributes'            => 'Item Attributes',
						'parent_item_colon'     => 'Parent Item:',
						'all_items'             => 'Все новости',
						'add_new_item'          => 'Добавить новость',
						'add_new'               => 'Добавить новость',
						'new_item'              => 'New Item',
						'edit_item'             => 'Edit Item',
						'update_item'           => 'Update Item',
						'view_item'             => 'View Item',
						'view_items'            => 'View Items',
						'search_items'          => 'Search Item',
						'not_found'             => 'Not found',
						'not_found_in_trash'    => 'Not found in Trash',
						'featured_image'        => 'Featured Image',
						'set_featured_image'    => 'Set featured image',
						'remove_featured_image' => 'Remove featured image',
						'use_featured_image'    => 'Use as featured image',
						'insert_into_item'      => 'Insert into item',
						'uploaded_to_this_item' => 'Uploaded to this item',
						'items_list'            => 'Items list',
						'items_list_navigation' => 'Items list navigation',
						'filter_items_list'     => 'Filter items list',
					);
					$args = array(
						'label'                 => 'Новость',
						'description'           => 'Post Type Description',
						'labels'                => $labels,
						'supports'              => array( 'title', 'editor' ),
						'hierarchical'          => false,
						'public'                => true,
						'show_ui'               => true,
						'show_in_menu'          => true,
						'menu_position'         => 5,
						'show_in_admin_bar'     => true,
						'show_in_nav_menus'     => true,
						'can_export'            => true,
						'has_archive'           => true,
						'exclude_from_search'   => false,
						'publicly_queryable'    => true,
						'capability_type'       => 'page',
					);
					register_post_type( 'news', $args );

				}
				add_action( 'init', 'custom_post_type', 0 );
