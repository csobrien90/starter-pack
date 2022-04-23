<?php

$security_settings = get_option('sp_security_settings') ?: [];

function force_subscriber_role_on_registration( int $user_id ) {
	wp_update_user( array( 'ID' => $user_id, 'role' => 'subscriber' ) );
}
if ( in_array('force_subscriber_role_on_registration', $security_settings) ) {
	add_filter( 'user_register', 'force_subscriber_role_on_registration' );
}

function registration_password_strength( $errors, $user_login, $user_email ) {
	$password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	
	// Test password strength
	$password_tests = [
		'is_long_enough'		=> [
			'test'		=> strlen( $password ) >= 8,
			'message'	=> 'Password must be at least eight characters long.'
		],
		'has_lowercase'			=> [
			'test'		=> preg_match('@[a-z]@', $password),
			'message'	=> 'Password must contain at least one lowercase letter.'
		],
		'has_uppercase'         => [
			'test'		=> preg_match('@[A-Z]@', $password),
			'message'	=> 'Password must contain at least one uppercase letter.'
		],
		'has_number'            => [
			'test'		=> preg_match('@[0-9]@', $password),
			'message'	=> 'Password must contain at least one number.'
		],
		'has_special_character' => [
			'test'		=> preg_match('@[!@#$%^&*]@', $password),
			'message'	=> 'Password must contain at least one special character. (!@#$%^&*)'
		]
	];
		
	// Build specific error message
	$error_message = 'Registration failed.';
	foreach ( $password_tests as $requirement ) {
		if ( !$requirement['test'] ) {
			$error_message .= ' ' . $requirement['message'];
		}
	}
	
	// Throw registration error if password is not strong enough
	$is_strong_enough = $password_tests['is_long_enough']['test']
	&& $password_tests['has_lowercase']['test']
	&& $password_tests['has_uppercase']['test']
	&& $password_tests['has_number']['test']
	&& $password_tests['has_special_character']['test'];
	
	if ( !$is_strong_enough ) {
		return new WP_Error( 'registration-error', $error_message );
	}
	
	return $errors;
}
if ( in_array('registration_password_strength', $security_settings) ) {
	add_filter( 'registration_errors', 'registration_password_strength', 10, 3 );
}

function disable_comments() {
	add_action( 'admin_init', function() {
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
		
		global $pagenow;
		if ( $pagenow === 'edit-comments.php' ) {
			wp_redirect( admin_url() );
			exit;
		}
		
		$post_types = get_post_types();
		foreach ( $post_types as $post_type ) {
			if ( post_type_supports($post_type, 'comments') ) {
				remove_post_type_support($post_type, 'comments');
				remove_post_type_support($post_type, 'trackbacks');
			}
		}
	});
	
	add_action( 'init', function() {
		if ( is_admin_bar_showing() ) {
			remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
		}
	});
	
	add_action( 'admin_menu', function() {remove_menu_page('edit-comments.php');} );
	add_filter( 'comments_open', function() {return false;} );
	add_filter( 'pings_open', function() {return false;} );
	add_filter( 'comments_array', function() {return array();} );
}
if ( in_array( 'disable_comments', $security_settings ) ) {
	add_action( 'plugins_loaded', 'disable_comments' );
}

function sp_allow_mime_types( $mime_types ) {
	$allowed_mime_types = get_option('sp_allowed_mime_types');
	if ( $allowed_mime_types ) return $allowed_mime_types; 
	return $mime_types;
}
add_filter( 'upload_mimes', 'sp_allow_mime_types' );