/*npx mix watch*/

let mix = require('laravel-mix');
mix.sass('src/resources/scss/editor-iframe/webesembly-iframe.scss', 'dist/webesembly');
mix.js('src/resources/js/webesembly-editor.js', 'dist/webesembly').vue({ version: 3 });
