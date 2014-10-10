<?php

include_once( __DIR__ . '/includes/cereo-people.php' );

add_action( 'wp_footer', 'cereo_accordion_script' );
function cereo_accordion_script() {
	if ( is_tax() ) {
		?><script>(function($) { $( "#accordion" ).accordion({ active: false, collapsible: true, heightStyle: "content" }); }(jQuery));</script><?php
	} else {
		?><script>(function($) { $( "#accordion" ).accordion({ collapsible: true, heightStyle: "content" }); }(jQuery));</script><?php
	}
}

add_action( 'pre_get_posts', 'cereo_display_members_query' );
/**
 * @param WP_Query $query
 */
function cereo_display_members_query( $query ) {
	if ( $query->is_main_query() && is_tax( 'cereo_person_type' ) ) {
		$query->set( 'orderby', 'meta_value' );
		$query->set( 'order', 'ASC' );
		$query->set( 'meta_key', 'cereo_person_last_name' );
		$query->set( 'posts_per_page', 500 );
	}
}