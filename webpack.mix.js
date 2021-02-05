const mix = require('laravel-mix');

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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');

mix.js('resources/js/app.js', 'public/js')
	.js('resources/js/second.js', 'public/js')
	.js('resources/js/questFo.js', 'public/js')
	.js('resources/js/answerFo.js', 'public/js')
	.js('resources/js/ViewMaResult.js', 'public/js')
	.js('resources/js/ViewMaChartsAndComments.js', 'public/js')
	.js('resources/js/NewTraining.js', 'public/js')
	.js('resources/js/CompareBanksByServices.js', 'public/js')
   	.sass('resources/sass/app.scss', 'public/css');
