/**
 * Webpack 5 build configuration for RRM theme assets.
 *
 * Bundles:
 *   src/theme-script.js    → dist/theme.js
 *   src/theme-script-c.js  → dist/theme-c.js
 *   src/salon-script.js    → dist/salon.js
 *   src/theme-style.scss   → dist/theme.css
 *   src/theme-style-c.scss → dist/theme-c.css
 */

const path                  = require( 'path' );
const MiniCssExtractPlugin  = require( 'mini-css-extract-plugin' );
const CssMinimizerPlugin    = require( 'css-minimizer-webpack-plugin' );
const TerserPlugin          = require( 'terser-webpack-plugin' );

const isProduction = process.env.NODE_ENV === 'production';

module.exports = {
	mode: isProduction ? 'production' : 'development',
	devtool: isProduction ? false : 'source-map',

	entry: {
		// JavaScript bundles
		theme:       './src/theme-script.js',
		'theme-c':   './src/theme-script-c.js',
		'salon':     './src/salon-script.js',
		// CSS bundles — extracted by MiniCssExtractPlugin (the stub .js is discarded)
		'theme-css':   './src/theme-style.scss',
		'theme-c-css': './src/theme-style-c.scss',
	},

	output: {
		filename: '[name].js',
		path: path.resolve( __dirname, 'dist' ),
		clean: false, // keep pre-built font/image files in dist
	},

	module: {
		rules: [
			// --- SCSS / CSS --------------------------------------------------
			{
				test: /\.(scss|css)$/,
				use: [
					MiniCssExtractPlugin.loader,
					{
						loader: 'css-loader',
						options: { sourceMap: ! isProduction, url: false },
					},
					{
						loader: 'postcss-loader',
						options: {
							postcssOptions: {
								plugins: [ require( 'autoprefixer' ) ],
							},
							sourceMap: ! isProduction,
						},
					},
					{
						loader: 'sass-loader',
						options: {
							implementation: require( 'sass' ),
							api: 'modern',
							sourceMap: ! isProduction,
							sassOptions: {
								// Allow @use / @import to resolve from node_modules
								loadPaths: [ path.resolve( __dirname, 'node_modules' ) ],
								// Silence @import deprecation warnings — not migrating to @use yet
								quietDeps: true,
								logger: { warn: () => {} },
							},
						},
					},
				],
			},
			// --- Fonts / images referenced in SCSS ---------------------------
			{
				test: /\.(woff2?|eot|ttf|otf|svg|png|jpg|gif)$/i,
				type: 'asset/resource',
				generator: {
					filename: '[hash][ext]',
				},
			},
		],
	},

	plugins: [
		new MiniCssExtractPlugin( {
			// Map CSS entry names to their output filenames:
			//   theme-css   → theme.css
			//   theme-c-css → theme-c.css
			filename: ( pathData ) => {
				const name = pathData.chunk.name;
				if ( name === 'theme-css' ) return 'theme.css';
				if ( name === 'theme-c-css' ) return 'theme-c.css';
				return '[name].css';
			},
		} ),
	],

	optimization: {
		minimizer: [
			new TerserPlugin( {
				terserOptions: {
					compress: { drop_console: isProduction },
					format:   { comments: false },
				},
				extractComments: false,
			} ),
			new CssMinimizerPlugin(),
		],
	},

	// jQuery is loaded globally by WordPress — don't bundle it.
	externals: {
		jquery: 'jQuery',
	},
};
