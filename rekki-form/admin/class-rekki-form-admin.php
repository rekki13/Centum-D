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
	private $plugin_name;

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
			array( $this, 'rekkiAdminDashboard' ), // callback function /w content
			'dashicons-buddicons-activity', // menu icon
			13 // priority
		);

	}
	public function rekkiAdminDashboard() {
		require_once 'partials/'.$this->rekki_form.'-admin-display.php';
	}
}
