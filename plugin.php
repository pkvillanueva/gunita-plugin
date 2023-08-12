<?php
/**
 * Plugin Name: GunitaPlugin
 * Plugin URI: https://gunita.dev
 * Description: Welcome to GunitaPlugin, your go-to WordPress plugin boilerplate. Crafted to leverage the latest dev tools in WordPress plugin development, this boilerplate is designed to empower you to create dynamic, feature-rich, and robust plugins with ease. This is not just another boilerplate; it's your head start in the competitive WordPress plugin development landscape.
 * Version: 0.0.1
 * Author: Gunita
 * Author URI: https://gunita.dev
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: gunita-plugin
 * Domain Path: /languages
 *
 * @package GunitaPlugin
 */

namespace GunitaPlugin;

defined( 'ABSPATH' ) || exit;

/**
 * Require composer autoloader if it exists.
 */
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

/**
 * Define constants.
 */
define( 'GUNITA_PLUGIN_VERSION', '0.0.1' );

/**
 * Load install class.
 */
register_activation_hook( __FILE__, [ __NAMESPACE__ . '\Install', 'get_instance' ] );

/**
 * Load uninstall class.
 */
register_uninstall_hook( __FILE__, [ __NAMESPACE__ . '\Uninstall', 'get_instance' ] );

/**
 * Initialize plugin.
 */
Setup::get_instance();

/**
 * Admin only initialize.
 */
if ( is_admin() ) {
	Admin\Setup::get_instance();
}
