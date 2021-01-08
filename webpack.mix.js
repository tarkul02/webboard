// @ts-nocheck
// const mix = require('laravel-mix');

// /*
//  |--------------------------------------------------------------------------
//  | Mix Asset Management
//  |--------------------------------------------------------------------------
//  |
//  | Mix provides a clean, fluent API for defining some Webpack build steps
//  | for your Laravel application. By default, we are compiling the Sass
//  | file for the application as well as bundling up all the JS files.
//  |
//  */

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');

let mix = require('laravel-mix')

require('laravel-mix-eslint')

mix
    .js('resources/assets/js/app.js', 'public/js')
    .eslint({
        fix: true,
        extensions: ['js']
            //...
    })
    .less('resources/assets/less/app.less', 'public/css')