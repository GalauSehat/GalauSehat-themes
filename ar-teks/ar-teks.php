<?php 

add_action( 'init', 'ary_buttons' );

function ary_buttons() {
    add_filter( "mce_external_plugins", "ary_add_buttons" );
    add_filter( 'mce_buttons', 'ary_register_buttons' );
}

function ary_add_buttons( $plugin_array ) {
    $plugin_array['ary'] = get_template_directory_uri() . '/ar-teks/ar-teks.js';
    return $plugin_array;
}

function ary_register_buttons( $buttons ) {
    array_push( $buttons, 'arteks');
    return $buttons;
}

