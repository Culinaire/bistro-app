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

//  Config
elixir.config.sourcemaps = false;

// Elixir Init
elixir(function(mix) {

  //  Copy files
  mix.copy('bower_components/jquery/dist/jquery.js', 'resources/assets/js/jquery.js');
  mix.copy('node_modules/bootstrap-sass/assets/stylesheets/bootstrap', 'resources/assets/sass/bootstrap');
  mix.copy('node_modules/bootstrap-sass/assets/fonts/', 'resources/assets/fonts');
  mix.copy('node_modules/bootstrap-sass/assets/javascripts/', 'resources/assets/js');

  //  Styles
  mix.sass(['app.scss']);

  //  scripts
  mix.scripts(['jquery.js'], 'public/js/jquery.js');
  mix.scripts(['bootstrap.js'], 'public/js/bootstrap.js');

  //  Versioning
  mix.version([
    'css/app.css',
    'js/jquery.js',
    'js/bootstrap.js'
  ]);
});
