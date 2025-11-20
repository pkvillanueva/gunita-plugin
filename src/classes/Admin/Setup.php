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

use GunitaPlugin\Asset;
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
		Asset::enqueue_style( 'gunita-plugin-admin', 'admin' );
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
		Asset::enqueue_script( 'gunita-plugin-admin', 'admin' );
	}
}
