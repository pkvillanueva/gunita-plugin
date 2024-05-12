const { resolve } = require( 'path' );
const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );

module.exports = {
	...defaultConfig,
	entry: {
		admin: resolve( process.cwd(), 'client/admin/index.ts' ),
		public: resolve( process.cwd(), 'client/public/index.ts' ),
	},
	output: {
		path: resolve( process.cwd(), 'build' ),
	},
};
