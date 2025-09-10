const mix = require('laravel-mix');

mix.scripts([
  'public/assets/backend/plugins/global/plugins.bundle.js',
  'public/assets/backend/plugins/custom/prismjs/prismjs.bundle.js',
  'public/assets/backend/js/scripts.bundle.js',
  'public/assets/backend/js/pages/widgets.js',
  'public/assets/backend/js/validation.js',
  'public/assets/backend/js/datepicker.js',
  'public/assets/backend/js/datetimepicker.js',
  'public/assets/backend/js/timepicker.js',
  'public/assets/backend/js/toast-options.js',
], 'public/assets/backend/mix/js/app.js');

mix.scripts([
  'public/assets/backend/plugins/custom/datatables/datatables.bundle.css',
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

mix.scripts([
  'public/assets/backend/plugins/custom/datatables/datatables.bundle.js',
], 'public/assets/backend/mix/js/datatable-extensions.js');

mix.scripts([
  'resources/assets/datatable/__main.js',
  'resources/assets/datatable/chart.js',
  'resources/assets/datatable/checkable-group.js',
  'resources/assets/datatable/checkable.js',
  'resources/assets/datatable/filter_table_active.js',
  'resources/assets/datatable/filter_table_date.js',
  'resources/assets/datatable/loader-image.js',
  'resources/assets/datatable/refresh_table_activity.js',
  'resources/assets/datatable/refresh_table_chart.js',
  'resources/assets/datatable/refresh_table_default.js',
  'resources/assets/datatable/table_active.js',
  'resources/assets/datatable/table_delete.js',
  'resources/assets/datatable/table_inactive.js',
], 'public/assets/backend/mix/js/datatable.js');