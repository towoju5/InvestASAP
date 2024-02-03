<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/towoju5
 * @since             1.0.0
 * @package           Invest_Asap
 *
 * @wordpress-plugin
 * Plugin Name:       InvestASAP
 * Plugin URI:        https://github.com/towoju5/InvestASAP
 * Description:       Introducing the InvestASAP WordPress plugin, a powerful and user-friendly solution designed for investment websites. This plugin seamlessly integrates into your WordPress site, providing users with the ability to effortlessly manage their investments. 
 * Version:           1.0.0
 * Author:            Emmanuel Towoju
 * Author URI:        https://github.com/towoju5/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       invest-asap
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
define( 'INVEST_ASAP_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-invest-asap-activator.php
 */
function activate_invest_asap() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-invest-asap-activator.php';
	Invest_Asap_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-invest-asap-deactivator.php
 */
function deactivate_invest_asap() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-invest-asap-deactivator.php';
	Invest_Asap_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_invest_asap' );
register_deactivation_hook( __FILE__, 'deactivate_invest_asap' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-invest-asap.php';

// admin
require plugin_dir_path( __FILE__ ) . 'admin/function.php';
// user
require plugin_dir_path( __FILE__ ) . 'includes/function.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_invest_asap() {

	$plugin = new Invest_Asap();
	$plugin->run();

}
run_invest_asap();
