<?php

/*

Plugin Name: Starter Pack
Plugin URI: 
Description: A WordPress plugin to jumpstart devving on any WordPress site
Author: Chad O'Brien
Author URI: https://github.com/csobrien90
Version: 1.0
Text Domain: plugin-starter-pack
License: GPL v3
Requires PHP: 7.2
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Copyright(C) 2022, Chad O'Brien - obrien.music@gmail.com

*/

require_once 'functions.php';

function starter_pack_activate() {
	if ( !current_user_can('activate_plugins') ) return;
    
	// Create testing page
	global $wpdb;
	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	
	if ( null === $wpdb->get_row( "SELECT post_name FROM {$wpdb->prefix}posts WHERE post_name = 'dev-testing-ground'", 'ARRAY_A' ) ) {
	
		$current_user = wp_get_current_user();
		
		// create post object
		$page = array(
			'post_title'  	=>	'Dev Testing Ground',
			'post_status' 	=>	'publish',
			'post_author' 	=>	$current_user->ID,
			'post_type'   	=>	'page',
			'post_content'	=>	''
		);
		
		// insert the post into the database
		$dev_testing_ground_post_id = wp_insert_post( $page );
	}

	if ( null === $wpdb->get_row( "SELECT post_name FROM {$wpdb->prefix}posts WHERE post_name = 'login-sub'", 'ARRAY_A' ) ) {
	
		$current_user = wp_get_current_user();
		
		// create post object
		$page = array(
			'post_title'  	=>	'SP Login',
			'post_name'		=>	'login-sub',
			'post_status' 	=>	'publish',
			'post_author' 	=>	$current_user->ID,
			'post_type'   	=>	'page',
			'post_content'	=>	''
		);
		
		// insert the post into the database
		$login_sub_post_id = wp_insert_post( $page );
	}

	// Set default options
	update_option( 'sp_dev_testing_ground_page_id', $dev_testing_ground_post_id );
	update_option( 'sp_login_page_id', $login_sub_post_id );
	update_option( 'sp_login_slug', 'login-sub' );

}
register_activation_hook(__FILE__, 'starter_pack_activate');

function starter_pack_deactivate() {
	// Remove plugin pages
	wp_delete_post( get_option( 'sp_dev_testing_ground_page_id' ), 1 );
	wp_delete_post( get_option( 'sp_login_page_id' ), 1 );

	// Remove settings options
	$settings_options = [
		'sp_dev_testing_ground_page_id',
		'sp_login_page_id',
		'sp_login_slug',
		'sp_login_redirect',
		'sp_custom_redirect',		
		'sp_allowed_mime_types',
		'sp_security_settings',
		'sp_enqueue_settings',
	];
	
	foreach ( $settings_options as $option ) {
		delete_option( $option );
	}
	
}
register_deactivation_hook(__FILE__, 'starter_pack_deactivate');

function starter_pack_admin() {
    require_once 'content/page-admin.php';
}

function add_starter_pack_dashboard_menu_item() {
	add_menu_page(
		'Starter Pack',
		'Starter Pack',
		'manage_options',
		'starter-pack-admin',
		'starter_pack_admin',
		'dashicons-laptop',
		6
	);
}
add_action( 'admin_menu', 'add_starter_pack_dashboard_menu_item', 999 );

function load_sp_first()
{
	$path = str_replace( WP_PLUGIN_DIR . '/', '', __FILE__ );
	if ( $plugins = get_option( 'active_plugins' ) ) {
		if ( $key = array_search( $path, $plugins ) ) {
			array_splice( $plugins, $key, 1 );
			array_unshift( $plugins, $path );
			update_option( 'active_plugins', $plugins );
		}
	}
}
add_action( 'activated_plugin', 'load_sp_first' );