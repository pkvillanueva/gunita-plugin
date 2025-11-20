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
		// Intentionally left empty.
	}
}
