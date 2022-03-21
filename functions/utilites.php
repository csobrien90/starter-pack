<?php

// Helper Functions
function debug( $var, $die = false ) {
    echo '<pre>', print_r($var), '</pre>';
    if( $die ) die();
}