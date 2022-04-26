<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://dan.lavron.com
 * @since             1.0.0
 * @package           Rekki_Form
 *
 * @wordpress-plugin
 * Plugin Name:       ReKKi Form
 * Plugin URI:        https://dan.lavron.com/rekki-form-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Lavron
 * Author URI:        https://dan.lavron.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       rekki-form
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'REKKI_FORM_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-rekki-form-activator.php
 */
function activate_rekki_form() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rekki-form-activator.php';
	Rekki_Form_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-rekki-form-deactivator.php
 */
function deactivate_rekki_form() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rekki-form-deactivator.php';
	Rekki_Form_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_rekki_form' );
register_deactivation_hook( __FILE__, 'deactivate_rekki_form' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-rekki-form.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_rekki_form() {

	$plugin = new Rekki_Form();
	$plugin->run();

}
run_rekki_form();
