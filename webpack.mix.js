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

mix.combine(['resources/assets/js/materialize.js',
            

], 'public/js/app.js');


mix.combine(['resources/assets/css/materialize.css',
              'resources/assets/css/estilo.css'/*,
              'resources/assets/css/bootstrap.min.css',
              'resources/assets/css/demo.css',
              'resources/assets/css/material-dashboard.css'*/
            ], 
              'public/css/app.css');


