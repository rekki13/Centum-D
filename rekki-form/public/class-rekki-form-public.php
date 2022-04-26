<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://dan.lavron.com
 * @since      1.0.0
 *
 * @package    Rekki_Form
 * @subpackage Rekki_Form/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Rekki_Form
 * @subpackage Rekki_Form/public
 * @author     <rrekkii@gmail.com>
 */
class Rekki_Form_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $rekki_form    The ID of this plugin.
	 */
	private $rekki_form;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $rekki_form       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $rekki_form, $version ) {

		$this->rekki_form = $rekki_form;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->rekki_form, plugin_dir_url( __FILE__ ) . 'css/rekki-form-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->rekki_form, plugin_dir_url( __FILE__ ) . 'js/rekki-form-public.js', array( 'jquery' ), $this->version, false );

	}
	public function rekki_form_shortcode() {

		add_shortcode( 'shortcode-rekki-form', 'rekki_form_display' );

		function rekki_form_display() {
			if (!is_admin()):
			include_once('partials/rekki-form-public-display.php');
		endif;
		}
	}
}
