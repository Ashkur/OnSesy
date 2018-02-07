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

/* sistema Site */
mix.combine([
  'resources/assets/css/bootstrap.css',
  'resources/assets/css/bootstrap.min.css',
  'resources/assets/css/main.css',
], 'public/css/style.css');

mix.combine([
  'resources/assets/js/jquery/dist/jquery.js',
  'resources/assets/js/jquery/dist/app.js',
  'resources/assets/js/jquery/dist/jquery-3.1.1.min.js',
  'resources/assets/js/popper.js/dist/umd/popper.js',
  'resources/assets/bootstrap/dist/js/bootstrap.js',
  
], 'public/js/apps.js');




/* sistema administrativo */
mix.combine([
  'resources/assets/css/bootstrap.css',
], 'public/css/app.css');

mix.combine([
  'resources/assets/js/jquery-3.3.1.min.js',
  'resources/assets/js/bootstrap-min.js',
], 'public/js/app.js');
