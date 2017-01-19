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
    mix.styles('matrix-login.css', 'public/css/login.css');
    mix.styles([
        'dashboard/fullcalendar.css',
        'dashboard/matrix-style.css',
        'dashboard/matrix-media.css',
        'dashboard/jquery.gritter.css',
        'dashboard/google-fonts.css'
      ],
      'public/css/dashboard.css');
  });

  elixir(function (mix) {
    mix.scripts('common/jquery.min.js', 'public/js/jquery.js');
    mix.scripts('common/jquery.plugins/*.js', 'public/js/jquery.plugins.js');
    mix.scripts('matrix.login.js', 'public/js/login.js');
    // mix.scripts('dashboard/*.js', 'public/js/dashboard.js');
    mix.scripts('dashboard/matrix.js', 'public/js/dashboard.js');
    mix.scripts(['csrf.js', 'category.js'], 'public/js/category.js');
    mix.scripts(['csrf.js', 'resource.js'], 'public/js/resource.js');
    mix.scripts(['csrf.js', 'reservation.js'], 'public/js/reservation.js');
  });

  elixir(function (mix) {
    mix.copy('resources/assets/fonts', 'public/font/');
    mix.copy('resources/assets/images', 'public/img/');
  });
}

elixir(function (mix) {
  // mix.styles('common/*.css', 'public/css/base.css');
  // mix.styles('matrix-login.css', 'public/css/login.css');
  // mix.styles([
  //     'dashboard/fullcalendar.css',
  //     'dashboard/matrix-style.css',
  //     'dashboard/matrix-media.css',
  //     'dashboard/jquery.gritter.css',
  //     'dashboard/google-fonts.css'
  //   ],
  //   'public/css/dashboard.css');
});

elixir(function (mix) {
  // mix.scripts('common/jquery.min.js', 'public/js/jquery.js');
  // mix.scripts('common/jquery.plugins/*.js', 'public/js/jquery.plugins.js');
  // mix.scripts('matrix.login.js', 'public/js/login.js');
  // mix.scripts('dashboard/matrix.js', 'public/js/dashboard.js');
  mix.scripts(['csrf.js', 'category.js'], 'public/js/category.js');
  mix.scripts(['csrf.js', 'resource.js'], 'public/js/resource.js');
  mix.scripts(['csrf.js', 'reservation.js'], 'public/js/reservation.js');
});
