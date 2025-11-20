<?php
/**
 * Plugin installation handler.
 *
 * Handles tasks that need to run when the plugin is activated.
 *
 * @package GunitaPlugin
 */

namespace GunitaPlugin;

/**
 * Class Install
 *
 * This class handles the installation process of the GunitaPlugin.
 */
class Install {

	/**
	 * Run installation tasks.
	 *
	 * This method is called when the plugin is activated.
	 * Add any setup tasks like creating database tables, setting default options, etc.
	 *
	 * @return void
	 */
	public static function activate(): void {
		flush_rewrite_rules();
	}
}
