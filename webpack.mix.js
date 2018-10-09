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

// Coming Soon
mix.styles('resources/css/comingsoon/bootstrap.min.css', 'public/css/comingsoon/bootstrap.min.css');
mix.styles('resources/css/comingsoon/revolution-slider.css', 'public/css/comingsoon/revolution-slider.css');
mix.styles('resources/css/comingsoon/flipclock.css', 'public/css/comingsoon/flipclock.css');
mix.styles('resources/css/comingsoon/style.css', 'public/css/comingsoon/style.css');
mix.styles('resources/css/comingsoon/bootstrap-margin-padding.css', 'public/css/comingsoon/bootstrap-margin-padding.css');
mix.styles('resources/css/comingsoon/responsive.css', 'public/css/comingsoon/responsive.css');

mix.copy('resources/js/comingsoon/jquery.js', 'public/js/comingsoon/jquery.js');
mix.copy('resources/js/comingsoon/bootstrap.min.js', 'public/js/comingsoon/bootstrap.min.js');
mix.copy('resources/js/comingsoon/revolution.min.js', 'public/js/comingsoon/revolution.min.js');
mix.copy('resources/js/comingsoon/flipclock.js', 'public/js/comingsoon/flipclock.js');
mix.copy('resources/js/comingsoon/jquery-ui.min.js', 'public/js/comingsoon/jquery-ui.min.js');
mix.copy('resources/js/comingsoon/script.js', 'public/js/comingsoon/script.js');
// End -------

// Hotel Alpha
mix.styles('resources/css/hotel-alpha/bootstrap.min.css', 'public/css/hotel-alpha/bootstrap.min.css');
mix.styles('resources/css/hotel-alpha/animate.min.css', 'public/css/hotel-alpha/animate.min.css');
mix.styles('resources/css/hotel-alpha/bootstrap-submenu.css', 'public/css/hotel-alpha/bootstrap-submenu.css');
mix.styles('resources/css/hotel-alpha/bootstrap-select.min.css', 'public/css/hotel-alpha/bootstrap-select.min.css');
mix.styles('resources/css/hotel-alpha/jquery.mCustomScrollbar.css', 'public/css/hotel-alpha/jquery.mCustomScrollbar.css');
mix.styles('resources/css/hotel-alpha/bootstrap-datepicker.min.css', 'public/css/hotel-alpha/bootstrap-datepicker.min.css');
mix.styles('resources/css/hotel-alpha/style.css', 'public/css/hotel-alpha/style.css');
mix.styles('resources/css/hotel-alpha/blue-light-2.css', 'public/css/hotel-alpha/blue-light-2.css');
mix.styles('resources/css/hotel-alpha/ie10-viewport-bug-workaround.css', 'public/css/hotel-alpha/ie10-viewport-bug-workaround.css');

mix.copy('resources/js/hotel-alpha/ie-emulation-modes-warning.js', 'public/js/hotel-alpha/ie-emulation-modes-warning.js');
mix.copy('resources/js/hotel-alpha/jquery-2.2.0.min.js', 'public/js/hotel-alpha/jquery-2.2.0.min.js');
mix.copy('resources/js/hotel-alpha/bootstrap.min.js', 'public/js/hotel-alpha/bootstrap.min.js');
mix.copy('resources/js/hotel-alpha/bootstrap-submenu.js', 'public/js/hotel-alpha/bootstrap-submenu.js');
mix.copy('resources/js/hotel-alpha/jquery.mb.YTPlayer.js', 'public/js/hotel-alpha/jquery.mb.YTPlayer.js');
mix.copy('resources/js/hotel-alpha/wow.min.js', 'public/js/hotel-alpha/wow.min.js');
mix.copy('resources/js/hotel-alpha/bootstrap-select.min.js', 'public/js/hotel-alpha/bootstrap-select.min.js');
mix.copy('resources/js/hotel-alpha/jquery.easing.1.3.js', 'public/js/hotel-alpha/jquery.easing.1.3.js');
mix.copy('resources/js/hotel-alpha/jquery.scrollUp.js', 'public/js/hotel-alpha/jquery.scrollUp.js');
mix.copy('resources/js/hotel-alpha/jquery.mCustomScrollbar.concat.min.js', 'public/js/hotel-alpha/jquery.mCustomScrollbar.concat.min.js');
mix.copy('resources/js/hotel-alpha/jquery.filterizr.js', 'public/js/hotel-alpha/jquery.filterizr.js');
mix.copy('resources/js/hotel-alpha/bootstrap-datepicker.min.js', 'public/js/hotel-alpha/bootstrap-datepicker.min.js');
mix.copy('resources/js/hotel-alpha/app.js', 'public/js/hotel-alpha/app.js');
mix.copy('resources/js/hotel-alpha/ie10-viewport-bug-workaround.js', 'public/js/hotel-alpha/ie10-viewport-bug-workaround.js');
// End -------

// Applicator
mix.styles('resources/css/applicator/app.css', 'public/css/applicator/app.css');
// End ------

mix.version();