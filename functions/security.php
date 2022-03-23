<?php

function force_subscriber_role_on_registration( int $user_id ) {
	wp_update_user( array( 'ID' => $user_id, 'role' => 'subscriber' ) );
}
add_filter( 'user_register', 'force_subscriber_role_on_registration' );

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
add_filter( 'registration_errors', 'registration_password_strength', 10, 3 );