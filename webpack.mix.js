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

// Admin
mix.styles('resources/css/admin/animate.min.css', 'public/css/admin/animate.min.css');
mix.styles('resources/css/admin/app.css', 'public/css/admin/app.css');
mix.styles('resources/css/admin/bootstrap.css', 'public/css/admin/bootstrap.css');
mix.styles('resources/css/admin/font-awesome.min.css', 'public/css/admin/font-awesome.min.css');
mix.styles('resources/css/admin/materialdesignicons.min.css', 'public/css/admin/materialdesignicons.min.css');
mix.styles('resources/css/admin/pace-theme-minimal.css', 'public/css/admin/pace-theme-minimal.css');
mix.styles('resources/css/admin/perfect-scrollbar.min.css', 'public/css/admin/perfect-scrollbar.min.css');
mix.styles('resources/css/admin/themify-icons.css', 'public/css/admin/themify-icons.css');
mix.styles('resources/css/admin/jasny-bootstrap.min.css', 'public/css/admin/jasny-bootstrap.min.css');
mix.styles('resources/css/admin/summernote-bs4.css', 'public/css/admin/summernote-bs4.css');
mix.styles('resources/css/admin/selectize.default.css', 'public/css/admin/selectize.default.css');
mix.styles('resources/css/admin/dataTables.bootstrap4.min.css', 'public/css/admin/dataTables.bootstrap4.min.css');

mix.copy('resources/js/admin/app.min.js', 'public/js/admin/app.min.js');
mix.copy('resources/js/admin/default.js', 'public/js/admin/default.js');
mix.copy('resources/js/admin/vendor.js', 'public/js/admin/vendor.js');
mix.copy('resources/js/admin/Chart.min.js', 'public/js/admin/Chart.min.js');
mix.copy('resources/js/admin/jquery.sparkline.min.js', 'public/js/admin/jquery.sparkline.min.js');
mix.copy('resources/js/admin/data-table.js', 'public/js/admin/data-table.js');
mix.copy('resources/js/admin/form-elements.js', 'public/js/admin/form-elements.js');
mix.copy('resources/js/admin/jasny-bootstrap.min.js', 'public/js/admin/jasny-bootstrap.min.js');
mix.copy('resources/js/admin/summernote-bs4.min.js', 'public/js/admin/summernote-bs4.min.js');
mix.copy('resources/js/admin/selectize.min.js', 'public/js/admin/selectize.min.js');
mix.copy('resources/js/admin/jquery.dataTables.js', 'public/js/admin/jquery.dataTables.js');
mix.copy('resources/js/admin/dataTables.bootstrap4.min.js', 'public/js/admin/dataTables.bootstrap4.min.js');
// End -------

mix.version();
