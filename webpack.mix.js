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

  mix.styles([
      'public/vendors/moment/min/moment.min.js',
      'public/vendors/bootstrap-daterangepicker/daterangepicker.js',
      'public/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
      'public/vendors/bootstrap/dist/css/bootstrap.min.css',
      'public/vendors/nprogress/nprogress.css',
      'public/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css',
      'public/vendors/bootstrap/dist/css/bootstrap.min.css',
      'public/vendors/nprogress/nprogress.css',
      'public/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css',
      'public/build/css/custom.min.css',
      'public/vendors/font-awesome/css/font-awesome.min.css', 
  ],  'public/css/all.css');
 mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('public/vendors/font-awesome/scss/font-awesome.scss', 'public/css');
 mix.scripts([
        'js/jquery-ui.min.js',
        'public/vendors/jquery/dist/jquery.min.js',
        'public/vendors/bootstrap/dist/js/bootstrap.min.js',
        'public/vendors/fastclick/lib/fastclick.js',
        'public/vendors/nprogress/nprogress.js',
        'public/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js',
        'public/build/js/custom.min.js',
        'public/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js'
    ], 'public/js/all.js');