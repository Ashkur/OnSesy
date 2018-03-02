let mix = require('laravel-mix');

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

mix.combine([
  'resources/assets/css/bootstrap.css',
  'resources/assets/css/style.css',
  'resources/assets/css/ionicons.min.css'
], 'public/css/app.css');

mix.combine([
  'resources/assets/js/bootstrap-min.js',
  'resources/assets/js/login.js',
], 'public/js/app.js');

mix.combine([
  'resources/assets/js/jquery-3.3.1.min.js',
  'resources/assets/js/jquery.inputmask.js',
], 'public/js/funcoes.js');

