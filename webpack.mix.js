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

mix.webpackConfig({
    stats: {
        children: true
    }
})

mix.js('resources/js/app.js', 'public/js')
    // .sass('resources/sass/app.scss', 'public/css')
    //.css("resources/css/bulma.css", "public/css")
    .sass("resources/sass/bulma/bulma.sass", "public/css/bulma.css")
    .sass("resources/sass/fonts.scss", "public/css/fonts.css")
    .sass("resources/sass/app.scss", "public/css/app.css")
    .css("resources/css/colors.css", "public/css/app.css")
    .css("resources/css/app.css", "public/css/app.css")
    .sourceMaps();
