<?php

function starter_pack_enqueue_scripts() {
	$enqueue_settings = get_option('sp_enqueue_settings') ?: [];

	wp_enqueue_style( 'starter_pack_styles', plugins_url().'/starter-pack/assets/css/starter-pack-styles.css' );
	wp_enqueue_script( 'starter_pack_js', plugins_url().'/starter-pack/assets/js/starter-pack-scripts.js', array('jquery'), false, true );
	wp_localize_script( 'starter_pack_js', 'jsVars', array( 'ajaxUrl' => admin_url( 'admin-ajax.php' ) ) );

    switch ( get_option('sp_login_redirect') ) {
        case 'home' :
            $login_redirect = home_url();
            break;
        case 'custom' :
            $login_redirect = get_option('sp_custom_redirect');
            break;
        case 'admin' :
        default:
            $login_redirect = admin_url();
            break;
    }
	wp_enqueue_script( 'substitute_login_js', plugins_url().'/starter-pack/assets/js/substitute-login-scripts.js', array('jquery'), false, true );
	wp_localize_script( 'substitute_login_js', 'jsVars', array( 'ajaxUrl' => admin_url( 'admin-ajax.php' ), 'redirectUrl' => $login_redirect ) );
	
	wp_enqueue_style( 'dashicons' );

	if ( in_array( 'bootstrap', $enqueue_settings ) ) {
		wp_enqueue_style('bootstrap_css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' );
		wp_enqueue_script( 'bootstrap_js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' );
	}

	if ( in_array( 'jquery', $enqueue_settings ) ) {
		wp_deregister_script('jquery');
		wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js' );
	}

	if ( in_array( 'axios', $enqueue_settings ) ) {
		wp_enqueue_script( 'axios', 'https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js' );
	}

	if ( in_array( 'chart.js', $enqueue_settings ) ) {
		wp_enqueue_script( 'chart', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js' );
	}

	if ( in_array( 'lodash', $enqueue_settings ) ) {
		wp_deregister_script('lodash');
		wp_enqueue_script( 'lodash', 'https://cdn.jsdelivr.net/npm/lodash@4.17.11/lodash.min.js' );
	}

	if ( in_array( 'moment.js', $enqueue_settings ) ) {
		wp_deregister_script('moment');
		wp_enqueue_script( 'moment', 'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js' );
	}
}
add_action( 'wp_enqueue_scripts', 'starter_pack_enqueue_scripts' );
add_action( 'admin_enqueue_scripts', 'starter_pack_enqueue_scripts' );