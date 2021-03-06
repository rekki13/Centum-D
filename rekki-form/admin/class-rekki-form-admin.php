<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://dan.lavron.com
 * @since      1.0.0
 *
 * @package    Rekki_Form
 * @subpackage Rekki_Form/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Rekki_Form
 * @subpackage Rekki_Form/admin
 * @author     <rrekkii@gmail.com>
 */
class Rekki_Form_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $rekki_form The ID of this plugin.
	 */
	private $rekki_form;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param string $rekki_form The name of this plugin.
	 * @param string $version    The version of this plugin.
	 *
	 * @since    1.0.0
	 */
	public function __construct( $rekki_form, $version ) {

		$this->rekki_form = $rekki_form;
		$this->version    = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Rekki_Form_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Rekki_Form_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->rekki_form,
			plugin_dir_url( __FILE__ ) . 'css/rekki-form-admin.css', array(),
			$this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Rekki_Form_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Rekki_Form_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->rekki_form,
			plugin_dir_url( __FILE__ ) . 'js/rekki-form-admin.js',
			array( 'jquery' ), $this->version, false );

	}

	public function rekki_form_page() {

		add_menu_page(
			'ReKKi Form', // page <title>Title</title>
			'ReKKi Form', // menu link text
			'manage_options', // capability to access the page
			'rekki-form', // page URL slug
			array( $this, 'rekkiAdminDashboard' ),
			// callback function /w content
			'dashicons-buddicons-activity', // menu icon
			13 // priority
		);

	}

	public function rekkiAdminDashboard() {
		require_once 'partials/' . $this->rekki_form . '-admin-display.php';
	}

	public function process_contact_form() {

		global $wpdb;

		$params = $_POST;

		/*create table if not exists*/

		$table_name = $wpdb->prefix . 'rekki_form';

		$query = $wpdb->prepare( 'SHOW TABLES LIKE %s',
			$wpdb->esc_like( $table_name ) );

		if ( ! $wpdb->get_var( $query ) == $table_name ) {

			$sql = "CREATE TABLE {$table_name} (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        rekki_form_full_name VARCHAR(255) NOT NULL,
        rekki_form_email VARCHAR(255) NOT NULL,
        rekki_form_phone VARCHAR(255) NOT NULL,
        rekki_form_date DATE NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

			if ( $wpdb->query( $sql ) ) {
				$this->submitsForm( $table_name, $params );
			}


		} else {
			$this->submitsForm( $table_name, $params );
		}

		/*create table if not exists*/

		die;

	}

	public function submitsForm( $table_name, $params ) {

		global $wpdb, $wp;

		$curTime = date( 'Y-m-d H:i:s' );

		$query
			= "INSERT INTO {$table_name}(rekki_form_full_name, rekki_form_email,rekki_form_phone,rekki_form_date,created_at) VALUES('{$params['rekki_form_full_name']}','{$params['rekki_form_email']}','{$params['rekki_form_phone']}','{$params['rekki_form_date']}','{$curTime}')";

		if ( $wpdb->query( $query ) ) {
			echo('success');

		} else {
			echo('sth wrong');
		}
	}
}
