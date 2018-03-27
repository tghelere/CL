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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/blog.sass', 'public/css')
   .sass('resources/assets/sass/contato.sass', 'public/css')
   .sass('resources/assets/sass/home.sass', 'public/css')
   .sass('resources/assets/sass/ouvidoria.sass', 'public/css')
   .sass('resources/assets/sass/post.sass', 'public/css')
   .sass('resources/assets/sass/quemsomos.sass', 'public/css')
   .sass('resources/assets/sass/servicos.sass', 'public/css')
   .sass('resources/assets/sass/solucoes.sass', 'public/css')
   .sass('resources/assets/sass/trabalheconosco.sass', 'public/css');   
