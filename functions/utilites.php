<?php

// Helper Functions
function debug( $var, $die = false ) {
    echo '<pre>', print_r($var), '</pre>';
    if( $die ) die();
}

function find_in_array( $search_term, $array ) {

    function recursive_find( $search_term, $array ) {
        if ( ! is_array( $array ) ) return false;
        foreach ( $array as $key => $value ) {
            if ( $value == $search_term ) {
                return $key;
            } else if ( is_array( $value ) ) {
                $key_result = recursive_find( $search_term, $value );
                if ( $key_result !== false ) {
                    return $key . ' => ' . $key_result;
                }
            }
        }
        return false;
    }

    $result = recursive_find( $search_term, $array );
    return $result . " => $search_term";
}