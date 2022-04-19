<?php

require_once 'functions/enqueues.php';
require_once 'functions/ajax.php';
require_once 'functions/utilites.php';
require_once 'functions/security.php';

function dev_testing_ground_page_template( $page_template )
{
    if ( is_page( 'dev-testing-ground' ) ) {
        $page_template = dirname( __FILE__ ) . '/page-dev-testing-ground.php';
    }
    return $page_template;
}
add_filter( 'page_template', 'dev_testing_ground_page_template' );