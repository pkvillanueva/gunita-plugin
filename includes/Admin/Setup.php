<?php
/**
 * The Setup class for the GunitaPlugin plugin admin area.
 *
 * This class is responsible for setting up admin-specific functionality for the GunitaPlugin plugin.
 *
 * @package GunitaPlugin
 */

namespace GunitaPlugin\Admin;

use GunitaPlugin\Traits\Singleton;

defined( 'ABSPATH' ) || exit;

/**
 * Class Setup.
 */
class Setup {

	use Singleton;

	/**
	 * Setup constructor.
	 */
	private function __construct() {
		add_action( 'admin_menu', [ $this, 'admin_menu' ] );
	}

	/**
	 * Adds a new top-level menu page to the WordPress admin menu.
	 */
	public function admin_menu(): void {
		add_menu_page( __( 'GunitaPlugin', 'gunita-plugin' ), __( 'GunitaPlugin', 'gunita-plugin' ), 'manage_options', 'gunita-plugin', [ __NAMESPACE__ . '\Dashboard', 'render' ], 'dashicons-star-filled', 0 );
	}
}
