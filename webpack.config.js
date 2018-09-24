const path = require('path');
const WebpackNotifierPlugin = require('webpack-notifier');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');
const devMode = process.env.NODE_ENV !== 'production'
module.exports = {
	entry:['./src/js/app.js','./src/scss/app.scss'],
	output:{
		filename:'js/app.js',
		path:path.resolve(__dirname,'dist')
	},
	module:{
		rules:[
			{
				test: /\.js$/,
		        exclude: /node_modules/,
		        use: {
		          loader: "babel-loader",
		          options: {
			          presets: ['@babel/preset-env']
			        }
				}
			},
			// test for sass
			{

		         test: /\.(sass|scss)$/,
        		 use: [MiniCssExtractPlugin.loader, 'css-loader','postcss-loader', 'sass-loader']
		     
			}				
		]
	},
	plugins:[
		new WebpackNotifierPlugin({title:'Yo Successful Build, fool!',
						excludeWarnings: true,
						contentImage: path.join(__dirname, 'wp-logo.png')}),
		// extract css into dedicated file
    new MiniCssExtractPlugin({
      filename: 'css/app.css',
      // publicPath:  "/dist"
    })

	],
	optimization:{
		
		minimizer:[
				new OptimizeCSSAssetsPlugin({}),
				new UglifyJSPlugin({}),
			]	
	}
}