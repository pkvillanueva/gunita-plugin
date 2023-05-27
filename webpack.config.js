const { resolve } = require( 'path' );
const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const { getWebpackEntryPoints } = require( '@wordpress/scripts/utils' );

module.exports = {
	...defaultConfig,
	entry: {
		...getWebpackEntryPoints(),
	},
	output: {
		path: resolve( process.cwd(), 'build' ),
	},
};
