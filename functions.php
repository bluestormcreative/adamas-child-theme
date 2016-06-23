<?php
/**
 * Adamas WordPress Theme
 *
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

// This will enqueue style.css of child theme
add_action( 'wp_enqueue_scripts', 'wpus_enqueue_childtheme_scripts', 100 );

function wpus_enqueue_childtheme_scripts() {
	wp_enqueue_style( 'adamas-child', get_stylesheet_directory_uri() . '/style.css' );

	wp_enqueue_script('waypoints-vc', 'https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.5/waypoints.min.js', array('jquery'), true);

}

// add VC grid builder elements back in (override adamas core plugin)
function adamas_vc_remove_element() {

	// vc_remove_element( 'vc_toggle' );
	// vc_remove_element( 'vc_message' );
	// vc_remove_element( 'vc_video' );
	// vc_remove_element( 'vc_empty_space' );
	// vc_remove_element( 'vc_pie' );
	// vc_remove_element( 'vc_progress_bar' );
	// vc_remove_element( 'vc_wp_search' );
	// vc_remove_element( 'vc_wp_meta' );
	// vc_remove_element( 'vc_wp_recentcomments' );
	// vc_remove_element( 'vc_wp_calendar' );
	// vc_remove_element( 'vc_wp_pages' );
	// vc_remove_element( 'vc_wp_tagcloud' );
	// vc_remove_element( 'vc_wp_custommenu' );
	// vc_remove_element( 'vc_wp_text' );
	// vc_remove_element( 'vc_wp_posts' );
	// vc_remove_element( 'vc_wp_links' );
	// vc_remove_element( 'vc_wp_categories' );
	// vc_remove_element( 'vc_wp_archives' );
	// vc_remove_element( 'vc_wp_rss' );
	// vc_remove_element( 'vc_gmaps' );
	// vc_remove_element( 'vc_single_image' );
	// vc_remove_element( 'vc_posts_slider' );
	// vc_remove_element( 'vc_posts_grid' );
	// vc_remove_element( 'vc_carousel' );
	// vc_remove_element( 'vc_cta_button' );
	// vc_remove_element( 'vc_cta_button2' );
	// vc_remove_element( 'vc_button' );
	// vc_remove_element( 'vc_button2' );
	// vc_remove_element( 'vc_flickr' );
	// vc_remove_element( 'vc_gallery' );
	// vc_remove_element( 'vc_images_carousel' );
	// vc_remove_element( 'vc_text_separator' );
	// vc_remove_element( 'vc_separator' );
	// vc_remove_element( 'vc_btn' );
	// vc_remove_element( 'vc_cta' );
	// vc_remove_element( 'vc_teaser_grid' );
	// vc_remove_element( 'vc_custom_heading' );
  // vc_remove_element( 'vc_media_grid' );
	// vc_remove_element( 'vc_masonry_grid' );
	// vc_remove_element( 'vc_masonry_media_grid' );
	// vc_remove_element( 'vc_icon' );
	// vc_remove_element( 'vc_basic_grid' );
	// vc_remove_element( 'vc_tour' );
	// vc_remove_element( 'vc_tta_accordion' );
	// vc_remove_element( 'vc_tta_tour' );
	// vc_remove_element( 'vc_tta_tabs' );
	// vc_remove_element( 'vc_tta_pageable' );
	// vc_remove_element( 'vc_tta_section' );
	//
	if ( class_exists( 'WooCommerce' ) ) {
		vc_remove_element( 'woocommerce_cart' );
		vc_remove_element( 'woocommerce_checkout' );
		vc_remove_element( 'woocommerce_my_account' );
		vc_remove_element( 'recent_products' );
		vc_remove_element( 'product_category' );
		vc_remove_element( 'products' );
		vc_remove_element( 'product_page' );
		vc_remove_element( 'woocommerce_order_tracking' );
		vc_remove_element( 'product_categories' );
		vc_remove_element( 'product_category' );
		vc_remove_element( 'recent_products' );
		vc_remove_element( 'featured_products' );
		vc_remove_element( 'sale_products' );
		vc_remove_element( 'best_selling_products' );
		vc_remove_element( 'top_rated_products' );
		vc_remove_element( 'product' );
		vc_remove_element( 'product_attribute' );
		vc_remove_element( 'add_to_cart' );
		vc_remove_element( 'add_to_cart_url' );
	}

}


// remove some post types we don't need
// NOTE: comment out lines to leave post types available (i.e. sliders and portfolio)
add_action( 'after_setup_theme','bsc_remove_types', 100 );

function bsc_remove_types() {

    remove_action( 'init', 'adamas_testimonials_post_type', 4 );
		remove_action( 'init', 'adamas_clients_post_type', 4 );
		remove_action( 'init', 'adamas_team_post_type', 4 );
		//remove_action( 'init', 'adamas_sliders_post_type', 4 );
		//remove_action( 'init', 'adamas_portfolio_post_type', 4 );

}

// remove Demo Import item from admin menu
add_action( 'admin_menu', 'adamas_remove_import_page' );
function adamas_remove_import_page() {
    remove_menu_page('wpus_import_page');
}



// Set WordPress SEO metabox priority to low.
function bsc_position_wpseo_metabox() {
   return 'low';
}
add_filter( 'wpseo_metabox_prio', 'bsc_position_wpseo_metabox' );
