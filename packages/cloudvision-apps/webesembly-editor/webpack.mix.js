/*npx mix watch*/

let mix = require('laravel-mix');
mix.sass('resources/scss/live-edit/app.scss', 'live-edit');
mix.js('resources/js/live-edit/app.js', 'live-edit').vue({ version: 3 });
