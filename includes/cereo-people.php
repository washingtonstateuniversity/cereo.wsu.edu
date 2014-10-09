<?php

/**
 * Class WSU_Cereo_People
 *
 * Provides management for the people involved with Cereo as both
 * faculty and non-faculty.
 */
class WSU_Cereo_People {
	/**
	 * Setup hooks.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'register_uc_people_support' ), 9 );
	}

	/**
	 * Declare support for the University Center plugin's implementation of people.
	 */
	public function register_uc_people_support() {
		add_theme_support( 'wsuwp_uc_person' );
	}
}
new WSU_Cereo_People();