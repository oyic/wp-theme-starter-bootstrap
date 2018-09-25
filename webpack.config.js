const path = require('path');
// const webpack = require('webpack');
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
		
		// extract css into dedicated file
	    new MiniCssExtractPlugin({
	      filename: 'css/app.css',
	      // publicPath:  "/dist"
	    }),
	    // new webpack.ProvidePlugin({
     //            $: "jquery",
     //            jQuery: "jquery",
     //            "window.jQuery": "jquery"
     //        })
     new WebpackNotifierPlugin({title:'Compiling..., fool!',
						excludeWarnings: true,
						alwaysNotify:true,
						contentImage: path.join(__dirname, 'wp-logo.png')}),

	],
	optimization:{
		
		minimizer:[
				new OptimizeCSSAssetsPlugin({}),
				new UglifyJSPlugin({}),
			]	
	}
}