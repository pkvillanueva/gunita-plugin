<?php
/**
 * The Dashboard class for the GunitaPlugin plugin admin area.
 *
 * This class is responsible for creating and rendering the GunitaPlugin plugin's admin dashboard page.
 *
 * @package GunitaPlugin
 */

namespace GunitaPlugin\Admin;

defined( 'ABSPATH' ) || exit;

/**
 * Class Dashboard.
 *
 * This class provides the functionality for the admin dashboard page for the GunitaPlugin plugin.
 */
class Dashboard {

	/**
	 * Render the GunitaPlugin Dashboard page.
	 *
	 * This static method outputs the HTML for the admin dashboard page.
	 */
	public static function render(): void {
		?>
		<div class="ga-bg-black">
			<h1 class="ga-text-lg"><?php esc_html_e( 'Dashboard', 'gunita-plugin' ); ?></h1>
		</div>
		<?php
	}
}
