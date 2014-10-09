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
		add_action( 'save_post', array( $this, 'save_post' ), 10, 2 );
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

		wp_nonce_field( 'save-cereo-person', '_cereo_person_nonce' );
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
		<input class="regular-text" type="text" id="cereo-person-college" name="cereo_person_college" value="<?php echo esc_attr( $cereo_person_college ); ?>" />
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

	/**
	 * Save meta data for a person when edited.
	 *
	 * @param int     $post_id ID of the post being saved.
	 * @param WP_Post $post Object of the post being saved.
	 */
	public function save_post( $post_id, $post ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( $this->person_content_type !== $post->post_type ) {
			return;
		}

		if ( 'auto-draft' === $post->post_status ) {
			return;
		}

		if ( ! isset( $_POST['_cereo_person_nonce'] ) || false === wp_verify_nonce( $_POST['_cereo_person_nonce'], 'save-cereo-person' ) ) {
			return;
		}

		$fields = array(
			'cereo_person_position',
			'cereo_person_department',
			'cereo_person_college',
			'cereo_person_campus',
			'cereo_person_address',
			'cereo_person_phone',
			'cereo_person_email',
			'cereo_person_web',
			'cereo_person_theme',
			'cereo_person_specialty',
			'cereo_person_courses',
			'cereo_person_research',
			'cereo_person_outreach',
		);

		$content_html = '<table><tr><td>Name:</td><td>' . esc_html( $post->post_title ) . '</td></tr>';

		foreach( $fields as $field ) {
			if ( isset( $_POST[ $field ] ) ) {
				update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
				$content_html .= '<tr><td></td><td>' . sanitize_text_field( $_POST[ $field ] ) . '</td></tr>';
			}
		}

		$content_html .= '</table>';

		// Remove this action before saving the compile post content so that we aren't double processing the data.
		remove_action( 'save_post', array( $this, 'save_post' ) );
		$post->post_content = $content_html;
		wp_update_post( $post );
	}
}
new WSU_Cereo_People();