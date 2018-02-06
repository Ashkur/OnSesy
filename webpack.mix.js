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
/* Back */
mix.combine(['resources/assets/js/materialize.js',
            

], 'public/js/app.js');


mix.combine(['resources/assets/css/materialize.css',
              'resources/assets/css/estilo.css',
              'resources/assets/css/bootstrap.min.css',
              'resources/assets/css/demo.css',
              'resources/assets/css/material-dashboard.css'
            ], 
              'public/css/app.css');


/* front */
mix.combine(['resources/assets/bootstrap/compiler/bootstrap.css',
            'resources/assets/bootstrap/compiler/style.css']
, 'public/css/style.css');

mix.combine(['resources/assets/js/popper.js/dist/umd/popper.js',
            'resources/assets/js/bootstrap.js',
            'resources/assets/js/jquery/dist/jquery.js',
            'resources/assets/js/jquery/dist/jquery-3.1.1.min.js',
            'resources/assets/js/jquery/dist/app.js']
  , 'public/js/apps.js');
