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

mix.scripts([
    'resources/js/vendor/*.js',
    'resources/js/*.js',
    'resources/js/app.js',
    'resources/Doc/js/*.js',
    'resources/Doc/syntax-highlighter/scripts/*.js'
], 'public/js/app.js')
    .sass('resources/scss/style.scss', 'public/css/styles.css')
    .sass('resources/sass/app.scss', 'public/css/styles.css')
    .styles([
        'resources/css/*.css',
        'resources/Doc/css/*.css',
        'resources/Doc/syntax-highlighter/styles/*.css'
    ], 'public/css/styles.css')
    .copyDirectory('resources/Doc/img', 'public/img')
    .copyDirectory('resources/Doc/fonts', 'public/fonts')
    .copyDirectory('resources/fonts', 'public/fonts');
