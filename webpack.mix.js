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

mix.disableNotifications();

mix.js('resources/assets/js/app.js', 'public/js')
   .sourceMaps();

mix.sass('resources/assets/sass/app.scss', 'public/css')
   .sourceMaps();

mix.sass('resources/assets/sass/vendor.scss', 'public/css')
   .sourceMaps();

mix.styles([
    'public/css/vendor.css',
    'node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css',
], 'public/css/vendor.css')
    .sourceMaps();

mix.copyDirectory('node_modules/tinymce/skins', 'public/tinymce_skins');
