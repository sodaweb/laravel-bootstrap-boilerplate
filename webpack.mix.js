let mix = require('laravel-mix');
require('laravel-mix-purgecss');

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

mix.sass('resources/assets/sass/app.scss', 'public/css')
   .sass('resources/assets/sass/custom.scss', 'public/css')
   .sass('resources/assets/sass/materialize.scss', 'public/css')
   .sass('resources/assets/sass/admin.scss', 'public/css');

mix.js([
  'resources/assets/js/app.js',
], 'public/js/app-mixed.js')

mix.scripts([
    'public/js/app-mixed.js',
    'node_modules/bootstrap/dist/js/bootstrap.js',
    // 'resources/assets/js/jquery.mask.js',
    // 'resources/assets/js/slick.min.js',
    'resources/assets/js/custom.js',
  ], 'public/js/all.js')
   .js([
    'public/js/app-mixed.js',
    'resources/assets/js/materialize.min.js',
    'resources/assets/js/admin.js',
  ], 'public/js/admin.js');

mix.styles([
    'public/css/app.css',
    'public/css/custom.css',
    // 'public/css/slick.css',
    // 'public/css/slick-theme.css',
], 'public/css/all.css');

mix.styles([
    'public/css/materialize.css',
    'public/css/admin.css'
], 'public/css/admin.css')
.purgeCss();

// mix.version();

mix.version('public/images/');

// mix.autoload({});