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
  'resources/assets/css/main.css',
  'resources/assets/css/material-dashboard.css',
  'resources/assets/css/util.css',
], 'public/css/app.css');

mix.combine([
  'resources/assets/js/jquery-3.3.1.min.js',
  'resources/assets/js/bootstrap-min.js',
], 'public/js/app.js');
