const mix = require('laravel-mix');


mix
    .react('resources/js/app.js', 'public/js')
    .sass('resources/scss/style.scss', 'public/css/styles.css')
    .sass('resources/sass/app.scss', 'public/css/app.css')
    .sass('resources/sass/design.scss', 'public/css/design.css')
    .styles([
        'resources/css/*.css',
        'resources/Doc/css/*.css',
        'resources/Doc/syntax-highlighter/styles/*.css',
        'public/css/design.css',
    ], 'public/css/styles.css')
    .copyDirectory('resources/Doc/img', 'public/img')
    .copyDirectory('resources/Doc/fonts', 'public/fonts')
    .copyDirectory('resources/fonts', 'public/fonts');

