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
 

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

*/
mix.combine('assets/bootstrap/compiler/bootstrap.css',
            'assets/bootstrap/compiler/style.css'
, 'public/css/style.css');

mix.combine('assets/js/popper.js/dist/umd/popper.js',
            'assets/js/bootstrap.js',
            'assets/js/jquery/dist/jquery.js',
            'assets/js/jquery/dist/jquery-3.1.1.min.js',
            'assets/js/jquery/dist/app.js'
  , 'public/js/apps.js');