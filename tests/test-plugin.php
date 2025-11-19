<?php
/**
 * Class Test_Plugin
 *
 * Minimal test to verify the plugin version constant is defined and correct.
 * This demonstrates the test framework is working without testing WordPress itself.
 *
 * @package GunitaPlugin
 */

/**
 * Plugin version test case.
 */
class Test_Plugin extends WP_UnitTestCase {

	/**
	 * Test that the plugin version constant matches the plugin header version.
	 */
	public function test_plugin_version() {
		$this->assertTrue( defined( 'GUNITA_PLUGIN_VERSION' ) );

		// Get the version from the plugin file header
		$plugin_file = dirname( __DIR__ ) . '/plugin.php';
		$plugin_data = get_plugin_data( $plugin_file );

		$this->assertEquals( $plugin_data['Version'], GUNITA_PLUGIN_VERSION );
	}
}
