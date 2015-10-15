var elixir = require('laravel-elixir');

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

elixir(function (mix) {
    mix.scripts([
        'jquery/dist/jquery.js',
        'bootstrap/dist/js/bootstrap.js',
        'vue/dist/vue.js',
        'jqcloud2/dist/jqcloud.js'
    ], 'public/dependencies.js', 'bower_components')
        .scripts([
            'main.js'
        ], 'public/app.js')
        .styles([
            //'bootstrap/dist/css/bootstrap.css',
            //'bootstrap/dist/css/bootstrap-theme.css',
            'jqcloud2/dist/jqcloud.css',
        ], 'public/stylesheet.css', 'bower_components')
        .styles([
            'bootstrap.css',
            'app.css'
        ],'public/app.css');
});
