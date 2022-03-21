<?php

function starter_pack_enqueue_scripts() {
    wp_enqueue_script( 'starter_pack_js', plugin_dir_url( __FILE__ ).'assets/js/starter-pack-scripts.js', array(), false, true );
    wp_enqueue_style( 'starter_pack_styles', plugin_dir_url( __FILE__ ).'assets/css/starter-pack-styles.css');
    wp_enqueue_style( 'dashicons' );
}
add_action( 'wp_enqueue_scripts', 'starter_pack_enqueue_scripts' );
add_action( 'admin_enqueue_scripts', 'starter_pack_enqueue_scripts' );