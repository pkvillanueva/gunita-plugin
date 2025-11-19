<?php
/**
 * Plugin uninstallation handler.
 *
 * Handles cleanup tasks that need to run when the plugin is uninstalled.
 *
 * @package GunitaPlugin
 */

namespace GunitaPlugin;

/**
 * Class Uninstall
 *
 * This class handles the uninstallation process for the GunitaPlugin.
 */
class Uninstall {


	/**
	 * Run uninstallation tasks.
	 *
	 * This method is called when the plugin is uninstalled.
	 * Add any cleanup tasks like removing database tables, deleting options, etc.
	 *
	 * @return void
	 */
	public static function uninstall(): void {
		// Clean up plugin data on uninstall.
		// Example: Remove custom database tables, delete options, etc.
		// Note: Be careful with data deletion. Consider if users might want to keep data
		// when reinstalling the plugin. Some plugins provide an option for this.
	}
}
