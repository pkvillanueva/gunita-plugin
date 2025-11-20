<?php
/**
 * Singleton trait for ensuring single instance pattern.
 *
 * Provides a simple implementation of the Singleton design pattern,
 * ensuring only one instance of a class exists throughout the application lifecycle.
 *
 * @package GunitaPlugin
 */

namespace GunitaPlugin\Traits;

defined( 'ABSPATH' ) || exit;

/**
 * Singleton trait.
 *
 * Use this trait in classes that should only have a single instance.
 * The trait automatically calls the setup() method if it exists on the class.
 *
 * Example usage:
 * ```php
 * class MyClass {
 *     use Singleton;
 *
 *     protected function setup() {
 *         // Initialization code here
 *     }
 * }
 *
 * $instance = MyClass::instance();
 * ```
 */
trait Singleton {

	/**
	 * Holds the single instance of the class.
	 *
	 * @var static|null
	 */
	protected static $instance = null;

	/**
	 * Retrieves the single instance of the class.
	 *
	 * Creates a new instance if one doesn't exist, otherwise returns the existing instance.
	 * Automatically invokes the setup() method after instantiation if the method exists.
	 *
	 * @return static The singleton instance.
	 */
	public static function instance() {
		if ( null === static::$instance ) {
			static::$instance = new static();

			if ( method_exists( static::$instance, 'setup' ) ) {
				static::$instance->setup();
			}
		}

		return static::$instance;
	}

	/**
	 * Prevents cloning of the singleton instance.
	 *
	 * @return void
	 */
	protected function __clone() {
		_doing_it_wrong(
			__FUNCTION__,
			esc_html__( 'Cloning singleton instances is not allowed.', 'gunita-plugin' ),
			'0.0.1'
		);
	}

	/**
	 * Prevents unserialization of the singleton instance.
	 *
	 * @return void
	 */
	public function __wakeup() {
		_doing_it_wrong(
			__FUNCTION__,
			esc_html__( 'Unserializing singleton instances is not allowed.', 'gunita-plugin' ),
			'0.0.1'
		);
	}
}
