const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.webpack('app.js')
       .copy(
            ['bower_components/megrim-googlefont/Megrim.ttf',
            'bower_components/font-awesome/fonts',],
            'public/fonts'
        )
       .copy(
            'bower_components/animate.css/animate.css',
            'public/css/animate.css'
        )
       .sass('app.scss')
});
