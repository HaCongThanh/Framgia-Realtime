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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

// User --------
mix.styles('resources/css/user/style.css', 'public/css/user/style.css');

mix.copy('resources/js/user/app.js', 'public/js/user/app.js');
// --------------

// Admin --------
// mix.copy('resources/js/admin/dataTables.bootstrap4.min.js', 'public/js/admin/dataTables.bootstrap4.min.js');
// ---------------

mix.version();
