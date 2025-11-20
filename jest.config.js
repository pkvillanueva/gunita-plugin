/**
 * Jest configuration for WordPress plugin
 *
 * This configuration uses @wordpress/scripts preset which includes:
 * - TypeScript support
 * - React support
 * - Code coverage
 * - Proper mocking for WordPress globals
 *
 * @package GunitaPlugin
 */

module.exports = {
	...require( '@wordpress/scripts/config/jest-unit.config.js' ),
	testMatch: [
		'**/tests/js/**/*.test.[jt]s?(x)',
	],
	collectCoverageFrom: [
		'assets/js/**/*.{js,jsx,ts,tsx}',
		'!assets/js/**/*.test.{js,jsx,ts,tsx}',
		'!**/node_modules/**',
		'!**/vendor/**',
		'!**/build/**',
	],
	coverageDirectory: 'coverage',
	coverageReporters: [ 'html', 'text' ],
	moduleNameMapper: {
		'\\.(css|scss)$': 'identity-obj-proxy',
	},
};
