var elixir = require('laravel-elixir');


elixir(function (mix) {
    mix.copy('bower_components/components-font-awesome/fonts', 'public/fonts')
        .scripts([
        'jquery/dist/jquery.js',
        'bootstrap/dist/js/bootstrap.js',
        'jasny-bootstrap/dist/js/jasny-bootstrap.js',
        'vue/dist/vue.js',
        'jqcloud2/dist/jqcloud.js'
    ], 'public/dependencies.js', 'bower_components')
        .scripts([
            'main.js'
        ], 'public/app.js')
        .styles([
            //'bootstrap/dist/css/bootstrap.css',
            //'bootstrap/dist/css/bootstrap-theme.css',
            'bootstrap-theme/bootstrap.css',
            'jasny-bootstrap/dist/css/jasny-bootstrap.css',
            'components-font-awesome/css/font-awesome.css',
            'jqcloud2/dist/jqcloud.css',
        ], 'public/stylesheet.css', 'bower_components')
        .styles([
            'app.css'
        ],'public/app.css');
});
