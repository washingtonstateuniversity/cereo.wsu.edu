<?php

/**
 * Class WSU_Cereo_People
 *
 * Provides management for the people involved with Cereo as both
 * faculty and non-faculty.
 */
class WSU_Cereo_People {

	/**
	 * @var string Tracks the content type used for people.
	 */
	public $person_content_type = '';

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
		global $wsuwp_university_center;

		add_theme_support( 'wsuwp_uc_person' );

		$this->person_content_type = $wsuwp_university_center->people_content_type;
	}
}
new WSU_Cereo_People();