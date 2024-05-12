<?php

namespace GunitaPlugin;

use GunitaPlugin\Helpers\Asset;
use GunitaPlugin\Traits\Singleton;

/**
 * Class Setup
 *
 * This class handles the setup of the Gunita Plugin.
 */
class Setup {

	use Singleton;

	/**
	 * Setup constructor.
	 *
	 * Initializes the Setup class by adding necessary actions.
	 */
	private function __construct() {
		add_action( 'init', [ $this, 'init' ], 0 );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_styles' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
	}

	/**
	 * Initializes the plugin.
	 *
	 * This method is hooked to the 'init' action and is responsible for loading the plugin text domain.
	 */
	public function init(): void {
		$this->load_textdomain();
	}

	/**
	 * Loads the plugin text domain.
	 *
	 * This method is responsible for loading the translation files for the plugin.
	 */
	public function load_textdomain(): void {
		load_plugin_textdomain( 'gunita-plugin', false, plugin_basename( __DIR__ ) . '/languages' );
	}

	/**
	 * Enqueues the plugin styles.
	 *
	 * This method is hooked to the 'wp_enqueue_scripts' action and is responsible for enqueueing the plugin styles.
	 */
	public function enqueue_styles(): void {
		wp_enqueue_style(
			'gunita-plugin-public',
			Asset::get_file_url( 'public', 'css' ),
			Asset::get_file_dependencies( 'public' ),
			Asset::get_file_version( 'public' )
		);
	}

	/**
	 * Enqueues the plugin scripts.
	 *
	 * This method is hooked to the 'wp_enqueue_scripts' action and is responsible for enqueueing the plugin scripts.
	 */
	public function enqueue_scripts(): void {
		wp_enqueue_script(
			'gunita-plugin-public',
			Asset::get_file_url( 'public', 'js' ),
			Asset::get_file_dependencies( 'public' ),
			Asset::get_file_version( 'public' ),
			true
		);
	}
}
