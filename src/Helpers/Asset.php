<?php

namespace GunitaPlugin\Helpers;

use GunitaPlugin\Traits\Singleton;

/**
 * Class Asset
 *
 * This class provides helper functions for working with assets.
 */
class Asset {

	use Singleton;

	/**
	 * Get the path to the asset.
	 *
	 * @param string $file The file name.
	 * @param string $ext The file extension.
	 */
	public static function get_file_path( string $file, string $ext = '' ): string {
		return GUNITA_PLUGIN_PATH . '/build/' . $file . ( $ext ? '.' . $ext : '' );
	}

	/**
	 * Get the URL to the asset.
	 *
	 * @param string $file The file name or file name with extension.
	 * @param string $ext The file extension.
	 */
	public static function get_file_url( string $file, string $ext = '' ): string {
		return GUNITA_PLUGIN_URL . '/build/' . $file . ( $ext ? '.' . $ext : '' );
	}

	/**
	 * Get the asset registry.
	 *
	 * @param string $file The file name without extension.
	 * @return array{version?: string, dependencies?: array<string>} The asset registry.
	 */
	public static function get_file_asset( string $file ): array {
		$asset_file = $file . '.asset.php';

		// Check if the asset registry file exists.
		if ( ! is_readable( self::get_file_path( $asset_file ) ) ) {
			wp_die( 'Could not find asset registry for <code>' . esc_html( $asset_file ) . '</code>. Build the assets by running <code>npm run build</code> command in the root of the project.', 'File not found' );
		}

		return require self::get_file_path( $asset_file );
	}

	/**
	 * Get the version of the asset.
	 *
	 * @param string $file The file name without extension.
	 * @return string The version of the asset.
	 */
	public static function get_file_version( string $file ): string {
		return self::get_file_asset( $file )['version'] ?? GUNITA_PLUGIN_VERSION;
	}

	/**
	 * Get the dependencies of the asset.
	 *
	 * @param string $file The file name without extension.
	 * @return array<string> The dependencies of the asset.
	 */
	public static function get_file_dependencies( string $file ): array {
		return self::get_file_asset( $file )['dependencies'] ?? [];
	}
}
