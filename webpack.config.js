const path = require('path')
const webpack = require('webpack')
const WebpackNotifierPlugin = require('webpack-notifier')
const MiniCssExtractPlugin = require("mini-css-extract-plugin")
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin")
const UglifyJSPlugin = require('uglifyjs-webpack-plugin')
const ImageminPlugin = require('imagemin-webpack-plugin').default
const imageminMozjpeg = require('imagemin-mozjpeg')
const CleanDistFolder = require('clean-webpack-plugin')
const glob = require('glob')


const devMode = process.env.NODE_ENV !== 'production'
module.exports = {
	entry:['./src/js/app.js','./src/scss/app.scss'],
	output:{
		filename:'js/bundle.[hash].js',
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
		          exclude: /node_modules/,
        		 use: [MiniCssExtractPlugin.loader, 'css-loader','postcss-loader', 'sass-loader'] 
			},
			// test for sass
			{
		         test: /\.(ttf|eot|woff)$/,
				 loader: 'file-loader',
				  options: {
				    name: 'fonts/[name].[ext]',
				   
				  }
			},
			{
				test:/\.(gif|svg|jpg|png)$/,
				use:[
						{
							loader: 'file-loader',
							options:{
								name: "[name].[ext]",
								outputPath: 'images/',
								context: '/',	
							}
						},
						{
							loader:'imagemin-loader',
							options:{
								 quality: '50-60',
							}
						}

				]
			},						
		]
	},
	plugins:[
		
		// extract css into dedicated file
	    new MiniCssExtractPlugin({
	      filename: 'css/app.[hash].css',
	      // publicPath:  "/dist"
	    }),
	    new webpack.ProvidePlugin({
                $: "jquery",
                jQuery: "jquery",
                "window.jQuery": "jquery"
            }),

     new WebpackNotifierPlugin({title:'Compiling..., fool!',
						excludeWarnings: true,
						alwaysNotify:true,
						contentImage: path.join(__dirname, 'wp-logo.png')}),
     new ImageminPlugin({
      externalImages: {
        context: 'src', // Important! This tells the plugin where to "base" the paths at
        sources: glob.sync('src/images/**/*.*'),
        destination: 'dist/images',
        fileName: '[name].[ext]' // (filePath) => filePath.replace('jpg', 'webp') is also possible
      },
    }),
     new CleanDistFolder(['./dist/js/*','./dist/css/*'],{ verbose: false })

	],
	optimization:{
		
		minimizer:[
				new OptimizeCSSAssetsPlugin({}),
				new UglifyJSPlugin({}),
			]	
	}
}