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

if (elixir.config.production) {
  elixir(function (mix) {
    mix.styles('common/*.css', 'public/css/base.css');
    // mix.styles('matrix-login.css', 'public/css/login.css');
  });

  elixir(function (mix) {
    mix.scripts('common/*.js', 'public/js/base.js');
    // mix.scripts('matrix.login.js', 'public/js/login.js');
  });

  elixir(function (mix) {
    mix.copy('resources/assets/fonts', 'public/font/');
  });
}

elixir(function (mix) {
  mix.styles('matrix-login.css', 'public/css/login.css');
});

elixir(function (mix) {
  mix.scripts('matrix.login.js', 'public/js/login.js');
});

