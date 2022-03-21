<?php

function force_subscriber_role_on_registration( int $user_id ) {
    wp_update_user( array( 'ID' => $user_id, 'role' => 'subscriber' ) );
}
add_filter( 'user_register', 'force_subscriber_role_on_registration' );