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
const path_js = 'resources/assets/js/'
const path_sass = 'resources/assets/sass/'

mix.js(path_js + 'app.js', 'public/js')
    .js(path_js + 'admin.js', 'public/js')
    .js(path_js + 'jquery.js', 'public/js')
    .sass(path_sass + 'style.sass', 'public/css')
    .sass(path_sass + 'admin.sass', 'public/css');
    
    // .sass(path_sass + 'home.sass', 'public/css')
    // .sass(path_sass + 'blog.sass', 'public/css')
    // .sass(path_sass + 'contato.sass', 'public/css')
    // .sass(path_sass + 'ouvidoria.sass', 'public/css')
    // .sass(path_sass + 'post.sass', 'public/css')
    // .sass(path_sass + 'quemsomos.sass', 'public/css')
    // .sass(path_sass + 'servicos.sass', 'public/css')
    // .sass(path_sass + 'solucoes.sass', 'public/css')
    // .sass(path_sass + 'trabalheconosco.sass', 'public/css');