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
mix.styles('resources/css/user/custom.css', 'public/css/user/custom.css');

mix.copy('resources/js/user/app.js', 'public/js/user/app.js');
mix.copy('resources/js/user/booking.js', 'public/js/user/booking.js');
// --------------

// Admin --------
mix.js('resources/js/admin/role.js', 'public/js/admin/role.js');
mix.js('resources/js/admin/permission_role.js', 'public/js/admin/permission_role.js');
// ---------------

mix.version();
