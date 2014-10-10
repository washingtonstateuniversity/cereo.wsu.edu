<?php

include_once( __DIR__ . '/includes/cereo-people.php' );

add_action( 'wp_footer', 'cereo_accordion_script' );
function cereo_accordion_script() {
	?><script>(function($) { $( "#accordion" ).accordion({ collapsible: true }); }(jQuery));</script><?php
}