module.exports = {
	// https://cn.eslint.org/docs/user-guide/configuring 避免一直找
	"root": true,
	parser: '@typescript-eslint/parser',
	settings: {
		react: {
				version: 'detect'
		}
	},
	parserOptions: {
			project: './tsconfig.json',
	},
	plugins: ['@typescript-eslint'],
	extends: [
		'plugin:react/recommended',
		'plugin:@typescript-eslint/recommended',
	],
	rules: {
		// Overwrite rules specified from the extended configs e.g.
		"@typescript-eslint/explicit-function-return-type": "off",
	}
}
