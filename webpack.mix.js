const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.scripts([
		'resources/assets/jquery/jquery.min.js',
		'resources/assets/bootstrap/dist/js/bootstrap.min.js',
		'resources/assets/jquery.easing/js/jquery.easing.min.js',
		'resources/assets/aos/dist/aos.js'
		])
   .styles([
   		'resources/assets/bootstrap/dist/css/bootstrap.min.css',
   		'resources/assets/font-awesome/css/font-awesome.min.css',
   		'resources/assets/aos/dist/aos.css'
   		]);
