<?php

// Helper Functions
function debug( $var, $die = false ) {
    echo '<pre>', print_r($var), '</pre>';
    if( $die ) die();
}

function log_this( $var ) {
    echo '<script>console.log('.json_encode($var).')</script>';
}

function php_to_js( $var, $new_var_name = 'a', $new_var_type = 'var' ) {
    if ( !in_array ($new_var_type, ['let', 'var', 'const']) ) log_this('invalid declaration from php_to_js call');
    echo "<script>$new_var_type $new_var_name = ".json_encode($var).'</script>';
}

function deep_search( $search_term, $array_or_object ) {

    function find_in_array( $search_term, $array ) {
        if ( ! is_array( $array ) ) return false;
        foreach ( $array as $key => $value ) {
            if ( $value == $search_term ) {
                return $key;
            } else if ( is_array( $value ) ) {
                $key_result = find_in_array( $search_term, $value );
                if ( $key_result !== false ) {
                    return $key . '-' . $key_result;
                }
            }
        }
        return false;
    }

    function build_path( $path, $search_term, $array_or_object ) {
        $path_array = explode( '-', $path );
        $layer_type = [];
        $layer_type[] = gettype( $array_or_object );
        $target = $array_or_object;
        foreach( $path_array as $index => $layer ) {
            if ( $layer_type[$index] === 'object' ) {
                $layer_type[$index + 1] = gettype( $target->$layer );
                $target = $target->$layer;
            } elseif ( $layer_type[$index] === 'array' ) {
                $layer_type[$index + 1] = gettype( $target[$layer] );
                $target = $target[$layer];
            }
        }
        $actual_path = '$var';
        foreach( $layer_type as $index => $type ) {
            switch ($type) {
                case 'object':
                    $actual_path .= '->' . $path_array[$index];
                    break;
                case 'array':
                    $actual_path .= "['" . $path_array[$index] . "']";
                    break;
                default:
                    $actual_path .= ' = ' . $search_term;
            }
        }
        return $actual_path;
    }
    
    $array = json_decode(json_encode($array_or_object), true);
    $result = build_path(find_in_array( $search_term, $array ), $search_term, $array_or_object );
    return $result;
}