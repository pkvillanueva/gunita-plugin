<?php
/**
 * Main plugin setup class.
 *
 * Handles public-facing functionality including text domain loading
 * and asset enqueueing.
 *
 * @package GunitaPlugin
 */

namespace GunitaPlugin;

use GunitaPlugin\Asset;
use GunitaPlugin\Traits\Singleton;

/**
 * Class Setup
 *
 * This class handles the setup of the Gunita Plugin public-facing functionality.
 */
class Setup {

	use Singleton;

	/**
	 * Setup method called automatically after instantiation.
	 *
	 * This method is called by the Singleton trait and registers
	 * all WordPress action and filter hooks.
	 *
	 * @return void
	 */
	protected function setup(): void {
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
		Asset::enqueue_style( 'gunita-plugin-public', 'public' );
	}

	/**
	 * Enqueues the plugin scripts.
	 *
	 * This method is hooked to the 'wp_enqueue_scripts' action and is responsible for enqueueing the plugin scripts.
	 */
	public function enqueue_scripts(): void {
		Asset::enqueue_script( 'gunita-plugin-public', 'public' );
	}
}
