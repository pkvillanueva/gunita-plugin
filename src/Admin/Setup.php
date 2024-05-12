<?php

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
	 * Setup constructor.
	 *
	 * Initializes the Setup class and adds the necessary action hooks.
	 */
	private function __construct() {
		add_action( 'admin_menu', [ $this, 'admin_menu' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_styles' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
	}

	/**
	 * Adds the GunitaPlugin menu page to the admin menu.
	 */
	public function admin_menu(): void {
		add_menu_page( __( 'GunitaPlugin', 'gunita-plugin' ), __( 'GunitaPlugin', 'gunita-plugin' ), 'manage_options', 'gunita-plugin', [ __NAMESPACE__ . '\Dashboard', 'render' ], 'dashicons-star-filled', 0 );
	}


	/**
	 * Enqueues the plugin styles.
	 *
	 * This method is hooked to the 'wp_enqueue_scripts' action and is responsible for enqueueing the plugin styles.
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
	 * Enqueues the plugin scripts.
	 *
	 * This method is hooked to the 'wp_enqueue_scripts' action and is responsible for enqueueing the plugin scripts.
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
