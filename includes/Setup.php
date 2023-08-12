<?php
/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and public-facing site hooks.
 *
 * @package GunitaPlugin
 */

namespace GunitaPlugin;

use GunitaPlugin\Traits\Singleton;

defined( 'ABSPATH' ) || exit;

/**
 * Class plugin setup.
 *
 * Main class for the GunitaPlugin plugin, responsible for initializing and orchestrating the other parts of the plugin.
 */
class Setup {

	use Singleton;

	/**
	 * Setup constructor.
	 *
	 * Initializes the plugin by setting up the constants, loading all the necessary files and hooking up all necessary actions/filters.
	 */
	private function __construct() {
		$this->includes();
		$this->init_hooks();
	}

	/**
	 * Include any required files.
	 *
	 * Loads any extra files/classes that this plugin needs.
	 */
	public function includes(): void {}

	/**
	 * Hook into actions and filters.
	 *
	 * Adds all the hooks that this plugin relies on.
	 */
	private function init_hooks(): void {
		add_action( 'init', [ $this, 'init' ], 0 );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_styles' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
	}

	/**
	 * Initialize Setup when WordPress Initialises.
	 *
	 * Further initializes the plugin once WordPress has finished loading but before any headers are sent.
	 */
	public function init(): void {
		$this->load_textdomain();
	}

	/**
	 * Load localization files.
	 *
	 * Loads the text domain for this plugin, enabling translation of its messages.
	 */
	public function load_textdomain(): void {
		load_plugin_textdomain( 'gunita-plugin', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
	}

	/**
	 * Enqueue styles.
	 *
	 * Adds the plugin's styles to the queue of styles to be loaded with the page.
	 */
	public function enqueue_styles(): void {}

	/**
	 * Enqueue scripts.
	 *
	 * Adds the plugin's scripts to the queue of scripts to be loaded with the page.
	 */
	public function enqueue_scripts(): void {}
}
