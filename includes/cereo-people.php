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
		add_action( 'init', array( $this, 'remove_people_editor_support' ), 12 );
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
	}

	/**
	 * Declare support for the University Center plugin's implementation of people.
	 */
	public function register_uc_people_support() {
		global $wsuwp_university_center;

		add_theme_support( 'wsuwp_uc_person' );

		$this->person_content_type = $wsuwp_university_center->people_content_type;
	}

	public function remove_people_editor_support() {
		remove_post_type_support( $this->person_content_type, 'editor' );
	}

	public function add_meta_boxes( $post_type ) {
		if ( $this->person_content_type !== $post_type ) {
			return;
		}

		add_meta_box( 'wsu_cereo_people_fields', 'Data', array( $this, 'display_people_fields_meta_box' ), null, 'normal', 'default' );
	}

	/**
	 * Display a meta box to capture data about a person.
	 * @todo - keywords
	 */
	public function display_people_fields_meta_box( $post ) {
		$cereo_person_position = get_post_meta( $post->ID, '_cereo_person_position', true );
		$cereo_person_department = get_post_meta( $post->ID, '_cereo_person_department', true );
		$cereo_person_college = get_post_meta( $post->ID, '_cereo_person_college', true );
		$cereo_person_campus = get_post_meta( $post->ID, '_cereo_person_campus', true );
		$cereo_person_address = get_post_meta( $post->ID, '_cereo_person_address', true );
		$cereo_person_phone = get_post_meta( $post->ID, '_cereo_person_phone', true );
		$cereo_person_email = get_post_meta( $post->ID, '_cereo_person_email', true );
		$cereo_person_web = get_post_meta( $post->ID, '_cereo_person_web', true );
		$cereo_person_theme = get_post_meta( $post->ID, '_cereo_person_theme', true );
		$cereo_person_specialty = get_post_meta( $post->ID, '_cereo_person_specialty', true );
		$cereo_person_courses = get_post_meta( $post->ID, '_cereo_person_courses', true );
		$cereo_person_research = get_post_meta( $post->ID, '_cereo_person_research', true );
		$cereo_person_outreach = get_post_meta( $post->ID, '_cereo_person_outreach', true );
		?>
		<style>
			#wsu_cereo_people_fields label {
				display: block;
				float: left;
				width: 150px;
			}
			#wsu_cereo_people_fields .regular-text,
			#wsu_cereo_people_fields .long-text {
				margin-bottom: 5px;
			}
		</style>
		<label for="cereo-person-position">Position:</label>
		<input class="regular-text" type="text" id="cereo-person-position" name="cereo_person_position" value="<?php echo esc_attr( $cereo_person_position ); ?>" />
		<br />
		<label for="cereo-person-department">Department:</label>
		<input class="regular-text" type="text" id="cereo-person-department" name="cereo_person_department" value="<?php echo esc_attr( $cereo_person_department ); ?>" />
		<br />
		<label for="cereo-person-college">College:</label>
		<input class="regular-text" type="text" id="cereo-person-college" name="cereo_person_college" value-="<?php echo esc_attr( $cereo_person_college ); ?>" />
		<br />
		<label for="cereo-person-campus">WSU Campus:</label>
		<input class="regular-text" type="text" id="cereo-person-campus" name="cereo_person_campus" value="<?php echo esc_attr( $cereo_person_campus ); ?>" />
		<br />
		<label for="cereo-person-address">Office Address:</label>
		<input class="regular-text" type="text" id="cereo-person-address" name="cereo_person_address" value="<?php echo esc_attr( $cereo_person_address ); ?>" />
		<br />
		<label for="cereo-person-phone">Phone:</label>
		<input class="regular-text" type="text" id="cereo-person-phone" name="cereo_person_phone" value="<?php echo esc_attr( $cereo_person_phone ); ?>" />
		<br />
		<label for="cereo-person-email">Email:</label>
		<input class="regular-text" type="text" id="cereo-person-email" name="cereo_person_email" value="<?php echo esc_attr( $cereo_person_email ); ?>" />
		<br />
		<label for="cereo-person-web">Web:</label>
		<input class="regular-text" type="text" id="cereo-person-web" name="cereo_person_web" value="<?php echo esc_attr( $cereo_person_web ); ?>" />
		<br />
		<label for="cereo-person-theme">Theme:</label>
		<input class="regular-text" type="text" id="cereo-person-theme" name="cereo_person_theme" value="<?php echo esc_attr( $cereo_person_theme ); ?>" />
		<br />
		<label for="cereo-person-specialty">Specialty:</label>
		<input class="regular-text" type="text" id="cereo-person-specialty" name="cereo_person_specialty" value="<?php echo esc_attr( $cereo_person_specialty ); ?>" />
		<br />
		<label for="cereo-person-courses">Courses:</label>
		<input class="large-text" type="text" id="cereo-person-courses" name="cereo_person_courses" value="<?php echo esc_attr( $cereo_person_courses ); ?>" />
		<br />
		<label for="cereo-person-research">Research:</label>
		<input class="large-text" type="text" id="cereo-person-research" name="cereo_person_research" value="<?php echo esc_attr( $cereo_person_research ); ?>" />
		<br />
		<label for="cereo-person-outreach">Outreach:</label>
		<input class="large-text" type="text" id="cereo-person-outreach" name="cereo_person_outreach" value="<?php echo esc_attr( $cereo_person_outreach ); ?>" />
		<?php
	}
}
new WSU_Cereo_People();