<?php
/**
 * Admin setup class.
 *
 * Handles admin-specific functionality including asset enqueueing.
 * Add your admin menu pages, settings, and other admin functionality here.
 *
 * @package GunitaPlugin
 */

namespace GunitaPlugin\Admin;

use GunitaPlugin\Helpers\Asset;
use GunitaPlugin\Traits\Singleton;

/**
 * Class Setup
 *
 * This class handles the setup of the GunitaPlugin admin area.
 */
class Setup {

	use Singleton;

	/**
	 * Setup method called automatically after instantiation.
	 *
	 * This method is called by the Singleton trait and registers
	 * all WordPress action and filter hooks for the admin area.
	 *
	 * Example: Add admin menu pages, settings pages, etc.
	 *
	 * @return void
	 */
	protected function setup(): void {
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_styles' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
	}

	/**
	 * Enqueues the admin styles.
	 *
	 * This method is hooked to the 'admin_enqueue_scripts' action and is responsible
	 * for enqueueing the plugin admin styles.
	 *
	 * @return void
	 */
	public function enqueue_styles(): void {
		wp_enqueue_style(
			'gunita-plugin-admin',
			Asset::get_file_url( 'admin', 'css' ),
			Asset::get_file_dependencies( 'admin' ),
			Asset::get_file_version( 'admin' )
		);
	}

	/**
	 * Enqueues the admin scripts.
	 *
	 * This method is hooked to the 'admin_enqueue_scripts' action and is responsible
	 * for enqueueing the plugin admin scripts.
	 *
	 * @return void
	 */
	public function enqueue_scripts(): void {
		wp_enqueue_script(
			'gunita-plugin-admin',
			Asset::get_file_url( 'admin', 'js' ),
			Asset::get_file_dependencies( 'admin' ),
			Asset::get_file_version( 'admin' ),
			true
		);
	}
}
