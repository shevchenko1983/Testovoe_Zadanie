<?php
/**
 * Plugin Name: WP Simple Pay Lite for Stripe
 * Plugin URI:  https://wpsimplepay.com
 * Description: Add high conversion Stripe checkout forms to your WordPress site and start accepting payments in minutes.
 * Author:      Moonstone Media
 * Author URI:  https://wpsimplepay.com
 * Version:     1.5.8
 * Text Domain: stripe
 * Domain Path: /i18n
 *
 * @copyright   2014-2016 Moonstone Media/Phil Derksen. All rights reserved.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Setup plugin constants.

// Plugin version
if ( ! defined( 'SIMPAY_VERSION' ) ) {
	define( 'SIMPAY_VERSION', '1.5.8' );
}

// Plugin name
if ( ! defined( 'SIMPAY_NAME' ) ) {
	define( 'SIMPAY_NAME', 'WP Simple Pay Lite for Stripe' );
}

// Plugin folder path
// TODO SIMPAY_PLUGIN_DIR
if ( ! defined( 'SC_DIR_PATH' ) ) {
	define( 'SC_DIR_PATH', plugin_dir_path( __FILE__ ) );
}

// Plugin folder URL
// TODO SIMPAY_PLUGIN_URL
if ( ! defined( 'SC_DIR_URL' ) ) {
	define( 'SC_DIR_URL', plugin_dir_url( __FILE__ ) );
}

// Plugin root file
// TODO SIMPAY_PLUGIN_FILE
if ( ! defined( 'SC_PLUGIN_FILE' ) ) {
	define( 'SC_PLUGIN_FILE', __FILE__ );
}

// Base URL
// TODO SIMPAY_BASE_URL
if ( ! defined( 'SC_WEBSITE_BASE_URL' ) ) {
	define( 'SC_WEBSITE_BASE_URL', 'https://wpsimplepay.com/' );
}

// Admin notice and stop execution if Pro plugin found.
// Do this before anything else that uses the plugins_loaded hook runs to avoid conflicts.
add_action( 'plugins_loaded', 'simpay_pro_plugin_check', 1 );

function simpay_pro_plugin_check() {
	if ( class_exists( 'Stripe_Checkout_Pro' ) || class_exists( 'Simple_Pay_Pro' ) ) {
		add_action( 'admin_notices', 'simpay_pro_active_notice' );

		return;
	}
}

function simpay_pro_active_notice() {
	echo '<div class="error"><p>' . __( 'WP Simple Pay Lite and Pro cannot be active simultaneously. Please deactivate one of them to proceed.', 'stripe' ) . '</p></div>';
}

// Plugin requirements class.
require_once 'classes/wp-requirements.php';

// Check plugin requirements before loading plugin.
$this_plugin_checks = new SimPay_WP_Requirements( SIMPAY_NAME, plugin_basename( __FILE__ ), array(
		'PHP'        => '5.3.3',
		'WordPress'  => '4.3',
		'Extensions' => array(
			'curl',
			'json',
			'mbstring',
		),
	) );
if ( $this_plugin_checks->pass() === false ) {
	$this_plugin_checks->halt();

	return;
}

// Load the plugin main class.
require_once SC_DIR_PATH . 'classes/class-stripe-checkout-shared.php';

// Register hook that is fired when the plugin is activated.
register_activation_hook( SC_PLUGIN_FILE, array( 'Stripe_Checkout', 'activate' ) );

// Create a global instance of our main class for this plugin so we can use it throughout all the other classes.
global $base_class;

// Let's get going finally!
$base_class = Stripe_Checkout::get_instance();
