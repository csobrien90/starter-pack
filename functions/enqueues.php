<?php

function starter_pack_enqueue_scripts() {
    wp_enqueue_style( 'starter_pack_styles', plugins_url().'/starter-pack/assets/css/starter-pack-styles.css' );
    wp_enqueue_style( 'dashicons' );
    wp_enqueue_style('bootstrap_css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' );

    wp_enqueue_script( 'starter_pack_js', plugins_url().'/starter-pack/assets/js/starter-pack-scripts.js', array(), false, true );
    wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js' );
    wp_enqueue_script( 'bootstrap_js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' );
    wp_enqueue_script( 'axios', 'https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js' );
    wp_enqueue_script( 'chart', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js' );
    wp_enqueue_script( 'lodash', 'https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js' );
    wp_enqueue_script( 'moment', 'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js' );
}
add_action( 'wp_enqueue_scripts', 'starter_pack_enqueue_scripts' );
add_action( 'admin_enqueue_scripts', 'starter_pack_enqueue_scripts' );