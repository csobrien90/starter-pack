<?php

function save_enqueue_settings() {
	// Verify nonce
	if ( !wp_verify_nonce( $_POST['nonce'], "save-enqueue-settings-nonce")) {
		exit();
	}
	
	$output = new stdClass();

	if ( isset($_POST['settings']) && !empty($_POST['settings']) && is_array($_POST['settings']) ) {
		$settings = [];
		foreach ( $_POST['settings'] as $key => $value ) {
			$settings[sanitize_text_field($key)] = sanitize_text_field($value);
		}
		$result = update_option( 'sp_enqueue_settings', $settings );
		if ( $result ) {
			$output->message = 'Enqueue settings saved successfully.';
		} else {
			$output->message = 'Unable to save enqueue settings.';
		}
	} else {
		$output->message = 'Unable to save enqueue settings - empty or invalid format.';
	};


	wp_send_json( $output );
}

add_action( "wp_ajax_save_enqueue_settings", "save_enqueue_settings" );
add_action( "wp_ajax_nopriv_save_enqueue_settings", "save_enqueue_settings" );

function save_security_settings() {
	// Verify nonce
	if ( !wp_verify_nonce( $_POST['nonce'], "save-security-settings-nonce")) {
		exit();
	}
	
	$output = new stdClass();

	if ( isset($_POST['settings']) && !empty($_POST['settings']) && is_array($_POST['settings']) ) {
		$settings = [];
		foreach ( $_POST['settings'] as $key => $value ) {
			$settings[sanitize_text_field($key)] = sanitize_text_field($value);
		}
		$result = update_option( 'sp_security_settings', $settings );
		if ( $result ) {
			$output->message = 'Security settings saved successfully.';
		} else {
			$output->message = 'Unable to save security settings.';
		}
	} else {
		$output->message = 'Unable to save security settings - empty or invalid format.';
	};


	wp_send_json( $output );
}

add_action( "wp_ajax_save_security_settings", "save_security_settings" );
add_action( "wp_ajax_nopriv_save_security_settings", "save_security_settings" );