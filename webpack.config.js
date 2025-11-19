/**
 * WordPress Dependencies
 */
const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );

/**
 * Custom webpack configuration
 *
 * Extends the default @wordpress/scripts webpack config
 * to use custom entry points.
 */
module.exports = {
	...defaultConfig,
	entry: {
		admin: './assets/js/admin/index.ts',
		public: './assets/js/frontend/index.ts',
	},
};
