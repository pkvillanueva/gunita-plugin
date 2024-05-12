import type { Config } from 'tailwindcss';

export default {
	prefix: 'ga-',
	content: [
		'./client/**/*.js',
		'./client/**/*.ts',
		'./src/**/*.php',
		'./includes/**/*.php',
	],
	theme: {
		extend: {},
	},
	plugins: [],
} satisfies Config;
