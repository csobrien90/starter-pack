<?php

function starter_pack_enqueue_scripts() {
    wp_enqueue_style( 'starter_pack_styles', plugin_dir_url( __FILE__ ).'assets/css/starter-pack-styles.css' );
    wp_enqueue_style( 'dashicons' );
    wp_enqueue_style('bootstrap_css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' );

    wp_enqueue_script( 'starter_pack_js', plugin_dir_url( __FILE__ ).'assets/js/starter-pack-scripts.js', array(), false, true );
    wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), null, true);
    wp_enqueue_script( 'bootstrap_js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array(), null, true);

}
add_action( 'wp_enqueue_scripts', 'starter_pack_enqueue_scripts' );
add_action( 'admin_enqueue_scripts', 'starter_pack_enqueue_scripts' );