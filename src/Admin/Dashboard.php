<?php

namespace GunitaPlugin\Admin;

/**
 * Class Dashboard
 *
 * This class is responsible for rendering the dashboard page.
 */
class Dashboard {

	/**
	 * Renders the dashboard page.
	 *
	 * This function outputs the HTML markup for the dashboard page.
	 */
	public static function render(): void {
		?>
		<div class="ga-bg-black">
			<h1 class="ga-text-lg"><?php esc_html_e( 'Dashboard', 'gunita-plugin' ); ?></h1>
		</div>
		<?php
	}
}
