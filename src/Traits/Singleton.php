<?php

namespace GunitaPlugin\Traits;

defined( 'ABSPATH' ) || exit;

/**
 * Trait Singleton
 *
 * This trait provides a way to implement the singleton design pattern in PHP classes.
 */
trait Singleton {

	/**
	 * The instance of the class.
	 *
	 * @var self|null
	 */
	protected static $instance = null;

	/**
	 * Get the instance of the class.
	 *
	 * If the instance does not exist, it will be created.
	 *
	 * @return self The instance of the class.
	 */
	public static function instance(): self {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Prevent cloning of the object.
	 */
	public function __clone() {}

	/**
	 * Prevent unserializing of the object.
	 */
	public function __wakeup() {}
}
