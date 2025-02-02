<?php

/**
 * @link              sopro.io
 * @since             1.0.0
 * @package           Sopro
 *
 * @wordpress-plugin
 * Plugin Name:       Sopro
 * Plugin URI:        sopro.io
 * Description:       Installs the required code for tracking Sopro campaigns.
 * Version:           1.0.7
 * Author:            Sopro
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sopro
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
define( 'SOPRO_PLUGIN_VERSION', '1.0.7' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sopro-plugin-activator.php
 */
function activate_sopro_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sopro-plugin-activator.php';
	Sopro_Plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sopro-plugin-deactivator.php
 */
function deactivate_sopro_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sopro-plugin-deactivator.php';
	Sopro_Plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sopro_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_sopro_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sopro-plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sopro_plugin() {

	$plugin = new Sopro_Plugin();
	$plugin->run();

}
run_sopro_plugin();
