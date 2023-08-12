<?php
/**
 * The Singleton trait for the plugin.
 *
 * This trait encapsulates the Singleton design pattern, ensuring that only one instance of a class that uses this trait can exist.
 *
 * @package GunitaPlugin
 */

namespace GunitaPlugin\Traits;

defined( 'ABSPATH' ) || exit;

/**
 * Trait Singleton.
 *
 * A Singleton trait that ensures only one instance of the class using this trait can exist.
 */
trait Singleton {

	/**
	 * The single instance of the class that uses this trait.
	 * Singleton design pattern is used to ensure that only one instance of the class exists.
	 *
	 * @var mixed|null
	 */
	protected static $instance = null;

	/**
	 * Provides a way to get the single instance of the class using this trait.
	 *
	 * If an instance hasn't been created yet, it creates one and then returns it.
	 * If an instance has already been created, it simply returns the existing instance.
	 *
	 * @static
	 * @return mixed - The single instance of the class.
	 */
	public static function get_instance(): mixed {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Public clone method to prevent cloning of the instance.
	 *
	 * The singleton pattern doesn't allow for the cloning of an instance.
	 * Therefore, we make __clone() public so it can't be used.
	 */
	public function __clone() {}

	/**
	 * Public unserialize method to prevent unserializing of the instance.
	 *
	 * The singleton pattern doesn't allow for an instance to be unserialized from a string.
	 * Therefore, we make __wakeup() public so it can't be used.
	 */
	public function __wakeup() {}
}
