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
    .js("resources/js/portal/home.js", "public/js/portal/")
    .js("resources/js/portal/languages.js", "public/js/portal/")
    .js("resources/js/portal/links.js", "public/js/portal/")
    .js("resources/js/portal/skills.js", "public/js/portal/")
    .js("resources/js/portal/education.js", "public/js/portal/")
    .js("resources/js/portal/employment.js", "public/js/portal/")
    .js("resources/js/portal/landing/settings.js", "public/js/portal/landing/")
    .js("resources/js/admin/register.js", "public/js/admin/")
    .js("resources/js/landing/app.js", "public/landing/js/")
    // .sass('resources/sass/app.scss', 'public/css')
    //.css("resources/css/bulma.css", "public/css")
    .sass("resources/sass/bulma/bulma.sass", "public/css/bulma.css")
    .sass("resources/sass/fonts.scss", "public/css/fonts.css")
    .sass("resources/sass/app.scss", "public/css/app.css")
    .sass("resources/sass/landing/app.scss", "public/landing/css/app.css")
    .css("resources/css/colors.css", "public/css/app.css")
    .css("resources/css/app.css", "public/css/app.css")
    .sourceMaps();
