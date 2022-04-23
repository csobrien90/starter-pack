<?php

require_once 'functions/enqueues.php';
require_once 'functions/ajax.php';
require_once 'functions/utilites.php';
require_once 'functions/security.php';

// Template redirects
function sp_template_redirects( $page_template )
{
    $login_slug = get_option('sp_login_slug') ?: 'login-sub';

    if ( is_page( 'dev-testing-ground' ) ) {
        $page_template = dirname( __FILE__ ) . '/page-dev-testing-ground.php';
    } else if ( is_page( $login_slug ) ) {
        $page_template = dirname( __FILE__ ) . '/page-login-sub.php';
    }
    return $page_template;
}
add_filter( 'page_template', 'sp_template_redirects' );