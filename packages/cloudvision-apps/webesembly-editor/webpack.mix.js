/*npx mix watch*/

let mix = require('laravel-mix');
mix.sass('src/resources/scss/editor-iframe/webesembly-iframe.scss', 'public/webesembly');
mix.js('src/resources/js/webesembly-editor.js', 'public/webesembly').vue({ version: 3 });
