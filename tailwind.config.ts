import type { Config } from 'tailwindcss';

export default {
	prefix: 'ga-',
	content: [ './admin/**/*.php', './public/**/*.php', './includes/**/*.php' ],
	theme: {
		extend: {},
	},
	plugins: [],
} satisfies Config;
