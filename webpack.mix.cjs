const mix = require('laravel-mix');

mix.scripts([
  'public/assets/backend/plugins/global/plugins.bundle.js',
  'public/assets/backend/plugins/custom/prismjs/prismjs.bundle.js',
  'public/assets/backend/js/scripts.bundle.js',
  'public/assets/backend/js/pages/widgets.js',
], 'public/assets/backend/mix/js/app.js');

mix.scripts([
  'public/assets/backend/plugins/global/plugins.bundle.css',
  'public/assets/backend/plugins/custom/prismjs/prismjs.bundle.css',
  'public/assets/backend/css/style.bundle.css',
  'public/assets/backend/css/themes/layout/header/base/light.css',
  'public/assets/backend/css/themes/layout/header/menu/light.css',
  'public/assets/backend/css/themes/layout/brand/dark.css',
  'public/assets/backend/css/themes/layout/aside/dark.css',
], 'public/assets/backend/mix/css/app.css');

mix.browserSync({
  proxy: 'http://localhost:8000',
  files: [
    'app/**/*.php',
    'resources/views/**/*.blade.php',
    'public/mix/backend/js/app.js',
  ],
  open: false,
  notify: false,
  ui: false,
  injectChanges: true
});
