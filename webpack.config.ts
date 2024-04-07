const { resolve } = require( 'path' );
const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );

module.exports = {
	...defaultConfig,
	entry: {
		script: resolve( process.cwd(), 'src/index.ts' ),
	},
	output: {
		path: resolve( process.cwd(), 'build' ),
	},
};
