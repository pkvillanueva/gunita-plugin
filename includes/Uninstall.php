<?php
/**
 * The Uninstall class for the plugin.
 *
 * This class is used to define the installation procedure of the plugin.
 * This includes setting up the database tables, default options, and other setup tasks.
 *
 * @package GunitaPlugin
 */

namespace GunitaPlugin;

use GunitaPlugin\Traits\Singleton;

defined( 'ABSPATH' ) || exit;

/**
 * Class Uninstall.
 */
class Uninstall {

	use Singleton;

	/**
	 * Uninstall constructor.
	 */
	private function __construct() {}
}
